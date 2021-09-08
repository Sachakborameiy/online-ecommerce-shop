var PURPLE_BOX_NUMBER = '70783';

Vue.component('goods-view-header',{
  props:['data', 'user', 'type', 'appCheck', 'memberBenefitsPoint', 'couponData', 'isOnlyNotExpectedPoint'],
  template:'\
    <div class="inner_view" v-if="data !== null">\
        <div class="thumb" :style="{ \'background-image\': \'url(\' + data.mobile_detail_image_url + \')\'}">\
          <img class="bg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAHnCAQAAADpr9U2AAABeUlEQVR42u3BMQEAAADCoPVPbQ0PoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALg0lPQAATTM2xoAAAAASUVORK5CYII=" alt="상품 대표 이미지">\
        </div>\
        <p class="goods_name">\
            <span class="btn_share">\
                <button id="btnShare" :data-goodsno="data.no" @click="$emit(\'share-view\')">공유하기</button>\
            </span>\
            <strong class="name">{{ data.name }}</strong>\
            <span class="short_desc">{{ data.short_description }}</span>\
        </p>\
        <p class="goods_dcinfo" v-if="data.original_price !== data.discounted_price">회원할인가</p>\
        <p class="goods_price">\
            <span class="position">\
                <span class="dc">\
                    <span class="dc_price" v-if="data.original_price === data.discounted_price">{{ data.original_price | commaFilter }}<span class="won">원</span></span>\
                    <span class="dc_price" v-if="data.original_price !== data.discounted_price">{{ data.discounted_price | commaFilter }}<span class="won">원</span></span>\
                    <span class="dc_percent" v-if="data.discount_rate > 0">{{ data.discount_rate}}<span class="per">%</span></span>\
                </span>\
                <a class="original_price" v-if="data.original_price !== data.discounted_price" @click="layerAction()">\
                    <span class="price">{{ data.original_price | commaFilter }}<span class="won">원</span></span><img class="ico" src="https://res.kurly.com/kurly/ico/2021/question_24_24_c999.svg" alt="물음표">\
                </a>\
                <span class="layer_position" :class="{on : layer}" v-if="data.original_price !== data.discounted_price">\
                    <span class="layer_price" v-if="data.is_suggested_retail_price">\
                        <strong class="tit_layer">권장소비자가 기준 할인</strong>\
                        파트너사가 지정한 상품판매가격 또는 온라인 권장 판매가격에서 할인된 가격입니다.\
                        <span class="bar"></span>\
                        적용된 할인가는 대표 상품의 가격으로 옵션에 따라 할인 혜택이 다를 수 있습니다. 할인 혜택은 당사 사정에 따라 변경될 수 있습니다.\
                    </span>\
                    <span class="layer_price" v-if="!data.is_suggested_retail_price">\
                        <strong class="tit_layer">컬리판매가 기준 할인</strong>\
                        동일 품질 상품의 주요 온/오프라인 유통사 가격과 비교하여 컬리가 설정한 가격에서 할인된 가격입니다.\
                        <span class="bar"></span>\
                        적용된 할인가는 대표 상품의 가격으로 옵션에 따라 할인 혜택이 다를 수 있습니다. 할인 혜택은 당사 사정에 따라 변경될 수 있습니다.\
                    </span>\
                    <button type="button" class="btn_close" @click="layerAction()">레이어 닫기</button>\
                </span>\
            </span>\
            <span class="txt_newuser" v-if="data.user_event_coupon !== null && typeof data.user_event_coupon !== \'undefined\'">\
                <span class="limit_day">{{ data.user_event_coupon.end_datetime_text }}까지 구매 가능</span>\
                <span class="limit_price">{{ data.user_event_coupon.minimum_price | commaFilter }}원 이상 결제 시 구매 가능</span>\
            </span>\
            <span v-if="memberBenefitsPoint && data.is_expected_point">\
              <span class="txt_benefit" v-if="!data.is_kurly_pass_product && user && !isMemberBenefitsPoint">\
                  <span class="ico_grade"\
                  :class="{grade0 : user.user_grade == 0,\
                  grade1 : user.user_grade == 1,\
                  grade2 : user.user_grade == 2,\
                  grade3 : user.user_grade == 3,\
                  grade4 : user.user_grade == 4,\
                  grade5 : user.user_grade == 5,\
                  grade6 : user.user_grade == 6,\
                  grade7 : user.user_grade == 7,\
                  }">{{ user.user_grade_name }} {{ memberBenefitsPoint.value }}%</span>\
                  <!-- 오늘 하루 두배 적립 => 7, 웰컴투컬리 => 6, 일반 => 0, 화이트 => 1, 라벤더 => 2, 퍼플 => 3, 더퍼플 => 4, 프렌즈 => 5 -->\
                  <span class="point">\
                      개당 <strong class="emph">{{ data.expected_point | commaFilter }}원 적립</strong>\
                      <span class="txt_expected" v-if="data.is_expected_point_package">(일부 옵션 제외)</span>\
                  </span>\
              </span>\
              <span class="txt_benefit" v-else-if="!data.is_kurly_pass_product && user">\
                  <span class="ico_grade grade7" v-if="memberBenefitsPoint.tag">{{memberBenefitsPoint.tag + " " + memberBenefitsPoint.value + "%"}}</span>\
                  <span class="point">\
                    개당 <strong class="emph">{{ data.expected_point | commaFilter }}원 적립</strong>\
                    <span class="txt_expected" v-if="data.is_expected_point_package">(일부 옵션 제외)</span>\
                  </span>\
              </span>\
            </span>\
            <span class="not_point" v-if="!data.is_expected_point && user && !isOnlyNotExpectedPoint">적립 제외 상품입니다.</span>\
            <span class="txt_point" v-if="!data.is_kurly_pass_product && user && user.benefit">{{ user.benefit }}</span>\
            <span class="not_login"  v-if="!data.is_kurly_pass_product && !user">\
                <span v-if="data.original_price !== data.discounted_price">로그인 후, 회원할인가와 적립혜택이 제공됩니다.</span>\
                <span v-if="data.original_price === data.discounted_price">로그인 후, 적립혜택이 제공됩니다.</span>\
            </span>\
        </p>\
        <div class="goods_benefit" v-if="couponData">\
            <div class="benefit" v-if="couponData.banner_type === \'DIRECT\'">\
                <a class="btn link" v-if="!appCheck" @click="clickLinkedCouponAction()">\
                    {{ couponData.banner_name }}\
                </a>\
                <a class="btn link" v-if="appCheck" :href="couponData.link">\
                    {{ couponData.banner_name }}\
                </a>\
            </div>\
            <div class="benefit" v-if="couponData.banner_type === \'DOWNLOAD_COUPON\'">\
                <button type="button" class="btn down" @click="clickDownloadCouponAction()">\
                    {{ couponData.banner_name }}\
                </button>\
            </div>\
        </div>\
        <div class="goods_info">\
            <dl class="list fst" v-if="!data.is_kurly_pass_product && data.unit_text !== \'\'">\
                <dt class="tit">판매단위</dt>\
                <dd class="desc">{{ data.unit_text }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.weight !== \'\'">\
                <dt class="tit">중량/용량</dt>\
                <dd class="desc">{{ data.weight }}</dd>\
            </dl>\
            <dl class="list" v-if="data.delivery_method !== \'\' || data.delivery_time_type_text !== \'\'">\
                <dt class="tit">배송구분</dt>\
                <dd class="desc" v-if="data.delivery_method !== \'\'">{{ data.delivery_method }}</dd>\
                <dd class="desc" v-if="data.delivery_method === \'\' && data.delivery_time_type_text !== \'\'">{{ data.delivery_time_type_text }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.origin !== \'\'">\
                <dt class="tit">원산지</dt>\
                <dd class="desc">{{ data.origin }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.packing_type_text !== \'\'">\
                <dt class="tit">포장타입</dt>\
                <dd class="desc">\
                    {{ data.packing_type_text }}\
                    <strong class="emph"\
                            v-if="data.no !== PURPLE_BOX_NUMBER"\
                    >\
                      택배배송은 에코포장이 스티로폼으로 대체됩니다.\
                    </strong>\
                </dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.contactant !== \'\'">\
                <dt class="tit">알레르기정보</dt>\
                <dd class="desc" v-html="data.contactant"></dd>\
            </dl>\
            <!--<dl class="list" v-if="data.brand_title !== \'\'">\
                <dt class="tit">브랜드명</dt>\
                <dd class="desc">{{ data.brand_title }}</dd>\
            </dl>-->\
            <dl class="list" v-if="!data.is_kurly_pass_product && (data.effective_date_start !== \'\' && data.effective_date_end !== \'\')">\
                <dt class="tit">유효일자</dt>\
                <dd class="desc">{{ data.effective_date_start }} ~ {{ data.effective_date_end }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.expiration_date !== \'\'">\
                <dt class="tit">유통기한</dt>\
                <dd class="desc">{{ data.expiration_date }}</dd>\
            </dl>\
            <!--<dl class="list">\
                <dt class="tit">보증 유통기간</dt>\
                <dd class="desc">실서버 상품번호 41879</dd>\
            </dl>-->\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.today_brix !== \'\'">\
                <dt class="tit">당도</dt>\
                <dd class="desc">{{ data.today_brix }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.is_detail_sold_out && data.sold_out_text !== \'\'">\
                <dt class="tit">입고안내</dt>\
                <dd class="desc">{{ data.sold_out_text }}</dd>\
            </dl>\
            <dl class="list" v-if="data.extendedCheck.length > 0" v-for="extended_info in data.extended_infos">\
                <dt class="tit">{{ extended_info.tit }}</dt>\
                <dd class="desc">{{ extended_info.value }}</dd>\
            </dl>\
            <dl class="list" v-if="data.guidesLen > 0">\
                <dt class="tit">안내사항</dt>\
                <dd class="desc"><span class="txt" v-for="guide in data.guides">{{ guide }}</span></dd>\
            </dl>\
            <dl class="list" v-if="!data.is_sales">\
                <dt class="tit">판매상태</dt>\
                <dd class="desc status" v-html="data.not_sales_text"></dd>\
            </dl>\
            <div class="info_kurlypass" v-if="type === \'pc\' && data.is_kurly_pass_product">\
                <span class="tit">컬리패스는 샛별배송지역에만 사용가능합니다.<br> 구매하시기 전 확인해주세요!</span>\
                <a href="#none" onclick="javascript:address_chk_popup();return false;" class="btn_type2"><span class="txt_type">주소 검색</span></a>\
            </div>\
        </div>\
        <div class="info" v-if="type === \'mobile\'">\
            <div class="info_kurlypass" v-if="data.is_kurly_pass_product">\
                컬리패스는 샛별배송지역에만 사용가능합니다. 구매하시기 전 확인해주세요!\
                <a href="#none" onclick="javascript:address_chk_popup();return false;" class="btn_type2"><span class="txt_type">주소 검색</span></a>\
            </div>\
        </div>\
    </div>\
    '
  ,data : function(){
    return {
      layer : false
    }
  },
  computed: {
    isMemberBenefitsPoint: function() {
      return this.memberBenefitsPoint.model === 'MEMBER_BENEFIT_POLICY'
    }
  }
  ,methods:{
    layerAction : function(){ // 레이어열기닫기
      this.layer = !this.layer;
    },
    clickLinkedCouponAction: function() {
      this.$emit('handle-click-linked-coupon-button');
    },
    clickDownloadCouponAction: function() {
      this.$emit('handle-click-download-coupon-button');
    },
  }
});

var sectionView = new Vue({
  el: '#sectionView',
  data: function() {
    return {
      goodsNo : null,
      // 상품번호
      postData : null,
      userData : false,
      snsCount : 0, // sns 공유하기 관련
      type : 'pc',
      appCheck : false,
      eventCount : false,
      products : [],
      errors : [],
      memberBenefitsPoint: null,
      // coupon banner
      couponDetailsModalOpen: false,
      couponData: null,
      isCouponAlreadyDownloaded: false,
      isOnlyNotExpectedPoint: false, // KMF-664: 특정상품 적립제외 문구 가리기
    }
  },
  mounted : function() {

  },
  created :function() {
    kurlyApi({
      method:'get',
      url: '/v3/members/member-benefits/point'
    }).then(function(response){
      if(typeof response === 'undefined' || response.status != 200) return;
      var data = response.data.data;
      this.memberBenefitsPoint = data
    }.bind(this)).catch(function(e){
      console.log(e)
    });
  },
  methods: {
    update : function(){ // type은 유저 정보 값 체크
      var $self = this;
      var nowTime = new Date().getTime();
      var dataSave;
      kurlyApi({
        method:'get',
        url:'/v3/home/products/' + $self.goodsNo + '?&ver=' + nowTime
      }).then(function(response) {
        if(typeof response === 'undefined' || response.status != 200) return;
        dataSave = response.data.data;

        // 쿠폰 배너 정보
        this.getCouponData(dataSave.no);

        $self.$set(dataSave, "guidesLen", dataSave.guides.length); // 상품안내문구
        $self.$set(dataSave, "extendedCheck", false); // 상품별 추가 정보 안내문구

        dataSave.extendedCheck = Object.keys(dataSave.extended_infos);
        if(dataSave.extendedCheck.length > 0){
          var extendedInfoKey, extendedInfoResult = [];
          for (var key in dataSave.extended_infos) {
            extendedInfoKey = {
              'tit' : key,
              'value' : dataSave.extended_infos[key]
            }
            extendedInfoResult.push(extendedInfoKey);
          }
          dataSave.extended_infos = extendedInfoResult;
        }
        if(!dataSave.is_detail_sold_out && dataSave.is_package_sold_out){ // 패키지상품 품절인경우 상품 품절처리
          dataSave.is_detail_sold_out = dataSave.is_package_sold_out;
        }
        if(!dataSave.is_purchase_status){ // 상품상태값에 따른 솔드아웃처리
          dataSave.is_detail_sold_out = true;
        }

        // KM-3159 cs : 적립금 제외 - 패키지상품일경우적립금제외상품체크
        var is_expected_point_package = false, count_expected_point_package = 0;
        var iLen = dataSave.package_products.length;
        if(dataSave.is_package){
          for(var i = 0; i < iLen; i++){
            if(!dataSave.package_products[i].is_expected_point){
              is_expected_point_package = true;
              count_expected_point_package++;
            }
          }
          if(iLen === count_expected_point_package){
            dataSave.is_expected_point = false;
          }
        }
        dataSave.is_expected_point_package = is_expected_point_package;

        // KMF-664: 특정상품 적립제외 문구 가리기
        var NOT_EXPECTED_POINT = [
          '83774', '83773', '83772', '83771', '83770', '83769', '83767', '83766', '83765', '83764', '83380', '83379', '83295', '81946', '81945', '81944', '81943', '81942', '81941', '83775', '83768', '82031', '82030'
        ]
        if(NOT_EXPECTED_POINT.indexOf(dataSave.no)  > -1 ) {
          $self.isOnlyNotExpectedPoint = true;
        }

        // 상품상세 정보 노출
        $self.postData = dataSave;

        var reviewCountNum = dataSave.review_count;
        if(reviewCountNum > 0){ // 상품후기 카운트(app은 사용안함);
          if(reviewCountNum > 9999 && this.type !== 'pc'){
            reviewCountNum = '9999+';
          }
          $self.reviewCount(reviewCountNum);
        }

        // 상품 문의 및 후기 탭 비활성화 처리
        if (!dataSave.is_product_review_writable) {
          $('.goods-view-review-tab, #reviewCountShow').hide();
        }
        if (!dataSave.is_product_inquiry_writable) {
          $('.qna-show, #qnaShow').hide();
        }

        // 장바구니레이어에값전달
        $self.cartputSendData(dataSave);

        window.scrollTo(0, 0);
        if($self.type === 'pc'){
          $('#content').css({'opacity':1});
        }
        $('.bg_loading').removeClass('loading').hide();

        /**
         * KM-2069 PC 리모컨 최근 본 상품
         * (goodsNo, img url)
         */
        if($self.type === 'pc'){
          setGoodsRecent.setInfo($self.goodsNo, $self.postData.mobile_detail_image_url);
        }

        if(!this.appCheck){
          // KM-1483 Amplitude
          KurlyTracker.setScreenName('product_detail_description')
          .setAction('view_product_detail', dataSave).sendData();

          branchViewAction(); // KM-1238 branch 기능 추가
          fusionSignalCheck(); // KM-1048 fusionSignal

          fbpTracker.setAction('ViewContent', dataSave.no); // KM-2251 Facebook Pixel Code

          // KMF-466 Facebook Conversion API 적용
          conversionsTracker.setAction('ViewContent', dataSave.no);
        }
      }.bind(this)).catch(function(e){
        $('.bg_loading').removeClass('loading').hide();
        console.log(e);
      });
    },
    cartputSendData: function(data){
      var $self = this;
      if(typeof cartPut === 'undefined'){
        setTimeout(function() {
          $self.cartputSendData(data);
        }, 2000);
      }else{
        $('#cartPut').show();
        cartPut.viewData = data;
        cartPut.goodsNo = data.no;
        cartPut.type = $self.type;
        cartPut.cartType = 'view';
        cartPut.userData = $self.userData;
        cartPut.update();
      }
    },
    userInfoGet : function(checkData){ // type은 유저 정보 값 체크, no 상품번호
      var user, $self = this;
      $self.type = checkData.type;
      if(checkData.login){
        $self.userData = [];
        kurlyApi({
          method:'get',
          url:'/v3/my-page/info'
        }).then(function(response){
          if(typeof response === 'undefined' || response.status != 200 || typeof response.status === 'undefined') return;
          user = response.data.data;
          $self.userData = user;
          $self.notification();// 사용자 컬리러버스혜택정보 가져오기
          // cartPut.userData = user;
          // cartPut.updatePrice();
        }.bind(this)).catch(function(e){
          console.log(e);
        });
      }
      $self.goodsNo = checkData.no;
      $self.update();
    },
    shareSNSview : function(){ // sns 공유하기
      var $self = this, snsView = new shareSNS(), snsName;
      if($self.snsCount === 0 || $self.appCheck){
        snsView.getShare($self.postData.no, $self.type);
      }else{
        snsView.layerOpen();
      }
      $self.snsCount++;
    },
    notification : function(){ // 사용자 컬리러버스혜택정보 가져오기
      var $self = this, textBenfit;
      var date = new Date().getTime(); // 뒤로가기시 캐시제거용
      kurlyApi({
        method:'get',
        url:'/v1/mypage/notification?' + date
      }).then(function(response){
        if(typeof response === 'undefined' || response.status != 200) return;
        if(response.data.data.kurlylovers_benefit !== null && response.data.data.kurlylovers_benefit.tag !== null){
          textBenfit = response.data.data.kurlylovers_benefit.tag;
          $self.$set($self.userData, "benefit", false);
          if(textBenfit !== null){
            $self.$set($self.userData, "benefit", textBenfit);
          }
        }
      }.bind(this)).catch(function(e){
        console.log(e);
      });
    },
    reviewCount : function(num){
      if( this.appCheck ) return;

      if(this.type === 'pc'){
        $('.count_review').text('(' + num + ')');
      }else{
        $('#reviewCountShow').addClass('item_review').find('.count').text(num);
      }
    },
    getCouponData: function(goodsNo) {
      var nowTime = new Date().getTime();
      kurlyApi({
        method: 'get',
        url: '/banner/v1/download-coupon/product-detail/' + goodsNo + '?&ver=' + nowTime,
      })
      .then(function(res) {
        const data = res.data;
        const status = res.status;

        if (status === 200) {
          if (!(data && data.data && data.data.banner_name)) {
            return;
          }

          const coupon = data.data.coupon;
          const banner_type = data.data.banner_type;

          if (banner_type === 'DIRECT') {
            this.couponData = data.data;

            if (this.appCheck) {
              const keyword = data.data.link.split('couponNo=')[1];

              if (keyword) {
                this.couponData.link = 'kurly://mykurly/coupon?code=' + keyword;
              } else {
                this.couponData.link = data.data.link + '#modal';
              }
            }

            return;
          }

          const benefit = getBenefitText(coupon);

          const condition = [];
          const benefitAmountText = getBenefitAmountText(coupon);
          if (benefitAmountText) {
            condition.push(benefitAmountText);
          }
          const subCondition = getSubConditionText(coupon)
          if (subCondition) {
            condition.push(subCondition);
          }

          const expiration = coupon.effectivePeriod.infinite ? '기간제한 없음' : getExpiration(coupon.effectivePeriod.endDateTime);

          const couponDetail = {
            name: coupon.name,
            benefit: benefit,
            expiration: expiration,
            condition: condition,
          };

          this.couponData = data.data;
          this.couponData.couponDetail = couponDetail;
        }
      }.bind(this))
      .catch(function(err) {
        alert('쿠폰 정보를 가져올 수 없습니다.', err);
      });
    },
    handleClickLinkedCouponButton: function() {
      location.href = this.couponData.link;
    },
    handleClickDownloadCouponButton: function() {
      this.downloadCoupon(this.couponData.access_key)
        .then(function(response) {
          const type = response.type;
          const message = response.message;

          if (type === 'duplicated') {
            this.isCouponAlreadyDownloaded = true;
          }

          if (type === 'success' || type === 'duplicated') {
            this.openCouponDetailsModal();
          } else if (type === 'unAuthorized') {
            // redirect to login page with deeplinked current url
            const isApp = this.appCheck;
            const device = this.type;

            let redirectTo = '/m2/mem/login.php?return_url=' + encodeURIComponent(location.href);
            if (isApp) {
              redirectTo = 'kurly://login';
            } else if (device === 'pc') {
              redirectTo = '/shop/member/login.php?return_url=' + encodeURIComponent(location.href);
            }

            location.href = redirectTo;
          } else {
            alert(message);
          }
        }.bind(this));
    },
    downloadCoupon: function(accessKey) {
      var nowTime = new Date().getTime();
      return kurlyApi({
        method: 'post',
        url: '/v3/coupon/download-lacoupon-by-access-key' + '?&ver=' + nowTime,
        data: {
          access_key: accessKey,
        },
      })
      .then(function(res) {
        if (!res) return;
        if (res.status === 204 || res.statue === 200) {
          return {
            type: 'success',
            message: '쿠폰이 다운로드 되었습니다.'
          };
        }
      })
      .catch(function(err) {
        if (err.response.status === 401) {
          return {
            type: 'unAuthorized',
            message: '로그인이 필요합니다.'
          };
        } else if (err.response.status === 409 || err.response.status === 400) {
          return {
            type: 'duplicated',
            message: err.response.data.message,
          };
        } else {
          return {
            type: 'failed',
            message: '쿠폰이 정상적으로 다운로드되지 않았습니다. 다시 시도해주세요.',
          };
        }
      });
    },
    openCouponDetailsModal: function() {
      this.couponDetailsModalOpen = true;
      bodyScroll.bodyFixed();
    },
    closeCouponDetailsModal: function() {
      this.couponDetailsModalOpen = false;
      bodyScroll.bodyDefault();
    },
  },
});

// 쿠폰배너 공통 상수
const BENEFIT_TYPE = {
  PRICE_DISCOUNT: 'PRICE_DISCOUNT',
  PERCENT_DISCOUNT: 'PERCENT_DISCOUNT',
  FREE_SHIPPING: 'FREE_SHIPPING',
};

const BENEFIT_UNIT = {
  PRICE_DISCOUNT: '원',
  PERCENT_DISCOUNT: '%',
};

// 쿠폰배너 헬퍼 함수; 쿠폰 혜택
function getBenefitText(coupon) {
  if (coupon.benefitType === BENEFIT_TYPE.FREE_SHIPPING) {
    return '무료배송';
  }

  return coupon.benefitValue + BENEFIT_UNIT[coupon.benefitType];
}

// 쿠폰배너 헬퍼 함수; 쿠폰 할인 범위 텍스트
function getBenefitAmountText(coupon) {
  if (coupon.minimumOrderAmount === 1 && !coupon.minimumOrderPrice) {
    return null;
  }

  let benefitAmountText = '';

  if (coupon.minimumOrderPrice) {
    benefitAmountText += coupon.minimumOrderPrice + '원 '
  }
  if (coupon.minimumOrderAmount !== 1) {
    benefitAmountText += coupon.minimumOrderAmount + '개 '
  }

  benefitAmountText += '이상 주문 시 '

  if (
    (coupon.benefitType === BENEFIT_TYPE.PERCENT_DISCOUNT) &&
    coupon.couponMeta.maximumDiscountPrice
  ) {
    benefitAmountText += '최대 ' + coupon.couponMeta.maximumDiscountPrice + '원 할인';
  }

  return benefitAmountText;
}

// 쿠폰배너 헬퍼 함수; 쿠폰 사용 조건 텍스트
// 텍스트 입력 순서: 카카오페이 > 특정상품 한정 > 할인상품 제외 > 일부상품 제외
function getSubConditionText(coupon) {
  const HURDLE_TYPE = {
    ORDERED_PRODUCT: 'ORDERED_PRODUCT',
    TARGET_PRODUCT: 'TARGET_PRODUCT',
    ALLOWED_PRODUCT: 'ALLOWED_PRODUCT',
    ALLOWED_CATEGORY: 'ALLOWED_CATEGORY',
    PAYMENT_METHOD: 'PAYMENT_METHOD',
  };

  let subConditionText = '';

  if (coupon.hurdleType === HURDLE_TYPE.PAYMENT_METHOD) {
    subConditionText += '카카오페이 결제시';
  }

  const allowedProducts = coupon.couponMeta.target.allowedProducts;
  const allowedCategories = coupon.couponMeta.target.allowedCategories;
  const isForSpecific = (
    coupon.hurdleType === HURDLE_TYPE.ALLOWED_CATEGORY ||
    coupon.hurdleType === HURDLE_TYPE.ALLOWED_PRODUCT ||
    (allowedProducts && allowedProducts.length) ||
    (allowedCategories && allowedCategories.length)
  );

  if (isForSpecific) {
    subConditionText += (subConditionText === '' ? '' : ', ') + '특정상품 한정'
  }

  if (coupon.disallowDiscountedProducts) {
    subConditionText += (subConditionText === '' ? '' : ', ') + '할인상품 제외';
  }

  const disallowedProducts = coupon.couponMeta.target.disallowedProducts;
  const disallowedCategories = coupon.couponMeta.target.disallowedCategories;
  const isExceptSpecific = (
    disallowedProducts && disallowedProducts.length ||
    disallowedCategories && disallowedCategories.length
  );

  if (isExceptSpecific) {
    subConditionText += (subConditionText === '' ? '' : ', ') + '일부 상품 제외';
  }

  return subConditionText === '' ? null : subConditionText;
}

// 쿠폰배너 헬퍼 함수; 쿠폰 만료기간
function getExpiration(endDateTime) {
  const endPeriod = endDateTime.split(' ');
  const date = endPeriod[0].split('-');
  const time = endPeriod[1].split(':');

  let hour = time[0];

  if (endPeriod[1] === '23:59:59') {
    hour = '24';
  }

  return date[0] + '년 ' + date[1] + '월 ' + date[2] + '일 ' + hour + '시까지';
}

/**
 * KM-1048 fusionSignal
 * 새로고침을 판단하기 위한 sessionStorage.fusionSignalView
 * common_js\goodslist_v1.js 에서 sessionStorage.fusionSignalView 를 제거
 *
 */
function fusionSignalCheck(){
  if(typeof sessionStorage.FusionSignal !== 'undefined' && typeof sessionStorage.fusionSignalView === 'undefined'){
    var fusionSignalResult = JSON.parse(sessionStorage.getItem("FusionSignal"));
    if(fusionSignalResult[0].type === 'click_product'){
      fusionSignalPut();
      sessionStorage.fusionSignalView = true;
    }else{
      sessionStorage.removeItem("FusionSignal");
    }
  }else{
    sessionStorage.removeItem("FusionSignal");
    sessionStorage.removeItem("fusionSignalView");
  }
}


// KM-1238 branch 기능 추가
function branchViewAction(type){
  var viewInfo = sectionView.postData, bracnViewItem, eventName;
  if(type === 'sns'){
    bracnViewItem = [
      {
        "$canonical_identifier": "product/" + viewInfo.no,
        "$sku": viewInfo.no,
        "$product_name": viewInfo.name
      }
    ];
    eventName = 'SHARE';
  }else{
    bracnViewItem = [
      {
        "$canonical_identifier": "product/" + viewInfo.no,
        "$sku": viewInfo.no,
        "$price": viewInfo.discounted_price,
        "$quantity": viewInfo.min_ea,
        "$currency": "KRW",
        "$product_name": viewInfo.name,
      }
    ];
    eventName = 'VIEW_ITEM';
  }
  if(typeof branch === 'undefined'){
    document.addEventListener("branchReady", function(e){
      branch.logEvent(eventName, {}, bracnViewItem);
    });
  }else{
    branch.logEvent(eventName, {}, bracnViewItem);
  }
}


/**
 * KM-2069 PC 리모컨 최근 본 상품
 * @type {setInfo: string | goodsNo, string | thumbnail Url}
 * _lsData : localStorage goods Data
 */
var setGoodsRecent = (function(){

  var _lsData = {}, lsDataArr = [];

  function setInfo(no, thumb){
    _lsData = {
      no: no,
      thumb: thumb,
      time: new Date().getTime()
    }


    if(localStorage.getItem('goodsRecent') !== null){
      addUpdate();
    }else{
      newUpdate();
    }
  }

  /**
   * 동일항목은 1회 만 발생됨.
   * 최대 갯수는 50개. 이상 발생시 제거
   */
  function addUpdate(){
    try{
      var getRecent = JSON.parse(localStorage.getItem("goodsRecent"));
      var i, len = getRecent.length, deleteNum = null, delCount = 0, maxCount = 50;
      for(i = 0; i < len; i++){
        if(getRecent[i].no === _lsData.no){
          deleteNum = i;
        }
        if(i >= maxCount){
          delCount++;
        }
      }
      for(i = 0; i < delCount; i++){
        getRecent.pop();
      }
      if(deleteNum !== null){
        getRecent.splice(deleteNum, 1);
      }
      getRecent.unshift(_lsData);
      _setLocalStorage(getRecent);
    } catch(e) {
      console.log("JSON parse error from the Quick menu goods list!!!", e);
    }
  }

  function newUpdate(){
    lsDataArr.push(_lsData);
    _setLocalStorage(lsDataArr);
  }

  function _setLocalStorage(setItem){
    localStorage.setItem('goodsRecent', JSON.stringify(setItem));
  }

  return {
    setInfo: setInfo
  }
})();

Vue.component('coupon-details-modal', {
  props: ['appCheck', 'couponDetailsModalOpen', 'isCouponAlreadyDownloaded', 'couponData'],
  methods: {
    // 이 컴포넌트에서 호출할 함수들
    closeModalAction: function() {
      this.$emit('close-coupon-details-modal');
    },
  },
  template: '\
    <div\
      class="modal_coupon"\
      :class="appCheck ? \'app_modal\' : \'\'"\
      v-if="couponData && couponData.couponDetail"\
    >\
      <div class="modal" :class="couponDetailsModalOpen ? \'on\' : \'\'">\
        <div class="modal_body">\
          <p class="tit_coupon">\
            {{ isCouponAlreadyDownloaded ? \'이미 다운로드된 쿠폰입니다.\' : \'쿠폰이 다운로드 되었습니다.\'}}\
          </p>\
          <div class="coupon_info">\
            <strong class="tit">{{ couponData.couponDetail.benefit | commaFilter }}</strong>\
            <p class="desc">{{ couponData.couponDetail.name }}</p>\
            <p class="day">{{ couponData.couponDetail.expiration }}</p>\
          </div>\
          <ul class="coupon_notice">\
            <li v-for="it in couponData.couponDetail.condition" :key="it">\
              {{ it  | commaFilter }}\
            </li>\
          </ul>\
        </div>\
        <div class="modal_footer">\
          <button type="button" class="btn_close" @click="closeModalAction()">\
            확인\
          </button>\
        </div>\
      </div>\
    </div>\
  ',
});
