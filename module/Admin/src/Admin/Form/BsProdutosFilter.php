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
class BsProdutosFilter extends AbstractFilter
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

        // Informação para a coluna barra:
        $barra = new Input ( "barra" );
        $barra->setRequired ( false);
        $barra->getFilterChain ()->attach ( $this->StringTrim );
        $barra->getFilterChain ()->attach ( $this->StripTags );
        //$barra->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $barra );

        // Informação para a coluna tipo:
        $tipo = new Input ( "tipo" );
        $tipo->setRequired ( true );
        $tipo->getFilterChain ()->attach ( $this->StringTrim );
        $tipo->getFilterChain ()->attach ( $this->StripTags );
        $tipo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $tipo );

        // Informação para a coluna subtitle:
        $subtitle = new Input ( "subtitle" );
        $subtitle->setRequired ( false);
        $subtitle->getFilterChain ()->attach ( $this->StringTrim );
        $subtitle->getFilterChain ()->attach ( $this->StripTags );
        //$subtitle->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $subtitle );

        // Informação para a coluna cat_id:
        $cat_id = new Input ( "cat_id" );
        $cat_id->setRequired ( true );
        $cat_id->getFilterChain ()->attach ( $this->StringTrim );
        $cat_id->getFilterChain ()->attach ( $this->StripTags );
        $cat_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cat_id );

        // Informação para a coluna marca_id:
        $marca_id = new Input ( "marca_id" );
        $marca_id->setRequired ( true );
        $marca_id->getFilterChain ()->attach ( $this->StringTrim );
        $marca_id->getFilterChain ()->attach ( $this->StripTags );
        $marca_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $marca_id );

        // Informação para a coluna clfiscal:
        $clfiscal = new Input ( "clfiscal" );
        $clfiscal->setRequired ( false);
        $clfiscal->getFilterChain ()->attach ( $this->StringTrim );
        $clfiscal->getFilterChain ()->attach ( $this->StripTags );
        //$clfiscal->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $clfiscal );

        // Informação para a coluna ecfop:
        $ecfop = new Input ( "ecfop" );
        $ecfop->setRequired ( false);
        $ecfop->getFilterChain ()->attach ( $this->StringTrim );
        $ecfop->getFilterChain ()->attach ( $this->StripTags );
       //$ecfop->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $ecfop );

        // Informação para a coluna scfop:
        $scfop = new Input ( "scfop" );
        $scfop->setRequired ( false);
        $scfop->getFilterChain ()->attach ( $this->StringTrim );
        $scfop->getFilterChain ()->attach ( $this->StripTags );
        //$scfop->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $scfop );

        // Informação para a coluna cst:
        $cst = new Input ( "cst" );
        $cst->setRequired ( false);
        $cst->getFilterChain ()->attach ( $this->StringTrim );
        $cst->getFilterChain ()->attach ( $this->StripTags );
        //$cst->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $cst );

        // Informação para a coluna unidade_trib:
        $unidade_trib = new Input ( "unidade_trib" );
        $unidade_trib->setRequired ( true );
        $unidade_trib->getFilterChain ()->attach ( $this->StringTrim );
        $unidade_trib->getFilterChain ()->attach ( $this->StripTags );
        $unidade_trib->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $unidade_trib );

        // Informação para a coluna pago:
        $pago = new Input ( "pago" );
        $pago->setRequired ( true );
        $pago->getFilterChain ()->attach ( $this->StringTrim );
        $pago->getFilterChain ()->attach ( $this->StripTags );
        $pago->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $pago );

        // Informação para a coluna marge_lucro:
        $marge_lucro = new Input ( "marge_lucro" );
        $marge_lucro->setRequired ( true );
        $marge_lucro->getFilterChain ()->attach ( $this->StringTrim );
        $marge_lucro->getFilterChain ()->attach ( $this->StripTags );
        $marge_lucro->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $marge_lucro );

        // Informação para a coluna valor:
        $valor = new Input ( "valor" );
        $valor->setRequired ( true );
        $valor->getFilterChain ()->attach ( $this->StringTrim );
        $valor->getFilterChain ()->attach ( $this->StripTags );
        $valor->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $valor );

        // Informação para a coluna estoque:
        $estoque = new Input ( "estoque" );
        $estoque->setRequired ( true );
        $estoque->getFilterChain ()->attach ( $this->StringTrim );
        $estoque->getFilterChain ()->attach ( $this->StripTags );
        $estoque->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $estoque );

        // Informação para a coluna estoque_minimo:
        $estoque_minimo = new Input ( "estoque_minimo" );
        $estoque_minimo->setRequired ( true );
        $estoque_minimo->getFilterChain ()->attach ( $this->StringTrim );
        $estoque_minimo->getFilterChain ()->attach ( $this->StripTags );
        $estoque_minimo->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $estoque_minimo );

        // Informação para a coluna images:
        $images = new Input ( "images" );
        $images->setRequired ( false);
        $images->getFilterChain ()->attach ( $this->StringTrim );
        $images->getFilterChain ()->attach ( $this->StripTags );
        //$images->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $images );

        // Informação para a coluna dim_width:
        $dim_width = new Input ( "dim_width" );
        $dim_width->setRequired ( false);
        $dim_width->getFilterChain ()->attach ( $this->StringTrim );
        $dim_width->getFilterChain ()->attach ( $this->StripTags );
        //$dim_width->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $dim_width );

        // Informação para a coluna dim_heigth:
        $dim_heigth = new Input ( "dim_heigth" );
        $dim_heigth->setRequired ( false);
        $dim_heigth->getFilterChain ()->attach ( $this->StringTrim );
        $dim_heigth->getFilterChain ()->attach ( $this->StripTags );
        //$dim_heigth->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $dim_heigth );

        // Informação para a coluna dim_depth:
        $dim_depth = new Input ( "dim_depth" );
        $dim_depth->setRequired ( false);
        $dim_depth->getFilterChain ()->attach ( $this->StringTrim );
        $dim_depth->getFilterChain ()->attach ( $this->StripTags );
        //$dim_depth->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $dim_depth );

        // Informação para a coluna dim_weight:
        $dim_weight = new Input ( "dim_weight" );
        $dim_weight->setRequired ( false);
        $dim_weight->getFilterChain ()->attach ( $this->StringTrim );
        $dim_weight->getFilterChain ()->attach ( $this->StripTags );
        //$dim_weight->getValidatorChain()->attach($this->emptyfilter);
        $this->add ( $dim_weight );
    }


}