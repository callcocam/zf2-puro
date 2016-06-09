<?php

/**
 * AuthStorage
 */

namespace Auth\Model;

use Zend\Authentication\Storage\Session as SessionStorage;

class AuthStorage extends SessionStorage {

    public function setRememberMe($rememberMe = 0, $time = 1209600) {
        if ($rememberMe == 1) {
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe() {
        $this->session->getManager()->forgetMe();
    }

}
