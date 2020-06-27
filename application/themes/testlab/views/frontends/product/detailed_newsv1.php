<div id="content" class="container">
    <div class="core col-md-10 col-md-offset-1">
      <form method="post" action="<?php echo base_url()?>index.php/don-hang">
        <div class="post">
            <img src="<?php echo base_url().$object->avt; ?>" alt="">
            <h3><?php echo $object->title; ?></h3>
            <p class="date">bài viết lúc <?php echo $object->created_at; ?></p>
            <p class="description"><?php echo $object->content; ?></p>
            <p class="description"><?php echo $object->quantity; ?></p>
            <input name="order_quantity" id="order_quantity" placeholder="the number of order">
            <button class="success" type="submit">Mua Ngay</button>
        </div>
      </form>

    </div>
</div>

<style type="text/css">
    
    .post img{
        width: 100%;
    }
    .post h3{
        color: #212121;
        font-weight: bold;
    }
    .post .date{
        font-weight: bold;
        color: #757575;
        font-size: 12px;
    }
    .post .description{
        line-height: 26px;
    }
</style>