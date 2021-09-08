/**
 * cartType = view,view2, layer
 * view => ��ǰ�� �ϴ� ��ٱ���
 * layer => ��ǰ ��� ��ٱ���
 * view2 => pc�� ��ǰ �� ��� ��ٱ���
 */
Vue.component('cart-put',{
  props:['memberBenefitsPoint','user', 'cartType', 'productsType', 'data', 'items', 'type', 'totalPrice', 'totalPoint', 'count', 'layerShow'],
  template:'\
            <div class="cart_option cartList" :class="{cart_type1 : cartType === \'view\', cart_type2 : cartType === \'view2\', cart_type3 : cartType === \'layer\', off : !layerShow}">\
            <div class="inner_option">\
                <button type="button" class="btn_close1" :class="{on : data.is_detail_sold_out}" @click="$emit(\'layer-close\')" v-if="cartType === \'layer\'">���̾�ݱ�</button>\
                <strong class="tit_cart" v-if="data.is_package">{{ data.name }}</strong>\
                <div class="in_option" :class="{option_pass : data.is_kurly_pass_product}">\
                    <!-- �ɼ�,��Ű����ǰ -->\
                    <div class="list_goods">\
                        <div class="bar_open" v-if="(layer && cartType !== \'layer\') || (type === \'pc\' && cartType === \'view\')"><button type="button" class="btn_close" @click="layerAction()"><span class="ico" :class="{open : layer}">��ǰ ����</span></button></div>\
                        <div class="box_select" v-if="type === \'mobile\' && (layer && cartType !== \'layer\' && data.is_package)">\
                            <select class="select_item" @change="$emit(\'select-box-show\', \'show\', $event.target.value);selectDefault();">\
                                <option :selected="selectDefault">��ǰ ����</option>\
                                <option v-for="(item, idx) in items" :value="idx" :disabled="item.is_detail_sold_out || !item.is_purchase_status">\
                                  <span v-if="!item.is_purchase_status">(���źҰ�)</span>\
                                  <span v-else-if="item.is_detail_sold_out">(ǰ��)</span>\
                                  {{ item.name }}\
                                </option>\
                            </select>\
                            <span class="select_arrow"></span>\
                        </div>\
                        <div class="box_select" :class="{off : cartType === \'view\' && !layer}" v-if="type === \'pc\' && cartType !== \'layer\' && data.is_package ">\
                            <strong class="name">��ǰ ����</strong>\
                            <div class="inner_select">\
                                <a href="#none" class="txt_select" :class="{open : selectBoxType}" @click="selectBoxOpen()">��ǰ ����</a>\
                                <ul class="select_item" v-if="selectBoxType">\
                                    <li v-for="(item, idx) in items" :class="{fst : idx === 0}">\
                                        <a href="#none" :class="{sold_out : item.is_detail_sold_out || !item.is_purchase_status}" @click="$emit(\'select-box-show\', \'show\', idx, item.is_detail_sold_out, item.is_purchase_status);selectBoxOpen();">\
                                            <sapn class="item_name">\
                                              <span v-if="!item.is_purchase_status">(���źҰ�)</span>\
                                              <span v-else-if="item.is_detail_sold_out">(ǰ��)</span>\
                                              {{ item.name }}\
                                              <span class="txt_expected" v-if="!item.is_expected_point && user">�������ܻ�ǰ</span>\
                                            </sapn>\
                                            <span class="price">\
                                                <span :class="{original_price : user && (item.original_price !== item.discounted_price), dc_price : !user || (item.original_price === item.discounted_price)}">{{ item.original_price | commaFilter }}��</span>\
                                                <span class="dc_price" v-if="user && (item.original_price !== item.discounted_price)">{{ item.discounted_price | commaFilter }}��</span>\
                                            </span>\
                                        </a>\
                                    </li>\
                                </ul>\
                            </div>\
                        </div>\
                        <ul class="list" :class="{list_nopackage : !data.is_package}" v-if="layer || cartType === \'layer\' || cartType === \'view2\'">\
                            <li v-for="(item, idx) in items" :class="{on : item.checked, off : !item.checked, sold_out : item.is_detail_sold_out || !item.is_purchase_status}">\
                                <span class="btn_position" :class="{on : data.is_package && cartType !== \'layer\'}">\
                                    <button type="button" class="btn_del" @click="$emit(\'select-box-show\', \'hide\', idx)"><span class="txt">�����ϱ�</span></button>\
                                </span>\
                                <span class="name">\
                                  <span v-if="!item.is_purchase_status">(���źҰ�)</span>\
                                  <span v-else-if="item.is_detail_sold_out">(ǰ��)</span>\
                                  {{ item.name }}\
                                  <span class="txt_expected" v-if="!item.is_expected_point && user">�������ܻ�ǰ</span>\
                                </span>\
                                <span class="tit_item" v-if="cartType === \'view2\' && !data.is_package">���ż���</span>\
                                <div class="option">\
                                    <!-- <button type="button" class="restock off"><span class="ico"></span>���԰� �˸�</button> -->\
                                    <span class="count" v-if="!item.is_detail_sold_out && item.is_purchase_status">\
                                        <button type="button" class="btn down on" @click="$emit(\'update-ea\', \'m\', item)">����������</button>\
                                        <input type="number" class="inp" :value="item.ea" readonly="readonly" onfocus="this.blur()">\
                                        <button type="button" class="btn up on" @click="$emit(\'update-ea\', \'p\', item)">�����ø���</button>\
                                    </span>\
                                    <span class="price">\
                                        <span class="dc_price" v-if="user && (item.original_price !== item.discounted_price)">{{ item.discounted_price | commaFilter }}��</span>\
                                        <span :class="{original_price : user && (item.original_price !== item.discounted_price), dc_price : !user || (item.original_price === item.discounted_price)}">{{ item.original_price | commaFilter }}��</span>\
                                    </span>\
                                </div>\
                            </li>\
                        </ul>\
                    </div>\
                    <!-- �հ� -->\
                    <div class="total" :class="{no_border : data.is_detail_sold_out}" v-if="(layer && count > 0 ) || cartType === \'layer\' || cartType === \'view2\'">\
                        <div class="price">\
                            <strong class="tit" v-if="type === \'mobile\' || cartType === \'layer\'">�հ�</strong>\
                            <strong class="tit" v-if="type === \'pc\' && cartType !== \'layer\'">�� ��ǰ�ݾ� :</strong>\
                            <span class="sum">\
                                <span class="num">{{ totalPrice | commaFilter }}</span>\
                                <span class="won">��</span>\
                            </span>\
                        </div>\
                        <p class="txt_point" v-if="!data.is_kurly_pass_product">\
                            <span class="ico">����</span>\
                            <span class="no_login" v-if="!user">\
                                <span v-if="data.dcResult">�α��� ��, ȸ�����ΰ��� �������� ����</span>\
                                <span v-if="!data.dcResult">�α��� ��, �������� ����</span>\
                            </span>\
                            <span class="point" v-if="user&&memberBenefitsPoint">\
                                ���� �� <strong class="emph">{{ totalPoint | commaFilter }}�� ����</strong>\
                            </span>\
                        </p>\
                    </div>\
                </div>\
                <div class="group_btn" :class="{off : !layer, layer_btn2 : cartType === \'layer\' && !data.is_detail_sold_out, layer_btn1 : cartType === \'layer\' && data.is_detail_sold_out}">\
                    <div class="view_function" v-if="cartType !== \'layer\'">\
                        <button type="button" class="btn btn_alarm on" @click="notifyAction()" v-if="data.use_stocked_notify">���԰� �˸�</button>\
                        <button type="button" class="btn btn_alarm" v-else="!data.use_stocked_notify">���԰� �˸�</button>\
                    </div>\
                    <span class="btn_type1" v-if="cartType !== \'layer\' && !data.is_detail_sold_out">\
                      <button v-if="!data.is_buy_now" type="button" class="txt_type" @click="layerAction(\'cart\', count)">��ٱ��� ���</button>\
                      <button v-if="data.is_buy_now" type="button" class="txt_type" @click="layerAction(\'buy\', count)">�ٷα���</button>\
                    </span>\
                    <span class="btn_type2" v-if="cartType === \'layer\' && !data.is_detail_sold_out"><button type="button" class="txt_type" @click="$emit(\'layer-close\')">���</button></span>\
                    <span class="btn_type1" v-if="cartType === \'layer\' && !data.is_detail_sold_out">\
                      <button v-if="!data.is_buy_now" type="button" class="txt_type" @click="layerAction(\'cart\', 1)">��ٱ��� ���</button>\
                      <button v-if="data.is_buy_now" type="button" class="txt_type" @click="layerAction(\'buy\', 1)">�ٷα���</button>\
                    </span>\
                    <span class="btn_type1 btn_disabled only_one" v-if="data.is_detail_sold_out"><button type="button" class="txt_type">��ǰ �غ� ���Դϴ�</button></span>\
                </div>\
            </div>\
            </div>\
            '
  , data : function(){
    return {
      layer : false,
      alarmCheck : false,
      selectCheck : false,
      selectBoxType : false,
    }
  }
  , methods:{
    layerAction : function(type, count){ // ���̾��ݱ�
      if(this.data.buyable_kind === 2 && !this.user){
        // this.data.buyable_kind =>  0: ���� �Ұ� , 1: ���Ű��� 2: ȸ������ 3: Ư��ȸ�� �׷� �Ҽ�
        // 0 => goodsBuyable === false
        this.$emit('login-check-action', 'ȸ�� ���� ���� ��ǰ�Դϴ�. �α��� ȭ������ �̵��մϴ�.');
        return;
      }
      if(this.layer || this.cartType === 'layer' || this.cartType === 'view2'){
        if(type === 'cart'){
          if(count === 0){
            this.layer = false;
            return;
          }
          this.$emit('cart-put-action');
        }else if(type === 'buy'){
          // kurly-jhlim - sessionStorage�� ����� ���� ���
          var isDisable = sessionStorage.getItem('deliveryType') === 'disable';
          if (isDisable) {
            alert('��ۺҰ� �����Դϴ�.');
          } else {
            if(count === 0){
              this.layer = false;
              return;
            }
            this.$emit('buy-now', this.type);
          }
        }else{
          this.layer = false;
        }
      }else{
        this.layer = true;
      }

      if(this.cartType === 'view' && this.type === 'pc'){
        this.$emit('top-btn-action', this.layer);
      }

      // KM-1483 Amplitude
      if(this.cartType === 'view' && this.layer && !this.data.is_buy_now){
        var _action_data = this.data;
        _action_data.referrer_event = 'select_product';
        KurlyTracker.setAction('select_purchase', _action_data).sendData();
        KurlyTracker.setScreenName('product_selection').setAction('view_product_selection', _action_data).sendData();
      }
      // END : KM-1483 Amplitude
    }
    ,selectBoxOpen : function(){
      this.selectBoxType = this.selectBoxType ? false : true;
    }
    ,notifyAction:function(type, no){ // ���԰� �˸�
      if(!this.user){
        this.$emit('login-check-action');
        return;
      }
      this.$emit('notify-option-layer');
    }
    ,selectDefault : function(){ // ����Ʈ�ڽ��϶� �׻� ���������� ����ǵ��� ���
      this.selectCheck = true;
    }
  }
});


// �ּ����� ���°��
Vue.component('cart-put-address', {
  props:['type', 'data'],
  template:'\
    <div class="cart_option cart_result cart_type3" :class="{on : data.setAddress}">\
      <div class="inner_option">\
        <button type="button" class="btn_close1" @click="$emit(\'layer-close\', \'success\')" v-if="type === \'pc\'">{{type}}���̾�ݱ�</button>\
        <p class="success">��ǰ ���Ÿ� ���� <span class="bar"></span>������� �������ּ���</p>\
        <div class="group_btn layer_btn2">\
          <span class="btn_type2"><button type="button" class="txt_type" @click="$emit(\'layer-close\', \'success\')">���</button></span>\
          <span class="btn_type1"><button type="button" class="txt_type" @click="linkAction(type)"><span class="ico_search"></span>�ּ� �˻�</button></span>\
        </div>\
      </div>\
    </div>\
    '
  , methods:{
    linkAction : function(type){
      this.$emit('layer-close', 'success'); // KQA-819 iOS���� �ڷΰ��� ������ ���̴� �̽��� �־ ���� ����

      // KM-4172 : amplitude 11��
      KurlyTracker.setAction('select_direct_purchase_shipping_address').sendData();

      if(type === 'mobile'){
        location.href = '/m2/myp/destination/chkAddress.php?guest=1';
      }else{
        window.destinationPopOpen.set('search', {
          device: 'popup',
          from: 'pc',
        });
      }
    }
  }
});


// ���԰� �˸� ��û
// use_stocked_notify
Vue.component('stocked-notify', {
  props:['type', 'data', 'items'],
  template:'\
    <div class="cart_option cart_type3 notify_option" :class="{on : data.setNotify}" v-if="items.length > 0">\
      <div class="inner_option">\
        <!-- <button type="button" class="btn_close1" @click="$emit(\'layer-close\', \'success\')" v-if="type === \'pc\'">���̾�ݱ�</button> -->\
        <strong class="tit">���԰� �˸� ��û</strong>\
        <p class="name_deal" :class="{package : data.is_package}">{{ data.name }}</p>\
        <!-- ��Ű���� �ִ°�� �Ʒ� ����Ʈ ���� -->\
        <div v-if="type !== \'pc\' && data.is_package">\
          <select class="select_item" @change="selectEvent(\'select\', $event.target.value);">\
            <option v-for="(item, idx) in items" :value="idx">{{item.name}}</option>\
          </select>\
          <span class="select_arrow"></span>\
        </div>\
        <div class="box_select" v-if="type === \'pc\' && data.is_package ">\
            <strong class="name">��ǰ ����</strong>\
            <div class="inner_select">\
                <a href="#none" class="txt_select" :class="{open : selectBoxType}" @click="selectBoxOpen()">{{ selectName !== null ? selectName : items[0].name }}</a>\
                <ul class="select_item" v-if="selectBoxType">\
                    <li v-for="(item, idx) in items" :class="{fst : idx === 0}">\
                        <a href="#none" @click="selectEvent(\'layer\', idx);selectBoxOpen();">\
                            <sapn class="item_name">{{ item.name }}</sapn>\
                        </a>\
                    </li>\
                </ul>\
            </div>\
        </div>\
        <p class="notice"><span class="ico">&#183;</span>��ǰ�� �԰��Ǹ� �� Ǫ�� �Ǵ� �˸������� �˷� �帳�ϴ�.</p>\
        <div class="group_btn layer_btn2">\
          <span class="btn_type2"><button type="button" class="txt_type" @click="defaultSet();$emit(\'notify-option-layer\', \'close\')">���</button></span>\
          <span class="btn_type1"><button type="button" class="txt_type" @click="linkAction(type)">��û�ϱ�</button></span>\
        </div>\
      </div>\
    </div>\
    '
  , data : function(){
    return {
      selectName: null,
      selectBoxType: false,
      selectNo: 0,
    }
  }
  , methods:{
    defaultSet: function(){
      this.selectName = null;
      this.selectBoxType = false;
    },
    linkAction : function(type){
      // this.$emit('notify-option-layer'); // KQA-819 iOS���� �ڷΰ��� ������ ���̴� �̽��� �־ ���� ����
      var actionData = {
        isPackage: this.data.is_package,
        countTotalItem: this.items.length,
        item: this.items[0]
      }
      if(actionData.isPackage){ // ��Ű�� ��ǰ�� ���� ������ ��ǰ�� ��û����
        actionData.item = this.items[this.selectNo];
      }
      this.$emit('notify-option-action', actionData);
    }
    ,selectBoxOpen : function(){
      this.selectBoxType = this.selectBoxType ? false : true;
    }
    ,selectEvent: function(type, no){
      // ��Ű���� ���° ������ ����
      // ���� ���� �������� �ʾҴٸ� 0��
      this.selectNo = no;
      if(type === 'layer'){
        this.selectName = this.items[no].name;
      }
    }
  }
});


// mobile����
Vue.component('cart-put-success', {
  props:['type', 'data'],
  template:'\
        <div class="cart_option cart_result cart_type3" :class="{on : data.success}">\
            <div class="inner_option">\
                <p class="success">\
                    <span v-if="!data.isReaddedItem">\
                      ������ ��ǰ��\
                      <br>��ٱ��Ͽ� �����ϴ�.\
                    </span>\
                    <span v-if="data.isReaddedItem">\
                      ��ٱ��� ��ǰ��\
                      <br>������ ����Ǿ����ϴ�.\
                    </span>\
                </p>\
                <div class="group_btn layer_btn2">\
                    <span class="btn_type2"><button type="button" class="txt_type" @click="linkAction(type)">��ٱ��� Ȯ��</button></span>\
                    <span class="btn_type1"><button type="button" class="txt_type" @click="$emit(\'layer-close\', \'success\')">��� �����ϱ�</button></span>\
                </div>\
            </div>\
        </div>\
    '
  , methods:{
    linkAction : function(type){
      this.$emit('layer-close', 'success'); // KQA-819 iOS���� �ڷΰ��� ������ ���̴� �̽��� �־ ���� ����
      location.href = '/m2/goods/cart.php';
    }
  }
});








var cartPut = new Vue({
  el: '#cartPut',
  data: function () {
    return {
      viewData : false, // ��ǰ�󼼿��� �ش� ��� ���� api ȣ�� �ȵǵ��� ó��
      userData : false, // ȸ������
      goodsNo : null, // ��ǰ��ȣ
      cartType : 'layer', // layer, view, view2 ��ٱ��� Ÿ��
      productsType : 0, // ����, ��Ű�� ��ǰ ����
      postData : {}, // ����, ��Ű��������� ��ǰ��
      totalPrice : 0,
      totalPoint : 0, // ���������� ������
      products : [], // ��ǰ���
      count : 0, // ��ǰ�� ��ٱ��� ��� �׼� , ���̾� ��ٱ��� ��� �׼� ���а�
      layerShow : false,
      checkResult : false, // ����Ʈ�ڽ����϶� �� ��ǰ ���� �����ó�� �ϱ����� ���
      fusionSignalCheckId : null,// fusionSignal ���̵� �ߺ������� �ش� ���̵�üũ�ϱ����� �߰�
      type : 'pc', // device üũ
      errors : [],
      memberBenefitsPoint: null,
      isCartEvent: false,
      unitCount: 1,
      deliveryType: '',
      notifyData: [], // ���԰� �˶� ��ư Ŭ���� �ش� Ű�� ���԰� ��ǰ�� �߰��Ͽ� �����ִ� ��
      isNotifyLayerCheck: false, // true ��ǰ��Ͽ��� ���԰� �˸� Ŭ���� ��� ���԰� �˸� ���̾� ����
      isNotifyOptionAction: false // notifyOptionAction �̺�Ʈ ������ ���� �ȵǵ��� ����
    }
  },
  created :function() {
    kurlyApi({
      method:'get',
      url: '/v3/members/member-benefits/point'
    }).then(function(response){
      if(typeof response === 'undefined' || response.status != 200) return;
      var data = response.data.data;
      this.memberBenefitsPoint = data
    }.bind(this)).catch(function(error){
      console.error(error)
    }.bind(this))
  },
  mounted : function() {
    var isDetailPage = window.location.href.indexOf('/goods/view') > -1;

    if (!isDetailPage) return false;

    var hasLogin = webStatus.isSession;
    var device = webStatus.device;
    var isNotPc = device !== 'pc';
    var hasNoDeliveryType = sessionStorage.getItem('isDeliveryCartPut') === null || sessionStorage.getItem('isDeliveryCartPut') === 'false' || sessionStorage.getItem('deliveryType') === null || sessionStorage.getItem('deliveryType') === '';

    if (isNotPc && hasNoDeliveryType) {
      var GUEST_URL = '/v3/auth/guest';
      var CART_URL = '/cart/v1/cart';
      var ADDR_URL = '/addressbook/v1/cart/check-base-address-notification';

      function ApiInterface (method, url) {
        this.method = method;
        this.url = url;
      }

      ApiInterface.prototype.dispatch = function () {
        return kurlyApi({
          method: this.method,
          url: this.url,
        })
          .then(function (res) {
            return res;
          })
          .catch(function (err) {
            return err;
          });
      };

      function postToken (url) {
        var instance = new ApiInterface('post', url);
        return instance.dispatch();
      }

      function getAddress (url) {
        var instance = new ApiInterface('get', url);
        return instance.dispatch();
      }

      if (!hasLogin) {
        postToken(GUEST_URL)
          .then(function() {
            getAddress(CART_URL)
              .then(function(res) {
                var addressInfo = res.data.data;
                var address = addressInfo.address;
                var deliveryType = addressInfo.delivery_type;
                if (address !== '') {
                  this.deliveryType = deliveryType;
                  sessionStorage.setItem('deliveryType', this.deliveryType);
                  sessionStorage.setItem('isDeliveryCartPut', 'true');
                }
              })
              .catch(function(err) {
                console.log(err.message);
              });
          })
          .catch(function(err) {
            console.log(err.message);
          });
      } else {
        getAddress(ADDR_URL)
          .then(function(res) {
            var addressInfo = res.data.data;
            var address = addressInfo.address;
            var deliveryType = addressInfo.delivery_type;
            if (address !== '') {
              this.deliveryType = deliveryType;
              sessionStorage.setItem('deliveryType', this.deliveryType);
              sessionStorage.setItem('isDeliveryCartPut', 'true');
            }
          })
          .catch(function(err) {
            console.log(err.message);
          });
      }
    }
  },
  methods: {
    update : function(){
      var $self = this;

      if($self.cartType === 'layer'){
        $self.checkResult = true;
        $self.count = 1;
      }

      if($self.type === 'pc'){
        $self.count = 1;
      }

      if($self.viewData){
        $self.dataSet( $self.viewData );
        return;
      }

      kurlyApi({
        method:'get',
        url:'/v3/home/products/' + $self.goodsNo
      }).then(function(response){
        if(typeof response === 'undefined' || response.status != 200) return;
        $self.dataSet(response.data.data);
      }.bind(this)).catch(function(error){
        alert(error.response.data.message);
        $self.layerClose('success');
      });
    }, dataSet : function(response){
      var $self = this;
      var noPackage, dataSave, i, len, dcResult = false;
      var countPackageSoldout = 0, countPackageStockedNotify = 0;
      dataSave = response;

      if(dataSave.original_price != dataSave.discounted_price){
        dcResult = true; // ���������ľ�
      }
      $self.$set(dataSave, "dcResult", dcResult);
      if(!dataSave.is_detail_sold_out && dataSave.is_package_sold_out){ // ��Ű����ǰ ǰ���ΰ�� ��ǰ ǰ��ó��
        dataSave.is_detail_sold_out = dataSave.is_package_sold_out;
      }
      if(dataSave.sales_status === 'before' || dataSave.sales_status === 'end'){ // ��ǰ���°��� ���� �ֵ�ƿ�ó��
        dataSave.is_detail_sold_out = true;
      }
      // if(dataSave.delivery_time_types.indexOf(2) > -1){ // Ư�� ��ǰ �ٷ� ���� �����
      //   dataSave.is_buy_now = true;
      // }
      // dataSave.use_discount_percent : ���η��� �ƴ� ���ΰ� �϶� �Ѿ���°�(false)
      // $self.$set(dataSave, "delitime_type", dataSave.delivery_time_types); // ��ٱ��� �������̾� ��ﶧ���
      $self.$set(dataSave, "setAddress", false); //  ����� ���� ��ﶧ���
      $self.$set(dataSave, "success", false); // ��ٱ��� �������̾� ��ﶧ���
      $self.$set(dataSave, "setNotify", false); //  ����� ���� ��ﶧ���
      $self.$set(dataSave, "wishCheck", false); // �û�°ʹ�� üũ��
      $self.postData = dataSave;
      $self.productsType = dataSave.package_type;
      $self.products = [];
      $self.unitCount = dataSave.sales_unit
      $self.notifyData = [];

      if($self.productsType === 0){ // ��ǰ
        noPackage = {
          is_expected_point: dataSave.is_expected_point,
          expected_point: dataSave.expected_point,
          expected_point_ratio: dataSave.expected_point_ratio,
          discount_percent:dataSave.discount_percent,
          discounted_price: dataSave.discounted_price,
          is_buy_now: dataSave.is_buy_now,
          is_detail_sold_out: dataSave.is_detail_sold_out,
          max_ea: dataSave.max_ea,
          min_ea: dataSave.min_ea,
          name: dataSave.name,
          no: dataSave.no,
          original_price: dataSave.original_price,
          sold_out_text: dataSave.sold_out_text,
          under_specific_quantity: dataSave.under_specific_quantity,
          ea: dataSave.is_package ? 0 : dataSave.min_ea > 1 ? dataSave.min_ea : 1,
          checked: true,
          is_purchase_status: dataSave.is_purchase_status
        }
        $self.count = 1;
        $self.postData.is_detail_sold_out = dataSave.is_detail_sold_out;

        // ���źҰ� ��ǰ �߰� : is_sold_out �� �ƴ����� �Ǹ� �Ұ� ��ǰ�ΰ�� ī��Ʈ �߰� �ϱ�
        if(!dataSave.is_purchase_status){
          $self.postData.is_detail_sold_out = true;
          noPackage.is_detail_sold_out = $self.postData.is_detail_sold_out
        }

        $self.products.push(noPackage);
        if( dataSave.use_stocked_notify ){
          countPackageStockedNotify++;

          // ���԰� �˸� ��ǰ ���
          $self.notifyData.push(noPackage);
        }
      }else{ // ��Ű�� or �ɼ�
        len = dataSave.package_products.length;
        for(i = 0; i < len; i++){
          $self.$set(dataSave.package_products[i], "checked", $self.checkResult);
          $self.$set(dataSave.package_products[i], "ea", 0);
          $self.$set(dataSave.package_products[i], "is_detail_sold_out", dataSave.package_products[i].is_sold_out);
          $self.products.push(dataSave.package_products[i]);

          // ���źҰ� ��ǰ �߰� : is_sold_out �� �ƴ����� �Ǹ� �Ұ� ��ǰ�ΰ�� ī��Ʈ �߰� �ϱ�
          if(dataSave.package_products[i].is_sold_out || (!dataSave.package_products[i].is_sold_out && !dataSave.package_products[i].is_purchase_status) ){
            countPackageSoldout++
          }
          if(dataSave.package_products[i].use_stocked_notify){
            countPackageStockedNotify++;

            // ���԰� �˸� ��ǰ ���
            if(dataSave.package_products[i].is_sold_out){
              $self.notifyData.push(dataSave.package_products[i]);
            }
          }
        }
        if(len <= countPackageSoldout){
          $self.postData.is_detail_sold_out = true;
        }
        if(countPackageStockedNotify > 0){
          $self.postData.use_stocked_notify = true;
        }
      }

      if(countPackageStockedNotify > 0 && (countPackageSoldout > 0 || $self.postData.is_detail_sold_out) && $self.notifyData.length > 0){
        $self.postData.use_stocked_notify = true;
      }else{
        $self.postData.use_stocked_notify = false;
      }

      if($self.isNotifyLayerCheck){ // ���԰� �˸� ���̾� ����
        $self.notifyOptionLayer();
        $self.isNotifyLayerCheck = false; // �ѹ� ����� �� ����
      }else{ // ��ٱ��� ��� ���̾� ����
        $self.layerShow = true;
        $self.updatePrice();
        // ���̾� Ÿ�Զ� �ؽ�Ʈ �ִ�ġ�� ��� ȭ�� �ȱ����� script ó��
        if($self.cartType === 'layer'){
          $self.layerCartPutHeight();
        }
      }
    }, selectBoxShow : function(type, idx, status, purchaseStatus){
      var $self = this, i;
      if($self.productsType === 0 || idx === '' || status || (typeof purchaseStatus !== 'undefined' && !purchaseStatus) ) return false;
      if(type === 'show'){
        // �ɼǺ� �����Ǵ� ��ǰ��  (delivery_time_types �� 2 �� �ִ°��) ������ ������� 1���� ���Ű���ó��
        if($self.postData.delivery_time_types.indexOf(2) > -1){
          var itemLen = $self.products.length;
          for(i = 0; i < itemLen; i++){
            if(i !== idx){
              $self.products[i].checked = false;
              if($self.products[i].ea > 0){
                $self.count--;
              }
              $self.products[i].ea = 0;
            }
          }
        }
        if($self.products[idx].checked){
          alert('�̹� �߰��� �ɼ��Դϴ�');
          return;
        }
        $self.products[idx].checked = true;
        // ��Ű�� ��ǰ �⺻ �� ���� : https://kurly0521.atlassian.net/wiki/spaces/MKA/pages/2724823795/PC+Mobile+web
        $self.products[idx].ea = $self.postData.is_package ? $self.calculatePackageMinValue(idx) : $self.products[idx].min_ea;
        if ($self.products[idx].is_detail_sold_out) {
          $self.products[idx].ea = 0;
        }
        $self.count++;
      }else{
        $self.products[idx].checked = false;
        $self.products[idx].ea = 0;
        $self.count--;
      }
      $self.updatePrice();
    },
    calculatePackageMinValue: function (idx) {
      var productParent = this.postData;
      var product = this.products[idx];

      //�θ��� �ּ� ���ż����� 0, �ɼ��� �ּ� ���ż����� 2 �̻��� �� ����
      //https://kurly0521.atlassian.net/browse/KQA-5049
      if (productParent.min_ea < 2 && product.min_ea < 2) {
        return 1;
      }

      //�ּ� ���� ���� 2 �̻��� �� �ɼ��� �ּ� ���� ������ �ִ´�. �ɼ��� �ּұ��ż����� ���� ��� 0���� ����.
      return product.min_ea || 0;
    },
    updateEa: function (type, item) { // update
      if(type === undefined || item === undefined) return;
      var $self = this, i, len = $self.products.length, result;
      if($self.postData.is_detail_sold_out){
        return;
      }
      for(i = 0; i < len; i++){
        var target = $self.products[i];
        if(target.no === item.no){
          result = target.ea;
          if(type === 'm'){
            if (target.sales_unit > 1) {
              result -= target.sales_unit;
            } else {
              result -= $self.unitCount;
            }
          }
          if(type === 'p'){
            if (target.sales_unit > 1) {
              result += target.sales_unit;
            } else {
              result += $self.unitCount;
            }
            if(result < target.min_ea){
              result =  target.min_ea;
            }
          }
          if(result < target.min_ea){
            result = 0;
          }
          if(result > target.max_ea){
            alert('������' + target.max_ea + '�� ���� �����մϴ�.');
            result = target.max_ea;
          }
          target.ea = result;
        }
      }
      $self.updatePrice();
    }, updatePrice : function(){ // ���� ���
      var $self = this, i, len = $self.products.length;
      $self.totalPrice = 0;
      $self.totalPoint = 0;
      for(i = 0; i < len; i++){
        var target = $self.products[i];
        if(!$self.userData){
          $self.totalPrice += target.original_price * target.ea;
        }else{
          $self.totalPrice += target.discounted_price * target.ea;
        }
        if(target.is_expected_point){
          $self.totalPoint += target.expected_point * target.ea;
        }
      }
    }, cartPutAction : function(){ // ��ٱ��� ���
      if(this.isCartEvent){
        return false;
      }
      this.isCartEvent = true;

      var $self = this, target, targetFirstName, urlPut = [], putData, putDataCount = 0,
        i, len = $self.products.length, trackingCode = [];

      for(i = 0; i < len; i++){
        target = $self.products[i];

        /* tracker code */
        target.parent_id = $self.postData.no
        target.parent_name = $self.postData.name;
        target.is_package = $self.postData.is_package;

        if($self.productsType === 0){
          if(target.ea > 0){
            targetFirstName = target.name;
            putDataCount++;
            urlPut.push({'deal_product_no': Number(target.no),
              'content_product_no': Number(target.no),
              'quantity': Number(target.ea)});

            trackingCode.push(target); /* tracker code */
          }
        }else{
          //if(i === 0){
          //urlPut.push({'deal_product_no':Number($self.postData.no),'quantity':1,'products':[]});
          //}
          if(target.ea > 0){
            if(putDataCount === 0){
              targetFirstName = target.name;
            }
            putDataCount++;
            putData = {'deal_product_no':Number(target.product_no),
              'content_product_no': Number(target.parent_id),
              'quantity':Number(target.ea)}
            urlPut.push(putData);

            trackingCode.push(target); /* tracker code */
          }
        }
      }

      if(putDataCount === 0){
        alert('������ �ݵ�� 1 �̻��̾�� �մϴ�.');
        this.eventCheck();
        return;
      }

      kurlyApi({
        method:'post',
        url:'/cart/v1/cart-items/store',
        data: { cart_items: urlPut }
      }).then(function (res){
        var cntAddedItems = res.data.meta.count;

        if ($self.cartType !== 'layer') {
          bodyScroll.bodyFixed();
        } else {
          $self.layerShow = false;
        }
        $self.postData.success = true;
        // �̹� ��ٱ��Ͽ� �����ϴ� ��ǰ���� üŷ
        $self.postData.isReaddedItem = res.data.meta.is_in_cart;

        if($self.type === 'pc'){
          $self.layerClose('success');
          if ($self.postData.isReaddedItem) {
            $('#msgReaddedItem').addClass('add');
          }
        }

        /* cart animation */
        if ($('#addMsgCart').length > 0) {
          var txtAddMsg = targetFirstName;
          $('#addMsgCart .thumb').attr('src', $self.postData.main_image_url);
          if(putDataCount > 1){
            txtAddMsg = txtAddMsg + '�� ' + (putDataCount-1) + '��';
          }
          $('#addMsgCart .tit').html(txtAddMsg);
        }
        cart_count_down(cntAddedItems);

        // ��ٱ��Ͽ� ��ǰ �߰��� ����� ���� ���԰� ǰ��üŷ ����
        sessionStorage.removeItem('cart.soldOutItem');

        $self.eventCheck();

        /**
         * tracker code
         */
        fusionSignalPut('put'); // KM-1048 fusionSignal
        branchAction(trackingCode); // KM-1238 branch ��� �߰�
        // KM-1483 Amplitude ����
        var trackLen = trackingCode.length;
        for(i = 0; i < trackLen; i++){
          KurlyTracker.setAction('add_to_cart_product', trackingCode[i]).sendData();
        }
        KurlyTracker.setAction('add_to_cart_success', trackingCode).sendData();
        // END : KM-1483 Amplitude ����

        // KM-2251 Facebook Pixel Code
        fbpTracker.setAction('AddToCart', trackingCode);

         // KMF-466 Facebook Conversion API ����
         conversionsTracker.setAction('AddToCart', trackingCode);
      }.bind(this)).catch(function(error){
        $self.eventCheck();
        KurlyTracker.setAction('add_to_cart_fail', error.response.data.error.message).sendData();
        if(error.response.status !== 204){
          if($self.type === 'pc'){
            _oldAlert(error.response.data.error.message);
          }else{
            alert(error.response.data.error.message);
          }
          if(String(error.response.data.error.code) === '4015'){
            location.reload();
          }
        }
      });
    }, buyNowAction : function(type){ // �ٷα���
      if(this.isCartEvent){
        return false;
      }
      this.isCartEvent = true;

      // �����üũ
      if(!this.deliveryCheck()){
        this.eventCheck();
        return false;
      }

      var $self = this, target, itemStorage = '', storageCheck = 0, i, len = $self.products.length, trackingCode = [], arrOrderItems = [];


      // TODO ��ۺҰ�, ����� ���濡 ���� ���� != �ù� ���� api �� üũ�� �� �� return false �ʿ�
      // ����� üũ �� ��ۺҰ������� �� �˸� or ���������� ��� ������� �ù��� ��� �˸�

      for(i = 0; i < len; i++){
        target = $self.products[i];
        /* tracker code */
        target.parent_id = $self.postData.no
        target.parent_name = $self.postData.name;
        target.is_package = $self.postData.is_package;
        if($self.productsType === 0){ // ��ǰ
          if(target.ea > 0){
            storageCheck++;
            itemStorage = '<input type="hidden" name="products[' + i + '][no]" value="' + target.no + '"><input type="hidden" name="ea" value="' + target.ea + '">';
            trackingCode.push(target);
            arrOrderItems.push({ deal_product_no: target.parent_id, content_product_no: target.parent_id, quantity: target.ea });
          }
        }else{ // ��Ű�� ��ǰ
          if(i === 0){
            itemStorage = '<input type="hidden" name="ea" value="1">';
          }
          if(target.ea > 0){
            storageCheck++;
            itemStorage += '<input type="hidden" name="_multi_ea[]" value="' + target.ea + '">'
            itemStorage += '<input type="hidden" name="multi_ea[' + i + ']" value="' + target.ea + '">'
            itemStorage += '<input type="hidden" name="multi_addopt[' + i + '][]" value="' + target.no + '^��ǰ�����^' + target.name + '^' + target.discounted_price + '">'
            trackingCode.push(target);
            arrOrderItems.push({ deal_product_no: target.no, content_product_no: target.parent_id, quantity: target.ea });
          }
        }
      }
      if ($self.productsType === 0 && storageCheck === 0) {
        alert('������ �ݵ�� 1 �̻��̾�� �մϴ�.');
        $self.eventCheck();
        return;
      } else if ($self.productsType !== 0 && storageCheck === 0) {
        alert('�ֹ��Ͻ� ��ǰ�� �������ּ���.');
        $self.eventCheck();
        return;
      }

      var f = document.frmBuyNow;
      $("[name=frmBuyNow] [name=goodsno]").val($self.postData.no);
      $("[name=frmBuyNow]").append(itemStorage);


      /**
       * tracker code
       */
      // KM-1048 fusionSignal
      fusionSignalPut('buy');

      // KM-1483 Amplitude ����
      var trackLen = trackingCode.length;
      for(i = 0; i < trackLen; i++){
        KurlyTracker.setAction('add_to_cart_product', trackingCode[i]).sendData();
      }
      KurlyTracker.setAction('add_to_cart_success', trackingCode).sendData();
      // END : KM-1483 Amplitude ����

      // KM-2251 Facebook Pixel Code
      fbpTracker.setAction('AddToCart', trackingCode);

      // KMF-466 Facebook Conversion API ����
      conversionsTracker.setAction('AddToCart', trackingCode);

      // KM-1950 �ֹ��� ���� API ó��
      window.sessionStorage.setItem('isDirect', 1);
      kurlyApi({
        // kurly-jhlim - url ����
        method:'post',
        url:'/cart/v1/cart-items/direct',
        data: {cart_items: arrOrderItems}
      }).then(function(response) {
        if(response.status === 204) {
          // kurly-jhlim - if�� �ݹ����� �̵� / ���� ���� ���� 200 -> 204
          if (type === 'mobile') {
            // ������ ��ǰ �߰� �� �ֹ����� �̵�
            window.location.href='/app/order/index.html';
            // �ֹ������� ���ư �������� ���ư� �ּ� ����
            sessionStorage.setItem('referrer_for_order', location.href);
            sessionStorage.setItem('history_count_for_order', history.length);
          } else {
            window.location.href = '/shop/order/order.php';
          }
        }
        else {
          console.log("API Response('" + response.status + "'): ", response);
        }
      }).catch(function(error) {
        $self.eventCheck();
        if(error.response.status !== 204){
          if($self.type === 'pc'){
            _oldAlert(error.response.data.error.message);
          }else{
            alert(error.response.data.error.message);
          }
          if(error.response.data.error.code === 4015){
            sessionStorage.setItem('4015', 'true');
            location.reload();
          }
        }
      });
    }, wishlistAction : function(){
      var $self = this, target, itemStorage = '', storageCheck = 0, i, len = $self.products.length, trackingCode = [];

      if(!$self.userData){
        $self.loginCheckAction();
        return;
      }

      itemStorage = '<input type="hidden" name="goodsno" value="' + $self.postData.no + '">'
      for(i = 0; i < len; i++){
        target = $self.products[i];
        if($self.productsType === 0 || $self.postData.is_detail_sold_out){
          if(target.ea > 0){
            storageCheck++;
            itemStorage += '<input type="hidden" name="products[' + i + '][no]" value="' + target.no + '"><input type="hidden" name="ea" value="' + target.ea + '">';
          }
        }else{
          if(i === 0){
            itemStorage += '<input type="hidden" name="ea" value="1"><input type="hidden" name="branchRetun" value="">';
          }
          if(target.ea > 0){
            storageCheck++;
          }
          itemStorage += '<input type="hidden" name="multi_ea[' + i + ']" value="' + target.ea + '">'
          itemStorage += '<input type="hidden" name="multi_addopt[' + i + '][]" value="' + target.no + '^�ɼǻ�ǰ^' + target.name + '^^' + target.discounted_price + '">'
        }
      }

      if(storageCheck === 0 && !$self.postData.is_detail_sold_out){
        alert('�ϳ� �̻��� ��Ű�� ����ǰ�� �����ϼžߵ˴ϴ�!');
        return;
      }

      var frmWishlist = document.frmWishlist;
      $("[name=frmWishlist]").append(itemStorage);
      var queryString = $('form[name=frmWishlist]').serialize();

      $.ajax({
        type:"post",
        url:"/m2/goods/ajaxAction.php",
        dataType:"json",
        data: queryString + '&mode=addWishlist',
        error : function(error) {
          console.log(error);
        }, success : function(data) {
          alert(data.msg)
          if(data.success || data.msg === '�̹� �� ��� ����Ʈ�� �����ϴ� ��ǰ�Դϴ�'){
            $self.postData.wishCheck = true;
          }
        }
      });

    }, layerClose : function(type){ // ���̾�ݱ�
      var $self = this;
      if( $self.cartType === 'layer'){
        $self.layerShow = false;

        // ���̾� Ÿ�Զ� �ؽ�Ʈ �ִ�ġ�� ��� ȭ�� �ȱ����� script ó�� ����ġ
        $self.layerCartPutHeight('reset');
      }
      $self.postData.setAddress = false;
      $self.postData.success = false;
      if(type !== undefined && type !== 'success'){
        bodyScroll.bodyDefault(false);
      }else{
        bodyScroll.bodyDefault();
      }

      // KM-1483 Amplitude ����
      KurlyTracker.setScreenName(KurlyTracker.getBucket().browse_screen_name);

    }, userInfoGet : function(checkData, type){
      var user, $self = this;
      $self.type = checkData.type;

      if(!checkData.login && type === 'notify'){
        $self.loginCheckAction();
        return;
      }

      if(checkData.login){
        $self.userData = [];
        kurlyApi({
          method:'get',
          url:'/v3/my-page/info'
        }).then(function(response){
          if(typeof response === 'undefined' || response.status != 200 || response.status === undefined) return;
          user = response.data.data;
          $self.userData = user;
        }.bind(this)).catch(function(e){
          console.log(e);
        });
      }
      $self.goodsNo = checkData.no;

      // ���԰��˶� ���̾� ������ ��� �ش簪 true
      if(type === 'notify'){
        $self.isNotifyLayerCheck = true;
      }
      $self.update();
    }, layerCartPutHeight : function(type){ // ���̾� Ÿ�Զ� �ؽ�Ʈ �ִ�ġ�� ��� ȭ�� �ȱ����� script ó��
      var $self = this, $target = $('.cartList'), resultHeight = 0;
      $target.css('opacity',0);
      if(type === 'reset'){
        $target.find('.list').removeAttr('style');
        return;
      }
      if($target.find('.inner_option').height() === 0){
        setTimeout(function(){
          $self.layerCartPutHeight();
        }, 100);
      }
      if($target.height() < $target.find('.inner_option').height() + $target.find('.layer_name').outerHeight() - 2 ){
        resultHeight = $target.find('.tit_cart').outerHeight() + $target.find('.total').outerHeight() + $target.find('.group_btn').outerHeight();
        if($self.type === 'pc'){
          resultHeight += $target.find('.layer_name').outerHeight();
        }
        $target.find('.list').height($target.height() - resultHeight);
      }
      $target.animate({
        'opacity': 1
      },500);
    }, topBtnAction : function(type){ // top��ư �ִϸ��̼�
      if(type){
        $('#pageTop').hide();
      }else{
        $('#pageTop').show();
      }
    }, notifyOptionLayer: function(type){ // ���԰��˸� ���̾� ���� / �ݱ�
      var that = this;

      // �ݱ�
      if(typeof type !== 'undefined' && type === 'close'){
        that.postData.setNotify = false;
        bodyScroll.bodyDefault();
        return;
      }

      // ����
      if(that.cartType !== 'layer'){
        bodyScroll.bodyFixed();
      }
      that.postData.setNotify = true;
    }, notifyOptionAction: function(data){ // ���԰��˸� api ����
      var that = this;
      if(that.isNotifyOptionAction){
        return false;
      }
      that.isNotifyOptionAction = true;

      // ���԰� �˸� API��û�ϱ� ó��
      kurlyApi({
        method: 'post',
        url: '/restocked-notification/v1/home/content-products/' + this.goodsNo + '/deal-products/' + data.item.no + '/notifications'
      }).then(function(response){
        if(typeof response === 'undefined' || response.status !== 204){
          alert('���ΰ�ħ�� �ٽ� �õ��� �ֽñ�ٶ��ϴ�.');
          return;
        }
        // ��Ű����ǰ�� �ƴѰ�� ��û�� â �ڵ� �ݱ�
        if(!data.isPackage || data.countTotalItem === 1){
          alert('���԰� �˸� ��û�� �Ϸ�Ǿ����ϴ�.');
          that.notifyOptionLayer('close');
        }else{
          if(!confirm('���԰� �˸� ��û�� �Ϸ�Ǿ����ϴ�. �̾ ��û�Ͻðڽ��ϱ�?')){
            that.notifyOptionLayer('close');
          }
        }
        setTimeout(function(){
          that.isNotifyOptionAction = false;
        }, 1000);
      }.bind(this)).catch(function(err){
        var err = err.response;
        console.log(err)
        if(typeof err !== 'undefined'){
          alert(err.data.message);
        }else{
          alert('���ΰ�ħ�� �ٽ� �õ��� �ֽñ�ٶ��ϴ�.');
        }
        setTimeout(function(){
          that.isNotifyOptionAction = false;
          // that.notifyOptionLayer('close');
        }, 1000);
      });
    }, deliveryCheck: function(){
      var $self = this;
      try{
        /**
         * noNeedToPrint �� PC�� popup.js, mWeb�� _heaer.htm �� ����.
         */

        if(sessionStorage.getItem('isDeliveryCartPut') === null || sessionStorage.getItem('isDeliveryCartPut') === 'false'){
          if ($self.cartType !== 'layer') {
            bodyScroll.bodyFixed();
          } else {
            $self.layerShow = false; // ��ٱ��ϴ�� ���̾� Ÿ�� ���⿩��
          }
          $self.postData.setAddress = true; // ����� ���̾� �˾����� ����
          return false;
        }else{
          return true;
        }
      }catch(e){
        console.log(e);
      }
    }, eventCheck: function(){
      var that = this;
      setTimeout(function(){
        that.isCartEvent = false;
      }, 1000);
    }
    ,loginCheckAction: function(msg){
      var msg = (typeof msg !== 'undefined' && msg) ? msg : 'ȸ�� ���� ���� �Դϴ�. �α���/ȸ������ �������� �̵��Ͻðڽ��ϱ�?';
      if(confirm(msg)){
        if(this.type === 'pc'){
          location.href = '/shop/member/login.php?return_url=' + encodeURIComponent(location.href);
        }else{
          location.href = '/m2/mem/login.php?return_url=' + encodeURIComponent(location.href);
        }
        return false;
      }
    }
  }
});





























// KM-1048 fusionSignal
function fusionSignalPut(action){
  $.fusionSignalPutParam = function(name){ // �Ķ���� ���� �Ʒ� �ڵ� �ʼ�
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results===null){
      return null;
    }
    else{
      return decodeURI(results[1]) || 'false';
    }
  }
  if(typeof sessionStorage.FusionSignal !== 'undefined'){
    var fusionSignalResult = JSON.parse(sessionStorage.getItem("FusionSignal"));
    var $result = fusionSignalResult[0];
    if(typeof $result.params.doc_id !== 'undefined' && $.fusionSignalPutParam('goodsno')){
      if($result.params.doc_id !== $.fusionSignalPutParam('goodsno')){
        $result.type = false;
      }
    }
    if($result.type === 'request' || $result.type === 'click_product' || $result.type === 'click_select'){
      if(typeof action !== 'undefined'){
        if($result.type === 'request' && this.fusionSignalCheckId === $result.params.fusion_query_id ){
          // ���̵��ߺ��϶� �̺�Ʈ �ι��߻��Ǵ� �̽��� �߻��Ǿ� �ȵǵ��� ����
          return;
        }
        if($result.type === 'click_product' && action === 'buy'){ // ��ǰ�� + �ٷα���
          $result.type = 'click_buy_direct_from_click_product';
        }
        if($result.type === 'click_product' && action === 'put'){ // ��ǰ�� + ��ٱ���
          $result.type = 'click_add_to_cart_from_click_product';
        }
        if($result.type === 'click_select'){ // ��ǰ��� + ��ٱ���
          $result.type = 'click_add_to_cart_from_click_select';
        }
      }
      kurlyApi({
        method : 'put',
        url : '/v1/fusion/signals',
        data : $result
      }).then(function(result){
        if($result.type === 'request'){ // ���̵��ߺ��϶� �̺�Ʈ �ι��߻��Ǵ� �̽��� �߻��Ǿ� �ȵǵ��� ����
          this.fusionSignalCheckId = $result.params.fusion_query_id;
        }
        // �ѹ� �� �����ϰ� �����ϴ°�� �Ʒ� ó��
        if($result.type === 'click_add_to_cart_from_click_product' || $result.type === 'click_buy_direct_from_click_product'){
          sessionStorage.removeItem("FusionSignal");
        }
      }.bind(this)).catch(function(e){
        console.log(e);
      });
    }else{
      sessionStorage.removeItem("FusionSignal");
    }
  }else{
    return;
  }
}


// KM-1238 branch ��� �߰�
function branchAction(item){
  var $self = cartPut, i, itemLen = item.length, skuNo, branchCartItems = [] ,branchCartItem = {}; // ���ް�
  for(i = 0;i < itemLen;i++){
    // skuNo = item[i].no;
    // if($self.productsType !== 0){ // ��ǰ�϶�
    //     skuNo = item[i].product_no;
    // }
    branchCartItem = {
      "$canonical_identifier" : "product/" + $self.postData.no,
      "$product_name" : item[i].name,
      "$sku" : $self.postData.no,
      "$price" : item[i].discounted_price,
      "$quantity" : item[i].ea,
      "$currency" : "KRW",
    }
    branchCartItems.push(branchCartItem);
  }
  branch.logEvent("ADD_TO_CART", {}, branchCartItems);
}