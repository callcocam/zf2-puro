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
class BsContasReceberFilter extends AbstractFilter
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
        
          // Informação para a coluna valor:
        $valor= new Input ( "valor" );
        $valor->setRequired ( true );
        $valor->getFilterChain ()->attach ( $this->StringTrim );
        $valor->getFilterChain ()->attach ( $this->StripTags );
        $valor->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $valor);

        // Informação para a coluna description:
        $description = new Input ( "description" );
        $description->setRequired ( false);
        $description->getFilterChain ()->attach ( $this->StringTrim );
        //$description->getFilterChain ()->attach ( $this->StripTags );
        //$description->getValidatorChain()->attach($this->emptyfilter);
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
        $alias->setRequired ( false);
        $alias->getFilterChain ()->attach ( $this->StringTrim );
        $alias->getFilterChain ()->attach ( $this->StripTags );
        //$alias->getValidatorChain()->attach($this->emptyfilter);
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

        // Informação para a coluna caixa_id:
        $caixa_id = new Input ( "caixa_id" );
        $caixa_id->setRequired ( true );
        $caixa_id->getFilterChain ()->attach ( $this->StringTrim );
        $caixa_id->getFilterChain ()->attach ( $this->StripTags );
        $caixa_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $caixa_id );

        // Informação para a coluna situacao:
        $situacao = new Input ( "situacao" );
        $situacao->setRequired ( true );
        $situacao->getFilterChain ()->attach ( $this->StringTrim );
        $situacao->getFilterChain ()->attach ( $this->StripTags );
        $situacao->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $situacao );

        // Informação para a coluna repete:
        $repete = new Input ( "repete" );
        $repete->setRequired ( false);
        $repete->getFilterChain ()->attach ( $this->StringTrim );
        $repete->getFilterChain ()->attach ( $this->StripTags );
        //$repete->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $repete );

        // Informação para a coluna periodos:
        $periodos = new Input ( 'periodos');
        $periodos->setRequired ( false );
        $periodos->getFilterChain ()->attach ( $this->StringTrim );
        $periodos->getFilterChain ()->attach ( $this->StripTags );
        //$periodos->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $periodos );

        // Informação para a coluna qtdade:
        $qtdade = new Input ( "qtdade" );
        $qtdade->setRequired ( false);
        $qtdade->getFilterChain ()->attach ( $this->StringTrim );
        $qtdade->getFilterChain ()->attach ( $this->StripTags );
       // $qtdade->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $qtdade );

        // Informação para a coluna conta_id:
        $conta_id = new Input ( "conta_id" );
        $conta_id->setRequired ( true );
        $conta_id->getFilterChain ()->attach ( $this->StringTrim );
        $conta_id->getFilterChain ()->attach ( $this->StripTags );
        $conta_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $conta_id );

        // Informação para a coluna plano_conta_id:
        $plano_conta_id = new Input ( "plano_conta_id" );
        $plano_conta_id->setRequired ( true );
        $plano_conta_id->getFilterChain ()->attach ( $this->StringTrim );
        $plano_conta_id->getFilterChain ()->attach ( $this->StripTags );
        $plano_conta_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $plano_conta_id );

        // Informação para a coluna centro_custo_id:
        $centro_custo_id = new Input ( "centro_custo_id" );
        $centro_custo_id->setRequired ( false);
        $centro_custo_id->getFilterChain ()->attach ( $this->StringTrim );
        $centro_custo_id->getFilterChain ()->attach ( $this->StripTags );
        //$centro_custo_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $centro_custo_id );

        // Informação para a coluna cliente_id:
        $cliente_id = new Input ( "cliente_id" );
        $cliente_id->setRequired ( false);
        $cliente_id->getFilterChain ()->attach ( $this->StringTrim );
        $cliente_id->getFilterChain ()->attach ( $this->StripTags );
        //$cliente_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cliente_id );

        // Informação para a coluna fpgto_id:
        $fpgto_id = new Input ( "fpgto_id" );
        $fpgto_id->setRequired ( false);
        $fpgto_id->getFilterChain ()->attach ( $this->StringTrim );
        $fpgto_id->getFilterChain ()->attach ( $this->StripTags );
        //$fpgto_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $fpgto_id );

        // Informação para a coluna tipo_documento:
        $tipo_documento = new Input ( "tipo_documento" );
        $tipo_documento->setRequired ( false);
        $tipo_documento->getFilterChain ()->attach ( $this->StringTrim );
        $tipo_documento->getFilterChain ()->attach ( $this->StripTags );
       // $tipo_documento->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $tipo_documento );

        // Informação para a coluna num_documento:
        $num_documento = new Input ( "num_documento" );
        $num_documento->setRequired ( false);
        $num_documento->getFilterChain ()->attach ( $this->StringTrim );
        $num_documento->getFilterChain ()->attach ( $this->StripTags );
       // $num_documento->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $num_documento );
    }


}