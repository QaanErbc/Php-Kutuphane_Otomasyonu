<?php include 'auth.php'; ?>
<?php include 'rolkontrol.php'; ?>
<?php include 'vt.php';?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container mt-3">
	<h1>Kitaplar</h1>
	
	
	<?php
		$kitaplar =$vt->query('select k.Ad KitapAD, k.ID,k.Ad,k.Yazar,k.Durum,t.Ad from akitap k, turler t where t.ID= k.tur_id')->fetchAll(PDO::FETCH_ASSOC);
	?>
	
	
	<table class="table table-bordered table-dark table-hover">
		<tr> 
			<?php
				if($isInRole){
					 ?>
					<th>Sil</th>
			<?php
				}
			?>
			
			<th>ID</th>
			<th>Kitap Adı</th>
			<th>Yazar</th>
			<th>Durum</th>
			<th>Tür</th>
			<?php
				if($isInRole){
					 ?>
					<th>Güncelle</th>
			<?php
				}
			?>
			
		
		</tr>
		<?php 
		foreach($kitaplar as $ktp) { 
		
		$ktp['ID'];
			echo"<tr>";
				if($isInRole){
					echo"<td class='text-center'>";
						
							echo "<a onClick='Sil(ID=".$ktp['ID'].")'  class='btn btn-danger'>Sil</a>";
						echo"</td>";
				}
					echo"<td>";
						echo $ktp['ID'];
					echo"</td>";
					
					echo"<td>";
						echo $ktp['KitapAD'];
					echo"</td>";
					
					echo"<td>";
						echo $ktp['Yazar'];
					echo"</td>";
					
					echo"<td>";
						echo $ktp['Durum'];
					echo"</td>";
					
					echo"<td>";
						echo $ktp['Ad'];
					echo"</td>";
					if($isInRole){
						echo"<td class='text-center'>";
						echo "<a href=kitap_guncelle.php?ID=".$ktp['ID']." class='btn btn-primary'>Güncelle</a>";
					echo"</td>";
					}
					
			echo"</tr>";
			
		} 
		?>
	</table>
</div>	

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript">
		function Sil(ID)
		{
			  //alert(ID);
			  Swal.fire({
			  title: 'Kaydı Silmek Üzeresiniz',
			  text: "Bu İşlemi Geri Alamazsınız",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '# 000000',
			  confirmButtonText: 'Silme İşlemine Devam Et',
			  cancelButtonText: 'Silme İşlemini İptal Et'
			}).then((result) => {
			  if (result.value) {
				window.location.href='sil.php?ID='+ID;
			  }
			})
		}
</script>

</body>
</html>