<?php
function subscribe($event, $events_data)
{
  $index = array_search($event, $events_data);
  $events_data[$index]['users'][] = $_SESSION['user']['email'];
}

function isSubscribed($event)
{
  foreach ($event['users'] as $user) {
    if ($user == $_SESSION['user']['email']) {
      return true;
    }
  }
  return false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="flex flex-col min-h-screen justify-between">
    <?php include('templates/header.php') ?>
    <div class="flex flex-col justify-center items-center">
      <?php if (isset($_SESSION['user'])) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
          <span class="block sm:inline">Você está logado como <?= $_SESSION['user']['email'] ?></span>
        </div>
      <?php endif; ?>
      <div class="flex flex-col w-full justify-center items-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-10">Eventos em Destaque</h1>
        <div class="flex flex-row flex-wrap max-w-5xl">
          <?php foreach ($events_data as $event) : ?>
            <div class='box-border mb-6 w-72 ml-8 bg-white shadow-md rounded-lg overflow-hidden'>
              <div class="py-6 pl-10">
                <h2 class="text-2xl font-semibold mb-2"><?= $event->name ?></h2>
                <p class="text-lg"><?= $event->address->publicPlace ?></p>
                <p class="text-lg"><?= $event->address->city ?>, <?= $event->address->state ?></p>
                <p class="text-lg"><?= formatDate($event->date) ?></p>
                <p class="text-lg"><?= $event->startTime ?></p>
              </div>
              <?php if (isset($_SESSION['user'])) : ?>
                <?php if ($event->isUserSubscribed($_SESSION['user']['cod_user'])) :
                ?>
                  <div class="flex justify-center items-center">
                    <button class="bg-indigo-800 text-white rounded-md px-6 py-2 mb-4" disabled>
                      Inscrito
                    </button>
                  </div>

                <?php else : ?>
                  <div class="flex justify-center items-center">
                    <a href="/myEvents/add/<?= $event->cod_event ?>" class="bg-indigo-600 text-white rounded-md px-4 py-2 mb-4 hover:bg-indigo-800">
                      Inscrever-se
                    </a>
                  </div>
                <?php endif; ?>
              <?php else : ?>
                <div class="flex justify-center items-center">
                  <a href="/login" class="bg-indigo-600 text-white rounded-md px-4 py-2 mb-4 hover:bg-indigo-800">
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