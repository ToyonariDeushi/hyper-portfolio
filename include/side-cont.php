<div id="side-cont">
			<form method="post" action="<?php echo $DOCUMENT_ROOT_URL ?>search.php" id="search">
				<input type="text" name="search" value="" placeholder="記事タイトルを検索" />
				<input type="image" name="submit" src="<?php echo $DOCUMENT_ROOT_URL ?>images/icon_search-glass.png" width="15" height="18" alt="送信ボタン" />
			</form>
			<nav id="side-nav">
				<section>
					<h2>Entry</h2>
					<ul>
<?php
// エントリーを10件表示
$sql_side_entry = "
SELECT *
FROM article
ORDER BY date_time_sys DESC
LIMIT 10
";
$result_side_entry = mysql_query($sql_side_entry, $db_con);
while ( $data_side_entry = mysql_fetch_array($result_side_entry) ) {
?>
						<li><a href="<?php echo $DOCUMENT_ROOT_URL ?>entry/<?php echo $data_side_entry["date_time"] ?>/<?php echo $data_side_entry["directory"] ?>/"><?php echo $data_side_entry["article_ttl"] ?></a></li>
<?php } ?>
					</ul>
				</section>
				<section>
					<h2>Category</h2>
					<ul>
<?php
// カテゴリーを表示
$sql_side_category = "
SELECT category_table.*, list.category_name, list.category_dir
FROM ( SELECT regist.category_id, count(regist.category_id) regist_count FROM category_regist regist GROUP BY category_id ) category_table, category_list list
WHERE category_table.category_id = list.id
";
$result_side_category = mysql_query($sql_side_category, $db_con);
while ( $data_side_category = mysql_fetch_array($result_side_category) ) {
?>
						<li><a href="<?php echo $DOCUMENT_ROOT_URL ?>category/<?php echo $data_side_category["category_dir"] ?>/"><?php echo $data_side_category["category_name"] ?></a>(<?php echo $data_side_category["regist_count"] ?>)</li>
<?php } ?>
					</ul>
				</section>
				<section>
					<h2>Archives</h2>
					<ul>
<?php
// アーカイブを表示
$sql_side_archives = "
SELECT date_year, date_month, count(date_month) archives_count
FROM article
GROUP BY date_year, date_month
ORDER BY date_year DESC, date_month DESC";
$result_side_archives = mysql_query($sql_side_archives, $db_con);
while ( $data_side_archives = mysql_fetch_array($result_side_archives) ) {
?>
						<li><a href="<?php echo $DOCUMENT_ROOT_URL ?><?php echo $data_side_archives["date_year"] ?><?php echo $data_side_archives["date_month"] ?>/" rel="archives"><?php echo $data_side_archives["date_year"] ?>年<?php echo $data_side_archives["date_month"] ?>月</a>(<?php echo $data_side_archives["archives_count"] ?>)</li>
<?php } ?>
					</ul>
				</section>
			</nav>
			<aside><a href="http://www.w3.org/html/logo/" class="blank" rel="nofollow"><img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics"></a></aside>
		</div>
