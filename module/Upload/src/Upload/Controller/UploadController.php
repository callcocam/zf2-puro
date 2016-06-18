<?php

namespace Upload\Controller;

use Upload\Files\FilesServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @author ALejandro Celaya Alastrué
 * @link http://www.alejandrocelaya.com
 */
class UploadController extends AbstractActionController {

    /**
     * @var FilesServiceInterface
     */
    protected $filesService;

    public function __construct(FilesServiceInterface $filesService) {
        $this->filesService = $filesService;
    }

    public function indexAction() {
        $model = new ViewModel([
            'files' => $this->filesService->getFiles()
        ]);
        return $model;
    }

    public function fooAction() {
        $model = new ViewModel([
            'files' => $this->filesService->getFiles()
        ]);
        return $model;
    }

    public function uploadsAction() {
        //$data =  array_merge_recursive($this->params()->fromFiles('files'),$this->params()->fromPost());
        $files =  $this->params()->fromFiles('files');
        $code = $this->filesService->persistFiles($files);
        return new JsonModel(['result' => $files, 'acao' => "", 'codigo' => "0", 'id' => "", 'class' => $code,
            'msg' => $this->filesService->getMessages(), 'data' => $files,
            'code' => $code
        ]);
    }

    public function uploadAction() {
       //$data =  array_merge_recursive($this->params()->fromFiles('files'),$this->params()->fromPost());
        $file =  $this->params()->fromFiles('files');
        $code = $this->filesService->persistFile($file);
        return new JsonModel(['result' => $this->filesService->getResult(), 'acao' => "", 'codigo' => "0", 'id' => "", 'class' => $code,
            'msg' => $this->filesService->getMessages(), 'data' => $this->filesService->getData(),
            'code' => $code
        ]);
    }

    public function listAction() {
        /** @var Http\Request $request */
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            $model = new ViewModel([
                'files' => $this->filesService->getFiles()
            ]);
            $model->setTerminal(true);
            return $model;
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

}
