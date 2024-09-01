<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 611;
$thumb_height = 280;

// 파일 데이터 경로


?>

       
      <div class="swiper-wrapper">

        <?php
        for ($i= 0; $i < count($list); $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);
        $file_count = count($list[$i]['file']); // 첨부파일개수
        
        ?>
        <div class="swiper-slide">
            <div class="position-relative d-lg-flex justify-content-center" >		
              
              <?php

                for ($j = 0; $j < 2; $j++) {
                  $img = G5_DATA_URL.'/file/'.$bo_table.'/'.$list[$i]['file'][$j]['file'];
                  $abcontent2 = $j === 0 ? 'BEFORE' : "AFTER"; // $j가 0일 때만 mb-5 클래스 추가

                  $margin_bottom = $j === 0 ? "mb-lg-5 pb-lg-5 pb-3 pe-lg-4 flex-column " : "mt-lg-5 mt-0 pb-3 pt-lg-5  ps-lg-4 flex-column flex-lg-column-reverse afterpic"; // $j가 0일 때만 mb-5 클래스 추가
                  $abcontent = $j === 0 ? 'wr_1' : "wr_2"; // $j가 0일 때만 mb-5 클래스 추가
                  
                  if ($img) {
                      // 이미지 태그 생성
                      $img_content = '<div class="col-lg-6 d-flex positon-relative '.$margin_bottom.'">
                     
                      <div class="dotline">
                      <div class="px-md-3 px-2 py-1 py-md-2 position-absolute  bg-white fw600 font22 rounded-pill '.$abcontent2.' " >'.$abcontent2.'</div>
                      <img src="'.$img.'" alt="'.$list[$i]['file'][$j]['file'].'" class="'.$position.' d-block '.$category.' baimg'.$j.' img-fluid" >
                      </div>
                      <div class="text-white font22 fw400  pt-0 pt-lg-3 pb-3 d-flex keepall justify-content-between align-items-center subject">
                      <div >'.$list[$i][$abcontent].'</div>
                      <a href='.$list[$i]['href'].' class="ms-3 d-flex align-items-center text-white " >
                          <span class="me-2 fw400 d-none" >'.$abcontent2.'</span>
                     
                      <svg class="" width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="21.2566" cy="21.8083" r="20.4617" stroke="white" stroke-dasharray="4 4"/>
<line x1="22.5" y1="14" x2="22.5" y2="30" stroke="white" stroke-width="3"/>
<line x1="30.5" y1="21.5" x2="14.5" y2="21.5" stroke="white" stroke-width="3"/>
</svg>
                      </a></div>
                      </div>';
                  } else {
                      $img_content = '<span class="'.$category.'">보미퍼스트</span>';   
                  }
                
                  echo $img_content;
                  
                }
              ?>			 
            </div>
        </div>
        <?php  }?>
        <?php if (count($list) == 0) { //게시물이 없을 때  ?>
          <div class="swiper-slide text-white text-center font32 d-flex flex-column justify-content-center align-items-center">게시물이 없습니다.</div>
        <?php }  ?>
        
      </div>
      <div class="d-flex mt-lg-auto mb-3 mb-lg-4 align-items-center">            
              <div class="swiper-button-prev peoplectlprev position-unset mt-0 whitemode"></div>
              <div class="swiper-fraction text-white position-unset whitemode mt-0 mx-2  mx-lg-4 font19 fw200 text-center"></div>
              <div class="swiper-button-next peoplectlnext position-unset mt-0  whitemode"></div>
      </div> 
      
      <div class="swiper-pagination  position-unset whitemode "></div>
    
    





