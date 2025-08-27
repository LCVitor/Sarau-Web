<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= url("assets/css/_shered/theme.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/_shered/global.css"); ?>">
    <script type="module" src="<?= url("assets/js/admin/home.js"); ?>" async></script>
    
    <?php if ($this->section("home")): ?>
        <?= $this->section("home"); ?>
    <?php endif; ?>
    
    <?php if ($this->section("events")): ?>
        <?= $this->section("events"); ?>
    <?php endif; ?>
</head>
<body>
<nav class="navbar">
    <div class="user-greeting">
        <div class="user-photo">
            <img src="" alt="">
        </div>
        <span></span>
        <a href="http://localhost/Sarau-Web/admin/logout" class="special"> <i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>
    <div class="container-href">
        <a href="<?= url("/admin/"); ?>">Home</a>
        <a href="<?= url("/admin/eventos"); ?>">Eventos</a>
        <a href="<?= url("/admin/perfil");?>">Perfil</a>
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