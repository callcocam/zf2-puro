<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\View\Helper;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of FormHelper
 *
 * @author Call
 */
class FormHelper extends \Zend\View\Helper\AbstractHelper {

    protected static $html = array();
    protected static $user;
    protected static $campos_array = array('1' => 'criteria');
    protected $ServiceLocator;
    protected $id;

    public function __construct(ServiceLocatorInterface $ServiceLocator) {
        $this->ServiceLocator = $ServiceLocator;
    }

    public function getInstanceForm($name, $action = "index", $labelSubmit = "Create New Table",$fildIgnore=array('default','id','codigo')) {
        $form = $this->ServiceLocator->getServiceLocator()->get($name);
        $form->setAttribute('action', $this->view->url('ddl/default', array('controller' => 'ddl', 'action' => $action)));
        $form->setAttribute("class", "form-horizontal formulario-configuracao formDdl");
        $this->view->formElementErrors()
                ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
                ->setMessageSeparatorString('</li>')->render($form);
        $htmlHead = [];
        $linha = '<td>#fild#</td>';
        foreach ($form->getElements() as $element):
            if(array_search($element->getName(), $fildIgnore)):
                continue;
            endif;
            if ($element->getAttribute('type') == "hidden"):
                echo $this->view->formHidden($element);
            elseif ($element->getAttribute('type') == "submit"):
            
            elseif ($element->getName() == "security"):

            else:
                $label = $this->view->translate($element->getLabel());
                $htmlHead[] = sprintf("<th>%s</th>", $label);
                $elementArray = array(
                    '#fild#' => $this->view->formRow($element->setLabel("")),
                    '#label#' => $label,
                    '#title#' => $element->getName(),
                );
                $html[] = str_replace(array_keys($elementArray), array_values($elementArray), $linha);
            endif;

        endforeach;
//        $html[] = $this->view->formRow($form->get('save')->setValue($labelSubmit));
        $html[] = $this->view->form()->closeTag();
        $body = sprintf("<table class='table table-condensed'><tr>%s</tr><tr>%s</tr><tr><td>%s</td></tr></table>", implode("", $htmlHead), implode("", $html), $this->view->formRow($form->get('save')->setValue($labelSubmit)));

        return sprintf("%s%s%s", $this->view->form()->openTag($form), $body, $this->view->form()->closeTag());
    }
    
    public function getZenCodeForm($name, $action = "index", $labelSubmit = "Create New Table",$fildIgnore=array('default','id','codigo')) {
        $form = $this->ServiceLocator->getServiceLocator()->get($name);
        $form->setAttribute('action', $this->view->url('zen-code/default', array('controller' => 'zen-code', 'action' => $action)));
        $form->setAttribute("class", "form-horizontal formulario-configuracao form-zen-code");
        $this->view->formElementErrors()
                ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
                ->setMessageSeparatorString('</li>')->render($form);
        $htmlHead = [];
        $linha = '<tr><th>#label#</th></tr><tr><td>#fild#</td></tr>';
        foreach ($form->getElements() as $element):
            if(array_search($element->getName(), $fildIgnore)):
                continue;
            endif;
            if ($element->getAttribute('type') == "hidden"):
                echo $this->view->formHidden($element);
            elseif ($element->getAttribute('type') == "submit"):
            
            elseif ($element->getName() == "security"):

            else:
                $label = $this->view->translate($element->getLabel());
                $elementArray = array(
                    '#fild#' => $this->view->formRow($element->setLabel("")),
                    '#label#' => $label,
                    '#title#' => $element->getName(),
                );
                $html[] = str_replace(array_keys($elementArray), array_values($elementArray), $linha);
            endif;

        endforeach;
//        $html[] = $this->view->formRow($form->get('save')->setValue($labelSubmit));
        $html[] = $this->view->form()->closeTag();
        $body = sprintf("<table class='table table-condensed'>%s<tr><td>%s</td></tr></table>", implode("", $html), $this->view->formRow($form->get('save')->setValue($labelSubmit)));

        return sprintf("%s%s%s", $this->view->form()->openTag($form), $body, $this->view->form()->closeTag());
    }
    /**
     * 
     * @param type $data os valores que foram passados como filtros
     * @return um formulario de pesquisa com filtro de state, data perildo, title e descrição
     */
    public function getForm($formString, $repository) {
        $ressult = $this->ServiceLocator->getServiceLocator()->get('Admin\Model\BsCompaniesTable')->findOneBy(array('state' => '0'));
        $form = $this->ServiceLocator->getServiceLocator()->get($formString);
        if ($ressult):
            $dataResult = array();
            foreach ($ressult->toArray() as $key => $value) {
                if ($value instanceof \DateTime) {
                    $dataResult[$key] = $value->format("d-m-Y H:i:s");
                } elseif (json_decode($value, true)) {
                    $dataResult[$key] = json_decode($value, true);
                } else {
                    $dataResult[$key] = $value;
                }
            }
            $form->setData($dataResult);
        endif;
        return $form;
    }

     public function getCompanies() {
        $ressult = $this->ServiceLocator->getServiceLocator()->get('Admin\Model\BsCompaniesTable')->findOneBy(array('state' => '0'));
        $form = $this->ServiceLocator->getServiceLocator()->get('Admin\Form\BsCompaniesForm');
        if ($ressult):
            $dataResult = array();
            foreach ($ressult->toArray() as $key => $value) {
                if ($value instanceof \DateTime) {
                    $dataResult[$key] = $value->format("d-m-Y H:i:s");
                } elseif (json_decode($value, true)) {
                    $dataResult[$key] = json_decode($value, true);
                } else {
                    $dataResult[$key] = $value;
                }
            }
            $form->setData($dataResult);
        endif;
        return $form;
    }

    public function getFormulario($data) {
        $route = $this->view->RouteHelper()->getRoute();
        $controller = $this->view->RouteHelper()->getController();
        $form = new \Home\Form\BuscaForm();
        if ($data) {
            $form->setData($data);
        }
        $form->setAttribute('action', $this->view->url($route, array('controller' => $controller, 'action' => "index")));
        $this->view->formElementErrors()
                ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
                ->setMessageSeparatorString('</li>')->render($form);

        $html[] = $this->view->form()->openTag($form);
        $html[] = $this->view->formRow($form->get('title')->setLabel(""));
        $html[] = $this->view->formRow($form->get('submit'));
        $html[] = $this->view->form()->closeTag();

        return implode("", $html);
    }

    public function GerarElement($form, $blokc) {
        self::$html = array();
        self::$user = $this->view->UserIdentity();
        //[$exist] não existe nenhum campo dentro do block
        $exist = false;
        foreach ($form->getElements() as $element) {
            $visible = "";
            if ($element->getName() == "id") {
                $this->id = $element->getValue();
            }
            //verifica se o usuario pode ter acesso ao campo
            if ((int) $element->getAttribute('data-access')) {
                $visible = self::$user['role_id'] <= $element->getAttribute('data-access') ? "" : "disabled";
            }
            $element->setAttribute('placeholder', "");
            $label = $this->view->HtmlTag('label')->setAttributes(array("class" => "field-label {$visible}", "for" => $element->getName()))->setText($element->getLabel());
            // verifica em q block o campo sera alocado
            if ($element->getAttribute('data-position') === $blokc) {
                // seta como exist campo dentro do block
                $exist = true;
                // verifica se e um campo hidden [oculto]
                if ($element->getAttribute('type') === "hidden") {
                    self::$html[] = $this->view->formHidden($element->setLabel(''));
                } else {
                    // se o bloco for data monta um bloco para o campo do tipo data
                    if ($blokc === 'datas') {
                        $addon = $this->view->HtmlTag('div')->setClass('input-group-addon');
                        $row = $this->view->formRow($element->setAttribute('readonly', true)->setLabel(''));
                        self::$html[] = $this->view->HtmlTag('div')->setClass('input-group')->setText($label)->appendText($addon)->appendText($row);
                        // se for igual a imagem monta um bloco para campos do tipo imagens
                    } elseif ($blokc == "images") {
                        if ($element->getName() == "images") {
                            $this->setImages($element, $visible, $label);
                        } elseif ($element->getName() == "template") {
                            $this->setTemplate($element, $visible);
                        } elseif ($element->getName() == "galeria") {
                            $this->setGalery($element);
                        }
                        // se for um campo normal   
                    } else {
                        self::$html[] = $this->view->HtmlTag('div')->setClass("form-group {$visible}")->setText($label)->appendText($this->view->formRow($element->setLabel('')));
                    }
                }
            }
        }
        if ($exist):
            return $this->view->HtmlTag('div')->setClass('row')->setText($this->view->HtmlTag('div')->setClass('col-md-12')->setText(implode("", self::$html)));
        endif;
        return null;
    }

    /* CRIA A BOX DE IMAGES */

    public function setImages($element, $visible = "", $label) {
        $iFaparpeClicp = $this->view->HtmlTag('i')->setClass('ion ion-android-upload');
        $attachment = $this->view->HtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        $imagenHidden = $this->view->formRow($element->setLabel('')->setAttributes(array('type' => 'hidden')));
        $divbtnPrimary = $this->view->HtmlTag('div')->setClass('btn btn-blue btn-file');
        $span = $this->view->HtmlTag('span')->setClass('file-text')->appendText("Selecione uma imagem");
        $divbtnPrimary->setText($iFaparpeClicp)->appendText($span);

        $divbtnPrimary->appendText($attachment)->appendText($imagenHidden);

        $divInputGroup = $this->view->HtmlTag('div')->setClass("input-group class-file {$visible}");
        $divInputGroup->setText($divbtnPrimary)->appendText($this->view->HtmlTag('p')->setText($this->view->translate("Max. 32MB"))->setClass('help-block'));
        $image = \Base\Model\Check::Image($element->getValue(), $element->getValue(), "550", "330", "thumbnail img-responsive preview_IMG");
        self::$html[] = $this->view->HtmlTag('div')->setattributes(array('class' => "img-add "))->setText($label)->appendText($image);
        self::$html[] = $divInputGroup;
    }

    public function setTemplate($element) {
        $iFaparpeClicp = $this->view->HtmlTag('i')->setClass('fa fa-paperclip');
        $attachment = $this->view->HtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        $imagenHidden = $this->view->formRow($element->setLabel('')->setAttributes(array('type' => 'hidden')));
        $divbtnPrimary = $this->view->HtmlTag('div')->setClass('btn btn-blue btn-file');
        $divbtnPrimary->setText($iFaparpeClicp)->appendText("Selecione uma imagem");
        $divbtnPrimary->appendText($attachment)->appendText($imagenHidden);

        $divInputGroup = $this->view->HtmlTag('div')->setClass('input-group class-file');
        $divInputGroup->setText($divbtnPrimary)->appendText($this->view->HtmlTag('p')->setText($this->view->translate("Max. 32MB"))->setClass('help-block'));
        self::$html[] = $this->view->HtmlTag('label')->setText($this->view->translate($element->getLabel()));
        self::$html[] = $divInputGroup;
    }

    public function setGalery($element) {
        $carousel_example_generic = "";
        $coll = $this->view->HtmlTag('div');
        $iFaparpeClicp = $this->view->HtmlTag('i')->setClass('fa fa-paperclip');
        $attachment = $this->view->HtmlTag('input')->setAttributes(array('name' => 'attachment_galeria[]', 'type' => 'file', 'id' => 'attachment_galeria', 'multiple' => true));
        $galeryHidden = $this->view->formRow($element->setLabel('')->setAttributes(array('type' => 'hidden')));
        $divbtnPrimary = $this->view->HtmlTag('div')->setAttributes(array('class' => 'btn btn-warning btn-file', 'title' => 'Selecione uma ou mais imagens para montar uma galeria'));
        $divbtnPrimary->setText($iFaparpeClicp)->appendText("Galeria");
        $divbtnPrimary->appendText($attachment);
        $hr = $this->view->HtmlTag('hr');
        $coll->setText($hr)->appendText($divbtnPrimary)->appendText($hr)->appendText($galeryHidden);
        $galeria = explode("|", $element->getValue());
        if (array_filter($galeria)):
            $active = "active";
            $i = 0;
            foreach ($galeria as $value):
                $img = \Base\Model\Check::Image($value, "", '570', '330');
                $linkExcluir = $this->view->HtmlTag('a')->setText("Remover Imagem")->setAttributes(array('href' => $this->view->url($this->view->route, array('controller' => $this->view->controller, 'action' => "removerimagegalery", 'id' => $i)), 'class' => "btn btn-red btn-xs excluircarrousel", 'id' => ".remove-slide-{$i}"));
                $carousel_caption = $this->view->HtmlTag('div')->setClass("carousel-caption")->setText($linkExcluir);
                $item[] = $this->view->HtmlTag('div')->setClass("item {$active} remove-slide-{$i}")->setText($img)->appendText($carousel_caption);
                $li[] = $this->view->HtmlTag('li')->setAttributes(array('data-target' => 'MyCarousel', 'class' => "{$active} remove-slide-{$i}", 'data-slide-to' => $i++));
                $active = "";
            endforeach;

            $ol = $this->view->HtmlTag('ol')->setClass('carousel-indicators')->setText(implode("", $li));
            $carousel_inner = $this->view->HtmlTag('div')->setClass('carousel-inner')->setText(implode("", $item));
            $spanPrev = $this->view->HtmlTag('span')->setClass('fa fa-angle-left');
            $prev = $this->view->HtmlTag('a')->setAttributes(array('href' => "#MyCarousel", 'class' => "left carousel-control", 'data-slide' => "prev"))->setText($spanPrev);
            $spanNext = $this->view->HtmlTag('span')->setClass('fa fa-angle-right');
            $next = $this->view->HtmlTag('a')->setAttributes(array('href' => "#MyCarousel", 'class' => "right carousel-control", 'data-slide' => "next"))->setText($spanNext);
            $carousel_example_generic = $this->view->HtmlTag('div')->setAttributes(array('id' => 'MyCarousel', 'class' => 'carousel slide', 'data-ride' => 'carousel'));
            $carousel_example_generic->setText($ol)->appendText($carousel_inner)->appendText($prev)->appendText($next);

        endif;
        self::$html[] = $coll->appendText($carousel_example_generic);
    }

  
    public function btnAlimentation($btn) {
        $html = array();
        extract($btn);
        $i_fa_times = $this->view->HtmlTag('i')->setClass($icone);
        $span_hidden_xs = $this->view->HtmlTag('i')->setClass('hidden-xs')
                ->setText($this->view->translate($label));
        $html = $this->view->HtmlTag($tag)->setAttributes($attr)->setText($i_fa_times)
                ->appendText($span_hidden_xs);
        return $html;
    }

    public function formElements($form) {
        $html = array();
        foreach ($form->getElements() as $element) {
            if ($element->getAttribute('type') === "hidden") {
                $html[] = $this->view->formHidden($element->setLabel(''));
            } elseif (array_search($element->getAttribute('name'), self::$campos_array)) {
                $element->setAttribute('readonly', true);

                $btnAdd = $this->view->HtmlTag('button')->setAttributes(array('type' => 'button', 'class' => 'btn btn-info btn-flat j_add-value-options', 'style' => 'margin-top: 25px;', 'data-id' => $element->getAttribute('id')))->setText("Add");

                $btnRemove = $this->view->HtmlTag('button')->setAttributes(array('type' => 'button', 'class' => 'btn btn-red btn-flat j_limpa-value-options', 'style' => 'margin-top: 25px;', 'data-id' => $element->getAttribute('id')))->setText("Limpar");

                $span = $this->view->HtmlTag('span')->setClass('input-group-btn')->setText($btnAdd)->appendText($btnRemove);

                $html[] = $this->view->HtmlTag('div')->setClass('input-group input-group-sm')->setText($this->view->formRow($element))
                        ->appendText($span);
            } else {
                $html[] = $this->view->HtmlTag('div')->setText($this->view->formRow($element));
            }
        }
        return implode("", $html);
    }

    /**
     * 
     * @param type $data os valores que foram passados como filtros
     * @return um formulario de pesquisa com filtro de state, data perildo, title e descrição
     */
    public function filterForm($data = array()) {
        $route = $this->view->RouteHelper()->getRoute();
        $controller = $this->view->RouteHelper()->getController();
        $form = new \Base\Form\BuscaForm();
        if ($data) {
            $form->setData($data);
        }
        $form->setAttribute('action', $this->view->url($route, array('controller' => $controller, 'action' => "index")));
        $this->view->formElementErrors()
                ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
                ->setMessageSeparatorString('</li>')->render($form);

        $html[] = $this->view->form()->openTag($form);
        $href = $this->view->url($route, array('controller' => $controller, 'action' => "ajuda"));
        $a = $this->view->HtmlTag('a')->setAttributes(array('href' => $href, 'class' => 'b-r-full link-ajuda'));
        $html[] = "<ul class='nav-form'>";
        $html[] = $this->view->HtmlTag('li')->setText($a)->setClass('input-ajuda');
        $html[] = $this->view->HtmlTag('li')->setClass('input-busca')->setText($this->view->formRow($form->get('busca')->setLabel("")))->appendText($this->view->formRow($form->get('submit')));

        $html[] = $this->view->HtmlTag('li')->setClass('input-publish_down')->setText($this->view->formRow($form->get('publish_down')->setLabel("")));
        $html[] = $this->view->HtmlTag('li')->setClass('input-created')->setText($this->view->formRow($form->get('created')->setLabel("")));

        $html[] = $this->view->HtmlTag('li')->setClass('input-state')->setText($this->view->formRow($form->get('state')->setLabel("")));


        $html[] = "</ul>";
        $html[] = $this->view->form()->closeTag();

        return implode("", $html);
    }

    

    public function boxWidgets($options = array('body' => "", 'title' => "GEARL", 'class' => "box-green", 'icone' => 'clipboard')) {
        extract($options);
        $box_footer = "";
        $box = $this->view->HtmlTag('div')->setClass("widgets-box"); //<div class="box box-blue">
        $box_header = $this->view->HtmlTag('div')->setClass("box-header {$class}"); //<div class="box-header with-border">
        $ionIonBag = $this->view->HtmlTag("i")->setClass("ion ion-{$icone}");
        $box_title = $this->view->HtmlTag('h3')->setClass("box-title")->setText($title); //<h3 class="box-title">IMAGEN</h3>
        $box_header->setText($ionIonBag)->appendText($box_title);
        $box_body = $this->view->HtmlTag('div')->setClass("box-body")->setText($body);
        if (isset($footer)) {
            $pull_right = $this->view->HtmlTag('div')->setClass("pull-right")->setText($footer);
            $box_footer = $this->view->HtmlTag('div')->setClass("box-footer")->setText($pull_right);
        }
        if (isset($append_box_footer)) {
            if (empty($box_footer)) {
                $box_footer = $this->view->HtmlTag('div')->setClass("box-footer");
            }
            $box_footer->appendText($append_box_footer);
        }
        $box->setText($box_header)->appendText($box_body)->appendText($box_footer);
        return $box;
    }

}
