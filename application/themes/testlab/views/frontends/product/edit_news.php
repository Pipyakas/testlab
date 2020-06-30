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
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/statics/js/colorbox/colorbox.css"/>
-->
<script>
  jQuery(document).ready(function($) {
    $('#form').validate({
      rules: {
        title: {
          required: true
        }
      },
      submitHandler: function() {
        // alert("submited!!!");
        tinyMCE.triggerSave();
        pass_data = $('#form').serialize();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/testlab/products/edit_apply',
            type: 'post',
            //  dataType: 'json',
            data: pass_data

          })
          .done(function() {
            //alert("sent!!!");
          })
          .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("1" + textStatus);
          })
          .always(function(data) {
            $.unblockUI();
            // alert("always!!!"+data);
            if (data.ok == 1) {
              //    alert("ok=1!!!");
              $.growl.notice({
                message: '<?php echo lang('edit_successfully') ?>'
              });
            }
            if (data.ok == 0) {
              //   alert("ok=0!!!");
              //need login to cotinue;
              window.location.href = "<?php echo base_url() . 'admin/dashboard/login'; ?>"
            }
          })
      }
    });

    $('#fudPhoto').fileupload({
      url: '<?php echo base_url() ?>index.php/testlab/products/upload_products',
      dataType: 'json',
      formData: {
        'id': <?php echo $object->id; ?>
      },
      add: function(e, data) {
        data.submit();
      },
      progressall: function(e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css('width', progress + '%');
      },
      started: function() {
        $('#progress .bar').css('width', 0 + '%');
      },
      autoUpload: false,
      dropZone: $('.drag-drop-zone'),
      done: function(e, data) {
        $('#progress .bar').css('width', 0 + '%');
        $data = data.result;
        if ($data.ok == 1) {
          source = $('#thumb-template').html();
          template = Handlebars.compile(source);
          apply = template($data);
          $('.gallery').append(apply);
          apply_operation_photo();
        }
        if ($data.ok == 2) {
          window.location.href = "<?php echo base_url() . 'admin/dashboard/login'; ?>";
        }
      }
    });

  });
</script>

<div class="container">
  <div class="form-wraper">
    <div class="item col-xs-offset-2">
      <h3><?php echo lang('msg_edit'); ?></h3>
    </div>
    <form class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $object->id; ?>" />
      <fieldset>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_title'); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $object->title; ?>">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_avatar'); ?></label>
          </div>
          <div class="col-sm-8 ">
            <input type="file" class="form-control" id="fudPhoto" name="fileData" class="fudFile" multiple="true" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_content'); ?></label>
          </div>
          <div class="col-sm-8">
            <textarea id="content_main" name="content_main" class="form-control"><?php echo $object->content; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label" for="txtName"><?php echo lang('msg_types'); ?></label>
          </div>
          <div class="controls col-sm-8 multi_select">
            <?php
            $this->load->model('types_model');
            $list_types = $this->types_model->get_by_top();
            $types = $object->types_id;
            $types_array = explode(',', $types);
            foreach ($list_types as $key) {
              $display = 0;
              foreach ($types_array as $id) if ($key->id == $id) {
                echo '<div class="checkbox">
                      <label>
                         <input  checked="checked"';
                echo ' type="checkbox" class="types" name="types[]" value="' . $id . '">' . $key->name . '
                      </label>';
                echo '</div>';
                $display = 1;
              }
              if ($display == 0) {
                echo '<div class=checkbox">
                               <label>
                                  <input type="checkbox" class="types" name="types[]" value="' . $key->id . '">' . $key->name . '
                               </label>
                            </div>';
              }
            }
            ?>
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
</div>



<script>
  tinymce.init({

    selector: "#content_main",

    theme: "modern",
    entity_encoding: "raw",
    forced_root_block: "",
    width: '100%',


    height: 300,
    overflow: scroll,


    plugins: [

      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

      "save table contextmenu directionality emoticons template paste textcolor"

    ],

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
    style_formats: [

      {
        title: 'Bold text',
        inline: 'b'
      },

      {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      },

      {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      },

      {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      },

      {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      },

      {
        title: 'Table styles'
      },

      {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }

    ]

  });
</script>