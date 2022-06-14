<?php include 'auth.php'; ?>
<?php include 'rolkontrol.php'; ?>
<?php 
	if($isInRole==false){
		echo "yetkisiz işlem";
		header("Refresh:1; url=/otm/giris.php");
		exit();
	}
?>
<?php include 'vt.php'; ?>
<html>
	<head>
		<title>Kitap Ekle</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
	<?php include 'menu.php'; ?>
<div class="container mt-5">
	<form action="vti.php" method="POST">
	<input type="hidden" name="işlem" value="kitap_ekle">
		<div class="row mb-3">
			<div class="col-3 mt-2">
				<label>Ad</label>
			</div>
			<div class="col-9">
				<input type="text" class="form-control" name="Ad" required>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-3 mt-2">
				<label>Yazar</label>
			</div>
			<div class="col-9">
				<input type="text" class="form-control" name="Yazar" required>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-3 mt-2">
				<label>Kitap Türü</label>
			</div>
			<?php $kitapTurleri =$vt->query('select * from turler')->fetchAll(PDO::FETCH_ASSOC);
			
			?>
			<div class="col-9">
				<select class="form-control" name="tur">
				<option>KİTAP TÜRÜ SEÇİNİZ</option>
					<?php 
					foreach($kitapTurleri as $tur)
					{
						echo "<option value=".$tur["ID"].">".$tur['Ad']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-3 ">
				<label>Kitap Durumu Seçiniz</label>
			</div>
			<div class="col-9">
				<input type="checkbox"  name="Durum">
			</div>
		</div>
			<div class="input-group mb-3">
				  <button class="btn btn-success">Kitap Ekle</button>
			</div>		
			</form>
</div>			
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<?php 
		if(isset($_POST['Ad'])){
		}		
		?>
	</body>
</html>