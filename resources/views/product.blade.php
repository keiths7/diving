<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no"> -->
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="description" content="Book your best diving trip，every diving trip with Dreamdivingtrip,the world’s best diving booking site.Your free personal diving assistant.">
    <meta name="keywords" content="diving vacation, diving vacations, diving vacation packages, diving vacation package, diving travel package, diving travel packages, diving travel, diving trip package, diving trip packages, diving trip,planning, hotel, hotels, motel, bed and breakfast, inn, guidebook, review, reviews, popular, plan, airfare, cheap, discount, map, maps, golf, ski, articles, attractions, advice, restaurants">
    <link href="/css/semantic.min_0c0c8ca561.css" rel="stylesheet">
    <link href="/css/product_17c97ab331.css" rel="stylesheet">
    <title>Dreamdivingtrip.com: Online Booking for Scuba Diving,Liveaboard and Courses all around the world</title>
</head>
<body id="product">
  <header class="ui following bar sticky">
      <div class="ui  menu ">
        <div class="item">
          <div class="ui logo shape">
            <div class="sides">
              <div class="active ui side">
                <!-- logo img2 -->
                <img class="ui  image"  src="/images/logo-black.png">
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="ui transparent left icon input">
            <input type="text" placeholder="Search...">
            <i class="search icon"></i>
          </div>
        </div>
        <div class="right  menu">
          <div class="item">Sign Up</div>
          <div class="item">Sign In</div>
        </div>
      </div>
  </header>
  <section class="first-sec">
    <img src="/images/index/top_bg.jpg" alt="">
  </section>
  <section class="second-sec grid-sec">
    <div class="ui container">
        <div class="ui  grid">
            <div class="p70 left column">
                <div class="ui breadcrumb">
                  <a class="section">Purchases</a>
                  <i class="right chevron icon divider"></i>
                  <a class="section">Profile</a>
                  <i class="right chevron icon divider"></i>
                  <div class="active section">Setting</div>
                </div>
                <h2 class="ui header">{{ $product->name }}</h2>
                <div class="ui icon">
                  <i class="marker icon"></i><span>{{ $product->positions[0]->country->name }},{{ $product->positions[0]->city->name }}</span>
                  <div class="ui large star rating" data-max-rating="5" data-rating="3"></div>
                </div>
            </div>
            <div class="p30 right column">
              <div class="ui label">${{ $product->price }}</div>
                <div class="ui form">
                  <div class="field">
                    <label>Product</label>
                    <select class="ui search dropdown">
                        <option value="">1Day/2Divers</option>
                        <option value="">3Day/2Divers</option>
                        <option value="">5Day/2Divers</option>
                    </select>
                  </div>
                  <div class="three fields">
                      <div class="field"><label for="">Start Date</label><input type="text" id="input_start_date"></div>
                      <div class="field"><label for="">End Date</label><input type="text" id="input_end_date"></div>
                      <div class="field">
                        <label for="">Divers</label>
                        <select class="ui dropdown" name="" id="" >
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                        </select>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <section class="third-sec grid-sec">
    <div class="ui container">
        <div class="ui  grid">
            <div class="p70 left  column">
                <div class="ui vertically divided grid">
                    <div class="row">
                        <div class="p30 left centered column">
                            <p>Main characteristics</p>
                        </div>
                        <div class=" p70 character column ">
                          @foreach($product->main_info[0] as $key => $val)
                            <p>{{ $key }} : {{ $val }}</p>
                          @endforeach
                            <!-- <p>Access：Boat</p>
                            <p>Current：Some current</p>
                            <p>Depth：12 to 30 m</p>
                            <p>Visibility：up to 30 m</p>
                            <p>Best dive period：All year</p>
                            <p>Time access：30min</p>
                            <p>Water temp：22 to 28 °C</p>
                            <p>Dive type：Cave</p>
                            <p class="streched">What to see:Divers can encounter reef sharks, rays,
                              lots of different pelagic fish and, of course, corals and coral reef fish.</p> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="p30 column">
                          <p>Spoken languages</p>
                          <p>Associated with</p>
                          <p>General facilities</p>
                          <P>Diving types</P>
                        </div>
                        <div class="p70 column">
                          <p>{{ $product->lang_str }}</p>
                          <p>{{ $product->shop->associated_with }}</p>
                          <p>{{ $product->shop->general_facilities }}</p>
                          <P>{{ $product->type }}</P>
                        </div>
                    </div>
                    <div class="row">
                        <div class="p30 column">
                          <p>Description</p>
                        </div>
                        <div class="p70 description column">
                          <p class="content">
                            {{ strip_tags($product->description) }}
                          </P>
                          <p class="more"><i>+</i> More</p>
                        </div>
                    </div>
                    <div class=" one column row images">
                      <div class="column">
                          @foreach($product->positions[0]->source as $key => $val)
                            @if($key == 3)
                              <div class="ui image more" data-img="/uploads/originals/{{ $val->file }}">
                                <div class="ui dimmer visible active">
                                  <div class="content">
                                    <div class="center">
                                      <div class="ui header">See all photos</div>
                                    </div>
                                  </div>
                                </div>
                                <img  src="/uploads/originals/{{ $val->file }}" alt="">
                              </div>
                            @else
                              <div class="ui image " data-img="/uploads/originals/{{ $val->file }}">
                                  <img src="/uploads/originals/{{ $val->file }}" alt="">
                              </div>
                            @endif
                          
                          <!-- <div class="ui image " data-img="/images/product/2.jpg">
                              <img src="/images/product/2.jpg" alt="">
                          </div>
                          <div class="ui image" data-img="/images/product/3.jpg">
                              <img src="/images/product/3.jpg" alt="">
                          </div> -->
                          
                          @endforeach
                          <!-- <div class="ui image " data-img="/images/product/1.jpg">
                              <img src="/images/product/1.jpg" alt="">
                          </div>
                          <div class="ui image " data-img="/images/product/2.jpg">
                              <img src="/images/product/2.jpg" alt="">
                          </div>
                          <div class="ui image" data-img="/images/product/3.jpg">
                              <img src="/images/product/3.jpg" alt="">
                          </div> -->
                        </div>
                    </div>
                    <div class=" one column row maps">
                      <div class="column">
                        <div class="map">
                           <img src="/images/product/map.jpg" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="p30 right column">
                <div class="ui form">
                    <span><img src="/images/product/visa.jpg" alt=""></span>
                    <div class="field">
                      <input type="text" placeholder="Card Number">
                    </div>
                    <div class="two fields">
                      <div class="field">
                        <input type="text" placeholder="MM/YY">
                      </div>
                      <div class="field">
                        <input type="text" placeholder="CVC">
                      </div>
                    </div>
                    <div class="ui submit teal fluid button">Instant Book</div>
                    <p>We will recommond a dive center foryou.Or you could <a href="">Pick</a> a dive center toserve your trip</p>
                </div>
            </div>
            <!-- 更多潜水点 -->
            <div class="row diving-sites">
              <div class="ui three column grid">
                <h3 class="ui header">Some related diving sites</h3>
                <div class="row">
                    @foreach($product->releated_product as $k => $v)
                    <div class="column">
                      <div class="ui image">
                        <img src="{{ $v->position_image }}" alt="">
                        <aside class="">$ {{ $v->price }}  </aside>
                        <p>{{ $v->name }}</p>
                        <p><span>tags</span></p>
                      </div>
                    </div>
                    @endforeach
                    <!-- <div class="column">
                      <div class="ui image">
                        <img src="/images/product/bottom_2.jpg" alt="">
                        <aside class="">$ 1029  </aside>
                        <p>Lorem ipsum dolor sit amet, sapien</p>
                        <p><span>wreck/big animal  Luxury PADI</span></p>
                      </div>
                    </div>
                    <div class="column">
                      <div class="ui image">
                        <img src="/images/product/bottom_3.jpg" alt="">
                        <aside class="">$ 1029  </aside>
                        <p>A description of this dive center</p>
                        <p><span>tags</span></p>
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
  <!--幻灯片 -->
  <div class="large-image-sec" id="mask">
      <div class="close" id="pptclose"><i class="angle down icon"></i></div>
      <div class="ui left arrow"><i class="angle left icon"></i></div>
      <div id="maskcontent">
          <div id="scroller">
             <ul id="imgul"></ul>
         </div>
     </div>
      <div class="ui right arrow"><i class="angle right icon"></i></div>
  </div>
  <!--footer  -->
  <section class="footer-sec ui black inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable inverted centered four column grid">
        <div class="row">
        <div class="column">
          <h4 class="ui inverted header">Dream Scubatrip</h4>
          <div class="ui inverted bolded divider "></div>
          <div class="ui inverted link list">
            <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">
              <i class="marker icon"></i>
              BEIJING
            </a>
            <div class="ui inverted divider"></div>
            <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">
              <i class="phone icon"></i>
              +86 18911189901
            </a>
            <div class="ui inverted divider"></div>
            <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">
              <i class="mail outline icon"></i>
              market@dreamdivingtrip.com
            </a>
          </div>
        </div>
        <div class="column">
          <h4 class="ui inverted header">TAG</h4>
          <div class="ui inverted bolded divider"></div>
          <div class="ui   tiny labels">
            <div class="ui inverted  label">BIG ANIMAL</div>
            <div class="ui inverted label">STORE</div>
            <div class="ui inverted label">HO</div>
            <div class="ui inverted label">WALL</div>
            <div class="ui inverted label">GO DIVING</div>
            <div class="ui inverted label">SHADOW</div>
            <div class="ui inverted label">FREEEEE</div>
          </div>
        </div>
        <div class="column">
          <h4 class="ui inverted header">GALLERY</h4>
          <div class="ui inverted bolded divider"></div>
          <!-- 底部的图片 -->
          <div class="ui link three cards">
              <div class="card">
                <div class="image"><img src="/images/index/gallery.png" alt=""></div>
              </div>
              <div class="card">
                <div class="image"><img src="/images/index/gallery.png" alt=""></div>
              </div>
              <div class="card">
                <div class="image"><img src="/images/index/gallery.png" alt=""></div>
              </div>
              <div class="card">
                <div class="image"><img src="/images/index/gallery.png" alt=""></div>
              </div>
              <div class="card">
                <div class="image"><img src="/images/index/gallery.png" alt=""></div>
              </div>
          </div>
        </div>
        <div class="column">
          <h4 class="ui inverted header">CONTACT US</h4>
          <div class="ui inverted bolded divider"></div>
          <form class="ui form" >
            <div class=" ui field  input ">
              <input type="text" name="email" placeholder="email">
            </div>
            <div class=" ui field  input">
              <input type="text" name="message" placeholder="message">
            </div>
            <button class="ui mini teal button" type="submit">SEND</button>
          </form>
        </div>
        </div>
      </div>
      <div class="ui  hidden  divider"></div>
      <div class="ui two column grid">
        <div class="seven wide left floated column">
            <div class="ui inverted link list">
              <a href="#" class="item">COPY RIGHT 2016 BY DREAMSCUBATRIP</a>
            </div>
        </div>
        <div class="three wide right floated column">
           <i class="bordered inverted  teal  twitter  icon"></i>&nbsp;
           <i class="bordered inverted  red  google plus  icon"></i>&nbsp;
           <i class="bordered inverted  blue facebook  icon"></i>
        </div>
      </div>
    </div>
  </section>
<script src="/js/jquery.min_0139f8274e.js" charset="utf-8"></script>
<script src="/js/semantic.min_3ca570aec1.js" charset="utf-8"></script>
<script src="/js/iScroll.min_36f374600e.js" charset="utf-8"></script>
<script src="/js/product_acbd28a23c.js" charset="utf-8"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-78887752-1', 'auto');
      ga('send', 'pageview');
  </script>
</body>

<script type="text/javascript">
    var _mfq = _mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/2363a729-1135-4bd6-80bc-aed1e41e9b4f.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>
</html>
