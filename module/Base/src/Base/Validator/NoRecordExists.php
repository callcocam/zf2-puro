<?php

namespace Base\Validator;

/**
 * NoRecordExist [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class NoRecordExists extends \Zend\Validator\Db\NoRecordExists {

    public function isValid($value, $context = array()) {

        $exclude = $this->getExclude();
        if (is_array($exclude)) {
            if (array_key_exists('formvalue', $exclude)) {
                $formvalue = $exclude['formvalue'];
                $exclude['value'] = $context[$formvalue];
                $this->setExclude($exclude);
            }
        }
        return parent::isValid($value);
    }

}
