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
        $sql = 'SELECT * FROM users WHERE id = :id';

        $stm = $this->conn->prepare($sql);
        $res = $stm->execute(['id' => $id]);

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
    public function updateUser(array $user) {
        $sql = "UPDATE users SET name = :nome, lastname = :cognome, city = :citta WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->execute(['nome' => $user['name'], 'cognome' => $user['lastname'], 'citta' => $user['city'], 'id' => $user['id']]);
        print_r($stm->rowCount());
    }
    public function deleteUser(int $id) {
        $sql = "DELETE FROM users WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        print_r($stm->rowCount());
    }
}