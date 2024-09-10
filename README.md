### 작업내용

작업본 저장만 하는 레포지토리임. 실제로 서버로 올리는건 수동으로 함.

### 링크

- 작업중인 페이지 : http://da-bong.com/dabong/2024/index.php
- 기존 페이지 : http://da-bong.com/
- 엑셀자료 ([구글시트](https://docs.google.com/spreadsheets/d/1PAkG4SmaGGU9PU3spmGWQX7mXE8r-BjZk74BKfVe8K0/edit?gid=1658128449#gid=1658128449))
- 작업중인 관리자페이지 : http://da-bong.com/dabong/adm/
- 깃허브 : https://github.com/YoHaiYo/freelancen__dabong

### 내용관리 파일

- theme>basic>skin>content>basic>content.skin.php : CEO인사, 연혁 페이지에 사용됨.
  -> ctt\_클래스명 으로 따로 관리함.

* 연혁은 내용관리에서 {{ }} 안에 문자열을 적절하게 파싱해서 ui로 바꾸도록 작업했습니다.

### 이미지 경로

/dabong부터 시작
예시 :

```
<img src="/dabong/theme/basic/img/logo_init 2.png" alt="">
```
