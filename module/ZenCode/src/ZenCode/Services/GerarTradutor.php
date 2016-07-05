<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarTradutor {

    public function __construct($language) {
        if ($language):
            $this->setBody('return array(');
            foreach ($language as $value) {
                extract($value->toArray());
                $key_title = str_replace("LABEL", "DESC", $title);
                $key_placeholder = str_replace("LABEL", "PLACEHOLDER", $title);
                $this->setBody("              '{$title}' => '{$description}',");
                if (!empty($dica_tela)):
                    $this->setBody("              '{$key_title}' => '{$dica_tela}',");
                endif;
                if (!empty($placeholder)):
                    $this->setBody("              '{$key_placeholder}' => '{$placeholder}',");
                endif;
            }
            $this->setBody(" );");
        endif;
    }

    public function generate($fileName) {
        $fileGenerate = new \Zend\Code\Generator\FileGenerator();
        $fileGenerate->setFilename($fileName)->setBody(implode(PHP_EOL, $this->body))->write();
        return $fileGenerate->generate();
    }

    public function setBody($body) {
        if ($body === 'limpa') {
            unset($this->body);
        } else {
            $this->body[] = $body;
        }
    }

    public function getBody() {
        return $this->body;
    }

}
