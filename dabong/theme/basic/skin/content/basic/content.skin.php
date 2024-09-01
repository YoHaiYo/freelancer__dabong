<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    <header>
        <h1><?php echo $g5['title']; ?></h1>
        <div class="d-flex justify-content-center">
            <div class="under-line"></div>
        </div>
    </header>

    <div id="ctt_con" class='container'>
        <?php echo $str; ?>

        <div class="tabmenu">
      <input type="radio" id="tab1" name="tab" checked="" hidden="">
      <input type="radio" id="tab2" name="tab" hidden="">
      <input type="radio" id="tab3" name="tab" hidden="">
      <input type="radio" id="tab4" name="tab" hidden="">
      <div class="tabmenu_menu">
        <label class="tabmenu_menu-item" for="tab1">2021~현재</label><!--tab1-->
        <label class="tabmenu_menu-item" for="tab2">2016~2020</label><!--tab2-->
        <label class="tabmenu_menu-item" for="tab3">2011~2015</label><!--tab3-->
        <label class="tabmenu_menu-item" for="tab4">2008~2010</label><!--tab4-->
      </div>

      <div class="tabmenu_content">
        <!--tab1 content-->
        <div class="tabmenu_content-item" data-tab="tab1">
          <div class="m-content">
            <ul class="m-timeline">
              <li>
                <div class="m-timeline__date">2022<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>농촌진흥청 농업기상정보시스템
                    유지보수(40개소)
                  </li>
                  <li>
                    <span class="detailD">03</span>원예연구소 사과시험장
                    수액흐름 측정시스템 설치
                  </li>
                  <li>
                    <span class="detailD">05</span>농업과학기술원 토양수분 및
                    기상측정시스템 설치
                  </li>
                  <li>
                    <span class="detailD">11</span>원예연구소 과수재배과
                    자동기상측정시스템
                  </li>
                  <li>
                    <span class="detailD">12</span>세븐힐즈 골프장
                    자동기상측정시스템 설치
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2021<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>국립원예특장과학원 기상 및
                    원격영상 전송시스템 6set 설치
                  </li>
                  <li>
                    <span class="detailD">01</span>강원,경기,충남,충북,경남,경북
                    농업기술원 기온/습도/일사 측정시스템
                  </li>
                  <li>
                    <span class="detailD">01</span>경희대학교 기상관측시스템
                    12set 설치
                  </li>
                  <li>
                    <span class="detailD">01</span>부여군 농업기상관측시스템
                    4set 설치
                  </li>
                  <li>
                    <span class="detailD">01</span>각 도 농업기술원
                    영상관측시스템 설치(8개 지역)
                  </li>
                  <li>
                    <span class="detailD">01</span>경기도 농업기술원 버섯연구소
                    CO2제어 시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">03</span>익산 국립식량과학원
                    하우스제어시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">05</span>대관령 암반대기
                    기상관측시스템 2set 설치
                  </li>
                  <li>
                    <span class="detailD">09</span>영주, 문경 농업기술센터
                    기상관측시스템 1set 설치
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <!--tab2 content-->
        <div class="tabmenu_content-item" data-tab="tab2">
          <div class="m-content">
            <ul class="m-timeline">
              <li>
                <div class="m-timeline__date">2020<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>한국항공우주연구원
                    Spectroradiometer 설치
                  </li>
                  <li>
                    <span class="detailD">03</span>강원,경기,충남,충북,경남,경북
                    농업기술원 기온/습도/일사 측정시스템
                  </li>
                  <li>
                    <span class="detailD">08</span>원예연구소 사과시험정
                    서리예보시스템 설치
                  </li>
                  <li>
                    <span class="detailD">09</span>농촌진흥청 농업기상정보시스템
                    유지보수(40개소)
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2019<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>경기도 농업기술원 버섯연구소
                    CO2제어 시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">03</span>익산 국립식량과학원
                    하우스제어시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">05</span>대관령 암반대기
                    기상관측시스템 2set 설치
                  </li>
                  <li>
                    <span class="detailD">09</span>영주, 문경 농업기술센터
                    기상관측시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">10</span>조기경보 시스템 기상관측장비
                    15set 설치
                  </li>
                  <li>
                    <span class="detailD">11</span>통가(Tonga) 기상관측시스템
                    1set 설치/중국 연변 기상관측시스템 1set 설치
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2018<span></span></div>
                <ul class="detail">
                  <li><span class="detailD">01</span>삼성 냉열기 사업시작</li>
                  <li><span class="detailD">03</span>에어뱅크 사명 변경</li>
                  <li><span class="detailD">04</span>삼성 대리점 인가</li>
                  <li>
                    <span class="detailD">04</span>삼성전자 시스템 기술점 획득
                  </li>
                  <li><span class="detailD">04</span>자체 물류 시스템 운영</li>
                  <li>
                    <span class="detailD">06</span>시스템 에어컨 설치 품질
                    우수상 수상
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <!--tab3 content-->
        <div class="tabmenu_content-item news" data-tab="tab3">
          <div class="m-content">
            <ul class="m-timeline">
              <li>
                <div class="m-timeline__date">2015<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>강소기업 획득(고용노동부)
                  </li>
                  <li>
                    <span class="detailD">02</span>삼성전자 B2B 영업팀 3STAR
                    파트너 인증(비즈니스 우수 판매점)
                  </li>
                  <li>
                    <span class="detailD">02</span>삼성전자 파트너사
                    장기경영상(20년) 수상
                  </li>
                  <li>
                    <span class="detailD">02</span>삼성전자 Best 디지털마케팅상
                    수상
                  </li>
                  <li>
                    <span class="detailD">10</span>삼성전자 B2B 영업팀 4STAR
                    파트너 인증(비즈니스 우수 판매점)
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2014<span></span></div>
                <ul class="detail">
                  <li><span class="detailD">01</span>삼성 냉열기 사업시작</li>
                  <li><span class="detailD">03</span>에어뱅크 사명 변경</li>
                  <li><span class="detailD">04</span>삼성 대리점 인가</li>
                  <li>
                    <span class="detailD">04</span>삼성전자 시스템 기술점 획득
                  </li>
                  <li><span class="detailD">04</span>자체 물류 시스템 운영</li>
                  <li>
                    <span class="detailD">06</span>시스템 에어컨 설치 품질
                    우수상 수상
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2013<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">02</span>시스템 에어컨 설치 품질
                    우수상 수상
                  </li>
                  <li>
                    <span class="detailD">03</span>주식회사 에어뱅크
                    설립(포괄승계)
                  </li>
                  <li>
                    <span class="detailD">08</span>삼성전자 시스템 에어컨 대리점
                    cs 우수상 수상
                  </li>
                  <li>
                    <span class="detailD">09</span>건설업 진출(설비단종면허
                    취득)
                  </li>
                  <li>
                    <span class="detailD">11</span>지열공사업 등록(신재생에너지
                    전문기업)
                  </li>
                  <li>
                    <span class="detailD">11</span>삼성전자 시스템 에어컨 대리점
                    cs 우수상 수상
                  </li>
                  <li>
                    <span class="detailD">12</span>시스템에어컨 설치 부분 우수상
                    수상
                  </li>
                  <li><span class="detailD">12</span>물류 센터 매입(지곡동)</li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2012<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>삼성전자 B2B 영업팀 STAR
                    파트너 인증(비즈니스 우수 판매점)
                  </li>
                  <li>
                    <span class="detailD">01</span>삼성전자 B2B 영업팀 2STAR
                    파트너 인증(비즈니스 우수 판매점)
                  </li>
                  <li>
                    <span class="detailD">08</span>한국전력 경기지역본부 감사패
                    수상
                  </li>
                  <li>
                    <span class="detailD">09</span>주식회사 에어뱅크 사옥 매입
                  </li>
                  <li>
                    <span class="detailD">09</span>삼성전자 B2B 영업팀 3STAR
                    파트너 인증(비즈니스 우수
                  </li>
                  <li>
                    <span class="detailD">09</span>삼성 시스템 에어컨 유지관리
                    사업
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <!--tab4 content-->
        <div class="tabmenu_content-item news" data-tab="tab4">
          <div class="m-content">
            <ul class="m-timeline">
              <li>
                <div class="m-timeline__date">2010<span></span></div>
                <ul class="detail">
                  <li><span class="detailD">01</span>삼성 냉열기 사업시작</li>
                  <li><span class="detailD">03</span>에어뱅크 사명 변경</li>
                  <li><span class="detailD">04</span>삼성 대리점 인가</li>
                  <li>
                    <span class="detailD">04</span>삼성전자 시스템 기술점 획득
                  </li>
                  <li><span class="detailD">04</span>자체 물류 시스템 운영</li>
                  <li>
                    <span class="detailD">06</span>시스템 에어컨 설치 품질
                    우수상 수상
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2009<span></span></div>
                <ul class="detail">
                  <li>
                    <span class="detailD">01</span>경기도 농업기술원 버섯연구소
                    CO2제어 시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">03</span>익산 국립식량과학원
                    하우스제어시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">05</span>대관령 암반대기
                    기상관측시스템 2set 설치
                  </li>
                  <li>
                    <span class="detailD">09</span>영주, 문경 농업기술센터
                    기상관측시스템 1set 설치
                  </li>
                  <li>
                    <span class="detailD">10</span>조기경보 시스템 기상관측장비
                    15set 설치
                  </li>
                  <li>
                    <span class="detailD">11</span>통가(Tonga) 기상관측시스템
                    1set 설치/중국 연변 기상관측시스템 1set 설치
                  </li>
                </ul>
              </li>

              <li>
                <div class="m-timeline__date">2008<span></span></div>
                <ul class="detail">
                  <li><span class="detailD">01</span>삼성 냉열기 사업시작</li>
                  <li><span class="detailD">03</span>에어뱅크 사명 변경</li>
                  <li><span class="detailD">04</span>삼성 대리점 인가</li>
                  <li>
                    <span class="detailD">04</span>삼성전자 시스템 기술점 획득
                  </li>
                  <li><span class="detailD">04</span>자체 물류 시스템 운영</li>
                  <li>
                    <span class="detailD">06</span>시스템 에어컨 설치 품질
                    우수상 수상
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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
      margin-bottom: 20px;
    }
    #ctt b{
        font-size: 1.5rem;
        color: #ff5607;
        line-height: 1.4em;
        margin-top: 20px;
        margin-bottom: 20px;
        font-family: 'Malgun Gothic', dotum, sans-serif;
    }
    #ctt span {
        font-size: 1.2rem;
        line-height: 1.2em;
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: 'Malgun Gothic', dotum, sans-serif;
    }
    /* .tabmenu(연혁)은 .ctt_history 일때만 나오게 */
    .tabmenu {
        display: none;
    }
    .ctt_history .tabmenu {
        display: block;
    }
</style>