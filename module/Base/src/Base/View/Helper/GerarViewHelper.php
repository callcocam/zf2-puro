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
class GerarViewHelper extends \Zend\View\Helper\AbstractHelper {

    protected static $html = array();
    protected static $labels = array();
    protected static $hidden = array();
    protected static $btn = array();
    protected static $user;
    protected static $campos_array = array('1' => 'criteria');
    protected $ServiceLocator;
    protected static $id;
    protected static $body;
    protected static $gegal;
    protected static $controle;
    protected static $images;
    protected static $galery;
    protected static $datas;
    protected $table;

    public function __construct(ServiceLocatorInterface $ServiceLocator) {
        $this->ServiceLocator = $ServiceLocator;
    }

    public function GerarElement($form) {
        self::$user = $form->getAuthservice();
        foreach ($form->getElements() as $key => $element) {
            $visible = "";
            //verifica se o usuario pode ter acesso ao campo
            if ((int) $element->getAttribute('data-access')) {
                $visible = self::$user['role_id'] <= $element->getAttribute('data-access') ? "" : " disabled";
            }
            if ($element->hasAttribute('placeholder')) {
                $element->setAttribute('placeholder', $this->view->translate($element->getAttribute('placeholder')));
             }
            if (!empty($element->getLabel())) {
                  self::$labels["{{{$key}}}"] = $this->view->HtmlTag("label")->setAttributes(array("class" => "field-label {$visible}", "for" => $element->getName()))->setText($this->view->translate($element->getLabel()));
            }
            // verifica se e um campo hidden [oculto]
            $blokcs = $element->getAttribute('data-position');
            if ($element->getAttribute('type') === "hidden") {
                $this->setHidden($key);
                self::$html["#{$key}#"] = $this->view->formHidden($element->setLabel(''));
            } elseif ($element->getAttribute('type') === "submit") {
                $this->setBtn($key);
                self::$html["#{$key}#"] = $this->view->formSubmit($element);
            } elseif ($element->getAttribute('type') === "radio") {
                $this->setBtn($key);
                 self::$html["#{$key}#"] = $this->view->FormRadio($element);
            }
            else {
                if ($blokcs === "geral") {
                    $this->setGeral($key, $visible);
                }
                if ($blokcs === "controle") {
                    $this->setControle($key, $visible);
                }
                if ($blokcs === "images") {
                    self::$html["#imagePreview#"] = \Base\Model\Check::Image($element->getValue(), $element->getValue(), "550", "330", "thumbnail img-responsive preview_IMG");
                    $this->setImages($key, $visible);
                }
                if ($blokcs === "galery") {
                    $this->setGalery($key, $visible);
                }
                if ($blokcs === "datas") {
                    $this->setDatas($key, $visible);
                }
                self::$html["#{$key}#"] = $this->view->formRow($element->setLabel(''));
            }
        }
        $this->setBtnVoltar();
    }

    public function formGrupo() {
        $box = $this->view->HtmlTag("fildset")->setText($this->view->HtmlTag("legend")->setText("FORMULARIO DE MANUTENÇÃO"));
        if (self::$hidden):
            self::$gegal['hiddeh'] = implode("", self::$hidden);
            $boxGeral = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$gegal), "title" => "GERAL", "class" => "box-default", 'footer' => implode("", self::$btn), 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-08')->setText($boxGeral));
        else:
            $boxGeral = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$gegal), "title" => "GERAL SEM HIDDEN", "class" => "box-default", 'footer' => implode("", self::$btn), 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-08')->setText($boxGeral));
        endif;

        if (self::$controle):
            $boxControle = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$controle), "title" => "CONTROLES", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxControle));
        endif;
        if (self::$images):
            $boxImages = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$images), "title" => "IMAGENS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxImages));
        endif;
        if (self::$galery):
            $boxGalery = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$galery), "title" => "GALERIAS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxGalery));
        endif;
        if (self::$datas):
            $boxDatas = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$datas), "title" => "DATAS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->view->HtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxDatas));
        endif;

        return $box;
    }

    public function setGeral($key, $visible) {
        self::$gegal[$key] = $this->view->HtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass('clear'));
    }

    public function setControle($key, $visible) {
        self::$controle[$key] = $this->view->HtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass('clear'));
    }

    public function setDatas($key, $visible) {
        $addon = $this->view->HtmlTag("div")->setClass("input-group-addon");
        self::$datas[$key] = $this->view->HtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText($addon)->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass('clear'));
    }

    public function setBtn($key) {
        self::$btn[$key] = "#{$key}#";
    }

    public function setBtnVoltar() {
        $linha = "<a class=\"btn btn-black\" href=\"%s\">{$this->view->translate('BTN_VOLTAR_LABEL')}</a><p>";
        $btnVoltar = sprintf($linha, $this->view->url($this->view->route, array('controller' => $this->view->controller, 'action' => "index")));
        self::$btn[] = $btnVoltar;
    }

    public function setHidden($key) {
        self::$hidden[$key] = "#{$key}#";
    }

    /* CRIA A BOX DE IMAGES */

    public function setImages($key, $visible) {
        $iFaparpeClicp = $this->view->HtmlTag('i')->setClass('ion ion-android-upload');
        $attachment = $this->view->HtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        // $imagenHidden = $this->view->formRow($element->setLabel('')->setAttributes(array('type' => 'hidden')));
        $divbtnPrimary = $this->view->HtmlTag('div')->setClass('btn btn-blue btn-file');
        $span = $this->view->HtmlTag('span')->setClass('file-text')->appendText("Selecione uma imagem");
        $divbtnPrimary->setText($iFaparpeClicp)->appendText($span);
        $divbtnPrimary->appendText($attachment)->appendText("#{$key}#");
        $divInputGroup = $this->view->HtmlTag('div')->setClass("input-group class-file{$visible}");
        $divInputGroup->setText($divbtnPrimary)->appendText($this->view->HtmlTag('p')->setText($this->view->translate("Max. 32MB"))->setClass('help-block'));
        self::$images[] = $this->view->HtmlTag('div')->setattributes(array('class' => "img-add "))->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText("#imagePreview#");
        self::$images[] = $this->view->HtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($divInputGroup)->appendText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass('clear'));
    }

    public function setTemplate($key) {
        $iFaparpeClicp = $this->view->HtmlTag('i')->setClass('fa fa-paperclip');
        $attachment = $this->view->HtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        $divbtnPrimary = $this->view->HtmlTag('div')->setClass('btn btn-blue btn-file');
        $divbtnPrimary->setText($iFaparpeClicp)->appendText("Selecione um Arquivo");
        $divbtnPrimary->appendText($attachment)->appendText("#{$key}#");
        $divInputGroup = $this->view->HtmlTag('div')->setClass('input-group class-file');
        $divInputGroup->setText($divbtnPrimary)->appendText($this->view->HtmlTag('p')->setText($this->view->translate("Max. 32MB"))->setClass('help-block'));
        self::$html[] = $this->view->HtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($divInputGroup)->appendText(PHP_EOL)->appendText($this->view->HtmlTag("div")->setClass('clear'));
    }

    public function setGalery($key) {
        self::$galery[$key] = "#{$key}#";
    }

    public function boxWidgets($options = array('body' => "", 'title' => "GEARL", 'class' => "box-green", 'icone' => 'clipboard')) {
        extract($options);
        $box_footer = "";
        $box = $this->view->HtmlTag('div')->setClass("widgets-box");
        $box_header = $this->view->HtmlTag('div')->setClass("box-header {$class}");
        $ionIonBag = $this->view->HtmlTag("i")->setClass("ion ion-{$icone}");
        $box_title = $this->view->HtmlTag('h3')->setClass("box-title")->setText($title);
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

    public function GerarListagem($module) {
        extract($module);
        $this->setTable($tabela);
        $colunas = $this->getTable()->getColumns();
        $filds = implode("#", array_keys($colunas));
        if (array_key_exists($colunas, "images")) {
            $this->setThumbnail("{{id}}", $filds);
        } else {
            $this->setList("{{id}}", $filds);
        }
    }

    public function setTable($tabela) {
        $table = $this->sl->get("Table");
        $table->setColumns($tabela);
        $this->table = $table;
        return $this;
    }

    public function setThumbnail($id, $body = "{{images}}", $bg = "box-default") {

        $qtd_col = str_pad(4, 2, '0', STR_PAD_LEFT);

        $br = $this->view->HtmlTag('br');

        $boxboxsolid = $this->view->HtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->view->HtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->view->HtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->view->HtmlTag("h3")->setClass('box-title')->setText("{{title}}");

        $criadoEm = $this->view->HtmlTag("small")->setClass('fl-left')->setText("<?php echo \$this->translate('CRIADO EM: ');?>")->appendText('{{created}}');

        $criadoPor = $this->view->HtmlTag("small")->setClass('fl-right')->setText("<?php echo \$this->translate(' POR: ');?>")->appendText('{{editorBy}}');

        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->view->HtmlTag("div")->setClass('box-body');

        $desc = $this->view->HtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->view->HtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->view->HtmlTag('div')->setClass("box box-full-12  box-mini-06 box-small-06 box-medium-04 box-large-{$qtd_col} col-box-list")->appendClass("delete-{$id}")->setText($boxboxsolid);
    }

    public function setList($id, $body = "{{description}}", $bg = "box-default") {
        $qtd_col = str_pad(4, 2, '0', STR_PAD_LEFT);

        $br = $this->view->HtmlTag('br');

        $boxboxsolid = $this->view->HtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->view->HtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->view->HtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->view->HtmlTag("h2")->setClass('box-title')->setText("{{title}}");

        $criadoEm = $this->view->HtmlTag("small")->setClass('fl-left')->setText("<?php echo \$this->translate('CRIADO EM: ');?>")->appendText('{{created}}');

        $criadoPor = $this->view->HtmlTag("small")->setClass('fl-right')->setText("<?php echo \$this->translate(' POR: ');?>")->appendText('{{editorBy}}');

        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->view->HtmlTag("div")->setClass('box-body');

        $desc = $this->view->HtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->view->HtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->view->HtmlTag('div')->setClass("box box-full-12 box-mini-06  box-small-06 box-medium-04 box-large-{$qtd_col} col-box-list")->appendClass("delete-{$id}")->setText($boxboxsolid);
    }

    public function setBody($body) {

        $this->body[] = $body;
    }

    public function getHtml() {
        return self::$html;
    }

    public function getLabels() {
        return self::$labels;
    }

}