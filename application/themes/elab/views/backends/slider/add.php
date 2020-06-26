<!--<div class="container">-->
   
        <form class="form-login" method="POST" action="<?php echo base_url().'admin/top_slider/add';?>" enctype="multipart/form-data">
              <div class="row col-sm-12" id="avt_test">
                  <div class="col-sm-2 info">
                     <label>
                        <h2 class="test">Picture</h2>
                     </label>
                  </div>
                  <div class="info col-sm-10" >  
                     <input type="file" class="test col-sm-12 form-data" name="pic" id="pic">
                  </div>   
              </div>
             	<div class="row col-sm-12">
            		  <div class="col-sm-2 info from-control">             		 	
             		 	<label>
             		     <h2 class="test" >Link</h2>
             		   </label>
             		  </div>         
                  <div class="info">    		  
             		   <input type="text" class="col-sm-10 test" name="link">
                  </div>
             		  
             	</div>
              <div class="row col-sm-12">
                  <div class="col-sm-2 info from-control">                  
                  <label>
                     <h2 class="test" >Status</h2>
                   </label>
                  </div>         
                  <div class="info">          
                   <input type="text" class="col-sm-2 test" name="status">
                  </div>
                  
              </div>
              <div class="row col-sm-2 col-sm-offset-1">
                  <button type="submit" class="btn btn-primary">Add</button>
                  
              </div>
          
          
        </form>
 
<style>
           .info{
            /*border: 1px solid ;*/
            height: 50px;
            position: relative;
           }
           .test{            
              margin: 0;
              position: absolute;               /* 2 */
              top: 50%;                         /* 3 */
              transform: translate(0, -50%);
           }
           #avt_test input{
            padding-left: 0px;
            margin-left: -15px;
           }
   </style>
