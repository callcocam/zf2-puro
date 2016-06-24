<?php

namespace Admin\Model;

/**
 * Class [TIPO]
 */

/**
 * Description of BsResources
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsResources extends \Base\Model\AbstractModel {

    
    protected $group_id;
    protected $template;
    protected $tipo_modulo;
    protected $controller;
    protected $action_default;
    protected $route;
    protected $arquivo;
    protected $module_id;
    protected $tabela;
    protected $registro_page;
    protected $colunas_linha;
    function getGroupId() {
        return $this->group_id;
    }

    function getTemplate() {
        return $this->template;
    }

    function getTipoModulo() {
        return $this->tipo_modulo;
    }

    function getController() {
        return $this->controller;
    }

    function getActionDefault() {
        return $this->action_default;
    }

    function getRoute() {
        return $this->route;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function getModuleId() {
        return $this->module_id;
    }

    function getTabela() {
        return $this->tabela;
    }

    function getRegistroPage() {
        return $this->registro_page;
    }

    function getColunasLinha() {
        return $this->colunas_linha;
    }

    function setGroupId($group_id) {
        $this->group_id = $group_id;
    }

    function setTemplate($template) {
        $this->template = $template;
    }

    function setTipoModulo($tipo_modulo) {
        $this->tipo_modulo = $tipo_modulo;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function setActioDefault($action_default)
    {
      $this->action_default=$action_default;
      return $this;
    }

    function setRoute($route) {
        $this->route = $route;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    function setModuleId($module_id) {
        $this->module_id = $module_id;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setRegistroPage($registro_page) {
        $this->registro_page = $registro_page;
    }

    function setColunasLinha($colunas_linha) {
        $this->colunas_linha = $colunas_linha;
    }



}
