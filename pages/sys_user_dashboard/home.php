<br>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard">Home</a></li>
  <li>Dashboard</li>
</ol>

<h1>Dashboard</h1>
<?php
$query = "SELECT COUNT(*) AS jobticket FROM fsc001_jt ";
$result1 = mysqli_query($db, $query);
$output1 = '';
while($row1 = mysqli_fetch_array($result1))
{
    $output1 .= $row1["jobticket"];
}

$query = "SELECT COUNT(*) AS stocks FROM fsc001p5_jt ";
$result2 = mysqli_query($db, $query);
$output2 = '';
while($row2 = mysqli_fetch_array($result2))
{
    $output2 .= $row2["stocks"];
}

$query = "SELECT COUNT(*) AS invoice FROM fsc001p6_jt ";
$result3 = mysqli_query($db, $query);
$output3 = '';
while($row3 = mysqli_fetch_array($result3))
{
    $output3 .= $row3["invoice"];
}

$query = "SELECT COUNT(*) AS joboutput FROM fsc001p4_jt ";
$result4 = mysqli_query($db, $query);
$output4 = '';
while($row4 = mysqli_fetch_array($result4))
{
    $output4 .= $row4["joboutput"];
}

//session
/* $query = "SELECT COUNT(*) AS yourrecords FROM dailysymptomchecklist WHERE empinfo_empid='{$_SESSION['system_username']}' ";
$result4 = mysqli_query($db, $query);
$output4 = '';
while($row4 = mysqli_fetch_array($result4))
{
    $output4 .= $row4["yourrecords"];
} */

?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		        <div class="panel panel-green">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-clipboard fa-5x"></i> 
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $output4; ?></div>
		                        <div>Job Ticket </div>
		                    </div>
		                </div>
		            </div>
		            <a href="index.php?page=jobticket">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		        <div class="panel panel-verdun-green">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-linode fa-5x"></i> 
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $output3; ?></div>
		                        <div>Stock Record </div>
		                    </div>
		                </div>
		            </div>
		            <a href="index.php?page=jobticket">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		        <div class="panel panel-green-vogue">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-print fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $output2; ?></div>
		                        <div>Invoice Record</div>
		                    </div>
		                </div>
		            </div>
		            <a href="index.php?page=origin">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		        <div class="panel panel-loulou">
		            <div class="panel-heading">
		                <div class="row">
		                    <div class="col-xs-3">
		                        <i class="fa fa-cogs fa-5x"></i>
		                    </div>
		                    <div class="col-xs-9 text-right">
		                        <div class="huge"><?php echo $output1; ?></div>
		                        <div>Output Record</div>
		                    </div>
		                </div>
		            </div>
		            <a href="index.php?page=ouput">
		                <div class="panel-footer">
		                    <span class="pull-left">View Details</span>
		                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                    <div class="clearfix"></div>
		                </div>
		            </a>
		        </div>
		    </div>
		</div>
	</div>
	<div style="height:600px;"></div>