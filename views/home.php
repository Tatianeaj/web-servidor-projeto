<?php
    $events_data = [
        [
            'place' => 'São Paulo',
            'nome' => 'Festa do Peão',
            'data' => '20/10/2020',
            'horario' => '20:00',
        ],
        [
            'place' => 'São Paulo',
            'nome' => 'Festa do Jão',
            'data' => '20/10/2020',
            'horario' => '20:00',
        ],
        [
            'place' => 'São Paulo',
            'nome' => 'Pamonhaço',
            'data' => '20/10/2020',
            'horario' => '20:00',
        ]
    ];
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
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col w-full justify-center items-center"> 
            <h1 class="text-4xl font-semibold text-gray-800">Eventos em Destaque</h1>
            <div class="flex flex-row justify-between w-10/12">
                <?php foreach($events_data as $event): ?>
                    <div class='box-border max-w-sm mx-auto mt-10 w-1/4 bg-white shadow-md rounded-lg overflow-hidden'>
                        <div class="p-4">
                            <h2 class="text-2xl font-semibold"><?= $event['nome'] ?></h2>
                            <p><?= $event['place'] ?></p>
                            <p><?= $event['data'] ?></p>
                            <p><?= $event['horario'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>