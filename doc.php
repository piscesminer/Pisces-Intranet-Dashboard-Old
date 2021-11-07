<?php
include('./api.php');
$ls=new runShell();
$ip=$ls->getIp();
$dockerStatus=$ls->run($ls->dockerBasicStats);
$dockerBasicPort=$ls->run($ls->dockerBasicPort);
$dockerStats=$ls->run($ls->dockerStats);
$infoHeight =$ls->run($ls->infoHeight);
echo <<<EOF
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Api列表：</title>
<link rel="stylesheet" href="style.css" />
<style type="text/css">
h2.top_title{border-bottom:none;background:none;text-align:center;line-height:32px; font-size:20px}
h2.top_title span{font-size:12px; color:#666;font-weight:500}
</style>
</head>

<body>
<h2 class="top_title"API列表<br/><span>API列表</span></h2>

<section id="cd-timeline" class="cd-container">
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-picture">
			<img src="img/cd-icon-picture.svg" alt="Picture">
		</div>

		<div class="cd-timeline-content">
			<h2>http://localhost/action.php?action=getIp</h2>
			<p>$ip</p>
			<span class="cd-date">获取内网IP</span>
		</div>
	</div>
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-movie">
			<img src="img/cd-icon-movie.svg" alt="Movie">
		</div>

		<div class="cd-timeline-content">
			<h2>http://localhost/action.php?action=dockerStatus</h2>
			<p>$dockerStatus</p>
		
			<span class="cd-date">获取矿机Docker运行状态</span>
		</div>
	</div>
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-picture">
			<img src="img/cd-icon-picture.svg" alt="Picture">
		</div>

		<div class="cd-timeline-content">
			<h2>http://localhost/action.php?action=dockerPort</h2>
			<p>$dockerBasicPort</p>
			<span class="cd-date">获取矿机Docker端口状态</span>
		</div>
	</div>
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-movie">
			<img src="img/cd-icon-movie.svg" alt="Movie">
		</div>

		<div class="cd-timeline-content">
			<h2>http://localhost/action.php?action=dockerAllStatus</h2>
			<p>$dockerStats</p>
			<span class="cd-date">获取矿机所有容器状态</span>
		</div>
	</div>
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-movie">
			<img src="img/cd-icon-location.svg" alt="Location">
		</div>

		<div class="cd-timeline-content">
			<h2>http://localhost/action.php?action=blockHeight</h2>
			<p>$infoHeight</p>
			<span class="cd-date">获取矿机同步块高度</span>
		</div>
	</div>
</section>

</body>
</html>

EOF;
//back

// <div class="cd-timeline-content">
// <h2>http://localhost/action.php?action=blockHeight</h2>
// <p>$infoHeight</p>
// <a href="#" class="cd-read-more" target="_blank">阅读全文</a>
// <span class="cd-date">获取当前Miner块高度</span>
// </div>
?>