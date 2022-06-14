<?php include 'vt.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Adnan Kaan Erböcü">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Kayıt Ol</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">




  <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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
    <form method="post">

      <img class="mb-4" src="./images/5b033fb4-436b-4abf-8b05-54765de5448e.jpg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Kayıt Ol</h1>
      <div class="form-floating">
        <input type="text" class="form-control" name="ad" id="ad" placeholder="Kaan" required>
        <label for="ad">Ad</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" name="soyad" id="soyad" placeholder="Erböcü" required>
        <label for="soyad">Soyad</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
        <label for="email">Eposta adresi</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password" placeholder="Şifre" required>
        <label for="password">şifre</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Kayıt Ol</button>
      <a style="text-decoration:none;" href="./giris.php">Hesabın var mı?</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
  </main>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php


if (isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['email']) && isset($_POST['password'])) {
  $ad = $_POST["ad"];
  $soyad = $_POST["soyad"];
  $eposta = $_POST["email"];
  $sifre = sha1($_POST["password"]);
  $sorgu = $vt->prepare("insert into kullanicilar(ad,soyad,eposta,sifre) values(?,?,?,?)"); //ekleme  işlemi
  $sorgu->execute(array($ad, $soyad, $eposta, $sifre));

?>
  <script type="text/javascript">
    Swal.fire({
      icon: 'success',
      title: 'Kayıt Olma İşlemi Başarılı',
      showConfirmButton: false,
      timer: 900
    })
  </script>
<?php
  header("Refresh:1; url=/otm/anasf.php");
}
?>