<?php
include_once("include/config.php");

//テスト

//ページパラメータを変数に格納
$page = $_REQUEST["page"];

//ページが無ければページに１を代入
if ( !$page ) { $page = 1; }

// カテゴリーページ作成
if ( $_REQUEST["category"] ) {
	$sql = "
	SELECT art.*, list.category_name, list.category_dir
	FROM category_regist regist, article art, category_list list 
	WHERE list.category_dir = '".$_REQUEST["category"]."'
	AND regist.category_id = list.id
	AND regist.article_id = art.id
	AND regist.category_id = list.id 
	ORDER BY regist.article_id DESC
	";
}

// アーカイブページを作成
else if ( $_REQUEST["date_year"] AND $_REQUEST["date_month"] ) {
	$sql = "
	SELECT *
	FROM article
	WHERE date_year = '".$_REQUEST["date_year"]."'
	AND date_month = '".$_REQUEST["date_month"]."'
	ORDER BY date_time_sys DESC
	";
}

// 同一投稿日ページを作成
else if ( $_REQUEST["date_time"] ) {
	$sql = "
	SELECT *
	FROM article
	WHERE date_time = '".$_REQUEST["date_time"]."'
	ORDER BY date_time_sys DESC
	";
}

// 検索結果
else if ( $_REQUEST["search"] ) {
	$sql = "
	SELECT *
	FROM article
	WHERE article_ttl LIKE '%".$_REQUEST["search"]."%'
	ORDER BY date_time_sys DESC
	";
	$result = mysql_query($sql, $db_con);
}

// 通常
else {
	$sql = "
	SELECT *
	FROM article
	ORDER BY date_time_sys DESC
	";
}

if ( !$_REQUEST["search"] ) {
	$result = mysql_query($sql, $db_con);
	
	//1ページの表示件数
	$max_per_page = 5;
	//全データ数を取得
	$num_rows = mysql_num_rows($result);
	//全ページ数を取得
	$all_page = ceil($num_rows / $max_per_page);
	//開始レコードの値を計算
	$start_record = $max_per_page * ($page-1);
	
	$sql .= "
	LIMIT ".$max_per_page."
	OFFSET ".$start_record."
	";
	
	$result = mysql_query($sql, $db_con);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title><?php echo $SITE_TITLE ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE9" />
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="robots" content="<?php echo $ROBOTS ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no">
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
<body id="top">
<div class="wrapper">
	<?php include_once("include/header.php"); ?>
	<div class="content">
		<?php include_once("include/breadcrumb.php"); ?>
		<div class="main-cont">
<?php
// エントリー情報
while ( $data = mysql_fetch_array($result) ) {
	// 日本語表記の日時
	$jp_date = $data["date_year"]."年".$data["date_month"]."月".$data["date_day"]."日";
	// datetime属性用の日時
	$tag_date = $data["date_year"]."-".str_pad($data["date_month"], 2, 0, STR_PAD_LEFT)."-".str_pad($data["date_day"], 2, 0, STR_PAD_LEFT);
	// イントロ文の整形
	$article_intro = mb_substr($data["article_intro"], 0, 130);
	$article_intro = str_replace("\r\n","",$article_intro);
	
	switch ( $data["thumb_name"] ) {
		case TRUE:
			$thumb_img_path = $DOCUMENT_ROOT_URL."images/".$data["thumb_name"].$data["thumb_ext"];
			break;
		case FALSE:
			$thumb_img_path = $DOCUMENT_ROOT_URL."images/no-image_180x180.png";
			break;
	}
	
	// コメント数
	$sql_comment_count = "
	SELECT count(id) c_num
	FROM comment
	WHERE article_id = '".$data["id"]."'
	";
	$result_comment_count = mysql_query($sql_comment_count, $db_con);
	$data_comment_count = mysql_fetch_array($result_comment_count);
	
	// 個別返信コメント数
	$sql_add_comment_count = "
	SELECT count(add_comment.comment_id) a_num
	FROM comment, add_comment
	WHERE comment.article_id = '".$data["id"]."'
	AND comment.id = add_comment.comment_id
	";
	$result_add_comment_count = mysql_query($sql_add_comment_count, $db_con);
	$data_add_comment_count = mysql_fetch_array($result_add_comment_count);
?>
			<article class="entry-article">
				<header>
					<h2><a href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/"><?php echo $data["article_ttl"] ?></a></h2>
					<time datetime="<?php echo $tag_date ?>"><?php echo $jp_date ?></time>
					<p>Comment(<?php echo $data_comment_count["c_num"] + $data_add_comment_count["a_num"] ?>)</p>
				</header>
				<div class="entry-cont">
					<p><?php echo $article_intro ?>...<a href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/">続きを読む</a></p>
					<figure><a href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/"><img src="<?php echo $thumb_img_path ?>" alt="<?php echo $data["article_ttl"] ?>" width="180" height="180" /></a></figure>
				</div>
				<footer>
					<dl class="category">
						<dt>カテゴリー</dt>
<?php
/*
SELECT list.*
全てのlist（category_list）のデータを取得

FROM
どこから

category_regist reg
一時的にcategory_registをregにリネーム

,
繋ぎ

category_list list
一時的にcategory_listをlistにリネーム

WHERE
条件

reg.article_id　= '".$data["id"]."'
category_registのarticle_idカラムとarticleのid（主キー）が等しい

and
かつ

reg.category_id = list.id
category_registのcategory_idとcategory_listのid（主キー）が等しい
*/
	$sql_top_category = "
	SELECT list.* 
	FROM category_regist reg, category_list list 
	WHERE reg.article_id = '".$data["id"]."' 
	AND reg.category_id = list.id
	";
	$result_top_category = mysql_query($sql_top_category, $db_con);
	while ( $data_top_category = mysql_fetch_array($result_top_category) ) {
?>
							<dd><a href="<?php echo $DOCUMENT_ROOT_URL ?>category/<?php echo $data_top_category["category_dir"] ?>/"><?php echo $data_top_category["category_name"] ?></a></dd>
<?php
	}
?>
					</dl>
					<ul class="sns">
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/" data-text="<?php echo $data["article_ttl"] ?>｜HYPER PORTFOLIO" data-via="HYPER_USHI" data-lang="ja">ツイート</a></li>
						<li><div class="fb-like" data-href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/" data-send="false" data-layout="button_count" data-show-faces="false" data-font="arial"></div></li>
						<li><div class="g-plusone" data-size="medium"></div></li>
					</ul>
				</footer>
			</article>
<?php } ?>
			<div class="page-nation">
				<ul>
					<li class="total-count">全<?php echo $num_rows ?>件</li>
<?php
$paging_frag = false;
$next = $page + 1;

if ( $page != 1 ) {
	$paging_frag = true;
	$prev = $page - 1;
}

switch ( TRUE ) {
	case preg_match("{.*?/category/}", $_SERVER["REQUEST_URI"]):
		$MIDDLE_PATH  = "category/".$_REQUEST["category"]."/";
		break;
	case preg_match("{.*?/entry/[0-9]{4}[0-9]{2}[0-9]{2}/}", $_SERVER["REQUEST_URI"]):
		$MIDDLE_PATH  = "entry/".$_REQUEST["date_time"]."/";
		break;
	case preg_match("{.*?/[0-9]{4}[0-9]{2}/}", $_SERVER["REQUEST_URI"]):
		$MIDDLE_PATH  = $_REQUEST["date_year"].$_REQUEST["date_month"]."/";
		break;
}
?>
<?php if($paging_frag == true) { ?>
					<li class="prev-on"><a href="<?php echo $DOCUMENT_ROOT_URL ?><?php echo $MIDDLE_PATH ?>page<?php echo $prev ?>/">Prev</a></li>
<?php } else { ?>
					<li class="prev-off">Prev</li>
<?php } ?>
					<li class="page-number">
						<ol>
<?php
$now_page_num = $page;
for ($i=1; $i<($all_page+1); $i++) {
	if($i == $now_page_num) {
?>
							<li class="this-page"><?php echo $i ?></li>
<?php
	}
	else {
?>
							<li><a href="<?php echo $DOCUMENT_ROOT_URL ?><?php echo $MIDDLE_PATH ?>page<?php echo $i ?>/"><?php echo $i ?></a></li>
<?php
	}
}
?>
						</ol>
					</li>
<?php if($_GET['page'] != $all_page && $all_page != 1) { ?>
					<li class="next-on"><a href="<?php echo $DOCUMENT_ROOT_URL ?><?php echo $MIDDLE_PATH ?>page<?php echo $next ?>/">Next</a></li>
<?php } else { ?>
					<li class="next-off">Next</li>
<?php } ?>
				</ul>
			</div>
		</div>
		<?php include_once("include/side-cont.php"); ?>
	</div>
	<?php include_once("include/footer.php"); ?>
</div>
<?php include_once("include/footer-include-js.php"); ?>
</body>
</html>