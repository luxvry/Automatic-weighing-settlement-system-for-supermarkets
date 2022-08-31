<?php if(!class_exists("View", false)) exit("no direct access allowed");?>		<nav class="mui-bar mui-bar-tab globe-color">
			<a id="defaultTab" class="mui-tab-item" href="<?php echo url(array('c'=>'main', 'a'=>'order', ));?>">
				<span class="mui-icon mui-icon-extra mui-icon-extra-cart"></span>
				<span class="mui-tab-label">购物车</span>
			</a>
			<a class="mui-tab-item" href="<?php echo url(array('c'=>'main', 'a'=>'mine', ));?>">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">个人中心</span>
			</a>
		</nav>

		<script>
			var defeultTab = $('#defaultTab').attr('href');
			mui.init({
				gestureConfig: {
					doubletap: true
				},
				subpages: [{
					url: defeultTab,
					id: 'MainView',
					styles: {
						top: '0px', 
						bottom: '51px'
					}
				}]
			});
			//底部选项卡切换跳转			
			(function jumpPage(){
				//选项卡点击事件
				mui('.mui-bar-tab').on('tap', 'a', function(e){
					var targetTab = this.getAttribute('href');
					$('#MainView').attr('src', targetTab);

				});
			})();
		</script>