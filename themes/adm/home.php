<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("home");
?>
<script type="module" src=<?= url("assets/js/admin/home.js"); ?> async></script>
<link rel="stylesheet" href=<?= url("assets/css/admin/home.css"); ?>>
<?php
$this->end();
?>

<div class="home-dashboard">

    <div class="card demo-card">
        <h2>Próximos Eventos</h2>
        <div class="card-content">
            <div class="event">
                <p class="event-name">Texto legal</p>
                <p class="event-date">dd/mm/aaaa</p>
            </div>
            <div class="event">
                <p class="event-name">Texto legal</p>
                <p class="event-date">dd/mm/aaaa</p>
            </div>
        </div>
        <button class="btn-card">Novo Evento</button>
    </div>

    <div class="card demo-card">
        <h2>Últimas Inscrições</h2>
        <div class="card-content">
            <div class="enrollment">
                <p class="enroll-name">Participante x</p>
                <p class="enroll-event">Texto legal</p>
            </div>
            <div class="enrollment">
                <p class="enroll-name">Participante x</p>
                <p class="enroll-event">Texto legal</p>
            </div>
        </div>
        <button class="btn-card">Ver Inscrições</button>
    </div>

    <div class="card demo-card">
        <h2>Gerenciar Usuários</h2>
        <div class="card-content">
            <p class="user-info">Usuários ativos: x</p>
            <p class="user-info">Administradores: x</p>
        </div>
        <button class="btn-card">Gerenciar Contas</button>
    </div>

    <div id="container-modal" class="modal-container">
        <div class="modal">
            <h2>Inscrições</h2>
            <div id="enrollments-list">
            </div>
            <button id="close-enrollments-modal" class="button type-3">Fechar</button>
        </div>
    </div>

</div>
