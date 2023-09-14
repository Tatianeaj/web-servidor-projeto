<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col h-screen justify-between">
    <?php include('templates/header.php') ?>
    <div class="flex flex-col justify-center items-center">
      <?php if (isset($_SESSION['user'])) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-11" role="alert">
          <span class="block sm:inline">Você está logado como <?= $_SESSION['user']['email'] ?></span>
        </div>
      <?php endif; ?>
      <div class="flex flex-col w-full justify-center items-center">
        <h1 class="text-4xl font-semibold text-gray-800">Eventos em Destaque</h1>
        <div class="flex flex-row justify-between container">
          <?php foreach ($events_data as $event) : ?>
            <div class='box-border max-w-sm mx-auto mt-10 w-1/4 bg-white shadow-md rounded-lg overflow-hidden'>
              <div class="p-4 pl-10">
                <h2 class="text-2xl font-semibold"><?= $event['name'] ?></h2>
                <p><?= $event['publicPlace'] ?></p>
                <p><?= $event['city'] ?>, <?= $event['state'] ?></p>
                <p><?= formatDate($event['date']) ?></p>
                <p><?= $event['startTime'] ?></p>
              </div>
              <?php if (isset($_SESSION['user'])) : ?>
                <div class="flex justify-center items-center">
                  <a href="" class="bg-indigo-600 text-white rounded-md px-4 py-2 mb-4 hover:bg-indigo-800">
                    Inscrever-se
                  </a>
                </div>
              <?php else : ?>
                <div class="flex justify-center items-center">
                  <a href="index.php?page=login" class="bg-indigo-600 text-white rounded-md px-4 py-2 mb-4 hover:bg-indigo-800">
                    Entre para participar
                  </a>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div>
      <?php include('templates/footer.html') ?>
    </div>
  </div>
</body>

</html>