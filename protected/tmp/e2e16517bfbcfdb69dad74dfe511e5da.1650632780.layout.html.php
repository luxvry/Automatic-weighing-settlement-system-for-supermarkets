<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title><?php echo htmlspecialchars($title, ENT_QUOTES, "UTF-8"); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/mui.min.css" rel="stylesheet" />
    <link href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/css/icons-extra.css">

    <script src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/js/mui.min.js"></script>
    <script src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/js/mui.enterfocus.js"></script>
    <script src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/js/app.js"></script>
    <script src="<?php echo htmlspecialchars($WEB_DIR, ENT_QUOTES, "UTF-8"); ?>/i/js/jquery.min.js"></script>
<body>
<div class="container">
<?php include $_view_obj->compile($__template_file); ?>
</div>
</body>
</html>