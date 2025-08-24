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
    <div class="info primary">Próximo Sarau Cultural: xx/xx/xxxx</div>
    <button id="enrollment-btn" class="button type-3 special">INSCREVER-SE</button>
</div>

<div class="section secondary">
    <div class="info secondary">Coisa aqui!</div>
    <div class="info secondary">Coisa Aqui!</div>
    <div class="info special">Coisa aqui!</div>
</div>

<div class="notification">Notificações aqui!</div>

<div id="container-modal">
        <div class="modal">
            <h1>Inscrição</h1>
            <p>Preencha as informações abaixo para garantir sua presença!</p>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form" class="form">
                <!-- <div class="area">
                    <label>Nome *</label>
                    <input type="text" placeholder="Seu nome" name="name" class="input type-1" id="name">
                </div>
                
                <div class="area">
                    <label>E-mail *</label>
                    <input type="email" placeholder="Email@gmail.com" name="email" class="input type-1" id="email">
                </div>

                <div class="area">
                    <label>Gênero *</label>
                    <select required class="input type-1" name="gender" id="gender">
                        <option value="" disabled selected hidden>Escolher...</option>
                        <option value="FEMALE">Feminino</option>
                        <option value="MALE">Masculino</option>
                        <option value="OTHER">Outro(a)</option>
                        <option value="PREFER_NOT_TO_SAY">Prefiro não dizer</option>
                    </select>
                </div>
                
                <div class="area">
                    <label>Número de celular *</label>
                    <input type="text" placeholder="(51) 98765-4321" name="phone" class="input type-1" id="phone">
                </div>

                <div class="area">
                    <label>Data de nascimento *</label>
                    <input type="date" name="birht_date" class="input type-1" id="birth_date">
                </div> -->

                <div class="area">
                    <label>Duração da apresentação (Em min) *</label>
                    <input type="number" name="presentation_time" class="input type-1" id="presentation_time" min="1" step="1" required>
                </div>

                <div class="area">
                    <label>Descrição *</label>
                    <input type="text" name="observation" placeholder="Descreva brevemente sua apresentação." class="input type-1" id="observation">
                </div>

                <div class="area">
                    <label>Setor *</label>
                    <select required class="input type-1" name="sector" id="sector">
                        <option value="" disabled selected hidden>Escolher...</option>
                        <option value="1">Música</option>
                        <option value="2">Dança</option>
                        <option value="3">Teatro</option>
                        <option value="4">Exposição</option>
                    </select>
                </div>

                <input type="submit" class="button type-3" value="FINALIZAR">
            </form>
        </div>
    </div>