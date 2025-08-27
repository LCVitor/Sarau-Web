<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("events");
?>
<script type="module" src=<?= url("assets/js/admin/events.js"); ?> async></script>
<link rel="stylesheet" href=<?= url("assets/css/admin/events.css"); ?>>
<?php
$this->end();
?>

<div class="title-area">
    <h1>Eventos</h1>
</div>

<div class="actions">
    <div class="event">
        <h3>Iniciar um novo evento</h3>
        <button class="button type-1">Novo evento</button>
        <div> Histórico (?!) </div>
    </div>
    <div class="enrollment">
        <h3>Incrições</h3>
        <p>Visualização e seleção dos inscritos</p>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descrição</th>
                        <th>Tempo de apresentação (min)</th>
                        <th>Setor</th>
                        <th>Artista</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="pagination">
                <button disabled>&laquo; Anterior</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>Próxima &raquo;</button>
            </div>
        </div>
    </div>
</div>