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
    <div class="info primary">Próximo Sarau Cultural: 17/10/2025</div>
    <button id="enrollment-btn" class="button type-3 special">INSCREVER-SE</button>
</div>

<div class="section secondary">
    <div class="info secondary">Coisa aqui!</div>
    <div class="info secondary">Coisa Aqui!</div>
    <div class="info special">Coisa aqui!</div>
</div>

<div class="section third">
    <span class="notification">Notificação Importante <b id="notif-close">X</b></span>
</div>

<div id="container-modal">
        <div class="modal">
            <h1>Inscrição</h1>
            <p>Preencha as informações abaixo para garantir sua presença!</p>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form" class="form">
                <div class="area">
                    <label>Nome</label>
                    <input type="text" class="input type-1 fix" id="name" readonly>
                </div>
                
                <div class="area">
                    <label>E-mail</label>
                    <input type="email" class="input type-1 fix" id="email" readonly>
                </div>

                <div class="area">
                    <label>Gênero</label>
                    <input type="text" class="input type-1 fix" id="gender" readonly>
                </div>
                
                <div class="area">
                    <label>Número de celular</label>
                    <input type="text" class="input type-1 fix" id="phone" readonly>
                </div>

                <div class="area">
                    <label>Data de nascimento</label>
                    <input type="date" class="input type-1 fix" id="birth_date" readonly>
                </div>

                <div class="area">
                    <label>Descrição*</label>
                    <input type="text" name="observation" placeholder="Descreva brevemente sua apresentação." class="input type-1" id="observation">
                </div>
                
                <div class="area">
                    <label>Setor*</label>
                    <select required class="input type-1" name="sector" id="sector">
                        <option value="0" disabled selected hidden>Escolher...</option>
                        <option value="1">Música</option>
                        <option value="2">Dança</option>
                        <option value="3">Teatro</option>
                        <option value="4">Exposição</option>
                    </select>
                </div>
                
                <div class="area">
                    <label>Duração da apresentação (Em min)*</label>
                    <input type="number" name="presentation_time" class="input type-1" id="presentation_time" min="1" step="1" required>
                </div>

                <input type="submit" class="button type-3" value="FINALIZAR">
            </form>
        </div>
    </div>