<?php

include_once 'includes/db_connect.php';

function getNearby($lat, $lng, $distance = 0, $unit = 'mi', $mysqli)
{
    // radius of earth; @note: the earth is not perfectly spherical, but this is considered the 'mean radius'
    if ($unit == 'km') $radius = 6371.009; // in kilometers
    elseif ($unit == 'mi') $radius = 3958.761; // in miles

    // latitude boundaries
    $maxLat = (float) $lat + rad2deg($distance / $radius);
    $minLat = (float) $lat - rad2deg($distance / $radius);

    // longitude boundaries (longitude gets smaller when latitude increases)
    $maxLng = (float) $lng + rad2deg($distance / $radius / cos(deg2rad((float) $lat)));
    $minLng = (float) $lng - rad2deg($distance / $radius / cos(deg2rad((float) $lat)));

    // get results ordered by distance (approx)
    $nearby = array();
	
	$sql = "SELECT * FROM venues WHERE lat > '$minLat' AND lat < '$maxLat' AND lng > '$minLng' AND lng < '$maxLng' ORDER BY ABS(lat - '$lat') + ABS(lng - '$lng') ASC";
	
	$result = mysqli_query($mysqli, $sql);
				//or die ("Couldn't execute query: ".mysqli_error($mysqli));
	
	while($data = mysqli_fetch_object($result)){
		$nearby[] = array(	'username' => $data->username,
							'street' => $data->street,
							'city' => $data->city,
							'postcode' => $data->postcode,
						);
	}

    return $nearby;
	
}
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];

$data = getNearby($lat, $lng, $distance = 2, $unit = 'mi', $mysqli);

echo json_encode($data);
header('Content-type: application/json');
//show_error($mysqli);
?>