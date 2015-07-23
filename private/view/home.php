<?php
$this->import('/layout/header');
?>
<div class="slide">
    <div class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/condo.jpg")?>" /></div>
            <div class="item"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/condo.jpg")?>" /></div>
            <div class="item"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/condo.jpg")?>" /></div>
            <div class="item"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/condo.jpg")?>" /></div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container" style="position: relative;">
    <div class="findprops">
        <img style="opacity: 0.9;" src="<?php echo \Main\Helper\URL::absolute("/public/images/maps.jpg")?>" />
        <div class="searchbox">
            <div class="row">
                <div class="col-lg-10">
                    <p>Find your place</p>
                    <div class="pic" style="margin-left: 290px;">
                        <img src="<?php echo \Main\Helper\URL::absolute("/public/images/linetable.jpg")?>" /> <span class="glyphicon glyphicon-search"></span> <img src="<?php echo \Main\Helper\URL::absolute("/public/images/linetable.jpg")?>" />
                    </div>
                    <div class="searchopt">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Location:</label><br/>
                                <select class="form-control">
                                    <option>Any Location</option>
                                </select>
                                <label>Feature:</label><br/>
                                <select class="form-control">
                                    <option>Any Feature</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Property Type:</label><br/>
                                <select class="form-control">
                                    <option>Any Type</option>
                                </select>
                                <label>Type:</label><br/>
                                <label><input type="checkbox"/> Other</label> <label><input type="checkbox"/> Fixed</label> <label><input type="checkbox"/> Scale</label><br/>
                                <button class="btn btn-primary">Search</button>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Rooms:</label><br/>
                                        <select class="form-control">
                                            <option>Any</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Bed:</label><br/>
                                        <select class="form-control">
                                            <option>Any</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="underslide">
    <div class="container">
        <p>Bangkok Condo, Apartments & Houses for Sale & Rent</p>
    </div>
</div>
<div class="highlightslide">
    <div class="container">
        <p>Highlight Properties</p>
        <img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.jpg")?>"  /><img style="margin-left: 25px;" src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.jpg")?>"  /><img style="margin-left: 25px;" src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.jpg")?>"  /><img style="margin-left: 25px;" src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.jpg")?>"  />
    </div>
</div>
<div class="newsletter skrollable skrollable-between">
    <div class="container" id="subscribe">
        <div class="row">
            <div class="col-lg-6">
                <p id="letter">Newsletter Sign up</p>
            </div>
            <div class="col-lg-3" style="margin-top: 10px; margin-left: -120px;">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Your Email address" style="font-size: 22px;"/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">OK</button>
                    </span>
                </div>
            </div>
        </div>
        <p id="comment">Stay updated with all our latest news enter your e-mail address here</p>
    </div>
</div>
<div class="newsandtips">
    <div class="newsandtipsheader">
        <div class="container"><p>NEWS & TIPS</p></div>
    </div>
    <div class="container">
        <div class="newsandtipsarrow">
            <img style="margin-left: 50%;" src="<?php echo \Main\Helper\URL::absolute("/public/images/newstipsarrow.png")?>"  />
        </div>
    </div>
    <div class="newsandtipscontent start">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3" id="box1" style="border: solid 2px;">
                            <div class="row">
                                <div class="col-lg-12" id="banner"><p>NEWS:Propety News</p></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentpic">
                                    <img style="margin: 0 auto;" src="<?php echo \Main\Helper\URL::absolute("/public/images/Layer-12.png")?>"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentdes">
                                    <p id="headline">นักเศรษฐศาสตร์ 58.5% สนับสนุนภาษีที่ดินฯ แต่เสนอให้ยกเว้นภาษีบ้านที่ราคาไม่เกิน 3 ล้าน</p>
                                    <p>เมื่อถามว่า "ภาษีที่ดินและสิ่งปลูกสร้าง" ที่กำหนดให้ยกเว้นการเสียภาษีให้กับที่อยู่อาศัยราคาไม่เกิน 1.5 ล้านบาท.........</p>
                                    <button class="btn btn-primary">View All</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" id="box2" style="margin: 0 50px 0 50px; border: solid 2px;">
                            <div class="row">
                                <div class="col-lg-12" id="banner"><p>Tips:Propety Tips</p></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentpic">
                                    <img src="<?php echo \Main\Helper\URL::absolute("/public/images/Layer-15.png")?>"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentdes">
                                    <p id="headline">5 Reasons to rent rather than</p>
                                    <p>Buying a property is one type of investment because you can
                                        later rent out or resell. Unlike other assets whose values tend
                                        to depreciate, property.......</p>
                                    <button class="btn btn-primary">View All</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" id="box3" style="border: solid 2px;">
                            <div class="row">
                                <div class="col-lg-12" id="banner"><p>Project Review</p></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentpic">
                                    <img src="<?php echo \Main\Helper\URL::absolute("/public/images/Layer-14.png")?>"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="contentdes">
                                    <p id="headline">รีวิวโครงการ I CONDO พญาไท</p>
                                    <p>รีวิวฉบับนี้เป็นของโครงการแถวสถานีรถไฟฟ้า BTS ราชเทวี เป็นคอนโด High Rise ของพฤกษา เรียลเอสเตท รีวิวฉบับนี้เป็นของโครงการแถวสถานีรถไฟฟ้า BTS ราชเทวี เป็นคอนโด High Rise ของพฤกษา เรียลเอสเตท.......</p>
                                    <button class="btn btn-primary">View All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="split">
    <hr/>
</div>
<div class="feedback start">
    <div class="container">
        <div class="row" style="margin-left: 100px;">
            <div class="col-lg-4" id="recommend" style="margin-right: 70px;">
                <p id="subject">TESTIMONIAL</p>
                <p style="font-style: italic;">"I found my current apartment on Agent168 with extraordinary
                    help from them and totally satisfied with the choice I made.
                    All I had to do was to tell what I was looking for and
                    I got back property suggestions nearly exact to my imagination.
                    Among those, I finally chose mine now then completed procedure
                    at ease. Highly recommend Agent168  for your home search."</p>
                <div class="row">
                    <div class="col-lg-2"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/Mugshot.png")?>" /></div>
                    <div class="col-lg-4" style="margin-left: 20px;">
                        <p style="font-weight: bold;">Niran Yodying</p>
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" id="company">
                <img src="<?php echo \Main\Helper\URL::absolute("/public/images/showcase.png")?>" />
                <div class="row">
                    <div class="col-lg-8">
                        <p id="aboutbrand" style="font-family: 'cocogoose', 'Arial', sans-serif; font-size: 1.5em;">AGENT168 Co.,Ltd.</p>
                        <p id="aboutbrand" style="margin-top: -15px;">PROFESSIONAL PROPERTY AGENT</p><br/>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Agent168 is a well established full-service property brokerage agency
                                    providing services ranging from buying, renting and selling consultations.
                                    With over 10 years of experience in the business and a crew of properties
                                    but also professional real estate related advice. By letting us take care of
                                    your every real estate need, you are sure to find the result to be no less
                                    than spectacular.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var $el = $('.newsletter');
        var wH = $(window).height();
        var top = $el.offset().top - wH;
        var bottom = top + wH + ($el.height()*2);

        var topAttr = 'data-'+parseInt(top);
        var bottomAttr = 'data-'+parseInt(bottom);
        $el.attr(topAttr, "background-position:0% 30%;");
        $el.attr(bottomAttr, "background-position:0% 100%;");

        setTimeout(function(){
            skrollr.init({
                smoothScrolling: false,
                mobileDeceleration: 0.004
            });
        },1000);
    });
</script>
<script>
    $(function(){
        $(document).ready(function() {
            var ua = navigator.userAgent;

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile|mobile/i.test(ua)){}
            else if (/Chrome/i.test(ua))
            {
                var $html = $("html");
                $html.niceScroll({
                    spacebarenabled: false
                });

                $html.css("overflow", "auto");
                $(".nicescroll-rails").hide();
            }
        });

        var $window = $(window);
        $window.scroll(function(){
            $('.animation-once').each(function(index, el){
                var $el = $(el);
                var hT = $el.offset().top,
                    hH = $el.outerHeight(),
                    wH = $window.height(),
                    wS = $window.scrollTop();
                var pos = (hT+parseInt(hH/3)-wH);
                if (wS > pos){
                    $el.removeClass('animation-once');
                }
                console.log(wS , (hT+hH-wH));
            });
        });
    });
</script>
<!--<script>-->
<!--    $(function(){-->
<!--        setTimeout(function(){-->
<!--            $('.newsletter').scrollTop(0);-->
<!--        }, 1000);-->
<!--    });-->
<!--</script>-->
<script>
    function isElementInViewport(elem) {
        var $elem = $(elem);

        // Get the scroll position of the page.
        var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
        var viewportTop = $(scrollElem).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        // Get the position of the element on the page.
        var elemTop = Math.round( $elem.offset().top );
        var elemBottom = elemTop + $elem.height();

        console.log(elemTop, viewportTop);

        return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
    }
    $(function(){
        $(window).scroll(function(){
            var el = $('#box1');
            if(isElementInViewport(el)){
                $('.newsandtipscontent').removeClass('start');
            }
        });
    });

</script>

<script>
    $(function(){
        $(window).scroll(function(){
            var el = $('#recommend');
            if(isElementInViewport(el)){
                $('.feedback').removeClass('start');
            }
        });
    });
</script>
<?php
$this->import('/layout/footer');
?>	

