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
<body>    
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

    <div id="container-modal-type-1" id="info-area">
        <div class="modal">
            <h1>Informações</h1>
            <button id="close-btn" class="button type-2">&times;</button>
            <div id="event-info">
                <section class="user-info">
                    <h2>Participante</h2>
                    <div class="columns">
                        <div class="column" id="user-name"></div>
                        <div class="column" id="user-email"></div>
                        <div class="column" id="user-gender"></div>
                        <div class="column" id="user-birth"></div>
                        <div class="column" id="user-phone"></div>
                    </div>
                </section>

                <section class="enrollment-info">
                    <h2>Inscrição</h2>
                    <div class="columns">
                        <div class="column" id="event-name"></div>
                        <div class="column" id="event-date"></div>
                        <div class="column" id="sector-name"></div>
                        <div class="column" id="presentation-time"></div>
                        <div class="column" id="observation"></div>
                        <div class="column" id="status"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="container-modal" id="defer-area">
        <div class="modal">
            <h1>Indeferir inscrição</h1>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form-d" class="form">
                <p>AVISO: Incrições indeferidas só poderam ser acessados denovo caso o apresentador o reenvie. Indeferir uma inscrição é permanente.</p>
                <label>Motivo: </label>
                <textarea name="text"></textarea>
                <input type="submit" class="button type-3" value="Indeferir">
            </form>
        </div>
    </div>
</body>