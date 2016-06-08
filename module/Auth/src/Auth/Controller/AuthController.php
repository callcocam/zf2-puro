<?php
/**
 * Zend Framework (http://framework.zend.com/)
 * sigasmart.com.br
 */

namespace Auth\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractController
{
	public function __construct()
	{
		$this->route="auth/default";
		$this->controller="auth";
		$this->action="index";
		$this->model="Auth\Model\BsUsers";
		$this->table="Auth\Model\BsUsersTable";
		$this->template="/auth/auth/listar";
	}

}
