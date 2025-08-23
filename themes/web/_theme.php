<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sarau Web</title>
    <link rel="stylesheet" href="<?= url("assets/css/_shered/theme.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/_shered/global.css"); ?>">
    <script type="module" src="<?= url("assets/js/web/login.js"); ?>" async></script>
</head>
<body> 
    <div id="section">
        <div id="creation-background"></div>

        <div id="primary">
            <div id="container-logo">
                <img src="#" alt="Logo bem legal aqui!">
            </div>
            <div id="functions">
                <button id="login-btn" class="button type-1">ENTRAR</button>
            </div>
        </div>
        <div id="second">
            <h1>Título legal bem aqui!</h1>
        </div>
    </div>
    
    <div class="content type-1">
        <div class="section">
            Coisas aqui!
        </div>
        <div class="section">
            Coisas aqui!
        </div>
    </div>

    <div id="container-modal">
        <div class="modal">
            <h1>Login</h1>
            <p>Preencha as informações abaixo para acessar o sistema!</p>
            <button id="close-btn" class="button type-2">&times;</button>
            <form id="form" class="form">
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

    <div id="toast-container"></div>
    
    <footer>
        <p>© 2025 Sarau Web. Todos os direitos reservados.</p>
    </footer>
</body>
</html>