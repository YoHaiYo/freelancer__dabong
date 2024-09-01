<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 600;
$thumb_height = 839;
$title_parts = explode('|', $bo_subject);

?>
<div class="<?php echo $bo_table." latestwrapper"; ?> overflow-hidden">

      <div class="maxwidth mx-auto">
        <!-- 게시판제목출력 -->
        <h2 class="mb-lg-4 mb-3 font60 fw700 text-center text-lg-start"><?php echo trim($title_parts[0]); ?></h2>
            <p class="lead mb-0 font26 fw500 text-center text-lg-start">
              <?php echo trim($title_parts[1]); ?>
            </p>     
      </div>
     

      <div class="d-sm-flex align-items-strech position-relative start-50 people_content_box py-lg-5 py-4">
        <div class="people_ex d-flex flex-column ">
          <div class="p-4">
            <h3 class="font60 fw700 activeColor ">의 료 진</h3>
            <div class="wr_content_ea font29 col-sm-5 col-md-6 col-lg-7">
              <div>
              <img src="/bomi/2024/text/upquto.png" class="mb-3 mt-5 d-block">
              <div>
                <div class="fw500 wr_content_change">

                <?php
              
              for ($i=count($list) - 1 ; $i >= 0; $i--) {

                  $showcls = $i === count($list) - 1 ? 'show' : '';
              
                    echo "<div class='cng_msg cng_msg".$i." ".$showcls." bomi_people".$i."' >".$list[$i][wr_content]."</div>";

                }?>
                    <img src="/bomi/2024/text/downquto.png" >
                </div>
              
                </div>
              
              </div>
              <a href="/bomi/pages/people.php"  class="morebtn active d-inline-block ms-0 mb-4">자세히보기</a>
            </div>
            <div class="d-flex mt-auto">            
              <div class="swiper-button-prev peoplectlprev position-unset mt-0"></div>
              <div class="swiper-button-next peoplectlnext position-unset mt-0 ms-2"></div>
            </div>
          </div>
        </div>
        <div class="swiper <?php echo $bo_table; ?> maxwidth mx-0 p-sm-3 p-4 p-lg-5 mt-sm-5 mb-3">
            <div class="swiper-wrapper">

              <?php
              for ($i=count($list) - 1 ; $i >= 0; $i--) {
              $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

              if($thumb['src']) {
                $img = $thumb['ori'];
              } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
              }
              $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="card-img-top">';

              ?>

              <div class="swiper-slide border-white bm_people<?php echo $i+1; ?>">
                  <div class="position-relative " style="background:url('<?php echo $img; ?>') no-repeat center; 
                  background-size: cover; ">	
                  <div class="position-absolute top-0 right-0 end-0 bottom-0  d-flex flex-column justify-content-between p-3">		  
                  <?php
                  
                    echo "<p class='activeColordark fw600 d-flex align-items-center'> <span class='d-none d-md-inline'>진료과목</span> <span class='dot'></span>".$list[$i]['wr_1']."</p>";
                    echo "<div class='d-md-flex w-100 justify-content-between'>
                            <p class='mb-0 d-flex align-items-start'><span>".$list[$i]['wr_3']."</span><strong class='p_nm ms-1'>".$list[$i]['subject']."</strong></p>
                            <p class='mb-0 activeColor'>".$list[$i]['wr_2']."</p>
                        </div>";
                  ?>
                  </div>
                      </div>
                </div>
              <?php }?>
              
            </div>
            <!-- <div class="swiper-pagination position-unset"></div> -->
        </div>
      </div>

</div>

<script>

const msgpeopleArr = document.querySelectorAll('.cng_msg');
const swiper<?php echo $bo_table; ?> = new Swiper('.swiper.<?php echo $bo_table; ?>', {
  // Optional parameters
  loop:true,
  autoplay: {
    delay: 4000,
  },
  slidesPerView: 1,
  spaceBetween: 66,
  // If we need pagination
  // pagination: {
  //   el: '.<?php echo $bo_table; ?> .swiper-pagination',
  //   type: "progressbar",
  // },
  // Navigation arrows
  navigation: {
    nextEl: '.<?php echo $bo_table; ?> .swiper-button-next.peoplectlnext',
    prevEl: '.<?php echo $bo_table; ?> .swiper-button-prev.peoplectlprev',
  },
  breakpoints: {
    // when window width is >= 768px
    768: {
      slidesPerView: 1.5,
      spaceBetween: 66
    },
    991:{
      slidesPerView: 1.8,
      spaceBetween: 66
    },
    1024:{
      slidesPerView: 2.2,
      spaceBetween: 66
    },
    // when window width is >= 1744px
    1280: {
      slidesPerView: 2.5,
      spaceBetween: 66
    },
    1744: {
      slidesPerView: 3,
      spaceBetween: 66
    },
    // when window width is >= 1920px
    1920: {
      slidesPerView: 4,
      spaceBetween: 66
    }
  },
  // Callback function when slide change
  on: {
    slideChange: function () {
      var activeSlideIndex_<?php echo $bo_table; ?> = this.realIndex + 1; // Swiper index starts from 0, so adding 1 to get actual slide number
      msgpeopleArr.forEach((el, idx) => {
        if (idx !== this.realIndex) {
          el.classList.remove('show');
        } else {
          el.classList.add('show');
        }
      });
    },
  },
});




</script>


