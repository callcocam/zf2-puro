<?php

namespace Auth\Model;

/**
 * BsUsers
 */
class BsUsers extends \Base\Model\AbstractModel {

    protected $tipo = '';
    protected $cnpj = '';
    protected $rg = '';
    protected $ie = '';
    protected $phone = '';
    protected $whatsapp = '';
    protected $email = '';
    protected $facebook = '';
    protected $twitter = '';
    protected $cidade = '';
    protected $cep = '';
    protected $bairro = '';
    protected $endereco = '';
    protected $images = '';
    protected $role_id = '5';
    protected $password = '';
    protected $usr_registration_token = '';

    public function getTipo() {
        return $this->tipo;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getIe() {
        return $this->ie;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getImages() {
        return $this->images;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUsrRegistrationToken() {
        return $this->usr_registration_token;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function setRg($rg) {
        $this->rg = $rg;
        return $this;
    }

    public function setIe($ie) {
        $this->ie = $ie;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
        return $this;
    }

    public function setTwitter($twitter) {
        $this->twitter = $twitter;
        return $this;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function setImages($images) {
        $this->images = $images;
        return $this;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setUsrRegistrationToken($usr_registration_token) {
        $this->usr_registration_token = $usr_registration_token;
        return $this;
    }

}
