<?php
$hostname = "localhost";
$bancodedados = "clientes";
$usuario = "root"; 
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($mysqli->connect_error) {
    echo "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
else
 echo"Conectado ao Banco De Dados";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? 'Não informado';
    $sobrenome = $_POST['sobrenome'] ?? 'Não informado';
    $foto = $_POST['foto'] ?? 'Não selecionada';
    $idade = $_POST['idade'] ?? 'Não informada';
    $genero = $_POST['dispositivos'] ?? 'Não informado';
    $outroGenero = $_POST['outro-dispositivo'] ?? '';
    $idioma = $_POST['idioma'] ?? 'Não informado';
    $outroIdioma = $_POST['outro-idioma'] ?? '';
    $email = $_POST['email'] ?? 'Não informado';
    $senha = $_POST['senha'] ?? '';
    $senhaMascarada = str_repeat('*', strlen($senha));
    $notificacoes = isset($_POST['notificacoes']) ? 'Sim' : 'Não';
    $favoritos = [];
    for ($i = 1; $i <= 10; $i++) {
        if (isset($_POST["favorito-$i"])) {
            $favoritos[] = $_POST["favorito-$i"];
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = "E-mail inválido";
    }
    $senhaMascarada = str_repeat('*', strlen($senha));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Cadastro - PobreFlix</title>

    <style>
        body {
            background-image: url('netflix-background-image-25.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #E50914;
            font-size: 3.5em; 
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(1, 1, 1, 1.7); 
        }

        .dados-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #444;
            border-radius: 15px; 
            background-color: rgba(0, 0, 0, 0.6); 
            margin-top: 20px;
            text-align: left;
        }
        .dados-container p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .dados-container strong {
            font-weight: bold;
        }
        .botoes {
            margin-top: 10px; 
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .botoes button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #E50914;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .botoes button:hover {
            background-color: #d40812;
            transform: scale(1.1);
        }
        footer {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .rodape-barra {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            border-radius: 10px;
            border: 1px solid #444;
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 1em;
        }
        footer p {
            margin: 5px 0;
        }
        footer p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Dados do Cadastro</h1>
    <div class="dados-container">
        <p><strong>Nome:</strong> <?= $nome ?></p>
        <p><strong>Sobrenome:</strong> <?= $sobrenome ?></p>
        <p><strong>Foto de Perfil:</strong> <?= $foto ?></p>
        <p><strong>Data de Nascimento:</strong> <?= $idade ?></p>
        <p><strong>Gênero de Filme/Série Favorito:</strong> <?= $genero ?>
        <?php if ($genero == 'outro' && $outroGenero) echo "($outroGenero)"; ?></p>
        <p><strong>Idioma de Preferência:</strong> <?= $idioma ?>
        <?php if ($idioma == 'outro' && $outroIdioma) echo "($outroIdioma)"; ?></p>
        <p><strong>E-mail:</strong> <?= $email ?></p>
        <p><strong>Senha:</strong> <?= $senhaMascarada ?></p>
        <p><strong>Notificações:</strong> <?= $notificacoes ?></p>
        <p><strong>Filmes/Séries Favoritos:</strong> <?= $favoritos ?></p>
        <p><strong>Plano de Assinatura:</strong> <?= $plano ?></p>
        <p><strong>Dispositivos:</strong> <?= $dispositivos ?>
        <?php if ($dispositivos == 'outro' && $outroDispositivo) echo "($outroDispositivo)"; ?></p>
    </div>
    <br>
    <div class="botoes">
        <a href="index.html">
            <button type="button" onclick="return confirm('Você quer mesmo voltar ao cadastro? Suas informações não serão salvas')">Voltar para o Cadastro</button>
        </a>
    </div>
    <footer>
        <div class="rodape-barra">
            <p>PobreFlix, 2024.</p>
        </div>
    </footer>
</body>
</html>
