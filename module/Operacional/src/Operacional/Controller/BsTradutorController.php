<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */
namespace Operacional\Controller;

/**
 * Description of BsTradutorController
 *
 * @author Call
 */
class BsTradutorController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "operacional/default";
        $this->controller = "bs-tradutor";
        $this->action = "index";
        $this->model = "Operacional\Model\BsTradutor";
        $this->table = "Operacional\Model\BsTradutorTable";
        $this->form="Operacional\Form\BsTradutorForm";
        $this->template = "/admin/admin/listar";
    }


    public function testeAction()
    {
    	$ler=$this->getTableGateway()->findBy(['state'=>0]);
    	foreach ($ler as $key => $value) {
			$mystring = $value->getTitle();
			$desc=$value->getDescription();
			$findme   = '_LABEL';
			$pos = strpos($mystring, $findme);

			// Note our use of ===.  Simply == would not work as expected
			// because the position of 'a' was the 0th (first) character.
			if ($pos === false) {
			echo "The string '$findme' was not found in the string '$mystring' - $desc<p>";
			} else {
			// echo "The string '$findme' was found in the string '$mystring'<p>";
			// echo " and exists at position $pos";
			}
    		// if(empty($value->getPlaceholder()))
    		// {

    		// 	$value->setPlaceholder($value->getDescription());

    		// }
    		// if(empty($value->getDicaTela()))
    		// {
    		// 	$value->setDicaTela($value->getDescription());
    		// 	//$this->getTableGateway()->update($value);
    		// }
    		//var_dump($value);
    	}
    	
    	die();
    }

}