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
<div id="wrapper">
	<?php include_once("../include/header.php"); ?>
	<div id="content">
		<?php include_once("../include/breadcrumb.php"); ?>
		<div id="main-cont">
			<section>
				<h2>About</h2>
				<p>このサイトは出牛の趣味全開かつ自己満足的なポートフォリオサイトです。</p>
				<p>WordPressやMovable Typeといった、外部のCMSは一切使っていません。<br />データベースの作成から全て手作りのハンドメイドCMSです。</p>
				<p>このサイトでは様々なことを実験的にやっていこうかと思っています。<br />もし記載している情報に何か誤りがございましたら、コメント頂くか、お問い合わせからお知らせ頂けると幸いです。</p>
				<p>尚、当サイトはFirefox及び、Google Chromeでの閲覧を推奨しています。</p>
			</section>
			<section>
				<h2>自己紹介</h2>
<style>
#intro-deushi {
	margin: 0 0 20px;
	padding: 20px;
	width: 660px;
	height: 408px;
	position: relative;
	top: 0;
	left: 0;
	background: url(../images/deushi.jpg) 0 0 no-repeat;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
}

	#intro-deushi dl {
		margin: 0;
		padding: 19px;
		width: 280px;
		position: absolute;
		bottom: 20px;
		left: 20px;
		border: 1px solid #fff;
		background: rgba(255, 255, 255, 0.4);
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		-ms-box-sizing: border-box;
	}
	#intro-deushi dl:after {
		visibility: hidden;
		display: block;
		font-size: 0;
		content: " ";
		clear: both;
		height: 0;
	}
	* html #intro-deushi dl             { zoom: 1; } /* IE6 */
	*:first-child+html #intro-deushi dl { zoom: 1; } /* IE7 */
	
		#intro-deushi dl * { color: #333; }
	
		#intro-deushi dl dt {
			clear: both;
			float: left;
			margin: 0 0 10px;
			padding: 0;
			width: 60px;
		}
		
			#intro-deushi dl dd {
				float: right;
				margin: 0 0 10px;
				padding: 0;
				width: 160px;
			}
		
		#intro-deushi dl dt:last-of-type,
		#intro-deushi dl dd:last-of-type { margin-bottom: 0; }
			
				#intro-deushi dl dd ul { margin: 0; padding: 0; }
				
					#intro-deushi dl dd ul li {
						margin: 0 0 5px;
						padding: 0;
					}
					
					#intro-deushi dl dd ul li:last-child { margin-bottom: 0; }

</style>
				<div id="intro-deushi">
					<dl>
						<dt>名前</dt>
							<dd>出牛 豊成</dd>
						<dt>HN</dt>
							<dd>ハイパー牛</dd>
						<dt>生年月日</dt>
							<dd><time datetime="1983-10-23">1983年10月23日</time></dd>
						<dt>職業</dt>
							<dd>
								<ul>
									<li>WEBデザイナー</li>
									<li>WEBディレクター</li>
									<li>マークアップエンジニア</li>
									<li>PHPプログラマ</li>
								</ul>
							</dd>
					</dl>
				</div>
				<figure class="fL-img"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/hyper-ushi.png" alt="ハイパー牛" width="160" height="282" /></figure>
				<p>デザインもコーディングもプログラム(PHP)もディレクションも、何でもやりたがりなWEBデザイナーです。</p>
				<p>初めてHTMLに触れたのが高校2年のときで、それ以来HTMLは非常に好きで、ソースコードに対しては誰よりも愛を注いでいる自信があります。<br />いかに美しく綺麗に、メンテナンス性に優れ、文法的意味をもつソースコードを書くか、ということに注力しています。</p>
				<p>Photoshopを用いた写真の補正・加工を得意とします。</p>
				<p>アニメとゲームと黒ビールとデスメタルが大好きです。<br />残念ながらヒップホップは聴きません。レゲェも聴きません。</p>
			</section>
			<section>
				<h2>SNS</h2>
<style>
dl#sns-deushi,0
dl#career-deushi,
dl#environment-deushi { margin: 0; padding: 0; }

	dl#sns-deushi dt,
	dl#career-deushi dt,
	dl#environment-deushi dt { margin: 0 0 5px; padding: 0; }
	
		dl#sns-deushi dd,
		dl#career-deushi dd,
		dl#environment-deushi dd { margin: 0 0 20px; padding: 0 0 0 10px; }

</style>
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
			<section>
				<h2>経歴</h2>
				<dl id="career-deushi">
					<dt>2011年9月～現在</dt>
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
			<section>
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
		</div>
		<?php include_once("../include/side-cont.php"); ?>
	</div>
	<?php include_once("../include/footer.php"); ?>
</div>
<?php include_once("../include/footer-include-js.php"); ?>
</body>
</html>