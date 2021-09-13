<link rel="stylesheet" href="{{ asset('css/desktop/menu/style.css') }}">

<div id="header">
  <script>
  // ie10 이하 페이지 이동
  var ieCheckAgent = navigator.userAgent.toLowerCase();
  if ((navigator.appName === 'Netscape' && navigator.userAgent.search('Trident') !== -1) || (ieCheckAgent.indexOf(
      "msie") !== -1)) {
    if (navigator.appName !== 'Netscape') {
      location.href = "/shop/event/browserUpdate.php";
    }
  }
  </script>

  <div class="bnr_header" id="top-message">


    <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/join/join_210825" id="eventLanding">
      지금 가입하고 인기상품 <b>100원</b>에 받아가세요!<img src="https://res.kurly.com/pc/ico/1908/ico_arrow_fff_84x84.png"
        class="bnr_arr">
      <div class="bnr_top">
        <div class="inner_top_close">
          <button id="top-message-close" class="btn_top_bnr">가입하고 혜택받기</button>
        </div>
      </div>
    </a>
    <script>
    // PROM-476 장차석 : GA) 이벤트 트래킹
    $('#eventLanding').on('click', function() {
      ga('send', 'event', 'click', 'general_header_sighup', location.href);
    });
    </script>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $("#top-message-close").on("click", function() {
      setCookie('top_msg_banner2', 'set_cookie', 1)
    });
    if (getCookie('top_msg_banner2') == 'set_cookie') {
      $("#top-message").hide()
    } else {
      $("#top-message").show();
    }
  });

  function setCookie(cookieName, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
    document.cookie = cookieName + "=" + cookieValue + "; path=/;"
  }

  function getCookie(cookieName) {
    cookieName = cookieName + '=';
    var cookieData = document.cookie;
    var start = cookieData.indexOf(cookieName);
    var cookieValue = '';
    if (start != -1) {
      start += cookieName.length;
      var end = cookieData.indexOf(';', start);
      if (end == -1) end = cookieData.length;
      cookieValue = cookieData.substring(start, end);
    }
    return unescape(cookieValue);
  }
  </script>

  <div id="userMenu">
    <ul class="list_menu">
      <li class="menu none_sub menu_join"><a href="/shop/member/join.php" class="link_menu">회원가입</a></li>
      <li class="menu none_sub menu_login"><a href="/shop/member/login.php" class="link_menu">로그인</a>
        <!---->
      </li>
      <!---->
      <li class="menu lst"><a href="/shop/board/list.php?id=notice" class="link_menu">고객센터</a>
        <ul class="sub">
          <li>
            <a href="#none"
              onclick="KurlyTrackerLink('/shop/board/list.php?id=notice', 'select_my_kurly_notice_list')">공지사항</a>
          </li>
          <li>
            <a href="#none" onclick="KurlyTrackerLink('/shop/service/faq.php', 'select_my_kurly_frequently_qna')">자주하는
              질문</a>
          </li>
          <li>
            <a href="#none"
              onclick="KurlyTrackerLink('/shop/mypage/mypage_qna.php', 'select_my_kurly_personal_inquiry_history')">1:1
              문의</a>
          </li>
          <!---->
          <li>
            <a href="#none" onclick="KurlyTrackerLink('/shop/mypage/offer.php', 'select_my_kurly_product_offer')">상품
              제안</a>
          </li>
          <li>
            <a href="#none"
              onclick="KurlyTrackerLink('/shop/mypage/echo_packing.php', 'select_my_kurly_eco_packing_feedback')">에코포장
              피드백</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <script src="{{ asset('js/desktop/usermenu_v1.js?ver=1.38.2') }}"></script>

  <script>
  $(document).ready(function() {

    userMenu.loginCheck = false;
  });
  </script>
  <!-- indent_style_remove -->
  <div id="headerLogo" class="layout-wrapper">
    <h1 class="logo">
      <a href="/index" class="link_main">
        <span id="gnbLogoContainer"></span>
        <img src="https://res.kurly.com/images/marketkurly/logo/logo_x2.png" alt="마켓컬리 로고" style="display: block;">
      </a>
    </h1>
    <a href="/shop/board/view.php?id=notice&amp;no=64" onclick="ga('send','event','etc','main_gif_btn_click');"
      class="bnr_delivery">
      <img src="https://res.kurly.com/pc/service/common/2011/delivery_210801.png" alt="샛별, 택배 배송안내" width="121"
        height="22">
    </a>
  </div>
  <div id="gnb">
    <h2 class="screen_out">메뉴</h2>
    <div id="gnbMenu" class="gnb_kurly">
      <div class="inner_gnbkurly">
        <div class="gnb_main">
          <ul class="gnb">
            <li class="menu1 dropdown dropdown-2">
              <a class="">
                <span class="ico"></span>
                <span class="txt">전체 카테고리</span>
              </a>

              <ul class="dropdown_menu dropdown_menu-2">
                <li class="dropdown_item-1">
                  <a class="menu_list menu-1">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/category/icon/pc/8ee34306-ea42-4fb0-acb0-c277c2a0ebd3" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/category/icon/pc/6acd722a-1a81-4587-969d-7ddc4f99989c" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">선물하기</span> 
                    </span>
                    <span class="icon_n">
                        <img src="https://res.kurly.com/pc/service/common/1908/ico_new_42x42_v2.png" class="ico_new" alt="new">
                    </span>
                  </a>
                  <ul class="sub_menu menu-1">
                    <li class="">
                      <a href="" class="sub"><span class="name">=== 카테고리별 ===</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">정육/수산/과일</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">베이커리/디저트/간편식</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">건강</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">뷰티/리빙</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">=== 가격대별 ===</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">3만원 미만</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">3~5만원 이하</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">5~10만원 이하</span></a> 
                    </li>
                    <li>
                      <a href="" class="sub"><span class="name">10만원 이상</span></a> 
                    </li>
                  </ul>
                </li>
                <li class="dropdown_item-2">
                  <a class="menu_list menu-2">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/category/icon/pc/943c7533-926a-4b40-8697-9dcf369b7bea" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/category/icon/pc/3d84784d-2b73-4289-8a92-c81a65edab7f" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">추석 선물세트</span> 
                    </span>
                    <span class="icon_n">
                      <img src="https://res.kurly.com/pc/service/common/1908/ico_new_42x42_v2.png" class="ico_new" alt="new">
                    </span>
                  </a>
                  <ul class="sub_menu menu-2">
                    <li class="">
                      <a class="sub"><span class="name">=== 카테고리별 ===</span></a> 
                    </li>
                    <li class="">
                      <a class="sub"><span class="name">홍삼·즙·건강식품</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">정육·가공육·건육</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">수산·건어물·젓갈</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">과일·견과·곡류</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">디저트·치즈·다과류</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">면·양념·오일·캔류</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">생활·주방·뷰티</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">간편식·반찬</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">=== 가격대별 ===</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">3만원 미만</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">3-5만원</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">5-10만원</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">10-20만원</span></a> 
                    </li>
                    <li>
                      <a class="sub"><span class="name">20만원 이상</span></a> 
                    </li>
                  </ul>
                </li>
                <li class="dropdown_item-3">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_veggies_inactive_pc@2x.1586324570.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_veggies_active_pc@2x.1586324570.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">채소</span>
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-4">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_fruit_inactive_pc@2x.1568684150.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_fruit_active_pc@2x.1568684150.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">과일·견과·쌀</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-5">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_seafood_inactive_pc@2x.1568684352.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_seafood_active_pc@2x.1568684353.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">수산·해산·건어물</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-6">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_meat_inactive_pc@2x.1568684452.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_meat_active_pc@2x.1568684452.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">정육·계란</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-7">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_side_inactive_pc@2x.1572243579.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_side_active_pc@2x.1572243579.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">국·반찬·메인요리</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-8">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_convenient_inactive_pc@2x.1572243542.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_convenient_active_pc@2x.1572243543.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">샐러드·간편식</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-9">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_sauce_inactive_pc@2x.1572243594.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_sauce_active_pc@2x.1572243594.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">면·양념·오일</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-10">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_snacks_inactive_pc@2x.1572243615.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_snacks_active_pc@2x.1572243616.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">생수·음료·우유·커피</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-11">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_cookie_inactive_pc.1610074008.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_cookie_active_pc.1610074008.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">간식·과자·떡</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-12">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_deli_inactive_pc@2x.1568687352.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_deli_active_pc@2x.1568687352.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">베이커리·치즈·델리</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-13">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_health_inactive_pc@2x.1574645922.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_health_active_pc@2x.1574645923.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">건강식품</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-14">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_living_inactive_pc@2x.1588814089.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_living_active_pc@2x.1588814090.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">생활용품·리빙</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-15">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_beauty_inactive_pc.1618488987.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_beauty_active_pc.1618488987.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">스킨케어·메이크업</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-16">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_body_inactive_pc.1618528534.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_body_active_pc.1618528534.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">헤어·바디·구강</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-17">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_kitchen_inactive_pc@2x.1574646457.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_kitchen_active_pc@2x.1574646458.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">주방용품</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-18">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_electronic__inactive_pc@2x.1574417978.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_electronic__active_pc@2x.1574417978.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">가전제품</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-19">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_kids_inactive_pc@2x.1568687537.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_kids_active_pc@2x.1568687537.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">베이비·키즈</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-20">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://img-cf.kurly.com/shop/data/category/icon_pet_inactive_pc@2x.1587442293.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://img-cf.kurly.com/shop/data/category/icon_pet_active_pc@2x.1587442294.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">반려동물</span> 
                    </span>
                  </a>
                </li>
                <li class="dropdown_item-21">
                  <a class="menu_list">
                    <span class="ico_">
                      <img src="https://res.kurly.com/pc/service/common/1908/ico_recommend_v2.png" alt="카테고리 아이콘" class="ico_off"> 
                      <!-- <img src="https://res.kurly.com/pc/service/common/1908/ico_recommend_on_v2.png" alt="카테고리 아이콘" class="ico_on"> -->
                    </span> 
                    <span class="tit">
                      <span class="txt">컬리의 추천</span> 
                    </span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu2"><a href="/new_product" class="link new "><span class="txt">신상품</span></a></li>
            <li class="menu3"><a href="/best_product" class="link best "><span class="txt">베스트</span></a></li>
            <li class="menu4"><a href="/thrify_shopping" class="link bargain "><span class="txt">알뜰쇼핑</span></a></li>
            <li class="lst"><a href="/goods" class="link event "><span class="txt">특가/혜택</span></a>
            </li>
          </ul>
          <div id="side_search" class="gnb_search">
            <form action="/shop/goods/goods_search.php?&amp;" onsubmit="return searchTracking(this)"><input
                type="hidden" name="searched" value="Y"> <input type="hidden" name="log" value="1"> <input type="hidden"
                name="skey" value="all"> <input type="hidden" name="hid_pr_text" value=""> <input type="hidden"
                name="hid_link_url" value=""> <input type="hidden" id="edit" name="edit" value=""> <input name="sword"
                type="text" id="sword" value="" required="required" label="검색어" placeholder="검색어를 입력해주세요."
                class="inp_search"> <input type="image"
                src="https://res.kurly.com/pc/service/common/1908/ico_search_x2.png" class="btn_search">
              <div class="init"><button type="button" id="searchInit" class="btn_delete">검색어 삭제하기</button></div>
            </form>
          </div>
          <div class="cart_count">
            <div class="inner_cartcount"><a href="/shop/goods/goods_cart.php" class="btn_cart"><span
                  class="screen_out">장바구니</span> <span id="cart_item_count" class="num realtime_cartcount"
                  style="display: none;"></span></a></div>
            <div id="addMsgCart" class="msg_cart"><span class="point"></span>
              <div class="inner_msgcart"><img src="https://res.kurly.com/images/common/bg_1_1.gif" alt="" class="thumb">
                <p id="msgReaddedItem" class="desc"><span class="tit"></span> <span class="txt">
                    장바구니에 상품을 담았습니다.
                    <span class="repeat">이미 담으신 상품이 있어 추가되었습니다.</span></span></p>
              </div>
            </div>
          </div>
          <div class="location_set"><button type="button" class="btn_location on">배송지 설정하기</button>

            <div class="layer_location">
              <div class="no_address"> <span class="emph">배송지를 등록</span>하고<br> 구매 가능한 상품을 확인하세요! <div
                  class="group_button double"> <button type="button" class="btn default login">로그인</button> <button
                    type="button" class="btn active searchAddress"><span class="ico"></span>주소검색</button> </div>
              </div>
            </div>
          </div>
        </div>
        <!-- inner_sub -->
      </div>
    </div>
  </div>
  <script src="../js/desktop/gnb_v1.js?ver=1.38.2"></script>
  <script type="text/javascript">
  //
  gnbMenu.update();

  // 검색창 클래스 추가/삭제
  var searchInputAction = (function() {
    var $target = {};

    var _searchInputAction = {
      setSeletor: function() {
        $target = {
          $parent: $('#gnb'),
          $search: $('#gnb [name=sword]'),
          $deleteBtn: $('#searchInit'),
          $edit: $('#edit')
        }

        this.setAction();
      },
      setAction: function() {
        var that = this;
        $target.$search.focus(function() {
          that.changeClass($target.$search, 'add', 'focus');
          that.deleteCheck();
        }).blur(function() {
          that.changeClass($target.$search, 'remove', 'focus');
          that.deleteCheck(false);
        }).on('keyup', function() {
          if ($target.$edit.val() !== 'Y') {
            $target.$edit.val('Y');
          }
          that.deleteCheck();
        });

        $target.$deleteBtn.on('click', function() {
          $target.$search.val('');
          that.deleteCheck();
        });
      },
      deleteCheck: function(type) {
        var that = this,
          count = $.trim($target.$search.val()).length;
        if (count === 0 || (typeof type !== 'undefined' && !type)) {
          that.changeClass($target.$deleteBtn, 'remove', 'on');
        } else {
          that.changeClass($target.$deleteBtn, 'add', 'on');
        }
      },
      changeClass: function(target, type, className) {
        if (type === 'add') {
          target.addClass(className);
        } else {
          target.removeClass(className);
        }
      }
    }

    _searchInputAction.setSeletor();
  })();

  // 로고 클릭 이벤트
  $('#header .link_main').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (url.indexOf('/') === 0) {
      url = window.location.origin + url;
    }

    KurlyTracker.setAction('select_main_logo', {
      "url": url
    }).sendData();
    location.href = url;
  });

  $('#gnb .gnb .link').on('click', function(e) {
    e.preventDefault();
    var _event_name, _event_info;
    if ($(this).hasClass('new')) {
      _event_name = 'select_new_product_subtab';
    } else if ($(this).hasClass('best')) {
      _event_name = 'select_popular_product_subtab';
    } else if ($(this).hasClass('bargain')) {
      _event_name = 'select_bargain_subtab';
    } else if ($(this).hasClass('event')) {
      _event_name = 'select_event_list_subtab';
    }
    _event_info = $(this).attr('href');

    KurlyTracker.setEventInfo(_event_info).setAction(_event_name).sendData();
    location.href = _event_info;
  });

  // 장바구니 아이콘 클릭이벤트
  $('#gnbMenu .btn_cart').on('click', function(e) {
    e.preventDefault();
    KurlyTracker.setAction('select_cart').sendData();
    location.href = $(this).attr('href');
  });
  </script>

  <a href="#top" id="scroll_up" class="on" style="opacity: 1; bottom: 15px;" alt="맨 위로가기"></a>

  <script src="{{ asset('js/desktop/menu/nav.js') }} "></script>
</div>