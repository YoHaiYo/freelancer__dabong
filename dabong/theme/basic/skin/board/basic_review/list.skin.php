<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


/*****************************

해당 게시판은 div 형식으로 제작된 좌측메뉴가 있거나 풀사이즈로 사용할 수 있는 게시판 입니다.
추천수, 비추천수를 조회나 날짜 처럼 테이블 형식으로 배치 하시려면 style.css 를 별도로 수정하셔야 합니다.
(모바일1,모바일2,태블릿,데스크탑 모두 수정하셔야 합니다.)

현재 제작되어 있는 기본형태로 사용하시거나 다른 게시판을 사용하시기를 권장해드립니다.

*******************************/



// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
		<style>
	

		/* 페이지 selec 박스 */
		/* mobile */
	
        /* .naverinto p{
          border:5px solid #02c658;
          border-radius:60px;
        }
        .naverinto svg{
            transform:translateY(-100%)
        } */
        .naverinto .morebtn.active{
            color:#02c658 !important;
            border-bottom-color:#02c658 !important;
            line-height:2;
            margin-top:-1.5rem;

        }
        .naverinto .morebtn.active:after{
            background-color: #02c658 !important;
        }
        /* .subpagebanner:before{
          content: "";
          display:block;
          position: absolute;
          left:0; right:0; top:0; bottom:0;
          background: linear-gradient(to bottom, rgba(0,0,0,.2), transparent);

        } */
	</style>



        <div class="pt-2 pt-lg-0">
            <div class="row mx-auto">
                <div class="col-sm-12">

                    <div class='d-flex justify-content-center naverinto mb-lg-5 mb-4 '>

                    <a href="https://pcmap.place.naver.com/hospital/31222521/review/visitor?from=map&fromPanelNum=1" target="_blank" class="morebtn pe-4 font19 fw500  active "> 네이버 플레이스 리뷰 전체보기</a>
                  
                        <!-- <p class='p-4 font19 fw500 position-relative'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#02c658"  class="bi bi-stars position-absolute start-0 top-0" viewBox="0 0 16 16">
  <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
</svg>
                            <a href="https://pcmap.place.naver.com/hospital/31222521/review/visitor?from=map&fromPanelNum=1" class='text-decoration-none' target="_blank">네이버 플레이스 리뷰 전체보기</a>
                        </p> -->
                    </div>
                    
                

<!-- 게시판 목록 시작 { -->
<div id="bo_list" class="ks4 mb-5" style="width:<?php echo $width; ?>">


    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top" class="container-xl mx-auto">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate" class='d-none' style="overflow-x: auto;white-space: nowrap;">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

	
	<!-- 타이틀 -->
	<div class="clearfix d-none">
		
		<div class="e_num_ti"><?php if ($is_checkbox) { ?><input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);"><?php } ?> 번호</div>
		<div class="e_subject_ti flex-grow-1">제목</div>
		<div class="e_writer_ti">글쓴이</div>
		<!-- <div class="e_hit_ti text-decoration-none"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회 <i class="fa fa-sort" aria-hidden="true"></i></div> -->
		<div class="e_date_ti text-decoration-none">날짜</div>
	</div>

<div class="d-flex flex-wrap container-xl">
	<?php
	for ($i=0; $i<count($list); $i++) {
	 ?>
	<!-- 게시물 -->
	<div class='col-md-4 col-lg-3 col-sm-6 col-12'>
         
		
		<div class="mx-1 mx-md-2">
            <!-- num -->
            <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            <?php } ?>

            <?php
            if ($list[$i]['is_notice']) // 공지사항
            {
                ?>
                <div class="mx-auto  mb-4"  style="max-width:290px;">
                
                <div class="text-center  py-5  border " >	
                    <img src="/bomi/2024/hd/naver_reviewicon.jpg" class='mx-auto d-block col-2 col-md-auto'  alt="네이버예약" title="">	  
                <?php

                
                    
                    echo "<p class='fw600 font19 mt-4 d-flex justify-content-center align-items-center'> ".$list[$i]['wr_name']."<span class='font14 mx-1'>|</span>".$list[$i]['subject']."</p>";
                    echo "<div class='mt-3 px-3 reviewcontent'>
                            <p class='mb-0  keepall reviewtext' >".utf8_strcut($list[$i]['wr_content'], 46, '...')."</p>
                            <p class='mb-0 mt-3 font22 fw500'>".$list[$i]['wr_1']."</p>
                        </div>";
                ?>
                </div>
                    
                </div>
            <?php
            }
                
            else if ($wr_id == $list[$i]['wr_id']){
                ?>
                <div class="mx-auto  mb-4" style="max-width:290px;" >
                
                <div class="text-center  py-5  border  rounded-3" >	
                    <img src="/bomi/2024/hd/naver_reviewicon.jpg"class='mx-auto d-block col-2 col-md-auto'   alt="네이버예약" title="">	  
                <?php

                
                    
                    echo "<p class='fw600 font19 mt-4 d-sm-flex justify-content-center align-items-center'> ".$list[$i]['wr_name']."<span class='font14 mx-1  d-block'>|</span>".$list[$i]['subject']."</p>";
                    echo "<div class='mt-3 px-3'>
                            <p class='mb-0  keepall ' >".utf8_strcut($list[$i]['wr_content'], 46, '...')."</p>
                            <p class='mb-0 mt-3 font22 fw500'>".$list[$i]['wr_1']."</p>
                        </div>";
                ?>
                </div>
                    
                </div>
                <?php
            }
                
            else{ ?>

            <div class="mx-auto  mb-4  rounded-4 " style="max-width:290px;" >
                
                <div class="text-center  py-5  border  rounded-3" >	
                    <img src="/bomi/2024/hd/naver_reviewicon.jpg" class='mx-auto d-block col-2 col-md-auto' alt="네이버예약" title="">	  
                <?php
                    echo "<p class='fw600 font19 mt-4 d-sm-flex justify-content-center align-items-center'> ".$list[$i]['wr_name']."<span class='font14 mx-1  d-block'>|</span>".$list[$i]['subject']."</p>";
                    echo "<div class='mt-3 px-3'>
                            <p class='mb-0  keepall  reviewtext '>".utf8_strcut($list[$i]['wr_content'], 46, '...')."</p>
                            <p class='mb-0 mt-3 font22 fw500'>".$list[$i]['wr_1']."</p>
                        </div>";
                ?>
                </div>
                    
                </div>
            <?php
            }
            ?>

		</div>
		<div class="e_subject d-none " >
                <?php if($list[$i]['reply']){?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                    </svg>
                 <?php  }  ?>

				<?php
				if ($is_category && $list[$i]['ca_name']) {
				 ?>
				<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="activeColor text-decoration-none"><?php echo $list[$i]['ca_name'] ?></a>
				<?php } ?>
			

				<a href="<?php echo $list[$i]['href'] ?>" class="text-decoration-none fw400 font16 bar">
					<?php //echo $list[$i]['icon_reply'] ?>
					<?php
						if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
					 ?>
					<?php echo $list[$i]['subject'] ?>
				   
				</a>
				
				<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
		
		</div>
		
	</div>
	<?php } ?>
</div>
	<?php if (count($list) == 0) { echo '<div class="empty_table">게시물이 없습니다.</div>'; } ?>
	

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
        <div class="container">
        <div class="bo_fx mt-4">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
            <?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>

        </div>

    <?php } ?>

    </form>
     
    <div class='container-xl position-relative'>
            <!-- 게시판 검색 시작 { -->
    <fieldset id="bo_sch" class='d-flex rouned-0'>
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl" class='float-none'>
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <!-- <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?> class='d-none d-md-block'>제목+내용</option> -->
            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>아이디</option>
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>   
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input col float-none" size="10" maxlength="20" placeholder="검색어입력">
        <button type="submit" value="검색" class="sch_btn float-none"></button>
        </form>
    </fieldset>
    <!-- } 게시판 검색 끝 -->   

    </div>
   
</div>






<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>


<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = g5_bbs_url+"/board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}

// 게시판 리스트 관리자 옵션
jQuery(function($){
    $(".btn_more_opt.is_list_btn").on("click", function(e) {
        e.stopPropagation();
        $(".more_opt.is_list_btn").toggle();
    });
    $(document).on("click", function (e) {
        if(!$(e.target).closest('.is_list_btn').length) {
            $(".more_opt.is_list_btn").hide();
        }
    });
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->


		</div><!--/collapse col-->
	</div><!-- /row -->
</div><!-- /container -->
