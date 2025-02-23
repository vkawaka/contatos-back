<?php
require_once __DIR__ . '/../core/Database.php';

class Contato {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    public function listarContatos() {
        $stmt = $this->conn->query("SELECT * FROM tbl_contato");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarContato($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_contato WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function criarContato($nome, $email, $telefone, $data_nasc, $profissao, $celular) {
        $stmt = $this->conn->prepare("INSERT INTO tbl_contato (nome, email, telefone, data_nasc, profissao, celular) 
        VALUES (:nome, :email, :telefone, :data_nasc, :profissao, :celular)");
        
        $stmt->execute([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'data_nasc' => $data_nasc,
            'profissao' => $profissao,
            'celular' => $celular
        ]);
        
        return $this->conn->lastInsertId();
    }
    
    public function atualizarContato($id, $nome, $email, $telefone, $data_nasc, $profissao, $celular) {
        $stmt = $this->conn->prepare("UPDATE tbl_contato SET nome = :nome, email = :email, telefone = :telefone, data_nasc = :data_nasc, profissao = :profissao, celular = :celular WHERE id = :id");
        return $stmt->execute(['id' => $id, 'nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'data_nasc' => $data_nasc, 'profissao' => $profissao, 'celular' => $celular]);
    }

    public function deletarContato($id) {
        $stmt = $this->conn->prepare("DELETE FROM tbl_contato WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
