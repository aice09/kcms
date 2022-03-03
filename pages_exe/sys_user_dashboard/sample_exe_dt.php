<?php
include '../../environment.php';
include '../../config/database.php';

$request=$_REQUEST;
$col =array(
    0   =>  'empinfo_id',
    1   =>  'empinfo_empid',
    2   =>  'empinfo_name',
    3   =>  'empinfo_department',
    4   =>  'empinfo_position',
    5   =>  'empinfo_date',
    6   =>  'empinfo_temperature',
    7   =>  'empinfo_cough',
    8   =>  'empinfo_fever',
    9   =>  'empinfo_df',
    10   =>  'empinfo_diarrhea',
    11   =>  'empinfo_chills',
    12   =>  'empinfo_cas',
    13   =>  'empinfo_headache',
    14   =>  'empinfo_sorethroat',
    15   =>  'empinfo_bjp',
    16   =>  'empinfo_lots',
    17   =>  'empinfo_rwn',
    18   =>  'empinfo_dv',
    19   =>  'empinfo_ef',
    20   =>  'empinfo_anywhere',
    21   =>  'empinfo_where',
    22   =>  'empinfo_dtcreated',
    23   =>  'empinfo_createdby',
    24   =>  'empinfo_dtupdated',
    25   =>  'empinfo_updatedby',
    26   =>  'empinfo_status'
);  //create column like table in database

$sql =" SELECT * FROM dailysymptomchecklist
        WHERE empinfo_empid = '{$_SESSION['system_username']}'
        ORDER BY empinfo_id DESC;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT * FROM dailysymptomchecklist
        WHERE empinfo_empid = '{$_SESSION['system_username']}'
        AND 1=1
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (empinfo_date Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_temperature Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_cough Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_fever Like '%".$request['search']['value']."%'";
    $sql.=" OR empinfo_df Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_diarrhea Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_chills Like '%".$request['search']['value']."%' ";
    $sql.=" OR empinfo_cas Like '%".$request['search']['value']."%' )";
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
    $subdata[]=$row[15]; 
    $subdata[]=$row[16];
    $subdata[]=$row[17];
    $subdata[]=$row[18];
    $subdata[]=$row[19];
    $subdata[]=$row[20];
    $subdata[]=$row[21];
    $subdata[]=$row[22];
    $subdata[]=$row[23];
    $subdata[]=$row[24];
    $subdata[]=$row[25];
    $subdata[]=$row[26];   
    //if date today is not equal to date created do not show edit and delete button
    if($row[5] == date('m/d/Y')){
        $subdata[]='<!--<button type="button" class="btn btn-primary btn-sm" id="update" data-id="'.$row[0].'" >Edit</button> -->
        <button type="button" class="btn btn-danger btn-sm" id="delete" data-id="'.$row[0].'" >Delete</button>';
    }else{
        $subdata[]='';
    }
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