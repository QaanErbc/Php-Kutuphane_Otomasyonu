  <?php 
$adsoyad = isset($_SESSION["adsoyad"])?$_SESSION["adsoyad"]:"";
?>
<?php include 'rolkontrol.php'; ?>
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="anasf.php">Sivrihisar Belediyesi Kütüphanesi</a>
          </li>
			  <li class="nav-item">
				<a class="nav-link" aria-current="page" href="kitapal.php">Kitap Al</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" aria-current="page" href="kitapver.php">Kitap İade Et</a>
			</li>
			<?php 
			if($isInRole){
				?>
				<li class="nav-item">
				  <a class="nav-link" href="Kitap_ekle.php">Kitap Ekle</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="ekle.php">Kitap Türü Ekle</a>
				</li>
		<?php
			}
		?>
        </ul>
        <?php 
	  
		if(isset($_Session['isLogin'])){
			?>
			<ul class="navbar-nav" style="margin-left:50%;">
				<li class="nav-item">
				  <a class="nav-link" href="giris.php">Giriş yap</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="kayitol.php">Kayıt Ol</a>
				</li>
			</ul>
			<?php
			}
			else
			{
				?>
				<ul class="navbar-nav" style="">
					<li class="nav-item">
					  <?php echo "<span class='nav-link'>Hoşgeldiniz ".$adsoyad."</span>"; ?>
					</li>
					<li class="nav-item">
					  <button onclick="Cikis()" class="nav-link btn btn-danger" >Çıkış Yap</button>
					</li>
					
				</ul>
				
				<?php
			}
	  ?>
      </div>
    </div>
  </nav>
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript">
		function Cikis()
		{
			  Swal.fire({
			  title: 'Uyarı',
			  text: "Çıkış yapmak istediğinizden emin misiniz?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '# 000000',
			  confirmButtonText: 'Çık',
			  cancelButtonText: 'İptal'
			}).then((result) => {
			  if (result.value) {
				window.location.href='cikis.php';
			  }
			})
		}
</script>
  
