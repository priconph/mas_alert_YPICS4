<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				/* do not edit below */
				case "get_dispatch_destination" 					: get_dispatch_destination(); break;
				case "update_dispatch_destination" 					: update_dispatch_destination(); break;
				case "delete_dispatch_destination" 					: delete_dispatch_destination(); break;
				case "get_classification" 							: get_classification(); break;
				case "update_classification" 						: update_classification(); break;
				case "delete_classification" 						: delete_classification(); break;
				case "get_po_datalist" 								: get_po_datalist(); break; 
				case "get_po_bom" 									: get_po_bom(); break; 
				case "save_request" 								: save_request(); break; 
				case "get_material_request_data"					: get_material_request_data(); break; 
				case "cancel_request"								: cancel_request(); break; 
				case "receive_request"								: receive_request(); break; 
				case "update_seen_by"								: update_seen_by(); break; 
				case "load_warehouse_alert_destination_menu"		: load_warehouse_alert_destination_menu(); break; 
				case "serve_request"								: serve_request(); break; 
				case "add_dispatch_destination"						: add_dispatch_destination(); break; 
				case "add_classification"							: add_classification(); break; 
				
				/* Threshold */
				case "compute_threshold"							: compute_threshold(); break; 
				case "get_parts_pricelist"							: get_parts_pricelist(); break; 
				case "update_parts_pricelist"						: update_parts_pricelist(); break; 
				case "get_request_with_exceeding_threshold"			: get_request_with_exceeding_threshold(); break; 
				case "approve_excess_threshold_request"				: approve_excess_threshold_request(); break; 
				case "disapprove_excess_threshold_request"			: disapprove_excess_threshold_request(); break; 
				case "get_pending_threshold_approval"				: get_pending_threshold_approval(); break; 
				
				/* Send mail alerts */
				case "send_email_alerts"							: send_email_alerts(); break; 
								
				case "encode" 										: encode(); break; 
				case "decode" 										: decode(); break; 
				case "load_records" 								: load_records(); break; 
				case "add_new_record" 								: add_new_record(); break; 
				case "update_fetch_record" 							: update_fetch_record(); break; 
				case "update_record" 								: update_record(); break; 
				case "delete_record" 								: delete_record(); break; 
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
	function get_dispatch_destination(){
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('pkid','destination');
		$table 	   	= 'tbl_dispatch_destination';
		$joins 	   	= '';
		$sql_where 	= 'WHERE logdel="0"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result 	= MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html		= '';
		if( $_POST['return_as'] == 'table' ){
			while($row = mysqli_fetch_array($result)){
				$html .= '<tr>';
				$html .= '	<td id="'.$row['pkid'].'">'.$row['destination'].'</td>';
				$html .= '</tr>';
			}
		}else{
			while($row = mysqli_fetch_array($result)){
				$html .= '<option value="'.$row['pkid'].'">'.$row['destination'].'</option>';
			}
		}
		$return['html']	  = $html;
		echo json_encode($return);
	}
	
	function update_dispatch_destination(){
		require_once('../class/oop.php');
		$table			= 'tbl_dispatch_destination';
		$array_fields 	= array('destination','lastupdate','username');
		$array_values 	= array($_POST['destination'],date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function delete_dispatch_destination(){
		require_once('../class/oop.php');
		$table			= 'tbl_dispatch_destination';
		$array_fields 	= array('logdel','lastupdate','username');
		$array_values 	= array('1',date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function get_classification(){
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('pkid','classification','callout');
		$table 	   	= 'tbl_classification';
		$joins 	   	= '';
		$sql_where 	= 'WHERE logdel="0"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result 	= MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html		= '';
		if( $_POST['return_as'] == 'table' ){
			while($row = mysqli_fetch_array($result)){
				$html .= '<tr>';
				$html .= '	<td id="'.$row['pkid'].'">'.$row['classification'].'</td>';
				$html .= '	<td>'.$row['callout'].'</td>';
				$html .= '</tr>';
			}
		}else{
			while($row = mysqli_fetch_array($result)){
				$html .= '<option value="'.$row['pkid'].'">'.$row['classification'].'</option>';
			}
		}
		$return['html']	  = $html;
		echo json_encode($return);
	}
	
	function update_classification(){
		require_once('../class/oop.php');
		$table			= 'tbl_classification';
		$array_fields 	= array('classification','callout','lastupdate','username');
		$array_values 	= array($_POST['classification'],$_POST['callout'],date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function delete_classification(){
		require_once('../class/oop.php');
		$table			= 'tbl_classification';
		$array_fields 	= array('logdel','lastupdate','username');
		$array_values 	= array('1',date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function get_po_datalist(){
		require_once('../class/oop.php');
		$YPICS = new CNYPICS;
		$pattern 		= $_POST['pattern']; 
		$array_fields 	= array("TOP 10 SORDER as PONumber");
		$table 			= "XRECE";
		$joins 			= "";
		$sql_where 		= "WHERE SORDER LIKE '%$pattern%'";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		while($row = mssql_fetch_array($result)){
			$html .= '<option value="'.$row['PONumber'].'">'.$row['PONumber'].'</option>';
		}
		$return['html'] = $html;
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function get_po_bom(){
		require_once('../class/oop.php');
		$YPICS = new CNYPICS;
		$ponum 			= $_POST['ponum']; 
		$array_fields 	= array("XHEAD.CODE AS DeviceCode","XHEAD.NAME AS DeviceName","XRECE.CVOL AS POQty");
		$table 			= "XHEAD";
		$joins 			= "INNER JOIN XRECE ON XHEAD.CODE = XRECE.CODE";
		$sql_where 		= "WHERE XRECE.SORDER='$ponum'";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['DeviceName'] 	= '';
		$return['POQty'] 		= '';
		while($row = mssql_fetch_array($result)){
			$return['DeviceName'] 	= $row['DeviceName'];
			$return['POQty'] 		= $row['POQty'];
		}
		
		/* OLD QUERY - as per withdrawal detail */
		
		// $array_fields 	= array("XHIKI.SEIBAN AS PONumber","XHIKI.CODE AS Partscode","XRECE.CODE AS Devicecode","XRECE.KVOL AS POQty", "XHEAD.NAME AS Devicename, XHEAD_1.NAME AS Partsname", "XHIKI.KVOL / XRECE.CVOL AS [Usage]");
		// $table 			= "XHIKI";
		// $joins 			= "INNER JOIN XRECE ON XHIKI.SEIBAN = XRECE.SORDER INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE INNER JOIN XHEAD XHEAD_1 ON XHIKI.CODE = XHEAD_1.CODE";
		// $sql_where 		= "WHERE XHIKI.SEIBAN='$ponum'";
		// $sql_order 		= "ORDER BY XHIKI.CODE";
		// $result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		// $script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		// $html = '';
		
		/* NEW QUERY - as per BOM */
		$array_fields 	= array("XRECE.SORDER AS PONumber","XHEAD_1.CODE AS Partscode","XRECE.CODE AS Devicecode","XRECE.KVOL AS POQty", "XHEAD.NAME AS Devicename", "XHEAD_1.NAME AS Partsname", "(XPRTS.SIYOU) AS [Usage]");
		$table 			= "XRECE ";
		$joins 			= " INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE 
							INNER JOIN XPRTS ON XHEAD.CODE = XPRTS.CODE 
							INNER JOIN XHEAD AS XHEAD_1 ON XPRTS.KCODE = XHEAD_1.CODE";
		$sql_where 		= "WHERE XRECE.SORDER='$ponum'";
		$sql_order 		= "ORDER BY XRECE.CODE";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		
		while($row = mssql_fetch_array($result)){
			$html .= '<tr>';
			$html .= '	<td>'.$row['Partscode'].'</td>';
			$html .= '	<td>'.check_utf8($row['Partsname']).'</td>';
			$html .= '	<td>'.number_format($row['Usage'], 4, '.', '').'</td>';
			$html .= '</tr>';
		}
		$return['html'] = $html;
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function check_utf8($string){
		$converted_string = mb_check_encoding($string, 'UTF-8') ? $string : utf8_encode($string);
		return $converted_string;
    }
	
	function save_request(){
		require_once('../class/oop.php');
		$return = $_POST;
		$array_details = $_POST['request_details'];
		$request_number = get_request_number();
		/* save main record */
		$table = 'tbl_material_request';
		$array_fields = array('request_number','transaction_date','po_number','po_qty',
							  'fk_dispatch_destination','line','status',
							  'requested_by','lastupdate','username');
		$array_values = array($request_number,date('Y-m-d H:i:s'),$_POST['txt_po_number'],$_POST['txt_po_qty'],
							  $_POST['cmb_dispatch_destination'],$_POST['txt_line'],'0',
							  $_POST['txt_requested_by'],date('Y-m-d h:i:s'),$_POST['username']);
		$fk_material_request = MAS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$script = '';
		
		/* save material request details */
		$needs_replacement = false;
		$needs_threshold_approval = false;
		foreach($array_details['partscode'] as $key => $value){
			if($array_details['put_away_location'][$key] == 1){
				$needs_replacement = true;
			}
			/* May also need to check the previous request from this PO */
			if($array_details['total_price'][$key] > $array_details['threshold_limit'][$key]){
				$needs_threshold_approval = true;
			}
			$table = 'tbl_material_request_details';
			$array_fields = array('fk_material_request','partscode','partsname',
								  'issued_qty','actual_qty','variance',
								  'fk_classification','kit_no','ud_reference_no',
								  'price','`usage`','total_price','threshold_limit',
								  'put_away_location','lastupdate','username');
			$array_values = array($fk_material_request,$array_details['partscode'][$key],$array_details['partsname'][$key],
								  $array_details['issued_qty'][$key],$array_details['actual_qty'][$key],$array_details['variance'][$key],
								  $array_details['classification'][$key],$array_details['kit_no'][$key], $array_details['ud_ref_no'][$key],
								  $array_details['price'][$key],$array_details['usage'][$key], $array_details['total_price'][$key], $array_details['threshold_limit'][$key],
								  $array_details['put_away_location'][$key], date('Y-m-d h:i:s'), $_POST['username']);
			$result = MAS::getInstance()->insert_query_id($table,$array_fields,$array_values);
			$script = MAS::getInstance()->insert_query_script($table,$array_fields,$array_values);
		}
		if(!$needs_replacement){
			serve_request_not_requiring_approval($fk_material_request);
		}
		if($needs_threshold_approval){
			add_threshold_approval($fk_material_request);
			/* send e-mail moved to a mailer due to long saving due to slow e-mail */ 
			// $return['send_mail'] = send_threshold_email($request_number,$_POST['txt_po_number']);
		}
		$return = array();
		$return['array_details'] 		= $array_details;
		$return['request_number'] 		= $request_number;
		$return['fk_material_request']  = $fk_material_request;
		$return['needs_threshold_approval']  = $needs_threshold_approval;
		$return['script']  				= $script;
		echo json_encode($return);
	}
	
	function serve_request_not_requiring_approval($fk_material_request){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('status','served_by','date_served','lastupdate','username');
		$array_values 	= array('1','',date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $fk_material_request;
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		return $return;
	}
	
	function add_threshold_approval($fk_material_request){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('status','lastupdate','username');
		$array_values 	= array('9',date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $fk_material_request;
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		return $return;
	}
	
	function get_request_number(){
		require_once('../class/oop.php');
		/* get last request number */
		$array_fields = array('MAX(request_number) as request_number');
		$table		  = "tbl_material_request"; 
		$joins		  = ""; 
		$sql_where	  = "WHERE request_number LIKE '%".date('my').'-'."%' AND `logdel` = '0';"; 
		$sql_order	  = ""; 
		$sql_limit	  = ""; 
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		if($result->num_rows == 0){
			$count = 1;
			$request_number = date('y-m').'-'.str_pad($count, 3, '0', STR_PAD_LEFT);
		}else{
			 $row = mysqli_fetch_array($result);
			 $current_request_number = explode('-',$row['request_number']);
			 $month_year = $current_request_number[0];
			 if($month_year == date('my')){
				 $count = $current_request_number[1];
				 $request_number = $month_year.'-'.str_pad(($count+1), 3, '0', STR_PAD_LEFT);
			 }else{
				 $count = 1;
				 $request_number = date('my').'-'.str_pad(($count), 3, '0', STR_PAD_LEFT);
			 }
		}
		return $request_number;
	}
	
	function get_material_request_data(){
		require_once('../class/oop.php');
		$array_fields = array('`mr`.*','`dd`.`destination`');
		$table		  = "tbl_material_request `mr`"; 
		$joins		  = "INNER JOIN tbl_dispatch_destination `dd` ON `mr`.`fk_dispatch_destination` = `dd`.`pkid`"; 
		$sql_where	  = "WHERE `mr`.pkid = '".$_POST['pkid']."' AND `mr`.`logdel` = '0'"; 
		$sql_order	  = ""; 
		$sql_limit	  = ""; 
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return = array();
		while($row = mysqli_fetch_array($result)){
			$return['request_number'] 			= $row['request_number'];
			$return['transaction_date'] 		= $row['request_number'];
			$return['po_number'] 				= $row['po_number'];
			$return['fk_dispatch_destination'] 	= $row['fk_dispatch_destination'];
			$return['destination'] 				= $row['destination'];
			$return['line'] 					= $row['line'];
			$return['transaction_date'] 		= $row['transaction_date'];
			$return['requested_by'] 			= $row['requested_by'];
			$return['status'] 					= $row['status'];
			$return['status_text'] 				= get_status($row['status']);
		}
		$request_details = get_material_request_details($_POST['pkid']);
		$return['request_details'] = $request_details;
		$frm_id = $_POST['frm_id'];
		$html = '';
		foreach($request_details['partscode'] as $key => $partscode){
			$html .= '<tr>';
			$html .= '	<td>'.$partscode.'</td>';
			$html .= '	<td>'.$request_details['partsname'][$key].'</td>';
			$html .= '	<td>'.$request_details['issued_qty'][$key].'</td>';
			$html .= '	<td>'.$request_details['actual_qty'][$key].'</td>';
			$html .= '	<td>'.$request_details['variance'][$key].'</td>';
			$html .= '	<td>'.$request_details['classification'][$key].'</td>';
			$html .= '	<td>'.$request_details['kit_no'][$key].'</td>';
			$html .= '	<td>'.$request_details['ud_ref_no'][$key].'</td>';
			$html .= '	<td>'.$request_details['price'][$key].'</td>';
			$html .= '	<td>'.$request_details['usage'][$key].'</td>';
			$html .= '	<td>'.number_format($request_details['total_price'][$key],4,'.','').'</td>';
			$html .= '	<td>'.$request_details['threshold_limit'][$key].'</td>';
			$put_away_location_text = "";
			if($frm_id == "frm_view_request" || $frm_id == "frm_view_threshold_request"){
				$put_away_location_text = get_equivalent_put_away_location('requestor',$request_details['put_away_location'][$key]);
			}
			if($frm_id == "frm_threshold_approval"){
				$put_away_location_text = get_equivalent_put_away_location('requestor',$request_details['put_away_location'][$key]);
			}
			if($frm_id == "frm_warehouse_serve"){
				$put_away_location_text = get_equivalent_put_away_location('requestor',$request_details['put_away_location'][$key]);
			}
			$html .= '	<td>'.$put_away_location_text.'</td>';
			$html .= '</tr>';
		}
		/* get device name and po qty */
		$return['request_details'] = $html;
		$return['script'] = $script;
		$YPICS = new CNYPICS;
		$ponum 			= $return['po_number']; 
		$array_fields 	= array("XHEAD.CODE AS DeviceCode","XHEAD.NAME AS DeviceName","XRECE.CVOL AS POQty");
		$table 			= "XHEAD";
		$joins 			= "INNER JOIN XRECE ON XHEAD.CODE = XRECE.CODE";
		$sql_where 		= "WHERE XRECE.SORDER='$ponum'";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['DeviceName'] 	= '';
		$return['POQty'] 		= '';
		while($row = mssql_fetch_array($result)){
			$return['DeviceName'] 	= $row['DeviceName'];
			$return['POQty'] 		= $row['POQty'];
		}
		echo json_encode($return);
	}
	
	function get_material_request_details($fk_material_request){
		require_once('../class/oop.php');
		$array_fields = array('`mrd`.*','`cla`.classification');
		$table		  = "tbl_material_request_details `mrd`"; 
		$joins		  = "INNER JOIN `tbl_classification` `cla` ON `cla`.`pkid` = `mrd`.`fk_classification` ";
		$sql_where	  = "WHERE `mrd`.fk_material_request = '".$fk_material_request."' AND `mrd`.`logdel` = '0'"; 
		$sql_order	  = ""; 
		$sql_limit	  = ""; 
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$array_details = array(
			"partscode" 		=> array(),
			"partsname" 		=> array(),
			"issued_qty" 		=> array(),
			"actual_qty" 		=> array(),
			"variance" 			=> array(),
			"fk_classification"	=> array(),
			"kit_no" 			=> array(),
			"ud_ref_no" 		=> array(),
			"put_away_location"	=> array()
		);
		while($row = mysqli_fetch_array($result)){
			$array_details['partscode'][] 				= $row['partscode'];
			$array_details['partsname'][] 				= $row['partsname'];
			$array_details['issued_qty'][] 				= $row['issued_qty'];
			$array_details['actual_qty'][] 				= $row['actual_qty'];
			$array_details['variance'][] 				= $row['variance'];
			$array_details['fk_classification'][] 		= $row['fk_classification'];
			$array_details['classification'][] 			= $row['classification'];
			$array_details['kit_no'][] 					= $row['kit_no'];
			$array_details['ud_ref_no'][] 				= $row['ud_reference_no'];
			$array_details['price'][] 					= $row['price'];
			$array_details['usage'][] 					= $row['usage'];
			$array_details['total_price'][] 			= $row['total_price'];
			$array_details['threshold_limit'][] 		= $row['threshold_limit'];
			$array_details['put_away_location'][] 		= $row['put_away_location'];
		}
		return $array_details;
	}
	
	function get_status($status){
		switch($status){
			case 0	: $status = "Alert"; break;
			case 1	: $status = "Alert - ASSY100"; break;
			case 2	: $status = "Served"; break;
			case 3	: $status = "Cancelled"; break;
			case 8	: $status = "Disapproved Threshold Approval"; break;
			case 9	: $status = "Threshold Approval"; break;
			default : $status = "Incorrect Status"; break;
		}
		return $status;
	}
	
	function get_equivalent_put_away_location($used_for,$value){
		if($used_for == "requestor"){
			if($value == "1"){
				$equivalent = "Yes";
			}else{
				$equivalent = "No";
			}
		}
		if($used_for == "warehouse"){
			if($value == "1"){
				$equivalent = "WHS100";
			}else{
				$equivalent = "ASSY100";
			}
		}
		return $equivalent;
	}
	
	function update_seen_by(){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('seen_by','lastupdate');
		$array_values 	= array($_POST['username'],date('Y-m-d H:i:s'));
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function cancel_request(){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('status','remarks','lastupdate','username');
		$array_values 	= array('3',$_POST['remarks'],date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}
	
	function receive_request(){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('status','lastupdate','username');
		$array_values 	= array('4',date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		// $return['script'] = $script;
		echo json_encode($return);
	}	
	
	function load_warehouse_alert_destination_menu(){
		$destination = get_destination();
		$menu = '';
		foreach($destination['destination'] as $key => $dispatch_destination){
			$pending_request = get_pending_per_destination($destination['pkid'][$key]);
			if($pending_request > 0){
				$div_class = 'panel panel-danger';
			}else{
				$div_class = 'panel panel-info';
			}
			$menu .= '<a href="#" data-id="'.$destination['pkid'][$key].'" id="destination_menu">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<div class="'.$div_class.'">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-2">
											<i class="fa fa-cubes fa-5x"></i>
										</div>
										<div class="col-xs-10 text-right">
											<p class="announcement-heading"></p>
											<p class="announcement-text fa-2x"><b id="b_destination"> '.$dispatch_destination.'</b></p>
										</div>
									</div>
								</div>
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-10">
											<span class="badge">'.$pending_request.'</span> Pending Request.
										</div>
										<div class="col-xs-2 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>';
		}
		$return = array();
		$return['html'] = $menu;
		echo json_encode($return);
	}
	
	function get_destination(){
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('pkid','destination');
		$table 	   	= 'tbl_dispatch_destination';
		$joins 	   	= '';
		$sql_where 	= 'WHERE logdel="0"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result 	= MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html		= '';
		$destination = array(
			"pkid"	=> array(),
			"destination" => array()
		);
		while($row = mysqli_fetch_array($result)){
			$destination['pkid'][] 			= $row['pkid'];
			$destination['destination'][] 	= $row['destination'];
		}
		return $destination;		
	}
	
	function get_pending_per_destination($fk_dispatch_destination){
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('COUNT(pkid) as pending_cnt');
		$table 	   	= 'tbl_material_request';
		$joins 	   	= '';
		$sql_where 	= 'WHERE fk_dispatch_destination="'.$fk_dispatch_destination.'" AND (`status`="0" OR `status`= "1") AND logdel="0"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result 	= MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html		= '';
		$pending_cnt = 0;
		while($row = mysqli_fetch_array($result)){
			$pending_cnt = $row['pending_cnt'];
		}
		return $pending_cnt;
	}
	
	function serve_request(){
		require_once('../class/oop.php');
		$table			= 'tbl_material_request';
		$array_fields 	= array('status','served_by','date_served','lastupdate','username');
		$array_values 	= array('2',$_POST['username'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$_POST['username']);
		$pkid 			= $_POST['pkid']; 
		$result 		= MAS::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$script 		= MAS::getInstance()->update_query_script($table,$array_fields,$array_values,$pkid);
		$return = array();
		echo json_encode($return);
	}
	
	function add_dispatch_destination(){
		require_once('../class/oop.php');
		$table 	= 'tbl_dispatch_destination';
		$array_fields = array('destination','lastupdate','username');
		$array_values = array($_POST['txt_dispatch_destination'],date('Y-m-d H:i:s'),$_POST['username']);
		$result = MAS::getInstance()->insert_query($table,$array_fields,$array_values);
		$return = array();
		echo json_encode($return);
	}
	
	function add_classification(){
		require_once('../class/oop.php');
		$table 	= 'tbl_classification';
		$array_fields = array('classification','callout','lastupdate','username');
		$array_values = array($_POST['txt_classification'],$_POST['txt_callout'],date('Y-m-d H:i:s'),$_POST['username']);
		$result = MAS::getInstance()->insert_query($table,$array_fields,$array_values);
		$return = array();
		$return['script'] = $script;
		echo json_encode($return);
	}
	
	/* Excel Report */
	function get_material_request_data_excel($pkid){
		require_once('../class/oop.php');
		$array_fields = array('`mr`.*','`dd`.`destination`');
		$table		  = "tbl_material_request `mr`"; 
		$joins		  = "INNER JOIN tbl_dispatch_destination `dd` ON `mr`.`fk_dispatch_destination` = `dd`.`pkid`"; 
		$sql_where	  = "WHERE `mr`.pkid = '".$pkid."' AND `mr`.`logdel` = '0'"; 
		$sql_order	  = "";
		$sql_limit	  = "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return = array();
		while($row = mysqli_fetch_array($result)){
			$return['request_number'] 			= $row['request_number'];
			$return['po_number'] 				= $row['po_number'];
			$return['fk_dispatch_destination'] 	= $row['fk_dispatch_destination'];
			$return['destination'] 				= $row['destination'];
			$return['line'] 					= $row['line'];
			$return['transaction_date'] 		= $row['transaction_date'];
			$return['served_by'] 				= $row['served_by'];
			$return['date_served'] 				= $row['date_served'];
			$return['requested_by'] 			= $row['requested_by'];
			$return['status'] 					= get_status($row['status']);
		}
		$request_details = get_material_request_details($pkid);
		$return['request_details'] = $request_details;
		return $return;
	}
	
	function get_material_request_summary_excel($date_start,$date_end,$time_start,$time_end){
		require_once('../class/oop.php');
		$array_fields = array('*');
		$table		  = "vw_material_request_summary";
		$joins		  = ""; 
		// $sql_where	  = "WHERE (`transaction_date` BETWEEN '".$date_start." ".$time_start."' AND '".$date_end." ".$time_end."') AND `status` = '1'"; 
		$sql_where	  = "WHERE (`transaction_date` BETWEEN '".$date_start." ".$time_start."' AND '".$date_end." ".$time_end."') AND (`status` != '3' && `status` != '9' && `status` != '8')";
		$sql_order	  = "";
		$sql_limit	  = "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return = array(
			"kit_no" 			=> array(), 
			"request_number" 	=> array(), 
			"po_number" 		=> array(), 
			"partscode" 		=> array(), 
			"partsname" 		=> array(), 
			"issued_qty" 		=> array(), 
			"actual_qty" 		=> array(), 
			"variance" 			=> array(),
			"fk_classification"	=> array(), 
			"classification" 	=> array(), 
			"transaction_date" 	=> array()
		);
		while($row = mysqli_fetch_array($result)){
			$return['kit_no'][] 			= $row['kit_no'];
			$return['request_number'][] 	= $row['callout'].' - '.$row['request_number'];
			$return['po_number'][] 			= $row['po_number'];
			$return['partscode'][] 			= $row['partscode'];
			$return['partsname'][] 			= $row['partsname'];
			$return['issued_qty'][] 		= $row['issued_qty'];
			$return['actual_qty'][] 		= $row['actual_qty'];
			$return['variance'][] 			= $row['variance'];
			$return['fk_classification'][] 	= $row['fk_classification'];
			$return['classification'][] 	= $row['classification'];
			$return['transaction_date'][] 	= $row['transaction_date'];
			$return['put_away_location'][] 	= $row['put_away_location'];
		}
		$return['script'] = $script;
		return $return;
	}
	
	
	/* ***********************
		Threshold - Start
	**************************/
	function compute_threshold(){
		require_once('../class/oop.php');
		$return 			= $_POST;
		$partscode 			= $_POST['passed_param']['partscode'];
		$usage 				= $_POST['passed_param']['usage'];
		$po_qty 			= $_POST['passed_param']['po_qty'];
		$variance 			= $_POST['passed_param']['variance'];
		$price 				= get_ypics_price($partscode);
		$return['price'] 	= $price;
		$threshold_limit 	= (($price * $usage) * $po_qty) * .01;
		$return['threshold_limit'] 	= number_format($threshold_limit,4,'.','');
		$total_price = (($variance * $usage) * $price);
		$return['total_price'] 	    = number_format($total_price,4,'.','');
		echo json_encode($return);
	}
	
	function get_parts_pricelist(){
		$return 					= $_POST;
		$price_details 				= get_price_list();
		$return['price_details'] 	= $price_details;
		$html = '';
		foreach($price_details['partscode'] as $key => $partscode){
			$html .= '<tr>';
			$html .= '	<td>'.$partscode.'</td>';
			$html .= '	<td>'.$price_details['price'][$key].'</td>';
			$html .= '</tr>';
		}
		$return['html'] 			= $html;
		echo json_encode($return);
	}
	
	function update_parts_pricelist(){
		require_once('../class/oop.php');
		$return 		= $_POST;
		$price_details = get_price_list();
		$table 		   = "tbl_parts_price";
		$truncate_message = MAS::getInstance()->truncate_records($table);
		// $truncate_message = MAS::getInstance()->truncate_records_script($table);
		$return['truncate_message'] = $truncate_message;
		/* insert new price */
		foreach($price_details['partscode'] as $key => $partscode){
			$array_fields = array("partscode","price","lastupdate");
			$array_values = array($partscode,$price_details['price'][$key],date('Y-m-d H:i:s'));
			$result = MAS::getInstance()->insert_query($table,$array_fields,$array_values);
			$script[] = MAS::getInstance()->insert_query_script($table,$array_fields,$array_values);
		}
		$return['script'] = $script;
		echo json_encode($return);
	}
	
	function get_request_with_exceeding_threshold(){
		require_once('../class/oop.php');
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 			= "vw_material_request_with_price ";
		$joins 			= "";
		$sql_where 		= "WHERE `variance` * `price` > ((`po_qty` *  `price`) * .01)";
		$sql_order 		= "";
		$sql_limit 		= "";
		// $sql_limit 		= "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html = '';
		while($row = mysqli_fetch_array($result)){
			$html .= "<tr>";
			$html .= "	<td>".$row['request_number']."</td>";
			$html .= "	<td>".$row['transaction_date']."</td>";
			$html .= "	<td>".$row['po_number']."</td>";
			$html .= "	<td>".$row['po_qty']."</td>";
			$html .= "	<td>".$row['partscode']."</td>";
			$html .= "	<td>".$row['partsname']."</td>";
			$html .= "	<td>".$row['price']."</td>";
			$html .= "	<td>".$row['issued_qty']."</td>";
			$html .= "	<td>".$row['actual_qty']."</td>";
			$html .= "	<td>".$row['variance']."</td>";
			$threshold_limit = ($row['po_qty'] * $row['price']) * .01;
			$html .= "	<td>".$threshold_limit."</td>";
			$total_variance_price = $row['variance'] * $row['price'];
			if($total_variance_price > $threshold_limit){
				$html .= "	<td>Yes - [".$total_variance_price."]</td>";
			}else{
				$html .= "	<td>No</td>";
			}
			$html .= "	<td></td>";
			$html .= "</tr>";
		}
		$return['html'] 	= $html;
		echo json_encode($return);
	}
	
	function approve_excess_threshold_request(){
		require_once('../class/oop.php');
		$return 		= $_POST;
		$table			= "tbl_material_request";
		$array_fields	= array("status","threshold_approver","threshold_approval_date","lastupdate","username");
		$array_values	= array("0",$_POST['username'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$_POST['username']);
		$where			= "WHERE pkid = '".$_POST['id']."'";
		$result 		= MAS::getInstance()->update_query_detailed($table,$array_fields,$array_values,$where);
		$return['result']	= $result;
		echo json_encode($return);
	}
	
	function disapprove_excess_threshold_request(){
		require_once('../class/oop.php');
		$return 		= $_POST;
		$table			= "tbl_material_request";
		$array_fields	= array("status","threshold_approver","threshold_approval_date","lastupdate","username");
		$array_values	= array("8",$_POST['username'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$_POST['username']);
		$where			= "WHERE pkid = '".$_POST['id']."'";
		$result 		= MAS::getInstance()->update_query_detailed($table,$array_fields,$array_values,$where);
		$return['result']	= $result;
		echo json_encode($return);
	}
	
	function get_pending_threshold_approval(){
		require_once('../class/oop.php');
		$return = $_POST;
		$array_fields 	= array('COUNT(pkid) as badge_count');
		$table 			= "tbl_material_request";
		$joins 			= "";
		$sql_where 		= "WHERE `status` = '9' AND `logdel` = '0'";
		$sql_order 		= "";
		$sql_limit 		= "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['row'] = mysqli_fetch_array($result); 
		$return['result']= $result;
		$return['script']= $script;
		echo json_encode($return);
	}	
	
	/* MAILER */
	function send_email_alerts(){
		require_once('../class/oop.php');
		$return = $_POST;
		$array_fields 	= array('main.*','mail.pkid as email_pkid');
		$table 			= "tbl_material_request main";
		$joins 			= "LEFT JOIN tbl_email mail ON mail.fk_request = main.pkid ";
		$sql_where 		= "WHERE main.`status` = '9' AND main.`logdel` = '0' AND mail.pkid IS NULL ";
		$sql_order 		= "";
		$sql_limit 		= "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['result']= $result;
		// $return['script']= $script;
		if($result->num_rows == 0){
			$return['error'][] = 'No email to send!';
			echo json_encode($return);
			exit;
		}
		$return['row'] = array();
		while($row = mysqli_fetch_assoc($result)){
			/* insert on e-mail */
			$return['row'][] = $row;
			$table = "tbl_email";
			$array_fields = array('fk_request','date_sent');
			$array_values = array($row['pkid'],date('Y-m-d H:i:s'));
			$result_insert = MAS::getInstance()->insert_query($table,$array_fields,$array_values);
			$return['result_insert'][] = $result_insert;
		}
		/* sending e-mail */
		foreach($return['row'] as $key => $value){
			if(!isset($return['row'][$key]['request_number'])){ continue; }
			$return['sending'][] =  $return['row'][$key];
			$device_name = get_po_devicename($return['row'][$key]['po_number']);
			send_threshold_email($return['row'][$key]['request_number'],$return['row'][$key]['po_number'],$device_name);
		}
		echo json_encode($return);
	}
	
	function send_threshold_email($request_number,$po_number,$device_name) {
		require_once('../class/oop.php'); 
		require_once('../class/emailconfirm.php');
		$return['threshold_approver'] = get_threshold_approver();
		$to 		 = implode(',',$return['threshold_approver']);
		// $to 		 = "marlope@pricon.ph,ronfern@pricon.ph";
		$cc			 = '';
		/* Construct email */
		$subject = 'Pending threshold approval ['.$request_number.']';
		$body	 = 'Good Day!<br>';
		$body	.= 'Pending threshold approval awaiting for disposition<br><br>';
		$body	.= 'Pending Request Details: <br>';
		$body	.= 'Request Number : '.$request_number.'<br>';
		$body	.= 'PO Number : '.$po_number.'<br>';
		$body	.= 'Device Name : '.$device_name.'<br>';
		$body 	.= "<br><br><i>For more info, please log-in to your Rapid account. Go to http://rapid/ <br>";
		$body 	.= "This E-mail is automatically generated by CN Material Alert System. <br>";
		$body 	.= "Don't reply to this e-mail, this is only a notification created by the system, Thank you!</i>";
        $body 	.= "<br><br>Notice of Disclaimer:<br>
                    This message (including any attachments) contains confidential information intended for a specific individual and purpose, and is protected by law. If you are not the intended recipient, you should delete this message. Any disclosure,copying, or distribution of this message, or the taking of any action based on it, is strictly prohibited.";
		$from 	 = 'issinforservice@pricon.ph';
		$from_name 	 = 'CN Material Alert System';

		/* NEW START */
		$mail = new SENDMAIL;
		$msg = $mail->email_with_no_attachment($from,$from_name,$to,$cc,$subject,$body);
		/* NEW END */		
		return $msg;
	}
	
	function get_threshold_approver(){
		require_once('../class/oop.php');
		$return = $_POST;
		$array_fields 	= array('user');
		$table 			= "tbl_user_roles";
		$joins 			= "";
		$sql_where 		= "WHERE  `fk_module` =  '4' AND  `create` =  '1' AND  `update` =  '1' AND  `read` =  '1' ";
		$sql_order 		= "";
		$sql_limit 		= "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['result']= $result;
		$return['script']= $script;
		$approver = array();
		while($row = mysqli_fetch_assoc($result)){
			$approver[] = $row['user']."@pricon.ph";
		}
		return $approver;
	}
	
	function get_threshold_summary_excel($date_start,$date_end,$time_start,$time_end){
		require_once('../class/oop.php');
		$array_fields = array('*');
		$table		  = "vw_threshold_summary";
		$joins		  = ""; 
		// $sql_where	  = "WHERE (`transaction_date` BETWEEN '".$date_start." ".$time_start."' AND '".$date_end." ".$time_end."') AND `status` = '1'"; 
		$sql_where	  = "WHERE (`transaction_date` BETWEEN '".$date_start." ".$time_start."' AND '".$date_end." ".$time_end."') AND (`status` != '3') && (`status` = '9' || `status` != '8' || threshold_approver != '') AND (total_price > threshold_limit)";
		$sql_order	  = "";
		$sql_limit	  = "";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return = array(
			"kit_no" 					=> array(), 
			"status" 					=> array(), 
			"request_number" 			=> array(), 
			"po_number" 				=> array(), 
			"partscode" 				=> array(), 
			"partsname" 				=> array(), 
			"issued_qty" 				=> array(), 
			"actual_qty" 				=> array(), 
			"variance" 					=> array(),
			"fk_classification"			=> array(), 
			"classification" 			=> array(), 
			"price" 					=> array(),
			"usage" 					=> array(),
			"total_price" 				=> array(),
			"threshold_limit" 			=> array(),
			"threshold_approver" 		=> array(),
			"threshold_approval_date" 	=> array(),
		);
		while($row = mysqli_fetch_array($result)){
			$return['kit_no'][] 			= $row['kit_no'];
			$return['status'][] 			= $row['status'];
			$return['request_number'][] 	= $row['callout'].' - '.$row['request_number'];
			$return['po_number'][] 			= $row['po_number'];
			$return['partscode'][] 			= $row['partscode'];
			$return['partsname'][] 			= $row['partsname'];
			$return['issued_qty'][] 		= $row['issued_qty'];
			$return['actual_qty'][] 		= $row['actual_qty'];
			$return['variance'][] 			= $row['variance'];
			$return['fk_classification'][] 	= $row['fk_classification'];
			$return['classification'][] 	= $row['classification'];
			$return['transaction_date'][] 	= $row['transaction_date'];
			$return['price'][] 				= $row['price'];
			$return['usage'][] 				= $row['usage'];
			$return['total_price'][] 		= $row['total_price'];
			$return['threshold_limit'][] 	= $row['threshold_limit'];
			$return['threshold_approver'][] 	= $row['threshold_approver'];
			$return['threshold_approval_date'][] 	= $row['threshold_approval_date'];
			$return['put_away_location'][] 	= $row['put_away_location'];
		}
		$return['script'] = $script;
		return $return;
	}
	
	function get_po_qty($po_number){
		require_once('../class/oop.php');
		$YPICS 			= new CNYPICS;
		$array_fields 	= array("TOP 1 CVOL");
		$table 			= "VRECE ";
		$joins 			= "";
		$sql_where 		= "WHERE SORDER ='$po_number' ";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['po_qty'] 	= "0";
		while($row = mssql_fetch_array($result)){
			$return['po_qty'] 	= $row['CVOL'];
		}
		return $return['po_qty'];
	}

    function get_po_devicename($po_number){
		require_once('../class/oop.php');
		$YPICS 			= new CNYPICS;
		$array_fields 	= array("TOP 1 *");
		$array_fields 	= array("XHEAD.CODE AS DeviceCode","XHEAD.NAME AS DeviceName","XRECE.CVOL AS POQty");
		$table 			= "XHEAD";
		$joins 			= "INNER JOIN XRECE ON XHEAD.CODE = XRECE.CODE";
		$sql_where 		= "WHERE XRECE.SORDER='$po_number'";		
		// $table 			= "vw_cn_po_received ";
		// $joins 			= "";
		// $sql_where 		= "WHERE PONumber ='$po_number' ";		
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['po_qty'] 	= "0";
		while($row = mssql_fetch_array($result)){
			$return['device_name'] 	= $row['DeviceName'];
		}
		return $return['device_name'];
	}
	
	function get_ypics_price($partcode){
		require_once('../class/oop.php');
		$YPICS 			= new CNYPICS;
		$array_fields 	= array("PRICE");
		$table 			= "VTANK ";
		$joins 			= "";
		$sql_where 		= "WHERE CODE ='$partcode' ";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['price'] 	= "0";
		while($row = mssql_fetch_array($result)){
			$return['price'] 	= number_format($row['PRICE'],4);
		}
		return $return['price'];
	}
	
	function get_price_list(){
		require_once('../class/oop.php');
		$YPICS 			= new CNYPICS;
		$array_fields 	= array("CODE","PRICE");
		$table 			= "VTANK ";
		$joins 			= "";
		$sql_where 		= "";
		$sql_order 		= "";
		$result = $YPICS->select_query($array_fields,$table,$joins,$sql_where,$sql_order);
		$script = $YPICS->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order);
		$html = '';
		$return['partscode'] 	= array();
		$return['price'] 		= array();
		while($row = mssql_fetch_array($result)){
			$return['partscode'][] 	= $row["CODE"];
			$return['price'][] 		= $row['PRICE'];
		}
		return $return;
	}
	/* ***********************
		Threshold - End
	**************************/
		
	
	/* ********************************* 
		ADMIN BATCH UPDATE - Start
	************************************/
	// batch_update_po_number();
	function batch_update_po_number(){
		require_once('../class/oop.php');
		$array_fields 	= array('*');
		$table 			= "tbl_material_request ";
		$joins 			= "";
		$sql_where 		= "WHERE po_qty = '0' ";
		$sql_order 		= "";
		$sql_limit 		= "LIMIT 0,500";
		$result = MAS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = MAS::getInstance()->select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html = '';
		if(!$result){
			echo 'No more record to update!';
			exit;
		}
		while($row = mysqli_fetch_array($result)){
			$po_number = $row["po_number"];
			if( strlen($row["po_number"]) != 15 ){
				$po_number = $row["po_number"]."00010";
			}
			$po_qty = get_po_qty($po_number);
			echo $po_number." [".$po_qty."]<br>";
			$table = 'tbl_material_request';
			$array_fields = array("po_qty");
			$array_values = array($po_qty);
			$where		  = "WHERE po_number = '$po_number'";
			$result_update = MAS::getInstance()->update_query_detailed($table,$array_fields,$array_values,$where);
			$script = MAS::getInstance()->update_query_detailed_script($table,$array_fields,$array_values,$where);
			echo $script;
		}
		
	}
	/* ********************************* 
		ADMIN BATCH UPDATE - End
	************************************/
	
	/* convert an array to encode base64 and serialize */
	function encode(){
		$str = base64_encode(serialize($_POST));
		echo json_encode($str);
	}

	/* revert to normal array, decode str to base64 and unserialize */
	function decode(){
		$array = unserialize(base64_decode($_POST));
		echo json_encode($array);
	}

	function encodeURIComponent($str) {
		$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		return strtr(rawurlencode($str), $revert);
	}
    
	/* function for displaying record */
	function load_records(){
		require_once('../class/oop.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_records';
		$joins 	   	= '';
		$sql_where 	= '';
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = TEST::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'][$ctr] 		= $row['pkid'];
			$return['name'][$ctr] 		= $row['name'];
			$return['lastname'][$ctr] 	= $row['lastname'];
			$return['address'][$ctr] 	= $row['address'];
			$return['remarks'][$ctr] 	= $row['remarks'];
			$ctr++;
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	/* function for adding record */
	function add_new_record(){
		require_once('../class/oop.php'); 
		$return 		= $_POST; 
		$result 		= "";
		$table   		= "tbl_records"; //table name
		$array_fields 	= array('name','lastname','address','remarks'); //table fields
		$array_values 	= array($return['txt_name'],$return['txt_lastname'],$return['txt_address'],$return['txt_remarks']); //values to be saved
		$result 		= TEST::getInstance()->insert_query($table,$array_fields,$array_values);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for fetching record */
	function update_fetch_record(){
		require_once('../class/oop.php'); 
		$return = $_POST; 
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_records';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pkid` ='.$return['pkid'];
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = TEST::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid2'][$ctr] 		= $row['pkid'];
			$return['name'][$ctr] 		= $row['name'];
			$return['lastname'][$ctr] 	= $row['lastname'];
			$return['address'][$ctr] 	= $row['address'];
			$return['remarks'][$ctr] 	= $row['remarks'];
			$ctr++;
		}
		$return['ctr'] = $ctr;
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return);//json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for updating record */
	function update_record(){
		require_once('../class/oop.php'); 
		$return = $_POST; 
		$result = "";
		$table        = "tbl_records";
		$array_fields = array('name','lastname','address','remarks');
		$array_values = array($return['txt_name_update'],$return['txt_lastname_update'],$return['txt_address_update'],$return['txt_remarks_update']);
		$pkid = $return['txt_pkid'];
		$result = TEST::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for deleting a record */
	function delete_record(){
		require_once('../class/oop.php'); 
		$return 	= $_POST;
		$result 	= "";
		$table   	= "tbl_records";
		$pkid 		= $return['pkid'];
		$result 	= TEST::getInstance()->delete_query($table,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
?>