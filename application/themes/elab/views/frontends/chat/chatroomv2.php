<?php 
require get_theme_folder().'custom_validation.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/growl/jquery.growl.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>statics/js/jquery_upload/js/jquery.fileupload.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/jquery.blockUI.js"></script> 
<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/jquery.validate.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/additional-methods.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url()?>statics/tinymce/js/tinymce/tinymce.min.js"></script>
<script> 
jQuery(document).ready(function($) {
  $('#form').validate({
      rules: {
        
      },
      submitHandler: function () {
   //   alert("submited!!!");
    // tinyMCE.triggerSave();// sua loi submit hai lan
      pass_data=$('#form').serialize();
      $.ajax({
        url: '<?php echo base_url() ?>index.php/elab/friends/edit_apply',
        type: 'post',
        data: pass_data
        
      })
      .done(function() {
      //   alert("sent!!!");
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("1"+textStatus);
      })
      .always(function(data) {
        $.unblockUI();
      // alert("always!!!"+data);
        if(data.ok==1){
     //      alert("ok=1!!!");
          $.growl.notice({message:'<?php echo lang('edit_successfully') ?>'});  
        }

        if(data.ok==0){
          alert("ok=0!!!");
          //need login to cotinue;
          window.location.href="<?php echo base_url().'admin/dashboard/login'; ?>"
        }
      })
      
    }
  });
  });
</script>
<?php
    
   if (isset($livecodes)&& $livecodes!=null){
    foreach ($livecodes as $object) {
        
      ?>
       
       <div id="livecode" class="container">
         
        <form class="form-horizontal col-sm-8" id="form" name="form" method="post" action="<?php echo base_url();?>index.php/elab/friends/edit_apply" enctype="multipart/form-data">
        <p><h1>Live demo code</h1></p>
        <input type="hidden" name="id" id="id" value="<?php echo $object->id; ?>"/>
        <fieldset>
           
           <div class="form-group">
             <div class="col-sm-2">
               <label class="control-label">Input Codes</label>
             </div>
             <div class="col-sm-10">
                <textarea class="form-control" name="livecodes" id="livecodes" placeholder="please type codes here" style="width:100%;height:150px;"><?php echo $object->codes; ?></textarea>
             </div>
           </div>
           <div class="form-group ">
            <div class="col-sm-2">
              <label class="control-label">Result</label>
            </div>
            <div class="col-sm-10">            
             <?php echo $object->codes; ?>
            </div>
           </div>
           
           
           <div class="form-group">
             <div class="col-sm-2 col-xs-offset-2">
                <button type="submit" class="btn btn-success"><?php echo lang('msg_edit');?></button>
             </div>  
           </div>
        </fieldset>
      </form>
      <div id="webRTC" class="col-sm-4">
          <iframe id="the_iframe" src="http://192.168.1.9:5000" width="100%" height="300px" frameborder="0"></iframe>
         <div class="flex-chat">
          <ul  id="messages"></ul>
           <div id="messageinput">
           <input id="m"/>
           <button id="message_button"class="btn btn-success">Send</button>
          </div>
        </div>

      </div>
     
   <style>
   #messageinput {
      width:100%;
      padding:0px;
      margin: 0px;
      height:20px;
         
     }
   #messageinput input {
            width:80%;
            height: 20px;
            border:0;
            padding:0px;
            overflow:auto;
            margin:0px;
           
            
}
#messageinput button {
              width:18%; 
              height:20px;
              border:1px solid gray;
              padding:0px;
              margin:0px;
              
                     }



   #messages{background:#ddd;
          list-style-type:none;
          padding:0;
          margin:0;
          height:200px;
          overflow:auto;
          border:1px solid #BDBDBD;

         }
   #messages li{ padding:5px 10px;
    }
   .receivedmess{
      border: 1px lightgray solid;
      background-color: white;
    }
   #messages li:nth-child(odd){/*background:lightgray;*/}  
  .flex-container {
          flex-direction:column;
          display:flex;  
  }
  .flex-video {
           flex:1
            }

  .flex-chat  {
           flex:2;
           background:gray;
           height:200px;
           }
  .flex-item {
            width:100%;
            text-align:center;
           }

  .flex-row {
          display:flex; 
          flex-direction:row;
  }


   </style>
    

    <script>
        // addEventListener support for IE8
        function bindEvent(element, eventName, eventHandler) {
            if (element.addEventListener){
                element.addEventListener(eventName, eventHandler, false);
            } else if (element.attachEvent) {
                element.attachEvent('on' + eventName, eventHandler);
            }
        }

        //var iframeSource = 'iframe.html';
       // var iframeSource ='http://192.168.1.9:5000';

        // Create the iframe
    /*    var iframe = document.createElement('iframe');
        iframe.setAttribute('src', iframeSource);
        iframe.setAttribute('id', 'the_iframe');
        iframe.style.width = 450 + 'px';
        iframe.style.height = 200 + 'px';
        document.body.appendChild(iframe);*/

        // Send a message to the child iframe
        var iframeEl = document.getElementById('the_iframe'),
            messageButton = document.getElementById('message_button');
           


        // Send a message to the child iframe
        var sendMessage = function(msg) {
            // Make sure you are sending a string, and to stringify JSON
            iframeEl.contentWindow.postMessage(msg, '*');
            
        };

        // Send random messge data on every button click
        bindEvent(messageButton, 'click', function (e) {
            
            var random = $('#m').val();
            sendMessage('' + random);
            $('#messages').append($('<p>'));
            $('#messages').append('<img src="<?php if ($this->users_model->get_by_username( $key -> friends_name)[0]->avt!= null){
                        echo base_url().$this->users_model->get_by_username( $key -> friends_name)[0]->avt; }?>" height="64px" width="64px">');
              // $('#messages').append('<img class="img-responsive"  src="<?php if ($this->users_model->get_by_username( $key -> friends_name)[0]->avt!= null){
            //            echo base_url().$this->users_model->get_by_username( $key -> friends_name)[0]->avt; }?>" alt="">');
                        
                     
            $('#messages').append($('<li>').text(random));
            $('#messages').append($('</li>')); 
            $('#messages').append($('</p>'));
            
            $('#m').val('');


        });

        // Listen to message from child window
        bindEvent(window, 'message', function (e) {
         $('#messages').append($('<div class="info col-sm-12">'));
            $('#messages').append($('<li class="pull-right receivedmess">').text(e.data));
            $('#messages').append($('</li>')); 
         $('#messages').append($('</div>'));
         $('#messages').append($('<br>'));
        });
    </script>
       </div>
    <?php
   }
}
?>

