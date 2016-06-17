<?php

namespace Upload\Files;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Filter\Exception\InvalidArgumentException;

/**
 * Class FilesService
 * @author Alejandro Celaya Alastrué
 * @link http://www.alejandrocelaya.com
 */
class FilesService implements FilesServiceInterface, InputFilterAwareInterface {

    /**
     * @var FilesOptions
     */
    protected $options;
    protected $messages;
    protected $data;
    protected $result;

    /**
     * @var InputFilter
     */
    protected $inputFilter;

    public function __construct(FilesOptions $options, InputFilter $inputFilter = null) {

        $this->options = $options;
        $this->inputFilter = $inputFilter;
        $this->result=FALSE;
    }

    /**
     * @param \SplFileInfo $file
     * @return bool
     */
    public function isFileHidden(\SplFileInfo $file) {
        $basename = $file->getBasename();
        return strpos($basename, '.') === 0;
    }

    public function getFiles() {
        $iterator = new \DirectoryIterator($this->options->getBasePath());
        $files = [];
        /** @var \SplFileInfo $file */
        foreach ($iterator as $file) {
            $file = $file->getFileInfo();
            if ($file->isDir() || $this->isFileHidden($file)) {
                continue;
            }

            $files[] = $file;
        }
        return $files;
    }

    public function getInputFilter() {
        if (!isset($this->inputFilter)) {
            $this->setInputFilter(new \Upload\Form\FilesInputFilter($this->options));
        }

        return $this->inputFilter;
    }

    public function persistFiles(array $files) {
        
        foreach ($files as $file) {
            $filter = clone $this->getInputFilter();
            $filter->setData([\Upload\Form\FilesInputFilter::FILE => $file]);
            try {
                if (!$filter->isValid()) {
                    $this->setMessages($filter->getMessages());
                    return self::CODE_ERROR;
                }
                $this->setData($filter->getValues());
            } catch (InvalidArgumentException $e) {
                $this->setMessages($e->getMessage());
                return self::CODE_ERROR;
            }
        }
        $this->result=TRUE;
        return self::CODE_SUCCESS;
    }

    public function persistFile(array $file) {

        $filter = clone $this->getInputFilter();
        $filter->setData([\Upload\Form\FilesInputFilter::FILE => $file]);
        try {
            if (!$filter->isValid()) {
                $this->setMessages($filter->getMessages());
                return self::CODE_ERROR;
            }
            $this->setData($filter->getValues());
        } catch (InvalidArgumentException $e) {
            $this->setMessages($e->getMessage());
            return self::CODE_ERROR;
        }
        $this->result=TRUE;
        return self::CODE_SUCCESS;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        $this->inputFilter = $inputFilter;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function getResult() {
        return $this->result;
    }

    public function getMessages() {
        return $this->messages;
    }

    public function setMessages($mgs) {
        $this->messages = $mgs;
        return $this;
    }

}
