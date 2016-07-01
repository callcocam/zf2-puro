<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Form;

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
class BsContasFilter extends AbstractFilter
{

    /**
     * construct do Fultir
     *
     * @return Base\Form\AbstractFilter
     */
    public function __construct($serviceLocator = null)
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
        $id->getFilterChain ()->attach ( $this->StringTrim );
        $id->getFilterChain ()->attach ( $this->StripTags );
        $id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $id );
        
        // Informação para a coluna codigo:
        $codigo = new Input ( "codigo" );
        $codigo->setRequired ( true );
        $codigo->getFilterChain ()->attach ( $this->StringTrim );
        $codigo->getFilterChain ()->attach ( $this->StripTags );
        $codigo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $codigo );
        
        // Informação para a coluna empresa:
        $empresa = new Input ( "empresa" );
        $empresa->setRequired ( true );
        $empresa->getFilterChain ()->attach ( $this->StringTrim );
        $empresa->getFilterChain ()->attach ( $this->StripTags );
        $empresa->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $empresa );
        
        // Informação para a coluna asset_id:
        $asset_id = new Input ( "asset_id" );
        $asset_id->setRequired ( true );
        $asset_id->getFilterChain ()->attach ( $this->StringTrim );
        $asset_id->getFilterChain ()->attach ( $this->StripTags );
        $asset_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $asset_id );
        
        // Informação para a coluna conta_tipo:
        $conta_tipo = new Input ( "conta_tipo" );
        $conta_tipo->setRequired ( true );
        $conta_tipo->getFilterChain ()->attach ( $this->StringTrim );
        $conta_tipo->getFilterChain ()->attach ( $this->StripTags );
        $conta_tipo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $conta_tipo );
        
        // Informação para a coluna title:
        $title = new Input ( "title" );
        $title->setRequired ( true );
        $title->getFilterChain ()->attach ( $this->StringTrim );
        $title->getFilterChain ()->attach ( $this->StripTags );
        $title->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $title );
        
        // Informação para a coluna description:
        $description = new Input ( "description" );
        $description->setRequired ( FALSE );
        $description->getFilterChain ()->attach ( $this->StringTrim );
        $description->getFilterChain ()->attach ( $this->StripTags );
       // $description->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $description );
        
        // Informação para a coluna ordering:
        $ordering = new Input ( "ordering" );
        $ordering->setRequired ( true );
        $ordering->getFilterChain ()->attach ( $this->StringTrim );
        $ordering->getFilterChain ()->attach ( $this->StripTags );
        $ordering->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $ordering );
        
        // Informação para a coluna state:
        $state = new Input ( "state" );
        $state->setRequired ( true );
        $state->getFilterChain ()->attach ( $this->StringTrim );
        $state->getFilterChain ()->attach ( $this->StripTags );
        $state->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $state );
        
        // Informação para a coluna access:
        $access = new Input ( "access" );
        $access->setRequired ( true );
        $access->getFilterChain ()->attach ( $this->StringTrim );
        $access->getFilterChain ()->attach ( $this->StripTags );
        $access->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $access );
        
        // Informação para a coluna created_by:
        $created_by = new Input ( "created_by" );
        $created_by->setRequired ( true );
        $created_by->getFilterChain ()->attach ( $this->StringTrim );
        $created_by->getFilterChain ()->attach ( $this->StripTags );
        $created_by->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $created_by );
        
        // Informação para a coluna modified_by:
        $modified_by = new Input ( "modified_by" );
        $modified_by->setRequired ( true );
        $modified_by->getFilterChain ()->attach ( $this->StringTrim );
        $modified_by->getFilterChain ()->attach ( $this->StripTags );
        $modified_by->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $modified_by );
        
        // Informação para a coluna alias:
        $alias = new Input ( "alias" );
        $alias->setRequired ( FALSE );
        $alias->getFilterChain ()->attach ( $this->StringTrim );
        $alias->getFilterChain ()->attach ( $this->StripTags );
      //  $alias->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $alias );
        
        // Informação para a coluna created:
        $created = new Input ( "created" );
        $created->setRequired ( true );
        $created->getFilterChain ()->attach ( $this->StringTrim );
        $created->getFilterChain ()->attach ( $this->StripTags );
        $created->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $created );
        
        // Informação para a coluna modified:
        $modified = new Input ( "modified" );
        $modified->setRequired ( true );
        $modified->getFilterChain ()->attach ( $this->StringTrim );
        $modified->getFilterChain ()->attach ( $this->StripTags );
        $modified->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $modified );
        
        // Informação para a coluna publish_up:
        $publish_up = new Input ( "publish_up" );
        $publish_up->setRequired ( true );
        $publish_up->getFilterChain ()->attach ( $this->StringTrim );
        $publish_up->getFilterChain ()->attach ( $this->StripTags );
        $publish_up->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $publish_up );
        
        // Informação para a coluna publish_down:
        $publish_down = new Input ( "publish_down" );
        $publish_down->setRequired ( true );
        $publish_down->getFilterChain ()->attach ( $this->StringTrim );
        $publish_down->getFilterChain ()->attach ( $this->StripTags );
        $publish_down->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $publish_down );
        
        // Informação para a coluna banco_id:
        $banco_id = new Input ( "banco_id" );
        $banco_id->setRequired ( FALSE );
        $banco_id->getFilterChain ()->attach ( $this->StringTrim );
        $banco_id->getFilterChain ()->attach ( $this->StripTags );
        //$banco_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $banco_id );
        
        // Informação para a coluna tipo:
        $tipo = new Input ( "tipo" );
        $tipo->setRequired ( FALSE );
        $tipo->getFilterChain ()->attach ( $this->StringTrim );
        $tipo->getFilterChain ()->attach ( $this->StripTags );
       // $tipo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $tipo );
        
        // Informação para a coluna agencia:
        $agencia = new Input ( "agencia" );
        $agencia->setRequired ( FALSE );
        $agencia->getFilterChain ()->attach ( $this->StringTrim );
        $agencia->getFilterChain ()->attach ( $this->StripTags );
        //$agencia->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $agencia );
        
        // Informação para a coluna conta:
        $conta = new Input ( "conta" );
        $conta->setRequired ( FALSE );
        $conta->getFilterChain ()->attach ( $this->StringTrim );
        $conta->getFilterChain ()->attach ( $this->StripTags );
        //$conta->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $conta );
        
        // Informação para a coluna gerente:
        $gerente = new Input ( "gerente" );
        $gerente->setRequired ( FALSE );
        $gerente->getFilterChain ()->attach ( $this->StringTrim );
        $gerente->getFilterChain ()->attach ( $this->StripTags );
        //$gerente->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $gerente );
        
        // Informação para a coluna phone:
        $phone = new Input ( "phone" );
        $phone->setRequired ( FALSE );
        $phone->getFilterChain ()->attach ( $this->StringTrim );
        $phone->getFilterChain ()->attach ( $this->StripTags );
        //$phone->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $phone );
        
        // Informação para a coluna saldo:
        $saldo = new Input ( "saldo" );
        $saldo->setRequired ( true );
        $saldo->getFilterChain ()->attach ( $this->StringTrim );
        $saldo->getFilterChain ()->attach ( $this->StripTags );
        $saldo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $saldo );
        
        // Informação para a coluna situacao:
        $situacao = new Input ( "situacao" );
        $situacao->setRequired ( true );
        $situacao->getFilterChain ()->attach ( $this->StringTrim );
        $situacao->getFilterChain ()->attach ( $this->StripTags );
        $situacao->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $situacao );
        
       }


}