<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class BsCategoriasController extends AbstractController
{
	public function __construct()
	{
		$this->route="admin/default";
		$this->controller="bs-categorias";
		$this->action="index";
		$this->model="Admin\Model\BsCategorias";
		$this->table="Admin\Model\BsCategoriasTable";
		$this->template="/admin/admin/listar";
	}
	public function editarAction()
	{
		$this->template="/admin/admin/editar-categoria";
		return parent::editarAction();
	}
}
