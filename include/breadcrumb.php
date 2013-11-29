<?php
$middle_flg = FALSE;
$page_flg = FALSE;

// カテゴリー
if ( $_REQUEST["category"] ) {
	$sql_bread_category = "
	SELECT category_name
	FROM category_list
	WHERE category_dir = '".$_REQUEST["category"]."'
	";
	$result_bread_category = mysql_query($sql_bread_category, $db_con);
	$data_bread_category = mysql_fetch_array($result_bread_category);
	
	$middle_flg = TRUE;
	$middle_path = "category/".$_REQUEST["category"]."/";
	$middle_name = $data_bread_category["category_name"];
}

// アーカイブ
else if ( $_REQUEST["date_year"] AND $_REQUEST["date_month"] ) {
	$middle_flg = TRUE;
	$middle_path = $_REQUEST["date_year"].$_REQUEST["date_month"]."/";
	$middle_name = $_REQUEST["date_year"]."年".$_REQUEST["date_month"]."月";
}

// ページネイション
if ( $_REQUEST["page"] ) {
	$page_flg = TRUE;
	$page_name = "ページ".$_REQUEST["page"];
}

// 記事ページと同一投稿日
if ( $_REQUEST["date_time"] ) {
	$sql_bread_article = "
	SELECT *
	FROM article
	WHERE date_time = '".$_REQUEST["date_time"]."'
	";
	$result_bread_article = mysql_query($sql_bread_article, $db_con);
	$data_bread_article = mysql_fetch_array($result_bread_article);
	
	$middle_flg = TRUE;
	
	$middle_path = "entry/".$_REQUEST["date_time"]."/";
	$middle_name = $data_bread_article["date_year"]."年".$data_bread_article["date_month"]."月".$data_bread_article["date_day"]."日";
	
	if ( $_REQUEST["directory"] ) {
		$sql_bread_article .= "
		AND directory = '".$_REQUEST["directory"]."'
		";
		$result_bread_article = mysql_query($sql_bread_article, $db_con);
		$data_bread_article = mysql_fetch_array($result_bread_article);
		
		$page_flg = TRUE;
		$page_name = $data_bread_article["article_ttl"];
	}
}
?>
<nav class="breadcrumb">
		<ol>
			<li>
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="<?php echo $DOCUMENT_ROOT_URL ?>" itemprop="url">
						<span itemprop="title"><?php echo $SITE_TITLE ?></span>
					</a>
				</div>
			</li>
<?php
if ( $middle_flg == TRUE ) {
?>
			<li>
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="<?php echo $DOCUMENT_ROOT_URL ?><?php echo $middle_path ?>" itemprop="url">
						<span itemprop="title"><?php echo $middle_name ?></span>
					</a>
				</div>
			</li>
<?php } ?>
<?php
if ( $page_flg == TRUE ) {
?>
			<li>
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="<?php echo $REQUEST_URL ?>" itemprop="url">
						<span itemprop="title"><?php echo $page_name ?></span>
					</a>
				</div>
			</li>
<?php } ?>
		</ol>
	</nav>
