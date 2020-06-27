<div style="margin-top:20px;">

    <div id="content" class="container">
        <div class="core col-md-12">
            <!-- <div class="item-news col-md-12">-->
            <div class="row col-md-12">
                <?php
                if (isset($news) && $news != null) {
                    foreach ($news as $key) {
                        $this->load->model('users_model');
                        $author = $this->users_model->get_by_user_id($key->user_id);
                ?>
                        <div class="item-news col-md-6">
                            <div id="newslist col-md-12">
                                <a class="thumb col-md-6" href="">
                                    <img class="img-responsive" src="<?php if ($key->avt != null) {
                                                                            echo base_url() . $key->avt;
                                                                        } ?>" alt="">
                                </a>
                                <div class="info col-md-6">
                                    <a href="<?php echo base_url() . 'index.php/bai-viet?id=' . $key->id; ?>">
                                        <h3><?php echo $key->title; ?></h3>
                                        <p class="date">bài viết lúc <?php echo $key->created_at; ?>, <span class="glyphicon glyphicon-eye-open"></span>:<?php echo $key->views; ?>
                                        </p>
                                    </a>
                                    <a href="<?php echo base_url() . 'index.php/classroom-page?id=' . $author[0]->id; ?>" class="btn btn-success" onclick="return check_login();">
                                        by <?php echo $author[0]->user_name; ?>
                                    </a>
                                    <a href="<?php echo base_url() . 'index.php/bai-viet?id=' . $key->id; ?>" class="btn btn-primary">
                                        Đọc tiếp
                                    </a>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        if ($_SESSION['user'][0]->id == $key->user_id) { ?>
                                            <a href="<?php echo base_url() . 'index.php/sua-bai-viet?id=' . $key->id; ?>" class="fa fa-edit"></a>
                                            <a href="<?php echo base_url() . 'index.php/xoa?id=' . $key->id; ?>" class="fa fa-trash-o"></a>
                                    <?php
                                        };
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                <?php
                }
                ?>
            </div>
            <!--</div>-->
        </div>
    </div>

    <div class="container ">
        <div class="col-md-10 col-md-offset-1">
            <?php
            if (isset($page_link)) {
                echo $page_link;
            };
            ?>
        </div>
    </div>
    <style type="text/css">
        .item-news {
            height: 160px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #bebebe;
        }

        h3 {
            font-size: 22px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .img-responsive {
            height: 130px;
            width: 100%;
            object-fit: cover;
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
</div>