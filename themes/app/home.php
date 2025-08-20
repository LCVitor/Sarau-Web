<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("home");
?>
<script type="module" src=<?= url("assets/js/app/home.js"); ?> async></script>
<link rel="stylesheet" href=<?= url("assets/css/app/home.css"); ?>>
<?php
$this->end();
?>

<div class="section primary">
    <div class="info primary">Alguma coisa legal!</div>
    <button class="button type-3 special">INSCREVER-SE</button>
</div>

<div class="section secondary">
    <div class="info secondary">Coisa aqui!</div>
    <div class="info secondary">Coisa Aqui!</div>
    <div class="info special">Coisa aqui!</div>
</div>

<div class="notification">Notificações aqui!</div>