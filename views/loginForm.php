<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    
<?php 
include('templates/header.html');
?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Login de Usuário</h1>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-600">E-mail:</label>
                <input id="email" name="email" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="senha" class="block text-gray-600">Senha:</label>
                <input type="password" id="senha" name="senha" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Entrar</button>
            </div>
        </form>
    </div>
    <?php 
include('templates/footer.html');
?>
</body>
</html>
