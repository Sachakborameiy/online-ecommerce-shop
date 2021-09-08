// LNB (PC, Mobile)
Vue.component('lnb-menu',{
  props:['getCategoryNum', 'item', 'idx', 'lengthCheck', 'type', 'originalCategoryName', 'lnbChecked', 'exceptionsType'],
  template:'\
    <li>\
        <a @click="clickEvent(item, idx)" :class="{on : item.checked}">{{ item.name }}</a>\
    </li>\
    '
  ,mounted: function () {
    if(this.idx == this.lengthCheck-1){ // ���۳�Ʈ ��� ������� ���̺귯������
      lnbMenu.menuScroll();
    }
  }
  ,methods:{
    clickEvent:function(item, idx){
      if(item.checked) return;

      // ga
      var textGet = this.originalCategoryName;
      textGet = textGet.replace(/(<([^>]+)>)/ig,"");
      var locationCheck = location.href;
      locationCheck = locationCheck.split('?');
      ga('set', 'location',  locationCheck[0] + '?category=' + item.no);
      ga('send', 'event', 'product', 'category_select', textGet + ' || ' + item.name);
      // end ga

      sessionStorage.gListCategoryNo = item.no;
      this.$emit('lnb-checked', idx, item.no);

      // KM-1483 Amplitude
      this.$emit('tracker-action', item);
      // END : KM-1483 Amplitude
    }
  }
});

var lnbMenu = new Vue({
  el:'#lnbMenu',
  data:{
    getData : [],  // �����ʹ��
    categoryMenu:[],
    getCategoryNum : null, // ī�װ���ȣ ����
    pageType : null, // ��ǰ��� API URL����� ����.
    categoryName : null,
    originalCategoryName : null,
    selectCategoryName: null,
    sendCategoryNo : null, // ��ǰ��Ͽ� ī�װ��ѹ� �����ϱ�
    getSearch : false,
    pcDefaultTopPos : false, // �ϴ� ���� ��ġüũ
    mainType : false, // ���������� ���Խ� �Ķ���� üũ��
    referrer : false, // �� ������ ��ġ Ȯ��
    exceptionsType : [
      {
        name : '�ø���õ',
        no : '1',
        checked : false,
        event_name : 'select_recommendation_subtab',
        browse_event_info : '',
      },
      {
        name : '�Ż�ǰ',
        no : '038',
        checked : false,
        event_name : 'select_new_product_subtab',
        browse_event_info : '',
      },
      {
        name : '����Ʈ',
        no : '029',
        checked : false,
        event_name : 'select_popular_product_subtab',
        browse_event_info : '',
      },
      {
        name : '�˶����',
        no : '015',
        checked : false,
        event_name : 'select_bargain_subtab',
        browse_event_info : '',
      },
      {
        name : 'Ư��/����',
        no : '2',
        checked : false,
        event_name : 'select_event_list_subtab',
        browse_event_info : '',
      }
    ], // ����ó�� - mw main ����
    type:'pc',
    trackingActionData: {}
  },
  mounted:function(){
    // this.update(); ī�װ���ȣ�� �������� API ȣ�� ����
  },
  methods:{
    update:function(){
      if(this.pageType === 'often'){
        this.categoryName = '<span class="tit">���� ��� ��ǰ</span>';
        this.originalCategoryName = '���� ��� ��ǰ';
        this.logoChange(0);
        goodsList.update();
        return;
      }else if(this.pageType === 'search'){
        goodsList.update();
        return;
      }else if(this.pageType === 'sale'){
        this.getCategoryNum = '015';
      }

      var checked = null;

      kurlyApi({
        method:'get',
        url:'/v1/category/' + this.getCategoryNum
      }).then(function(response){
        if(response.status != 200) return;

        this.getData = response.data.data.root_category;

        if(this.type === 'mobile'){
          this.originalCategoryName = this.getData.name.replace(/\//gi,'��');
          this.categoryName = '<span class="tit">' + this.originalCategoryName + '</span>';
          if(this.getCategoryNum === '350' || this.getCategoryNum === '351'){
            this.categoryName = '<span class="tit">�߼� ������Ʈ</span>';
            this.originalCategoryName = '�߼� ������Ʈ';
          }
        }else{
          this.originalCategoryName = this.getData.name.replace(/\//gi,'��');
          this.categoryName = this.originalCategoryName;
          if(this.getCategoryNum === '350' || this.getCategoryNum === '351'){
            this.categoryName = '�߼� ������Ʈ';
            this.originalCategoryName = '�߼� ������Ʈ';
          }
        }

        // mw �����Ǹ޴� ó��
        if(this.type === 'mobile' && (this.getCategoryNum == '029' || this.getCategoryNum == '038' || this.getCategoryNum == '015' || (this.getCategoryNum == '919' && this.mainType === true) ) ){
          var checkExceptions = 0; // �ΰ����� ���� üũ��
          for(var i = 0; i < this.exceptionsType.length ; i++){
            if(this.getCategoryNum ===  this.exceptionsType[i].no){
              this.categoryMenu = [];
              this.$set(this.exceptionsType[i], "checked", true);
              this.categoryMenu = this.exceptionsType;
              this.sendCategoryNo = this.getCategoryNum;
              checkExceptions++;
            }
          }
          this.logoChange(checkExceptions);
        }else{
          /**
           * show_all_flag �� ��ǰ ��Ͽ��� ��ü���� ��� ���θ� �Ǹ���.
           * ��ü���� | �����޴�1 | �����޴�2
           * - ��ü���� �ϳ��� �־�� �ϴ°�� => show_all_flag: true
           * - ��ü���� �ܿ� �ٸ� �޴��� �ִ°�� => show_all_flag: boolean
           */
          if(this.getData.show_all_flag){
            if(this.getData.no === this.getCategoryNum){
              this.categoryMenu.push({'name':'��ü����', 'no':this.getData.no}); // ��ü���� ���
              this.$set(this.categoryMenu[0], 'checked', true);
            }else{
              this.categoryMenu.push({'name':'��ü����', 'no':this.getData.no}); // ��ü���� ���
              this.$set(this.categoryMenu[0], 'checked', false);
            }
            this.sendCategoryNo = this.getCategoryNum;
          }
          for(var i = 0; i < this.getData.categories.length; i++){
            this.$set(this.getData.categories[i], "checked", false);
            if((this.getData.categories[i].no) === this.getCategoryNum){
              this.$set(this.getData.categories[i], "checked", true);
              this.selectCategoryName = this.getData.categories[i].name;
            }
            if(this.pageType === 'sale' && this.type === 'pc'){
              return;
            }else{
              this.categoryMenu.push(this.getData.categories[i]);
            }
          }
          if(!this.getData.show_all_flag){
            // ��ü���Ⱑ ������, üũ�Ȱ��� ���°��
            for(var i = 0 ; i < this.categoryMenu.length ; i++ ){
              if(this.categoryMenu[i].checked){
                this.categoryMenu[i].checked
                this.sendCategoryNo = this.categoryMenu[i].no;
              }
            }
            if(!this.sendCategoryNo){
              this.$set(this.categoryMenu[0], "checked", true);
              this.sendCategoryNo = this.categoryMenu[0].no;
            }
          }
          if(this.type === 'mobile'){
            this.logoChange(0);
          }
        }

        // Amplitude ���� (2020-07, KM-2919)
        this.trackerDataUpdate();

      }.bind(this)).catch(function(e){
        alert('�з��������� ī�װ��� �������� �ʾҽ��ϴ�.');
        history.back();
        this.errors.push(e);
        alert(this.errors.code + this.errors.message);
      });
    }
    ,menuScroll:function(){
      var snbWidth = 0;
      var $self = this;
      var num = 0;
      $('#lnbMenu li a').each(function(){
        snbWidth += parseInt($(this).parent().width());
        $(this).parent().attr('data-start',snbWidth - $(this).width() - 8);
        $(this).parent().attr('data-end',snbWidth + 8);
        if($(this).hasClass('on')){
          num = $(this).parent().index();
        }
      });
      if($self.type === 'mobile'){
        $('#lnbMenu ul').width(snbWidth+16);
      }
      $self.checkedAction(num, $self.sendCategoryNo);
    }
    ,lnbChecked:function(no, cateno){
      var $self = this;

      if($self.categoryMenu[no].checked == true) return;
      for(var i = 0 ; i < $self.categoryMenu.length ; i++ ){
        if(no == i){
          $self.categoryMenu[i].checked = true;
        }else{
          $self.categoryMenu[i].checked = false;
        }
      }
      setTimeout(function(){
        $self.checkedAction(no, cateno);
      });
    }
    ,checkedAction:function(no, categoryNo){
      var $self = this;
      var target = $('#lnbMenu li').eq(no);

      if(this.type === 'pc'){
        var checkTop = parseInt(target.position().top) + parseInt(target.height());
        if(this.pcDefaultTopPos === false){
          this.pcDefaultTopPos = checkTop;
        }else{
          if(this.pcDefaultTopPos != checkTop){
            this.pcDefaultTopPos = checkTop;
            $('#lnbMenu .bg').css({opacity : 0});
          }
        }
        $('#lnbMenu .bg').css({
          top : checkTop
        }).animate({
          width : target.width(),
          left : target.position().left
        },300,function(){
          $('#lnbMenu .bg').animate({
            opacity: 1
          });
          goodsList.update('lnb', categoryNo);
        });
      }else{
        var bgWidth = 0;
        var bgLeft = 0;
        if(this.mainType){
          bgWidth = target.find('a').parent().width();
          bgLeft = target.position().left;
        }else{
          bgWidth = target.find('a').width();
          bgLeft = target.position().left+16;
        }
        $('#lnbMenu .bg').animate({
          width : bgWidth,
          left : bgLeft
        },300,function(){
          if(categoryNo === '1'){
            location.href = '/m2/';
          }else if(categoryNo === '2'){
            location.href = '/m2/event.php';
          }else{
            goodsList.update('lnb', categoryNo, $self.mainType);
          }
          $('#lnbMenu .inner_lnb').scroll();
          setTimeout(function(){
            window.scrollTo(0, 0);
          },300);
        });
      }
      $('.lnb_paging span').eq(no).trigger('click');

      if($('#lnbMenu .list').width() > $(window).width()){
        var targetPos = target.position().left - $(window).width()/2 + target.width()/2 + 10 ;
        if(targetPos <= 0){
          targetPos = 0;
        }
        $('.inner_lnb').animate({
          scrollLeft :targetPos
        },300);
      }
    }
    ,logoChange:function(count){
      if(count === 0){
        $('#header h1').html(this.categoryName);
      }else if(count > 0){
        this.mainType = true;
        $('#lnbMenu').addClass('lnb_menu_main');
      }
    }
    ,trackerAction: function(item){ // Amplitude ���� (2020-07, KM-2919) : Update
      var that = this;
      var i, len = that.exceptionsType.length, is_exceptionsType = false;
      for(i = 0; i < len; i++){
        if(that.exceptionsType[i].no === item.no){
          is_exceptionsType = true;
          KurlyTracker.setAction(that.exceptionsType[i].event_name)
          .setEventInfo('/m2/goods/list.php?category=' + item.no + '&view=mainSnb')
          .sendData();
        }
      }
      if(that.categoryMenu.length > 1 && !is_exceptionsType){
        that.trackingActionData = {
          primary_category_id: that.getCategoryNum.substr( 0, 3),
          primary_category_name: that.originalCategoryName,
          secondary_category_id: item.no,
          secondary_category_name: item.name
        }
        KurlyTracker.setAction('select_category_subtab', that.trackingActionData).setEventInfo(that.trackingActionData.secondary_category_id).sendData();
      }
      that.trackerDataUpdate();
    }
    ,trackerDataUpdate: function(){ // Amplitude ���� (2020-07, KM-2919) : Update
      var that = this;
      if(typeof data === 'undefined' && typeof that.trackingActionData.primary_category_id === 'undefined'){
        that.trackingActionData = {
          primary_category_id: that.getData.no,
          primary_category_name: that.getData.name,
          secondary_category_id: that.sendCategoryNo,
          secondary_category_name: that.selectCategoryName === null ? '��ü����' : that.selectCategoryName
        }
      }
      that.trackingActionData = that.trackingActionData;
    }
  }
});
// // Mobie LNB


// ###############################################################################################


// Sort (Pc, Mobie)
/**
 * @author - kurly-jhlim
 * @description - ���� / �ù� sort ����Ʈ ����
 */
Vue.component('view-sort',{
  props:['sortData', 'sortDelivery', 'sortRegist', 'pageType' ,'type', 'deliveryCheck', 'sortUserCheck', 'sortLayerView'],
  template:'\
    <div :class="{blank_space : pageType === \'often\'}">\
        <div class="select_type user_sort" :class="{checked : sortUserCheck }"  v-if="pageType !== \'often\' && pageType !== \'search\'">\
            <a class="name_select" @click="layerOpen(sortUserCheck, \'sortUser\')" v-for="item in sortData" v-if="item.checked" >{{ item.name }}</a>\
            <ul class="list">\
                <li v-for="item in sortData"><a @click="updateChange(item.type, \'sort\', item.name)" :class="{on : item.checked}">{{ item.name }}</a></li>\
            </ul>\
        </div>\
    </div>\
    '
  ,methods:{
    layerOpen:function(obj, type){
      obj ? obj = false : obj = true;
      this.$emit('sort-layer-view', obj, type);
    }
    ,updateChange:function(itemType, type, name){
      var gaAction = '';
      var typeName = '';
      if(type === 'delivery'){
        gaAction = 'delivery_filter_change';
        typeName = 'sortDelivery';
      }else{
        gaAction = 'sort_order_change';
        typeName = 'sortUser';

        // Amplitude ���� (2020-06, KM-2714)
        KurlyTracker.setAction('select_sort_type', {sort_type: name}).sendData();
      }
      ga('send', 'event', 'product', gaAction, name);
      this.$emit('sort-regist', typeName, itemType, 'lnb', name);
    }
  }
});


// Category Banner(Mobie)
Vue.component('category-banner',{
  props:['categoryBannerUrl', 'categoryBannerLink', 'getCategoryNum'],
  template:'\
    <div>\
        <div class="bnr_category" v-if="categoryBannerLink != \'\'"><a :href="categoryBannerLink" @click="clickAction(event)"><img :src="categoryBannerUrl" alt="ī�װ� ���"></a></div>\
        <div class="bnr_category" v-if="categoryBannerLink == \'\'"><img :src="categoryBannerUrl" @click="clickAction(event)" alt="ī�װ� ���"></div>\
    </div>\
    '
  ,methods: {
    clickAction: function(e){ // Amplitude ���� (2020-07, KM-2919)
      e.preventDefault();
      var that = this;
      this.$emit('tracking-category-banner');
    }
  }
});


// ��ǰ���(PC, Mobile)
Vue.component('list-goods',{
  props:['item', 'tagName', 'tagType', 'getCategoryNum', 'sortDelivery', 'sortUser', 'type', 'idx', 'pageType', 'loginCheck', 'pageCount', 'tracking'],
  template:'\
    <li>\
        <div class="item">\
            <div class="thumb">\
                <a @click="clickAction(event, item, idx+pageCount)" class="img" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url + \')\'}">\
                  <span class="global_sticker" v-if="item.sticker !== null">\
                    <span class="inner_sticker">\
                      <span class="bg_sticker" :style="{ \'background-color\': item.sticker.background_color, \'opacity\': item.sticker.opacity * 0.01}"></span>\
                      <span class="txt_sticker">\
                        <span v-for="character in item.sticker.content">\
                            <span class="emph_sticker" v-if="character.weight === \'bold\'">{{ character.text }}</span>\
                            <span v-if="character.weight === \'regular\'">{{ character.text }}</span>\
                        </span>\
                      </span>\
                    </span>\
                  </span>\
                  <img v-if="type === \'mobile\'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKgAAADaCAQAAACYqMH1AAAAXklEQVR42u3BAQ0AAADCoPdPbQ43oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA3g0fCQABohc6wAAAAABJRU5ErkJggg==" :alt="item.shortdesc">\
                  <img v-if="type === \'pc\'" :src="item.thumbnail_image_url" :alt="item.shortdesc" onerror="this.src=\'https://res.kurly.com/mobile/img/1808/img_none_x2.png\'">\
                </a>\
                <a @click="clickAction(event, item, idx+pageCount)" class="sold_out" :class="{txt_sub : item.sold_out_text}" v-if="item.sold_out">\
                    <span class="inner_soldout">\
                        {{ item.sold_out_title }}\
                        <span class="sub_soldout" v-if="item.sold_out_text">{{ item.sold_out_text }}</span>\
                    </span>\
                </a>\
                <div class="group_btn">\
                    <button class="btn btn_cart" type="button" @click="cartPutCall(item, idx+pageCount)" v-if="!item.sold_out && !item.buy_now"><span class="screen_out">{{ item.no }}</span></button>\
                    <button class="btn btn_alarm on" @click="notifyAction(item, idx+pageCount)" type="button" v-if="item.use_stocked_notify && (item.package_soldout || item.sold_out)"><span class="screen_out">���˸� ��û</span></button>\
                    <button type="button" class="btn btn_alarm" v-if="!item.use_stocked_notify && (item.package_soldout || item.sold_out)"></button>\
                </div>\
            </div>\
            <a @click="clickAction(event, item, idx+pageCount)" class="info">\
                <span class="name">\
                    {{ item.name }}\
                </span>\
                <span class="cost">\
                    <span class="dc" v-if="item.discount_rate > 0">{{ item.discount_rate }}%</span>\
                    <span class="price">{{ item.price | commaFilter }}��</span>\
                    <span class="original" v-if="item.original_price != item.price">{{ item.original_price | commaFilter }}��</span>\
                </span>\
                <span class="desc" v-if="type === \'pc\'">{{ item.shortdesc }}</span>\
                <span class="tag">\
                  <span class="ico limit" v-for="(tName, idx) in tagName" v-if="tName != \'false\'" :class="{tag_type2 : tagType[idx] == \'kurlyonly\'}">{{ tName }}</span>\
                </span>\
            </a>\
        </div>\
    </li>\
    '
  ,methods:{
    clickAction :function(event, item, count){
      var url = this.type === 'mobile' ? '/m2/goods/view.php?goodsno=' + item.no : '/shop/goods/goods_view.php?&goodsno=' + item.no;
      this.saveSession(item);

      // GA
      ga('send', 'event', 'product', 'product_select', this.getCategoryNum + ' || ' + item.name);

      // KM-1483 Amplitude
      this.trackerAmplitude(item, count, 'select_product');

      if(this.pageType === 'search'){
        // KM-1048 fusionSignal
        if(fusionSignalList('view', item, count)){
          this.$options.filters.locationFilter(event, url);
        }
      }else{
        this.$options.filters.locationFilter(event, url);
      }
    }
    , notifyAction:function(item, count){ // ���԰� �˸�
      // KM-1483 Amplitude
      this.trackerAmplitude(item, count, 'select_product_shortcut');
      item.referrer_event = 'select_product_shortcut';
      KurlyTracker.setScreenName('product_selection');
      KurlyTracker.setAction('view_product_selection', item).sendData();
      // END : KM-1483 Amplitude

      // _footer.htm �� �ش� �Լ� ����.
      cartLayerOpenAction(item.no, 'notify');
    }
    , cartPutCall : function(item, count){
      /**
       * _footer.htm �� �ش� �Լ� ����.
       * ��ٱ��� ��� ���̾� �����.
       */
      cartLayerOpenAction(item.no);

      // KM-1048 fusionSignal
      fusionSignalList('cart', item, count)

      // KM-1483 Amplitude
      this.trackerAmplitude(item, count, 'select_product_shortcut');
      item.referrer_event = 'select_product_shortcut';
      KurlyTracker.setScreenName('product_selection');
      KurlyTracker.setAction('view_product_selection', item).sendData();
      // END : KM-1483 Amplitude
    }
    , trackerAmplitude : function(item, count, _event_name){
      // KM-1483 Amplitude
      var that = this;
      var actionData = item;
      actionData.position = count;
      actionData.server_sort_type = that.tracking.server_sort_type;
      actionData.default_sort_type = that.tracking.sortDefault;
      actionData.selection_sort_type = that.tracking.sortSelect;
      actionData.search = that.tracking.search;
      KurlyTracker.setAction(_event_name, actionData).sendData();
    }
    , saveSession : function(item){
      sessionStorage.gListCategoryNo = this.getCategoryNum;
      sessionStorage.gListCheckPageNo = item.page;
      sessionStorage.gListScrolltop = window.pageYOffset;
      sessionStorage.gListSortDelivery = this.sortDelivery;
      sessionStorage.gListSortUser = this.sortUser;
    }
  }
});

// PC ����¡
Vue.component('list-goods-paging',{
  props:['idx', 'pageCount', 'totalPageCount'],
  template:'\
        <span>\
            <a v-if="pageCount != idx+totalPageCount" class="layout-pagination-button layout-pagination-number" @click="$emit(\'on-move-list\', idx+totalPageCount)">{{ idx+totalPageCount }}</a>\
            <strong v-if="pageCount == idx+totalPageCount" class="layout-pagination-button layout-pagination-number __active">{{ idx+totalPageCount }}</strong>\
        </span>\
    '
});

var goodsList = new Vue({
  el: '#goodsList',
  data: {
    eventStop : false, // �̺�Ʈ ����
    getData : [],  // �����ʹ��
    getProducts : [], // products ���
    goodsItem : [], // ��ǰ�������� ���
    sortData : [], // ���İ��ޱ�(�Ż�ǰ, �α��ǰ, ��������, ��������)
    deliveryCheck : false, // ���ķ��̾��������
    sortUserCheck : false, // ���ķ��̾��������
    getCategoryNum : 0, // ���� �Ķ���� ���� �ִ°��
    categoryBannerUrl : false, // ī�װ����URL
    categoryBannerLink : false, // ī�װ����Link
    bnrCategoryNum : null, // PC ī�װ� : �������
    bnrCategoryThumb : null, // PC ī�װ� : �̹����ּ�
    bnrCategoryLink : [], // PC ī�װ� : ��ư��ũ
    bnrCategoryLinkStyle : [], // PC ī�װ� : ��ư��Ÿ��
    totalPaging : 0, // ��ü��������
    endPagingFst : 0, // PC ����¡���ڸ�(10,20,30 ��)
    endPagingLst : 0, // PC ����������¡ ����
    totalPageCount:0, // PC ��ü������ ī��Ʈ
    allPaging : 0, // ��ü������ī��Ʈ(pc,mw)
    pagingCountArray : [], // PC���� ����¡ ��������(�迭ȭ�ʿ�)
    pageCount : 1, // ���� ������ ī����
    pageLimit : 10, // �ѹ��� ����Ǿ�� �ϴ� ����
    backCheck : true, // �󼼿��� ��Ͽö� üũ
    backCheckPageNo : false, // �󼼿��� ��Ͽö� ���������� ���� ����
    backScrollTop : false, // �󼼿��� ��Ͽö� ���� ���� ����
    getSearch : false,
    noData : false,
    errors: [],
    pageType : null, // ��ǰ��� API URL����� ����.
    sortDelivery : 0, // �������,�ù��� ���ĺ���
    sortUser : '', // ����ڼ��ð� ���� ���ĺ���
    eventCheckCount : 0,
    scrollCheck : false,
    referrer : false,
    fusionSignalCheck : 0, // �˻���������������� 1�� ��������, ���ѹ��� �б�ó�������� 0, 1, 2 �� ���� ��������
    fusionSignalResult : null, // ��Ű�� ���� ��� ���ؼ� ���
    fusionSignalSeqCount : 0, // �ϳ��� ������� ����� Ŭ���� �ϴ��� ī��Ʈ
    tracking: { // Amplitude �� �����ʹ� ���⿡ ���
      sortCountType: 'update', // update, stop, change
      sortDefault: '',  // ��ǰ���� �⺻�� // Amplitude ���� (2020-06, KM-2714)
      sortSelect: '',  // ��ǰ���� ���氪 // Amplitude ���� (2020-06, KM-2714)
      search: {
        packageCount: 0, // �˻��� ��ǰ �� (KM-4988)
        keyword: '', // ��ǰ �˻� Ű���� (KM-4988)
      },
    },
    isMainType: false, // lnb�� main�κ����� �ƴ����� �����ϴ� ��
    loginCheck : false,
    searchResult: false, // �˻������ҽ� �ش簪 true�� �����.
    type: 'mobile',
  },
  mounted: function () {
    // this.update('load'); ī�װ� ������������ html���� ȣ��
  },
  methods:{
    update:function(type, no, isMain){
      if(typeof isMain !== 'undefined' && isMain){
        this.isMainType = true;
      }else{
        this.isMainType = false;
      }

      $('.bg_loading').show();

      var pageNo = this.pageCount; // data�� ���� �ֱ����� ���Ǵ� ����
      var checked = false;
      var recommendFilter = false;

      // LNB, ����, �ù�, �Ż�ǰ ��� ������Ʈ�ÿ� �ʱ�ȭ �ʿ�
      if(no){
        this.getCategoryNum = no;
      }
      if( (type === 'lnb' || this.searchResult) && this.eventCheckCount !== 0 ){
        this.goodsItem = [];
        this.pageCount = 1;
        this.eventStop = false;
        this.backCheckPageNo = 1;
        this.sortUserCheck = false;
        this.deliveryCheck = false;

        // Amplitude ���� (2020-06, KM-2714)
        if(this.tracking.sortCountType === 'change'){
          this.tracking.sortCountType = 'update';
        }
      }

      // referrer �� �ִ� ��츸 ����
      if(this.referrer === true){
        this.backCheckPageNo = sessionStorage.gListCheckPageNo;
        this.backScrollTop = sessionStorage.gListScrolltop;
        this.sortDelivery =  sessionStorage.gListSortDelivery;
        this.sortUser = sessionStorage.gListSortUser;
        this.referrer = false;
        this.eventCheckCount = 1;
        sessionStorage.goodsListReferrer = true;
      }else{
        if(sessionStorage.goodsListReferrer === true){
          this.getCategoryNum = sessionStorage.gListCategoryNo;
        }

        // KM-149 ������ : �˻���� ��˻��ҽ� �����������
        // if(this.pageType === 'search' && sessionStorage.gListSortDelivery != undefined){
        //   this.sortDelivery = sessionStorage.gListSortDelivery;
        // }
      }

      if(this.getCategoryNum === '038'){
        this.pageType = 'new';
        if(sessionStorage.gListSortUser38){
          this.sortUser = sessionStorage.gListSortUser38;
        }else{
          this.sortUser = '';
        }
      }else if(this.getCategoryNum === '015' || (no == null && !this.getCategoryNum)){
        if(this.pageType !== 'often' && this.pageType !== 'search'){
          this.pageType = 'sale';
          if(sessionStorage.gListSortUser15){
            this.sortUser = sessionStorage.gListSortUser15;
          }else{
            this.sortUser = '';
          }
        }
      }else{
        if(this.getCategoryNum === '029'){
          if(sessionStorage.gListSortUser29){
            this.sortUser = sessionStorage.gListSortUser29;
          }else{
            this.sortUser = '';
          }
        }
        this.pageType = 'list';
      }

      if(this.type === 'pc'){
        this.pageLimit = 99;
        if(this.eventCheckCount === 0){
          this.sortDelivery = 0;
        }
      }else{
        this.pageLimit = 20;
        if(this.eventCheckCount === 0 && sessionStorage.gListSortDelivery != undefined){
          this.sortDelivery = sessionStorage.gListSortDelivery;
        }
      }

      var apiUrl = null;
      this.pageLimit = typeof this.pageLimit !== 'undefined' ? this.pageLimit : (this.type === 'pc' ? 99 : 20);
      this.pageCount = typeof this.pageCount !== 'undefined' ? this.pageCount : 1;
      this.sortDelivery = typeof this.sortDelivery !== 'undefined' ? this.sortDelivery : 0;
      this.sortUser = typeof this.sortUser !== 'undefined' ? this.sortUser : '';

      if(this.pageType === 'often'){
        apiUrl = '/v1/mypage/order/often-buy-product?page_limit=' + this.pageLimit + '&page_no=' + this.pageCount;
      }else if(this.pageType === 'sale'){
        apiUrl = '/v1/home/timesale?page_limit=' + this.pageLimit + '&page_no=' + this.pageCount + '&delivery_type=' + this.sortDelivery + '&sort_type=' + this.sortUser;
      }else if(this.pageType === 'new'){
        apiUrl = '/v1/home/newproducts?page_limit=' + this.pageLimit + '&page_no=' + this.pageCount + '&delivery_type=' + this.sortDelivery + '&sort_type=' + this.sortUser;
      }else if(this.pageType === 'search'){
        apiUrl = '/v2/home/search?keyword=' + this.getSearch + '&sort_type=-1&page_limit=' + this.pageLimit + '&page=' + this.pageCount + '&delivery_type=' + this.sortDelivery;
      }else if(this.pageType === 'list'){
        apiUrl = '/v1/categories/' + this.getCategoryNum + '?page_limit=' + this.pageLimit + '&page_no=' + this.pageCount + '&delivery_type=' + this.sortDelivery + '&sort_type=' + this.sortUser;
      }

      // fusionSignal
      var fusionSignalCheckResult = {}
      if(this.fusionSignalCheck !== 0 && this.fusionSignalCheck !== 1){
        fusionSignalCheckResult = {'X-Kurly-Session-Id' : this.fusionSignalCheck}
      }

      var d = new Date();
      kurlyApi({
        method : 'get',
        url : apiUrl +  '&ver=' + d.getTime(),
        headers : fusionSignalCheckResult
      }).then(function(response){
        if(response.status != 200) return;


        // fusionSignal
        if(this.fusionSignalCheck !== 0 && this.fusionSignalCheck !== 1){
          this.fusionSignalResult = JSON.parse(sessionStorage.getItem("FusionSignal")); // ����Ʈ�ѿ��� �ϵ��� �Űܴ��
          this.fusionSignalResult[0].params.fusion_query_id = response.data.fusion_query_id;
          if(typeof response.data.fusion_query_id === 'undefined'){
            this.fusionSignalResult[0].params.fusion_query_id = 'test' + new Date().getTime();
          }
          this.fusionSignalCheck = 1;
          sessionStorage.FusionSignal = JSON.stringify(this.fusionSignalResult);
          fusionSignalPut(); // cartput_v1.js ����ó�� => �˻���� ����������(request)
        }

        this.getData = response.data.data;

        if(this.pageType !== 'often' && this.pageType !== 'search'){
          // ���İ��ֱ�
          if(this.getData.available_sort.length <= 0){
            this.sortData = false;
          }else{
            this.sortData = [];
            for(var i = 0; i < this.getData.available_sort.length; i++){
              if(i === 0){
                this.tracking.server_sort_type = this.getData.available_sort[0].name;
              }
              if(this.getData.available_sort[i].type === this.getData.current_sort){
                this.getData.available_sort[i].checked = true;
                this.sortUser = this.getData.available_sort[i].type;
                recommendFilter = true;

                // Amplitude ���� (2020-06, KM-2714)
                if(this.tracking.sortCountType === 'update' || this.isMainType){ // ��ǰ��� ȣ�� �Ҷ� �ѹ���.
                  this.tracking.sortDefault = this.getData.available_sort[i].name;
                  this.tracking.sortCountType = 'stop';
                }
              }
              this.sortData.push(this.getData.available_sort[i]);
            }
            // Amplitude ���� (2020-06, KM-2714)
            if(this.tracking.sortSelect === '' || this.isMainType){
              this.tracking.sortSelect = this.tracking.sortDefault;
            }

            // ��õ���� �������� �ʴ� ��ǰ���
            if(!recommendFilter){
              this.sortData[0].checked = true;
            }
          }
          // ī�װ���ʳֱ�
          if(this.getData.category_banner === null){
            this.categoryBannerUrl = false;
            this.categoryBannerLink = false;
            if(this.type === 'pc'){
              this.categoryBannerViewPc(false);
            }
          }else{
            if(this.type === 'pc'){
              this.categoryBannerUrl = this.getData.category_banner.pc_image_url;
              this.categoryBannerLink = this.getData.category_banner.pc_url;
              if(this.categoryBannerUrl === ''){
                this.categoryBannerViewPc(false);
              }else{
                this.categoryBannerViewPc(true);
              }
            }else{
              this.categoryBannerUrl = this.getData.category_banner.image_url;
              this.categoryBannerLink = this.getData.category_banner.url;
            }
          }
        }

        // ��ǰ�ֱ�
        this.getProducts = this.getData.products;

        if(this.getProducts.length === 0 && this.eventCheckCount === 0){
          this.noData = true;
        }else{
          this.noData = false;

          // KM-4988 ���ø�Ʃ�� �˻� ����Ÿ �߰�
          if (this.pageType == 'search'
              && typeof response.data.paging.total !== 'undefined'
              && this.getSearch !== '') {
            this.tracking.search = {
              packageCount : response.data.paging.total,
              keyword : decodeURIComponent(this.getSearch),
            }
          }

          if(this.type === 'pc'){
            this.goodsItem = [];
            if(type !== 'false'){
              if(this.pageType == 'search' && response.data.paging.total){
                this.allPaging = response.data.paging.total;
              }
              if(response.data.paging == undefined || response.data.paging.total <= this.pageLimit){
                this.totalPaging = 0;
                this.pagingUpdate('one');
              }else{
                this.totalPaging = Math.ceil(response.data.paging.total / this.pageLimit);
                this.endPagingFst = Math.floor(this.totalPaging / 10) * 10;
                this.endPagingLst = this.totalPaging % 10;
                this.pagingUpdate();
                this.onMoveList(this.backCheckPageNo, 'false');
              }
              if(this.backCheckPageNo != 0 && this.backCheck){
                var self = this;
                setTimeout(function(){
                  window.scrollTo(0, self.backScrollTop);
                }, 300);
              }
              this.backCheck = false;
            }
          }else{
            if(response.data.paging == undefined){
              this.eventStop = true;
            }else{
              this.eventStop = false;
              this.allPaging = response.data.paging.total;
              this.totalPaging = Math.ceil(this.allPaging/this.pageLimit);
            }
          }
          for(var i = 0; i< this.getProducts.length ;i++){
            this.getProducts[i].page = pageNo;
            // �±�ó��
            if(this.getProducts[i].tags.names.length == 0){
              this.getProducts[i].tags.names[0] = 'false';
            }else{
              var tagCheckName = [];
              var tagCheckType = [];
              for(var m = 0; m < this.getProducts[i].tags.types.length; m++){
                for(var n = 0; n < this.getProducts[i].tags.types[m].names.length; n++){
                  tagCheckName.push(this.getProducts[i].tags.types[m].names[n]);
                  tagCheckType.push(this.getProducts[i].tags.types[m].type);
                }
              }
              this.getProducts[i].tags.tagType = [];
              for(var m = 0; m < this.getProducts[i].tags.names.length; m++){
                for(var n = 0; n < tagCheckName.length; n++){
                  if(this.getProducts[i].tags.names[m] === tagCheckName[n]){
                    this.getProducts[i].tags.tagType.push(tagCheckType[n]);
                  }
                }
              }
            }
            this.goodsItem.push(this.getProducts[i]);
          }

          if(this.pageType === 'search' && this.getProducts.length === 0){
            this.noData = true;
          }
        }

        // �ؽ��ױװ� �ִ� ��츸 ����
        if(this.backCheck && this.type === 'mobile'){
          if(this.pageCount >= this.backCheckPageNo){
            var self = this;
            setTimeout(function(){
              window.scrollTo(0, self.backScrollTop);
            }, 300);
            this.backCheck = false;
          }else{
            this.moreShow();
          }
        }

        // KM-1483 Amplitude
        trackingListScreenName();

        this.searchResult = false;
        this.eventCheckCount = 1;
        $('.bg_loading').hide();
      }.bind(this)).catch(function(e){
        $('.bg_loading').hide();
        this.errors.push(e);
        alert(this.errors.code + this.errors.message);
      });
    }
    ,moreShow:function(){ // ������(Mobile ����¡���)
      if(this.eventStop) return false;
      var last = this.totalPaging - this.pageCount;
      this.pageCount++;
      if(last > 0){
        this.update();
      }
    }
    ,onMoveList:function(num, type){ // ����¡Ŭ����(PC)
      if(typeof num !== "number"){
        num = 0;
      }
      if(num <= 0 || num > this.totalPaging){
        return;
      }

      this.pageCount = num;
      if(this.backCheckPageNo != 0){
        this.backCheckPageNo = num;
      }
      this.totalPageCount = (Math.ceil(this.pageCount/10)-1)*10;

      if(this.pageCount == this.totalPaging){
        this.update('false');
      }else{
        this.update(type);
      }
      window.scrollTo(0, $('#main').offset().top - 50);
      this.pagingUpdate();
    }
    ,pagingUpdate:function(type){ // ����¡ ������Ʈ(PC)
      var checkCount = 0;
      this.pagingCountArray=[];

      if(type === 'one'){
        checkCount = 1;
      }else{
        if(this.pageCount <= this.endPagingFst){
          checkCount = 10;
        }else{
          checkCount = this.endPagingLst;
        }
      }
      for(var i=0;i< checkCount;i++){
        this.pagingCountArray.push(i);
      }
    }
    ,sortRegist:function(name, value, update, sortName){
      if(name === 'sortDelivery'){
        this.sortDelivery = value;
        sessionStorage.gListSortDelivery = this.sortDelivery;
      }
      if(name === 'sortUser'){
        this.sortUser = value;

        // �����̶�� ������������
        if(this.getCategoryNum === '038'){
          sessionStorage.gListSortUser38 = value;
        }else if(this.getCategoryNum === '029'){
          sessionStorage.gListSortUser29 = value;
        }else if(this.getCategoryNum === '015'){
          sessionStorage.gListSortUser15 = value;
        }
      }
      if(update){
        this.update(update);

        // Amplitude ���� (2020-06, KM-2714)
        this.tracking.sortCountType = 'change';
        this.tracking.sortDefault = this.tracking.sortSelect;
        this.tracking.sortSelect = sortName;
      }
    }
    ,sortLayerView : function(obj, type){
      if(type === 'delivery'){
        this.deliveryCheck = obj;
        this.sortUserCheck = false;
      }else{
        this.deliveryCheck = false;
        this.sortUserCheck = obj;
      }
    },pageTop : function(target, result){ // mw ������TOP
      if(result === 'hide'){
        if(target.css('display') === 'none') return;
        target.fadeOut(300);
      }else{
        if(target.css('display') === 'inline') return;
        target.fadeIn(300);
      }
    }
    ,categoryBannerViewPc : function(data){ // PC�� ī�װ����ó��
      var that = this;
      if(data){
        if(this.categoryBannerUrl){
          $('#bnrCategory img').attr('src', this.categoryBannerUrl);
        }else{
          $('#bnrCategory img').attr('src', 'https://res.kurly.com/images/common/bg_1_1.gif');
        }
        $('#bnrCategory').slideDown(300);

        // Amplitude ���� (2020-07, KM-2919)
        $('#bnrCategory').on('click', function(){
          that.trackingCategoryBanner();
        });

      }else{
        $('#bnrCategory').slideUp(300);
      }
    }
    , trackingCategoryBanner: function(){ // Amplitude ���� (2020-07, KM-2919)
      var that = this, actionData = lnbMenu.trackingActionData, temp = [];

      if(that.categoryBannerLink){
        actionData.url = that.type === 'pc' ? that.getData.category_banner.pc_url : that.getData.category_banner.url;
      }else{
        actionData.url = null;
      }

      if(that.categoryBannerLink && actionData.url.indexOf('category') > -1){
        temp = actionData.url.split('category=');
        actionData.banner_category_id = temp[temp.length - 1];
      }else{
        actionData.banner_category_id = null;
      }

      // KMF-61 ���� ��ũ�� Ȱ��ȭ �Ǿ������� select_category_banner �̺�Ʈ �߻�
      if (actionData.url !== null) {
        KurlyTracker.setEventInfo(actionData.banner_category_id).setAction('select_category_banner', actionData).sendData();
        location.href = actionData.url;
      }
    }
  },
  updated : function(){
    this.$nextTick(function (){
      var $self = this;
      if($self.scrollCheck) return; // ��ũ�� �̺�Ʈ�� 1ȸ�� �ֱ�����
      $self.scrollCheck = true;

      if($self.type === 'mobile'){
        var throttleCheck = false;
        var $goodsList = $('#goodsList');  // !$goodsList.hasClass('off') : �˻���������� ����.
        $(window).scroll(_.throttle(function(){
          if(throttleCheck && $(window).scrollTop() + $(window).height() > $(document).height() - 100 && !$goodsList.hasClass('off')){
            $self.moreShow(); // vue ��ũ��Ʈ ȣ��
          }
          throttleCheck = true;
          if($(window).scrollTop() < $(window).height()){
            $self.pageTop($('#pageTop'), 'hide');
          }else{
            $self.pageTop($('#pageTop'), 'show');
          }
        },300));
      }
    })
  }
});


// KM-1048 fusionSignal
function fusionSignalList(actionType, item, count){
  if(goodsList.fusionSignalCheck !== 1){
    if(typeof sessionStorage.FusionSignal !== 'undefined'){
      sessionStorage.removeItem("FusionSignal");
    }
    return;
  }
  if(typeof sessionStorage.fusionSignalView !== 'undefined'){
    sessionStorage.removeItem("fusionSignalView");
  }

  var $self = goodsList;
  var $result = $self.fusionSignalResult[0];

  $self.fusionSignalSeqCount++;
  var actionTypeResult = 'click_product';
  if(actionType === 'cart'){
    actionTypeResult = 'click_select';
  }
  var viewCountCheck = ($self.pageCount -1) * $self.pageLimit;
  $result.timestamp = + new Date();
  $result.type = actionTypeResult;
  // �ʼ��ʵ�
  $result.params.res_offset = viewCountCheck; // ������ �ѹ� * �������� ������ �� (page =1�̸�, offest = 0) �� ���� ������������ ������ ��(?)
  $result.params.res_pos = count + 1; // �ش� ���������� ���° ����������. (��ü ���� ���� = res_offset+res_pos). ���� ������ ���� �Ķ���Ϳ� ���� �������� ����
  if($self.type === 'mobile'){
    var mResOffset =  Math.floor(count / $self.pageLimit) * $self.pageLimit;
    var mResPos =  (count + 1) % $self.pageLimit;
    if(mResPos === 0) mResPos = $self.pageLimit;
    $result.params.res_offset = mResOffset;
    $result.params.res_pos = mResPos; // �ش� ���������� ���° ����������. (��ü ���� ���� = res_offset+res_pos). ���� ������ ���� �Ķ���Ϳ� ���� �������� ����
  }
  // �������ʵ�
  $result.params.doc_id = item.no;
  $result.params.label = item.name;
  $result.params.click_seq = $self.fusionSignalSeqCount;
  sessionStorage.FusionSignal = JSON.stringify($self.fusionSignalResult);
  if(actionTypeResult === 'click_select'){
    fusionSignalPut(); // cartput_v1.js ����ó�� => �˻���� Action (actionTypeResult)
  }
  return true;
}


/**
 * KM-1483 Amplitude : screen_name & tab_name
 */
var listPrevBucket = {};
function trackingListScreenName(){
  var $self = goodsList, _screen_name;
  if($self.pageType === 'new'){
    // �Ż�ǰ
    _screen_name = 'new_product';
    KurlyTracker.setTabName('home');
  }else if($self.getCategoryNum === '029'){
    // ����Ʈ
    _screen_name = 'popular_product';
    KurlyTracker.setTabName('home');
  }else if($self.pageType === 'sale'){
    // �˶����
    _screen_name = 'bargain';
    KurlyTracker.setTabName('home');
  }else if($self.pageType === 'search'){ // �˻����
    _screen_name = 'search_product_list';
    KurlyTracker.setTabName('search');
  }else if($self.pageType === 'often'){ // ���ֻ�� ��ǰ���
    _screen_name = 'product_list';
    // _screen_name = 'frequently_purchase_product_history';
  }else{
    listPrevBucket = KurlyTracker.getBucket();
    if(listPrevBucket.browse_tab_name === 'category'){ // ī�װ� ���
      _screen_name = 'category_product_list';
    }else{ // �Ϲ� ��ǰ���(������ �� �ִ� ���� �ʿ���)
      _screen_name = 'product_list';
    }
  }
  KurlyTracker.setScreenName(_screen_name);
}
