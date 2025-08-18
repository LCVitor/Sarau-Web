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

<h1>Eu sou a home</h1>