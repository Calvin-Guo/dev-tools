<?php
require_once "jssdk.php";
//！！！！只需要修改appId和appSecret即可！！！！
$jssdk = new JSSDK("wx429ddfd3ade02ae7", "5831db4b898a35b99ce2969bd6e70340");//阿财俱乐部
//！！！！只需要修改appId和appSecret即可！！！！
//$jssdk = new JSSDK("wx3c60253a46243eef", "fb98f64811213672e81817fa9ead1eba");//猫头帮
//$jssdk = new JSSDK("wxecab1927080e4b42", "e618ab7f6f3ac18ce867133e54517ad8");//阿财盘中直击
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="keywords" content="" /> 
<meta name="description" content="" />
<meta name="renderer" content="webkit">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>演示例子</title>
</head>
<body>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, quae, eum, adipisci, iure dicta ipsum aliquam distinctio hic vitae fugiat qui ab. Numquam, eaque dolorem voluptatum omnis vitae eos aut.
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
var daily_title ='我是标题';//$('#daily-title').html()
var daily_content ='我是描述';//$('#daily-content').html()
var href='http://www.baidu.com';//window.location.href
var shareImg='http://ww3.sinaimg.cn/large/9ed5c127gw1ey692sp9roj205k05kt8o.jpg';
  /*
   * 注意：
   * 1. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
'onMenuShareTimeline',
'onMenuShareAppMessage'
    ]
  });
  wx.ready(function () {
    //******在这里调用 API********************
    //分享到朋友圈[[
       wx.onMenuShareTimeline({
           title: daily_title,// 分享标题
           link: href,// 分享链接
           imgUrl: shareImg,// 分享图标
           success: function() {
               // 用户确认分享后执行的回调函数
           },
           cancel: function() {
               // 用户取消分享后执行的回调函数
           }
       });
    //分享到朋友圈]]
    //分享给单个朋友[[
        wx.onMenuShareAppMessage({
           //分享给单个朋友
           title: daily_title,// 分享标题
           desc: daily_content,// 分享描述
           link: href,// 分享链接
           imgUrl: shareImg,// 分享图标
           type: '',// 分享类型,music、video或link，不填默认为link
           dataUrl: '',// 如果type是music或video，则要提供数据链接，默认为空
           success: function() {
               // 用户确认分享后执行的回调函数
           },
           cancel: function() {
               // 用户取消分享后执行的回调函数
           }
       });
    //分享给单个朋友]]
  });
</script>
</html>
