<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/growl/jquery.growl.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.fileupload.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/jquery.blockUI.js"></script> 
<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/jquery.validate.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/additional-methods.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url()?>statics/tinymce/js/tinymce/tinymce.min.js"></script>
 <!-- <script>
jQuery(document).ready(function() {

  $('#form').validate({
  	submitHandler:function(form){
  		alert('submitted');
  		pass_data=$('#form').serialize();
  		$.ajax({
        method:'post',
  			url:'<?php echo base_url();?>index.php/elab/classrooms/test_result',
  			data:pass_data
  		})
  		.done(function(){
  			alert('sent');
  		})

      .always(function(data) {
        if(data.ok==1){
           alert("ok=1!!!");
          
        }

        if(data.ok==0){
          alert("ok=0!!!");
          //need login to cotinue;
         
        }
      })
  	}  
});
});
</script>  -->
<?php if ($_SESSION['user'][0]->id==$owner_id) {
  ?>
<div class="row">
      <div class="container">
            <a href="<?php echo base_url();?>index.php/add-question?id=<?php echo $test_id; ?>&owner_id=<?php echo $owner_id;  ?>" class="btn btn-success" style="float:right; margin-top:5px">Add a question</a>
      </div>
</div>
<?php
}
 if (isset($question_id)) {
	$count=0;
	?>
	<form  id="form" method="post" action="<?php echo base_url();?>index.php/elab/classrooms/test_result" enctype="multipart/form-data">
  <input type="hidden" name="test_id" value="<?php echo $test_id;?>">
	<?php
	  foreach ($question_id as $key){
	  $count=$count+1;
  ?>
      <div class="row">
        <div class="container">
             <input  type="hidden" name="question[]" value="<?php echo $key->id;?>">
             <div class="col-sm-1">
                <h3>Cau <?php echo $count;?></h3>
             </div>
             <div class="col-sm-4">
                <h3><?php echo $key->content; ?></h3>
             </div>
             <div class="col-sm-1 edit">
               <h3>
                <?php 
                             if (isset($_SESSION['user'])){
                                if($_SESSION['user'][0]->id == $owner_id){?>
                                    <a href="<?php echo base_url().'index.php/edit-question?id='.$key->id; ?>&test_id=<?php echo $test_id;?>" class="fa fa-edit"></a>
                                    <a href="<?php echo base_url().'index.php/delete-question?id='.$key->id; ?>&test_id=<?php echo $test_id;?>" class="fa fa-trash-o"></a>
                             <?php
                                };
                             };
                ?>
              </h3>
            </div>
        </div>
      </div>  
      <div class="row">
        <div class="container">
             <div class="col-sm-12 col-xs-12">
             <?php if ($key->avt!=null){?>
                 <img class="col-sm-12 img-responsive" src="<?php echo base_url();echo $key->avt; ?>">

             <?php

             }?>
             </div>
             
        </div>
      </div>
      <div class="row">
           <div class="container">
                <div class="col-sm-2">
                    <h3>Đáp án</h3>
                </div>    
           </div>
      </div>
      
      <?php 
       $this->load->model('answer_model');
       $result=$this->answer_model->get_by_id($key->id);
       if ($result!=null){
       $i=0;
       foreach ($result as $answer){
       	?> 
       	    <div class="row">
       	       <div class="container">

       	         <div class="col-sm-5">
       	           <input type="Checkbox" name="<?php echo $key->id; ?>[]" value="<?php echo $answer->id;?>"> <?php echo $answer->selection; ?>
       	         </div>
       	       </div> 
       	    </div>
       	<?php
       }
     }
      ?>


<?php 
      };
  ?>
  <input type="hidden" name="total" value="<?php echo $count; ?>">
  <div class="row">
           <div class="container">
               <div class="col-sm-2">
                   <button type="submit" class="btn btn-success" value="Run">Run</button>
               </div>
           </div>
      </div>
  </form>
  
  <?php
}
?>
