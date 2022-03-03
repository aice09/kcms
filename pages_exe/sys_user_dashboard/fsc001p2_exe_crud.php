<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001p2_jtid = $_POST["fsc001p2_jtid"];
	$fsc001p2_ponum = $_POST["fsc001p2_ponum"];
	$fsc001p2_recieveddate = $_POST["fsc001p2_recieveddate"];
    $fsc001p2_issueddate = $_POST["fsc001p2_issueddate"];
    $fsc001p2_rollnum = $_POST["fsc001p2_rollnum"];
    
	$fsc001p2_lotnum = $_POST["fsc001p2_lotnum"];
	$fsc001p2_qtym = $_POST["fsc001p2_qtym"];
    $fsc001p2_qtypcs = $_POST["fsc001p2_qtypcs"];
    $fsc001p2_qtykg = $_POST["fsc001p2_qtykg"];
    
    
    $fsc001p2_createdby = $_SESSION['system_username'];
    $fsc001p2_dtcreated = $currentdate2;
    $fsc001p2_updatedby = " ";
    $fsc001p2_dtupdated = " ";
    $fsc001p2_status = "Active";

	$query="INSERT INTO fsc001p2_jt(
			fsc001p2_jtid,
			fsc001p2_ponum,
			fsc001p2_recieveddate,
            fsc001p2_issueddate,
            fsc001p2_rollnum,
            fsc001p2_lotnum,
            fsc001p2_qtym,
            fsc001p2_qtypcs,
            fsc001p2_qtykg,
            fsc001p2_createdby,
            fsc001p2_dtcreated,
            fsc001p2_updatedby,
            fsc001p2_dtupdated,
            fsc001p2_status
			) 
			VALUES (
			'$fsc001p2_jtid',
			'$fsc001p2_ponum',
			'$fsc001p2_recieveddate',
            '$fsc001p2_issueddate',
            '$fsc001p2_rollnum',
            '$fsc001p2_lotnum',
            '$fsc001p2_qtym',
            '$fsc001p2_qtypcs',
            '$fsc001p2_qtykg',
            '$fsc001p2_createdby',
            '$fsc001p2_dtcreated',
            '$fsc001p2_updatedby',
            '$fsc001p2_dtupdated',
            '$fsc001p2_status'
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
    $query = "SELECT * FROM fsc001p2_jt
        WHERE fsc001p2_id = '$id'";
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
    $id=$_POST['fsc001p2_id'];
    $fsc001p2_jtid = $_POST["fsc001p2_jtid"];
	$fsc001p2_ponum = $_POST["fsc001p2_ponum"];
	$fsc001p2_recieveddate = $_POST["fsc001p2_recieveddate"];
    $fsc001p2_issueddate = $_POST["fsc001p2_issueddate"];
    $fsc001p2_rollnum = $_POST["fsc001p2_rollnum"];
	$fsc001p2_lotnum = $_POST["fsc001p2_lotnum"];
	$fsc001p2_qtym = $_POST["fsc001p2_qtym"];
    $fsc001p2_qtypcs = $_POST["fsc001p2_qtypcs"];
    $fsc001p2_qtykg = $_POST["fsc001p2_qtykg"];
    
    $fsc001p2_dtupdated = $currentdate2;
    $fsc001p2_updatedby = $_SESSION['system_username'];
    $fsc001p2_status = "Active";

    //Update query
    $query = "UPDATE fsc001p2_jt SET
            fsc001p2_jtid = '$fsc001p2_jtid',
            fsc001p2_ponum = '$fsc001p2_ponum',
            fsc001p2_recieveddate = '$fsc001p2_recieveddate',
            fsc001p2_issueddate = '$fsc001p2_issueddate',
            fsc001p2_rollnum = '$fsc001p2_rollnum',
            fsc001p2_lotnum = '$fsc001p2_lotnum',
            fsc001p2_qtym = '$fsc001p2_qtym',
            fsc001p2_qtypcs = '$fsc001p2_qtypcs',
            fsc001p2_qtykg = '$fsc001p2_qtykg',

            fsc001p2_updatedby = '$fsc001p2_updatedby',
            fsc001p2_dtupdated = '$fsc001p2_dtupdated',
            fsc001p2_status = '$fsc001p2_status'
            WHERE fsc001p2_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001p2_jt WHERE fsc001p2_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>