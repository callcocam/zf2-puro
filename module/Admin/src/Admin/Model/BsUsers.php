<?php 
namespace Admin\Model;


/**
* BsUsers
*/
class BsUsers extends \Base\Model\AbstractModel {

   
    private $email;
    private $phone;
    private $facebook;
    private $twitter;
    private $cidade;
    private $endereco;
    private $bairro;
    private $images;
    private $role_id;
    private $password;

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
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

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
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

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
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

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
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

}
