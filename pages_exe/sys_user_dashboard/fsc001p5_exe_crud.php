<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001p5_id = $_POST["fsc001p5_id"];
	$fsc001p5_stockid = $_POST["fsc001p5_stockid"];
	$fsc001p5_ponum = $_POST["fsc001p5_ponum"];
	$fsc001p5_drnum = $_POST["fsc001p5_drnum"];
    
    $fsc001p5_createdby = $_SESSION['system_username'];
    $fsc001p5_dtcreated = $currentdate2;
    $fsc001p5_updatedby = " ";
    $fsc001p5_dtupdated = " ";
    $fsc001p5_status = "Active";

    

    //$fsc001p5_drnum = $fsc001_weight/1000 * $fsc001p4_qtykg;

	$query="INSERT INTO fsc001p5_jt(
			fsc001p5_id,
			fsc001p5_stockid,
			fsc001p5_ponum,
            fsc001p5_drnum,
            fsc001p5_createdby,
            fsc001p5_dtcreated,
            fsc001p5_updatedby,
            fsc001p5_dtupdated,
            fsc001p5_status
			) 
			VALUES (
			'$fsc001p5_id',
			'$fsc001p5_stockid',
			'$fsc001p5_ponum',
            '$fsc001p5_drnum',
            '$fsc001p5_createdby',
            '$fsc001p5_dtcreated',
            '$fsc001p5_updatedby',
            '$fsc001p5_dtupdated',
            '$fsc001p5_status'
			)"; 
		$response = array();
	if (!$result = mysqli_query($db,$query)) {
        //exit(mysqli_error());
        $response=999;
    } else {
    	$response = 'ok';
    }
    echo json_encode($response);	
}

if (isset($_POST['read_selected'])) {
    $id=$_POST['crud_id'];
    $query = "SELECT * FROM fsc001p5_jt
        WHERE fsc001p5_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    echo json_encode($response);
} 

//Update
if (isset($_POST['update_btn'])) {
    $id = $_POST["fsc001p5_id"];
	$fsc001p5_stockid = $_POST["fsc001p5_stockid"];
	$fsc001p5_ponum = $_POST["fsc001p5_ponum"];    
	$fsc001p5_drnum = $_POST["fsc001p5_drnum"];
    
    $fsc001p5_updatedby = $_SESSION['system_username'];
    $fsc001p5_dtupdated = $currentdate2;
    $fsc001p5_status = "Active";

    //Update query
    $query = "UPDATE fsc001p5_jt SET
            fsc001p5_stockid = '$fsc001p5_stockid',
            fsc001p5_ponum = '$fsc001p5_ponum',
            fsc001p5_drnum = '$fsc001p5_drnum',

            fsc001p5_updatedby = '$fsc001p5_updatedby',
            fsc001p5_dtupdated = '$fsc001p5_dtupdated',
            fsc001p5_status = '$fsc001p5_status'
            WHERE fsc001p5_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001p5_jt WHERE fsc001p5_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>