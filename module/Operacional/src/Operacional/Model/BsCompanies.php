<?php
namespace Operacional\Model;
/**
 * BsCompanies [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsCompanies extends \Base\Model\AbstractModel {
    
    protected $fantasia;
    private $email;
    private $phone;
    private $facebook;
    private $twitter;
    private $cidade;
    private $endereco;
    private $bairro;
    private $images;
    protected $longetude;
    protected $latitude;

    function getFantasia()
    {
        return $this->fantasia;
    }
    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getImages() {
        return $this->images;
    }

    function getLongetude() {
        return $this->longetude;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function setFantasia($fantasia)
    {
        $this->fantasia=$fantasia;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setImages($images) {
        $this->images = $images;
    }

    function setLongetude($longetude) {
        $this->longetude = $longetude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }


}
