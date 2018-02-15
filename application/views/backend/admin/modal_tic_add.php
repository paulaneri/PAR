<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_tic');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/tic/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>

						<div class="col-sm-5">
							<select name="student_id" class="form-control" data-validate="required" id="student_id"
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_class_sections(this.value)">
															<option value=""><?php echo get_phrase('select');?></option>
															<?php
								$students = $this->db->get('student')->result_array();
								foreach($students as $row):
									?>
																<option value="<?php echo $row['student_id'];?>">
											<?php echo $row['name'];?>
																						</option>
																<?php
								endforeach;
								?>
													</select>
						</div>
					</div>





					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('comentarios');?></label>

						<div class="col-sm-5">
								<div class="box closable-chat-box">
										<div class="box-content padded">
														<div class="chat-message-box">
														<textarea name="comentarios" id="ttt" rows="5" class="form-control"
															><?php echo $row['comentarios'];?></textarea>
														</div>
										</div>
								</div>
						</div>

	</div>
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('add_tic');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
