// ���̾�Ÿ���϶� body������ų�� ���
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

// �������
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
        // KM-1483 Amplitude ��ǰ�ı⾲�� => �ۼ� �� ���ǻ��� Ŭ���� ���̾� �㶧 screen_name ����
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

      if(resultHeight <= 179){ // �������� �ּ� �������� ��� �ִ밪�� �ǵ��� ����(�ּҰ��� ������ ���� height�� ���������� ����°��)
        resultHeight = 482;
      }

      var defaultPadding = 71; // �θ��� ���,�ϴ� �е���
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
        eventStart : false, // �� �ѹ�������
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

// ���� check
var bnrCheck = {
  bnrTarget : null, // ����
  wrapTarget : null, // �������� ���δ� ����
  headTarget : null, // header
  lnbTarget : null, // lnb
  bnrHeight : 0, // ���� ���̰�
  headHeight : 0, // header ���̰�
  lnbHeight : 0, // Lnb ���� ��� ���̰�
  bnrCloseBtn : null, // ���ʴݱ��ư
  aniTime : 300, // �ִϸ��̼ǽð�
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
      $('#bnrHeaderClose').on('click', function(){ // �ݱ�
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
    // ������ top ��ư
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
    // checkIsApp => _header.htm���� ���� ������ ���� ������ ������, ���� �ƴҶ� true, ���϶� false ���� ����
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
},1000); // �����ϰ�� �۴ٿ�ε� ��ʷε� �Ϸ��� �ش� ����� ���ǵ��� �ð�����


// 2018-10-30 ������ : PD-822 PC) ��ٱ��� ��� ��� > ���̾� �˾� ������ ���� ����
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
 * mWeb ���� Ű����ִ� ��� �ϴ� �޴� Ű������� ���� �ȵǵ��� ó��
 * webStatus = _header.htm ���Ͽ� global ������ �����.
 * @param evt
 * @param value // focus �϶� true, blur �϶� false
 * @returns {boolean} // return �� �ʿ����
 *
 * kurly-www-v2/src/js/lib/page/kurlyUiFeature.js �ش� ���Ͽ����� ���� ������� ������.
 */
var handleKeypadCheck = function() {
  var firstHandleKeypadCheck = 0;
  // fixed �Ǿ��� ���
  var TARGET = [
    document.getElementById('header-bottom') || null,
    document.querySelector('.fixed_parent') || null
  ];

  var webCheck = window.webStatus;

  var _handleKeypadCheck = {
    set: function () {
      var that = this;

      // ���� �ѹ� �� ����
      if(firstHandleKeypadCheck === 0 && webCheck.appCheck){
        firstHandleKeypadCheck = false;
      }
      if(firstHandleKeypadCheck === 0 && !webCheck.appCheck){
        firstHandleKeypadCheck = true;
      }

      // ��, css�� none, ��������϶���
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

// vuejs - �ڷΰ����̵��� hash���� �۵��ǰ� ó��
$(document).ready(function(){
  if (checkIsApp === true && _showCart) {
    // 2018-10-30 ������ : PD-822 PC) ��ٱ��� ��� ��� > ���̾� �˾� ������ ���� ����
    cart_count_down();
    // end
  }

  if(location.pathname.indexOf('/m2/search.php') != -1 || location.pathname.indexOf('/m2/goods/list.php') != -1 || location.pathname.indexOf('/shop/goods/goods_list.php') != -1 || location.pathname.indexOf('/shop/goods/goods_search.php') != -1 || location.pathname.indexOf('/shop/member/login.php') != -1){
    if(!sessionStorage.goodsListReferrer){ // �ش簪�� true �Ǵ�  goodsView �� �ƴҶ� falseó��
      sessionStorage.goodsListReferrer = false;
    }
  }else if(location.pathname.indexOf('/m2/goods/view.php') != -1 || location.pathname.indexOf('/shop/goods/goods_view.php') != -1){
    sessionStorage.goodsListReferrer = 'goodsView';
  }else{
    sessionStorage.goodsListReferrer = false;
  }
});


// Event Netlify �ּ� ����
var campaginUrl;
if(location.host.indexOf('local') === -1) {
  campaginUrl = 'https://campaign.kurly.com/';
}
else {
  campaginUrl = '/campaign/';
}
