<?php include_once("../include/config.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title>About｜<?php echo $SITE_TITLE ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE9" />
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="robots" content="<?php echo $ROBOTS ?>" />
<link rel="stylesheet" href="<?php echo $DOCUMENT_ROOT_URL ?>css/style.css" media="all" />
<link rel="shortcut icon" href="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_favicon.ico" />
<link rel="icon" href="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_favicon.ico" />
<!--[if lte IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="<?php echo $DOCUMENT_ROOT_URL ?>js/DOMAssistantCompressed-2.8.js"></script>
<script src="<?php echo $DOCUMENT_ROOT_URL ?>js/ie-css3.js"></script>
<![endif]-->
<!--[if lte IE 9]>
<link rel="stylesheet" href="<?php echo $DOCUMENT_ROOT_URL ?>css/ie9.css" media="all" />
<![endif]-->
</head>
<body id="about">
<?php include_once("../include/aa.php"); ?>
<div class="wrapper">
	<?php include_once("../include/header.php"); ?>
	<?php include_once("../include/breadcrumb.php"); ?>
	<div class="content">
		<div class="main-cont">
			<section class="about-article">
				<h2>About</h2>
				<p>このサイトは出牛の趣味全開かつ自己満足的なポートフォリオサイトです。</p>
				<p>WordPressやMovable Typeといった、外部のCMSは一切使っていません。<br />データベースの作成から全て手作りのハンドメイドCMSです。</p>
				<p>このサイトでは様々なことを実験的にやっていこうかと思っています。<br />もし記載している情報に何か誤りがございましたら、コメント頂くか、お問い合わせからお知らせ頂けると幸いです。</p>
				<p>尚、当サイトはFirefox及び、Google Chromeでの閲覧を推奨しています。</p>
			</section>
			<section class="about-article">
				<h2>自己紹介</h2>
				<dl class="normal-dl">
					<dt>名前</dt>
						<dd>出牛 豊成</dd>
					<dt>HN</dt>
						<dd>ハイパー牛</dd>
					<dt>生年月日</dt>
						<dd><time datetime="1983-10-23">1983年10月23日</time></dd>
				</dl>
				<figure class="fR-img"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/hyper-ushi.png" alt="ハイパー牛" width="160" height="282" /></figure>
				<p>デザインもコーディングもプログラム(PHP)もディレクションも、何でもやりたがりなWEBデザイナーです。</p>
				<p>最近はフロントエンドをやっていることのほうが多いような気がします。</p>
				<dl class="normal-dl">
					<dt>LIKE</dt>
						<dd>
							<ul>
								<li>黒ビール</li>
								<li>アニメ</li>
								<li>Xbox 360</li>
								<li>メロデス</li>
								<li>R&amp;B</li>
								<li>ホラー映画</li>
							</ul>
						</dd>
				</dl>
			</section>
<?php
/*
			<section>
				<h2>SNS</h2>
*/
?>
<?php
/*
				<dl id="sns-deushi">
					<dt>Twitter</dt>
						<dd><a href="http://twitter.com/HYPER_USHI" rel="nofollow" class="blank">@HYPER_USHI</a></dd>
					<dt>Facebook</dt>
						<dd><a href="http://www.facebook.com/HYPER.USHI" rel="nofollow" class="blank">Toyonari Deushi（HYPER.USHI）</a></dd>
					<dt>Flickr</dt>
						<dd><a href="http://www.flickr.com/photos/hyper_ushi/" rel="nofollow" class="blank">HYPER USHI</a></dd>
					<dt>Xbox 360</dt>
						<dd>HYPER USHI</dd>
					<dt>Skype</dt>
						<dd>hyper_ushi</dd>
					<dt>Mixi</dt>
						<dd><a href="http://mixi.jp/show_friend.pl?id=16357479" rel="nofollow" class="blank">ハイパー牛</a></dd>
				</dl>
			</section>
*/
?>
			<section class="about-article">
				<h2>経歴</h2>
				<dl class="normal-dl">
					<dt>2012年5月～</dt>
						<dd>株式会社タイレルシステムズに業務委託で入社ののち、同年7月より正社員で入社。</dd>
					<dt>2011年9月～2012年12月</dt>
						<dd>株式会社ジールコミュニケーションズに正社員で入社。</dd>
					<dt>2009年7月～2011年7月</dt>
						<dd>パワーテクノロジー株式会社に正社員で入社。<br />こちらは前職よりもよりSEOを強く扱っている会社で、主にDBと連携したHTML・PHPテンプレートの作成を行っています。<br />自社で展開しているWebサービスのサイト制作なども任されました。</dd>
					<dt>2008年8月</dt>
						<dd>株式会社フリーセルにアルバイトで入社。<br />SEOをメインの商材として扱っている会社で、主な業務はDreamweaverを使った更新作業とPhotoshopを使ったバナー作成でした。</dd>
					<dt>2008年4月</dt>
						<dd>MdNのSchool of Designに数ヶ月通い、Webデザイナーに必要とされるスキルを一から勉強しなおしました。</dd>
					<dt>2007年</dt>
						<dd>有限会社イースマイルにアルバイトで入社。<br />主な業務はPhotoshopを使って画像の加工・修正をする作業でした。<br />たまに自社展開しているサービスサイトの更新などもやっていました。</dd>
					<dt>2005年</dt>
						<dd>音楽活動を辞めたあとに、知人の紹介で楽天株式会社にアルバイトで入社。<br />業種は出展店舗向けの電話でのテクニカルサポートでした。<br />時折りHTMLの質問や相談なども受けたりで、「やっぱり自分はHTMLが好きなんだな」と確信し、Webデザイナーを目指すことを決意しました。</dd>
					<dt>2001年</dt>
						<dd>高校卒業後は音楽をやりたいと思い、ESP専門学校に入学。<br />組んでいたバンドのホームページを制作したりと、なんだかんだでHTMLを触っていた気がします。</dd>
					<dt>2000年</dt>
						<dd>高校2年生の頃にホームページビルダーを購入し、HTMLで趣味の自サイトを作成。<br  />サーバーは<a href="http://www.freett.com/" rel="nofollow" class="blank">フリーティケットシアター</a>の無料レンタルスペースを使用していました。<br  />初めてHTMLに触れ、HTMLに興味を持った年になりました。</dd>
				</dl>
			</section>
<?php
/*
			<section class="about-article">
				<h2>スキル</h2>
				<ul>
					<li>(X)HTML　<span>★★★★★</span></li>
					<li>HTML 5　<span>★★★</span>☆☆</li>
					<li>CSS　<span>★★★★</span>☆</li>
					<li>CSS3　<span>★★★</span>☆☆</li>
					<li>Javascript（jQuery）　<span>★★</span>☆☆☆</li>
					<li>PHP　<span>★★★</span>☆☆</li>
					<li>MySQL　<span>★★★</span>☆☆</li>
					<li>Dreamweaver　<span>★★★★</span>☆</li>
					<li>Photoshop　<span>★★★★★</span></li>
					<li>Illustrator　<span>★★</span>☆☆☆</li>
					<li>Flash　<span>★★</span>☆☆☆</li>
				</ul>
			</section>
*/
?>
<?php
/*
			<section>
				<h2>自宅の制作環境</h2>
				<dl id="environment-deushi">
					<dt>OS</dt>
						<dd>Windows 7 Home Premium 64 ビット</dd>
					<dt>プロセッサ</dt>
						<dd>Intel(R)Core(TM) i7 CPU</dd>
					<dt>メモリ</dt>
						<dd>6144MB RAM</dd>
					<dt>ディスプレイ</dt>
						<dd>32インチ2台、19インチ1台</dd>
						<dd>NVIDIA GeForce GTS 250<br />NVIDIA GeForce GTX 550Ti</dd>
					<dt>使用ソフト</dt>
						<dd>
							<ul>
								<li>Dreamweaver CS5</li>
								<li>Photoshop CS4</li>
								<li>Illustrator CS5</li>
								<li>Flash CS3</li>
								<li>秀丸</li>
							</ul>
						</dd>
					<dt>使用メインブラウザ</dt>
						<dd>
							<ul>
								<li>職場ではFirefox</li>
								<li>自宅ではChromeとFirefox</li>
							</ul>
						</dd>
				</dl>
			</section>
*/
?>
		</div>
		<?php include_once("../include/side-cont.php"); ?>
	</div>
	<?php include_once("../include/footer.php"); ?>
</div>
<?php include_once("../include/footer-include-js.php"); ?>
</body>
</html>