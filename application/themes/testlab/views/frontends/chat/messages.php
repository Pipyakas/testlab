<?php
   if (isset($messages)&& $messages!=null){
    foreach ($messages as $key) {
        ?>
         <div id="content" class="container">
          <div class="item-news">
             <div class="row col-md-10">
                 <div id="newslist" class="portfolio-user">
                 <!--
                     <a class="wrapper col-sm-2" href="">
                        <img class="img-responsive"  src="<?php if ($this->users_model->get_by_username( $key -> friends_name)[0]->avt!= null){
                        echo base_url().$this->users_model->get_by_username( $key -> friends_name)[0]->avt; }
                        ?>" alt="">
                        
                     </a>
                     -->
                     <div class="info col-sm-10">
                       <?php if ($key-> sender != $_SESSION['user'][0]-> id){
                        ?>
                        <div class="pull-right"> 
                             <a href="">
                               <h3><?php echo $key -> messages; ?>
                               </h3>
                             </a>
                        </div>
                        <?php 
                        } else{
                        ?>
                             <a href="">
                               <h3><?php echo $key -> messages; ?>
                               </h3>
                             </a>
                        <?php 
                        }
                        ?>
                     </div>

                 </div>
             </div>
        </div>
         </div>
         <style type="text/css">
         #content{
            background:#bebebe;
         }
         #newslist .thumb{
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .row{
        /*border-bottom:  1px solid #bebebe;*/
        padding-bottom: 10px;
        margin-bottom: 10px;
        }
        @media (min-width: 767px) {
        #newslist .thumb img{
            width: auto;
            height: 100px;
            overflow: hidden;
            min-width: 100%;
            height: 100%;
        }
        }
        #newslist .thumb .img-responsive img{
        width: auto;
        height: 150px;
        overflow: hidden;
        min-width: 100%;
        height: 100%;
        }
        </style>

        <?php
    }
    ?>
       <p><h1>Live demo code</h1></p>
    <?php
   }
?>

