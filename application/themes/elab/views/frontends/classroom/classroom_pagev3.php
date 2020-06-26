
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
		<div class="col-md-6">
			<ul class="pull-right col-xs-12 ">

				<li class="col-xs-4"><a href="<?php echo base_url() ?>index.php/gioi-thieu?id=<?php  ?>">Introduction</a></li>
        <li class="col-xs-4"><a href="<?php echo base_url() ?>index.php/web-class?id=<?php echo $owner_id;  ?>">Web class</a></li>
         <li class="col-xs-4"><a href="<?php echo base_url() ?>index.php/question-answer?id=<?php echo $owner_id;  ?>">Q & A</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="content" class="store-page">
	<div class="container">
		
		<div class="core col-md-10">
			<div class="row">

				<div class="right-sidebar col-sm-4 col-md-4 pull-right">
					<h1>Live demo code</h1>
					<div class="wrapper">
						<!-- Livecodes -->
						   	<?php
    						   if (1){
   									 foreach ($livecodes as $object) {
        
    						 ?>
       
      									 <div id="livecode">
         
       										 <form class="form-horizontal col-sm-12" id="form" name="form" method="post" action="<?php echo base_url();?>index.php/elab/friends/edit_apply" enctype="multipart/form-data">
       											 
       											 <input type="hidden" name="id" id="id" value="<?php echo $object->id; ?>"/>
       											 <fieldset>
           
        											  <div class="form-group">
           												 <div class="col-sm-12">
           												    <textarea class="form-control" name="livecodes" id="livecodes" placeholder="please type codes here then click run to see the result" style="width:100%;height:150px;"><?php echo $object->codes; ?></textarea>
           												 </div>	
           											</div>	
       											    <div class="form-group ">
           												 <div class="col-sm-6">
           													  <label class="control-label">Result</label>
      												     </div>    
      												     <div class="col-sm-6">
               												 <button type="submit" class="btn btn-success"><?php echo lang('msg_run');?></button>
            											 </div>         											 
         											</div>
                                                    <div class="form-group ">
           												 <div class="col-sm-12">
                                                             <?php echo $object->codes; ?>
          												 </div>
         											</div>
     											    
       											 </fieldset>
       										 </form>
       									   </div>
                                     <?php
   										 }
										}
									?>
						<!-- Het livecode -->
			
					</div>
				</div>

				<div class="main-content col-sm-4 col-md-4">
				   <div class="form-group">
                      <div class="form-wraper" style="text-align: center">
           				<h1>Lessons</h1>
          			  </div>
               											
     				</div>
				   <div class="inner-content">
				   	 
				   </div>
				</div>
				<div id="webRTC" class="col-sm-4">
       			   <iframe id="the_iframe" style="display: none;" src="http://192.168.1.9:5000#<?php echo $_SESSION['user'][0]->id; ?>;" width="100%" height="250px" frameborder="0">
       			   </iframe>
         		   <div class="flex-chat">
         				 <ul  id="messages"></ul>
        				 <div id="messageinput">
           					<input id="m"/>
         					<button id="message_button"class="btn btn-success">Send</button>
         				 </div>
      			  </div>

     			 </div>

			</div>
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

      
        // Send a message to the child iframe
        var iframeEl = document.getElementById('the_iframe'),
            messageButton = document.getElementById('message_button');
            


        // Send a message to the child iframe
        var sendMessage = function(msg) {
            // Make sure you are sending a string, and to stringify JSON
            iframeEl.contentWindow.postMessage(msg, '*');
            
        };
        //sendMessage('elabroom'+<?php echo $_SESSION['user'][0]->id; ?>);

        // Send random messge data on every button click
        bindEvent(messageButton, 'click', function (e) {
            
            var random = $('#m').val();
            sendMessage('<div class="row col-sm-12"><div class="chat-user col-sm-2 pull-right"><img src="<?php if ($_SESSION['user'][0]->avt!= null){
                        echo base_url().$_SESSION['user'][0]->avt; }
                        ?>"/></div><div class="info pull-right chat-message">' + random+'</div></div>');
           
            $('#messages').append('<div class="row col-sm-12"><div class="chat-user col-sm-2"><img src="<?php if ($_SESSION['user'][0]->avt!= null){
                        echo base_url().$_SESSION['user'][0]->avt; }
                        ?>"/></div><div class="info chat-message">'+random+'</div></div>');                                          
            
            $('#m').val('');


        });

        // Listen to message from child window
        bindEvent(window, 'message', function (e) {
        
        $('#messages').append(e.data);
       
        });
    </script>

<script type="text/javascript">
	$(document).ready(function() {
		first=0;
		is_loading=true;
		type_id='';

		function load_products(more){
			$.ajax({
				method:'GET',
  				url: '<?php echo base_url() ?>index.php/elab/products/load_news_by_user_id',
  			       
  				data:{
  					//first:first,
  					user_id:<?php if(isset($owner_id)){echo $owner_id; }else{echo '""';}?>
  				//	type_id:type_id
  				},
  				beforeSend:function(){
  					$('.loading').show();
  				},
  				success:function(data){
  					$('.loading').hide();
  					if(data.trim()==''){
  						is_loading=false;
  				    }else{
  					  if(!more){
  					    $('.inner-content').html(data);
  				      }else{ 
  					    $('.inner-content').append(data);
  				      }
  				    }
  				}
			})
		}

		//0 is not sugget
		//1 is sugget
        load_products(false);


        $(window).scroll(function() {
   		    if($(window).scrollTop() + window.innerHeight == $(document).height() && is_loading) {
             first+=10;
             load_products(true);
           }
		});

		$('.btn-categories').click(function(){
			first=0;
			$('.inner-content').html('');
			type_id=$(this).attr('type-id');
		    load_products(false);
		})
	});

</script>

