<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarModuleConfig extends Options {

    protected $code;

    public function __construct($data, $childrenModules, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        $data = $data->toArray();
        extract($data);
        $this->setTable($tabela);
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("");
        // E tanto o o nome do arquivo como o nome da class
        $this->setName($arquivo);
        // ex:Form, Entity, Service
        $this->setSubDir("config");
        // Montar o caminho base
        $aFind = array('DS', 'dirBase', 'dirEntity');
        $aSub = array(DIRECTORY_SEPARATOR, $alias, 'config');
        $dirBase = str_replace($aFind, $aSub, ".DSmoduleDSdirBaseDS");
        // Base dir geralmente e ./module/Modulo/src/Modulo
        $this->setBaseDir($dirBase);
        // Name Space ex:Modulo\Form
        $this->setNameSpace(sprintf("%s", $alias));
        // set os use
        // $this->setUses(array('Base\Controller\AbstractController' => null));
        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }
        $data['controllers_invokables'] = "";
        $data['service_manager_factories'] = "";
        $data['controllers_factories'] = "";
        $data['service_manager_aliases'] = "";
        $data['service_manager_invokables'] = "";

        $controllers_invokables = [];
        $service_manager_factories = [];
        $service_manager_invokables = [];
        if ($childrenModules):
            foreach ($childrenModules as $key => $value):
                extract($value->toArray());
                $controllers_invokables[] = "'{$alias}\Controller\\{$arquivo}'=>'{$alias}\Controller\\{$arquivo}Controller',";
                $service_manager_factories[] = "'{$alias}\Form\\{$arquivo}Form'=>'{$alias}\Factory\\{$arquivo}FormFactory',";
                $service_manager_factories[] = "'{$arquivo}TableGateway'=>'{$alias}\Factory\\{$arquivo}Factory',";
                $service_manager_factories[] = "'{$alias}\Model\\{$arquivo}Table'=>'{$alias}\Factory\\{$arquivo}FactoryTable',";
                $service_manager_invokables[] = "'{$alias}\Model\\{$arquivo}' => '{$alias}\Model\\{$arquivo}',";


            endforeach;
        endif;
        $data['controllers_invokables'] = implode(PHP_EOL, $controllers_invokables);
        $data['service_manager_factories'] = implode(PHP_EOL, $service_manager_factories);
        $data['service_manager_invokables'] = implode(PHP_EOL, $service_manager_invokables);
        $string = "#" . implode("#&#", array_keys($data)) . "#";
        $aFind = explode("&", $string);
        $aSub = array_values($data);
        $this->default_module_confg();
        $this->code = str_replace($aFind, $aSub, implode(PHP_EOL, $this->getBody()));
        // gera os methods podemos erar mais de um repetindo o codigo 'Admin\Form\BsResourcesForm' => 'Admin\Factory\ResourcesFactory',
    }

    public function getCode() {
        return $this->code;
    }

    public function default_module_confg() {
        $this->setBody('return array(');
        $this->setBody('    "router" => array(');
        $this->setBody('        "routes" => array(');
        $this->setBody('           "#route#" => array(');
        $this->setBody('                "type"    => "Literal",');
        $this->setBody('                "options" => array(');
        $this->setBody('                    "route"    => "/#route#",');
        $this->setBody('                    "defaults" => array(');
        $this->setBody('                        "__NAMESPACE__" => "#alias#\Controller",');
        $this->setBody('                        "controller"    => "#alias#",');
        $this->setBody('                        "action"        => "#action_default#",');
        $this->setBody('                    ),');
        $this->setBody('                ),');
        $this->setBody('                "may_terminate" => true,');
        $this->setBody('                "child_routes" => array(');
        $this->setBody('                    "default" => array(');
        $this->setBody('                        "type"    => "Segment",');
        $this->setBody('                        "options" => array(');
        $this->setBody('                            "route" => "/[:controller[/:action][/:id][/:page]]",');
        $this->setBody('                            "constraints" => array(');
        $this->setBody('                                "controller" => "[a-zA-Z][a-zA-Z0-9_-]*",');
        $this->setBody('                                "action"     => "[a-zA-Z][a-zA-Z0-9_-]*",');
        $this->setBody('                            ),');
        $this->setBody('                            "defaults" => array(');
        $this->setBody('                            ),');
        $this->setBody('                        ),');
        $this->setBody('                    ),');
        $this->setBody('                ),');
        $this->setBody('            ),');
        $this->setBody('        ),');
        $this->setBody('    ),');
        $this->setBody('     "controllers" => array(');
        $this->setBody('        "invokables" => array(');
        $this->setBody('                #controllers_invokables#');
        $this->setBody('        ),');
        $this->setBody('        "factories" => array(');
        $this->setBody('                #controllers_factories#');
        $this->setBody('        ),');
        $this->setBody('');
        $this->setBody('    ),');
        $this->setBody('    "service_manager" => array(');
        $this->setBody('        "factories" => array(// !!! aliases not alias');
        $this->setBody('         #service_manager_factories#   ');
        $this->setBody('           ');
        $this->setBody('        ),');
        $this->setBody('        "aliases" => array(// !!! aliases not alias');
        $this->setBody('         #service_manager_aliases#');
        $this->setBody('        ),');
        $this->setBody('        "invokables" => array(');
        $this->setBody('          #service_manager_invokables# ');
        $this->setBody('        ),');
        $this->setBody('    ),');
        $this->setBody('    "view_manager" => array(');
        $this->setBody('        "template_path_stack" => array(');
        $this->setBody('            __DIR__ . "/../view",');
        $this->setBody('        ),');
        $this->setBody('    ),');
        $this->setBody('  ');
        $this->setBody(');');
    }

}
