<?php
include '../../environment.php';
include '../../config/database.php';

$request=$_REQUEST;
$col =array(
    0   =>  'fsc001p6_id',
    1   =>  'fsc001p6_deliveryid',
    2   =>  'fsc001p6_invoicedate',
    3   =>  'fsc001p6_invoicenum',
    4   =>  'fsc001p6_qtypcs',
    5   =>  'fsc001p6_qtykg',
    6   =>  'fsc001p6_createdby',
    7   =>  'fsc001p6_dtcreated',
    8   =>  'fsc001p6_updatedby',
    9   =>  'fsc001p6_dtupdated',
    10   =>  'fsc001p6_status'
);  //create column like table in database

$sql =" SELECT * FROM fsc001p6_jt
        /*WHERE fsc001p6_createdby = '{$_SESSION['system_username']}'*/
        ORDER BY fsc001p6_id DESC;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT * FROM fsc001p6_jt
        /*WHERE fsc001p6_createdby = '{$_SESSION['system_username']}'*/
        WHERE 1=1
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (fsc001p6_invoicedate Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_invoicenum Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_qtypcs Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_qtykg Like '%".$request['search']['value']."%'";
    $sql.=" OR fsc001p6_createdby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_dtcreated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_updatedby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_dtupdated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p6_status Like '%".$request['search']['value']."%' )";
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
    //$subdata[]=$row[1]; 
    $subdata[]=$row[2]; 
    $subdata[]=$row[3];   
    $subdata[]=$row[4];   
    $subdata[]=$row[5]; 
    $subdata[]=$row[6]; 
    $subdata[]=$row[7]; 
    $subdata[]=$row[8];
    $subdata[]=$row[9];   
    $subdata[]=$row[10];   
    //if date today is not equal to date created do not show edit and delete button
    //if($row[5] == date('m/d/Y')){
        $subdata[]='<a href="dashboard.php?page=fsc001p5&id='.$row[0].'" class="btn btn-default btn-sm" id="view" >View</a> <button type="button" class="btn btn-primary btn-sm" id="update" data-id="'.$row[0].'" >Edit</button>
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
