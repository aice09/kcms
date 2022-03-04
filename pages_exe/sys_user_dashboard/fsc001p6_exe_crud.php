<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$fsc001p6_id = $_POST["fsc001p6_id"];
	$fsc001p6_deliveryid = $_POST["fsc001p6_deliveryid"];
	$fsc001p6_invoicedate = $_POST["fsc001p6_invoicedate"];
    $fsc001p6_invoicenum = $_POST["fsc001p6_invoicenum"];
	$fsc001p6_qtypcs = $_POST["fsc001p6_qtypcs"];

    //getting fsc001_weight
    /*
    a jobticket
    b input of origin
    c output
    d stocks
    e delivery
    f accounting
    g waste
    */

    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a 
    INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid 
    INNER JOIN fsc001p3_jt c ON b.fsc001p2_id = c.fsc001p3_iooid
    INNER JOIN fsc001p4_jt d ON d.fsc001p4_outputid = c.fsc001p3_id
    INNER JOIN fsc001p5_jt e ON e.fsc001p5_stockid = d.fsc001p4_id   
    WHERE e.fsc001p5_id ='$fsc001p6_deliveryid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p6_qtykg = $fsc001_weight/1000 * $fsc001p6_qtypcs;
    }
    else
    {
        $fsc001p6_qtykg = 0;
    }

    
    $fsc001p6_createdby = $_SESSION['system_username'];
    $fsc001p6_dtcreated = $currentdate2;
    $fsc001p6_updatedby = " ";
    $fsc001p6_dtupdated = " ";
    $fsc001p6_status = "Active";

    

    //$fsc001p6_qtypcs = $fsc001_weight/1000 * $fsc001p6_invoicenum;

	$query="INSERT INTO fsc001p6_jt(
			fsc001p6_deliveryid,
			fsc001p6_invoicedate,
            fsc001p6_invoicenum,
            fsc001p6_qtypcs,
            fsc001p6_qtykg,
            fsc001p6_createdby,
            fsc001p6_dtcreated,
            fsc001p6_updatedby,
            fsc001p6_dtupdated,
            fsc001p6_status
			) 
			VALUES (
			'$fsc001p6_deliveryid',
			'$fsc001p6_invoicedate',
            '$fsc001p6_invoicenum',
            '$fsc001p6_qtypcs',
            '$fsc001p6_qtykg',
            '$fsc001p6_createdby',
            '$fsc001p6_dtcreated',
            '$fsc001p6_updatedby',
            '$fsc001p6_dtupdated',
            '$fsc001p6_status'
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
    $query = "SELECT * FROM fsc001p6_jt
        WHERE fsc001p6_id = '$id'";
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
    $id = $_POST["fsc001p6_id"];
	$fsc001p6_deliveryid = $_POST["fsc001p6_deliveryid"];
	$fsc001p6_invoicedate = $_POST["fsc001p6_invoicedate"];
    $fsc001p6_invoicenum = $_POST["fsc001p6_invoicenum"];
	$fsc001p6_qtypcs = $_POST["fsc001p6_qtypcs"];
    
    
    $fsc001p6_updatedby = $_SESSION['system_username'];
    $fsc001p6_dtupdated = $currentdate2;
    $fsc001p6_status = "Active";
    
    //getting fsc001_weight
    /*
    a jobticket
    b input of origin
    c output
    d stocks
    e delivery
    f accounting
    g waste
    */

    $query1 = "SELECT a.fsc001_weight AS fsc001_weight FROM fsc001_jt a 
    INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid 
    INNER JOIN fsc001p3_jt c ON b.fsc001p2_id = c.fsc001p3_iooid
    INNER JOIN fsc001p4_jt d ON d.fsc001p4_outputid = c.fsc001p3_id
    INNER JOIN fsc001p5_jt e ON e.fsc001p5_stockid = d.fsc001p4_id   
    WHERE e.fsc001p5_id ='$fsc001p6_deliveryid'";
    $result1 = mysqli_query($db, $query1);
    $fsc001_weight = '';
    while($row1 = mysqli_fetch_array($result1))
    {
        $fsc001_weight .= $row1["fsc001_weight"];
    }

    //calculate fsc001p3_qtykg
    if ($fsc001_weight != 0) {
        $fsc001p6_qtykg = $fsc001_weight/1000 * $fsc001p6_qtypcs;
    }
    else
    {
        $fsc001p6_qtykg = 0;
    }

    //Update query
    $query = "UPDATE fsc001p6_jt SET
            fsc001p6_invoicedate = '$fsc001p6_invoicedate',
            fsc001p6_invoicenum = '$fsc001p6_invoicenum',
            fsc001p6_qtypcs = '$fsc001p6_qtypcs',
            fsc001p6_qtykg = '$fsc001p6_qtykg',

            fsc001p6_updatedby = '$fsc001p6_updatedby',
            fsc001p6_dtupdated = '$fsc001p6_dtupdated',
            fsc001p6_status = '$fsc001p6_status'
            WHERE fsc001p6_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM fsc001p6_jt WHERE fsc001p6_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>