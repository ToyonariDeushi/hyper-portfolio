<?php

// 現在の言語を設定
mb_language("ja");
// 内部文字コードを設定
mb_internal_encoding("UTF-8");

// DB host
$db_host = "mysql401.db.sakura.ne.jp";
// DB name
$db_name = "hyper-portfolio_master";
// db user
$db_login = "hyper-portfolio";
// Db password
$db_pwd = "d4624581023";

$db_con = mysql_connect($db_host, $db_login, $db_pwd) or die("Cannot connect to DB!");
mysql_select_db($db_name, $db_con) or die("Cannot select DB!");
mysql_query('SET NAMES utf8', $db_con);

$keyword_list = array(
"HYPER PORTFOLIO",
"ハイパーポートフォリオ",
"はいぱーぽーとふぉりお",
"HYPER_USHI",
"ハイパー牛",
"出牛",
"でうし",
"豊成",
"とよなり",
"HTML5",
"CSS3",
"PHP"
);

$connect = "";
foreach ( $keyword_list as $value ) {
	$keywords .= $connect.$value;
	$connect = ",";
}

$description ="こちらは出牛 豊成（でうし とよなり）のポートフォリオサイトです。このサイトはHTML5、CSS3、PHP、MySQLで制作しており、外部のCMSは一切使っていません。自分用の制作メモや日々のブログを掲載しています。";

$SITE_TITLE = "HYPER PORTFOLIO";

$REQUEST_URL = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$DOCUMENT_ROOT_URL = "http://".$_SERVER["HTTP_HOST"]."/";
$ROBOTS = "index,follow";

?>