<?php if(!class_exists("View", false)) exit("no direct access allowed");?>		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/app.css"/>
		<style>
			.mui-card .mui-control-content {
				padding: 10px;
			}
			.mui-control-content {
				height: 150px;
			}
		</style>

		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<a href="<?php echo url(array('c'=>'mine', 'a'=>'atrefund', ));?>"><h1 class="mui-title">我的退款</h1></a>
		</header>

		<div class="mui-content new-min-order">
			<?php if ($trade) : ?>
			<!--商品-->
			<?php if(!empty($trade)){ $_foreach_t_counter = 0; $_foreach_t_total = count($trade);?><?php foreach( $trade as $t ) : ?><?php $_foreach_t_index = $_foreach_t_counter;$_foreach_t_iteration = $_foreach_t_counter + 1;$_foreach_t_first = ($_foreach_t_counter == 0);$_foreach_t_last = ($_foreach_t_counter == $_foreach_t_total - 1);$_foreach_t_counter++;?>
			<ul>
				<li>
					<span class="time">订单号：<?php echo htmlspecialchars($t['out_trade_no'], ENT_QUOTES, "UTF-8"); ?></span>
					<?php if ($t['isrefund'] == 'N') : ?>
						<form target="_self" method="post" action="<?php echo url(array('c'=>'mine', 'a'=>'agreerefund', ));?>" onsubmit="return confirm('真的同意退款吗？');">
							<input type="hidden" name="out_trade_no" value="<?php echo htmlspecialchars($t['out_trade_no'], ENT_QUOTES, "UTF-8"); ?>" />
							<input type="hidden" name="trade_no" value="<?php echo htmlspecialchars($t['trade_no'], ENT_QUOTES, "UTF-8"); ?>" />
							<input type="hidden" name="trade_id" value="<?php echo htmlspecialchars($t['trade_id'], ENT_QUOTES, "UTF-8"); ?>" />
							<input type="hidden" name="total_pay" value="<?php echo round($t['all_price'], 2);?>" />
							<button class="refund" onclick="this.form.submit();">同意退款</button>
						</form>
					<?php else : ?>
						<span class="state">已退款</span>
					<?php endif; ?>
				</li>
				<li>
					<img src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/images/preview_picture/<?php echo htmlspecialchars($t['product_img'], ENT_QUOTES, "UTF-8"); ?>" />
					<div class="flex1">
						<h4><?php echo htmlspecialchars($t['product_name'], ENT_QUOTES, "UTF-8"); ?></h4>
						<br/>
						<p class="mui-text-right font-color-pink">单价：<label><?php echo htmlspecialchars($t['product_price'], ENT_QUOTES, "UTF-8"); ?> 元/kg</label></p>
						<p class="mui-text-right font-color-gray">重量：<label><?php echo htmlspecialchars($t['productweight'], ENT_QUOTES, "UTF-8"); ?> kg</label></p>
						<p class="mui-text-left font-color-gray">付款号：<label><?php echo htmlspecialchars($t['trade_no'], ENT_QUOTES, "UTF-8"); ?></label></p>
					</div>
				</li>
				<li>
					<span>商品总额</span>
					<span class="font-color-pink">￥<label><?php echo round($t['all_price'], 2);?></label></span>
				</li>
			</ul>

			<?php endforeach; }?>
			<?php else : ?>
			<div class="mui-content-padded">
				<p>当前无退款记录</p>
			</div>
			<?php endif; ?>
		</div>
