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
$excel->title = 'Expired Materials';
/* add a new page */
$excel->add_page();
/* use the default font style */
$excel->set_default_font_style();
/* select an active page */
$excel->set_active_sheet(0);

$excel->set_orientation_paper_size();
$width_allowance = .81;

$pkid = $_GET['pkid'];

$excel->set_width('A', 6.88+$width_allowance);
$excel->set_width('B', 11+$width_allowance);
$excel->set_width('C', .69+$width_allowance);
$excel->set_width('D', 16.25+$width_allowance);
$excel->set_width('E', 9.88+$width_allowance);
$excel->set_width('F', .54+$width_allowance);
$excel->set_width('G', 9.88+$width_allowance);
$excel->set_width('H', 9.88+$width_allowance);
$excel->set_width('I', .54+$width_allowance);
$excel->set_width('J', 13.75+$width_allowance);
$excel->set_width('K', 10.63+$width_allowance);

$current_cell = 'A1';
$excel->place_value($current_cell,'MATERIAL REQUEST','string');
$array_format = array(
	"bold" => true,
	"size" => 28,
	"name" => "Arial",
	"h_alignment" => "center"
);
$excel->set_format($current_cell,$array_format);
$excel->merge_cells('A1:K6');
$left=1;$right=0;$top=0;$bottom=0;
$excel->set_borders('A1:A6',$left,$right,$top,$bottom);
$left=0;$right=1;$top=0;$bottom=0;
$excel->set_borders('K1:K6',$left,$right,$top,$bottom);
$left=0;$right=0;$top=1;$bottom=0;
$excel->set_borders('A1:K1',$left,$right,$top,$bottom);
$left=0;$right=0;$top=0;$bottom=1;
$excel->set_borders('A6:K6',$left,$right,$top,$bottom);

require_once('../handler/handler.php');
$data = get_material_request_data_excel($pkid);

$current_cell = 'A7';
$excel->place_value($current_cell,'Request No','string');
$current_cell = 'A8';
$excel->place_value($current_cell,'P.O. Number','string');
$current_cell = 'A9';
$excel->place_value($current_cell,'Dispatch Destination','string');
$current_cell = 'A10';
$excel->place_value($current_cell,'Line','string');
$current_cell = 'A11';
$excel->place_value($current_cell,'Requested By','string');
$current_cell = 'A12';
$excel->place_value($current_cell,'Date Requested','string');

$current_cell = 'D7';
$excel->place_value($current_cell,$data['request_number'],'string');
$current_cell = 'D8';
$excel->place_value($current_cell,$data['po_number'],'string');
$current_cell = 'D9';
$excel->place_value($current_cell,$data['destination'],'string');
$current_cell = 'D10';
$excel->place_value($current_cell,$data['line'],'string');
$current_cell = 'D11';
$excel->place_value($current_cell,$data['requested_by'],'string');
$current_cell = 'D12';
$excel->place_value($current_cell,$data['transaction_date'],'string');
$array_format = array(
	"bold" => true,
	"size" => 9,
	"name" => "Arial"
);
$excel->set_format('A7:K12',$array_format);
$left=0;$right=0;$top=0;$bottom=1;
$excel->set_borders('D7:E7',$left,$right,$top,$bottom);
$excel->merge_cells('D7:E7');
$excel->set_borders('D8:E8',$left,$right,$top,$bottom);
$excel->merge_cells('D8:E8');
$excel->set_borders('D9:E9',$left,$right,$top,$bottom);
$excel->merge_cells('D9:E9');
$excel->set_borders('D10:E10',$left,$right,$top,$bottom);
$excel->merge_cells('D10:E10');
$excel->set_borders('D11:E11',$left,$right,$top,$bottom);
$excel->merge_cells('D11:E11');
$excel->set_borders('D12:E12',$left,$right,$top,$bottom);
$excel->merge_cells('D12:E12');
$left=1;$right=0;$top=0;$bottom=0;
$excel->set_borders('A7:A13',$left,$right,$top,$bottom);
$left=0;$right=1;$top=0;$bottom=0;
$excel->set_borders('K7:K13',$left,$right,$top,$bottom);
$left=0;$right=0;$top=1;$bottom=0;
$excel->set_borders('A7:K7',$left,$right,$top,$bottom);
$left=0;$right=0;$top=0;$bottom=1;
$excel->set_borders('A13:K13',$left,$right,$top,$bottom);

$row_cnt = 14;
$excel->place_value('A'.$row_cnt,"Kit #",'string');
$excel->place_value('B'.$row_cnt,"Code",'string');
$excel->place_value('C'.$row_cnt,"Parts Name",'string');
$excel->merge_cells('C'.$row_cnt.':D'.$row_cnt);
$excel->place_value('D'.$row_cnt,"",'string');
$excel->place_value('E'.$row_cnt,"Issued Qty",'string');
$excel->place_value('F'.$row_cnt,"Actual Qty",'string');
$excel->merge_cells('F'.$row_cnt.':G'.$row_cnt);
$excel->place_value('G'.$row_cnt,"",'string');
$excel->place_value('H'.$row_cnt,"Variance",'string');
$excel->place_value('I'.$row_cnt,"Classification",'string');
$excel->merge_cells('I'.$row_cnt.':J'.$row_cnt);
$excel->place_value('J'.$row_cnt,"",'string');
$excel->place_value('K'.$row_cnt,"Remarks",'string');
$array_format = array(
	"bold" => true,
	"size" => 9,
	"name" => "Arial"
);
$excel->set_format('A'.$row_cnt.':K'.$row_cnt,$array_format);
$details = $data['request_details'];
foreach($details['partscode'] as $key => $partscode){
	$row_cnt++;
	$excel->place_value('A'.$row_cnt,$details['kit_no'][$key],'number_0_decimal');
	$excel->place_value('B'.$row_cnt,$details['partscode'][$key],'string');
	$excel->place_value('C'.$row_cnt,$details['partsname'][$key],'string');
	$excel->merge_cells('C'.$row_cnt.':D'.$row_cnt);
	$excel->place_value('D'.$row_cnt,"",'string');
	$excel->place_value('E'.$row_cnt,$details['issued_qty'][$key],'number_0_decimal');
	$excel->place_value('F'.$row_cnt,$details['actual_qty'][$key],'number_0_decimal');
	$excel->merge_cells('F'.$row_cnt.':G'.$row_cnt);
	$excel->place_value('G'.$row_cnt,"",'string');
	$excel->place_value('H'.$row_cnt,$details['variance'][$key],'number_0_decimal');
	$excel->place_value('I'.$row_cnt,$details['classification'][$key],'string');
	$excel->merge_cells('I'.$row_cnt.':J'.$row_cnt);
	$excel->place_value('J'.$row_cnt,"",'string');
	$excel->place_value('K'.$row_cnt,"",'string');
}
$left=1;$right=1;$top=1;$bottom=1;
$row_cnt++;
$excel->merge_cells('C'.$row_cnt.':D'.$row_cnt);
$excel->merge_cells('F'.$row_cnt.':G'.$row_cnt);
$excel->merge_cells('I'.$row_cnt.':J'.$row_cnt);
$row_cnt++;
$excel->merge_cells('C'.$row_cnt.':D'.$row_cnt);
$excel->merge_cells('F'.$row_cnt.':G'.$row_cnt);
$excel->merge_cells('I'.$row_cnt.':J'.$row_cnt);
$excel->set_borders('A14:K'.$row_cnt,$left,$right,$top,$bottom);
$array_format = array(
	"bold" => false,
	"size" => 9,
	"name" => "Arial",
	"h_alignment" => "center"
);
$excel->set_format('A15:K'.$row_cnt,$array_format);
$row_signatories_start = ($row_cnt+1);
$row_cnt += 3;

$left=0;$right=0;$top=0;$bottom=1;
$excel->merge_cells('A'.($row_cnt-1).':B'.($row_cnt-1));
$excel->set_borders('A'.($row_cnt-1).':B'.($row_cnt-1),$left,$right,$top,$bottom);
$excel->place_value('A'.$row_cnt,"Prepared By:",'string');
$excel->merge_cells('A'.$row_cnt.':B'.$row_cnt);
$excel->set_borders('D'.($row_cnt-1).':E'.($row_cnt-1),$left,$right,$top,$bottom);
$excel->merge_cells('D'.($row_cnt-1).':E'.($row_cnt-1));
$excel->place_value('D'.$row_cnt,"Issued By:",'string');
$excel->merge_cells('D'.$row_cnt.':E'.$row_cnt);
$excel->set_borders('G'.($row_cnt-1).':H'.($row_cnt-1),$left,$right,$top,$bottom);
$excel->merge_cells('G'.($row_cnt-1).':H'.($row_cnt-1));
$excel->place_value('G'.$row_cnt,"Checked By:",'string');
$excel->merge_cells('G'.$row_cnt.':H'.$row_cnt);
$excel->set_borders('J'.($row_cnt-1).':K'.($row_cnt-1),$left,$right,$top,$bottom);
$excel->merge_cells('J'.($row_cnt-1).':K'.($row_cnt-1));
$excel->place_value('J'.$row_cnt,"Encoded By:",'string');
$excel->merge_cells('J'.$row_cnt.':K'.$row_cnt);

$array_format = array(
	"bold" => false,
	"size" => 9,
	"name" => "Arial",
	"h_alignment" => "center"
);
$excel->set_format('A'.$row_signatories_start.':K'.$row_cnt,$array_format);
$row_cnt++;
$left=1;$right=0;$top=0;$bottom=0;
$excel->set_borders('A'.$row_signatories_start.':A'.$row_cnt,$left,$right,$top,$bottom);
$left=0;$right=1;$top=0;$bottom=0;
$excel->set_borders('K'.$row_signatories_start.':K'.$row_cnt,$left,$right,$top,$bottom);
$left=0;$right=0;$top=1;$bottom=0;
$excel->set_borders('A'.$row_signatories_start.':K'.$row_signatories_start,$left,$right,$top,$bottom);
$left=0;$right=0;$top=0;$bottom=1;
$excel->set_borders('A'.$row_cnt.':K'.$row_cnt,$left,$right,$top,$bottom);

/* set file name */
$filename = "MATERIAL REQUEST - ".$data['request_number'];
/* output excel - filename, excel version (2003,2007) */
$excel->output($filename,'2007');
