<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarNavigation extends Options {

    protected $item = array();
    protected $servileLocator;
    public function __construct($servileLocator) {
        $this->servileLocator = $servileLocator;
        $grupos = $this->servileLocator->get("Operacional\Model\BsGruposTable")->findBy(array('state' => '0'));
        $entro=false;
        if ($grupos):
            $this->setBody('$return = array(');
            foreach ($grupos as $value) {
                $entro=true;
                extract($value->toArray());
                $title=  strtoupper($title);
                $this->setBody("          array(");
                $this->setBody("              'label' => '{$title}',");
                $this->setBody("              'class' => 'treeview',");
                $this->setBody("              'action'     => '#',");
                $this->setBody("              'icone'     => '{$icone}',");
                $this->setBody("              'title'   => '{$description}',");
                $this->subMenu($id);
                $it = implode(PHP_EOL, $this->item);
                $this->setBody("              'pages'   => array({$it})");
                $this->setBody("          ),");
            }
            $this->setBody(" );     // Fim navigation default");
            $this->setBody('return $return[0];');
            if(!$entro){
                 $this->setBody("limpa"); 
                 $this->setBody("return ;"); 
            }
           endif;
        
    }

    private function subMenu($grupo) {
        unset($this->item);
        $this->item = array();
        $BsResources = $this->servileLocator->get("Operacional\Model\BsResourcesTable")->findBy(array('state' => '0', 'group_id' => $grupo,'tipo_modulo'=>'2'));
        if ($BsResources):
            foreach ($BsResources as $value):
                extract($value->toArray());
                $title=  strtoupper($title);
                $this->setMenuitem("                    array(");
                $this->setMenuitem("                          'label'      => '{$title}',");
                $this->setMenuitem("                          'route'      => '{$route}/default',");
                $this->setMenuitem("                          'controller' => '{$controller}',");
                $this->setMenuitem("                          'resource'   => '{$alias}\Controller\\{$arquivo}',");
                $this->setMenuitem("                          'action'     => 'index',");
                $this->setMenuitem("                          'privilege'  => 'index',");
                $this->setMenuitem("                          'icone'      => 'fa fa-angle-double-right',");
                $this->setMenuitem("                          'title'      => '{$description}',");
                $this->setMenuitem("                    ),");
            endforeach;
        endif;
    }
    public function setMenuitem($item) {

        $this->item[] = $item;
    }
    public function generate($fileName) {
         $fileGenerate = new \Zend\Code\Generator\FileGenerator();
        $fileGenerate->setFilename($fileName)->setBody(implode(PHP_EOL, $this->body))->write();
        return $fileGenerate->generate();
    }

}
