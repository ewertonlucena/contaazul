<html>
    <head>
        <title>Dashboard - <?php echo $viewData['company_name']; ?></title>
        <link href="../assets/css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <h1>Topo do meu site</h1>
        <?php 
            $this->loadViewInTemplate($viewName, $viewData)
        ?>
        <h2>Rodapé do meu site</h2>
    </body>
</html>

