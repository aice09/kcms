<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001p3_id = $_POST["fsc001p3_id"];
	$fsc001p3_iooid = $_POST["fsc001p3_iooid"];
	$fsc001p3_lotcode = $_POST["fsc001p3_lotcode"];
    $fsc001p3_qtypcs = $_POST["fsc001p3_qtypcs"];
    
    $fsc001p3_createdby = $_SESSION['system_username'];
    $fsc001p3_dtcreated = $currentdate2;
    $fsc001p3_updatedby = " ";
    $fsc001p3_dtupdated = " ";
    $fsc001p3_status = "Active";

    //getting fsc001_weight
    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid WHERE b.fsc001p2_id='$fsc001p3_iooid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p3_qtykg = $fsc001_weight/1000 * $fsc001p3_qtypcs;
    }
    else
    {
        $fsc001p3_qtykg = 0;  
    }

    //$fsc001p3_qtykg = $fsc001_weight/1000 * $fsc001p3_qtypcs;

	$query="INSERT INTO fsc001p3_jt(
			fsc001p3_id,
			fsc001p3_iooid,
			fsc001p3_lotcode,
            fsc001p3_qtypcs,
            fsc001p3_qtykg,
            fsc001p3_createdby,
            fsc001p3_dtcreated,
            fsc001p3_updatedby,
            fsc001p3_dtupdated,
            fsc001p3_status
			) 
			VALUES (
			'$fsc001p3_id',
			'$fsc001p3_iooid',
			'$fsc001p3_lotcode',
            '$fsc001p3_qtypcs',
            '$fsc001p3_qtykg',
            '$fsc001p3_createdby',
            '$fsc001p3_dtcreated',
            '$fsc001p3_updatedby',
            '$fsc001p3_dtupdated',
            '$fsc001p3_status'
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
    $query = "SELECT * FROM fsc001p3_jt
        WHERE fsc001p3_id = '$id'";
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
    $id = $_POST["fsc001p3_id"];
	$fsc001p3_iooid = $_POST["fsc001p3_iooid"];
	$fsc001p3_lotcode = $_POST["fsc001p3_lotcode"];
    $fsc001p3_qtypcs = $_POST["fsc001p3_qtypcs"];
    
    $fsc001p3_updatedby = $_SESSION['system_username'];
    $fsc001p3_dtupdated = $currentdate2;
    $fsc001p3_status = "Active";

    //getting fsc001_weight
    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid WHERE b.fsc001p2_id='$fsc001p3_iooid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p3_qtykg = $fsc001_weight/1000 * $fsc001p3_qtypcs;
    }
    else
    {
        $fsc001p3_qtykg = 0;  
    }

    //Update query
    $query = "UPDATE fsc001p3_jt SET
            fsc001p3_iooid = '$fsc001p3_iooid',
            fsc001p3_lotcode = '$fsc001p3_lotcode',
            fsc001p3_qtypcs = '$fsc001p3_qtypcs',
            fsc001p3_qtykg = '$fsc001p3_qtykg',

            fsc001p3_updatedby = '$fsc001p3_updatedby',
            fsc001p3_dtupdated = '$fsc001p3_dtupdated',
            fsc001p3_status = '$fsc001p3_status'
            WHERE fsc001p3_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001p3_jt WHERE fsc001p3_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>