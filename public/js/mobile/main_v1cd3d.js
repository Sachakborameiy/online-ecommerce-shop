var onLottieReady;

function chkGNBLogo(device) {
  var $header = device === "pc" ? $("#headerLogo") : $("#header");
  var $imgLogo = $header.find(".logo img");
  var $linkGnb = $header.find(".logo a");
  var apiData = {};
  var loadJSLibrary = function () {
    var tag = document.createElement("script");
    var firstScriptTag = document.getElementsByTagName("script")[0];
    tag.src = "https://res.kurly.com/js/lib/lottie_svg_kurly.min.js?v=1";
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  };

  var loadLottie = function (data) {
    var logoJsonUrl = data[device + "_logo_url"];
    var landingUrl = data[device + "_landing_url"];
    loadJSLibrary();
    onLottieReady = function () {
      var logoContainer = document.getElementById("gnbLogoContainer");
      var animItem = bodymovin.loadAnimation({
        wrapper: logoContainer,
        animType: "svg",
        loop: true,
        path: logoJsonUrl,
      });
      $linkGnb.attr("href", landingUrl);
      if (device === "mobile") {
        $("#header .logo").addClass("logo_container");
      }
    };
  };

  var callAPI = function () {
    kurlyApi({
      method: "get",
      url: "/v3/event/logo",
    })
      .then(function (response) {
        var apiData;
        if (response.status === 200) {
          apiData = response.data.data;

          if (apiData !== null) {
            // calling lottie image
            loadLottie(apiData);
          } else {
            $imgLogo.css("display", "block");
          }
          // set sessionStorage data for caching
          sessionStorage.gnbLogo = JSON.stringify(apiData);
        } else {
          $imgLogo.css("display", "block");
          console.log("ERROR on GNB LOGO fetching!!!", response);
        }
      })
      .catch(function (e) {
        /* ie9 fallback image ó�� : ���Ⱑ ���� �ʾ� �ּ� ó�� ��
      if(device === "pc"
          && typeof apiData.pc_fallback_logo_url !== "undefined") {
          $imgLogo.attr('src', apiData.pc_fallback_logo_url);
          $linkGnb.attr('href', apiData.landing_url);
      }
      */
        $imgLogo.css("display", "block");
        console.log("ERROR on GNB LOGO API calling!!!", e);
      });
  };

  if (typeof sessionStorage.gnbLogo !== "undefined") {
    try {
      var apiData = JSON.parse(sessionStorage.gnbLogo);

      if (apiData !== null) {
        // calling lottie image
        loadLottie(apiData);
      } else {
        $imgLogo.css("display", "block");
      }
    } catch (e) {
      $imgLogo.css("display", "block");
      console.log("JSON parse error from the GNB cookie!!!", e);
    }
  } else {
    callAPI();
  }
}

var type1 = Vue.component("main1-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="main_type1">\
        <div class="list_goods">\
            <ul class="list" :data-title="section.title" :data-section="section.section_id">\
                <li v-for="(banners, idx) in section.banners" :data-index="idx + 1">\
                    <a v-if="type === \'pc\'" class="thumb_goods" @click="clickEvent(event, idx)" :style="{ \'background-image\': \'url(\' + banners.image_url + \')\'}">���ι��</a>\
                    <a v-if="type === \'mobile\'" class="thumb_goods" @click="clickEvent(event, idx)" :style="{ \'background-image\': \'url(\' + banners.image_url + \')\'}">\
                        <img alt="���ι��" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAAFUCAQAAAB18bTtAAAAAXNSR0IArs4c6QAAAQ5JREFUeNrtwQENAAAAwqD3T20ON6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeDPlmQABbV89KgAAAABJRU5ErkJggg==">\
                    </a>\
                </li>\
            </ul>\
            <div v-if="type === \'mobile\'" class="paging" :class="{two : section.banners.length > 9 }"><span class="bg"></span><span class="count"></span></div>\
        </div>\
    </div>\
    ',
  methods: {
    trackingCode: mainTrackingCode,
    clickEvent: function (event, idx) {
      // KM-1483 Amplitude
      var data = {
        title: this.title || null,
        parent: this.section,
        type: "content",
        url: this.section.banners[idx].landing_url,
        index: idx + 1,
      };
      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      this.$options.filters.locationFilter(
        event,
        this.section.banners[idx].landing_url
      );
    },
  },
});

var type2 = Vue.component("main2-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="main_type2" :class="{bg : section.fill_background}" :style="{ \'background-color\': backgroundAdd(section.fill_background) }">\
        <div :class="classAdd(section.section_type)">\
            <div class="tit_goods" :class="{ top_short : section.short_top_padding }">\
                <h3 class="tit">\
                    <a v-if="section.landing_url" @click="clickEvent(event, \'title\')" class="name">\
                        <span class="ico">{{ section.title }}</span>\
                        <span class="tit_desc" v-if="section.subtitle">{{ section.subtitle }}</span>\
                    </a>\
                    <span v-if="!section.landing_url" class="name">\
                        {{ section.title }}\
                        <span class="tit_desc" v-if="section.subtitle">{{ section.subtitle }}</span>\
                    </span>\
                </h3>\
            </div>\
            <div class="category_menu" v-if="section.section_type === \'category_list\'">\
                <div class="bg_category">\
                    <span class="bg_shadow shadow_before"></span>\
                    <span class="bg_shadow shadow_after"></span>\
                </div>\
                <div class="category">\
                    <ul class="list_category">\
                        <li v-for="(category, idx) in section.categories">\
                            <a class="menu" :data-no="category.no" :class="{ on : category.no === section.moreLink, cut : idx === 7}" href="#none"> {{ category.name }} </a>\
                        </li>\
                        <li class="bg" v-if="type === \'mobile\'"></li>\
                    </ul>\
                </div>\
            </div>\
            <div class="list_goods" :class="{min : itemLenth(\'4\'), none : itemLenth(\'0\'), over : section.section_type === \'category_list\'}">\
                <ul class="list" :data-title="section.title" :data-section="section.section_id">\
                    <li v-for="(item, idx) in section.products" :class="{ cut : (idx + 1) % 3 === 0}" :data-index="idx + 1">\
                        <a class="thumb_goods" @click="clickEvent(event, item, idx)">\
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
                          <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAACRCAQAAABjof6/AAAANUlEQVR4Ae3BgQAAAADDoPtTT+AI1QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAnfAsAAe7+tYwAAAAASUVORK5CYII=" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url + \')\'}" alt="��ǰ�̹���">\
                        </a>\
                        <div class="info_goods">\
                            <span class="name">\
                                <a class="txt" @click="clickEvent(event, item, idx)">{{ item.name }}</a>\
                            </span>\
                            <span class="price" v-if="parseInt(item.price) >= 0">\
                              <span class="dc" v-if="item.discount_rate > 0">{{ item.discount_rate }}%</span>{{ item.price | commaFilter }}��\
                            </span>\
                            <span class="cost" v-if="item.price !== item.original_price">{{ item.original_price | commaFilter }}��</span>\
                        </div>\
                    </li>\
                    <li class="more" v-if="type === \'mobile\' && section.landing_url">\
                        <a @click="activeLink(event, section.products)">\
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg==" alt="">\
                            <span class="txt">\
                                <img v-if="!checked" class="thumb" src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png" alt="��ü���� ������">\
                                <img v-if="checked" class="thumb" src="https://res.kurly.com/mobile/service/main/1903/ico_next2_active.png" alt="��ü���� ������">\
                                ��ü����\
                            </span>\
                        </a>\
                    </li>\
                </ul>\
            </div>\
            <div class="link_cate" v-if="section.section_type === \'category_list\'">\
                <a class="link" @click="clickEvent(event, \'more\')">\
                    <span class="ico">{{ section.moreName }} ��ü����</span>\
                </a>\
            </div>\
        </div>\
    </div>\
    ',
  data: function () {
    return {
      checked: false,
    };
  },
  methods: {
    itemLenth: function (num) {
      if (typeof this.section.products !== "undefined") {
        return this.section.products.length <= num ? true : false;
      }
    },
    classAdd: function (type) {
      var className = type;
      if (type === "category_list") {
        className = "category_type";
      }
      return className;
    },
    backgroundAdd: function (type) {
      var bgColor = null;
      if (type === undefined || type === false) {
        bgColor = "none";
      } else if (type === true) {
        bgColor = "#f7f7f7";
      } else {
        bgColor = type;
      }
      return bgColor;
    },
    activeLink: function (event, idx) {
      var $self = this;
      $self.checked = true;
      setTimeout(function () {
        $self.clickEvent(event, "more", idx.length);
      }, 300);
    },
    trackingCode: mainTrackingCode,
    clickEvent: function (event, item, idx) {
      var locationUrl;
      if (item === "title") {
        locationUrl = this.section.landing_url;
      } else if (item === "more") {
        if (this.type === "mobile") {
          locationUrl = "/m2/goods/list.php?category=" + this.section.moreLink;
        } else {
          locationUrl =
            "/shop/goods/goods_list.php?category=" + this.section.moreLink;
        }
        if (typeof idx !== "undefined") {
          locationUrl = this.section.landing_url;
        }
      } else {
        if (this.type === "mobile") {
          locationUrl = "/m2/goods/view.php?&goodsno=" + item.no;
        } else {
          locationUrl = "/shop/goods/goods_view.php?&goodsno=" + item.no;
        }
      }

      // KM-1483 Amplitude
      var data = {};
      data.url = locationUrl;
      data.parent = this.section;
      if (item === "title") {
        data.type = item;
        data.index = 1;
        if (typeof idx !== "undefined") {
          data.index = idx + 1;
        }
      } else if (item === "more") {
        data.type = item;
        data.index = 1;
        data.product = {};
        data.product.id = null;
        data.product.name = null;
        data.product.originPrice = null;
        data.product.price = null;
        if (data.parent.section_id === "md_choice") {
          data.product.primaryId = data.parent.moreLink;
          data.product.primaryName = data.parent.moreName;
        }
      } else {
        data.type = "content";
        data.title = this.section.title || null;
        data.index = idx + 1;
        data.product = {};
        data.product.id = item.no;
        data.product.name = item.name;
        data.product.originPrice = item.original_price;
        data.product.price = item.price;
        if (data.parent.section_id === "md_choice") {
          data.product.primaryId = data.parent.moreLink;
          data.product.primaryName = data.parent.moreName;
        }
      }

      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      this.$options.filters.locationFilter(event, locationUrl);
    },
  },
});

var type3 = Vue.component("main3-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="main_type3" :style="{ \'background-color\': backgroundAdd(section.fill_background) }" :class="{bg : (section.section_type == \'event_list\' || section.fill_background) }">\
        <div :class="{main_event : section.section_type == \'event_list\', main_recipe : section.section_type == \'recipe_list\', min : lengthCheck(\'3\')}">\
            <div class="tit_goods" :class="{ top_short : section.short_top_padding }">\
                <h3 class="tit">\
                    <a v-if="section.landing_url" @click="clickEvent(event, \'title\')" class="name">\
                        <span class="ico">{{ section.title }}</span>\
                        <span class="tit_desc" v-if="section.subtitle">{{ section.subtitle }}</span>\
                    </a>\
                    <span v-if="!section.landing_url" class="name">\
                        {{ section.title }}\
                        <span class="tit_desc" v-if="section.subtitle">{{ section.subtitle }}</span>\
                    </span>\
                </h3>\
            </div>\
            <div class="list_goods">\
                <ul class="list" :data-title="section.title" :data-section="section.section_id">\
                    <li v-for="(item, idx) in section.events" v-if="section.events" :data-index="idx + 1">\
                        <a class="thumb_goods" @click="clickEvent(event, item, idx)">\
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAABeCAQAAAAA22vlAAAAAXNSR0IArs4c6QAAACdJREFUeAHtwQENAAAAwiD7p34PBwwAAAAAAAAAAAAAAAAAAAAA4FpFZgABkfKClwAAAABJRU5ErkJggg==" :style="{ \'background-image\': \'url(\' + item.image_url + \')\'}" alt="��ǰ�̹���">\
                        </a>\
                        <div class="info_goods">\
                            <img v-if="type === \'mobile\'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPsAAABeCAQAAABPqqpwAAAAAXNSR0IArs4c6QAAAERJREFUeAHtwTEBAAAAwiD7p14JT2AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAQbiyAAHjdLrpAAAAAElFTkSuQmCC" alt="" >\
                            <div class="inner_info">\
                                <span class="name">\
                                    <a class="txt" @click="clickEvent(event, item, idx)">{{ item.title }}</a>\
                                </span>\
                                <span class="desc">\
                                    <a class="txt" @click="clickEvent(event, item, idx)">{{ item.subtitle }}</a>\
                                </span>\
                            </div>\
                        </div>\
                    </li>\
                    <li v-for="(item, idx) in section.recipes" v-if="section.recipes">\
                        <a class="thumb_goods" @click="clickEvent(event, item, idx)">\
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACgCAQAAACY0inuAAAAAXNSR0IArs4c6QAAAGFJREFUeNrtwTEBAAAAwqD1T20JT6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOBnLK8AAfZFFloAAAAASUVORK5CYII=" :style="{ \'background-image\': \'url(\' + item.image_url + \')\'}" alt="��ǰ�̹���">\
                        </a>\
                        <div class="info_goods">\
                            <div class="inner_info">\
                                <span class="name">\
                                    <a class="txt" @click="clickEvent(event, item, idx)" v-html="item.title"></a>\
                                </span>\
                            </div>\
                        </div>\
                    </li>\
                    <li class="more" v-if="type === \'mobile\' && section.recipes">\
                        <a @click="activeLink(event, section.recipes)">\
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGsAAADDCAQAAAAv+ScEAAAAAXNSR0IArs4c6QAAAD9JREFUeNrtwTEBAAAAwqD1T20MH6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4GyjxQAB0tL32gAAAABJRU5ErkJggg==">\
                            <span class="txt">\
                                <img v-if="!checked" class="thumb" src="https://res.kurly.com/mobile/service/main/1903/ico_next2_v3.png" alt="��ü�������� ������">\
                                <img v-if="checked" class="thumb" src="https://res.kurly.com/mobile/service/main/1903/ico_next2_active.png" alt="��ü�������� ������">\
                                ��ü����\
                            </span>\
                        </a>\
                    </li>\
                </ul>\
            </div>\
        </div>\
    </div>\
    ',
  data: function () {
    return {
      checked: false,
    };
  },
  methods: {
    lengthCheck: function (num) {
      if (typeof this.section.events !== "undefined") {
        return this.section.events.length < num ? true : false;
      }
    },
    backgroundAdd: function (type) {
      var bgColor = null;
      if (type === undefined || type === false) {
        bgColor = null;
      } else if (type === true) {
        bgColor = "#f7f7f7";
      } else {
        bgColor = type;
      }
      return bgColor;
    },
    activeLink: function (event, idx) {
      var $self = this;
      $self.checked = true;
      setTimeout(function () {
        $self.clickEvent(event, "more", idx.length);
      }, 300);
    },
    trackingCode: mainTrackingCode,
    clickEvent: function (event, item, idx) {
      var locationUrl = this.section.landing_url;

      // KM-1483 Amplitude
      var data = {};
      data.parent = this.section;
      if (item === "more" || item === "title") {
        data.type = item;
        data.index = 1;
        data.url = locationUrl;
        if (item === "more") {
          data.index = idx + 1;
        }
      } else {
        data.type = "content";
        data.title = this.section.title || null;
        data.index = idx + 1;
        data.url = item.landing_url;
      }
      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      this.$options.filters.locationFilter(event, data.url);
    },
  },
});

var bnr = Vue.component("bnr-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="bnr_main">\
        <a class="link" @click="clickEvent(event)" :style="{ \'background-image\': \'url(\' + section.background.image_url + \')\' , \'background-color\': section.background.color}">\
            <span class="inner_link">\
                <strong v-if="section.text.title != null" class="tit" :style="{ \'color\' : section.text.color }">{{ section.text.title }}</strong>\
                <span v-if="section.text.title != null" class="txt" :style="{ \'color\' : section.text.color }">{{ section.text.subtitle }}</span>\
                <img v-if="type === \'pc\' && section.text.title == null && section.text.subtitle == null" :src="section.background.image_url"  onerror="this.src=\'https://res.kurly.com/mobile/service/common/bg_1x1.png\'" >\
            </span>\
            <img v-if="type === \'mobile\'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXcAAABMCAQAAAA8Az+vAAAAAXNSR0IArs4c6QAAAE5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAeA3e9AABLRK7rwAAAABJRU5ErkJggg==" alt="">\
        </a>\
    </div>\
    ',
  methods: {
    trackingCode: mainTrackingCode,
    clickEvent: function (event) {
      // KM-1483 Amplitude
      var data = {};
      data.title = this.section.title || null;
      data.url = this.section.landing_url;
      data.parent = this.section;
      data.type = "content";
      data.index = null;

      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      this.$options.filters.locationFilter(event, this.section.landing_url);
    },
  },
});

// PC���� �ν�Ÿ�׷�
var type4 = Vue.component("main4-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="main_type4">\
        <div class="tit_goods" :class="{ top_short : section.short_top_padding }">\
            <h3 class="tit">{{ section.title}}</h3>\
        </div>\
        <div class="list_goods">\
            <ul class="list" :data-title="section.title" :data-section="section.section_id">\
                <li v-for="(item, idx) in section.reviews" :data-index="idx + 1">\
                    <a class="thumb_goods" @click="clickEvent(idx)" target="_blank">\
                        <img class="thumb" :src="item.thumbnail_image_url" alt="��ǰ�̹���">\
                    </a>\
                </li>\
            </ul>\
        </div>\
        <div class="bnr">\
            <span class="txt">{{ section.subtitle }}</span>\
            <a href="https://www.instagram.com/marketkurly_regram/" target="_blank">@marketkurly_regram</a>\
        </div>\
    </div>\
    ',
  methods: {
    trackingCode: mainTrackingCode,
    clickEvent: function (idx) {
      // KM-1483 Amplitude
      var data = {
        title: "�ν�Ÿ�׷� �� �ı�",
        parent: this.section,
        type: "content",
        url: this.section.reviews[idx].landing_url,
        index: idx + 1,
      };
      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      window.open(this.section.reviews[idx].landing_url);
    },
  },
});

// ����ȵ� �߰���
var type5 = Vue.component("main5-component", {
  props: ["section", "type"],
  template:
    '\
    <div class="main_special">\
        <div class="inner_special" :class="{ no_line : !section.has_divider}">\
            <div class="tit_goods">\
                <h3 class="tit">\
                    <span class="name">\
                        {{ section.title }}\
                        <span class="tit_desc" v-if="section.subtitle && type == \'mobile\'">{{ section.subtitle }}</span>\
                        <span class="tit_desc" v-if="section.subtitle && type == \'pc\'" v-html="wordReplace(section.subtitle)"></span>\
                    </span>\
                </h3>\
                <p class="sub_hook" v-if="section.pc_hooking_text && type == \'pc\'">{{ section.pc_hooking_text }}</p>\
            </div>\
            <div class="list_goods" :class="{list_goods2 : section.products.length > 1}">\
                <ul class="list" :data-title="section.title" :data-section="section.section_id">\
                    <li v-for="(item, idx) in section.products" :class="{ cut : (idx + 1) % 3 === 0}" :data-index="idx + 1">\
                        <a class="thumb_goods" @click="clickEvent(event, item, idx)" v-if="!item.sold_out">\
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
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVcAAACtCAQAAACuRvRYAAAAiklEQVR42u3BAQ0AAADCoPdPbQ43oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABuDNBSAAH8gaXJAAAAAElFTkSuQmCC" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url + \')\'}" alt="��ǰ�̹���" v-if="type === \'mobile\' || (type === \'pc\' && section.products.length === 1)">\
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVcAAACtCAQAAACuRvRYAAAAiklEQVR42u3BAQ0AAADCoPdPbQ43oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABuDNBSAAH8gaXJAAAAAElFTkSuQmCC" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url_y + \')\'}" alt="��ǰ�̹���" v-if="type === \'pc\' && section.products.length > 1">\
                            <span class="bg" :style="{\'background-color\' : section.title_text_color }" v-if="item.is_show_amount_duration"></span>\
                            <span class="count" v-if="item.is_show_amount_duration">\
                                <span class="num" v-if="item.count">{{ item.count }}</span>\
                                <span class="num" v-if="item.promotion_type == 1">{{ item.ea | commaFilter }}</span>\
                                <span class="txt" v-if="item.promotion_type == 1">�� </span>\
                                <span class="txt" v-if="item.promotion_end_time != \'end\'">����</span>\
                            </span>\
                        </a>\
                        <a class="thumb_goods sold_out" @click="clickEvent(event, item, idx)" v-if="item.sold_out">\
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
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVcAAACtCAQAAACuRvRYAAAAiklEQVR42u3BAQ0AAADCoPdPbQ43oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABuDNBSAAH8gaXJAAAAAElFTkSuQmCC" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url + \')\'}" alt="��ǰ�̹���" v-if="type === \'mobile\' || (type === \'pc\' && section.products.length === 1)">\
                            <img class="thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVcAAACtCAQAAACuRvRYAAAAiklEQVR42u3BAQ0AAADCoPdPbQ43oAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABuDNBSAAH8gaXJAAAAAElFTkSuQmCC" :style="{ \'background-image\': \'url(\' + item.thumbnail_image_url_y + \')\'}" alt="��ǰ�̹���" v-if="type === \'pc\' && section.products.length > 1">\
                            <span class="bg"></span>\
                            <span class="info">\
                                <span class="tit" v-if="item.sold_out_title">{{ item.sold_out_title }}</span>\
                                <span class="desc" v-if="item.sold_out_content" v-html=" wordReplace(item.sold_out_content)"></span>\
                            </span>\
                        </a>\
                        <div class="info_goods">\
                            <span class="name">\
                                <a class="txt" @click="clickEvent(event, item, idx)" v-if="!item.sold_out">{{ item.name }}</a>\
                                <span class="txt" v-if="item.sold_out">{{ item.name }}</span>\
                            </span>\
                            <a @click="clickEvent(event, item, idx)" class="sub_name" v-if="type == \'pc\' && item.shortdesc">{{ item.shortdesc }}</a>\
                            <div class="price">\
                              <span class="dc" v-if="item.discount_rate > 0">{{ item.discount_rate }}%</span>\
                              <div class="in_price">\
                                <span class="selling" v-if="parseInt(item.price) >= 0">{{ item.price | commaFilter }}��</span>\
                                <span class="cost" v-if="item.price !== item.original_price">{{ item.original_price | commaFilter }}��</span>\
                              </div>\
                            </div>\
                        </div>\
                    </li>\
                </ul>\
            </div>\
        </div>\
    </div>\
    ',
  data: function () {
    return {
      checked: false,
    };
  },
  methods: {
    wordReplace: function (text) {
      return text.replace("\n", "<br>");
    },
    colorSet: function (attr, color) {
      return attr + ":#" + color;
    },
    trackingCode: mainTrackingCode,
    clickEvent: function (event, item, idx) {
      var locationUrl;
      if (item === "title") {
        locationUrl = this.section.landing_url;
      } else if (item === "more") {
        if (this.type === "mobile") {
          locationUrl = "/m2/goods/list.php?category=" + this.section.moreLink;
        } else {
          locationUrl =
            "/shop/goods/goods_list.php?category=" + this.section.moreLink;
        }
        if (typeof idx !== "undefined") {
          locationUrl = this.section.landing_url;
        }
      } else {
        if (this.type === "mobile") {
          locationUrl = "/m2/goods/view.php?&goodsno=" + item.no;
        } else {
          locationUrl = "/shop/goods/goods_view.php?&goodsno=" + item.no;
        }
      }

      // KM-1483 Amplitude
      var data = {};
      data.url = locationUrl;
      data.parent = this.section;
      if (item === "more" || item === "title") {
        data.type = item;
        data.index = 1;
        if (typeof idx !== "undefined") {
          data.index = idx + 1;
        }
      } else {
        data.product = {};
        data.type = "content";
        data.title = this.section.title || null;
        data.index = idx + 1;
        data.product.id = item.no;
        data.product.name = item.name;
        data.product.originPrice = item.original_price;
        data.product.price = item.price;
        if (data.parent.section_id === "md_choice") {
          data.product.primaryId = data.parent.moreLink;
          data.product.primaryName = data.parent.moreName;
        }
      }

      this.trackingCode("amplitudeEvent", data);
      // End : KM-1483 Amplitude

      this.$options.filters.locationFilter(event, locationUrl);
    },
  },
});

var cp = Vue.component("component-printer", {
  props: ["componentName", "section", "type"],
  template:
    '\
        <div>\
            <component :is="componentName" :section="section" :type="type"></component>\
        </div>\
    ',
});
var kurlyMain = new Vue({
  el: "#kurlyMain",
  data: {
    getData: [],
    mainData: [],
    mdData: [],
    mdDataCheckNum: null, // md��õ�� ���°��б�ó���ÿ��� ���
    mdItemCount: null,
    trackerStart: false,
    errors: [],
    type: "mobile",
  },
  components: {
    "main1-component": type1,
    "main2-component": type2,
    "main3-component": type3,
    "main5-component": type5,
    "bnr-component": bnr,
    "component-printer": cp,
  },
  methods: {
    update: function () {
      var $self = this;
      kurlyApi({
        method: "get",
        url: "/v2/home/recommendation",
      })
        .then(
          function (response) {
            if (response.status != 200) return;
            $self.mainData = response.data.data.section_list;
            var i,
              j,
              k,
              mainDataLen = $self.mainData.length;

            // md��õ�б�ó��
            for (i = 0; i < mainDataLen; i++) {
              var section = $self.mainData[i];

              if (section.section_type === "category_list") {
                $self.$set(section, "products", false);
                if (sessionStorage.mdCategoryNo !== undefined) {
                  $self.$set(section, "moreLink", sessionStorage.mdCategoryNo);
                  $self.$set(
                    section,
                    "moreName",
                    sessionStorage.mdCategoryName
                  );
                } else {
                  $self.$set(section, "moreLink", section.default_category_no);
                  $self.$set(section, "moreName", false);
                }
                $self.mdDataCheckNum = i;
                $self.productsChange(section.moreLink);

                var mdDataNumLen;
                if (sessionStorage.mdCategoryNo === undefined) {
                  mdDataNumLen =
                    $self.mainData[$self.mdDataCheckNum].categories.length;
                  for (k = 0; k < mdDataNumLen; k++) {
                    if (
                      $self.mainData[$self.mdDataCheckNum].categories[k].no ===
                      $self.mainData[$self.mdDataCheckNum].default_category_no
                    ) {
                      $self.mainData[$self.mdDataCheckNum].moreName =
                        $self.mainData[$self.mdDataCheckNum].categories[k].name;
                    }
                  }
                }
                // md��õ�б�ó��
                sessionStorage.removeItem("mdCategoryNo");
                sessionStorage.removeItem("mdCategoryName");
              }


              // ī��Ʈ�ٿ� �̺�Ʈ�� �������� ���� ����
              if (section.section_type === "special_deal_list") {
                var item = section.products;
                var itemLen = item.length;
                for (j = 0; j < itemLen; j++) {
                  $self.$set(item[j], "count", false);
                  if (
                    item[j].promotion_type === 0 &&
                    !item[j].sold_out &&
                    item[j].is_show_amount_duration
                  ) {
                    $self.timerCountSet(i, j, "timerStart" + i + "" + j);
                  }
                }
              }
              // ����� ���ο��� ����Ʈ, �Ż�ǰ, �˶���� �ּ� �б�ó��
              if ($self.type === "mobile") {
                if (
                  section.section_id === "sale_goods" ||
                  section.section_id === "today_new"
                ) {
                  section.landing_url = section.landing_url + "&view=mainSnb";
                }
              }
            }

            if ($self.mdDataCheckNum === null) {
              setTimeout(function () {
                $self.trackerStart = true;
              }, 1000); // �ӽÿ����� �ð��� ���� ������
            }

            $("#bgLoading").hide();
          }.bind(this)
        )
        .catch(
          function (e) {
            $("#bgLoading").hide();
            this.errors.push(e);
            console.error(
              this.errors.reduce(function (str, err) {
                var alertMsg = "MESSAGE: " + err.message;
                return str + "\n" + alertMsg;
              }, "")
            );

            // alert(this.erors.code + this.errors.message);
          }.bind(this)
        );
    },
    timerCountSet: function (parentNum, num, name) {
      var $self = this;
      var item = $self.mainData[parentNum].products;
      // ī��Ʈ �̺�Ʈ ����
      var maxTime = item[num].promotion_end_time; // ����ð� ������
      name = setInterval(function () {
        var nowDate = new Date().getTime();
        var result = maxTime - nowDate;
        if (result < 1000) {
          // �ð� ���޽�
          clearInterval(name);
          item[num].count = "Time Out";
          item[num].promotion_end_time = "end";
          return false;
        }

        var date1 = moment(maxTime);
        var date2 = moment(nowDate);
        var limit = {
          hour: date1.diff(date2, "h"),
          min: moment(result).format("mm"),
          sec: moment(result).format("ss"),
        };

        if (limit.hour < 10) limit.hour = "0" + limit.hour;

        item[num].count = limit.hour + ":" + limit.min + ":" + limit.sec;
      }, 1000);
    },
    typeToComponent: function (type) {
      if (type == "main_banner") {
        return "main1-component";
      } else if (type == "product_list" || type == "category_list") {
        return "main2-component";
      } else if (type == "event_list" || type == "recipe_list") {
        return "main3-component";
      } else if (type == "special_deal_list") {
        return "main5-component";
      } else if (type == "static_banner") {
        return "bnr-component";
      } else if (type == "instagram") {
        if (this.type === "mobile") return false;
        return "main4-component";
      }
    },
    productsChange: function (no, name) {
      var $self = this;

      $self.mdItemCount = null;

      kurlyApi({
        method: "get",
        url: "/v2/home/recommendation/md_choice/categories/" + no,
      })
        .then(
          function (response) {
            if (response.status != 200) return;
            $self.mainData[$self.mdDataCheckNum].products =
              response.data.data.products;
            $self.mdItemCount =
              $self.mainData[$self.mdDataCheckNum].products.length;
            $self.mainData[$self.mdDataCheckNum].moreLink = no;
            if (name !== undefined) {
              $self.mainData[$self.mdDataCheckNum].moreName = name;
              sessionStorage.mdCategoryNo = no;
              sessionStorage.mdCategoryName = name;

              // KM-1483 Amplitude
              _trackerImpression.scrollFocus(
                $(window).scrollTop(),
                "md_choice"
              );
              if ($self.type === "mobile") {
                _trackerImpression.scrollFocus(
                  $(window).scrollTop(),
                  "md_choice_2"
                );
              }
            }
            $self.trackerStart = true;
          }.bind(this)
        )
        .catch(
          function (e) {
            this.errors.push(e);
            console.error(
              this.errors.reduce(function (str, err) {
                var alertMsg = "MESSAGE: " + err.message;
                return str + "\n" + alertMsg;
              }, "")
            );

            // alert(this.erors.code + this.errors.message);
          }.bind(this)
        );
    },
  },
  updated: function () {
    this.$nextTick(function () {
      var $parentSelf = this;

      // ### Mobile
      if ($parentSelf.type === "mobile") {
        // ###########################
        // swipe�� ���Ǵ� class �߰�
        function class_add(target) {
          target.find(".list_goods").addClass("swiper-container");
          target.find(".list").addClass("swiper-wrapper");
          target.find("li").addClass("swiper-slide");
        }

        function call_swiper(name, target, speed, auto, space, boolean) {
          class_add(name);
          var pageCheck = false;
          if (name.find(".count").length > 0) {
            pageCheck = {
              el: ".count",
              type: "fraction",
            };
          }
          if (auto == undefined) {
            // �ڵ��̵� : false
            auto = false;
          } else if (auto) {
            auto = {
              delay: 3000,
              disableOnInteraction: false,
            };
          }
          if (space == undefined) {
            // ����. style �⺻���� : 8
            space = 8;
          }
          if (boolean == undefined) {
            // infiniteLoop �⺻ false
            boolean = false;
          }
          name = new Swiper(target, {
            slidesPerView: "auto",
            autoplay: auto,
            speed: 400, // ���Ҽӵ�
            loop: boolean,
            spaceBetween: space, // �����۰���
            pagination: pageCheck,

            // KM-1483 Amplitude ����
            on: {
              slideChangeTransitionEnd: function () {
                /* �����̵� �̺�Ʈ �߻��� �� ���� */
                _trackerImpression.scrollFocus(
                  $(window).scrollTop(),
                  $(target).find(".list li").data("name"),
                  auto
                );
              },
            },
            // END : KM-1483 Amplitude ����
          });
        }

        // swipe���� ������, swipe ���� class name, �ӵ�, infiniteLoop����
        call_swiper(
          $(".main_type1"),
          ".main_type1 .swiper-container",
          400,
          true,
          0,
          true
        );
        $(".product_list").each(function (idx) {
          var checkNo = idx + 1;
          $(this).addClass("swiper" + checkNo);
          call_swiper($(this), ".swiper" + checkNo + " .swiper-container", 400);
        });
        call_swiper($(".main_recipe"), ".main_recipe .swiper-container", 400);
      }

      // ### PC
      if ($parentSelf.type === "pc") {
        // slider ȣ���Լ�
        var bxArry = [];
        var bxArryCount = 0;
        function bx_slider(count, target, boolean, speed, effect) {
          var showCount = count;
          var marginNum = 18;
          var hideControlOnEndCheck = true;
          var pauseCheck = 0;
          var tWidth = target.find("li:eq(0)").width();
          if (
            speed == undefined &&
            boolean == undefined &&
            effect == undefined
          ) {
            speed = 500;
            boolean = false;
            effect = "swing";
          }
          if (count === 6) {
            // �ν�Ÿ�׷�
            marginNum = 0;
          } else if (count === 1) {
            // ���ι��
            marginNum = 0;
            tWidth = 0;
            pauseCheck = 3000;
            hideControlOnEndCheck = false;
          } else if (count === "destroy") {
            bxArryCount = bxArry.length - 1;
            bxArry[bxArryCount].destroySlider();
            bxArryCount++;
            return false;
          }

          bxArry[bxArryCount] = target.bxSlider({
            mode: "horizontal", // ���� ���� ���� �����̵�
            infiniteLoop: boolean,
            speed: speed, // �̵� �ӵ��� ����
            pager: false, // ���� ��ġ ����¡ ǥ�� ���� ����
            slideWidth: tWidth, // ������1���� ������
            moveSlides: showCount, // �����̵� �̵��� ����
            minSlides: count, // �ּ� ���� ����
            maxSlides: count, // �ִ� ���� ����
            slideMargin: marginNum, // �����̵尣�� ����
            auto: boolean,
            pause: pauseCheck, // �ڵ��Ѹ��� �ѹ��̵��� ����ð�
            stopAutoOnClick: true,
            autoHover: true, // ���콺 ȣ���� ���� ����
            controls: true, // ���� ���� ��ư ���� ����
            autoControls: boolean,
            hideControlOnEnd: hideControlOnEndCheck, // �Ǿ�, �ǵ� ��ư ���⿩��
            easing: effect, // ȿ��

            // KM-1483 Amplitude
            onSliderLoad: function (currentIndex) {
              if (target.parents(".category_type").length > 0) {
                $(".category_type .list_goods").removeClass("over");
              }

              target.data("current", currentIndex);
              target.data("count", count);
              target.data("bxArry", bxArryCount);
            },
            onSlideBefore: function ($slideElement, oldIndex, newIndex) {
              target.data("current", newIndex);
              /* �����̵� �̺�Ʈ �߻��� �� ���� */
              _trackerImpression.scrollFocus(
                $(window).scrollTop(),
                target.data("section")
              );
            },
            // End : KM-1483 Amplitude
          });

          // KM-1483 Amplitude
          target.data("total", bxArry[bxArryCount].getSlideCount());
          // End : KM-1483 Amplitude

          bxArryCount++;

          if (count === 6 || count === 1) {
            target.parents(".list_goods").hover(
              function () {
                $(this).find(".bx-stop").trigger("click");
              },
              function () {
                $(this).find(".bx-start").trigger("click");
              }
            );
          }
        }

        // slider ȣ��(����Ÿ��, ������,  infinite����, �ӵ�, ȿ��)
        // ����
        if ($(".main_type1 .list li").length > 1) {
          bx_slider(
            1,
            $("#kurlyMain .main_type1 .list"),
            true,
            500,
            "ease-in-out"
          );
        }
        // ����
        $(".main_type2 .product_list").each(function (idx) {
          var $target = $(this).find(".list");
          if ($target.find("li").length > 4) {
            bx_slider(4, $target);
          }
        });
        // ������
        if ($(".main_recipe .list li").length > 3) {
          bx_slider(3, $("#kurlyMain .main_recipe .list"));
        }
        // �ν�Ÿ�׷�
        if ($(".main_type4 .list li").length > 6) {
          bx_slider(6, $("#kurlyMain .main_type4 .list"));
        }

        // MD�� ��õ
        function mdSlider() {
          if ($parentSelf.mdItemCount === null) {
            setTimeout(function () {
              mdSlider();
            }, 1000);
          } else {
            if ($parentSelf.mdItemCount > 4) {
              bx_slider(4, $("#kurlyMain .category_type .list_goods .list"));
            }
          }
        }
        if ($parentSelf.mdDataCheckNum !== null) {
          mdSlider();
        }
      }

      // ############################
      // PC,mWeb ī�װ��޴� ����׼�
      var categoryEvent = {
        cateno: 0,
        snbWidth: 0,
        num: 0,
        targetPos: 0,
        $target: $(".category_menu"),
        $targetSlider: $(".category_menu .category"),
        $targetList: $(".category_menu .list_category"),
        $targetItem: $(".category_menu .category li"),
        $targetItemMenu: $(".category_menu .category a"),
        $targetBg: $(".category_menu .bg"),
        $shadowBefore: $(".bg_category .shadow_before"),
        $shadowAfter: $(".bg_category .shadow_after"),
        deviceType: $parentSelf.type,
        init: function () {
          // ���� ����ȭ �ɽÿ��� �̰����� selector ����
        },
        defaultSet: function () {
          var $self = this;
          $self.$targetItemMenu.each(function () {
            $self.snbWidth += parseInt($(this).parent().width());
            $(this)
              .parent()
              .attr("data-start", $self.snbWidth - $(this).width() - 8);
            $(this)
              .parent()
              .attr("data-end", $self.snbWidth + 8);
            if ($(this).hasClass("on")) {
              $self.num = $(this).parent().index();
              $self.cateno = $(this).data("no");
            }
          });

          if ($self.deviceType === "mobile") {
            $self.$targetList.width($self.snbWidth + 16);
            setTimeout(function () {
              $self.checkedAction($self.num);
            });
            // ��ũ���̺�Ʈ
            $self.$targetSlider.on("scroll", function () {
              $self.scrollEvent();
            });
          }

          // Ŭ���̺�Ʈ
          $self.$targetItemMenu.on("click", function (e) {
            e.preventDefault();
            if ($(this).hasClass("on")) {
              return;
            }
            $parentSelf.productsChange($(this).data("no"), $(this).text());
            $self.checkedAction($(this).parent().index());
            // ��ǰ�� �ڷ� ����ó��
            sessionStorage.mdCategoryNo = parseInt($(this).data("no"));
            sessionStorage.mdCategoryName = $(this).text();
          });
        },
        checkedAction: function (no) {
          var $self = this;
          var target = $(".list_category li").eq(no);
          var bgWidth = target.find("a").width();
          var bgLeft = target.position().left + 16;
          target.siblings().find("a").removeClass("on");
          target.find("a").addClass("on");

          if ($self.deviceType === "mobile") {
            $self.$targetBg.animate(
              {
                width: bgWidth,
                left: bgLeft,
              },
              300,
              function () {
                $self.scrollEvent();
              }
            );
            if ($self.$targetList.width() > $(window).width()) {
              $self.targetPos =
                target.position().left -
                $(window).width() / 2 +
                target.width() / 2 +
                10;
              if ($self.targetPos <= 0) {
                $self.targetPos = 0;
              }
              $self.$targetSlider.animate(
                {
                  scrollLeft: $self.targetPos,
                },
                300
              );
            }
          } else {
            $(".category_type .list_goods").addClass("over");
            bx_slider(
              "destroy",
              $("#kurlyMain .category_type .list_goods .list")
            );
            setTimeout(function () {
              mdSlider();
            }, 500);
          }
        },
        scrollEvent: function () {
          var $self = this;
          if ($self.$targetSlider.scrollLeft() > 0) {
            $self.$shadowBefore.show();
          } else {
            $self.$shadowBefore.hide();
          }
          if (
            $self.$targetSlider.scrollLeft() + $(window).width() >=
            $self.$targetList.width()
          ) {
            $self.$shadowAfter.hide();
          } else {
            $self.$shadowAfter.show();
          }
        },
      };

      if ($parentSelf.mdDataCheckNum !== null) {
        categoryEvent.defaultSet();
      }
      setTimeout(function () {
        /**
         * @description - shellWrapper�� �̿��Ͽ� �÷��̽�Ȧ�� ������Ʈ�� �����Ͱ� ������ �Ǳ����� fadeOut ��Ų �� ����
         * @author kurly-jhlim
         */
        if (webStatus.device === "pc") {
          $("#shellWrapper").fadeOut("fast", function () {
            $(this).remove();
            // ���� �ڵ�
            $("#kurlyMain").css({ opacity: 1 });
            $("#footer").css({ opacity: 1 });
          });
        } else {
          $("#kurlyMain").css({ opacity: 1 });
          $("#footer").css({ opacity: 1 });
        }
      }, 300);

      // KM-1483 Amplitude
      _trackerImpression.setOffsetTop($parentSelf.mainData, $parentSelf.type);
    });
  },
});

// KM-1483 Amplitude
KurlyTracker.setScreenName("recommendation").setTabName("home");
function mainTrackingCode(name, data) {
  var _tData = {},
    _event_name;
  if (name === "amplitudeEvent") {
    _event_name = "select_recommendation_" + data.parent.section_id;
    _tData = {
      selection_type: data.type,
      position: null,
      url: data.url,
      package_id: typeof data.product !== "undefined" ? data.product.id : null,
      package_name:
        typeof data.product !== "undefined" ? data.product.name : null,
      origin_price:
        typeof data.product !== "undefined" ? data.product.originPrice : null,
      price: typeof data.product !== "undefined" ? data.product.price : null,
      primary_category_id: null,
      primary_category_name: null,
    };
    if (data.title !== null && typeof data.title !== "undefined") {
      _tData.title = data.title;
    }

    if (data.type !== "title" && data.type !== "more") {
      _tData.position = data.index;
    }
    if (
      typeof data.product !== "undefined" &&
      typeof data.product.primaryId !== "undefined"
    ) {
      // MD��õ�϶� ���� �߻�
      _tData.primary_category_id = data.product.primaryId;
      _tData.primary_category_name = data.product.primaryName;
    }
    KurlyTracker.setEventInfo(data.url);
    KurlyTracker.setAction(_event_name, _tData).sendData();
  }
}

// KM-1483 Amplitude
/**
 * # ���� ���� ���� ����
 1. ��ũ�� �ӵ��� �����Ͽ� 0.3 ���Ͽ����� ���� ���¸� Ȯ��
 2. ��� �Ǵ� ���� ȭ�鿡 100% ����Ǹ�, ���� ���¸� ����� ����
 3. ��� �Ǵ� ���� ���� ���¿��� 70% �̻� ȭ�� ������ �����, ���� ���¸� ������ ����
 # ��ũ�� �ӵ� ��� ��� (https://github.com/thefarmersfront/kurly-ios/blob/b9bef8b778325e9ae79ad309c3136b29a795423d/MarketKurly/Protocol/VisibilityTracking/VisibilityTrackingProtocol.swift#L89)
 0. ����/���� ��ũ�� �̺�Ʈ�� �߻��ϸ�
 1. ���� Ÿ�ӽ������� ���� Ÿ�ӽ������� ������ 0.1 �� �̻��̸�
 2. ���� �����°� ���� �������� ���̸� �̿��Ͽ� �̵� �Ÿ��� ���
 3. ���� ��꿡 ����� �� �ֵ��� ���� Ÿ�ӽ������� �������� ����
 4. �̵� �Ÿ��� ���� �ð����� ������ ��ũ�� �ӵ��� ���
 */
var _trackerImpression = (function () {
  var deviceType;
  var mainData;

  /**
   * data-section �� ��Ī�� �ʿ��� ���� ����
   * [ impressionj_recommendation_{section_id} Ʈ��ŷ ���� ]
   * ������ �ε� �Ϸ��� ���� ���� �����������
   */
  var SECTION_NAME = [
    "main_banner",
    "today_recommendation",
    "special_deal_",
    "sale_goods",
    "md_choice",
    "today_new",
    "theme_goods_",
    "instagram",
  ];

  /**
   * @type {Array | object }
   * @private { name : string | top : number | bottom : number | height : number}
   */
  var _SET_SECTION = [];

  /**
   * ���� �ѹ� �ش� �������� ��ǥ�߰�
   * _SET_SECTION �ʱ� ���ð�
   * MD ��õ ��ǰ�� ���� �������� �ε�ǹǷ� �ش� �����Ͱ� ����Ǹ� �׶� set
   */
  function setOffsetTop(data, type) {
    deviceType = type;
    mainData = data;

    if (!kurlyMain.trackerStart) {
      setTimeout(function () {
        setOffsetTop(data, type);
      }, 500);
      return false;
    }

    var $target,
      $item,
      _item = {};

    $("#kurlyMain")
      .find("ul[data-section]")
      .each(function () {
        $target = $(this);
        if (
          SECTION_NAME.indexOf($target.data("section")) > -1 ||
          isSectionName($target.data("section"))
        ) {
          var _temp = {},
            itemTop = null,
            numNameCount = 1,
            sectionName = $target.data("section");
          $(this)
            .find("li")
            .each(function (idx) {
              $item = $(this);
              _temp.top = parseInt($item.offset().top, 10);
              _temp.bottom = parseInt($item.offset().top + $item.height(), 10);
              _temp.height = parseInt($item.height(), 10);

              if (idx === 0) {
                itemTop = _temp.top;
                _temp.name = sectionName;
                _setItem(_temp);
              } else {
                if (itemTop !== _temp.top) {
                  itemTop = _temp.top;
                  numNameCount++;
                  _temp.name = sectionName + "_" + numNameCount;
                  _setItem(_temp);
                }
              }
              $item.attr("data-name", _temp.name);
            });
        }
      });
    function isSectionName(target) {
      var sectionPrefix = ["theme_goods_", "special_deal_"];
      var isInclude = false;
      var result,
        i,
        len = 2,
        num;
      for (i = 0; i < len; i++) {
        num = i === 0 ? 12 : 13;
        result = target.slice(0, num) === sectionPrefix[i];
        if (result) {
          i = len;
        }
      }
      return isInclude ? false : result;
    }
    function _setItem(temp) {
      _item.name = temp.name;
      _item.top = temp.top;
      _item.bottom = temp.bottom;
      _item.height = temp.height;
      _SET_SECTION.push(_item);
      _item = {};
    }

    scrollEvent();
  }

  /**
   * �ӵ����� : ��ũ�� ����Ȯ��(0.3��)
   */
  function scrollEvent() {
    var winTop = 0,
      now = new Date(),
      timeOff = false,
      delay = 300,
      timer;

    $(window)
      .scroll(function () {
        now = new Date();
        winTop = $(this).scrollTop();
        if (!timeOff) {
          timeOff = true;
          if (timer !== null) {
            clearTimeout(timer);
          }
          timer = setTimeout(scrollDetect, delay);
        }
      })
      .scroll();

    function scrollDetect() {
      if (new Date() - now < delay) {
        if (timer !== null) {
          clearTimeout(timer);
        }
        timer = setTimeout(scrollDetect, delay);
      } else {
        timeOff = false;
        scrollFocus(winTop);
      }
    }
  }

  /**
   * ��ġ����, ��Ŀ�� ��ġ Ȯ��
   * ���� �Ź� ���� �ؾ� �ϳ�? ���� ���� �� �� �ٿ�ε� ��� ������ ���� �ش� �̺�Ʈ ������ ���������� ��ȯ�Ǿ����� ����
   * ���� ȭ�鿡�� ������°� 70% �̻� �̸�, ������ ����
   * focusEventCheck : �ش� �����ȿ��� �����Ͻÿ��� �̺�Ʈ 1ȸ�� �����ϱ� ���� üũ�뺯��
   * scrollFocus(top, section_id, auto) : ���� | �ش� ���� ���̵� | ��� �ڵ� �Ѹ�����
   */
  function scrollFocus(top, name, auto) {
    var $headerHeight =
      deviceType === "mobile" ? $("#header").height() || 0 : 0;
    var $appBnrHeight = $("#appBanner").height() || 0;
    var $gnbHeight = $("#gnb").height() || 0;
    var $lnbMenuHeight =
      deviceType === "mobile" ? $("#lnbMenu").height() || 0 : 0;
    var $userMenuHeight =
      deviceType === "mobile" ? $("#userMenu").height() || 0 : 0;
    var $appDownBnrHeight = $("#branch-banner-iframe").height() || 0;
    var $winHeight = $(window).height();
    var _focusArea = {};

    _focusArea.topHeight = parseInt(
      $headerHeight + $appBnrHeight + $lnbMenuHeight + $gnbHeight,
      10
    );
    _focusArea.top = parseInt(top + _focusArea.topHeight, 10);
    _focusArea.height = parseInt(
      $winHeight - $userMenuHeight - $appDownBnrHeight - _focusArea.topHeight,
      10
    );
    _focusArea.bottom = _focusArea.top + _focusArea.height;
    var i,
      len = _SET_SECTION.length,
      top,
      bottom;
    /**
     * �̸� Ȯ�� => ��ġ Ȯ�� => �̺�Ʈ ����
     * ��ũ�� �̺�Ʈ ���� 1ȸ �߻��� �ش� ��ġ(70%) ���� ���� �ٽ� ��ġ�� ���ԵǸ� �ٽ� �̺�Ʈ ����
     * �����̵� �̺�Ʈ �߻��Ǹ� �̺�Ʈ ����
     */

    for (i = 0; i < len; i++) {
      top =
        100 -
        parseInt(
          ((_focusArea.top - _SET_SECTION[i].top) / _SET_SECTION[i].height) *
            100,
          10
        );
      bottom =
        100 -
        parseInt(
          ((_focusArea.bottom - _SET_SECTION[i].bottom) /
            _SET_SECTION[i].height) *
            100,
          10
        );

      if (top > 70 && bottom < 130) {
        if (
          typeof _SET_SECTION[i].event === "undefined" ||
          _SET_SECTION[i].event !== i
        ) {
          if (typeof auto !== "undefined" && auto) {
            return false;
          }
          _SET_SECTION[i].event = i;
          setActionData(_SET_SECTION[i].name);
        }

        if (typeof name !== "undefined" && _SET_SECTION[i].name === name) {
          setActionData(name);
        }
      }

      // ��ġ ����� �ʱ�ȭ
      if (_SET_SECTION[i].event === i && (top <= 70 || bottom >= 130)) {
        _SET_SECTION[i].event = null;
      }
    }
  }

  /**
   * �����ؾ� �ϴ� ������ set
   */
  function setActionData(name) {
    var mdCheck = {},
      landingUrl,
      _data = {},
      i,
      len = mainData.length,
      _event_name,
      type;

    landingUrl =
      deviceType === "pc"
        ? "/shop/goods/goods_view.php?&goodsno="
        : "/m2/goods/view.php?=&goodsno=";

    /**
     * �����, ����Ʈ��,  ����
     */
    for (i = 0; i < len; i++) {
      if (isNameCheck(mainData[i].section_id)) {
        if (typeof mainData[i].products !== "undefined") {
          type = "products";
          _data = mainData[i].products;
        }
        if (typeof mainData[i].banners !== "undefined") {
          type = "banners";
          _data = mainData[i].banners;
        }
        if (typeof mainData[i].categories !== "undefined") {
          mdCheck.no = mainData[i].moreLink;
          mdCheck.name = mainData[i].moreName;
        }
        if (typeof mainData[i].reviews !== "undefined") {
          type = "products";
          _data = mainData[i].reviews;
        }
      }
    }
    function isNameCheck(sectionId) {
      if (name === sectionId || name.indexOf(sectionId) !== -1) {
        _event_name = "impression_recommendation_" + sectionId;
        return true;
      }
      return false;
    }

    /**
     *  ���� ȭ�鿡 ���� �ִ� ��ǰ�� ���� �ҷ��� �ش� �̺�Ʈ�� Ư�� Ŭ���� �ľ� ��
     *  �ε��� �� ��������
     */
    var $target = $("[data-name = " + name + "]");
    var $targetParent = $("[data-section = " + name + "]");
    var $targetTitle = $target.closest("[data-title]");
    var $title = $targetTitle.data("title");
    var indexArr = [],
      $item;

    if ($target.parent().find(".swiper-slide-active").length > 0) {
      $item = $target.parent().find(".swiper-slide-active");
      indexArr.push($item.data("index"));
      if (type === "products") {
        indexArr.push($item.next().data("index"));
      }
    } else if (
      typeof $targetParent.data("total") !== "undefined" &&
      deviceType === "pc"
    ) {
      /**
       *    count => �ѹ��� �������� ������ ��(��ǰ ������ �����ؾ� �ϴ� ����)
       *    current => �ѹ��� �������� ������ ���� paging �� (count �� 4���϶� ��ü ������ ���� 4 ��� 1, ��ü ������ ���� 5 ��� 2)
       *    total => ��ü ������ ����
       */
      var count = $targetParent.data("count");
      var current = $targetParent.data("current") + 1;
      var total = $targetParent.data("total");
      var base;

      base = (current - 1) * count;
      if (current === Math.ceil(total / count)) {
        base = base - (count - (total % count));
      }

      /**
       * ���� ȭ�鿡�� ����տ� �ִ� item + i
       */
      for (i = 0; i < count; i++) {
        indexArr.push(base + 1 + i);
      }
    } else {
      $target.each(function () {
        indexArr.push($(this).data("index"));
      });
    }

    var _action_data = {},
      lenArr = indexArr.length,
      num;
    for (i = 0; i < lenArr; i++) {
      _action_data.selection_type = "content";
      _action_data.position = indexArr[i];

      num = indexArr[i] - 1;
      if (typeof _data[num] === "undefined") {
        return;
      }
      _action_data.url =
        type === "products"
          ? landingUrl + _data[num].no || null
          : _data[num].landing_url || null;
      _action_data.package_id = type === "products" ? _data[num].no : null;
      _action_data.package_name = type === "products" ? _data[num].name : null;
      _action_data.primary_category_id = mdCheck.no || null;
      _action_data.primary_category_name = mdCheck.name || null;
      _action_data.origin_price =
        type === "products" ? _data[num].original_price : null;
      _action_data.price = type === "products" ? _data[num].price : null;
      if ($title !== null && typeof $title !== "undefined") {
        _action_data.title = $title;
      }
      sendData(_event_name, _action_data);
    }
  }

  /**
   * �̺�Ʈ (������)
   */
  function sendData(eventName, _action_data) {
    KurlyTracker.setAction(eventName, _action_data).sendData();
  }

  return {
    setOffsetTop: setOffsetTop,
    scrollFocus: scrollFocus,
  };
})();
