


<style>
	.hide-button .like{
		color: #212121;
	}
	.hide-button .like.active{
		color: #e13364;
	}
	
	.detail a{
		color: #212121;
	}
	.like-stand i{
		font-size: 20px;
		color: #757575 !important;
	}
	.like-stand.active i{
		color: #e13364 !important;
	}
	.chat-user img{
  height: 20px;
  width: 20px;
  border-radius: 50%;
  margin: 0px;
  padding: 0px;
}
</style>

<div class="portfolio-user container" style="margin-top: 3px; float: none;">
	<div class="core col-md-12">
		<div class="wrapper chat-user col-md-6">
			<img src="<?php echo base_url().$this->classrooms_model->get_by_user_id($owner_id)[0]->avt; ?>" alt="">

		</div>
	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub_navbar" style="float:left">
             <span class="icon-bar" ></span>
             <span class="icon-bar" ></span>
             <span class="icon-bar"></span> 
    </button>
    <div class="col-md-6 collapse navbar-collapse" aria-expanded="false"  id="sub_navbar">
      <ul class="nav navbar-nav pull-right col-xs-12 ">

        <!-- <li class="active"><a href="<?php echo base_url() ?>index.php/gioi-thieu?id=<?php  ?>">Introduction</a></li> -->
        <li class="active"><a href="<?php echo base_url() ?>index.php/web-class?id=<?php echo $owner_id;  ?>">Web class</a></li>
         <li class="active"><a href="<?php echo base_url() ?>index.php/test?id=<?php echo $owner_id;  ?>">Test</a></li>
      </ul>
    </div>
	</div>
</div>

<div id="content" class="store-page">
	<div class="container">
		
		<div class="core col-md-12">
			<div class="row">

				<div class="right-sidebar col-xs-12 col-md-12 pull-right">
					<h1>Live demo code</h1>
					<div class="wrapper">
						<!-- Livecodes -->
						   	<?php
    						   if (1){
   									 foreach ($livecodes as $object) {
        
    						 ?>
       
      									 <div id="livecode">
         
       										 <form class="form-horizontal col-sm-12" id="form" name="form" method="post" action="<?php echo base_url();?>index.php/testlab/friends/edit_apply" target="result_frame" enctype="multipart/form-data">
       											 
       											 <input type="hidden" name="id" id="id" value="<?php echo $object->id; ?>"/>
       											 <fieldset>
           
        											  <div class="form-group" style="padding: 0px; margin: 0px">
           												 <div class="col-sm-12">
           												    <textarea class="form-control" name="livecodes" id="livecodes" placeholder="please type codes here then click run to see the result" style="width:100%;height:300px;"><?php echo $object->codes; ?></textarea>
           												 </div>	
           											</div>	
                                <div style="margin-right: 14px">
                                   <button id="message_button" type="submit" class="btn btn-success pull-right" style="height: 30px; text-align:center"><?php echo lang('msg_run');?></button>
                                </div>
       											  <!-- <div class="form-group ">
           												 <div class="col-sm-12">
                                                             <?php echo $object->codes; ?>
          												 </div>
         											</div> -->
     											    
       											 </fieldset>
       										 </form>
       									   </div>
                           <div class="col-sm-12 form-horizontal form-group">
                               <iframe name="result_frame" id="result_frame" width="100%">
                                 
<!-- <script type="text/javascript" src="<?php echo base_url().'statics/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'statics/bootstrap/js/bootstrap.min.js'?>"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/font-awesome/css/font-awesome.css'?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/vendors/flexslider/flexslider.css'?>"/>
  <script type="text/javascript" src="<?php echo base_url(); ?>statics/vendors/flexslider/jquery.flexslider-min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/main.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/jquery.validate.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/additional-methods.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>statics/js/handlebars-v1.3.0.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/css/frontend/style.css'?>" />
  
  

  
   
  <script type="text/javascript" src="<?php echo base_url().'statics/js/offrightclick.js'?>"></script>  -->
                               </iframe>
                           </div>
                                     <?php
   										 }
										}
									?>
						<!-- Het livecode -->
			
					</div>
				</div>

				
				<!-- <div id="webRTC" class="col-sm-6 col-xs-12">
               <h1>Chat room</h1>
       			   <iframe id="the_iframe" style="display: none; width="100%"; height="300px" src="http://192.168.1.20:5000#<?php echo $_SESSION['user'][0]->id; ?>;"  frameborder="0">
       			   </iframe>
         		   <div class="flex-chat" >
         				 <ul  id="messages" style="width:100%;height:300px;"></ul>
        				 <div id="messageinput">
           					<input id="m" name="m" onkeypress="return check_enter(event);" />
         					<button id="message_button"class="btn btn-success">Send</button>
         				 </div>
      			  </div>

     		</div> -->

			</div>
		</div>
	</div>
</div>
 <style>
   #messageinput {
      width:100%;
      padding:0px;
      margin: 0px;
      height:30px;
         
     }
   #messageinput input {
            width:80%;
            height: 30px;
            border:0;
            padding:0px;
            overflow:auto;
            margin:0px;
           
            
}
#messageinput button {
              width:18%; 
              height:30px;
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
        // function check_enter(e){
        //   if (e.keycode==13){
        //     document.getElementById('message_button').click();
        //     return true;
        //   }

        // }
        // // addEventListener support for IE8
        // function bindEvent(element, eventName, eventHandler) {
        //     if (element.addEventListener){
        //         element.addEventListener(eventName, eventHandler, false);
        //     } else if (element.attachEvent) {
        //         element.attachEvent('on' + eventName, eventHandler);
        //     }
        // }

      
        // // Send a message to the child iframe
        // var iframeEl = document.getElementById('the_iframe'),
        //     messageButton = document.getElementById('message_button');
            


        // // Send a message to the child iframe
        // var sendMessage = function(msg) {
        //     // Make sure you are sending a string, and to stringify JSON
        //     iframeEl.contentWindow.postMessage(msg, '*');
            
        // };
        // //sendMessage('testlabroom'+<?php echo $_SESSION['user'][0]->id; ?>);

        // // Send random messge data on every button click
        // bindEvent(messageButton, 'click', function (e) {
            
        //     var random = $('#m').val();
        //     sendMessage('<div class="row col-sm-12"><div class="chat-user col-sm-2 pull-right"><img src="<?php if ($_SESSION['user'][0]->avt!= null){
        //                 echo base_url().$_SESSION['user'][0]->avt; }
        //                 ?>"/></div><div class="info pull-right chat-message">' + random+'</div></div>');
           
        //     $('#messages').append('<div class="row col-sm-12"><div class="chat-user col-sm-2"><img src="<?php if ($_SESSION['user'][0]->avt!= null){
        //                 echo base_url().$_SESSION['user'][0]->avt; }
        //                 ?>"/></div><div class="info chat-message">'+random+'</div></div>');                                          
            
        //     $('#m').val('');


        // });

        // // Listen to message from child window
        // bindEvent(window, 'message', function (e) {
        
        // $('#messages').append(e.data);
       
        // });
        // $(document).ready(function(){
        //   // var head=$('#result_frame').find("head");
        //   // var url = "<?php echo base_url().'statics/bootstrap/css/bootstrap.min.css'?>";
        //   // $head.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));
        // })
    </script>




