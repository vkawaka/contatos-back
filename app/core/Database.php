<?php
/**
 * Este arquivo é responsável por criar uma instância com o Banco de Dados Mysql (pelo phpMyAdmin) com o PDO. Data de início: 19/02/25.
 */

    class Database {
        private static $instance = null;
        private $conn;

        private $host = 'localhost';
        private $usuario = 'root';
        private $senha = '';
        private $db = 'alphacodecontatos';

        private function __construct(){
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};", $this->usuario, $this->senha);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão com o Banco de Dados pelo PDO. '.$e->getMessage());
            }
        }

        public static function getInstance(){
            if (!self::$instance) {
                self::$instance = new Database();
            } 
            return self::$instance->conn;
        }
    }

?>