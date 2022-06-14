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
		<title>Kitap Güncelle</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<?php include 'menu.php'; ?>
			<?php if(isset($_GET['ID']))
			{
				$id=$_GET['ID'];
				$kitap=$vt->query("SELECT * FROM akitap WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
				$turler=$vt->query("Select * from turler")->fetchAll(PDO::FETCH_ASSOC);
			}
			?>
		<div class="container mt-5">
		<h4>Kitap Güncelle</h4>
			<form action="#" method="POST">
				<div class="row mb-3">
					<div class="col-3 mt-2">
						<label>Kitap ID</label>
					</div>
					
					<div class="col-9">
						<?php echo "<input type='text' class='form-control' name='ID' value='$kitap[ID]' readonly>" ?>
					</div>
				 
				</div>
			
			
				<div class="row mb-3">
					<div class="col-3 mt-2">
						<label>Kitap Adı</label>
					</div>
					
					<div class="col-9">
						<?php echo "<input type='text' class='form-control' name='Ad' value='$kitap[Ad]' required>" ?>
					</div>
				</div>
				
				
				<div class="row mb-3">
				  <div class="col-3 mt-2">
					<label>Yazar</label>
				  </div>
				  
				  <div class="col-9">
						<?php echo "<input type='text' class='form-control' name='yazar' value='$kitap[Yazar]' required>" ?>
				  </div>
				</div>
				
				
				<div class="row mb-3">
					<div class="col-3 mt-2">
						<label>Türü</label>
					</div>
					
					<div class="col-9">
						<select class="form-control" name="tur_id">
						<?php
						
						foreach($turler as $tur)
						{
							 if($tur['ID'] == $kitap['tur_id'])
							 {
								 echo "<option selected value=".$tur['ID'].">".$tur['Ad']."</option>";
							 }
							 else
							 {
								 echo "<option value=".$tur['ID'].">".$tur['Ad']."</option>";
							}
						}
						
						?>
						</select>
					</div>
				</div>
				
				<div class="row mb-3">
					<div class="col-3 mt-2">
						<label>Durum</label>
					</div>
					
					<div class="col-9 mt-3">
						<?php
						  if($kitap["Durum"])
							  echo "<input type='checkbox' checked name='Durum'>";
						  else
							  echo "<input type='checkbox' name='Durum'>";
						?>
					</div>
				</div>

				<div class="input-group mb-3">
				  <button class="btn btn-success">Kitap  Güncelle</button>
				</div>
			</form>
		</div>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<?php 
		if(isset($_POST['Ad'])&& isset($_POST['yazar']))
		{
			$ad=$_POST['Ad'];
			$yazar=$_POST['yazar'];
			$tur=$_POST['tur_id'];
			$drm=$_POST['Durum']=="on"?"1":"0";
			$sorgu=$vt->prepare("UPDATE akitap SET Ad=?, yazar=?, tur_id=?, Durum=? WHERE id=$id");//update etme işlemi
			$sorgu->execute(array($ad,$yazar,$tur,$drm));
			?>
			<script type="text/javascript">
			Swal.fire({
			  icon: 'success',
			  title:'GÜNCELLEME İŞLEMİ BAŞARILI',
			  showConfirmButton: false,
			  timer: 900
			})
			  setTimeout(function() {
				window.location.href="/otm/anasf.php";
			  }, 1000);
			
			</script>
			<?php
			//header("Refresh:1; url=/otm/anasf.php");
		}
		?>
	</body>
</html>