@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
    <div id="content">

        <div id="qnb" class="quick-navigation">
            

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
                    nowTime: '1631095873783',
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
                    var i, len, getGoodsRecent, item, _nowTime = '1631095873783';

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
                    <h3 class="tit">베스트</h3>
                    <ul class="list" style="">
                        <li data-start="172" data-end="188"><a class="on">전체보기</a></li>
                        <li class="bg"></li>
                    </ul>
                </div>
            </div>
            <div id="goodsList" class="page_section section_goodslist">
                <div class="list_ability">
                    <div class="sort_menu">
                        <div class=""><p class=" count"><span class="inner_count"> 총 153건 </span></p>
                            <div class="select_type user_sort"><a class="name_select">추천순</a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <ul class="list">
                                    <li><a class="on">추천순</a></li>
                                    <li><a class="">신상품순</a></li><li><a class="">인기상품순</a></li><li><a class="
                                            ">혜택순</a></li><li><a class="">낮은 가격순</a></li>
                                    <li><a class="">높은 가격순</a></li></ul></div></div></div></div> <div class="
                                            list_goods">
                                            <div class="inner_listgoods">
                                                <ul class="list">
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1582679286838l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1582679286838l0.jpg"
                                                                        alt="가볍고 든든한 멕시칸 푸드"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">27449</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [남향푸드또띠아] 간편 간식 브리또 10종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">2,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">가볍고 든든한 멕시칸
                                                                    푸드</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1610086506164l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1610086506164l0.jpg"
                                                                        alt="가격, 퀄리티 모두 만족스러운 1A등급 우유"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">63110</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [연세우유 x 마켓컬리] 전용목장우유 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,850원</span>
                                                                    <!---->
                                                                </span> <span class="desc">가격, 퀄리티 모두 만족스러운
                                                                    1A등급 우유</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/160275313581l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/160275313581l0.jpg"
                                                                        alt="온 가족이 안심하고 즐기는 KF365 달걀"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">56791</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 1+등급 무항생제 특란 20구
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">온 가족이 안심하고 즐기는
                                                                    KF365 달걀</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1621474797878l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1621474797878l0.jpg"
                                                                        alt="간편하게 즐기는 도톰한 떡갈비"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">36067</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [미트클레버] 한돈 떡갈비 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">2,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">간편하게 즐기는 도톰한
                                                                    떡갈비</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623202331470l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1623202331470l0.jpg"
                                                                        alt="무항생제 닭가슴살을 사용한 간편 큐브(신규옵션추가)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">52644</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Better me] 닭가슴살 큐브 6종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,600원</span>
                                                                    <!---->
                                                                </span> <span class="desc">무항생제 닭가슴살을 사용한 간편
                                                                    큐브(신규옵션추가)</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617171550430l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1617171550430l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">69371</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 김구원선생 국내산 무농약 콩나물
                                                                    300g </span> <span class="cost">
                                                                    <!----> <span class="price">900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1583469568747l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1583469568747l0.jpg"
                                                                        alt="부드럽게 즐기는 달콤한 간식! 한라봉 샌드 신규 오픈!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">49537</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [치엔바오] 대만 샌드위치 4종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">부드럽게 즐기는 달콤한 간식!
                                                                    한라봉 샌드 신규 오픈!</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1587961338737l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1587961338737l0.jpg"
                                                                        alt="(신제품 출시) 골라먹는 재미! 에어프라이어로 간편하게 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">50287</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [더오담] 에어프라이어 돈까스 4종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,600원</span>
                                                                    <!---->
                                                                </span> <span class="desc">(신제품 출시) 골라먹는 재미!
                                                                    에어프라이어로 간편하게 </span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594087793149l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1594087793149l0.jpg"
                                                                        alt="매일 먹기 좋은 식빵"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">53533</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [오늘식빵] 우유 듬뿍 식빵 </span>
                                                                <span class="cost"><span
                                                                        class="dc">15%</span> <span
                                                                        class="price">2,295원</span> <span
                                                                        class="original">2,700원</span></span>
                                                                <span class="desc">매일 먹기 좋은 식빵</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1586763189556l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1586763189556l0.jpg"
                                                                        alt="커피빈 라떼를 어디서나 간편하게 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">49857</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [커피빈] 헤이즐넛 라떼 파우치 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,400원</span>
                                                                    <!---->
                                                                </span> <span class="desc">커피빈 라떼를 어디서나 간편하게
                                                                </span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1607495842925l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1607495842925l0.jpg"
                                                                        alt="학교 앞 분식집에서 먹던 그 맛"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">61776</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [금미옥] 쌀 떡볶이 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">5,100원</span>
                                                                    <!---->
                                                                </span> <span class="desc">학교 앞 분식집에서 먹던 그
                                                                    맛</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1611300003525l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1611300003525l0.jpg"
                                                                        alt="다채로운 토핑을 얹은 샐러드"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">66426</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [스윗밸런스] 오늘의 샐러드 6종 </span>
                                                                <span class="cost"><span
                                                                        class="dc">20%</span> <span
                                                                        class="price">3,920원</span> <span
                                                                        class="original">4,900원</span></span>
                                                                <span class="desc">다채로운 토핑을 얹은 샐러드</span>
                                                                <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1621562633193l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1621562633193l0.jpg"
                                                                        alt="부드럽고 상큼한 과육, 숲속의 버터 (1개) "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">491</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 아보카도 1개 </span>
                                                                <span class="cost"><span
                                                                        class="dc">10%</span> <span
                                                                        class="price">1,521원</span> <span
                                                                        class="original">1,690원</span></span>
                                                                <span class="desc">부드럽고 상큼한 과육, 숲속의 버터 (1개)
                                                                </span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609216158342l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1609216158342l0.jpg"
                                                                        alt="국산 찹쌀로 빚고 부담없이 담은"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">55242</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [서울마님] 미니 인절미 3종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">국산 찹쌀로 빚고 부담없이
                                                                    담은</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623201851712l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1623201851712l0.jpg"
                                                                        alt="무항생제 닭가슴살을 사용해 촉촉하게 (신규옵션추가)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">52635</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Better me] 냉장 닭가슴살 5종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">무항생제 닭가슴살을 사용해
                                                                    촉촉하게 (신규옵션추가)</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1539841569718l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1539841569718l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">30559</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 애호박 1개 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,980원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580273851697l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1580273851697l0.jpg"
                                                                        alt="토핑을 곁들인 간편 요거트"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48086</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [서울우유] 비요뜨 요거트 5종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,330원</span>
                                                                    <!---->
                                                                </span> <span class="desc">토핑을 곁들인 간편
                                                                    요거트</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1576555859415l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1576555859415l0.jpg"
                                                                        alt="40년 넘게 꾸준히 사랑받는 추억의 커피 우유!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">45156</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [서울우유] 삼각 커피 우유 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">790원</span>
                                                                    <!---->
                                                                </span> <span class="desc">40년 넘게 꾸준히 사랑받는
                                                                    추억의 커피 우유!</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1513835965818l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1513835965818l0.jpg"
                                                                        alt="새싹이 듬뿍, 카레의 건강한 변신!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">11248</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [순수람] 채소를 담은 자연주의 채담카레
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,850원</span>
                                                                    <!---->
                                                                </span> <span class="desc">새싹이 듬뿍, 카레의 건강한
                                                                    변신!</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1621834213375l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1621834213375l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">31441</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] DOLE 실속 바나나
                                                                    1.1kg(필리핀) </span> <span class="cost">
                                                                    <!----> <span class="price">2,980원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602484265384l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1602484265384l0.jpg"
                                                                        alt="대가가 선보이는 한 그릇"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">60255</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [이연복의 목란] 짜장면 2인분 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">9,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">대가가 선보이는 한
                                                                    그릇</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1573192324966l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1573192324966l0.jpg"
                                                                        alt="입 안 가득 행복한 베이글"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">43454</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [훕훕베이글] 시그니처 베이글 6종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">입 안 가득 행복한
                                                                    베이글</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1615443861198l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1615443861198l0.jpg"
                                                                        alt="매콤한 불맛이 담긴 한 그릇"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">68232</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [이연복의 목란] 짬뽕 2인분 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">13,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">매콤한 불맛이 담긴 한
                                                                    그릇</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1476973938974l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1476973938974l0.jpg"
                                                                        alt="500mx20개입 / 2Lx6개입"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">4497</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [샛별배송] 제주 삼다수 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">5,980원</span>
                                                                    <!---->
                                                                </span> <span class="desc">500mx20개입 /
                                                                    2Lx6개입</span> <span class="tag"><span
                                                                        class="ico limit">한정수량</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1616647141672l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1616647141672l0.jpg"
                                                                        alt="간편하게 구워 먹는 촉촉한 닭가슴살"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">69036</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [자연실록] 닭가슴살 큐브 스테이크 3종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">간편하게 구워 먹는 촉촉한
                                                                    닭가슴살</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1604989499192l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1604989499192l0.jpg"
                                                                        alt="다채로운 한식메뉴로 즐기는 도시락!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">60785</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [탄단지] 가벼운 한식 도시락 6종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">다채로운 한식메뉴로 즐기는
                                                                    도시락!</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530173860335l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1530173860335l0.jpg"
                                                                        alt="단단하고 아삭한 양파의 매력 (1망/1.5kg)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26451</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 햇 양파 1.5kg </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">3,290원</span>
                                                                    <!---->
                                                                </span> <span class="desc">단단하고 아삭한 양파의 매력
                                                                    (1망/1.5kg)</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1559292668552l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1559292668552l0.jpg"
                                                                        alt="쿠키앤크림 신규 런칭! 다채롭게 즐기는 달콤 한 스푼"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">13500</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [라라스윗] 칼로리가 가벼운 아이스크림 12종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">쿠키앤크림 신규 런칭! 다채롭게
                                                                    즐기는 달콤 한 스푼</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591680013767l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1591680013767l0.jpg"
                                                                        alt="닭갈비와 떡볶이의 오묘한 조화"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">50290</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 춘천 국물 닭갈비 떡볶이 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">11,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">닭갈비와 떡볶이의 오묘한
                                                                    조화</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580878680982l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1580878680982l0.jpg"
                                                                        alt="좋은 우유의 기준을 찾아 설계한"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48666</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Kurly's] 동물복지 우유 900ml
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">2,950원</span>
                                                                    <!---->
                                                                </span> <span class="desc">좋은 우유의 기준을 찾아
                                                                    설계한</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1596444159995l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1596444159995l0.jpg"
                                                                        alt="진짜 갈비로 우려낸 전통 갈비탕"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26468</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [사미헌] 갈비탕 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">12,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">진짜 갈비로 우려낸 전통
                                                                    갈비탕</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623040564849l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1623040564849l0.jpg"
                                                                        alt="무항생제 닭가슴살을 이용한 소시지"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">69951</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Better me] 닭가슴살 소시지 3종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">무항생제 닭가슴살을 이용한
                                                                    소시지</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609141186826l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1609141186826l0.jpg"
                                                                        alt="껍질째 먹을 수 있는 친환경 흙당근 (500g 내외)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">70</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 친환경 당근 500g </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">2,490원</span>
                                                                    <!---->
                                                                </span> <span class="desc">껍질째 먹을 수 있는 친환경
                                                                    흙당근 (500g 내외)</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1599637306144l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1599637306144l0.jpg"
                                                                        alt="가볍지만 알차게 즐기는 볶음밥"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48186</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [청정원]라이틀리 곤약 볶음밥 4종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">가볍지만 알차게 즐기는
                                                                    볶음밥</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1583138365909l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1583138365909l0.jpg"
                                                                        alt="언제 어디서나 간편하게 마시는"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48752</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [커피빈] 아메리카노 파우치 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,300원</span>
                                                                    <!---->
                                                                </span> <span class="desc">언제 어디서나 간편하게
                                                                    마시는</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617348169380l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1617348169380l0.jpg"
                                                                        alt="무항생제 인증! 안심하고 즐기는 쫄깃한 식감"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">69853</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [다향오리] 훈제오리 150g </span>
                                                                <span class="cost"><span
                                                                        class="dc">13%</span> <span
                                                                        class="price">2,592원</span> <span
                                                                        class="original">2,980원</span></span>
                                                                <span class="desc">무항생제 인증! 안심하고 즐기는 쫄깃한
                                                                    식감</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1536821378867l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1536821378867l0.jpg"
                                                                        alt="드디어, 집에서 만나는 미미네 떡볶이"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29682</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 미미네 떡볶이 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">4,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">드디어, 집에서 만나는 미미네
                                                                    떡볶이</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1588746791235l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1588746791235l0.jpg"
                                                                        alt="컬리가 자신있게 제안하는 데일리 통밀 식빵"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">52922</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Kurly's] R15 통밀 식빵 </span>
                                                                <span class="cost"><span
                                                                        class="dc">7%</span> <span
                                                                        class="price">3,255원</span> <span
                                                                        class="original">3,500원</span></span>
                                                                <span class="desc">컬리가 자신있게 제안하는 데일리 통밀
                                                                    식빵</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592985466972l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1592985466972l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">54657</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 다다기오이 3입 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">3,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1532654724641l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1532654724641l0.jpg"
                                                                        alt="만능 양념채소"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">27320</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 깐대파 500g </span> <span
                                                                    class="cost"><span
                                                                        class="dc">2%</span> <span
                                                                        class="price">2,720원</span> <span
                                                                        class="original">2,790원</span></span>
                                                                <span class="desc">만능 양념채소</span> <span
                                                                    class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1486537401661l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1486537401661l0.jpg"
                                                                        alt="뉴욕에서 맛본 바로 그 맛"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">2697</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [픽어베이글] 베이글 8종 </span>
                                                                <span class="cost"><span
                                                                        class="dc">10%</span> <span
                                                                        class="price">2,520원</span> <span
                                                                        class="original">2,800원</span></span>
                                                                <span class="desc">뉴욕에서 맛본 바로 그 맛</span>
                                                                <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591686295529l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1591686295529l0.jpg"
                                                                        alt="식물성 단백질이 듬뿍 담긴 이색 면"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">53977</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [풀무원] 두부면 2종 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">2,600원</span>
                                                                    <!---->
                                                                </span> <span class="desc">식물성 단백질이 듬뿍 담긴 이색
                                                                    면</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/156748537289l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/156748537289l0.jpg"
                                                                        alt="언제 어디서나 즐기는 고품격 샐러드"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">9669</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [샐러드판다] 병 샐러드 11종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">5,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">언제 어디서나 즐기는 고품격
                                                                    샐러드</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1585196075113l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1585196075113l0.jpg"
                                                                        alt="365일 즐기는 100% 캘리포니아산 아몬드 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">3071</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [매일] 아몬드 브리즈 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">700원</span>
                                                                    <!---->
                                                                </span> <span class="desc">365일 즐기는 100%
                                                                    캘리포니아산 아몬드 </span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1542260327430l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1542260327430l0.jpg"
                                                                        alt="샐러드에 빠지지 않는 아삭한 양상추"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">31100</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 양상추 1입 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">2,990원</span>
                                                                    <!---->
                                                                </span> <span class="desc">샐러드에 빠지지 않는 아삭한
                                                                    양상추</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1598408363673l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1598408363673l0.jpg"
                                                                        alt="달콤 상콤한 제철사과 자홍! 5~6입 봉"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29439</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> GAP 햇사과 한봉지 (자홍) 5~6입
                                                                </span> <span class="cost"><span
                                                                        class="dc">20%</span> <span
                                                                        class="price">6,392원</span> <span
                                                                        class="original">7,990원</span></span>
                                                                <span class="desc">달콤 상콤한 제철사과 자홍! 5~6입
                                                                    봉</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1536546967814l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1536546967814l0.jpg"
                                                                        alt="껍질, 내장, 꼬리까지 완벽 제거한 손질 생새우 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29524</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Sea to Table] 손질 생새우살
                                                                    200g(냉동) </span> <span class="cost">
                                                                    <!----> <span class="price">8,300원</span>
                                                                    <!---->
                                                                </span> <span class="desc">껍질, 내장, 꼬리까지 완벽
                                                                    제거한 손질 생새우 </span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602750048272l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1602750048272l0.jpg"
                                                                        alt="온 가족이 안심하고 즐기는 KF365 달걀"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">56790</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 1+등급 무항생제 특란 10구
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">3,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">온 가족이 안심하고 즐기는
                                                                    KF365 달걀</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1611633736465l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1611633736465l0.jpg"
                                                                        alt="꾸덕꾸덕한 질감의 농축 요거트"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">62447</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [그릭데이] 그릭요거트 시그니처 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">3,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">꾸덕꾸덕한 질감의 농축
                                                                    요거트</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623823212498l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1623823212498l0.jpg"
                                                                        alt="다양한 토핑으로 채운 떡 구이"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">73865</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [서울마님] 간편 간식 떡구이 5종 (냉동)
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">다양한 토핑으로 채운 떡
                                                                    구이</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1581303042100l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1581303042100l0.jpg"
                                                                        alt="원하는 재료와 함께 뚝딱 끓여내는 간편 찌개!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48639</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [다담] 찌개 양념장 6종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">1,680원</span>
                                                                    <!---->
                                                                </span> <span class="desc">원하는 재료와 함께 뚝딱 끓여내는
                                                                    간편 찌개!</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530775904997l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1530775904997l0.jpg"
                                                                        alt="묵은지와 차돌박이의 기분 좋은 조화"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">25689</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [LOTS OF LOVE] 차돌듬뿍 묵은지 볶음밥
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">묵은지와 차돌박이의 기분 좋은
                                                                    조화</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1590138142177l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1590138142177l0.jpg"
                                                                        alt="[1개당 약 400원] 미네랄이 담긴 천연 광천수"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">53097</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [샛별배송] 하이트진로 석수 2L X 6개입
                                                                </span> <span class="cost"><span
                                                                        class="dc">4%</span> <span
                                                                        class="price">2,200원</span> <span
                                                                        class="original">2,300원</span></span>
                                                                <span class="desc">[1개당 약 400원] 미네랄이 담긴 천연
                                                                    광천수</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1610353038176l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1610353038176l0.jpg"
                                                                        alt="[극한직업 어묵편 방송] 탱글한 어묵이 담긴 우동 한그릇 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">65872</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [더플랜] 목련 어묵 우동 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">3,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">[극한직업 어묵편 방송] 탱글한
                                                                    어묵이 담긴 우동 한그릇 </span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592802536569l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1592802536569l0.jpg"
                                                                        alt="1구 당 판매가: 448원"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29850</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Kurly's] 동물복지 유정란 20구
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">8,950원</span>
                                                                    <!---->
                                                                </span> <span class="desc">1구 당 판매가:
                                                                    448원</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1529472926573l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1529472926573l0.jpg"
                                                                        alt="내 취향에 맞는 샐러드 고르기"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26771</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [어게인리프레쉬] 샐러드 5종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">5,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">내 취향에 맞는 샐러드
                                                                    고르기</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1600134650958l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1600134650958l0.jpg"
                                                                        alt="이탈리아 정통 레시피를 담아낸"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">6565</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [폰타나] 파스타소스 6종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">이탈리아 정통 레시피를
                                                                    담아낸</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530769556979l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1530769556979l0.jpg"
                                                                        alt="Better me 오리지널의 식감은 살리고 염도는 줄인(낱개 구매 가능)
  " onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26847</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Better me] 냉동 닭가슴살 4종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,700원</span>
                                                                    <!---->
                                                                </span> <span class="desc">Better me 오리지널의
                                                                    식감은 살리고 염도는 줄인(낱개 구매 가능)
                                                                </span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591939884454l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1591939884454l0.jpg"
                                                                        alt="집에서 만나는 메밀 명가"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">52203</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [광화문 미진] 메밀국수 (2인분) </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">8,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">집에서 만나는 메밀
                                                                    명가</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593568688351l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1593568688351l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">54885</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 흙대파 1단 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,480원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580721583143l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1580721583143l0.jpg"
                                                                        alt="집에서 즐기는 빕스의 대표 메뉴"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48790</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [빕스] 바베큐 폭립 오리지날 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">14,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">집에서 즐기는 빕스의 대표
                                                                    메뉴</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/156454938946l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/156454938946l0.jpg"
                                                                        alt="쫄깃한 어육의 속을 꽉 채운 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">38249</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [고래사] 스페셜 어묵 4종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">쫄깃한 어육의 속을 꽉 채운
                                                                </span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/156982370323l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/156982370323l0.jpg"
                                                                        alt="샐러드를 꼭꼭 눌러담아 두툼하게 즐기는"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">41968</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [그린밤] 샐러드 샌드위치 4종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,300원</span>
                                                                    <!---->
                                                                </span> <span class="desc">샐러드를 꼭꼭 눌러담아 두툼하게
                                                                    즐기는</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/157915761928l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/157915761928l0.jpg"
                                                                        alt="100g당 판매가: 7600원"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">47857</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [델리치오] 호주산 목초육 안심 스테이크
                                                                    250g(냉장) </span> <span class="cost"><span
                                                                        class="dc">20%</span> <span
                                                                        class="price">15,200원</span> <span
                                                                        class="original">19,000원</span></span>
                                                                <span class="desc">100g당 판매가: 7600원</span>
                                                                <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1581560143206l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1581560143206l0.jpg"
                                                                        alt="넉넉하게 즐기는 그릭 요거트"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">47640</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [후디스] 그릭 요거트 대용량 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,450원</span>
                                                                    <!---->
                                                                </span> <span class="desc">넉넉하게 즐기는 그릭
                                                                    요거트</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1626322356263l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1626322356263l0.jpg"
                                                                        alt="차분한 색으로 꼼꼼하게 완성한"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">35741</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [생활공작소] 고무장갑 6종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">2,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">차분한 색으로 꼼꼼하게
                                                                    완성한</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617772711469l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1617772711469l0.jpg"
                                                                        alt="통통한 관자를 듬뿍"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">69137</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [최현석의 쵸이닷] 가리비 바질 페스토 파스타
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">14,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">통통한 관자를 듬뿍</span>
                                                                <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1561969780121l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1561969780121l0.jpg"
                                                                        alt="간편하고 맛있게 먹는 단백질"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">37604</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [프레드] 프로틴 케이크 8종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">간편하고 맛있게 먹는
                                                                    단백질</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580715771877l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1580715771877l0.jpg"
                                                                        alt="두고 먹기 좋은 기획 세트 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">47711</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> Hallo! 노르웨이 고등어 (3개입)
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">8,300원</span>
                                                                    <!---->
                                                                </span> <span class="desc">두고 먹기 좋은 기획 세트
                                                                </span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1608799889974l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1608799889974l0.jpg"
                                                                        alt="이탈리안 레스토랑의 봉골레"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">63758</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [최현석의 쵸이닷] 새우 봉골레 파스타
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">8,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">이탈리안 레스토랑의
                                                                    봉골레</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1572586500506l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1572586500506l0.jpg"
                                                                        alt="담백한 차돌양지가 돋보이는 된장찌개"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">42765</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [외할머니댁] 차돌 된장찌개 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">7,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">담백한 차돌양지가 돋보이는
                                                                    된장찌개</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609303083272l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1609303083272l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">63578</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 대추방울토마토 750g
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,400원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1536631691267l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1536631691267l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29438</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 방울토마토 500g </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1598232635870l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1598232635870l0.jpg"
                                                                        alt="간편하게 더하는 명란의 감칠맛"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26587</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [덕화명란 X 백년가게] 튜브 명란
                                                                    110g(냉동) </span> <span class="cost">
                                                                    <!----> <span class="price">5,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">간편하게 더하는 명란의
                                                                    감칠맛</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1587346611469l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1587346611469l0.jpg"
                                                                        alt="든든하고 푸짐한 한 그릇"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">51186</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [강남면옥] 갈비탕 </span> <span
                                                                    class="cost">
                                                                    <!----> <span
                                                                        class="price">11,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">든든하고 푸짐한 한
                                                                    그릇</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1621842566799l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1621842566799l0.jpg"
                                                                        alt="상큼하게 즐기는 주황빛 과육"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">74050</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 제주 하우스 감귤 2종 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">9,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">상큼하게 즐기는 주황빛
                                                                    과육</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580187595675l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1580187595675l0.jpg"
                                                                        alt="사골로 우린 진한 육수에 국내산 대파"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">48646</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [담뿍] 대파 육개장 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">6,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">사골로 우린 진한 육수에 국내산
                                                                    대파</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1616034284976l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1616034284976l0.jpg"
                                                                        alt="믿고 쓰는 우리 집 물티슈"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">61286</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Kurly's] 데일리 물티슈 2종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,400원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 쓰는 우리 집
                                                                    물티슈</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1464947514506l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1464947514506l0.jpg"
                                                                        alt="NEW 헝가리안굴라쉬, 밤크림수프 오픈"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">2749</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [라쿠치나] 수프 6종 </span> <span
                                                                    class="cost"><span
                                                                        class="dc">1%</span> <span
                                                                        class="price">2,750원</span> <span
                                                                        class="original">2,800원</span></span>
                                                                <span class="desc">NEW 헝가리안굴라쉬, 밤크림수프
                                                                    오픈</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1582018750937l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1582018750937l0.jpg"
                                                                        alt="갓 지은 밥 맛! 햇반을 낱개로, 6개입으로 알뜰하게 구매하세요! "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">3490</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [햇반] 백미밥 210g (1입/6입)
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">갓 지은 밥 맛! 햇반을
                                                                    낱개로, 6개입으로 알뜰하게 구매하세요! </span> <span
                                                                    class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1531469051568l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1531469051568l0.jpg"
                                                                        alt="취향대로 볶아 먹는 매콤한 별미 "
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">27202</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [Mr.주꾸미] 주꾸미 볶음 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">8,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc">취향대로 볶아 먹는 매콤한 별미
                                                                </span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1622535304171l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1622535304171l0.jpg"
                                                                        alt="골라 먹는 스테디셀러 롯데제과 아이스크림"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">71517</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [롯데제과] 추억의 아이스크림 골라담기 12종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">1,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">골라 먹는 스테디셀러 롯데제과
                                                                    아이스크림</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1542767492842l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1542767492842l0.jpg"
                                                                        alt="맛과 간편함을 모두 잡은 멕시칸 푸드"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">30877</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [도스타코스] 퀘사디아 3종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">8,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">맛과 간편함을 모두 잡은 멕시칸
                                                                    푸드</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593152257129l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1593152257129l0.jpg"
                                                                        alt="500mL(낱개)/500mLX20개입(박스)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">54320</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [빅토리아] 플레인 스파클링 2종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">600원</span>
                                                                    <!---->
                                                                </span> <span
                                                                    class="desc">500mL(낱개)/500mLX20개입(박스)</span>
                                                                <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/161430709198l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/161430709198l0.jpg"
                                                                        alt=""
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">62642</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> 냉동 블루베리 1kg </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">7,900원</span>
                                                                    <!---->
                                                                </span> <span class="desc"></span> <span
                                                                    class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1625188758567l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1625188758567l0.jpg"
                                                                        alt="바삭한 식빵에 스미는 새우의 풍미"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">75990</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [이연복의 목란] 멘보샤 </span>
                                                                <span class="cost">
                                                                    <!----> <span
                                                                        class="price">12,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">바삭한 식빵에 스미는 새우의
                                                                    풍미</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1596073466362l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1596073466362l0.jpg"
                                                                        alt="구이용 (100g당 판매가 : 2,090원)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">56512</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 한돈 삼겹살 구이용 600g
                                                                    (냉장) </span> <span class="cost">
                                                                    <!----> <span
                                                                        class="price">12,540원</span>
                                                                    <!---->
                                                                </span> <span class="desc">구이용 (100g당 판매가 :
                                                                    2,090원)</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1607929867737l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1607929867737l0.jpg"
                                                                        alt="매콤달콤한 매력의 밥도둑"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">62328</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [홍대주꾸미] 주꾸미 볶음 300g
                                                                </span> <span class="cost"><span
                                                                        class="dc">17%</span> <span
                                                                        class="price">6,500원</span> <span
                                                                        class="original">7,900원</span></span>
                                                                <span class="desc">매콤달콤한 매력의 밥도둑</span>
                                                                <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1577162207404l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1577162207404l0.jpg"
                                                                        alt="고소한 내음 가득한 국민 밥도둑"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">45277</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [광천김] 광천 파래김 (도시락김) 16개입
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">5,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">고소한 내음 가득한 국민
                                                                    밥도둑</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1573462956143l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1573462956143l0.jpg"
                                                                        alt="집에서 즐기는 녹진한 그 맛 (new 옵션 추가)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">43336</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [포비베이글] 크림치즈 8종 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">9,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">집에서 즐기는 녹진한 그 맛
                                                                    (new 옵션 추가)</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span><span
                                                                        class="ico limit">한정수량</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/160464918130l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/160464918130l0.jpg"
                                                                        alt="철학이 담긴 그래놀라, 청담동 그라놀로지 새롭게 리뉴얼!"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">11151</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [그라놀로지] 그래놀라 5종 </span>
                                                                <span class="cost">
                                                                    <!----> <span
                                                                        class="price">11,000원</span>
                                                                    <!---->
                                                                </span> <span class="desc">철학이 담긴 그래놀라, 청담동
                                                                    그라놀로지 새롭게 리뉴얼!</span> <span
                                                                    class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595312894295l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1595312894295l0.jpg"
                                                                        alt="100g당 판매가 6,333원(냉동)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">6175</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [일상味소] 차돌박이 150g (냉동)
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">9,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">100g당 판매가
                                                                    6,333원(냉동)</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1536630959516l0.jpg&quot;);">
                                                                    <!----> <span class="global_sticker"><span
                                                                            class="inner_sticker"><span
                                                                                class="bg_sticker"
                                                                                style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                                            <span class="txt_sticker"><span><span
                                                                                        class="emph_sticker">+20%</span>
                                                                                    <!---->
                                                                                </span><span>
                                                                                    <!----> <span>쿠폰</span>
                                                                                </span></span></span></span>
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1536630959516l0.jpg"
                                                                        alt="믿고 먹을 수 있는 상품을 합리적인 가격에, KF365"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">29436</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [KF365] 완숙토마토 2kg </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">9,300원</span>
                                                                    <!---->
                                                                </span> <span class="desc">믿고 먹을 수 있는 상품을
                                                                    합리적인 가격에, KF365</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1618565156892l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1618565156892l0.jpg"
                                                                        alt="뽀얀 국물 속 진한 매력 (양지 포함)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">68907</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [신선설농탕] 고기 설렁탕 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">7,200원</span>
                                                                    <!---->
                                                                </span> <span class="desc">뽀얀 국물 속 진한 매력 (양지
                                                                    포함)</span> <span class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530167809109l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1530167809109l0.jpg"
                                                                        alt="두유로도 국물로도 훌륭한 (500ml)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">26505</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [소이퀸] 진한 콩물 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">5,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">두유로도 국물로도 훌륭한
                                                                    (500ml)</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1560306463652l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1560306463652l0.jpg"
                                                                        alt="자연이 시간과 함께 만든 음료"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">27520</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [아임얼라이브] 유기농 콤부차 4종
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">3,800원</span>
                                                                    <!---->
                                                                </span> <span class="desc">자연이 시간과 함께 만든
                                                                    음료</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1588751931623l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1588751931623l0.jpg"
                                                                        alt="과일의 향긋함을 그대로 담은"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">51826</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [샹달프] 과일잼 7종 </span> <span
                                                                    class="cost">
                                                                    <!----> <span class="price">5,290원</span>
                                                                    <!---->
                                                                </span> <span class="desc">과일의 향긋함을 그대로
                                                                    담은</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1503380508207l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1503380508207l0.jpg"
                                                                        alt="100g당 판매가 3,750원(냉장)"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">6176</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [일상味소] 다짐육 200g (냉장)
                                                                </span> <span class="cost">
                                                                    <!----> <span class="price">7,500원</span>
                                                                    <!---->
                                                                </span> <span class="desc">100g당 판매가
                                                                    3,750원(냉장)</span> <span
                                                                    class="tag"><span
                                                                        class="ico limit tag_type2">Kurly
                                                                        Only</span></span></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="item">
                                                            <div class="thumb"><a class="img"
                                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1562306917228l0.jpg&quot;);">
                                                                    <!---->
                                                                    <!---->
                                                                    <!----> <img
                                                                        src="https://img-cf.kurly.com/shop/data/goods/1562306917228l0.jpg"
                                                                        alt="살짝 구워서 완성하는 간편한 전 요리"
                                                                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                                                                </a>
                                                                <!---->
                                                                <div class="group_btn"><button type="button"
                                                                        class="btn btn_cart"><span
                                                                            class="screen_out">37794</span></button>
                                                                    <!---->
                                                                    <!---->
                                                                </div>
                                                            </div> <a class="info"><span
                                                                    class="name"> [부침명장] 한입아삭 김치전 </span>
                                                                <span class="cost">
                                                                    <!----> <span class="price">4,080원</span>
                                                                    <!---->
                                                                </span> <span class="desc">살짝 구워서 완성하는 간편한 전
                                                                    요리</span> <span class="tag">
                                                                    <!---->
                                                                </span></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                            </div>
                            <div class="layout-pagination">
                                <div class="pagediv"><a href="#main"
                                        class="layout-pagination-button layout-pagination-first-page">맨 처음 페이지로 가기</a>
                                    <a href="#main" class="layout-pagination-button layout-pagination-prev-page">이전
                                        페이지로 가기</a> <span>
                                        <!----> <strong
                                            class="layout-pagination-button layout-pagination-number __active">1</strong>
                                    </span><span><a class="layout-pagination-button layout-pagination-number">2</a>
                                        <!---->
                                    </span> <a href="#main"
                                        class="layout-pagination-button layout-pagination-next-page">다음 페이지로 가기</a> <a
                                        href="#main" class="layout-pagination-button layout-pagination-last-page">맨 끝
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
                                if (sessionStorage.getItem('gListCategoryNo') && '029' != '029' && '029' != '038') {
                                    categoryNo = sessionStorage.getItem('gListCategoryNo');
                                } else {
                                    categoryNo = "029";
                                }
                            } else {
                                lnbMenu.referrer = false;
                                goodsList.referrer = false;
                                categoryNo = "029";
                            }

                            // 카테고리호출
                            lnbMenu.getCategoryNum = categoryNo;

                            // 상품목록노출
                            goodsList.pageType = "list"; // 일반
                            goodsList.type = "pc";

                            lnbMenu.update();
                        });
                    </script>
                </div>
            </div>

            @include('layouts.desktop.footer')
