<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("specific-script");
?>
<link rel="stylesheet" href=<?= url("assets/css/app/global.css"); ?>>
<script type="module" src="<?= url("assets/js/app/profile.js"); ?>"></script>
<?php
$this->end();
?>
<h1>Perfil do Usuário</h1>

<!-- Formulário para alteração do Perfil do Usuário
  Nome, E-mail, Senha e Foto.
-->

<div class="private-area">
    <form id="form-photo" enctype="multipart/form-data">
        <div class="form-group">
            <div class="user-photo">
                <img src="" alt="">
            </div>
            <label for="foto">Foto:</label>
            <input type="file" accept="image/*" id="photo" name="photo" class="input type-1">
            <br>
            <button type="submit" class="button type-3">Atualizar Foto</button>
        </div>
    </form>
    <form id="profile" class="private-area">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="name" name="name" class="input type-1">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="input type-1">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="address" name="address" value="dfghnm" class="input type-1">
            <br>
            <button type="submit" class="button type-3">Atualizar Perfil</button>
        </div>
    </form>
</div>