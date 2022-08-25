<?php 
    session_start();

    require_once './scripts/model.php';

    $user = $_SESSION['user'];

    if (empty($user)) {
        // Redirect user to Authentication page if not logged in
        header('location: ./auth/login.php');
    }

    $tasks = fetchTasks($user['id']);

?>

<?php require_once './templates/header.php' ?>
<?php require_once './templates/navbar.php' ?>

    <main>
        <div id="confirm-delete" class="hidden confirm-dialogue">
            <div class="card" style="max-width: 30rem; width: 50vw">
                <div class="card-body">
                    <h5 class="card-title text-danger">This action can not be undone</h5>
                    <p class="card-text">You are about to delete a task</p>
                    
                    <form action="./scripts/delete_task.php" method="post" class="needs-validation" novalidate>
                        <div class="mt-3">
                            <input type="number" name="id" id="delete-task-id" class="d-none">
                            <button type="submit" name="delete_task_submit" class="btn primary-background mr-3">Delete Task</button>

                            <a href="#" class="card-link" id="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="edit-dialogue" class="hidden confirm-dialogue">
            <div class="card" style="max-width: 40rem; width: 60vw">
                <div class="card-body">
                    <h5 class="card-title text-warning">Edit task</h5>

                    <form action="./scripts/edit_task.php" method="post" class="needs-validation" novalidate>
                        <input type="number" name="id" id="edit-task-id" class="d-none">

                        <label class="sr-only" for="task-title">Task title</label>
                        <input type="text" class="form-control" id="edit-task-title" name="task_title" placeholder="Task title" required autocomplete="off">
                        <div class="invalid-feedback">
                            Input can not be empty.
                        </div>

                        <div class="mt-3">
                            <button type="submit" name="edit_task_submit" class="btn primary-background mr-3">Edit Task</button>
                            <a href="#" class="card-link" id="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mx-auto mt-5 pl-3 pr-3">
            <div class="form-box card mb-5">
                <div class="card-body">
                    <form method="post" action="./scripts/new_task.php" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="form-group mb-md-0 col-md-auto task-input">
                                <label class="sr-only" for="task-title">Task title</label>
                                <input type="text" class="form-control" id="task-title" name="task_title" placeholder="Task title" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Input can not be empty.
                                </div>
                            </div>

                            <div class="col-md-auto submit-task">
                                <button type="submit" name="new_task_submit" class="btn primary-background">Add Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="cards">
                <!-- Display this if no tasks in database -->
                <?php if(empty($tasks)) { ?>
                    <div class="no-task">
                        <!-- Image obtained from storyset.com  -->
                        <img src="./assets/images/add-tasks.png" alt="No tasks to show yet. Add a new task." title="No tasks to show yet. Add a new task.">
                        <p>No tasks to show yet.</p>
                    </div>
                <?php } ?>

                <!-- Display All tasks -->
                <?php foreach($tasks as $task) { ?>
                    <div class="card task mb-4" data-id="<?php echo htmlSpecialChars($task['id']);?>">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title"><?php echo htmlSpecialChars($task['task_title']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Created <?php echo htmlSpecialChars($task['create_date']); ?>
                                </h6>
                            </div>
                            
                            <div class="row text-center pt-3">
                                <div class="col">
                                    <a href="#" data-id="<?php echo htmlSpecialChars($task['id']);?>" class="card-link task-icon" onclick="deleteTask(this, event)">
                                        <i class="fa fa-trash trash"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#" class="card-link task-icon" data-id="<?php echo htmlSpecialChars($task['id']);?>" onclick="editTask(this, event)">
                                        <i class="fa fa-pencil pencil"></i>
                                    </a>
                                </div>
                                <!-- <div class="col">
                                    <a href="#" class="card-link task-icon">
                                        <i class="fa fa-check-square-o check"></i>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>


<?php require_once './templates/footer.php' ?>