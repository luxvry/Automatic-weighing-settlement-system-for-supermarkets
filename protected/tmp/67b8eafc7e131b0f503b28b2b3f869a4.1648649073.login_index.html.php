<?php if(!class_exists("View", false)) exit("no direct access allowed");?>		<style>
			.area {
				margin: 20px auto 0px auto;
			}
			
			.mui-input-group {
				margin-top: 10px;
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
			
			.link-area {
				display: block;
				margin-top: 25px;
				text-align: center;
			}
			
			.spliter {
				color: #bbb;
				padding: 0px 8px;
			}
			
			.oauth-area {
				position: absolute;
				bottom: 20px;
				left: 0px;
				text-align: center;
				width: 100%;
				padding: 0px;
				margin: 0px;
			}
			
			.oauth-area .oauth-btn {
				display: inline-block;
				width: 50px;
				height: 50px;
				background-size: 30px 30px;
				background-position: center center;
				background-repeat: no-repeat;
				margin: 0px 20px;
				/*-webkit-filter: grayscale(100%); */
				border: solid 1px #ddd;
				border-radius: 25px;
			}
			
			.oauth-area .oauth-btn:active {
				border: solid 1px #aaa;
			}
			
			.oauth-area .oauth-btn.disabled {
				background-color: #ddd;
			}
		</style>

	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">登录</h1>
		</header>
		<div class="mui-content">
			<form id='login-form' class="mui-input-group">
				<input type="hidden" name="deviceid" value="<?php echo htmlspecialchars($deviceid, ENT_QUOTES, "UTF-8"); ?>" />
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' type="text" class="mui-input-clear mui-input" name="username" placeholder="请输入账号">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" class="mui-input-clear mui-input" name="userpwd" placeholder="请输入密码">
				</div>
				<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell">
						自动登录
						<div id="autoLogin" class="mui-switch">
							<div class="mui-switch-handle"></div>
						</div>
					</li>
				</ul>
			</form>

			<div class="mui-content-padded">
				<button id='login' type="button" class="mui-btn mui-btn-block mui-btn-primary">登录</button>
				<div class="link-area">
					<a id='reg' href="<?php echo url(array('c'=>'reg', 'a'=>'index', ));?>">注册账号</a>
					<span class="spliter">|</span>
					<a id='forgetPassword' href="<?php echo url(array('c'=>'forget', 'a'=>'index', ));?>">忘记密码</a>
				</div>
			</div>
			<div class="mui-content-padded oauth-area">
			</div>
		</div>

		<script>
			(function($, doc) {
				$.init({
					statusBarBackground: '#f7f7f7'
				});
			}(mui, document));
		</script>

		<script type="text/javascript" charset="utf-8">
			//mui初始化
			mui.init({
				swipeBack: true //启用右滑关闭功能
			});
			$(document).ready(function (){
				$('#login-form').attr('action','<?php echo url(array('c'=>"login", 'a'=>"login", ));?>');
				$('#login-form').attr('method','post');
				$('#login-form').bind("submit", function (e){
					//var _this = e.currentTarget;
					var name = $('#account').val();
					var pwd = $('#password').val();
					if(name.length==0 ||pwd.length==0){
						mui.toast('用户名和密码不能为空!');
						return false;
					}
					return true;
				});
				$('#login').bind("click", function (){
					$('#login-form').submit();
				});
			});

		</script>
	</body>

