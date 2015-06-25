<?php
$this->import('/layout/header');
?>
    <div class="member">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="/agent168/register">REGISTER</a></li>
                        <li><a href="/agent168/login">LOGIN</a></li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="regis">
                                <div class="dropdown">
                                    คำนำหน้าชื่อ : <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px; margin-left: 65px">- - - - - - - - <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>นาย / Mr.</li>
                                        <li>นาง / Mrs.</li>
                                        <li>นางสาว / Miss</li>
                                    </ul>
                                </div>
                                <div class="nameregis">ชื่อ / Name : <input type="text" class="form-control" style="margin-left: 70px"></div>
                                <div class="nameregis">นามสกุล / Lastname : <input type="text" class="form-control"></div>
                                <div class="telinput">เบอร์โทรศัพท์ / Tel. : <input type="text" class="form-control" style="margin-left: 25px"></div>
                                <div class="mailregis"">อีเมล / E-Mail : <input type="text" class="form-control" style="margin-left: 55px"></div>
                                <div class="passregis">รหัสผ่าน / Password : <input type="password" class="form-control" style="margin-left: 12px"></div>
                                <div class="passconfirm">Confirm Password : <input type="password" class="form-control" style="margin-left: 20px"></div>
                                <div class="coderegis">รหัสยืนยัน / Code :<input type="text" class="form-control" style="margin-left: 33px"></div>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox">รับข่าวสาร และโปรโมชั่นต่างๆ จาก Website</label>
                            </div>
                            <div class="regisbtn">
                                <button type="button" class="btn btn-primary" style="padding: 0px">สมัครสมาชิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$this->import('/layout/footer');
?>