<?php include 'vt.php'; ?>
<html>
	<head>
		<title>Kitap Türü Güncelle</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div class="container mt-5">
			<form action="vti.php" method="POST">
			<input type="hidden" name="işlem" value="tur_ekle">
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Ad</span>
				  <input type="text" class="form-control" name="Ad" required>
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Açıklama</span>
				  <input type="text" class="form-control" name="Açıklama" required>
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Durum</span>
				  <input type="text" class="form-control" name="Durum" required>
				</div>
				<div class="input-group mb-3">
				  <button class="btn btn-success">Kitap Türü Ekle</button>
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