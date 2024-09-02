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
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // #ctt_con 요소를 가져옵니다.
    const cttCon = document.querySelector('#ctt_con');
    
    // .ctt_history 내부의 모든 태그를 가져옵니다.
    const elements = document.querySelectorAll('.ctt_history *');
    
    // .tabmenu_menu를 동적으로 생성합니다.
    const tabMenuContainer = document.createElement('div');
    tabMenuContainer.className = 'tabmenu_menu';

    // .history__list를 동적으로 생성합니다.
    const historyListContainer = document.createElement('div');
    historyListContainer.className = 'history__list';

    // 추출된 텍스트들을 담을 Set을 만듭니다.
    const uniqueTexts = new Set();

    elements.forEach(function(element) {
        // 태그의 텍스트 내용에서 {%와 %} 사이의 텍스트를 추출하기 위한 정규식을 사용합니다.
        const matches = element.textContent.match(/\{\%(.*?)\%\}/g);

        if (matches) {
            matches.forEach(function(match) {
                // {%와 %}를 제거하고 텍스트만 추출합니다.
                const text = match.replace(/\{\%|\%\}/g, '');
                
                // |로 구분된 두 부분을 추출합니다.
                const parts = text.split('|');

                if (parts.length === 2) {
                    // 유일한 텍스트만을 처리합니다.
                    uniqueTexts.add(parts[0].trim());
                    
                    // .history__list 내에 추가할 div를 생성합니다.
                    const classA = document.createElement('div');
                    classA.className = 'tab__class_a';
                    const pA = document.createElement('p');
                    pA.textContent = parts[0].trim();
                    classA.appendChild(pA);
                    
                    const classB = document.createElement('div');
                    classB.className = 'tab__class_b';
                    const pB = document.createElement('p');
                    pB.textContent = parts[1].trim();
                    classB.appendChild(pB);
                    
                    const historyItem = document.createElement('div');
                    historyItem.className = 'history__item';
                    historyItem.appendChild(classA);
                    historyItem.appendChild(classB);

                    // .history__list 컨테이너에 추가합니다.
                    historyListContainer.appendChild(historyItem);
                }
            });
        }
    });

    // 추출된 유일한 텍스트들을 기반으로 label 요소를 생성합니다.
    let tabIndex = 1;
    uniqueTexts.forEach(function(text) {
        // 새로운 label 요소를 생성합니다.
        const newLabel = document.createElement('label');
        
        // label의 클래스와 for 속성을 설정합니다.
        newLabel.className = 'tabmenu_menu-item';
        newLabel.setAttribute('for', `tab${tabIndex}`);

        // label의 내용을 추출된 텍스트로 설정합니다.
        newLabel.innerHTML = text;

        // 생성된 label을 .tabmenu_menu 컨테이너에 추가합니다.
        tabMenuContainer.appendChild(newLabel);

        // 인덱스를 증가시킵니다.
        tabIndex++;
    });

    // 생성된 .tabmenu_menu와 .history__list를 #ctt_con에 추가합니다.
    cttCon.appendChild(tabMenuContainer);
    cttCon.appendChild(historyListContainer);
});

</script>