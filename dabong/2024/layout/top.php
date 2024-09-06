
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
		<!-- <link href="/dabong/2024/css/notosans-cjk.css" rel="stylesheet"> -->
		<link href="/dabong/2024/font/static/pretendard.css" rel="stylesheet">
		<link rel="stylesheet" href="/dabong/2024/css/bootstrap.min.css">
		<link rel="stylesheet" href="/dabong/2024/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="/dabong/2024/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

		<!-- 플러그인-js -->
    	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

		<!-- CSS Files -->
		<link href="/dabong/2024/css/counter.css" rel="stylesheet">
		<link href="/dabong/2024/css/prettify.css" rel="stylesheet">
		<link href="/dabong/2024/css/slick-theme.css" rel="stylesheet">
		<link href="/dabong/2024/css/slick.css" rel="stylesheet">


		<!-- 테마-베이직 -->
		<link href="/dabong/2024/css/themeBasic_content__history.css" rel="stylesheet">
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
		<div class="container-static d-flex justify-content-between align-items-center">
			<h1 class="navbar-brand m-0 p-0">
					<a href="<?php echo G5_URL; ?>"></a>
            </h1>
			<div class="gnb d-flex align-items-center flex-row-reverse">
				<div class="all ml-5">
					<a href="javascript:void(0);" id="open-menus"></a>
				</div>
					<div class="utils">
					<ul>					
						<li class="item language">
							<a href="javascript:void(0);" class='d-block'>
							<svg width="110" height="40" viewBox="0 0 110 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M17.5625 11.8594H19.3203V24.4375H25.8828V26H17.5625V11.8594ZM26.3039 22.9922C26.3039 21.8919 26.6783 21.1172 27.427 20.668C28.1822 20.2188 29.1359 19.9518 30.2883 19.8672C30.731 19.8346 31.2258 19.8053 31.7727 19.7793C32.326 19.7467 32.7883 19.724 33.1594 19.7109V18.8516C33.1594 18.168 32.9543 17.6439 32.5441 17.2793C32.1405 16.9082 31.5448 16.7227 30.757 16.7227C30.1125 16.7227 29.5852 16.8561 29.175 17.123C28.7648 17.3835 28.4979 17.7253 28.3742 18.1484H26.6164C26.688 17.582 26.9094 17.0807 27.2805 16.6445C27.6516 16.2083 28.1431 15.8698 28.7551 15.6289C29.3736 15.3815 30.0669 15.2578 30.8352 15.2578C31.8508 15.2578 32.7688 15.5182 33.5891 16.0391C34.4094 16.5534 34.8195 17.543 34.8195 19.0078V26H33.1594V24.5547H33.0813C32.951 24.8281 32.7492 25.0951 32.4758 25.3555C32.2089 25.6094 31.8573 25.8242 31.4211 26C30.9914 26.1693 30.4901 26.2539 29.9172 26.2539C29.2401 26.2539 28.6281 26.1237 28.0813 25.8633C27.5344 25.6029 27.1014 25.2285 26.7824 24.7402C26.4634 24.2454 26.3039 23.6628 26.3039 22.9922ZM27.9836 23.0703C27.9836 23.6107 28.1854 24.0273 28.5891 24.3203C28.9992 24.6068 29.5396 24.75 30.2102 24.75C30.8156 24.75 31.3397 24.6296 31.7824 24.3887C32.2316 24.1478 32.5734 23.8288 32.8078 23.4316C33.0422 23.0345 33.1594 22.6081 33.1594 22.1523V21.0879L30.4836 21.2734C29.6893 21.3255 29.0741 21.498 28.6379 21.791C28.2017 22.084 27.9836 22.5104 27.9836 23.0703ZM37.9945 26H36.3148V15.3945H37.9359V17.0547H38.0727C38.3396 16.4883 38.727 16.0488 39.2348 15.7363C39.7491 15.4173 40.3969 15.2578 41.1781 15.2578C41.9073 15.2578 42.5388 15.4076 43.0727 15.707C43.6065 16 44.0199 16.446 44.3129 17.0449C44.6059 17.6439 44.7523 18.3828 44.7523 19.2617V26H43.0727V19.3789C43.0727 18.5586 42.8611 17.9173 42.4379 17.4551C42.0147 16.9928 41.4255 16.7617 40.6703 16.7617C40.1495 16.7617 39.6872 16.8757 39.2836 17.1035C38.8799 17.3249 38.5642 17.6536 38.3363 18.0898C38.1085 18.5195 37.9945 19.0339 37.9945 19.6328V26ZM50.5445 30.1992C49.6917 30.1992 48.9365 30.0788 48.2789 29.8379C47.6279 29.597 47.1103 29.2454 46.7262 28.7832C46.3421 28.321 46.1174 27.7643 46.0523 27.1133H47.8102C47.9273 27.6471 48.2203 28.0508 48.6891 28.3242C49.1643 28.5977 49.7828 28.7344 50.5445 28.7344C51.482 28.7344 52.2047 28.526 52.7125 28.1094C53.2203 27.6927 53.4742 27.0547 53.4742 26.1953V24.0469H53.3375C53.1487 24.3659 52.9501 24.6458 52.7418 24.8867C52.5335 25.1276 52.221 25.349 51.8043 25.5508C51.3941 25.7461 50.8766 25.8438 50.2516 25.8438C49.3857 25.8438 48.6109 25.6322 47.9273 25.209C47.2437 24.7858 46.7066 24.1771 46.316 23.3828C45.9319 22.582 45.7398 21.638 45.7398 20.5508C45.7398 19.4831 45.9319 18.5488 46.316 17.748C46.7001 16.9473 47.234 16.332 47.9176 15.9023C48.6012 15.4727 49.3857 15.2578 50.2711 15.2578C50.8896 15.2578 51.4039 15.3587 51.8141 15.5605C52.2307 15.7624 52.527 15.9707 52.7027 16.1855C52.885 16.3939 53.1096 16.6901 53.3766 17.0742H53.5133V15.3945H55.1539V26.293C55.1539 27.1719 54.9521 27.901 54.5484 28.4805C54.1513 29.0664 53.6077 29.4993 52.9176 29.7793C52.2275 30.0592 51.4365 30.1992 50.5445 30.1992ZM50.4859 24.3398C51.4495 24.3398 52.1949 24.0143 52.7223 23.3633C53.2496 22.7057 53.5133 21.7878 53.5133 20.6094C53.5133 19.8477 53.3961 19.1771 53.1617 18.5977C52.9273 18.0182 52.5823 17.569 52.1266 17.25C51.6773 16.9245 51.1305 16.7617 50.4859 16.7617C49.8284 16.7617 49.2717 16.931 48.816 17.2695C48.3603 17.6081 48.0152 18.0703 47.7809 18.6562C47.553 19.2357 47.4391 19.8867 47.4391 20.6094C47.4391 21.3516 47.553 22.0026 47.7809 22.5625C48.0152 23.1224 48.3603 23.5586 48.816 23.8711C49.2717 24.1836 49.8284 24.3398 50.4859 24.3398ZM63.3289 15.3945H64.9891V26H63.3289V24.2031H63.2117C62.9383 24.7826 62.5346 25.2513 62.0008 25.6094C61.4734 25.9609 60.8289 26.1367 60.0672 26.1367C59.3836 26.1367 58.7846 25.9902 58.2703 25.6973C57.756 25.3978 57.3523 24.9486 57.0594 24.3496C56.7729 23.7507 56.6297 23.0117 56.6297 22.1328V15.3945H58.3094V22.0156C58.3094 22.5169 58.407 22.9564 58.6023 23.334C58.7977 23.7116 59.0678 24.0046 59.4129 24.2129C59.7645 24.4147 60.1648 24.5156 60.6141 24.5156C61.0372 24.5156 61.4572 24.4082 61.8738 24.1934C62.297 23.9785 62.6453 23.6562 62.9188 23.2266C63.1922 22.7904 63.3289 22.263 63.3289 21.6445V15.3945ZM65.9766 22.9922C65.9766 21.8919 66.3509 21.1172 67.0996 20.668C67.8548 20.2188 68.8086 19.9518 69.9609 19.8672C70.4036 19.8346 70.8984 19.8053 71.4453 19.7793C71.9987 19.7467 72.4609 19.724 72.832 19.7109V18.8516C72.832 18.168 72.627 17.6439 72.2168 17.2793C71.8132 16.9082 71.2174 16.7227 70.4297 16.7227C69.7852 16.7227 69.2578 16.8561 68.8477 17.123C68.4375 17.3835 68.1706 17.7253 68.0469 18.1484H66.2891C66.3607 17.582 66.582 17.0807 66.9531 16.6445C67.3242 16.2083 67.8158 15.8698 68.4277 15.6289C69.0462 15.3815 69.7396 15.2578 70.5078 15.2578C71.5234 15.2578 72.4414 15.5182 73.2617 16.0391C74.082 16.5534 74.4922 17.543 74.4922 19.0078V26H72.832V24.5547H72.7539C72.6237 24.8281 72.4219 25.0951 72.1484 25.3555C71.8815 25.6094 71.5299 25.8242 71.0938 26C70.6641 26.1693 70.1628 26.2539 69.5898 26.2539C68.9128 26.2539 68.3008 26.1237 67.7539 25.8633C67.207 25.6029 66.7741 25.2285 66.4551 24.7402C66.1361 24.2454 65.9766 23.6628 65.9766 22.9922ZM67.6562 23.0703C67.6562 23.6107 67.8581 24.0273 68.2617 24.3203C68.6719 24.6068 69.2122 24.75 69.8828 24.75C70.4883 24.75 71.0124 24.6296 71.4551 24.3887C71.9043 24.1478 72.2461 23.8288 72.4805 23.4316C72.7148 23.0345 72.832 22.6081 72.832 22.1523V21.0879L70.1562 21.2734C69.362 21.3255 68.7467 21.498 68.3105 21.791C67.8743 22.084 67.6562 22.5104 67.6562 23.0703ZM80.2844 30.1992C79.4315 30.1992 78.6763 30.0788 78.0187 29.8379C77.3677 29.597 76.8501 29.2454 76.466 28.7832C76.0819 28.321 75.8573 27.7643 75.7922 27.1133H77.55C77.6672 27.6471 77.9602 28.0508 78.4289 28.3242C78.9042 28.5977 79.5227 28.7344 80.2844 28.7344C81.2219 28.7344 81.9445 28.526 82.4523 28.1094C82.9602 27.6927 83.2141 27.0547 83.2141 26.1953V24.0469H83.0773C82.8885 24.3659 82.69 24.6458 82.4816 24.8867C82.2733 25.1276 81.9608 25.349 81.5441 25.5508C81.134 25.7461 80.6164 25.8438 79.9914 25.8438C79.1255 25.8438 78.3508 25.6322 77.6672 25.209C76.9836 24.7858 76.4465 24.1771 76.0559 23.3828C75.6717 22.582 75.4797 21.638 75.4797 20.5508C75.4797 19.4831 75.6717 18.5488 76.0559 17.748C76.44 16.9473 76.9738 16.332 77.6574 15.9023C78.341 15.4727 79.1255 15.2578 80.0109 15.2578C80.6294 15.2578 81.1437 15.3587 81.5539 15.5605C81.9706 15.7624 82.2668 15.9707 82.4426 16.1855C82.6249 16.3939 82.8495 16.6901 83.1164 17.0742H83.2531V15.3945H84.8937V26.293C84.8937 27.1719 84.6919 27.901 84.2883 28.4805C83.8911 29.0664 83.3475 29.4993 82.6574 29.7793C81.9673 30.0592 81.1763 30.1992 80.2844 30.1992ZM80.2258 24.3398C81.1893 24.3398 81.9348 24.0143 82.4621 23.3633C82.9895 22.7057 83.2531 21.7878 83.2531 20.6094C83.2531 19.8477 83.1359 19.1771 82.9016 18.5977C82.6672 18.0182 82.3221 17.569 81.8664 17.25C81.4172 16.9245 80.8703 16.7617 80.2258 16.7617C79.5682 16.7617 79.0116 16.931 78.5559 17.2695C78.1001 17.6081 77.7551 18.0703 77.5207 18.6562C77.2928 19.2357 77.1789 19.8867 77.1789 20.6094C77.1789 21.3516 77.2928 22.0026 77.5207 22.5625C77.7551 23.1224 78.1001 23.5586 78.5559 23.8711C79.0116 24.1836 79.5682 24.3398 80.2258 24.3398ZM90.8227 26.2148C89.8135 26.2148 88.9346 25.9902 88.1859 25.541C87.4372 25.0918 86.8611 24.457 86.4574 23.6367C86.0603 22.8164 85.8617 21.8659 85.8617 20.7852C85.8617 19.7044 86.0603 18.7474 86.4574 17.9141C86.8611 17.0742 87.4242 16.4232 88.1469 15.9609C88.876 15.4922 89.7159 15.2578 90.6664 15.2578C91.4672 15.2578 92.2126 15.4368 92.9027 15.7949C93.5928 16.1465 94.1527 16.7194 94.5824 17.5137C95.0186 18.3014 95.2367 19.3138 95.2367 20.5508V21.2539H87.5414C87.5674 21.9896 87.7204 22.6178 88.0004 23.1387C88.2803 23.6595 88.6612 24.0566 89.143 24.3301C89.6312 24.597 90.1911 24.7305 90.8227 24.7305C91.4216 24.7305 91.9262 24.6198 92.3363 24.3984C92.753 24.1706 93.0687 23.8776 93.2836 23.5195H95.0805C94.9112 24.0534 94.628 24.5254 94.2309 24.9355C93.8402 25.3392 93.352 25.6549 92.766 25.8828C92.1866 26.1042 91.5388 26.2148 90.8227 26.2148ZM93.5375 19.8281C93.5375 19.2357 93.4171 18.7083 93.1762 18.2461C92.9418 17.7773 92.6065 17.4095 92.1703 17.1426C91.7341 16.8757 91.2328 16.7422 90.6664 16.7422C90.074 16.7422 89.5466 16.8822 89.0844 17.1621C88.6286 17.4421 88.2673 17.8197 88.0004 18.2949C87.74 18.7637 87.5902 19.2747 87.5512 19.8281H93.5375Z" 
								/>
								<rect x="0.5" y="0.5" width="109" height="39" rx="19.5" stroke="white"/>
							</svg>
	
						</a>
							<ul class="language-combo">
								
								<li class="active"><a href="/lang/ko">Korean</a></li>
								<li class=""><a href="/lang/en">English</a></li>
								<li class=""><a href="/lang/cn">Chinese</a></li>
							</ul>
						</li>
					</ul>
				</div>
  				<div class="menus mr-5 pr-5">
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






