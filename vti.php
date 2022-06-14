<?php include 'vt.php';?>
<html>
	<head>
		<title>Veri Tabanı İşlemleri</title>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body>
	<?php
	if(isset($_POST['işlem']))
	{
		switch($_POST['işlem'])
		{
			//Kitap Türü Ekleme
			case 'tur_ekle':
				$Ad= $_POST['Ad'];
				$Açıklama= $_POST['Açıklama'];
				$Durum= $_POST['Durum'];
				$sorgu= $vt->prepare("INSERT INTO turler(Ad,Açıklama,Durum) VALUES (?,?,?)");
			
				$ekle= $sorgu->execute(array($Ad,$Açıklama,$Durum));
					if($ekle){?>
					<script type="text/javascript">
						Swal.fire({
						icon: 'success',
						title: 'İşlem Başarılı',
						showConfirmButton: false,
						timer:900
						});
					</script>
					<?php
					}else{
					?>
					<script type="text/javascript">
						Swal.fire({
						icon: 'error',
						title: 'İşlem Başarısız',
						showConfirmButton: false,
						timer:900
						});
					</script>
					<?php
				}
				header("Refresh:1; url=/otm/anasf.php");
				break;
			//Kitap Ekleme
			case 'kitap_ekle':
				$Ad=$_POST['Ad'];
				$Yazar=$_POST['Yazar'];
				$tur=$_POST['tur'];
				$Durum=(isset($_POST['Durum']))? 1:0;
				$sorgu= $vt->prepare("INSERT INTO akitap(Ad,Yazar,tur_id,Durum) VALUES (?,?,?,?)");
				$ekle= $sorgu->execute(array($Ad,$Yazar,$tur,$Durum));
				if($ekle){?>
				<script type="text/javascript">
					Swal.fire({
					icon: 'success',
					title: 'Kitap Eklendi',
					showConfirmButton: false,
					timer:900
					});
				</script>
				<?php
				}else{
				?>
				<script type="text/javascript">
					Swal.fire({
					icon: 'error',
					title: 'Kitap Eklenemedi',
					showConfirmButton: false,
					timer:900
					});
				</script>
				<?php
				}
				header("Refresh:1; url=/otm/anasf.php");
				break;
				
				
			default:
				break;
				
				
				
				
			
		}
	}
	
	
	?>
	</body>
</html>