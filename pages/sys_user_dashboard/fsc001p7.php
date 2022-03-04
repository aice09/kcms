<?php
/* $query = "SELECT a.fsc001_number AS jt FROM fsc001_jt a INNER JOIN fsc001p2_jt b ON a.fsc001_id = b.fsc001p2_jtid WHERE b.fsc001p2_id = '{$_GET['id']}'";
$result = mysqli_query($db, $query);
$jt = '';
while($row = mysqli_fetch_array($result))
{
    $jt .= $row["jt"];
} */
?>

<br>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard">Home</a></li>
  <li>Dashboard</li>
  <li>FSC</li>
  <li><a href="dashboard.php?page=fsc001">Mix Paper Cups</a></li>
  <li><a href="dashboard.php?page=fsc001">Job Ticket Details (<?php /* echo $jt; */ ?>) </a></li>
  <li>Input of Origin (<?php /* echo $_GET["ponum"] */ ?>)</li>
  <li>Output</li>
  <li>Stocks</li>
  <li>Delivery</li>
  <li>Accounting</li>
  <li>Waste</li>
</ol>

<h1>Mix Paper Cups| Waste (<?php /* echo $_GET["ponum"] */ ?>) </h1>

<button type="button" class="btn btn-success create-new">Add New Data</button><br><br>
<table class="table table-bordered responsive nowrap" id="example" width="100%">
	<thead> 
		<tr>
			<th width="3%">No</th>
			<th width="6%">Quantity(pcs)</th>			
			<th width="6%">Quantity(kg)</th>	
            <th width="6%">Conversion Factor</th>	
			<th></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="3%">No</th>
			<th width="6%">Quantity(pcs)</th>			
			<th width="6%">Quantity(kg)</th>	
            <th width="6%">Conversion Factor</th>	
			<th></th>
		</tr>
	</tfoot>
</table>
      
<script type="text/javascript">
$(document).ready(function() {

    $('#datetimepicker4').datetimepicker({
        format: 'L'
    });
    
    //Reading
    var dataTable = $('#example').DataTable({        
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "pages_exe/sys_user_dashboard/fsc001p7_exe_dt.php",
            type: "POST",
			/* success: function(response) {
				console.log(response);
			},
			error: function(response) {
				console.log(response);
			} */
        }
    });
});
</script>
