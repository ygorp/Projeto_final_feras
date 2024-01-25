<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Feras Tecnologia</title>

    <link rel="stylesheet" href="/css/login.css">

</head>
<body>
    <main>
        <div class="container">
            <div class="login">
                <div class="login__logo">
                    <img src="/img/logo.png" alt="Logo Feras Tecnologia">
                </div>
                
                <div class="login__form">
                    <form action="/database/processar_login.php" method="POST">
                    <p>Bem-vindo</p>
                        <div class="login__form__group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
                        </div>
                        <div class="login__form__group">
                            <label for="password">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="cad">
                        <a href="/pages/cad_usuario.php" class="login_cad">Cadastre-se</a>
                        </div>
                        <div class="login__form__group">
                            <button type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>