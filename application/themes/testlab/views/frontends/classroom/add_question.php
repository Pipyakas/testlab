<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/growl/jquery.growl.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.fileupload.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/jquery.validate.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/additional-methods.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/tinymce/js/tinymce/tinymce.min.js"></script>
<!-- <script>
jQuery(document).ready(function() {

  $('#form').validate({
  	submitHandler:function(form){
  		alert('submitted');
  		pass_data=$('#form').serialize();
  		$.ajax({
        method:'post',
  			url:'<?php echo base_url(); ?>index.php/testlab/classrooms/test_result',
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


<form class="form-horizontal" id="form" method="post" action="<?php echo base_url(); ?>index.php/testlab/classrooms/add_question" enctype="multipart/form-data">
  <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
  <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>">
  <div class="row">
    <div class="container">
      <div class="form-group">
        <div class="control-label col-sm-3">
          <h3><label>Add a question</label></h3>
        </div>
      </div>
    </div>
  </div>

  <fieldset>

    <div class="row">
      <div class="container">
        <div class="form-group">
          <div class="col-sm-1 control-label">
            <label>Question</label>
          </div>
          <div class="col-sm-4">
            <input class="form-control" name="content" value="">
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="form-group">
          <div class="col-sm-1 control-label">
            <label>Picture</label>
          </div>
          <div class="col-sm-5 ">
            <input type="file" class="form-control" name="pic" id="pic">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="form-group">
          <div class="col-sm-1 control-label">
            <label>Answers</label>
          </div>
        </div>
      </div>
    </div>

    <?php
    for ($i = 0; $i <= 3; $i++) {
    ?>
      <div class="row">
        <div class="container">
          <div class="form-group">
            <div class="col-sm-1 control-label">
              <input type="Checkbox" name="selection[]" value="<?php echo $i; ?>">
            </div>
            <div class="col-sm-1 control-label">
              <label>Option</label>
            </div>
            <div class="col-sm-3">
              <input class="form-control" name="option[]" value="">
            </div>
            <div class="col-sm-1 control-label">
              <label>Result</label>
            </div>
            <div class="col-sm-3">
              <input class="form-control" name="recommend[]" value="">
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>

    <div class="row">
      <div class="container">
        <div class="form-group">
          <div class="col-sm-2 control-label">
            <button type="submit" class="btn btn-success" value="Add">Add</button>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
</form>