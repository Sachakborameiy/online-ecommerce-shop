// 레이어타입일때 body고정시킬때 사용
var bodyScroll = {
  winScrollTop : 0,
  body : $('body'),
  bg : $('#bgLoading'),
  bodyFixed : function(){
    var $self = this;
    $self.body = $('body');
    $self.bg = $('#bgLoading');
    $self.winScrollTop = $(window).scrollTop();
    $self.bg.show();
    $self.body.addClass('noBody').css({
      'top' : -$self.winScrollTop
    });
  },
  bodyDefault : function(type){
    var $self = this;
    $self.body.removeClass('noBody').removeAttr('style');
    $self.bg.hide();
    if(type === undefined){
      window.scrollTo(0, $self.winScrollTop);
    }
  }
}

// 약관보기
var termsShow = {
  layer : $('#layerAgree'),
  layerScroll : $('#layerAgree .in_layer'),
  eventCheck : false,
  bg : $('#bgLoading'),
  type : null,
  isAgreement: false,
  action : function(type){
    var $self = this;
    $self.layer = $('#layerAgree');
    $self.layerScroll = $('#layerAgree .in_layer');

    $('.reg_agree .link_more, .checkbox_link .link, .btn_layershow').on('click',function(e){
      e.preventDefault();
      bodyScroll.bodyFixed();
      var obj = $(this).attr('href');

      $self.layer.find('.choice_agree').hide();
      if(obj === '#agreement') {
        if(!$self.isAgreement){
          $self.getAgreement();
          $self.isAgreement = true;
        }
        $self.layer.find('.view_agreement').show();
      }else if(obj === '#terms'){
        $self.layer.find('.view_terms').show();
      }else if(obj === '#third'){
        $self.layer.find('.view_third').show();
      }else if(obj === '#pgTerms'){
        $self.layer.find('.view_pg').show();
      }else if(obj === '#essential'){
        $self.layer.find('.view_essential').show();
      }else if(obj === '#choice'){
        $self.layer.find('.view_choice').show();
      }else if(obj === '#layerShow'){
        $self.layer.find('.view_layer').show();
        // KM-1483 Amplitude 상품후기쓰기 => 작성 시 유의사항 클릭시 레이어 뜰때 screen_name 갱신
        $(this).closest('.after_write').on('click', function(){
          // KM-1483 Amplitude
          KurlyTracker.setScreenName('product_review_writing_notice');
        });
      }else{
        $self.layerClose();
      }

      $self.layer.removeAttr('style');
      $self.layerScroll.removeAttr('style');
      $self.layer.show();

      var winHeight = $(window).height();
      var resultHeight = $self.layer.height();

      if(resultHeight <= 179){ // 컨텐츠가 최소 사이즈인 경우 최대값이 되도록 적용(최소값이 나오는 경우는 height를 정상적으로 못잡는경우)
        resultHeight = 482;
      }

      var defaultPadding = 71; // 부모의 상단,하단 패딩값
      if($self.layer.find('[data-fixed]').length > 0){
        resultHeight = $self.layer.find('[data-fixed]').data('fixed');
        defaultPadding = 100;
      }
      var resultTop = winHeight/2 - resultHeight/2;

      if( winHeight < $self.layer.height() ){
        resultHeight =  winHeight - 100;
        resultTop = 55;
      }
      $self.layer.css({
        top : resultTop,
        height : resultHeight
      });


      $self.layerScroll.css({
        height : resultHeight - defaultPadding
      });
      $self.eventCheck = true;
    });

    $('.layer_agree .btn_ok').on('click',function(e){
      e.preventDefault();
      $self.layerClose();
    });
    $('.layer_info .layer_close').on('click',function(e){
      e.preventDefault();
      $self.layerClose();
    });
    $self.bg.on('click',function(){
      if($self.eventCheck){
        $self.layerClose();
      }
    });
  },
  layerClose : function(){
    var $self = this;
    $self.layer.hide().removeAttr('style');
    $self.eventCheck = false;
    bodyScroll.bodyDefault();
  },
  getAgreement: function(){
    var layerAgreement = new Vue({
      el: '#layerAgreement',
      data: {
        pageUrl : campaginUrl + 'pc/service/agreement.html',
        storagetObj : null,
        eventStart : false, // 딱 한번만실행
        layerTypeSet: '',
      },
      methods: {
        update:function(){
          var $self = this;
          $.ajax({
            url : $self.pageUrl
          }).done(function(result){
            if($self.eventStart){
              result = result.replace(/class="box_type"/gi,'');
            }
            $('#layerAgreement').html(result);

            $self.storagetObj = JSON.parse(sessionStorage.getItem("agreement"));
            if(!$self.eventStart){
              $self.eventStart = true;
              $self.pageUrl = campaginUrl + 'pc/service/' + $self.storagetObj[$self.storagetObj.length-1].name + '.html'
              $self.update();
            }
          });
        }
      }
    });
    layerAgreement.update();
  }
}

// 띠배너 check
var bnrCheck = {
  bnrTarget : null, // 띠배너
  wrapTarget : null, // 컨텐츠를 감싸는 영역
  headTarget : null, // header
  lnbTarget : null, // lnb
  bnrHeight : 0, // 띠배너 높이값
  headHeight : 0, // header 높이값
  lnbHeight : 0, // Lnb 있을 경우 높이값
  bnrCloseBtn : null, // 띠배너닫기버튼
  aniTime : 300, // 애니메이션시간
  setHeight : function(){
    var $self = this;

    $self.wrapTarget = $("#wrap");
    $self.headTarget = $("#header");

    if($('#appBanner').length > 0){
      $self.bnrTarget = $('#appBanner');
      if(getCookie('bnrHeader') === 'set_cookie'){
        $self.bnrTarget.remove();
        $self.bnrTarget.slideUp(300);
        $self.bnrHeight = 0;
      }else{
        $self.bnrTarget.slideDown(300);
        $self.bnrHeight = Number( $self.bnrTarget.height() );
        if($self.bnrTarget.height() <= 1){
          $self.bnrHeight = 0;
        }
      }
      $('#bnrHeaderClose').on('click', function(){ // 닫기
        $self.bnrClose();
      });
    }

    if($('#lnbMenu') !== null){
      $self.lnbTarget = $('#lnbMenu');
      $self.lnbHeight = Number ( $self.lnbTarget.height() );
    }

    $self.headHeight = Number ( $self.headTarget.height() );

    $self.setTop();
  },
  setTop : function(){
    var $self = this;
    if($self.lnbTarget !== null){
      $self.lnbTarget.animate({
        'top' : $self.bnrHeight + $self.headHeight
      })
    }
    $self.headTarget.animate({
      'top' : $self.bnrHeight
    }, $self.aniTime);
    $self.wrapTarget.animate({
      'padding-top' : $self.bnrHeight + $self.headHeight + $self.lnbHeight
    }, $self.aniTime);
  },
  bnrClose : function(){
    setCookie('bnrHeader', 'set_cookie', 1);
    this.setHeight();
  }
}
$(document).ready(function(){
  bnrCheck.setHeight();
});

// scroll Event
var pageTop = {
  $target:null,
  $targetDefault:0,
  $scrollTop:0,
  $window:$(window),
  $windowHeight:0,
  setTime:500,
  action:function(){
    var $self = this;
    // 페이지 top 버튼
    $self.$target = $('#pageTop');
    $self.$windowHeight = Number($self.$window.height());
    $self.$window.on('scroll', function(){
      $self.$scrollTop = Number($self.$window.scrollTop());

      if($self.$scrollTop >= $self.$windowHeight * 2){
        if(!$self.$target.hasClass('on')){
          $self.position();
          $self.$target.addClass('on');
          $self.showAction();
        }
      }else{
        if($self.$target.hasClass('on')){
          $self.position();
          $self.$target.removeClass('on');
          $self.hideAction();
        }
      }

      // KMF-394: header headline
      $self.headUnderlineAction();
    });
    $self.$target.on('click', function(e){
      e.preventDefault();
      $self.topAction();
    });
  },
  showAction:function(){
    var $self = this;
    $self.$target.stop().animate({
      opacity:1
    }, $self.setTime);
  },
  hideAction:function(){
    var $self = this;
    $self.$target.stop().animate({
      opacity:0
    }, $self.setTime);
  },
  topAction:function(){
    var $self = this;
    $self.hideAction();
    $('html,body').animate({
      scrollTop:0
    }, $self.setTime);
  },
  position:function(){
    var $self = this;
    // checkIsApp => _header.htm에서 전역 변수로 값을 가지고 있으며, 앱이 아닐때 true, 앱일때 false 값을 가짐
    if($('#header-bottom').length > 0 && checkIsApp){
      $self.$target.addClass('home');
    }
    if($('#goods-view-form').length > 0 && checkIsApp){
      $self.$target.addClass('view');
    }

    if($('#branch-banner-iframe').length > 0 && $('#branch-banner-iframe').css('bottom') !== '0px' && checkIsApp){
      $('#footer').addClass('bnr_app');
      $self.$target.addClass('appBnr');
    }else{
      $self.$target.removeClass('appBnr');
    }

    if(!checkIsApp){
      if($self.$scrollTop >= $self.$windowHeight * 2){
        $self.showAction();
      }
    }
  },
  // KMF-394: header headline
  headUnderlineAction: function() {
    var that = this;
    if(that.$scrollTop <= 0) {
      $('body').removeClass('scroll_on');
    }else{
      if( $('#lnbMenu').length === 0 ) {
        $('body').addClass('scroll_on');
      }
    }
  },
}
setTimeout(function(){
  pageTop.action();
},1000); // 메인일경우 앱다운로드 배너로딩 완료후 해당 기능이 사용되도록 시간설정


// 2018-10-30 장차석 : PD-822 PC) 장바구니 담기 기능 > 레이어 팝업 아이템 갯수 오류
var cartCountCheck = 0;
function cart_count_down(cntItems, skipMessage) {
  if(cntItems !== '' && !isNaN(cntItems)) {
    updateCartCount(cntItems, skipMessage);
  } else {
    kurlyApi({
      method:'get',
      url:'/cart/v1/cart-items/available-for-purchase-count?_t=' + new Date().valueOf()
    }).then(function(response){
      var count = response.data.data.count;
      updateCartCount(count, skipMessage);
    }.bind(this)).catch(function(e){
      console.log(this)
    }.bind(this));
  }

  function updateCartCount(count, skipMessage) {
    var $target = $('#cart_item_count');
    //var oldCount = Number( $('#cart_item_count').text() );
    if(count > 0){
      if(count > 99){
        $target.addClass('max');
        $target.show().html('99+');
      }else if(count > 9 && count < 100){
        $target.addClass('ten')
        $target.show().html(count);
      }else{
        $target.show().html(count);
      }

      if($('#addMsgCart').length > 0 && cartCountCheck > 0 && skipMessage !== true){
        //if( oldCount < count ){
          $('#addMsgCart').css({
            display:'block',
            opacity:0
          }).animate({
            opacity:1
          },500,function(){
            setTimeout(function(){
              $('#addMsgCart').stop().hide(500);
              $('#msgReaddedItem').hide();
            },1000);
          });
        //}
      }
    }else{
      $target.hide();
    }
    cartCountCheck++;
  }
}


/**
 * mWeb 에서 키페드있는 경우 하단 메뉴 키페드위로 노출 안되도록 처리
 * webStatus = _header.htm 파일에 global 변수로 사용중.
 * @param evt
 * @param value // focus 일때 true, blur 일때 false
 * @returns {boolean} // return 값 필요없음
 *
 * kurly-www-v2/src/js/lib/page/kurlyUiFeature.js 해당 파일에서도 같은 방식으로 적용함.
 */
var handleKeypadCheck = function() {
  var firstHandleKeypadCheck = 0;
  // fixed 되어진 요소
  var TARGET = [
    document.getElementById('header-bottom') || null,
    document.querySelector('.fixed_parent') || null
  ];

  var webCheck = window.webStatus;

  var _handleKeypadCheck = {
    set: function () {
      var that = this;

      // 최초 한번 값 갱신
      if(firstHandleKeypadCheck === 0 && webCheck.appCheck){
        firstHandleKeypadCheck = false;
      }
      if(firstHandleKeypadCheck === 0 && !webCheck.appCheck){
        firstHandleKeypadCheck = true;
      }

      // 앱, css가 none, 모바일웹일때만
      if(!firstHandleKeypadCheck || window.webStatus.appCheck || webCheck.device !== 'mobile'){
        return false;
      }

      $('input[type=text], input[type=password], input[type=number], input[type=email]').focus(function(){
        that.action(true);
      }).blur(function(){
        that.action(false);
      });
    },
    action: function(value) {
      var iLen = TARGET.length;

      for(var i = 0; i < iLen; i++) {
        if(TARGET[i] === null){
          return false;
        }

        if (value) {
          TARGET[i].style.display = 'none';
        } else {
          TARGET[i].style.display = 'block';
        }
      }
    }
  }
  _handleKeypadCheck.set();
}

// vuejs - 뒤로가기이동시 hash없이 작동되게 처리
$(document).ready(function(){
  if (checkIsApp === true && _showCart) {
    // 2018-10-30 장차석 : PD-822 PC) 장바구니 담기 기능 > 레이어 팝업 아이템 갯수 오류
    cart_count_down();
    // end
  }

  if(location.pathname.indexOf('/m2/search.php') != -1 || location.pathname.indexOf('/m2/goods/list.php') != -1 || location.pathname.indexOf('/shop/goods/goods_list.php') != -1 || location.pathname.indexOf('/shop/goods/goods_search.php') != -1 || location.pathname.indexOf('/shop/member/login.php') != -1){
    if(!sessionStorage.goodsListReferrer){ // 해당값이 true 또는  goodsView 가 아닐때 false처리
      sessionStorage.goodsListReferrer = false;
    }
  }else if(location.pathname.indexOf('/m2/goods/view.php') != -1 || location.pathname.indexOf('/shop/goods/goods_view.php') != -1){
    sessionStorage.goodsListReferrer = 'goodsView';
  }else{
    sessionStorage.goodsListReferrer = false;
  }
});


// Event Netlify 주소 설정
var campaginUrl;
if(location.host.indexOf('local') === -1) {
  campaginUrl = 'https://campaign.kurly.com/';
}
else {
  campaginUrl = '/campaign/';
}
