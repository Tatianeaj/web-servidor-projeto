<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Eventos</title>
   
    <link href="caminho/para/seu/arquivo/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <?php 
    include("templates/header.php");
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Eventos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow-md">
       
        <h2 class="text-2xl font-semibold mb-4">Bem Vindo</h2>
        <h1 class="text-2xl font-semibold mb-4">Meus Eventos:</h1>

        <?php

        // Exibir os eventos
        foreach ($eventos as $evento) {
            echo '<div class="bg-white rounded-md p-4 shadow-md">';
            echo '<h3 class="text-lg font-semibold mb-2">' . $evento['nome'] . '</h3>';
            echo '<p>Data: ' . $evento['data'] . '</p>';
            echo '<p>Horário: ' . $evento['horario'] . '</p>';
            echo '</div>';
        }
        ?>

    </div>

    <?php 
    include("templates/footer.html")
    ?>
</body>

</html>
