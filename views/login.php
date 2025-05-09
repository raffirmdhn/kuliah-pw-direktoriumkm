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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./assets-auth/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="./assets-auth/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets-auth/css/uf-style.css">
  <title>Login</title>
</head>

<body>
  <div class="uf-form-signin">
    <div class="text-center">
      <a href="https://uifresh.net/"><img src="./assets-auth/img/logo-fb.png" alt="" width="100" height="100"></a>
      <h1 class="text-white h3">Account Login</h1>
    </div>
    <form class="mt-4">
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-user"></span>
        <input type="text" id="email" name="email" class="form-control" placeholder="Username or Email address">
      </div>
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-lock"></span>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="d-flex mb-3 justify-content-between">
        <div class="form-check">
          <input type="checkbox" class="form-check-input uf-form-check-input" id="exampleCheck1">
          <label class="form-check-label text-white" for="exampleCheck1">Remember Me</label>
        </div>
        <a href="#">Forgot password?</a>
      </div>
      <div class="d-grid mb-4">
        <button type="submit" class="btn uf-btn-primary btn-lg">Login</button>
      </div>
      <div class="d-flex mb-3">
        <div class="dropdown-divider m-auto w-25"></div>
        <small class="text-nowrap text-white">Or login with</small>
        <div class="dropdown-divider m-auto w-25"></div>
      </div>
      <div class="uf-social-login d-flex justify-content-center">
        <a href="#" class="uf-social-ic" title="Login with Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="uf-social-ic" title="Login with Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="uf-social-ic" title="Login with Google"><i class="fab fa-google"></i></a>
      </div>
      <div class="mt-4 text-center">
        <span class="text-white">Don't have an account?</span>
        <a href="?url=register">Sign Up</a>
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
        var email = $('#email').val();
        var password = $('#password').val();

        // Perform AJAX request
        $.ajax({
          url: 'ajax.php',
          type: 'POST',
          data: {
            action: 'login',
            email: email,
            password: password
          },
          success: function(response) {
            alert(response.message);
            if (response.status == 200) {
              window.location.href = '?url=umkm';
            }
          },
          error: function(xhr, status, error) {
            // Handle error response
            alert('Login failed. Please try again.');
          }
        });
      });
    });
  </script>
</body>

</html>