<?php

namespace Ddl\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * ColumnFilter [ColumnFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
class ColumnFilter extends InputFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $emptyfilter = new NotEmpty ();
        $emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $StripTags = new StripTags ();
        $StringTrim = new StringTrim ();

         // Informação para a coluna tabela:
        $tabela = new Input("tabela");
        $tabela->setRequired(true);
        $tabela->getFilterChain()->attach($StringTrim);
        $tabela->getFilterChain()->attach($StripTags);
        $tabela->getValidatorChain()->attach($emptyfilter);
        $this->add($tabela);

         // Informação para a coluna name:
        $name = new Input("name");
        $name->setRequired(true);
        $name->getFilterChain()->attach($StringTrim);
        $name->getFilterChain()->attach($StripTags);
        $name->getValidatorChain()->attach($emptyfilter);
        $this->add($name);
        
         // Informação para a coluna type:
        $type = new Input("type");
        $type->setRequired(true);
        $type->getFilterChain()->attach($StringTrim);
        $type->getFilterChain()->attach($StripTags);
        $type->getValidatorChain()->attach($emptyfilter);
        $this->add($type);
               
        
         // Informação para a coluna length:
        $length = new Input("length");
        $length->setRequired(false);
        $length->getFilterChain()->attach($StringTrim);
        //$length->getFilterChain()->attach($StripTags);
        //$length->getValidatorChain()->attach($emptyfilter);
        $this->add($length);
        
        
         // Informação para a coluna nullable:
        $nullable = new Input("nullable");
        $nullable->setRequired(false);
        $nullable->getFilterChain()->attach($StringTrim);
        //$nullable->getFilterChain()->attach($StripTags);
        //$nullable->getValidatorChain()->attach($emptyfilter);
        $this->add($nullable);
        
        
         // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(false);
        $description->getFilterChain()->attach($StringTrim);
        //$description->getFilterChain()->attach($StripTags);
        //$description->getValidatorChain()->attach($emptyfilter);
        $this->add($description);
        
         // Informação para a coluna default:
        $default = new Input("default");
        $default->setRequired(true);
        $default->getFilterChain()->attach($StringTrim);
        $default->getFilterChain()->attach($StripTags);
        $default->getValidatorChain()->attach($emptyfilter);
        $this->add($default);
        
        
         // Informação para a coluna auto_increment:
        $auto_increment = new Input("auto_increment");
        $auto_increment->setRequired(false);
        $auto_increment->getFilterChain()->attach($StringTrim);
        //$auto_increment->getFilterChain()->attach($StripTags);
        //$auto_increment->getValidatorChain()->attach($emptyfilter);
        $this->add($auto_increment);
        
        


        
    }

}
