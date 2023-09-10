<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <!-- Inclua o arquivo CSS do Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <?php 
    include('templates/header.html');
    ?>
    <div class="max-w-md mx-auto bg-gray-200 p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4 mx-auto text-center">Cadastro de Usuário</h1>
        <form>
            <div class="mb-4">
                <label for="nome" class="block text-gray-600">Nome:</label>
                <input type="text" id="nome" name="nome" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="data_nascimento" class="block text-gray-600">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600">E-mail:</label>
                <input id="email" name="email" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4">
                <label for="senha" class="block text-gray-600">Senha:</label>
                <input type="password" id="senha" name="senha" class="w-full border-gray-300 rounded-md p-2" >
            </div>
            <div class="mb-4 mx-auto text-center" >
                <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-600 " >Cadastrar Usuário</button>
            </div>
        </form>
    </div>
    <?php 
    include('templates/footer.html');
    ?>
</body>
</html>
