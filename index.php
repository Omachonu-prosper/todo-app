<?php 
    // require Dotenv
    require 'vendor/autoload.php';
    if(getenv('ENVIRONMENT') == 'development') {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

    require_once './scripts/model.php';
   
    $tasks = fetchTasks();

    $user = [
        'id' => '1',
        'username' => 'John Doe',
        'email' => 'JohnDoe@todoapp.com',
        'password' => 'johndoe123',
        'join_date' => '01-06-2022'
    ];

?>

<?php require_once './templates/header.php' ?>
<?php require_once './templates/navbar.php' ?>

    <main>
        <div class="container mx-auto mt-5 pl-3 pr-3">
            <div class="form-box card mb-5">
                <div class="card-body">
                    <form method="post" action="./scripts/new_task.php" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="form-group mb-md-0 col-md-auto task-input">
                                <label class="sr-only" for="task-title">Task title</label>
                                <input type="text" class="form-control" id="task-title" name="title" placeholder="Task title" required>
                                <div class="invalid-feedback">
                                    Input can not be empty.
                                </div>
                            </div>

                            <div class="col-md-auto submit-task">
                                <button type="submit" name="submit" class="btn primary-background">Add Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="cards">
                <!-- Display All tasks -->
                <?php foreach($tasks as $task) { ?>
                    <div class="card task mb-4" data-id="<?php echo $task['id'] ?>">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title"><?php echo $task['task_title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Created <?php echo $task['create_date'] ?>
                                </h6>
                            </div>
                            
                            <div class="row text-center pt-3">
                                <div class="col">
                                    <a href="#" class="card-link task-icon">
                                        <i class="fa fa-trash trash"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#" class="card-link task-icon">
                                        <i class="fa fa-pencil pencil"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#" class="card-link task-icon">
                                        <i class="fa fa-check-square-o check"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>


<?php require_once './templates/footer.php' ?>
