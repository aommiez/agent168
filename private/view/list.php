<?php
$this->import('/layout/headProperty');
?>

<style>
    .bgList{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/bglist.jpg")?>);
    }



    .menu{
        margin-left: 10px;

    }

    .menu ul li{
        list-style-type: none;
        display: inline;
        font-size: 16px;
        font-family: 'Roboto', 'Arial', sans-serif;

    }

    .menu ul li a:link {
        color: #1957a4;
        text-decoration: none;}
    .menu ul li a:visited {
        color: #245ea7;
        text-decoration: none;
    }
    .menu ul li a:hover {
        color:#C355A6;
        text-decoration: none;
    }
    .menu ul li a:active {
        color: #1957a4;
        text-decoration: none;
    }

    .lineList{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/line.jpg")?>);
        width: 101%;
    }

    .line-list{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/line.jpg")?>);
        width: 50%;
        margin-left: 0px;
        margin-top: -10px;

    }

    .list{
        background-color: #FFFFFF;
        margin-top: 20px;
        border: 2px solid #1957a4;
        padding: 0px;
    }

    .list-a{

    }

    .list-a ul li{
        list-style-type: none;

    }

    .list-b{

    }

    .list-b ul li{
        list-style-type: none;
        font-family: 'thaisans', 'Arial', sans-serif;
        color: #1957a4;
    }

    .page{
        margin-left: 400px;
    }

    .page ul li{
        list-style-type: none;
        margin-right: 5px;
        display: inline;
    }

</style>

<div class="bgList">
        <div class="container">
            <br>
            <div class="menu">
                <ul>
                    <li><a href="/agent168/list">List</a></li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="/agent168/map">Map</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="/agent168/gallery">Gallery</a> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><span class="divider" style="color: #bbbbbb">/</span></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="/agent168/table">Table</a> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
                <div class="lineList row">
                    <div class="lineList col-lg-12">
                    </div>
                </div>
            </div>
            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                        คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>
            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#a">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#b">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#c">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#d">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#e">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#f">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>

            <div class="list row">
                <div class="list-a col-lg-3">
                    <ul>
                        <br>
                        <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>"></li>

                    </ul>

                </div>
                <div class="list-b col-lg-9">
                    <ul>
                        <br>
                        <li><a href="#g">ขายคอนโด เดอะ สุโขทัย เรสซิเด้นซ์ สาทร กรุงเทพมหานคร</a></li><br>
                        <div class="line-list row">
                            <div class="line col-lg-12">
                            </div>
                        </div><br>
                        <li>3 ห้องนอน / 4 ห้องน้ำ / 238 ตร.ม / รหัส C11091401<br>
                            คอนโด / ทำเล : สาทร, กรุงเทพมหานคร<br></li>
                        <li style="color: #FF0000">ขาย : 85,000,000 บาท</li><br>
                    </ul>
                </div>
            </div>
            <br><br>
            <div class="page">
                <ul>
                    <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/back.jpg")?>"></a></li>
                    <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n1.jpg")?>"></a></li>
                    <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n2.jpg")?>"></a></li>
                    <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/n3.jpg")?>"></a></li>
                    <li><a href="#"><img src="<?php echo \Main\Helper\URL::absolute("/public/images/next.jpg")?>"></a></li>
                </ul>
            </div>
        </div>
        <br><br>
</div>
<?php
$this->import('/layout/footer');
?>
