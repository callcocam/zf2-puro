<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Operacional\Form;

use Base\Form\AbstractForm;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsElementsForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsElements", $options);
        $this->setInputFilter(new  BsElementsFilter());
    }


}

