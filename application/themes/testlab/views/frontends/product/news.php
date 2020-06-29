<div style="margin-top:20px;">
    <?php

    if (isset($news) && $news != null) {
        foreach ($news as $key) {
            $this->load->model('users_model');
            $author = $this->users_model->get_by_user_id($key->user_id);
    ?>
            <div id="content" class="container">
                <div class="core col-md-10 col-md-offset-1">
                    <div class="item-news">
                        <div class="row">
                            <div id="newslist">
                                <a class="thumb col-sm-7 col-xs-12" href="">
                                    <img class="img-responsive" src="<?php if ($key->avt != null) {
                                                                            echo base_url() . $key->avt;
                                                                        } ?>" alt="">
                                </a>
                                <div class="info col-sm-5 col-xs-12">
                                    <a href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                                        <h3><?php echo $key->title; ?></h3>
                                        <p class="date">at <?php echo $key->created_at; ?>, <span class="glyphicon glyphicon-eye-open"></span>:<?php echo $key->views; ?></p>
                                    </a>
                                    <a href="<?php echo base_url() . 'index.php/classroom?id=' . $author[0]->id; ?>" class="btn btn-success" onclick="return check_login();">
                                        By <?php echo $author[0]->user_name; ?>
                                    </a>
                                    <a href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>" class="btn btn-primary">
                                        See more
                                    </a>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        if ($_SESSION['user'][0]->id == $key->user_id) { ?>
                                            <a href="<?php echo base_url() . 'index.php/edit-news?id=' . $key->id; ?>" class="fa fa-edit"></a>
                                            <a href="<?php echo base_url() . 'index.php/xoa?id=' . $key->id; ?>" class="fa fa-trash-o"></a>
                                    <?php
                                        };
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style type="text/css">
                #newslist .thumb {
                    height: 150px;
                }

                .item-news {
                    border-bottom: 1px solid #bebebe;
                    padding-bottom: 10px;
                    margin-bottom: 10px;
                }

                .img-responsive {
                    height: 100%;
                    width: 100%;
                }
            </style>

            <script type="text/javascript">
                function check_login() {

                    myvar = '<?php if (isset($_SESSION['user'])) {
                                    echo $_SESSION['user'][0]->id;
                                } else {
                                    echo "";
                                };
                                ?>';
                    if (myvar == '') {
                        alert("please login to continue");
                        return false;
                    } else {


                        return true;
                    }
                };
            </script>

        <?php
        };
        ?>
        <div class="container ">
            <div class="col-md-10 col-md-offset-1">
                <?php
                if (isset($page_link)) {
                    echo $page_link;
                };
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>