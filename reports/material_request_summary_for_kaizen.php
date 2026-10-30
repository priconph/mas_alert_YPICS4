<?php
$excel_class = '../class/excel_new.php';
if(file_exists($excel_class)){
	include($excel_class);
}else{
	echo 'File '.$excel_class.' does not exist';
	exit;
}

$excel = new EXCEL;
/* set title */
$excel->title = 'Material Request';
/* add a new page */
$excel->add_page();
/* use the default font style */
$excel->set_default_font_style();
/* select an active page */
$excel->set_active_sheet(0);

$excel->set_orientation_paper_size();

$width_allowance = .81;

$date_start = $_GET['date_start'];
$date_end = $_GET['date_end'];
$time_start = date('H:i:s',strtotime($_GET['time_start']));
$time_end = date('H:i:s',strtotime($_GET['time_end']));
$username = $_GET['username'];

$excel->set_width('A', 8.38+$width_allowance);
$excel->set_width('B', 12+$width_allowance);
$excel->set_width('C', 19+$width_allowance);
$excel->set_width('D', 13+$width_allowance);
$excel->set_width('E', 22+$width_allowance);
$excel->set_width('F', 9.38+$width_allowance);
$excel->set_width('G', 8.38+$width_allowance);
$excel->set_width('H', 8.38+$width_allowance);
$excel->set_width('I', 17+$width_allowance);
$excel->set_width('J', 10+$width_allowance);
$excel->set_width('K', 11+$width_allowance);

$excel->place_value('A2','CN-Manufacturing MAS','string');
$array_format = array(
	"bold" => true,
	"size" => 18,
	"name" => "arial",
	"color" => "#ffffff"
);
$excel->set_format('A2',$array_format);

$excel->place_value('A3','Summary','string');
$array_format["size"] = "12";
$excel->set_format('A3',$array_format);

$excel->place_value('A4','Start Date:','string');
$excel->place_value('C4',date('m/d/Y',strtotime($date_start)),'string');
$excel->place_value('I4','Printed By:','string');
$excel->place_value('J4',$username,'string');
$excel->place_value('A5','End Date:','string');
$excel->place_value('C5',date('m/d/Y',strtotime($date_end)),'string');
$excel->place_value('I5','Date Printed:','string');
$excel->place_value('J5',date('m/d/Y'),'string');
$array_format = array(
	"bold" => false,
	"size" => 9,
	"name" => "arial"
);
$excel->set_format('A4:K5',$array_format);

$excel->place_value('A6','Kit','string');
$excel->place_value('B6','Request #','string');
$excel->place_value('C6','PO Number','string');
$excel->place_value('D6','Code','string');
$excel->place_value('E6','Parts Name','string');
$excel->place_value('F6','Issued Qty','string');
$excel->place_value('G6','Actual Qty','string');
$excel->place_value('H6','Variance','string');
$excel->place_value('I6','Classification','string');
$excel->place_value('J6','Trandate','string');
$excel->place_value('K6','Put-away Location','string');
$array_format = array(
	"bold" => true,
	"size" => 8,
	"name" => "arial"
);
$excel->set_format('A6:K6',$array_format);

require_once('../handler/handler.php');
$data = get_material_request_summary_excel($date_start,$date_end,$time_start,$time_end);
$row_cnt=6;
foreach($data['request_number'] as $key => $request_number){
	$row_cnt++;
	$excel->place_value('A'.$row_cnt,$data['kit_no'][$key],'string');
	$excel->place_value('B'.$row_cnt,$data['request_number'][$key],'string');
	$excel->place_value('C'.$row_cnt,$data['po_number'][$key],'string');
	$excel->place_value('D'.$row_cnt,$data['partscode'][$key],'string');
	$excel->place_value('E'.$row_cnt,$data['partsname'][$key],'string');
	$excel->place_value('F'.$row_cnt,$data['issued_qty'][$key],'number_0_decimal');
	$excel->place_value('G'.$row_cnt,$data['actual_qty'][$key],'number_0_decimal');
	$excel->place_value('H'.$row_cnt,$data['variance'][$key],'number_0_decimal');
	$excel->place_value('I'.$row_cnt,$data['classification'][$key],'string');
	$excel->place_value('J'.$row_cnt,date("Ymd",strtotime($data['transaction_date'][$key])),'string');
	if($data['put_away_location'][$key] == 1){
		$put_away_location = "WHS100";
	}else{
		$put_away_location = "ASSY100";
	}
	$put_away_location = "ASSY100"; //put all items in ASSY100 as oer Meeting June 05 2017
	$excel->place_value('K'.$row_cnt,$put_away_location,'string');
}
$array_format = array(
	"bold" => false,
	"size" => 9,
	"name" => "arial",
	"h_alignment" => "center"
);
$excel->set_format('A7:K'.$row_cnt,$array_format);

// $excel->place_value('A1',$data['script'],'string');

/* set file name */
$filename = "MATERIAL REQUEST";
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');
