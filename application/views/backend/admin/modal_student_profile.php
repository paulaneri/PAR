<?php
$student_info	=	$this->crud_model->get_student_info($param2);
foreach($student_info as $row):?>

<div class="profile-env">

	<header class="row">

		<div class="col-sm-3">

			<a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>"
                	class="img-responsive img-circle" />
			</a>

		</div>

		<div class="col-sm-9">

			<ul class="profile-info-sections">
				<li style="padding:0px; margin:0px;">
					<div class="profile-name">
							<h3><?php echo $row['name'];?></h3>
					</div>
				</li>
			</ul>

		</div>


	</header>

	<section class="profile-info-tabs">

		<div class="row">

			<div class="">
            		<br>
                <table class="table table-bordered">

                    <?php if($row['birthday'] != ''):?>
                    <tr>
                        <td>Cumpleaños</td>
                        <td><b><?php echo $row['birthday'];?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['phone'] != ''):?>
                    <tr>
                        <td>Teléfono</td>
                        <td><b><?php echo $row['phone'];?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['email'] != ''):?>
                    <tr>
                        <td>Email</td>
                        <td><b><?php echo $row['email'];?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['address'] != ''):?>
                    <tr>
                        <td>Dirección</td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
                </table>
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
		</div>
	</section>



</div>


<?php endforeach;?>
