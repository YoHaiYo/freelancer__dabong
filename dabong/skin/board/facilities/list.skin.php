<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>


<!-- 게시판 목록 시작 { -->
<div id="bo_gall"  style="width:<?php echo $width; ?>; display:none">



    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">


    

    </form>

  
</div>

<div class="wrap_facilities">
    <div class="title_box container-lg pb-3">
    
        <!-- <h2 class="fw800 my-5 container text-center">세심한 공간에서 마음까지 편안하게 치료해드리겠습니다.</h2> -->
        <h3 class='mb-0 pb-lg-5 pb-4 d-flex justify-content-center flex-column text-center align-items-center'>보미퍼스트치과는
            인천 논현동 중심에 위치하며,<br class="d-none d-md-block">
            26개의 진료실과 시설, 치료장비가 완비된 대형 치과입니다.
        </h3>
    </div>
    <div class="bg_box_00">
        <div class="padding_box">
            <div class="circle_box">
                <img src="<?php echo G5_THEME_URL?>/img/ddaum_w.png" alt="따옴표">
                <h3 class="noto-serif-kr-semibold font32 line-height-1-5">세심한 공간에서 <br class="brTag">
                    마음까지 편안하게 <br class="brTag">
                    치료해드리겠습니다.
                </h3>
            </div>
        </div>
    </div>
    <div class="img_box_00 d-flex flex-wrap  justify-content-center align-items-center py-4 my-4 px-4 py-xxl-5 my-xxl-5">
        <div class="d-flex flex-column justify-content-center align-items-center ">
         <h3 class='font60 mb-lg-5 mb-4 pt-sm-4 pt-lg-5 text-center'>26개의 개별 진료실</h3>
        <!-- <h3 class='mb-4'>
            <img src="<?php echo G5_THEME_URL?>/img/number26.svg" alt="26">
            개의<br class="brTag">
            개별 진료실
        </h3> -->
            <div class="dot_box me-lg-5 pb-lg-5">
                <img src="<?php echo G5_THEME_URL?>/img/ddaum.png" alt="따옴표">
                <h3 class="noto-serif-kr-semibold font32 line-height-1-5 mb-4">
                치료실은 여러 환자가 동시에 치료받는 <br class="brTag">
                오픈된 공간이 아닙니다.<br class="brTag">
                개별 치료실에서 <br class="brTag">
                환자 한  분 한 분께 집중합니다.
                </h3>
                <span class="dot01"></span>
                <span class="dot02"></span>
            </div>
        </div>
    
        <img class="facility_img m-lg-5 m-4 w-100" src="<?php echo G5_THEME_URL?>/img/facilities_img_01.png" alt="시설이미지">
    </div>
    <div class="bg_box_01 url_01 ">
        <div class="pd_box ">
            
            <h3 class='font60 '>탁 트인 편안한 전망</h3>
            <div class="dot_box_w dot_box mb-m3 ">
                <img src="<?php echo G5_THEME_URL?>/img/ddaum_w.png" alt="따옴표">
                <h3 class="noto-serif-kr-semibold font32 line-height-1-5">
                힘든 치료 시간 동안 시원하게 <br class="brTag">
                트인 창이 긴장을 풀어줍니다.
                </h3>
                <span class="dot01"></span>
                <span class="dot02 mb-0"></span>
            </div>
        </div>
    </div>
    <div class="img_box_01 flex-wrap justify-content-center justify-content-xxl-between py-lg-4 py-xxl-5 my-xxl-5">
        <div class="pd_box py-4 my-4 my-xxl-4 py-xxl-5 ">
                <h3 class='font60 mb-lg-5 mb-4 pt-sm-4 pt-lg-5 text-center'>치료 장비가 완비된<br class="d-lg-none d-xl-block "> 
                    대형 치과
                </h3>
                <div class="dot_box">
                    <img src="<?php echo G5_THEME_URL?>/img/ddaum.png" alt="따옴표">
                    <h3 class="noto-serif-kr-semibold font32 line-height-1-5">
                    정확하고 꼭 필요한 치료를 위해<br >  
                    시설과 장비가 완비되어 있습니다.
                    </h3>
                    <span class="dot01"></span>
                    <span class="dot02 mb-0 mb-lg-5"></span>
                </div>
        </div>
        <img src="<?php echo G5_THEME_URL?>/img/facilities_img_02.png" alt="시설이미지" class='my-xxl-5 col-8'>
    </div>
    <div class="img_box_01 flex-xxl-row-reverse  flex-wrap justify-content-center justify-xxl-content-between
     pb-4 pt-0 pb-xxl-5 mt-0  my-xxl-5">
        
        <div class="pd_box py-4 my-4 my-xxl-4 py-xxl-5 ">
                <h3 class='font60 mb-lg-5 mb-4 pt-sm-4 pt-lg-5 text-center'>전담 매니저 상담</h3>
                <div class="dot_box pb-lg-5 pb-xxl-0">
                    <img src="<?php echo G5_THEME_URL?>/img/ddaum.png" alt="따옴표">
                    <h3 class="noto-serif-kr-semibold font32 line-height-1-5">
                    1:1 전담 매니저가 환자를 <br >
                    세심하게 기억하고, 상담해드립니다.
                    </h3>
                    <span class="dot01"></span>
                    <span class="dot02"></span>
                </div>
        </div>
        <img src="<?php echo G5_THEME_URL?>/img/facilities_img_03.png" class='my-xxl-5 col-8' alt="시설이미지">
    </div>
    <div class="bg_box_01 url_02  mt-5 py-lg-5">
        <div class="pd_box py-xxl-5 my-lg-5">
            <h3 class='font60'>카페처럼 편안한 라운지</h3>
            <div class="dot_box_w dot_box mb-n3">
                <img src="<?php echo G5_THEME_URL?>/img/ddaum_w.png" alt="따옴표">
                <h3 class="noto-serif-kr-semibold font32 line-height-1-5">
                사람이 많더라도 편안하게<br class="brTag">  
                대기하실 수 있도록<br class="brTag"> 
                라운지 공간을 아낌없이<br class="brTag"> 
                넓게 마련했습니다.
                </h3>
                <span class="dot01"></span>
                <span class="dot02"></span>
            </div>
        </div>
    </div>
</div>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

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

    if (sw == 'copy')
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
