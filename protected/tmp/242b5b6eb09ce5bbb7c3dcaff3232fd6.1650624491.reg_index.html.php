<?php if(!class_exists("View", false)) exit("no direct access allowed");?>	<style>
		.area {
			margin: 20px auto 0px auto;
		}
		.mui-input-group:first-child {
			margin-top: 20px;
		}
		.mui-input-group label {
			width: 22%;
		}
		.mui-input-row label~input,
		.mui-input-row label~select,
		.mui-input-row label~textarea {
			width: 78%;
		}
		.mui-checkbox input[type=checkbox],
		.mui-radio input[type=radio] {
			top: 6px;
		}
		.mui-content-padded {
			margin-top: 25px;
		}
		.mui-btn {
			padding: 10px;
		}

		/*验证码*/
		.verificationCode{
			width: 7rem;
			height: 100%;
			position: absolute;
			right: 0;
		}
		canvas{
			width: 100%;
			height: 100%;
		}
		#code_img {
			width: 100%;
			height: 100%;
			cursor: pointer;
			vertical-align: top;
		}

	</style>

	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">注册</h1>
	</header>
	<div class="mui-content">
		<form id="reg_form" class="mui-input-group">
			<div class="mui-input-row">
				<label>手机</label>
				<input id='account' name="username" type="text" class="mui-input-clear mui-input" placeholder="请输入手机号">
			</div>
			<div class="mui-input-row">
				<label>密码</label>
				<input id='password' name="userpwd" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
			</div>
			<div class="mui-input-row">
				<label>确认</label>
				<input id='password_confirm' name="repwd" type="password" class="mui-input-clear mui-input" placeholder="请确认密码">
			</div>
			<div class="mui-input-row">
				<label>邮箱</label>
				<input id='email' type="email" name="email" class="mui-input-clear mui-input" placeholder="请输入邮箱">
			</div>
			<div class="mui-input-row">
				<label>验证</label>
				<input id='verifital_input' type="text" class="mui-input-clear mui-input" placeholder="请输入验证码">
				<div id="verificationCode" class="verificationCode">
					<canvas width="100" height="40" id="verifyCanvas"></canvas>
					<img id="code_img">
				</div>
			</div>
		</form>
		<div class="mui-content-padded">
			<button id='reg' class="mui-btn mui-btn-block mui-btn-primary">注册</button>
		</div>

	</div>

	<script>
		//mui初始化
		mui.init({
			swipeBack: true //启用右滑关闭功能
		});
		$(document).ready(function (){
			$('#reg_form').attr('action','<?php echo url(array('c'=>"reg", 'a'=>"reg", ));?>');
			$('#reg_form').attr('method','post');
			$('#reg_form').bind("submit", function (e){
				// mobile和email的正则判断式
				var reg_mobile = /^1[3|5|7|8|9][0-9]\d{4,8}$/;
				var reg_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

				var mobile = $('#account').val();
				var pwd = $('#password').val();
				var repwd = $('#password_confirm').val();
				var email = $('#email').val();
				var verifital = $('#verifital_input');
				//开始判断
				if(mobile.length==0){
					mui.toast("手机号不能为空!");
					return false;
				}
				if(!reg_mobile.test(mobile)){
					mui.toast("您输入的手机号码格式不正确，请重新输入!");
					return false;
				}
				if(checkuser(mobile)!=0) {
					mui.toast("用户已注册！");
					return false;
				}
				if(pwd.length==0){
					mui.toast("密码不能为空!");
					return false;
				}
				if(pwd != repwd){
					mui.toast("两次密码不匹配!");
					return false;
				}
				if(!reg_email.test(email)){
					mui.toast("您输入的邮箱格式不正确，请重新输入!");
					return false;
				}
				if(verifital.val().length==0){
					mui.toast("请输入验证码！");
					return false;
				}
				if(verifital.val().toUpperCase() != str ) { //若输入的验证码与产生的验证码不一致时
					mui.toast("验证码输入错误！@_@"); //则弹出验证码输入错误
					resetCode();//刷新验证码
					verifital.val("");//清空文本框
					verifital.focus();//重新聚焦验证码框
					return false;
				}
				return true;
			});
			$('#reg').bind("click", function (){
				$('#reg_form').submit();
			});
		});

		function checkuser(uname) {
			var r=0;
			$.ajaxSettings.async = false;
			$.post("<?php echo url(array('c'=>'reg', 'a'=>'checkuser', ));?>",
					{ username : uname	},
					function(data){
						r = data;
					}
			);
			$.ajaxSettings.async = true;
			console.log("r:"+r);
			return r;
		}

		<!-- 验证码代码块 -->
		var nums = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0",
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
		//验证码大写变量
		var str = '';
		//验证码声明变量
		var verVal = drawCode();
		// 绘制验证码
		function drawCode () {
			var canvas = document.getElementById("verifyCanvas"); //获取HTML端画布
			var context = canvas.getContext("2d"); //获取画布2D上下文
			context.fillStyle = "cornflowerblue"; //画布填充色
			context.fillRect(0, 0, canvas.width, canvas.height); //清空画布
			context.fillStyle = "white"; //设置字体颜色
			context.font = "25px Arial"; //设置字体
			var rand = new Array();
			var x = new Array();
			var y = new Array();
			//生成四位验证码
			for (var i = 0; i < 4; i++) {
				rand.push(rand[i]);
				rand[i] = nums[Math.floor(Math.random() * nums.length)]
				x[i] = i * 20 + 10;
				y[i] = Math.random() * 20 + 20;
				context.fillText(rand[i], x[i], y[i]);
			}
			//将验证码转化为大写并赋值给str
			str = rand.join('').toUpperCase();
			//画3条随机线
			for (var i = 0; i < 3; i++) {
				drawline(canvas, context);
			}
			// 画30个随机点
			for (var i = 0; i < 30; i++) {
				drawDot(canvas, context);
			}
			//绘制图片
			convertCanvasToImage(canvas);
		}
		// 随机线
		function drawline (canvas, context) {
			context.moveTo(Math.floor(Math.random() * canvas.width), Math.floor(Math.random() * canvas.height)); //随机线的起点x坐标是画布x坐标0位置，y坐标是画布高度的随机数
			context.lineTo(Math.floor(Math.random() * canvas.width), Math.floor(Math.random() * canvas.height)); //随机线的终点x坐标是画布宽度，y坐标是画布高度的随机数
			context.lineWidth = 0.5; //随机线宽
			context.strokeStyle = 'rgba(50,50,50,0.3)'; //随机线描边属性
			context.stroke(); //描边，即起点描到终点
		}
		// 随机点(所谓画点其实就是画1px像素的线，方法不再赘述)
		function drawDot (canvas, context) {
			var px = Math.floor(Math.random() * canvas.width);
			var py = Math.floor(Math.random() * canvas.height);
			context.moveTo(px, py);
			context.lineTo(px + 1, py + 1);
			context.lineWidth = 0.2;
			context.stroke();
		}
		// 绘制图片
		function convertCanvasToImage (canvas) {
			document.getElementById("verifyCanvas").style.display = "none";
			var image = document.getElementById("code_img");
			image.src = canvas.toDataURL("image/png");
			return image;
		}

		// 点击图片刷新
		document.getElementById('code_img').onclick = function() {
			resetCode();
		}
		//重置验证码
		function resetCode () {
			$('#verifyCanvas').remove();
			$('#code_img').before('<canvas width="100" height="40" id="verifyCanvas"></canvas>')
			//重新生成验证码
			verVal = drawCode();
		}
	</script>
