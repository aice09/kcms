<?php
include '../../environment.php';
include '../../config/database.php';

$request=$_REQUEST;
$col =array(
    0   =>  'fsc001p2_id',
    1   =>  'fsc001p2_jtid',
    2   =>  'fsc001p2_ponum',
    3   =>  'fsc001p2_recieveddate',
    4   =>  'fsc001p2_issueddate',
    5   =>  'fsc001p2_rollnum',
    6   =>  'fsc001p2_lotnum',
    7   =>  'fsc001p2_qtym',
    8   =>  'fsc001p2_qtypcs',
    9   =>  'fsc001p2_qtykg',
    10   =>  'fsc001p2_createdby',
    11   =>  'fsc001p2_dtcreated',
    12   =>  'fsc001p2_updatedby',
    13   =>  'fsc001p2_dtupdated',
    14   =>  'fsc001p2_status'
);  //create column like table in database

$sql =" SELECT * FROM fsc001p2_jt
        /*WHERE fsc001p2_createdby = '{$_SESSION['system_username']}'*/
        ORDER BY fsc001p2_id DESC;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT * FROM fsc001p2_jt
        /*WHERE fsc001p2_createdby = '{$_SESSION['system_username']}'*/
        WHERE 1=1
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (fsc001p2_ponum Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_recieveddate Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_issueddate Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_rollnum Like '%".$request['search']['value']."%'";
    $sql.=" OR fsc001p2_lotnum Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_qtym Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_qtypcs Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_qtykg Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_createdby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_dtcreated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_updatedby Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_dtupdated Like '%".$request['search']['value']."%' ";
    $sql.=" OR fsc001p2_status Like '%".$request['search']['value']."%' )";
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
    $subdata[]=$row[7]; 
    $subdata[]=$row[6]; 
    $subdata[]=$row[8];
    $subdata[]=$row[9];    
    $subdata[]=$row[10];      
    $subdata[]=$row[11];    
    $subdata[]=$row[12];    
    $subdata[]=$row[13];    
    $subdata[]=$row[14];
    //if date today is not equal to date created do not show edit and delete button
    //if($row[5] == date('m/d/Y')){
        $subdata[]='<a href="dashboard.php?page=fsc001p3&id='.$row[0].'&ponum='.$row[2].'" class="btn btn-default btn-sm" id="view" >View</a> <button type="button" class="btn btn-primary btn-sm" id="update" data-id="'.$row[0].'" >Edit</button>
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
