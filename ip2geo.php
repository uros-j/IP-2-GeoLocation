<?php
 function get_client_ip()
 {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';

      return $ipaddress;
 }
 
 
require_once('./geoplugin/geoplugin.class.php');
$geoplugin->currency = 'EUR';
$geoplugin = new geoPlugin();



 
$geoplugin->locate();



 
 
echo  "///////////////////////////////</br>";
echo  "IP 2 GeoLocation Script</br>";
echo  "Author: DrDrift</br>";
echo  "3D-NET.net Studio</br>";
echo  "Date: 2015</br>";
echo  "///////////////////////////////</br>";
echo "Geolocation results for {$geoplugin->ip}: <br />\n".
	"City: {$geoplugin->city} <br />\n".
	"Region: {$geoplugin->region} <br />\n".
	"Country Name: {$geoplugin->countryName} <br />\n".
	"Country Code: {$geoplugin->countryCode} <br />\n".
	"Longitude: {$geoplugin->longitude} <br />\n".
	"Latitude: {$geoplugin->latitude} <br />\n".
	"Currency Code: {$geoplugin->currencyCode} <br />\n".
	"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

/*
How to use the in-built currency converter
geoPlugin::convert accepts 3 parameters
$amount - amount to convert (required)
$float - the number of decimal places to round to (default: 2)
$symbol - whether to display the geolocated currency symbol in the output (default: true)
*/
if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	//our visitor is not using the same currency as the base currency
	echo "<p>At todays rate, US$100 will cost you " . $geoplugin->convert(100) ." </p>\n";
} 



echo "<iframe width='600' height='450' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/view?zoom=10&center={$geoplugin->latitude}%2C{$geoplugin->longitude}&key=AIzaSyCwFETEa5DKmr9pLceXJc9AYX1obw6chF4'></iframe>";
?>
