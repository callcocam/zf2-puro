<?php

namespace Base\Form;

/**
 * AbstractFilter [AbstractFilter]
 *
 * @copyright (c) year, Claudio Coelho
 */
abstract class AbstractFilter extends \Zend\InputFilter\InputFilter {

    protected $inputFilter;
    protected $emptyfilter;
    protected $emailfilter;
    protected $identca;
    protected $StripTags;
    protected $StringTrim;
    protected $serviceLocator;
    public $data;

    /**
     * @return Zend\InputFilter
     */
    abstract function __construct($serviceLocator = null);

    public function RecordExiste($table, $fild, $exclude = "", $recordFound = "Registro Ja Existe", $noRecordFound = "Registro Não Existe") {
        $validator = new \Zend\Validator\Db\RecordExists(array(
            'table' => $table,
            'field' => $fild,
            'adapter' => $this->serviceLocator->get('Zend\Db\Adapter\Adapter')
        ));
        if (!empty($exclude)):
            $validator->setExclude($exclude);
        endif;
        $validator->setMessage($noRecordFound, 'noRecordFound');
        $validator->setMessage($recordFound, 'recordFound');
        return $validator;
    }
    
    public function NoRecordExiste($table, $fild, $exclude = "", $recordFound = "Registro Ja Existe", $noRecordFound = "Registro Não Existe") {
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $table,
            'field' => $fild,
            'adapter' => $this->serviceLocator->get('Zend\Db\Adapter\Adapter')
        ));
        
        if (!empty($exclude)):
            $validator->setExclude($exclude);
        endif;
        $validator->setMessage($noRecordFound, 'noRecordFound');
        $validator->setMessage($recordFound, 'recordFound');
        return $validator;
    }

}
