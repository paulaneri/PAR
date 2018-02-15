<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_new_student');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>


								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nickname');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="nickname" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

									<div class="col-sm-5">
										<select name="class_id" class="form-control select2"  id="class_id"

												onchange="return get_class_sections(this.value)">
																		<option value=""><?php echo get_phrase('select');?></option>
																		<?php
											$classes = $this->db->get('class')->result_array();
											foreach($classes as $row):
												?>
																			<option value="<?php echo $row['class_id'];?>">
														<?php echo $row['name'];?>
																									</option>
																			<?php
											endforeach;
											?>
																</select>
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
									</div>
								</div>


								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="address" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nacionalidad');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="nacionalidad" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('DU');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="DU" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('hijos');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="hijos" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('ingreso_arg');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="ingreso_arg" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="phone" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>

									<div class="col-sm-5">
										<input type="text" class="form-control" name="email" value="" >
									</div>
								</div>




								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

									<div class="col-sm-5">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
												<img src="http://placehold.it/200x200" alt="...">
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
									<div class="col-sm-offset-3 col-sm-5">
										<button type="submit" class="btn btn-info"><?php echo get_phrase('add_student');?></button>
									</div>
								</div>
											<?php echo form_close();?>
									</div>
        </div>
    </div>
</div>
