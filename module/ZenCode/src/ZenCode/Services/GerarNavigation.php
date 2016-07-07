<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarNavigation extends Options {

    protected $item = array();
    protected $subaction = array();
    protected $servileLocator;

    public function __construct($servileLocator) {
        $this->servileLocator = $servileLocator;
        $grupos = $this->servileLocator->get("Operacional\Model\BsGruposTable")->findBy(array('state' => '0'));
        $entro = false;
        if ($grupos):
            $this->setBody('$return = array(');
            foreach ($grupos as $value) {
                $entro = true;
                extract($value->toArray());
                $title = strtoupper($title);
                $this->subMenu($id);
                if ($this->item):
                    $this->setBody("          array(");
                    $this->setBody("              'label' => '{$title}',");
                    $this->setBody("              'class' => 'treeview',");
                    $this->setBody("              'action'     => '#',");
                    $this->setBody("              'icone'     => '{$icone}',");
                    $this->setBody("              'title'   => '{$description}',");
                    $it = implode(PHP_EOL, $this->item);
                    $this->setBody("              'pages'   => array({$it})");
                    $this->setBody("          ),");
                endif;
            }
            $this->setBody(" );     // Fim navigation default");
            $this->setBody('return $return;');
            if (!$entro) {
                $this->setBody("limpa");
                $this->setBody("return ;");
            }
        endif;
    }

    private function subMenu($grupo) {
        unset($this->item);
        $this->item = array();
        $BsResources = $this->servileLocator->get("Operacional\Model\BsResourcesTable")->findBy(array('state' => '0', 'group_id' => $grupo, 'tipo_modulo' => '2'));
        if ($BsResources):
            foreach ($BsResources as $value):
                $this->subAction($value);
                $subaction = implode(PHP_EOL, $this->subaction);
                extract($value->toArray());
                $title = strtoupper($title);
                $this->setMenuitem("                    array(");
                $this->setMenuitem("                          'label'      => '{$title}',");
                $this->setMenuitem("                          'route'      => '{$route}/default',");
                $this->setMenuitem("                          'controller' => '{$controller}',");
                $this->setMenuitem("                          'resource'   => '{$alias}\Controller\\{$arquivo}',");
                $this->setMenuitem("                          'action'     => 'index',");
                $this->setMenuitem("                          'privilege'  => 'index',");
                $this->setMenuitem("                          'icone'      => 'fa fa-angle-double-right',");
                $this->setMenuitem("                          'title'      => '{$description}',");
                $this->setMenuitem("                          'pages'      => array({$subaction}),");
                $this->setMenuitem("                    ),");
            endforeach;
        endif;
    }

    public function setMenuitem($item) {

        $this->item[] = $item;
    }

    public function subAction($value) {
        $this->subaction = array();
        extract($value->toArray());
        $this->setSubaction("                    array(");
        $this->setSubaction("                        'label' => 'Cadastrar',");
        $this->setSubaction("                        'route' => '{$route}/default',");
        $this->setSubaction("                        'controller' => '{$controller}',");
        $this->setSubaction("                        'resource' => '{$alias}\Controller\\{$arquivo}',");
        $this->setSubaction("                        'action' => 'inserir',");
        $this->setSubaction("                        'privilege' => 'inserir',");
        $this->setSubaction("                        'title' => 'Cadastrar Registro',");
        $this->setSubaction("                    ),");
        $this->setSubaction("                    array(");
        $this->setSubaction("                        'label' => 'Editar',");
        $this->setSubaction("                        'route' => '{$route}/default',");
        $this->setSubaction("                        'controller' => '{$controller}',");
        $this->setSubaction("                        'resource' => '{$alias}\Controller\\{$arquivo}',");
        $this->setSubaction("                        'action' => 'editar',");
        $this->setSubaction("                        'privilege' => 'editar',");
        $this->setSubaction("                        'title' => 'Editar Registro',");
        $this->setSubaction("                    )");
    }

    public function setSubaction($subaction) {
        $this->subaction[] = $subaction;
        return $this;
    }

    public function generate($fileName) {
        $fileGenerate = new \Zend\Code\Generator\FileGenerator();
        $fileGenerate->setFilename($fileName)->setBody(implode(PHP_EOL, $this->body))->write();
        return $fileGenerate->generate();
    }

}
