<?php


if (isset($messages) && $messages != null) {
   foreach ($messages as $key) {
?>
      <div id="content">
         <?php if ($key->sender_id != $_SESSION['user'][0]->id) {
         ?>
            <div class="row">
               <!--  <div class="container-fluid"> -->
               <div class="col-sm-12 col-xs-12" style="padding-right:0px;">
                  <div class="chat-user col-sm-1 col-xs-1" style="float:right; padding-right:0px;">
                     <img src="<?php if ($key->avt != null) {
                                    echo base_url() . $key->avt;
                                 } ?>" />
                  </div>
                  <div class="chat-message pull-right col-sm-9 col-xs-9" style="padding-right:0px;">
                     <div style="float:right">
                        <?php echo $key->content; ?></div>
                  </div>
                  <span class="col-xs-1">
                     <?php
                     if (isset($_SESSION['user'])) {
                        if ($_SESSION['user'][0]->id == $owner_id) { ?>
                           <a href="<?php echo base_url() . 'index.php/delete-comment?id=' . $key->id; ?>&owner_id=<?php echo $owner_id; ?>" class="fa fa-trash-o"></a>
                     <?php
                        };
                     };
                     ?>
                  </span>
               </div>
               <!--  </div> -->
            </div>
         <?php
         } else {
         ?>
            <div class="row">
               <!--   <div class="container-fluid"> -->
               <div class="col-sm-12 col-xs-12" style="padding-right:0px;">
                  <div class="chat-user col-sm-1 col-xs-1">
                     <img src="<?php if ($key->avt != null) {
                                    echo base_url() . $key->avt;
                                 } ?>" />
                  </div>
                  <div class="chat-message-left col-sm-9 col-xs-9">
                     <div style="float:left"> <?php echo $key->content; ?></div>
                  </div>
                  <span class="col-xs-1" style="float:right">
                     <?php
                     if (isset($_SESSION['user'])) {
                        if ($_SESSION['user'][0]->id == $owner_id) { ?>
                           <a href="<?php echo base_url() . 'index.php/delete-comment?id=' . $key->id; ?>&owner_id=<?php echo $owner_id; ?>" class="fa fa-trash-o"></a>
                     <?php
                        };
                     };
                     ?>
                  </span>
               </div>
               <!-- </div>  -->
            </div>
         <?php
         }
         ?>
      </div>

      <style type="text/css">
         .chat-right {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            /* padding:10px;
            margin:10px 0;*/
         }

         .chat-left {
            border: 2px solid #ccc;
            background-color: #ddd;
            border-radius: 5px;
            /*  padding:10px;
            margin:10px 0;*/
         }

         .container::after {
            /*content: "";*/
            clear: both;
            display: table;
         }

         .chat-message-left {
            padding-left: 10px;
            margin-left: 0px;
            float: left;
         }

         #content {
            /*  background:#bebebe;*/
            padding: 0px;
            margin: 0px;
         }

         #newslist .thumb {
            height: 100px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
         }

         .row {
            /*border-bottom:  1px solid #bebebe;*/
            padding-bottom: 5px;
            margin-bottom: 0px;
            padding-right: 0px;
            margin-right: 0px;
         }

         @media (min-width: 767px) {
            #newslist .thumb img {
               width: auto;
               height: 100px;
               overflow: hidden;
               min-width: 100%;
               height: 100%;
            }

            .row {
               width: auto;
               min-width: 100%;
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
?>