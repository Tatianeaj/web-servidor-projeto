<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login de Usuário</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col h-screen justify-between">
    <?php
    include('templates/header.php');
    ?>
    <?php
    if (isset($_SESSION['user'])) : ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">Você está logado como <?= $_SESSION['user']['email'] ?></span>
      </div>
    <?php else : ?>
      <div class="max-w-md mx-auto container bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4 text-center">Login de Usuário</h1>
        <form action="index.php?page=login" method="POST" class="flex flex-col w-full">
          <div class="mb-4">
            <label for="email" class="block text-gray-600">E-mail:</label>
            <input id="email" name="email" value="<?= $oldEmail ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
          </div>
          <div class="mb-4">
            <label for="senha" class="block text-gray-600">Senha:</label>
            <input type="password" id="senha" name="senha" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2 ">
          </div>
          <?php if ($error) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <span class="block sm:inline"><?= $error_message ?></span>
            </div>
          <?php endif; ?>
          <div class="mb-4 mt-4 w-full flex justify-center space-x-6">
            <button type="submit" class="bg-indigo-600 text-white rounded-md px-6 py-2 hover:bg-indigo-800">Entrar</button>
            <button type="button" class="bg-green-700 text-white rounded-md px-4 py-2 hover:bg-green-900" onclick="window.location.href='index.php?page=userForm'">Registrar</button>
          </div>
        </form>
      </div>
    <?php endif; ?>
    <?php
    include('templates/footer.html');
    ?>
  </div>
</body>

</html>