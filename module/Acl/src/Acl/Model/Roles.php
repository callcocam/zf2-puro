<?php 
namespace Acl\Model;
/**
* Roles
*/
class Roles
{
	/**
     * Default Role
     */
    const DEFAULT_ROLE = '5';
    /**
     * Roles 
     */
    public static $ROLES = array('1' => "OPTION_SUPORTE_LABEL", '2' => "OPTION_ADMIN_LABEL", '3' => "OPTION_MEMBER_LABEL", '4' => "OPTION_GUEST_LABEL", '5' => "OPTION_VISIT_LABEL");
    public static $PARENT = array('1' => '2', '2' => "3", '3' => "4", '4' => "5", '5' => null);
    public static $IS_ADMIM=array('1' => true, '2' =>false, '3' => false, '4' => false, '5' => false);
}