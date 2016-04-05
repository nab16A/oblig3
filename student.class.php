<?php

class student {
    private $id;
    public $etternavn;
    private $fornavn;
    private $klasse;
    private $mobil;
    private $www;
    private $epost;
    private $opprettet;

    function __construct() { }


    function hentId() {
        return $this->id;
    }
    function hentNavn() {
        return $this->fornavn . " " . $this->etternavn;
    }
    function hentEtterNavn() {
        return $this->etternavn;
    }
    function hentForNavn() {
        return $this->fornavn;
    }
    function hentMobil() {
        return $this->mobil;
    }
    function hentNettSide() {
        return $this->www;
    }
    function hentKlasse() {
        return $this->klasse;
    }
    function hentEpost() {
        return $this->epost;
    }
    function hentDatoOppretting() {
        return $this->opprettet;
    }

    function setId($Id) {
        $this->id = $Id;
    }

    function setEtterNavn($Etternavn) {
        $this->etternavn = $Etternavn;
    }
    function setForNavn($Fornavn) {
        $this->fornavn = $Fornavn;
    }
    function setKlasse($Klasse) {
        $this->klasse = $Klasse;
    }
    function setMobil($Mobil) {
        $this->mobil = $Mobil;
    }
    function setNettSide($NettSide) {
        $this->www = $NettSide;
    }
    function setEpost($Epost) {
        $this->epost = $Epost;
    }
    function setDatoOppretting($Dato) {
        $this->opprettet = $Dato;
    }
}