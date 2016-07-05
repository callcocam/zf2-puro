<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\View\Helper;

use Doctrine\ORM\EntityManager;

/**
 * Description of ZFListarHelper
 *
 * @author Call
 */
class ZFListarHelper extends \Zend\View\Helper\AbstractHelper {

    protected $em;

    public function __construct() {
        $this->em = null;
    }

    public function setThumbnail($id,$body="{{images}}",$bg="box-default") {

        $qtd_col =str_pad(4, 2,'0',STR_PAD_LEFT) ;

        $br = $this->view->HtmlTag('br');

        $boxboxsolid = $this->view->HtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->view->HtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->view->HtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->view->HtmlTag("h3")->setClass('box-title')->setText("{{title}}");

        $criadoEm = $this->view->HtmlTag("small")->setClass('fl-left')->setText($this->view->translate('CRIADO EM: '))->appendText('{{created}}');
        
        $criadoPor = $this->view->HtmlTag("small")->setClass('fl-right')->setText($this->view->translate(' POR: '))->appendText('{{editorBy}}');
        
        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->view->HtmlTag("div")->setClass('box-body');

        $desc = $this->view->HtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->view->HtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->view->HtmlTag('div')->setClass("box box-full-12  box-mini-06 box-small-06 box-medium-04 box-large-{$qtd_col} col-box-list")->appendClass("delete-{$id}")->setText($boxboxsolid);
    }

    public function setList($id,$body="{{description}}",$bg="box-default") {
        $qtd_col =str_pad(4, 2,'0',STR_PAD_LEFT) ;

        $br = $this->view->HtmlTag('br');

        $boxboxsolid = $this->view->HtmlTag('div')->setAttributes(array('class' => 'widgets-box'));

        $box_header = $this->view->HtmlTag("div")->setClass("box-header {$bg}");

        $box_header_icon = $this->view->HtmlTag("i")->setClass('ion ion-android-open');

        $boxTitle = $this->view->HtmlTag("h2")->setClass('box-title')->setText("{{title}}");

        $criadoEm = $this->view->HtmlTag("small")->setClass('fl-left')->setText($this->view->translate('CRIADO EM: '))->appendText('{{created}}');
        
        $criadoPor = $this->view->HtmlTag("small")->setClass('fl-right')->setText($this->view->translate(' POR: '))->appendText('{{editorBy}}');
        
        $box_header->setText($box_header_icon)->appendText($boxTitle)->appendText($br)->appendText($criadoEm)->appendText($criadoPor);

        $boxbody = $this->view->HtmlTag("div")->setClass('box-body');

        $desc = $this->view->HtmlTag("p")->setClass('box-description')->setText($body);

        $botao = $this->view->HtmlTag("div")->setClass('box-footer')->setText('{{buttons}}');

        $boxbody->setText($desc);

        $boxboxsolid->setText($box_header)->appendText($boxbody)->appendText($botao);

        return $this->view->HtmlTag('div')->setClass("box box-full-12 box-mini-06  box-small-06 box-medium-04 box-large-{$qtd_col} col-box-list")->appendClass("delete-{$id}")->setText($boxboxsolid);
    }
    
    public function getBody($data)
    {
        $boxbody=  implode("", $data);
       return $this->view->HtmlTag("p")->setClass('box-description')->setText($boxbody)->appendText('{{description}}');
    }

    public function setNavigation() {

    $route = $this->view->RouteHelper()->getRoute();
    $controller = $this->view->RouteHelper()->getController();
    $url = $this->view->url($route, array('controller' => $controller, 'action' => 'inserir'));
    $icone=$this->view->HtmlTag('i')->setClass('ion ion-plus');
    $attr=array('class'=>'btn btn-green','href'=>$url,'title'=>$this->view->translate('BTN_NEW_LABEL'));
    $a=$this->view->HtmlTag("a")->setText($icone)->appendText(" ")
    ->appendText($this->view->translate('BTN_NEW_LABEL'))->setAttributes($attr);
    $this->view->HtmlTag('div')->setText($a)->setClass('nav-new-cadastro');
    return  $this->view->HtmlTag('div')->setText($a);
    }

    public function createBtn($registro, $button) {
        //\Base\Model\Check::debug($button);
        foreach ($button as $value) {
            extract($value, EXTR_OVERWRITE);
            $url = $this->view->url($this->view->route, array('controller' => $this->view->controller, 'action' => $action, 'id' => $registro, 'page' => $page));
            $attr = array("class" => "btn btn-{$class} {$action}", 'id' => "{$id}-{$registro}");
            if ($type == "a") {
                $attr = array("class" => "btn btn-{$class} {$action}", 'id' => "{$id}-{$registro}", 'href' => $url);
            }
            $btns[] = $this->view->HtmlTag($type)->setAttributes($attr)->setText
                            (
                            $this->view->HtmlTag('i')->setClass($icone)
                    )->appendText
                    (
                    $this->view->HtmlTag('span')->setClass("hidden-xs")->setText($this->view->translate($label))
            );
        }
        return implode("", $btns);
    }

    public function ListComentarios($value) {
        extract($value, EXTR_OVERWRITE);
        $action = $this->view->url('admin/default', array('controller' => 'sg-comentarios', 'action' => 'moderar'));

        $divBoxHeader = $this->view->HtmlTag("div")->setClass('box-header with-border')->setText($this->view->HtmlTag("i")->setClass('fa fa-text-width'));

        $boxTitle = $this->view->HtmlTag("h2")->setClass('box-title')->setText("{{title}}");

        $boxcreated = $this->view->HtmlTag("span")->setText("{{created}}");

        $divBoxHeader->setText($boxTitle)->appendText($this->view->HtmlTag("br"))->appendText($boxcreated);

        $divBox = $this->view->HtmlTag('div')->setClass('box box-solid');

        $boxBody = $this->view->HtmlTag("div")->setClass('box-body col-box-list-body');

        $dl = $this->view->HtmlTag("dl");

        $desc = $this->view->HtmlTag("dd")->setClass('box-description')->setText('{{description}}');

        $textResponder = $this->view->HtmlTag("dt")->setText($this->view->translate('RESPONDER:'));

        $dtDesc = $this->view->HtmlTag("dt")->setText($this->view->translate('DESCRIÇÂO:'))->appendText($desc)->appendText($textResponder);

        $textArea = $this->view->HtmlTag("textarea")->setAttributes(array('class' => 'form-control', 'placeholder' => 'Use esse campo para responder!', 'name' => 'description', 'id' => 'description'));

        $form = $this->view->HtmlTag("form")->setAttributes(array('class' => 'form-moderar', 'method' => 'post', 'action' => $action))->setText($textArea)->appendText($this->getInputs($value))->appendText($this->view->HtmlTag("hr"))->appendText('{{buttons}}');

        $divBox->setText($divBoxHeader)->appendText($boxBody->setText($dl->setText($dtDesc)->appendText($this->view->HtmlTag("dd")->setText($form))));

        return $this->view->HtmlTag('div')->setClass("col-sm-12 col-md-6 col-lg-6 col-box-list")->appendClass("delete-{$id}")->setText($divBox);
    }

    private function getInputs($value) {
        extract($value, EXTR_OVERWRITE);
        $filds = array(
            array('type' => 'hidden', 'value' => $id, "name" => 'id', "id" => "id"),
            array('type' => 'hidden', 'value' => $id, "name" => 'resp_id', "id" => "resp_id"),
            array('type' => 'hidden', 'value' => $postId, "name" => 'post_id', "id" => "post_id"),
            array('type' => 'hidden', 'value' => md5("respComentarios"), "name" => 'asset_id', "id" => "asset_id"),
            array('type' => 'hidden', 'value' => $this->view->user['empresa'], "name" => 'empresa', "id" => "empresa"),
            array('type' => 'hidden', 'value' => $this->view->user['title'], "name" => 'title', "id" => "title"),
            array('type' => 'hidden', 'value' => "0", "name" => 'state', "id" => "state"),
            array('type' => 'hidden', 'value' => $id, "name" => 'ordering', "id" => "ordering"),
            array('type' => 'hidden', 'value' => $this->view->user['id'], "name" => 'created_by', "id" => "created_by"),
            array('type' => 'hidden', 'value' => $title, "name" => 'alias', "id" => "alias"),
            array('type' => 'hidden', 'value' => date("Y-m-d"), "name" => 'created', "id" => "created"),
            array('type' => 'hidden', 'value' => date("Y-m-d H:i:s"), "name" => 'publish_up', "id" => "publish_up"),
            array('type' => 'hidden', 'value' => date("Y-m-d H:i:s"), "name" => 'publish_down', "id" => "publish_down"),
            array('type' => 'hidden', 'value' => date("Y-m-d H:i:s"), "name" => 'modified', "id" => "modified")
        );
        $input = array();
        foreach ($filds as $inputAttrs) {
            $input[] = $this->view->HtmlTag("input")->setAttributes(array_filter($inputAttrs));
        }
        return implode(" ", $input);
    }

    public function Widgets($tabela, $title = "Titulo", $icone = "android-apps", $bg = "green") {
        if (empty($tabela)) {
            return "Por favor informe um nome de tabela!!";
        }
        $sql = "SELECT COUNT(id) as qtd FROM {$tabela} WHERE state=0";
        $result = $this->em->getConnection()->fetchAll($sql);
        $qtd = $result[0]["qtd"];
        $p = $this->view->HtmlTag("p")->setText($title);
        $h3 = $this->view->HtmlTag("h3")->setText($qtd);
        $inner = $this->view->HtmlTag("div")->setClass('inner')->setText($h3)->appendText($p);
        $ionIonBag = $this->view->HtmlTag("i")->setClass("ion ion-{$icone}");
        $divIcon = $this->view->HtmlTag("div")->setClass('icon')->setText($ionIonBag);
        $a = $this->view->HtmlTag("a")->setClass('small-box-footer')->setText($this->view->translate("More info"))->appendText($this->view->HtmlTag("i")->setClass('fa fa-arrow-circle-right'));
        return $this->view->HtmlTag("div")->setClass("small-box box-{$bg}")->setText($inner)->appendText($divIcon)->appendText($a);
    }

    public function palavras_pesquisadas() {
        $html = array();
        $sql = "SELECT a.title FROM Home\Entity\BsPesquisas a GROUP BY a.title";
        $result = $this->em->createQuery($sql)->getResult();
        $class = [1 => 'default', 2 => 'primary', 3 => 'success', 4 => 'info', 5 => 'danger'];
        if ($result):
            $i = 1;
            foreach ($result as $palavra):
                extract($palavra);
                $html[] = $this->view->HtmlTag("span")->setClass("label label-{$class[$i]} palavras-pesquisadas")->setText($title);
                $i++;
                if ($i > 5):
                    $i = 1;
                endif;
            endforeach;
        endif;
      return implode(" - ", $html);
    }

}
