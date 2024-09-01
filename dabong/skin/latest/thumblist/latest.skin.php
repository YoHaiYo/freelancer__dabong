<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;
$title_parts = explode('|', $bo_subject);
$board = get_board_db($bo_table, true);

?>

<div class="<?php echo $bo_table;?>  text-center container-xxl  px-4">
    
    
    <h2 class="mb-4 font60 fw700 "><?php echo trim($title_parts[0]); ?></h2>
            <p class="lead mb-0 font26 fw500">
              <?php echo $board['bo_1']; ?>
            </p> 
    <div class="px-3 px-lg-0 pt-md-4">

            
    <ul class="px-0 mb-0">
    <?php
    for ($i=0; $i<$list_count; $i++) {
        
        $img_link_html = '';
        
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

        
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

            if($thumb['src']) {
                $img = $thumb['ori'];
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="img-fluid">';
            $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';
        
    ?>
        <li class="">
            <?php echo $img_link_html; ?>
            <?php
           
           // echo "<a href=\"#none\" class=\"col\"> ";
            //echo $list[$i]['subject'];

            //echo "</a>";
			
			

            ?>

            
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    </div>
   
</div>
