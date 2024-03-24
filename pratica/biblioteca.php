<?php

namespace Biblioteca {


    interface IPresito
    {
        function presta();

        function restituisci();
    }

    abstract class MaterialeBibliotecario implements IPresito {
        public $id;
        public $titolo;
        public $annoPubblicazione;
        private static $contatoreMateriali = 0;

        function __construct($id, $titolo, $annoPubblicazione) {
            $this->id = $id;
            $this->titolo = $titolo;
            $this->annoPubblicazione = $annoPubblicazione;
            self::$contatoreMateriali++;
        }

        protected static function decrementaMateriali() {
            return self::$contatoreMateriali--;
        }

        protected static function incrementaMateriali() {
            return self::$contatoreMateriali++;
        }

        public function getContatoreMateriali()
        {
            return self::$contatoreMateriali;

        }
    }

    class Libro extends MaterialeBibliotecario {
        public $autore;
        private static $contatoreLibri = 0;

        function __construct($id, $titolo, $annoPubblicazione, $autore)
        {
            parent::__construct($id, $titolo, $annoPubblicazione);
            $this->autore = $autore;
            self::$contatoreLibri++;
        }

        public function presta() {
            parent::decrementaMateriali();
        }

        public function restituisci() {
            parent::incrementaMateriali();
        }

        public function contaLibri() {
            return self::$contatoreLibri;
        }
    }

    class DVD extends MaterialeBibliotecario
    {
        private $regista;
        private static $contatoreDVD = 0;

        function __construct($titolo, $annoPubblicazione, $regista)
        {
            parent::__construct($titolo, $annoPubblicazione);
            $this->regista = $regista;
            self::$contatoreDVD++;
        }

        public function presta() {
            parent::decrementaMateriali();
        }

        public function restituisci() {
            parent::incrementaMateriali();
        }

        public function contaDVD() {
            return self::$contatoreDVD;
        }

    }
}