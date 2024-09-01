<?php
include_once('../../../common.php');

$bo_table	= $_POST["bo_table"];
$is_today	= $_POST["is_today"];
$is_lunar	= $_POST["is_lunar"];
$is_target	= $_POST["is_target"];
$year		= $_POST["year"];
$month		= $_POST["month"];

// 날짜체크
$today = getdate();
$b_mon = $today['mon'];
$b_day = $today['mday'];
$b_year = $today['year'];
if($year < 1) { // 오늘의 달력 일때
  $month = $b_mon;
  $mday = $b_day;
  $year = $b_year;
}

//달력 변경시 년, 월 불러오기.
if ($_POST["year"]) {
	$year = $_POST["year"];
}
if ($_POST["month"]) {
	$month = $_POST["month"];
}

$lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
if($year%4 == 0) $lastday[2] = 29;
$dayoftheweek = date("w", mktime(0,0,0,$month,1,$year));

$sca_qstr = ($qstr) ? '&amp;'.$qstr : '';

if($month == 1) {
	$year_prev = $year - 1;
	$month_prev = 12;
	$year_next = $year;
	$month_next = $month + 1;
} else if($month == 12) {
	$year_prev = $year;
	$month_prev = $month - 1;
	$year_next = $year + 1;
	$month_next = 1;
} else {
	$year_prev = $year;
	$month_prev = $month - 1;
	$year_next = $year;
	$month_next = $month + 1;
}

if (isset($year)) {
    $year = preg_replace('/[^0-9_]/i', '', $year);
	$qstr .= '&amp;year=' . urlencode($year);
}

if (isset($month)) {
    $month = preg_replace('/[^0-9_]/i', '', $month);
	$qstr .= '&amp;month=' . urlencode($month);
}

// 요일
$yoil = array("토", "일", "월", "화", "수", "목", "금");

$write_table = $g5['write_prefix'] . $bo_table;

$board = sql_fetch(" select * from {$g5['board_table']} where bo_table = '$bo_table' ");
?>
	<h2 class="lat_title">
		<a href="javascript:;" OnClick="getSchedule('<?php echo $year_prev;?>','<?php echo $month_prev;?>')" onfocus="this.blur()" title="<?php echo  $month_prev; ?> 월"><&nbsp;</a>

		<a href="javascript:;" OnClick="getSchedule('<?php echo $year;?>','<?php echo $month;?>')" title="이번달">
			<i class="fa fa-calendar-check-o"></i> <?php echo $year;?>.<?php echo $month;?>
		</a>
		<a href="javascript:;" OnClick="getSchedule('<?php echo $year_next;?>','<?php echo $month_next;?>')" onfocus="this.blur()" title="<?php echo  $month_next; ?> 월">&nbsp;></a>

	</h2>

	<div style="padding:20px;">

		<?php if($is_today){ ?>
		<div class="list-today">
			<div class="media">
				<div class="date-box pull-left" style="margin-right:15px;">
					<div class="bg-orangered text-center" style="padding:12px;">
						<i class="fa fa-calendar-check-o fa-3x"></i>
					</div>
					<div class="date-icon">
						<?php echo ($is_month)?date("Y.m", G5_SERVER_TIME):date("Y.m.d", G5_SERVER_TIME);?>
					</div>
				</div>

				<div class="media-body">
					<ul>
						<?php
							// Today
							$i = 0;

							if($is_month){
								$chk_today = $b_year.sprintf("%02d",$b_mon);
								$result = sql_query("select * from $write_table where wr_is_comment = '0' and left(wr_1,6) <= '{$chk_today}' and left(wr_2,6) >= '{$chk_today}' order by wr_id asc");
							}else{
								$chk_today = $b_year.sprintf("%02d",$b_mon).sprintf("%02d",$b_day);
								$result = sql_query("select * from $write_table where wr_is_comment = '0' and left(wr_1,8) <= '{$chk_today}' and left(wr_2,8) >= '{$chk_today}' order by wr_id asc");
							}
							while ($row1 = sql_fetch_array($result)) {
								$row = get_list($row1, $board, $board_skin_url, G5_IS_MOBILE ? $board['bo_mobile_subject_len'] : $board['bo_subject_len']);
								$row['href'] = G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$row['wr_id'].$qstr;

								// 링크이동
								$row['target'] = '';
								if($is_link_target && $row['wr_link1']) {
									$row['target'] = $is_link_target;
									$row['href'] = $row['link_href'][1];
								}
						?>
						<li>
							<a href="<?php echo $row['href'];?>"<?php echo $row['target'];?><?php echo $is_modal_js;?>>
								<span<?php echo ($row['wr_3']) ? ' class="'.$row['wr_3'].'"' : '';?>>
									<?php echo $row['subject'] ;?>
								</span>
								<?php if($row['wr_comment']) { ?>
									<span class="count orangered"><?php echo $row['wr_comment'];?></span>
								<?php } ?>
							</a>
						</li>
						<?php $i++; } ?>
					</ul>
					<?php if(!$i) { ?>
						<p><?php echo $b_year;?>년 <?php echo sprintf("%02d",$b_mon);?>월 <?php echo sprintf("%02d",$b_day);?>일 오늘 일정은 없습니다.</p>
					<?php } ?>
				</div>


			</div>
		</div>
		<?php } ?>

		<div class="list-head div-head">
			<span class="red">일요일</span>
			<span>월요일</span>
			<span>화요일</span>
			<span>수요일</span>
			<span>목요일</span>
			<span>금요일</span>
			<span class="blue">토요일</span>
		</div>
		<ul class="list-body">
		<?php
			$cday = 1;
			$sel_mon = sprintf("%02d",$month);
			$now_month = $year.$sel_mon;
			$sca_sql = ($sca) ? "and ca_name = '".$sca."'" : "";
			$result = sql_query("select * from {$write_table} where wr_is_comment = '0' and left(wr_1,6) <= '{$now_month}' and left(wr_2,6) >= '{$now_month}' $sca_sql order by wr_id asc");
			while ($row = sql_fetch_array($result)) {

				$start_day = (substr($row['wr_1'],0,6) <  $now_month) ? 1 : substr($row['wr_1'],6,2);
				$start_day = sprintf("%2.0f" , $start_day);

				$end_day = (substr($row['wr_2'],0,6) >  $now_month) ? $lastday[$month] : substr($row['wr_2'],6,2);
				$end_day = sprintf("%2.0f" , $end_day);

				$row2 = get_list($row, $board, $board_skin_url, G5_IS_MOBILE ? $board['bo_mobile_subject_len'] : $board['bo_subject_len']);

				for ($s = (int)$start_day; $s <= (int)$end_day; $s++) {
					$list[$s][] = $row2;
				}
			}

			$temp = 7 - (($lastday[$month]+$dayoftheweek)%7);

			if($temp == 7) $temp = 0;

			$lastcount = $lastday[$month]+$dayoftheweek + $temp;

			for ($iz = 1; $iz <= $lastcount; $iz++) {

				$is_today = ($b_year == $year && $b_mon == $month && $b_day == $cday) ? true : false;

				$daycolor = ' black';
				$dayweek = $iz%7;
				if($dayweek == 1) {
					echo '<li class="list-item">'.PHP_EOL;
					$daycolor = ' red';
				} else if($dayweek == 0) {
					$daycolor = ' blue';
				}

				//음력날짜
				$myarray = soltolun($year,$month,$cday);

				$daytext = ($is_today) ? '<span class="font-14 orangered"><i class="fa fa-calendar-check-o fa-lg"></i></span>' : $cday;

				$do_cnt = count($list[$cday]);

				if($dayoftheweek < $iz && $iz <= $lastday[$month]+$dayoftheweek) {
					$fr_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);
				?>
					<div class="media<?php echo ($is_today) ? ' bg-today' : '';?>">
						<a <?php echo ($write_href) ? ' href="'.$write_href.'&amp;fr_date='.$fr_date.'&amp;to_date='.$fr_date.$sca_qstr.'"' : '';?>>
							<span class="font-13 pull-left<?php echo $daycolor;?>">
								<?php echo $daytext;?>
							</span>
							<?php if($is_lunar && ($is_today || $do_cnt > 0)){?>
							<span class="font-10 pull-right">
								<?php echo $myarray['month'].'.'.$myarray['day'];?>
							</span>
							<?php } ?>
						</a>

						<?php if($do_cnt > 0) { ?>
						<div class="do-list font-11" style="margin-top:20px;">
							<ul>
								<?php
								for($i = 0; $i < $do_cnt; $i++) {
									// 링크이동
									$list[$cday][$i]['target'] = '';
									if($is_target && $list[$cday][$i]['wr_link1']) {
										$list[$cday][$i]['target'] = $is_target;
										$list[$cday][$i]['href'] = $list[$cday][$i]['link_href'][1];
									}
									if($list[$cday][$i]['subject']){
								?>
								<li>
									<a href="<?php echo $list[$cday][$i]['href'];?>"<?php echo $list[$cday][$i]['target'];?> class="red">
										<?php echo $list[$cday][$i]['subject'] ;?>
									</a>
								</li>
								<?php
									} //if
								}
								?>
							</ul>
						</div>
						<?php } ?>

					</div>
				<?php
					$cday++;
				} else {
					echo '<div></div>'.PHP_EOL;
				}

				if($iz%7 == 0) echo '</li>'.PHP_EOL;
			}
		?>
		</ul>
	</div>

	<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only"> 더보기</span></a>