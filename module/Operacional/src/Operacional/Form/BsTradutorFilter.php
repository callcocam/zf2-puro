<?php

namespace Operacional\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * BsGruposFilter [BsGruposFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsTradutorFilter extends \Base\Form\AbstractFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $this->inputFilter = new InputFilter ();
        $this->emptyfilter = new NotEmpty ();
        $this->emailfilter = new EmailAddress ();
        $this->StripTags = new StripTags ();
        $this->StringTrim = new StringTrim ();
        $this->emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $this->emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);
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
        
         // Informação para a coluna placeholder:
        $placeholder = new Input("placeholder");
        $placeholder->setRequired(FALSE);
        $placeholder->getFilterChain()->attach($this->StringTrim);
        $placeholder->getFilterChain()->attach($this->StripTags);
        //$placeholder->getValidatorChain()->attach($this->emptyfilter);
        $this->add($placeholder);
        
         // Informação para a coluna dica_tela:
        $dica_tela = new Input("dica_tela");
        $dica_tela->setRequired(FALSE);
        $dica_tela->getFilterChain()->attach($this->StringTrim);
        $dica_tela->getFilterChain()->attach($this->StripTags);
        //$dica_tela->getValidatorChain()->attach($this->emptyfilter);
        $this->add($dica_tela);

        //put your code here
        // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(true);
        $description->getFilterChain()->attach($this->StringTrim);
        $description->getFilterChain ()->attach ( $this->StripTags );
        $description->getValidatorChain()->attach($this->emptyfilter);
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
