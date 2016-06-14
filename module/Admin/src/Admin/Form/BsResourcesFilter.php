<?php

namespace Admin\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * BsResourcesFilter [BsResourcesFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsResourcesFilter extends \Base\Form\AbstractFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $this->inputFilter = new InputFilter ();
        $this->emptyfilter = new NotEmpty ();
        $this->emailfilter = new EmailAddress ();
        $this->identca = new Identical ();
        $this->StripTags = new StripTags ();
        $this->StringTrim = new StringTrim ();
        $this->emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $this->emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);
        $this->identca->setToken("password");
        $this->identca->setMessage("O Campo Repita Senha de ser Igual Ao campo Senha", Identical::MISSING_TOKEN);
        $this->serviceLocator = $serviceLocator;
        
        // Informação para a coluna id:
        $id = new Input("id");
        $id->setRequired(false);
        $id->getFilterChain()->attach($this->StringTrim);
        $id->getFilterChain()->attach($this->StripTags);
        //$id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($id);
        //Check that the email address exists in the database
        // Informação para a coluna codigo:
        $codigo = new Input("codigo");
        $codigo->setRequired(false);
        $codigo->getFilterChain()->attach($this->StringTrim);
        $codigo->getFilterChain()->attach($this->StripTags);
        //$codigo->getValidatorChain()->attach($this->emptyfilter);
        $this->add($codigo);

        // Informação para a coluna asset_id:
        $asset_id = new Input("asset_id");
        $asset_id->setRequired(false);
        $asset_id->getFilterChain()->attach($this->StringTrim);
        $asset_id->getFilterChain()->attach($this->StripTags);
        //$asset_id->getValidatorChain()->attach($this->emptyfilter);

        $this->add($asset_id);

        // Informação para a coluna empresa:
        $empresa = new Input("empresa");
        $empresa->setRequired(true);
        $empresa->getFilterChain()->attach($this->StringTrim);
        $empresa->getFilterChain()->attach($this->StripTags);
        $empresa->getValidatorChain()->attach($this->emptyfilter);
        $this->add($empresa);

        // Informação para a coluna title:
        $title = new Input("title");
        $title->setRequired(true);
        $title->getFilterChain()->attach($this->StringTrim);
        $title->getFilterChain()->attach($this->StripTags);
        $title->getValidatorChain()->attach($this->emptyfilter);
        $this->add($title);

        // Informação para a coluna template:
        $template = new Input("template");
        $template->setRequired(true);
        $template->getFilterChain()->attach($this->StringTrim);
        $template->getFilterChain()->attach($this->StripTags);
        $template->getValidatorChain()->attach($this->emptyfilter);
        $this->add($template);

        // Informação para a coluna group_id:
        $group_id = new Input("group_id");
        $group_id->setRequired(true);
        $group_id->getFilterChain()->attach($this->StringTrim);
        $group_id->getFilterChain()->attach($this->StripTags);
        $group_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($group_id);

        // Informação para a coluna tipo_modulo:
        $tipo_modulo = new Input("tipo_modulo");
        $tipo_modulo->setRequired(true);
        $tipo_modulo->getFilterChain()->attach($this->StringTrim);
        $tipo_modulo->getFilterChain()->attach($this->StripTags);
        $tipo_modulo->getValidatorChain()->attach($this->emptyfilter);
        $this->add($tipo_modulo);

        // Informação para a coluna route:
        $route = new Input("route");
        $route->setRequired(true);
        $route->getFilterChain()->attach($this->StringTrim);
        $route->getFilterChain()->attach($this->StripTags);
        $route->getValidatorChain()->attach($this->emptyfilter);
        $this->add($route);

        // Informação para a coluna controller:
        $controller = new Input("controller");
        $controller->setRequired(true);
        $controller->getFilterChain()->attach($this->StringTrim);
        $controller->getFilterChain()->attach($this->StripTags);
        $controller->getValidatorChain()->attach($this->emptyfilter);
        $this->add($controller);

        // Informação para a coluna action_default:
        $action_default = new Input("action_default");
        $action_default->setRequired(true);
        $action_default->getFilterChain()->attach($this->StringTrim);
        $action_default->getFilterChain()->attach($this->StripTags);
        $action_default->getValidatorChain()->attach($this->emptyfilter);
        $this->add($action_default);

        // Informação para a coluna arquivo:
        $arquivo = new Input("arquivo");
        $arquivo->setRequired(true);
        $arquivo->getFilterChain()->attach($this->StringTrim);
        $arquivo->getFilterChain()->attach($this->StripTags);
        $arquivo->getValidatorChain()->attach($this->emptyfilter);
        $this->add($arquivo);

        // Informação para a coluna module_id:
        $module_id = new Input("module_id");
        $module_id->setRequired(true);
        $module_id->getFilterChain()->attach($this->StringTrim);
        $module_id->getFilterChain()->attach($this->StripTags);
        $module_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($module_id);

        // Informação para a coluna tabela:
        $tabela = new Input("tabela");
        $tabela->setRequired(true);
        $tabela->getFilterChain()->attach($this->StringTrim);
        $tabela->getFilterChain()->attach($this->StripTags);
        $tabela->getValidatorChain()->attach($this->emptyfilter);
        $this->add($tabela);

        // Informação para a coluna registro_page:
        $registro_page = new Input("registro_page");
        $registro_page->setRequired(true);
        $registro_page->getFilterChain()->attach($this->StringTrim);
        $registro_page->getFilterChain()->attach($this->StripTags);
        $registro_page->getValidatorChain()->attach($this->emptyfilter);
        $this->add($registro_page);

        // Informação para a coluna colunas_linha:
        $colunas_linha = new Input("colunas_linha");
        $colunas_linha->setRequired(true);
        $colunas_linha->getFilterChain()->attach($this->StringTrim);
        $colunas_linha->getFilterChain()->attach($this->StripTags);
        $colunas_linha->getValidatorChain()->attach($this->emptyfilter);
        $this->add($colunas_linha);

        //put your code here
        // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(false);
        $description->getFilterChain()->attach($this->StringTrim);
        //$description->getFilterChain ()->attach ( $this->StripTags );
        //$description->getValidatorChain()->attach($this->emptyfilter);
        $this->add($description);

        // Informação para a coluna created_by:
        $created_by = new Input("created_by");
        $created_by->setRequired(true);
        $created_by->getFilterChain()->attach($this->StringTrim);
        $created_by->getFilterChain()->attach($this->StripTags);
        //$created_by->getValidatorChain()->attach($this->emptyfilter);
        $this->add($created_by);

        // Informação para a coluna alias:
        $alias = new Input("alias");
        $alias->setRequired(false);
        $alias->getFilterChain()->attach($this->StringTrim);
        $alias->getFilterChain()->attach($this->StripTags);
        //$alias->getValidatorChain()->attach($this->emptyfilter);
        $this->add($alias);

        // Informação para a coluna ordering:
        $ordering = new Input("ordering");
        $ordering->setRequired(false);
        $ordering->getFilterChain()->attach($this->StringTrim);
        $ordering->getFilterChain()->attach($this->StripTags);
        //$ordering->getValidatorChain()->attach($this->emptyfilter);
        $this->add($ordering);

        // Informação para a coluna state:
        $state = new Input("state");
        $state->setRequired(true);
        $state->getFilterChain()->attach($this->StringTrim);
        $state->getFilterChain()->attach($this->StripTags);
        $state->getValidatorChain()->attach($this->emptyfilter);
        $this->add($state);

        // Informação para a coluna access:
        $access = new Input("access");
        $access->setRequired(true);
        $access->getFilterChain()->attach($this->StringTrim);
        $access->getFilterChain()->attach($this->StripTags);
        $access->getValidatorChain()->attach($this->emptyfilter);
        $this->add($access);

        // Informação para a coluna created:
        $created = new Input("created");
        $created->setRequired(true);
        $created->getFilterChain()->attach($this->StringTrim);
        $created->getFilterChain()->attach($this->StripTags);
        $created->getValidatorChain()->attach($this->emptyfilter);
        $this->add($created);

        // Informação para a coluna modified:
        $modified = new Input("modified");
        $modified->setRequired(false);
        $modified->getFilterChain()->attach($this->StringTrim);
        $modified->getFilterChain()->attach($this->StripTags);
        //$modified->getValidatorChain()->attach($this->emptyfilter);
        $this->add($modified);

        // Informação para a coluna publish_up:
        $publish_up = new Input("publish_up");
        $publish_up->setRequired(false);
        $publish_up->getFilterChain()->attach($this->StringTrim);
        $publish_up->getFilterChain()->attach($this->StripTags);
        //$publish_up->getValidatorChain()->attach($this->emptyfilter);
        $this->add($publish_up);

        // Informação para a coluna publish_down:
        $publish_down = new Input("publish_down");
        $publish_down->setRequired(false);
        $publish_down->getFilterChain()->attach($this->StringTrim);
        $publish_down->getFilterChain()->attach($this->StripTags);
        //$publish_down->getValidatorChain()->attach($this->emptyfilter);
        $this->add($publish_down);
    }

}
