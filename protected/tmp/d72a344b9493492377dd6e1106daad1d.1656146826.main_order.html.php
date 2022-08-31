<?php if(!class_exists("View", false)) exit("no direct access allowed");?>		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/app.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/shopping-cart.css">
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/t/adapt.css"/>


	<!--<body class="mui-plus mui-statusbar mui-statusbar-offset">-->
		<header class="mui-bar mui-bar-nav">
			<!-- <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a> -->
			<h1 class="mui-title">购物车</h1>
			<a class="rig_shai" id="rem_add" href="<?php echo url(array('c'=>'main', 'a'=>'add', ));?>" style="margin-right: 2%;position: absolute; top: 10px; right: 15%;">添加</a>
			<a class="rig_shai" id="rem_s" href="javascript:void(0)" style="margin-right: 2%;position: absolute; top: 10px; right: 3%;">编辑</a>
		</header>

		<!--<form method="post" name="cart_form" target="_self" id="cart_form" action="<?php echo url(array('c'=>'main', 'a'=>'pay', ));?>">-->
			<!--list-->
			<div class="commodity_list_box" style="position: fixed; top: 28px; bottom: 40px; width: 100%;overflow-y: auto; overflow-x:hidden;">
				
				<!--商品列表-->
				<div class="commodity_box">
					<div class="commodity_list">
						<!--店名信息-->
						<?php if ($trade) : ?>
						<!--商品-->
						<?php if(!empty($trade)){ $_foreach_t_counter = 0; $_foreach_t_total = count($trade);?><?php foreach( $trade as $t ) : ?><?php $_foreach_t_index = $_foreach_t_counter;$_foreach_t_iteration = $_foreach_t_counter + 1;$_foreach_t_first = ($_foreach_t_counter == 0);$_foreach_t_last = ($_foreach_t_counter == $_foreach_t_total - 1);$_foreach_t_counter++;?>
						<ul class="commodity_list_term">
							<li class="select">
								<em aem="0" cart_id="<?php echo htmlspecialchars($t['trade_id'], ENT_QUOTES, "UTF-8"); ?>"></em><!--<?php echo htmlspecialchars($t['trade_id'], ENT_QUOTES, "UTF-8"); ?>-->
								<img src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/images/preview_picture/<?php echo htmlspecialchars($t['product_img'], ENT_QUOTES, "UTF-8"); ?>" />
								<h4><?php echo htmlspecialchars($t['product_name'], ENT_QUOTES, "UTF-8"); ?></h4>
								<div class="div_center">
									<span>单价:<label class="mr-6"><?php echo htmlspecialchars($t['product_price'], ENT_QUOTES, "UTF-8"); ?></label>称重:<label><?php echo htmlspecialchars($t['productweight'], ENT_QUOTES, "UTF-8"); ?></label></span>
									<!--<p class="now_value"><i>￥</i><b class="qu_su"><?php echo round($t['all_price'], 2);?></b></p>-->
								</div>
								<div class="div_right">
									￥<b class="qu_su"><?php echo round($t['all_price'], 2);?></b>
								</div>
							</li>
						</ul>
						<?php endforeach; }?>
						<?php endif; ?>
					</div>
				</div>
				
				<!-- 商品列表 end -->
			</div>
			<!-- end -->

			<!-- footer -->
		<form name="cart_form" target="_top" id="cart_form"  method="post" action="<?php echo url(array('c'=>'alipay', 'a'=>'index', ));?>">
			<input type="hidden" name="trade_ids" /><input type="hidden" name="total_pay" />
			<div class="settle_box" style="position: fixed;bottom: 0px;">
				<ul class="all_check select">
					<li><span id="all_pitch_on"></span><div>全选</div></li>
				</ul>
				<ul class="total_amount">
					<li style="display: flex;">合计：<p id="total_price">¥<b>0</b></p></li>
					<li style="display: flex; width: 100px;">
						<a class="settle_btn" href="javascript:void(0);" id="confirm_cart" onclick="pay()">结算</a>
					</li>
				</ul>
				<a class="settle_btn" style="width: 100px;" href="javascript:void(0);" id="confirm_cart1" onclick="big_cart_remove()">删除</a>
			</div>
		</form>
			<!-- end -->
		<!--</form>-->

		<script>
			var allThis = $(".commodity_box .select em"); /*底部全选*/
			//document.getElementById("rem_add").addEventListener('tap', function(e) {
			/*$("#rem_add").bind('tap', function(e) {
				//e.detail.gesture.preventDefault(); //修复iOS 8.x平台存在的bug，使用plus.nativeUI.prompt会造成输入法闪一下又没了
				e.preventDefault();
				var btnArray = ['取消', '确定'];
				mui.prompt('', '', '添加订单', btnArray, function(e) {
					$('#Trade-Add').submit();
				})
				var g;
				var actionurl = '<?php echo url(array('c'=>"main", 'a'=>"add", ));?>';
				console.log('ur:'+actionurl);
				g = '<form id="Trade-Add" action="' + actionurl + '" method="post">';
				g += '<div className="mui-input-group">';
				g += '	<div className="mui-input-row">';
				g += '		<a className="mui-navigate-right">';
				g += '     <span className="mui-badge1">';
				g += '		<select className="mui-h5" name="productid" style="margin:auto; color:#000;">';
				g += '			<option disabled>选择商品</option>';
				<?php if ($product) : ?>
					<?php if(!empty($product)){ $_foreach_p_counter = 0; $_foreach_p_total = count($product);?><?php foreach( $product as $p ) : ?><?php $_foreach_p_index = $_foreach_p_counter;$_foreach_p_iteration = $_foreach_p_counter + 1;$_foreach_p_first = ($_foreach_p_counter == 0);$_foreach_p_last = ($_foreach_p_counter == $_foreach_p_total - 1);$_foreach_p_counter++;?>
						g += '<option value="<?php echo htmlspecialchars($p['product_id'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($p['product_name'], ENT_QUOTES, "UTF-8"); ?></option>';
					<?php endforeach; }?>
				<?php endif; ?>
				g += '</select>';
				g += '</span>';
				g += '		</a>';
				g += '	</div>';
				g += '</div>';

				g += '<input type="text" name="productweight" value="0" placeholder="填入称重(千克)"/>';
				g += '</form>';

				$(".mui-popup-input").html(g);
				console.log(document.querySelector('.mui-popup-input'));

			});*/


			/* 编辑商品  */
			var topb = 0;
			$("#rem_s").click(function() {
				if(topb == 0) {
					$(this).text("完成");
					$(".total_amount").hide(); /* 合计  */
					$("#confirm_cart").hide(); /* 结算  */
					$("#confirm_cart1").show(); /* 删除 */
					topb = 1;

				} else {
					topb = 0;
					$(this).text("编辑");
					$(".total_amount").show(); /* 合计  */
					$("#confirm_cart").show(); /* 结算  */
					$("#confirm_cart1").hide(); /* 删除 */
					allThis.removeClass("pitch_on"); /* 取消所有选择  */
					$("#all_pitch_on").removeClass("pitch_on"); /* 取消所有选择  */
					commodityWhole();
				}

			});

			//删除 
			function big_cart_remove() {
				$(".commodity_list_term .pitch_on").parent().remove();
				$(".commodity_list  > em.pitch_on").parents(".commodity_box").remove();
			}

			/*全部商品价格*/
			function commodityWhole() {
				/* 合计金额  */
				var qu_sus = $(".commodity_box .select > em.pitch_on").parent().find(".qu_su"); /* 全部商品单价  */
				var TotalJe = 0;
				for(var i = 0; i < qu_sus.length; i++) {
					var n = qu_sus.eq(i).text();
					TotalJe +=  parseFloat(n);
				}
				console.log("TotalJe="+TotalJe);
				$("#total_price b").text(TotalJe.toFixed(2)); /* 合计金额  */
				//$("imput[name='total_price']").text($("#total_price b").text());
			};
			//选择结算商品
			$(".select em").click(function() {
				/* 单选商品  */
				if($(this).hasClass("pitch_on")) {
					/*去底部全选*/
					$("#all_pitch_on").removeClass("pitch_on");
					$(this).removeClass("pitch_on");
				} else {
					$(this).addClass("pitch_on");
					/*商品全部选中时*/
					var fot = $(".commodity_list_box  .pitch_on");
					var fot1 = $(".commodity_list_box em");
					if(fot.length == fot1.length)
						$("#all_pitch_on").addClass("pitch_on");
				}
				commodityWhole();

			});

			/* 底部全选  */
			var bot = 0;
			$("#all_pitch_on").click(function() {

				if(bot == 0) {
					$(this).addClass("pitch_on");
					allThis.removeClass("pitch_on");
					allThis.addClass("pitch_on");
					/*总价格*/
					commodityWhole();
					bot = 1;
				} else {
					$(this).removeClass("pitch_on");
					allThis.removeClass("pitch_on");
					$("#total_price b").text("0");
					bot = 0;
				}
			});
			$("form[name='cart_form']").on('submit', function () {
				return ($("input[name='trade_ids']").val()!="" && $("input[name='total_pay']").val()!="");
			});
			//结算
			function pay() {
				/* 计算选择订单ID  */
				var trades = [];
				var je = $(".commodity_box .select > em.pitch_on"); /* 全部商品单价  */
				var TotalJe = 0;
				for(var i = 0; i < je.length; i++) {
					var n = je.eq(i).attr("cart_id");
					trades[i] = n;
				}
				console.log("trades="+trades.join());
				$("form[name='cart_form'] > input[name='trade_ids']").val(trades.join());
				//$("input[name='trade_ids']").val(trades.join());
				$("form[name='cart_form'] > input[name='total_pay']").val($("#total_price b").text());
				//$("input[name='total_pay']").val($("#total_price b").text());
				//console.log($("input[name='trade_ids']").val());
				//console.log($("input[name='total_pay']").val());
				//console.log($("form[name='cart_form']").children("input[name='trade_ids']").val());
				//console.log($("form[name='cart_form']").children("input[name='total_pay']").val());
				console.log($("form[name='cart_form'] > input[name='trade_ids']").val());
				console.log($("form[name='cart_form'] > input[name='total_pay']").val());

				$("form[name='cart_form']").submit();
				//$("form[name='cart_form']").submit();

			}


		</script>