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

      submitHandler: function() {
        // alert("submited!!!");
        //    tinyMCE.triggerSave();// sua loi submit hai lan
        pass_data = $('#form').serialize();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/elab/comments/edit_apply',
            type: 'post',


            //  dataType: 'json',
            data: pass_data

          })
          .done(function() {
            // alert("sent!!!");
          })
          .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("1" + textStatus);
          })
          .always(function(data) {
            $.unblockUI();
            //  alert("always!!!"+data);
            $('#m').val('');
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
<style>
  .hide-button .like {
    color: #212121;
  }

  .hide-button .like.active {
    color: #e13364;
  }

  .detail a {
    color: #212121;
  }

  .like-stand i {
    font-size: 20px;
    color: #757575 !important;
  }

  .like-stand.active i {
    color: #e13364 !important;
  }

  .chat-user img {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    margin: 0px;
    padding: 0px;
  }
</style>

<div class="portfolio-user container" style="margin-top: 15px; float: none;">
  <div class="core col-md-12">
    <div class="wrapper chat-user col-md-6">
      <img src="<?php echo base_url() . $this->classrooms_model->get_by_user_id($owner_id)[0]->avt; ?>" alt="">
    </div>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub_navbar" style="float:left">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
</div>


<div id="content" class="store-page">
  <!-- <div class="container"  style="margin:0px;padding:5px;"> -->
  <div class="container">

    <!-- <div class="core col-md-12"> -->
    <div class="col-md-12 col-xs-12" style="margin:0px;padding:0px;">
      <div class="row">

        <div class="col-sm-6 col-xs-12" style="padding:0px;">
          <!--  <div class="form-group">-->
          <div>
            <div class="form-wraper" style="text-align: center">
              <h1>Comments</h1>
            </div>
          </div>
          <!--  <div class="form-group">
            <div class="form-wraper" > -->
          <form id="form" method="post" enctype="multipart/form-data" class="col-sm-12" style="margin:0px;padding:0px;">
            <input type="hidden" name="owner_id" value="<?php if (isset($owner_id)) {
                                                          echo $owner_id;
                                                        } else {
                                                          echo '""';
                                                        } ?>" />
            <input type="hidden" name="sender_id" value="<?php if (isset($_SESSION['user'][0])) {
                                                            echo $_SESSION['user'][0]->id;
                                                          } else {
                                                            echo '""';
                                                          } ?>" />
            <input type="hidden" name="avt" value="<?php if (isset($_SESSION['user'][0])) {
                                                      echo $_SESSION['user'][0]->avt;
                                                    } else {
                                                      echo '""';
                                                    } ?>" />
            <div id="webRTC" class="col-sm-12" style="margin:0px;padding-left:10px;">
              <div class="flex-chat">
                <ul id="comment"></ul>
                <div id="comment_input">
                  <input id="m" name="m" onkeypress="return check_key(event);" value="<?php echo '""'; ?>" />
                  <button id="comment_button" class="btn btn-success" type="submit">Send</button>
                </div>
              </div>
            </div>
          </form>
          <!--     </div>
        </div>     -->
        </div>
        <div class="main-content col-sm-6 col-xs-12" style="padding-right:0px;">
          <!--   <div class="form-group"> -->
          <div>
            <div class="form-wraper" style="text-align: center">
              <h1>Lessons</h1>
            </div>
          </div>
          <div class="inner-content">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  #comment {
    background: #ddd;
    list-style-type: none;
    padding: 0;
    margin: 0;
    height: 200px;
    overflow: auto;
    border: 1px solid #BDBDBD;
  }

  #comment_input {
    width: 100%;
    padding: 0px;
    margin: 0px;
    height: 20px;
  }

  #comment_input input {
    width: 80%;
    height: 20px;
    border: 0;
    padding: 0px;
    overflow: auto;
    margin: 0px;
  }

  #comment_input button {
    width: 18%;
    height: 20px;
    border: 1px solid gray;
    padding: 0px;
    margin: 0px;
  }

  #messages {
    background: #ddd;
    list-style-type: none;
    padding: 0;
    margin: 0;
    height: 200px;
    overflow: auto;
    border: 1px solid #BDBDBD;
  }

  #comment li {
    padding: 5px 10px;
  }

  .receivedmess {
    border: 1px lightgray solid;
    background-color: white;
  }

  #comment li:nth-child(odd) {
    /*background:lightgray;*/
  }

  .flex-container {
    flex-direction: column;
    display: flex;
  }

  .flex-video {
    flex: 1
  }

  .flex-chat {
    flex: 2;
    background: gray;
    height: 200px;
  }

  .flex-item {
    width: 100%;
    text-align: center;
  }

  .flex-row {
    display: flex;
    flex-direction: row;
  }


  .navbar-toggle .icon-bar {
    background-color: green;
  }
</style>


<script>
  function check_key(e) {
    if (e.keyCode == 13) {

      //     document.getElementById("comment_button").click();
      return true;
    }
  }
  // addEventListener support for IE8
  function bindEvent(element, eventName, eventHandler) {
    if (element.addEventListener) {
      element.addEventListener(eventName, eventHandler, false);
    } else if (element.attachEvent) {
      element.attachEvent('on' + eventName, eventHandler);
    }
  }

  // Send random messge data on every button click
  bindEvent(comment_button, 'click', function(e) {
    var random = $('#m').val();
    $('#comment').append('<div class="row col-sm-12"><div class="chat-user col-sm-1 col-xs-1"><img src="<?php if ($_SESSION['user'][0]->avt != null) {
                                                                                                          echo base_url() . $_SESSION['user'][0]->avt;
                                                                                                        } ?>"/></div><div class="chat-message col-sm-10 col-xs-10">' + random + '</div></div>');
    $("#comment").scrollTop($("#comment")[0].scrollHeight);
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    first = 0;
    is_loading = true;
    type_id = '';

    function load_products(more) {
      $.ajax({
        method: 'GET',
        url: '<?php echo base_url() ?>index.php/elab/products/load_news_by_user_id',
        data: {
          //first:first,
          user_id: <?php if (isset($owner_id)) {
                      echo $owner_id;
                    } else {
                      echo '""';
                    } ?>
          //	type_id:type_id
        },
        beforeSend: function() {
          $('.loading').show();
        },
        success: function(data) {
          $('.loading').hide();
          if (data.trim() == '') {
            is_loading = false;
          } else {
            if (!more) {
              $('.inner-content').html(data);
            } else {
              $('.inner-content').append(data);
            }
          }
        }
      })
    }

    //het ham load_product
    function load_comments(more) {
      $.ajax({
        method: 'GET',
        url: '<?php echo base_url() ?>index.php/elab/comments/load_comments_by_user_id',

        data: {
          //first:first,
          user_id: <?php if (isset($owner_id)) {
                      echo $owner_id;
                    } else {
                      echo '""';
                    } ?>
          //  type_id:type_id
        },
        beforeSend: function() {
          $('.loading').show();
        },
        success: function(data) {
          $('.loading').hide();
          //  alert('loading'.data);
          if (data.trim() == '') {
            is_loading = false;
          } else {
            if (!more) {
              //   alert('html');
              $('#comment').html(data);
            } else {
              //        alert('inserting');
              $('#comment').append(data);
            }
          }
        }
      })
    }
    //0 is not sugget
    //1 is sugget
    load_products(false);
    load_comments(false);

    $(window).scroll(function() {
      //   if($(window).scrollTop() + window.innerHeight == $(document).height() && is_loading) {
      if ($(window).scrollTop() >= 800) {
        first += 10;
        // load_products(true);
        load_comments(false);
      }
    });

    $("#comment").click(function() {
      load_comments(false);
      $("#comment").scrollTop($("#comment")[0].scrollHeight);
      document.getElementById("m").focus();
    });

    $('.btn-categories').click(function() {
      first = 0;
      $('.inner-content').html('');
      type_id = $(this).attr('type-id');
      load_products(false);
    })
  });
</script>