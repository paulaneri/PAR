<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('cd_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_cd');?>
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


                             <th><div><?php echo get_phrase('Mujeres');?></div></th>
                               <th><div><?php echo get_phrase('comentarios');?></div></th>
                                <th><div><?php echo get_phrase('class');?></div></th>
                             <th><div><?php echo get_phrase('edit');?></div></th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php
                               $tcs	=	$this->db->get('cd' )->result_array();
                               foreach($tcs as $row):?>
                       <tr>

                           <td><?php echo $row['date'];?></td>

                           <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
                           <td><?php echo $row['comentarios'];?></td>
                           <td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
                           <td>

                               <div class="btn-group">
                                 <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_cd_edit/<?php echo $row['cd_id'];?>');">
                                     <i class="entypo-pencil"></i>
                                       </a>
                                       <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/cd/delete/<?php echo $row['cd_id'];?>');">
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
                                    <?php echo get_phrase('add_cd');?>
                                        </div>
                                      </div>
                                <div class="panel-body">

                                          <?php echo form_open(base_url() . 'index.php?admin/cd/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>



                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

                                      <div class="col-sm-5">
                                        <select name="class_id" class="form-control selectboxit multiselect"  multiple="multiple">
                                                        <option value=""><?php echo get_phrase('select');?></option>
                                                        <?php
                                            $classs = $this->db->get('class')->result_array();
                                            foreach($classs as $row):
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
                                      <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>

                                      <div class="col-sm-5">
                                        <select id="mujer" name="student_id" class="form-control selectboxit">
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
                                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_cd');?></button>
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
