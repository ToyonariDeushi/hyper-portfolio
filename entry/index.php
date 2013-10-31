<?php
include_once("../include/config.php");

session_start();

$_SESSION["user_name"] = htmlspecialchars($_POST["user_name"]);
$_SESSION["user_mail"] = htmlspecialchars($_POST["user_mail"]);
$_SESSION["user_url"] = htmlspecialchars($_POST["user_url"]);
$_SESSION["comment_txt"] = htmlspecialchars($_POST["comment_txt"]);

// 指定された記事のエントリーページ作成
if ( $_REQUEST["directory"] AND $_REQUEST["date_time"] ) {
	$sql = "
	SELECT *
	FROM article
	WHERE directory = '".$_REQUEST["directory"]."'
	AND date_time = '".$_REQUEST["date_time"]."'
	";
}

// コメント投稿
if ( $_POST["pid"] == "comment" ) {
	
	$auth = mb_convert_kana($_POST["auth"], "asKV", "UTF-8");
	$auth = strtolower($auth);
	$img_auth = mb_convert_kana($_POST["img_auth"], "asKV", "UTF-8");
	$img_auth = strtolower($img_auth);
	
	// 画像認証が通った場合
	if ( $auth == $img_auth ) {
	
		$user_name = mb_convert_kana($_POST["user_name"], "asKV", "UTF-8");
		$user_mail = mb_convert_kana($_POST["user_mail"], "asKV", "UTF-8");
		$user_url = mb_convert_kana($_POST["user_url"], "asKV", "UTF-8");
		$comment_txt = mb_convert_kana($_POST["comment_txt"], "asKV", "UTF-8");
		
		// 通常のコメント
		if ( empty($_POST["comment_id"]) ) {
		
			$sql_ins_comment = "
			INSERT INTO comment
			SET
			article_id = '".$_POST["id"]."',
			user_name = '".$user_name."',
			user_mail = '".$user_mail."',
			user_url = '".$user_url."',
			user_ip = '".$_SERVER['REMOTE_ADDR']."',
			guest_icon = '".$_POST["guest_icon"]."',
			comment_txt = '".$comment_txt."',
			date_time_sys = current_timestamp,
			date_year = '".date('Y')."',
			date_month = '".date('m')."',
			date_day = '".date('d')."',
			date_hour = '".date('H:i')."'
			";
			$result_ins_comment = mysql_query($sql_ins_comment, $db_con);
			
			$new_id = mysql_insert_id();
			
			// MIME型
			$type_user = $_FILES["user_img"]["type"];
			// テンポラリファイル名
			$tmpname_user = $_FILES["user_img"]["tmp_name"];
			// サイズ
			$size_user = $_FILES["user_img"]["size"];
			
			if ( $_FILES["user_img"]["tmp_name"] ) {
				// 画像サイズを取得
				list($width_user, $height_user) = getimagesize($tmpname_user);
				// 画像データを取得
				$contents_user = file_get_contents($tmpname_user);
				// SQL用にエスケープ
				$contents_user = mysql_real_escape_string($contents_user, $db_con);
				
				switch ( $type_user ) {
					case 'image/jpeg':
						$user_ext = ".jpg";
						break;
					case 'image/png':
						$user_ext = ".png";
						break;
					case 'image/gif':
						$user_ext = ".gif";
						break;
					case 'image/x-icon':
						$user_ext = ".ico";
						break;
				}
				
				$sql_ins_comment = "
				UPDATE comment
				SET
				icon_user_name = 'user_img_".date("Ymdhis")."',
				icon_user_type = '".$type_user."',
				icon_user_ext = '".$user_ext."',
				icon_user_width = '".$width_user."',
				icon_user_height = '".$height_user."',
				icon_user_size = '".$size_user."',
				icon_user_data = '".$contents_user."'
				WHERE id = '".$new_id."'
				";
				$result_ins_comment = mysql_query($sql_ins_comment, $db_con);
			}
		
		}
		
		// コメントに対するレス
		else if ( $_POST["comment_id"] ) {
			
			$sql_ins_comment = "
			INSERT INTO add_comment
			SET
			comment_id = '".$_POST["comment_id"]."',
			user_name = '".$user_name."',
			user_mail = '".$user_mail."',
			user_url = '".$user_url."',
			user_ip = '".$_SERVER['REMOTE_ADDR']."',
			guest_icon = '".$_POST["guest_icon"]."',
			comment_txt = '".$comment_txt."',
			date_time_sys = current_timestamp,
			date_year = '".date('Y')."',
			date_month = '".date('m')."',
			date_day = '".date('d')."',
			date_hour = '".date('H:i')."'
			";
			$result_ins_comment = mysql_query($sql_ins_comment, $db_con);
			
			$new_id = mysql_insert_id();
			
			// MIME型
			$type_user = $_FILES["user_img"]["type"];
			// テンポラリファイル名
			$tmpname_user = $_FILES["user_img"]["tmp_name"];
			// サイズ
			$size_user = $_FILES["user_img"]["size"];
			
			if ( $_FILES["user_img"]["tmp_name"] ) {
				// 画像サイズを取得
				list($width_user, $height_user) = getimagesize($tmpname_user);
				// 画像データを取得
				$contents_user = file_get_contents($tmpname_user);
				// SQL用にエスケープ
				$contents_user = mysql_real_escape_string($contents_user, $db_con);
				
				switch ( $type_user ) {
					case 'image/jpeg':
						$user_ext = ".jpg";
						break;
					case 'image/png':
						$user_ext = ".png";
						break;
					case 'image/gif':
						$user_ext = ".gif";
						break;
					case 'image/x-icon':
						$user_ext = ".ico";
						break;
				}
				
				$sql_ins_comment = "
				UPDATE add_comment
				SET
				icon_add_user_name = 'add_user_img_".date("Ymdhis")."',
				icon_add_user_type = '".$type_user."',
				icon_add_user_ext = '".$user_ext."',
				icon_add_user_width = '".$width_user."',
				icon_add_user_height = '".$height_user."',
				icon_add_user_size = '".$size_user."',
				icon_add_user_data = '".$contents_user."'
				WHERE id = '".$new_id."'
				";
				$result_ins_comment = mysql_query($sql_ins_comment, $db_con);
			}
			
		}
		
		// ページに戻るためのSQL文
		$sql = "
		SELECT *
		FROM article
		WHERE id = '".$_POST["id"]."'
		";
		$result = mysql_query($sql, $db_con);
		$data = mysql_fetch_array($result);
		
		header("Location: ".$DOCUMENT_ROOT_URL."entry/".$data["date_time"]."/".$data["directory"]."/#comment");
		
	}
	
	// 画像認証が失敗
	else if ( $auth != $img_auth ) {
		$error_txt = " class=\"error-txt\"";
	}
}

// 最新のエントリーページ作成
else if ( empty($_REQUEST["directory"]) AND empty($_REQUEST["date_time"]) ) {
	$sql = "
	SELECT *
	FROM article
	ORDER BY date_time_sys DESC
	LIMIT 1
	";
}

$result = mysql_query($sql, $db_con);
$data = mysql_fetch_array($result);

// 記事IDと一致した追加記事を表示
$sql_add = "
SELECT *
FROM add_article
WHERE article_id = '".$data["id"]."'
ORDER BY id ASC
";
$result_add = mysql_query($sql_add, $db_con);

// カテゴリ
$sql_category = "
SELECT list.*
FROM category_regist reg, category_list list
WHERE reg.article_id = '".$data["id"]."'
AND reg.category_id = list.id
";
$result_category = mysql_query($sql_category, $db_con);













// コメント
$sql_comment = "
SELECT *
FROM comment
WHERE article_id = '".$data["id"]."'
ORDER BY date_time_sys
";
$result_comment = mysql_query($sql_comment, $db_con);

// 日本語表記の日時
$jp_date = $data["date_year"]."年".$data["date_month"]."月".$data["date_day"]."日";

// datetime属性用の日時
$tag_date = $data["date_year"]."-".str_pad($data["date_month"], 2, 0, STR_PAD_LEFT)."-".str_pad($data["date_day"], 2, 0, STR_PAD_LEFT);

switch ( $data["thumb_name"] ) {
	case TRUE:
		$thumb_img_path = $DOCUMENT_ROOT_URL."images/".$data["thumb_name"].$data["thumb_ext"];
		break;
	case FALSE:
		$thumb_img_path = $DOCUMENT_ROOT_URL."images/no-image_180x180.png";
		break;
}

function getRandomString($nLengthRequired = 8){
	$sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	mt_srand();
	$sRes = "";
	for($i = 0; $i < $nLengthRequired; $i++)
		$sRes .= $sCharList[mt_rand(0, strlen($sCharList) - 1)];
		return $sRes;
}

$string = getRandomString();

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



<?php
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
}
?>






<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title><?php echo $data["article_ttl"] ?>｜<?php echo $SITE_TITLE ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE9" />
<meta name="description" content="<?php echo str_replace("\r\n", "", $data["article_intro"]) ?>" />
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
<body id="entry">
<div id="wrapper">
	<?php include_once("../include/header.php"); ?>
	<div id="content">
		<?php include_once("../include/breadcrumb.php"); ?>
		<div id="main-cont">
			<article>
				<header>
					<h2><?php echo $data["article_ttl"] ?></h2>
					<time datetime="<?php echo $tag_date ?>"><?php echo $jp_date ?></time>
					<p>Comment(<?php echo $data_comment_count["c_num"] + $data_add_comment_count["a_num"] ?>)</p>
				</header>
				<div id="article-intro">
					<figure><img src="<?php echo $thumb_img_path ?>" alt="<?php echo $data["article_ttl"] ?>" width="180" height="180" /></figure>
					<p><?php echo str_replace("\r\n", "", nl2br($data["article_intro"])) ?></p>
				</div>
<?php
while ( $data_add = mysql_fetch_array($result_add) ) {
	
	switch ( $data_add["article_type"] ) {
		case 1:
			$data_add["article_txt"] = nl2br($data_add["article_txt"]);
			$data_add["article_txt"] = str_replace("\r\n", "", $data_add["article_txt"]);
			$data_add["article_txt"] = str_replace("<br /><br />", "</p>\n\t\t\t\t<p>", $data_add["article_txt"]);
			echo "\t\t\t\t<p>".$data_add["article_txt"]."</p>";
			break;
		case 3:
			$data_add["article_txt"] = nl2br($data_add["article_txt"]);
			$data_add["article_txt"] = str_replace("\r\n", "", $data_add["article_txt"]);
			echo "\t\t\t\t<p>".$data_add["article_txt"]."</p>";
			break;
		case 4:
			$data_add["article_txt"] = nl2br($data_add["article_txt"]);
			$data_add["article_txt"] = str_replace("\r\n", "", $data_add["article_txt"]);
			echo "\t\t\t\t<p>".$data_add["article_txt"]."</p>";
			break;
		case 5:
			$data_add["article_txt"] = nl2br($data_add["article_txt"]);
			$data_add["article_txt"] = str_replace("\r\n", "", $data_add["article_txt"]);
			echo "\t\t\t\t".$data_add["article_txt"]."\n";
			break;
		case 6:
			echo $data_add["article_txt"]."\n";
			break;
	}
	
	if ( $data_add["img_name"] ) {
		echo "\n";
?>
				<p><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/<?php echo $data_add["img_name"] ?><?php echo $data_add["img_ext"] ?>" alt="<?php echo $data_add["img_alt"] ?>" width="<?php echo $data_add["img_width"] ?>" height="<?php echo $data_add["img_height"] ?>" /></p>
<?php
	}
}
?>
				<footer>
					<dl class="category">
						<dt>カテゴリー</dt>
<?php while ( $data_category = mysql_fetch_array($result_category) ) { ?>
							<dd><a href="<?php echo $DOCUMENT_ROOT_URL ?>category/<?php echo $data_category["category_dir"] ?>/"><?php echo $data_category["category_name"] ?></a></dd>
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
			<section>
				<h2>Related articles</h2>
				<ul id="related-articles">
<?php
// 関連記事
$sql_related = "
SELECT *
FROM article
ORDER BY date_time_sys DESC
LIMIT 5
";
$result_related = mysql_query($sql_related, $db_con);
while ( $data_related = mysql_fetch_array($result_related) ) {
?>
					<li><a href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data_related["date_time"] ?>/<?php echo $data_related["directory"] ?>/"><?php echo $data_related["article_ttl"] ?></a></li>
<?php } ?>
				</ul>
			</section>
			<section id="comment">
				<h2>Comment</h2>
<?php
while ( $data_comment = mysql_fetch_array($result_comment) ) {
	$comment_jp_date = $data_comment["date_year"]."年".$data_comment["date_month"]."月".$data_comment["date_day"]."日　".$data_comment["date_hour"];
	$comment_tag_date = $data_comment["date_year"]."-".$data_comment["date_month"]."-".$data_comment["date_day"];
	
	if ( empty($data_comment["icon_user_name"]) ) {
		switch ( $data_comment["guest_icon"] ) {
			case 1:
				$comment_path = "icon_guest01.png";
				break;
			case 2:
				$comment_path = "icon_guest02.png";
				break;
			case 3:
				$comment_path = "icon_guest03.png";
				break;
			case 4:
				$comment_path = "icon_guest04.png";
				break;
			case 5:
				$comment_path = "icon_guest05.png";
				break;
		}
	}
	else { $comment_path = $data_comment["icon_user_name"].$data_comment["icon_user_ext"]; }
?>

<?php
$email = $data_comment["user_mail"];
$default = $DOCUMENT_ROOT_URL."images/icon_guest01.png";
$size = 60;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;


?>
				<article>
					<header>
						<h3><?php echo $data_comment["user_name"] ?></h3>
						<figure><img src="<?php echo $grav_url; ?>" alt="<?php echo $data_comment["user_name"] ?>" width="60" height="60" /></figure>
					</header>
					<p><?php echo nl2br($data_comment["comment_txt"]) ?></p>
					<footer>
						<ul>
							<li><time datetime="<?php echo $comment_tag_date ?>"><?php echo $comment_jp_date ?></time></li>
<?php if ( !empty($data_comment["user_url"]) ) { ?>
							<li><a href="<?php echo $data_comment["user_url"] ?>" rel="nofollow" class="blank">URL</a></li>
<?php } else { ?>
							<li>URL</li>
<?php } ?>
							<li>
								<form method="post" action="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/#comment-form">
									<input type="hidden" name="comment_id" value="<?php echo $data_comment["id"] ?>" />
									<input type="submit" value="返信" />
								</form>
							</li>
						</ul>
					</footer>
<?php
	$sql_add_comment = "
	SELECT *
	FROM add_comment
	WHERE comment_id = '".$data_comment["id"]."'
	ORDER BY date_time_sys
	";
	$result_add_comment = mysql_query($sql_add_comment, $db_con);
	while ( $data_add_comment = mysql_fetch_array($result_add_comment) ) {
		$add_comment_jp_date = $data_add_comment["date_year"]."年".$data_add_comment["date_month"]."月".$data_add_comment["date_day"]."日　".$data_add_comment["date_hour"];
		$add_comment_tag_date = $data_add_comment["date_year"]."-".$data_add_comment["date_month"]."-".$data_add_comment["date_day"];
	
		if ( empty($data_add_comment["icon_add_user_name"]) ) {
			switch ( $data_add_comment["guest_icon"] ) {
				case 1:
					$comment_add_path = "icon_guest01.png";
					break;
				case 2:
					$comment_add_path = "icon_guest02.png";
					break;
				case 3:
					$comment_add_path = "icon_guest03.png";
					break;
				case 4:
					$comment_add_path = "icon_guest04.png";
					break;
				case 5:
					$comment_add_path = "icon_guest05.png";
					break;
			}
		}
		else { $comment_add_path = $data_add_comment["icon_add_user_name"].$data_add_comment["icon_add_user_ext"]; }
?>

<?php
$email = $data_add_comment["user_mail"];
$default = $DOCUMENT_ROOT_URL."images/icon_guest01.png";
$size = 60;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>
					<article>
						<header>
							<h4><?php echo $data_add_comment["user_name"] ?></h4>
							<figure><img src="<?php echo $grav_url; ?>" alt="<?php echo $data_add_comment["user_name"] ?>" width="60" height="60" /></figure>
						</header>
						<p><?php echo nl2br($data_add_comment["comment_txt"]) ?></p>
						<footer>
							<ul>
								<li><time datetime="<?php echo $add_comment_tag_date ?>"><?php echo $add_comment_jp_date ?></time></li>
<?php if ( !empty($data_add_comment["user_url"]) ) { ?>
								<li><a href="<?php echo $data_add_comment["user_url"] ?>" rel="nofollow" class="blank">URL</a></li>
<?php } else { ?>
								<li>URL</li>
<?php } ?>
							</ul>
						</footer>
					</article>
<?php
	}
?>
				</article>
<?php
}
?>
				<form method="post" action="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data["date_time"] ?>/<?php echo $data["directory"] ?>/#comment-form" id="comment-form" ENCTYPE="MULTIPART/FORM-DATA">
					<input type="hidden" name="pid" value="comment" />
					<input type="hidden" name="id" value="<?php echo $data["id"] ?>" />
					<input type="hidden" name="comment_id" value="<?php echo $_POST["comment_id"] ?>" />
					<input type="hidden" name="auth" value="<?php echo $string ?>" />
					<dl>
						<dt><label for="user_name">お名前（必須）</label></dt>
							<dd><input type="text" name="user_name" id="user_name" value="<?php echo $_SESSION["user_name"] ?>" placeholder="お名前を入力" required /></dd>
						<dt><label for="user_mail">メールアドレス（必須・非公開）</label></dt>
							<dd><input type="email" name="user_mail" id="user_mail" value="<?php echo $_SESSION["user_mail"] ?>" placeholder="メールアドレスを入力" required /></dd>
						<dt><label for="user_url">URL</label></dt>
							<dd><input type="url" name="user_url" id="user_url" value="<?php echo $_SESSION["user_url"] ?>" placeholder="URLを入力" /></dd>
						<dt><label for="comment_txt">コメント（必須）</label></dt>
							<dd><textarea name="comment_txt" id="comment_txt" placeholder="コメントを入力" required><?php echo $_SESSION["comment_txt"] ?></textarea></dd>
						<dt>使用アイコン（参照・60x60）</dt>
							<dd><input type="file" name="user_img" size="58" /></dd>
						<dt>使用アイコン（デフォルト）</dt>
							<dd>
								<ul>
									<li>
										<label for="guest_icon_01"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_guest01.png" alt="ゲストユーザーアイコン01" width="60" height="60" /></label>
										<input type="radio" name="guest_icon" id="guest_icon_01" value="1" checked="checked" />
									</li>
									<li>
										<label for="guest_icon_02"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_guest02.png" alt="ゲストユーザーアイコン02" width="60" height="60" /></label>
										<input type="radio" name="guest_icon" id="guest_icon_02" value="2" />
									</li>
									<li>
										<label for="guest_icon_03"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_guest03.png" alt="ゲストユーザーアイコン03" width="60" height="60" /></label>
										<input type="radio" name="guest_icon" id="guest_icon_03" value="3" />
									</li>
									<li>
										<label for="guest_icon_04"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_guest04.png" alt="ゲストユーザーアイコン04" width="60" height="60" /></label>
										<input type="radio" name="guest_icon" id="guest_icon_04" value="4" />
									</li>
									<li>
										<label for="guest_icon_05"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_guest05.png" alt="ゲストユーザーアイコン05" width="60" height="60" /></label>
										<input type="radio" name="guest_icon" id="guest_icon_05" value="5" />
									</li>
								</ul>
							</dd>
						<dt><label for="img_auth">画像認証（必須）</label></dt>
							<dd<?php echo $error_txt ?>>
								<span id="hoge"><img src="<?php echo $DOCUMENT_ROOT_URL ?>images/auth_image.png?str=<?php echo $string ?>" alt="画像認証" width="420" height="80" /></span>
								<input type="text" name="img_auth" id="img_auth" value="" placeholder="上の画像内の文字を入力してください" required />
							</dd>
					</dl>
					<p><input type="submit" name="submit" value="コメントを投稿" /></p>
				</form>
			</section>
			
			
			

		</div>
		<?php include_once("../include/side-cont.php"); ?>
	</div>
	<?php include_once("../include/footer.php"); ?>
</div>
<?php include_once("../include/footer-include-js.php"); ?>
</body>
</html>