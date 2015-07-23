<?php
$this->import('/layout/header');
?>


<style>
    .allcontact{

    }
    .contact{
    }

    .block-a{
        background-color: #FFFFFF;
        padding: 10px;
        border: 5px solid #1957a4;
        width: 750px;
    }

    .block-a ul li{
        color: #000000;
        list-style-type: none;
        font-size: 16px;
        font-family: 'thaisans', 'Arial', sans-serif;
    }

    .block-b{
        background-color: #FFFFFF;
        padding: 20px;
        padding-right: 60px;
        border: 5px solid #1957a4;
    }


    .block-b ul li{
        color: #000000;
        list-style-type: none;
        font-size: 16px;
        font-family: 'thaisans', 'Arial', sans-serif;
        float: right;
    }

    h6 {
        color: #245ea7;
        font-family: 'thaisans', 'Arial', sans-serif;
        font-size: 16px;
    }

    .highlight{

    }

    .highlight-a{
        background-color: #1957a4;
        width: 320px;
    }

    .highlight-b{
        background-color: #1957a4;
        width: 340px;
        margin-left: 80px;
    }

    .highlight-a ul li{
        list-style-type: none;
        font-size: 12px;
        margin-left: -40px;
    }

    .highlight-b ul li{
        list-style-type: none;
        font-size: 12px;
        margin-left: -40px;
    }

.mainLeft {
    position: relative;
}
    #googleMap {
        position: absolute;
        top: 20px;
        right: 20px;
        width:400px;
        height:200px;
        border: 3px solid #bbbbbb;
    }

</style>

<div class="allcontact">
    <div class="container">
        <br><br>
        <span class="label label-default" style="background-color: #1957a4; height: 40px; font-size: 14px; margin-top: 395px;margin-left: 100px;position: absolute;z-index: 1px;border-top-left-radius:8px;border-top-right-radius:8px"><li style="margin-top : 5px; list-style-type: none">Highlight Propoties</li></span>
        <span class="label label-default" style="background-color: #1957a4; height: 40px; font-size: 14px; margin-top: 395px;margin-left: 480px;position: absolute;z-index: 1px;border-top-left-radius:8px;border-top-right-radius:8px"><li style="margin-top : 5px; list-style-type: none">Newsletter Sign Up</li></li></span>
        <span class="label label-default" style="background-color: #1957a4; font-size: 14px; margin-left: 100px;border-top-left-radius:8px;border-top-right-radius:8px">ติดต่อ Bangkok Citysmart</span>
        <span class="label label-default" style="background-color: #1957a4; font-size: 14px; margin-left: 600px;border-top-left-radius:8px;border-top-right-radius:8px">รายละเอียดการติดต่อ</span>
        <div class="contact row">
            <div class="block-a col-lg-8 mainLeft">
                <ul>
                    <h6> ที่อยู่ : </h6>
                    <li style="margin-top: -30px; margin-left: 40px">บริษัท กรุงเทพ ซิตี้สมาร์ท จำกัด</li>
                    <li>170/48 ชั้น 15 อาคารโอเชียนทาวเวอร์ 1</li>
                    <li>ถนนรัชดาภิเษกตัดใหม่ แขวงคลองเตย</li>
                    <li>เขตคลองเตย กรุงเทพฯ 10110</li><br>

                    <h6>โทร : </h6><li style="margin-top: -30px; margin-left: 35px">02-661-899, 02-661-8338</li>
                    <h6>แฟกซ์ : </h6><li style="margin-top: -30px; margin-left: 50px">02-661-8044</li><br>

                    <h6>อีเมล :</h6><li style="margin-top: -30px; margin-left: 50px">info@bkkcitismart.com</li>
                    <h6>เว็บไซต์ : </h6><li style="margin-top: -30px; margin-left: 60px">http://www.bkkcitismart.com/</li>
                    <h6>เฟสบุ๊ค : </h6><li style="margin-top: -30px; margin-left: 55px">http://www.facebook.com/bangkokcitismart</li>
                    <h6>ทวิตเตอร์ :</h6><li style="margin-top: -30px; margin-left: 75px">http://www.twitter.com/bkkcitismart </li>
                    <div id="googleMap" ></div>
                </ul>
            </div>


            <div class="block-b col-lg-4" style="margin-left: 20px" >
                <form class="form-horizontal">
                    <div class="form-group">
                        <ul>
                            <li><br>
                                เรื่อง :
                                <select class="form-control" style="font-size: 12px;height: 24px; width: 200px;  float: right; margin-top: -2px">
                                    <option>ซื้อ</option>
                                    <option>ขาย</option>
                                    <option>เช่า</option>
                                </select>
                            </li><br>
                            <li>
                                <textarea class="form-control" rows="3" style="font-size: 12px; width: 200px; margin-top: -1px"></textarea>
                            <li>ข้อความ : </li>
                            </li><br><br><br>
                            <li>
                                ชื่อ : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;  margin-top: -2px">
                            </li><br>
                            <li>
                                นามสกุล : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;  margin-top: -2px">
                            </li><br>
                            <li>
                                มือถือ : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;margin-top: -2px">
                            </li><br>
                            <li>
                                โทรศัพท์ : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;margin-top: -2px">
                            </li><br>
                            <li>
                                อีเมล : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;margin-top: -2px">
                            </li><br>
                            <li>
                                รหัสยืนยัน : <input type="text" class="form-control" style="font-size: 12px;height: 24px; width: 200px;margin-top: -2px">
                            </li><br><br>
                            <li style="text-align: center;font-size: 14px">กรุณากรอกตัวอักษรที่เห็นด้านล่างลงในช่องว่าง</li><br>
                            <li>
                                <textarea class="form-control" rows="2" style="font-size: 12px; width: 100px; float: left"></textarea>
                            </li>
                            <li>
                                <textarea class="form-control" rows="2" style="font-size: 12px; width: 140px; float: right"></textarea>
                            </li><br>
                            <button type="submit" class="btn btn-default" style="background-color: #1957a4;
                                border-radius:15px; margin-left: 100px; margin-top: 10px; color: #FFFFFF">ส่งข้อมูล</button>
                        </ul>
                    </div>
                </form>
            </div>
        </div>


        <div class="highlight row">
            <div class="highlight-a col-lg-4" style="margin-top: -150px; margin-left: 30px">
                <ul>
                    <img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>" style="margin-left: -40px;height: 200px;width: 290px;margin-top: 15px;">
                    <h6 style="margin-left: -40px; font-size: 14px;color: #FFFFFF"><b>แอสปาย สาทร ตากสิน (ทิมเบอร์ โซน)</b></h6>
                    <li style="color: #FFFFFF">ทำเล : สาทร, กรุงเทพมหานคร ขนาด: 26 ตร.ม.</li>
                    <li style="color: #FFFFFF">1 ห้องนอน 1 ห้องน้ำ sell : 1,880,000 บาท</li>
                </ul>
            </div>
            <div class="highlight-b col-lg-4" style="margin-top: -150px; margin-left: 50px">
                <ul>
                    <img src="<?php echo \Main\Helper\URL::absolute("/public/images/mail.gif")?>" style="margin-left: -40px;height: 260px;width: 310px;margin-top: 15px;">
                    <form>
                        <div class="form-group" style="padding-left: -20px">
                            <input type="text" class="form-control" placeholder="ใส่อีเมลของคุณ" style="font-size: 12px;height: 24px; width: 120px; margin-top: -100px; margin-left:70px;position: absolute; z-index: 1px">
                            <button type="submit" class="btn btn-default" style="background-color: #1957a4; border-radius: 15px;margin-left: 90px;margin-top: -65px;color: #FFFFFF; height: 30px;position: absolute;z-index: 1px">Submit</button>
                        </div>
                    </form>
                </ul>
            </div>
            <div class="highlight-b col-lg-4"></div>
        </div
    </div>
</div>
<br><br><br>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php
$this->import('/layout/footer');
?>

