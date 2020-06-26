<?php

if(isset($order) && $order!=null){
    $total=0;
    foreach ($order as $key) {
        $this->load->model('news_model');
        $product=$this->news_model->get_by_id($key->product_id)[0];
       // print_r($product);
        $total=$total+$key->quantity * $product->price;
        ?>
        <div id="content" class="container">
         <div class="core col-md-10 col-md-offset-1">
            <div class="item-news">
                <div class="row">
                    <div id="newslist" >
                        <div class="thumb col-sm-7 col-xs-7" href="">
                            <h3><?php echo $product->title; ?></h3>
                                 
                      
                        </div>
                        <div class="info col-sm-5 col-xs-7">
                            
                                 <h3><?php echo $key->quantity; ?></h3>
                                
                                 
                            
                           
                             
                             
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>   
        
   <style type="text/css">
   #newslist .thumb{
        height: 150px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
   }
   .item-news{
        border-bottom: 1px solid #bebebe;
        padding-bottom: 10px;
        margin-bottom: 10px;
   }
   @media (min-width: 767px) {
        #newslist .thumb img{
            width: auto;
            height: 150px;
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

    };
 echo "Tong tien: ".$total;
}



?>

   
        
   


