<?php

namespace Base\MetaData;

/**
 * Metadata
 */
class Table {

    protected $metadata;
    protected $name;
    protected $columns;
    protected $constraints;
    protected $tablenames;

    public function __construct(\Zend\Db\Adapter\Adapter $adapter) {
        $this->metadata = new \Zend\Db\Metadata\Metadata($adapter);
        $this->setTablenames($this->metadata->getTableNames());
    }

    public function getMetadata() {
        return $this->metadata;
    }

    public function getName() {
        return $this->name;
    }

    public function getColumns() {
        return $this->columns;
    }

    public function getConstraints() {
        return $this->constraints;
    }

    public function getTablenames() {
        return $this->tablenames;
    }

    public function setName($name) {
        $this->name = $this->metadata->getTable($name);
        return $this;
    }

    public function setColumns($tableName) {
        $table = $this->metadata->getTable($tableName);
        foreach ($table->getColumns() as $column):
            $this->columns[$column->getName()] = [
                'name' => $column->getName(),
                'schemaName' => $column->getSchemaName(),
                'ordinalPosition' => $column->getOrdinalPosition(),
                'columnDefault' => $column->getColumnDefault(),
                'isNullable' => $column->getIsNullable(),
                'dataType' => $column->getDataType(),
                'characterMaximumLength' => $column->getCharacterMaximumLength(),
                'characterOctetLength' => $column->getName(),
                'numericPrecision' => $column->getCharacterOctetLength(),
                'numericScale' => $column->getNumericScale(),
                'numericUnsigned' => $column->getNumericUnsigned()
            ];
        endforeach;
        $this->setConstraints($tableName);
        return $this;
    }

    public function setConstraints($tableName) {
        $pkCols = [];
        $fkCols = [];
        foreach ($this->metadata->getConstraints($tableName) as $constraint) {
            $pkCols[] = [$constraint->getName(), $constraint->getType()];
            if (!$constraint->hasColumns()) {
                continue;
            }
            if ($constraint->isForeignKey()) {
                $fkCols = array();
                foreach ($constraint->getReferencedColumns() as $refColumn) {
                    $fkCols[] = ['ref' => $constraint->getReferencedTableName(), 'column' => $refColumn];
                }
            }
        }
        $this->constraints['pk'] = $pkCols;
        $this->constraints['fkCols'] = $fkCols;
        return $this;
    }

    public function setTablenames($tablenames) {
        $this->tablenames = $tablenames;
        return $this;
    }

}
