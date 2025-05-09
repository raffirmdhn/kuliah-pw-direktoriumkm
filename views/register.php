<!--
=========================================================
Login Form Bootstrap 1
=========================================================

Product Page: https://uifresh.net
Copyright 2021 UIFresh (https://uifresh.net)
Coded by UIFresh

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="./assets-auth/img/favicon.png">
  <link rel="stylesheet" href="./assets-auth/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="./assets-auth/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets-auth/css/uf-style.css">
  <title>Register</title>
</head>

<body>
  <div class="uf-form-signin">
    <div class="text-center">
      <a href="https://uifresh.net/"><img src="./assets-auth/img/logo-fb.png" alt="" width="100" height="100"></a>
      <h1 class="text-white h3">Account Register</h1>
    </div>
    <form class="mt-4">
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-user"></span>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Your name" required>
      </div>
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-envelope"></span>
        <input type="text" id="email" name="email" class="form-control" placeholder="Email address" required>
      </div>
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-lock"></span>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="d-grid mb-4">
        <button type="submit" class="btn uf-btn-primary btn-lg">Sign Up</button>
      </div>
      <div class="mt-4 text-center">
        <span class="text-white">Already a member?</span>
        <a href="?url=login">Login</a>
      </div>
    </form>
  </div>

  <!-- JavaScript -->

  <!-- Separate Popper and Bootstrap JS -->
  <script src="./assets-auth/js/popper.min.js"></script>
  <script src="./assets-auth/js/bootstrap.min.js"></script>
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var nama = $('#nama').val();
        var email = $('#email').val();
        var password = $('#password').val();

        // Perform AJAX request
        $.ajax({
          url: 'ajax.php',
          type: 'POST',
          data: {
            action: 'register',
            nama: nama,
            email: email,
            password: password
          },
          success: function(response) {
            alert(response.message);
            if (response.status == 200) {
              window.location.href = '?url=login';
            }
          },
          error: function(xhr, status, error) {
            // Handle error response
            alert('Registration failed. Please try again.');
          }
        });
      });
    });
  </script>
</body>

</html>