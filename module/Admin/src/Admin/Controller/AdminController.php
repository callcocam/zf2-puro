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

class AdminController extends AbstractController
{
	public function __construct()
	{
		$this->route="admin/default";
		$this->controller="admin";
		$this->action="index";
	}
}
