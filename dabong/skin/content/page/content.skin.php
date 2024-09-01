<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    <header>
        <h1><?php echo $g5['title']; ?></h1>
        <div class="flex justify-content-center">
            <div class="under-line"></div>
        </div>
    </header>

    <div id="ctt_con" class='container'>
        <?php echo $str; ?>
    </div>

</article>
<style>
    #ctt h1 {
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    #ctt .under-line{
      border-bottom: 1px solid #999;
      width: 50px;
    }
    #ctt b{
        font-size: 1.5rem;
        color: #ff5607;
        line-height: 1.4em;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    #ctt span {
        font-size: 1.2rem;
        line-height: 1.2em;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>