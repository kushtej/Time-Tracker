
// Disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          let username = $('#username').val()
          if(username.trim().length <5){
            console.log("short")
            // event.preventDefault();
            // event.stopPropagation();
          }
          if (form.checkValidity() === false) {
            // event.preventDefault();
            // event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

