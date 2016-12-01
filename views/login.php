<html>
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
        <link href="../assets/css/login.css" rel="stylesheet" />
    </head>
    <body>
        <div class="loginarea">
            <form method="POST">
                <input Type="email" name="email" placeholder="Digite ser e-mail"/>
                <input Type="password" name="password" placeholder="Digite sua senha"/>
                <input Type="submit" name="Entrar" />
                <br/>
                <?php if (isset($error) && !empty($error)): ?>
                <div class="warning"><?php echo $error; ?></div>
                <?php endif; ?>
            </form>
            
        </div>
    </body>
</html>

