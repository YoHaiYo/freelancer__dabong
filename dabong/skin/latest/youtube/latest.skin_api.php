<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;

?>

<div class="<?php echo $bo_table;?> pe-5 pt-5 ps-5 ps-lg-0">
    
<?php
    for ($i=0; $i<$list_count; $i++) {
    ?>   
    
   <div class="overflow-hidden rounded">
   <div id="bomi_videos" class="position-relative"></div>
   </div>
    
    <div class="d-flex afterinsert justify-content-around align-items-center ps-lg-5 pe-lg-4  py-lg-4 my-lg-3">
          <img src="/bomi/2024/sns/youtube.svg" alt="">
          <div class="beforeinsert afterinsert quoto d-flex justify-content-between mx-lg-3 ps-lg-4 keepsall ">
          <?php echo $list[$i]['wr_content']; ?>
          </div>
    </div>
    <?php } ?>
   
</div>

<script>
     
var apiKey = 'AIzaSyCpy3dLp9atDOdZLlJgDV5u8I-J-iPjAyQ';

// YouTube Data API 요청을 보내는 함수
function searchVideos() {
    var request = new XMLHttpRequest();
    <?php
    for ($i=0; $i<$list_count; $i++) {        
        
    ?>   var query = '<?php echo $list[$i]['subject']; ?>';	
    <?php }  ?>
    
    var url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' + encodeURIComponent(query) + '&autoplay=0&rel=0&showsearch=0&type=video&maxResults=1&key=' + apiKey;

    request.open('GET', url, true);

    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            var data = JSON.parse(request.responseText);
            if (data.items.length > 0) {
                var videoId = data.items[0].id.videoId;
                displayVideo(videoId);
            } else {
                displayMessage('일치하는 동영상이 없습니다.');
            }
        } else {
            console.error(error,'API 요청 실패');
        }
    };

    request.send();
}


// 동영상을 표시하는 함수
function displayVideo(videoId) {
    var videosDiv = document.getElementById('bomi_videos');
    var videoElement = '<iframe class="position-absolute start-0 top-0 bottom-0 end-0" width="100%" height="100%" src="https://www.youtube.com/embed/' + videoId + '?autoplay=0&rel=0&showsearch=0&loop=1&start=1" frameborder="0" allowfullscreen></iframe>';

    // 동영상 플레이어 출력
    videosDiv.innerHTML = videoElement;
}

// 메시지를 표시하는 함수
function displayMessage(message) {
    var videosDiv = document.getElementById('bomi_videos');
    videosDiv.textContent = message;
}

searchVideos();

</script>
