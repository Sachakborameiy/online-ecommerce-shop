<!DOCTYPE html>
<html lang="ko">

<!-- Mirrored from www.kurly.com/m2/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Aug 2021 06:26:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=euc-kr" /><!-- /Added by HTTrack -->

<head>
  <meta charset="euc-kr">
  <script type="text/javascript"
    src="https://bam.nr-data.net/1/NRJS-5dec146893a58b07e31?a=602251426&amp;v=1210.e2a3f80&amp;to=MlZUZhdUXkoCAkBQDQscY0AMGl0LTAhaXQcdHUZaFQ%3D%3D&amp;rst=2974&amp;ck=1&amp;ref=https://www.kurly.com/m2/index.php&amp;ap=47&amp;be=1584&amp;fe=2899&amp;dc=2601&amp;perf=%7B%22timing%22:%7B%22of%22:1630044823179,%22n%22:0,%22u%22:1449,%22r%22:1,%22ue%22:1449,%22re%22:834,%22f%22:834,%22dn%22:834,%22dne%22:834,%22c%22:834,%22ce%22:834,%22rq%22:835,%22rp%22:1431,%22rpe%22:1701,%22dl%22:1460,%22di%22:2584,%22ds%22:2584,%22de%22:2615,%22dc%22:2898,%22l%22:2898,%22le%22:2905%7D,%22navigation%22:%7B%22ty%22:1,%22rc%22:2%7D%7D&amp;fp=2392&amp;fcp=2876&amp;at=HhFXEF9OTUQ%3D&amp;jsonp=NREUM.setToken">
  </script>
  <script async="" src="https://cdn.branch.io/branch-latest.min.js"></script>
  <script src="https://js-agent.newrelic.com/nr-1210.min.js"></script>
  <script type="text/javascript" async=""
    src="https://www.google-analytics.com/gtm/js?id=GTM-MRW9DRV&amp;cid=1171527912.1629777417"></script>
  <script type="text/javascript" integrity="sha384-vYYnQ3LPdp/RkQjoKBTGSq0X5F73gXU3G2QopHaIfna0Ct1JRWzwrmEz115NzOta"
    crossorigin="anonymous" async="" src="https://cdn.amplitude.com/libs/amplitude-5.8.0-min.gz.js"></script>
  <script async="" src="//www.googletagmanager.com/gtm.js?id=GTM-MRW9DRV"></script>
  <script async="" src="{{ asset('js/analytics.js') }}"></script>
  <script type="text/javascript">
  (window.NREUM || (NREUM = {})).loader_config = {
    licenseKey: "NRJS-5dec146893a58b07e31",
    applicationID: "602251426"
  };
  window.NREUM || (NREUM = {}), __nr_require = function(t, e, n) {
    function r(n) {
      if (!e[n]) {
        var i = e[n] = {
          exports: {}
        };
        t[n][0].call(i.exports, function(e) {
          var i = t[n][1][e];
          return r(i || e)
        }, i, i.exports)
      }
      return e[n].exports
    }
    if ("function" == typeof __nr_require) return __nr_require;
    for (var i = 0; i < n.length; i++) r(n[i]);
    return r
  }({
    1: [function(t, e, n) {
      function r() {}

      function i(t, e, n) {
        return function() {
          return o(t, [u.now()].concat(f(arguments)), e ? null : this, n), e ? void 0 : this
        }
      }
      var o = t("handle"),
        a = t(8),
        f = t(9),
        c = t("ee").get("tracer"),
        u = t("loader"),
        s = NREUM;
      "undefined" == typeof window.newrelic && (newrelic = s);
      var d = ["setPageViewName", "setCustomAttribute", "setErrorHandler", "finished", "addToTrace",
          "inlineHit", "addRelease"
        ],
        p = "api-",
        l = p + "ixn-";
      a(d, function(t, e) {
          s[e] = i(p + e, !0, "api")
        }), s.addPageAction = i(p + "addPageAction", !0), s.setCurrentRouteName = i(p + "routeName", !0), e
        .exports = newrelic, s.interaction = function() {
          return (new r).get()
        };
      var m = r.prototype = {
        createTracer: function(t, e) {
          var n = {},
            r = this,
            i = "function" == typeof e;
          return o(l + "tracer", [u.now(), t, n], r),
            function() {
              if (c.emit((i ? "" : "no-") + "fn-start", [u.now(), r, i], n), i) try {
                return e.apply(this, arguments)
              } catch (t) {
                throw c.emit("fn-err", [arguments, this, t], n), t
              } finally {
                c.emit("fn-end", [u.now()], n)
              }
            }
        }
      };
      a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","), function(t, e) {
        m[e] = i(l + e)
      }), newrelic.noticeError = function(t, e) {
        "string" == typeof t && (t = new Error(t)), o("err", [t, u.now(), !1, e])
      }
    }, {}],
    2: [function(t, e, n) {
      function r(t) {
        if (NREUM.init) {
          for (var e = NREUM.init, n = t.split("."), r = 0; r < n.length - 1; r++)
            if (e = e[n[r]], "object" != typeof e) return;
          return e = e[n[n.length - 1]]
        }
      }
      e.exports = {
        getConfiguration: r
      }
    }, {}],
    3: [function(t, e, n) {
      function r() {
        return f.exists && performance.now ? Math.round(performance.now()) : (o = Math.max((new Date).getTime(),
          o)) - a
      }

      function i() {
        return o
      }
      var o = (new Date).getTime(),
        a = o,
        f = t(10);
      e.exports = r, e.exports.offset = a, e.exports.getLastTimestamp = i
    }, {}],
    4: [function(t, e, n) {
      function r(t) {
        return !(!t || !t.protocol || "file:" === t.protocol)
      }
      e.exports = r
    }, {}],
    5: [function(t, e, n) {
      function r(t, e) {
        var n = t.getEntries();
        n.forEach(function(t) {
          "first-paint" === t.name ? d("timing", ["fp", Math.floor(t.startTime)]) :
            "first-contentful-paint" === t.name && d("timing", ["fcp", Math.floor(t.startTime)])
        })
      }

      function i(t, e) {
        var n = t.getEntries();
        n.length > 0 && d("lcp", [n[n.length - 1]])
      }

      function o(t) {
        t.getEntries().forEach(function(t) {
          t.hadRecentInput || d("cls", [t])
        })
      }

      function a(t) {
        if (t instanceof m && !g) {
          var e = Math.round(t.timeStamp),
            n = {
              type: t.type
            };
          e <= p.now() ? n.fid = p.now() - e : e > p.offset && e <= Date.now() ? (e -= p.offset, n.fid = p
            .now() - e) : e = p.now(), g = !0, d("timing", ["fi", e, n])
        }
      }

      function f(t) {
        "hidden" === t && d("pageHide", [p.now()])
      }
      if (!("init" in NREUM && "page_view_timing" in NREUM.init && "enabled" in NREUM.init.page_view_timing &&
          NREUM.init.page_view_timing.enabled === !1)) {
        var c, u, s, d = t("handle"),
          p = t("loader"),
          l = t(7),
          m = NREUM.o.EV;
        if ("PerformanceObserver" in window && "function" == typeof window.PerformanceObserver) {
          c = new PerformanceObserver(r);
          try {
            c.observe({
              entryTypes: ["paint"]
            })
          } catch (v) {}
          u = new PerformanceObserver(i);
          try {
            u.observe({
              entryTypes: ["largest-contentful-paint"]
            })
          } catch (v) {}
          s = new PerformanceObserver(o);
          try {
            s.observe({
              type: "layout-shift",
              buffered: !0
            })
          } catch (v) {}
        }
        if ("addEventListener" in document) {
          var g = !1,
            h = ["click", "keydown", "mousedown", "pointerdown", "touchstart"];
          h.forEach(function(t) {
            document.addEventListener(t, a, !1)
          })
        }
        l(f)
      }
    }, {}],
    6: [function(t, e, n) {
      function r(t, e) {
        if (!i) return !1;
        if (t !== i) return !1;
        if (!e) return !0;
        if (!o) return !1;
        for (var n = o.split("."), r = e.split("."), a = 0; a < r.length; a++)
          if (r[a] !== n[a]) return !1;
        return !0
      }
      var i = null,
        o = null,
        a = /Version\/(\S+)\s+Safari/;
      if (navigator.userAgent) {
        var f = navigator.userAgent,
          c = f.match(a);
        c && f.indexOf("Chrome") === -1 && f.indexOf("Chromium") === -1 && (i = "Safari", o = c[1])
      }
      e.exports = {
        agent: i,
        version: o,
        match: r
      }
    }, {}],
    7: [function(t, e, n) {
      function r(t) {
        function e() {
          t(a && document[a] ? document[a] : document[i] ? "hidden" : "visible")
        }
        "addEventListener" in document && o && document.addEventListener(o, e, !1)
      }
      e.exports = r;
      var i, o, a;
      "undefined" != typeof document.hidden ? (i = "hidden", o = "visibilitychange", a = "visibilityState") :
        "undefined" != typeof document.msHidden ? (i = "msHidden", o = "msvisibilitychange") : "undefined" !=
        typeof document.webkitHidden && (i = "webkitHidden", o = "webkitvisibilitychange", a =
          "webkitVisibilityState")
    }, {}],
    8: [function(t, e, n) {
      function r(t, e) {
        var n = [],
          r = "",
          o = 0;
        for (r in t) i.call(t, r) && (n[o] = e(r, t[r]), o += 1);
        return n
      }
      var i = Object.prototype.hasOwnProperty;
      e.exports = r
    }, {}],
    9: [function(t, e, n) {
      function r(t, e, n) {
        e || (e = 0), "undefined" == typeof n && (n = t ? t.length : 0);
        for (var r = -1, i = n - e || 0, o = Array(i < 0 ? 0 : i); ++r < i;) o[r] = t[e + r];
        return o
      }
      e.exports = r
    }, {}],
    10: [function(t, e, n) {
      e.exports = {
        exists: "undefined" != typeof window.performance && window.performance.timing && "undefined" !=
          typeof window.performance.timing.navigationStart
      }
    }, {}],
    ee: [function(t, e, n) {
      function r() {}

      function i(t) {
        function e(t) {
          return t && t instanceof r ? t : t ? u(t, c, a) : a()
        }

        function n(n, r, i, o, a) {
          if (a !== !1 && (a = !0), !l.aborted || o) {
            t && a && t(n, r, i);
            for (var f = e(i), c = v(n), u = c.length, s = 0; s < u; s++) c[s].apply(f, r);
            var p = d[w[n]];
            return p && p.push([b, n, r, f]), f
          }
        }

        function o(t, e) {
          y[t] = v(t).concat(e)
        }

        function m(t, e) {
          var n = y[t];
          if (n)
            for (var r = 0; r < n.length; r++) n[r] === e && n.splice(r, 1)
        }

        function v(t) {
          return y[t] || []
        }

        function g(t) {
          return p[t] = p[t] || i(n)
        }

        function h(t, e) {
          l.aborted || s(t, function(t, n) {
            e = e || "feature", w[n] = e, e in d || (d[e] = [])
          })
        }
        var y = {},
          w = {},
          b = {
            on: o,
            addEventListener: o,
            removeEventListener: m,
            emit: n,
            get: g,
            listeners: v,
            context: e,
            buffer: h,
            abort: f,
            aborted: !1
          };
        return b
      }

      function o(t) {
        return u(t, c, a)
      }

      function a() {
        return new r
      }

      function f() {
        (d.api || d.feature) && (l.aborted = !0, d = l.backlog = {})
      }
      var c = "nr@context",
        u = t("gos"),
        s = t(8),
        d = {},
        p = {},
        l = e.exports = i();
      e.exports.getOrSetContext = o, l.backlog = d
    }, {}],
    gos: [function(t, e, n) {
      function r(t, e, n) {
        if (i.call(t, e)) return t[e];
        var r = n();
        if (Object.defineProperty && Object.keys) try {
          return Object.defineProperty(t, e, {
            value: r,
            writable: !0,
            enumerable: !1
          }), r
        } catch (o) {}
        return t[e] = r, r
      }
      var i = Object.prototype.hasOwnProperty;
      e.exports = r
    }, {}],
    handle: [function(t, e, n) {
      function r(t, e, n, r) {
        i.buffer([t], r), i.emit(t, e, n)
      }
      var i = t("ee").get("handle");
      e.exports = r, r.ee = i
    }, {}],
    id: [function(t, e, n) {
      function r(t) {
        var e = typeof t;
        return !t || "object" !== e && "function" !== e ? -1 : t === window ? 0 : a(t, o, function() {
          return i++
        })
      }
      var i = 1,
        o = "nr@id",
        a = t("gos");
      e.exports = r
    }, {}],
    loader: [function(t, e, n) {
      function r() {
        if (!R++) {
          var t = M.info = NREUM.info,
            e = v.getElementsByTagName("script")[0];
          if (setTimeout(u.abort, 3e4), !(t && t.licenseKey && t.applicationID && e)) return u.abort();
          c(E, function(e, n) {
            t[e] || (t[e] = n)
          });
          var n = a();
          f("mark", ["onload", n + M.offset], null, "api"), f("timing", ["load", n]);
          var r = v.createElement("script");
          0 === t.agent.indexOf("http://") || 0 === t.agent.indexOf("https://") ? r.src = t.agent : r.src = l +
            "://" + t.agent, e.parentNode.insertBefore(r, e)
        }
      }

      function i() {
        "complete" === v.readyState && o()
      }

      function o() {
        f("mark", ["domContent", a() + M.offset], null, "api")
      }
      var a = t(3),
        f = t("handle"),
        c = t(8),
        u = t("ee"),
        s = t(6),
        d = t(4),
        p = t(2),
        l = p.getConfiguration("ssl") === !1 ? "http" : "https",
        m = window,
        v = m.document,
        g = "addEventListener",
        h = "attachEvent",
        y = m.XMLHttpRequest,
        w = y && y.prototype,
        b = !d(m.location);
      NREUM.o = {
        ST: setTimeout,
        SI: m.setImmediate,
        CT: clearTimeout,
        XHR: y,
        REQ: m.Request,
        EV: m.Event,
        PR: m.Promise,
        MO: m.MutationObserver
      };
      var x = "" + location,
        E = {
          beacon: "bam.nr-data.net",
          errorBeacon: "bam.nr-data.net",
          agent: "js-agent.newrelic.com/nr-1210.min.js"
        },
        O = y && w && w[g] && !/CriOS/.test(navigator.userAgent),
        M = e.exports = {
          offset: a.getLastTimestamp(),
          now: a,
          origin: x,
          features: {},
          xhrWrappable: O,
          userAgent: s,
          disabled: b
        };
      if (!b) {
        t(1), t(5), v[g] ? (v[g]("DOMContentLoaded", o, !1), m[g]("load", r, !1)) : (v[h]("onreadystatechange",
          i), m[h]("onload", r)), f("mark", ["firstbyte", a.getLastTimestamp()], null, "api");
        var R = 0
      }
    }, {}],
    "wrap-function": [function(t, e, n) {
      function r(t, e) {
        function n(e, n, r, c, u) {
          function nrWrapper() {
            var o, a, s, p;
            try {
              a = this, o = d(arguments), s = "function" == typeof r ? r(o, a) : r || {}
            } catch (l) {
              i([l, "", [o, a, c], s], t)
            }
            f(n + "start", [o, a, c], s, u);
            try {
              return p = e.apply(a, o)
            } catch (m) {
              throw f(n + "err", [o, a, m], s, u), m
            } finally {
              f(n + "end", [o, a, p], s, u)
            }
          }
          return a(e) ? e : (n || (n = ""), nrWrapper[p] = e, o(e, nrWrapper, t), nrWrapper)
        }

        function r(t, e, r, i, o) {
          r || (r = "");
          var f, c, u, s = "-" === r.charAt(0);
          for (u = 0; u < e.length; u++) c = e[u], f = t[c], a(f) || (t[c] = n(f, s ? c + r : r, i, c, o))
        }

        function f(n, r, o, a) {
          if (!m || e) {
            var f = m;
            m = !0;
            try {
              t.emit(n, r, o, e, a)
            } catch (c) {
              i([c, n, r, o], t)
            }
            m = f
          }
        }
        return t || (t = s), n.inPlace = r, n.flag = p, n
      }

      function i(t, e) {
        e || (e = s);
        try {
          e.emit("internal-error", t)
        } catch (n) {}
      }

      function o(t, e, n) {
        if (Object.defineProperty && Object.keys) try {
          var r = Object.keys(t);
          return r.forEach(function(n) {
            Object.defineProperty(e, n, {
              get: function() {
                return t[n]
              },
              set: function(e) {
                return t[n] = e, e
              }
            })
          }), e
        } catch (o) {
          i([o], n)
        }
        for (var a in t) l.call(t, a) && (e[a] = t[a]);
        return e
      }

      function a(t) {
        return !(t && t instanceof Function && t.apply && !t[p])
      }

      function f(t, e) {
        var n = e(t);
        return n[p] = t, o(t, n, s), n
      }

      function c(t, e, n) {
        var r = t[e];
        t[e] = f(r, n)
      }

      function u() {
        for (var t = arguments.length, e = new Array(t), n = 0; n < t; ++n) e[n] = arguments[n];
        return e
      }
      var s = t("ee"),
        d = t(9),
        p = "nr@original",
        l = Object.prototype.hasOwnProperty,
        m = !1;
      e.exports = r, e.exports.wrapFunction = f, e.exports.wrapInPlace = c, e.exports.argsToArray = u
    }, {}]
  }, {}, ["loader"]);
  </script>
  <meta name="title" content="???????????? :: ????????? ?????????, ????????????">
  <meta name="description" content="Love Food, Love Life. ????????????! ?????? ?????? ??????, ??????, ?????? ???????????? ?????? ?????? ??? ????????? ?????????!">
  <meta property="og:title" content="???????????? :: ????????? ?????????, ????????????">
  <meta property="og:description" content="Love Food, Love Life. ????????????! ?????? ?????? ??????, ??????, ?????? ???????????? ?????? ?????? ??? ????????? ?????????!">
  <meta property="og:image" content="https://res.kurly.com/images/marketkurly/logo/logo_sns_marketkurly.jpg">
  <meta property="og:url" content="http://www.kurly.com//m2/index.php">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="www.kurly.com">
  <meta name="keywords" content="">
  <title>???????????? :: ????????? ?????????, ????????????</title>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <meta name="viewport"
    content="user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, height=device-height, viewport-fit=cover">
  <meta name="naver-site-verification" content="58ff7c242d41178131208256bfec0c2f93426a1d">
  <meta name="facebook-domain-verification" content="tyur3wmoos7t63tpkb7zosur6p98m1">
  <link rel="shortcut icon" href="https://res.kurly.com/images/marketkurly/logo/favicon_v2.png" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="57x57" href="https://res.kurly.com/images/marketkurly/logo/ico_57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="https://res.kurly.com/images/marketkurly/logo/ico_60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="https://res.kurly.com/images/marketkurly/logo/ico_72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="https://res.kurly.com/images/marketkurly/logo/ico_76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="https://res.kurly.com/images/marketkurly/logo/ico_114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="https://res.kurly.com/images/marketkurly/logo/ico_120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="https://res.kurly.com/images/marketkurly/logo/ico_144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="https://res.kurly.com/images/marketkurly/logo/ico_152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="https://res.kurly.com/images/marketkurly/logo/ico_180.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://res.kurly.com/images/marketkurly/logo/ico_32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://res.kurly.com/images/marketkurly/logo/ico_192.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://res.kurly.com/images/marketkurly/logo/ico_16.png">

  <script src="{{ asset('js/c1f07ee4a3fd45d5aa2ef4983ca9ad43.min.js') }}" crossorigin="anonymous"></script>
  <script>
  var environment = 'production';

  Sentry.onLoad(function() {
    Sentry.init({
      environment: environment,
      denyUrls: [
        /localhost/i,
        /dev\.kurly\.com/i
      ],
      sampleRate: 0.1,
    });
  });
  </script>
  <script src="{{ asset('js/common.bundlecd3d.js') }}"></script>
  <script src="{{ asset('js/mobile/commoncd3d.js') }}"></script>  

  <script type="text/javascript">  

  var _showCart = true;

  //?????? ?????????
  var review_like_check = false;

  function review_like(r_no, $self, type) {
    if (review_like_check) return;
    review_like_check = true;
    if (!!Number('0')) {
      $.ajax({
        type: "POST",
        url: '/shop/goods/ajax_review_like.php',
        dataType: 'json',
        data: {
          "mode": "add_like",
          "r_no": r_no
        },
        success: function(res) {
          if (res.state == 'success') {
            if (res.cnt) {
              if ($self) {
                $self.find('.num').text(res.cnt);
                if (type === 'best') $self.parents('.active').find('.board_subject .like span').text(res.cnt);
              }
              $('.review-like-cnt[data-sno="' + r_no + '"]').text(res.cnt);
            }
          } else {
            if (res.msg) {
              alert(res.msg);
            } else {
              alert('???????????? ????????? ?????? ?????? ??? ?????? ?????????????????? ????????????.');
            }
          }
          review_like_check = false;
        }
      });
    } else {
      if (confirm("???????????? ????????? ?????????. ?????????/???????????? ???????????? ?????????????????????????")) {
        document.location.href = "/m2/mem/login.php?return_url=" + encodeURIComponent(location.href);
      }
    }
  }

  //?????? ????????? ?????????
  function review_like_cnt(r_no) {
    $.ajax({
      type: "POST",
      url: '/shop/goods/ajax_review_like.php',
      dataType: 'json',
      data: {
        "mode": "cnt_like",
        "r_no": r_no
      },
      success: function(res) {
        if (res.cnt) {
          $('.review-like-cnt[data-sno="' + r_no + '"]').text(res.cnt);
        }
      }
    });
  }

  //?????? ?????????
  function review_addhit(sno) {
    $.ajax({
      type: "POST",
      url: '/shop/goods/ajax_review_addhit.php',
      dataType: 'json',
      data: {
        "sno": sno
      },
      success: function(res) {
        if (res.hit) {
          $('.review-hit-cnt[data-sno="' + sno + '"]').text(res.hit);
        }
      }
    });
  }
  </script>

  <script type="text/javascript">
  (function($) {
    var App = {};
    //alert(typeof $);
    App.isMobile = function() {
      return (/iphone|ipad|ipod|android|opera\smini|opera\smobi|symbian|blackberry|mini|windows\sce|palm/i
        .test(navigator.userAgent.toLowerCase()));
    };

    window.isChk = {
      isApp: function() {
        return (/mobile:Y/i.test(navigator.userAgent.toLowerCase()));
        //return false;
      }
    };

    App.isApp = function() {
      return ((/mobile:Y/i.test(navigator.userAgent.toLowerCase()))) ||
        /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent);
    };

    App.isAndroid = function() {
      return (/android/i.test(navigator.userAgent.toLowerCase()));
    };

    App.callApp = function(type, values, code) {
      try {
        var data = JSON.stringify({
          'header': {
            'resultCode': 200,
            'errorMsg': '',
            'cmdCode': code == undefined ? 3 : code
          },
          'body': {
            'functionType': type,
            'value': values
          }
        });

        if (App.isAndroid()) {
          window.Android.toNative(data);
        } else {
          data = "jscall://toNative?" + data;
          location.href = data;
        }
      } catch (e) {
        alert(e.message);
      }
    };

    App.callApi = function(methodType, params, callback) {
      var result = 0;
      var url = '/callApi.json';
      if (methodType.toUpperCase() == 'GET' || methodType.toUpperCase() ==
        'DELETE' /*|| methodType.toUpperCase() == 'PUT'*/ ) {
        url += '?' + $.param(params);
        params = {};
      }

      jQuery.ajax({
        type: methodType,
        dataType: 'json',
        data: params,
        url: url,
        'async': true,
        success: function(jsonData) {
          result = jsonData.apiResponse;
          callback(result);
        }
      });
    };

    App.getParameter = function(name) {
      var value = "";
      var url = window.location.href;
      var finded = false;
      var compare = name + "=";
      if (url.indexOf("?") > -1) {
        var queryString = url.substr(url.indexOf("?") + 1);
        var queryStringArr = queryString.split("&");
        for (var i = 0; i < queryStringArr.length; i++) {
          if (queryStringArr[i].substr(0, compare.length) == compare) {
            var param = queryStringArr[i].split("=");
            value = param[1];
            finded = true;
            break;
          }
        }
      }
      if (finded == false)
        return null;
      return value;
    };
    window.App = App;
  }(jQuery));
  var deviceToken = '';
  var platformType = '';
  var jwtToken =
    'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjYXJ0X2lkIjoiYTFjYWY2M2ItYmRiZi00ODFmLThmYzUtYzY3NmRkZDU0YzE0IiwiaXNfZ3Vlc3QiOnRydWUsInV1aWQiOm51bGwsIm1fbm8iOm51bGwsIm1faWQiOm51bGwsImxldmVsIjpudWxsLCJzdWIiOm51bGwsImlzcyI6Imh0dHA6Ly9ta3dlYi5hcGkua3VybHkuc2VydmljZXMvdjMvYXV0aC9ndWVzdCIsImlhdCI6MTYzMDA0ODQ0MSwiZXhwIjoxNjMwMDUyMDQxLCJuYmYiOjE2MzAwNDg0NDEsImp0aSI6IkxFZ2JPMmRaeXNmNzF3ZXkifQ.NHNKxnoZpz2vfl8WOId0NT-aCkb8lGtP6E081II_pXc';
  var apiDomain = 'https://api.kurly.com';
  var checkIsApp = false; // ?????????????????????????????? ??????????????????????????? ??????.????????? ???????????? ????????????

  checkIsApp = true;
  </script>

  <script src="{{ asset('js/es6-promise.min.js') }}"></script>
  <script src="{{ asset('js/es6-promise.auto.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
  <script src="{{ asset('js/vue.min.js') }}"></script>
  <script src="{{ asset('js/axioscd3d.js') }}"></script>
  <script src="{{ asset('js/mobile/defaultcd3d.js') }}"></script>
  <script src="{{ asset('js/mobile/indexcd3d.js') }}"></script>
  <script src="https://res.kurly.com/js/lib/jquery.cookie.js"></script>
  <script src="{{ asset('js/mobile/mobileCommon.js') }}"></script>
  <script src="{{ asset('js/mobile/mobileDisplay.js') }}"></script>
  <script src="{{ asset('js/mobile/swipe/swipe.js') }}"></script>
  <script src="{{ asset('js/mobile/iscroll/iscroll.js') }}"></script>
  <script src="{{ asset('js/mobile/mobileCommon2.js') }}"></script>
  <script type="text/javascript">
  var GD_VERSION = 201507;
  var GD_ISMEMBER = !!Number('0');

  function checkVersion(version) {
    return GD_VERSION >= version;
  } // ?????? ??????


  // function searchKw() {
  //   if (!$("[name=kw]").val()) {
  //     alert("?????? ???????????? ????????? ????????? ????????????");
  //     return false;
  //   }
  // }

  function getMobileHomepath() {
    //??? URL ????????? ???PATH??? ?????????. ???????????? ?????? ?????? ???????????? ????????????  2012-09-20 khs
    var path1 = document.location.pathname;

    if (path1.charAt(0) == '/') {
      path1 = path1.substring(1);
    }
    var x = path1.split("/");

    return x[0];
  }
  window.onload = function() {
    /**
     * @author kurly-jhlim
     * @description ????????? ?????? ????????? ?????? ????????? ?????? ???????????? ????????????.
     */

    if (sessionStorage.getItem('hasLogin') === null) {
      sessionStorage.setItem('hasLogin', webStatus.isSession);
    }

    const hasRegistered = sessionStorage.getItem('hasRegistered');
    const hasChanged = sessionStorage.getItem('hasChanged');
    if (hasRegistered === 'YES' || hasChanged === 'YES') {
      sessionStorage.removeItem('noNeedToPrint');
    }

    const hasLogin = false;

    if (sessionStorage.getItem('hasLogin') !== hasLogin.toString()) {
      sessionStorage.removeItem('noNeedToPrint');
    }

    const noNeedToPrint = sessionStorage.getItem('noNeedToPrint');

    sessionStorage.setItem('hasLogin', hasLogin);

    const TARGET = document.querySelector('#sectionLocation');

    // kurly-jhlim - ??????????????? ??? ??????????????? ????????????.
    const isMain = (() => {
      const pages = ['/m2/index.php', 'view=mainSnb', '/m2/event.php'];
      let flag = false;
      pages.some((page) => {
        if (location.href.indexOf(page) > -1) {
          return flag = true;
        }
      });
      return flag;
    })();

    if (!isMain && sessionStorage.getItem('hasPrintedAtMain') === 'YES') {
      sessionStorage.removeItem('hasPrintedAtMain');
    }

    if (TARGET === null) return false;

    const hasPrintedAtMain = sessionStorage.getItem('hasPrintedAtMain') === 'YES';

    const ADDR_MSG = {
      CONF: '??? ???????????? ??????????',
      MDFY: '???????????? ?????????????????????.',
      NEW: '??? ???????????? ?????????????????????.',
      NO: '???????????? ????????????<br>?????? ????????? ????????? ???????????????!',
    }

    const tmplMarker = (type) => {
      let URL = '';
      switch (type) {
        case 'LIST':
          URL = `/m2/myp/destination/list.php?from=marker&returnPath=${location.pathname}${location.search}`;
          break;
        case 'SEARCH_NO':
          URL = '/m2/myp/destination/chkAddress.php?from=marker&guest=1';
          break;
        case 'NO_LOGIN':
          URL = '/m2/myp/destination/chkAddress.php?from=marker&guest=1';
          return URL;
          break;
        case 'SEARCH':
          URL = '/m2/myp/destination/chkAddress.php?from=marker';
          break;
        default:
          URL = '/m2/myp/destination/chkAddress.php?from=marker';
      }
      const tmpl = `<a class="location" href="${URL}">??????????????? ????????????</a>`;
      return tmpl;
    }

    const tmplNoti = () => {
      const tmpl = `
        <div class="location_status">
          <p class="addr"></p>
          <p class="txt"></p>
        </div>
      `;
      return tmpl;
    };

    class ApiInterface {
      constructor(method, url) {
        this.method = method;
        this.url = url;
      }

      dispatch() {
        return kurlyApi({
            method: this.method,
            url: this.url,
          })
          .then(function(res) {
            return res;
          })
          .catch(function(err) {
            return err;
          });
      };
    }

    function postToken(url) {
      const instance = new ApiInterface('post', url);
      return instance.dispatch();
    }

    function getAddress(url) {
      const instance = new ApiInterface('get', url);
      return instance.dispatch();
    }

    const GUEST_URL = '/v3/auth/guest';
    const CART_URL = '/cart/v1/cart';
    const ADDR_URL = '/addressbook/v1/cart/check-base-address-notification?ver=1';

    /**
     * ??????????????? ???????????? ????????? amplitude ??? userProperty ????????????
     *
     * @param  address - ?????? ??????
     * @param  curClusterCenterCode - ?????? ????????????
     */
    function chkCenterCode(address, curClusterCenterCode) {
      if (address !== '') {
        const prevClusterCenterCode = sessionStorage.getItem('cluster_center_code');

        if (prevClusterCenterCode !== curClusterCenterCode) {
          // KM-5133 : amplitude userProperties ???????????? (????????????)
          const userProperties = {
            center_code: curClusterCenterCode,
          };
          KurlyTracker.setUserProperties(userProperties);
          sessionStorage.setItem('cluster_center_code', curClusterCenterCode);
        }
      } else {
        sessionStorage.removeItem('cluster_center_code');
      }
    }

    function hideAni() {
      const tooltip = $('.location_status');
      tooltip && setTimeout(() => {
        tooltip.animate({
          opacity: 0,
        }, 300, () => {
          tooltip.remove();
        });
      }, 3000);
    }

    // ???????????? ????????? ????????? ????????? ?????? ?????????.
    let ADDR_INFO = {}

    if (!hasLogin) {
      postToken(GUEST_URL).then(() => {
        getAddress(CART_URL).then((res) => {
          const data = res.data.data;
          // php ????????? ????????? ??????????????? '\' ??????
          const {
            address
          } = data;

          // ???????????? ????????? ????????? ????????? ?????? ?????????.
          ADDR_INFO = {
            addr: data.base_address_type === 'R' ? data.road_address : data.address,
            addr_sub: data.address_sub,
            typeHan: data.delivery_type === 'direct' ? '????????????' : (data.delivery_type === 'indirect' ?
              '????????????' : '????????????'),
            type: data.delivery_type,
            url: tmplMarker('NO_LOGIN')
          };

          if (!appResult.appCheck) {
            chkCenterCode(address, data.cluster_center_code);
          }

          TARGET.innerHTML = tmplMarker('SEARCH_NO');
          if ((address === '' && noNeedToPrint !== 'YES') || (address === '' && !hasPrintedAtMain)) {
            TARGET.insertAdjacentHTML('beforeend', tmplNoti());
            TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.NO;
            sessionStorage.setItem('noNeedToPrint', 'YES');
            sessionStorage.setItem('isDeliveryCartPut', 'false');
          } else if (hasRegistered === 'YES') {
            TARGET.insertAdjacentHTML('beforeend', tmplNoti());
            TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.NEW;
            sessionStorage.removeItem('hasRegistered');
            sessionStorage.setItem('noNeedToPrint', 'YES');
            sessionStorage.setItem('isDeliveryCartPut', 'true');
          }
          if (isMain && !hasPrintedAtMain) {
            sessionStorage.setItem('hasPrintedAtMain', 'YES');
          }
          hideAni();
        });
      });
    } else {
      getAddress(ADDR_URL).then((res) => {
        const {
          is_base_address: isDefault,
          base_address_type: addrType,
          address,
          road_address: roadAddress,
          cluster_center_code: clusterCenterCode
        } = res.data.data;

        if (!appResult.appCheck) {
          chkCenterCode(address, clusterCenterCode);
        }

        if (!isDefault && address !== '') {
          TARGET.innerHTML = tmplMarker('LIST');
          if (noNeedToPrint !== 'YES') {
            TARGET.insertAdjacentHTML('beforeend', tmplNoti());
            if (hasChanged === 'YES') {
              TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.MDFY;
              sessionStorage.removeItem('hasChanged');
            } else if (hasRegistered === 'YES') {
              TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.NEW;
              sessionStorage.removeItem('hasRegistered');
            } else {
              TARGET.querySelector('p.addr').innerHTML = addrType === 'R' ? roadAddress : address;
              TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.CONF;
            }
            sessionStorage.setItem('noNeedToPrint', 'YES');
            sessionStorage.setItem('isDeliveryCartPut', 'true');
          }
        } else if (address === '') {
          if (isMain && !hasPrintedAtMain) {
            TARGET.innerHTML = tmplMarker('SEARCH_NO');
            TARGET.insertAdjacentHTML('beforeend', tmplNoti());
            TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.NO;
            if (hasChanged === 'YES') {
              sessionStorage.removeItem('hasChanged');
            }
            sessionStorage.setItem('noNeedToPrint', 'YES');
            sessionStorage.setItem('isDeliveryCartPut', 'false');
          } else {
            TARGET.innerHTML = tmplMarker('SEARCH');
            if (noNeedToPrint !== 'YES') {
              TARGET.insertAdjacentHTML('beforeend', tmplNoti());
              TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.NO;
              if (hasChanged === 'YES') {
                sessionStorage.removeItem('hasChanged');
              }
              sessionStorage.setItem('noNeedToPrint', 'YES');
              sessionStorage.setItem('isDeliveryCartPut', 'false');
            }
          }
        } else if (isDefault) {
          TARGET.innerHTML = tmplMarker('LIST');
          if (hasChanged === 'YES') {
            TARGET.insertAdjacentHTML('beforeend', tmplNoti());
            TARGET.querySelector('p.txt').innerHTML = ADDR_MSG.MDFY;
            sessionStorage.removeItem('hasChanged');
          }
          sessionStorage.setItem('noNeedToPrint', 'YES');
          sessionStorage.setItem('isDeliveryCartPut', 'true');
        }
        hideAni();
      });
    }

    // KM-4172 : amplitude 11???
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('btn_close_location')) { // ????????? ??????
        document.querySelector('#layerLocation').classList.remove('on');
      }

      if (event.target.classList.contains('location')) {
        KurlyTracker.setAction('select_top_shipping_address_button').sendData();

        if (!hasLogin && ADDR_INFO.addr !== '') {
          event.preventDefault();
          const TARGETLAYER = document.querySelector('#layerLocation');
          const addressFull = ADDR_INFO.addr_sub !== '' ? ADDR_INFO.addr + ', <br>' + ADDR_INFO.addr_sub :
            ADDR_INFO.addr;
          const tmplLayer = () => {
            const tmpl = `
              <div class="layer_addrview">
                <p class="addr">${addressFull}</p>
                <p class="type ${ADDR_INFO.type}">${ADDR_INFO.typeHan}</p>
                <div class="group_btn layer_btn2">
                  <span class="btn_type2"><button type="button" class="txt_type btn_close_location">??????</button></span>
                  <span class="btn_type1"><a href="${ADDR_INFO.url}" class="txt_type">????????? ??????</a></span>
                </div>
              </div>
            `;
            return tmpl;
          };
          TARGETLAYER.innerHTML = tmplLayer();
          TARGETLAYER.classList.add('on');
        }
      }
    }, false);
  }
  </script>
  <!-- <script src="../../../kurly-demo/js/mobile/data/skin_mobileV2/designgj/js/uicd3d.js"></script> -->
  <script src="{{  asset('js/mobile/ui.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/commoncd3d.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile/pagecd3d.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile/section1cd3d.css_ver=1.38.2.css') }}" />

  <script type="text/javascript" src="{{ asset('js/wcslog.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/mobile/naverCommonInflowScript.js') }}" id="naver-common-inflow-script"></script>

  <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-2K2GN0FFY0"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'G-2K2GN0FFY0', {
    'user_id': 'a1caf63b-bdbf-481f-8fc5-c676ddd54c14'
  });
  </script>

  <style>
  .async-hide {
    opacity: 0 !important
  }
  </style>
  <script type="text/javascript">
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-90734988-1', 'auto');
  ga('require', 'GTM-MRW9DRV');
  (function(a, s, y, n, c, h, i, d, e) {
    s.className += ' ' + y;
    h.start = 1 * new Date;
    h.end = i = function() {
      s.className = s.className.replace(RegExp(' ?' + y), '')
    };
    (a[n] = a[n] || []).hide = h;
    setTimeout(function() {
      i();
      h.end = null
    }, c);
    h.timeout = c;
  })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
    'GTM-MRW9DRV': true
  });

  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      '//www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-MRW9DRV');

  var uuidCheck = "";
  var cookie_uuid = null;

  function setCookieGa(cookieName, value) {
    var exdays = 365;
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
    document.cookie = cookieName + "=" + cookieValue + "; path=/;"
  }

  function getCookieGa(cookieName) {
    cookieName = cookieName + '=';
    var cookieData = document.cookie;
    var start = cookieData.indexOf(cookieName);
    var cookieValue = '';
    if (start != -1) {
      start += cookieName.length;
      var end = cookieData.indexOf(';', start);
      if (end == -1) end = cookieData.length;
      cookieValue = cookieData.substring(start, end);
    }
    return unescape(cookieValue);
  }

  function deleteCookieGa(cookieName) {
    var expireDate = new Date();
    //?????? ????????? ?????? ?????? ????????? ????????????.
    expireDate.setDate(expireDate.getDate() - 1);
    document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString() + "; path=/";
  }


  /* ????????? */
  if (uuidCheck !== "") {
    if (!getCookieGa('ga_uuid')) {
      setCookieGa('ga_uuid', uuidCheck);
    } else {
      if (getCookieGa('ga_uuid') !== uuidCheck) {
        deleteCookieGa('ga_uuid');
        setCookieGa('ga_uuid', uuidCheck); /* ????????? ??????????????? ?????? */
      }
    }
    ga('set', 'userId', uuidCheck);
    ga('send', 'pageview', {
      'dimension1': uuidCheck
    });
  } else {
    ga('send', 'pageview');
  }

  // GA ??? ??????(2016.11.22, ?????????)
  if (navigator.userAgent.indexOf('APP_AUTOBUILDER_IOS') != -1 &&
    (navigator.userAgent.toLowerCase().indexOf('iphone') != -1 ||
      navigator.userAgent.toLowerCase().indexOf('ipad') != -1)) {
    this.platform = 'ios';
  } else if (navigator.userAgent.indexOf('APP_AUTOBUILDER_ANDROID') != -1 &&
    navigator.userAgent.toLowerCase().indexOf('android') != -1) {
    this.platform = 'android';
  }
  </script>
  <script>
  // KM-1856 : amplitude ?????????
  (function(e, t) {
    var n = e.amplitude || {
      _q: [],
      _iq: {}
    };
    var r = t.createElement("script");
    r.type = "text/javascript";
    r.integrity = "sha384-vYYnQ3LPdp/RkQjoKBTGSq0X5F73gXU3G2QopHaIfna0Ct1JRWzwrmEz115NzOta";
    r.crossOrigin = "anonymous";
    r.async = true;
    r.src = "https://cdn.amplitude.com/libs/amplitude-5.8.0-min.gz.js";
    r.onload = function() {
      if (!e.amplitude.runQueuedFunctions) {
        console.log("[Amplitude] Error: could not load SDK")
      }
    };
    var i = t.getElementsByTagName("script")[0];
    i.parentNode.insertBefore(r, i);

    function s(e, t) {
      e.prototype[t] = function() {
        this._q.push([t].concat(Array.prototype.slice.call(arguments, 0)));
        return this
      }
    }
    var o = function() {
      this._q = [];
      return this
    };
    var a = ["add", "append", "clearAll", "prepend", "set", "setOnce", "unset"];
    for (var u = 0; u < a.length; u++) {
      s(o, a[u])
    }
    n.Identify = o;
    var c = function() {
      this._q = [];
      return this
    };
    var l = ["setProductId", "setQuantity", "setPrice", "setRevenueType", "setEventProperties"];
    for (var p = 0; p < l.length; p++) {
      s(c, l[p])
    }
    n.Revenue = c;
    var d = ["init", "logEvent", "logRevenue", "setUserId", "setUserProperties", "setOptOut", "setVersionName",
      "setDomain", "setDeviceId", "enableTracking", "setGlobalUserProperties", "identify", "clearUserProperties",
      "setGroup", "logRevenueV2", "regenerateDeviceId", "groupIdentify", "onInit", "logEventWithTimestamp",
      "logEventWithGroups", "setSessionId", "resetSessionId"
    ];

    function v(e) {
      function t(t) {
        e[t] = function() {
          e._q.push([t].concat(Array.prototype.slice.call(arguments, 0)))
        }
      }
      for (var n = 0; n < d.length; n++) {
        t(d[n])
      }
    }
    v(n);
    n.getInstance = function(e) {
      e = (!e || e.length === 0 ? "$default_instance" : e).toLowerCase();
      if (!n._iq.hasOwnProperty(e)) {
        n._iq[e] = {
          _q: []
        };
        v(n._iq[e])
      }
      return n._iq[e]
    };
    e.amplitude = n
  })(window, document);

  var amplitudeUid = uuidCheck;
  if (amplitudeUid === null) {
    amplitudeUid = 'a1caf63b-bdbf-481f-8fc5-c676ddd54c14';
  }

  amplitude.getInstance().init("5533c0aa41ff95090e8c73ab4263299f", amplitudeUid);
  </script>


  <script>
  // ???????????? JS?????? ?????? : app ver, app check,
  var appResult = {
    appCheck: false, // ??? ??????
    appDevice: false, // ??? ?????? (IOS, ANDROID)
    verCheck: [], // ??? ??????
    is_sess: false, // ????????? ?????? => ??????????????????
    isSession: false, // ????????? ??????
    is_release_build: false, // ??????(true), ??????(false) ??????.
    device: 'mobile',
    timestamp: parseInt("1630048450555", 10),
  }

  appResult.is_release_build = true;

  /* appResult ?????? ?????? */
  var webStatus = appResult;

  // Page url????????? js?????? ?????? : shop/config/urlVariable.php
  // var pageUrlVariable = JSON.parse('{"index":"\/m2\/index.php","event":"\/m2\/event.php","login":"\/m2\/mem\/login.php","find_id":"\/m2\/mem\/find_id.php","find_pwd":"\/m2\/mem\/find_pwd.php","find_pwd_auth":"\/m2\/mem\/find_pwd_auth.php","change_pwd":"\/m2\/mem\/change_pwd.php","menu_list":"\/m2\/myp\/menu_list.php","gnb":"\/m2\/gnb.php","search":"\/m2\/search.php","list":"\/m2\/goods\/list.php","new_product":"\/m2\/goods\/list.php?category=038","popular_product":"\/m2\/goods\/list.php?category=029","bargain":"\/m2\/goods\/list.php?category=015","view":"\/m2\/goods\/view.php","cart":"\/m2\/goods\/cart.php","orderlist":"\/m2\/myp\/orderlist.php","qna":"\/m2\/myp\/qna.php","qna_register":"\/m2\/myp\/qna_register.php","infoAsks":"\/m2\/html.php?htmid=app\/html\/write_info.htm&pageInfo=asks","infoQna":"\/m2\/html.php?htmid=app\/html\/write_info.htm&pageInfo=qna","review":"\/m2\/myp\/review.php","goods_qna_register":"\/m2\/goods\/goods_qna_register.php","goods_review_best":"\/m2\/goods\/goods_review_best.php","kurly_event":"\/m2\/event\/kurlyEvent.php?htmid=event","delivery_search":"\/m2\/event\/kurlyEvent.php?htmid=event\/delivery_search","event_friend":"\/m2\/event\/kurlyEvent.php?htmid=event\/friend\/","event_join":"\/m2\/event\/kurlyEvent.php?htmid=event\/join\/","lovers":"\/m2\/event\/lovers\/lovers.php","event_lovers":"\/m2\/event\/kurlyEvent.php?htmid=event\/lovers\/","kurly_old_event":"\/m2\/html.php?htmid=event\/","bulk_order":"\/m2\/html.php?htmid=myp\/bulk_order.htm","recipe_list":"\/m2\/board\/list.php?id=recipe","recipe_detail":"\/m2\/board\/view.php?id=recipe","notice_list":"\/m2\/board\/list.php?id=notice","notice_view":"\/m2\/board\/view.php?id=notice","faq":"\/m2\/service\/faq.php","customer":"\/m2\/service\/customer.php","orderview":"\/m2\/myp\/orderview.php","emoneylist":"\/m2\/myp\/emoneylist.php","couponlist":"\/m2\/myp\/couponlist.php","kurlypass":"\/m2\/myp\/kurlypass.php","myinfo":"\/m2\/myp\/myinfo.php","hack":"\/m2\/mem\/hack.php","join":"\/m2\/mem\/join.php","review_view":"\/m2\/myp\/review_view.php","order_cancel":"\/m2\/myp\/order_cancel.php","order_cancel_success":"\/m2\/myp\/order_cancel_success.php","order_cancel_fail":"\/m2\/myp\/order_cancel_fail.php","order":"\/m2\/ord\/order.php","settle":"\/m2\/ord\/settle.php","order_end":"\/m2\/ord\/order_end.php","order_fail":"\/m2\/ord\/order_fail.php","my_benefit":"\/m2\/proc\/my_benefit.php","guide":"\/m2\/proc\/guide.php","introduce":"\/m2\/introduce\/","service":"\/m2\/service\/","myp":"\/m2\/myp\/","qna_list":"\/m2\/goods\/goods_qna_list.php","wishlist":"\/m2\/myp\/wishlist.php","destination_list":"\/m2\/myp\/destination\/list.php"}');
  </script>

  <!-- <script src="../../../kurly-demo/js/mobile/common_js/kurlytracker/kurlytracker.js?ver=1.38.2"></script> -->



  <script src="{{ asset('js/facebookConversionscd3d.js') }}"></script>

  <script src="{{ asset('js/kakao.min.js') }}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    if (!appResult.appCheck) {
      // KM-4988 : amplitude userProperties ????????????
      var userProperties = {
        membership_level: '',
        cust_no: Number(''),
      };
      KurlyTracker.setUserProperties(userProperties);
    }

    if ($('#plusfriend-addfriend-button').length > 0) {
      Kakao.init('37a25ee08c7c7125675bdbc23a65b473');

      // ??????????????? ???????????? ????????? ???????????????.
      Kakao.PlusFriend.createAddFriendButton({
        container: '#plusfriend-addfriend-button',
        plusFriendId: '_xcSDxjxl' // ??????????????? ??? URL??? ????????? id??? ???????????????.
      });
    }
  });
  </script>

  <script type="text/javascript">
  function setCookie(cookieName, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
    document.cookie = cookieName + "=" + cookieValue + "; path=/;"
  }

  function getCookie(cookieName) {
    cookieName = cookieName + '=';
    var cookieData = document.cookie;
    var start = cookieData.indexOf(cookieName);
    var cookieValue = '';
    if (start != -1) {
      start += cookieName.length;
      var end = cookieData.indexOf(';', start);
      if (end == -1) end = cookieData.length;
      cookieValue = cookieData.substring(start, end);
    }
    return unescape(cookieValue);
  }
  </script>

  <script src="{{ asset('js/mobile/hybridcd3d.js') }}"></script>
  <style type="text/css" id="branch-iframe-css">
  body {
    -webkit-transition: all 0.375s ease;
  }

  #branch-banner-iframe {
    box-shadow: 0 0 5px rgba(0, 0, 0, .35);
    width: 1px;
    min-width: 100%;
    left: 0;
    right: 0;
    border: 0;
    height: 60px;
    z-index: 99999;
    -webkit-transition: all 0.25s ease;
    transition: all 00.25s ease;
  }

  #branch-banner-iframe {
    position: fixed;
  }

  @media only screen and (orientation: landscape) {
    body {
      margin-bottom: 60px;
    }

    #branch-banner-iframe {
      height: 60px;
    }
  }
  </style>
</head>

<body class="layout_purple branch-banner-is-active" style="margin-bottom: 60px; transition: all 0.375s ease 0s;">

  <div class="bg_loading loading" id="bgLoading" style="display: none;">
    <div class="loading_show"></div>
  </div>

  <div id="dynamic"></div>
  <div id="wrap" class="layout-main-wrapper" style="padding-top: 133px;">


    <div id="appBanner" style="">
      <a href="../event/kurlyEvent7da6.html?htmid=event/join/join_210825" id="eventLanding" class="link">
        <sapn class="txt">?????? ???????????? ???????????? <b>100???</b>??? ???????????????!</sapn>
      </a>
      <button id="bnrHeaderClose" class="btn_close">???????????? ????????????</button>
    </div>
    <script>
    // PROM-476 ????????? : GA) ????????? ?????????
    $('#eventLanding').on('click', function() {
      ga('send', 'event', 'click', 'general_header_sighup', location.href);
    });
    </script>

    <header id="header" class="header" style="top: 38px;">
      <h1 class="logo">
        <a href="../index.html" class="link_main"><span id="gnbLogoContainer"></span>
        <img src="{{ asset('images/marketkurly/logo/logo_type2_x2.png') }}" style="display: block !important;" alt="??????????????????"></a>
      </h1>
      <script>
      // ?????? ?????? ?????????
      $('#header .link_main').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        if (url.indexOf('https://www.kurly.com/') === 0) {
          url = window.location.origin + url;
        }

        KurlyTracker.setAction('select_main_logo', {
          "url": url
        }).sendData();
        location.href = url;
      });
      </script>
      <a href="javascript:history.back(); " class="link_back" role="button"><span class="screen_out">????????????</span></a>
      <div class="header_shortcut">
        <div id="sectionLocation">
          <a href="#" class="location"></a>
        </div>
        <a href="cart.html" class="cart_count" role="button">
          <span class="screen_out">??????????????? ??????</span>
          <span class="num_count" id="cart_item_count" style="display: none;"></span>
          <object type="image/svg+xml" data="https://res.kurly.com/kurly/ico/2021/cart_24_24_white_v3.svg"></object>
        </a>
        <script>
        $('#header .cart_count').on('click', function(e) {
          e.preventDefault();
          KurlyTracker.setAction('select_cart').sendData();
          location.href = $(this).attr('href');
        });
        </script>
      </div>
    </header>
    <div id="layerLocation"></div>
    <header id="header-bottom" class="menu_shortcut">
      <ul id="userMenu" class="list">
        <li><a href="../index-2.html" class="shortcut_home on">???</a></li>
        <li><a href="../gnb.html" class="shortcut_menu ">????????????</a></li>
        <li><a href="../search.html" class="shortcut_search ">??????</a></li>
        <li><a href="../mem/login.html" class="shortcut_mypage ">
            ????????????
            <span>
              <!---->
            </span></a></li>
      </ul>
    </header>

    <script src="{{ asset('js/mobile/usermenu_v1cd3d.js') }}"></script>
    <script>
    $(document).ready(function() {
      // #####################################################################
      userMenu.loginCheck = false;
    });
    // ????????? ?????????
    $('#header-bottom a').on('click', function(e) {
      e.preventDefault();
      var $index = $(this).closest('li').index(),
        _event_name;
      if ($index === 0) {
        _event_name = 'select_home_tab';
      } else if ($index === 1) {
        _event_name = 'select_category_tab';
      } else if ($index === 2) {
        // ????????? ????????????????????? ?????? ????????? ?????? ???????????? tab_name ?????? ?????? ????????? ????????????.
        KurlyTracker.setAction('select_search_tab').sendData();
        KurlyTracker.setScreenName('search').setTabName('search');
        location.href = $(this).attr('href');
      } else if ($index === 3) {
        _event_name = 'select_my_kurly_tab';
      }
      if ($index !== 2) { // ?????????
        KurlyTracker.setAction(_event_name).sendData();
        location.href = $(this).attr('href');
      }
    });
    </script>
    <script>
    // ????????? ????????? ?????? ????????? ?????? ??????
    var _timestamp = parseInt("1629959195250", 10);
    var _mid = "";
    var _midEnc = "";
    </script>

    <script type="text/javascript">
    // ???????????? ????????? ?????? ?????? ??????
    $.urlParam = function(name) {
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
      if (results === null) {
        return null;
      } else {
        return decodeURI(results[1]) || false;
      }
    }
    if (!window.webStatus.isSession && $.urlParam('list') === 'often') {
      location.href = "../mem/login7549.html?return_url=" + location.href;
    }
    </script>
    <style type="text/css">
    body {
      background-color: #fff;
    }

    #footer {
      display: none;
    }
    </style>