<?php
namespace Ddl\Model;
/**
 * Blob [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class Blob extends \Zend\Db\Sql\Ddl\Column\Blob {
    
    public function __construct($name, $length = null, $nullable = false, $default = null, $options = array()) {
        $this->setLength($length);
        parent::__construct($name, $length, $nullable, $default, $options);
    }

}
