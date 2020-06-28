<div class="container" >
 <div class="w3-content w3-section" style="max-width:100%; height: 300px; margin-top:0px;padding-top: 0px">
   <?php 
     if ($slide!=null){

    foreach ($slide as $r ) {
      # code...
      ?>
       <a href="<?php echo $r->link; ?>">
        <img class="slider w3-animate-left img-responsive" src="<?php echo base_url().$r->avt;?>">
      </a>
      
          <?php
    }
   }
    ?>
    
  </div>
 <div class="form-wraper col-sm-12" style="background-color: #fff; margin-top:10px" >
 
  <p>

     <h3>
     Hệ thống dữ liệu gồm các bài giảng, mỗi bài hướng đến một chủ đề riêng rẽ nhưng đều sử dụng chung một nền tảng để giúp người học có thể tích hợp các kỹ thuật trong các bài giảng này lại thành các dự án phức tạp hơn.
     </h3>
     <h3>
     Các bài giảng là các ứng dụng đơn giản nhất giúp người học có thể hiểu và tự nắm bắt được một cách nhanh nhất từ đó có thể xây dựng các ứng dụng quy mô lớn hơn. Để thành thạo một kỹ năng và trở thành chuyên gia về công nghệ cần khoảng hai năm hoặc 10 nghìn giờ làm việc nghiêm túc trong một lĩnh vực hẹp. Kinh nghiệm thường chỉ có được trong quá trình vượt qua các vấn đề kỹ thuật để đến được mục tiêu. Vì vậy mục đích trang web nhằm giới thiệu với các bạn sinh viên các công nghệ và kỹ năng cần thiết trong lĩnh vực CNTT sẽ được đòi hỏi trong môi trường làm việc sau này. Giúp các bạn định hướng tốt hơn trong việc lựa chọn và thu nhận kiến thức.   
     </h3>
   </p>
   
 </div>
</div>
<style>
  .img-responsive{
  	width: 100%;
  	height: 300px;
  }

  .slider {display:none}
  
  
</style>
<script type="text/javascript">
 var myIndex = 0;
 carousel();

 function carousel() {
  var i;
  var x = document.getElementsByClassName("slider");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000);    

  }
 
</script>