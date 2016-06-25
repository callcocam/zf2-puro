<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Operacional\Model;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsElements extends AbstractModel
{

    protected $module_id = '';

    protected $type = '';

    protected $name = '';

    protected $label = '';

    protected $class = '';

    protected $placeholder = '';

    protected $rows = '';

    protected $cols = '';

    protected $valor_padrao = '';

    protected $value_options = '';

    protected $requerid = '';

    protected $readonly = '';

    protected $multiple = '';

    protected $position = '';

    /**
     * get module_id
     *
     * @return int
     */
    public function getModuleId()
    {
        return $this->module_id;
    }

    /**
     * get type
     *
     * @return varchar
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * get name
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * get label
     *
     * @return varchar
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * get class
     *
     * @return varchar
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * get placeholder
     *
     * @return varchar
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * get rows
     *
     * @return varchar
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * get cols
     *
     * @return varchar
     */
    public function getCols()
    {
        return $this->cols;
    }

    /**
     * get valor_padrao
     *
     * @return varchar
     */
    public function getValorPadrao()
    {
        return $this->valor_padrao;
    }

    /**
     * get value_options
     *
     * @return varchar
     */
    public function getValueOptions()
    {
        return $this->value_options;
    }

    /**
     * get requerid
     *
     * @return int
     */
    public function getRequerid()
    {
        return $this->requerid;
    }

    /**
     * get readonly
     *
     * @return int
     */
    public function getReadonly()
    {
        return $this->readonly;
    }

    /**
     * get multiple
     *
     * @return tinyint
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * get position
     *
     * @return varchar
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * set module_id
     *
     * @return int
     */
    public function setModuleId($module_id = '0000000000')
    {
        $this->module_id=$module_id;
        return $this;
    }

    /**
     * set type
     *
     * @return varchar
     */
    public function setType($type = 'text')
    {
        $this->type=$type;
        return $this;
    }

    /**
     * set name
     *
     * @return varchar
     */
    public function setName($name = null)
    {
        $this->name=$name;
        return $this;
    }

    /**
     * set label
     *
     * @return varchar
     */
    public function setLabel($label = null)
    {
        $this->label=$label;
        return $this;
    }

    /**
     * set class
     *
     * @return varchar
     */
    public function setClass($class = null)
    {
        $this->class=$class;
        return $this;
    }

    /**
     * set placeholder
     *
     * @return varchar
     */
    public function setPlaceholder($placeholder = null)
    {
        $this->placeholder=$placeholder;
        return $this;
    }

    /**
     * set rows
     *
     * @return varchar
     */
    public function setRows($rows = null)
    {
        $this->rows=$rows;
        return $this;
    }

    /**
     * set cols
     *
     * @return varchar
     */
    public function setCols($cols = null)
    {
        $this->cols=$cols;
        return $this;
    }

    /**
     * set valor_padrao
     *
     * @return varchar
     */
    public function setValorPadrao($valor_padrao = null)
    {
        $this->valor_padrao=$valor_padrao;
        return $this;
    }

    /**
     * set value_options
     *
     * @return varchar
     */
    public function setValueOptions($value_options = null)
    {
        $this->value_options=$value_options;
        return $this;
    }

    /**
     * set requerid
     *
     * @return int
     */
    public function setRequerid($requerid = null)
    {
        $this->requerid=$requerid;
        return $this;
    }

    /**
     * set readonly
     *
     * @return int
     */
    public function setReadonly($readonly = null)
    {
        $this->readonly=$readonly;
        return $this;
    }

    /**
     * set multiple
     *
     * @return tinyint
     */
    public function setMultiple($multiple = null)
    {
        $this->multiple=$multiple;
        return $this;
    }

    /**
     * set position
     *
     * @return varchar
     */
    public function setPosition($position = 'geral')
    {
        $this->position=$position;
        return $this;
    }


}

