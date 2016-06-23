<?php

namespace ZenCode\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * UpdateFilter [UpdateFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
class UpdateFilter extends InputFilter {
    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $emptyfilter = new NotEmpty ();
        $emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $StripTags = new StripTags ();
        $StringTrim = new StringTrim ();

        // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(true);
        $description->getFilterChain()->attach($StringTrim);
        $description->getFilterChain()->attach($StripTags);
        $description->getValidatorChain()->attach($emptyfilter);
        $this->add($description);

        // Informação para a coluna caminho:
        $caminho = new Input("caminho");
        $caminho->setRequired(true);
        $caminho->getFilterChain()->attach($StringTrim);
        $caminho->getFilterChain()->attach($StripTags);
        $caminho->getValidatorChain()->attach($emptyfilter);
        $this->add($caminho);
    }

}
