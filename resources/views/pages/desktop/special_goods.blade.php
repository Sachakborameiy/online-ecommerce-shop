@include('layouts.desktop.header')
@include('layouts.desktop.menu')

<div id="main">
  <div id="content">

    <div id="qnb" class="quick-navigation">
    </div>
    <style>
    #mainEvent li {
      padding-bottom: 10px
    }

    #mainEvent a {
      display: block;
      overflow: hidden;
      position: relative
    }

    #mainEvent .cover {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: #5f0080;
      background-position: 50% 50%;
      background-repeat: no-repeat;
      opacity: 0;
      -webkit-transition: opacity 0.5s;
      transition: opacity 0.5s
    }

    #mainEvent a:hover .cover {
      opacity: 1;
      -webkit-transition: opacity 0.5s;
      transition: opacity 0.5s
    }
    </style>
    <div class="page_aticle">
      <div id="mainEvent" class="page_section section_event">
        <ul class="list">
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=640" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/9d952b5c13d5fbf43f909e40ad9c1e26.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=607" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/ba5bd784fdbe65fe0fc73b49f47ce2bd.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=608" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/79a6a4a3a5242a5db4854d22ce2ad41e.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=642" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/85d28174f9943fc905e0bc151ecf8eae.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=576" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/12d404f34b87b3bfe08b3cbf941d6514.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0823/seafood" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/ed5f7dd37bed018b990afa5a6108b1cd.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=635" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/c41c820677c6240d58fa70f3951e7af9.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=634" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/cf5722229e4a64efae38c916d37bedda.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=630" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/52b4ab95b4ca61abb572f2d55baceba5.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=717" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/153566b83ecbe09872874e526bd7f284.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=641" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/3f0fcb51fbe0018c81551eaa1525ede1.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=622" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/d81815ab7f07e4ac45e2d9a7f6e6a5a8.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0826/beautyWeek"
              data-git="84013, 84016, 84012, 84017">
              <img src="//img-cf.kurly.com/shop/data/event/d4608e488224d549a1808966e291a907.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=619" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/d3742874314f34be4bcb4c8932aef9ed.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=617" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/6d0b9ffd99a26cebe6a3820e985658bb.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=616" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/63dde86d1e3c6f29d42c538a80b014dd.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=614" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/80b76bb2c2d4b44f39d307dc37affb7b.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=613" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/fa59887ebe239d3c14f8d97a1ac5a197.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=611" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/dcc4c1cb5ccf7617aafe07051244488c.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=610" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/f71c80b99dfb563d3502fd5defdb3877.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=741" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/7a0b9b175e7a5f85629de5526c3ca03f.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=781" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/5193e789706965b7404ce83242e07fb3.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=639" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/63d23358341331bd3c00acce857775cb.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=638" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/0389995f1f8761b98f373d885abb534e.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=637" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/4ac36de28b0a9bb9de22bda706cf97b4.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=633" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/ea58ebb3c460915426c2d54a9be07baf.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=631" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/5a42f5f93a6941ed8b1681c417831b5f.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=629" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/59a9571ec47b15c5a97a26d66fba3159.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=626" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/be6840d7d664733246a9015ac653e0d4.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=621" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/1d5fd146e86a9817c121917263cb52cb.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=620" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/b2dfe4b11b28c24f3e7dc9da2b42b9b2.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=625" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/dd408751ee915b5dd1068c1d6c4dfcda.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=716" data-git="76446">
              <img src="//img-cf.kurly.com/shop/data/event/5aca05a482ca2276266b0d211665cffd.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=713" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/23861fadcf6c123d1dfb12caab390218.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=623" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/ee4168cde8885efc361e3d28ecd39ebf.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=618" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/6f0bf8fcf6c35a8461effe57f0dd7158.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=615" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/f481f0aa5618aff27260e9827ee37525.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/goods/goods_list.php?category=609" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/3520f911e8b23ce1c1e5ec7d53ddd65f.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0823/review" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/fcc65a8eca58f11ffcb5f40cb12a29c7.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0817/thanks_giving" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/91fd14139c66d861213166879f1521cd.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0817/recommend" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/9ab755b92c0a6d4915620ef78cbf1624.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=samsung" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/64bde8c5561084ba2e938c6641c1d5a5.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=spay" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/5045f8fdfb0ff62ab59390e805c620e2.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=toss" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/bf32a5646c8b15f1b14c1ceeec577329.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=kakaopay" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/091fa781dfaa8c64765c348be550bb20.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=chai" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/3f2378d28a1b296729652bb520b8bb0e.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=payco" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/9fba78a7bd855b86cc55c7e0908fd534.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2021/0614/fresh" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/5fc20bdcdc298ed88edba513a534d46f.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/event/kurlyEvent.php?htmid=event/2020/1222/table" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/a86816eec96f428f2beb06851c3f3751.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=friend" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/44a45efa3008e48750c12a5b6c1e1862.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=basket" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/ff2e533b9562a984f7e7326e09ab0284.jpg" alt="">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/shop/main/html.php?htmid=event/kurly.htm&amp;name=lovers" data-git="">
              <img src="//img-cf.kurly.com/shop/data/event/81d8528501b33b8e07eb457388a20467.jpg" alt="">
            </a>
          </li>
        </ul>
      </div>
    </div>
    <script>
    // KM-1483 Amplitude
    KurlyTracker.setScreenName('event_list');

    $('#mainEvent a').on('click', function(e) {
      e.preventDefault();
      var $target = $(this);
      var _action_data = {
        url: $target.attr('href') || null,
        position: $target.parent().index() + 1 || null,
        package_id: $target.data('git') || null,
      }
      KurlyTracker.setEventInfo($target.attr('href')).setAction('select_event_list_banner', _action_data)
    .sendData();


      if (e.ctrlKey) {
        returnUrl = window.open($target.attr('href'));
      } else if (e.shiftKey) {
        returnUrl = window.open($target.attr('href'), '', '_blank');
      } else {
        returnUrl = location.href = $target.attr('href');
      }
    });
    </script>
  </div>
</div>

@include('layouts.desktop.footer')