<?php 

    // Mock up Data  
    $tasks = [
        [
            'id' => '1',
            'title' => 'Wash the dishes',
            'status' => 'finished',
            'create_date' => '27-06-2022',
            'authors_id' => 1
        ],
        [
            'id' => '2',
            'title' => 'Run laps',
            'status' => 'unfinished',
            'create_date' => '27-06-2022',
            'authors_id' => 1
        ]
    ];

    $user = [
        'id' => '1',
        'username' => 'John Doe',
        'email' => 'JohnDoe@todoapp.com',
        'password' => 'johndoe123',
        'join_date' => '01-06-2022'
    ];

?>

<?php require_once './templates/header.php' ?>

   

<?php require_once './templates/footer.php' ?>