<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 600;
$thumb_height = 839;
$title_parts = explode('|', $bo_subject);

?>
<div class="<?php echo $bo_table; ?> ">


      <div class="maxwidth py-lg-4 py-3 text-center container"> 
        <h2 class="mb-3 mb-lg-4 font60 fw700"><?php echo trim($title_parts[0]); ?></h2>
        <p class="lead mb-0 font26 fw500 position-relative mx-4 mx-lg-0">
         <span class='d-block'> <?php echo trim($title_parts[1]); ?></span>

        <a href="/bomi/bbs/board.php?bo_table=review"  class="morebtn col-1 d-lg-none  d-flex mx-auto mt-4">자세히보기</a>
        <a href="/bomi/bbs/board.php?bo_table=review"  class="morebtn  d-none d-lg-block position-absolute end-0 bottom-0">자세히보기</a>
        </p>     
      </div>    
     

      
        <div class="swiper <?php echo $bo_table; ?>  pb-lg-5 pb-4 mt-lg-5 mt-4 mb-3">
            <div class="swiper-wrapper">

              <?php
              for ($i= 0 ; $i < count($list); $i++) {
             
              ?>

              <div class="swiper-slide   " style="max-width:280px;min-width:250px">
              
                  <div class="text-center  py-5  border " >	
                    <img src="/bomi/2024/hd/naver_reviewicon.jpg"  alt="네이버예약" title="">	  
                  <?php

                   
                    
                    echo "<p class='fw600 font19 mt-4 d-flex justify-content-center align-items-center'> ".$list[$i]['wr_name']."<span class='font14 mx-1'>|</span>".$list[$i]['subject']."</p>";
                    echo "<div class='mt-3 px-3'>
                            <p class='mb-0  keepall ' style='height:4rem'>".utf8_strcut($list[$i]['wr_content'], 46, '...')."</p>
                            <p class='mb-0 mt-3 font22 fw500'>".$list[$i]['wr_1']."</p>
                        </div>";
                  ?>
                  </div>
                    
                </div>
              <?php }?>
              
            </div>
           <div class="maxwidth mx-auto px-4 px-lg-0">
           <div class="swiper-pagination position-unset mt-5 "></div>
           </div>

            
        </div>
      </div>

</div>

<script>


const swiper<?php echo $bo_table; ?> = new Swiper('.swiper.<?php echo $bo_table; ?>', {
  // Optional parameters
  loop:true,
  // autoplay: {
  //   delay: 3000,
  // },
  centeredSlides: true,
  
  slidesPerView: 'auto',
  spaceBetween: 15,
  // If we need pagination
  pagination: {
    el: '.<?php echo $bo_table; ?> .swiper-pagination',
    type: "progressbar",
  },
  loopedSlides: 3,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 768px
    768: {
    
      spaceBetween: 35
    },
    
   
    
  },
  
});





</script>


