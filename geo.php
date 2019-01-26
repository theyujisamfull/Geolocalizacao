<?php include("../conexao.php"); ?>
<?php date_default_timezone_set('America/Sao_Paulo');?>
 
<html>
  <head>
  	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Geo</title><meta charset="utf-8">
	  <style> 

	  </style>
  </head>
	<body>

<div class='container-fluid'>

<!--Google maps API's that charge the location and display the mao-->
<div class="mapouter"><div class="gmap_canvas"><iframe id='map' width="1000" height="600" id="gmap_canvas" src="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de"></a></div><style>.mapouter{text-align:right;height:600px;width:1000px;}.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:1000px;}</style></div>

<!--Text that show the coordinates -->
<p id='cord'></p>

<!--Button that send the location to datebase -->
<button onclick="getLocation()"> Charge location </button>

<!--Send the latitude and logitude to geo_enviar.php in a form, so add in database-->
<form id='form' method='post' action='geo_enviar.php'>
	<input id='s1' type='hidden' name='latitude'>
	<input id='s2' type='hidden' name='longitude'>
</form>

<!-- Get the latitude and logitude from the database-->
<?php $resp = mysqli_query($link,"SELECT * FROM geo ORDER BY id");  ?>
<?php while($dado=$resp->fetch_array()){ $latitude = $dado['latitude']; $longitude = $dado['longitude'];  }	 ?>
<input id='latitude'  type='hidden' value='<?php echo $latitude; ?>'>
<input id='longitude' type='hidden' value='<?php echo $longitude; ?>'>


</div>

<script>

//Function that charges the latitude and logitude
function getLocation() { if (navigator.geolocation) {    navigator.geolocation.getCurrentPosition(showPosition);  } else { x.innerHTML = "Geolocation is not supported by this browser.";  } }
//Function that send the latitude and logitude to the database
function showPosition(position) { 
  document.getElementById('s1').value = position.coords.latitude;
  document.getElementById('s2').value = position.coords.longitude;
  document.getElementById('form').submit();
  }
//Display the coordinates
latitude = document.getElementById('latitude').value;
longitude = document.getElementById('longitude').value;
document.getElementById('cord').innerHTML = latitude + ''+longitude;
//Build the url with the latitude and logitude and gives to the API 
place = 'https://maps.google.com/maps?q='+ latitude + '%2C' + longitude + '&t=&z=13&ie=UTF8&iwloc=&output=embed';
document.getElementById('map').src = place;

</script>


</body>
</html>