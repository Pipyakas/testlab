<div id="content" class="container">
    <div class="core col-md-10 col-md-offset-1">

        <?php foreach ($news as $key) { ?>
            <div class="itemnews">
                <div class="row">
                    <a class="thumb col-sm-5" href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                        <img src="<?php if ($key->avt != null) {
                                        echo base_url() . $key->avt;
                                    } else {
                                        echo base_url() . 'statics/images/logo.png';
                                    } ?>" alt="">
                    </a>
                    <div class="info col-sm-7">
                        <a href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                            <h3><?php echo $key->title; ?></h3>
                            <p class="date">bài viết lúc <?php echo $key->created_at; ?></p>

                        </a>

                        <a class="btn" href="<?php echo base_url() . 'index.php/news?id=' . $key->id; ?>">
                            Đọc tiếp
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<style type="text/css">
    .container .core {
        margin-top: 40px;
        margin-bottom: 100px;
    }

    .itemnews {
        overflow: auto;
        padding-bottom: 30px;
        margin-bottom: 40px;
        border-bottom: 1px solid #bebebe;
        overflow: hidden;
    }

    .itemnews:last-child {
        border: none;
    }

    .itemnews .action a {
        color: #212121;
        font-size: 16px;
        margin-top: 20px;
        margin-right: 10px;
    }

    .itemnews:hover h3 {
        color: #e13364;
    }

    .itemnews .thumb {
        height: 300px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .itemnews .thumb img {
        width: auto;
        min-width: 100%;
        height: 100%;
    }

    .itemnews h3 {
        color: #212121;
        font-weight: bold;
    }

    .itemnews .date {
        font-weight: bold;
        color: #757575;
        font-size: 12px;
    }

    .itemnews .date-updated {
        margin-left: 25px;
        position: relative;
    }

    .itemnews .date-updated:after {
        content: "";
        position: absolute;
        height: 1px;
        width: 20px;
        background: #757575;
        right: calc(100% + 5px);
        top: 50%;
    }

    .itemnews .description {
        margin-top: 10px;
        height: 60px;
        overflow: hidden;
    }

    .itemnews .btn {
        color: #212121;
        padding-left: 0;
        font-weight: bold;
        font-size: 12px;
        margin-top: 10px;
        display: inline-block;
        text-transform: uppercase;
    }

    .itemnews .btn:hover {
        color: #bebebe;
    }

    #content.container {
        background: #ffffff;
        padding-bottom: 100px;
        min-height: 1000px;
    }
</style>