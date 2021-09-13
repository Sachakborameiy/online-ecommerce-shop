{{-- <link rel="stylesheet" href="{{ asset('css/desktop/app.css') }}"> --}}

@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
    <div id="content">

        <div id="qnb" class="quick-navigation" style="top: 70px;">

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
                    nowTime: '1631095505183',
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
                        <li><a class="link_goods" href="/shop/goods/goods_view.php?goodsno=86739"><img
                                    src="https://img-cf.kurly.com/shop/data/goods/1631007361450y0.jpg" alt=""></a></li>
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
                    var i, len, getGoodsRecent, item, _nowTime = '1631095505183';

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
        <div class="page_aticle">
            <div id="lnbMenu" class="lnb_menu">
                <div id="bnrCategory" class="bnr_category" style="">
                    <div class="thumb"><img src="" alt="카테고리배너"></div>
                </div>
                <div class="inner_lnb">
                    <h3 class="tit">신상품</h3>
                    <ul class="list" style="">
                        <li data-start="172" data-end="188"><a class="on">전체보기</a></li>
                        <li class="bg"></li>
                    </ul>
                </div>
            </div>
            <div id="goodsList" class="page_section section_goodslist">
                <div class="list_ability">
                    <div class="sort_menu">
                        <div class=""><p class=" count"><span class="inner_count"> 총 0건 </span></p>
                            <div class="select_type user_sort">
                                <!----><a class="name_select">신상품순</a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <ul class="list">
                                    <li><a class="">추천순</a></li><li><a class=" on">신상품순</a></li>
                                    <li><a class="">인기상품순</a></li><li><a class="">혜택순</a></li><li><a class="
                                            ">낮은 가격순</a></li><li><a class="">높은 가격순</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list_goods">
                    <div class="inner_listgoods">
                        <ul class="list">
                            <li>       
                                <div class="item">
                                    <div class="thumb">
                                        <a class="img" href="/goods_view" style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568441453l0.jpg&quot;);">
                                        <img src="https://img-cf.kurly.com/shop/data/goods/1630568441453l0.jpg" alt="Jalapeño's refreshing and spicy kick" onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                    		</a> 
                                        <div class="group_btn">
																					<button type="button" class="btn btn_cart">
																						<span class="screen_out">
																							<font style="vertical-align: inherit;">
																							<font style="vertical-align: inherit;">78355</font>
																							</font></span></button> <!----> <!---->
																				</div>
																			</div> 
																			<a class="info">
																				<span class="name">
																					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">[Whirlpool][Installation Delivery] Modern Microwave 20L MWE200W White MWE200W</font></font></span> 
																					<span class="cost"><span class="dc">
																						<font style="vertical-align: inherit;">
																							<font style="vertical-align: inherit;">84,900 won</font>
																						</font></span> <span class="price">
																						<font style="vertical-align: inherit;">
																							<font style="vertical-align: inherit;">14,040 won</font>
																						</font></span> <span class="original">
																						<font style="vertical-align: inherit;">
																							<font style="vertical-align: inherit;">15,600 won</font>
																						</font></span></span> <span class="desc">
																							<font style="vertical-align: inherit;">
																							<font style="vertical-align: inherit;">Jalapeño's refreshing and spicy kick</font></font></span> <span class="tag"><span class="ico limit tag_type2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kurly Only</font></font></span></span></a></div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631007361138l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631007361138l0.jpg"
                                                alt="완성도가 돋보이는 세라믹 코팅 팬"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86739</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 멀티팬 24cm 3종
                                        </span> <span class="cost"><span class="dc">15%</span>
                                            <span class="price">53,720원</span> <span
                                                class="original">63,200원</span></span> <span
                                            class="desc">완성도가 돋보이는 세라믹 코팅 팬</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630981912214l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630981912214l0.jpg"
                                                alt="깔끔한 식사를 도와줄 서빙 집게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82939</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [피아자] 멀티 샐러드&amp;서빙
                                            집게 3종 </span> <span class="cost"><span
                                                class="dc">5%</span> <span
                                                class="price">12,065원</span> <span
                                                class="original">12,700원</span></span> <span
                                            class="desc">깔끔한 식사를 도와줄 서빙 집게</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630981594210l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630981594210l0.jpg"
                                                alt="소형, 소량의 음식을 위한 집게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82941</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [피아자] 아이스&amp;디저트 소형
                                            집게 3종 </span> <span class="cost"><span
                                                class="dc">5%</span> <span
                                                class="price">11,590원</span> <span
                                                class="original">12,200원</span></span> <span
                                            class="desc">소형, 소량의 음식을 위한 집게</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1577338848368l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1577338848368l0.jpg"
                                                alt="입안 가득 달콤시원한 과즙"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">45687</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> 저탄소 GAP 당도선별 제수용 배
                                            2입 </span> <span class="cost">
                                            <!----> <span class="price">11,000원</span>
                                            <!---->
                                        </span> <span class="desc">입안 가득 달콤시원한 과즙</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630984811600l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630984811600l0.jpg"
                                                alt="향긋한 녹차 풍미 가득"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">9407</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [하겐다즈] 파인트 그린티
                                        </span> <span class="cost">
                                            <!----> <span class="price">12,900원</span>
                                            <!---->
                                        </span> <span class="desc">향긋한 녹차 풍미 가득</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630996872988l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630996872988l0.jpg"
                                                alt="아기자기한 감성이 돋보이는 플레이트"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86740</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 플레이트 17cm
                                            4종 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">15,840원</span> <span
                                                class="original">17,600원</span></span> <span
                                            class="desc">아기자기한 감성이 돋보이는 플레이트</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631000042342l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631000042342l0.jpg"
                                                alt="뚜껑있는 세라믹 코팅 사각팬"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86735</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [루켄루시] 와이드 사각팬 2종
                                        </span> <span class="cost"><span class="dc">20%</span>
                                            <span class="price">39,200원</span> <span
                                                class="original">49,000원</span></span> <span
                                            class="desc">뚜껑있는 세라믹 코팅 사각팬</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1571817398702l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1571817398702l0.jpg"
                                                alt="부드럽게 스며든 달콤한 과즙"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">42530</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> 저탄소 GAP 충랑포도 500g
                                            내외 </span> <span class="cost">
                                            <!----> <span class="price">11,800원</span>
                                            <!---->
                                        </span> <span class="desc">부드럽게 스며든 달콤한 과즙</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630997370597l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630997370597l0.jpg"
                                                alt="이음새 없는 일체형 실리콘 조리도구"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86736</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [루켄루시] 실리콘 조리도구
                                            3pcs 세트 2종 </span> <span class="cost"><span
                                                class="dc">15%</span> <span
                                                class="price">25,500원</span> <span
                                                class="original">30,000원</span></span> <span
                                            class="desc">이음새 없는 일체형 실리콘 조리도구</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631001221825l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631001221825l0.jpg"
                                                alt="다양한 음식에 활용하는 멀티 집게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82943</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [피아자] 유니버셜 멀티 집게 2종
                                        </span> <span class="cost"><span class="dc">5%</span>
                                            <span class="price">21,660원</span> <span
                                                class="original">22,800원</span></span> <span
                                            class="desc">다양한 음식에 활용하는 멀티 집게</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630981461817l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630981461817l0.jpg"
                                                alt="섬세한 플레이팅을 도와줄 핀셋형 집게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82942</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [피아자] 요리용 핀셋 2종
                                        </span> <span class="cost"><span class="dc">5%</span>
                                            <span class="price">24,605원</span> <span
                                                class="original">25,900원</span></span> <span
                                            class="desc">섬세한 플레이팅을 도와줄 핀셋형 집게</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631007674167l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631007674167l0.jpg"
                                                alt="통통 튀는 파티 분위기를 연출해줄"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86743</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 2단 파티 플레이트
                                            2종 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">43,200원</span> <span
                                                class="original">48,000원</span></span> <span
                                            class="desc">통통 튀는 파티 분위기를 연출해줄</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630975525197l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630975525197l0.jpg"
                                                alt="아이스크림을 즐기는 색다른 방법"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82633</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [하겐다즈] 마카롱 5P
                                        </span> <span class="cost">
                                            <!----> <span class="price">22,800원</span>
                                            <!---->
                                        </span> <span class="desc">아이스크림을 즐기는 색다른 방법</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630996135126l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630996135126l0.jpg"
                                                alt="통통 튀는 피크닉 감성"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86742</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 플레이트 26cm
                                            4종 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">23,040원</span> <span
                                                class="original">25,600원</span></span> <span
                                            class="desc">통통 튀는 피크닉 감성</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631006874779l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631006874779l0.jpg"
                                                alt="활용도 높은 세라믹 코팅 멀티팬"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86738</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 멀티팬 20cm
                                            3종 </span> <span class="cost"><span
                                                class="dc">15%</span> <span
                                                class="price">42,840원</span> <span
                                                class="original">50,400원</span></span> <span
                                            class="desc">활용도 높은 세라믹 코팅 멀티팬</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/16309963236l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/16309963236l0.jpg"
                                                alt="톡톡 튀는 스페클 패턴"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86741</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 플레이트 21cm
                                            4종 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">19,440원</span> <span
                                                class="original">21,600원</span></span> <span
                                            class="desc">톡톡 튀는 스페클 패턴</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630981714238l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630981714238l0.jpg"
                                                alt="면 요리를 위한 전용 집게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82940</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [피아자] 스파게티 집게 2종
                                        </span> <span class="cost"><span class="dc">5%</span>
                                            <span class="price">18,430원</span> <span
                                                class="original">19,400원</span></span> <span
                                            class="desc">면 요리를 위한 전용 집게</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630992858575l0.jpg&quot;);">
                                            <!----> <span class="global_sticker"><span class="inner_sticker"><span
                                                        class="bg_sticker"
                                                        style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                    <span class="txt_sticker"><span><span
                                                                class="emph_sticker">증정품</span>
                                                            <!---->
                                                        </span></span></span></span>
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630992858575l0.jpg"
                                                alt="개운한 두피로 가꿔 줄 약산성 샴푸"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">73207</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [세바메드] 안티 댄드러프 샴푸
                                        </span> <span class="cost"><span class="dc">30%</span>
                                            <span class="price">11,550원</span> <span
                                                class="original">16,500원</span></span> <span
                                            class="desc">개운한 두피로 가꿔 줄 약산성 샴푸</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630984642787l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630984642787l0.jpg"
                                                alt="커피 아이스크림의 재해석"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82632</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [하겐다즈] 파인트 솔티드 카라멜
                                            카푸치노 </span> <span class="cost">
                                            <!----> <span class="price">12,900원</span>
                                            <!---->
                                        </span> <span class="desc">커피 아이스크림의 재해석</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630984470644l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630984470644l0.jpg"
                                                alt="하겐다즈의 60주년을 기념하는"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">82631</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [하겐다즈] 파인트 바닐라 피칸
                                        </span> <span class="cost">
                                            <!----> <span class="price">12,900원</span>
                                            <!---->
                                        </span> <span class="desc">하겐다즈의 60주년을 기념하는</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630995929640l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630995929640l0.jpg"
                                                alt="톡톡 터지는 스페클 패턴의 시리얼볼"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86744</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 시리얼볼 15cm
                                            4종 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">18,000원</span> <span
                                                class="original">20,000원</span></span> <span
                                            class="desc">톡톡 터지는 스페클 패턴의 시리얼볼</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1601260225503l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1601260225503l0.jpg"
                                                alt="실속있게 즐기는 큼직한 신고배"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">29854</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> GAP 제수용 신고배 1입
                                        </span> <span class="cost">
                                            <!----> <span class="price">6,900원</span>
                                            <!---->
                                        </span> <span class="desc">실속있게 즐기는 큼직한 신고배</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631064283810l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631064283810l0.jpg"
                                                alt="뚝딱 완성되는 영양 만점 국물 요리"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">11633</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [앤쿡] 어린이 한우 사골 곰국
                                        </span> <span class="cost">
                                            <!----> <span class="price">15,900원</span>
                                            <!---->
                                        </span> <span class="desc">뚝딱 완성되는 영양 만점 국물 요리</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631000540278l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631000540278l0.jpg"
                                                alt="톡톡 덜어내어 더욱 간편하게 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84027</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [레인보우샵] 톡톡이 용기 세제
                                            3종 </span> <span class="cost"><span
                                                class="dc">5%</span> <span
                                                class="price">3,800원</span> <span
                                                class="original">4,000원</span></span> <span
                                            class="desc">톡톡 덜어내어 더욱 간편하게 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631006571195l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631006571195l0.jpg"
                                                alt="귀여운 몸집과 든든한 쓰임새"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86737</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [멜로우] 마블 멀티팬 16cm
                                            3종 </span> <span class="cost"><span
                                                class="dc">15%</span> <span
                                                class="price">36,720원</span> <span
                                                class="original">43,200원</span></span> <span
                                            class="desc">귀여운 몸집과 든든한 쓰임새</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630994103237l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630994103237l0.jpg"
                                                alt="남다른 크기의 국산 고구마"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83847</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> 튀김용 왕고구마 1kg
                                        </span> <span class="cost">
                                            <!----> <span class="price">6,290원</span>
                                            <!---->
                                        </span> <span class="desc">남다른 크기의 국산 고구마</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1631000524172l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1631000524172l0.jpg"
                                                alt="평온한 향의 바디오일"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83926</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [아로마티카] 서렌 바디오일 라벤더
                                            &amp; 마조람 100ml </span> <span class="cost"><span
                                                class="dc">25%</span> <span
                                                class="price">12,000원</span> <span
                                                class="original">16,000원</span></span> <span
                                            class="desc">평온한 향의 바디오일</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630924307875l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630924307875l0.jpg"
                                                alt="안전하게 사용하는 화려한 종이 폭죽"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86750</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [파퍼로니] 컨페티 폭죽 카드 5종
                                        </span> <span class="cost"><span class="dc">15%</span>
                                            <span class="price">6,200원</span> <span
                                                class="original">7,300원</span></span> <span
                                            class="desc">안전하게 사용하는 화려한 종이 폭죽</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630912724192l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630912724192l0.jpg"
                                                alt="감각을 건드리는 놀이 큐브"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86446</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [밧핫] 도형끼우기큐브
                                        </span> <span class="cost"><span class="dc">7%</span>
                                            <span class="price">23,900원</span> <span
                                                class="original">25,900원</span></span> <span
                                            class="desc">감각을 건드리는 놀이 큐브</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630666920213l0.jpg&quot;);">
                                            <!----> <span class="global_sticker"><span class="inner_sticker"><span
                                                        class="bg_sticker"
                                                        style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                    <span class="txt_sticker"><span><span
                                                                class="emph_sticker">증정품</span>
                                                            <!---->
                                                        </span></span></span></span>
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630666920213l0.jpg"
                                                alt="가볍게 뿌려 관리하는 일상 청결 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83961</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [블랑101] 멀티 클리너
                                            350ml </span> <span class="cost"><span
                                                class="dc">19%</span> <span
                                                class="price">10,500원</span> <span
                                                class="original">13,000원</span></span> <span
                                            class="desc">가볍게 뿌려 관리하는 일상 청결 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/16306468595l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/16306468595l0.jpg"
                                                alt="안심하고 사용하는 타블렛형 1종 주방세제"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83958</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [블랑101] 식기세척기세제
                                            (10EA X 4SET) </span> <span class="cost"><span
                                                class="dc">16%</span> <span
                                                class="price">15,000원</span> <span
                                                class="original">18,000원</span></span> <span
                                            class="desc">안심하고 사용하는 타블렛형 1종 주방세제</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630633146874l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630633146874l0.jpg"
                                                alt="정성을 담은 명절 음식"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [도리깨침] 명절한정 추석 상차림
                                            골라담기 (9/19 일 수령) </span> <span class="cost">
                                            <!----> <span class="price">4,600원</span>
                                            <!---->
                                        </span> <span class="desc">정성을 담은 명절 음식</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630919508274l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630919508274l0.jpg"
                                                alt="뽀로로 경찰관과 함께하는 역할 놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83900</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [주영이앤씨] 뽀로로 경찰 블록
                                            놀이세트 </span> <span class="cost"><span
                                                class="dc">7%</span> <span
                                                class="price">23,900원</span> <span
                                                class="original">25,900원</span></span> <span
                                            class="desc">뽀로로 경찰관과 함께하는 역할 놀이</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630918271698l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630918271698l0.jpg"
                                                alt="다섯 가지 놀이를 하나로 담은 교구"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86445</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [브랜드B] 제니쥬 </span>
                                        <span class="cost"><span class="dc">10%</span> <span
                                                class="price">79,900원</span> <span
                                                class="original">89,000원</span></span> <span
                                            class="desc">다섯 가지 놀이를 하나로 담은 교구</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1611128249960l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1611128249960l0.jpg"
                                                alt="깔끔한 맛이 돋보이는 명절 음식"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [둥구나무]명절한정 추석 상차림
                                            골라담기 9/20 (월) 수령 </span> <span class="cost">
                                            <!----> <span class="price">5,000원</span>
                                            <!---->
                                        </span> <span class="desc">깔끔한 맛이 돋보이는 명절 음식</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630657494562l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630657494562l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [월풀][설치배송] 세미 빌트인
                                            4도어 냉장고 6WQN1SS </span> <span class="cost">
                                            <!----> <span class="price">1,750,000원</span>
                                            <!---->
                                        </span> <span class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630909469160l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630909469160l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [삼성전자][설치배송] 그랑데
                                            건조기 DV16T8520BP 16kg 이녹스 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">1,048,999원</span> <span
                                                class="original">1,165,555원</span></span> <span
                                            class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630919255539l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630919255539l0.jpg"
                                                alt="뽀로로 소방관과 함께하는 역할 놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83901</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [주영이앤씨] 뽀로로 소방 블록
                                            놀이세트 </span> <span class="cost"><span
                                                class="dc">7%</span> <span
                                                class="price">23,900원</span> <span
                                                class="original">25,900원</span></span> <span
                                            class="desc">뽀로로 소방관과 함께하는 역할 놀이</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630905192785l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630905192785l0.jpg"
                                                alt="아기상어와 함께 첫 영어 단어 놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83894</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [핑크퐁] 아기상어 알파벳카드
                                            120 </span> <span class="cost">
                                            <!----> <span class="price">13,500원</span>
                                            <!---->
                                        </span> <span class="desc">아기상어와 함께 첫 영어 단어 놀이</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630904578584l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630904578584l0.jpg"
                                                alt="구수한 풍미가 매력적인"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">81515</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [평창] 쥐눈이콩 나또 10개입
                                        </span> <span class="cost">
                                            <!----> <span class="price">11,500원</span>
                                            <!---->
                                        </span> <span class="desc">구수한 풍미가 매력적인</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630917186172l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630917186172l0.jpg"
                                                alt="우리 가족을 위한 순한 표백제 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83971</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [레드루트] 산소계 표백제 1kg
                                        </span> <span class="cost"><span class="dc">12%</span>
                                            <span class="price">10,500원</span> <span
                                                class="original">12,000원</span></span> <span
                                            class="desc">우리 가족을 위한 순한 표백제 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630633776580l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630633776580l0.jpg"
                                                alt="명절을 맛있게 누리는 방법"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [정미경키친] 명절한정 추석 상차림
                                            골라담기 (9/18 토 수령) </span> <span class="cost">
                                            <!----> <span class="price">8,500원</span>
                                            <!---->
                                        </span> <span class="desc">명절을 맛있게 누리는 방법</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630907034552l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630907034552l0.jpg"
                                                alt="명절 음식의 수고를 덜어 줄"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [진가네반찬] 명절한정 상차림
                                            골라담기 9/19(일) 수령 </span> <span class="cost">
                                            <!----> <span class="price">4,900원</span>
                                            <!---->
                                        </span> <span class="desc">명절 음식의 수고를 덜어 줄</span> <span
                                            class="tag"><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630986783983l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630986783983l0.jpg"
                                                alt="화사한 투톤 색상을 입힌 견고한 목줄"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84030</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [마이플러피] 핏칼라 목줄 8종
                                        </span> <span class="cost"><span class="dc">15%</span>
                                            <span class="price">12,750원</span> <span
                                                class="original">15,000원</span></span> <span
                                            class="desc">화사한 투톤 색상을 입힌 견고한 목줄</span> <span
                                            class="tag"><span class="ico limit">반려동물</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630986396451l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630986396451l0.jpg"
                                                alt="충격을 분산하는 목밴드 H라인 하네스"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84029</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [마이플러피] 핏밴드 하네스 12종
                                        </span> <span class="cost"><span class="dc">15%</span>
                                            <span class="price">27,200원</span> <span
                                                class="original">32,000원</span></span> <span
                                            class="desc">충격을 분산하는 목밴드 H라인 하네스</span> <span
                                            class="tag"><span class="ico limit">반려동물</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630647336566l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630647336566l0.jpg"
                                                alt="손질 없이 편하게 즐기는 멜론의 달콤함"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86036</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [DOLE] 허니듀 멜론 청크
                                            500g </span> <span class="cost"><span
                                                class="dc">7%</span> <span
                                                class="price">7,393원</span> <span
                                                class="original">7,950원</span></span> <span
                                            class="desc">손질 없이 편하게 즐기는 멜론의 달콤함</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630480236692l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630480236692l0.jpg"
                                                alt="강력한 고정력과 지속력의 스타일링 젤"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">88369</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [갸스비] 스타일링 젤 2종
                                        </span> <span class="cost"><span class="dc">20%</span>
                                            <span class="price">4,400원</span> <span
                                                class="original">5,500원</span></span> <span
                                            class="desc">강력한 고정력과 지속력의 스타일링 젤</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630925862632l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630925862632l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [삼성전자][설치배송] 잉크젯
                                            컬러복합기 SL-J1685 인쇄/복사/스캔 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">55,180원</span> <span
                                                class="original">61,312원</span></span> <span
                                            class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630948574969l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630948574969l0.jpg"
                                                alt="실용적인 구성의 캠핑 디너웨어 세트"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83835</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [에델코첸] 캠핑 디너 10P 세트
                                        </span> <span class="cost"><span class="dc">5%</span>
                                            <span class="price">47,405원</span> <span
                                                class="original">49,900원</span></span> <span
                                            class="desc">실용적인 구성의 캠핑 디너웨어 세트</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630043190871l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630043190871l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [월풀][설치배송] 모던 전자레인지
                                            20L MWE200W 화이트 MWE200W </span> <span class="cost">
                                            <!----> <span class="price">84,900원</span>
                                            <!---->
                                        </span> <span class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630913271985l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630913271985l0.jpg"
                                                alt="일러스트로 더 특별한 안전 폭죽"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86751</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [파퍼로니] 컨페티 폭죽 카드
                                            일러스트 3종 </span> <span class="cost"><span
                                                class="dc">15%</span> <span
                                                class="price">6,200원</span> <span
                                                class="original">7,300원</span></span> <span
                                            class="desc">일러스트로 더 특별한 안전 폭죽</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630938182854l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630938182854l0.jpg"
                                                alt="주방 인테리어에 더하는 작은 디테일"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84044</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [프랑코] 고무장갑 히든 홀더 2종
                                        </span> <span class="cost"><span class="dc">10%</span>
                                            <span class="price">9,810원</span> <span
                                                class="original">10,900원</span></span> <span
                                            class="desc">주방 인테리어에 더하는 작은 디테일</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630895067385l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630895067385l0.jpg"
                                                alt="깔끔한 맛이 돋보이는 명절 음식"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [둥구나무] 명절한정 추석 상차림
                                            골라담기 9/18 토 수령 </span> <span class="cost">
                                            <!----> <span class="price">5,000원</span>
                                            <!---->
                                        </span> <span class="desc">깔끔한 맛이 돋보이는 명절 음식</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630934067987l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630934067987l0.jpg"
                                                alt="인공 향과 색소를 첨가하지 않은 핸드워시 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83981</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [레인보우샵] 핸드워시 무향
                                            300ml </span> <span class="cost"><span
                                                class="dc">11%</span> <span
                                                class="price">3,900원</span> <span
                                                class="original">4,400원</span></span> <span
                                            class="desc">인공 향과 색소를 첨가하지 않은 핸드워시 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630655843892l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630655843892l0.jpg"
                                                alt="포근함에 더해진 싱그러운 가드니아 향 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83959</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [블랑101] 섬유유연제 스위트부케
                                            1.2L </span> <span class="cost"><span
                                                class="dc">16%</span> <span
                                                class="price">15,000원</span> <span
                                                class="original">18,000원</span></span> <span
                                            class="desc">포근함에 더해진 싱그러운 가드니아 향 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630904841554l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630904841554l0.jpg"
                                                alt="콩콩 찍어 표현하는 아이 마음"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83892</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [핑크퐁] 아기상어 스탬프 콩콩
                                        </span> <span class="cost">
                                            <!----> <span class="price">9,900원</span>
                                            <!---->
                                        </span> <span class="desc">콩콩 찍어 표현하는 아이 마음</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630915993469l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630915993469l0.jpg"
                                                alt="아이 식기를 위한 1종 세척제 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83970</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [레드루트] 젖병세정제(주방세제
                                            겸용) 무향 750ml </span> <span class="cost"><span
                                                class="dc">15%</span> <span
                                                class="price">10,200원</span> <span
                                                class="original">12,000원</span></span> <span
                                            class="desc">아이 식기를 위한 1종 세척제 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630657784861l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630657784861l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [월풀][설치배송] 식기세척기
                                            14인용 프리스탠딩 WFO3T123PL </span> <span class="cost">
                                            <!----> <span class="price">1,130,000원</span>
                                            <!---->
                                        </span> <span class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630663753133l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630663753133l0.jpg"
                                                alt="포근함에 더해진 싱그러운 가드니아 향 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83960</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [블랑101] 세탁세제 스위트부케
                                            1.2L </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">18,000원</span> <span
                                                class="original">20,000원</span></span> <span
                                            class="desc">포근함에 더해진 싱그러운 가드니아 향 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630895213246l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630895213246l0.jpg"
                                                alt="깔끔한 맛이 돋보이는 명절 음식"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [둥구나무] 명절한정 추석 상차림
                                            골라담기 9/19 일 수령 </span> <span class="cost">
                                            <!----> <span class="price">5,000원</span>
                                            <!---->
                                        </span> <span class="desc">깔끔한 맛이 돋보이는 명절 음식</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630918750321l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630918750321l0.jpg"
                                                alt="아이 혼자서도 즐거운 양치질 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84035</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [브리스틱] 에르고 어린이용칫솔
                                            2단계 5종 </span> <span class="cost"><span
                                                class="dc">12%</span> <span
                                                class="price">2,900원</span> <span
                                                class="original">3,300원</span></span> <span
                                            class="desc">아이 혼자서도 즐거운 양치질 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630904711170l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630904711170l0.jpg"
                                                alt="핑크퐁과 함께 하는 목욕 시간"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83891</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [핑크퐁] 아기상어 멜로디 버블토이
                                        </span> <span class="cost">
                                            <!----> <span class="price">14,900원</span>
                                            <!---->
                                        </span> <span class="desc">핑크퐁과 함께 하는 목욕 시간</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630659927570l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630659927570l0.jpg"
                                                alt="자연에서 얻은 성분이 담긴 멀티 클렌저"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">85818</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [리치파머스] 오가닉 캐스틸솝
                                            473ml 9종 </span> <span class="cost"><span
                                                class="dc">20%</span> <span
                                                class="price">19,920원</span> <span
                                                class="original">24,900원</span></span> <span
                                            class="desc">자연에서 얻은 성분이 담긴 멀티 클렌저</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630905387131l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630905387131l0.jpg"
                                                alt="알록달록 핑크퐁과 한글 놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83893</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [핑크퐁] 한글카드 120
                                        </span> <span class="cost">
                                            <!----> <span class="price">13,500원</span>
                                            <!---->
                                        </span> <span class="desc">알록달록 핑크퐁과 한글 놀이</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1612166817691l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1612166817691l0.jpg"
                                                alt="좋은 재료로 만든 냉동 산적"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">67014</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [자연에찬] 꼬지산적 </span>
                                        <span class="cost">
                                            <!----> <span class="price">20,000원</span>
                                            <!---->
                                        </span> <span class="desc">좋은 재료로 만든 냉동 산적</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630633921799l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630633921799l0.jpg"
                                                alt="명절을 맛있게 누리는 방법"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [정미경키친] 명절한정 추석 상차림
                                            골라담기 (9/19 일 수령) </span> <span class="cost">
                                            <!----> <span class="price">8,500원</span>
                                            <!---->
                                        </span> <span class="desc">명절을 맛있게 누리는 방법</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630661769638l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630661769638l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [삼성전자][설치배송] 갤럭시북
                                            프로 NT950XDB-KF58S </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">1,414,100원</span> <span
                                                class="original">1,571,223원</span></span> <span
                                            class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630914361895l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630914361895l0.jpg"
                                                alt="우리 가족 식기를 위한 1종 세척제 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">83969</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [레드루트] 주방세제(젖병세정제
                                            겸용) 라임향 500ml </span> <span class="cost"><span
                                                class="dc">14%</span> <span
                                                class="price">9,000원</span> <span
                                                class="original">10,500원</span></span> <span
                                            class="desc">우리 가족 식기를 위한 1종 세척제 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630918653707l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630918653707l0.jpg"
                                                alt="길이 조절과 버클 탈착까지 가능한 리드줄"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">84028</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [마이플러피] 핏리쉬 리드줄 4종
                                        </span> <span class="cost"><span class="dc">15%</span>
                                            <span class="price">16,150원</span> <span
                                                class="original">19,000원</span></span> <span
                                            class="desc">길이 조절과 버클 탈착까지 가능한 리드줄</span> <span
                                            class="tag"><span class="ico limit">반려동물</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/163091091983l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/163091091983l0.jpg"
                                                alt="알록달록 재미있는 블록놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button" class="btn btn_cart"><span
                                                    class="screen_out">86443</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [브랜드B] 숫자 소프트블록
                                        </span> <span class="cost"><span class="dc">16%</span>
                                            <span class="price">19,900원</span> <span
                                                class="original">23,900원</span></span> <span
                                            class="desc">알록달록 재미있는 블록놀이</span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630906718481l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630906718481l0.jpg"
                                                alt="한 번에 준비하는 4인 가족 명절 상"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [진가네반찬] 명절 한정판매 4인
                                            가족 상차림 골라담기 9/19(일) 수령 </span> <span class="cost">
                                            <!----> <span class="price">15,800원</span>
                                            <!---->
                                        </span> <span class="desc">한 번에 준비하는 4인 가족 명절 상</span> <span
                                            class="tag"><span class="ico limit">한정수량</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630660556517l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630660556517l0.jpg"
                                                alt=""
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn">
                                            <!---->
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [삼성전자][설치배송] 크리스탈
                                            UHD 4K TV KU60UA8000FXKR (152cm/스탠드형) </span> <span
                                            class="cost"><span class="dc">10%</span> <span
                                                class="price">1,356,270원</span> <span
                                                class="original">1,506,967원</span></span> <span
                                            class="desc"></span> <span class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630633743693l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630633743693l0.jpg"
                                                alt="아삭 달콤한 연두빛 구술"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">86547</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [만나] 미국산 씨없는 청포도
                                            500g </span> <span class="cost">
                                            <!----> <span class="price">7,950원</span>
                                            <!---->
                                        </span> <span class="desc">아삭 달콤한 연두빛 구술</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568441453l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630568441453l0.jpg"
                                                alt="할라피뇨의 청량하고 스파이시한 킥"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">78355</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [김소영 아티장의 안단테]
                                            시에라 네바다 그래지어 할라피뇨 잭 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">14,040원</span> <span
                                                class="original">15,600원</span></span> <span
                                            class="desc">할라피뇨의 청량하고 스파이시한 킥</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630643832762l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630643832762l0.jpg"
                                                alt="아삭함이 살아 있는 만능 반찬"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68508</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 볶음김치
                                        </span> <span class="cost">
                                            <!----> <span class="price">3,900원</span>
                                            <!---->
                                        </span> <span class="desc">아삭함이 살아 있는 만능 반찬</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630649475236l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630649475236l0.jpg"
                                                alt="남도식 양념을 입은 돼지고기"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68502</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 고추장제육볶음
                                        </span> <span class="cost">
                                            <!----> <span class="price">6,800원</span>
                                            <!---->
                                        </span> <span class="desc">남도식 양념을 입은 돼지고기</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630636340744l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630636340744l0.jpg"
                                                alt="정성껏 채 썰어 아삭한 식감 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68516</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 아삭우엉채볶음
                                        </span> <span class="cost">
                                            <!----> <span class="price">3,800원</span>
                                            <!---->
                                        </span> <span class="desc">정성껏 채 썰어 아삭한 식감 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630655244184l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630655244184l0.jpg"
                                                alt="겉은 바삭 속은 쫄깃"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68510</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 명엽채튀김
                                        </span> <span class="cost">
                                            <!----> <span class="price">3,500원</span>
                                            <!---->
                                        </span> <span class="desc">겉은 바삭 속은 쫄깃</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630656941708l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630656941708l0.jpg"
                                                alt="3가지 타요 놀이기구로 신나게"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83897</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [아이코닉스] 타요 놀이동산
                                            플레이세트 </span> <span class="cost"><span
                                                class="dc">7%</span> <span
                                                class="price">45,900원</span> <span
                                                class="original">49,500원</span></span> <span
                                            class="desc">3가지 타요 놀이기구로 신나게</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630634946917l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630634946917l0.jpg"
                                                alt="양념은 쏙 식감은 그대로"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68515</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 꽈리고추중멸치조림
                                        </span> <span class="cost">
                                            <!----> <span class="price">3,900원</span>
                                            <!---->
                                        </span> <span class="desc">양념은 쏙 식감은 그대로</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568148117l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630568148117l0.jpg"
                                                alt="허브의 향긋함이 스민 치즈"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">78353</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [김소영 아티장의 안단테]
                                            포인트 레이스 토마 프로방스 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">12,510원</span> <span
                                                class="original">13,900원</span></span> <span
                                            class="desc">허브의 향긋함이 스민 치즈</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630635580594l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630635580594l0.jpg"
                                                alt="밤하늘처럼 새카만 껍질 사이로 터지는 과즙"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">86549</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [만나] 미국산 씨없는 흑포도
                                            500g </span> <span class="cost">
                                            <!----> <span class="price">7,950원</span>
                                            <!---->
                                        </span> <span class="desc">밤하늘처럼 새카만 껍질 사이로 터지는 과즙</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630637816824l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630637816824l0.jpg"
                                                alt="오도독 매력적인 식감 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68517</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 궁채볶음
                                        </span> <span class="cost">
                                            <!----> <span class="price">3,800원</span>
                                            <!---->
                                        </span> <span class="desc">오도독 매력적인 식감 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630300997862l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630300997862l0.jpg"
                                                alt="가장 유용한 해물로만 담은"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83110</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [윤슬] 모둠해물
                                            250g(냉장) </span> <span class="cost">
                                            <!----> <span class="price">7,900원</span>
                                            <!---->
                                        </span> <span class="desc">가장 유용한 해물로만 담은</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630639754474l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630639754474l0.jpg"
                                                alt="멸치의 감칠맛이 두부에 쏙 "
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68518</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 두부멸치조림
                                        </span> <span class="cost">
                                            <!----> <span class="price">4,800원</span>
                                            <!---->
                                        </span> <span class="desc">멸치의 감칠맛이 두부에 쏙 </span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568517189l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630568517189l0.jpg"
                                                alt="매콤하고 독특한 풍미의 결합"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">78354</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [김소영 아티장의 안단테]
                                            시에라 네바다 잭 해치 칠리 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">12,780원</span> <span
                                                class="original">14,200원</span></span> <span
                                            class="desc">매콤하고 독특한 풍미의 결합</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630647504457l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630647504457l0.jpg"
                                                alt="꼬들꼬들 재미난 식감"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68507</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 미역줄기볶음
                                        </span> <span class="cost">
                                            <!----> <span class="price">4,000원</span>
                                            <!---->
                                        </span> <span class="desc">꼬들꼬들 재미난 식감</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630658125813l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630658125813l0.jpg"
                                                alt="잔여물 걱정을 덜은 안심 세탁세제"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83904</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [마더케이] 디아 세탁세제
                                        </span> <span class="cost"><span class="dc">9%</span>
                                            <span class="price">13,500원</span> <span
                                                class="original">14,900원</span></span> <span
                                            class="desc">잔여물 걱정을 덜은 안심 세탁세제</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630994504141l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630994504141l0.jpg"
                                                alt="다채롭게 경험하는 덴마크의 계절"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">86581</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [대니시비키퍼스] 로모섬의 꿀
                                            미니 3종 세트 </span> <span class="cost">
                                            <!----> <span class="price">82,000원</span>
                                            <!---->
                                        </span> <span class="desc">다채롭게 경험하는 덴마크의 계절</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/163065733513l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/163065733513l0.jpg"
                                                alt="트랙 위를 돌고 도는 타요 버스"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83896</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [아이코닉스] 빙글빙글 타요
                                            트랙 놀이세트 </span> <span class="cost"><span
                                                class="dc">9%</span> <span
                                                class="price">42,900원</span> <span
                                                class="original">47,500원</span></span> <span
                                            class="desc">트랙 위를 돌고 도는 타요 버스</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630643986294l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630643986294l0.jpg"
                                                alt="아이들 도시락 반찬으로 딱"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68512</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬]
                                            브로콜리소시지야채볶음 </span> <span class="cost">
                                            <!----> <span class="price">4,000원</span>
                                            <!---->
                                        </span> <span class="desc">아이들 도시락 반찬으로 딱</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630658402120l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630658402120l0.jpg"
                                                alt="허브와 올리브 향의 싱그러운 조화"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83905</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [마더케이] 디아 섬유유연제
                                        </span> <span class="cost"><span class="dc">10%</span>
                                            <span class="price">11,500원</span> <span
                                                class="original">12,900원</span></span> <span
                                            class="desc">허브와 올리브 향의 싱그러운 조화</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630646468320l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630646468320l0.jpg"
                                                alt="달달한 포도향의 저불소 치약"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83903</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [케이맘] 키즈치약 저불소
                                            포도향 50g </span> <span class="cost"><span
                                                class="dc">4%</span> <span
                                                class="price">4,700원</span> <span
                                                class="original">4,900원</span></span> <span
                                            class="desc">달달한 포도향의 저불소 치약</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630651099898l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630651099898l0.jpg"
                                                alt="덴마크의 자연이 선물하는 꿀"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">86754</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [대니시비키퍼스] 로모섬의 꿀
                                            미니 3종 </span> <span class="cost">
                                            <!----> <span class="price">29,000원</span>
                                            <!---->
                                        </span> <span class="desc">덴마크의 자연이 선물하는 꿀</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/163064758197l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/163064758197l0.jpg"
                                                alt="부드럽게 조린 국산 검은콩"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">68514</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [비움반찬] 콩자반
                                        </span> <span class="cost">
                                            <!----> <span class="price">4,000원</span>
                                            <!---->
                                        </span> <span class="desc">부드럽게 조린 국산 검은콩</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630568235810l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630568235810l0.jpg"
                                                alt="캘리포니아의 떼루아를 품은 정통 체다"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">78356</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [김소영 아티장의 안단테]
                                            시에라 네바다 그래지어 샤프 체다 </span> <span class="cost"><span
                                                class="dc">10%</span> <span
                                                class="price">12,960원</span> <span
                                                class="original">14,400원</span></span> <span
                                            class="desc">캘리포니아의 떼루아를 품은 정통 체다</span> <span
                                            class="tag"><span class="ico limit tag_type2">Kurly
                                                Only</span></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630656624175l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630656624175l0.jpg"
                                                alt="타요와 함께 하는 뚝딱 공사장 놀이"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">83898</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [아이코닉스] 타요 중장비
                                            놀이세트 </span> <span class="cost"><span
                                                class="dc">16%</span> <span
                                                class="price">30,900원</span> <span
                                                class="original">37,000원</span></span> <span
                                            class="desc">타요와 함께 하는 뚝딱 공사장 놀이</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                            <li>
                                <div class="item">
                                    <div class="thumb"><a class="img"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1630632143365l0.jpg&quot;);">
                                            <!---->
                                            <!---->
                                            <!----> <img
                                                src="https://img-cf.kurly.com/shop/data/goods/1630632143365l0.jpg"
                                                alt="시원하고 새콤달콤한 맛"
                                                onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                        </a>
                                        <!---->
                                        <div class="group_btn"><button type="button"
                                                class="btn btn_cart"><span
                                                    class="screen_out">86502</span></button>
                                            <!---->
                                            <!---->
                                        </div>
                                    </div> <a class="info"><span class="name"> [미닛메이드] 아이스 튜브 과일
                                            아이스바 (89ml x 8입) </span> <span class="cost">
                                            <!----> <span class="price">10,900원</span>
                                            <!---->
                                        </span> <span class="desc">시원하고 새콤달콤한 맛</span> <span
                                            class="tag">
                                            <!---->
                                        </span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="layout-pagination">
                    <div class="pagediv"><a href="#main"
                            class="layout-pagination-button layout-pagination-first-page">맨 처음 페이지로 가기</a> <a
                            href="#main" class="layout-pagination-button layout-pagination-prev-page">이전 페이지로 가기</a>
                        <span>
                            <!----> <strong
                                class="layout-pagination-button layout-pagination-number __active">1</strong>
                        </span><span><a class="layout-pagination-button layout-pagination-number">2</a>
                            <!---->
                        </span><span><a class="layout-pagination-button layout-pagination-number">3</a>
                            <!---->
                        </span><span><a class="layout-pagination-button layout-pagination-number">4</a>
                            <!---->
                        </span><span><a class="layout-pagination-button layout-pagination-number">5</a>
                            <!---->
                        </span> <a href="#main" class="layout-pagination-button layout-pagination-next-page">다음 페이지로
                            가기</a> <a href="#main" class="layout-pagination-button layout-pagination-last-page">맨 끝
                            페이지로 가기</a></div>
                </div>
            </div>
        </div>
        <div class="bg_loading" id="bgLoading" style="display: none;">
            <div class="loading_show"></div>
        </div>
        <script src="/common_js/common_filter.js?ver=1.39.7"></script>
        <script src="/common_js/goodslist_v1.js?ver=1.39.7"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var categoryNo = null;
                if (sessionStorage.getItem('goodsListReferrer') && sessionStorage.getItem('goodsListReferrer') ===
                    'goodsView') {
                    // 이전페이지가 상품상세일경우
                    lnbMenu.referrer = true;
                    goodsList.referrer = true;
                    if (sessionStorage.getItem('gListCategoryNo') && '038' != '029' && '038' != '038') {
                        categoryNo = sessionStorage.getItem('gListCategoryNo');
                    } else {
                        categoryNo = "038";
                    }
                } else {
                    lnbMenu.referrer = false;
                    goodsList.referrer = false;
                    categoryNo = "038";
                }

                // 카테고리호출
                lnbMenu.getCategoryNum = categoryNo;

                // 상품목록노출
                // 신상품
                goodsList.pageType = 'new';
                goodsList.type = "pc";

                lnbMenu.update();
            });
        </script>
    </div>
</div>

@include('layouts.desktop.footer')
