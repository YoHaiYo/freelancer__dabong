<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;

?>

<!-- <div class="<?php echo $bo_table;?> youtube px-lg-5 pt-lg-5 pt-3  ps-lg-0"> -->
<div class="<?php echo $bo_table;?> youtube px-lg-5   ps-lg-0">
    
<?php
    for ($i=0; $i<$list_count; $i++) {
    ?>   
    
   <div class="overflow-hidden rounded">
   <div id="bomi_videos" class="position-relative y">
     <div class="position-absolute w-100 start-0 top-0 h-100   " id="bomi_youtube"></div>
   </div>
   </div>
    
    <!-- <div class="d-flex afterinsert justify-content-around align-items-center ps-lg-5 pe-lg-4  py-lg-4 my-lg-3">
          <img src="/bomi/2024/sns/youtube.svg" class="d-none d-lg-block" alt="">
          <div class="beforeinsert afterinsert quoto d-flex justify-content-between mx-lg-3 mx-4 mt-3 mt-lg-0 ps-lg-4 keepsall ">
          <?php //echo $list[$i]['wr_content']; ?>
          </div>
    </div> -->
    <?php } ?>
   
</div>
<script >
  var scriptUrl = 'https:\/\/www.youtube.com\/s\/player\/7ebf4817\/www-widgetapi.vflset\/www-widgetapi.js';window['yt_embedsEnableIframeDefaultReferrerPolicy'] =  true ;try{var ttPolicy=window.trustedTypes.createPolicy("youtube-widget-api",{createScriptURL:function(x){return x}});scriptUrl=ttPolicy.createScriptURL(scriptUrl)}catch(e){}var YT;if(!window["YT"])YT={loading:0,loaded:0};var YTConfig;if(!window["YTConfig"])YTConfig={"host":"https://www.youtube.com"};
if(!YT.loading){YT.loading=1;(function(){var l=[];YT.ready=function(f){if(YT.loaded)f();else l.push(f)};window.onYTReady=function(){YT.loaded=1;var i=0;for(;i<l.length;i++)try{l[i]()}catch(e){}};YT.setConfig=function(c){var k;for(k in c)if(c.hasOwnProperty(k))YTConfig[k]=c[k]};var a=document.createElement("script");a.type="text/javascript";a.id="www-widgetapi-script";a.src=scriptUrl;a.async=true;var c=document.currentScript;if(c){var n=c.nonce||c.getAttribute("nonce");if(n)a.setAttribute("nonce",
n)}var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})()};

</script>   
<script>

let player;

// YT.Player 생성자를 호출하는 부분을 try-catch 문으로 감싸서 에러를 처리합니다.
try {
    onYouTubeIframeAPIReady();
} catch (error) {
    // 에러를 무시합니다.
}

function onYouTubeIframeAPIReady() {
    player = new YT.Player('bomi_youtube', {
        height: '360',
        width: '640',
        <?php
    for ($i=0; $i<$list_count; $i++) {
    ?> 
        videoId: '<?php echo $list[$i]['wr_subject']; ?>', 
        <?php } ?>// Replace 'VIDEO_ID' with the ID of the YouTube video you want to embed
        playerVars: {
            'autoplay': 0, // Disable autoplay
            'controls': 1 // Enable player controls
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// The API will call this function when the video player is ready.
function onPlayerReady(event) {
    // Set the volume to 1/10 of the maximum volume (0.1)
    player.setVolume(10);
}

// The API calls this function when the player's state changes.
function onPlayerStateChange(event) {
    // You can handle player state changes here
}

</script>


