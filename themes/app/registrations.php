<?php

    echo $this->layout("_theme");
?>
<?php
$this->start("registration");
?>
<link rel="stylesheet" href=<?= url("assets/css/_shared/global.css"); ?>>
<link rel="stylesheet" href=<?= url("assets/css/app/registration.css"); ?>>
<link rel="stylesheet" href=<?= url("assets/css/_shared/main.css"); ?>>
<script type="module" src="<?= url("assets/js/app/registration.js"); ?>"></script>
<?php
$this->end();
?>

<div id="container-h1">
    <h1>Inscrições</h1>
</div>
<div id="container-cards"></div>