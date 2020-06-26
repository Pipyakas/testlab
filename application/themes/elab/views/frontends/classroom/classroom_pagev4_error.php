
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
	

				<div class="main-content col-sm-6 col-md-6">
				   <div class="form-group">
                <div class="form-wraper" style="text-align: center">
           				<h1>Lessons</h1>
          		  </div>
               											
     				</div>
				   <div class="inner-content">
				   	 
				   </div>
				</div>
				<div id="webRTC" class="col-sm-6">
       			   <iframe id="the_iframe" style="display: none;" src="http://192.168.1.9:5000#<?php echo $_SESSION['user'][0]->id; ?>;" width="100%" height="250px" frameborder="0">
       			   </iframe>
               <div class="flex-chat">
         				 <ul  id="comment"></ul>
        				 <div id="comment_input">
           					<input id="m"/>
         					<button id="comment_button"class="btn btn-success">Send</button>
         				 </div>
      			  </div>

     		 </div>

			</div>
		</div>
	</div>
</div>
 <style>
 #comment {background:#ddd;
          list-style-type:none;
          padding:0;
          margin:0;
          height:200px;
          overflow:auto;
          border:1px solid #BDBDBD;

         }
   #comment_input {
      width:100%;
      padding:0px;
      margin: 0px;
      height:20px;
         
     }
   #comment_input input {
            width:80%;
            height: 20px;
            border:0;
            padding:0px;
            overflow:auto;
            margin:0px;
           
            
}
#comment_input button {
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
   #comment li{ padding:5px 10px;
    }
   .receivedmess{
      border: 1px lightgray solid;
      background-color: white;
    }
   #comment li:nth-child(odd){/*background:lightgray;*/}  
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

     //het ham load_product
     function load_comments(more){
      $.ajax({
        method:'GET',
          url: '<?php echo base_url() ?>index.php/elab/comments/load_comments_by_user_id',
               
          data:{
            //first:first,
            user_id:<?php if(isset($owner_id)){echo $owner_id; }else{echo '""';}?>
          //  type_id:type_id
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
                $('.inner-comment').html(data);
                }else{ 
                $('.inner-comment').append(data);
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

