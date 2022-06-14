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
		$kitaplar =$vt->query('select k.ID,k.Ad KitapAD,k.Yazar,k.Durum,t.Ad from akitap k, turler t where t.ID= k.tur_id and k.Durum=1')->fetchAll(PDO::FETCH_ASSOC);
	?>
	
	
	<table class="table table-bordered table-dark table-hover">
		<tr> 
			<th>ID</th>
			<th>Kitap Adı</th>
			<th>Yazar</th>
			<th>Durum</th>
			<th>Tür_İD</th>
			<th></th>
			
		
		</tr>
		<?php 
		foreach($kitaplar as $ktp) { 
		
		$ktp['ID'];
			echo"<tr>";
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
					echo"<td>";
						echo "<a href='/otm/kitapalguncelle.php?Id=".$ktp['ID']."' class='btn btn-success'>Kitabı Al</a>";
					echo"</td>";
					
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
			  confirmButtonText: 'Kitap Alma İşlemine Devam Et',
			  cancelButtonText: 'Kitap Alma İptal Et'
			}).then((result) => {
			  if (result.value) {
				window.location.href='sil.php?ID='+ID;
			  }
			})
		}
</script>

</body>
</html>