<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Eventos</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col min-h-screen justify-between">
    <?php
    include("templates/header.php");
    ?>
    <div class="w-2/3 mx-auto bg-gray-200 p-6">
      <div class="w-5/6 mx-auto rounded-md shadow-md p-6 bg-white mb-8">
        <h2 class=" text-2xl font-semibold mb-4">Bem Vindo <?= $_SESSION['user']['name'] ?>!
        </h2>
        <h1 class="text-xl font-semibold">Seus Eventos:</h1>
      </div>
      <div class="w-full flex justify-center space-x-8 ">
        <?php
        foreach ($events as $event) : ?>
          <div class=" box-border w-72 bg-white shadow-md rounded-lg overflow-hidden p-2">
            <div class="px-4 py-6 pl-6">
              <h2 class=" text-2xl font-semibold mb-2"><?= $event->name ?></h2>
              <p class="text-lg"><?= $event->address->publicPlace ?></p>
              <p class="text-lg"><?= $event->address->city ?>, <?= $event->address->state ?></p>
              <p class="text-lg"><?= formatDate($event->date) ?></p>
              <p class="text-lg"><?= $event->startTime ?></p>
            </div>
            <div class="mb-4 w-full flex justify-center space-x-2">
              <button type="button" class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-800" onclick="<?php $event->shareEvent() ?>">
                Compartilhar
              </button>
              <a type="button" class="bg-red-600 text-white rounded-md px-4 py-2 hover:bg-red-900" href="/myEvents/remove/<?= $event->cod_event ?>">
                Remover</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php
    include("templates/footer.html")
    ?>
  </div>
</body>

</html>