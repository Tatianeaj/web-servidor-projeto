<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col min-h-screen justify-between">
    <?php
    include('templates/header.php');
    ?>
    <div class="mx-auto container max-w-xl bg-white p-6 rounded-md shadow-md mb-4">
      <h1 class="text-2xl font-semibold mb-4 mx-auto text-center">Cadastro de Usuário</h1>
      <form action="index.php?page=userForm" method="POST" class="flex flex-col">
        <div class="mb-4">
          <label for="name" class="block text-gray-600">Nome:</label>
          <input type="text" id="name" name="name" value="<?= $oldFormName ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="birthdate" class="block text-gray-600">Data de Nascimento:</label>
          <input type="date" id="birthdate" name="birthdate" value="<?= $oldFormBirthdate ?>" class="w-full bg-gray-100 border-gray-300 border-2  rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-600">E-mail:</label>
          <input id="email" name="email" value="<?= $oldFormEmail ?>" class="bg-gray-100 w-full border-gray-300 border-2  rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-600">Senha:</label>
          <input type="password" id="password" name="password" class="bg-gray-100 w-full border-gray-300 border-2  rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="password_confirmation" class="block text-gray-600">Confirmação de Senha:</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-100 w-full border-gray-300 border-2  rounded-md p-2">
        </div>
        <?php if ($error) : ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= $error_message ?></span>
          </div>
        <?php endif; ?>
        <?php if ($sucess) : ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= $success_message ?></span>
          </div>
          <script>
            setTimeout(() => {
              window.location.href = 'index.php';
            }, 2500);
          </script>
        <?php endif; ?>
        <div class="mb-4 mx-auto text-center mt-4">
          <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-800 ">Cadastrar Usuário</button>
        </div>
      </form>
    </div>
    <?php
    include('templates/footer.html');
    ?>
  </div>
</body>

</html>