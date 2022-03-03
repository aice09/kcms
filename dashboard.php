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
        $title="Checklist";  
        $content='pages/sys_user_dashboard/fsc001.php';        
        break;

    case 'fsc001p2' :
        $title="Checklist";  
        $content='pages/sys_user_dashboard/fsc001p2.php';        
        break;
    case 'fsc001p3' :
        $title="Checklist";  
        $content='pages/sys_user_dashboard/fsc001p3.php';        
        break;

    default :
        $title="Home";  
        $content ='pages/sys_user_dashboard/home.php';     
}

require_once 'template/sys_user_dashboard/body.php';
?>