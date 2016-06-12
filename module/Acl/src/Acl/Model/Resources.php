<?php 
namespace Acl\Model;

/**
* Resources
*/
class Resources
{
	protected $resources;
	function __construct($serviceLocator)
		{
			$controllers=$serviceLocator->get('Config');
			$this->resources=$controllers['controllers'];
		}

		public function getResources($key='invokables')
		{
			return $this->resources[$key];
		}
   
  
}