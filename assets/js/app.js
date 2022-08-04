// Confirm if the password matches the confirm password
function confirmPassword() {
  // There is a signup form on the page
  if(document.forms.signup) {
    let password = document.querySelector('#password');
    let confirmationPassword = document.querySelector('#confirm-password');

    // Password Match or Mismatch
    if(password.value === confirmationPassword.value) {
      confirmationPassword.setCustomValidity('');
    } 
    else {
      confirmationPassword.setCustomValidity('invalid');
    }
  } 
  else {
    return;
  }
}

// Handle validation for all forms on the page
(() => {
    'use strict';

    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        // Check if confirm password matches the entered password
        confirmPassword();

        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function deleteTask(element, event) {
  event.preventDefault();
  let confirmDelete = document.querySelector('#confirm-delete');

  // Show the confirmation box
  confirmDelete.classList.add('shown');
  confirmDelete.classList.remove('hidden');

  // Listen for a click outside the box to close it
  confirmDelete.addEventListener('click', (e) => {
    if(e.target.id === 'confirm-delete') {
      // Close the box
      confirmDelete.classList.remove('shown');
      confirmDelete.classList.add('hidden');
    } 
    else if(e.target.id === 'delete') {
      let id = element.dataset.id;
      const data = {
        deleteTask: true,
        id
      }

      // Send request to delete task
      fetch('http://localhost/todo-app/scripts/delete_task.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
      })
      .then(res => { 
        res.json()
      })
      .then(data => { 
        window.location.reload();
      })
      .catch(error => { 
        console.log(error) 
      })
    } else if (e.target.id === 'cancel') {
      // Close the box
      confirmDelete.classList.remove('shown');
      confirmDelete.classList.add('hidden');
    }
  })

  return
}