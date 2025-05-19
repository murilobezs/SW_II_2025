<?php
    //variáveis para guardar o resultado da busca e possíveis erros (a de erro pedi ajuda para IA).
    $resultado = null;
    $erro = null;

    // Verifica se o formulário foi enviado
    if(isset($_POST['cep'])) {
        // Remove tudo que não for número do CEP (tipo traços e pontos, feito com auxilio de IA)
        $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);

        // Checa se o CEP tem 8 dígitos (formato correto)
        if(strlen($cep) !== 8) {
            $erro = "Por favor, digite um CEP válido com 8 dígitos numéricos.";
        } else {
            $url = "https://viacep.com.br/ws/{$cep}/json/";
            $response = file_get_contents($url);
            $resultado = json_decode($response, true);
            
            // Se a API retornar erro, mostra mensagem pro usuário
            if(isset($resultado['erro'])) {
                $erro = "CEP não encontrado. Verifique o número digitado.";
                $resultado = null;
            }
        }
    }
?>


<!-- frontend feito usando cdn do bootstrap. -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Consulta de CEP</h1>
            </div>
            <div class="card-body">
                <form method="POST" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="cep" class="form-control" placeholder="Digite o CEP (ex: 09407400)" maxlength="9" required>
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </form>

                <?php if($erro): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $erro; ?>
                    </div>
                <?php endif; ?>

                <?php if($resultado): ?>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>CEP:</strong> <?php echo $resultado['cep']; ?></li>
                            <li class="list-group-item"><strong>Logradouro:</strong> <?php echo $resultado['logradouro']; ?></li>
                            <li class="list-group-item"><strong>Bairro:</strong> <?php echo $resultado['bairro']; ?></li>
                            <li class="list-group-item"><strong>Cidade:</strong> <?php echo $resultado['localidade']; ?></li>
                            <li class="list-group-item"><strong>UF:</strong> <?php echo $resultado['uf']; ?></li>
                            <li class="list-group-item"><strong>Estado:</strong> <?php echo $resultado['estado']; ?></li>
                            <li class="list-group-item"><strong>Região:</strong> <?php echo $resultado['regiao']; ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>