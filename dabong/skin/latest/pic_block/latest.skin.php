<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;

$title_parts = explode('|', $bo_subject);
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

<div class="pic_lt">
    <h2 class="lat_title text-center">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class='text-decoration-none font26 fw300'><?php echo $title_parts[0]; ?></a>        
    </h2>
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
        <li class="d-lg-flex w-100 float-none my-5 justify-content-between">
            <ul class="d-md-flex p-0 col-lg-7">
                <?php 
                
                for ($j = 0; $j < 2; $j++) {
                    $img = G5_DATA_URL.'/file/'.$bo_table.'/'.$list[$i]['file'][$j]['file'];
                    //  $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';

                    $clsnm = $j === 0 ? "_before" : "_after";
                    $imgarl = $j === 0 ? "시술전" : "시술후";
                    $spancls = $j === 0 ? "beforeColor" : "afterColor";
                    $clsnm2 = $j === 0 ? "beforeBorder" : "afterBorder";
                    ?>

                    <li class="<?php echo $clsnm; ?> flex-fill  position-relative p-0 ">
                                <p class="<?php echo $clsnm2; ?> ">
                                    <span class="t-ex position-absolute start-0 top-0 text-white  px-3 py-2 <?php echo $spancls;?> font14"><?php echo $imgarl;?></span>
                                    <img src="<?php echo $img; ?>" alt="<?php echo $imgarl;?>" class="w-100  d-block">
                                </p>																
                                <strong class="d-block mt-2 font14 fw400">
                                    <?php echo $wr_3nm = $j === 0 ? $list[$i][wr_1] : $list[$i][wr_2]; ?>
                                </strong>
                    </li>
                    
                    
                    <?php }  ?>  
            
            </ul>
            <div class="ms-lg-4 flex-lg-grow-1">
                <h4 class="card-title d-flex align-items-center">                   
                    <?php
                        echo "<a href=\"".$wr_href."\" class=\"bo_cate_link font19 fw500 text-decoration-none d-flex \"> "; 
                                    
                            echo "<span class='activeColor me-2'>[".$list[$i]['ca_name']."]</span>";
                            echo "<span class=\"font19 fw400 d-block\">";
                            echo $list[$i]['subject'];
                        echo "</span></a>";
                    ?>
                </h4>
                <div class='wr_content '>
                    <ul class='d-md-flex px-0 mb-0 afterno'>
                        
                        <?php
                       $files = get_file($board['bo_table'], $list[$i]['wr_id']);
                            if (!empty($files[2])) { 
                                $file_3 = $files[2]['path']."/".$files[2]['file'];
                                echo  '<li class="col-md-6 w-auto me-md-2"><img src="'.$file_3.'" alt="시술중" class="w-100  d-block" /></li>';
                            }
                        ?>
                        
                    <li class='w-auto'>
                        <?php
                
                            $remove_html = strip_tags($list[$i]['wr_content']); 
                        //  cut_srt($remove_html, 40);
                        if($remove_html !== '.' || $remove_html !== ' ' ){
                            echo mb_substr($remove_html, 0,60, 'utf-8')."...";
                        }
                        ?>
                        
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
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="morebtn rounded-0 ms-lg-4 lt_more ms-2 active mt-3 mt-lg-0 font14 d-block fw400 text-start" style="width:90px; min-width:auto">전체보기</a>
    

</div>
