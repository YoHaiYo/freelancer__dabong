<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;
$title_parts = explode('|', $bo_subject);
?>

<div class="<?php echo $bo_table;?>  text-center">
    
    
    <h2 class="mb-lg-4 mb-3 font60 fw700 "><?php echo trim($title_parts[0]); ?></h2>
            <p class="lead mb-0 font26 fw500">
              <?php echo trim($title_parts[1]); ?>
            </p> 
    <div class="py-lg-5 mt-lg-5 mt-4 pt-4 maxwidth mx-auto">

            
    <ul class="row mx-0   px-4 px-lg-0 mb-0">
    <?php
    for ($i=0; $i<$list_count; $i++) {
        
        $img_link_html = '';
        
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

        
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

            if($thumb['ori']) {
                $img = $thumb['ori'];
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="img-fluid">';
            $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';
           
    ?>
        <li class="col-6 col-lg-3 d-flex flex-column 
        justify-content-between beforeinsert align-items-center
        my-lg-0 mb-4 ">
            <div class="graycircle mx-4 mx-lg-5 ">
            <?php echo "<a href='".$list[$i]['wr_link1']."' class='text-decoration-none'>".$list[$i]['wr_content']."</a>"; ?>
            </div>
           
            <?php          
            echo "<h3 class='font32 fw400 mt-lg-4 mt-3 pt-3 mb-0'><a href='".$list[$i]['wr_link1']."' class='text-decoration-none'>".$list[$i]['subject']."</a></h3>";
            ?>

            
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    </div>
   
</div>
