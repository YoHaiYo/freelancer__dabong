<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;

// 파일 데이터 경로
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;

for ($i = 0; $i < $list_count; $i++) {  
    $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);
    $file_count = count($list[$i]['file']);

 
   
    // 첨부된 파일의 개수만큼 반복하여 원본 이미지 출력
    // 카테고리의 해당하는 첨부파일만 출력하기  
    // 이유는 모르겠지만 $file_count 가 첨부파일 개수보다 하나더 되어 있음 2여야 하는데 3으로 나옴
    for ($j = 0; $j < $file_count - 1; $j++) {
        $img = G5_DATA_URL.'/file/'.$bo_table.'/'.$list[$i]['file'][$j]['file'];

        $position = $j === 0 ? "" : "position-absolute";

        if($img){
        // 이미지 태그 생성
        $img_content = '<img src="'.$img.'" alt="'.$list[$i]['file'][$j]['file'].'" class="'.$position.' start-0 top-0 d-block '.$category.' logo'.$j.'" >';
        }else{
            $img_content = '<span class="'.$category.'">보미퍼스트</span>';   
        }
        
        echo $img_content;
    }
}

if ($list_count == 0) {
    echo '보미퍼스트치과';
}
?>
