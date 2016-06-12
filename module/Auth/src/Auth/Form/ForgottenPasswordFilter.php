<?php

namespace Auth\Form;

use Zend\InputFilter\InputFilter;

class ForgottenPasswordFilter  extends \Base\Form\AbstractFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator=null) {
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
        $validator = $this->RecordExiste('bs_users', 'email',"E-Mail não foi encontrado");
         // Informação para a coluna email:
        $email = new \Zend\InputFilter\Input("email");
        $email->setRequired(true);
        $email->getFilterChain()->attach($this->StringTrim);
        $email->getFilterChain()->attach($this->StripTags);
        $email->getValidatorChain()->attach($this->emptyfilter);
        $email->getValidatorChain()->attach($this->emailfilter);
        $email->getValidatorChain()->attach($validator);
        $this->add($email);
    }

}
