<a class="btn btn-primary" href="<?php echo base_url().'admin/top_slider/add';?>">Add</a>
<table class="table">
   <tr>
       <th>#</th>
       <th>Picture</th>
       <th>Link</th>
       <th>Status</th>
       <th>Operation</th>
   </tr>
   <tbody>
     <?php if ($list!=null){
     	foreach ($list as $r){
     		?>
            <tr>
                <td> 
                   
                  	   <img class="img-responsive" src="<?php echo base_url().$r->avt;?>">       
                        
                </td>
                <td>
                    <?php echo $r->link; ?>
                </td>
                <td>
                    <?php echo $r->status; ?>
                </td>
                <td>
                   <div class="dropdown">
  						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Operation
  							<span class="caret"></span>
  						</button>
  						<ul class="dropdown-menu">
   							 <li><a href="<?php echo base_url().'admin/top_slider/delete?id='.$r->id; ?>">Delete</a></li>
   							 <li><a href="#">CSS</a></li>
   							 <li><a href="#">JavaScript</a></li>
  						</ul>
					</div>
                </td>
            </tr>

     		<?php
     	}
     }
     ?>
   </tbody>
</table>
<style>
  .img-responsive{
   	 width:700px;
   	 height:300px;
   }
</style>