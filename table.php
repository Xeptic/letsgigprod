<?php
include_once 'includes/db_connect.php';

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE `temp_members_db` (
`confirm_code` varchar(65) NOT NULL default '',
`username` varchar(65) NOT NULL default '',
`email` varchar(65) NOT NULL default '',
`password` varchar(255) NOT NULL default ''
) ENGINE=InnoDB";

if (mysqli_query($mysqli, $sql)) {
    echo "Table temp_memberes_db created successfully";
} else {
    echo "Error creating table: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>