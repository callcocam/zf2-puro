<?php 
namespace FluxoCaixa\View\Helper;
/**
* FluxoCaixaHelper
*/
class FluxoCaixaHelper extends AbstractViewHeper
{
	
	public function __construct(argument)
	{
		# code...
	}

	public function getReceitas($condicao="")
	{
		  return $this->get("ent_previsto")->setValue($this->serviceLocator->get('FluxoCaixa\Model\BsContasReceberTable')->getReceitas($condicao));
               
	}
}