<?
if(session_id() == '') {
    session_start();
}
$username     = $_SESSION['username'];
$account_type = $_SESSION['rapidUserAccountType']; //1 = regular, 2 = admin
/* Get user roles */
if($call_on_handler == 1){
	require_once('../class/oop.php');
}else{
	require_once('class/oop.php');
}
$array_fields = array('*');
$table 		  = '`tbl_user_roles`';
$joins 		  = '';
$sql_where	  = 'WHERE `user` = "'.$username.'" and `logdel` = "0"';
$sql_order	  = '';
$sql_limit	  = '';
$result 	  = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
$script 	  = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
$user_role = array(
	"fk_module" => array()
);
while( $row = mysqli_fetch_array($result) ){
	$user_role[ $row['fk_module'] ]['create']  	= $row['create'];
	$user_role[ $row['fk_module'] ]['read']   	= $row['read'];
	$user_role[ $row['fk_module'] ]['update']  	= $row['update'];
	$user_role[ $row['fk_module'] ]['delete'] 	= $row['delete'];
}
if($result->num_rows == 0){
	echo 'user '.$username.' does not have an access to this system!';
	exit;
}

// echo '<p>Dear All,</p>';
// echo '<p>	As per discussion today, all MAS transactions will be on hold and all data will be purged. Please use the MAS Alert System Tommorow June 8, 2017 07:30:00AM </p>';
// echo '<p>Thank you,</p>';
// exit;
?>