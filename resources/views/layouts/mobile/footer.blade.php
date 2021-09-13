<div id="layerDSR">
  <div class="bg_dim"></div>
  <div class="in_layer">
    <div class="inner_layer layer_star">
      <strong class="dsr_result">샛별배송 지역입니다.</strong>
      <div class="ani">
        <img data-src="https://res.kurly.com/mobile/img/1908/img_delivery_kurly.png"
          data-cfsrc="https://res.kurly.com/mobile/service/common/bg_1x1.png" alt="샛별배송 이미지"
          src="https://res.kurly.com/mobile/service/common/bg_1x1.png">
      </div>
      <p class="dsr_desc default_cutoff_23_7">
        오늘 <strong class="emph">밤 11시 전</strong>까지 주문 시<br>
        <strong class="emph">다음날 아침 7시 이전</strong> 도착합니다!
      </p>
      <p class="dsr_desc early_cutoff_20_8">
        오늘 <strong class="emph">밤 8시 전</strong>까지 주문 시<br>
        <strong class="emph">다음날 아침 8시 이전</strong> 도착합니다!
      </p>
    </div>
    <div class="inner_layer layer_normal">
      <strong class="dsr_result">택배배송 지역입니다.</strong>
      <div class="ani">
        <img data-src="https://res.kurly.com/mobile/img/1908/img_delivery_car.png"
          data-cfsrc="https://res.kurly.com/mobile/service/common/bg_1x1.png" alt="택배배송 이미지"
          src="https://res.kurly.com/mobile/service/common/bg_1x1.png">
      </div>
      <p class="dsr_desc">
        <strong class="emph">밤 8시 전</strong>까지 주문 시<br>
        <strong class="emph">다음날</strong> 도착합니다!
      </p>
      <p class="dsr_notice">일요일은 배송 휴무로 토요일에는 주문 불가</p>
    </div>
    <div class="inner_layer layer_none">
      <strong class="dsr_result">배송 불가 지역입니다.</strong>
      <div class="ani">
        <img data-src="https://res.kurly.com/mobile/img/1908/img_delivery_none.png"
          data-cfsrc="https://res.kurly.com/mobile/service/common/bg_1x1.png" alt="배송불가 이미지"
          src="https://res.kurly.com/mobile/service/common/bg_1x1.png">
      </div>
      <p class="dsr_desc">
        <strong class="emph">도로명 주소</strong>로 검색하셨다면,<br>
        <strong class="emph">지번 주소(구 주소)</strong>로 다시 시도해주세요.
      </p>
      <p class="dsr_notice">배송지역을 확장하도록 노력하겠습니다!</p>
    </div>
    <div class="layer_btn1">
      <button type="button" class="layer_close"
        onclick="$('#layerDSR').hide();$(this).parent().find('.inner_layer').hide();">확인</button>
    </div>
  </div>
</div>

<footer id="footer" style="opacity: 1; display:block;">
  <ul class="list_menu">
    <li><a href="/m2/introduce/about_kurly.php" class="link">컬리소개</a></li>
    <li><a href="/m2/proc/guide.php" class="link">이용안내</a></li>
    <li><a href="/m2/event/kurlyEvent.php?htmid=event/delivery_search/delivery_search" class="link">배송안내</a></li>
    <li><a href="#none" onclick="KurlyTrackerLink('/m2/service/faq.php', 'select_bottom_frequently_qna_button')"
        class="link">자주하는 질문</a></li>
    <li class="notice"><a href="/m2/board/list.php?id=notice" class="link">공지사항</a></li>
    <li><a href="https://marketkurly.recruiter.co.kr/appsite/company/index" class="link" target="_blank">인재채용</a></li>
    <li><a href="/m2/service/agrmt.php" class="link">이용약관</a></li>
    <li><a href="/m2/service/private.php" class="link emph">개인정보처리방침</a></li>
  </ul>
  <ul class="list_sns">
    <li><a href="https://instagram.com/marketkurly" target="_blank" class="link ico_instagram">마켓컬리 인스타그램 바로가기</a></li>
    <li><a href="https://www.facebook.com/marketkurly" target="_blank" class="link ico_fb">마켓컬리 페이스북 바로가기</a></li>
    <li><a href="http://blog.naver.com/marketkurly" target="_blank" class="link ico_blog">마켓컬리 네이버 블로그 바로가기</a></li>
    <li><a href="https://m.post.naver.com/marketkurly" target="_blank" class="link ico_post">마켓컬리 네이버 포스트 바로가기</a></li>
    <li><a href="https://www.youtube.com/channel/UCfpdjL5pl-1qKT7Xp4UQzQg" target="_blank" class="link ico_youtube">마켓컬리
        유튜브 바로가기</a></li>
  </ul>
  <div class="customer">
    <strong class="tit">고객행복센터</strong>
    <div class="tel">
      <a href="tel:16441107" onclick="KurlyTracker.setAction('select_bottom_call_button').sendData();"
        class="link">1644-1107</a>
    </div>
    <p class="txt">
      365고객센터 <span class="bar">|</span> 오전 7시 - 오후 7시
    </p>
  </div>
  <div class="kakaotalk">
    카카오톡 <a href="#none" class="link">@마켓컬리</a> 친구 추가하고 소식과 혜택을 받아보세요.
    <div id="plusfriend-addfriend-button"><a href="#"><img
          src="https://developers.kakao.com/assets/img/about/logos/plusfriend/friendadd_small_yellow_rect.png"
          title="플러스친구 친구 추가 버튼" alt="플러스친구 친구 추가 버튼"></a></div>
  </div>
  <div class="company">
    주식회사 컬리 <span class="bar">|</span> 대표이사 : 김슬아
    <br>
    개인정보보호책임자 : 이원준
    <br>
    사업자등록번호 : 261-81-23567 <a href="http://www.ftc.go.kr/bizCommPop.do?wrkr_no=2618123567&amp;apv_perm_no="
      target="_blank" class="link">사업자정보 확인</a>
    <br>
    통신판매업 : 제 2018-서울강남-01646 호
    <br>
    주소 : 서울특별시 강남구 테헤란로 133, 18층(역삼동)
    <div class="contact">
      입점문의 : <a href="https://forms.gle/oKMAe1SaicqMX3SC9" target="_blank" class="link">입점문의하기</a>
      <br>
      제휴문의 : <a href="mailto:business@kurlycorp.com" class="link">business@kurlycorp.com</a>
      <br>
      채용문의 : <a href="mailto:recruit@kurlycorp.com" class="link">recruit@kurlycorp.com</a>
      <br>
      팩스 : 070-7500-6098 <span class="bar">|</span> 이메일 : <a href="mailto:help@kurlycorp.com"
        class="link">help@kurlycorp.com</a>
    </div>
  </div>
  <div class="certification">
    <a href="https://res.kurly.com/pc/img/1909/img_isms.jpg" target="_blank" class="desc isms">
      <img data-cfsrc="https://res.kurly.com/pc/ico/2001/logo_isms.png" alt="isms 로고" class="logo"
        src="https://res.kurly.com/pc/ico/2001/logo_isms.png">
      <p class="txt">
        [인증범위] 마켓컬리 쇼핑몰 서비스 개발 · 운영<br>
        [유효기간] 2019.04.01 ~ 2022.03.31
      </p>
    </a>
    <a href="https://www.eprivacy.or.kr/front/certifiedSiteMark/certifiedSiteMarkPopup.do?certCmd=EP&amp;certNum=2021-EP-R003"
      target="_blank" class="desc eprivacy">
      <img data-cfsrc="https://res.kurly.com/pc/ico/2001/logo_eprivacyplus.png" alt="isms 로고" class="logo"
        src="https://res.kurly.com/pc/ico/2001/logo_eprivacyplus.png">
      <p class="txt">
        개인정보보호 우수 웹사이트 ·<br>
        개인정보처리시스템 인증 (ePRIVACY PLUS)
      </p>
    </a>
  </div>
</footer>

<script>
  (function (theFrame) {
    theFrame.contentWindow.location.href = theFrame.src;
  }(document.getElementById("ifrmHidden")));

</script>

<style>
  #header-bottom{
    height:calc(49px + env(safe-area-inset-bottom));
  }
  #goods-view-form{
    padding-bottom:calc(13px + env(safe-area-inset-bottom));
  }
</style>

<script src="https://res.kurly.com/js/polifill/customeEvent.js"></script>

<script>
  window.addEventListener('load', function () {
    // KM-1238 branch
    (function(b,r,a,n,c,h,_,s,d,k){if(!b[n]||!b[n]._q){for(;s<_.length;)c(h,_[s++]);d=r.createElement(a);d.async=1;d.src="https://cdn.branch.io/branch-latest.min.js";k=r.getElementsByTagName(a)[0];k.parentNode.insertBefore(d,k);b[n]=h}})(window,document,"script","branch",function(b,r){b[r]=function(){b._q.push([r,arguments])}},{_q:[],_v:1},"addListener applyCode autoAppIndex banner closeBanner closeJourney creditHistory credits data deepview deepviewCta first getCode init link logout redeem referrals removeListener sendSMS setBranchViewData setIdentity track validateCode trackCommerceEvent logEvent disableTracking".split(" "), 0);
    branch.init('key_live_meOgzIdffiVWvdquf7Orkacksxa2LneN');
    // branch.init('key_test_joIkrHgomhL3qaEreXL5QdigzEn6Ucd4',{
    //     'make_new_link': true
    // });
    branch.setIdentity(uuidCheck);
    branch.track("pageview");

    // branchReady
    var _eventBranchReady = new CustomEvent("branchReady", {
      detail:{ // 전달 할께 있으면 반드시 detail 오브젝트에 넣어야 함
        val:'1',
      }
    });
    document.dispatchEvent(_eventBranchReady);
    // END branchReady

    var linkData = {
      campaign: 'Organic',
      channel: 'Kurly_MobileWeb',
      feature: 'Organic',
      stage: 'Kurly_MobileWeb',
      tags: [location.href],
      alias: '',
      data: {
        // '$deeplink_path' : 'product?no=3500',
        // '$uri_redirect_mode' : 1,
        'custom_bool': true,
        'custom_int': Date.now(),
        'custom_string': '',
        '$og_title': '마켓컬리 :: 내일의 장보기, 마켓컬리',
        '$og_description': 'Love Food, Love Life. 마켓컬리! 당일 수확 채소, 과일, 맛집 음식까지 내일 아침 문 앞에서 만나요!',
        '$og_image_url':'https://res.kurly.com/images/marketkurly/logo/logo_sns_marketkurly.jpg'
      }
    };
    branch.setBranchViewData(linkData);
    branch.closeJourney();
    branch.addListener('didClickJourneyCTA',function(){
      ga('send', 'event', 'click', 'download', 'http://www.kurly.com/m2/');
    });
  }, false);
</script>

<style>
  /* 메인 및 신규회원이벤트 페이지 앱 다운로드 배너 style + js */
  #branch-banner-iframe{z-index:40 !important;bottom:49px !important;bottom:calc(49px + env(safe-area-inset-bottom)) !important;}
</style>

<script src="{{ asset('js/mobile/imc202102.bundlecd3d.js') }}"></script>

  </body>
</html>