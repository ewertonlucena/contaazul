<html>
    <head>
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link href="../assets/css/template.css" rel="stylesheet"/>
        <script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/script.js"></script>
    </head>
    <body>
        <div class="leftmenu">
            <div class="company_name">
                <?php echo $viewData['company_name']; ?>
            </div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL."/permissions"; ?>">Permissões</a></li>

                </ul>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top-right">
                    <a href="<?php echo BASE_URL."/login/logout"; ?>">Sair</a>
                </div>
                <div class="top-right"><?php echo $viewData['user_email']; ?></div>
            </div>
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>
    </body>
</html>

