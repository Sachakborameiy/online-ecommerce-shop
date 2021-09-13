<link rel="stylesheet" href="../css/desktop/slide/slide-change.css">

@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
    <div id="content">

        <div id="qnb" class="quick-navigation" style="top: 516px;">
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
                    nowTime: '1629962374235',
                    update: function() {
                        $.ajax({
                            url: campaginUrl + '../js/desktop/lib/bnr_quick.html'
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
                        <li>
                            <a class="link_goods" href="/shop/goods/goods_view.php?goodsno=83865">
                                <img src="https://img-cf.kurly.com/shop/data/goods/1629784315437l0.jpg" alt="">
                            </a>
                        </li>
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
                    var i, len, getGoodsRecent, item, _nowTime = '1629962374235';

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
                                        getGoodsRecent[i]
                                        .no + '"><img src="' + getGoodsRecent[i].thumb + '" alt=""></a></li>';
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

        <div id="mainNotice">
            <div id="mainNoticePop"></div>
        </div>
        <!-- <script src="../js/desktop/main_notice_v1.js?ver=1.38.2"></script> -->
        <script>
            mainNotice.type = 'pc';
        </script>

        <div id="kurlyMain" class="page_aticle page_main" style="opacity: 1;">
            <h2 class="screen_out">마켓컬리 메인</h2>
            <!-- 128-1733 -->

            <div>
                <div class="main_type1">
                    <!-- remove_goods_list  -->

                    <div class="slideshow-container">
                        <div class="mySlides">
                            <img src="https://img-cf.kurly.com/shop/data/main/1/pc_img_1630400560.jpg" alt="">
                            <!-- <q>Description slide 1</q> -->
                            <!-- <p class="author">- title: ...</p> -->
                        </div>

                        <div class="mySlides">
                            <img src="https://img-cf.kurly.com/shop/data/main/1/pc_img_1628583839.jpg" alt="">
                            <!-- <q>Description slide 2</q> -->
                            <!-- <p class="author">- title: ...</p> -->
                        </div>

                        <div class="mySlides">
                            <img src="https://img-cf.kurly.com/shop/data/main/1/pc_img_1630486852.jpg" alt="">
                            <!-- <q>Description slide 3</q> -->
                            <!-- <p class="author">- title: ...</p> -->
                        </div>

                        <div class="mySlides">
                            <img src="https://img-cf.kurly.com/shop/data/main/1/pc_img_1630488797.jpg" alt="">
                            <!-- <q>Description slide 4</q> -->
                            <!-- <p class="author">- title: ...</p> -->
                        </div>

                        <div class="mySlides">
                            <img src="https://img-cf.kurly.com/shop/data/main/1/pc_img_1630548666.jpg" alt="">
                            <!-- <q>Description slide 5</q> -->
                            <!-- <p class="author">- title: ...</p> -->
                        </div>

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>
                    </div>
                    <div class="dot-container">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type2">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit">
                                <!----> <span class="name"> 이 상품 어때요?
                                    <!---->
                                </span>
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="이 상품 어때요?" data-section="today_recommendation"
                                        class="list"
                                        style="width: 2215%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1503380562693l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[일상味소] 갈비살 200g(냉장)</a></span> <span
                                                    class="price"><span
                                                        class="dc">10%</span>15,300원 </span> <span
                                                    class="cost">17,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="2" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1503380535966l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[일상味소] 양지 200g(냉장)</a></span> <span
                                                    class="price"><span class="dc">10%</span>8,100원
                                                </span> <span class="cost">9,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/big/201509/325_shop1_348499.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[데체코] 엑스트라버진 올리브 오일</a></span> <span
                                                    class="price"><span class="dc">7%</span>7,900원
                                                </span> <span class="cost">8,500원</span>
                                            </div>
                                        </li>
                                        <li data-index="4" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1578533870214l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[아넬라] 과일 퓨레 9종</a></span> <span
                                                    class="price">
                                                    <!---->3,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="5" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591853516135l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">바질 10g</a></span> <span
                                                    class="price"><span class="dc">5%</span>1,700원
                                                </span> <span class="cost">1,790원</span>
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1499059714730l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">친환경 피망 2입</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>3,030원 </span> <span
                                                    class="cost">3,190원</span>
                                            </div>
                                        </li>
                                        <li data-index="7" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/big/201510/427_shop1_503262.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[쯔베르겐 비제] 유기농 토마토 케첩</a></span>
                                                <span class="price"><span
                                                        class="dc">5%</span>8,000원 </span> <span
                                                    class="cost">8,500원</span>
                                            </div>
                                        </li>
                                        <li data-index="8" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1590727808213l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[풀무원] 생면식감 꽃게탕면</a></span> <span
                                                    class="price"><span
                                                        class="dc">12%</span>4,760원 </span> <span
                                                    class="cost">5,450원</span>
                                            </div>
                                        </li>
                                        <li data-index="9" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627372956875l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">친환경 꽈리고추 100g</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>2,090원 </span> <span
                                                    class="cost">2,200원</span>
                                            </div>
                                        </li>
                                        <li data-index="10" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1521005540783l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[해오름] 유기농 식혜 &amp; 수정과</a></span>
                                                <span class="price">
                                                    <!---->7,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="11" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+얼리버드쿠폰</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1598838893688l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[선물세트] 신앙촌 간장 정성 3호</a></span> <span
                                                    class="price"><span
                                                        class="dc">7%</span>16,740원 </span> <span
                                                    class="cost">18,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="12" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593752126181l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">저탄소 GAP 백도 복숭아 1.8kg 내외
                                                        (5~7입)</a></span> <span class="price"><span
                                                        class="dc">5%</span>17,955원 </span> <span
                                                    class="cost">18,900원</span></div>
                                        </li>
                                        <li data-index="13" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+얼리버드쿠폰</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1498717494759l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[선물세트] 김정환홍삼 6년근 홍삼 정과</a></span>
                                                <span class="price"><span
                                                        class="dc">15%</span>117,300원 </span> <span
                                                    class="cost">138,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="14" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1479282485638l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">동결건조 매생이 3g(냉장)</a></span> <span
                                                    class="price"><span
                                                        class="dc">16%</span>2,016원 </span> <span
                                                    class="cost">2,400원</span>
                                            </div>
                                        </li>
                                        <li data-index="15" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1475633955339l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">MY FIRST 처음 만나는 진짜 식빵</a></span>
                                                <span class="price"><span
                                                        class="dc">5%</span>4,655원 </span> <span
                                                    class="cost">4,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="16" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592972575568l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">생 파슬리 15g</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>1,130원 </span> <span
                                                    class="cost">1,190원</span>
                                            </div>
                                        </li>
                                        <li data-index="17" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1464056216521l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[조선호텔김치] 오이소박이</a></span> <span
                                                    class="price">
                                                    <!---->26,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="18" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1471882143407l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">친환경 백향과 300g</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>6,640원 </span> <span
                                                    class="cost">6,990원</span>
                                            </div>
                                        </li>
                                        <li data-index="19" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1590716056902l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">GAP 거봉포도 1박스(2kg)</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>38,760원 </span> <span
                                                    class="cost">40,800원</span>
                                            </div>
                                        </li>
                                        <li data-index="20" class="" style=" float: left; list-style: none;
                                            position: relative; width: 249px; margin-right: 18px;"
                                            data-name="today_recommendation"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1463996906146l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">친환경 파채 200g</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>3,135원 </span> <span
                                                    class="cost">3,300원</span>
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type3 bg">
                    <div class="main_event">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span
                                        class="ico">특가/혜택</span>
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
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/pc_img_1629888841.jpg&quot;);"></a>
                                    <div class="info_goods">
                                        <!---->
                                        <div class="inner_info"><span class="name"><a
                                                    class="txt">강남면옥 최대 15% 할인</a></span> <span
                                                class="desc"><a class="txt">인기 오프라인 맛집</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li data-index="2"><a class="thumb_goods"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg=="
                                            alt="상품이미지" class="thumb"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/pc_img_1629890334.jpg&quot;);"></a>
                                    <div class="info_goods">
                                        <!---->
                                        <div class="inner_info"><span class="name"><a
                                                    class="txt">최대 20% 할인 + 30% 추가 쿠폰</a></span> <span
                                                class="desc"><a class="txt">오늘 단 하루,
                                                    아모레퍼시픽</a></span></div>
                                    </div>
                                </li>
                                <li data-index="3"><a class="thumb_goods"><img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg=="
                                            alt="상품이미지" class="thumb"
                                            style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/main/3/pc_img_1629891996.jpg&quot;);"></a>
                                    <div class="info_goods">
                                        <!---->
                                        <div class="inner_info"><span class="name"><a
                                                    class="txt">정미경키친 최대 13% 할인</a></span> <span
                                                class="desc"><a class="txt">요리 연구가의 집밥
                                                    밀키트</a></span></div>
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
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">놓치면 후회할
                                        가격</span>
                                    <!---->
                                </a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="놓치면 후회할 가격" data-section="theme_goods_20" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1598579621204l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[더오담] 통치즈 돈까스 3입(에어프라이어)</a></span>
                                                <span class="price"><span
                                                        class="dc">15%</span>9,333원 </span> <span
                                                    class="cost">10,980원</span>
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%쿠폰</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628752314739l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[기획특가] [바븐] 완도산 전복
                                                        1kg내외(생물)</a></span> <span class="price">
                                                    <!---->29,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1626854693409l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[삼성전자][설치배송] 더 세리프 QLED TV
                                                        KQ50LST01EFXKR (125cm/화이트)</a></span> <span
                                                    class="price"><span
                                                        class="dc">26%</span>1,300,698원 </span> <span
                                                    class="cost">1,757,700원</span></div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1625711479454l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[쮸즈] 탄탄면</a></span> <span
                                                    class="price"><span
                                                        class="dc">13%</span>6,003원 </span> <span
                                                    class="cost">6,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1582702725374l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[우주인피자] 허니 갈릭 페퍼로니</a></span> <span
                                                    class="price"><span
                                                        class="dc">15%</span>10,115원 </span> <span
                                                    class="cost">11,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_20"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1524450938653l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[델리치오] 와규 햄버거 패티</a></span> <span
                                                    class="price"><span
                                                        class="dc">30%</span>9,730원 </span> <span
                                                    class="cost">13,900원</span>
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="bnr_main"><a class="link"
                        style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/5/pc_img_1629941500.jpg&quot;);"><span
                            class="inner_link">
                            <!---->
                            <!----> <img src="//img-cf.kurly.com/shop/data/main/5/pc_img_1629941500.jpg"
                                onerror="this.src='https://res.kurly.com/mobile/service/common/bg_1x1.png'">
                        </span>
                        <!---->
                    </a></div>
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
                            <div class="bg_category"><span class="bg_shadow shadow_before"></span> <span
                                    class="bg_shadow shadow_after"></span></div>
                            <div class="category">
                                <ul class="list_category">
                                    <li data-start="33" data-end="129"><a data-no="522" href="#none"
                                            class="menu"> 추석 선물세트 </a></li>
                                    <li data-start="154" data-end="196"><a data-no="907" href="#none"
                                            class="menu"> 채소 </a></li>
                                    <li data-start="221" data-end="317"><a data-no="908" href="#none"
                                            class="menu"> 과일·견과·쌀 </a></li>
                                    <li data-start="342" data-end="464"><a data-no="909" href="#none"
                                            class="menu"> 수산·해산·건어물 </a>
                                    </li>
                                    <li data-start="489" data-end="564"><a data-no="910" href="#none"
                                            class="menu"> 정육·계란 </a></li>
                                    <li data-start="589" data-end="711"><a data-no="911" href="#none"
                                            class="menu"> 국·반찬·메인요리 </a>
                                    </li>
                                    <li data-start="736" data-end="837"><a data-no="912" href="#none"
                                            class="menu"> 샐러드·간편식 </a></li>
                                    <li data-start="862" data-end="958"><a data-no="913" href="#none"
                                            class="menu cut"> 면·양념·오일 </a>
                                    </li>
                                    <li data-start="983" data-end="1126"><a data-no="914" href="#none"
                                            class="menu on"> 생수·음료·우유·커피
                                        </a></li>
                                    <li data-start="1151" data-end="1247"><a data-no="249" href="#none"
                                            class="menu"> 간식·과자·떡 </a>
                                    </li>
                                    <li data-start="1272" data-end="1407"><a data-no="915" href="#none"
                                            class="menu"> 베이커리·치즈·델리 </a>
                                    </li>
                                    <li data-start="1432" data-end="1500"><a data-no="032" href="#none"
                                            class="menu"> 건강식품 </a></li>
                                    <li data-start="1525" data-end="1626"><a data-no="918" href="#none"
                                            class="menu"> 생활용품·리빙 </a>
                                    </li>
                                    <li data-start="1651" data-end="1778"><a data-no="233" href="#none"
                                            class="menu"> 스킨케어·메이크업 </a>
                                    </li>
                                    <li data-start="1803" data-end="1912"><a data-no="012" href="#none"
                                            class="menu"> 헤어·바디·구강 </a>
                                    </li>
                                    <li data-start="1936" data-end="2004"><a data-no="916" href="#none"
                                            class="menu"> 주방용품 </a></li>
                                    <li data-start="2029" data-end="2097"><a data-no="085" href="#none"
                                            class="menu"> 가전제품 </a></li>
                                    <li data-start="2122" data-end="2210"><a data-no="919" href="#none"
                                            class="menu"> 베이비·키즈 </a></li>
                                    <li data-start="2234" data-end="2302"><a data-no="991" href="#none"
                                            class="menu"> 반려동물 </a></li>
                                    <!---->
                                </ul>
                            </div>
                        </div>
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 462px;">
                                    <ul data-title="MD의 추천" data-section="md_choice" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class="" data-name=" md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1607310421182l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[기획] 밀크온밀크 동물복지 유기농 목초 우유(750mL X
                                                        2개입)</a></span> <span class="price">
                                                    <!---->7,400원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="2" class="" data-name=" md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595486133353l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[쿼터패스트] 액상 과일차 2종</a></span> <span
                                                    class="price">
                                                    <!---->8,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut" data-name="md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/15651533346l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[맑은물에] 참 좋은 국산 흑임자 콩물
                                                        1000mL</a></span> <span class="price">
                                                    <!---->5,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="4" class="" data-name=" md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1612233586811l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[페이브] 캡슐 커피 3종 (네스프레소 호환)</a></span>
                                                <span class="price">
                                                    <!---->7,200원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="5" class="" data-name=" md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1623652734823l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[빈브라더스] 콜드브루 RTD (블랙수트)</a></span>
                                                <span class="price">
                                                    <!---->3,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut" data-name="md_choice"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617859609890l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[언더프레셔] 드립백 (디카페인)</a></span> <span
                                                    class="price">
                                                    <!---->12,000원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="link_cate"><a class="link"><span
                                    class="ico">생수·음료·우유·커피 전체보기</span></a></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="bnr_main"><a class="link"
                        style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/7/pc_img_1629448784.jpg&quot;);"><span
                            class="inner_link">
                            <!---->
                            <!----> <img src="//img-cf.kurly.com/shop/data/main/7/pc_img_1629448784.jpg"
                                onerror="this.src='https://res.kurly.com/mobile/service/common/bg_1x1.png'">
                        </span>
                        <!---->
                    </a></div>
            </div>
            <div>
                <div class="main_type2">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">지금 가장
                                        핫한 상품</span>
                                    <!---->
                                </a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="지금 가장 핫한 상품" data-section="theme_goods_21" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629180148342l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[프레시지] 연안식당 알폭탄 알탕</a></span> <span
                                                    class="price">
                                                    <!---->18,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628835067268l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[KF365] 생 등심 돈까스 8입 1kg
                                                        (냉장)</a></span> <span class="price">
                                                    <!---->12,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1608018960215l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[그래놀라하우스] 그래놀라 4종</a></span> <span
                                                    class="price">
                                                    <!---->13,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1544496906306l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[사미헌] 양념 소갈빗살</a></span> <span
                                                    class="price">
                                                    <!---->23,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1582250277209l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[엄마밥상] 청국장</a></span> <span
                                                    class="price">
                                                    <!---->6,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_21"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593752126181l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">저탄소 GAP 백도 복숭아 1.8kg 내외
                                                        (5~7입)</a></span> <span class="price"><span
                                                        class="dc">5%</span>17,955원 </span> <span
                                                    class="cost">18,900원</span></div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type2 bg" style="background-color: rgb(247, 247, 247);">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">필요한 것만
                                        딱, 주방용품 특가</span>
                                    <!---->
                                </a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="필요한 것만 딱, 주방용품 특가" data-section="theme_goods_9"
                                        class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580881505571l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[네오플램] New FIKA 쿡웨어 팬 7종</a></span>
                                                <span class="price"><span
                                                        class="dc">5%</span>28,405원 </span> <span
                                                    class="cost">29,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+얼리버드쿠폰</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594637593342l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[선물세트] 도블레 칼집이 나지 않는 도마 세트
                                                        그린</a></span> <span class="price"><span
                                                        class="dc">15%</span>42,330원 </span> <span
                                                    class="cost">49,800원</span></div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1545197870633l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[마켓컬리X글라스락] 쿠킹볼 (4개입)</a></span>
                                                <span class="price"><span
                                                        class="dc">15%</span>13,515원 </span> <span
                                                    class="cost">15,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627546063804l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[락앤락] 마카롱 주방가위 2종</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>2,755원 </span> <span
                                                    class="cost">2,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1597761847133l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[그린팬] 그린쉐프 토콰즈 프라이팬 6종</a></span>
                                                <span class="price"><span
                                                        class="dc">20%</span>29,520원 </span> <span
                                                    class="cost">36,900원</span>
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_9"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1603177699664l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[쿠진아트] 실리콘툴 10P 세트</a></span> <span
                                                    class="price"><span
                                                        class="dc">7%</span>37,107원 </span> <span
                                                    class="cost">39,900원</span>
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type2">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span
                                        class="ico">마감세일</span>
                                    <!---->
                                </a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="마감세일" data-section="deadline_sales" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods"><span class="global_sticker"><span
                                                        class="inner_sticker"><span class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1597022561413l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[타미나] 부드러운 백도 복숭아
                                                        1.8kg(5~6입)</a></span> <span class="price"><span
                                                        class="dc">5%</span>19,950원 </span>
                                                <span class="cost">21,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1530167809109l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[소이퀸] 진한 콩물</a></span> <span
                                                    class="price"><span
                                                        class="dc">7%</span>5,115원 </span> <span
                                                    class="cost">5,500원</span>
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods"><span class="global_sticker"><span
                                                        class="inner_sticker"><span class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1597297876103l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">무농약 부드러운 황도 복숭아 1.8kg
                                                        (5~8입)</a></span> <span class="price"><span
                                                        class="dc">5%</span>26,315원 </span> <span
                                                    class="cost">27,700원</span></div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1463994351328l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[쌜모네키친] 오로라 생연어 (냉장)</a></span>
                                                <span class="price"><span
                                                        class="dc">13%</span>20,010원 </span> <span
                                                    class="cost">23,000원</span>
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods"><span class="global_sticker"><span
                                                        class="inner_sticker"><span class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628498472909l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[해원에스디] 신안군수 품질보증 생물새우
                                                        2종(생물)</a></span> <span class="price"><span
                                                        class="dc">5%</span>19,855원 </span> <span
                                                    class="cost">20,900원</span></div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;">
                                            <a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1528354300775l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[우리땅오리] 무항생제 오리 다리살 슬라이스</a></span>
                                                <span class="price"><span
                                                        class="dc">12%</span>6,072원 </span> <span
                                                    class="cost">6,900원</span>
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type2 bg" style="background-color: rgb(247, 247, 247);">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">365일
                                        최저가 도전</span> <span class="tit_desc">최저가 도전,
                                        365일 언제나 알뜰하게</span></a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="365일 최저가 도전" data-section="theme_goods_11" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">기획특가</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629771216564l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[바븐] 국산 흰다리새우 700g 내외(생물)</a></span>
                                                <span class="price">
                                                    <!---->22,000원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">기획특가</span>
                                                                <!---->
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/153543279519l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[기획특가] 친환경 감자 2kg</a></span> <span
                                                    class="price">
                                                    <!---->4,990원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628823505473l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[한트바커] 그릴드 냉장 닭가슴살 2종</a></span>
                                                <span class="price">
                                                    <!---->13,250원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1590138142177l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[샛별배송] 하이트진로 석수 2L X 6개입</a></span>
                                                <span class="price"><span
                                                        class="dc">4%</span>2,300원 </span> <span
                                                    class="cost">2,400원</span>
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617858663754l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[농심] 신라면 멀티 5입</a></span> <span
                                                    class="price">
                                                    <!---->3,680원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_11"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628054735975l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[KF365] 양념 소불고기 1kg (냉장)</a></span>
                                                <span class="price">
                                                    <!---->15,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type2">
                    <div class="product_list">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">설레는
                                        캠핑</span> <span class="tit_desc">캠핑 식재료부터 용품까지
                                        맞춤 제안</span></a>
                                <!---->
                            </h3>
                        </div>
                        <!---->
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 506px;">
                                    <ul data-title="설레는 캠핑" data-section="theme_goods_12" class="list"
                                        style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li data-index="1" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1605152714137l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[더플랜] 왕의안주 - 모듬 꼬치 세트</a></span>
                                                <span class="price">
                                                    <!---->9,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="2" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1502159554437l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[삼진어묵] 캠핑 어묵탕 2종</a></span> <span
                                                    class="price">
                                                    <!---->8,400원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="3" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609826308259l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[VIDAL] 베지 마쉬멜로우</a></span> <span
                                                    class="price">
                                                    <!---->2,500원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="4" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods"><span
                                                    class="global_sticker"><span class="inner_sticker"><span
                                                            class="bg_sticker"
                                                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span>
                                                        <span class="txt_sticker"><span><span
                                                                    class="emph_sticker">+20%</span>
                                                                <!---->
                                                            </span><span>
                                                                <!----> <span>쿠폰</span>
                                                            </span></span></span></span> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1616400779348l0.jpg&quot;);"></a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">구이용 모둠 버섯 200g</a></span> <span
                                                    class="price"><span
                                                        class="dc">5%</span>2,270원 </span> <span
                                                    class="cost">2,390원</span>
                                            </div>
                                        </li>
                                        <li data-index="5" class=""
                          style=" float: left;
                                            list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/161976377431l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[클라우드] 클리어 제로 6개입</a></span> <span
                                                    class="price">
                                                    <!---->5,980원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <li data-index="6" class="cut"
                                            style="float: left; list-style: none; position: relative; width: 249px; margin-right: 18px;"
                                            data-name="theme_goods_12"><a class="thumb_goods">
                                                <!----> <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1620031911870l0.jpg&quot;);">
                                            </a>
                                            <div class="info_goods"><span class="name"><a
                                                        class="txt">[SAC] 캠핑 컵 4P L</a></span> <span
                                                    class="price">
                                                    <!---->9,900원
                                                </span>
                                                <!---->
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type3">
                    <div class="main_recipe">
                        <div class="tit_goods">
                            <h3 class="tit"><a class="name"><span class="ico">컬리의
                                        레시피</span>
                                    <!---->
                                </a>
                                <!---->
                            </h3>
                        </div>
                        <div class="list_goods">
                            <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                                <div class="bx-viewport"
                                    style="width: 100%; overflow: hidden; position: relative; height: 303px;">
                                    <ul data-title="컬리의 레시피" data-section="kurly_recipe" class="list"
                                        style="width: 715%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li
                                            style="float: left; list-style: none; position: relative; width: 338px; margin-right: 18px;">
                                            <a class="thumb_goods"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_d84cc1aba13fb460.jpg&quot;);"></a>
                                            <div class="info_goods">
                                                <div class="inner_info"><span class="name"><a
                                                            class="txt">레이어드 초밥</a></span></div>
                                            </div>
                                        </li>
                                        <li
                                            style="float: left; list-style: none; position: relative; width: 338px; margin-right: 18px;">
                                            <a class="thumb_goods"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_f62a63d6a8542337.jpg&quot;);"></a>
                                            <div class="info_goods">
                                                <div class="inner_info"><span class="name"><a
                                                            class="txt">어묵면볶이</a></span></div>
                                            </div>
                                        </li>
                                        <li
                                            style="float: left; list-style: none; position: relative; width: 338px; margin-right: 18px;">
                                            <a class="thumb_goods"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_8ba32a3f9bb39517.jpg&quot;);"></a>
                                            <div class="info_goods">
                                                <div class="inner_info"><span class="name"><a
                                                            class="txt">바질 토마토 에그인헬</a></span></div>
                                            </div>
                                        </li>
                                        <li
                                            style="float: left; list-style: none; position: relative; width: 338px; margin-right: 18px;">
                                            <a class="thumb_goods"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_1f00c200359df1a0.jpg&quot;);"></a>
                                            <div class="info_goods">
                                                <div class="inner_info"><span class="name"><a
                                                            class="txt">백김치말이 밥</a></span></div>
                                            </div>
                                        </li>
                                        <li
                                            style="float: left; list-style: none; position: relative; width: 338px; margin-right: 18px;">
                                            <a class="thumb_goods"><img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII="
                                                    alt="상품이미지" class="thumb"
                                                    style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/board/recipe/m/main_v2_38d7dec1b338849e.jpg&quot;);"></a>
                                            <div class="info_goods">
                                                <div class="inner_info"><span class="name"><a
                                                            class="txt">단호박 곤약 콩국수</a></span></div>
                                            </div>
                                        </li>
                                        <!---->
                                    </ul>
                                </div>
                                <div class="bx-controls bx-has-controls-direction">
                                    <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                            class="bx-next" href="">Next</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="main_type4">
                    <div class="tit_goods">
                        <h3 class="tit">인스타그램 고객 후기</h3>
                    </div>
                    <div class="list_goods">
                        <div class="bx-wrapper" style="max-width: 1050px; margin: 0px auto;">
                            <div class="bx-viewport"
                                style="width: 100%; overflow: hidden; position: relative; height: 175px;">
                                <ul data-title="인스타그램 고객 후기" data-section="instagram" class="list"
                                    style="width: 2715%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                    <li data-index="1"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/241181555_363700355432595_3691925002259341009_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=RRT_bCqzkZsAX-svoVH&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=3053e2296c4dbedeb7fc921251d9992a&oe=613CA55E"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="2"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/241150176_879379666289672_2573706513769318043_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=5gGeYCwHN5wAX_zbeY0&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=42a1509a99154d8d4b11bcecd35d0405&oe=613CA774"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="3"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/240991510_859751574659253_135655860033237574_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=gFEnvbRREt8AX-x1cF1&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=1b499d534550dd2ba26ed1a0efcb6d9d&oe=613D8ABD"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="4"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/240648216_166751782201623_3685789328031896190_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=T1Ahh6uWM8IAX-KDX2v&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=b409f5168134c825f18b0cba89af20fd&oe=613D2955"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="5"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/240882976_1932599606917730_1367172881734932307_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=TAaCS96DcxUAX_dualm&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=ab412a5d79094550b7aa6e2cd9356101&oe=613DA573"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="6"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/240532990_233005771941811_3617078964819492812_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=1qwDIJbdLeEAX_UYhnp&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=161c6f3003a1e0bee141155dbf020cb3&oe=613E0255"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="7"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/240414686_611491329834980_5155301532047198022_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=8ae9d6&_nc_ohc=YXdLEzz24gIAX9YMrEk&_nc_ht=scontent-nrt1-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=49dddf7da1f143ebfbd41f22d085d3b3&oe=613D96B3"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                    <li data-index="8"
                                        style="float: left; list-style: none; position: relative; width: 175px;"
                                        data-name="instagram">
                                        <a target="_blank" class="thumb_goods">
                                            <img src="https://scontent-nrt1-1.cdninstagram.com/v/t51.29350-15/230829426_458870008903926_4605274243767380912_n.jpg?_nc_cat=111&amp;ccb=1-5&amp;_nc_sid=8ae9d6&amp;_nc_ohc=pZSxUyVimnYAX8ZHRt7&amp;_nc_ht=scontent-nrt1-1.cdninstagram.com&amp;edm=ANo9K5cEAAAA&amp;oh=cba3700f5d3c4ab637bf8e1274d87fb0&amp;oe=612B50B9"
                                                alt="상품이미지" class="thumb">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bx-controls bx-has-controls-direction">
                                <div class="bx-controls-direction"><a class="bx-prev disabled" href="">Prev</a><a
                                        class="bx-next" href="">Next</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="bnr"><span class="txt">더 많은 고객 후기가 궁금하다면?</span> <a
                            href="https://www.instagram.com/marketkurly_regram/" target="_blank">@marketkurly_regram</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="bnr_main"><a class="link"
                        style="background-image: url(&quot;//img-cf.kurly.com/shop/data/main/15/pc_img_1629447526.jpg&quot;);"><span
                            class="inner_link">
                            <!---->
                            <!----> <img src="//img-cf.kurly.com/shop/data/main/15/pc_img_1629447526.jpg"
                                onerror="this.src='https://res.kurly.com/mobile/service/common/bg_1x1.png'">
                        </span>
                        <!---->
                    </a></div>
            </div>
        </div>
        <div class="bg_loading" id="bgLoading" style="display: none;">
            <div class="loading_show"></div>
        </div>
        <!-- <script src="../js/desktop/res.kurly.com/js/lib/moment.min.js"></script>
        <script src="../js/desktop/res.kurly.com/js/lib/jquery.bxslider.min.js"></script>
        <script src="../js/desktop/common_filter.js"></script>
        <script src="../js/desktop/main_v1.js"></script> -->

        <script src="https://res.kurly.com/js/lib/moment.min.js"></script>
        <!-- <script src="../js/desktop/common_filtercd3d.js"></script>
        <script src="../js/desktop/main_notice_v1.js"></script>
        <script src="../js/desktop/main_notice_v1cd3d.js"></script> -->
        <script>
            $(document).ready(function() {
                kurlyMain.type = 'pc';
                kurlyMain.update();

                // GNB Logo checking
                chkGNBLogo('pc');
            });
        </script>

        <script src="{{ asset('js/desktop/slide/slide-change.js') }} "></script>
    </div>
</div>

@include('layouts.desktop.footer')
