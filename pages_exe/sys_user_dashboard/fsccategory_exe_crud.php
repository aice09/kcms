<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsccat_name = $_POST["fsccat_name"];    
    
    $fsccat_createdby = $_SESSION['system_username'];
    $fsccat_dtcreated = $currentdate2;
    $fsccat_updatedby = " ";
    $fsccat_dtupdated = " ";
    $fsccat_status = "Active";

	$query="INSERT INTO fsc_category(
			fsccat_name,
            fsccat_createdby,
            fsccat_dtcreated,
            fsccat_updatedby,
            fsccat_dtupdated,
            fsccat_status
			) 
			VALUES (
			'$fsccat_name',
            '$fsccat_createdby',
            '$fsccat_dtcreated',
            '$fsccat_updatedby',
            '$fsccat_dtupdated',
            '$fsccat_status'
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
    $query = "SELECT * FROM fsc_category
        WHERE fsccat_id = '$id'";
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
    $id=$_POST['fsccat_id'];
    $fsccat_name = $_POST["fsccat_name"];
    
    $fsccat_dtupdated = $currentdate2;
    $fsccat_updatedby = $_SESSION['system_username'];
    $fsccat_status = "Active";

    //Update query
    $query = "UPDATE fsc_category SET
            fsccat_name = '$fsccat_name',
            fsccat_updatedby = '$fsccat_updatedby',
            fsccat_dtupdated = '$fsccat_dtupdated',
            fsccat_status = '$fsccat_status'
            WHERE fsccat_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc_category WHERE fsccat_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>