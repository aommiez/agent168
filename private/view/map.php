<?php
$this->import('/layout/headProperty');
?>
<style>
    .bgmap{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/bglist.jpg")?>);
    }


    .menu{
        margin-left: 40px;

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

    .linemap{
        background-image: url(<?php echo \Main\Helper\URL::absolute("/public/images/line.jpg")?>);
        width: 95%;
        margin-left: 40px;
    }


    #googleMap {
    position: absolute;
    margin-top: 20px;
    margin-left: 80px;
    width:1050px;
    height:400px;
    border: 3px solid #bbbbbb;
    }
</style>
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
            <div class="linemap row">
                <div class="linemap col-lg-12">
                </div>
            </div>
        </div>
        <div id="googleMap" ></div>
    </div>



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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
$this->import('/layout/footer');
?>