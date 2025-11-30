<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sarau Web</title>
    <link rel="stylesheet" href="<?= url("assets/css/_shared/main.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/_shared/global.css"); ?>">
    <script type="module" src="<?= url("assets/js/web/login.js"); ?>" async></script>
    <script type="module" src="<?= url("assets/js/web/registragion.js"); ?>" async></script>
    <script type="module" src="<?= url("assets/js/web/util.js"); ?>" async></script>
</head>
<body> 
    <div id="section">
        <div id="creation-background"></div>

        <div id="primary">
            <div id="container-logo">
                <img src="<?= url("assets/img/saraulogo.png")?>" alt="Logo bem legal aqui!">
            </div>
            <div id="functions">
                <button id="login-btn" class="button type-1">LOGIN</button>
                <button id="registration-btn" class="button type-1">CADASTRO</button>
            </div>
        </div>
        <div id="second">
            <img src="<?= url("assets/img/saraulogo.png")?>">
            <p>Instituto Federal Sul-rio-grandense Campus Charqueadas</p>
            <h3>17 - 19 Outubro 2025</h3>
        </div>
    </div>
    
    <div class="content type-1">
        <div id="container-imgs">
            <img id="model" src="assets/img/img1.jfif" alt="#">
        </div>
        <div id="description">
            <p>Venha participar do maior evento cultural da cidade de Charqueadas! Junte-se a nós e venha demonstrar seus talentos.</p>
        </div>
    </div>

    <div id="container-modal">
        <div class="modal">
            <h1>Login</h1>
            <p>Preencha as informações abaixo para acessar o sistema!</p>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form-login" class="form">
                <div class="area">
                    <label>E-mail</label>
                    <input type="email" placeholder="Email para login" name="email" class="input type-1" id="email">
                </div>

                <div class="area">
                    <label>Senha</label>
                    <input type="password" placeholder="Senha para login" name="password" class="input type-1" id="password">
                </div>

                <input type="submit" class="button type-3" value="ENTRAR">
            </form>
        </div>
    </div>

    <div id="container-modal-type-1">
        <div class="modal">
            <h1>Cadastro</h1>
            <p>Preencha as informações abaixo para criar sua conta!</p>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form-registration" class="form">
                <div class="area">
                    <label>Name</label>
                    <input type="text" placeholder="Nome de usuário" name="name" class="input type-1" id="name">
                </div>
                
                <div class="area">
                    <label>E-mail</label>
                    <input type="email" placeholder="Endereço de e-mail" name="email" class="input type-1" id="email">
                </div>

                <div class="area">
                    <label>Senha</label>
                    <input type="password" placeholder="Digite uma senha" name="password" class="input type-1" id="password">
                </div>

                <div class="area">
                    <label>Confirmação de senha</label>
                    <input type="password" placeholder="Confirme sua senha..." name="passwordConfirm" class="input type-1" id="password">
                </div>

                <input type="submit" class="button type-3" value="ENTRAR">
            </form>
        </div>
    </div>

    <div id="toast-container"></div>
    
    <footer>
        <p>© 2025 Sarau Web. Todos os direitos reservados.</p>
    </footer>
</body>
</html>