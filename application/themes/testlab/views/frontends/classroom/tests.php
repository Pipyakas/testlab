 <?php
  if ($owner_id == $_SESSION['user'][0]->id) {
  ?>
   <div class="container">
     <div class="row">
       <div class="container">
         <a class="btn btn-success" style="float:left; margin-top:10px;" 
            href="<?php echo base_url(); ?>index.php/testlab/classrooms/add_test?id=<?php echo $owner_id; ?>">Add Test</a>
       </div>
     </div>
     <?php
    };
    if (isset($test_topic)) {
      foreach ($test_topic as $key) {
        # code...
      ?>
       <div class="row ">
         <div class="topic">
           <div class="container">
             <div class="img_topic col-sm-2 col-xs-12">
               <img class="" src="<?php echo base_url(); echo $key->avt; ?>">
             </div>
             <div class="col-sm-6 col-xs-12 info">
               <a href="<?php echo base_url() ?>index.php/test-topic?id=<?php echo $key->id; ?>&owner_id=<?php echo $owner_id; ?>" />
               <h3><?php echo $key->test_topic; ?></h3>
             </div>
             <div class="col-sm-2 col-xs-12 edit">
               <h3>
                 <?php
                  if (isset($_SESSION['user'])) {
                    if ($_SESSION['user'][0]->id == $owner_id) { ?>
                     <a href="<?php echo base_url() . 'index.php/edit-test?id=' . $key->id; ?>" class="fa fa-edit"></a>
                     <a href="<?php echo base_url() . 'index.php/delete-test?id=' . $key->id; ?>" class="fa fa-trash-o"></a>
                 <?php
                    };
                  };
                  ?>
               </h3>
             </div>
           </div>
         </div>
       </div>
     <?php
      }; //end of foreach $test_topic
      ?>
   </div>

   <style>
     .edit {}

     .topic .container {
       padding: 0px;
       margin: 0px auto;
       /* the topic bao ngoai the container, va margin-top margin-bottom=0
         margin-left=margin-right=auto de can giua*/

       border-bottom: 1px solid #bebebe;
       box-sizing: border-box;
     }

     .img_topic {
       margin-top: 10px;
       margin-bottom: 10px;
       margin-left: 0px;
       margin-right: 0px;
       padding: 0px;
     }

     .img_topic img {
       height: 40px;
       width: 100%;
       display: block;
       padding: 0px;
       margin: 0px;
     }
   </style>
 <?php
    }

  ?>