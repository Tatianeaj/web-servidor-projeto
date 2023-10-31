<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Eventos</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col min-h-screen justify-between">
    <?php
    include('templates/header.php');
    ?>
    <div class="mx-auto container max-w-xl bg-white p-6 rounded-md shadow-md mb-4">

      <h1 class="text-2xl font-semibold mb-4 mx-auto text-center">
        <?php if (isset($cod_event)) : ?>
          Editar Evento
        <?php else : ?>
          Cadastrar Evento
        <?php endif; ?>
      </h1>
      <form action="<?php
                    if (isset($cod_event)) {
                      echo "/events/adit/" . $cod_event;
                    } else {
                      echo "/newEvent";
                    }
                    ?>
      " method="POST" class="flex flex-col">
        <div class="mb-4">
          <label for="name" class="block text-gray-600">Nome do Evento:</label>
          <input type="text" id="name" name="name" value="<?= $oldEventName ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="date" class="block text-gray-600">Data do Evento:</label>
          <input type="date" id="date" name="date" value="<?= $oldDate ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="startTime" class="block text-gray-600">Horário de Início do Evento:</label>
          <input type="time" id="startTime" name="startTime" value="<?= $oldStartTime ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="publicPlace" class="block text-gray-600">Logradouro:</label>
          <input type="text" id="publicPlace" name="publicPlace" value="<?= $oldPublicPlace ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="city" class="block text-gray-600">Cidade:</label>
          <input type="text" id="city" name="city" value="<?= $oldCity ?>" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
        </div>
        <div class="mb-4">
          <label for="state" class="block text-gray-600">Estado:</label>
          <select id="state" name="state" class="w-full border-gray-300 bg-gray-100 border-2 rounded-md p-2">
            <option value="">Selecione o estado</option>
            <?php foreach ($states as $key => $value) : ?>
              <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php if ($error) : ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= $error_message ?></span>
          </div>
        <?php endif; ?>

        <?php if ($success) : ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= $success_message ?></span>
          </div>
          <script>
            setTimeout(() => {
              window.location.href = '/events';
            }, 2500);
          </script>
        <?php endif; ?>

        <div class="mb-4 mx-auto text-center mt-4">
          <button type="submit" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-800 ">
            <?php if (isset($cod_event)) : ?>
              Editar Evento
            <?php else : ?>
              Cadastrar Evento
            <?php endif; ?>
          </button>
        </div>
      </form>
    </div>
    <?php
    include('templates/footer.html');
    ?>
  </div>
</body>

</html>