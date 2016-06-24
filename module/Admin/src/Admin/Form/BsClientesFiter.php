<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Form;

use Base\Form\AbstractFilter;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsClientesFiter extends AbstractFilter
{

    /**
     * construct do Fultir
     *
     * @return Base\Form\AbstractFilter
     */
    public function __construct($serviceLocator)
    {
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
        $id = new Input ( "id" );
        $id->setRequired ( true );
        $id->getFilterChain ()->attach ( $StringTrim );
        $id->getFilterChain ()->attach ( $StripTags );
        $id->getValidatorChain()->attach($emptyfilter);
        $this->add ( $id );
        
        // Informação para a coluna codigo:
        $codigo = new Input ( "codigo" );
        $codigo->setRequired ( true );
        $codigo->getFilterChain ()->attach ( $StringTrim );
        $codigo->getFilterChain ()->attach ( $StripTags );
        $codigo->getValidatorChain()->attach($emptyfilter);
        $this->add ( $codigo );
        
        // Informação para a coluna empresa:
        $empresa = new Input ( "empresa" );
        $empresa->setRequired ( true );
        $empresa->getFilterChain ()->attach ( $StringTrim );
        $empresa->getFilterChain ()->attach ( $StripTags );
        $empresa->getValidatorChain()->attach($emptyfilter);
        $this->add ( $empresa );
        
        // Informação para a coluna asset_id:
        $asset_id = new Input ( "asset_id" );
        $asset_id->setRequired ( true );
        $asset_id->getFilterChain ()->attach ( $StringTrim );
        $asset_id->getFilterChain ()->attach ( $StripTags );
        $asset_id->getValidatorChain()->attach($emptyfilter);
        $this->add ( $asset_id );
        
        // Informação para a coluna title:
        $title = new Input ( "title" );
        $title->setRequired ( true );
        $title->getFilterChain ()->attach ( $StringTrim );
        $title->getFilterChain ()->attach ( $StripTags );
        $title->getValidatorChain()->attach($emptyfilter);
        $this->add ( $title );
        
        // Informação para a coluna description:
        $description = new Input ( "description" );
        $description->setRequired ( true );
        $description->getFilterChain ()->attach ( $StringTrim );
        //$description->getFilterChain ()->attach ( $StripTags );
        $description->getValidatorChain()->attach($emptyfilter);
        $this->add ( $description );
        
        // Informação para a coluna ordering:
        $ordering = new Input ( "ordering" );
        $ordering->setRequired ( true );
        $ordering->getFilterChain ()->attach ( $StringTrim );
        $ordering->getFilterChain ()->attach ( $StripTags );
        $ordering->getValidatorChain()->attach($emptyfilter);
        $this->add ( $ordering );
        
        // Informação para a coluna state:
        $state = new Input ( "state" );
        $state->setRequired ( true );
        $state->getFilterChain ()->attach ( $StringTrim );
        $state->getFilterChain ()->attach ( $StripTags );
        $state->getValidatorChain()->attach($emptyfilter);
        $this->add ( $state );
        
        // Informação para a coluna access:
        $access = new Input ( "access" );
        $access->setRequired ( true );
        $access->getFilterChain ()->attach ( $StringTrim );
        $access->getFilterChain ()->attach ( $StripTags );
        $access->getValidatorChain()->attach($emptyfilter);
        $this->add ( $access );
        
        // Informação para a coluna created_by:
        $created_by = new Input ( "created_by" );
        $created_by->setRequired ( true );
        $created_by->getFilterChain ()->attach ( $StringTrim );
        $created_by->getFilterChain ()->attach ( $StripTags );
        $created_by->getValidatorChain()->attach($emptyfilter);
        $this->add ( $created_by );
        
        // Informação para a coluna modified_by:
        $modified_by = new Input ( "modified_by" );
        $modified_by->setRequired ( true );
        $modified_by->getFilterChain ()->attach ( $StringTrim );
        $modified_by->getFilterChain ()->attach ( $StripTags );
        $modified_by->getValidatorChain()->attach($emptyfilter);
        $this->add ( $modified_by );
        
        // Informação para a coluna alias:
        $alias = new Input ( "alias" );
        $alias->setRequired ( true );
        $alias->getFilterChain ()->attach ( $StringTrim );
        $alias->getFilterChain ()->attach ( $StripTags );
        $alias->getValidatorChain()->attach($emptyfilter);
        $this->add ( $alias );
        
        // Informação para a coluna created:
        $created = new Input ( "created" );
        $created->setRequired ( true );
        $created->getFilterChain ()->attach ( $StringTrim );
        $created->getFilterChain ()->attach ( $StripTags );
        $created->getValidatorChain()->attach($emptyfilter);
        $this->add ( $created );
        
        // Informação para a coluna modified:
        $modified = new Input ( "modified" );
        $modified->setRequired ( true );
        $modified->getFilterChain ()->attach ( $StringTrim );
        $modified->getFilterChain ()->attach ( $StripTags );
        $modified->getValidatorChain()->attach($emptyfilter);
        $this->add ( $modified );
        
        // Informação para a coluna publish_up:
        $publish_up = new Input ( "publish_up" );
        $publish_up->setRequired ( true );
        $publish_up->getFilterChain ()->attach ( $StringTrim );
        $publish_up->getFilterChain ()->attach ( $StripTags );
        $publish_up->getValidatorChain()->attach($emptyfilter);
        $this->add ( $publish_up );
        
        // Informação para a coluna publish_down:
        $publish_down = new Input ( "publish_down" );
        $publish_down->setRequired ( true );
        $publish_down->getFilterChain ()->attach ( $StringTrim );
        $publish_down->getFilterChain ()->attach ( $StripTags );
        $publish_down->getValidatorChain()->attach($emptyfilter);
        $this->add ( $publish_down );
        
        // Informação para a coluna imagesG:
        $imagesG = new Input ( "imagesG" );
        $imagesG->setRequired ( true );
        $imagesG->getFilterChain ()->attach ( $StringTrim );
        $imagesG->getFilterChain ()->attach ( $StripTags );
        $imagesG->getValidatorChain()->attach($emptyfilter);
        $this->add ( $imagesG );
        
        // Informação para a coluna email:
        $email = new Input ( "email" );
        $email->setRequired ( true );
        $email->getFilterChain ()->attach ( $StringTrim );
        $email->getFilterChain ()->attach ( $StripTags );
        $email->getValidatorChain()->attach($emptyfilter);
        $this->add ( $email );
        
        // Informação para a coluna bairro:
        $bairro = new Input ( "bairro" );
        $bairro->setRequired ( true );
        $bairro->getFilterChain ()->attach ( $StringTrim );
        $bairro->getFilterChain ()->attach ( $StripTags );
        $bairro->getValidatorChain()->attach($emptyfilter);
        $this->add ( $bairro );
    }


}

