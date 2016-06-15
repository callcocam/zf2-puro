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
class DropColumnFilter extends InputFilter {
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
    }

}
