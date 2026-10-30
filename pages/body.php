<article class="wrapper">
	
	<aside class="sidebar">
		<ul class="sidebar-nav">
			<li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<?php
				if($user_role['2']['read'] == 1){
					echo '<li><a href="#warehouse" data-toggle="tab"><i class="fa fa-exclamation-circle"></i> <span>Warehouse</span></a></li>';
				}
				if($user_role['1']['read'] == 1){
					echo '<li><a href="#material_request" data-toggle="tab"><i class="fa fa-cubes"></i> <span>Material Request</span></a></li>';
				}
				echo '<li><a href="#threshold" data-toggle="tab"><i class="fa fa-cubes"></i> <span>Threshold</span></a></li>';
				if($user_role['3']['read'] == 1){
					echo '<li><a href="#settings" data-toggle="tab"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>';
				}
				if($account_type == 2){
					echo '<li><a href="#configuration" data-toggle="tab"><i class="fa fa-cogs"></i> <span>Configuration</span></a></li>';
				}
			?>
				
		</ul>
	</aside>
	
	<section class="main">
		
		<section class="tab-content">
			
		   <section class="tab-pane active fade in content" id="dashboard">
				<div class="row">
				   <div class="col-xs-12">
						<legend><a href="#" id="a_menu"><i class="fa fa-dashboard"></i> Dashboard</a></legend>
						<ol class="breadcrumb">
						  <li id="bc_menu"><a href="#" class="active"><i class="fa fa-home"></i> Home</a></li>
						  <?php
							if($user_role['2']['read'] == 1){
								echo '<li id="bc_vi"><a href="#"><i class="fa fa-exclamation-circle"></i> Warehouse Alert</a></li>';
							}
							if($user_role['1']['read'] == 1){
								echo '<li id="bc_di"><a href="#" ><i class="fa fa-cubes"></i> Material Request</a></li>';
							}
						  ?>
						  
						</ol>
						<div class="row" id="container_menu">
						   <div class="col-xs-12">
								<!-- Dashboard Menu Start -->
								<?php
								if($user_role['2']['read'] == 1){
									echo '<div class="col-xs-12 col-sm-6 col-lg-4">
											<div class="panel panel-info">
											  <div class="panel-heading">
												<div class="row">
												  <div class="col-xs-2">
													<i class="fa fa-exclamation-circle fa-5x"></i>
												  </div>
												  <div class="col-xs-10 text-right">
													<p class="announcement-heading"></p>
													<p class="announcement-text fa-2x"> <b>Warehouse Alert</b></p>
												  </div>
												</div>
											  </div>
											  <a href="#" id="a_warehouse">
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  Open
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											  </a>
											</div>
										</div>';
								}
								if($user_role['1']['read'] == 1){
									echo '<div class="col-xs-12 col-sm-6 col-lg-4">
											<div class="panel panel-info">
											  <div class="panel-heading">
												<div class="row">
												  <div class="col-xs-2">
													<i class="fa fa-cubes fa-5x"></i>
												  </div>
												  <div class="col-xs-10 text-right">
													<p class="announcement-heading"></p>
													<p class="announcement-text fa-2x"> <b>Material Request</b></p>
												  </div>
												</div>
											  </div>
											  <a href="#" id="a_material_request">
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  Open
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											  </a>
											</div>
										</div>';
								}
								
								if($user_role['4']['read'] == 1){
									echo '<div class="col-xs-12 col-sm-6 col-lg-4">
											<div class="panel panel-info">
											  <div class="panel-heading">
												<div class="row">
												  <div class="col-xs-2">
													<i class="fa fa-cubes fa-5x"></i>
												  </div>
												  <div class="col-xs-10 text-right">
													<p class="announcement-heading"></p>
													<p class="announcement-text fa-2x"> <b>Threshold Approval</b></p>
												  </div>
												</div>
											  </div>
											  <a href="#" id="a_threshold">
												<div class="panel-footer announcement-bottom">
												  <div class="row">
													<div class="col-xs-6">
													  <span class="badge" id="badge_threshold">0</span> Pending Approval
													</div>
													<div class="col-xs-6 text-right">
													  <i class="fa fa-arrow-circle-right"></i>
													</div>
												  </div>
												</div>
											  </a>
											</div>
										</div>';
								}
								?>
								<!-- Dashboard Menu End -->
							</div>
						</div>
						
				   </div>
				</div>
		   </section>
		   
		   <section class="tab-pane fade" id="warehouse">
			  
			  <section class="content">
					<legend><a href="#"><span class="fa fa-exclamation-circle"></span> Warehouse Alert</a></legend>
					<div class="row" id="container_material_request_summary_button">
						<div class="col-sm-12">
							<button class="btn btn-success fa fa-print pull-right" id="btn_print_mateiral_request_summary"> Print Summary</button>
						</div>
					</div><br />
					<div class="row" id="container_warehouse_menu">
					</div>
					<div class="row" id="container_warehouse_table">
						<div class="col-sm-12">
							<div class="panel panel-info">
								<div class="panel-heading"><i class="fa fa-exclamation-circle fa-lg"> Warehouse Alert</i><a href="#"><button id="btn_display_menu" class="btn btn-danger pull-right fa fa-remove"></button></a></div>
								<div class="panel-body">
									<div class="row pull-right">
										<label class="fa fa-lg">Legend</label>
										<div class="btn-group">
										  <button class="btn btn-danger" type="button"> </button>
										  <button class="btn btn-default" type="button">Need Replacement</button>
										</div>
										<div class="btn-group">
										  <button class="btn btn-default" type="button" style="background-color:#ffb84d;"> </button>
										  <button class="btn btn-default" type="button">No Need Replacement</button>
										</div>
										<div class="btn-group">
										  <button class="btn btn-success" type="button"> </button>
										  <button class="btn btn-default" type="button">Served</button>
										</div>
										<div class="btn-group">
										  <button class="btn btn-default" type="button"> </button>
										  <button class="btn btn-default" type="button">Received</button>
										</div>
									</div><br /><br />
									<div class="row">
										<div class="col-sm-12">
											<label id="label_destination" class="fa fa-2x">Destination</label>
											<table class="table table-striped table-bordered table-condensed" id="tbl_warehouse_material_request">
												<thead>
													<th>Request Number</th>
													<th>Transaction Date</th>
													<th>PO Number</th>
													<th>Destination</th>
													<th>Line</th>
													<th>Status</th>
													<th>Requested By</th>
													<th>Served By</th>
													<th>Served Date</th>
													<th>Seen By</th>
													<th><i class="fa fa-cogs"></i></th>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			  </section>
		   </section>
		   
		   <section class="tab-pane fade" id="material_request">
			  <section class="content">
					<legend><a href="#"><span class="fa fa-exclamation-circle"></span> Material Request</a></legend>
					<div class="row pull-right">
						<label class="fa fa-lg">Legend</label>
						<div class="btn-group">
						  <button class="btn btn-danger" type="button"> </button>
						  <button class="btn btn-default" type="button">Need Replacement</button>
						</div>
						<div class="btn-group">
						  <button class="btn btn-default" type="button" style="background-color:#ffb84d;"> </button>
						  <button class="btn btn-default" type="button">No Need Replacement</button>
						</div>
						<div class="btn-group">
						  <button class="btn btn-success" type="button"> </button>
						  <button class="btn btn-default" type="button">Served</button>
						</div>
						<div class="btn-group">
						  <button class="btn btn-default" type="button"> </button>
						  <button class="btn btn-default" type="button">Received</button>
						</div>
					</div><br /><br />
					<div class="row" id="container_vi">
						<div class="col-sm-12">
							<div class="panel panel-info">
								<div class="panel-heading"><i class="fa fa-cubes fa-lg"> Material Request</i></div>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<?php
												if($user_role['1']['create'] == 1){
													echo '<button class="btn btn-primary pull-right fa fa-plus" id="btn_new_request"> New Request</button><br/><br/>';
												}
											?>
											
										</div>
										<div class="col-sm-12">
											<table class="table table-striped table-bordered table-condensed" id="tbl_material_request">
												<thead>
													<th>Request Number</th>
													<th>Transaction Date</th>
													<th>PO Number</th>
													<th>Destination</th>
													<th>Line</th>
													<th>Status</th>
													<th>Requested By</th>
													<th>Seen By</th>
													<th><i class="fa fa-cogs"></i></th>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			  </section>
		   </section>
		   
		   <section class="tab-pane fade content" id="threshold">
				<div class="row">
				   <div class="col-xs-12">
						<legend><a href="#" id="a_menu"><i class="fa fa-file-excel"></i> Threshold Approval</a></legend>
						<div class="row">
							<div class="col-sm-12">
								<button class="btn btn-success fa fa-print" id="btn_print_threshold_summary"> Print Threshold Summary</button>
							</div>
						</div>
						<div class="row pull-right">
							<label class="fa fa-lg">Legend</label>
							<div class="btn-group">
							  <button class="btn btn-danger" type="button"> </button>
							  <button class="btn btn-default" type="button">Disapproved</button>
							</div>
							<div class="btn-group">
							  <button class="btn btn-default" type="button" style="background-color:#ffb84d;"> </button>
							  <button class="btn btn-default" type="button">Pending</button>
							</div>
							<div class="btn-group">
							  <button class="btn btn-success" type="button"> </button>
							  <button class="btn btn-default" type="button">Approved</button>
							</div>
							<!--<div class="btn-group">
							  <button class="btn btn-default" type="button"> </button>
							  <button class="btn btn-default" type="button">Received</button>
							</div>-->
						</div><br /><br />
						
						<table class="table table-bordered table-striped table-condensed" id="tbl_threshold_main">
							<thead>
								<th>Request Number</th>
								<th>Transaction Date</th>
								<th>PO Number</th>
								<th>Destination</th>
								<th>Line</th>
								<th>Status</th>
								<th>Requested By</th>
								<th>Threshold Approver</th>
								<th>Approval Date</th>
								<th><i class="fa fa-cogs"></i></th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
		   </section>
		   
		   <section class="tab-pane fade" id="settings">
				 <section class="content">
					<legend><a href="#"><span class="fa fa-exclamation-circle"></span> Settings</a></legend>
					<div class="row">
						<div class="col-xs-5">
							<div class="panel panel-info">
								<div class="panel-heading"> Dispatch Destination</div>
								<div class="panel-body">
									<div class="pull-right" style="margin-bottom:5px;">
										<?php
											if($user_role['3']['create'] == 1){
												echo '<button class="btn btn-primary fa fa-plus" id="btn_add_dispatch_destination"> Add</button>';
											}
											if($user_role['3']['update'] == 1){
												echo '<button class="btn btn-primary fa fa-edit" id="btn_update_dispatch_destination"> Update</button>';
											}
											if($user_role['3']['delete'] == 1){
												echo '<button class="btn btn-danger fa fa-trash" id="btn_delete_dispatch_destination"> Delete</button>';
											}
										?>
									</div>
									<table class="table table-bordered table-condensed table-condensed" id="tbl_settings_dispatch_destination">
										<thead>
											<th>Dispatch Destination</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-xs-5">
							<div class="panel panel-info">
								<div class="panel-heading"> Classification</div>
								<div class="panel-body">
									<div class="pull-right" style="margin-bottom:5px;">
										<?php
											if($user_role['3']['create'] == 1){
												echo '<button class="btn btn-primary fa fa-plus" id="btn_add_classification"> Add</button>';
											}
											if($user_role['3']['update'] == 1){
												echo '<button class="btn btn-primary fa fa-edit" id="btn_update_classification"> Update</button>';
											}
											if($user_role['3']['delete'] == 1){
												echo '<button class="btn btn-danger fa fa-trash" id="btn_delete_classification"> Delete</button>';
											}
										?>
									</div>
									<table class="table table-bordered table-condensed table-condensed" id="tbl_settings_classification">
										<thead>
											<th>Classification</th>
											<th>Callout</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				 </section>
		   </section>
		   
		   <section class="tab-pane fade in" id="configuration"><!-- Start Configuration -->
			   <nav class="subbar">
					<ul class="nav nav-tabs">
						<!--<li class="active"><a href="#access" data-toggle="tab"><i class="fa fa-code"></i> <span>System</span></a></li>-->
						<li><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <span>Roles</span></a></li>
					</ul>
				</nav>
				
				<section class="tab-content content">
	
					<section class="tab-pane active fade in" id="roles">
						
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-9">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i class="fa fa-users fa-lg"></i> Users CRUD
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-6">
												<button class="btn btn-primary fa fa-dollar" id="btn_update_price"> Update Price</button><br /><br />
											</div>
											<div class="col-xs-6">
											</div>
										</div>	
										<?php
											if($account_type == 2){
												echo '<table class="table table-hover table-striped table-bordered table-condensed" id="tbl_user_main">
														<thead>
															<tr>
																<th>Fullname</th>
																<th>Position</th>
																<th>Department</th>
																<th>Section</th>
																<th>Division</th>
																<th>Username</th>
																<th><i class="fa fa-cogs"></i></th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>';
											}
										?>
									</div>
								</div>
							</div>
							
							<div class="hidden-xs col-sm-4 col-md-3">
								<div class="panel panel-info">
									<div class="panel-heading">
										<i class="fa fa-book fa-lg"></i> Didn't Find Employee from list?
									</div>
									<div class="panel-body">
										<p>To add employee to the CRUD list, please assign the system to this employee using Rapid.</p>
									</div>
								</div>
								
							</div>
					   </div>
					</section>
					
				</section>
				
		   </section> <!-- End Configuration -->
		   
		</section>
		
	</section>
</article>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_request">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> New Request</h4>
      </div>
      <div class="modal-body">
        <form id="frm_new_request" method="POST">
			<div class="panel panel-primary">
				<div class="panel-heading"> Request Number ____________</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Number:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_number" class="form-control" list="list_po_number" required>
									<datalist id="list_po_number"></datalist>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Device Name:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_device_name" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-md">Dispatch Destination</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<select class="form-control" name="cmb_dispatch_destination" required>
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Line</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_line" required>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Date / Time:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_qty" class="form-control" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Status:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_status" value="<?php echo "Alert"; ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Requested By:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_requested_by" required>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"> Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Partscode:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_partscode">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Partsname:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_partsname">
								</div>
							</div>
							<div class="row" id="container_ud_ref_no" style="display:none;">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">UD Reference #:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" class="form-control" name="txt_ud_ref_no">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Classification:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<select class="form-control" name="cmb_classification">
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Issued Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_issued_qty">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Variance:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_variance">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Actual Qty</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_actual_qty" value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Kit Number:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_kit_number">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Need Replacement:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="radio" name="txt_put_away_location" value="1"> Yes
									<input type="radio" name="txt_put_away_location" value="2"> No
								</div>
							</div><br />
							<div class="row">
								<div class="col-sm-12">
									<p style="text-align:right;">
										<button type="button" class="btn btn-primary" id="btn_add_details"><i class="fa fa-plus"> Add</i></button>
										<button type="button" class="btn btn-danger" id="btn_delete_details"><i class="fa fa-trash"> Delete</i></button>
									</p>
								</div>
							</div><br />
						</div>
					</div>
					<div class="row" style="display:none;">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Usage:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_usage" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Price:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_price" readonly>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Total Price:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_total_price" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Threshold Limit:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="number" class="form-control" name="txt_threshold_limit" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">					
							<div class="panel panel-primary">
								<div class="panel-body">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_bom">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Usage</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-sm-6">					
							<div class="panel panel-primary">
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_details">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Issued Qty</th>
											<th>Actual Qty</th>
											<th>Variance</th>
											<th>Classification</th>
											<th>Kit #</th>
											<th>UD Reference #</th>
											<th>Price</th>
											<th>Usage</th>											
											<th>Total Price</th>
											<th>Threshold Limit</th>
											<th>Needs Replacement</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save"> Create Request</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
<div class="modal fade" tabindex="-1" role="dialog" id="modal_view_request">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Request Details</h4>
      </div>
      <div class="modal-body">
        <form id="frm_view_request">
			<div class="panel panel-primary">
				<div class="panel-heading"> Request Number <label id="label_request_number">____________</label></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">PO Number:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" name="txt_po_number" class="form-control" list="list_po_number" required readonly>
									<datalist id="list_po_number"></datalist>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Device Name:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_device_name" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-md">Dispatch Destination</label>
								</div>
								<div class="col-sm-7">
									<select class="form-control" name="cmb_dispatch_destination" required readonly>
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Line</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_line" required readonly>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Date / Time:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_date" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_qty" class="form-control" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Status:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_status" value="<?php echo "Alert"; ?>" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Requested By:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_requested_by" required readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"> Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">					
							<label class="fa fa-lg"> Request Details:</label>
							<div class="panel panel-primary">
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_details">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Issued Qty</th>
											<th>Actual Qty</th>
											<th>Variance</th>
											<th>Classification</th>
											<th>Kit #</th>
											<th>UD Reference #</th>
											<th>Price</th>
											<th>Usage</th>
											<th>Total Price</th>
											<th>Threshold Limit</th>
											<th>Needs Replacement</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
      <div class="modal-footer">
			<?php
				if($user_role['1']['update'] == 1){
					echo '<button id="btn_received_request" type="button" class="btn btn-primary fa"> Received</button>';
				}
				if($user_role['1']['update'] == 1){
					echo '<button id="btn_cancel_request" type="button" class="btn btn-danger fa fa-ban"> Cancel Request</button>';
				}
			?>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_threshold_approval">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Request Details</h4>
      </div>
      <div class="modal-body">
        <form id="frm_threshold_approval">
			<div class="panel panel-primary">
				<div class="panel-heading"> Request Number <label id="label_request_number">____________</label></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">PO Number:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" name="txt_po_number" class="form-control" list="list_po_number" required readonly>
									<datalist id="list_po_number"></datalist>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Device Name:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_device_name" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-md">Dispatch Destination</label>
								</div>
								<div class="col-sm-7">
									<select class="form-control" name="cmb_dispatch_destination" required readonly>
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Line</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_line" required readonly>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Date / Time:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_date" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_qty" class="form-control" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Status:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_status" value="<?php echo "Alert"; ?>" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Requested By:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_requested_by" required readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"> Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">					
							<label class="fa fa-lg"> Request Details:</label>
							<div class="panel panel-primary">
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_details">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Issued Qty</th>
											<th>Actual Qty</th>
											<th>Variance</th>
											<th>Classification</th>
											<th>Kit #</th>
											<th>UD Reference #</th>
											<th>Price</th>
											<th>Usage</th>
											<th>Total Price</th>
											<th>Threshold Limit</th>
											<th>Needs Replacement</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
      <div class="modal-footer">
			<?php
				if($user_role['4']['update'] == 1){
					echo '<button id="btn_approve_request" type="button" class="btn btn-success fa fa-check-circle"> Approve</button>';
				}
				if($user_role['4']['update'] == 1){
					echo '<button id="btn_disapprove_request" type="button" class="btn btn-danger fa fa-ban"> Dissapprove</button>';
				}
			?>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_view_warehouse_serve">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Request Details</h4>
      </div>
      <div class="modal-body">
        <form id="frm_warehouse_serve">
			<div class="panel panel-primary">
				<div class="panel-heading"> Request Number <label id="label_request_number">____________</label></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">PO Number:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" name="txt_po_number" class="form-control" list="list_po_number" required readonly>
									<datalist id="list_po_number"></datalist>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Device Name:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_device_name" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-md">Dispatch Destination</label>
								</div>
								<div class="col-sm-7">
									<select class="form-control" name="cmb_dispatch_destination" required readonly>
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Line</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_line" required readonly>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Date / Time:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_date" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_qty" class="form-control" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Status:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_status" value="<?php echo "Alert"; ?>" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Requested By:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_requested_by" required readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"> Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">					
							<label class="fa fa-lg"> Request Details:</label>
							<div class="panel panel-primary">
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_details">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Issued Qty</th>
											<th>Actual Qty</th>
											<th>Variance</th>
											<th>Classification</th>
											<th>Kit #</th>
											<th>UD Reference #</th>
											<th>Price</th>
											<th>Usage</th>
											<th>Total Price</th>
											<th>Threshold Limit</th>
											<th>Need Replacement</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
      <div class="modal-footer">
			<?php
				if($user_role['2']['update'] == 1){
					echo '<button id="btn_serve" type="button" class="btn btn-success fa fa-save"> Serve</button>';
				}
			?>
			<button id="btn_print" type="button" class="btn btn-primary fa fa-print"> Print</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" style="z-index:1051" id="modal_confirm_serve">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Confirm Request</h4>
      </div>
      <div class="modal-body">
        <form id="frm_serve_request" method="post">
			<p class="fa fa-lg">You are about to serve the request, Continue?</p>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-success fa fa-save"> Continue</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" style="z-index:1051" id="modal_confirm_cancel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Confirm Cancel</h4>
      </div>
      <div class="modal-body">
        <form id="frm_cancel_request" method="post">
			<label class="fa fa-lg">Please state your reason for cancellation:</label>
			<textarea class="form-control" name="txt_cancel_remarks" required></textarea>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-danger fa fa-trash"> Cancel</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_print_material_request_summary">
  <div class="modal-dialog" role="document" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-print"></i> Print Material Request Summary</h4>
      </div>
      <div class="modal-body">
        <form id="frm_print_material_request_summary">
		<div class="row">
			<div class="col-sm-4">
				<label class="fa fa-lg">Date Start: </label>
			</div>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="txt_date_start" placeholder="date start" required>
				<input type="time" class="form-control" id="txt_time_start" placeholder="time start" required>
			</div>
			<div class="col-sm-4">
				<label class="fa fa-lg">Date End: </label>
			</div>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="txt_date_end" placeholder="date end">
				<input type="time" class="form-control" id="txt_time_end" placeholder="time end" required>
			</div>
		</div>
      </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-print"> Print</button>
			<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_print_threshold">
  <div class="modal-dialog" role="document" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-print"></i> Print Threshold Summary</h4>
      </div>
      <div class="modal-body">
        <form id="frm_print_threshold">
		<div class="row">
			<div class="col-sm-4">
				<label class="fa fa-lg">Date Start: </label>
			</div>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="txt_date_start" placeholder="date start" required>
				<input type="time" class="form-control" id="txt_time_start" placeholder="time start" required>
			</div>
			<div class="col-sm-4">
				<label class="fa fa-lg">Date End: </label>
			</div>
			<div class="col-sm-8">
				<input type="date" class="form-control" id="txt_date_end" placeholder="date end">
				<input type="time" class="form-control" id="txt_time_end" placeholder="time end" required>
			</div>
		</div>
      </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-print"> Print</button>
			<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_user_crud">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-edit"></span> Edit User Role</h4>
      </div>
      <div class="modal-body">
		<form id="frm_user_roles">
			<table class="table table-hover table-striped table-bordered" id="tbl_user_crud">
				<thead>
					<tr>
						<th>Module</th>
						<th><input type="checkbox" value="1"> Create</th>
						<th><input type="checkbox" value="2"> Read</th>
						<th><input type="checkbox" value="3"> Update</th>
						<th><input type="checkbox" value="4"> Delete</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
      </div>
      <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save" id="btn_update_role"> Update Role</button>
			<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal">Close</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_add_dispatch_destination">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Dispatch Destination</h4>
      </div>
      <div class="modal-body">
        <form id="frm_add_dispatch_destination" method="post">
			<label class="fa fa-lg">Dispatch Destination:</label>
			<input type="text" class="form-control" name="txt_dispatch_destination">
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-success fa fa-save"> Save</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_add_classification">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Classification</h4>
      </div>
      <div class="modal-body">
        <form id="frm_add_classification" method="post">
			<label class="fa fa-lg">Classification:</label>
			<input type="text" class="form-control" name="txt_classification">
			<label class="fa fa-lg">Callout:</label>
			<input type="text" class="form-control" name="txt_callout">
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-success fa fa-save"> Save</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal for Filter Record -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal_filter_record">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filter</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-3">
				<label class="pull-right">Filter: </label>
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control">
			</div>
			<div class="col-sm-3">
				<label class="pull-right"></label>
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control">
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" style="z-index:1051" id="modal_confirm_receive">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Confirm Receive Request</h4>
      </div>
      <div class="modal-body">
        <form id="frm_receive_request" method="post">
			<p class="fa fa-lg">Request has been received, Continue?</p>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-success fa fa-save"> Continue</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" style="z-index:1051" id="modal_update_price">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-dollar"></i> Update Price</h4>
      </div>
      <div class="modal-body">
        <form id="frm_update_price" method="post">
			<table class="table table-bordered table-condensed table-striped" id="tbl_price_list">
				<thead>
					<th>Partcode</th>
					<th>Price</th>
				</thead>
				<tbody>
				</tbody>
			</table>
      </div>
	  <div class="modal-footer">
			<button type="submit" class="btn btn-success fa fa-save"> Update Pricelist</button>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_view_threshold_request">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Request Details</h4>
      </div>
      <div class="modal-body">
        <form id="frm_view_threshold_request">
			<div class="panel panel-primary">
				<div class="panel-heading"> Request Number <label id="label_request_number">____________</label></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">PO Number:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" name="txt_po_number" class="form-control" list="list_po_number" required readonly>
									<datalist id="list_po_number"></datalist>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">Device Name:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_device_name" class="form-control" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-md">Dispatch Destination</label>
								</div>
								<div class="col-sm-7">
									<select class="form-control" name="cmb_dispatch_destination" required readonly>
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Line</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_line" required readonly>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-5">
									<label class="fa fa-lg">Date / Time:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_date" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
								</div>
								<div class="col-md-5 col-xs-12">
									<label class="fa fa-lg">PO Qty:</label>
								</div>
								<div class="col-md-7 col-xs-12">
									<input type="text" name="txt_po_qty" class="form-control" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Status:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_status" value="<?php echo "Alert"; ?>" readonly>
								</div>
								<div class="col-sm-5">
									<label class="fa fa-lg">Requested By:</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="txt_requested_by" required readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"> Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">					
							<label class="fa fa-lg"> Request Details:</label>
							<div class="panel panel-primary">
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover table-bordered table-condensed table-striped" id="tbl_details">
										<thead>
											<th>Partscode</th>
											<th>Partsname</th>
											<th>Issued Qty</th>
											<th>Actual Qty</th>
											<th>Variance</th>
											<th>Classification</th>
											<th>Kit #</th>
											<th>UD Reference #</th>
											<th>Needs Replacement</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		  </div>
      <div class="modal-footer">
			<?php
				if($user_role['1']['update'] == 1){
					echo '<button id="btn_received_request" type="button" class="btn btn-primary fa"> Received</button>';
				}
				if($user_role['1']['update'] == 1){
					echo '<button id="btn_cancel_request" type="button" class="btn btn-danger fa fa-ban"> Cancel Request</button>';
				}
			?>
		</form>
		<button type="button" class="btn btn-default fa fa-remove" data-dismiss="modal"> Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
/* ***************************** 
	Dashboard Events - Start
******************************/
var script_url = '';
var handler = 'handler/handler.php';
var username = $('#hd_username').val();
$(document).on("click",".sidebar-toggle",function(){
	$(".wrapper").toggleClass("toggled");
});
$('#a_warehouse').click(function(){ $('.sidebar a[href="#warehouse"]').click(); fn_display_menu(); });
$('#a_material_request').click(function(){ $('.sidebar a[href="#material_request"]').click(); });
$('#a_threshold').click(function(){ $('.sidebar a[href="#threshold"]').click(); });
/* ***************************** 
	Dashboard Events - End
******************************/

/* *******************************
	Warehouse Alert - Start
********************************* */
/* Datatables */
var dt_warehouse_material_request = $('#tbl_warehouse_material_request').DataTable({
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": "server_side_scripts/warehouse_material_request.php",
	"aaSorting"		: [],
	"rowCallback"	: function( row, data, index ) {
		if ( data[5] == "Need Replacement" ) {
			$("td",row).css("background-color","#ff8080");
		}
		if ( data[5] == "No Need Replacement" ) {
			$("td",row).css("background-color","#ffb84d");
		}
		if ( data[5] == "Served" ) {
			$("td",row).css("background-color","lightgreen");
		}
		if ( data[5] == "Cancelled" ) {
			$("td",row).css("background-color","#ff9999");
		}
	}
});

/* view request */
$('#tbl_warehouse_material_request tbody').on('click','tr a',function(){
	var pkid = $(this).attr('id');
	$('#modal_view_warehouse_serve').data('id',pkid);
	fn_get_material_request_details(pkid,'frm_warehouse_serve');
	$('#modal_view_warehouse_serve').modal('show');
	if($(this).closest('tr').find('td:eq(9)').text() == ""){
		fn_update_seen_by(pkid);
	}	
});

/* serve_request */
$('#btn_serve').click(function(){
	$('#modal_confirm_serve').modal('show');
});

$('#frm_serve_request').submit(function(e){
	e.preventDefault();
	var pkid = $('#modal_view_warehouse_serve').data('id');
	fn_serve_request(pkid);
});

/* print request */
$('#btn_print').click(function(){
	var pkid = $('#modal_view_warehouse_serve').data('id');
	window.location.href = "reports/material_request.php?pkid="+pkid;
});

/* print material request summary */
$('#btn_print_mateiral_request_summary').click(function(){
	$('#modal_print_material_request_summary').modal('show');
});

$('#frm_print_material_request_summary').submit(function(e){
	e.preventDefault();
	var date_start = $('#frm_print_material_request_summary #txt_date_start').val();
	var time_start = $('#frm_print_material_request_summary #txt_time_start').val();
	var date_end = $('#frm_print_material_request_summary #txt_date_end').val();
	var time_end = $('#frm_print_material_request_summary #txt_time_end').val();
	if(date_start == "" || date_end == ""){
		alert("Please fill-out date properly!");
		return false;
	}
	window.location.href = "reports/material_request_summary.php?date_start="+date_start+"&date_end="+date_end+"&time_start="+time_start+"&time_end="+time_end+"&username="+username;
});

$('#warehouse legend a').click(function(){ fn_display_menu() });
$('#warehouse #btn_display_menu').click(function(){ fn_display_menu() });

$('#warehouse #container_warehouse_menu').on('click','#destination_menu',function(){
	var destination_id = $(this).data('id');
	var destination = $(this).find('#b_destination').text();
	fn_display_pending_request(destination_id,destination);
});

fn_load_warehouse_alert_destination_menu();
fn_display_menu();

window.setInterval(function(){
  /* load alert every 5 second */
  fn_load_warehouse_alert_destination_menu();
  dt_material_request.ajax.reload(null, false);
  dt_tbl_threshold.ajax.reload(null, false);
  fn_get_pending_threshold_approval();
}, 5000);

/* Load Destination Menu */

function fn_load_warehouse_alert_destination_menu(){
	var data = {
		"action" 	: "load_warehouse_alert_destination_menu"
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			$('section#warehouse #container_warehouse_menu').empty();
			$('section#warehouse #container_warehouse_menu').append(result['html']);
		},error : function(result){
			console.log('Error: ' + result);
		}
	});
}

function fn_update_seen_by(pkid){
	var data = {
		"action"	: "update_seen_by",
		"pkid"		: pkid,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			// console.log(result);
			dt_warehouse_material_request.ajax.reload();
		},error : function(result){
			console.log('Error: ' + result);
		}		
	});
}

function fn_display_menu(){
	$('section#warehouse #container_warehouse_menu').show();
	$('section#warehouse #container_warehouse_table').hide();
	$('section#warehouse #container_threshold').hide();
}

function fn_display_pending_request(destination_id,destination){
	$('section#warehouse #container_warehouse_menu').toggle(300);
	$('section#warehouse #container_warehouse_table').toggle(300);
	$('section#warehouse #label_destination').text(destination);
	dt_warehouse_material_request.ajax.url('server_side_scripts/warehouse_material_request.php?destination='+destination_id).load();
}

function fn_serve_request(pkid){
	var data = {
		"action"	: "serve_request",
		"pkid"		: pkid,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			console.log(result);
			$('.modal').modal('hide');
			dt_warehouse_material_request.ajax.reload();
			dt_material_request.ajax.reload();
		},error : function(result){
			console.log(result);
		}
	});
}

/* **************************************
	Material Request Events - Start
*****************************************/
/* Datatables */
var dt_material_request = $('#tbl_material_request').DataTable({
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": "server_side_scripts/material_request.php",
	"aaSorting"		: [],
	"rowCallback"	: function( row, data, index ) {
		if ( data[5] == "Need Replacement" ) {
			$("td",row).css("background-color","#ff8080");
		}
		if ( data[5] == "No Need Replacement" ) {
			$("td",row).css("background-color","#ffb84d");
		}
		if ( data[5] == "Served" ) {
			$("td",row).css("background-color","lightgreen");
		}
		if ( data[5] == "Cancelled" ) {
			$("td",row).css("background-color","");
		}
	}
});

$('#frm_new_request input[name="txt_actual_qty"]').prop('readonly',true);

$('#frm_new_request input[name="txt_issued_qty"]').keyup(function(){
	var issued_qty = $(this).val();
	var variance = $('#frm_new_request input[name="txt_variance"]').val();
	$('#frm_new_request input[name="txt_actual_qty"]').val( compute_actual_qty(issued_qty,variance) );
});

$('#frm_new_request input[name="txt_variance"]').keyup(function(){
	var variance = $(this).val();
	var issued_qty = $('#frm_new_request input[name="txt_issued_qty"]').val();
	$('#frm_new_request input[name="txt_actual_qty"]').val( compute_actual_qty(issued_qty,variance) );
});

function compute_actual_qty(issued_qty,variance){
	if(issued_qty == ""){ issued_qty = 0; }
	if(variance == ""){ variance = 0; }
	var actual_qty = parseInt(issued_qty) - parseInt(variance);
	return actual_qty;
}

$('#btn_new_request').click(function(){
	$('#modal_new_request').modal('show');
});

/* Dispatch Destination */
fn_get_dispatch_destination('option');
function fn_get_dispatch_destination(return_as){
	var data = {
		"action"	: "get_dispatch_destination",
		"return_as" 		: return_as
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			// console.log(result);
			if(return_as == 'option'){
				$('#frm_new_request select[name="cmb_dispatch_destination"]').empty();
				$('#frm_new_request select[name="cmb_dispatch_destination"]').append('<option></option>');
				$('#frm_new_request select[name="cmb_dispatch_destination"]').append(result['html']);
				$('#frm_view_request select[name="cmb_dispatch_destination"]').empty();
				$('#frm_view_request select[name="cmb_dispatch_destination"]').append('<option></option>');
				$('#frm_view_request select[name="cmb_dispatch_destination"]').append(result['html']);
				$('#frm_threshold_approval select[name="cmb_dispatch_destination"]').empty();
				$('#frm_threshold_approval select[name="cmb_dispatch_destination"]').append('<option></option>');
				$('#frm_threshold_approval select[name="cmb_dispatch_destination"]').append(result['html']);
				$('#frm_warehouse_serve select[name="cmb_dispatch_destination"]').empty();
				$('#frm_warehouse_serve select[name="cmb_dispatch_destination"]').append('<option></option>');
				$('#frm_warehouse_serve select[name="cmb_dispatch_destination"]').append(result['html']);
			}
			if(return_as == 'table'){
				$('#tbl_settings_dispatch_destination tbody').empty();
				$('#tbl_settings_dispatch_destination tbody').append(result['html']);
			}
		},error : function(result){
			console.log(result);
		}
	});
}
/* Classification */
fn_get_classification('option');
function fn_get_classification(return_as){
	var data = {
		"action"			: "get_classification",
		"return_as" 		: return_as
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			console.log(result);
			if(return_as == 'option'){
				$('#frm_new_request select[name="cmb_classification"]').empty();
				$('#frm_new_request select[name="cmb_classification"]').append('<option></option>');
				$('#frm_new_request select[name="cmb_classification"]').append(result['html']);
				$('#frm_view_request select[name="cmb_classification"]').empty();
				$('#frm_view_request select[name="cmb_classification"]').append('<option></option>');
				$('#frm_view_request select[name="cmb_classification"]').append(result['html']);
			}
			if(return_as == 'table'){
				$('#tbl_settings_classification tbody').empty();
				$('#tbl_settings_classification tbody').append(result['html']);
			}
		},error : function(result){
			console.log(result);
		}
	});
}

/* PO BOM Search Events */
/* update data list */
$('#frm_new_request input[name="txt_po_number"]').keyup(function(e){
	var key = e.which;
	if(key == '38' || key == '40'){
		return false;
	}
	var pattern = $(this).val();
	fn_update_po_number_datalist(pattern);
});

$('#frm_new_request input[name="txt_po_number"]').change(function(){
	var ponum = $(this).val();
	fn_get_po_bom(ponum);
});

/* set datalist for po number */
function fn_update_po_number_datalist(pattern){
	var data = {
		"action"	: "get_po_datalist",
		"pattern"	: pattern
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			// console.log(result);
			$('#frm_new_request #list_po_number').empty();
			$('#frm_new_request #list_po_number').append(result['html']);
		}
	});
}

/* get po information */
function fn_get_po_bom(ponum){
	var data = {
		"action"	: "get_po_bom",
		"ponum"		: ponum
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			// console.log(result);
			$('#frm_new_request input[name="txt_device_name"]').val(result["DeviceName"]);
			$('#frm_new_request input[name="txt_po_qty"]').val(result["POQty"]);
			$('#frm_new_request #tbl_bom tbody').empty();
			$('#frm_new_request #tbl_bom tbody').append(result['html']);
		}
	});
}

/* Details */
$('#frm_new_request #tbl_bom tbody').on('click','tr',function(){
	var partscode 	= $(this).find('td:eq(0)').text();
	var partsname	= $(this).find('td:eq(1)').text();
	var usage 		= $(this).find('td:eq(2)').text();
	var po_qty 		= $('#frm_new_request input[name="txt_po_qty"]').val();
	var variance	= $('#frm_new_request input[name="txt_variance"]').val();
	$('#frm_new_request input[name="txt_partscode"]').val(partscode);
	$('#frm_new_request input[name="txt_partsname"]').val(partsname);
	$('#frm_new_request input[name="txt_usage"]').val(usage);
	var data = {
		"partscode"		: partscode,
		"usage"			: usage,
		"po_qty"		: po_qty,
		"variance"		: variance
	}
	fn_compute_threshold(data,function(result){
		console.log(result);
		$('#frm_new_request input[name="txt_price"]').val(result['price']);
		$('#frm_new_request input[name="txt_threshold_limit"]').val(result['threshold_limit']);
		$('#frm_new_request input[name="txt_total_price"]').val(result['total_price']);
	});
});

$('#frm_new_request input[name="txt_issued_qty"],#frm_new_request input[name="txt_variance"]').change(function(){
	fn_compute_actual_qty_total_price_threshold_limit();
});

function fn_compute_actual_qty_total_price_threshold_limit(){
	var partscode = $('#frm_new_request input[name="txt_partscode"]').val();
	var usage = $('#frm_new_request input[name="txt_usage"]').val();
	var po_qty 		= $('#frm_new_request input[name="txt_po_qty"]').val();
	var variance	= $('#frm_new_request input[name="txt_variance"]').val();
	if(partscode == ""){
		return false;
	}
	var data = {
		"partscode"		: partscode,
		"usage"			: usage,
		"po_qty"		: po_qty,
		"variance"		: variance
	}
	fn_compute_threshold(data,function(result){
		console.log(result);
		$('#frm_new_request input[name="txt_price"]').val(result['price']);
		$('#frm_new_request input[name="txt_threshold_limit"]').val(result['threshold_limit']);
		$('#frm_new_request input[name="txt_total_price"]').val(result['total_price']);
	});
}

/* Threshold */
function fn_compute_threshold(passed_param,callback){
	var data = {
		"action" 		: "compute_threshold",
		"passed_param" 	: passed_param
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		url 	: handler,
		data	: data,
		success	: function(result){
			callback(result);
		},error : function(result){
			callback(result);
		}
	});
}

/* Add Details */
$('#frm_new_request #btn_add_details').click(function(){
	/* validate entry */
	var array_txt_name = ['txt_partscode','txt_partsname','txt_issued_qty','txt_actual_qty','txt_variance','cmb_classification','txt_kit_number','txt_ud_ref_no','txt_price','txt_usage','txt_total_price','txt_threshold_limit'];
	var validate_details = fn_validate_details_entry(array_txt_name);
	if(validate_details){
		var exist_in_bom = false;
		var partscode = $('#frm_new_request input[name="txt_partscode"]').val();
			exist_in_bom = fn_validate_details_exist_in_bom(partscode);
		if(exist_in_bom){
			/* save entry */
			fn_append_details(array_txt_name);
		}else{
			if( $('#frm_new_request input[name="txt_ud_ref_no"]').val() == '' ){
				alert('Partscode and Partsname does not exist in BOM! Please enter UD Reference Number');
				$('#container_ud_ref_no').show();
			}else{
				fn_append_details(array_txt_name);
			}
		}		
	}
});

function fn_validate_details_entry(array_txt_name){
	var validate = true;
	$.each(array_txt_name,function(key,txt_name){
		if(txt_name == 'txt_ud_ref_no'){
			return;
		}
		if($('#frm_new_request input[name="'+txt_name+'"]').val() == "" || $('#frm_new_request select[name="'+txt_name+'"]').val() == ""){
			alert("Please enter value for " + txt_name.replace('txt_',''));
			validate = false;
			$('#frm_new_request input[name="'+txt_name+'"]').focus();
			return false;
		}
	});
	if( !$('#frm_new_request input[name="txt_put_away_location"]').is(':checked') ){
		alert("Item needs replacement?");
		validate = false;
	}
	if( parseInt($('#frm_new_request input[name="txt_actual_qty"]').val()) < 0 ){
		alert('Actual quantity cannot contain a negative value!');
		validate = false;
	}
	return validate;
}

function fn_validate_details_exist_in_bom(partscode){
	var exist = false;
	$('#frm_new_request #tbl_bom tr').each(function(){
		if( $(this).find('td:eq(0)').text() == partscode ){
			exist = true;
		}
	});
	return exist;
}

function fn_append_details(array_txt_name){
	var html = '<tr>';
	$.each(array_txt_name,function(key,txt_name){
		if(txt_name == "cmb_classification"){
			html += '	<td><input type="hidden" value="'+$('#frm_new_request select[name="'+txt_name+'"]').val()+'"> '+$('#frm_new_request select[name="'+txt_name+'"] option:selected').text()+'</td>';
			$('#frm_new_request select[name="'+txt_name+'"]').val("");
		}else{
			html += '	<td>'+$('#frm_new_request input[name="'+txt_name+'"]').val()+'</td>';
			$('#frm_new_request input[name="'+txt_name+'"]').val("");
		}
	});
	var put_away_location = $('#frm_new_request input[name="txt_put_away_location"]:checked').val();
	var text_location = '';
	if(put_away_location == 1){
		text_location = "Yes";
	}else{
		text_location = "No";
	}
	html    += '	<td><input type="hidden" value="'+put_away_location+'">'+text_location+'</td>';
	html 	+= '</tr>';
	$('#frm_new_request #tbl_details tbody').append(html);
	$('#frm_new_request input[name="txt_ud_ref_no"]').val('');
	$('#container_ud_ref_no').hide();
}

function fn_get_put_away_location(value,callback){
	var data = {
		"action" 				: "get_put_away_location_material_request",
		"put_away_location"		: value
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			callback(result);
		},error	: function(result){
			console.log(result);
		}
	});
}

/* Delete Details */
var selected_row = '';
$('#frm_new_request  #tbl_details tbody').on('click','tr',function(){
	selected_row = $(this).index();
	$('#frm_new_request #tbl_details tbody tr').attr('style','');
	$(this).attr('style','color:red;');
});
$('#frm_new_request #btn_delete_details').click(function(){
	$('#frm_new_request #tbl_details tbody tr:eq('+selected_row+')').remove();
	selected_row = '';
});

/* save values */
$('#frm_new_request').submit(function(e){
	e.preventDefault();
	var form_data = $(this).serialize();
	fn_save_request(form_data);
});

function fn_save_request(form_data){
	$('.btn').prop("disabled",true);	
	if(!fn_validate_number_of_requests_details()){
		alert('You do not have any material requested!');
		$('.btn').prop("disabled",false);
		return false;
	}
	
	/* get request details */
	var data = {
		"action"			: "save_request",
		"request_details"	: fn_get_request_details(),
		"username"			: username
	}
	data = $.param(data) + '&' + form_data;
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			console.log(result);
			var array_clear_fields = ['txt_po_number','cmb_dispatch_destination','txt_line','txt_requested_by'];
			$.each(array_clear_fields,function(key, txt_name){
				$('#frm_new_request input[name="'+txt_name+'"]').val("");
				$('#frm_new_request select[name="'+txt_name+'"]').val("");
			});				
			$('#frm_new_request table tbody').empty();
			$('.modal').modal('hide');
			dt_material_request.ajax.reload();
			$('.btn').prop("disabled",false);
			if(result['needs_threshold_approval']){
				alert("Your request requires approval from supervisor, Please contact your supervisor for approval!");
			}
		},error	: function(result){
			console.log(result);
		}
	});
}

function fn_validate_number_of_requests_details(){
	var request_cnt = false;
	$('#frm_new_request #tbl_details tbody tr').each(function(){
		request_cnt = true;
	});
	return request_cnt;
}

function fn_get_request_details(){
	var data = {};
		data.partscode 			= [];
		data.partsname 			= [];
		data.issued_qty 		= [];
		data.actual_qty 		= [];
		data.variance 			= [];
		data.classification 	= [];
		data.kit_no 			= [];
		data.ud_ref_no 			= [];
		data.price 				= [];
		data.usage 				= [];
		data.total_price		= [];
		data.threshold_limit	= [];
		data.put_away_location 	= [];
	$('#frm_new_request #tbl_details tbody tr').each(function(){
		data.partscode.push($(this).find('td:eq(0)').text());
		data.partsname.push($(this).find('td:eq(1)').text());
		data.issued_qty.push($(this).find('td:eq(2)').text());
		data.actual_qty.push($(this).find('td:eq(3)').text());
		data.variance.push($(this).find('td:eq(4)').text());
		data.classification.push($(this).find('td:eq(5) input').val());
		data.kit_no.push($(this).find('td:eq(6)').text());
		data.ud_ref_no.push($(this).find('td:eq(7)').text());
		data.price.push($(this).find('td:eq(8)').text());
		data.usage.push($(this).find('td:eq(9)').text());
		data.total_price.push($(this).find('td:eq(10)').text());
		data.threshold_limit.push($(this).find('td:eq(11)').text());
		data.put_away_location.push($(this).find('td:eq(12) input').val());
	});
	return data;
}

/* view request */
$('#tbl_material_request tbody').on('click','tr a',function(){
	var id = $(this).attr('id');
	$('#modal_view_request').data('id',id);
	fn_get_material_request_details(id,'frm_view_request');
	$('#modal_view_request').modal('show');
});

$('#btn_cancel_request').click(function(){
	$('#modal_confirm_cancel').modal('show');
});

$('#frm_cancel_request').submit(function(e){
	e.preventDefault();
	var pkid =  $('#modal_view_request').data('id');
	var remarks = $('#frm_cancel_request textarea[name="txt_cancel_remarks"]').val();
	fn_cancel_request(pkid,remarks);
});

function fn_cancel_request(pkid,remarks){
	var data = {
		"action"	: "cancel_request",
		"pkid"		: pkid,
		"remarks"	: remarks,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success : function(result){
			// console.log(result);
			dt_material_request.ajax.reload();
			$('.modal').modal('hide');
		},error : function(result){
			console.log(result);
		}
	});
}

$('#btn_received_request').click(function(){
	$('#modal_confirm_receive').modal("show");
});

$('#frm_receive_request').submit(function(e){
	e.preventDefault();
	var pkid =  $('#modal_view_request').data('id');
	fn_receive_request(pkid);
});

function fn_receive_request(pkid){
	var data = {
		"action"	: "receive_request",
		"pkid"		: pkid,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success : function(result){
			// console.log(result);
			dt_material_request.ajax.reload();
			$('.modal').modal('hide');
		},error : function(result){
			console.log(result);
		}
	});
}
/* **************************************
	Material Request Events - End
*****************************************/

/* *****************************************************************
	Functions used by warehouse alert and material request - Start
*******************************************************************/
function fn_get_material_request_details(pkid,frm_id){
	var data = {
		"action"	: "get_material_request_data",
		"pkid"		: pkid,
		"frm_id"	: frm_id
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success : function(result){
			console.log(result);
			$('#'+frm_id+' label[id="label_request_number"]').text(result['request_number']);
			$('#'+frm_id+' input[name="txt_po_number"]').val(result["po_number"]);
			$('#'+frm_id+' input[name="txt_device_name"]').val(result["DeviceName"]);
			$('#'+frm_id+' input[name="txt_po_qty"]').val(result["POQty"]);
			$('#'+frm_id+' select[name="cmb_dispatch_destination"]').val(result["fk_dispatch_destination"]);
			$('#'+frm_id+' input[name="txt_line"]').val(result["line"]);
			$('#'+frm_id+' input[name="txt_date"]').val(result["transaction_date"]);
			$('#'+frm_id+' input[name="txt_status"]').val(result["status_text"]);
			$('#'+frm_id+' input[name="txt_requested_by"]').val(result["requested_by"]);
			$('#'+frm_id+' #tbl_details tbody').empty();
			$('#'+frm_id+' #tbl_details tbody').append(result['request_details']);
			if(frm_id == 'frm_warehouse_serve'){
				if(result['status'] == '2' || result['status'] == '3'){
					$('#btn_serve').prop('disabled',true);
				}else{
					$('#btn_serve').removeAttr('disabled');
				}
			}if(frm_id == 'frm_threshold_approval'){
				
			}else{
				if(result['status'] == '2' || result['status'] == '3'){
					$('#btn_cancel_request').prop('disabled',true);
				}else{
					$('#btn_cancel_request').removeAttr('disabled');
				}
				if(result['status'] == '2'){
					$('#btn_received_request').prop('disabled',false);
				}else{
					$('#btn_received_request').prop('disabled',true);
				}
			}
		},error	: function(result){
			console.log(result);
		}
	});
}

$('.modal').on('hidden.bs.modal', function (e) {
	/* Allows the overlayed modal to be scrollable */
    if($('.modal').hasClass('in')) {
		$('body').addClass('modal-open');
    } 
});
/* *****************************************************************
	Functions used by warehouse alert and material request - End
*******************************************************************/

/* **********************************
	Threshold - Start
************************************ */
var dt_tbl_price_list = $('#modal_update_price #tbl_price_list').DataTable();
// var dt_tbl_threshold = $('section#threshold #tbl_threshold').DataTable({
	// "aaSorting"	 : [],
	// "bProcessing": true,
	// "bServerSide": true,
	// "sAjaxSource": "server_side_scripts/threshold.php?username="+username
// });

var dt_tbl_threshold = $('section#threshold #tbl_threshold_main').DataTable({
	"aaSorting"	 : [],
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": "server_side_scripts/threshold_main.php?username="+username,
	"rowCallback"	: function( row, data, index ) {
		if ( data[5] == "Disapproved" ) {
			$("td",row).css("background-color","#ff8080");
		}
		if ( data[5] == "Pending Approval" ) {
			$("td",row).css("background-color","#ffb84d");
		}
		if ( data[5] == "Approved" ) {
			$("td",row).css("background-color","lightgreen");
		}
	}
});

$('#btn_update_price').click(function(){
	$('#modal_update_price').modal('show');
	fn_get_parts_pricelist();
});

$('#frm_update_price').submit(function(e){
	e.preventDefault();
	if(confirm("Are you sure you wish to update pricelist? Make sure that there is no open transaction.")){
		fn_update_parts_pricelist();
	}	
});

$('section#threshold #tbl_threshold_main tbody').on('click','tr button.fa-edit',function(){
	var id = $(this).attr('id');
	$('#modal_view_threshold_request').data('id',id);
	fn_get_material_request_details(id,'frm_view_threshold_request');
	$('#modal_view_threshold_request').modal('show');
});

/* view request */
$('#tbl_threshold_main tbody').on('click','tr a',function(){
	var id = $(this).attr('id');
	$('#modal_threshold_approval').data('id',id);
	fn_get_material_request_details(id,'frm_threshold_approval');
	$('#modal_threshold_approval').modal('show');
});

$('#modal_threshold_approval #btn_approve_request').click(function(){
	fn_approve_excess_threshold_request();
});

$('#modal_threshold_approval #btn_disapprove_request').click(function(){
	fn_disapprove_excess_threshold_request();
});

$('#btn_print_threshold_summary').click(function(){
	$('#modal_print_threshold').modal('show');
});

$('#frm_print_threshold').submit(function(e){
	e.preventDefault();
	var frm_id = "frm_print_threshold";
	var date_start = $('#'+frm_id+' #txt_date_start').val();
	var time_start = $('#'+frm_id+' #txt_time_start').val();
	var date_end = $('#'+frm_id+' #txt_date_end').val();
	var time_end = $('#'+frm_id+' #txt_time_end').val();
	if(date_start == "" || date_end == ""){
		alert("Please fill-out date properly!");
		return false;
	}
	window.location.href = "reports/threshold_summary.php?date_start="+date_start+"&date_end="+date_end+"&time_start="+time_start+"&time_end="+time_end+"&username="+username;
});

function fn_update_parts_pricelist(){
	var data = {
		"action"	: "update_parts_pricelist"
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			$('.modal').modal('hide');
		},error	: function(result){
			console.log(result);
		}
	});
}

function fn_get_parts_pricelist(){
	var data = {
		"action"	: "get_parts_pricelist"
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			dt_tbl_price_list.destroy();
			$('#modal_update_price #tbl_price_list tbody').empty();
			$('#modal_update_price #tbl_price_list tbody').append(result['html']);
			dt_tbl_price_list = $('#modal_update_price #tbl_price_list').DataTable();
		},error	: function(result){
			console.log(result);
		}
	});
}

// fn_get_request_with_exceeding_threshold();
function fn_get_request_with_exceeding_threshold(){
	var data = {
		"action"	: "get_request_with_exceeding_threshold"
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			$('section#threshold #tbl_threshold tbody').empty();
			$('section#threshold #tbl_threshold tbody').append(result['html']);
		},error	: function(result){
			console.log(result);
		}
	});
}

function fn_approve_excess_threshold_request(){
	$('.btn').attr('disabled',true);
	var data = {
		"action"	: "approve_excess_threshold_request",
		"id"		: $('#modal_threshold_approval').data('id'),
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			$('.modal').modal('hide');
			$('.btn').attr('disabled',false);
			dt_tbl_threshold.ajax.reload();
		},error	: function(result){
			console.log(result);
		}
	});
}

function fn_disapprove_excess_threshold_request(){
	$('.btn').attr('disabled',true);
	var data = {
		"action"	: "disapprove_excess_threshold_request",
		"id"		: $('#modal_threshold_approval').data('id'),
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			$('.modal').modal('hide');
			$('.btn').attr('disabled',false);
			dt_tbl_threshold.ajax.reload();
		},error	: function(result){
			console.log(result);
		}
	});
}
fn_get_pending_threshold_approval();
function fn_get_pending_threshold_approval(){
	var data = {
		"action"	: "get_pending_threshold_approval"
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
			$('span#badge_threshold').text(result['row']['badge_count']);
		},error	: function(result){
			console.log(result);
		}
	});
}
/* **********************************
	Threshold - End
************************************ */


/* ******************************
		Settings
******************************* */
fn_get_dispatch_destination('table');
/* selected dispatch destination */
var sdd = '';

$('#btn_add_dispatch_destination').click(function(){
	$('#modal_add_dispatch_destination').modal('show');
});

/* dispatch destination */
$('#frm_add_dispatch_destination').submit(function(e){
	e.preventDefault();
	$('.btn').prop('disabled',true);
	var data = {
		"action"	: "add_dispatch_destination",
		"username"	: username
	}
	data = $.param(data) + '&' + $(this).serialize();
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			fn_get_dispatch_destination('table');
			$('.modal').modal('hide');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#btn_update_dispatch_destination').click(function(){
	console.log(sdd);
	if(sdd == '' && sdd != 0){
		alert("Select a row to update!");
		return false;
	}
	$('.btn').prop('disabled',true);
	var row   = $('#tbl_settings_dispatch_destination tbody tr:eq('+sdd+')');
	var current_value = row.find('td:eq(0)').text();
	var pkid  = row.find('td:eq(0)').attr('id');
	var html  = '<div class="row">';
		html += '	<div class="col-sm-9">';
		html += '		<input type="text" class="form-control" value="'+current_value+'">';
		html += '	</div>';
		html += '	<div class="col-sm-3">';
		html += '		<button class="btn btn-success fa fa-save"></button>';
		html += '		<button class="btn btn-danger fa fa-remove"></button>';
		html += '	</div>';
		html += '</div>';
	row.find('td:eq(0)').html(html);
});

$('#btn_delete_dispatch_destination').click(function(){
	if(sdd == ''){
		alert("Select a row to delete!");
		return false;
	}
	var row   = $('#tbl_settings_dispatch_destination tbody tr:eq('+sdd+')');
	var pkid  = row.find('td:eq(0)').attr('id');
	var data = {
		"action"		: "delete_dispatch_destination",
		"pkid"			: pkid,
		"username"		: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			console.log(result);
			sdd = '';
			fn_get_dispatch_destination('table');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#tbl_settings_dispatch_destination tbody').on('click','tr .fa-save',function(){
	var data = {
		"action"		: "update_dispatch_destination",
		"pkid"			: $(this).closest('tr').find('td:eq(0)').attr('id'),
		"destination"	: $(this).closest('tr').find('td:eq(0) input').val(),
		"username"		: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			sdd = '';
			fn_get_dispatch_destination('table');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#tbl_settings_dispatch_destination tbody').on('click','tr .fa-remove',function(){
	sdd = '';
	fn_get_dispatch_destination('table');
	$('.btn').prop('disabled',false);
});

$('#tbl_settings_dispatch_destination tbody').on('click','tr',function(){
	var pkid = $(this).find('td:eq(0)').attr('id');
	sdd = $(this).index();
	$('#tbl_settings_dispatch_destination tbody tr').attr('style','');
	$(this).attr('style','background-color:lightblue;color:black;');
});

/* classification */
fn_get_classification('table');
/* selected classification */
var sc = '';

$('#btn_add_classification').click(function(){
	$('#modal_add_classification').modal('show');
});

$('#btn_delete_classification').click(function(){
	if(sc == ''){
		alert("Select a row to delete!");
		return false;
	}
	var row   = $('#tbl_settings_classification tbody tr:eq('+sc+')');
	var pkid  = row.find('td:eq(0)').attr('id');
	var data = {
		"action"		: "delete_classification",
		"pkid"			: pkid,
		"username"		: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			console.log(result);
			sc = '';
			fn_get_classification('table');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#frm_add_classification').submit(function(e){
	e.preventDefault();
	$('.btn').prop('disabled',true);
	var data = {
		"action"	: "add_classification",
		"username"	: username
	}
	data = $.param(data) + '&' + $(this).serialize();
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			fn_get_classification('table');
			$('.modal').modal('hide');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#tbl_settings_classification tbody').on('click','tr',function(){
	var pkid = $(this).find('td:eq(0)').attr('id');
	sc = $(this).index();
	$('#tbl_settings_classification tbody tr').attr('style','');
	$(this).attr('style','background-color:lightblue;color:black;');
});

$('#tbl_settings_classification tbody').on('click','tr .fa-save',function(){
	var data = {
		"action"		: "update_classification",
		"pkid"			: $(this).closest('tr').find('td:eq(0)').attr('id'),
		"classification": $(this).closest('tr').find('td:eq(0) input').val(),
		"callout"		: $(this).closest('tr').find('td:eq(1) input').val(),
		"username"		: username
	}
	data = $.param(data);
	$.ajax({
		type	: "POST",
		dataType: "JSON",
		data	: data,
		url		: handler,
		success	: function(result){
			sdd = '';
			fn_get_classification('table');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			console.log(result);
		}
	});
});

$('#tbl_settings_classification tbody').on('click','tr .fa-remove',function(){
	sc = '';
	fn_get_classification('table');
	$('.btn').prop('disabled',false);
});

$('#tbl_settings_classification tbody').on('click','tr',function(){
	var pkid = $(this).find('td:eq(0)').attr('id');
	sc = $(this).index();
	$('#tbl_settings_classification tbody tr').attr('style','');
	$(this).attr('style','background-color:lightblue;color:black;');
});

$('#btn_update_classification').click(function(){
	console.log(sc);
	if(sc == '' && sc != 0){
		alert("Select a row to update!");
		return false;
	}
	$('.btn').prop('disabled',true);
	var row   = $('#tbl_settings_classification tbody tr:eq('+sc+')');
	var current_value_classification = row.find('td:eq(0)').text();
	var current_value_callout = row.find('td:eq(1)').text();
	var pkid  = row.find('td:eq(0)').attr('id');
	var html  = '<div class="row">';
		html += '	<div class="col-sm-9">';
		html += '		<input type="text" class="form-control" value="'+current_value_classification+'">';
		html += '	</div>';
		html += '</div>';
	row.find('td:eq(0)').html(html);
	var html  = '<div class="row">';
		html += '	<div class="col-sm-9">';
		html += '		<input type="text" class="form-control" value="'+current_value_callout+'">';
		html += '	</div>';
		html += '	<div class="col-sm-3">';
		html += '		<button class="btn btn-success fa fa-save"></button>';
		html += '		<button class="btn btn-danger fa fa-remove"></button>';
		html += '	</div>';
		html += '</div>';
		row.find('td:eq(1)').html(html);
});

/* ******************************
		User Roles
******************************* */
var handler_user_roles  	= 'handler/handler_user_roles.php';
var table_main_id 			= '#tbl_user_main';
var tbl_user_crud_id 		= '#tbl_user_crud';
var modal_edit_user_crud_id = '#modal_edit_user_crud';
var table_main_dt 			= $(table_main_id).DataTable({
	ajax	: "server_side_scripts/user_roles_main?fk_system=61"
});

$(table_main_id + ' tbody').on('click','tr .fa-edit',function(){
	var user = $(this).closest('tr').find('td:eq(5)').text();
	get_user_role(user);
	$(modal_edit_user_crud_id).data('id',user);
	$(modal_edit_user_crud_id).modal('show');
});
	
function get_user_role(user){
	var data = {
		"action"	: "get_user_roles",
		"user"		: user,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler_user_roles,
		success : function(result){
			$(tbl_user_crud_id + ' tbody').empty();
			$(tbl_user_crud_id + ' tbody').append(result['html']);
		},error	: function(result){
			alert('handler..');
			console.log(result);
		}
	});
}

$(tbl_user_crud_id + ' thead th input').click(function(){
 	if( $(this).prop('checked') ){
 		var col = this.value;
 		$(tbl_user_crud_id + ' tbody tr').each(function(){
 			$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',true);
 		});
 	}else{
 		var col = this.value;
 		$(tbl_user_crud_id + ' tbody tr').each(function(){
 			$(this).find('td:eq('+col+') input[type=checkbox]').prop('checked',false);
 		});
 	}
});

var frm_user_roles_id = '#frm_user_roles';

$(frm_user_roles_id).submit(function(e){
	e.preventDefault();
	$('.btn').prop('disabled',true);
	get_role();
});

function get_role(){
	var role 			= {};
		role.role_id 	= [];
		role.user 		= [];
		role.fk_module 	= [];
		role.create 	= [];
		role.read 		= [];
		role.update 	= [];
		role.delete 	= [];

	$(tbl_user_crud_id + ' tbody tr').each(function(){
		role.role_id.push( $(this).find('td:eq(1) input').val() );
		role.user.push( $( modal_edit_user_crud_id).data('id') );
		role.fk_module.push( $(this).find('td:eq(0) input[type=hidden]').val() );
		role.create.push( ( $(this).find('td:eq(1) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.read.push( ( $(this).find('td:eq(2) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.update.push( ( $(this).find('td:eq(3) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
		role.delete.push( ( $(this).find('td:eq(4) input[type=checkbox]').prop('checked') == true ? 1 : 0) );
	});
	fn_update_role(role);
}

function fn_update_role(role){
	var data = {
		"action" 	: "update_role",
		"role"		: role,
		"username"	: username
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler_user_roles,
		success : function(result){
			alert('User role has been updated!');
			$('.modal').modal('hide');
			$('.btn').prop('disabled',false);
		},error	: function(result){
			alert('handler..');
			console.log(result);
		}
	});
}

/* ******************************
		Mailer
******************************* */
send_email_alerts();
window.setInterval(function(){
	send_email_alerts();
},15000);

function send_email_alerts(){
	var data = {
		"action"	: "send_email_alerts"
	}
	data = $.param(data);
	$.ajax({
		type 	: "POST",
		dataType: "JSON",
		data 	: data,
		url 	: handler,
		success : function(result){
			console.log(result);
		},error	: function(result){
			console.log(result);
		}
	});
}

/* Test Codes */
// $('.sidebar a[href="#configuration"]').click();
// $('.sidebar a[href="#warehouse"]').click();
// $('.sidebar a[href="#material_request"]').click();
// $('.sidebar a[href="#settings"]').click();
// $('.sidebar a[href="#configuration"]').click();
// $('#modal_new_request').modal('show');
</script>