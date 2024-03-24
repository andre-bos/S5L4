<?php

namespace MaterialeBibliotecarioDTO {

    use Biblioteca\Libro;
    use PDO;
    class LibroDTO {
        private PDO $conn;
        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $res = $this->conn->query('SELECT * FROM MaterialeBibliotecario WHERE tipo = "libro"', PDO::FETCH_ASSOC);
            return $res ? $res : null;

            // In alternativa all'operatore ternario di sopra c'è l'if statement

            /*if($res) {
                return $res;
            }

            return null;*/
        }
        public function getLibroByID(int $id) {
            $sql = 'SELECT * FROM MaterialeBibliotecario WHERE id = :id';

            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
            return $stm->fetchAll();

            /*if($res) {
                return $res;
            }

            return null;*/
        }
        public function saveLibro(Libro $libro) {
            $sql = "INSERT INTO MaterialeBibliotecario (titolo, annoPubblicazione, autore, tipo) VALUES (:titolo, :annoPubblicazione, :autore, 'libro')";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['titolo' => $libro->titolo, 'annoPubblicazione' => $libro->annoPubblicazione, 'autore' => $libro->autore]);
            print_r($stm->rowCount());
        }
        public function updateLibro(Libro $libro) {
            $sql = "UPDATE MaterialeBibliotecario SET titolo = :titolo, annoPubblicazione = :annoPubblicazione, autore = :autore WHERE id = :id";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['titolo' => $libro->titolo, 'annoPubblicazione' => $libro->annoPubblicazione, 'autore' => $libro->autore, 'id' => $libro->id]);
            print_r($stm->rowCount());
        }
        public function deleteLibro(int $id) {
            $sql = "DELETE FROM MaterialeBibliotecario WHERE id = :id";

            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
            print_r($stm->rowCount());
        }
    }
}