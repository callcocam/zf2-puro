<?php 
namespace Base\Form;
/**
* FileFilter
*/
use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\FileInput;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;

class FilesFilter
{
    protected $input;
    public function __construct(FilesOptions $options,$file="attachment")
	{
		$this->input = new FileInput($file);
		$this->input->getValidatorChain()->attach(new Size(['max' => $options->getMaxSize(), 'messageTemplates' => [
		Size::TOO_BIG => 'O arquivo fornecido é maior que o tamanho de arquivo permitido',
		Size::TOO_SMALL => 'O arquivo fornecido é muito pequeno',
		Size::NOT_FOUND => 'O arquivo não pode ser encontrado']]));

		$mimetype = new MimeType();
		$mimetype->setMessages(array(
		MimeType::FALSE_TYPE => 'Este arquivo não é um tipo permitido',
		MimeType::NOT_DETECTED => 'O tipo de arquivo não foi detectado',
		MimeType::NOT_READABLE => 'O tipo de arquivo não era legível',
		));
                $mimetype->setMimeType($options->getMimetype());
		$this->input->getValidatorChain()->attach($mimetype);
		$renameUpload = new RenameUpload([
		'overwrite' => $options->getOverwrite(),
		'use_upload_name' => $options->getUseUploadName(),
		'use_upload_extension' => $options->getUseUploadExtension(),
		'randomize'=>$options->getUseUploadExtension(),
		'target' => $options->getBasePath()
		]);
		$this->input->getFilterChain()->attach($renameUpload);
		
	}
        public function getInput() {
            return $this->input;
        }


}