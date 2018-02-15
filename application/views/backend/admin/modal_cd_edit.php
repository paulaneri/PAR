<?php
$edit_data		=	$this->db->get_where('cd' , array('cd_id' => $param2) )->result_array();
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url(). 'index.php?admin/cd/do_update/'.$row['cd_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
							<div class="form-group">
									<label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
									<div class="col-sm-5">
											<input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>"/>
									</div>
							</div>
                <div class="form-group">
                  	<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('comentarios');?></label>
                    <div class="col-sm-5">
                        <div class="box closable-chat-box">
                            <div class="box-content padded">
                                    <div class="chat-message-box">
                                    <textarea name="comentarios" id="ttt" rows="5" class="form-control"
                                    	placeholder="<?php echo get_phrase('add_cd');?>"><?php echo $row['comentarios'];?></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>



								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>

									<div class="col-sm-5">
										<select name="student_id" class="form-control selectboxit">
																		<option value=""><?php echo get_phrase('select');?></option>
																		<?php
												$teachers = $this->db->get('student')->result_array();
												foreach($teachers as $row3):
													?>
																					<option value="<?php echo $row3['student_id'];?>"
																						<?php if ($row['student_id'] == $row3['student_id'])
																							echo 'selected';?>>
																<?php echo $row3['name'];?>
																							</option>
																					<?php
												endforeach;
											?>
																</select>
									</div>
								</div>
                <div class="form-group">
                  <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

                  <div class="col-sm-5">
                    <select name="class_id" class="form-control selectboxit">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                        $teachers = $this->db->get('class')->result_array();
                        foreach($teachers as $row3):
                          ?>
                                          <option value="<?php echo $row3['class_id'];?>"
                                            <?php if ($row['class_id'] == $row3['class_id'])
                                              echo 'selected';?>>
                                <?php echo $row3['name'];?>
                                              </option>
                                          <?php
                        endforeach;
                      ?>
                                </select>
                  </div>
                </div>

            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_cd');?></button>
              </div>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>
