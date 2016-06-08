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

class BsUsersController extends AbstractController
{
	public function __construct()
	{
		$this->route="admin/default";
		$this->controller="bs-users";
		$this->action="index";
		$this->model="Admin\Model\BsUsers";
		$this->table="Admin\Model\BsUsersTable";
		$this->template="/admin/admin/listar";
	}

	public function editarAction()
	{
		$this->template="/admin/admin/editar";
		return parent::editarAction();
	}
}
