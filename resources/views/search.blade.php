<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
     <title>Dreamdivingtrip.com: Online Booking for Scuba Diving,Liveaboard and Courses all around the world</title>
    <meta name="description" content="Book your best diving trip，every diving trip with Dreamdivingtrip,the world’s best diving booking site.Your free personal diving assistant.">
    <meta name="keywords" content="diving vacation, diving vacations, diving vacation packages, diving vacation package, diving travel package, diving travel packages, diving travel, diving trip package, diving trip packages, diving trip,planning, hotel, hotels, motel, bed and breakfast, inn, guidebook, review, reviews, popular, plan, airfare, cheap, discount, map, maps, golf, ski, articles, attractions, advice, restaurants">
    <link href="/css/datePick.css" rel="stylesheet">
    <link href="/css/semantic.min.css" rel="stylesheet">
    <link href="/css/search.css" rel="stylesheet">
    <script src="/js/jquery.min.js" charset="utf-8"></script>
    <script src="/js/semantic.min.js" charset="utf-8"></script>
</head>
<body id="search">
  <!-- header bar -->
  @include('layouts.header')

  <section class="s-condition">
    <div class="ui container">
        <div class="ui form">
            <div class="inline four fields">
                <div class=" four wide field"><label for="">Dates</label></div>
                <div class=" four wide field "><input type="text" class="date-pick dateS" placeholder="From"></div>
                <div class=" four wide field "><input type="text"  class="date-pick dateE" placeholder="To"></div>
                <div class="four wide field"><div class="ui fluid input">
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
              </div></div>
            </div>
            <div class="ui divider"></div>
            <div class="inline four fields divingtype">
                <div class=" four wide field"><label for="">Dive type</label></div>
                <div class=" four wide field">
                  <div class="ui radio checkbox">
                    <input type="radio" tabindex="0" name="Dive type" value="1" class="hidden">
                    <label>1DAYS/2DIVES</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui radio checkbox">
                    <input type="radio" tabindex="1" name="Dive type" value="2" class="hidden">
                    <label>5DAYS/10DIVES</label>
                  </div>
                </div>
                <div class="four wide field">
                  <div class="ui radio checkbox">
                    <input type="radio" tabindex="2" name="Dive type" value="3" class="hidden">
                    <label>FULL EQUIPMENT RENTAL</label>
                  </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="inline two fields pricerange">
                <div class=" four wide field"><label for="">Price Range</label></div>
                <div class="one wide field"> <label for="">$1000</label></div>
<div class="ten wide field"><input type="range"   placeholder="From"></div>
                <div class="one wide field"> <label for="">$10000</label></div>
            </div>
            <div class="ui divider"></div>
            <div class="inline four fields lang">
                <div class=" four wide field"><label for="">Language</label></div>
                <div class=" four wide  field">
                  <div class="ui  checkbox">
                    <input type="checkbox" tabindex="0" name="Dive type" class="hidden">
                    <label>English</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden ">
                    <label>French</label>
                  </div>
                </div>
                <div class="four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="2" name="Dive type" class="hidden ">
                    <label>中文</label>
                  </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class=" weizhi ">
                <div class="ui grid">
                    <div class="four wide column">
                      <div class=" four wide field"><label for=""></label></div>
                    </div>
                    <div class="twelve wide column ">
                        <div class="row">
                          <div class="inline fields lang">
                            <div class="w33 wide field">
                              <div class="ui  checkbox">
                                <input type="checkbox" tabindex="0" name="Dive type" class="hidden">
                                <label>Bahasa Melayu</label>
                              </div>
                            </div>
                            <div class="w33 wide  field">
                              <div class="ui checkbox">
                                <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                                <label>Dansk</label>
                              </div>
                            </div>
                            <div class="w33 wide field">
                              <div class="ui checkbox">
                                <input type="checkbox" tabindex="2" name="Dive type" class="hidden">
                                <label>Plaki</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="inline fields lang">
                            <div class="w33 wide field">
                              <div class="ui  checkbox">
                                <input type="checkbox" tabindex="0" name="Dive type" class="hidden">
                                <label>Plaki</label>
                              </div>
                            </div>
                            <div class="w33 wide  field">
                              <div class="ui checkbox">
                                <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                                <label>Norsk</label>
                              </div>
                            </div>
                            <div class="w33 wide field">
                              <div class="ui checkbox">
                                <input type="checkbox" tabindex="2" name="Dive type" class="hidden">
                                <label>Suomi</label>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="ui divider"></div>
            <div class="inline three fields course">
                <div class=" four wide field"><label for="">Course</label></div>
                <div class=" four wide  field">
                  <div class="ui  checkbox">
                    <input type="checkbox" tabindex="0" name="Dive type" class="hiddens">
                    <label>OW</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                    <label>AOW</label>
                  </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="inline three fields divingcenter">
                <div class=" four wide field"><label for="">Diving Center Offer</label></div>
                <div class=" four wide  field">
                  <div class="ui  checkbox">
                    <input type="checkbox" tabindex="0" name="Dive type" class="hidden
                    ">
                    <label>Nitrox</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                    <label>transfer from recommanded Hotel</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                    <label>transfer from Airport</label>
                  </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <div class="inline three fields dest">
                <div class=" four wide field"><label for="">Destination</label></div>
                <div class=" four wide  field">
                  <div class="ui  checkbox">
                    <input type="checkbox" tabindex="0" name="Dive type" class="hidden">
                    <label>Porland</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                    <label>DONGHAI</label>
                  </div>
                </div>
                <div class=" four wide field">
                  <div class="ui checkbox">
                    <input type="checkbox" tabindex="1" name="Dive type" class="hidden">
                    <label>NANHAI</label>
                  </div>
                </div>
            </div>
        </div>

    </div>
  </section>
  <div class=" filter-buttons">
    <div class="ui container filter"><button>More Filters</button></div>
    <div class="ui container">
      <div class="apply-buttons clearfix">
        <button class="right floated ok">Apply Filters</button>
        <button class="active right floated cancel">Cancel</button>
      </div>
    </div>
  </div>
  <!-- <div class="ui container"> -->
    <section class="ui divider section" style="background-color:#f5f5f5;"></section>
  <!-- </div> -->
<section class="s-results">
    @if($result)
    @foreach($result as $k => $v)
    <!-- 第一条 -->
    <div class="ui container result-item">
      @if(isset($v[0]['city_info']))
      <!--这里 data-cityid标识city_id  (2016-10-09)-->
      <div class="current-site" data-cityid="" data-positionid="">
        <div class="ui grid">
            <div class="w67 wide column">
               <h2 class="ui header">{{ $v[0]['city_info']['name'] }}</h2>
               <div class="ui image">
                   <div class="ui dimmer active">
                     <div class="content">
                       <div class="center">
                         <div class="ui icon left floated"><i class="angle left icon"></i></div>
                         <div class="ui icon right floated"><i class="angle right icon"></i></div>
                       </div>
                     </div>
                   </div>
                  @if($v[0]['city_info']['image'])
                  @foreach($v[0]['city_info']['image'] as $val)
                  <img src="{{ $val }}" alt="">
                  @endforeach
                  @else
                  <img src="/images/search/list_1.jpg" alt="">
                  @endif
               </div>
            </div>
            <div class="w33 wide column">
                  <h4 class="ui header">palo alto</h4>
                  <p>{{ $v[0]['city_info']['description'] }}</p>
                  <div class="map">                         
                          <iframe
                              width="100%"
                              height="214"
                              frameborder="0" style="border:0"
                              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpAZPEL4ft0aDFecsqzDO-irOoXs2x5TA
                                &q={{ $v[0]['city_info']['name'] }},{{ $v[0]['city_info']['name'] }}+," allowfullscreen>
                            </iframe>
                  </div>
            </div>
        </div>
      </div>
      @endif
      <!-- 更多潜水点 -->
      <div class="row diving-sites">
          <h4 class="ui header">Locate Dive Sites</h4>
        <div class="ui three column grid" >
          <div class="row">
            @foreach($v as $num => $val)
              <div class="column">
                <div class="ui image">
                  <a href="/product/{{ $val['id'] }}"><img src="{{ $val['position_image'] }}" alt=""></a>
                  <aside class="">$ {{ $val['price'] }}  </aside>
                  <a href="/product/{{ $val['id'] }}"><p>{{ $val['name'] }}</p></a>
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>

      @if(count($v) == 3)
      <div class="see-more-button">
        @if(isset($v[0]['city_info']))
        <div class="ui center aligned container "><button class="ui basic button" position="" city="{{ $v[0]['city_info']['id'] }}">    See More Locate Dive Sites    </button></div>
        @else
        <div class="ui center aligned container "><button class="ui basic button" position="{{ $v[0]['id'] }}" city="">    See More Locate Dive Sites    </button></div>
        @endif
      </div>
      @endif
      
      <div class="ui divider"> </div>
    </div>
    @endforeach
    @endif
</section>

@include('layouts.footer')
@include('layouts.loginer')

<script src="/js/datePick.js"></script>
<script src="/js/search.js" charset="utf-8"></script>
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
