<?php
    //CABEÇALHO!
    header("Content-Type: application/json"); //define o tipo de resposta

    $metodo = $_SERVER['REQUEST_METHOD'];

    //Recupera o arquivo JSON
    $arquivo = 'usuarios.json';

    // Verifica se o arquivo existe, se NÃO, ele cria um array vazio
    if(!file_exists($arquivo)){
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    //LÊ O ARQUIVO JSON
    $usuarios = json_decode(file_get_contents($arquivo), true);

    switch ($metodo) {
        case 'GET':
            // Verifica se tem um parâmetro "id" na URL
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $usuario_encontrado = null;

                //Procura através do ID
                foreach ($usuarios as $usuario) {
                    if($usuario['id'] == $id){
                        $usuario_encontrado = $usuario;
                        break;
                    }
                }

                if ($usuario_encontrado) {
                    echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code(404);
                    echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                //Retorna todos os usuários
                echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            break;        

        case 'POST':
            $dados = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "Nome e email são obrigatórios!!"], JSON_UNESCAPED_UNICODE);
                exit;
            }

            //GEra um ID único
            $novo_id = 1;

            if (!empty($usuarios)) {
                $ids = array_column($usuarios, 'id');
                $novo_id = max($ids) + 1;
            }

            $novoUsuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            //Adiciona o novo USUÁRIO ao array existente
            $usuarios[] = $novoUsuario;

            //Salva o arquivo!
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            //Retorna a mensagem de confirmação :)
            echo json_encode([
                "mensagem" => "Usuário inserido com sucesso",
                "usuario" => $novoUsuario
            ], JSON_UNESCAPED_UNICODE);            
            break;        

        case 'DELETE':
            if(!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["erro" => "ID é obrigatório"], JSON_UNESCAPED_UNICODE);
                exit;
            }

            $id = intval($_GET['id']);
            $indice = -1;

            foreach ($usuarios as $i => $usuario) {
                if($usuario['id'] == $id){
                    $indice = $i;
                    break;
                }
            }

            if ($indice >= 0) {
                array_splice($usuarios, $indice, 1);
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode(["mensagem" => "Usuário removido com sucesso"], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
            }
            break;

        case 'PUT':
            if(!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["erro" => "ID é obrigatório"], JSON_UNESCAPED_UNICODE);
                exit;
            }

            $dados = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "Nome e email são obrigatórios!!"], JSON_UNESCAPED_UNICODE);
                exit;
            }

            $id = intval($_GET['id']);
            $usuario_atualizado = false;

            foreach ($usuarios as &$usuario) {
                if($usuario['id'] == $id){
                    $usuario['nome'] = $dados["nome"];
                    $usuario['email'] = $dados["email"];
                    $usuario_atualizado = true;
                    break;
                }
            }

            if ($usuario_atualizado) {
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode([
                    "mensagem" => "Usuário atualizado com sucesso",
                    "usuario" => $dados
                ], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
            }
            break;

        default:
            http_response_code(405); //metodo n permitido
            echo json_encode(["erro" => "Método não permitido"], JSON_UNESCAPED_UNICODE);
            break;        
    }

    
?>