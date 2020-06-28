<?php
/*
if(isset($news) && $news!=null){
    foreach ($news as $key) {
   //     $this->load->model('users_model');
    //    $author=$this->users_model->get_by_user_id($key->user_id);
        print_r($key);*/
?>

<div>xin chao
    <!--      <div id="content" class="container">
         <div class="core col-md-10 col-md-offset-1">
            <div class="item-news">
                <div class="row">
                    <div id="newslist" >
                        <a class="thumb col-sm-7 col-sx-12" href="">
                             <img class="img-responsive" src="<?php if ($key->avt != null) {
                                                                    echo base_url() . $key->avt;
                                                                } ?>" alt="">
                      
                        </a>
                        <div class="info col-sm-5 col-xs-12">
                            <a href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                                 <h3><?php echo $key->title; ?></h3>
                                 <p class="date">bài viết lúc <?php echo $key->created_at; ?></p>
                                 
                            
                             </a>
                             <a href="<?php echo base_url() . 'index.php/classroom?id=' . $author[0]->id; ?>">
                                 <p> by <?php echo $author[0]->user_name; ?></p>
                             </a>
                             <a class="btn" href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                               Đọc tiếp
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
     </div> -->
</div>

<style type="text/css">
    #newslist .thumb {
        height: 150px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .item-news {
        border-bottom: 1px solid #bebebe;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    @media (min-width: 767px) {
        #newslist .thumb img {
            width: auto;
            height: 150px;
            overflow: hidden;
            min-width: 100%;
            height: 100%;
        }
    }

    #newslist .thumb .img-responsive img {
        width: auto;
        height: 150px;
        overflow: hidden;
        min-width: 100%;
        height: 100%;
    }
</style>


<?php
/*    };

}*/



?>