<?php
    echo $this->layout("_theme");
?>
<?php
$this->start("profile");
?>
<link rel="stylesheet" href=<?= url("assets/css/_shared/global.css"); ?>>
<script type="module" src="<?= url("assets/js/app/profile.js"); ?>"></script>
<?php
$this->end();
?>
<h1>Perfil do Usuário</h1>
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
        <h2>Atualizar perfil</h2>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" id="nowName" class="input type-1">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="nowEmail" name="email" class="input type-1">
        </div>
        <div class="form-group">
            <br>
            <button type="submit" class="button type-3">Atualizar Perfil</button>
        </div>
    </form>
    <form id="complete-profile" class="private-area">
        <h2>Completar perfil</h2>
        <div class="form-group">
            <label>Gênero</label>
            <select class="input type-1" name="gender" id="gender">
                <option value="MALE">Masculino</option>
                <option value="FEMALE">Feminino</option>
                <option value="OTHER">Outro</option>
                <option value="PREFER_NOT_TO_SAY">Prefiro não informar</option>
            </select>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" id="phone" name="phone" class="input type-1">
        </div>
        <div class="form-group">
            <label>Data de nascimento</label>
            <input type="date" id="date" name="date" class="input type-1">
            <br>
            <button type="submit" class="button type-3">Atualizar Perfil</button>
        </div>
    </form>
</div>