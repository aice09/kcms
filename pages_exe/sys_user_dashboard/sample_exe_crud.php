<?php
include '../../environment.php';
include '../../config/database.php';

if (isset($_POST['submit_btn'])) {

	$empinfo_empid = $_POST["empinfo_empid"];
	$empinfo_name = $_POST["empinfo_name"];
	$empinfo_department = $_POST["empinfo_department"];
    $empinfo_position = $_POST["empinfo_position"];
    $empinfo_date = date('m/d/Y');
    $empinfo_temperature = $_POST["empinfo_temperature"];
    $empinfo_cough = $_POST["new_empinfo_cough"];
    $empinfo_fever = $_POST["new_empinfo_fever"];
    $empinfo_df = $_POST["new_empinfo_df"];
    $empinfo_diarrhea = $_POST["new_empinfo_diarrhea"];
    $empinfo_chills = $_POST["new_empinfo_chills"];
	$empinfo_cas = $_POST["new_empinfo_cas"];
	$empinfo_headache = $_POST["new_empinfo_headache"];
    $empinfo_sorethroat = $_POST["new_empinfo_sorethroat"];
    $empinfo_bjp = $_POST["new_empinfo_bjp"];
    $empinfo_lots = $_POST["new_empinfo_lots"];
    $empinfo_rwn = $_POST["new_empinfo_rwn"];
    $empinfo_dv = $_POST["new_empinfo_dv"];
    $empinfo_ef = $_POST["new_empinfo_ef"];
    $empinfo_anywhere = $_POST["new_empinfo_anywhere"];
    $empinfo_where = $_POST["empinfo_where"];
    
    $empinfo_dtcreated = $currentdate2;
    $empinfo_createdby = $_SESSION['system_username'];
    $empinfo_dtupdated = " ";
    $empinfo_updatedby = " ";
    $empinfo_status = "ACTIVE";

	$query="INSERT INTO dailysymptomchecklist(
			empinfo_empid,
			empinfo_name,
			empinfo_department,
            empinfo_position,
            empinfo_date,
            empinfo_temperature,
            empinfo_cough,
            empinfo_fever,
            empinfo_df,
            empinfo_diarrhea,
            empinfo_chills,
			empinfo_cas,
			empinfo_headache,
            empinfo_sorethroat,
            empinfo_bjp,
            empinfo_lots,
            empinfo_rwn,
            empinfo_dv,
            empinfo_ef,
            empinfo_anywhere,
            empinfo_where,
            empinfo_dtcreated,
            empinfo_createdby,
            empinfo_dtupdated,
            empinfo_updatedby,
            empinfo_status
			) 
			VALUES (
			'$empinfo_empid',
			'$empinfo_name',
			'$empinfo_department',
            '$empinfo_position',
            '$empinfo_date',
            '$empinfo_temperature',
            '$empinfo_cough',
            '$empinfo_fever',
            '$empinfo_df',
            '$empinfo_diarrhea',
            '$empinfo_chills',
			'$empinfo_cas',
			'$empinfo_headache',
            '$empinfo_sorethroat',
            '$empinfo_bjp',
            '$empinfo_lots',
            '$empinfo_rwn',
            '$empinfo_dv',
            '$empinfo_ef',
            '$empinfo_anywhere',
            '$empinfo_where',
            '$empinfo_dtcreated',
            '$empinfo_createdby',
            '$empinfo_dtupdated',
            '$empinfo_updatedby',
            '$empinfo_status'
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
    $query = "SELECT * FROM dailysymptomchecklist
        WHERE empinfo_id = '$id'";
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
    $id=$_POST['empinfo_id'];
    $empinfo_empid = $_POST["empinfo_empid"];
	$empinfo_name = $_POST["empinfo_name"];
	$empinfo_department = $_POST["empinfo_department"];
    $empinfo_position = $_POST["empinfo_position"];
    $empinfo_date = date('m/d/Y');
    $empinfo_temperature = $_POST["empinfo_temperature"];
    $empinfo_cough = $_POST["new_empinfo_cough"];
    $empinfo_fever = $_POST["new_empinfo_fever"];
    $empinfo_df = $_POST["new_empinfo_df"];
    $empinfo_diarrhea = $_POST["new_empinfo_diarrhea"];
    $empinfo_chills = $_POST["new_empinfo_chills"];
	$empinfo_cas = $_POST["new_empinfo_cas"];
	$empinfo_headache = $_POST["new_empinfo_headache"];
    $empinfo_sorethroat = $_POST["new_empinfo_sorethroat"];
    $empinfo_bjp = $_POST["new_empinfo_bjp"];
    $empinfo_lots = $_POST["new_empinfo_lots"];
    $empinfo_rwn = $_POST["new_empinfo_rwn"];
    $empinfo_dv = $_POST["new_empinfo_dv"];
    $empinfo_ef = $_POST["new_empinfo_ef"];
    $empinfo_anywhere = $_POST["new_empinfo_anywhere"];
    $empinfo_where = $_POST["empinfo_where"];
    
    $empinfo_dtcreated = $currentdate2;
    $empinfo_createdby = $_SESSION['system_username'];
    $empinfo_dtupdated = " ";
    $empinfo_updatedby = " ";
    $empinfo_status = "ACTIVE";

    //Update query
    $query = "UPDATE dailysymptomchecklist SET
            empinfo_empid = '$empinfo_empid',
            empinfo_name = '$empinfo_name',
            empinfo_department = '$empinfo_department',
            empinfo_position = '$empinfo_position',
            empinfo_date = '$empinfo_date',
            empinfo_temperature = '$empinfo_temperature',
            empinfo_cough = '$empinfo_cough',
            empinfo_fever = '$empinfo_fever',
            empinfo_df = '$empinfo_df',
            empinfo_diarrhea = '$empinfo_diarrhea',
            empinfo_chills = '$empinfo_chills',
            empinfo_cas = '$empinfo_cas',
            empinfo_headache = '$empinfo_headache',
            empinfo_sorethroat = '$empinfo_sorethroat',
            empinfo_bjp = '$empinfo_bjp',
            empinfo_lots = '$empinfo_lots',
            empinfo_rwn = '$empinfo_rwn',
            empinfo_dv = '$empinfo_dv',
            empinfo_ef = '$empinfo_ef',
            empinfo_anywhere = '$empinfo_anywhere',
            empinfo_where = '$empinfo_where',
            empinfo_dtcreated = '$empinfo_dtcreated',
            empinfo_createdby = '$empinfo_createdby',
            empinfo_dtupdated = '$empinfo_dtupdated',
            empinfo_updatedby = '$empinfo_updatedby',
            empinfo_status = '$empinfo_status'
            WHERE empinfo_id = '$id'";
            

	if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    $id=$_POST['crud_id'];

    $query = "DELETE FROM dailysymptomchecklist WHERE empinfo_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>