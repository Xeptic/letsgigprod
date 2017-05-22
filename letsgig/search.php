<?php
include_once 'includes/db_connect.php';

    if(isset($_POST['search_keyword']))
    {
        $search_keyword = $mysqli->real_escape_string($_POST['search_keyword']);
        $sqlCountries="SELECT bandname FROM bands WHERE bandname LIKE '%$search_keyword%'";
        $resCountries=$mysqli->query($sqlCountries);
 
        if($resCountries === false) {
            trigger_error('Error: ' . $mysqli->error, E_USER_ERROR);
        }else{
            $rows_returned = $resCountries->num_rows;
        }
 
 $bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
 if($rows_returned > 0){
            while($rowCountries = $resCountries->fetch_assoc()) 
            { 
                echo '<div class="show" align="left"><span class="country_name">'.str_ireplace($search_keyword,$bold_search_keyword,$rowCountries['bandname']).'</span></div>'; 
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 
        }
    } 
?>