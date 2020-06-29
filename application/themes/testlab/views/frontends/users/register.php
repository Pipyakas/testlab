<div class="container page-login">
    <div class="form-wrapper col-md-8">
        <div class="item">
            <h3><?php echo lang('msg_register'); ?></h3>
        </div>
        <form class="form-login" method="post" action="<?php echo base_url() ?>index.php/register" enctype="multipart/form-data">
            <div class="form-group">
                <label>
                    <? echo lang('msg_user_name')?></label>
                <input name="user_name" id="user_name" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label> Picture
                </label>

                <input type="file" id="avt" class="form-control" name="avt">
            </div>
            <div class="form-group">
                <!-- password -->
                <label><?php echo lang('msg_pwd'); ?></label>
                <input name="pwd" id="pwd" type="password" class="form-control" placeholder="Password">
                <?php echo form_error('pwd') ?>
            </div>
            <div class="form-group">
                <!-- password -->
                <label><?php echo lang('msg_email'); ?></label>
                <input name="email" id="email" type="email" class="form-control" placeholder="Email">

            </div>
            <div class="form-group">
                <!-- password -->
                <label><?php echo lang('msg_phone'); ?></label>
                <input name="phone" id="phone" type="phone" class="form-control" placeholder="Password">

            </div>

            <button class="btn btn-success" onclick="return check_info();" type="submit"><?php echo lang('msg_register') ?></button>

        </form>
    </div>
</div>
<script>
    function check_info() {
        if (document.getElementById("avt").files.length == 0) {
            console.log("no files selected");
            alert('Please add your picture')
            return false;
        } else {
            return true;
        }

    }
</script>