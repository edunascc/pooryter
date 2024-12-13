<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome'] ?? 'Não informado');
    $sobrenome = htmlspecialchars($_POST['sobrenome'] ?? 'Não informado');
    $foto = htmlspecialchars($_POST['foto'] ?? 'Não escolhido');
    $idade = htmlspecialchars($_POST['idade'] ?? 'Não informado');
    $genero = htmlspecialchars($_POST['genero'] ?? 'Não informado');
    $outroGenero = htmlspecialchars($_POST['outro-genero'] ?? '');
    $idioma = htmlspecialchars($_POST['idioma'] ?? 'Não informado');
    $outroIdioma = htmlspecialchars($_POST['outro-idioma'] ?? '');
    $email = filter_var($_POST['email'] ?? 'Não informado', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $notificacoes = isset($_POST['notificacoes']) ? 'Sim' : 'Não';
    $favoritos = htmlspecialchars($_POST['favorito'] ?? 'Não informado');
    $plano = htmlspecialchars($_POST['plano'] ?? 'Não informado');
    $dispositivos = htmlspecialchars($_POST['dispositivos'] ?? 'Não especificado');
    $outroDispositivo = htmlspecialchars($_POST['outro-dispositivo'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = "E-mail inválido";
    }
    $senhaMascarada = str_repeat('*', strlen($senha));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Cadastro - PobreFlix</title>
</head>
<body>
    <h1>PobreFlix - Dados do Cadastro</h1>

    <div class="dados-container">
        <p><strong>Nome:</strong> <?= $nome ?></p>
        <p><strong>Sobrenome:</strong> <?= $sobrenome ?></p>
        <p><strong>Foto de Perfil:</strong> <?= $foto ?></p>
        <p><strong>Data de Nascimento:</strong> <?= $idade ?></p>
        <p><strong>Género de Filme/Série Favorito:</strong> <?= $genero ?>
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

    <div class="botoes">
        <a href="index.html">
            <button type="button" onclick="return confirm('Você deseja realmente voltar ao cadastro? Suas informações não serão salvas.')">Voltar para o Cadastro</button>
        </a>
    </div>

    <script>
    </script>
</body>
</html>
