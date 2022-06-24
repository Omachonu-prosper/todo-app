<<?php 

$tasks = [
  [
    'id' => '1',
    'title' => 'Wash the dishes'
  ],
  [
    'id' => '2',
    'title' => 'Do laundry'
  ],[
    'id' => '3',
    'title' => 'Make dinner'
  ]
]

?>

<?php require_once './templates/header.php' ?>

   <div class="mr-auto ml-auto mt-5" style="max-width: 50rem">
     <div class="card">
      <div class="card-header">
        <form action="", method="post" style="display: flex; justify-content: space-between;">
          <div class="form-group" style="display: inline-block; width: 77%">
            <label class="sr-only" for="inlineFormInput">Title</label>
            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe" required>
          </div>

            <button type="submit" class="btn btn-primary mb-2" style="width: 20%">Add Task</button>
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
              <div class="card-body" data-id="<?php echo $task['id'] ?>">
                <h5 class="card-title"><?php echo $task['title'] ?></h5>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-warning">Update</a>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
   </div>

<?php require_once './templates/footer.php' ?>