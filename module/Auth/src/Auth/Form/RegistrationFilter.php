<?php

namespace Auth\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;

class RegistrationFilter extends \Base\Form\AbstractFilter {

      /**
     * @return Zend\InputFilter
     */
    public function __construct($serviceLocator = null) {
        $this->inputFilter = new InputFilter ();
        $this->emptyfilter = new NotEmpty ();
        $this->emailfilter = new EmailAddress ();
        $this->identca = new Identical ();
        $this->StripTags = new StripTags ();
        $this->StringTrim = new StringTrim ();
        $this->emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);
        $this->emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);
        $this->identca->setToken("password");
        $this->identca->setMessage("O Campo Repita Senha de ser Igual Ao campo Senha", Identical::MISSING_TOKEN);
        $this->serviceLocator = $serviceLocator;

        // Informação para a coluna id:
        $id = new Input("id");
        $id->setRequired(true);
        $id->getFilterChain()->attach($this->StringTrim);
        $id->getFilterChain()->attach($this->StripTags);
        $id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($id);
        //Check that the email address exists in the database
        // Informação para a coluna codigo:
        $codigo = new Input("codigo");
        $codigo->setRequired(false);
        $codigo->getFilterChain()->attach($this->StringTrim);
        $codigo->getFilterChain()->attach($this->StripTags);
        //$codigo->getValidatorChain()->attach($this->emptyfilter);
        $this->add($codigo);

        // Informação para a coluna asset_id:
        $asset_id = new Input("asset_id");
        $asset_id->setRequired(false);
        $asset_id->getFilterChain()->attach($this->StringTrim);
        $asset_id->getFilterChain()->attach($this->StripTags);
        //$asset_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($asset_id);

        // Informação para a coluna empresa:
        $empresa = new Input("empresa");
        $empresa->setRequired(false);
        $empresa->getFilterChain()->attach($this->StringTrim);
        $empresa->getFilterChain()->attach($this->StripTags);
        //$empresa->getValidatorChain()->attach($this->emptyfilter);
        $this->add($empresa);

        // Informação para a coluna title:
        $title = new Input("title");
        $title->setRequired(false);
        $title->getFilterChain()->attach($this->StringTrim);
        $title->getFilterChain()->attach($this->StripTags);
        //$title->getValidatorChain()->attach($this->emptyfilter);
        $this->add($title);

        // Informação para a coluna email:
        $email = new Input("email");
        $email->setRequired(true);
        $email->getFilterChain()->attach($this->StringTrim);
        $email->getFilterChain()->attach($this->StripTags);
        $email->getValidatorChain()->attach($this->emptyfilter);
        $this->add($email);

        // Informação para a coluna facebook:
        $facebook = new Input("facebook");
        $facebook->setRequired(false);
        $facebook->getFilterChain()->attach($this->StringTrim);
        $facebook->getFilterChain()->attach($this->StripTags);
        //$facebook->getValidatorChain()->attach($this->emptyfilter);
        $this->add($facebook);

        // Informação para a coluna twitter:
        $twitter = new Input("twitter");
        $twitter->setRequired(false);
        $twitter->getFilterChain()->attach($this->StringTrim);
        $twitter->getFilterChain()->attach($this->StripTags);
        //$twitter->getValidatorChain()->attach($this->emptyfilter);
        $this->add($twitter);

        // Informação para a coluna phone:
        $phone = new Input("phone");
        $phone->setRequired(false);
        $phone->getFilterChain()->attach($this->StringTrim);
        $phone->getFilterChain()->attach($this->StripTags);
        //$phone->getValidatorChain()->attach($this->emptyfilter);
        $this->add($phone);

        // Informação para a coluna endereco:
        $endereco = new Input("endereco");
        $endereco->setRequired(false);
        $endereco->getFilterChain()->attach($this->StringTrim);
        $endereco->getFilterChain()->attach($this->StripTags);
        //$endereco->getValidatorChain()->attach($this->emptyfilter);
        $this->add($endereco);

        // Informação para a coluna bairro:
        $bairro = new Input("bairro");
        $bairro->setRequired(false);
        $bairro->getFilterChain()->attach($this->StringTrim);
        $bairro->getFilterChain()->attach($this->StripTags);
        //$bairro->getValidatorChain()->attach($this->emptyfilter);
        $this->add($bairro);

        // Informação para a coluna cidade:
        $cidade = new Input("cidade");
        $cidade->setRequired(false);
        $cidade->getFilterChain()->attach($this->StringTrim);
        $cidade->getFilterChain()->attach($this->StripTags);
        //$cidade->getValidatorChain()->attach($this->emptyfilter);
        $this->add($cidade);

        // Informação para a coluna images:
        $images_users = new Input("images");
        $images_users->setRequired(false);
        $images_users->getFilterChain()->attach($this->StringTrim);
        $images_users->getFilterChain()->attach($this->StripTags);
        //$images_users->getValidatorChain()->attach($this->emptyfilter);
        $this->add($images_users);

        // Informação para a coluna password:
        $password = new Input("password");
        $password->setRequired(true);
        $password->getFilterChain()->attach($this->StringTrim);
        $password->getFilterChain()->attach($this->StripTags);
        $password->getValidatorChain()->attach($this->emptyfilter);
        $this->add($password);

        // Informação para a coluna usr_password_confirm:
        $usr_password_confirm = new Input("usr_password_confirm");
        $usr_password_confirm->setRequired(true);
        $usr_password_confirm->getFilterChain()->attach($this->StringTrim);
        $usr_password_confirm->getFilterChain()->attach($this->StripTags);
        $usr_password_confirm->getValidatorChain()->attach($this->emptyfilter);
        $usr_password_confirm->getValidatorChain()->attach($this->identca);
        $this->add($usr_password_confirm);

        // Informação para a coluna password:
        $usr_registration_token = new Input("usr_registration_token");
        $usr_registration_token->setRequired(false);
        $usr_registration_token->getFilterChain()->attach($this->StringTrim);
        $usr_registration_token->getFilterChain()->attach($this->StripTags);
        //$password->getValidatorChain()->attach($this->emptyfilter);
        $this->add($usr_registration_token);


        // Informação para a coluna role_id:
        $role_id = new Input("role_id");
        $role_id->setRequired(false);
        $role_id->getFilterChain()->attach($this->StringTrim);
        $role_id->getFilterChain()->attach($this->StripTags);
        //$role_id->getValidatorChain()->attach($this->emptyfilter);
        $this->add($role_id);

        // Informação para a coluna description:
        $description = new Input("description");
        $description->setRequired(false);
        $description->getFilterChain()->attach($this->StringTrim);
        //$description->getFilterChain ()->attach ( $this->StripTags );
        //$description->getValidatorChain()->attach($this->emptyfilter);
        $this->add($description);

        // Informação para a coluna created_by:
        $created_by = new Input("created_by");
        $created_by->setRequired(false);
        $created_by->getFilterChain()->attach($this->StringTrim);
        $created_by->getFilterChain()->attach($this->StripTags);
        //$created_by->getValidatorChain()->attach($this->emptyfilter);
        $this->add($created_by);

        // Informação para a coluna alias:
        $alias = new Input("alias");
        $alias->setRequired(false);
        $alias->getFilterChain()->attach($this->StringTrim);
        $alias->getFilterChain()->attach($this->StripTags);
        //$alias->getValidatorChain()->attach($this->emptyfilter);
        $this->add($alias);

        // Informação para a coluna ordering:
        $ordering = new Input("ordering");
        $ordering->setRequired(false);
        $ordering->getFilterChain()->attach($this->StringTrim);
        $ordering->getFilterChain()->attach($this->StripTags);
        //$ordering->getValidatorChain()->attach($this->emptyfilter);
        $this->add($ordering);

        // Informação para a coluna state:
        $state = new Input("state");
        $state->setRequired(false);
        $state->getFilterChain()->attach($this->StringTrim);
        $state->getFilterChain()->attach($this->StripTags);
        //$state->getValidatorChain()->attach($this->emptyfilter);
        $this->add($state);

        // Informação para a coluna access:
        $access = new Input("access");
        $access->setRequired(false);
        $access->getFilterChain()->attach($this->StringTrim);
        $access->getFilterChain()->attach($this->StripTags);
        //$access->getValidatorChain()->attach($this->emptyfilter);
        $this->add($access);

        // Informação para a coluna created:
        $created = new Input("created");
        $created->setRequired(false);
        $created->getFilterChain()->attach($this->StringTrim);
        $created->getFilterChain()->attach($this->StripTags);
        //$created->getValidatorChain()->attach($this->emptyfilter);
        $this->add($created);

        // Informação para a coluna modified:
        $modified = new Input("modified");
        $modified->setRequired(false);
        $modified->getFilterChain()->attach($this->StringTrim);
        $modified->getFilterChain()->attach($this->StripTags);
        //$modified->getValidatorChain()->attach($this->emptyfilter);
        $this->add($modified);

        // Informação para a coluna publish_up:
        $publish_up = new Input("publish_up");
        $publish_up->setRequired(false);
        $publish_up->getFilterChain()->attach($this->StringTrim);
        $publish_up->getFilterChain()->attach($this->StripTags);
        //$publish_up->getValidatorChain()->attach($this->emptyfilter);
        $this->add($publish_up);

        // Informação para a coluna publish_down:
        $publish_down = new Input("publish_down");
        $publish_down->setRequired(false);
        $publish_down->getFilterChain()->attach($this->StringTrim);
        $publish_down->getFilterChain()->attach($this->StripTags);
        //$publish_down->getValidatorChain()->attach($this->emptyfilter);
        $this->add($publish_down);
    }

}
