<?php if(!class_exists("View", false)) exit("no direct access allowed");?>		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/app.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/shopping-cart.css">
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/t/adapt.css"/>


		<header class="mui-bar mui-bar-nav">
			<!-- <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a> -->
			<h1 class="mui-title">个人中心</h1>
		<!-- 	<a class="rig_shai" id="rem_s" href="javascript:void(0)" style="margin-right: 2%;position: absolute; top: 30px; right: 3%;">编辑</a> -->
		</header>
		
		<div class="nav-bottom" >
			<div class="new-mine">
				<div class="mine-photo min-photo-bgimg">
					<img  src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/images/muwu.jpg" />
					<h4><?php echo htmlspecialchars($WebUserName, ENT_QUOTES, "UTF-8"); ?></h4>
					<ul class="mine-photo-list">
						<!-- href="../pages/new-mine-grade.html" -->
						<li><a ><p>我的积分</p><h4><?php echo round($userpoints);?></h4></a></li>
					</ul>
				</div>
				
				<!-- <div class="new-mine-title"><a href="#"><span class="icon iconfont icon-quanbudingdan"></span>全部订单</a></div>
				<ul class="new-min-title-list">
					<li><a href="new-mine-order.html"><span class="icon iconfont icon-daishenhe"></span>待审核</a></li>
					<li><a href="new-mine-order1.html"><span class="icon iconfont icon-daifahuo"></span>待发货</a></li>
					<li><a href="new-mine-order2.html"><span class="icon iconfont icon-daishouhuo"></span>待收货</a></li>
				</ul> -->
				
				<div class="new-mine-title">
					<span class="icon iconfont icon-xiaoshou"></span>我的订单
				</div>
				<ul class="new-min-title-list">
					<!-- <li><a href="new-mine-order4.html"><span class="icon iconfont icon-iconpay2"></span>待销售</a></li>
					<li><a href="new-mine-order5.html"><span class="icon iconfont icon-daijiesuan"></span>待结算</a></li>-->
					<li><a href="<?php echo url(array('c'=>'mine', 'a'=>'pay', ));?>" target="_self"><span class="icon iconfont icon-yijiesuan"></span>已结算</a></li>
					<li><a href="<?php echo url(array('c'=>'mine', 'a'=>'atrefund', ));?>" target="_self"><span class="icon iconfont icon-huaduo"></span>退款售后</a></li>
				</ul>
				
				<ul class="mui-table-view" style="margin-top: 10px;">
					<li class="mui-table-view-cell">
						<a href="<?php echo url(array('c'=>'mine', 'a'=>'changepwd', ));?>" class="mui-navigate-right">
							修改信息
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right">
							关于我们
						</a>
					</li>
					<li class="mui-content-padded">
						<a id='loginout' class="mui-btn mui-btn-block mui-btn-primary" href="<?php echo url(array('c'=>'login', 'a'=>'logout', ));?>" target="_parent">退出</a>
					</li>
				</ul>
			</div>
		</div>
