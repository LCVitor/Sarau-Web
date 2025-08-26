<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do participante</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= url("assets/css/_shered/theme.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/_shered/global.css"); ?>">
    <script type="module" src="<?= url("assets/js/app/home.js"); ?>" async></script>
    
    <?php if ($this->section("home")): ?>
        <?= $this->section("home"); ?>
    <?php endif; ?>

</head>
<body>
<nav class="navbar">
    <div class="user-greeting">
        <div class="user-photo">
            <img src="" alt="">
        </div>
        <span></span>
        <a href="http://localhost/Sarau-Web/app/logout" class="special"><i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>
    <div class="container-href">
        <a href="<?= url("/app/"); ?>">Home</a>
        <a href="<?= url("/app/eventos"); ?>">Eventos</a>
        <a href="<?= url("/app/inscrições"); ?>">Inscrições</a>
        <a href="<?= url("/app/perfil"); ?>">Perfil</a>
    </div>
    <div class="container-logo">
        <img src="#" alt="Logo legal aqui!">
    </div>
</nav>
<div id="toast-container"></div>
<div class="main-content">
    <?php
    echo $this->section("content");
    ?>
</div>
</body>
</html>