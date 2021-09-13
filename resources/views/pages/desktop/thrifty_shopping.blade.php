
@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
  <div id="content">

    <div id="qnb" class="quick-navigation" style="top: 70px;">
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

      <div class="bnr_qnb" id="brnQuick"><a href="/shop/board/view.php?id=notice&amp;no=64" id="brnQuickObj">
          <img class="thumb" src="https://res.kurly.com/pc/service/main/1904/bnr_quick_20190403.png"
            alt="Fast delivery with quality">
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
        nowTime: '1629968540760',
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
        <a href="/shop/main/html.php?htmid=event/kurly.htm&amp;name=lovers" class="link_menu ">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Benefits by Tier</font>
          </font>
        </a>
        <a href="/shop/board/list.php?id=recipe" class="link_menu ">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">recipe</font>
          </font>
        </a>
        <a href="/shop/goods/goods_review_best.php" class="link_menu ">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Best review</font>
          </font>
        </a>
      </div>
      <div class="side_recent" style="display:none">
        <strong class="tit">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Recently viewed products</font>
          </font>
        </strong>
        <div class="list_goods" data-height="209" style="height: 0px;">
          <ul class="list"></ul>
        </div>
        <button type="button" class="btn btn_up off">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Put on top of recently viewed products</font>
          </font>
        </button>
        <button type="button" class="btn btn_down off">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Scroll down recently viewed products</font>
          </font>
        </button>
      </div>
      <script>
      /**
       * 상품상세일때 현재 보고 있는 상품 담기. 상품URL & 상품이미지
       * 최종 저장 날짜로 부터 24시가 지날시 localStorage 삭제
       */
      var getGoodsRecent = (function() {
        var i, len, getGoodsRecent, item, _nowTime = '1629968540760';

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
                item = '<li><a class="link_goods" href="/shop/goods/goods_view.php?goodsno=' + getGoodsRecent[i]
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
    <div class="page_aticle">
      <div id="lnbMenu" class="lnb_menu">
        <div id="bnrCategory" class="bnr_category" style="display: block;">
          <div class="thumb"><img src="https://img-cf.kurly.com/category/banner/pc/6a44b2c3-35ea-411b-9146-1f715ec50cae"
              alt="Category Banner"></div>
        </div>
        <div class="inner_lnb">
          <div class="ico_cate"><span class="ico"><img src="https://res.kurly.com/pc/img/1808/bg_blink_120_91.png"
                id="goodsListIconView" alt="Category icon"></span> <span class="tit">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">thrifty shopping</font>
              </font>
            </span></div>
          <ul class="list">
            <li data-start="17" data-end="76"><a class="on">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">View all</font>
                </font>
              </a></li>
            <li class="bg" style="top: 78px; width: 68px; left: 0px; opacity: 1;"></li>
          </ul>
        </div>
      </div>
      <div id="goodsList" class="page_section section_goodslist">
        <div class="list_ability">
          <div class="sort_menu">
            <div class="">
              <div class="select_type user_sort">
                <!---->
                <!---->
                <!----><a class="name_select">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">in order of benefit</font>
                  </font>
                </a>
                <!---->
                <!---->
                <ul class="list">
                  <li><a class="">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Recommended order</font>
                      </font>
                    </a></li>
                  <li><a class="">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">New product order</font>
                      </font>
                    </a></li>
                  <li><a class="">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">by popular product</font>
                      </font>
                    </a></li>
                  <li><a class="on">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">in order of benefit</font>
                      </font>
                    </a></li>
                  <li><a class="">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">low price</font>
                      </font>
                    </a></li>
                  <li><a class="">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">high price</font>
                      </font>
                    </a></li>
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
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1625211449713l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+10%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1625211449713l0.jpg"
                        alt="Moisturizing and gentle lotion for children"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">78106</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Sebamed] Baby Lotion </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">38% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">17,900 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">29,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Moisturizing and gentle lotion for children</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1549602414483l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1549602414483l0.jpg"
                        alt="Share the bittersweet flavor and sweetness of dark Ghirardelli chocolate that you can enjoy in a variety of ways!"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">34700</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Ghirardelli] 5 Intense Dark Bars </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">35% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">3,900 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">6,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Share the bittersweet flavor and sweetness of dark
                          Ghirardelli chocolate that you can enjoy in a variety of ways!</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1585033329432l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1585033329432l0.jpg"
                        alt="Antibiotic-free sulfur duck and Jeju vegetables"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">49870</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Uggle] PET Jeollanam-do Naju Sulfur Duck &amp;
                          Vegetable Mix Steam </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">35% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 4,550</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">7,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Antibiotic-free sulfur duck and Jeju vegetables</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">pet</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1612760238539l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1612760238539l0.jpg"
                        alt="Easy Asian-style cooking secret book"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">66353</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Gourmet House] Singapore Chili Crab Sauce </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">35% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 4,420</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">6,800 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Easy Asian-style cooking secret book</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1624582204573l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1624582204573l0.jpg"
                        alt="The freshness of the East Coast"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">68357</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Lee Ho] East Sea squid (3~4 rice, 550~650g) (living
                          organism) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">33% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 11,800</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">17,800 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">The freshness of the East Coast</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595490225464l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1595490225464l0.jpg"
                        alt="Topped with brisket to make it more delicious and spicy"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">54199</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> Bulbim naengmyeon 2 servings </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">30% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 7,560</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">10,800 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Topped with brisket to make it more delicious and spicy
                        </font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617590611656l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">gift</font>
                                </font>
                              </span>
                              <!---->
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1617590611656l0.jpg"
                        alt="A lip tint that adds an atmosphere"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">68784</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Jessep] Lip Cotton 7 Types </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">5% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 18,050</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A lip tint that adds an atmosphere</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1580783835517l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1580783835517l0.jpg"
                        alt="Fresh Jeju cutlassfish"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">48544</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Baven] 1 clean Jejudo live cuttlefish (living creature)
                        </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">27% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 10,877</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Fresh Jeju cutlassfish</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1624237873546l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1624237873546l0.jpg"
                        alt="yogurt for kids"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8844</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Sangha Ranch] Organic Baby Yogurt 3 Types </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">26% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 2,590</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">3,500 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">yogurt for kids</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1622436814350l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1622436814350l0.jpg"
                        alt="A bowl of water naengmyeon with radish kimchi"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">72931</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Chilgap Nongsan] Radish Kimchi Mulnaengmyeon </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">25% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 3,375</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">4,500 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A bowl of water naengmyeon with radish kimchi</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1584081640728l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1584081640728l0.jpg"
                        alt="Sweet drink from Spain"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">49439</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Kakao Lat] Two types of Kakao Lat Milkshakes with
                          strong cacao flavor </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">25% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 1,110</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">1,480 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Sweet drink from Spain</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1608793784686l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1608793784686l0.jpg"
                        alt="Easy-to-make Sichuan Mapo Tofu"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">61715</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Mono Kitchen] Mapo Tofu </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">25% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 5,175</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">6,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Easy-to-make Sichuan Mapo Tofu</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627971835142l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627971835142l0.jpg"
                        alt="Trimmed eel for one meal"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">81560</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Baven] Freshwater Eel (Japonica) around 250g (living
                          organism) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">21% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19,700 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">25,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Trimmed eel for one meal</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1575340424298l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1575340424298l0.jpg"
                        alt="Spanish cuisine made easy"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">44640</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [SAMSAM HEAYO] Gambas Al Ajillo Kit 315g (refrigerated)
                        </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">21% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 11,060</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Spanish cuisine made easy</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span><span class="ico limit">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">limited quantity</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/156263844893l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/156263844893l0.jpg"
                        alt="Selling price per 100g: 5966 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">37694</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Rangers Valley] Australian Black Angus Chuck Eye Roll
                          Steak 300g (refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,320 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">17,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: 5966 won</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628232824785l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628232824785l0.jpg"
                        alt="Just fry in a frying pan"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">77535</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Homemade Zucchini Shrimp
                          Stir-fry Meal Kit </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 6,560</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">8,200 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Just fry in a frying pan</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span><span class="ico limit">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">limited quantity</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592456505331l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1592456505331l0.jpg"
                        alt="Abalone to enjoy fresh"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">53511</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Baven] Wando Abalone (3 heads/about 260g) (Creature)
                        </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,800 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">18,500 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Abalone to enjoy fresh</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602141485105l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1602141485105l0.jpg"
                        alt="Adds softness to softness"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">59077</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Meitien] Taiwanese Sandwich Peanut Butter </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 1,520</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">1,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Adds softness to softness</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1614928659926l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1614928659926l0.jpg"
                        alt="Sweet taste with pineapple"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">67782</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [My Chef] Chop Steak </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">10,320 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">12,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Sweet taste with pineapple</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1583469568747l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1583469568747l0.jpg"
                        alt="A sweet snack to enjoy!  Hallabong Sand is newly opened!"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">49537</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Chien Bao] 4 Taiwanese Sandwiches </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 1,520</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">1,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A sweet snack to enjoy! </font>
                        <font style="vertical-align: inherit;">Hallabong Sand is newly opened!</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1562634399277l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1562634399277l0.jpg"
                        alt="Selling price per 100g: 6633 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">37695</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Ranger's Valley] Australian Black Angus Lobster Steak
                          300g (refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 16,720</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: 6633 won</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1593755152661l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1593755152661l0.jpg"
                        alt="Reduced sugar content and added lactic acid bacteria"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">52820</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Daily] Anyo (100mLX5EA) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 1,720</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">2,150 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Reduced sugar content and added lactic acid bacteria
                        </font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591679368159l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1591679368159l0.jpg"
                        alt="Freshly picked from the sea in Wando"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">53512</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Baven] Wando Abalone (5/about 260g) (Creature) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">12,000 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">15,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Freshly picked from the sea in Wando</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/162192602462l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/162192602462l0.jpg"
                        alt="Yogurt with the freshness of aloe"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">72964</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Daily] Bio Aloe (6 Packs) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 4,784</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">5,980 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Yogurt with the freshness of aloe</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1570505378601l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1570505378601l0.jpg"
                        alt="Rich chocolate flavor"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">42105</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Litersport] 5 kinds of colorful variety </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 2,384</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">2,980 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Rich chocolate flavor</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1610420320812l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1610420320812l0.jpg"
                        alt="A fragrant blend of potatoes and curry"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">61714</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Mono Kitchen] Curry Croquette </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">20% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 4,720</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">5,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A fragrant blend of potatoes and curry</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1542682095338l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1542682095338l0.jpg"
                        alt="real taste of lamb"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">31193</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Thomas Food] Lamb Ribs (Refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">13,689 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">16,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">real taste of lamb</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/157915761928l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/157915761928l0.jpg"
                        alt="Selling price per 100g: 7600 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">47857</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Delicio] Australian grass-fed tenderloin steak 250g
                          (refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">15,390 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: 7600 won</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627971040641l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627971040641l0.jpg"
                        alt="Easy to enjoy trimmed cutlassfish"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">81559</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Baven] About 400g of Jeju fresh cuttlefish (living
                          things) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">19% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">26,730 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">33,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Easy to enjoy trimmed cutlassfish</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592892683395l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1592892683395l0.jpg"
                        alt="Raw salmon that can be eaten alone"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">53884</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Sammone Light] Aurora Raw Salmon 120g </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">18% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 7,298</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">8,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Raw salmon that can be eaten alone</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/158520412897l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/158520412897l0.jpg"
                        alt="A simple menu that enriches the table"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">50295</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [SAMSAM HEAYO] Watercress Squid Pan Kit 360g
                          (Refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">18% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 9,758</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">11,900 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A simple menu that enriches the table</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span><span class="ico limit">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">limited quantity</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/158512444734l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/158512444734l0.jpg"
                        alt="A vibrant, colorful taste"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">50294</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [SAMSAM HEAYO] Watercress Shrimp Jeon Kit 425g
                          (refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">18% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 10,906</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">13,300 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">A vibrant, colorful taste</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span><span class="ico limit">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">limited quantity</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1592211983957l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1592211983957l0.jpg"
                        alt="Price per 100g: 7,000 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">51440</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> 200g for 1st grade Korean beef (refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">17% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">11,620 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Price per 100g: 7,000 won</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1579158550689l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1579158550689l0.jpg"
                        alt="Selling price per 100g: 6800 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">47858</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Delicio] Australian Tenderloin Chopped Steak 250g
                          (Refrigerated) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">16% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">14,280 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">17,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: 6800 won</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1626753823719l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1626753823719l0.jpg"
                        alt="Abundant nutrition in an exotic shape"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">81025</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> 3 pieces of raw bitter gourd </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">16% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 6,640</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">7,990 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Abundant nutrition in an exotic shape</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1613540593595l0.jpg&quot;);"><span
                        class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                            style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                            class="txt_sticker"><span><span class="emph_sticker">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">+20%</font>
                                </font>
                              </span>
                              <!---->
                            </span><span>
                              <!----> <span>
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">coupon</font>
                                </font>
                              </span>
                            </span></span></span></span>
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1613540593595l0.jpg"
                        alt="eel cooked in a barrel"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">66670</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Samsammulsan] Domestic freshwater eel 240g (living
                          organism) </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">16% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">18,480 won</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">22,000 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">eel cooked in a barrel</font>
                      </font>
                    </span> <span class="tag"><span class="ico limit tag_type2">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Kurly Only</font>
                        </font>
                      </span></span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1605663162284l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1605663162284l0.jpg"
                        alt="Selling price per 100g: 4,100 won"
                        onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">27532</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Sacred Land Farm] Animal Welfare Hand Pork Neck (For
                          Roasting) 300g </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">15% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 10,455</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">12,300 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: 4,100 won</font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
              <li>
                <div class="item">
                  <div class="thumb"><a class="img"
                      style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602562308326l0.jpg&quot;);">
                      <!---->
                      <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1602562308326l0.jpg" alt="Selling price per 100g: KRW 1,733
  " onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">59789</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Dodram Handon] 300g for slicing sirloin </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,420</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: KRW 1,733
                          </font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1600048862837l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1600048862837l0.jpg" alt=""
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">59278</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Sammon Kitchen] Aurora Gravrax Salmon 200g </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 14,025</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">16,500 won</font>
                          </font>
                        </span></span> <span class="desc"></span> <span class="tag"><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617087204608l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1617087204608l0.jpg"
                          alt="Fresh leg meat enjoyed in a barrel"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">67680</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Duck from Juwon] 500g healthy duck leg (refrigerated)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 10,965</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Fresh leg meat enjoyed in a barrel</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1604902413513l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1604902413513l0.jpg"
                          alt="Selling price per 100g: 1,500 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">61472</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Duck from Juwon] 500g of duck slices (refrigerated)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,375</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">7,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 1,500 won</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1600058823338l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1600058823338l0.jpg"
                          alt="fresh silver color"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">58872</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Lee Ho] Jeju fresh cuttlefish 400g (living organism)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">24,650 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">29,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">fresh silver color</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629181789125l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1629181789125l0.jpg"
                          alt="Same texture and taste as boiled egg whites"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">63684</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Ganong Bio] Eggtin </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 7,378</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8,680 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Same texture and taste as boiled egg whites</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1629788206360l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1629788206360l0.jpg"
                          alt="Enjoy fresh shrimp with peace of mind"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">83130</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Food&amp;Human] About 500g of antibiotic-free shrimp
                            (living organisms) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 18,615</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">21,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Enjoy fresh shrimp with peace of mind</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602563094756l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1602563094756l0.jpg" alt="Selling price per 100g: KRW 1,733
  " onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">59790</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Dodram Handon] 300g for sirloin pork cutlet </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,420</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: KRW 1,733
                          </font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1533289005103l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1533289005103l0.jpg"
                          alt="For grilling / for beef (selling price per 100g: 4,400 won / 4,180 won)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">27531</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Sacred Land Farm] Animal Welfare Hand Drawn Pork Belly,
                            2 Types (Refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">11,220 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">For grilling / for beef (selling price per 100g: 4,400
                            won / 4,180 won)</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1609395816367l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1609395816367l0.jpg"
                          alt="Rice cake is added for a more chewy taste "
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">63402</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [The Odam] Delicious Chal Sundae 500g </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 2,533</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">2,980 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Rice cake is added for a more chewy taste </font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1617087097859l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1617087097859l0.jpg"
                          alt="Easy to make thick breasts Easy to make thick breasts"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">67679</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Duck from Juwon] Healthy duck breast 500g
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 10,965</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Easy to make thick breasts Easy to make thick breasts
                          </font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1585638260575l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1585638260575l0.jpg"
                          alt="Buckwheat-flavored fresh noodles with a savory flavor"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">50426</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Mapo Foods] Raw Buckwheat Flavored Noodles </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 2,550</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">3,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Buckwheat-flavored fresh noodles with a savory flavor
                          </font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1545893141342l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1545893141342l0.jpg"
                          alt="Price per 100g: 6,500 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">31738</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Green Korean Beef] Antibiotic-free 1+ Korean Beef Suldo
                            Slice Sukiyaki 200g (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 11,050</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: 6,500 won</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594102483339l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1594102483339l0.jpg"
                          alt="Special in taste and size"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">53508</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Baven] Wando Abalone (3/300g or less) (Creature)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">19,550 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">23,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Special in taste and size</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1594102611872l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1594102611872l0.jpg"
                          alt="Enjoy a variety of cuisines"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">53513</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Baven] Wando Abalone (5/about 200g) (Creature) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 9,350</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">11,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Enjoy a variety of cuisines</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1614231018747l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1614231018747l0.jpg"
                          alt="Tap the toppings on the yogurt"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">68170</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Pulmuone Danone] I Love Yogurt Yogurt 2 Types </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 1,105</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1,300 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Tap the toppings on the yogurt</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/15458937486l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/15458937486l0.jpg"
                          alt="Price per 100g: 7,000 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">31737</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Green Korean beef] Antibiotic-free 1+ Korean beef
                            forelimb soup 200g (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">11,900 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: 7,000 won</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1545294814117l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1545294814117l0.jpg"
                          alt="Price per 100g: KRW 17,500"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">31734</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Green Korean Beef] Antibiotic-free 1+ Korean beef
                            brisket 200g (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 29,750</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">35,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: KRW 17,500</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595839607909l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1595839607909l0.jpg"
                          alt="Pork belly with attractive smoke flavor!"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">54392</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [O'Tel Black Label] Three-fold firewood </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 7,565</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Pork belly with attractive smoke flavor!</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1613538785508l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1613538785508l0.jpg"
                          alt="Wild eel caught in clean sea"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">66668</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Samsammulsan] Naturally Trimmed Sea Eel 350g (Creature)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15,215 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">17,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Wild eel caught in clean sea</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1591588942740l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1591588942740l0.jpg"
                          alt="Price per 100g: KRW 16,000"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">52551</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Green Korean beef] Antibiotic-free 1+ Korean beef
                            sirloin 200g (refrigerated) (rice cake core removed) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 27,200</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">32,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: KRW 16,000</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1618378934848l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1618378934848l0.jpg"
                          alt="A refreshing transformation of cabbage"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">744</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Collins Green] No More Trouble </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 8,075</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A refreshing transformation of cabbage</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1601964579843l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1601964579843l0.jpg" alt="Selling price per 100g: KRW 1,733
  " onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">59794</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Dodram Handon] 300g for sirloin filling </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,420</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: KRW 1,733
                          </font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1614065180670l0.jpg&quot;);"><span
                          class="global_sticker"><span class="inner_sticker"><span class="bg_sticker"
                              style="background-color: rgb(189, 118, 255); opacity: 0.9;"></span> <span
                              class="txt_sticker"><span><span class="emph_sticker">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">+20%</font>
                                  </font>
                                </span>
                                <!---->
                              </span><span>
                                <!----> <span>
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">coupon</font>
                                  </font>
                                </span>
                              </span></span></span></span>
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1614065180670l0.jpg"
                          alt="A large-capacity configuration"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">66666</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Baven] Large-capacity Wando Abalone (7-9/about 500g)
                            (Creature) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 21,250</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">25,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A large-capacity configuration</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1467283441335l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1467283441335l0.jpg"
                          alt="A delicacy among delicacies to relieve the summer heat"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">3539</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Chosun Hotel Kimchi] 1kg of radish kimchi </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 21,250</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">25,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A delicacy among delicacies to relieve the summer heat
                          </font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/154710160863l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/154710160863l0.jpg"
                          alt="Oak green, oak red, crispy red, romaine fresh special vegetables at once (1 pack/90g)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">34133</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> Premium eco-friendly salad 90g </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 2,635</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">3,100 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Oak green, oak red, crispy red, romaine fresh special
                            vegetables at once (1 pack/90g)</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1575946498528l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1575946498528l0.jpg"
                          alt="Price per 100g: KRW 17,333"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">44373</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Green Korean Beef] Antibiotic-free 1+ Korean Beef Steak
                            300g (Refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">44,200 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">52,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: KRW 17,333</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1552986710887l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1552986710887l0.jpg"
                          alt="A comfortable day with smart lactic acid bacteria"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">35207</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Pulmuone Danone] Drinking Activia Plain (130ml*4ea)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,080</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">4,800 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A comfortable day with smart lactic acid bacteria</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1534136437186l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1534136437186l0.jpg"
                          alt="For grilling (selling price per 100g: 4,200 won)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">27663</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Berkshire World] Berkshire K Black Pork Pork Belly 500g
                            (Refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">17,850 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">21,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">For grilling (selling price per 100g: 4,200 won)</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/161423059586l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/161423059586l0.jpg"
                          alt="Vegan yogurt made from plant-based ingredients"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">68169</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Pulmuone Danone] Plant Activia 3 Types </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 3,383</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">3,980 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Vegan yogurt made from plant-based ingredients</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1552986527751l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1552986527751l0.jpg"
                          alt="Plain yogurt made with the gut in mind"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">35206</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Pulmuone Danone] Spoonful Activia Plain (80g*4ea)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 2,295</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">2,700 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Plain yogurt made with the gut in mind</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1625722900955l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1625722900955l0.jpg"
                          alt="Price per 100g: 8,400 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77672</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Taewoo Hanwoo] 1+ Korean Beef Yangji Soup 200g
                            (refrigerated) 2 types </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14,448 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">16,800 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: 8,400 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1599631070616l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1599631070616l0.jpg"
                          alt="Lactobacillus that everyone enjoys"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">56059</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Daily] 5 types of bio yogurt </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 2,390</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">2,780 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Lactobacillus that everyone enjoys</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1625730736796l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1625730736796l0.jpg"
                          alt="Price per 100g: KRW 8,750"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77680</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Hwasik Korean Beef] 200g (refrigerated) 2 types of
                            Korean beef of grade 1 or higher for Yangji soup </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">15,050 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">17,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: KRW 8,750</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1596529617608l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1596529617608l0.jpg"
                          alt="Selling price per 100g: 4950 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">54451</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Imok] Antibiotic-free beef bulgogi 200g (refrigerated)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">14% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 8,514</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">9,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 4950 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628235477693l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628235477693l0.jpg"
                          alt="Basic side dish ready to go"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77533</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Homemade Fish Cake Stir-fry
                            Meal Kit </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 5,133</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Basic side dish ready to go</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628234378435l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628234378435l0.jpg"
                          alt="Easy to add flavor"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77534</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-Kyung Kitchen] Homemade Cucumber Pickled Meal
                            Kit </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,785</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Easy to add flavor</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1587520578932l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1587520578932l0.jpg"
                          alt="Multi-purpose (selling price per 100g: 1,200 won)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">51040</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> 300g of antibiotic-free 1st grade hand drawn pork
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 3,132</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">3,600 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Multi-purpose (selling price per 100g: 1,200 won)</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627612449590l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627612449590l0.jpg"
                          alt="A hearty meal to enjoy"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77483</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Curry with 10 kinds of
                            vegetables </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 7,743</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A hearty meal to enjoy</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627625737932l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627625737932l0.jpg"
                          alt="Oven baked for great flavor"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77484</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] 10 kinds of grilled vegetables
                            &amp; yogurt sauce </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,873</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">7,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Oven baked for great flavor</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1463994351328l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1463994351328l0.jpg"
                          alt="Enjoy salmon sashimi like a pro at home"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">1391</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Sammon Kitchen] Aurora Raw Salmon (Refrigerated)
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 20,010</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">23,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Enjoy salmon sashimi like a pro at home</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1556764520991l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1556764520991l0.jpg"
                          alt="For Bulgogi (selling price per 100g: 1,200 won)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">36025</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> 300g (refrigerated) for Bulgogi, antibiotic-free grade 1
                            pork hind leg </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 3,132</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">3,600 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">For Bulgogi (selling price per 100g: 1,200 won)</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628230009567l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628230009567l0.jpg"
                          alt="Spicy and appetizing side dish"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77536</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-Kyung Kitchen] Homemade Spicy Spicy Tofu Meal
                            Kit </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">4,524 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Spicy and appetizing side dish</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628233596610l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628233596610l0.jpg"
                          alt="A la carte side dish to enjoy"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77537</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Homemade Pork Eggplant Stir-fry
                            Meal Kit </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 8,613</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">9,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A la carte side dish to enjoy</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/159652242693l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/159652242693l0.jpg"
                          alt="Selling price per 100g: 4950 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">54066</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Imok] 200g of antibiotic-free minced beef
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 8,613</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">9,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 4950 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627629428711l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627629428711l0.jpg"
                          alt="A variety of delicious vegetables"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77485</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Assorted Simmered Ssam &amp;
                            Cucumber &amp; Carrot &amp; Cucumber Pepper Set </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,003</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">6,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">A variety of delicious vegetables</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1612330302610l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1612330302610l0.jpg"
                          alt="Freshly sliced &ZeroWidthSpace;&ZeroWidthSpace;salmon sashimi without trimming"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">66649</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Sammone Kitchen] Aurora Raw Salmon Sashimi 200g </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 9,570</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">11,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Freshly sliced &ZeroWidthSpace;&ZeroWidthSpace;salmon
                            sashimi without trimming</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1599630759692l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1599630759692l0.jpg"
                          alt="a cup of health"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">56052</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Daily] Bio-Drinking Yogurt 5 Types </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 1,044</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1,200 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">a cup of health</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1536223584418l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1536223584418l0.jpg"
                          alt="Selling price per 100g: 1,800 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">29467</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> 3 types of antibiotic-free grade 1 hand forelimbs
                          </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 4,698</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">5,400 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 1,800 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1570170391318l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1570170391318l0.jpg"
                          alt="Fresh seafood meal kit"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">41983</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [SAMSAM HEAYO] Shake it! </font>
                          <font style="vertical-align: inherit;">Seafood Pancake Kit 500g (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 11,745</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Fresh seafood meal kit</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1627638484500l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1627638484500l0.jpg"
                          alt="delicious vegetable side dishes"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">77486</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Jeong Mi-kyung Kitchen] Eggplant jeon and nutritious
                            chives </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,003</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">6,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">delicious vegetable side dishes</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">limited quantity</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1541645008607l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1541645008607l0.jpg"
                          alt="Selling price per 100g: 850 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">30113</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Greenus] Animal welfare for chicken stir-fry 1000g
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">7,480 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">8,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 850 won</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595227165529l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1595227165529l0.jpg"
                          alt="Price per 100g: KRW 19,900"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">54433</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Gyeongju Millennium Korean Beef] 200g (refrigerated)
                            for grilling 1++ Korean beef ribs </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">36,872 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">41,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: KRW 19,900</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1590989917701l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1590989917701l0.jpg"
                          alt="Selling price per 100g: 13,950 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">52350</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Elgro] Australian Wagyu MB4+ Tenderloin Steak 200g
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 24,552</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">27,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 13,950 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1604303036695l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1604303036695l0.jpg"
                          alt="Selling price per 100g: 6500 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">52742</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Elgro] Australian Wagyu MB8+ Roast Beef 200g
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">11,440 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">13,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 6500 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1% Table</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1528354300775l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1528354300775l0.jpg"
                          alt="Neatly trimmed and strong ingredients (selling price per 100g: KRW 1,971)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">25542</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Our land duck] Sliced
                            &ZeroWidthSpace;&ZeroWidthSpace;duck leg meat without antibiotics </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,072</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">6,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Neatly trimmed and strong ingredients (selling price per
                            100g: KRW 1,971)</font>
                        </font>
                      </span> <span class="tag">
                        <!---->
                      </span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628655571126l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628655571126l0.jpg"
                          alt="Selling price per 100g: 17,400 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">79439</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [2GR] Australian Full Blood Wagyu MB8+ Grilled Meat 200g
                            (Refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 30,624</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">34,800 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 17,400 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1% Table</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1604303302806l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1604303302806l0.jpg"
                          alt="Selling price per 100g: KRW 14,000"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">52349</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Elgro] Australian Wagyu MB8+ Sirloin Steak 200g
                            (refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">24,640 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">28,000 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: KRW 14,000</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1% Table</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1482384471798l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1482384471798l0.jpg"
                          alt="Antibiotic-free Grade 1 duck (selling price per 100g: KRW 1,971)"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">5279</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Our Land Duck] Sliced
                            &ZeroWidthSpace;&ZeroWidthSpace;duck breast without antibiotics </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">KRW 6,072</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">6,900 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Antibiotic-free Grade 1 duck (selling price per 100g: KRW
                            1,971)</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1628655644131l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1628655644131l0.jpg"
                          alt="Selling price per 100g: 11,500"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">79438</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [2GR] Australian Full Blood Wagyu MB8+ Sirloin 300g
                            (Refrigerated) </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">30,360 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">34,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Selling price per 100g: 11,500</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span><span class="ico limit">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">1% Table</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1595223527868l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1595223527868l0.jpg"
                          alt="Price per 100g: 18,750 won"
                          onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                      </a>
                      <!---->
                      <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                            <font style="vertical-align: inherit;">
                              <font style="vertical-align: inherit;">54430</font>
                            </font>
                          </span></button>
                        <!---->
                        <!---->
                      </div>
                    </div> <a class="info"><span class="name">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"> [Gyeongju Millennium Korean Beef] 200g (refrigerated)
                            for roasting 1++ Korean beef sirloin </font>
                        </font>
                      </span> <span class="cost"><span class="dc">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">12% </font>
                          </font>
                        </span> <span class="price">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">34,760 won</font>
                          </font>
                        </span> <span class="original">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">39,500 won</font>
                          </font>
                        </span></span> <span class="desc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Price per 100g: 18,750 won</font>
                        </font>
                      </span> <span class="tag"><span class="ico limit tag_type2">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Kurly Only</font>
                          </font>
                        </span></span></a>
                  </div>
                </li>
                <li>
                  <div class="item">
                    <div class="thumb"><a class="img"
                        style="background-image: url(&quot;https://img-cf.kurly.com/shop/data/goods/1602563597689l0.jpg&quot;);">
                        <!---->
                        <!----> <img src="https://img-cf.kurly.com/shop/data/goods/1602563597689l0.jpg" alt="Selling price per 100g: KRW 1,733
  " onerror="this.src='https://res.kurly.com/mobile/img/1808/img_none_x2.png'">
                    </a>
                    <!---->
                    <div class="group_btn"><button type="button" class="btn btn_cart"><span class="screen_out">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">59791</font>
                          </font>
                        </span></button>
                      <!---->
                      <!---->
                    </div>
                  </div> <a class="info"><span class="name">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> [Dodram Handon] Sirloin Curry 300g </font>
                      </font>
                    </span> <span class="cost"><span class="dc">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">12% </font>
                        </font>
                      </span> <span class="price">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">KRW 4,576</font>
                        </font>
                      </span> <span class="original">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">5,200 won</font>
                        </font>
                      </span></span> <span class="desc">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Selling price per 100g: KRW 1,733
                        </font>
                      </font>
                    </span> <span class="tag">
                      <!---->
                    </span></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="layout-pagination">
          <div class="pagediv"><a href="#main" class="layout-pagination-button layout-pagination-first-page">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">go to first page</font>
              </font>
            </a> <a href="#main" class="layout-pagination-button layout-pagination-prev-page">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">go to previous page</font>
              </font>
            </a> <span>
              <!----> <strong class="layout-pagination-button layout-pagination-number __active">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">One</font>
                </font>
              </strong>
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">2</font>
                </font>
              </a>
              <!---->
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">3</font>
                </font>
              </a>
              <!---->
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">4</font>
                </font>
              </a>
              <!---->
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">5</font>
                </font>
              </a>
              <!---->
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">6</font>
                </font>
              </a>
              <!---->
            </span><span><a class="layout-pagination-button layout-pagination-number">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">7</font>
                </font>
              </a>
              <!---->
            </span> <a href="#main" class="layout-pagination-button layout-pagination-next-page">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">go to next page</font>
              </font>
            </a> <a href="#main" class="layout-pagination-button layout-pagination-last-page">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">go to the last page</font>
              </font>
            </a></div>
        </div>
      </div>
    </div>
    <div class="bg_loading" id="bgLoading" style="display: none;">
      <div class="loading_show"></div>
    </div>
    <script src="{{ asset('/public/js/desktop/carts/common_filter.js') }}"></script>
    <script src="{{ asset('/public/js/desktop/goodslist_v1.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      var categoryNo = null;
      if (sessionStorage.goodsListReferrer && sessionStorage.goodsListReferrer === 'goodsView') {
        // 이전페이지가 상품상세일경우
        lnbMenu.referrer = true;
        goodsList.referrer = true;
        if (sessionStorage.gListCategoryNo && '' != '029' && '' != '038') {
          categoryNo = sessionStorage.gListCategoryNo;
        } else {
          categoryNo = "";
        }
      } else {
        lnbMenu.referrer = false;
        goodsList.referrer = false;
        categoryNo = "";
      }

      // 카테고리호출
      // 알뜰쇼핑
      lnbMenu.pageType = 'sale';
      lnbMenu.getCategoryNum = "015";

      // 상품목록노출
      // 알뜰쇼핑
      goodsList.pageType = 'sale';
      goodsList.type = "pc";

      lnbMenu.update();
    });
    </script>
  </div>
</div>

@include('layouts.desktop.footer')