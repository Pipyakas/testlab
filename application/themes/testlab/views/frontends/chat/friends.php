<?php
require get_theme_folder() . 'custom_validation.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/growl/jquery.growl.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.fileupload.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/jquery.validate.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/additional-methods.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
  jQuery(document).ready(function($) {
    $('#form').validate({
      rules: {

      },
      submitHandler: function() {
        alert("submited!!!");
        // tinyMCE.triggerSave();// sua loi submit hai lan
        pass_data = $('#form').serialize();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/testlab/friends/edit_apply',
            type: 'post',
            //  dataType: 'json',
            data: pass_data

          })
          .done(function() {
            alert("sent!!!");
          })
          .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("1" + textStatus);
          })
          .always(function(data) {
            $.unblockUI();
            alert("always!!!" + data);
            if (data.ok == 1) {
              alert("ok=1!!!");
              $.growl.notice({
                message: '<?php echo lang('edit_successfully') ?>'
              });
            }

            if (data.ok == 0) {
              alert("ok=0!!!");
              //need login to cotinue;
              window.location.href = "<?php echo base_url() . 'admin/dashboard/login'; ?>"
            }
          })

      }
    });
  });
</script>
<?php
if (isset($friends) && $friends != null) {
  foreach ($friends as $key) {
?>
    <div id="content" class="container">
      <div class="item-news">
        <div class="row col-md-10">
          <div id="newslist" class="portfolio-user">
            <a class="wrapper col-sm-2" href="">
              <img class="img-responsive" src="<?php if ($this->users_model->get_by_username($key->friends_name)[0]->avt != null) {
                                                  echo base_url() . $this->users_model->get_by_username($key->friends_name)[0]->avt;
                                                }
                                                ?>" alt="">

            </a>
            <div class="info col-sm-7">
              <a href="<?php echo base_url() . 'index.php/messages?id=' . $key->id; ?>">
                <h3><?php echo $key->friends_name; ?>
                </h3>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
      #newslist .thumb {
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .row {
        border-bottom: 1px solid #bebebe;
        padding-bottom: 10px;
        margin-bottom: 10px;
      }

      @media (min-width: 767px) {
        #newslist .thumb img {
          width: auto;
          height: 100px;
          overflow: hidden;
          min-width: 100%;
          height: 100%;
        }
      }

      #newslist .thumb .img-responsive img {
        width: auto;
        height: 150px;
        overflow: hidden;
        min-width: 100%;
        height: 100%;
      }
    </style>

  <?php
  }
}

if (isset($livecodes) && $livecodes != null) {
  foreach ($livecodes as $object) {

  ?>

    <div id="livecode" class="container">

      <form class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">
        <p>
          <h1>Live demo code</h1>
        </p>
        <input type="hidden" name="id" id="id" value="<?php echo $object->id; ?>" />
        <fieldset>

          <div class="form-group">
            <div class="col-sm-2">
              <label class="control-label">Input Codes</label>
            </div>
            <div class="col-sm-8">
              <textarea class="form-control" name="livecodes" id="livecodes" placeholder="please type codes here" style="width:100%;height:150px;"><?php echo $object->codes; ?></textarea>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-sm-2">
              <label class="control-label">Result</label>
            </div>
            <div class="col-sm-8 ">

              <?php echo $object->codes; ?>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-2 col-xs-offset-2">
              <button type="submit" class="btn btn-success"><?php echo lang('msg_edit'); ?></button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
<?php
  }
}
?>