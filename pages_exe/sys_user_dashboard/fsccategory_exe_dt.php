<?php
include '../../environment.php';
include '../../config/database.php';

$request=$_REQUEST;
$col =array(
    0   =>  'fsccat_id',
    1   =>  'fsccat_name',
    2   =>  'fsccat_createdby',
    3   =>  'fsccat_dtcreated',
    4   =>  'fsccat_updatedby',
    5   =>  'fsccat_dtupdated',
    6   =>  'fsccat_status'
);  //create column like table in database

$sql =" SELECT * FROM fsc_category
        /*WHERE fsccat_createdby = '{$_SESSION['system_username']}'*/
        ORDER BY fsccat_id DESC;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT * FROM fsc_category
        /*WHERE fsccat_createdby = '{$_SESSION['system_username']}'*/
        WHERE 1=1
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (fsccat_name Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsccat_createdby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsccat_dtcreated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsccat_updatedby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsccat_dtupdated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsccat_status Like '%".$request['search']['value']."%' )";
}
$query=mysqli_query($db,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($db,$sql);

$data=array();
$i=1;
while($row=mysqli_fetch_array($query)){
    $subdata=array();

    $subdata[]= $i++;     
    $subdata[]=$row[1]; 
    $subdata[]=$row[2]; 
    $subdata[]=$row[3];   
    $subdata[]=$row[4];   
    $subdata[]=$row[5];
    $subdata[]=$row[6];   
    //if date today is not equal to date created do not show edit and delete button
    //if($row[5] == date('m/d/Y')){
        $subdata[]='<button type="button" class="btn btn-primary btn-sm" id="update" data-id="'.$row[0].'" >Edit</button>
        <button type="button" class="btn btn-danger btn-sm" id="delete" data-id="'.$row[0].'" >Delete</button>';
    /* }else{
        $subdata[]='';
    } */
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
