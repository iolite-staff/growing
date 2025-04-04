<?php
	header("Content-type: text/html; charset=utf-8");
	foreach($_POST as $key=>$value) {
		$_POST[$key] = htmlspecialchars($value,ENT_QUOTES);
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="description" content="グローイング総研は、お客様が直面している経営の変化（課題・問題）を調査・分析し、その改善に向けた方向性と「ソリューション（解決策）」を提供するコンサルティング会社です。">
<meta name="keywords" content="グローイング総研,コンサルタント,コンサルティング,ISO,マネジメントシステム">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
<meta name="msapplication-TileImage" content="../msapplication-TileImage.png">
<meta name="msapplication-TileColor" content="#000">
<title>お問い合わせ | グローイング総研</title>
<link rel="stylesheet" type="text/css" media="screen" href="../css/screen.css">
<link rel="stylesheet" type="text/css" media="screen and (max-width:660px)" href="../css/screen_sp.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width:661px) and (max-width:1023px)" href="../css/screen_tb.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width:1024px)" href="../css/screen_pc.css">
<link rel="stylesheet" type="text/css" media="print" href="../css/print.css">
<link rel="apple-touch-icon" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" href="../favicon-.png" sizes="16x16">
<link rel="icon" type="image/png" href="../favicon.png" sizes="32x32">
<script type="text/javascript" src="../lib/jquery/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../lib/jquery/jquery-migrate-1.4.1.min.js"></script>
</head>
<body>
<header>
	<a href="../index.html"><img src="../img/interface/logo.svg" alt="Growing Soken"></a>
	<nav>
		<ul>
			<li><a href="../index.html#message_area">ご挨拶</a></li>
			<li><a href="../index.html#business_area">業務内容</a></li>
			<li><a href="../index.html#company_area">会社概要</a></li>
			<li><a href="../index.html#company_area">会社沿革</a></li>
			<li><span>お問い合わせ</span></li>
		</ul>
	</nav>
	<span id="nav_btn"></span>
</header>
<article id="all_contents">
	<section id="form_area">
		<div>
			<h2 class="title02">Contact Us<span>お問い合わせ</span></h2>
			<p>
				内容をご確認のうえ、よろしければ「送信する」ボタンを、<br>内容を修正する場合は「修正する」ボタンをお選びください。
			</p>
			<form action="./thanks.php" method="POST" id="contact_form">
<?php
	foreach($_POST as $key => $value){
?>
				<input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
<?php
	}
?>
				<table id="form_table">
					<tbody>
						<tr><th>組織名<span>必須</span></th><td><?php echo $_POST['company']; ?></td></tr>
						<tr><th>組織名フリガナ<span>必須</span></th><td><?php echo $_POST['company_kana']; ?></td></tr>
						<tr><th>郵便番号<span>必須</span></th><td><?php echo $_POST['postcode']; ?></td></tr>
						<tr><th>ご住所<span>必須</span></th><td><?php echo $_POST['pref']; ?><br><?php echo $_POST['address']; ?></td></tr>
						<tr><th>お名前<span>必須</span></th><td><?php echo $_POST['last_name']; ?> <?php echo $_POST['first_name']; ?></td></tr>
						<tr><th>お名前フリガナ<span>必須</span></th><td><?php echo $_POST['last_name_kana']; ?> <?php echo $_POST['first_name_kana']; ?></td></tr>
						<tr><th>電話番号<span>必須</span></th><td><?php echo $_POST['tel']; ?></td></tr>
						<tr><th>Email<span>必須</span></th><td><?php echo $_POST['email']; ?></td></tr>
						<tr><th>お問い合わせ内容<span>必須</span></th><td><?php echo nl2br($_POST['body']); ?></td></tr>
					</tbody>
				</table>
				<div id="btn_area">
					<button class="btn_fix" type="button" name="submitConfirm" value="fix" onclick="javascript:history.back();">修正する</button>
					<button type="submit" name="submitConfirm" value="confirm">送信する</button>
				</div>
			</form>
		</div>
	</section>
</article>
<footer>
	<img src="../img/interface/footer_logo.svg" alt="GROWING">
	<small>&copy; 2021 Growing Soken co,.Ltd. All right reserved.</small>
</footer>

<script type="text/javascript">
$(document).ready(function(){
	$("#nav_btn").click(function () {
		$("body>header>nav").slideToggle(150);
	});
	var mql = window.matchMedia('screen and (max-width:660px)');
	function checkBreakPoint(mql) {
		if (mql.matches) {
			$('body>header>nav').css({'display':'none'});
		} else {
			$('body>header>nav').css({'display':'block'});
		}
	}
});
</script>
</body>
</html>