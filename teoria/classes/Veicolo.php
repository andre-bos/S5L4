<?php

namespace Veicolo {
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    abstract class Veicolo {
        public function info() {
            echo 'Info veicolo!! <br>';
        }

    }
    abstract class Automobile extends Veicolo {

    }
    class Suv extends Automobile {
        public final function infoSuv() { // Il metodo viene sovrascritto nella sottoclasse di Suv Test.
                                    //Per evitare la sovrascrittura nelle sottoclassi si aggiunge la parola chiave 'final' davanti al metodo.
            echo 'Info Suv!! <br>';
        }

    }

    class Test extends Suv {
        /*public function infoSuv() { // Non posso sovrascrivere il metodo infoSuv() che Test eredita da Suv.
            echo 'Info Test!! <br>';
        }*/
    }
    final class Berlina extends Automobile { // La parola-chiave 'final' serve per definire una classe che non può più essere estesa.
        // A partire dalla vers. 7 di PHP si può tipizzare
        /*private int $id;
        private string $modello;
        private string $marca;
        private ?string $targa; // Con il '?' indico che targa può ricevere un valore di tipo stringa oppure NULL
        private bool $elettrico;


        public function __construct(int $id, string $modello, string $marca, ?string $targa = null, bool $elettrico = false) {
            $this->id = $id;
            $this->modello = $modello;
            $this->marca = $marca;
            $this->targa = $targa;
            $this->elettrico = $elettrico; */

        // A partire dalla versione 8 di PHP c'è la possibilità di definire gli attributi di proprietà di una classe direttamente nel suo costruttore
        public function __construct(
                                    private readonly int $id, // A partire dalla versione 8 di PHP posso definire una proprietà come 'readonly'
                                    private string $modello,
                                    private string $marca,
                                    private ?string $targa = null,
                                    private bool $elettrico = false) {}

        public function __get($name) {
            if($name === 'modello') {
                echo "Sono il metodo 'get' magico di PHP di " . $name;
            }
        }

       /* public function __set($name, $value) {
            $this->attributes[$name] = $value;
        }*/

        public function info() {
            return $this->id . ' ' . $this->modello . ' ' . $this->marca . ' ' . $this->targa . ' ' . $this->elettrico;
        }

       /* public function controllaId() {
            echo 'Faccio qualcosa!';
        }

        public function test() {
            echo 'Faccio qualcosa!';
        }*/

        //Invece di riscrivere gli stessi metodi per più classi come sopra, posso iniettarli direttamente tramite il trait

        use func;

        public function getTarga() {
            return $this->targa;
        }
        public function setTarga(?string $targa) {
            return $this->targa = $targa;

        }

        public function getId() {
            return $this->id;
        }

    }
    /*class Monovolume extends Berlina { //Se tento di estendere 'Berlina' ottengo un errore

    }*/
    class Moto extends Veicolo {

    }
    //Per risolvere parzialmente il problema dell'ereditarietà singola in PHP sono stati introdotti i Traits
    // I traits permettono di raggruppare più metodi condivisi tra classi differenti
    trait func {
        public function controllaId() {
            echo 'Faccio qualcosa!';
        }

        public function test() {
            echo 'Faccio qualcosa!';
        }
    }
    class TestTraits {
        private int $id = 1;

        /*public function controllaId() {
            echo 'Faccio qualcosa!';
        }

        public function test() {
            echo 'Faccio qualcosa!';
        }*/

        //Invece di riscrivere gli stessi metodi per più classi come sopra, posso iniettarli direttamente tramite il trait

        use func;
    }

    $s = new Suv();
    $s->info();
    $s->infoSuv();
    $t = new Test();
    $t->infoSuv();

    $b = new Berlina(33, '500', 'Fiat', 'ABCDEF33', true);
    // echo $b->info();
    echo $b->getTarga();
//    $b->modello = 'Opel';
    echo $b->modello;
    echo $b->marca;
}
