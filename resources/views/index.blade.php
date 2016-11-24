<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="description" content="Book your best diving trip，every diving trip with Dreamdivingtrip,the world’s best diving booking site.Your free personal diving assistant.">
    <meta name="keywords" content="diving vacation, diving vacations, diving vacation packages, diving vacation package, diving travel package, diving travel packages, diving travel, diving trip package, diving trip packages, diving trip,planning, hotel, hotels, motel, bed and breakfast, inn, guidebook, review, reviews, popular, plan, airfare, cheap, discount, map, maps, golf, ski, articles, attractions, advice, restaurants">
   <link href="/css/datePick.css" rel="stylesheet">
    <link href="/css/semantic.min.css" rel="stylesheet">
    <link href="/css/index.css" rel="stylesheet">
    <title>Dreamdivingtrip.com: Online Booking for Scuba Diving,Liveaboard and Courses all around the world</title>
</head>
<body>
  <div class="full height" id="diving">
    <header class="ui following bar sticky">
      <div class="blurring-bg"></div>
        <div class="ui large secondary  network menu inverted">
          <div class="item">
            <div class="ui logo shape">
              <div class="sides">
                <div class="active ui side">
                  <!-- logo img1-->
                  <img class="ui  image light" src="/images/logo.png">
                  <!-- logo img2 -->
                  <img class="ui  image black"  src="/images/logo-black.png">
                </div>
              </div>
            </div>
          </div>
          <!-- <a class="view-ui item"><i class="sidebar icon"></i>  </a> -->
          <div class="right menu">
          <div class="item user ui pointing dropdown">
                 <div class="text">Welcome</div>
                 <div class="menu">
                   <div class="item"><a href="/profile#purchases">Purchases</a></div>
                   <div class="item"><a href="/profile#setting">Settings</a></div>
                   <div class="item"><a href="javascript:signOut()">Sign Out</a></div>
                 </div>         
            </div>
            <div class="item signup">Sign Up</div>
            <div class="item signin">Sign In</div>
          </div>
        </div>
    </header>
    <!-- 头图部分 开始 -->
    <section class="first-sec ">
      <!-- 头图 img -->
      @if(isset($banner))
        @foreach($banner as $ban)
          <img src="{{ $ban['image_url'] }}" alt="">
        @endforeach
      @else
      <img src="/images/index/top_bg.jpg" alt="">
      @endif
      <!-- 搜索框 -->
      <div class="search-bar">
        <div class="ui centered  grid">
          <div class="ui row computer only">
            <div class="four wide column">
              <div class="ui fluid search selection dropdown destination">
                <input type="hidden" name="country">
                <i class="dropdown icon"></i>
                <div class="default text">Select Country</div>
                <div class="menu">
                </div>
              </div>
            </div>
            <div class="two wide column from">
              <div class="ui fluid input">
                <input type="text" class="date-pick "  placeholder="from">
              </div>
            </div>
            <div class=" one wide column  from-to-arrow" style="">
                <div style="display:inline-block">→</div>
            </div>
            <div class="two wide column to">
              <div class="ui fluid input">
                <input type="text" class="date-pick " placeholder="to">
              </div>
            </div>
            <div class="two wide column">
               <div class="ui fluid input">
                <div class="ui fluid  selection dropdown passengers">
                    <input type="hidden" name="passenger">
                    <i class="dropdown icon"></i>
                    <div class="default text">Passengers</div>
                    <div class="menu">
                        <div class="item" data-value='1'>1 passenger</div>
                        <div class="item" data-value='2'>2 passengers</div>
                        <div class="item" data-value='3'>3 passengers</div>
                        <div class="item" data-value='4'>4 passengers</div>
                        <div class="item" data-value='5'>5 passengers</div>
                        <div class="item" data-value='6'>6 passengers</div>
                        <div class="item" data-value='7'>7 passengers</div>
                        <div class="item" data-value='8'>8 passengers</div>
                        <div class="item" data-value='9'>9 passengers</div>
                        <div class="item" data-value='10'>10 passengers</div>
                    </div>
                </div>
              </div>
            </div>
            <div class="one wide column search-btn">
                <button class="ui teal  button">Search </button>
            </div>
          </div>
          <div class="ui row mobile only">
            <div class="ten wide column">
              <div class="ui fluid search selection dropdown destination">
                <input type="hidden" name="country">
                <i class="dropdown icon"></i>
                <div class="default text">Select Country</div>
                <div class="menu">
                </div>
              </div>
            </div>
            <div class="three wide column search-btn">
                <button class="ui teal  button">Search </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- 头图部分 结束 -->
    <!-- 课程 开始-->
    <section class="second-sec grid-sec ui vertical ">
      <div class="ui container">
          <h2 class="ui header center aligned">Most popular Course around the world</h2>
          <div class="ui divider hidden"></div>
          <div class="ui centered stackable internally three column grid">
              <div class=" row">
                  <div class=" column">
                    <div class="ui container">
                      <h3 class="ui header">BECOME A PADI DIVIER</h3>
                      <div class="ui bulleted list">
                          <a class="item" href="#">Discover Scuba Dving</a>
                          <a class="item" href="#">Bubblemaker</a>
                          <a class="item" href="#">PADI Seal Team</a>
                      </div>
                      <div class="image">
                        <!--课程 img  -->
                        @if(!empty($course[0]))
                        <img src="{{ $course[0]['image_url'] }}" />
                        @else
                        <img src="/images/course/1.png" />
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="column">
                    <div class="ui container">
                      <h3 class="ui header">I’M A PADI DIVER</h3>
                      <div class="ui bulleted link list">
                        <a class="item" href="#">S T A R T H E R E</a>
                        <a class="item" href="#">PADI Scuba Diver</a>
                      </div>
                      <div class="image">
                        @if(!empty($course[1]))
                        <img src="{{ $course[1]['image_url'] }}" />
                        @else
                        <img src="/images/course/1.png" />
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="column">
                    <div class="ui container">
                      <h3 class="ui header">PADI TECHNICAL AND FREEDIVER</h3>
                      <div class="ui bulleted list">
                        <a class="item" href="#">ReActivate-Scuba Refresher</a>
                        <a class="item" href="#">Adventure Diver</a>
                        <a class="item" href="#">Advanced Open Water</a>
                      </div>
                      <div class="image">
                        @if(!empty($course[2]))
                        <img src="{{ $course[2]['image_url'] }}" />
                        @else
                        <img src="/images/course/1.png" />
                        @endif
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- 课程 结束-->
    <div class=" ui vertical see-more-button more-course">
      <div class="ui center aligned container "><a class="ui basic button" href="#see-more-course">    See more courses    </a></div>
    </div>
    <!-- 热门目的地开始  -->
    <section class="third-sec ui vertical ">
      <div class="ui container">
          <h2 class="ui header center aligned ">Popular Destinations</h2>
          <div class="ui divider hidden"></div>
            <div class="ui special cards">
                @if(!empty($dest[0]))
                <a class="card" href="{{ $dest[0]['url'] }}">
                @else
                <a class="card" href="">
                @endif
                    <div class="ui  image">
                      <div class="ui dimmer visible active">
                        <div class="content">
                          <div class="center">
                            <!-- 热门目的地1 地名 其余类似位置 -->
                            @if(!empty($dest[0]))
                                <div class="ui header" href="{{ $dest[0]['url'] }}">{{ $dest[0]['desc'] }}</div>
                            @else
                            <div class="ui header">THAILAND</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地1 img -->
                      @if(!empty($dest[0]))
                          <img src="{{ $dest[0]['image_url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </a>
                @if(!empty($dest[1]))
                <a class="card" href="{{ $dest[1]['url'] }}">
                @else
                <a class="card" href="">
                @endif
                    <div class="ui  image">
                      <div class="ui dimmer visible active">
                        <div class="content">
                          <div class="center">
                            @if(!empty($dest[1]))
                                <div class="ui header" href="{{ $dest[1]['url'] }}">{{ $dest[1]['desc'] }}</div>
                            @else
                            <div class="ui header">Malasia</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地2 img -->
                      @if(!empty($dest[1]))
                          <img src="{{ $dest[1]['image_url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </a>
                @if(!empty($dest[1]))
                <a class="card" href="{{ $dest[2]['url'] }}">
                @else
                <a class="card" href="">
                @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active">
                        <div class="content">
                          <div class="center">
                            @if(!empty($dest[2]))
                                <div class="ui header" href="{{ $dest[2]['url'] }}">{{ $dest[2]['desc'] }}</div>
                            @else
                            <div class="ui header">Malasia</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地3 img -->
                      @if(!empty($dest[2]))
                          <img src="{{ $dest[2]['image_url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </a>
            </div>
    </section>
    <div class=" ui vertical see-more-button more-destination">
      <div class="ui center aligned container "><a class="ui basic button" href="#see-more-dest">    See All Destination     </a></div>
    </div>
      <!-- 热门目的地  结束  -->
      <!--探索世界 开始  -->
    <section class="fourth-sec grid-sec ui vertical search-the-world">
      <div class="ui container">
        <h2 class="ui header center aligned">See where do people dive all over the world</h2>
        <div class="ui divider hidden"></div>
          <div class="ui divider hidden"></div>
          <div class="ui centered stackable internally grid">
                <div class="row">
                  @if(!empty($pop[0]))
                  <a class="eight wide  column" href="{{ $pop[0]['url'] }}">
                  @else
                  <a class="eight wide  column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              <!--探索世界1 地名 其余位置类似-->
                              @if(!empty($pop[0]))
                                  <div class="ui header" href="{{ $pop[0]['url'] }}">{{ $pop[0]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界1 img -->
                      @if(!empty($pop[0]))
                        <img   src="{{ $pop[0]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>

                  </a>
                  @if(!empty($pop[1]))
                  <a class="four wide column" href="{{ $pop[1]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[1]))
                                  <div class="ui header" href="{{ $pop[1]['url'] }}">{{ $pop[1]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界2 img -->
                      @if(!empty($pop[1]))
                        <img   src="{{ $pop[1]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                </div>
                <div class="row">
                  @if(!empty($pop[2]))
                  <a class="four wide column" href="{{ $pop[2]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[2]))
                                  <div class="ui header" href="{{ $pop[2]['url'] }}">{{ $pop[2]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界3 img -->
                      @if(!empty($pop[2]))
                        <img   src="{{ $pop[2]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                  @if(!empty($pop[3]))
                  <a class="four wide column" href="{{ $pop[3]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[3]))
                                  <div class="ui header" href="{{ $pop[3]['url'] }}">{{ $pop[3]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界4 img -->
                      @if(!empty($pop[3]))
                        <img   src="{{ $pop[3]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                  @if(!empty($pop[4]))
                  <a class="four wide column" href="{{ $pop[4]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[4]))
                                  <div class="ui header" href="{{ $pop[4]['url'] }}">{{ $pop[4]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界5 img -->
                      @if(!empty($pop[4]))
                        <img   src="{{ $pop[4]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                </div>
                <div class="row">
                  @if(!empty($pop[5]))
                  <a class="four wide column" href="{{ $pop[5]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[5]))
                                  <div class="ui header" href="{{ $pop[5]['url'] }}">{{ $pop[5]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界6 img -->
                      @if(!empty($pop[5]))
                        <img   src="{{ $pop[5]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                  @if(!empty($pop[6]))
                  <a class="eight wide column" href="{{ $pop[6]['url'] }}">
                  @else
                  <a class="eight wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[6]))
                                  <div class="ui header" href="{{ $pop[6]['url'] }}">{{ $pop[6]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界7 img -->
                      @if(!empty($pop[6]))
                        <img   src="{{ $pop[6]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                </div>
                <div class="row">
                  @if(!empty($pop[7]))
                  <a class="four wide column" href="{{ $pop[7]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[7]))
                                  <div class="ui header" href="{{ $pop[7]['url'] }}">{{ $pop[7]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界8 img -->
                      @if(!empty($pop[7]))
                        <img   src="{{ $pop[7]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                  @if(!empty($pop[8]))
                  <a class="four wide column" href="{{ $pop[8]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[8]))
                                  <div class="ui header" href="{{ $pop[8]['url'] }}">{{ $pop[8]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界9 img -->
                      @if(!empty($pop[8]))
                        <img   src="{{ $pop[8]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                  @if(!empty($pop[9]))
                  <a class="four wide column" href="{{ $pop[9]['url'] }}">
                  @else
                  <a class="four wide column" href="">
                  @endif
                    <div class="ui image">
                      <div class="ui dimmer visible active ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[9]))
                                  <div class="ui header" href="{{ $pop[9]['url'] }}">{{ $pop[9]['desc'] }}</div>
                              @else
                              <div class="ui header">Egypt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界10 img -->
                      @if(!empty($pop[9]))
                        <img   src="{{ $pop[9]['image_url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </a>
                </div>
          </div>
      </div>
    </section>
      <!--探索世界 结束  -->
      <!-- how to book  开始 -->
    <section class="fifth-sec grid-sec ui vertical ">
      <div class="ui container">
          <h2 class="ui header center aligned">How to book</h2>
          <div class="ui divider hidden"></div>
          <div class="ui centered stackable internally three column grid">
            <div class="row">
              <div class="column">
                <a class="ui icon large header" href="#book1">
                  <img class="ui icon image" src="/images/index/how_to_book_1.png">
                  Find a dive site
                </a>
                <p>Just enter your dates and destination. Then refine your search and compare choices. On DDT.COM, info about location, products, prices, cancellation & booking policies and reviews by other divers are all in one place!
                </p>
              </div>
              <div class="column">
                <a class="ui icon large header" href="#book2">
                  <img class="ui icon image" src="/images/index/how_to_book_2.png">
                  Book right now
                </a>
                <p>Easily book online with our best price guarantee and no booking fees. Get email confirmation instantly. Most bookings don`t require any deposit and offer free cancellation. Credit card details are sent directly to dive center through a secure channel.
                </p>
              </div>
              <div class="column">
                <a class="ui icon large header" href="#book3">
                  <img class="ui icon image" src="/images/index/how_to_book_3.png">
                  Get travel-ready
                </a>
                <p>We get in touch with your dive center as soon as you book to verify all the details such as transfer, language of course materials & more! Prior to your arrival we will contact dive center with a friendly reminder. dreamdivingtrip.com is here to serve you 24/7!
                </p>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- how to book  结束 -->
    <!-- footer 开始 -->
@include('layouts.footer')
</div>
@include('layouts.loginer')
<div class="ui basic inverted small modal indev">
  <h2 class="ui icon header">
    <img class="ui icon image" src="/images/index/logo.png">
  </h2>
  <div className="content">
    <img class="ui icon image" src="/images/index/dev_notice.png">
  </div>
  <h2 class="ui fb">
    <a href="https://www.facebook.com/dreamdivingtrip/"><img class="ui icon image" src="/images/index/fb.png"></a>
    <a href="https://www.instagram.com/dreamdivingtrip/"><img class="ui icon image" src="/images/index/ins.png"></a>
  </h2>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/semantic.min.js"></script>
<script src="/js/datePick.js"></script>
<script src="/js/index.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-78887752-1', 'auto');
  ga('send', 'pageview');
</script>
</body>

<script type='text/javascript'>
    (function(m, ei, q, i, a, j, s) {
        m[a] = m[a] || function() {
            (m[a].a = m[a].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = i + '?v=' + new Date().getUTCDate();
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '//static.meiqia.com/dist/meiqia.js', '_MEIQIA');
    _MEIQIA('entId', 17368);
</script>
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
