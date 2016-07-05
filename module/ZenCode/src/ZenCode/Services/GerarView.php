<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZenCode\Services;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of FormHelper
 *
 * @author Call
 */
class GerarView extends HtmlElement {

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

    public function GerarElement($form, $url) {
        self::$user = $form->getAuthservice();
        foreach ($form->getElements() as $key => $element) {
            $visible = "";
            //verifica se o usuario pode ter acesso ao campo
            if ((int) $element->getAttribute('data-access')) {
                $visible = self::$user['role_id'] <= $element->getAttribute('data-access') ? "" : " disabled";
            }
            $element->setAttribute('placeholder', "");
            self::$labels["{{{$key}}}"] = $this->setHtmlTag("label")->setAttributes(array("class" => "field-label {$visible}", "for" => $element->getName()))->setText($element->getLabel());
            // verifica se e um campo hidden [oculto]
            $blokcs = $element->getAttribute('data-position');
            if ($element->getAttribute('type') === "hidden") {
                $this->setHidden($key);
                self::$html["#{$key}#"] = "";
            } elseif ($element->getAttribute('type') === "submit") {
                $this->setBtn($key);
                self::$html["#{$key}#"] = "";
            } else {
                if ($blokcs === "geral") {
                    $this->setGeral($key, $visible);
                }
                if ($blokcs === "controle") {
                    $this->setControle($key, $visible);
                }
                if ($blokcs === "images") {
                    self::$html["#imagePreview#"] = "";
                    $this->setImages($key, $visible);
                }
                if ($blokcs === "galery") {
                    $this->setGalery($key, $visible);
                }
                if ($blokcs === "datas") {
                    $this->setDatas($key, $visible);
                }
                self::$html["#{$key}#"] = "";
            }
        }
        $this->setBtnVoltar($url);
    }

    public function formGrupo() {

        $box = $this->setHtmlTag("fildset")->setText($this->setHtmlTag("legend")->setText("FORMULARIO DE MANUTENÇÃO"));
        if (self::$hidden):
            self::$gegal['hiddeh'] = implode("", self::$hidden);
            $boxGeral = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$gegal), "title" => "GERAL", "class" => "box-default", 'footer' => implode("", self::$btn), 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-08')->setText($boxGeral)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!-- ################################# FIM GERAL ################################# -->")->appendText(PHP_EOL);
        else:
            $boxGeral = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$gegal), "title" => "GERAL SEM HIDDEN", "class" => "box-default", 'footer' => implode("", self::$btn), 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-08')->setText($boxGeral)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!-- ################################# FIM GERAL ################################# -->")->appendText(PHP_EOL);
        endif;

        if (self::$controle):
            $boxControle = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$controle), "title" => "CONTROLES", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxControle)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!--################################# FIM CONTROLE ################################# -->")->appendText(PHP_EOL);
        endif;
        if (self::$images):
            $boxImages = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$images), "title" => "IMAGENS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxImages)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!-- ################################# FIM IMAGES ###########################-->")->appendText(PHP_EOL);
        endif;
        if (self::$galery):
            $boxGalery = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$galery), "title" => "GALERIAS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxGalery)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!-- ###################################FIM GALERIA###################### -->")->appendText(PHP_EOL);
        endif;
        if (self::$datas):
            $boxDatas = $this->boxWidgets(array('body' => implode(PHP_EOL, self::$datas), "title" => "DATAS", "class" => "box-default", 'icone' => 'clipboard'));
            $box->appendText($this->setHtmlTag("div")->setClass('box box-full-12 box-medium-06 box-large-04')->setText($boxDatas)->appendText(PHP_EOL))->appendText(PHP_EOL)->appendText("<!-- ################################## FIM DATAS ###################### -->")->appendText(PHP_EOL);
        endif;

        return $box;
    }

    public function setGeral($key, $visible) {
        self::$gegal[$key] = $this->setHtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}')?>")->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass('clear'));
    }

    public function setControle($key, $visible) {
        self::$controle[$key] = $this->setHtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass('clear'));
    }

    public function setDatas($key, $visible) {
        $addon = $this->setHtmlTag("div")->setClass("input-group-addon");
        self::$datas[$key] = $this->setHtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass("form-group box box-full-12 box-medium-12 box-large-12{$visible}")->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText($addon)->appendText("#{$key}#"))->appendText(PHP_EOL)->appendText($this->setHtmlTag("div")->setClass('clear'));
    }

    public function setBtn($key) {
        self::$btn[$key] = "#{$key}#";
    }

    public function setBtnVoltar($url) {
        $linha = "<a class=\"btn btn-black\" href=\"%s\"><?php echo \$this->translate('BTN_VOLTAR_LABEL');?></a><p>";
        $btnVoltar = sprintf($linha, $url);
        self::$btn[] = $btnVoltar;
    }

    public function setHidden($key) {
        self::$hidden[$key] = "#{$key}#";
    }

    /* CRIA A BOX DE IMAGES */

    public function setImages($key, $visible) {
        $iFaparpeClicp = $this->setHtmlTag('i')->setClass('ion ion-android-upload');
        $attachment = $this->setHtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        // $imagenHidden = $this->formRow($element->setLabel('')->setAttributes(array('type' => 'hidden')));
        $divbtnPrimary = $this->setHtmlTag('div')->setClass('btn btn-blue btn-file');
        $span = $this->setHtmlTag('span')->setClass('file-text')->appendText("Selecione uma imagem");
        $divbtnPrimary->setText($iFaparpeClicp)->appendText($span)->appendText(PHP_EOL);
        $divbtnPrimary->appendText($attachment)->appendText("#{$key}#")->appendText(PHP_EOL);
        $divInputGroup = $this->setHtmlTag('div')->setClass("input-group class-file{$visible}");
        $divInputGroup->setText($divbtnPrimary)->appendText($this->setHtmlTag('p')->setText("Max. 32MB")->setClass('help-block'));
        self::$images[] = $this->setHtmlTag('div')->setattributes(array('class' => "img-add "))->setText("<?php echo \$this->translate('{{{$key}}}');?>")->appendText("#imagePreview#");
        self::$images[] = $this->setHtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($divInputGroup)->appendText(PHP_EOL);
    }

    public function setTemplate($key) {
        $iFaparpeClicp = $this->setHtmlTag('i')->setClass('fa fa-paperclip');
        $attachment = $this->setHtmlTag('input')->setAttributes(array('name' => 'attachment', 'type' => 'file', 'id' => 'attachment'));
        $divbtnPrimary = $this->setHtmlTag('div')->setClass('btn btn-blue btn-file');
        $divbtnPrimary->setText($iFaparpeClicp)->appendText("Selecione um Arquivo");
        $divbtnPrimary->appendText($attachment)->appendText("#{$key}#");
        $divInputGroup = $this->setHtmlTag('div')->setClass('input-group class-file');
        $divInputGroup->setText($divbtnPrimary)->appendText($this->setHtmlTag('p')->setText("Max. 32MB")->setClass('help-block'));
        self::$html[] = $this->setHtmlTag("div")->setClass('row')->setText(PHP_EOL)->appendText($divInputGroup)->appendText(PHP_EOL);
    }

    public function setGalery($key) {
        self::$galery[$key] = "#{$key}#";
    }

    public function boxWidgets($options = array('body' => "", 'title' => "GEARL", 'class' => "box-green", 'icone' => 'clipboard')) {
        extract($options);
        $box_footer = "";
        $box = $this->setHtmlTag('div')->setClass("widgets-box")->appendText(PHP_EOL);
        $box_header = $this->setHtmlTag('div')->setClass("box-header {$class}")->appendText(PHP_EOL);
        $ionIonBag = $this->setHtmlTag("i")->setClass("ion ion-{$icone}")->appendText(PHP_EOL);
        $box_title = $this->setHtmlTag('h3')->setClass("box-title")->setText($title)->appendText(PHP_EOL);
        $box_header->setText($ionIonBag)->appendText(PHP_EOL)->appendText($box_title)->appendText(PHP_EOL);
        $box_body = $this->setHtmlTag('div')->setClass("box-body")->setText($body)->appendText(PHP_EOL);
        if (isset($footer)) {
            $pull_right = $this->setHtmlTag('div')->setClass("pull-right")->setText($footer)->appendText(PHP_EOL);
            $box_footer = $this->setHtmlTag('div')->setClass("box-footer")->setText($pull_right)->appendText(PHP_EOL);
        }
        if (isset($append_box_footer)) {
            if (empty($box_footer)) {
                $box_footer = $this->setHtmlTag('div')->setClass("box-footer");
            }
            $box_footer->appendText(PHP_EOL)->appendText($append_box_footer)->appendText(PHP_EOL);
        }
        $box->setText($box_header)->appendText(PHP_EOL)->appendText($box_body)->appendText(PHP_EOL)->appendText($box_footer)->appendText(PHP_EOL)->appendText(PHP_EOL);
        return $box;
    }

    public function GerarListagem($module) {
        extract($module->toArray());
        $this->setTable($tabela);
        $colunas = $this->table->getColumns();
        $filds = [];
        $ignore = ['1' => 'codigo', '2' => 'title', '3' => 'created', '4' => 'asset_id', '5' => 'access', '6' => 'id'];
        foreach ($colunas as $key => $value):
            if (!array_search($key, $ignore)):
                $ico=$this->setHtmlTag('i')->setClass("ico ico-{$key}");
                $label=$this->setHtmlTag('span')->setClass("label-list label-list-{$key}")->setText("<?php echo \$this->translate('{$key}');?> :");
                $desc=$this->setHtmlTag('span')->setClass("data-list data-list-{$key}")->setText("{{{$key}}}");
                $filds["{{{$key}}}"] = $this->setHtmlTag('div')->setClass("box-list list-{$key}")->setText($ico)->appendText($label)->appendText($desc);
            endif;
        endforeach;
        if (array_key_exists("images", $colunas)) {
            return $this->setThumbnail("{{id}}", implode(PHP_EOL, array_values($filds)),$module);
        } else {
            return $this->setList("{{id}}", implode(PHP_EOL, array_values($filds)),$module);
        }
    }

    public function setTable($tabela) {
        $table = $this->ServiceLocator->get("Table");
        $table->setColumns($tabela);
        $this->table = $table;
        return $this;
    }

    public function setThumbnail($id, $body = "{{images}}",$module, $bg = "box-default") {

        $qtd_col = str_pad($module->getColunasLinha(), 2, '0', STR_PAD_LEFT);

        $br = $this->setHtmlTag('br');

        $boxboxsolid = $this->setHtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->setHtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->setHtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->setHtmlTag("h3")->setClass('box-title')->setText("{{title}}");

        $criadoEm = $this->setHtmlTag("small")->setClass('fl-left')->setText("<?php echo \$this->translate('CRIADO EM: ');?>")->appendText('{{created}}');

        $criadoPor = $this->setHtmlTag("small")->setClass('fl-right')->setText("<?php echo \$this->translate(' POR: ');?>")->appendText('{{editorBy}}');

        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->setHtmlTag("div")->setClass('box-body');

        $desc = $this->setHtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->setHtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->setHtmlTag('div')->setClass('box box-full-12  box-mini-06 box-small-06 box-medium-04 box-large-<?=$qtd_col?> col-box-list')->setText($boxboxsolid);
    }

    public function setList($id, $body = "{{description}}",$module, $bg = "box-default") {
        $qtd_col = str_pad($module->getColunasLinha(), 2, '0', STR_PAD_LEFT);

        $br = $this->setHtmlTag('br');

        $boxboxsolid = $this->setHtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->setHtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->setHtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->setHtmlTag("h2")->setClass('box-title')->setText("{{title}}");

        $Codigo = $this->setHtmlTag("small")->setClass('fl-left')->setText("<?php echo \$this->translate('CODIGO: ');?>")->appendText('{{codigo}}');

        $criadoEm = $this->setHtmlTag("small")->setClass('fl-left')->setText("<?php echo \$this->translate('CRIADO EM: ');?>")->appendText('{{created}}');

        $criadoPor = $this->setHtmlTag("small")->setClass('fl-right')->setText("<?php echo \$this->translate(' POR: ');?>")->appendText('{{editorBy}}');

        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->setHtmlTag("div")->setClass('box-body');

        $desc = $this->setHtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->setHtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->setHtmlTag('div')->setClass("box box-full-12 box-mini-06  box-small-06 box-medium-04 box-large-{$qtd_col} col-box-list")->setText($boxboxsolid);
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
