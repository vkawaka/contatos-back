<?php
/**
* Este arquivo é responsável por processar os dados e enviar para a camada model do projeto. Data de início:19/02/2025
*/
require_once __DIR__ . '/../model/Contato.php';

class ContatoController {
    private $contato;

    public function __construct() {
        $this->contato = new Contato();
    }

    public function index() {
        $contatos = $this->contato->listarContatos();
        header("Content-Type: application/json");
        
        if (!empty($contatos)) {
            echo json_encode($contatos, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["message" => "No contacts found"]);
        }
        exit();
    }
    public function show($id){
        if (isset($id)) {
            $contato = $this->contato->buscarContato($id);
    
            if ($contato) {
                echo json_encode($contato, JSON_PRETTY_PRINT);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Contato não encontrado"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "ID do contato é obrigatório"]);
        }
        exit();
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!empty($input['nome']) && !empty($input['email']) && isset($input['telefone']) && !empty($input['data_nasc']) && !empty($input['profissao']) && !empty($input['celular'])) {
            $novoContato = $this->contato->criarContato($input['nome'], $input['email'], $input['telefone'], $input['data_nasc'], $input['profissao'], $input['celular']);
            http_response_code(201);
            echo json_encode(["id" => $novoContato, "nome" => $input['nome'], "email" => $input['email'], "telefone" => $input['telefone'], "data_nasc" => $input['data_nasc'], "profissao" => $input['profissao'], "celular" => $input['celular']]);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Confira se todos os campos foram preenchidos!"]);
        }
    }
    public function update($id) {
        $input = json_decode(file_get_contents('php://input'), true); // Dados enviados no corpo da requisição
        
        if ($id && !empty($input['nome']) && !empty($input['email']) && isset ($input['telefone']) && !empty($input['data_nasc']) && !empty($input['profissao']) && !empty($input['celular'])) {
            $contatoAtualizado = $this->contato->atualizarContato($id, $input['nome'], $input['email'], $input['telefone'], $input['data_nasc'], $input['profissao'], $input['celular']);
            if ($contatoAtualizado) {
                echo json_encode(["message" => "Contato atualizado com sucesso"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Erro ao atualizar contato"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "ID e todos os campos são necessários para atualização"]);
        }
    }
    
    public function delete($id) {
        if ($id) {
            $contatoDeletado = $this->contato->deletarContato($id);
            if ($contatoDeletado) {
                echo json_encode(["message" => "Contato deletado com sucesso"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Erro ao deletar contato"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "ID é necessário para deletar"]);
        }
    }
}