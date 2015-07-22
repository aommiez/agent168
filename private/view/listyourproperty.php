<?php
$this->import('/layout/header');
?>

<style>
    .listyourproperty{

    }
    .listyourproperty ul li{
        list-style-type: none;
        display: inline;

    }
    .listyourproperty ul li a {
        color: #1957a4;
        font-size: 16px;
        list-style-type: none;
        display: inline;
    }

    .property{

    }
    .property-a{
        margin-top: 40px;
    }

    .property-a ul li{
        list-style-type: none;
    }

    .property-b{
        margin-top: 30px;

    }
    .property-a1{
    }



    .property-a2 {
        text-align: left;
        margin-top: -5px;
    }

    .property-a1 ul li{
        list-style-type: none;
        font-size: 14px;
        color: #1957a4;
        font-family: 'Roboto', 'Arial', sans-serif;
    }

    .property-a2 ul li{
        list-style-type: none;
        font-size: 12px;
        float: left;
        margin-top: 10px;
        color: #1957a4;

    }

    .interest{
        color: #FF0000;
    }


    .phonenum{
        background-color: #FFFFFF;
        margin-top: -60px;
        height: 60px;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom:1px solid #ddd;
        width: 340px;
        margin-left: 20px;
    }

    .phonenum ul li{
        color: #1957a4;
        font-size: 20px;
        list-style-type: none;
        float: right;
        margin-top: 23px;


    }

    .glyphicon.glyphicon-phone{
        font-size: 20px;
        color: #1957a4;


    }

    .glyphicon.glyphicon-envelope{
        #info {
            font-size: 20px;
            color: #1957a4;
        }
    }

    .glyphicon.glyphicon-home{
        font-size: 20px;
        margin-left: -10px;
        color: #1957a4;
    }

    .in{
        border-bottom:1px solid #ddd;
        width: 340px;
        margin-left: 20px;
    }

    .in li{
        list-style-type: none;
        color: #1957a4;
        font-size: 20px;
        margin-left: 160px;

    }
     .infologin{
         /*background-color: #fafafa;*/

     }

    .infologin li{
        list-style-type: none;
        color: #1957a4;
        font-size: 12px;
        margin-left: 10px;

    }

    .letter{
        text-align: center;
        position: absolute;
        z-index: 10;
        margin-top: -450px;
        margin-left: 100px;
        color: #1957a4;
    }


</style>

<hr style="border: 1px solid #000000">
<div class="container">
    <div class="listyourproperty">
        <ul>
            <li><a href="/agent168/home" style="color: #1957a4">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
            <li><a href="/agent168/home" style="color: #1957a4">Sell</a>&nbsp;&nbsp;/&nbsp;&nbsp;</li>
            <li><a href="/agent168/listyourproperty" style="color: #1957a4">Property</a></li>
            <li><hr style="border: 1px solid #c0c0c0"></li>
            <li style="color: #1957a4; font-size: 24px">List Property : Promote your Property</li>
        </ul>
    </div>



    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style="margin-left: 45px">
        <li class="active"><a href="#first" data-toggle="tab">Property Information</a></li>
        <li><a href="#second" data-toggle="tab" id="tab2">Contact Information</a></li>
        <li><a href="#third" data-toggle="tab" id="tab3">Finish</a></li>
    </ul>

    <div class="property row">
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="first">
                <div class="property-a col-lg-9">
                    <div class="property-a1 col-lg-3">
                        <ul>
                            <li style="margin-top: 10px">Property is : <div class="interest" style="margin-top: -20px;margin-left: 75px">*</div></li>
                            <li style="margin-top: 10px">Province : <div class="interest" style="margin-top: -20px;margin-left: 65px">*</div></li>
                            <li style="margin-top: 30px">Property Type : <div class="interest" style="margin-top: -20px;margin-left: 95px">*</div></li>
                            <li style="margin-top: 30px">Selling Price : <div class="interest" style="margin-top: -20px;margin-left: 85px">*</div></li>
                            <li style="margin-top: 30px">Rental Price / Month : <div class="interest" style="margin-top: -20px;margin-left: 135px">*</div></li>
                            <li style="margin-top: 50px">Project name : </li>
                            <li style="margin-top: 30px">Unit No. & Address : <div class="interest" style="margin-top: -20px;margin-left: 125px">*</div></li>
                            <li style="margin-top: 30px">Size (Sq.m.) : <div class="interest" style="margin-top: -20px;margin-left: 83px">*</div></li>
                            <li style="margin-top: 25px">Floor No. : <div class="interest" style="margin-top: -20px;margin-left: 68px">*</div></li>
                            <li style="margin-top: 25px">No. of Bedroom :</li>
                            <li style="margin-top: 25px">No. of Bathroom :</li>
                            <li style="margin-top: 30px">Full Description :</li>
                            <li style="margin-top: 90px">Upload a photo :</li>
                        </ul>
                    </div>
                    <div class="property-a2 col-lg-6">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <ul>
                                    <li style="margin-left: 10px">
                                        <label class="radio-inline" style="margin-top: -5px"><input type="radio" name="optradio">For Sale</label>&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline" style="margin-top: -5px"><input type="radio" name="optradio">For Rent</label>&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline" style="margin-top: -5px"><input type="radio" name="optradio">For Sale / Rent</label>
                                    </li><br><br>
                                    <li>
                                        <select class="form-control" style="font-size: 12px; width: 230px;  float: right; margin-top: -5px">
                                            <option></option>
                                            <option>Bangkok</option>
                                            <option>Nonthaburi</option>
                                            <option>Samut Prakarn</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -5px">
                                            <option></option>
                                            <option>Condominium</option>
                                            <option>Apartment</option>
                                            <option>Townhouse</option>
                                        </select>
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -5px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -5px">
                                    </li>
                                    <li style="margin-left: 10px;margin-top:-10px;color: #FF0000;font-size: 10px">
                                        The minimum price we would accept is 1,500,000<br>
                                        Bath and 13,000 Bath for sale and rent <br>
                                        respectively.
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -8px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px; width: 230px;margin-top: -8px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -8px">
                                    </li>
                                    <li>
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -8px">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -8px">
                                            <option></option>
                                            <option>Studio</option>
                                            <option>1 Bedroom</option>
                                            <option>2 Bedrooms</option>
                                            <option>3 Bedrooms</option>
                                            <option>4 Bedrooms</option>
                                            <option>5 Bedrooms</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -8px">
                                            <option></option>
                                            <option>1 Bathroom</option>
                                            <option>2 Bathrooms</option>
                                            <option>3 Bathrooms</option>
                                            <option>4 Bathrooms</option>
                                            <option>5 Bathrooms</option>
                                        </select>
                                    </li>
                                    <li>
                                        <textarea class="form-control" rows="5" cols="250" style="font-size: 12px; margin-top: -8px"></textarea>
                                    </li>
                                    <br><button type="submit" class="btn btn-default" style="border-radius: 20px;background-color: #1957a4;color: #FFFFFF; height: 30px;width: 100px;margin-left: 10px;float: left"><li style="color: #FFFFFF;margin-top: -2px;list-style-type: none">SELECT FILES</button><li style="color: #000000;font-size: 10px;margin-left: 10px">Allow .jpg .gif .png and Max file size per image is not 1Mb<li>
                                    </li>
                                    <li>
                                        <br><br><br><button id="step1"  class="btn btn-default" style="border-radius: 0px;background-color: #FFFFFF; height: 30px;width: 100px;margin-left: -360px;float: left"><li style="color: #1957a4;margin-top: -2px;list-style-type: none;margin-left: 10px">Next Step</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="property-b col-lg-3" style="margin-left: -100px">
                    <div class="phone">
                        <br>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true" style="margin-left: 220px"></span>
                        <div class="phonenum"><ul><li>02-222-2222</li></ul></div><br><br><br>
                        <div class="in">
                            <br><br>
                            <li><span class="glyphicon glyphicon-envelope" id="info" aria-hidden="true" style="margin-left: -30px"></span></li>
                            <li style="margin-top: -30px;padding-bottom: 8px">info@agent168.com</li>

                        </div>
                        <div class="infologin" style="margin-left: 20px"><br>
                            <li style="font-size: 24px">Login</li>
                            <li>Please fill in your information :</li>
                            <li>
                                <input type="text" class="form-control" style="font-size: 12px;width: 330px;margin-left: 0px">
                            </li>
                            <li>
                                <input type="text" class="form-control" style="font-size: 12px;width: 330px;margin-left: 0px">
                            </li>
                            <li>
                                forgot a new password ?<br>
                                Creat a new account
                                <button type="submit" class="btn btn-default" style="border-radius: 0px;background-color: #1957a4;width: 80px;color: #FFFFFF;margin-left: 160px;margin-top: -50px">Login</button>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="second">
                <div class="property-a col-lg-9">
                    <div class="property-a1 col-lg-3">
                        <ul>
                            <li  style="margin-top: 10px">Title :</li>
                            <li style="margin-top: 30px">First Name : <div class="interest" style="margin-top: -20px;margin-left: 80px">*</div></li>
                            <li style="margin-top: 30px">Last Name : <div class="interest" style="margin-top: -20px;margin-left: 80px">*</div></li>
                            <li style="margin-top: 25px">E-mail : <div class="interest" style="margin-top: -20px;margin-left: 50px">*</div></li>
                            <li style="margin-top: 30px">Mobile No.: <div class="interest" style="margin-top: -20px;margin-left: 75px">*</div></li>
                            <li style="margin-top: 30px">Telephone No.: </li>
                        </ul>
                    </div>
                    <div class="property-a2 col-lg-6">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <ul>
                                    <li style="margin-top: 20px">
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -5px">
                                            <option>Not Specific</option>
                                            <option>Mr.</option>
                                            <option>Miss</option>
                                            <option>Mrs.</option>
                                            <option>Dr.</option>
                                        </select>
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px; width: 230px;margin-top: -5px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -5px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -8px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px;width: 230px;margin-top: -8px">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" style="font-size: 12px; width: 230px;margin-top: -8px">
                                    </li><br><br>

                                    <hr style="margin-top: 270px; width: 450px;margin-left: -200px">
                                    <li style="margin-left: 10px"> How do you know our company?</li><div class="interest" style="margin-top: 25px;margin-left: 190px;font-size: 16px">*</div>
                                    <li style="margin-top: 20px">
                                        <select class="form-control" style="font-size: 12px;width: 230px;  float: right; margin-top: -5px">
                                            <option></option>
                                            <option>Search Engine</option>
                                            <option>Other Website</option>
                                            <option>Email</option>
                                            <option>SMS</option>
                                            <option>Brochure</option>
                                            <option>Direct Mail</option>
                                            <option>Magazine</option>
                                            <option>Newspaper</option>
                                            <option>Billboard</option>
                                            <option>Referrals</option>
                                        </select>
                                    </li>
                                    <li style="margin-left:-430px;margin-top: 50px"><a href="#" style="color: #000000"> << BACK </a></li>
                                    <li>
                                        <br><br><br><button  class="btn btn-default" id="step2" style="border-radius: 0px;background-color: #FFFFFF; height: 30px;width: 100px;margin-left: -230px;float: left"><li style="color: #1957a4;margin-top: -2px;list-style-type: none;margin-left: 15px">Submit</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="property-b col-lg-3" style="margin-left: -100px">
                    <div class="phone">
                        <br>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true" style="margin-left: 220px"></span>
                        <div class="phonenum"><ul><li>02-222-2222</li></ul></div><br><br><br>
                        <div class="in">
                            <br><br>
                            <li><span class="glyphicon glyphicon-envelope" id="info" aria-hidden="true" style="margin-left: -30px"></span></li>
                            <li style="margin-top: -30px;padding-bottom: 8px">info@agent168.com</li>

                        </div>
                        <div class="infologin" style="margin-left: 20px"><br>
                            <li style="font-size: 24px">Login</li>
                            <li>Please fill in your information :</li>
                            <li>
                                <input type="text" class="form-control" style="font-size: 12px;width: 330px;margin-left: 0px">
                            </li>
                            <li>
                                <input type="text" class="form-control" style="font-size: 12px;width: 330px;margin-left: 0px">
                            </li>
                            <li>
                                forgot a new password ?<br>
                                Creat a new account
                                <button type="submit" class="btn btn-default" style="border-radius: 0px;background-color: #1957a4;width: 80px;color: #FFFFFF;margin-left: 160px;margin-top: -50px">Login</button>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="third">
                <div class="property-a col-lg-7">
                        <ul>
                            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/letter.png")?>" style="margin-left: -40px;margin-top: "></li>
                        </ul>
                        <div class="letter">
                            <ul>
                                <li>THANK YOU!</li><br>
                                <li>Thank you for trusting us with your property. We will be taking great<br>
                                care in handing your request and will respond promptly as soon as<br>
                                we find your match.</li>
                            </ul>
                        </div>
                </div>
                <div class="property-a col-lg-2">

                </div>


                <div class="property-b col-lg-3" style="margin-left: -100px">
                    <div class="in"><br>
                        <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span></li>
                        <li style="margin-top: -28px;margin-left: 182px;padding-bottom: 8px">Highlight Property</li>
                    </div>
                    <div class="infologin" style="width: 350px"><br>
                        <ul>
                            <li><img src="<?php echo \Main\Helper\URL::absolute("/public/images/highlight.gif")?>" style="margin-left: -30px;width: 340px"></li>
                            <h6 style="margin-left: -20px; font-size: 14px;color: #1957a4"><b>แอสปาย สาทร ตากสิน (ทิมเบอร์ โซน)</b></h6>
                            <li style="margin-left: -20px;color: #1957a4">ทำเล : สาทร, กรุงเทพมหานคร ขนาด: 26 ตร.ม.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li style="margin-left: -20px;color: #1957a4">1 ห้องนอน 1 ห้องน้ำ sell : 1,880,000 บาท</li>
                            <br>
                        </ul>
                    </div>
                    <br><br>
                    <div class="in">
                        <li><span class="glyphicon glyphicon-envelope" id="info" aria-hidden="true" style="margin-left: -15px"></span></li>
                        <li style="margin-top: -30px;margin-left: 177px;padding-bottom: 8px">Newsletter sign up</li>
                    </div>
                    <div class="infologin" style="width: 350px"><br>
                        <ul>
                            <ul>
                                <img src="<?php echo \Main\Helper\URL::absolute("/public/images/mail.gif")?>" style="margin-left: -60px;width: 340px">
                                <form>
                                    <div class="form-group" style="padding-left: 70px;margin-top: -50px">
                                        <input type="text" class="form-control" placeholder="ใส่อีเมลของคุณ" style="font-size: 12px;height: 34px; width: 180px; margin-top: -80px;position: absolute; z-index: 1px">
                                        <button type="submit" class="btn btn-default" style="background-color: #1957a4; border-radius: 15px;margin-left: 70px;margin-top: -35px;color: #FFFFFF; height: 30px;position: absolute;z-index: 1px">Submit</button>
                                    </div>
                                </form>
                            </ul>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<script>
    $( document ).ready(function() {
        $("#step1").click(function(){
            $("#tab2").click();
            return false;
        });
        $("#step2").click(function(){
            $("#tab3").click();
            return false;
        });
    });





</script>
<?php
$this->import('/layout/footer');
?>