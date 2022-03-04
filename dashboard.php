<?php 
require_once 'environment.php';

$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	//My Profile
    case 'myprofile-calendar' :
        $title="Checklist";  
        $content='pages/sys_user_dashboard/myprofile/calendar.php';        
        break;

    case 'fsc001' :
        $title="Job Ticket";  
        $content='pages/sys_user_dashboard/fsc001.php';        
        break;

    case 'fsc001p2' :
        $title="Origin";  
        $content='pages/sys_user_dashboard/fsc001p2.php';        
        break;
    case 'fsc001p3' :
        $title="Output";  
        $content='pages/sys_user_dashboard/fsc001p3.php';        
        break;
    case 'fsc001p4' :
        $title="Stocks";  
        $content='pages/sys_user_dashboard/fsc001p4.php';        
        break;
    case 'fsc001p5' :
        $title="Delivery";  
        $content='pages/sys_user_dashboard/fsc001p5.php';        
        break;
    case 'fsc001p6' :
        $title="Delivery";  
        $content='pages/sys_user_dashboard/fsc001p6.php';        
        break;
    case 'fsc001p7' :
        $title="Accounting";  
        $content='pages/sys_user_dashboard/fsc001p7.php';        
        break;
    case 'fsc001p8' :
        $title="Waste";  
        $content='pages/sys_user_dashboard/fsc001p8.php';        
        break;

    default :
        $title="Home";  
        $content ='pages/sys_user_dashboard/home.php';     
}

require_once 'template/sys_user_dashboard/body.php';
?>