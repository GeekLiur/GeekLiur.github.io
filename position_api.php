<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>浏览器精确定位</title>
    <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css" />
    <style>
        html,body,#container{
            height:100%;
        }
        .info{
            width:26rem;
        }
    </style>
<body>

<div id="status"></div>

<script type="text/javascript">
    window._AMapSecurityConfig = {
        securityJsCode:'4c75376152bcc836e2fb84603efedbfd',
    }
</script>
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.15&key=9ea6a46966c425b8b64d636223077759"></script>
<script type="text/javascript">
    var map = new AMap.Map('container', {
        resizeEnable: true
    });
    AMap.plugin('AMap.Geolocation', function() {
        var geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：5s
            buttonPosition:'RB',    //定位按钮的停靠位置
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: true,   //定位成功后是否自动调整地图视野到定位点
            needAddress:true,
        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition(function(status,result){
            if(status=='complete'){
                onComplete(result)
            }else{
                onError(result)
            }
        });
    });
    //解析定位结果
    function onComplete(data) {
        document.getElementById('status').innerHTML=JSON.stringify(data.formattedAddress);
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('status').innerHTML='定位失败'
        document.getElementById('status').innerHTML = '失败原因排查信息:'+data.message;
    }
</script>
</body>
</html>
