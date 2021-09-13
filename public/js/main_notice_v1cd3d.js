// Mobile
Vue.component('pop-view-mobile',{
    props:['idx', 'item', 'popupId', 'popupClose'],
    template:'\
        <div>\
        <div :id="popupId+item.id" class="main_popup" :style="{\'z-index\':(10000-idx)}">\
            <div class="inner_mainpopup">\
                <div class="pop_view" v-html="item.mobile.content" v-if="item.mobile.link == \'\'">\
                </div>\
                <div class="pop_view" v-if="item.mobile.link != \'\'">\
                    <a :href="item.mobile.link" v-html="item.mobile.content" class="link">\
                    </a>\
                </div>\
                <div class="pop_footer " :class="{pop_select : item.buttons.length > 1}"><!-- ��ư�� 2���϶� Ŭ���� �߰� class="pop_select" -->\
                    <button @click="clickEvent(\'popupNotice\'+item.id, btn.no_show_hours)" type="button" class="btn" :data-day="btn.no_show_hours" v-for="(btn, idx) in item.buttons">{{ btn.label }}</button>\
                </div>\
            </div>\
        </div>\
        </div>\
        '
    ,methods:{
        clickEvent:function(name, time){
            this.$emit('popup-close', name, time);
        }
    }
});
// PC
Vue.component('pop-view-pc',{
    props:['idx', 'item', 'popupId', 'popupClose'],
    template:'\
        <div>\
        <div :id="popupId+item.id" class="main_popup" :style="{\'left\':(450*idx)+\'px\'}">\
            <div class="inner_mainpopup">\
                <div class="pop_view" v-html="item.pc.content" v-if="item.pc.link == \'\'">\
                </div>\
                <div class="pop_view" v-if="item.pc.link != \'\'">\
                    <a :href="item.pc.link" v-html="item.pc.content" class="link">\
                    </a>\
                </div>\
                <div class="pop_footer" :class="{ pop_select : item.buttons.length > 1}"><!-- ��ư�� 2���϶� Ŭ���� �߰� class="pop_select" -->\
                    <button @click="clickEvent(\'popupNotice\'+item.id, btn.no_show_hours)" type="button" class="btn" :data-day="btn.no_show_hours" v-for="btn in item.buttons">{{ btn.label }}</button>\
                </div>\
            </div>\
        </div>\
        </div>\
    '
    ,methods:{
        clickEvent:function(name, time){
            this.$emit('popup-close', name, time);
        }
    }
});

var mainNotice = new Vue({
    el: '#mainNoticePop',
    data: {
        postsData : [], // �����ͺҷ�����
        popList : [], // �����˾����
        noData : false, // ���� ���� ��� �����
        popCount : 0, // �˾����ⰹ��ī����
        checkId : [],
        popupId : 'popupNotice', // �˾��� ���Ǵ� ID �ϵ��ڵ�
        errors : [],
        type : 'mobile'
    },
    mounted: function () {
        this.update();
    },
    methods: {
        update:function(){
            var that = this;

            kurlyApi({
                method:'get',
                url:'/v3/home/notices'
            })
            .then(function(response){
                if(response.status != 200) return;

                that.postsData = response.data.data;
                if(that.postsData == null || that.postsData.length == 0){
                    that.noData = true;
                    return;
                }
                for(var i = 0; i < that.postsData.length; i ++){
                    if( getCookie(that.popupId + that.postsData[i].id) != 1 ){
                        that.popCount++;
                        that.popList.push(that.postsData[i]);
                    }
                }
                that.popupShow();
            }).catch(function(e){
                console.log('catch this', this)
                        this.errors.push(e);
                    console.error(this.errors.reduce(function (str, err) {
                        var alertMsg = 'MESSAGE: ' + err.message;
                        return str + "\n" + alertMsg;
                    }, ''));

                // alert(this.erors.code + this.errors.message);
            }.bind(this));
        },
        popupClose : function(name, time){ // ��ư Ŭ���� ����
            var $this = this;
            if(time != 0){
                if(time >= 9999){
                    setCookie(name, 1, time);
                }else{
                    setCookie(name, 1, time/24);
                }
            }
            document.getElementById(name).style.display = 'none';
            $this.popCount--;
            $this.popupShow();

            // �ߺ������϶� ����ȿ�� ó��
            var $bgCount = $('#bgLoadingNotice');
            if(this.type === 'mobile'){
                $bgCount.css('z-index', Number( $bgCount.css('z-index') ) - 1);
            }
        },
        popupShow : function(){
            if(this.type === 'mobile'){  // mobile ����
                if(this.popCount > 0){
                    $('body').css('overflow', 'hidden');
                    $('#bgLoadingNotice').show();
                }else{
                    $('body').removeAttr('style');
                    $('#bgLoadingNotice').hide();
                }
            }else{
                $('.main_popup').each(function(idx){
                    if($(this).css('display') != 'none'){
                        var pos = parseInt($(this).css('left')) * (idx-1);
                        if(pos < 0) pos = 0;
                        $(this).animate({
                            left : pos
                        },500);
                    }
                });
                // ��й�ȣ üũ�˾�����(�����˾� ��� �����Ŀ� �����)
                if($('#change_pw').hasClass('checkOn')){
                    if(this.popCount <= 0){
                        $('#change_pw').show();
                    }
                }
            }

            // KM-1483 Amplitude
            if(this.popCount === 0){
                KurlyTracker.setScreenName('recommendation');
            }else{
                KurlyTracker.setScreenName('announce');
            }
        },
    },
    // 2020-09-28 : css ó�� ����
    // updated : function(){
    //     this.$nextTick(function(){
    //         // mobile ���� �˾��� ���� ��� ȭ�� �߾ӿ� �÷����� ó��
    //         function mWebCheck(){
    //             var winHeight = $(window).height() - 40;
    //             var resultHeight = $('.main_popup').eq(0).height();
    //             if(resultHeight > 100){
    //                 $('.main_popup').each(function(idx){
    //                     resultHeight = $(this).height();
    //                     if(winHeight < resultHeight){
    //                         $(this).addClass('over');
    //                     }else{
    //                         $(this).addClass('under');
    //                     }
    //                 });
    //             }else{
    //                 setTimeout(function(){
    //                     mWebCheck();
    //                 }, 1000);
    //             }
    //         }
    //         if(this.type === 'mobile' && this.popCount > 0){
    //             mWebCheck();
    //         }
    //     });
    // }
});
