<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 2103;
$thumb_height = 955;

// 파일 데이터 경로
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;


?>
<div class="swiper <?php echo $bo_table; ?>">
<div class="swiper-wrapper">

	<?php
   $bg_img = array();
	for ($i=count($list) - 1 ; $i >= 0; $i--) {
	$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
    //$list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);
    $file_count = count($list[$i]['file']);
   //
    $bg_img[$i] = array();
	if($thumb['src']) {

    // for ($j = 0; $j < $file_count - 1; $j++) {
    //   $bg_img[$i][] = G5_DATA_URL.'/file/'.$bo_table.'/'.$list[$i]['file'][$j]['file'];
    // }
		$img = $thumb['ori'];
	} else {
		$img = G5_IMG_URL.'/no_img.png';
		$thumb['alt'] = '이미지가 없습니다.';
	}
	$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="card-img-top">';

	?>
  <style>
    /* .swiper-slide<?php echo $i; ?> > div{
        background-image: url(<?php //echo $bg_img[$i][0]; ?>)
    }
    
      @media (max-width:991px) {
        .swiper-slide<?php echo $i; ?> > div{
          background-image: url(<?php //echo $bg_img[$i][1]; ?>);
          background-position: center -10vw !important;
      }
    }
    @media (max-width:620px) {
      .swiper-slide<?php echo $i; ?> > div{
        background-image: url(<?php //echo $bg_img[$i][1]; ?>);
        background-position: center -8vw !important;
    }      
    } */

  </style>

	<div class="swiper-slide swiper-slide<?php echo $i; ?>">
		  <div class="position-relative " style="background-image:url(<?php echo $img; ?>)">			  
      <?php
    // 주어진 문자열

    $subject = $list[$i]['wr_subject'];
    
    // | 기호를 기준으로 문자열을 분할
    $values = explode('|', $subject);
    
    // 첫 번째 값에 대해 br 태그가 있으면 각 줄을 span 태그로 묶어줌
    if (isset($values[0])) {
        // br 태그를 기준으로 분할하여 각 줄을 배열로 만듦
        $lines = explode("<br>", $values[0]);
        
        // 각 줄에 대해 span 태그로 둘러싸기
        $content = "";
        foreach ($lines as $line) {
            $content .= "<span class='d-block'>{$line}</span>";
        }
        
        // 새로운 값을 설정
        $values[0] = $content;
    }

    // 분할된 값의 개수에 따라 다른 HTML 태그를 생성
    if (count($values) == 1) {
        $h2Tag = "<h2 class='activeColor font95 fw600 text-center mb-0'>{$values[0]}</h2>";
        $strongTag = "";
        $pTag = "";
    } else {
        $strongTag = isset($values[0]) ? "<strong class='activeColordark font40'>{$values[0]}</strong>" : "";
        $h2Tag = isset($values[1]) ? "<h2 class='activeColor  font95 fw600 text-center'>{$values[1]}</h2>" : "";
        $pTag = isset($values[2]) ? "<p class='font35 fw600 text-dark'>{$values[2]}</p>" : "";
    }
?>

<div class='mainswiper_title position-absolute container-xl start-0 top-0 bottom-0 end-0  d-flex flex-column align-items-center justify-content-center '>
    <a href="<?php echo $list[$i][wr_link1]; ?>" class='text-center text-decoration-none d-block pt-5'><?php echo $strongTag; ?>
    <?php echo $h2Tag; ?>
    <?php echo $pTag; ?></a>
</div>


          </div>
    </div>
	<?php }?>
	
</div>
<div class="swiper-pagination"></div>
</div>
<script>
  var headerTag = document.querySelector('nav.navbar'); // Selecting header tag
  const headerTagocls = headerTag.classList; // 상단클래스수집해두기
  var activeSlideIndex = 0;

	const swiper<?php echo $bo_table; ?> = new Swiper('.swiper.<?php echo $bo_table; ?>', {
  // Optional parameters


  loop: true,
  // autoplay: {
  //  delay: 8000,
  //  disableOnInteraction: false,
  // },
  // watchOverflow: true,
  // effect : 'fade',
  // touchEventsTarget: 'wrapper',  

 
  // If we need pagination
  pagination: {
    el: '.<?php echo $bo_table; ?> .swiper-pagination',
    clickable: true,
  },




  on: {
   
  
    slideChange: function () {
          activeSlideIndex = this.realIndex + 1; // Swiper index starts from 0, so adding 1 to get actual slide number
          headerTagcls = headerTag.classList;
          // console.log(this.realIndex, this.activeIndex, activeSlideIndex );

      if (window.scrollY <  ( window.innerHeight / 50 ) ) { //  스와이퍼가 체인지될때 상단에 클래스삽입해서 배경과 어울리는 상단 처리
        
          Array.from(headerTagcls)
          .filter(className => className.startsWith('active-slide-<?php echo $bo_table; ?>-'))
          .forEach(className => headerTag.classList.remove(className));   // 줬던 이전의 클래스 삭제하고      
          // Add new active slide class
          headerTag.classList.add('active-slide-<?php echo $bo_table; ?>-' + activeSlideIndex); // 새로운 클래스 주기
      var    lastheadertagcls = headerTag.classList;
      }else{
         // 스크롤이 아래로 내려가면 
         if(lastheadertagcls){
          headerTag.classList = lastheadertagcls
         }else{
          headerTag.classList = headerTagocls; 
         }
         
      }

    },
  },

});



</script>


