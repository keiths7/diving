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
    <link href="/css/semantic.min.css" rel="stylesheet">
    <link href="/css/product.css" rel="stylesheet">
    <title>Dreamdivingtrip.com: Online Booking for Scuba Diving,Liveaboard and Courses all around the world</title>
</head>
<body id="product">
  @include('layout.header');
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
                      <div class="field"><label for="">Start Date</label><input type="text" id="input_start_date" value="{{ $params['date_start'] }}"></div>
                      <div class="field"><label for="">End Date</label><input type="text" id="input_end_date" value="{{ $params['date_end'] }}"></div>
                      <div class="field">
                        <label for="">Divers</label>
                        <select class="ui dropdown" name="" id="" >
                          @for($i=1;$i<=10;$i++)
                          @if(isset($params['passenger']) && $i == $params['passenger'])
                          <option value="{{$i}}" selected>{{$i}}</option>
                          @else
                          <option value="{{$i}}">{{$i}}</option>
                          @endif
                          @endfor
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
                          <iframe
                              width="100%"
                              height="450"
                              frameborder="0" style="border:0"
                              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpAZPEL4ft0aDFecsqzDO-irOoXs2x5TA
                                &q={{ $product->positions[0]->city->name }},{{ $product->positions[0]->city->name }}+{{ $product->positions[0]->country->name }}," allowfullscreen>
                            </iframe>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="p30 right column">
                <form novalidate autocomplete="on" method="POST" id="payment-form">
                    <div class="ui form">          
                        <span><img src="/images/product/visa.jpg" alt=""><em class="payment-errors right floated"></em></span>
                        <div class="field">
                            <input type="tel" placeholder="Card Number" data-stripe="number"  class="cc-number" autocomplete="cc-number"  required>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <input type="tel" class="cc-exp" autocomplete="cc-exp" placeholder="MM/YY" required>
                            </div>
                            <div class="field">
                                <input type="tel" class="cc-cvc" autocomplete="off" data-stripe="cvc"  placeholder="CVC" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="tel" placeholder="postalcode" data-numeric  class=" cc-postalcode" >
                        </div>
                        <button class="ui submit teal fluid button" type="submit">Instant Book</button>
                        <p>We will recommond a dive center foryou.Or you could <a href="">Pick</a> a dive center toserve your trip</p>                   
                    </div>
                </form>
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
  @include('layout.footer')
  @include('layout.loginer');
<script src="/js/jquery.min.js" charset="utf-8"></script>
<script src="/js/semantic.min.js" charset="utf-8"></script>
<script src="/js/iScroll.min.js" charset="utf-8"></script>
<script src="/js/product.js" charset="utf-8"></script>
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
