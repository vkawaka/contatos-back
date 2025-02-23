<?php
/**
 * Esse arquivo configura e gerencia as rotas da api. Data de início: 19/02/2025.
 */

class Rotas {
    private $rotas = [];

    public function add($method, $rota, $callback) {
        $this->rotas[] = [
            'method' => strtoupper($method),
            'rota' => $rota,
            'callback' => $callback
        ];
    }

    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
    
        $uri = str_replace("/alphacode-api/public", "", $uri);
    
        foreach ($this->rotas as $rota) {
            $pattern = preg_replace('/\/:id/', '/(\d+)', $rota['rota']); 
    
            if ($rota['method'] === $method && preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                array_shift($matches);
                call_user_func_array($rota['callback'], $matches);
                return;
            }
        }
    
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
    }   
}
?>
