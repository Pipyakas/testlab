<div id="menu">
  <nav class="navbar navbar-fixed-top">
    <div id="menu_logo" class="form-wrapper col-sm-12 ">
      <img class="img-responsive item col-sm-12 col-xs-12" src="<?php echo base_url() . 'statics/images/logo.jpg'; ?>"> <!-- ảnh logo chiếm bề rộng 6 cột-->
    </div>

    <div id="menu_bar" class="row col-sm-12">
      <div class="container">
        <button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse col-sm-6 col-xs-6" aria-expanded="false" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a class="navbar-brand" href="<?php echo base_url() ?>index.php/homepage">Home</a></li>
            <li class="active"><a class="navbar-brand" href="<?php echo base_url() ?>index.php/about">About</a></li>
            <?php if (isset($_SESSION['user'])) { ?>
              <li class="active"><a class="navbar-brand" href="<?php echo base_url() ?>index.php/test?id=<?php echo $_SESSION['user'][0]->id ?>">Test</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="navbar-brand col-sm-6 col-xs-8 outer" style="float:right">
          <form action="<?php echo base_url() . 'index.php/search' ?>" class="center col-sm-11" type="POST" enctype="multipart/form-data">
            <input type="text" class="col-sm-10 col-xs-8" name="key"></input>
          </form>
          <a href="#" class="dropdown-toggle col-sm-1 col-xs-4" style="float:right" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Admin</a>
          <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
            <?php if (isset($_SESSION['user'])) { ?>
              <li><a href="<?php echo base_url() . 'index.php/update-user' ?>" style="color:black;">Update user profile</a></li>
              <li><a href="<?php echo base_url() . 'index.php/logout' ?>" style="color:black;"><?php echo lang('msg_logout'); ?></a></li>
            <?php } else { ?>
              <li><a href="<?php echo base_url() ?>" style="color:black;"><?php echo lang('msg_login'); ?></a></li>
              <li><a href="<?php echo base_url() . 'index.php/register' ?>" style="color:black;"><?php echo lang('msg_register'); ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>

<style>
  .outer {
    height: 50px;
    position: relative;
  }

  .center {
    margin: 0;
    position: absolute;
    /* 2 */
    top: 50%;
    /* 3 */
    transform: translate(0, -50%);
  }

  .dropdown-menu {
    z-index: 25000 !important;
  }

  #menu_logo {
    padding: 0px;
    margin: 0px;
  }

  #menu_logo img {
    padding: 0px;
    margin: 0px;
  }
</style>