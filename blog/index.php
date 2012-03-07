<?php

require_once('../inc/config.inc.php');

include('blogs.inc.php');


if($_GET['id'])
{
	$article = $blog->getArticleById(intval($_GET['id']));
}
else if($argv[1] != "")
{
	$get = AndrewCassellBlogPage::decodeGET($argv[1]);
	if($get['id'] > 0)
	{
		$article = $blog->getArticleById(intval($get['id']));
	}
}

if($article == null)
{
	$article = $blog->getTopArticle();
	$title = "Andrew Cassell's Blog";
}


$page = new AndrewCassellBlogPage($blog,$article);

if($title != null)
{
	$page->setHtmlTitle($title);
}

$page->display();

?>