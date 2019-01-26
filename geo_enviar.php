<?php include("../conexao.php"); ?>
<?php date_default_timezone_set('America/Sao_Paulo');?>
 
<html>
	<head>
		<script type="text/javascript"> function back(){  setTimeout("window.location='geo.php'",1);  } </script>
	</head>
	<body>

<?php $resp = mysqli_query($link,"SELECT * FROM geo ORDER BY id");  ?>
<?php while($dado=$resp->fetch_array()){ $id = $dado['id']+1;  }	 ?>


<?php 	
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	$sql=mysqli_query($link,"INSERT INTO geo VALUES('$id', '$latitude' , '$longitude')"); 
	
		if ($sql){echo "enviado";}
		else{echo "não enviado";}
		echo "<script> back()</script>";
	?>
	

	
	</body>
	
</html>