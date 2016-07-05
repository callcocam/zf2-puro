<?php
namespace Base\View\Helper\Form\Custom\Radio;
/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
// Base\View\Helper\Form\Custom\Radio\FormRadio.php

use Zend\Form\View\Helper\FormRadio as OriginalFormRadio;

class FormRadio extends OriginalFormRadio
{
    protected function renderOptions(/* include original attributes here */)
    {
        \Zend\Debug\Debug::dump($this->getLabelAttributes());
                die();
         $template = '<div class="radio">' . $labelOpen . '%s%s' . $labelClose . '</div>';
    }
}