<!DOCTYPE HTML>
<html>
<body>
  <button onclick="downloadAll(window.links)">Download</button>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script type="text/javascript">

     var links = [
		  'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/dde1e0cb118009766da8d3e2ec3b79cf',
		  'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/7e557c3ab6d5078625acca7ff37f3520',
		  'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/80042dd631d9437f2c43df354808ea9d'
		];

<?php
	$url = 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/80042dd631d9437f2c43df354808ea9d';
	$saveto = 'D:/Working/xampp/htdocs/crmlocnuoc/assets/uploads/test/image3.jpg';
	
	$ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
// $url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/7e557c3ab6d5078625acca7ff37f3520';
// $img = 'D:/Working/xampp/htdocs/crmlocnuoc/assets/uploads/test/image2.jpg';
// file_put_contents($img, file_get_contents($url));
?>
</body>
</html>