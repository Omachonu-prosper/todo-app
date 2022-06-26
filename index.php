<?php 
  
  $tasks = [
    ['id' => '1', 'title' => 'Wash the dishes'],
    ['id' => '2', 'title' => 'Do laundry'],
    ['id' => '3', 'title' => 'Make dinner']
  ];

  // Form was submitted
  if(isset($_POST['submit'])) {
    // Add new task to tasks array 
    $new_task = [
      'id' => count($tasks),
      'title' => $_POST['task-title']
    ];

    array_push($tasks, $new_task);
  }

?>

<?php require_once './templates/header.php' ?>

   <div class="mr-auto ml-auto mt-5" style="max-width: 50rem">
     <div class="card">
      <div class="card-header">
        <form action="" method="post" class="row">
          <div class="form-group col-10 mb-0">
            <label class="sr-only" for="inlineFormInput">Task Title</label>
            <input type="text" class="form-control" id="inlineFormInput" placeholder="Task title" name="task-title" required>
          </div>

            <button type="submit" name="submit" class="btn btn-primary col-2">Add Task</button>
        </form>
      </div>

      <div class="card-body">
        <?php if(empty($tasks)) { ?>
          <div class="card-text text-center">
            Tasks you add will show up here
          </div>
        <?php } else { ?>
          <?php foreach($tasks as $task) { ?>
            <div class="card">
              <div class="card-body row align-items-center" data-id="<?php echo $task['id'] ?>">
                <h5 class="card-title mb-0 col-10"><?php echo $task['title'] ?></h5>

                <div class="col-2" style="display: flex; justify-content: space-between;">
                  <a href="#" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>

                  <a href="#" class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
   </div>

<?php require_once './templates/footer.php' ?>