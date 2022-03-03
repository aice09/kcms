<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001_number = $_POST["fsc001_number"];
	$fsc001_desc = $_POST["fsc001_desc"];
	$fsc001_weight = $_POST["fsc001_weight"];
    $fsc001_qtypcs = $_POST["fsc001_qtypcs"];
    $fsc001_totalkg = $_POST["fsc001_totalkg"];
    
    
    $fsc001_createdby = $_SESSION['system_username'];
    $fsc001_dtcreated = $currentdate2;
    $fsc001_updatedby = " ";
    $fsc001_dtupdated = " ";
    $fsc001_status = "Active";

	$query="INSERT INTO fsc001_jt(
			fsc001_number,
			fsc001_desc,
			fsc001_weight,
            fsc001_qtypcs,
            fsc001_totalkg,
            fsc001_createdby,
            fsc001_dtcreated,
            fsc001_updatedby,
            fsc001_dtupdated,
            fsc001_status
			) 
			VALUES (
			'$fsc001_number',
			'$fsc001_desc',
			'$fsc001_weight',
            '$fsc001_qtypcs',
            '$fsc001_totalkg',
            '$fsc001_createdby',
            '$fsc001_dtcreated',
            '$fsc001_updatedby',
            '$fsc001_dtupdated',
            '$fsc001_status'
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
    $query = "SELECT * FROM fsc001_jt
        WHERE fsc001_id = '$id'";
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
    $id=$_POST['fsc001_id'];
    $fsc001_number = $_POST["fsc001_number"];
	$fsc001_desc = $_POST["fsc001_desc"];
	$fsc001_weight = $_POST["fsc001_weight"];
    $fsc001_qtypcs = $_POST["fsc001_qtypcs"];
    $fsc001_totalkg = $_POST["fsc001_totalkg"];
    
    $fsc001_dtupdated = $currentdate2;
    $fsc001_updatedby = $_SESSION['system_username'];
    $fsc001_status = "Active";

    //Update query
    $query = "UPDATE fsc001_jt SET
            fsc001_number = '$fsc001_number',
            fsc001_desc = '$fsc001_desc',
            fsc001_weight = '$fsc001_weight',
            fsc001_qtypcs = '$fsc001_qtypcs',
            fsc001_totalkg = '$fsc001_totalkg',
            fsc001_updatedby = '$fsc001_updatedby',
            fsc001_dtupdated = '$fsc001_dtupdated',
            fsc001_status = '$fsc001_status'
            WHERE fsc001_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001_jt WHERE fsc001_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>