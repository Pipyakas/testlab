<?php
if (isset($user)){
	//print_r($user);?>

  <div class="container">
     <div class="form-wrapper offset-sm-4">
        <form class="form-login col-sm-8" method="post" action="" enctype="multipart/form-data">
            <div class="row form-group form-wrapper">
                <h3> Cập Nhật</h3>
            </div>
            <div class="form-group">
               
                   <label>Username</label>
              
               <input class="form-control" type="username" name="user_name" value="<?php echo $user[0]->user_name; ?>">
            </div>
            <div class="form-group">
            	
              		 <label>Avatar</label>
           		
           		 <input class="form-control" type="file" name="avt">
           	</div>
            <div class="form-group">
               <label>Password</label>
              	<input class="form-control" type="password" name="pwd">
              	<label>Re-type Password</label>
          		<input class="form-control" type="password" name="pwd2">
          	</div>
            <button  class="btn btn-success " type="submit">Update</button>

        </form>
    </div>    
</div>
<?php } ?>