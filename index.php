<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="/dist/output.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <?php 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            echo $page;
        } else {
            $page = 'home';
        }
        include "controllers/$page.controller.php"
    ?>
</body>
</html>