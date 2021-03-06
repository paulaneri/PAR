<?php
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('edit');?>
                    	</a></li>
			<li>
            	<a href="#cd" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('cd');?>
                    	</a></li>
			<li>
						<a href="#tc" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('tc');?>
								      </a></li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="edit">
							<div class="box-content">

								<div class="panel-heading">
										<div class="panel-title" >
											<i class="entypo-plus-circled"></i>
								<?php echo get_phrase('edit_student');?>
										</div>
									</div>
									<div class="panel-body">

						                <?php echo form_open(base_url() . 'index.php?admin/student/'.$row['class_id'].'/do_update/'.$row['student_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



											<div class="form-group">
												<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

												<div class="col-sm-5">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
															<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
														<div>
															<span class="btn btn-white btn-file">
																<span class="fileinput-new">Select image</span>
																<span class="fileinput-exists">Change</span>
																<input type="file" name="userfile" accept="image/*">
															</span>
															<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $row['name'];?>">
												</div>
											</div>
											<div class="form-group">
												<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nickname');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="name"  value="<?php echo $row['nickname'];?>">
												</div>
											</div>


											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

												<div class="col-sm-5">
													<select name="class_id" class="form-control select2" data-validate="required" id="class_id"
														data-message-required="<?php echo get_phrase('value_required');?>"
															onchange="return get_class_sections(this.value)">
						                              <option value=""><?php echo get_phrase('select');?></option>
						                              <?php
															$classes = $this->db->get('class')->result_array();
															foreach($classes as $row2):
																?>
						                                		<option value="<?php echo $row2['class_id'];?>"
						                                        	<?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
																			<?php echo $row2['name'];?>
						                                                </option>
							                                <?php
															endforeach;
														  ?>
						                          </select>
												</div>
											</div>

											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="email" value="" >
												</div>
											</div>
											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control datepicker" name="birthday" value="<?php echo $row['birthday'];?>" data-start-view="2">
												</div>
											</div>

											          <div class="form-group">
											            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nacionalidad');?></label>

											            <div class="col-sm-5">
											              <input type="text" class="form-control" name="nacionalidad" value="<?php echo $row['nacionalidad'];?>" >
											            </div>
											          </div>

											          <div class="form-group">
											            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('ingreso_arg');?></label>

											            <div class="col-sm-5">
											              <input type="text" class="form-control" name="ingreso_arg" value="<?php echo $row['ingreso_arg'];?>" >
											            </div>
											          </div>

											          <div class="form-group">
											            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('DU');?></label>

											            <div class="col-sm-5">
											              <input type="text" class="form-control" name="DU" value="<?php echo $row['DU'];?>" >
											            </div>
											          </div>

											          <div class="form-group">
											            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('hijos');?></label>

											            <div class="col-sm-5">
											              <input type="text" class="form-control" name="hijos" value="<?php echo $row['hijos'];?>" >
											            </div>
											          </div>



											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>

												<div class="col-sm-5">
													<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>" >
												</div>
											</div>


						                    <div class="form-group">
												<div class="col-sm-offset-3 col-sm-5">
													<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_student');?></button>
												</div>
											</div>
						                <?php echo form_close();?>
						            </div>

							</div>



			</div>
            <!----TABLE LISTING ENDS--->


			<!----Cd---->
			<div class="tab-pane box" id="cd" style="padding: 5px">
                <div class="box-content">
                  otro
                </div>
			</div>


						<!----TC---->
						<div class="tab-pane box" id="tc" style="padding: 5px">
			                <div class="box-content">
												<table class="table table-bordered datatable" id="table_export">
					                   <thead>
					                       <tr>         <th><div><?php echo get_phrase('date');?></div></th>
					                           <th><div><?php echo get_phrase('quienes');?></div></th>

					                             <th><div><?php echo get_phrase('Mujeres');?></div></th>
					                               <th><div><?php echo get_phrase('comentarios');?></div></th>

					                       </tr>
					                   </thead>
					                   <tbody>

					                       <?php
					                               $tcs	=	$this->db->get('tc' )->result_array();
					                               foreach($tcs as $row):


																					 ?>
					                       <tr>

					                           <td><?php echo $row['date'];?></td>
					                         <td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
					                           <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
					                           <td><?php echo $row['comentarios'];?></td>

					                       </tr>
					                       <?php endforeach;?>
					                   </tbody>
					               </table>
			                </div>
						</div>
			<!----CREATION FORM ENDS-->

		</div>
	</div>
</div>
<?php
endforeach;
?>
