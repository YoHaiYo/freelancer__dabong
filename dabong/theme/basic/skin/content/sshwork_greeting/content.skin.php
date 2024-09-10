<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
      <div class="d-flex justify-content-center">
        <div class="orange-bar"></div>
      </div>
      <h1><?php echo $g5['title']; ?></h1>

    <div id="ctt_con" class='container pb-5'>
        <div class='d-lg-flex justify-content-between'>
          <!-- 좌 -->
          <img src="/dabong/theme/basic/img/CK_cm080699928 1.png" height="540" weight="500" alt="" class='d-block'>
          <div class='spliter d-none d-lg-block'></div>
          <!-- 우 -->
          <div>
            <div class="main-text">
              <img src="/dabong/theme/basic/img/logo_init 2.png" height="80" weight="80" alt="">
              <span class='dabong-text-orange'>건강</span>
              <span class=''>하고, </span>
              <span class='dabong-text-orange'>안전</span>
              <span class=''>하고,</span>
              <span class='dabong-text-orange'>편리</span>
              <span class=''>한 삶.</span>
              <span class='dabong-text-orange'>다봉산업</span>
              <span class=''>이 추구하는 가치입니다.</span>
            </div>
            <!-- 내용 -->
            <div class="content-text">
              <?php echo $str; ?>
            </div>
          </div>
          
        </div>
    </div>

</article>
<style>
    #ctt h1 {
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    #ctt_con .main-text {
      font-size: 3rem;
      font-weight: 900;
    }
    #ctt_con .content-text {
      font-size: 1.2rem;
      color: #000;
    }
    #ctt_con .spliter {
      
    width: 3px;
    height: 500px;
    background-color: #777;
    margin: 3rem;
    }
</style>