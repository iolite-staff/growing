<?php
	error_reporting(0);
	header("Content-type: text/html; charset=utf-8");
	foreach($_POST as $key=>$value) {
		$_POST[$key] = htmlspecialchars($value,ENT_QUOTES);
	}

	require_once('./qdmail.php');
	// 問い合わせフォーム内容送信先メールアドレス
	$mailto1 = "info-cs@g-iso.jp";
	//メールタイトル
	$subject = $_POST['company'].$_POST['last_name']." ".$_POST['first_name']."様よりお問い合わせがありました";
	$body = <<< EOF

■組織名
　{$_POST['company']}

■組織名フリガナ
　{$_POST['company_kana']}

■郵便番号
　{$_POST['postcode']}

■ご住所
　{$_POST['pref']}
　{$_POST['address']}

■お名前
　{$_POST['last_name']} {$_POST['first_name']}

■お名前フリガナ
　{$_POST['last_name_kana']} {$_POST['first_name_kana']}

■電話番号
　{$_POST['tel']}

■Email
　{$_POST['email']}

■お問い合わせ内容
{$_POST['body']}
EOF;
	$content = <<< EOF
以下の内容でお問い合わせがありました。

{$body}

EOF;

	qd_send_mail( 'text' , $mailto1 , $subject , $content , $_POST['email'] );

	//メールタイトル（お問い合わせした人宛）
	$mailto1 = "info-cs2@g-iso.jp";
	$subject = "株式会社グローイング総研Webサイトよりお問い合わせを受け付けました";
	$content = <<< EOF
{$_POST['company']}　{$_POST['last_name']} {$_POST['first_name']}様

この度は、株式会社グローイング総研Webサイトからのお問い合わせ誠にありがとうございます。

数日中に担当よりご連絡をさせていただきますので、今しばらくお待ちください。

なお、お問い合わせ内容によっては、お時間をいただく場合や
お答えできない場合がございますので、あらかじめご了承ください。

送信いただきました内容は以下の通りです。

ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

{$body}

ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

本メールについて心当たりがない方は、大変お手数ですが
本メールをご返送いただきますようお願い申し上げます。

株式会社グローイング総研

EOF;

	qd_send_mail( 'text' , $_POST['email'] , $subject , $content , $mailto1 );
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
				お問い合わせありがとうございました！
			</p>
			<div id="btn_area">
				<a href="../index.html">トップページに戻る</a>
			</div>
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