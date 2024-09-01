<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
	<style>
		.gall_date { font-size:11px; }
		.gall_name { font-size:11px; }
		#bo_cate ul li a#bo_cate_on{
			position: relative;
			z-index: 10;
		}

		@media (max-width:1110px) {
			#bo_cate_ul{
				border-bottom-width:0!important;
				padding: 0 1.5rem !important;
				
			}
			#bo_cate_ul li{
               
				flex-grow: 1;
				margin:0 !important;
				
			}
			#bo_cate_ul li a{
				border:1px solid #ccc;
				margin:-1px -1px 0 !important;
				background:white;
			}
		}

		

	</style>
	<?php 

function hideMiddleChars($string) {
    $length = mb_strlen($string, 'UTF-8');
    if ($length <= 2) {
        return $string;
    }
    
    $firstChar = mb_substr($string, 0, 1, 'UTF-8');
    $lastChar = mb_substr($string, -1, 1, 'UTF-8');
    $middleChars = str_repeat('*', $length - 2); // 맨 처음과 끝 글자는 그대로 유지하므로 생략된 글자 수는 전체 길이에서 3을 뺍니다.
    
    return $firstChar . $middleChars . $lastChar;
}
?>




<div class="container  px-4 pb-3 mt-n4">
	<fieldset id="bo_sch" class='mt-4 rounded-0 mb-5 float-none border-0 justify-content-center'>
			<form name="fsearch" method="get" style='border-bottom:3px solid #333' class='w-auto'>
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
			<label for="sfl" class="sound_only">검색대상</label>
			<select name="sfl" id="sfl" class='ms-0 pe-3'>
				<option value="wr_3"<?php echo get_selected($sfl, 'wr_3'); ?> data-changetext='예) 60대, 발치, 유치, 여성, 남성' >#키워드</option>
				<option value="ca_name"<?php echo get_selected($sfl, 'ca_name'); ?>  data-changetext='예) 전악' >치료</option> 
				<option value="wr_1"<?php echo get_selected($sfl, 'wr_1'); ?>  data-changetext='예) 전치부 상실' >시술전</option>
				<option value="wr_2"<?php echo get_selected($sfl, 'wr_2'); ?>   data-changetext='예) 골이식' >시술후</option>	
				<!-- <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>성함</option> -->
				<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?> data-changetext='예) 발치 후 임플란트'>내용</option>			
				

			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="13" maxlength="20" placeholder="검색어를 입력해주세요">
			<button type="submit" value="" class="sch_btn beforeno h-auto" style='width: 22px;margin-top: 5px;'>
			<svg fill="#000000" viewBox="0 -0.24 28.423 28.423" id="_02_-_Search_Button" data-name="02 - Search Button" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="Path_215" data-name="Path 215" d="M14.953,2.547A12.643,12.643,0,1,0,27.6,15.19,12.649,12.649,0,0,0,14.953,2.547Zm0,2A10.643,10.643,0,1,1,4.31,15.19,10.648,10.648,0,0,1,14.953,4.547Z" transform="translate(-2.31 -2.547)" fill-rule="evenodd"></path> <path id="Path_216" data-name="Path 216" d="M30.441,28.789l-6.276-6.276a1,1,0,1,0-1.414,1.414L29.027,30.2a1,1,0,1,0,1.414-1.414Z" transform="translate(-2.31 -2.547)" fill-rule="evenodd"></path> </g></svg>
			</button>
			</form>
	</fieldset>		
</div>

<script>
function updatePlaceholder() {
  const selectBox = document.getElementById('sfl');
  const selectedOption = selectBox.options[selectBox.selectedIndex];
  const placeholderText = selectedOption.getAttribute('data-changetext');
  const searchInput = document.getElementById('stx');
  searchInput.value = '';
  searchInput.placeholder = placeholderText;
}

// 초기 로드 시 기본 선택된 옵션에 맞춰 placeholder 설정
document.getElementById('sfl').addEventListener('change', updatePlaceholder);
</script>

<div class="galleryWrapper margin-top-60 margin-bottom-60">

            <div class="row mx-0 -0">
                <div class="col-sm-12 px-0">
					<!-- 게시판 목록 시작 { -->
					<div id="bo_gall"  style="width:<?php echo $width; ?> " >

						<?php if ($is_category) { ?>
						<nav id="bo_cate">
							<h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
							<ul id="bo_cate_ul" class='justify-content-center d-flex flex-wrap px-4 px-lg-0 text-center'>
								<?php echo $category_option ?>
							</ul>
						</nav>
						<?php } ?>


						<!-- 게시판 페이지 정보 및 버튼 시작 { -->
						<div id="bo_btn_top" class="container-xl mx-auto">
							<!-- <div id="bo_list_total">
								<span>Total <?php echo number_format($total_count) ?>건</span>
								<?php //echo $page ?> 페이지
							</div> -->

							<?php if ($rss_href || $write_href) { ?>
							<ul class="btn_bo_user">
								<?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
								<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
								<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="far fa-edit"></i> 글쓰기</a></li><?php } ?>
							</ul>
							<?php } ?>
						</div>
						<!-- } 게시판 페이지 정보 및 버튼 끝 -->

	
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

							<?php if ($is_checkbox) { ?>
							<div id="gall_allchk" class='container-xl  translate-middle-y-25 mb-4'>
								<label for="chkall" >전체 선택</label>
								<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
							</div>
							<?php } ?>

					  		<section class="wrapper container-xl mb-5">
								<!-- maxwidth mx-auto -->

								<div class="row mx-0">
										<?php for ($i=0; $i<count($list); $i++) { ?>
											<div class="card-position shadow-none mt-0 my-lg-4 px-0 <?php echo $i===0 ?  "":"border-top"; ?> border-lg-0 pt-5 pt-lg-0">
												<!-- 체크박스 -->
												<div class="gall_chk">
													<?php if ($is_checkbox) { ?>
														<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
														<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
													<?php } ?>
													<span class="sound_only">
														<?php
														if ($wr_id == $list[$i]['wr_id'])
															echo "<span class=\"bo_current\">열람중</span>";
														else
															echo $list[$i]['num'];
														?>
													</span>
												
												</div>
												<!-- /체크박스 -->
												
												<div class="card h-auto d-block d-lg-flex flex-row  shadow-none border-0">

												
													<div class='img-card h-auto col-lg-8' >
														<ul class='d-md-flex p-0' >
															<?php

																$files = get_file($board['bo_table'], $list[$i]['wr_id']);
																$blindinfo = $is_member ? '' : 'blindinfo';
																if (!empty($files[0])) { 
																	$file_1 = $files[0]['path']."/".$files[0]['file'];
																	echo '<li class="_before flex-fill  position-relative ">
																			<p class="beforeBorder  ">
																				<span class="t-ex position-absolute start-0 top-0 text-white  px-3 py-2 beforeColor font14">시술전</span>
																				<img src="'.$file_1.'" alt="시술전" class="w-100  d-block" />
																			</p>																
																			<strong class="d-block mt-2 font14 fw400 mb-4 mb-lg-0">'.$list[$i]['wr_1'].'</strong>
																		</li>';
																}
																
																if (!empty($files[1])) { 
																	$file_2 = $files[1]['path']."/".$files[1]['file'];
																	echo '<li class="_after flex-fill position-relative ">
																			<p class="afterBorder '.$blindinfo.'">
																				<span class="t-ex position-absolute start-0 top-0 text-white  px-3 py-2 afterColor font14">시술후</span>
																				<img src="'.$file_2.'" alt="시술후" class="w-100  d-block" />
																			</p>
																			<strong class="d-block mt-2 font14 fw400">'.$list[$i]['wr_2'].'</strong>
																		</li>';
																}
															
															?>
														</ul>
													</div>
													<div class="card-content flex-grow-1 px-0 px-lg-3">
														<!-- <?php if ($admin_href) { ?><p> <a href="<?php echo $list[$i]['href'] ?>">관리</a> </p><?php } ?> -->
														<h4 class="card-title d-flex align-items-center">
						
															<?php
															// echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
															if ($is_category && $list[$i]['ca_name']) {
															?>
															<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link font19 fw500">[ <?php echo $list[$i]['ca_name'] ?> ]</a>
															<?php } ?>
															
															<a href="<?php echo $list[$i]['href'] ?>" class='me-md-auto'>
																<span class="font19 fw400 d-block" ><?php 
																//  $originalString = $list[$i]['subject'];
																//  $processedString = hideMiddleChars($originalString);
																//  echo $processedString; 
																echo hideMiddleChars($list[$i]['subject']); ?>
																</span>
															</a>
															<a href="<?php echo $list[$i]['href'] ?>" class='morebtn ms-lg-4 ms-auto active mt-0 font14 d-block fw400' style='width:90px; min-width:auto'>더보기</a>
															
															



														</h4>
														<style>
															.wr_content img{
																max-width:220px;
																min-width:160px;
																border-radius:10px;
																border:1px solid #ddd;
															}
															.wr_content br{
																display:none
															}
														</style>
														<div class='wr_content'>
															<ul class='d-md-flex px-0 mb-0'>
																
																<?php
																	if (!empty($files[2]) && $is_member) { 
																		$file_3 = $files[2]['path']."/".$files[2]['file'];
																		echo  '<li class="me-md-2 mb-3 mt-3 mt-lg-0 mb-lg-0"><img src="'.$file_3.'" alt="시술중" class="w-100  d-block mx-auto" /></li>';
																	}
																?>
																
																<li class='py-3 px-4 p-lg-0'>
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
															<strong class="d-block mt-lg-3 mt-2 font22 fw300 text-center text-lg-start"><?php echo $list[$i]['wr_3']?></strong>
															</p>
															
														</div>
														
													</div>

													<div class="card-read-more d-none">
														<div class="row card-padding">

																<div class="col-md-7 text-left">
																	<span class="sound_only">조회 </span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo "<span class='gall_name' style='margin:2px;'>".$list[$i]['wr_hit']."</span>" ?>
																	<?php if ($is_good) { ?><span class="sound_only">추천</span><strong><i class="far fa-thumbs-up"></i> <?php echo $list[$i]['wr_good'] ?></strong><?php } ?>
																	<?php if ($is_nogood) { ?><span class="sound_only">비추천</span><strong><i class="far fa-thumbs-down"></i> <?php echo $list[$i]['wr_nogood'] ?></strong><?php } ?>
																</div>
																<div class="col-md-5 text-right">
																	<span class="gall_date"><span class="sound_only">작성일 </span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['datetime'] ?></span>
																</div>
														</div>

													</div>
												</div>
											</div>
										<?php }//for ?>
								</div><!-- //row -->

					

								 <?php if ($list_href || $is_checkbox || $write_href) { ?>
									<div class="bo_fx">
										<?php if ($list_href || $write_href) { ?>
										<ul class="btn_bo_user">
											<?php if ($is_checkbox) { ?>
											<li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_b01"></li>
											<li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_b01"></li>
											<li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_b01"></li>
											<?php } ?>
											<?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn">목록</a></li><?php } ?>
											<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn">글쓰기</a></li><?php } ?>
										</ul>
										<?php } ?>
									</div>
								 <?php } ?>
											 
								
							
   
 
							</section>
						</form>
		 



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


			</div>
		</div><!--/collapse col-->
	</div><!-- /row -->
</div><!-- /container -->
<div class="divide80"></div>


