var PURPLE_BOX_NUMBER = '70783';

Vue.component('goods-view-header',{
  props:['data', 'user', 'type', 'appCheck', 'memberBenefitsPoint', 'couponData', 'isOnlyNotExpectedPoint'],
  template:'\
    <div class="inner_view" v-if="data !== null">\
        <div class="thumb" :style="{ \'background-image\': \'url(\' + data.mobile_detail_image_url + \')\'}">\
          <img class="bg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAHnCAQAAADpr9U2AAABeUlEQVR42u3BMQEAAADCoPVPbQ0PoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALg0lPQAATTM2xoAAAAASUVORK5CYII=" alt="��ǰ ��ǥ �̹���">\
        </div>\
        <p class="goods_name">\
            <span class="btn_share">\
                <button id="btnShare" :data-goodsno="data.no" @click="$emit(\'share-view\')">�����ϱ�</button>\
            </span>\
            <strong class="name">{{ data.name }}</strong>\
            <span class="short_desc">{{ data.short_description }}</span>\
        </p>\
        <p class="goods_dcinfo" v-if="data.original_price !== data.discounted_price">ȸ�����ΰ�</p>\
        <p class="goods_price">\
            <span class="position">\
                <span class="dc">\
                    <span class="dc_price" v-if="data.original_price === data.discounted_price">{{ data.original_price | commaFilter }}<span class="won">��</span></span>\
                    <span class="dc_price" v-if="data.original_price !== data.discounted_price">{{ data.discounted_price | commaFilter }}<span class="won">��</span></span>\
                    <span class="dc_percent" v-if="data.discount_rate > 0">{{ data.discount_rate}}<span class="per">%</span></span>\
                </span>\
                <a class="original_price" v-if="data.original_price !== data.discounted_price" @click="layerAction()">\
                    <span class="price">{{ data.original_price | commaFilter }}<span class="won">��</span></span><img class="ico" src="https://res.kurly.com/kurly/ico/2021/question_24_24_c999.svg" alt="����ǥ">\
                </a>\
                <span class="layer_position" :class="{on : layer}" v-if="data.original_price !== data.discounted_price">\
                    <span class="layer_price" v-if="data.is_suggested_retail_price">\
                        <strong class="tit_layer">����Һ��ڰ� ���� ����</strong>\
                        ��Ʈ�ʻ簡 ������ ��ǰ�ǸŰ��� �Ǵ� �¶��� ���� �ǸŰ��ݿ��� ���ε� �����Դϴ�.\
                        <span class="bar"></span>\
                        ����� ���ΰ��� ��ǥ ��ǰ�� �������� �ɼǿ� ���� ���� ������ �ٸ� �� �ֽ��ϴ�. ���� ������ ��� ������ ���� ����� �� �ֽ��ϴ�.\
                    </span>\
                    <span class="layer_price" v-if="!data.is_suggested_retail_price">\
                        <strong class="tit_layer">�ø��ǸŰ� ���� ����</strong>\
                        ���� ǰ�� ��ǰ�� �ֿ� ��/�������� ����� ���ݰ� ���Ͽ� �ø��� ������ ���ݿ��� ���ε� �����Դϴ�.\
                        <span class="bar"></span>\
                        ����� ���ΰ��� ��ǥ ��ǰ�� �������� �ɼǿ� ���� ���� ������ �ٸ� �� �ֽ��ϴ�. ���� ������ ��� ������ ���� ����� �� �ֽ��ϴ�.\
                    </span>\
                    <button type="button" class="btn_close" @click="layerAction()">���̾� �ݱ�</button>\
                </span>\
            </span>\
            <span class="txt_newuser" v-if="data.user_event_coupon !== null && typeof data.user_event_coupon !== \'undefined\'">\
                <span class="limit_day">{{ data.user_event_coupon.end_datetime_text }}���� ���� ����</span>\
                <span class="limit_price">{{ data.user_event_coupon.minimum_price | commaFilter }}�� �̻� ���� �� ���� ����</span>\
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
                  <!-- ���� �Ϸ� �ι� ���� => 7, �������ø� => 6, �Ϲ� => 0, ȭ��Ʈ => 1, �󺥴� => 2, ���� => 3, ������ => 4, ������ => 5 -->\
                  <span class="point">\
                      ���� <strong class="emph">{{ data.expected_point | commaFilter }}�� ����</strong>\
                      <span class="txt_expected" v-if="data.is_expected_point_package">(�Ϻ� �ɼ� ����)</span>\
                  </span>\
              </span>\
              <span class="txt_benefit" v-else-if="!data.is_kurly_pass_product && user">\
                  <span class="ico_grade grade7" v-if="memberBenefitsPoint.tag">{{memberBenefitsPoint.tag + " " + memberBenefitsPoint.value + "%"}}</span>\
                  <span class="point">\
                    ���� <strong class="emph">{{ data.expected_point | commaFilter }}�� ����</strong>\
                    <span class="txt_expected" v-if="data.is_expected_point_package">(�Ϻ� �ɼ� ����)</span>\
                  </span>\
              </span>\
            </span>\
            <span class="not_point" v-if="!data.is_expected_point && user && !isOnlyNotExpectedPoint">���� ���� ��ǰ�Դϴ�.</span>\
            <span class="txt_point" v-if="!data.is_kurly_pass_product && user && user.benefit">{{ user.benefit }}</span>\
            <span class="not_login"  v-if="!data.is_kurly_pass_product && !user">\
                <span v-if="data.original_price !== data.discounted_price">�α��� ��, ȸ�����ΰ��� ���������� �����˴ϴ�.</span>\
                <span v-if="data.original_price === data.discounted_price">�α��� ��, ���������� �����˴ϴ�.</span>\
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
                <dt class="tit">�ǸŴ���</dt>\
                <dd class="desc">{{ data.unit_text }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.weight !== \'\'">\
                <dt class="tit">�߷�/�뷮</dt>\
                <dd class="desc">{{ data.weight }}</dd>\
            </dl>\
            <dl class="list" v-if="data.delivery_method !== \'\' || data.delivery_time_type_text !== \'\'">\
                <dt class="tit">��۱���</dt>\
                <dd class="desc" v-if="data.delivery_method !== \'\'">{{ data.delivery_method }}</dd>\
                <dd class="desc" v-if="data.delivery_method === \'\' && data.delivery_time_type_text !== \'\'">{{ data.delivery_time_type_text }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.origin !== \'\'">\
                <dt class="tit">������</dt>\
                <dd class="desc">{{ data.origin }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.packing_type_text !== \'\'">\
                <dt class="tit">����Ÿ��</dt>\
                <dd class="desc">\
                    {{ data.packing_type_text }}\
                    <strong class="emph"\
                            v-if="data.no !== PURPLE_BOX_NUMBER"\
                    >\
                      �ù����� ���������� ��Ƽ�������� ��ü�˴ϴ�.\
                    </strong>\
                </dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.contactant !== \'\'">\
                <dt class="tit">�˷���������</dt>\
                <dd class="desc" v-html="data.contactant"></dd>\
            </dl>\
            <!--<dl class="list" v-if="data.brand_title !== \'\'">\
                <dt class="tit">�귣���</dt>\
                <dd class="desc">{{ data.brand_title }}</dd>\
            </dl>-->\
            <dl class="list" v-if="!data.is_kurly_pass_product && (data.effective_date_start !== \'\' && data.effective_date_end !== \'\')">\
                <dt class="tit">��ȿ����</dt>\
                <dd class="desc">{{ data.effective_date_start }} ~ {{ data.effective_date_end }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.expiration_date !== \'\'">\
                <dt class="tit">�������</dt>\
                <dd class="desc">{{ data.expiration_date }}</dd>\
            </dl>\
            <!--<dl class="list">\
                <dt class="tit">���� ����Ⱓ</dt>\
                <dd class="desc">�Ǽ��� ��ǰ��ȣ 41879</dd>\
            </dl>-->\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.today_brix !== \'\'">\
                <dt class="tit">�絵</dt>\
                <dd class="desc">{{ data.today_brix }}</dd>\
            </dl>\
            <dl class="list" v-if="!data.is_kurly_pass_product && data.is_detail_sold_out && data.sold_out_text !== \'\'">\
                <dt class="tit">�԰��ȳ�</dt>\
                <dd class="desc">{{ data.sold_out_text }}</dd>\
            </dl>\
            <dl class="list" v-if="data.extendedCheck.length > 0" v-for="extended_info in data.extended_infos">\
                <dt class="tit">{{ extended_info.tit }}</dt>\
                <dd class="desc">{{ extended_info.value }}</dd>\
            </dl>\
            <dl class="list" v-if="data.guidesLen > 0">\
                <dt class="tit">�ȳ�����</dt>\
                <dd class="desc"><span class="txt" v-for="guide in data.guides">{{ guide }}</span></dd>\
            </dl>\
            <dl class="list" v-if="!data.is_sales">\
                <dt class="tit">�ǸŻ���</dt>\
                <dd class="desc status" v-html="data.not_sales_text"></dd>\
            </dl>\
            <div class="info_kurlypass" v-if="type === \'pc\' && data.is_kurly_pass_product">\
                <span class="tit">�ø��н��� ��������������� ��밡���մϴ�.<br> �����Ͻñ� �� Ȯ�����ּ���!</span>\
                <a href="#none" onclick="javascript:address_chk_popup();return false;" class="btn_type2"><span class="txt_type">�ּ� �˻�</span></a>\
            </div>\
        </div>\
        <div class="info" v-if="type === \'mobile\'">\
            <div class="info_kurlypass" v-if="data.is_kurly_pass_product">\
                �ø��н��� ��������������� ��밡���մϴ�. �����Ͻñ� �� Ȯ�����ּ���!\
                <a href="#none" onclick="javascript:address_chk_popup();return false;" class="btn_type2"><span class="txt_type">�ּ� �˻�</span></a>\
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
    layerAction : function(){ // ���̾��ݱ�
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
      // ��ǰ��ȣ
      postData : null,
      userData : false,
      snsCount : 0, // sns �����ϱ� ����
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
      isOnlyNotExpectedPoint: false, // KMF-664: Ư����ǰ �������� ���� ������
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
    update : function(){ // type�� ���� ���� �� üũ
      var $self = this;
      var nowTime = new Date().getTime();
      var dataSave;
      kurlyApi({
        method:'get',
        url:'/v3/home/products/' + $self.goodsNo + '?&ver=' + nowTime
      }).then(function(response) {
        if(typeof response === 'undefined' || response.status != 200) return;
        dataSave = response.data.data;

        // ���� ��� ����
        this.getCouponData(dataSave.no);

        $self.$set(dataSave, "guidesLen", dataSave.guides.length); // ��ǰ�ȳ�����
        $self.$set(dataSave, "extendedCheck", false); // ��ǰ�� �߰� ���� �ȳ�����

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
        if(!dataSave.is_detail_sold_out && dataSave.is_package_sold_out){ // ��Ű����ǰ ǰ���ΰ�� ��ǰ ǰ��ó��
          dataSave.is_detail_sold_out = dataSave.is_package_sold_out;
        }
        if(!dataSave.is_purchase_status){ // ��ǰ���°��� ���� �ֵ�ƿ�ó��
          dataSave.is_detail_sold_out = true;
        }

        // KM-3159 cs : ������ ���� - ��Ű����ǰ�ϰ�����������ܻ�ǰüũ
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

        // KMF-664: Ư����ǰ �������� ���� ������
        var NOT_EXPECTED_POINT = [
          '83774', '83773', '83772', '83771', '83770', '83769', '83767', '83766', '83765', '83764', '83380', '83379', '83295', '81946', '81945', '81944', '81943', '81942', '81941', '83775', '83768', '82031', '82030'
        ]
        if(NOT_EXPECTED_POINT.indexOf(dataSave.no)  > -1 ) {
          $self.isOnlyNotExpectedPoint = true;
        }

        // ��ǰ�� ���� ����
        $self.postData = dataSave;

        var reviewCountNum = dataSave.review_count;
        if(reviewCountNum > 0){ // ��ǰ�ı� ī��Ʈ(app�� ������);
          if(reviewCountNum > 9999 && this.type !== 'pc'){
            reviewCountNum = '9999+';
          }
          $self.reviewCount(reviewCountNum);
        }

        // ��ǰ ���� �� �ı� �� ��Ȱ��ȭ ó��
        if (!dataSave.is_product_review_writable) {
          $('.goods-view-review-tab, #reviewCountShow').hide();
        }
        if (!dataSave.is_product_inquiry_writable) {
          $('.qna-show, #qnaShow').hide();
        }

        // ��ٱ��Ϸ��̾������
        $self.cartputSendData(dataSave);

        window.scrollTo(0, 0);
        if($self.type === 'pc'){
          $('#content').css({'opacity':1});
        }
        $('.bg_loading').removeClass('loading').hide();

        /**
         * KM-2069 PC ������ �ֱ� �� ��ǰ
         * (goodsNo, img url)
         */
        if($self.type === 'pc'){
          setGoodsRecent.setInfo($self.goodsNo, $self.postData.mobile_detail_image_url);
        }

        if(!this.appCheck){
          // KM-1483 Amplitude
          KurlyTracker.setScreenName('product_detail_description')
          .setAction('view_product_detail', dataSave).sendData();

          branchViewAction(); // KM-1238 branch ��� �߰�
          fusionSignalCheck(); // KM-1048 fusionSignal

          fbpTracker.setAction('ViewContent', dataSave.no); // KM-2251 Facebook Pixel Code

          // KMF-466 Facebook Conversion API ����
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
    userInfoGet : function(checkData){ // type�� ���� ���� �� üũ, no ��ǰ��ȣ
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
          $self.notification();// ����� �ø��������������� ��������
          // cartPut.userData = user;
          // cartPut.updatePrice();
        }.bind(this)).catch(function(e){
          console.log(e);
        });
      }
      $self.goodsNo = checkData.no;
      $self.update();
    },
    shareSNSview : function(){ // sns �����ϱ�
      var $self = this, snsView = new shareSNS(), snsName;
      if($self.snsCount === 0 || $self.appCheck){
        snsView.getShare($self.postData.no, $self.type);
      }else{
        snsView.layerOpen();
      }
      $self.snsCount++;
    },
    notification : function(){ // ����� �ø��������������� ��������
      var $self = this, textBenfit;
      var date = new Date().getTime(); // �ڷΰ���� ĳ�����ſ�
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

          const expiration = coupon.effectivePeriod.infinite ? '�Ⱓ���� ����' : getExpiration(coupon.effectivePeriod.endDateTime);

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
        alert('���� ������ ������ �� �����ϴ�.', err);
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
            message: '������ �ٿ�ε� �Ǿ����ϴ�.'
          };
        }
      })
      .catch(function(err) {
        if (err.response.status === 401) {
          return {
            type: 'unAuthorized',
            message: '�α����� �ʿ��մϴ�.'
          };
        } else if (err.response.status === 409 || err.response.status === 400) {
          return {
            type: 'duplicated',
            message: err.response.data.message,
          };
        } else {
          return {
            type: 'failed',
            message: '������ ���������� �ٿ�ε���� �ʾҽ��ϴ�. �ٽ� �õ����ּ���.',
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

// ������� ���� ���
const BENEFIT_TYPE = {
  PRICE_DISCOUNT: 'PRICE_DISCOUNT',
  PERCENT_DISCOUNT: 'PERCENT_DISCOUNT',
  FREE_SHIPPING: 'FREE_SHIPPING',
};

const BENEFIT_UNIT = {
  PRICE_DISCOUNT: '��',
  PERCENT_DISCOUNT: '%',
};

// ������� ���� �Լ�; ���� ����
function getBenefitText(coupon) {
  if (coupon.benefitType === BENEFIT_TYPE.FREE_SHIPPING) {
    return '������';
  }

  return coupon.benefitValue + BENEFIT_UNIT[coupon.benefitType];
}

// ������� ���� �Լ�; ���� ���� ���� �ؽ�Ʈ
function getBenefitAmountText(coupon) {
  if (coupon.minimumOrderAmount === 1 && !coupon.minimumOrderPrice) {
    return null;
  }

  let benefitAmountText = '';

  if (coupon.minimumOrderPrice) {
    benefitAmountText += coupon.minimumOrderPrice + '�� '
  }
  if (coupon.minimumOrderAmount !== 1) {
    benefitAmountText += coupon.minimumOrderAmount + '�� '
  }

  benefitAmountText += '�̻� �ֹ� �� '

  if (
    (coupon.benefitType === BENEFIT_TYPE.PERCENT_DISCOUNT) &&
    coupon.couponMeta.maximumDiscountPrice
  ) {
    benefitAmountText += '�ִ� ' + coupon.couponMeta.maximumDiscountPrice + '�� ����';
  }

  return benefitAmountText;
}

// ������� ���� �Լ�; ���� ��� ���� �ؽ�Ʈ
// �ؽ�Ʈ �Է� ����: īī������ > Ư����ǰ ���� > ���λ�ǰ ���� > �Ϻλ�ǰ ����
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
    subConditionText += 'īī������ ������';
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
    subConditionText += (subConditionText === '' ? '' : ', ') + 'Ư����ǰ ����'
  }

  if (coupon.disallowDiscountedProducts) {
    subConditionText += (subConditionText === '' ? '' : ', ') + '���λ�ǰ ����';
  }

  const disallowedProducts = coupon.couponMeta.target.disallowedProducts;
  const disallowedCategories = coupon.couponMeta.target.disallowedCategories;
  const isExceptSpecific = (
    disallowedProducts && disallowedProducts.length ||
    disallowedCategories && disallowedCategories.length
  );

  if (isExceptSpecific) {
    subConditionText += (subConditionText === '' ? '' : ', ') + '�Ϻ� ��ǰ ����';
  }

  return subConditionText === '' ? null : subConditionText;
}

// ������� ���� �Լ�; ���� ����Ⱓ
function getExpiration(endDateTime) {
  const endPeriod = endDateTime.split(' ');
  const date = endPeriod[0].split('-');
  const time = endPeriod[1].split(':');

  let hour = time[0];

  if (endPeriod[1] === '23:59:59') {
    hour = '24';
  }

  return date[0] + '�� ' + date[1] + '�� ' + date[2] + '�� ' + hour + '�ñ���';
}

/**
 * KM-1048 fusionSignal
 * ���ΰ�ħ�� �Ǵ��ϱ� ���� sessionStorage.fusionSignalView
 * common_js\goodslist_v1.js ���� sessionStorage.fusionSignalView �� ����
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


// KM-1238 branch ��� �߰�
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
 * KM-2069 PC ������ �ֱ� �� ��ǰ
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
   * �����׸��� 1ȸ �� �߻���.
   * �ִ� ������ 50��. �̻� �߻��� ����
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
    // �� ������Ʈ���� ȣ���� �Լ���
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
            {{ isCouponAlreadyDownloaded ? \'�̹� �ٿ�ε�� �����Դϴ�.\' : \'������ �ٿ�ε� �Ǿ����ϴ�.\'}}\
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
            Ȯ��\
          </button>\
        </div>\
      </div>\
    </div>\
  ',
});