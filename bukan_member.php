<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peringatan</title>
    <link rel="shortcut icon" href="assets/image/logo_opportunitea.png">
    <link rel="stylesheet" href="assets/sass/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

  <div class="container justify-content-center">
      <div class="not-member text-center" style="margin-top:50px;">
          <h3 class="text-center" style="font-family: 'poppins'; font-weight: bold; font-size:45px;">Peringatan</h3>
          <img src="assets/image/waiting.png" width="40%" alt="">
          <p style="font-family: 'poppins'; ">username dan password yg di input tidak terdaftar pada member, segera kembali ke login</p>
          <a href="index.php" class="btn btn-warning text-white mb-5">Kembali Ke Login</a>

      </div>
  </div>

    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
    <script>
      function myFunction() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
  </body>
</html>
