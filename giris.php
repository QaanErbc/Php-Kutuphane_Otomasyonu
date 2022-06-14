<?php session_start(); ?>
<?php
include 'vt.php';
include 'class.phpmailer.php';
include 'class.smtp.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Adnan Kaan Erböcü">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Giriş Yap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST["email"];
      $password = sha1($_POST["password"]);
      $kullanici = $vt->query("SELECT * FROM kullanicilar WHERE eposta='" . $email . "'")->fetch(PDO::FETCH_ASSOC);

      if (!$kullanici) {
        echo "<div class='alert alert-danger' role='alert'>Kullanıcı Bulunamadı</div>";
      } else {
        if ($kullanici['sifre'] != $password) {
          echo "<div class='alert alert-danger' role='alert'>Eposta veya şifre hatalı</div>";
        } else {
          $_SESSION['isLogin'] = true;
          $_SESSION["rol"] = $kullanici["rol"];
          $_SESSION["adsoyad"] = $kullanici["ad"] . " " . $kullanici["soyad"];
          $code = mt_rand(1111, 9999);
          $mail = new PHPMailer();
          $mail->IsSMTP();
          $mail->SMTPAuth = true;
          $mail->Host = 'smtp.office365.com';
          $mail->SMTPSecure = 'tls'; //yada SSL
          $mail->SMTPAuth = true;
          $mail->Port = 587;  //SSL kullanacaksanız portu 465 olarak değiştiriniz
          $mail->Username = 'eposta_adresi';
          $mail->Password = 'sifre';
          $mail->SetFrom($mail->Username, 'Doğrulama kodunuz');
          $mail->AddAddress($_POST["email"], $kullanici["ad"] . " " . $kullanici["soyad"]);
          $mail->CharSet = 'UTF-8';
          $mail->Subject = 'Doğrulama kodunuz';
          $mail->MsgHTML($code);
          if ($mail->Send()) {
            // echo '<span class="text-success">Mail gönderme başarılı.</span>';
    ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
              Swal.fire({
                title: 'Doğrulama kodunuz',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Gönder',
                cancelButtonText: "Kapat",
                showLoaderOnConfirm: true,
                preConfirm: (code) => {
                  if (code == "<?php echo $code ?>") {
                    Swal.fire({
                      icon: 'success',
                      title: 'Giriş Başarılı',
                      showConfirmButton: false,
                      timer: 900
                    })
                    setTimeout(() => {
                      window.location.href = "/otm/anasf.php";
                    }, 950);
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Yanlış doğrulama kodu',
                      showConfirmButton: false,
                      timer: 900
                    })
                  }
                },
                allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {

              })
            </script>
          <?php
          } else {
            echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
          ?>
            <script type="text/javascript">
              Swal.fire({
                icon: 'error',
                title: 'Mail gönderilirken bir hata oluştu',
                showConfirmButton: false,
                timer: 900
              })
            </script>
          <?php
          }
          ?>
          <script type="text/javascript">
            // 	Swal.fire({
            // 	  icon: 'success',
            // 	  title:'Giriş Başarılı',
            // 	  showConfirmButton: false,
            // 	  timer: 900
            // 	})
            // 
          </script>
    <?php
          // header("Refresh:1; url=/otm/anasf.php");
        }
      }
    }
    ?>
    <form method="post">

      <img class="mb-4" src="./images/5b033fb4-436b-4abf-8b05-54765de5448e.jpg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Giriş Yap</h1>
      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Eposta adresi</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">şifre</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Giriş Yap</button>
      <a style="text-decoration:none;" href="./kayitol.php">Hesabın yok mu?</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
  </main>

</body>

</html>