<?php

namespace User {
    interface IRegisteredUser {
        function login();
        function logout();

    }
    abstract class User {
//        private $count = 0;
        static $count = 0; // Con 'static' creo una variabile di classe e non di istanza
        protected $username; // Proprietà di istanza
        protected $email;
        private $password;

        function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            static::$count++;
        }

        // Metodo public ereditato da tutte le sottoclassi
        public function getInfo() {
            return "Username: " . $this->username . " Email: " . $this->email;
        }

        public static function getUserCount() { //Rendo sia il metodo che la proprietà di classe static
            return self::$count;
        }

        abstract function recuperaPassword();
    }
    class Guest extends User {
        public $name;

        // Metodo magico PHP costruttore

        function __construct($username, $email, $password, $name) {
            parent::__construct($username, $email, $password);
            $this->name = $name;
        }

        function getInfo() {
            return "Name: " . $this->name . " " . parent::getInfo();
        }

        function recuperaPassword() {}
    }

    class RegisteredUser extends User implements IRegisteredUser {
        public $name;
        public $lastname;
        public $city;

        function __construct($name, $lastname, $city, $username, $email, $password) {
            parent::__construct($username, $email, $password);
            $this->name = $name;
            $this->lastname = $lastname;
            $this->city = $city;
        }

        function getInfo() {
            return "Name: " . $this->name . " Last Name: " . $this->lastname . " City: " . $this->city . " " . parent::getInfo();
        }

        function login():string {
            return "Utente loggato!";
        }

        function logout():string {
            return "Sessione distrutta";
        }

        function recuperaPassword() {}
    }

    class Admin extends RegisteredUser {
        /*public $name;
        public $lastname;
        public $city;
        private $username; // Proprietà di istanza
        private $email;*/
        private $fiscalcode;

        function __construct($name, $lastname, $city, $username, $email, $password, $fiscalcode) {
            parent::__construct($name, $lastname, $city, $username, $email, $password);

            $this->fiscalcode = $fiscalcode;
        }

        public function getInfo() {
            return "Fiscal code: " . $this->fiscalcode . " " . parent::getInfo();
        }
    }

    abstract class Veicolo {
        abstract function speedUp(); // La classe astratta può contenere metodi astratti che devono essere implementati in tutte le classi che la estendono
    } // La classe è astratta, può essere estesa ma non instanziata

    class Automobile extends Veicolo {
        function speedUp() {
            return "Automobile++";
        }
    }
    class Moto extends Veicolo {
        function speedUp() {
            return "Moto++";
        }
    }
    class Camper extends Veicolo {
        function speedUp() {
            return "Camper++";
        }
    }

    class Barca extends Veicolo {
        function speedUp() {
            return "Barca++";
        }
    }
}