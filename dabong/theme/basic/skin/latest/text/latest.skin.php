<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>


<div class="text-center py-xxl-5 py-4 container">
    <ul class="mb-0 py-lg-4 px-0">
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li class="d-flex flex-column flex-lg-row  justify-content-center align-items-center " >
            <?php          
                echo "<strong class='keepall'>".$list[$i]['wr_content']."</strong>";
    
                echo "<a href=\"".$list[$i]['wr_link1']."\" target=\"_blank\" class=\"morebtn ms-lg-4 ms-2 active mt-3 mt-lg-0 \" > ";
            
                    echo $list[$i]['subject'];
                echo "</a>";           
            ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li >게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
	
</div>
