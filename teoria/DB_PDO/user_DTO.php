<?php

class UserDTO {
    private PDO $conn;
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }
    public function getAll() {
        $res = $this->conn->query('SELECT * FROM users', PDO::FETCH_ASSOC);

        if($res) {
            return $res;
        }

        return null;
    }
    public function getUserByID(int $id) {
        $res = $this->conn->query('SELECT * FROM users WHERE id = ' . $id, PDO::FETCH_ASSOC);

        if($res) {
            return $res;
        }

        return null;
    }
    public function saveUser(array $user) {
        $sql = "INSERT INTO users (name, lastname, city) VALUES (:nome, :cognome, :citta)";

        $stm = $this->conn->prepare($sql);
        $stm->execute(['nome' => $user['name'], 'cognome' => $user['lastname'], 'citta' => $user['city']]);
        print_r($stm->rowCount());
    }
    public function updateUser(array $user) {}
    public function deleteUser(int $id) {}
}