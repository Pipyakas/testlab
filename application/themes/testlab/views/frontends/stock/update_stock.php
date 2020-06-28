<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/jquery.validate.min.js'?>"></script>
<?php if ((isset($object))&&($object[0]->user_id==$_SESSION['user'][0]->id)){
   
   ?>
   <script>
   $(document).ready(function(){
       $('#form').validate({
          submitHandler: function () {
            pass_data=$('#form').serialize();
            $.ajax({
                   url: '<?php echo base_url();?>update-stock',
                   type: 'post',
                   //  dataType: 'json',
                   data: pass_data
            })          
          }
       });
   })
   </script>
<div class="container">
    <form class="form-horizontal" id="form" name="form" method="post" enctype="multipart-formdata">
           <div>
              <input type="hidden" name="id" value="<?php echo $object[0]->id;?>">
           </div>
   		  <div class="row form-wrapper">
   		       <div class="form-label">
   		            <h1>  Update a stock</h1>
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Symbol</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12 col-xs-12">
   		            <input type="text" name="symbol" class="form-control" value="<?php echo $object[0]->symbol;?>">
   		       </div>
   		  </div>
   		   <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Area</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="area" class="form-control" value="<?php echo $object[0]->area;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Revenue (bil)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="revenue" class="form-control" value="<?php echo $object[0]->revenue;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Short Property</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="short_pro" class="form-control" value="<?php echo $object[0]->short_pro;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Debt</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="debt" class="form-control" value="<?php echo $object[0]->debt;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Profit</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="profit" class="form-control" value="<?php echo $object[0]->profit;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Stock (mil)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="stock" class="form-control" value="<?php echo $object[0]->stock;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Dividend (%)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="dividend" class="form-control" value="<?php echo $object[0]->dividend;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Price (K)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="price" class="form-control" value="<?php echo $object[0]->price;?>">
   		       </div>
   		  </div>
   		   <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Gamma</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="beta" class="form-control" value="<?php echo $object[0]->beta;?>">
   		       </div>
   		  </div>
   		   <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Value</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="value" class="form-control" value="<?php echo $object[0]->value;?>">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
             <div class="col-sm-2 col-xs-12">
                  <label> Link</label>
             </div>
              <div class="col-sm-10 col-xs-12">
                  <input type="text" name="link" class="form-control" value="<?php echo $object[0]->link;?>">
             </div>
        </div>
   		  <div class="row form-group col-xs-12 ">
   		  		<button class="btn btn-success col-sm-offset-1" type="submit">Update</button>
   		  </div>
     </form>
</div>
<?php 
};
?>