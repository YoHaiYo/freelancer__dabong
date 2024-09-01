<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;

$title_parts = explode('|', $bo_subject);

$dnone =  $bo_table == 'implant' ? "" :"d-none";

?>

<style>
    .wr_content img{
        max-width:220px;
        border-radius:10px;
        border:1px solid #ddd;
    }
    .wr_content br{
        display:none
    }
</style>


<div class="pic_lt <?php echo $dnone; ?> all_group_board pb-5 pb-lg-5  " id="<?php echo $bo_table;?>_tabs">
    <div class="container-lg pb-lg-5 pb-3 px-4 px-lg-0">
    <!-- <h2 class="lat_title text-center">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class='text-decoration-none font26 fw300'><?php echo $title_parts[0]; ?></a>        
    </h2> -->
    <ul class="d-block p-0">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }

    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);    
    
    ?>
        <li class="d-lg-flex w-100 float-none my-5 my-lg-5 justify-content-between">
            <ul class="d-md-flex p-0 col-lg-7 text-center text-md-start">
                <?php 
                
                for ($j = 0; $j < 2; $j++) {
                    $img = G5_DATA_URL.'/file/'.$bo_table.'/'.$list[$i]['file'][$j]['file'];
                    //  $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
                    $blindinfo = $is_member ? '' : 'blindinfo';
                    $clsnm = $j === 0 ? "_before" : "_after mt-4 mt-md-0";
                    $imgarl = $j === 0 ? "시술전" : "시술후";
                    $spancls = $j === 0 ? "beforeColor" : "afterColor";
                    $clsnm2 = $j === 0 ? "beforeBorder ".$blindinfo : "afterBorder";
                    ?>

                    <li class="<?php echo $clsnm; ?> flex-fill  position-relative p-0 ">
                                <p class="<?php echo $clsnm2; ?> ">
                                    <span class="t-ex position-absolute start-0 top-0 text-white  px-3 py-2 <?php echo $spancls;?> font14"><?php echo $imgarl;?></span>
                                    <a href=<?php echo $wr_href; ?> class='text-decoration-none d-block'> 
                                        <img src="<?php echo $img; ?>" alt="<?php echo $imgarl;?>" class="w-100  d-block">
                                    </a>
                                </p>																
                                <strong class="d-block mt-2 font14 fw400">
                                    <?php echo $wr_3nm = $j === 0 ? $list[$i][wr_1] : $list[$i][wr_2]; ?>
                                </strong>
                    </li>
                    
                    
                    <?php }  ?>  
            
            </ul>
            <div class="ms-lg-4 flex-lg-grow-1">
                <h4 class="card-title d-flex align-items-center mt-4 mb-4 mb-lg-2  mt-lg-0 justify-content-center justify-content-lg-start">                   
                    <?php
                        echo "<a href=\"".$wr_href."\" class=\"bo_cate_link font19 fw500 text-decoration-none d-flex \"> "; 
                                    
                            echo "<span class='activeColor me-2'>[".$list[$i]['ca_name']."]</span>";
                            echo "<span class=\"font19 fw400 d-block\">";
                            echo $list[$i]['subject'];
                        echo "</span></a>";
                    ?>
                </h4>
                <div class='wr_content text-center text-lg-start'>
                    <ul class='d-xl-flex px-0 mb-0 afterno'>
                        
                        <?php
                       $files = get_file($board['bo_table'], $list[$i]['wr_id']);
                            if (!empty($files[2])) { 
                                $file_3 = $files[2]['path']."/".$files[2]['file'];
                                echo  '<li class="col-xl-6 w-auto me-lg-2"><img src="'.$file_3.'" alt="시술중" class="w-100  d-block" /></li>';
                            }
                        ?>
                        
                    <li class='w-auto mt-4 mt-lg-0'>
                        <a href=<?php echo $wr_href; ?> class='text-decoration-none'>
                        <?php
                
                            $remove_html = strip_tags($list[$i]['wr_content']); 
                        //  cut_srt($remove_html, 40);
                        if($remove_html !== '.' || $remove_html !== ' ' ){
                            echo mb_substr($remove_html, 0,60, 'utf-8')."...";
                        }
                        ?>
                        </a>
                        
                    </li>
                    </ul>
                    <p>
                    <strong class="d-block mt-3 font22 fw300"><?php echo $list[$i]['wr_3']?></strong>
                    </p>
                    
                </div>

                
                
            </div>
         
            <?php } ?>
          
        </li>
    
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li text-center w-100">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <a href="<?php echo get_pretty_url($bo_table); ?>" 
    class="morebtn rounded-0 mx-auto lt_more  position-relative active mt-3 mt-lg-0 font29 d-block fw400 text-start line-height-2" style="width:220px; min-width:auto">더보기</a>
    
    </div>
</div>


