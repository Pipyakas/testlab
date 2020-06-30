<div class="container">
  <div class="form-wraper">
    <div class="item col-xs-offset-2">
      <h3><?php echo lang('msg_add_news'); ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
      <fieldset>
        <div class="form-group ">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_avatar'); ?></label>
          </div>
          <div class="col-sm-8 ">
            <input type="file" class="form-control" name="pic" id="pic">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_title'); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="title" id="title">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label"><?php echo lang('msg_content'); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="content_main" id="content_main">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2 col-xs-offset-2">
            <button type="submit" class="btn btn-success"><?php echo lang('msg_save'); ?></button>
          </div>
        </div>
      </fieldset>
    </form>

  </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>statics/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({

    selector: "#content_main",

    theme: "modern",
    entity_encoding: "raw",
    forced_root_block: "",
    width: '100%',


    height: 300,


    plugins: [

      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

      "save table contextmenu directionality emoticons template paste textcolor"

    ],
    //       content_css: "/cms/style.css",

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