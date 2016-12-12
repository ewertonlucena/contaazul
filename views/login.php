<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
        <title>Login</title>
        <link href="../assets/css/login.css" rel="stylesheet" />
    </head>
    <body>
        <div class="loginarea">
            <form method="POST">
                E-mail
                <input Type="email" name="email" placeholder="Digite ser e-mail"/>
                Senha
                <input Type="password" name="password" placeholder="Digite sua senha"/>
                <input Type="submit" value="Entrar" />
                <br/>
                <?php if (isset($error) && !empty($error)): ?>
                <div class="warning"><?php echo $error; ?></div>
                <?php endif; ?>                
            </form>
            
        </div>
    </body>
</html>

