@include('layouts.mobile.header')
@include('layouts.mobile.menu')


<style>
  #lnbMenu.lnb_menu_main .bg_on{left:15px}
</style>

<script>
  $('#lnbMenu .bg_on').width($('.bg_on').parents('li').width());
</script>

<script>
  // KM-1483 Amplitude
  $('#lnbMenu a').on('click', function(e){
      e.preventDefault();
      var $index = $(this).closest('li').index(), _event_name, _event_info;
      if($index === 0){
          _event_name = 'select_recommendation_subtab';
      }else if($index === 1){
          _event_name = 'select_new_product_subtab';
      }else if($index === 2){
          _event_name = 'select_popular_product_subtab';
      }else if($index === 3){
          _event_name = 'select_bargain_subtab';
      }else if($index === 4){
          _event_name = 'select_event_list_subtab';
      }
      _event_info = $(this).attr('href');

      KurlyTracker.setEventInfo(_event_info).setAction(_event_name).sendData();
      location.href = _event_info;
  });
</script>

<link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">

<style>
/* override */
#header .logo img {display: none}

/* ############## */
/* 메인 공지 팝업 */
/* ############## */
#mainNotice .main_popup{overflow:hidden;position:fixed;z-index:10000;left:20px;right:20px;border-radius:4px;background-color:#fff}
/*#mainNotice .main_popup.over{top:20px;bottom:20px}*/
#mainNotice .main_popup{top:50%;-webkit-transform:translate(0,-50%);-ms-transform:translate(0,-50%);transform:translate(0,-50%)}
#mainNotice .inner_mainpopup{position:relative;height:100%}
#mainNotice .pop_view{overflow-y:auto;max-height:82vh;padding-bottom:56px}
#mainNotice .pop_view img{vertical-align:top}
#mainNotice .pop_footer{overflow:hidden;position:absolute;left:0;bottom:0;width:100%;height:56px;background-color:#fff}
#mainNotice .pop_footer .btn{float:left;width:100%;height:100%;border:0 none;border-top:1px solid #f7f7f7;background-color:#fff;font-weight:600;font-size:16px;color:#333;}
#mainNotice .pop_select .btn{width:50%}
#mainNotice .pop_select .btn:last-child{border-left:1px solid #f7f7f7}
#bgLoadingNotice{display:none;position:fixed;z-index:9999;left:0;top:0;width:100%;height:100%;background-color:#000;opacity:0.5}
@media screen and (max-width:320px) {
    #mainNotice .pop_footer .btn{font-size:15px}
}


/* #### */
/* 공통 */
/* #### */
#bgLoading{display:block}
.page_main{min-height:100%;background-color:#fff;opacity:0}
.page_main > div:nth-child(3) .tit_goods{padding-top:0}
.page_main .bg{background-color:#f7f7f7}
.page_main img{width:100%;vertical-align:top}
.page_main .tit_goods{padding:16px 0 0 16px}
.page_main .tit_goods.top_short{padding-top:0}
.page_main .tit_goods .tit{font-weight:600;font-size:18px;line-height:22px;letter-spacing:0}
.page_main .tit_goods .name{display:block;padding:16px 0}
.page_main .top_short .name{padding-top:0}
.page_main .tit_goods .ico{padding-right:17px;background:url(https://res.kurly.com/mobile/service/main/2011/ico_title_link.svg) no-repeat 100% 2px;background-size:17px 17px}
.page_main .tit_goods .tit_desc{display:block;padding-top:4px;font-weight:400;font-size:14px;color:#999;line-height:17px;word-break:break-all}
/* 상품목록마지막_전체보기버튼 */
.page_main .list_goods{letter-spacing:0}
.page_main .list_goods .thumb_goods{display:block;background-color:#eee;background-repeat:no-repeat;background-position:50% 50%;background-size:cover}
.page_main .list_goods .thumb_goods .thumb{display:block;background-repeat:no-repeat;background-position:50% 50%;background-size:cover}
.page_main .list_goods .thumb_goods .ico{z-index:1}
.page_main .list_goods li.more{width:30.5%}
.page_main .list_goods li.more a{
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-tap-highlight-color: transparent;
}
.page_main .list_goods .more .txt{display:block;overflow:hidden;position:absolute;left:0;top:50%;width:100%;font-size:14px;line-height:19px;text-align:center;transform:translate(0%, -50%)}
.page_main .list_goods .more .thumb{display:block;width:45%;margin:0 auto 7px}

/* ####### */
/* 1종노출 */
/* ####### */
/* 1종노출+슬라이드+fullsize */
.main_type1{margin-bottom:16px}
.main_type1 .list_goods li{float:left}
.main_type1 .list_goods .paging{position:absolute;z-index:1;right:15px;bottom:15px;width:38px;height:20px;padding-top:2px;text-align:center;letter-spacing:1px}
.main_type1 .list_goods .paging.two{width:48px}
.main_type1 .list_goods .bg{position:absolute;z-index:0;left:0;top:0;width:100%;height:20px;border:1px solid #001;border-radius:11px;background-color:#000;opacity:0.15}
.main_type1 .list_goods .count{position:relative;z-index:1;top:1px;white-space:nowrap}
.main_type1 .list_goods .paging *{font-weight:600;font-size:12px;color:#fff;line-height:16px}

/* ####### */
/* 2종노출 */
/* ####### */
/* 2종노출+슬라이드 */
.main_type2 .list_goods{padding:0 16px}
.main_type2 .list_goods li{float:left;width:43.5%}
.main_type2 .list_goods .thumb_goods{width:100%}
.main_type2 .list_goods .ico{position:absolute;left:0;top:0;width:26%}
.main_type2 .list_goods .info_goods{height:108px}
.main_type2 .list_goods .name{display:block;overflow:hidden;max-height:38px;margin-top:8px;padding-right:8px;
    text-overflow:ellipsis;display: -webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;word-wrap:break-word
}
.main_type2 .list_goods .name .txt{font-size:14px;line-height:19px}
.main_type2 .list_goods .price{display:block;overflow:hidden;padding-top:4px;font-weight:700;font-size:14px;line-height:18px;white-space:nowrap;text-overflow:ellipsis}
.main_type2 .list_goods .dc{padding-right:5px;color:#fa622f;}
.main_type2 .list_goods .cost{display:block;overflow:hidden;padding-top:1px;font-size:12px;color:#999;line-height:16px;white-space:nowrap;text-overflow:ellipsis;text-decoration:line-through}
/* MD추천_카테고리메뉴 */
.category_type{padding-bottom:40px}
.category_type .tit_goods .name{padding-bottom:13px}
.category_type .category_menu{overflow:hidden;width:100%;height:65px}
.category_type .bg_category{position:relative;width:100%}
.category_type .bg_category:before,
.category_type .bg_category:after{content:"";position:absolute;left:15px;right:15px;top:0;height:1px;background-color:#f7f7f7}
.category_type .bg_category:after{top:49px}
.category_type .bg_shadow{position:absolute;z-index:1;top:1px;width:50px;height:42px;background:url(https://res.kurly.com/mobile/img/1812/bg_snb_100x2.png) repeat-y 0 0;background-size:50px 1px;pointer-events:none}
.category_type .shadow_before{display:none;left:0;-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg)}
.category_type .shadow_after{display:block;right:0}
.category_type .category{overflow-y:hidden;overflow-x:auto;width:100%;height:75px;padding-top:2px}
.category_type .list_category{position:relative;width:9999px}
.category_type .list_category li{float:left}
.category_type .list_category .bg{position:absolute;left:0;top:45px;width:0;height:2px;background-color:#5f0080}
.category_type .list_category .menu{overflow:hidden;float:left;margin-left:16px;padding:15px 0;font-size:14px;color:#999;line-height:18px;white-space:nowrap}
.category_type .list_category .on{font-weight:600;color:#5f0080}
/* MD추천_상품목록 */
.category_type .list_goods{overflow:hidden}
.category_type .list_goods li{position:relative;width:31.4%;margin-right:8px}
.category_type .list_goods li.cut{margin-right:0}
.category_type .list_goods .ico{width:34%}
.category_type .list_goods .info_goods{height:73px}
.category_type .list_goods .name .txt{font-size:12px;line-height:16px}
.category_type .list_goods .dc{padding-right:2px;font-size:12px}
.category_type .list_goods .price{display:inline;font-size:12px;line-height:20px}
.category_type .list_goods .cost{padding-top:0;font-size:10px;line-height:10px}
/* MD추천_전체보기 */
.category_type .link_cate{padding:6px 16px 0}
.category_type .link_cate .link{display:block;overflow:hidden;height:50px;padding-top:15px;border:1px solid #f7f7f6;border-radius:3px;background-color:#f7f7f7;text-align:center}
.category_type .link_cate .ico{padding:0 15px;background:url(https://res.kurly.com/mobile/service/main/1903/ico_more_link.png) no-repeat 100% -1px;background-size:18px 18px;font-size:14px;line-height:18px;letter-spacing:1px}

/* ####### */
/* 3종노출 */
/* ####### */
/* 3종노출이지만 레시피와 이벤트를 같이 사용 - 섹션클래스로 컨트롤해야함 */
.main_type3{padding-bottom:32px}
.main_type3 .list_goods{padding:0 16px}
/* 추천이벤트 */
.main_event .list_goods:after{content:"";display:block;font-size:0;line-height:0;clear:both}
.main_event .list_goods li{float:left;width:100%;padding-top:16px;font-size:0}
.main_event .list_goods li:first-child{padding-top:0}
.main_event .list_goods .thumb_goods{float:left;width:27%}
.main_event .list_goods .info_goods{position:relative;float:left;width:72.7%}
.main_event .list_goods .inner_info{position:absolute;left:0;top:52%;width:100%;padding-left:22px;transform:translate(0%, -50%);-webkit-transform:translate(0%, -50%)}
.main_event .list_goods .name .txt{font-weight:600;font-size:16px;line-height:22px}
.main_event .list_goods .desc{display:block;padding-top:4px}
.main_event .list_goods .desc .txt{font-size:14px;color:#999;line-height:20px}
/* 레시피 */
.main_recipe .list_goods li{float:left;width:69.5%}
.main_recipe .list_goods .more .txt{top:42%;width:98%}
.main_recipe .list_goods .info_goods{height:46px}
.main_recipe .list_goods .name{display:block;padding:10px 8px 0 0}
.main_recipe .list_goods .txt{display:block;overflow:hidden;max-height:38px;font-size:14px;line-height:19px;
  text-overflow:ellipsis;display: -webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;word-wrap:break-word
}

/* ######## */
/* 스페셜딜 */
/* ######## */
.main_special{padding-bottom:8px}
.main_special .tit_goods{padding-top:0}
.main_special .list_goods{padding:0 16px}
.main_special .list_goods li{float:none;width:100%;padding-bottom:24px}
.main_special .list_goods .thumb_goods{position:relative}
.main_special .list_goods .ico{position:absolute;left:0;top:0;width:14%}
.main_special .list_goods .bg{position:absolute;left:0;bottom:0;width:100%;height:34px;opacity:0.6}
.main_special .list_goods .count{position:absolute;left:0;bottom:3px;width:100%;text-align:center}
.main_special .list_goods .count .num{font-weight:900;font-size:20px;color:#fff;line-height:24px}
.main_special .list_goods .count .txt{font-weight:normal;font-size:12px;color:#fff;line-height:24px;vertical-align:4px}
.main_special .list_goods .name{display:block;overflow:hidden;width:100%;padding:8px 0 4px 2px;white-space:nowrap;text-overflow:ellipsis}
.main_special .list_goods .name .txt{font-size:16px;line-height:22px}
.main_special .list_goods .price{font-size:16px;line-height:22px}
.main_special .list_goods .dc{padding-right:3px;font-weight:bold;color:#fa622f}
.main_special .list_goods .in_price{display:inline}
.main_special .list_goods .selling{font-weight:bold}
.main_special .list_goods .cost{padding-left:3px;font-weight:400;font-size:14px;color:#999;text-decoration:line-through}
/* sold_out */
.main_special .list_goods .sold_out .bg{height:100%;background-color:#000;opacity:0.5}
.main_special .list_goods .sold_out .info{position:absolute;left:0;top:50%;width:100%;margin-top:3px;transform:translate(0, -50%);text-align:center}
.main_special .list_goods .sold_out .tit{display:block;font-weight:600;font-size:20px;color:#fff;line-height:24px}
.main_special .list_goods .sold_out .desc{display:block;padding:5px 10px 0;font-size:12px;color:#fff;line-height:16px;word-break:break-all}

/* #### */
/* 배너 */
/* #### */
.bnr_main .link{display:block;overflow:hidden;position:relative;width:100%;height:100%;background-color:#eee;background-size:cover;background-position:50% 50%}
.bnr_main .inner_link{position:absolute;left:0;top:50%;width:100%;padding:0 15px;transform:translate(0%, -50%)}
.bnr_main .tit{display:block;overflow:hidden;width:100%;font-weight:600;font-size:18px;line-height:26px;white-space:nowrap;text-overflow:ellipsis;text-align:center}
.bnr_main .txt{display:block;overflow:hidden;width:100%;font-size:14px;line-height:20px;white-space:nowrap;text-overflow:ellipsis;text-align:center}

  /*.page_main{opacity:1 !important;}*/
</style>

<div id="kurlyMain" class="page_main" style="opacity: 1;">
<h2 class="screen_out">마켓컬리 메인</h2>
<div>
  <div class="main_type1">
    <div
      class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
      <ul data-section="main_banner" class="list swiper-wrapper"
        style="transform: translate3d(-5625px, 0px, 0px); transition-duration: 0ms;">
        <li data-index="1" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629681453.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="2" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
          data-swiper-slide-index="1" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629973052.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="3" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
          data-swiper-slide-index="2" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629421493.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="4" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
          data-swiper-slide-index="3" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629027622.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="5" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629798099.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="6" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629880727.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="7" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="6"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629898689.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="8" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="7"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629878991.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="9" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="8"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628583840.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="10" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="9"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628814310.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="11" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="10"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1621561010.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="12" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="11"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1583112496.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="13" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="12"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1596164135.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="1" class="swiper-slide" data-swiper-slide-index="0" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629681453.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="2" class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629973052.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="3" class="swiper-slide swiper-slide-active" data-swiper-slide-index="2"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629421493.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="4" class="swiper-slide swiper-slide-next" data-swiper-slide-index="3" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629027622.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="5" class="swiper-slide" data-swiper-slide-index="4" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629798099.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="6" class="swiper-slide" data-swiper-slide-index="5" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629880727.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="7" class="swiper-slide" data-swiper-slide-index="6" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629898689.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="8" class="swiper-slide" data-swiper-slide-index="7" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629878991.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="9" class="swiper-slide" data-swiper-slide-index="8" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628583840.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="10" class="swiper-slide" data-swiper-slide-index="9" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628814310.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="11" class="swiper-slide" data-swiper-slide-index="10" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1621561010.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="12" class="swiper-slide" data-swiper-slide-index="11" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1583112496.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="13" class="swiper-slide" data-swiper-slide-index="12" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1596164135.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="1" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629681453.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="2" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
          data-swiper-slide-index="1" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629973052.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="3" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
          data-swiper-slide-index="2" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629421493.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="4" class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
          data-swiper-slide-index="3" data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629027622.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="5" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629798099.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="6" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629880727.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="7" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="6"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629898689.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="8" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="7"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1629878991.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="9" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="8"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628583840.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="10" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="9"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1628814310.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="11" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="10"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1621561010.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="12" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="11"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1583112496.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
        <li data-index="13" class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="12"
          data-name="main_banner">
          <!----> <a class="thumb_goods"
            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/1/mobile_img_1596164135.jpg&quot;);"><img
              alt="메인배너"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg=="></a>
        </li>
      </ul>
      <div class="paging two"><span class="bg"></span><span class="count swiper-pagination-fraction"><span
            class="swiper-pagination-current">3</span> / <span class="swiper-pagination-total">13</span></span></div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
  </div>
</div>
<div>
  <div class="main_type2">
    <div class="product_list swiper1">
      <div class="tit_goods">
        <h3 class="tit">
          <!----> <span class="name"> 이 상품 어때요?
            <!---->
          </span>
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="이 상품 어때요?" data-section="today_recommendation" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="today_recommendation"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1470294335365l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">친환경 무순 30g</a></span> <span class="price"><span
                  class="dc">5%</span>1,225원 </span> <span class="cost">1,290원</span></div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="today_recommendation"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1456402788121l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">친환경 햇 감자 600g</a></span> <span
                class="price"><span class="dc">5%</span>2,365원 </span> <span class="cost">2,490원</span></div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592799489859l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">친환경 미니 밤호박 (보짱) 1개</a></span> <span
                class="price"><span class="dc">5%</span>3,790원 </span> <span class="cost">3,990원</span></div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1618379687636l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[콜린스그린] 시트러스사워</a></span> <span
                class="price"><span class="dc">5%</span>8,075원 </span> <span class="cost">8,500원</span></div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+얼리버드쿠폰</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1621310746487l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[선물세트] 신앙촌 간장 명진 6호</a></span> <span
                class="price"><span class="dc">30%</span>26,600원 </span> <span class="cost">38,000원</span></div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/big/201511/385_shop1_556007.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[콜린스그린] 더 오렌지</a></span> <span
                class="price"><span class="dc">5%</span>16,720원 </span> <span class="cost">17,600원</span></div>
          </li>
          <li data-index="7" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1498615603724l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[아리조나] 아이스티 2종</a></span> <span class="price">
                <!---->2,800원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="8" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627632869421l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[유기방아] 찰수수부꾸미</a></span> <span
                class="price"><span class="dc">6%</span>9,150원 </span> <span class="cost">9,800원</span></div>
          </li>
          <li data-index="9" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1474247921995l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[우드앤브릭] 6 그레인 브레드</a></span> <span
                class="price">
                <!---->7,500원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="10" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/big/201509/325_shop1_348499.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[데체코] 엑스트라버진 올리브 오일</a></span> <span
                class="price"><span class="dc">7%</span>7,900원 </span> <span class="cost">8,500원</span></div>
          </li>
          <li data-index="11" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623653887520l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[크레이브푸드] 시저 샐러드 200g</a></span> <span
                class="price">
                <!---->5,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="12" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1607935872391l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[돈마루] 한돈 목살 구이용 300g</a></span> <span
                class="price"><span class="dc">8%</span>9,108원 </span> <span class="cost">9,900원</span></div>
          </li>
          <li data-index="13" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1605689066515l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">유기농 달수 고구마 1.5kg</a></span> <span
                class="price"><span class="dc">5%</span>13,205원 </span> <span class="cost">13,900원</span></div>
          </li>
          <li data-index="14" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1566362968250l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[우리밀] 백밀가루 &amp; 옛밀가루</a></span> <span
                class="price">
                <!---->3,600원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="15" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1607935549902l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[돈마루] 한돈 앞다리살 2종 (냉장)</a></span> <span
                class="price">
                <!---->5,300원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="16" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591853516135l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">바질 10g</a></span> <span class="price"><span
                  class="dc">5%</span>1,700원 </span> <span class="cost">1,790원</span></div>
          </li>
          <li data-index="17" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1464056216521l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[조선호텔김치] 오이소박이</a></span> <span class="price">
                <!---->26,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="18" class="cut swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593752126181l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">저탄소 GAP 백도 복숭아 1.8kg 내외 (5~7입)</a></span> <span
                class="price"><span class="dc">5%</span>17,955원 </span> <span class="cost">18,900원</span></div>
          </li>
          <li data-index="19" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1576837947884l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[사비니] 트러플 미니 3종 세트 (미니 트러플 세트 2호)</a></span>
              <span class="price"><span class="dc">20%</span>51,200원 </span> <span class="cost">64,000원</span></div>
          </li>
          <li data-index="20" class="swiper-slide" style="margin-right: 8px;" data-name="today_recommendation"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594177552715l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[일상味소] 샤브샤브 300g (냉동)</a></span> <span
                class="price"><span class="dc">10%</span>12,150원 </span> <span class="cost">13,500원</span></div>
          </li>
          <!---->
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type3 bg">
    <div class="main_event">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">특가/혜택</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <div class="list_goods">
        <ul data-title="특가/혜택" data-section="event" class="list">
          <li data-index="1"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg=="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/mobile_img_1629798112.jpg&quot;);"></a>
            <div class="info_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPsAAABeCAQAAABPqqpwAAAAAXNSR0IArs4c6QAAAERJREFUeAHtwTEBAAAAwiD7p14JT2AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAQbiyAAHjdLrpAAAAAElFTkSuQmCC"
                alt="">
              <div class="inner_info"><span class="name"><a class="txt">금주의 정육 최대 30% 할인</a></span> <span
                  class="desc"><a class="txt">버크셔부터 와규까지</a></span></div>
            </div>
          </li>
          <li data-index="2"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg=="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/mobile_img_1629892003.jpg&quot;);"></a>
            <div class="info_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPsAAABeCAQAAABPqqpwAAAAAXNSR0IArs4c6QAAAERJREFUeAHtwTEBAAAAwiD7p14JT2AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAQbiyAAHjdLrpAAAAAElFTkSuQmCC"
                alt="">
              <div class="inner_info"><span class="name"><a class="txt">풀무원다논 최대 15% 할인</a></span> <span
                  class="desc"><a class="txt">맛있게 챙기는 유산균</a></span></div>
            </div>
          </li>
          <li data-index="3"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg=="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/mobile_img_1630037859.jpg&quot;);"></a>
            <div class="info_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPsAAABeCAQAAABPqqpwAAAAAXNSR0IArs4c6QAAAERJREFUeAHtwTEBAAAAwiD7p14JT2AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAQbiyAAHjdLrpAAAAAElFTkSuQmCC"
                alt="">
              <div class="inner_info"><span class="name"><a class="txt">오늘 단 하루만! 바이오더마 추가10% 쿠폰</a></span> <span
                  class="desc"><a class="txt">지금이 기회, 2021 더모 뷰티 위크</a></span></div>
            </div>
          </li>
          <!---->
        </ul>
      </div>
    </div>
  </div>
</div>
<div>
  <div class="main_type2">
    <div class="product_list swiper2">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">놓치면 후회할 가격</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="놓치면 후회할 가격" data-section="theme_goods_20" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="theme_goods_20"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/154157243051l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[창화당] 모둠만두</a></span> <span class="price"><span
                  class="dc">15%</span>7,650원 </span> <span class="cost">9,000원</span></div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="theme_goods_20"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%쿠폰</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628752314739l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[기획특가] [바븐] 완도산 전복 1kg내외(생물)</a></span> <span
                class="price"><span class="dc">30%</span>29,900원 </span> <span class="cost">43,000원</span></div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_20"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1582018750937l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[햇반] 백미밥 210g (1입/6입)</a></span> <span
                class="price"><span class="dc">10%</span>6,120원 </span> <span class="cost">6,800원</span></div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_20"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1626341348405l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[이고진] 마사지볼 3종</a></span> <span
                class="price"><span class="dc">15%</span>4,165원 </span> <span class="cost">4,900원</span></div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_20"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1585888980538l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">냉동 [우주] 은빛제주통갈치(특대) 600g 내외(냉동)_국내산</a></span>
              <span class="price"><span class="dc">22%</span>31,122원 </span> <span class="cost">39,900원</span></div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_20"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1605080996933l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">향기가득 샤인머스켓 1송이 500g내외</a></span> <span
                class="price"><span class="dc">20%</span>13,520원 </span> <span class="cost">16,900원</span></div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;" data-name="theme_goods_20"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="bnr_main"><a class="link"
      style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/5/mobile_img_1629941500.jpg&quot;);"><span
        class="inner_link">
        <!---->
        <!---->
        <!---->
      </span> <img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAABMCAQAAAA8Az+vAAAAAXNSR0IArs4c6QAAAE5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeA3e9AABLRK7rwAAAABJRU5ErkJggg=="
        alt=""></a></div>
</div>
<div>
  <div class="main_type2">
    <div class="category_type">
      <div class="tit_goods">
        <h3 class="tit">
          <!----> <span class="name"> MD의 추천
            <!---->
          </span>
        </h3>
      </div>
      <div class="category_menu">
        <div class="bg_category"><span class="bg_shadow shadow_before" style="display: none;"></span> <span
            class="bg_shadow shadow_after"></span></div>
        <div class="category">
          <ul class="list_category" style="width: 1883px;">
            <li data-start="8" data-end="112"><a data-no="522" href="#none" class="menu"> 추석 선물세트 </a></li>
            <li data-start="112" data-end="156"><a data-no="907" href="#none" class="menu on"> 채소 </a></li>
            <li data-start="156" data-end="251"><a data-no="908" href="#none" class="menu"> 과일·견과·쌀 </a></li>
            <li data-start="252" data-end="375"><a data-no="909" href="#none" class="menu"> 수산·해산·건어물 </a></li>
            <li data-start="374" data-end="451"><a data-no="910" href="#none" class="menu"> 정육·계란 </a></li>
            <li data-start="452" data-end="575"><a data-no="911" href="#none" class="menu"> 국·반찬·메인요리 </a></li>
            <li data-start="574" data-end="679"><a data-no="912" href="#none" class="menu"> 샐러드·간편식 </a></li>
            <li data-start="680" data-end="775"><a data-no="913" href="#none" class="menu cut"> 면·양념·오일 </a></li>
            <li data-start="775" data-end="917"><a data-no="914" href="#none" class="menu"> 생수·음료·우유·커피 </a></li>
            <li data-start="917" data-end="1012"><a data-no="249" href="#none" class="menu"> 간식·과자·떡 </a></li>
            <li data-start="1012" data-end="1149"><a data-no="915" href="#none" class="menu"> 베이커리·치즈·델리 </a></li>
            <li data-start="1149" data-end="1221"><a data-no="032" href="#none" class="menu"> 건강식품 </a></li>
            <li data-start="1221" data-end="1326"><a data-no="918" href="#none" class="menu"> 생활용품·리빙 </a></li>
            <li data-start="1326" data-end="1459"><a data-no="233" href="#none" class="menu"> 스킨케어·메이크업 </a></li>
            <li data-start="1459" data-end="1568"><a data-no="012" href="#none" class="menu"> 헤어·바디·구강 </a></li>
            <li data-start="1568" data-end="1640"><a data-no="916" href="#none" class="menu"> 주방용품 </a></li>
            <li data-start="1640" data-end="1712"><a data-no="085" href="#none" class="menu"> 가전제품 </a></li>
            <li data-start="1712" data-end="1803"><a data-no="919" href="#none" class="menu"> 베이비·키즈 </a></li>
            <li data-start="1803" data-end="1875"><a data-no="991" href="#none" class="menu"> 반려동물 </a></li>
            <li class="bg" style="width: 28px; left: 119.891px;"></li>
          </ul>
        </div>
      </div>
      <div class="list_goods over">
        <ul data-title="MD의 추천" data-section="md_choice" class="list">
          <li data-index="1" class="" data-name="md_choice"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">기획특가</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/153543279519l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[기획특가] 친환경 감자 2kg</a></span> <span
                class="price">
                <!---->4,990원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="2" class="" data-name="md_choice"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1532654724641l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">깐대파 500g</a></span> <span class="price">
                <!---->2,690원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="3" class="cut" data-name="md_choice"><a class="thumb_goods"><span
                class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609141186826l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">친환경 당근 500g</a></span> <span class="price"><span
                  class="dc">5%</span>2,175원 </span> <span class="cost">2,290원</span></div>
          </li>
          <li data-index="4" class="" data-name="md_choice_2"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1626753823719l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">생여주 3입</a></span> <span class="price">
                <!---->7,990원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="5" class="" data-name="md_choice_2"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1491876649273l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">친환경 채소믹스 500g</a></span> <span class="price">
                <!---->5,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="6" class="cut" data-name="md_choice_2"><a class="thumb_goods"><span
                class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1608528305940l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">햇 양파 3kg</a></span> <span class="price">
                <!---->5,490원
              </span>
              <!---->
            </div>
          </li>
          <!---->
        </ul>
      </div>
      <div class="link_cate"><a class="link"><span class="ico">채소 전체보기</span></a></div>
    </div>
  </div>
</div>
<div>
  <div class="bnr_main"><a class="link"
      style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/7/mobile_img_1630028243.jpg&quot;);"><span
        class="inner_link">
        <!---->
        <!---->
        <!---->
      </span> <img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAABMCAQAAAA8Az+vAAAAAXNSR0IArs4c6QAAAE5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeA3e9AABLRK7rwAAAABJRU5ErkJggg=="
        alt=""></a></div>
</div>
<div>
  <div class="main_type2">
    <div class="product_list swiper3">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">지금 가장 핫한 상품</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="지금 가장 핫한 상품" data-section="theme_goods_21" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="theme_goods_21"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628848733114l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[삼성전자] 갤럭시워치 4 6종</a></span> <span
                class="price">
                <!---->269,000원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="theme_goods_21"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629180148342l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[프레시지] 연안식당 알폭탄 알탕</a></span> <span
                class="price">
                <!---->18,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_21"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1544496906306l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[사미헌] 양념 소갈빗살</a></span> <span class="price">
                <!---->23,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_21"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1608018960215l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[그래놀라하우스] 그래놀라 4종</a></span> <span
                class="price">
                <!---->13,500원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_21"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530775904997l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[LOTS OF LOVE] 차돌듬뿍 묵은지 볶음밥</a></span> <span
                class="price"><span class="dc">10%</span>7,020원 </span> <span class="cost">7,800원</span></div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_21"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593752126181l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">저탄소 GAP 백도 복숭아 1.8kg 내외 (5~7입)</a></span> <span
                class="price"><span class="dc">5%</span>17,955원 </span> <span class="cost">18,900원</span></div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;" data-name="theme_goods_21"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type2 bg" style="background-color: rgb(247, 247, 247);">
    <div class="product_list swiper4">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">필요한 것만 딱, 주방용품 특가</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="필요한 것만 딱, 주방용품 특가" data-section="theme_goods_9" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="theme_goods_9"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580881505571l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[네오플램] New FIKA 쿡웨어 팬 7종</a></span> <span
                class="price"><span class="dc">5%</span>28,405원 </span> <span class="cost">29,900원</span></div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="theme_goods_9"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+얼리버드쿠폰</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594637593342l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[선물세트] 도블레 칼집이 나지 않는 도마 세트 그린</a></span> <span
                class="price"><span class="dc">15%</span>42,330원 </span> <span class="cost">49,800원</span></div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_9"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1545197870633l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[마켓컬리X글라스락] 쿠킹볼 (4개입)</a></span> <span
                class="price"><span class="dc">15%</span>13,515원 </span> <span class="cost">15,900원</span></div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_9"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1603177699664l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[쿠진아트] 실리콘툴 10P 세트</a></span> <span
                class="price"><span class="dc">7%</span>37,107원 </span> <span class="cost">39,900원</span></div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_9"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1597761847133l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[그린팬] 그린쉐프 토콰즈 프라이팬 6종</a></span> <span
                class="price"><span class="dc">20%</span>29,520원 </span> <span class="cost">36,900원</span></div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_9"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627546063804l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[락앤락] 마카롱 주방가위 2종</a></span> <span
                class="price"><span class="dc">5%</span>2,755원 </span> <span class="cost">2,900원</span></div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;" data-name="theme_goods_9"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type2">
    <div class="product_list swiper5">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">마감세일</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="마감세일" data-section="deadline_sales" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1463994351328l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[쌜모네키친] 오로라 생연어 (냉장)</a></span> <span
                class="price"><span class="dc">13%</span>20,010원 </span> <span class="cost">23,000원</span></div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1596778409886l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">거반도 쫀득 납작복숭아 2종</a></span> <span
                class="price"><span class="dc">10%</span>10,710원 </span> <span class="cost">11,900원</span></div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627625737932l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[정미경키친] 10가지 그릴드 채소&amp;요거트소스</a></span> <span
                class="price"><span class="dc">13%</span>6,873원 </span> <span class="cost">7,900원</span></div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594714856643l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[도리깨침] 열무 들기름볶음</a></span> <span
                class="price"><span class="dc">5%</span>5,225원 </span> <span class="cost">5,500원</span></div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627629428711l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[정미경키친] 모둠숙쌈&amp;오이&amp;당근&amp;오이고추
                  세트</a></span> <span class="price"><span class="dc">13%</span>6,003원 </span> <span
                class="cost">6,900원</span></div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629426499937l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[두부씨의 건강한끼] 푸짐한 포두부 월남쌈 (리뉴얼)</a></span> <span
                class="price"><span class="dc">15%</span>12,665원 </span> <span class="cost">14,900원</span></div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type2 bg" style="background-color: rgb(247, 247, 247);">
    <div class="product_list swiper6">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">365일 최저가 도전</span> <span class="tit_desc">최저가 도전, 365일 언제나
              알뜰하게</span></a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="365일 최저가 도전" data-section="theme_goods_11" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="theme_goods_11"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">기획특가</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629771216564l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[바븐] 국산 흰다리새우 700g 내외(생물)</a></span> <span
                class="price"><span class="dc">10%</span>19,800원 </span> <span class="cost">22,000원</span></div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="theme_goods_11"><a class="thumb_goods"><span class="global_sticker"><span
                  class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">기획특가</span>
                      <!---->
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/153543279519l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">[기획특가] 친환경 감자 2kg</a></span> <span
                class="price">
                <!---->4,990원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_11"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628823505473l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[한트바커] 그릴드 냉장 닭가슴살 2종</a></span> <span
                class="price">
                <!---->13,250원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_11"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627880571518l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[서울우유 x 마켓컬리] 치즈다운 치즈</a></span> <span
                class="price">
                <!---->1,980원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_11"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617858663754l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[농심] 신라면 멀티 5입</a></span> <span class="price">
                <!---->3,680원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_11"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617171550430l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[KF365] 김구원선생 국내산 무농약 콩나물 300g</a></span> <span
                class="price">
                <!---->900원
              </span>
              <!---->
            </div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;" data-name="theme_goods_11"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type2">
    <div class="product_list swiper7">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">설레는 캠핑</span> <span class="tit_desc">캠핑 식재료부터 용품까지 맞춤
              제안</span></a>
          <!---->
        </h3>
      </div>
      <!---->
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="설레는 캠핑" data-section="theme_goods_12" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li data-index="1" class="swiper-slide swiper-slide-active" style="margin-right: 8px;"
            data-name="theme_goods_12"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1605152714137l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[더플랜] 왕의안주 - 모듬 꼬치 세트</a></span> <span
                class="price">
                <!---->9,900원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="2" class="swiper-slide swiper-slide-next" style="margin-right: 8px;"
            data-name="theme_goods_12"><a class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1502159554437l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[삼진어묵] 캠핑 어묵탕 2종</a></span> <span class="price">
                <!---->8,400원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="3" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_12"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609826308259l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[VIDAL] 베지 마쉬멜로우</a></span> <span class="price">
                <!---->2,500원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="4" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_12"><a
              class="thumb_goods"><span class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                    style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                    class="txt_sticker"><span><span class="emph_sticker">+20%</span>
                      <!---->
                    </span><span>
                      <!----> <span>쿠폰</span>
                    </span></span></span></span> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1616400779348l0.jpg&quot;);"></a>
            <div class="info_goods"><span class="name"><a class="txt">구이용 모둠 버섯 200g</a></span> <span
                class="price"><span class="dc">5%</span>2,270원 </span> <span class="cost">2,390원</span></div>
          </li>
          <li data-index="5" class="swiper-slide" style="margin-right: 8px;" data-name="theme_goods_12"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/161976377431l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[클라우드] 클리어 제로 6개입</a></span> <span
                class="price">
                <!---->5,980원
              </span>
              <!---->
            </div>
          </li>
          <li data-index="6" class="cut swiper-slide" style="margin-right: 8px;" data-name="theme_goods_12"><a
              class="thumb_goods">
              <!----> <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1620031911870l0.jpg&quot;);">
            </a>
            <div class="info_goods"><span class="name"><a class="txt">[SAC] 캠핑 컵 4P L</a></span> <span class="price">
                <!---->9,900원
              </span>
              <!---->
            </div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;" data-name="theme_goods_12"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg=="
                alt=""> <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
      <!---->
    </div>
  </div>
</div>
<div>
  <div class="main_type3">
    <div class="main_recipe">
      <div class="tit_goods">
        <h3 class="tit"><a class="name"><span class="ico">컬리의 레시피</span>
            <!---->
          </a>
          <!---->
        </h3>
      </div>
      <div
        class="list_goods swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
        <ul data-title="컬리의 레시피" data-section="kurly_recipe" class="list swiper-wrapper"
          style="transform: translate3d(0px, 0px, 0px);">
          <li class="swiper-slide swiper-slide-active" style="margin-right: 8px;"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_d84cc1aba13fb460.jpg&quot;);"></a>
            <div class="info_goods">
              <div class="inner_info"><span class="name"><a class="txt">레이어드 초밥</a></span></div>
            </div>
          </li>
          <li class="swiper-slide swiper-slide-next" style="margin-right: 8px;"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_f62a63d6a8542337.jpg&quot;);"></a>
            <div class="info_goods">
              <div class="inner_info"><span class="name"><a class="txt">어묵면볶이</a></span></div>
            </div>
          </li>
          <li class="swiper-slide" style="margin-right: 8px;"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_8ba32a3f9bb39517.jpg&quot;);"></a>
            <div class="info_goods">
              <div class="inner_info"><span class="name"><a class="txt">바질 토마토 에그인헬</a></span></div>
            </div>
          </li>
          <li class="swiper-slide" style="margin-right: 8px;"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_1f00c200359df1a0.jpg&quot;);"></a>
            <div class="info_goods">
              <div class="inner_info"><span class="name"><a class="txt">백김치말이 밥</a></span></div>
            </div>
          </li>
          <li class="swiper-slide" style="margin-right: 8px;"><a class="thumb_goods"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                alt="상품이미지" class="thumb"
                style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_38d7dec1b338849e.jpg&quot;);"></a>
            <div class="info_goods">
              <div class="inner_info"><span class="name"><a class="txt">단호박 곤약 콩국수</a></span></div>
            </div>
          </li>
          <li class="more swiper-slide" style="margin-right: 8px;"><a><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg==">
              <span class="txt"><img src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png"
                  alt="전체보러가기 아이콘" class="thumb">
                <!----> 전체보기
              </span></a></li>
        </ul><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
    </div>
  </div>
</div>
<div>
  <div class="bnr_main"><a class="link"
      style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/15/mobile_img_1629447527.jpg&quot;);"><span
        class="inner_link">
        <!---->
        <!---->
        <!---->
      </span> <img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAABMCAQAAAA8Az+vAAAAAXNSR0IArs4c6QAAAE5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeA3e9AABLRK7rwAAAABJRU5ErkJggg=="
        alt=""></a></div>
</div>
</div>

<div id="mainNotice">
<div id="mainNoticePop"> <!----></div>
</div>

<script src="https://res.kurly.com/js/lib/moment.min.js"></script>
<script src="{{ asset('js/mobile/common_filtercd3d.js') }}"></script>
<script src="{{ asset('js/mobile/main_v1cd3d.js') }}"></script>
<script src="{{ asset('js/main_notice_v1cd3d.js') }}"></script>
<script>
$(document).ready(function(){
    kurlyMain.update();
    chkGNBLogo('mobile'); // GNB Logo checking
});
</script>
<a href="#top" id="pageTop">맨 위로가기</a>

@include('layouts.mobile.footer')



