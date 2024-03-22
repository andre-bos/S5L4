<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

require_once 'database.php';
require_once 'user_DTO.php';
$config = require_once 'config.php';

use db\DB_PDO as DB;

// $db = new DB_PDO($config);

// print_r($db->conn);

// var_dump(DB::getInstance($config)); // Nel file 'database.php' sono stati resi 'static' sia la proprietà $instance sia il metodo getInstance() che serve a leggerla.
                    //  In quanto 'static', sono proprietà di classe e non di istanza. Pertanto, la classe può essere richiamata direttamente senza dover istanziare una nuova istanza

$PDOConn = DB::getInstance($config);
$conn = $PDOConn->getConnection();

/*// READ

$res = $conn->query('SELECT * FROM users', PDO::FETCH_ASSOC);

if($res) {
    foreach($res as $row) {
        print_r($row);
    }
}*/

$id = 1;
$name = 'Luca';
$lastname = 'Galotti';
$city = 'Roma';

$userDTO = new UserDTO($conn);

// $res = $userDTO->getAll();
$res = $userDTO->getUserByID(1);

if($res) {
    foreach($res as $row) {
        print_r($row);
    }
}

/*// INSERT

$sql = "INSERT INTO users (name, lastname, city) VALUES (:nome, :cognome, :citta)";

$stm = $conn->prepare($sql);
$stm->execute(['nome' => $name, 'cognome' => $lastname, 'citta' => $city]);
print_r($stm->rowCount());*/

/*// UPDATE

$sql = "UPDATE users SET name = :nome, lastname = :cognome, city = :citta WHERE id = :id";
$stm = $conn->prepare($sql);
$stm->execute(['nome' => $name, 'cognome' => $lastname, 'citta' => $city, 'id' => $id]);
print_r($stm->rowCount());

// DELETE

$sql = "DELETE users WHERE id = :id";
$stm = $conn->prepare($sql);
$stm->execute(['id' => $id]);
print_r($stm->rowCount());*/

// I metodi sono stati commentati qui e spostati nella classe UserDTO