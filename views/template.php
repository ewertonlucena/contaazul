<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
        <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link href="<?php echo BASE_URL . "/assets/css/template.css"; ?>" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo BASE_URL . "/assets/js/jquery-3.1.1.min.js"; ?>" charset="ISO-8859-1"></script>
        <script type="text/javascript" src="<?php echo BASE_URL . "/assets/js/script.js"; ?>" charset="ISO-8859-1"></script>
    </head>
    <body>
        <div class="site">
            <div class="leftmenu">
                <div class="company_name">
                    <?php echo $viewData['company_name']; ?>
                </div>
                <div class="menuarea">
                    <ul>
                        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                        <li><a href="<?php echo BASE_URL . "/permissions"; ?>">Permissões</a></li>
                        <li><a href="<?php echo BASE_URL . "/users"; ?>">Usuários</a></li>

                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="top">
                    <div class="top-right">
                        <a href="<?php echo BASE_URL . "/login/logout"; ?>">Sair</a>
                    </div>
                    <div class="top-right"><?php echo $viewData['user_email']; ?></div>
                </div>
                <div class="area">
                    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                </div>
            </div>
        </div>
    </body>
</html>

