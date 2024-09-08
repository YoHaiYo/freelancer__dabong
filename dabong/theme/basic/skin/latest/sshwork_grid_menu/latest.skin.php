<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 500;
$thumb_height = 330;
?>


<section id="grid-menu" class="container dabong-common">
      <div class="d-flex justify-content-center">
        <div class="orange-bar"></div>
      </div>

      <h2>Product</h2>
      <h3>다봉의 대표 상품을 소개합니다.</h3>

      <div class="d-flex justify-content-center mb-5">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="section-btn d-flex align-items-center">
            제품 모두 보기
         </a> 
       </div>

      <ul class="d-flex flex-wrap justify-content-center">
    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?>
        <li class="explain-item position-relative">
            <!-- 이미지 -->
            <a href="<?php echo $list[$i]['href'] ?>" class="">
                <?php echo $img_content; ?>
            </a>
            <!-- 게시글 제목 -->
            <div class="explain-text position-absolute h2">
            <?php
                echo $list[$i]['subject'];
            ?>
            </div>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    
  </section>


