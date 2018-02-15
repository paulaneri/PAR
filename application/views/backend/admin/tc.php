<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('tc_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_tc');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

              <table class="table table-bordered datatable" id="table_export">
                   <thead>
                       <tr>

                           <th><div><?php echo get_phrase('date');?></div></th>
                           <th><div><?php echo get_phrase('quienes');?></div></th>

                             <th><div><?php echo get_phrase('Mujeres');?></div></th>
                               <th><div><?php echo get_phrase('comentarios');?></div></th>
                             <th><div><?php echo get_phrase('edit');?></div></th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php
                               $tcs	=	$this->db->get('tc' )->result_array();
                               foreach($tcs as $row):?>
                       <tr>

                           <td><?php echo $row['date'];?></td>
                         <td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
                           <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
                           <td><?php echo $row['comentarios'];?></td>
                           <td>

                               <div class="btn-group">
                                 <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_tc_edit/<?php echo $row['tc_id'];?>');">
                                     <i class="entypo-pencil"></i>
                                       </a>
                                       <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/tc/delete/<?php echo $row['tc_id'];?>');">
                                           <i class="entypo-trash"></i>
                                             </a>

                               </div>

                           </td>
                       </tr>
                       <?php endforeach;?>
                   </tbody>
               </table>


			</div>
            <!----TABLE LISTING ENDS--->


			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                  <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                              <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('add_tc');?>
                            </div>
                          </div>
                    <div class="panel-body">

                              <?php echo form_open(base_url() . 'index.php?admin/tc/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>"/>
                            </div>
                        </div>


                        <div class="form-group">
                          <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>

													<div class="col-sm-5">
														<select name="teacher" class="form-control  selectboxit" data-validate="required" id="teacher_id"
															data-message-required="<?php echo get_phrase('value_required');?>"
																onchange="return get_class_sections(this.value)">
							                              <option value=""><?php echo get_phrase('select');?></option>
							                              <?php
															$teachers = $this->db->get('teacher')->result_array();
															foreach($teachers as $row):
																?>
							                            		<option value="<?php echo $row['teacher_id'];?>">
																		<?php echo $row['name'];?>
							                                            </option>
							                                <?php
															endforeach;
														  ?>
							                          </select>
													</div>
                        </div>

  <div class="form-group">

												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_tic_add/');"
						            	class="btn btn-primary pull-right">
						                <i class="entypo-plus-circled"></i>
						            	<?php echo get_phrase('add_new_tic');?>
						                </a>
						                <br><br>
														<table class="table table-bordered datatable" id="table_export">
							                   <thead>
							                       <tr>
							                             <th><div><?php echo get_phrase('Mujeres');?></div></th>
							                               <th><div><?php echo get_phrase('comentarios');?></div></th>
							                             <th><div><?php echo get_phrase('edit');?></div></th>
							                       </tr>
							                   </thead>
							                   <tbody>
							                       <?php
							                               $tics	=	$this->db->get('tic' )->result_array();
							                               foreach($tics as $row):?>
							                       <tr>
							                           <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							                           <td><?php echo $row['comentarios'];?></td>
							                           <td>

							                               <div class="btn-group">
							                                 <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_tic_edit/<?php echo $row['tic_id'];?>');">
							                                     <i class="entypo-pencil"></i>
							                                       </a>
							                                       <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/tic/delete/<?php echo $row['tic_id'];?>');">
							                                           <i class="entypo-trash"></i>
							                                             </a>

							                               </div>

							                           </td>
							                       </tr>
							                       <?php endforeach;?>
							                   </tbody>
							               </table>
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
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_tc');?></button>
                          </div>
                        </div>
                              <?php echo form_close();?>
                          </div>
                      </div>
                </div>
			</div>
			<!----CREATION FORM ENDS-->

		</div>
	</div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2,3,4,5]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(5, false);

                            this.fnPrint( true, oConfig );

                            window.print();

                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(5, true);
                                  }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>
<script type="text/javascript">

	function get_class_sections(teacher_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + teacher_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }
		$('.selectpicker').selectpicker({
		  style: 'btn-info',
		  size: 4
		});

</script>
