<?php

namespace Auth\Form;

use Zend\InputFilter\InputFilter;

class ForgottenPasswordFilter extends InputFilter {

    public function __construct($sm) {
        $emptyfilter = new \Zend\Validator\NotEmpty ();
        $emailfilter = new \Zend\Validator\EmailAddress ();
        $emptyfilter->setMessage("Campo Obrigatorio.", \Zend\Validator\NotEmpty::IS_EMPTY);
        $emailfilter->setMessage("O Formato Do Email Não E valido", \Zend\Validator\EmailAddress::INVALID_FORMAT);
        $StripTags = new \Zend\Filter\StripTags ();
        $StringTrim = new \Zend\Filter\StringTrim ();
        $validator = new \Zend\Validator\Db\RecordExists(array(
            'table' => 'bs_users',
            'field' => 'email',
            'adapter' => $sm->get('Zend\Db\Adapter\Adapter')
        ));
        $validator->setMessage("E-Mail não foi encontrado", 'noRecordFound');
        // Informação para a coluna email:
        $email = new \Zend\InputFilter\Input("email");
        $email->setRequired(true);
        $email->getFilterChain()->attach($StringTrim);
        $email->getFilterChain()->attach($StripTags);
        $email->getValidatorChain()->attach($emptyfilter);
        $email->getValidatorChain()->attach($emailfilter);
        $email->getValidatorChain()->attach($validator);

        $this->add($email);
    }

}
