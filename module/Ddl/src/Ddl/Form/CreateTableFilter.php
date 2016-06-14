<?php
namespace Ddl\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * CreateTableFilter [CreateTableFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
class CreateTableFilter extends InputFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $emptyfilter = new NotEmpty ();
        $emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $StripTags = new StripTags ();
        $StringTrim = new StringTrim ();

        // Informação para a coluna title:
        $title = new Input("title");
        $title->setRequired(true);
        $title->getFilterChain()->attach($StringTrim);
        $title->getFilterChain()->attach($StripTags);
        $title->getValidatorChain()->attach($emptyfilter);
        $this->add($title);
    }

}
