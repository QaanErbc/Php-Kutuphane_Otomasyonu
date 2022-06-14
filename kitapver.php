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
		$kitaplar =$vt->query('select k.ID,k.Ad KitapAD,k.Yazar,k.Durum,t.Ad from akitap k, turler t where t.ID= k.tur_id and k.Durum=0')->fetchAll(PDO::FETCH_ASSOC);
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
						echo "<a href='/otm/kitapverguncelle.php?Id=".$ktp['ID']."' class='btn btn-success'>Kitabı İade Et</a>";
					echo"</td>";
					
			echo"</tr>";
			
		} 
		?>
	</table>
</div>	

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript">
		
</script>

</body>
</html>