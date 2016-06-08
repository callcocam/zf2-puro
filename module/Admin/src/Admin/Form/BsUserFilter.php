<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * Description of BsUserFilter
 *
 * @author Ale
 */
class BsUserFilter extends InputFilter {

    public function __construct() {
        $inputFilter = new InputFilter ();
        $emptyfilter = new NotEmpty ();
        $emailfilter = new EmailAddress ();
        $identca = new Identical ();
        $emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);
        $identca->setToken("password");
        $identca->setMessage("O Campo Repita Senha de ser Igual Ao campo Senha", Identical::MISSING_TOKEN);
        $StripTags = new StripTags ();
        $StringTrim = new StringTrim ();
    }

}
