<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("events");
?>
<script type="module" src=<?= url("assets/js/admin/home.js"); ?> async></script>
<link rel="stylesheet" href=<?= url("assets/css/app/home.css"); ?>>
<?php
$this->end();
?>

<div class="baguhlo"> Eventos </div>
<div>
    <h1>Bagulhos</h1>
</div>