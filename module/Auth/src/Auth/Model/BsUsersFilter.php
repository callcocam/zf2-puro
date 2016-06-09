<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace Auth\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsUsersFilter extends InputFilter {

    /**
     * @return Zend\InputFilter
     */
    public function __construct() {
        $inputFilter = new InputFilter ();
        $emptyfilter = new NotEmpty ();
        $emailfilter = new EmailAddress ();
        $identca = new Identical ();
        $emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);
        $identca->setToken("password");
        $identca->setMessage("O Campo Repita Senha de ser Igual Ao campo Senha", Identical::MISSING_TOKEN);
        $StripTags = new StripTags ();
        $StringTrim = new StringTrim ();
        //Check that the email address exists in the database
        $validator = new \Zend\Validator\Db\RecordExists(
                array(
            'table' => 'bs_users',
            'field' => 'email',
            'adapter' => $dbAdapter
                )
        );
        $validator->setMessage("Email Ja Existe");
        // Informação para a coluna id:
        $id = new Input("id");
        $id->setRequired(false);
        $id->getFilterChain()->attach($StringTrim);
        $id->getFilterChain()->attach($StripTags);
        //$id->getValidatorChain()->attach($emptyfilter);
        $this->add($id);

        // Informação para a coluna codigo:
        $codigo = new Input("codigo");
        $codigo->setRequired(false);
        $codigo->getFilterChain()->attach($StringTrim);
        $codigo->getFilterChain()->attach($StripTags);
        //$codigo->getValidatorChain()->attach($emptyfilter);
        $this->add($codigo);

        // Informação para a coluna asset_id:
        $asset_id = new Input("asset_id");
        $asset_id->setRequired(false);
        $asset_id->getFilterChain()->attach($StringTrim);
        $asset_id->getFilterChain()->attach($StripTags);
        //$asset_id->getValidatorChain()->attach($emptyfilter);
        $asset_id->setValidatorChain($validator);
        $this->add($asset_id);

        // Informação para a coluna empresa:
        $empresa = new Input("empresa");
        $empresa->setRequired(false);
        $empresa->getFilterChain()->attach($StringTrim);
        $empresa->getFilterChain()->attach($StripTags);
        //$empresa->getValidatorChain()->attach($emptyfilter);
        $this->add($empresa);

        // Informação para a coluna title:
        $title = new Input("title");
        $title->setRequired(false);
        $title->getFilterChain()->attach($StringTrim);
        $title->getFilterChain()->attach($StripTags);
        //$title->getValidatorChain()->attach($emptyfilter);
        $this->add($title);

        // Informação para a coluna email:
        $email = new Input("email");
        $email->setRequired(false);
        $email->getFilterChain()->attach($StringTrim);
        $email->getFilterChain()->attach($StripTags);
        //$email->getValidatorChain()->attach($emptyfilter);
        $this->add($email);

        // Informação para a coluna facebook:
        $facebook = new Input("facebook");
        $facebook->setRequired(false);
        $facebook->getFilterChain()->attach($StringTrim);
        $facebook->getFilterChain()->attach($StripTags);
        //$facebook->getValidatorChain()->attach($emptyfilter);
        $this->add($facebook);

        // Informação para a coluna twitter:
        $twitter = new Input("twitter");
        $twitter->setRequired(false);
        $twitter->getFilterChain()->attach($StringTrim);
        $twitter->getFilterChain()->attach($StripTags);
        //$twitter->getValidatorChain()->attach($emptyfilter);
        $this->add($twitter);

        // Informação para a coluna phone:
        $phone = new Input("phone");
        $phone->setRequired(false);
        $phone->getFilterChain()->attach($StringTrim);
        $phone->getFilterChain()->attach($StripTags);
        //$phone->getValidatorChain()->attach($emptyfilter);
        $this->add($phone);

        // Informação para a coluna endereco:
        $endereco = new Input("endereco");
        $endereco->setRequired(false);
        $endereco->getFilterChain()->attach($StringTrim);
        $endereco->getFilterChain()->attach($StripTags);
        //$endereco->getValidatorChain()->attach($emptyfilter);
        $this->add($endereco);

        // Informação para a coluna bairro:
        $bairro = new Input("bairro");
        $bairro->setRequired(false);
        $bairro->getFilterChain()->attach($StringTrim);
        $bairro->getFilterChain()->attach($StripTags);
        //$bairro->getValidatorChain()->attach($emptyfilter);
        $this->add($bairro);

        // Informação para a coluna cidade:
        $cidade = new Input("cidade");
        $cidade->setRequired(false);
        $cidade->getFilterChain()->attach($StringTrim);
        $cidade->getFilterChain()->attach($StripTags);
        //$cidade->getValidatorChain()->attach($emptyfilter);
        $this->add($cidade);

        // Informação para a coluna images:
        $images_users = new Input("images");
        $images_users->setRequired(false);
        $images_users->getFilterChain()->attach($StringTrim);
        $images_users->getFilterChain()->attach($StripTags);
        //$images_users->getValidatorChain()->attach($emptyfilter);
        $this->add($images_users);

        // Informação para a coluna password:
        $password = new Input("password");
        $password->setRequired(false);
        $password->getFilterChain()->attach($StringTrim);
        $password->getFilterChain()->attach($StripTags);
        //$password->getValidatorChain()->attach($emptyfilter);
        $this->add($password);

        // Informação para a coluna role_id:
        $role_id = new Input("role_id");
        $role_id->setRequired(false);
        $role_id->getFilterChain()->attach($StringTrim);
        $role_id->getFilterChain()->attach($StripTags);
        //$role_id->getValidatorChain()->attach($emptyfilter);
        $this->add($role_id);

        // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(false);
        $description->getFilterChain()->attach($StringTrim);
        //$description->getFilterChain ()->attach ( $StripTags );
        //$description->getValidatorChain()->attach($emptyfilter);
        $this->add($description);

        // Informação para a coluna created_by:
        $created_by = new Input("created_by");
        $created_by->setRequired(false);
        $created_by->getFilterChain()->attach($StringTrim);
        $created_by->getFilterChain()->attach($StripTags);
        //$created_by->getValidatorChain()->attach($emptyfilter);
        $this->add($created_by);

        // Informação para a coluna alias:
        $alias = new Input("alias");
        $alias->setRequired(false);
        $alias->getFilterChain()->attach($StringTrim);
        $alias->getFilterChain()->attach($StripTags);
        //$alias->getValidatorChain()->attach($emptyfilter);
        $this->add($alias);

        // Informação para a coluna ordering:
        $ordering = new Input("ordering");
        $ordering->setRequired(false);
        $ordering->getFilterChain()->attach($StringTrim);
        $ordering->getFilterChain()->attach($StripTags);
        //$ordering->getValidatorChain()->attach($emptyfilter);
        $this->add($ordering);

        // Informação para a coluna state:
        $state = new Input("state");
        $state->setRequired(false);
        $state->getFilterChain()->attach($StringTrim);
        $state->getFilterChain()->attach($StripTags);
        //$state->getValidatorChain()->attach($emptyfilter);
        $this->add($state);

        // Informação para a coluna access:
        $access = new Input("access");
        $access->setRequired(false);
        $access->getFilterChain()->attach($StringTrim);
        $access->getFilterChain()->attach($StripTags);
        //$access->getValidatorChain()->attach($emptyfilter);
        $this->add($access);

        // Informação para a coluna created:
        $created = new Input("created");
        $created->setRequired(false);
        $created->getFilterChain()->attach($StringTrim);
        $created->getFilterChain()->attach($StripTags);
        //$created->getValidatorChain()->attach($emptyfilter);
        $this->add($created);

        // Informação para a coluna modified:
        $modified = new Input("modified");
        $modified->setRequired(false);
        $modified->getFilterChain()->attach($StringTrim);
        $modified->getFilterChain()->attach($StripTags);
        //$modified->getValidatorChain()->attach($emptyfilter);
        $this->add($modified);

        // Informação para a coluna publish_up:
        $publish_up = new Input("publish_up");
        $publish_up->setRequired(false);
        $publish_up->getFilterChain()->attach($StringTrim);
        $publish_up->getFilterChain()->attach($StripTags);
        //$publish_up->getValidatorChain()->attach($emptyfilter);
        $this->add($publish_up);

        // Informação para a coluna publish_down:
        $publish_down = new Input("publish_down");
        $publish_down->setRequired(false);
        $publish_down->getFilterChain()->attach($StringTrim);
        $publish_down->getFilterChain()->attach($StripTags);
        //$publish_down->getValidatorChain()->attach($emptyfilter);
        $this->add($publish_down);
    }

}