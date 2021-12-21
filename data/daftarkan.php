
<div>
 <?php  $gis=new mysqli('localhost', 'root', '', 'sigodp');
    if ($_POST['btn']) {
        print_r($_POST);
        $sql="insert into presensi values ('', '".$_POST['tempat']."', POINT(".$_POST['lng'].",".$_POST['lat']."), '".date('Y-m-d')."', '".$_SERVER['SERVER_ADDR']."', '' )";
        $res=$gis->query($sql);
    }
    $gis->close();
 ?>
<div class="container">
    <form method="post" action="">    
    <div class= row>
        <div class="card col-md-12" >
              <h3>Mendaftarkan ODP</h3>
              <div class="card-body">
                <label>Latitude </label>
                <input type="text" name="lat" id="lat" value=""/>
                </div>
            <div class="card-body">
                <label>Longitude </label>
                <input type="text" id="lng" name="lng" value=""/>
            </div>
            <div class="card-body">
            <label>Nama Lokasi ODP </label>
                <input type="text" name="nim" value=""/>
                <input type="submit" name="btn" value="kirim data"/>
            </div>
        </div>     
    </div>
    </form>
</div>




<div class="iframe-container">
  	<!--iframe link is the link to the jsfiddle-->
  		<iframe style="width: 1085px; height: 625px;" src="map.php"></iframe>
		</div>

	<style>
  	.iframe-container {
		text-align:center;
		width: 100%;
	  }
	</style>
</body>


</html>
