<?php
if (isset($_SESSION['user'])){
 if ($_SESSION['user'][0]->perm==0){
    ?>
<div class="container">

    <div class="row">
        <a href="<?php echo base_url();?>add-stock" class="btn btn-success right-pos" style="margin-top: 5px;">Add</a>
         <a href="<?php echo base_url();?>crawl-stock" class="btn btn-success" style="margin-top: 5px; float:left">Crawl</a>
    </div>
</div>
<?php 
    };
};
?>
<div style="margin-top:10px;">
<?php
if(isset($stocks) && $stocks!=null){
    foreach ($stocks as $key) {
      //  $this->load->model('users_model');
      //  $author=$this->users_model->get_by_user_id($key->user_id);
        ?>
            <div class="container">       
                <div class="row" >
                    <div class="col-xs-2">
                          
                                 <h4>Mã: <?php echo $key->symbol; ?></h4>                            
                            
                             
                    </div>
                    <div class="col-xs-2">
                          
                                 <h4>Giá: <?php echo $key->price; ?></h4>                                                            
                            
                             
                    </div>
                    <div class="col-xs-2">
                          
                                 <h4>Cổ tức: <?php echo $key->dividend; ?></h4>                                                            
                            
                             
                    </div>
                    <div class="col-xs-2">
                          
                                 <h4>Vector: <?php echo round($key->kpi,1); ?></h4>                                                          
                            
                             
                    </div>
                    <div class="col-xs-2 ">
                          
                                 <h4>Cập nhật: </h4>
                                <h6> <?php echo $key->updated_at; ?></h6>     
                            
                             
                    </div>
                    <div class="col-xs-2 info">      
                        <div >
                        <?php 
                             if (isset($_SESSION['user'])){
                                if($_SESSION['user'][0]->id == $key->user_id){?>
                                    <a href="<?php echo base_url().'index.php/update-stock?id='.$key->id; ?>" class="fa fa-edit"></a>
                                    <a href="<?php echo base_url().'index.php/delete-stock?id='.$key->id; ?>" class="fa fa-trash-o"></a>
                             <?php
                                };
                             };
                             ?>

                         </div>    
                       
                    </div>
                </div>
            </div>    
         
  
        <style>
           .info{
            height: 70px;
            display:flex;
            align-items: center;
          
           }
           .test{
            
             
            }
        </style>
  
        
    <?php
    };

}



?>
</div>
        
   


