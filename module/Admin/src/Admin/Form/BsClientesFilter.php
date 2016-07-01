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
class BsClientesFilter extends AbstractFilter
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

        // Informação para a coluna title:
        $title = new Input ( "title" );
        $title->setRequired ( true );
        $title->getFilterChain ()->attach ( $this->StringTrim );
        $title->getFilterChain ()->attach ( $this->StripTags );
        $title->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $title );

        // Informação para a coluna description:
        $description = new Input ( "description" );
        $description->setRequired ( true );
        $description->getFilterChain ()->attach ( $this->StringTrim );
        //$description->getFilterChain ()->attach ( $this->StripTags );
        $description->getValidatorChain()->attach($this->emptyfilter);
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
        $alias->setRequired ( true );
        $alias->getFilterChain ()->attach ( $this->StringTrim );
        $alias->getFilterChain ()->attach ( $this->StripTags );
        $alias->getValidatorChain()->attach($this->emptyfilter);
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

        // Informação para a coluna email:
        $email = new Input ( "email" );
        $email->setRequired ( true );
        $email->getFilterChain ()->attach ( $this->StringTrim );
        $email->getFilterChain ()->attach ( $this->StripTags );
        $email->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $email );

        // Informação para a coluna tipo:
        $tipo = new Input ( "tipo" );
        $tipo->setRequired ( true );
        $tipo->getFilterChain ()->attach ( $this->StringTrim );
        $tipo->getFilterChain ()->attach ( $this->StripTags );
        $tipo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $tipo );

        // Informação para a coluna cnpj:
        $cnpj = new Input ( "cnpj" );
        $cnpj->setRequired ( true );
        $cnpj->getFilterChain ()->attach ( $this->StringTrim );
        $cnpj->getFilterChain ()->attach ( $this->StripTags );
        $cnpj->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cnpj );

        // Informação para a coluna phone:
        $phone = new Input ( "phone" );
        $phone->setRequired ( true );
        $phone->getFilterChain ()->attach ( $this->StringTrim );
        $phone->getFilterChain ()->attach ( $this->StripTags );
        $phone->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $phone );

        // Informação para a coluna whatsapp:
        $whatsapp = new Input ( "whatsapp" );
        $whatsapp->setRequired ( true );
        $whatsapp->getFilterChain ()->attach ( $this->StringTrim );
        $whatsapp->getFilterChain ()->attach ( $this->StripTags );
        $whatsapp->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $whatsapp );

        // Informação para a coluna rg:
        $rg = new Input ( "rg" );
        $rg->setRequired ( true );
        $rg->getFilterChain ()->attach ( $this->StringTrim );
        $rg->getFilterChain ()->attach ( $this->StripTags );
        $rg->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $rg );

        // Informação para a coluna ie:
        $ie = new Input ( "ie" );
        $ie->setRequired ( true );
        $ie->getFilterChain ()->attach ( $this->StringTrim );
        $ie->getFilterChain ()->attach ( $this->StripTags );
        $ie->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $ie );

        // Informação para a coluna cidade:
        $cidade = new Input ( "cidade" );
        $cidade->setRequired ( true );
        $cidade->getFilterChain ()->attach ( $this->StringTrim );
        $cidade->getFilterChain ()->attach ( $this->StripTags );
        $cidade->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cidade );

        // Informação para a coluna bairro:
        $bairro = new Input ( "bairro" );
        $bairro->setRequired ( true );
        $bairro->getFilterChain ()->attach ( $this->StringTrim );
        $bairro->getFilterChain ()->attach ( $this->StripTags );
        $bairro->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $bairro );

        // Informação para a coluna endereco:
        $endereco = new Input ( "endereco" );
        $endereco->setRequired ( true );
        $endereco->getFilterChain ()->attach ( $this->StringTrim );
        $endereco->getFilterChain ()->attach ( $this->StripTags );
        $endereco->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $endereco );

        // Informação para a coluna credito:
        $credito = new Input ( "credito" );
        $credito->setRequired ( true );
        $credito->getFilterChain ()->attach ( $this->StringTrim );
        $credito->getFilterChain ()->attach ( $this->StripTags );
        $credito->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $credito );

        // Informação para a coluna cep:
        $cep = new Input ( "cep" );
        $cep->setRequired ( true );
        $cep->getFilterChain ()->attach ( $this->StringTrim );
        $cep->getFilterChain ()->attach ( $this->StripTags );
        $cep->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cep );

        // Informação para a coluna facebook:
        $facebook = new Input ( "facebook" );
        $facebook->setRequired ( true );
        $facebook->getFilterChain ()->attach ( $this->StringTrim );
        $facebook->getFilterChain ()->attach ( $this->StripTags );
        $facebook->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $facebook );

        // Informação para a coluna twitter:
        $twitter = new Input ( "twitter" );
        $twitter->setRequired ( true );
        $twitter->getFilterChain ()->attach ( $this->StringTrim );
        $twitter->getFilterChain ()->attach ( $this->StripTags );
        $twitter->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $twitter );

        // Informação para a coluna images:
        $images = new Input ( "images" );
        $images->setRequired ( true );
        $images->getFilterChain ()->attach ( $this->StringTrim );
        $images->getFilterChain ()->attach ( $this->StripTags );
        $images->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $images );
    }


}