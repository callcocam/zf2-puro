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
    protected $temp = "";
    protected $realFolder;
    protected $id;
    protected $codigo;

    /**
     * @var InputFilter
     */
    protected $inputFilter;

    public function __construct(FilesOptions $options, InputFilter $inputFilter = null) {

        $this->options = $options;
        $this->inputFilter = $inputFilter;
        $this->result = FALSE;
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
        $files = $this->options->getServicelocator()->get("Upload\Model\BsImagesTable")->findAll(FALSE);
        return $files;
    }

    public function getInputFilter() {
        if (!isset($this->inputFilter)) {
            $this->setInputFilter(new \Upload\Form\FilesInputFilter($this->options));
        }
        return $this->inputFilter;
    }

    public function persistFiles(array $files, array $data = array()) {
        $path = $this->options->getBasePath();
        foreach ($files as $file) {
            if (array_search($file['type'], $this->options->getFileAccept())):
                $this->options->setMimetype($this->options->getFileAccept());
                $type = "files";
            elseif (array_search($file['type'], $this->options->getMidiaAccept())):
                $this->options->setMimetype($this->options->getMidiaAccept());
                $type = "midias";
            else:
                $this->options->setMimetype($this->options->getImageAccept());
                $type = "images";
            endif;
            $file['name'] = $this->options->setFileName($file['name']);
            $this->options->CheckFolder($type);
            $filter = clone $this->getInputFilter();
            $filter->setData([\Upload\Form\FilesInputFilter::FILE => $file]);
            try {
                if (!$filter->isValid()) {
                    $this->setMessages($filter->getMessages());
                    return self::CODE_ERROR;
                }
                $filter->getValues();
                $table = $this->options->getServicelocator()->get("Upload\Model\BsImagesTable");
                $model = $this->options->getServicelocator()->get("Upload\Model\BsImages");
                $data['title'] = sprintf("%s%s", $this->options->getSend(), $file['name']);
                $data['alias'] = $this->options->getBasePath();
                $data['extension'] = str_replace('.', '', strrchr($file['name'], '.'));
                $data['size'] = $file['size'];
                $data['mimetype'] = $file['type'];


                $model->exchangeArray($data);
                if (isset($data['id']) && (int) $data['id']):
                    $table->update($model);
                else:
                    $table->insert($model);
                    $model->setId($table->getLastInsert()->getId());
                endif;

                $this->setData($model->toArray());
            } catch (InvalidArgumentException $e) {
                $this->setMessages($e->getMessage());
                return self::CODE_ERROR;
            }
            $this->options->setBasePath($path);
        }
        $this->setMessages("ARQUIVOS ENVIADO COM SUCESSO!");
        $this->result = TRUE;
        return self::CODE_SUCCESS;
    }

    public function persistFile(array $file, array $data = array()) {

        if (array_search($file['type'], $this->options->getFileAccept())):
            $this->options->setMimetype($this->options->getFileAccept());
            $type = "files";
        elseif (array_search($file['type'], $this->options->getMidiaAccept())):
            $this->options->setMimetype($this->options->getMidiaAccept());
            $type = "midias";
        else:
            $this->options->setMimetype($this->options->getImageAccept());
            $type = "images";
        endif;
        $file['name'] = $this->options->setFileName($file['name']);
        $this->options->CheckFolder($type);
        $filter = clone $this->getInputFilter();
        $filter->setData([\Upload\Form\FilesInputFilter::FILE => $file]);
        try {
            if (!$filter->isValid()) {
                $this->setMessages($filter->getMessages());
                return self::CODE_ERROR;
            }
            $filter->getValues();
            $table = $this->options->getServicelocator()->get("Upload\Model\BsImagesTable");
            $model = $this->options->getServicelocator()->get("Upload\Model\BsImages");
            $data['title'] = sprintf("%s%s", $this->options->getSend(), $file['name']);
            $data['alias'] = $this->options->getBasePath();
            $data['extension'] = str_replace('.', '', strrchr($file['name'], '.'));
            $data['size'] = $file['size'];
            $data['mimetype'] = $file['type'];
            $model->exchangeArray($data);
            if (isset($data['id']) && (int) $data['id']):
                $table->update($model);
            else:
                $table->insert($model);
                $model->setId($table->getLastInsert()->getId());
                $this->id = $table->getLastInsert()->getId();
                $this->codigo = $table->getLastInsert()->getCodigo();
            endif;

            $this->setData($model->toArray());
        } catch (InvalidArgumentException $e) {
            $this->setMessages($e->getMessage());
            return self::CODE_ERROR;
        }
        $this->setMessages("ARQUIVO ENVIADO COM SUCESSO!");
        $this->result = TRUE;
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

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }
    public function getOptions() {
        return $this->options;
    }



}
