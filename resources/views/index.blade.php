<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
    <meta name="description" content="undefined">
    <link href="/css/semantic.min.css" rel="stylesheet">
    <link href="/css/index.css?v=2" rel="stylesheet">
    <title>diving</title>
</head>
<body>
  <div class="full height" id="diving">
    <header class="ui following bar sticky">
      <div class="ui container">
        <div class="ui large secondary  network menu inverted">
          <div class="item">
            <div class="ui logo shape">
              <div class="sides">
                <div class="active ui side">
                  <!-- logo img1-->
                  <img class="ui  image light" src="/images/logo.png">
                  <!-- logo img2 -->
                  <img class="ui  image black" style="margin-left:14px" src="/images/logo-black.png">
                </div>
              </div>
            </div>
          </div>
          <!-- <a class="view-ui item"><i class="sidebar icon"></i>  </a> -->
          <div class="right item menu">
            <div class="item">Sign Up</div>
            <div class="item">Sign In</div>
          </div>
        </div>
      </div>
    </header>
    <!-- 头图部分 开始 -->
    <section class="first-sec ">

      <div class="first-sec-bg">
        <!-- 头图 img -->
        @if(isset($banner))
          @foreach($banner as $ban)
            <img src="{{ $ban['url'] }}" alt="">
          @endforeach
        @else
        <img src="/images/index/top_bg.png" alt="">
        @endif
      </div>
      <!-- 搜索框 -->
      <div class="search-bar">
        <div class="ui centered  grid">
            <div class="four wide column">
              <div class="ui fluid search selection dropdown">
                <input type="hidden" name="country">
                <i class="dropdown icon"></i>
                <div class="default text">Select Country</div>
                <div class="menu">
                    <div class="item" data-value='sydeny'>悉尼</div>
                    <div class="item" data-value='boston'>波士顿</div>
                    <div class="item" data-value='shanghai'>上海</div>
                    <div class="item" data-value='shanghai'>伦敦</div>
                    <div class="item" data-value='shanghai'>佛罗里达州</div>
                </div>
              </div>
            </div>
            <div class="one wide column">
              <div class="ui fluid input">
                <input type="text" placeholder="from">
              </div>
            </div>
            <div class=" one wide column  from-to-arrow" style="">
                <div style="display:inline-block">-></div>
            </div>
            <div class="one wide column to">
              <div class="ui fluid input">
                <input type="text" placeholder="to">
              </div>
            </div>
            <div class="two wide column">
              <div class="ui fluid input">
                <input type="text" placeholder="passagers">
              </div>
            </div>
            <div class="one wide column search-btn">
                <button class="ui teal  button">search </button>
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
          <div class="ui centered stackable internally grid">
              <div class=" row">
                  <div class="four wide  column">
                    <div class="ui container">
                      <h3 class="ui header">BECOME A PADI DIVIER</h3>
                      <div class="ui bulleted list">
                        <div class="item">Discover Scuba Dving</div>
                        <div class="item">Bubblemaker</div>
                        <div class="item">PADI Seal Team</div>
                      </div>
                      <div class="image">
                        <!--课程 img  -->
                        @if(!empty($course[0]))
                        <img src="{{ $course[0]['url'] }}" />
                        @else
                        <img src="/images/course/1.png" />
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui container">
                      <h3 class="ui header">I’M A PADI DIVER</h3>
                      <div class="ui bulleted list">
                        <div class="item">S T A R T H E R E </div>
                        <div class="item">PADI Scuba Diver</div>
                      </div>
                      <div class="image">
                        @if(!empty($course[1]))
                        <img src="{{ $course[1]['url'] }}" />
                        @else
                        <img src="/images/course/1.png" />
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui container">
                      <h3 class="ui header">PADI TECHNICAL AND FREEDIVER</h3>
                      <div class="ui bulleted list">
                        <div class="item">ReActivate-Scuba Refresher   </div>
                        <div class="item">Adventure Diver</div>
                        <div class="item">Advanced Open Water</div>
                      </div>
                      <div class="image">
                        @if(!empty($course[2]))
                        <img src="{{ $course[2]['url'] }}" />
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
    <div class=" ui vertical see-more-button">
      <div class="ui center aligned container "><button class="ui basic button">    See more courses    </button></div>
    </div>
    <!-- 热门目的地开始  -->
    <section class="third-sec ui vertical ">
      <div class="ui container">
          <h2 class="ui header center aligned">Popular Destinations</h2>
          <div class="ui divider hidden"></div>
            <div class="ui special cards">
                <div class="card">
                    <div class="ui  image">
                      <div class="ui dimmer">
                        <div class="content">
                          <div class="center">
                            <!-- 热门目的地1 地名 其余类似位置 -->
                            @if(!empty($dest[0]))
                                <div class="ui header">{{ $dest[0]['desc'] }}</div>
                            @else
                            <div class="ui header">THAILAND</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地1 img -->
                      @if(!empty($dest[0]))
                          <img src="{{ $dest[0]['url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </div>
                <div class="card">
                    <div class="ui  image">
                      <div class="ui dimmer">
                        <div class="content">
                          <div class="center">
                            @if(!empty($dest[1]))
                                <div class="ui header">{{ $dest[1]['desc'] }}</div>
                            @else
                            <div class="ui header">Malasia</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地2 img -->
                      @if(!empty($dest[1]))
                          <img src="{{ $dest[1]['url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </div>
                <div class="card">
                    <div class="ui image">
                      <div class="ui dimmer">
                        <div class="content">
                          <div class="center">
                            @if(!empty($dest[2]))
                                <div class="ui header">{{ $dest[2]['desc'] }}</div>
                            @else
                            <div class="ui header">Vietnam</div>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- 热门目的地3 img -->
                      @if(!empty($dest[2]))
                          <img src="{{ $dest[2]['url'] }}">
                      @else
                      <img src="/images/course/1.png">
                      @endif
                    </div>
                </div>
            </div>
    </section>
    <div class=" ui vertical see-more-button">
      <div class="ui center aligned container "><button class="ui basic button">    See more courses    </button></div>
    </div>
      <!-- 热门目的地  结束  -->
      <!--探索世界 开始  -->
    <section class="fourth-sec grid-sec ui vertical search-the-world">
      <div class="ui container">
          <h2 class="ui header center aligned">Most popular Course around the world</h2>
          <p  style="text-align:center">See where people are diving, all around the world.</p>
          <div class="ui divider hidden"></div>
          <div class="ui centered stackable internally grid">
                <div class="row">
                  <div class="eight wide  column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              <!--探索世界1 地名 其余位置类似-->
                              @if(!empty($pop[0]))
                                  <div class="ui header">{{ $pop[0]['desc'] }}</div>
                              @else
                              <div class="ui header">Eygpt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界1 img -->
                      @if(!empty($pop[0]))
                        <img   src="{{ $pop[0]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>

                  </div>
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[1]))
                                  <div class="ui header">{{ $pop[1]['desc'] }}</div>
                              @else
                              <div class="ui header">MARIE DIVING CENTER</div>
                              @endif
                              <p>Palo Atlo</p>
                            </div>
                          </div>
                      </div>
                      <!--探索世界2 img -->
                      @if(!empty($pop[1]))
                        <img   src="{{ $pop[1]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[2]))
                                  <div class="ui header">{{ $pop[2]['desc'] }}</div>
                              @else
                              <div class="ui header">Paulau</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界3 img -->
                      @if(!empty($pop[2]))
                        <img   src="{{ $pop[2]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[2]))
                                  <div class="ui header">{{ $pop[2]['desc'] }}</div>
                              @else
                              <div class="ui header">Osaka</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界4 img -->
                      @if(!empty($pop[3]))
                        <img   src="{{ $pop[3]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[3]))
                                  <div class="ui header">{{ $pop[3]['desc'] }}</div>
                              @else
                              <div class="ui header">THAILAND </div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界5 img -->
                      @if(!empty($pop[4]))
                        <img   src="{{ $pop[4]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[4]))
                                  <div class="ui header">{{ $pop[4]['desc'] }}</div>
                              @else
                              <div class="ui header">MARIE DIVING CENTER</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界6 img -->
                      @if(!empty($pop[5]))
                        <img   src="{{ $pop[5]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                  <div class="eight wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[5]))
                                  <div class="ui header">{{ $pop[5]['desc'] }}</div>
                              @else
                              <div class="ui header">MARIE DIVING CENTER</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界7 img -->
                      @if(!empty($pop[6]))
                        <img   src="{{ $pop[6]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[6]))
                                  <div class="ui header">{{ $pop[6]['desc'] }}</div>
                              @else
                              <div class="ui header">Eygpt</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界8 img -->
                      @if(!empty($pop[7]))
                        <img   src="{{ $pop[7]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[7]))
                                  <div class="ui header">{{ $pop[7]['desc'] }}</div>
                              @else
                              <div class="ui header">Philippines</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界9 img -->
                      @if(!empty($pop[8]))
                        <img   src="{{ $pop[8]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
                  <div class="four wide column">
                    <div class="ui image">
                      <div class="ui  dimmer ">
                          <div class="content">
                            <div class="center">
                              @if(!empty($pop[8]))
                                  <div class="ui header">{{ $pop[8]['desc'] }}</div>
                              @else
                              <div class="ui header">Spain</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <!--探索世界10 img -->
                      @if(!empty($pop[9]))
                        <img   src="{{ $pop[9]['url'] }}" ></img>
                      @else
                      <img   src="/images/course/1.png" ></img>
                      @endif
                    </div>
                  </div>
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
          <div class="ui centered stackable internally grid">
                <div class="row">
                  <div class="four wide column">
                    <h2 class="ui icon header">
                      <img class="ui icon image" src="/images/index/how-to-book-1.png">
                      Find a dive site
                    </h2>
                    <p>Just enter your dates and destination. Then refine your search
                        Just enter your dates and destination. Then refine your search
                      Just enter your dates and destination. Then refine your search
                    </p>
                  </div>
                  <div class="four wide  column">
                    <h2 class="ui icon header">
                      <img class="ui icon image" src="/images/index/how-to-book-1.png">
                      Book right now
                    </h2>
                    <p>Just enter your dates and destination. Then refine your search
                        Just enter your dates and destination. Then refine your search
                      Just enter your dates and destination. Then refine your search
                    </p>
                  </div>
                  <div class="four wide column">
                    <h2 class="ui icon header">
                      <img class="ui icon image" src="/images/index/how-to-book-1.png">
                      Get travel-ready 
                    </h2>
                    <p>Just enter your dates and destination. Then refine your search
                        Just enter your dates and destination. Then refine your search
                      Just enter your dates and destination. Then refine your search
                    </p>
                  </div>
                </div>
          </div>
      </div>
    </section>
    <!-- how to book  结束 -->
    <!-- footer 开始 -->
<section class="sixth-sec ui black inverted vertical footer segment">
  <div class="ui center aligned container">
    <div class="ui stackable inverted centered grid">
      <div class="row">
      <div class="three wide column">
        <h4 class="ui inverted header">Dream Scubatrip</h4>
        <div class="ui inverted divider"></div>
        <div class="ui inverted link list">
          <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">
            <i class="marker icon"></i>
            Address:BEIJING
          </a>
          <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">
            <i class="phone icon"></i>
            Mobile:+86 18610912179
          </a>
          <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">
            <i class="mail outline icon"></i>
            Mail:diving@163.com
          </a>
        </div>
      </div>
      <div class="three wide column">
        <h4 class="ui inverted header">TAG</h4>
        <div class="ui inverted divider"></div>
        <div class="ui  tiny labels">
          <div class="ui label">BIG ANIMAL</div>
          <div class="ui label">STORE</div>
          <div class="ui label">WALL</div>
          <div class="ui label">SHADOW</div>
          <div class="ui label">FREE DIVING</div>
        </div>
      </div>
      <div class="three wide column">
        <h4 class="ui inverted header">GALLERY</h4>
        <div class="ui inverted divider"></div>
        <!-- 底部的图片 -->
        <div class="ui link three stackable cards">
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
      <div class="three wide  column">
        <h4 class="ui inverted header">CONTACT US</h4>
        <div class="ui inverted divider"></div>
        <form class="ui form" >
          <div class=" ui field  input ">
            <input type="text" name="email" placeholder="email">
          </div>
          <div class=" ui field  input">
            <input type="text" name="message" placeholder="message">
          </div>
          <button class="ui tiny teal button" type="submit">SEND</button>
        </form>
      </div>
      </div>
    </div>
    <div class="ui inverted section divider"></div>
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
  </div>
<script src="/js/jquery.min.js"></script>
<script src="/js/semantic.min.js"></script>
<script src="/js/index.js"></script>
</body>
