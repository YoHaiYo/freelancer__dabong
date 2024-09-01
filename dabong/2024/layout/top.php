
<?php
  if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가  
?>
<!DOCTYPE html>

<html lang="ko">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">

		<?php
			if($config['cf_add_meta'])
				echo $config['cf_add_meta'].PHP_EOL;
		?>
		<meta name="robots" content="index">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="format-detection" content="telephone=no" />

		<title><?php echo $g5_head_title; ?></title>

		<!-- 플러그인-css-->
		<link href="/dabong/2024/css/notosans-cjk.css" rel="stylesheet">
		<link rel="stylesheet" href="/dabong/2024/css/bootstrap.min.css">
		<link rel="stylesheet" href="/dabong/2024/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="/dabong/2024/css/font-awesome.min.css">
		<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
		<!-- 플러그인-js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<!-- CSS Files -->
		<link href="/dabong/2024/css/counter.css" rel="stylesheet">
		<link href="/dabong/2024/css/prettify.css" rel="stylesheet">
		<link href="/dabong/2024/css/slick-theme.css" rel="stylesheet">
		<link href="/dabong/2024/css/slick.css" rel="stylesheet">
		<!-- 메인 css -->
		<link href="<?php echo G5_THEME_CSS_URL; ?>/default.css" rel="stylesheet">
		<link href="/dabong/2024/css/common.css" rel="stylesheet">
		<?php
		if(defined('_INDEX_')) { 			
		echo  '<link href="/dabong/2024/css/main_v2.css" rel="stylesheet">';
		}else{
			$board = get_board_db($bo_table, true);
			if($board['bo_content_tail']){
				preg_match('/<img[^>]+src="([^"]+)"/', $board['bo_content_tail'], $matches2);
				if(isset($matches2[1])) {
					$timg = $matches2[1];
				}
			}
		
			if($board['bo_content_head']) {
				// 정규 표현식을 사용하여 img 태그의 src 속성 값을 추출합니다.
				//게시판 상단이미지 데스크탑
				preg_match('/<img[^>]+src="([^"]+)"/', $board['bo_content_head'], $matches);
				//게시판 하단이미지 모바일
				// $matches 배열에서 이미지 경로를 가져옵니다.
				if(isset($matches[1])) {
					$himg = $matches[1];
				}
				
			}else{
				//내용관리
				$himg = isset($co_id) ? G5_DATA_URL.'/content/'.$co_id.'_h' : ""; //상단이미지
				$timg = isset($co_id) ? G5_DATA_URL.'/content/'.$co_id.'_t' : ""; //하단이미지		
			}	    
		echo  '<link href="/dabong/2024/css/sub.css" rel="stylesheet">';
		} ?>
		<link href="/dabong/skin/faq/basic/style.css" rel="stylesheet">

	
</head>
<?php
if(defined('_INDEX_')) {
    include G5_BBS_PATH.'/newwin.inc.php';
    $_pagecls = 'index-page';
    $_pagedatail = 'main';
}else{
    $_pagecls = 'sub-page';
    if (isset($bo_table)) {
        $_pagedatail = $bo_table;
    } elseif (isset($co_id)) {
        $_pagedatail = $co_id;
    } else {
        $_pagedatail = 'etc ';
    }
}
if(isset($fm_id)){
	
	$himg = G5_DATA_URL.'/faq/'.$fm_id.'_h';
	$timg = G5_DATA_URL.'/faq/'.$fm_id.'_t';

}
?>
<body class="<?php echo $_pagecls.' sub-'.$_pagedatail; ?>  desktop chrome" >
	
	<!-- Top content -->
	<nav class="navbar">
	<div class="main-nav menu-over" >
		<div class="navbar-bg" ></div>
		<div class="container-static">
			<h1 class="navbar-brand">
					<a href="<?php echo G5_URL; ?>"></a>
            </h1>
			<div class="gnb">
				<div class="all">
					<a href="javascript:void(0);" id="open-menus"></a>
				</div>
					<div class="utils">
					<ul>
						<li class="item englewood"><a href="http://englewoodlab.com/" target="_black"><i></i><span>Englewood LAB</span></a></li>
						<li class="item language">
							<a href="javascript:void(0);">Language</a>
							<ul class="language-combo">
								
								<li class="active"><a href="/lang/ko">Korean</a></li>
								<li class=""><a href="/lang/en">English</a></li>
								<li class=""><a href="/lang/cn">Chinese</a></li>
							</ul>
						</li>
					</ul>
				</div>
  				<div class="menus">
                  <ul >
          
                <?php
				$menu_datas = get_menu_db(0, true);
				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                $i = 0;
                foreach( $menu_datas as $row ){
                    if( empty($row) ) continue;
                   
                ?>
                <li class="navi_1dli " >
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="navi_1da"><?php echo $row['me_name'] ?></a>
                    <?php
                    $k = 0;
                    foreach( (array) $row['sub'] as $row2 ){

                        if( empty($row2) ) continue; 

                        if($k == 0)
                            echo '<span class="sr-only">하위분류</span><ul class="sub-menus">'.PHP_EOL;
                    ?>
                        <li class="navi_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="navi_2da"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    $k++;
                    }   //end foreach $row2

                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
                </li>
                <?php
                $i++;
                }   //end foreach $row

                if ($i == 0) {  ?>
                    <li class="navi_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
            </ul>
				
				</div>
				<div class="banner-right" >
					<a href="javascript:void(0);" class="brief-popup">
						<h5>cosmecca brief</h5>
						<div class="con">
						코스메카<br>
						코리아를<br>
						한눈에 <br>
						알아보세요
						</div>
					</a>
				</div>
							</div>
		</div>
	</div>
	<div class="sub-nav" >
		<div class="container-static">
			<div class="subnav-inner">
				<ul>
                <?php
				$menu_datas = get_menu_db(0, true);
				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                $i = 0;
                foreach( $menu_datas as $row ){
                    if( empty($row) ) continue;
                   
                ?>
					<li>
						<dl>
							<dt>
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="navi_1da"><?php echo $row['me_name'] ?></a>
                            </dt>
                            <?php
                                $k = 0;
                                foreach( (array) $row['sub'] as $row2 ){
                                    if( empty($row2) ) continue;
                            ?>

							<dd>
								<div class="menu-main">
                                    <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" >
                                        <?php echo $row2['me_name'] ?>
                                    </a>
                                </div>
								
							</dd>
							<?php
                                $k++;
                                }   //end foreach $row2
                            ?>
						</dl>
					</li>
                    <?php
                        $i++;
                        }   //end foreach $row

                if ($i == 0) {  ?>
                    <li class="navi_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
					
					
					
				</ul>
					<div class="banner">
					<div class="banner-left">
						<h5>online counseling</h5>
						<div class="con">
						온라인으로 간편하게<br>
						개발 상담문의가 가능합니다
						</div>
						<a href="/ko/system#dev-consulting" class="btn-round">개발상담 문의</a>
					</div>
					<div class="banner-right">
						<a href="javascript:void(0);" class="brief-popup">
							<h5>cosmecca brief</h5>
							<div class="con">
							코스메카<br>
							코리아를<br>
							한눈에 <br>
							알아보세요
							</div>
						</a>
					</div>
				</div>
							</div>
					</div>
	</div>
</nav>
	
	<style>
		.sub-content:before{
			content:"";
			background-image:url(<?php echo $himg; ?>);
			background-repeat: no-repeat;
			background-position:center top;
			background-size: auto;
			padding-top: 430px;
			display:block;
		}
		@media (max-width:990px) {
			.sub-content:before{

				background-image:url(<?php echo $timg; ?>);				
				background-position:center;
				background-size:cover;
				padding-top: 0;
				height:370px;
		    }
		}
		@media (max-width:575px) {
			.sub-content:before{

				background-image:url(<?php echo $timg; ?>);				
				background-position:center;
				background-size:cover;
				padding: 0;
				height: 65vw;
		    }
		}
		
		</style>

<!-- /Top content -->
<div class="<?php if(!defined('_INDEX_')) { echo 'sub-content '; } echo $_pagedatail; ?> " >	






