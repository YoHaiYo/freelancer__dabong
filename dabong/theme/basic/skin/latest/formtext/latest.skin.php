<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>


<div class="text-start <?php echo $bo_table;?> text-white">
    
    <div class="p-0 font32 my-lg-5 my-3">
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <div class="mb-0 p-0 fw200" >
            <?php          
               $subject_parts = explode("|", $list[$i]['subject']);
               // 첫 번째 부분을 h2 태그에, 두 번째 부분을 p 태그에 넣기
               echo '<p class="font35 mb-0 fw400"><span class="font35">' . $subject_parts[0] . '</span></p>';
               echo '<h2 class="font80 fw100 mb-lg-4 mb-3">' . $subject_parts[1] . '</h2>';
              
                ?>
            
            <?php          
                echo $list[$i]['wr_content'];
    
                echo "<p class='font26 mb-4 mb-lg-0 mt-lg-5 mt-4 fw300'>".$list[$i]['wr_2']."</p>";
            ?>
        </div>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <p >게시물이 없습니다.</p>
    <?php }  ?>
    </div>
	
</div>
