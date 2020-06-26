<?php
if (isset($_SESSION['user'])){
 if ($_SESSION['user'][0]->perm==0){
?>
<div class="container">
    <form method="POST" action="<?php echo base_url();?>add-stock" enctype="multipart-formdata">
   		  <div class="row form-wrapper">
   		       <div class="form-label">
   		            <h1>  Add a stock</h1>
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Symbol</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12 col-xs-12">
   		            <input type="text" name="symbol" class="form-control">
   		       </div>
   		  </div>
   		   <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Area</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="area" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Revenue (bil)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="revenue" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Short Property</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="short_pro" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Debt</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="debt" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Profit</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="profit" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Stock (mil)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="stock" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Dividend (%)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="dividend" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Price (K)</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="price" class="form-control">
   		       </div>
   		  </div>
   		   <div class="row form-group col-sm-6 col-xs-12">
   		       <div class="col-sm-2 col-xs-12">
   		            <label> Gamma</label>
   		       </div>
   		        <div class="col-sm-10 col-xs-12">
   		            <input type="text" name="beta" class="form-control">
   		       </div>
   		  </div>
   		  <div class="row form-group col-sm-6 col-xs-12">
                <div class="col-sm-2 col-xs-12">
                     <label> Link</label>
                </div>
                 <div class="col-sm-10 col-xs-12">
                     <input type="text" name="link" class="form-control">
                </div>
           </div>
   		  <div class="row form-group col-xs-12 ">
   		  		<button class="btn btn-success col-sm-offset-1" type="submit">Add</button>
   		  </div>
     </form>
</div>
<?php };
};
?>