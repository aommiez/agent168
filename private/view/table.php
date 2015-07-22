<?php
$this->import('/layout/headProperty');
?>

<style>
    .bgtable{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/bglist.jpg")?>);
    }

    .menu{
        margin-left: 40px;

    }

    .menu ul li{
        list-style-type: none;
        display: inline;
        font-size: 16px;
        font-family: 'thaisans', 'Arial', sans-serif;

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


    .bar{
        margin-top: 15px;
        background-color: #1957a4;
        height: 60px;

    }

    .bar-a{
    }

    .bar-a ul li{
        list-style-type: none;
        display: inline;
        color: #FFFFFF;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        margin-left: 40px;
    }

    .bar-b{
    }

    .bar-b ul li{
        list-style-type: none;
        display: inline;
        color: #FFFFFF;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        margin-left: 30px;
    }

    .bar-c{
    }

    .bar-c ul li{
        list-style-type: none;
        display: inline;
        color: #FFFFFF;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        margin-left: -5px;
    }

    .bar-d{
    }

    .bar-d ul li{
        list-style-type: none;
        display: inline;
        color: #FFFFFF;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        margin-left: -10px;
    }

    .alltable{
        background-color: #FFFFFF;
    }

    .table{
        margin-top: 20px;

    }

    .table-a{
    }

    .table-a ul li{
        list-style-type: none;
        display: inline;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
    }

    .table-b{
    }

    .table-b ul li{
        list-style-type: none;
        display: inline;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;


    }

    .table-c{
    }

    .table-c ul li{
        list-style-type: none;
        display: inline;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        color: #FF0000;
    }

    .table-d{

    }

    .table-d ul li{
        list-style-type: none;
        display: inline;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
        color: #FF0000;
    }

    ul li{
        list-style-type: none;
    }

    .line-menu{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/line.jpg")?>);
        width: 103%;
        margin-left: -28px;
        margin-top: 0px;

    }

    .line-table{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/linetable.jpg")?>);
        width: 103%;
        margin-left: -28px;
        margin-top: 0px;

    }

    a:link {
        color: #000000;
        text-decoration: none;}
    a:visited {
        color: #245ea7;
        text-decoration: none;
    }

    a:active {
        color: #1957a4;
        text-decoration: none;
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


<!--head table-->
<div class="bgtable">
        <div class="barTable">
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
                    <div class="line-menu row">
                        <div class="line-menu col-lg-12">
                        </div>
                    </div>
                </div>
                <div class="bar row">
                    <br>
                    <div class="bar-a col-lg-2">
                        <ul>
                            <li>รหัส</li>
                        </ul>
                    </div>
                    <div class="bar-b col-lg-6">
                        <ul>
                            <li>รายการ</li>
                        </ul>
                    </div>
                    <div class="bar-c col-lg-2">
                        <ul>
                            <li>ขาย</li>
                        </ul>
                    </div>
                    <div class="bar-d col-lg-2">
                        <ul>
                            <li>เช่า</li>
                        </ul>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    <!--table-->
        <div class="container">
            <div class="alltable row">
                <div class="alltable col-lg-12">
                    <ul><br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <li>
                            <br>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul>
                                            <li>C23021519</li>
                                        </ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>เช่าคอนโด โนเบิล รีเวนต์ พญาไท กรุงเทพมหานคร<br>พญาไท, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                    </div>
                                    <div class="table-d col-lg-2">
                                        <ul>
                                            <li>40,000</li>
                                        </ul>
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <li>
                            <br>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul>
                                            <li>C23021519</li>
                                        </ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>เช่าคอนโด โนเบิล รีเวนต์ พญาไท กรุงเทพมหานคร<br>พญาไท, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                    </div>
                                    <div class="table-d col-lg-2">
                                        <ul>
                                            <li>40,000</li>
                                        </ul>
                                    </div>
                                </div>
                            </a><br>
                            <div class="line-table row">
                                <div class="line-table col-lg-12">
                                </div>
                            </div>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                                <div class="table row">
                                    <div class="table-a col-lg-2">
                                        <ul><li>C11101417</li></ul>
                                    </div>
                                    <div class="table-b col-lg-6">
                                        <ul>
                                            <li>ขายคอนโด 185 ราชดำริ ราชดำริ กรุงเทพมหานคร</li><br>
                                            <li>ราชดำริ, กรุงเทพมหานคร</li>
                                        </ul>
                                    </div>
                                    <div class="table-c col-lg-2">
                                        <ul>
                                            <li>20,000,000</li>
                                        </ul>
                                    </div>
                                    <div class="table-d col-lg-2">
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="div" style="margin-top: 10px">&nbsp;</div>
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
    <br>
</div>

<?php
$this->import('/layout/footer');
?>

