<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001p4_id = $_POST["fsc001p4_id"];
	$fsc001p4_outputid = $_POST["fsc001p4_outputid"];
	$fsc001p4_qtypcs = $_POST["fsc001p4_qtypcs"];
    //$fsc001p4_qtykg = $_POST["fsc001p4_qtykg"];
	$fsc001p4_wippcs = $_POST["fsc001p4_wippcs"];
    //$fsc001p4_wipkg = $_POST["fsc001p4_wipkg"];

    //getting fsc001_weight
    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a 
    INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid 
    INNER JOIN fsc001p3_jt c ON b.fsc001p2_id = c.fsc001p3_iooid
    WHERE c.fsc001p3_id='$fsc001p4_outputid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p4_qtykg = $fsc001_weight/1000 * $fsc001p4_qtypcs;
        $fsc001p4_wipkg = $fsc001_weight/1000 * $fsc001p4_wippcs;
    }
    else
    {
        $fsc001p4_qtykg = 0;
        $fsc001p4_wipkg =0;  
    }

    
    $fsc001p4_createdby = $_SESSION['system_username'];
    $fsc001p4_dtcreated = $currentdate2;
    $fsc001p4_updatedby = " ";
    $fsc001p4_dtupdated = " ";
    $fsc001p4_status = "Active";

    

    //$fsc001p4_wippcs = $fsc001_weight/1000 * $fsc001p4_qtykg;

	$query="INSERT INTO fsc001p4_jt(
			fsc001p4_id,
			fsc001p4_outputid,
			fsc001p4_qtypcs,
            fsc001p4_qtykg,
            fsc001p4_wippcs,
            fsc001p4_wipkg,
            fsc001p4_createdby,
            fsc001p4_dtcreated,
            fsc001p4_updatedby,
            fsc001p4_dtupdated,
            fsc001p4_status
			) 
			VALUES (
			'$fsc001p4_id',
			'$fsc001p4_outputid',
			'$fsc001p4_qtypcs',
            '$fsc001p4_qtykg',
            '$fsc001p4_wippcs',
            '$fsc001p4_wipkg',
            '$fsc001p4_createdby',
            '$fsc001p4_dtcreated',
            '$fsc001p4_updatedby',
            '$fsc001p4_dtupdated',
            '$fsc001p4_status'
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
    $query = "SELECT * FROM fsc001p4_jt
        WHERE fsc001p4_id = '$id'";
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
    $id = $_POST["fsc001p4_id"];
	$fsc001p4_outputid = $_POST["fsc001p4_outputid"];
	$fsc001p4_qtypcs = $_POST["fsc001p4_qtypcs"];
    $fsc001p4_qtykg = $_POST["fsc001p4_qtykg"];
    
	$fsc001p4_wippcs = $_POST["fsc001p4_wippcs"];
    $fsc001p4_wipkg = $_POST["fsc001p4_wipkg"];
    
    $fsc001p4_updatedby = $_SESSION['system_username'];
    $fsc001p4_dtupdated = $currentdate2;
    $fsc001p4_status = "Active";
    
    //getting fsc001_weight
    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a 
    INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid 
    INNER JOIN fsc001p3_jt c ON b.fsc001p2_id = c.fsc001p3_iooid
    WHERE c.fsc001p3_id='$fsc001p4_outputid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p4_qtykg = $fsc001_weight/1000 * $fsc001p4_qtypcs;
        $fsc001p4_wipkg = $fsc001_weight/1000 * $fsc001p4_wippcs;
    }
    else
    {
        $fsc001p4_qtykg = 0;
        $fsc001p4_wipkg =0;  
    }

    //Update query
    $query = "UPDATE fsc001p4_jt SET
            fsc001p4_outputid = '$fsc001p4_outputid',
            fsc001p4_qtypcs = '$fsc001p4_qtypcs',
            fsc001p4_qtykg = '$fsc001p4_qtykg',
            fsc001p4_wippcs = '$fsc001p4_wippcs',
            fsc001p4_wipkg = '$fsc001p4_wipkg',

            fsc001p4_updatedby = '$fsc001p4_updatedby',
            fsc001p4_dtupdated = '$fsc001p4_dtupdated',
            fsc001p4_status = '$fsc001p4_status'
            WHERE fsc001p4_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001p4_jt WHERE fsc001p4_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>