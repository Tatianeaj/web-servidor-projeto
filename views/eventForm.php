<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
<?php 
include('templates/header.html');
?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
      
        <h1 class="text-2xl font-semibold mb-4 mx-auto text-center">Cadastro de Evento</h1>
        <form > 
            <div class="mb-4">
                <label for="nome_evento" class="block text-gray-600">Nome do Evento:</label>
                <input type="text" id="nome_evento" name="nome_evento" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="data_evento" class="block text-gray-600">Data do Evento:</label>
                <input type="date" id="data_evento" name="data_evento" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="horario_evento" class="block text-gray-600">Horário do Evento:</label>
                <input type="time" id="horario_evento" name="horario_evento" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="logradouro" class="block text-gray-600">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="cidade" class="block text-gray-600">Cidade:</label>
                <input type="text" id="cidade" name="cidade" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="estado" class="block text-gray-600">Estado:</label>
                <input type="text" id="estado" name="estado" class="w-full border-gray-300 rounded-md p-2" >
            </div>
          
            <div class="mb-4 mx-auto text-center">
              
                <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-700">Cadastrar Evento</button>
            </div>
        </form>
    </div>
    <?php 
    include('templates/footer.html');
    ?>
</body>
</html>
