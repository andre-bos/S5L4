<?php
// PDO: PHP Data Object

/*try {
    $conn = new PDO('mysql:host=localhost;dbname=pdo_test', 'root', '');

    /* $sql = 'SELECT * FROM users';

    $res = $conn->query($sql, PDO::FETCH_ASSOC);

    if($res) {
    foreach($res as $row) {
    print_r($row);
    }
    }
} catch (PDOException $e) {
    die('Failed to connect to database ' . $e->getMessage());
}

echo 'Connesso al database';*/

// Classe Singleton PDO

namespace db {
    class DB_PDO {
        private $conn;
        private static $instance = null; // Creo una variabile che contiene l'istanza di connessione e la inizializzo con null
        private function __construct(array $config) { // Rendo privato il costruttore per rendere impossibile la creazione di un numero N di istanze di connessione
                                                        // A me serve un'unica istanza di connessione
                                                        // Rendendo privato il costruttore, però, non posso più istanziare neanche una connessione
                                                        // Devo quindi creare un nuovo metodo pubblico che mi recuperi l'istanza di connessione all'interno del costruttore
            $this->conn = new \PDO($config['driver'] . ":host=" . $config['host'] . "; dbname=" . $config['dbname'], $config['user'], $config['password']);

        }

        public static function getInstance(array $config) { //Questa funzione, essendo pubblica, è l'unica in grado di ritornare l'istanza di connessione
            if(!self::$instance) {
                self::$instance = new DB_PDO($config);
            }

            return self::$instance;
        }

        public function getConnection() { // Questo metodo mi ritorna la connessione, che è anch'essa una proprietà privata di classe
            return $this->conn;
        }

        /*
         * In PHP, il simbolo ! è un operatore logico di negazione. Quando viene utilizzato prima di una variabile o di un'espressione, inverte il suo valore booleano.
         * Se l'espressione è true, diventa false e viceversa.
         *  Nel tuo caso, if(!self::$instance) controlla se self::$instance è null o false.
         * Se self::$instance è null o false, l'espressione !self::$instance diventa true e il codice all'interno dell'istruzione if viene eseguito.
         * In altre parole, if(!self::$instance) significa "se non esiste un'istanza di questa classe (cioè, se self::$instance è null),
         * allora esegui il codice seguente".
         * Questo è un pattern comune utilizzato nelle classi singleton per garantire che esista solo un'istanza di una classe.
         */

    }
}