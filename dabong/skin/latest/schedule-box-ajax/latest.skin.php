<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$is_today = 1;		//0:감추기,1:일정출력
$is_month = 0;		//0:오늘일정,1:이번달일정
$is_lunar = 1;		//0:음력감추기,1:음력출력
$is_target = ' target="_blank"';
?>

<div class="schedule-box-ajax" id="schedule-box-ajax-body">
</div>

<script type="text/javascript">

	function getSchedule(year,month)
	{
		var url = '<?php echo $latest_skin_url; ?>',
			bo_table = '<?php echo $bo_table; ?>',
			is_target = '<?php echo $is_target; ?>',
			is_today = '<?php echo $is_today; ?>',
			is_month = '<?php echo $is_month; ?>',
			is_lunar = '<?php echo $is_lunar; ?>';
		$.ajax({
			url: url+'/schedule.php',
			data: {
				bo_table : bo_table,
				is_target : is_target,
				is_today : is_today,
				is_month : is_month,
				is_lunar : is_lunar,
				year : year,
				month : month
			},
			type: 'post',
			dataType: 'html',
			success: function(response) {
				$('#schedule-box-ajax-body').html(response);
			}
		});
	}

	getSchedule("<?php echo date("Y",time())?>","<?php echo date("n",time())?>");

</script>