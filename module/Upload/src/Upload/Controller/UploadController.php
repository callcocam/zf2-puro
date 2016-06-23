<?php

namespace Upload\Controller;

use Upload\Files\FilesServiceInterface;
use Zend\Http;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @author ALejandro Celaya Alastrué
 * @link http://www.alejandrocelaya.com
 */
class UploadController extends \Base\Controller\AbstractController {

    /**
     * @var FilesServiceInterface
     */
    protected $filesService;

    public function __construct() {
        $this->route = "upload/default";
        $this->controller = "upload";
        $this->action = "index";
        $this->form = "Upload\Form\BsUploadForm";
        $this->model = "Upload\Model\BsImages";
        $this->table = "Upload\Model\BsImagesTable";
        $this->template = "upload/upload/index";
    }

    public function indexAction() {
        $this->filesService = $this->getServiceLocator()->get("Upload\Files\FilesService");
        $this->form = $this->getForm();
        $this->form->get('empresa')->setValue($this->user['empresa']);
        $this->form->get('created_by')->setValue($this->user['id']);
        $this->form->get('modified_by')->setValue($this->user['id']);
        $this->form->get('access')->setValue($this->user['role_id']);
        $model = new ViewModel([
            'files' => $this->filesService,
            'form' => $this->form
        ]);
        return $model;
    }

    public function uploadsAction() {
        if ($this->params()->fromPost()):
            $this->filesService = $this->getServiceLocator()->get("Upload\Files\FilesService");
            $data = $this->params()->fromPost();
            $files = $this->params()->fromFiles('files');
            $code = $this->filesService->persistFiles($files, $data);
            return new JsonModel(['result' => $this->filesService->getResult(), 'acao' => "", 'codigo' => $this->filesService->getCodigo(), 'id' => $this->filesService->getId(), 'class' => $code,
                'msg' => $this->filesService->getMessages(), 'data' => $this->filesService->getData(),
                'code' => $code
            ]);
        endif;
        return $this->redirect()->toRoute($this->route);
    }

    public function uploadAction() {
        if ($this->params()->fromPost()):
            $this->filesService = $this->getServiceLocator()->get("Upload\Files\FilesService");
            $data = $this->params()->fromPost();
            $file = $this->params()->fromFiles('files');
            $code = $this->filesService->persistFile($file, $data);
            return new JsonModel(['result' => $this->filesService->getResult(), 'acao' => "", 'codigo' => $this->filesService->getCodigo(), 'id' => $this->filesService->getId(), 'class' => $code,
                'msg' => $this->filesService->getMessages(), 'data' => $this->filesService->getData(),
                'code' => $code
            ]);
        endif;
        return $this->redirect()->toRoute($this->route);
    }

    public function removeAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id) {
            $files = $this->getTableGateway()->find($id);
            if ($files):
                $this->getTableGateway()->delete($id);
                if ($this->getTableGateway()->getResult()) {
                    if (file_exists(sprintf("%s%s%s%s%s", $this->getRequest()->getServer('DOCUMENT_ROOT'), DIRECTORY_SEPARATOR, 'dist', DIRECTORY_SEPARATOR, $files->getTitle()))) {
                        unlink(sprintf("%s%s%s%s%s", $this->getRequest()->getServer('DOCUMENT_ROOT'), DIRECTORY_SEPARATOR, 'dist', DIRECTORY_SEPARATOR, $files->getTitle()));
                    }
                }
                return new JsonModel(['result' => $this->getTableGateway()->getResult(), 'acao' => "", 'codigo' => "0", 'id' => "0", 'class' => $this->getTableGateway()->getClass(),
                    'msg' => $this->getTableGateway()->getError(), 'data' => $files->toArray(),
                    'code' => 'success'
                ]);
            endif;
        }
        return new JsonModel(['result' => FALSE, 'acao' => "", 'codigo' => "0", 'id' => "0", 'class' => "error",
            'msg' => 'MSG_DEFAULT_LABEL', 'data' => array(),
            'code' => 'error'
        ]);
    }

    public function listAction() {
        $this->filesService = $this->getServiceLocator()->get("Upload\Files\FilesService");
        /** @var Http\Request $request */
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            $model = new ViewModel([
                'files' => $this->filesService
            ]);
            $model->setTerminal(true);
            return $model;
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

}
