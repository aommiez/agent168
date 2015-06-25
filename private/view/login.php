<?php
$this->import('/layout/header');
?>
    <div class="member">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="nav nav-pills">
                        <li><a href="/agent168/register">REGISTER</a></li>
                        <li class="active"><a href="/agent168/login">LOGIN</a></li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="maillogin">
                                E-Mail : <input type="text" class="form-control">
                            </div>
                            <div class="passlogin" style="margin-left: 44.5px">
                                Password : <input type="password" class="form-control">
                            </div>
                            <div class="loginbtn">
                                <button type="button" class="btn btn-primary" style="padding: 0px">Login</button>
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