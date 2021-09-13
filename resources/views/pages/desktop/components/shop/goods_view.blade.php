@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
    <div id="content" style="opacity: 1;">

        <div id="qnb" class="quick-navigation" style="top: 20px;">
            <style>
                #qnb {
                    position: absolute;
                    z-index: 1;
                    right: 20px;
                    top: 70px;
                    width: 80px;
                    font: normal 12px/16px "Noto Sans";
                    color: #333;
                    letter-spacing: -0.3px;
                    transition: top 0.2s
                }

                .goods-goods_view #qnb {
                    top: 20px
                }

                /* 배너 */
                #qnb .bnr_qnb {
                    padding-bottom: 7px
                }

                #qnb .bnr_qnb .thumb {
                    width: 80px;
                    height: 120px;
                    vertical-align: top
                }

                /* 메뉴 */
                #qnb .side_menu {
                    width: 80px;
                    border: 1px solid #ddd;
                    border-top: 0 none;
                    background-color: #fff
                }

                #qnb .link_menu {
                    display: block;
                    height: 29px;
                    padding-top: 5px;
                    border-top: 1px solid #ddd;
                    text-align: center
                }

                #qnb .link_menu:hover,
                #qnb .link_menu.on {
                    color: #5f0080
                }

                /* 최근본상품 */
                #qnb .side_recent {
                    position: relative;
                    margin-top: 6px;
                    border: 1px solid #ddd;
                    background-color: #fff
                }

                #qnb .side_recent .tit {
                    display: block;
                    padding: 22px 0 6px;
                    text-align: center
                }

                #qnb .side_recent .list_goods {
                    overflow: hidden;
                    position: relative;
                    width: 60px;
                    margin: 0 auto
                }

                #qnb .side_recent .list {
                    position: absolute;
                    left: 0;
                    top: 0
                }

                #qnb .side_recent .link_goods {
                    display: block;
                    overflow: hidden;
                    width: 60px;
                    height: 80px;
                    padding: 1px 0 2px
                }

                #qnb .side_recent .btn {
                    display: block;
                    overflow: hidden;
                    width: 100%;
                    height: 17px;
                    border: 0 none;
                    font-size: 0;
                    line-height: 0;
                    text-indent: -9999px
                }

                #qnb .side_recent .btn_up {
                    position: absolute;
                    left: 0;
                    top: 0;
                    background: url(https://res.kurly.com/pc/service/main/2002/ico_quick_up_hover.png) no-repeat 50% 50%
                }

                #qnb .side_recent .btn_up.off {
                    background: url(https://res.kurly.com/pc/service/main/2002/ico_quick_up.png) no-repeat 50% 50%
                }

                #qnb .side_recent .btn_down {
                    background: url(https://res.kurly.com/pc/service/main/2002/ico_quick_down_hover.png) no-repeat 50% 0
                }

                #qnb .side_recent .btn_down.off {
                    background: url(https://res.kurly.com/pc/service/main/2002/ico_quick_down.png) no-repeat 50% 0
                }


                @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
                only screen and (min-device-pixel-ratio: 1.5),
                only screen and (min-resolution: 1.5dppx) {
                    #qnb .side_recent .btn_up {
                        background-image: url(https://res.kurly.com/pc/service/main/2002/ico_quick_up_hover_x2.png);
                        background-size: 12px 18px
                    }

                    #qnb .side_recent .btn_down {
                        background-image: url(https://res.kurly.com/pc/service/main/2002/ico_quick_down_hover_x2.png);
                        background-size: 12px 18px
                    }

                    #qnb .side_recent .btn_up.off {
                        background-image: url(https://res.kurly.com/pc/service/main/2002/ico_quick_up_x2.png);
                        background-size: 12px 18px
                    }

                    #qnb .side_recent .btn_down.off {
                        background-image: url(https://res.kurly.com/pc/service/main/2002/ico_quick_down_x2.png);
                        background-size: 12px 18px
                    }
                }

                @media all and (max-width: 1250px) {
                    #qnb {
                        display: none
                    }
                }

            </style>

            <div class="bnr_qnb" id="brnQuick"><a href="/shop/board/view.php?id=notice&amp;no=64"
                    id="brnQuickObj">
                    <img class="thumb" src="https://res.kurly.com/pc/service/main/1904/bnr_quick_20190403.png"
                        alt="퀄리티있게 샛별배송">
                </a>
                <script>
                    var brnQuickScript = (function() {
                        var $target = $('#brnQuickObj'),
                            $targetThumb = $('#brnQuickObj .thumb');
                        // 시간체크
                        function timeCheck() {
                            var now = brnQuick.nowTime; // 호출 하는 js에서 변수선언되어 가져다 사용
                            if (new Date('2020-12-31T11:00:00+09:00').getTime() <= now && now < new Date(
                                    '2021-01-15T11:00:00+09:00').getTime()) {
                                $target.attr('href', '/shop/event/kurlyEvent.php?htmid=event/2020/1231/newyearsday');
                                $targetThumb.attr('src', 'https://res.kurly.com/pc/service/main/2012/bnr_quick.png');
                                $targetThumb.attr('alt', '2021 설 선물');
                            } else if (new Date('2021-01-15T11:00:00+09:00').getTime() <= now && now <= new Date(
                                    '2021-02-10T23:00:00+09:00').getTime()) {
                                $target.attr('href', '/shop/event/kurlyEvent.php?htmid=event/2021/0115/newyearsday');
                                $targetThumb.attr('src', 'https://res.kurly.com/pc/service/main/2101/bnr_quick.png');
                                $targetThumb.attr('alt', '2021 설 선물');
                            }
                        }
                        return {
                            timeCheck: timeCheck
                        }
                    })();
                    brnQuickScript.timeCheck();
                </script>


            </div>
            <script>
                var brnQuick = {
                    nowTime: '1631498198336',
                    update: function() {
                        $.ajax({
                            url: campaginUrl + 'pc/service/bnr_quick.html'
                        }).done(function(result) {
                            $('#brnQuick').html(result);
                        });
                    }
                }
                brnQuick.update();
            </script>

            <div class="side_menu">
                <a href="/shop/main/html.php?htmid=event/kurly.htm&amp;name=lovers" class="link_menu ">등급별 혜택</a>
                <a href="/shop/board/list.php?id=recipe" class="link_menu ">레시피</a>
                <a href="/shop/goods/goods_review_best.php" class="link_menu ">베스트 후기</a>
            </div>
            <div class="side_recent" style="">
                <strong class="tit">최근 본 상품</strong>
                <div class="list_goods" data-height="209" style="height: 80px;">
                    <ul class="list">
                        <li><a class="link_goods" href="/shop/goods/goods_view.php?goodsno=83882"><img
                                    src="https://img-cf.kurly.com/shop/data/goods/1630772639152y0.jpg" alt=""></a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn_up off">최근 본 상품 위로 올리기</button>
                <button type="button" class="btn btn_down off">최근 본 상품 아래로 내리기</button>
            </div>
            <script>
                /**
                 * 상품상세일때 현재 보고 있는 상품 담기. 상품URL & 상품이미지
                 * 최종 저장 날짜로 부터 24시가 지날시 localStorage 삭제
                 */
                var getGoodsRecent = (function() {
                    var i, len, getGoodsRecent, item, _nowTime = '1631498198336';

                    _goodsRecent();

                    function _goodsRecent() {
                        if (localStorage.getItem('goodsRecent') === null) {
                            return false;
                        }

                        try {
                            getGoodsRecent = JSON.parse(localStorage.getItem("goodsRecent"));
                            len = getGoodsRecent.length;
                            if (addDays(getGoodsRecent[len - 1].time, 1) < _nowTime) {
                                localStorage.removeItem('goodsRecent');
                            } else {
                                for (i = 0; i < len; i++) {
                                    item = '<li><a class="link_goods" href="/shop/goods/goods_view.php?goodsno=' +
                                        getGoodsRecent[i].no + '"><img src="' + getGoodsRecent[i].thumb +
                                        '" alt=""></a></li>';
                                    $('.side_recent .list').append(item);
                                }
                                $('.side_recent').show();
                            }
                        } catch (e) {
                            console.log("JSON parse error from the Quick menu goods list!!!", e);
                        }
                    }

                    function addDays(date, days) {
                        var result = new Date(date);
                        result.setDate(result.getDate() + days);
                        return result.getTime();
                    }

                    // return {
                    // }
                })();
            </script>
        </div>
        <style>
            #content {
                opacity: 0
            }

            /* vue사용시 화면 깜빡임방지 */

        </style>
        <div class="section_view">

            <div id="shareLayer">
                <div class="layer_share">
                    <div class="inner_layersns">
                        <h3 class="screen_out">SNS 공유하기</h3>
                        <ul class="list_share">
                            <li><a class="btn btn_fb" data-sns-name="페이스북" data-sns="facebook" href="#none"><img
                                        src="https://res.kurly.com/mobile/service/goodsview/1804/ico_facebook.png"
                                        alt="페이스북"><span class="txt">공유하기</span></a></li>
                            <li><a class="btn btn_tw" data-sns-name="트위터" data-sns="twitter" href="#none"><img
                                        src="https://res.kurly.com/mobile/service/goodsview/1804/ico_twitter.png"
                                        alt="트위터"><span class="txt">트윗하기</span></a></li>
                            <li class="btn_url">
                                <input type="text" class="inp" value="" readonly="readonly">
                                <a class="btn_copy off" data-sns-name="링크 복사" data-sns="copy" href="#none">URL 복사<img
                                        src="https://res.kurly.com/mobile/service/goodsview/1804/ico_checked_x2.png"
                                        alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="sectionView">
                <div class="inner_view">
                    <div class="thumb"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568441796y0.jpg&quot;);">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAHnCAQAAADpr9U2AAABeUlEQVR42u3BMQEAAADCoPVPbQ0PoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALg0lPQAATTM2xoAAAAASUVORK5CYII="
                            alt="상품 대표 이미지" class="bg"></div>
                    <p class="goods_name"><span class="btn_share"><button id="btnShare"
                                data-goodsno="78355">공유하기</button></span> <strong class="name">[김소영 아티장의 안단테]
                            시에라 네바다 그래지어 할라피뇨 잭</strong> <span class="short_desc">할라피뇨의 청량하고 스파이시한 킥</span></p>
                    <p class="goods_dcinfo">회원할인가</p>
                    <p class="goods_price"><span class="position"><span class="dc">
                                <!----> <span class="dc_price">14,040<span class="won">원</span></span>
                                <span class="dc_percent">10<span class="per">%</span></span>
                            </span> <a class="original_price"><span class="price">15,600<span
                                        class="won">원</span></span><img
                                    src="https://res.kurly.com/kurly/ico/2021/question_24_24_c999.svg" alt="물음표"
                                    class="ico"></a> <span class="layer_position">
                                <!----> <span class="layer_price"><strong class="tit_layer">컬리판매가 기준 할인</strong>
                                    동일 품질 상품의 주요 온/오프라인 유통사 가격과 비교하여 컬리가 설정한 가격에서 할인된 가격입니다. <span
                                        class="bar"></span> 적용된 할인가는 대표 상품의 가격으로 옵션에 따라 할인 혜택이 다를 수 있습니다. 할인
                                    혜택은 당사 사정에 따라 변경될 수 있습니다. </span> <button type="button" class="btn_close">레이어
                                    닫기</button>
                            </span></span>
                        <!---->
                        <!---->
                        <!---->
                        <!----> <span class="not_login"><span>로그인 후, 회원할인가와 적립혜택이 제공됩니다.</span>
                            <!---->
                        </span>
                    </p>
                    <!---->
                    <div class="goods_info">
                        <dl class="list fst">
                            <dt class="tit">판매단위</dt>
                            <dd class="desc">1팩</dd>
                        </dl>
                        <dl class="list">
                            <dt class="tit">중량/용량</dt>
                            <dd class="desc">225g</dd>
                        </dl>
                        <dl class="list">
                            <dt class="tit">배송구분</dt>
                            <!---->
                            <dd class="desc">샛별배송/택배배송</dd>
                        </dl>
                        <!---->
                        <dl class="list">
                            <dt class="tit">포장타입</dt>
                            <dd class="desc"> 냉장/종이포장 <strong class="emph"> 택배배송은 에코포장이 스티로폼으로
                                    대체됩니다. </strong></dd>
                        </dl>
                        <dl class="list">
                            <dt class="tit">알레르기정보</dt>
                            <dd class="desc">우유 함유<br>
                            </dd>
                        </dl>
                        <!---->
                        <dl class="list">
                            <dt class="tit">유통기한</dt>
                            <dd class="desc">수령일 포함 최소 50일 이상 남은 제품을 보내드립니다.</dd>
                        </dl>
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                    </div>
                    <!---->
                </div>
                <!---->
            </div>
            <div id="cartPut">
                <div class="cart_option cartList cart_type2">
                    <div class="inner_option">
                        <!---->
                        <!---->
                        <div class="in_option">
                            <div class="list_goods">
                                <!---->
                                <!---->
                                <!---->
                                <ul class="list list_nopackage">
                                    <li class="on"><span class="btn_position"><button type="button"
                                                class="btn_del"><span
                                                    class="txt">삭제하기</span></button></span> <span
                                            class="name">
                                            <!----> [김소영 아티장의 안단테] 시에라 네바다 그래지어 할라피뇨 잭
                                            <!---->
                                        </span> <span class="tit_item">구매수량</span>
                                        <div class="option"><span class="count"><button type="button"
                                                    class="btn down on">수량내리기</button> <input type="number"
                                                    readonly="readonly" onfocus="this.blur()" class="inp">
                                                <button type="button" class="btn up on">수량올리기</button></span> <span
                                                class="price">
                                                <!----> <span class="dc_price">15,600원</span>
                                            </span></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="total">
                                <div class="price">
                                    <!----> <strong class="tit">총 상품금액 :</strong> <span
                                        class="sum"><span class="num">0</span> <span
                                            class="won">원</span></span>
                                </div>
                                <p class="txt_point"><span class="ico">적립</span> <span
                                        class="no_login"><span>로그인 후, 적립혜택 제공</span>
                                        <!---->
                                    </span>
                                    <!---->
                                </p>
                            </div>
                        </div>
                        <div class="group_btn off">
                            <div class="view_function"><button type="button" class="btn btn_alarm">재입고 알림</button>
                            </div> <span class="btn_type1"><button type="button" class="txt_type"> 장바구니 담기
                                </button>
                                <!---->
                            </span>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
                <div class="cart_option cartList cart_type1">
                    <div class="inner_option">
                        <!---->
                        <!---->
                        <div class="in_option">
                            <div class="list_goods">
                                <div class="bar_open"><button type="button" class="btn_close"><span
                                            class="ico">상품 선택</span></button></div>
                                <!---->
                                <!---->
                                <!---->
                            </div>
                            <!---->
                        </div>
                        <div class="group_btn off">
                            <div class="view_function"><button type="button" class="btn btn_alarm">재입고 알림</button>
                            </div> <span class="btn_type1"><button type="button" class="txt_type"> 장바구니 담기
                                </button>
                                <!---->
                            </span>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
                <div class="cart_option cart_type3 notify_option">
                    <div class="inner_option"><strong class="tit">재입고 알림 신청</strong>
                        <p class="name_deal">[김소영 아티장의 안단테] 시에라 네바다 그래지어 할라피뇨 잭</p>
                        <!---->
                        <!---->
                        <p class="notice"><span class="ico">·</span>상품이 입고되면 앱 푸시 또는 알림톡으로 알려 드립니다.
                        </p>
                        <div class="group_btn layer_btn2"><span class="btn_type2"><button type="button"
                                    class="txt_type">취소</button></span> <span class="btn_type1"><button
                                    type="button" class="txt_type">신청하기</button></span></div>
                    </div>
                </div>
                <div class="cart_option cart_result cart_type3">
                    <div class="inner_option"><button type="button" class="btn_close1">pc레이어닫기</button>
                        <p class="success">상품 구매를 위한 <span class="bar"></span>배송지를 설정해주세요</p>
                        <div class="group_btn layer_btn2"><span class="btn_type2"><button type="button"
                                    class="txt_type">취소</button></span> <span class="btn_type1"><button
                                    type="button" class="txt_type"><span class="ico_search"></span>주소
                                    검색</button></span></div>
                    </div>
                </div>
                <form name="frmBuyNow" method="post" action="/shop/order/order.php"><input type="hidden" name="mode"
                        value="addItem"> <input type="hidden" name="goodsno" value=""></form>
                <form name="frmWishlist" method="post"></form>
            </div>
        </div>



        <div class="layout-wrapper goods-view-area">



            <div class="goods-view-infomation detail_wrap_outer" id="goods-view-infomation">
                <div class="goods-view-tab">
                    <ul class="goods-view-infomation-tab-group">
                        <li class="goods-view-infomation-tab"><a href="#goods-description"
                                class="goods-view-infomation-tab-anchor __active">상품설명</a></li>
                        <li class="goods-view-infomation-tab"><a href="#goods-infomation"
                                class="goods-view-infomation-tab-anchor">상세정보</a></li>
                        <li class="goods-view-infomation-tab goods-view-review-tab"><a href="#goods-review"
                                class="goods-view-infomation-tab-anchor">후기 <span
                                    class="count_review">(9)</span></a></li>

                        <li class="goods-view-infomation-tab qna-show"><a href="#goods-qna"
                                class="goods-view-infomation-tab-anchor">문의</a></li>
                    </ul>
                </div>
                <div class="goods-view-infomation-content __active" id="goods-description">


                    <div class="goods_wrap">
                        <div class="goods_intro">
                            <div class="pic">
                                <img src="//img-cf.kurly.com/shop/data/goodsview/20210903/gv10000223289_1.jpg">
                            </div>
                            <div class="context last">
                                <h3>
                                    <small>할라피뇨의 청량하고 스파이시한 킥</small>
                                    [시에라 네바다]<br>
                                    그래지어 할라피뇨 잭
                                </h3>
                                <p class="words">미국의 아티장, 시에라 네바다는 캘리포니아 초지에서 방목한 소의 원유로 만든 신선한 치즈를 생산합니다. 일
                                    년에 최소 300일 이상 방목해 자란 소의 원유에는 그래지어(Grazier) 인증이 부여되는데요. 지금 선보이는 그래지어 할라피뇨 잭은 인증된 우유를
                                    살균하지 않고 숙성해 만든 잭 치즈입니다. 눈여겨봐야 할 것은 할라피뇨 고추를 넣어 다채로운 풍미를 구현했다는 점인데요. 재료 특유의 산뜻하고 화한
                                    매운맛이 크리미한 잭 치즈와 훌륭한 균형을 이룹니다. 두 맛의 조화를 좋아하는 누구에게나 즐거움을 선사할 거예요.</p>
                            </div>
                        </div>
                        <div class="goods_desc">
                            <div class="context">
                                <div class="pic">
                                    <img src="//img-cf.kurly.com/shop/data/goodsview/20210903/gv20000223290_1.jpg">
                                </div>
                                <p class="words">
                                </p>
                            </div>
                            <div class="context">
                                <div class="pic">
                                    <img src="//img-cf.kurly.com/shop/data/goodsview/20210903/gv00000223291_1.jpg">
                                </div>
                                <p class="words">
                                    <strong class="sub_tit">그래지어 할라피뇨 잭</strong> <b>・&nbsp;중량</b> : 1팩(225g)<br>
                                    <b>・&nbsp;타입</b> : 세미 하드 치즈<br>
                                    <b>・&nbsp;특징</b> : 비살균유로 만든 캘리포니아 잭 치즈에 할라피뇨 고추를 넣어 매운맛을 표현했어요. <br>
                                    <b>・&nbsp;테이스팅 노트</b> : 스파이시한 할라피뇨의 정체성이 고스란히 반영된 치즈예요. 곳곳에 풍겨오는 매콤한 향, 부드럽게 녹아드는 잭
                                    치즈의 질감이 무척 조화로워요.
                                </p>
                            </div>
                            <div class="context last">
                                <div class="pic">
                                    <img src="//img-cf.kurly.com/shop/data/goodsview/20210903/gv40000223292_1.jpg">
                                </div>
                                <p class="words">
                                </p>
                            </div>
                        </div>
                        <div class="goods_tip">
                            <h3><span>Kurly’s Tip</span></h3>
                            <div class="tip_box">
                                <div class="context">
                                    <p class="words">
                                        <strong>치즈 보관 및 섭취 방법</strong>
                                        &nbsp;&nbsp;<br>
                                        <b>섭취 권장 기한</b><br>
                                        <b>・</b>&nbsp;경성 치즈는 소프트 치즈나 프레시 치즈만큼 변화가 크지 않아 개봉 후 한 달까지 냉장 보관할 수 있습니다. <br>
                                        <br>
                                        <b>보관 온도</b><br>
                                        <b>・</b>&nbsp;0~10℃에서 냉장 보관하는 것을 권해드립니다. <br>
                                        <br>
                                        <b>소분 방법</b><br>
                                        <b>・</b>&nbsp;치즈를 자를 때 장갑을 끼고, 사용하지 않은 나이프를 쓰는 것이 좋습니다. <br>
                                        <br>
                                        <b>보관 방법</b><br>
                                        <b>・</b>&nbsp;남은 치즈는 숨을 쉴 수 있도록 파치먼트 페이퍼(치즈 페이퍼)로 감싼 뒤, 플라스틱 랩으로 너무 타이트하지 않게 한 번
                                        더 포장하여 냉장실에 보관하세요.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="about_brand">
                            <h3><span>About Brand</span></h3>
                            <div class="context last">
                                <div class="context_about">
                                    <div class="pic">
                                        <img src="//img-cf.kurly.com/shop/data/goodsview/20210902/gv40000223026_1.jpg">
                                    </div>
                                    <p class="words">
                                        시에라 네바다는 캘리포니아주 새크라멘토 북쪽에 있는 작은 마을, 윌로우에서 치즈를 생산하는 아티장입니다. 1997년 낙농업에 종사하는 집안에서
                                        태어난 벤 그레게르센과 존 던돈에 의해 탄생했어요. 마을 주변, 방목하고 목초를 먹여 키운 소의 우유를 기본으로 다양한 유제품을 선보이고
                                        있지요. 캘리포니아주가 지닌 테루아 덕분에 일 년 내내 신선한 목초를 먹고 자란 소는 프레시한 원유와 영양이 가득한 치즈로 보답합니다. 시에라
                                        네바다 치즈의 섬세하고 완벽한 풍미는 시간이 빚어낸 발효 덕분이니, 그 맛을 컬리를 통해 발견해 보세요.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="about_brand">
                            <div class="context last">
                                <div class="pic">
                                    <a href="https://www.kurly.com/shop/main/html.php?htmid=proc/event_andante.htm&amp;tplSkin=designgj#graindorg"
                                        target="_blank"><img
                                            src="//img-cf.kurly.com/shop/data/goodsview/20210902/gv20000223027_1.jpg"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="goods-view-infomation-content" id="goods-infomation">
                    <div id="goods-image">
                        <div id="goods_pi">
                            <p class="pic">
                                <img src="//img-cf.kurly.com/shop/data/goodsview/20210903/gv20000223293_1.jpg">
                            </p>
                        </div>
                    </div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="extra-information">
                        <tbody>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">제품명</th>
                                <td>상품설명 및 상품이미지 참조</td>
                                <th scope="row" class="goods-view-form-table-heading">식품의 유형</th>
                                <td>상품설명 및 상품이미지 참조</td>
                            </tr>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">생산자및소재지(수입품의경우생산자,수입자및제조국)</th>
                                <td>상품설명 및 상품이미지 참조</td>
                                <th scope="row" class="goods-view-form-table-heading">제조연월일,유통기한또는품질유지기한</th>
                                <td>제품 별도 라벨 표기 참조</td>
                            </tr>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">포장단위별 내용물의 용량(중량), 수량</th>
                                <td>상품설명 및 상품이미지 참조</td>
                                <th scope="row" class="goods-view-form-table-heading">
                                    원재료명및함량(농수산물의원산지표시에관한법률에따른원산지표시포함)</th>
                                <td>상품설명 및 상품이미지 참조</td>
                            </tr>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">영양성분(식품등의표시·광고에관한법률에 따른 영양성분 표시대상
                                    식품에 한함)</th>
                                <td>상품설명 및 상품이미지 참조</td>
                                <th scope="row" class="goods-view-form-table-heading">유전자변형식품에해당하는경우의표시</th>
                                <td>상품설명 및 상품이미지 참조</td>
                            </tr>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">소비자안전을 위한 주의사항</th>
                                <td>상품설명 및 상품이미지 참조</td>
                                <th scope="row" class="goods-view-form-table-heading">수입식품에 해당하는 경우 “수입식품안전관리특별법에 따른
                                    수입신고를 필함”의 문구</th>
                                <td>상품설명 및 상품이미지 참조</td>
                            </tr>
                            <tr>
                                <th scope="row" class="goods-view-form-table-heading">소비자상담관련전화번호</th>
                                <td>마켓컬리 고객행복센터 (1644-1107)</td>
                                <th scope="row" class="goods-view-form-table-heading"></th>
                                <td></td>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                    </table>

                    <div class="whykurly_area">
                        <div class="row">
                            <strong class="tit_whykurly">WHY KURLY</strong>
                            <div id="why_kurly" class="txt_area">
                                <div class="why-kurly">
                                    <div class="col">
                                        <div class="icon"><img
                                                src="https://res.kurly.com/pc/ico/1910/01_check.svg"></div>
                                        <div class="info">
                                            <div class="title">깐깐한 상품위원회</div>
                                            <div class="desc">
                                                <p>나와 내 가족이 먹고 쓸 상품을 고르는<br> 마음으로 매주 상품을 직접 먹어보고,<br> 경험해보고 성분, 맛, 안정성 등
                                                    다각도의<br> 기준을 통과한 상품만을 판매합니다.</p>
                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="icon"><img
                                                src="https://res.kurly.com/pc/ico/1910/02_only.svg"></div>
                                        <div class="info">
                                            <div class="title">차별화된 Kurly Only 상품</div>
                                            <div class="desc">
                                                <p>전국 각지와 해외의 훌륭한 생산자가<br> 믿고 선택하는 파트너, 마켓컬리.<br> 3천여 개가 넘는 컬리 단독 브랜드,
                                                    스펙의<br> Kurly Only 상품을 믿고 만나보세요.</p> <span
                                                    class="etc">(온라인 기준 / 자사몰, 직구 제외)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="icon"><img
                                                src="https://res.kurly.com/pc/ico/1910/03_cold.svg"></div>
                                        <div class="info">
                                            <div class="title">신선한 풀콜드체인 배송</div>
                                            <div class="desc">
                                                <p>온라인 업계 최초로 산지에서 문 앞까지<br> 상온, 냉장, 냉동 상품을 분리 포장 후<br> 최적의 온도를 유지하는 냉장
                                                    배송 시스템,<br> 풀콜드체인으로 상품을 신선하게 전해드립니다.</p> <span
                                                    class="etc">(샛별배송에 한함)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="icon"><img
                                                src="https://res.kurly.com/pc/ico/1910/04_price.svg"></div>
                                        <div class="info">
                                            <div class="title">고객, 생산자를 위한 최선의 가격</div>
                                            <div class="desc">
                                                <p>매주 대형 마트와 주요 온라인 마트의 가격<br> 변동 상황을 확인해 신선식품은 품질을<br> 타협하지 않는 선에서 최선의
                                                    가격으로,<br> 가공식품은 언제나 합리적인 가격으로<br> 정기 조정합니다.</p>
                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="icon"><img
                                                src="https://res.kurly.com/pc/ico/1910/05_eco.svg"></div>
                                        <div class="info">
                                            <div class="title">환경을 생각하는 지속 가능한 유통</div>
                                            <div class="desc">
                                                <p>친환경 포장재부터 생산자가 상품에만<br> 집중할 수 있는 직매입 유통구조까지,<br> 지속 가능한 유통을 고민하며 컬리를
                                                    있게<br> 하는 모든 환경(생산자, 커뮤니티, 직원)이<br> 더 나아질 수 있도록 노력합니다.</p>
                                                <!---->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="happy_center fst">
                        <div class="happy">
                            <h4 class="tit">고객행복센터</h4>
                            <p class="sub">
                                <span class="emph">궁금하신 점이나 서비스 이용에 불편한 점이 있으신가요?</span><span
                                    class="bar"></span>
                                문제가 되는 부분을 사진으로 찍어<span class="bar"></span>
                                아래 중 편하신 방법으로 접수해 주시면<span class="bar"></span>
                                빠르게 도와드리겠습니다.
                            </p>
                        </div>
                        <ul class="list">
                            <li>
                                <div class="tit">전화 문의 1644-1107</div>
                                <div class="sub">오전 7시~오후 7시 (연중무휴)</div>
                            </li>
                            <li>
                                <div class="tit">카카오톡 문의</div>
                                <div class="sub">오전 7시~오후 7시 (연중무휴)</div>
                                <div class="expend">
                                    카카오톡에서 ’마켓컬리’를 검색 후<br>
                                    대화창에 문의 및 불편사항을<br>
                                    남겨주세요.
                                </div>
                            </li>
                            <li>
                                <div class="tit">홈페이지 문의</div>
                                <div class="sub">
                                    24시간 접수 가능<br>
                                    로그인 &gt; 마이컬리 &gt; 1:1 문의
                                </div>
                                <div class="expend">
                                    고객센터 운영 시간에 순차적으로 답변해드리겠습니다.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="happy_center on">
                        <div class="happy unfold">
                            <h4 class="tit">교환 및 환불 안내</h4>
                            <p class="sub">
                                교환 및 환불이 필요하신 경우 고객행복센터로 문의해주세요.
                            </p>
                            <a data-child-id="refund" href="#none" class="asked">
                                <span class="txt" data-open="자세히 보기" data-close="닫기">닫기</span>
                                <img src="https://res.kurly.com/pc/ico/2001/pc_arrow_open@2x.png" alt="아이콘"
                                    class="ico">
                            </a>
                        </div>
                        <div class="happy_faq fst">
                            <span class="item">01. 상품에 문제가 있는 경우</span>
                            <div id="refund1" class="questions hide">
                                <p class="desc">받으신 상품이 표시·광고 내용 또는 계약 내용과 <span
                                        class="bar_m"></span>다른 경우에는 상품을 받은 날부터 3개월 이내, <span
                                        class="bar_m bar_pc"></span>그 사실을 알게 된 날부터 30일 이내에 <span
                                        class="bar_m"></span>교환 및 환불을 요청하실 수 있습니다.</p>
                                <p class="space"></p>
                                <p class="desc">상품의 정확한 상태를 확인할 수 있도록 <span
                                        class="bar_m"></span>사진을 함께 보내주시면 더 빠른 상담이 가능합니다.</p>
                                <p class="noti">※ 상품에 문제가 있는 것으로 확인되면 배송비는 컬리가 부담합니다.</p>
                            </div>
                        </div>
                        <div class="happy_faq">
                            <span class="item">02. 단순 변심, 주문 착오의 경우</span>
                            <div id="refund2" class="questions hide"><strong class="subject no_padding">신선 / 냉장 / 냉동
                                    식품</strong>
                                <p class="desc">재판매가 불가한 상품의 특성상, <span class="bar_m"></span>단순 변심,
                                    주문 착오 시 <span class="bar_m"></span>교환 및 반품이 어려운 점 양해 부탁드립니다.</p>
                                <p class="space"></p>
                                <p class="desc">상품에 따라 조금씩 맛이 다를 수 있으며, <span
                                        class="bar_m"></span>개인의 기호에 따라 같은 상품도 다르게 <span
                                        class="bar_m"></span>느끼실 수 있습니다.</p><strong
                                    class="subject">유통기한 30일 이상 식품 <span class="bar_m"></span>(신선 / 냉장
                                    / 냉동 제외) &amp; 기타 상품</strong>
                                <p class="desc">상품을 받은 날부터 7일 이내에 <span
                                        class="bar_m"></span>고객행복센터로 문의해주세요.</p>
                                <p class="noti">※ 단순 변심으로 인한 교환 또는 환불의 경우 <span
                                        class="bar_m"></span>고객님께서 배송비 6,000원을 부담하셔야 합니다. <span
                                        class="bar_m bar_pc"></span>(주문 건 배송비를 결제하셨을 경우 3,000원)</p>
                            </div>
                        </div>
                        <div class="happy_faq">
                            <span class="item">03. 교환·반품이 불가한 경우</span>
                            <div id="refund3" class="questions hide">
                                <p class="desc">다음에 해당하는 교환·환불 신청은 <span class="bar_m"></span>처리가
                                    어려울 수 있으니 양해 부탁드립니다.</p>
                                <ul class="list_questions">
                                    <li>고객님의 책임 있는 사유로 상품이 멸실되거나 훼손된 경우 <span class="bar_m bar_pc"></span>(단, 상품의 내용을
                                        확인하기 위해 포장 등을 훼손한 경우는 제외)</li>
                                    <li>고객님의 사용 또는 일부 소비로 상품의 가치가 감소한 경우</li>
                                    <li>시간이 지나 다시 판매하기 곤란할 정도로 상품의 가치가 감소한 경우</li>
                                    <li>복제가 가능한 상품의 포장이 훼손된 경우</li>
                                    <li>고객님의 주문에 따라 개별적으로 생산되는 <span class="bar_m"></span>상품의 제작이 이미 진행된 경우
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="happy_center lst">
                        <div class="happy unfold">
                            <h4 class="tit">배송관련 안내</h4>
                            <p class="sub">
                                배송 과정 중 기상 악화 및 도로교통 상황에 따라 부득이하게 지연 배송이 발생될 수 있습니다.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="goods-view-infomation-content" id="goods-review" data-load="0">


                </div>
                <div class="goods-view-infomation-content" id="goods-qna">
                    <div class="board-container">
                        <div id="productInquiryBoard" data-productno="78355" data-boardpagesize="10"
                            data-boardtype="product" data-devicetype="pc">
                            <div class="board-header-container"><strong>PRODUCT Q&amp;A</strong>
                                <ul class="list-description">
                                    <li>상품에 대한 문의를 남기는 공간입니다. 해당 게시판의 성격과 다른 글은 사전동의 없이 담당 게시판으로 이동될 수 있습니다.</li>
                                    <li>배송관련, 주문(취소/교환/환불)관련 문의 및 요청사항은 마이컬리 내 <a href="/shop/mypage/mypage_qna.php">1:1
                                            문의</a>에 남겨주세요.</li>
                                </ul>
                            </div>
                            <div class="board-item-container product">
                                <div class="inquiry-board-header">
                                    <div style="width: 710px;">제목</div>
                                    <div>작성자</div>
                                    <div>작성일</div>
                                    <div>답변상태</div>
                                </div>
                                <ul class="inquiry-notice-list"></ul>
                                <ul class="board-list">
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                    <li class="inquiry-item loading">
                                        <div class="product-detail"><strong></strong></div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                        <div class="item-cell">
                                            <p class="txt_sub text_medium normal "></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="board-inquiry-area">
                                    <div class="paging-navigation"><button type="button" class="paging-prev"
                                            disabled=""><span>이전</span></button><button type="button"
                                            class="paging-next" disabled=""><span>다음</span></button></div><button
                                        class="btn active"><span>문의하기</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('../../../../../css/desktop/carts/pc.bundle.css') }}">
        {{-- <script src="{{ asset('/public/') }} /appProxy/appData.php?ver=1.39.10" defer=""></script> --}}
        <script src="{{ asset('../../../../../js/desktop/carts/pc.bundle.js') }}" defer=""></script>
        <script src="{{ asset('../../../../../js/desktop/carts/mk_goods.js') }}"></script>
        <script src="{{ asset('../../../../../js/desktop/carts/common_filter.js') }}"></script>
        <script src="{{ asset('../../../../../js/desktop/carts/view_v1.js') }}"></script>
        <script src="{{ asset('../../../../../js/desktop/carts/cartput_v1.js') }}"></script>
        <script>
            // 상품상세상단호출
            var sectionViewDefault = {
                'login': false,
                'no': '78355',
                'type': 'pc'
            }
            sectionView.userInfoGet(sectionViewDefault);

            function cartPutLayerTypeShow() {
                var winTop = 0,
                    scrollCheckTop = 0;
                var $target = $('#cartPut .cart_type1');
                $(window).on('scroll', function() {
                    scrollCheckTop = Number($('#goods-view-infomation').offset().top); // 패키지상품치 위치가 바뀌므로 매번 체크
                    winTop = Number($(this).scrollTop());
                    if (winTop >= scrollCheckTop) {
                        $target.addClass('on');
                    } else {
                        $target.removeClass('on');
                        if ($target.find('.btn_close .ico').hasClass('open')) {
                            $target.find('.btn_close').trigger('click');
                        }
                    }
                }).scroll();
            }
            cartPutLayerTypeShow();
        </script>

        <script src="https://res.kurly.com/js/lib/jquery.inview.js"></script>
        <script>
            // iframe에서 해당 height값가져오는 부분
            function resizeFrameHeight(onm, height) {
                document.getElementById(onm).height = height;
            }

            function resizeFrameWidth(onm, width) {
                document.getElementById(onm).width = width;
            }
            jQuery(function($) {
                $("#goods-review").bind("inview", function(event, visible) {
                    if (visible == true) {
                        if ($(this).data("load") == 0) {
                            $(this).data("load", 1);
                            $(this).html(
                                '<iframe id="inreview" src="./goods_review_list.php?goodsno=78355" frameborder="0" class="goods-view-infomation-board"></iframe>'
                                );
                        }
                    }
                    $(function() {
                        $('#inreview').load(function() {
                            var iframe = $('#inreview').contents();
                            iframe.find(".layout-pagination-button").on('click', function(
                            event) {
                                $('html,body').animate({
                                    scrollTop: $("#goods-review").offset().top -
                                        115
                                }, 300);
                            });
                        });
                    });
                });
            });
            // 해당 구역을 경과하면 보여주기 - 2016.01.03 junix
            $(document).ready(function() {
                // $(window).height() 브라우저 내 창 높이
                // $(document).scrollTop() 현재 스크롤 top 위치
                if (($("#goods-review").offset().top - $(document).scrollTop()) < $(window).height()) {
                    $("#goods-review").data("load", 1);
                    $("#goods-review").html(
                        '<iframe id="inreview" src="./goods_review_list.php?goodsno=78355" frameborder="0" class="goods-view-infomation-board"></iframe>'
                        );
                }

                // 170119 ey
                var slideThumb = $('.goods-add-product-item');
                var slideThumbCnt = 5;

                if (slideThumb.length <= slideThumbCnt) {
                    $('.goods-add-product-move-right').hide();
                    $('.goods-add-product-move-left').hide();
                }
            });

            $(window).load(function() {
                // KM-433 장차석 : 인증서기능추가
                showCertify.pageMake();
                showCertify.init();
            });

            // KMF-771 상품상세 과거 이벤트 페이지 랜더링 이슈
            $('#goods-description a').on('click', function() {
                var httpCheck = $(this).attr('href');
                if (httpCheck.indexOf('http://www.kurly.com') > -1) {
                    $(this).attr('href', httpCheck.replace('http://www.kurly.com', ''));
                }
                return true;
            });
        </script>

        <script src="https://res.kurly.com/js/vue/data/goods/whykurly.js?ver=1.39.10"></script>
        <script src="https://res.kurly.com/js/vue/components/listIconTitleDesc.js?ver=1.39.10"></script>

        <script src="{{ asset('../../../../../js/desktop/carts/exchangeRefundPolicyPC.js') }}"></script>
        <div class="bg_loading" id="bgLoading" style="display: none;">
            <div class="loading_show"></div>
        </div>
        <script src="{{ asset('../../../../../js/desktop/carts/productDetail.js') }}"></script>
    </div>
</div>

@include('layouts.desktop.footer')
