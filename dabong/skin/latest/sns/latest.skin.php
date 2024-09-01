<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;
$title_parts = explode('|', $bo_subject);
?>

<div class="<?php echo $bo_table;?>  ">
    
    
    <h2 class="my-lg-4 mb-3 font60 fw700 "><?php echo trim($title_parts[0]); ?></h2>
            <p class="lead mb-0 font26 fw500 mb-3">
              <?php echo trim($title_parts[1]); ?>
            </p> 
    <div class="d-lg-flex  border-top border-bottom mt-lg-5">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
           
        <?php echo latest('youtube', 'youtube', 1, 100); ?>
        </div>

         
    <ul class="col-lg-6 m-lg-0 p-0 border-start mt-4 mt-lg-0 d-flex flex-column">
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
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="img-fluid thumblistimg">';
            $img_link_html = '<a href="'.$wr_href.'" class="lt_img ps-4 ps-lg-0" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';
        
    ?>
        <li class="px-3 ps-md-4 ps-lg-5 pe-md-0 d-flex py-lg-4 py-3 justify-content-between align-items-center col 
        
        <?php if($i !== 0 ) echo   " border-top"; ?>     ">
            <div>
            
            <?php
echo "<h3 class='font28 fw700 mb-3 keepall'><a href='".$list[$i]['wr_link1']."' target='_blank' class=\"col text-decoration-none\">".$list[$i]['subject']."</a></h3>";

echo "<div class='font19'><a href='".$list[$i]['wr_link1']."'";

if ($list[$i]['wr_1'] == 'y') {
    echo " target='_blank'";
}

echo " class=\"col text-decoration-none\">".$list[$i]['wr_content']."</a></div>";

echo "<p class='font14'>".$list[$i]['wr_2']."</p>";
?>
  </div>
            <?php echo $img_link_html; ?>

            
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    </div>
   
</div>
