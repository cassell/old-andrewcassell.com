<?php

require_once(Properties::DOC.'inc/class.Markdown.php');
require_once(Properties::DOC.'inc/class.Html2Text.php');

class StaticSiteBlog
{
	var $articleId = 1;
	var $articles;
	
	function __construct() { }
	
	function addArticle($article)
	{
		$article->setId($this->articleId);
		$this->articles[$this->articleId] = $article;
		$this->articleId++;
	}
	
	function getArticles()
	{
		return array_reverse($this->articles,true);
	}
	
	function getArticleById($id)
	{
		return $this->articles[$id];
	}
	
	function getTopArticle()
	{
		return $this->getArticleById(1);
	}
	
	function setBlogFolder($val) { $this->blogFolder = $val; }
	function getBlogFolder() { return $this->blogFolder; }
	
	function setBlogTitle($val) { $this->blogTitle = $val; }
	function getBlogTitle() { return $this->blogTitle; }
	
	function setBlogSubTitle($val) { $this->blogSubTitle = $val; }
	function getBlogSubTitle() { return $this->blogSubTitle; }
	
	function setAtomFeedURL($val) { $this->atomFeedURL = $val; }
	function getAtomFeedURL() { return $this->atomFeedURL; }
	
	function setAuthor($val) { $this->author = $val; }
	function getAuthor() { return $this->author; }
	
	function setHomeURL($val) { $this->homeURL = $val; }
	function getHomeURL() { return $this->homeURL; }
	
	function setBlogBaseURL($val) { $this->blogBaseURL = $val; }
	function getBlogBaseURL() { return $this->blogBaseURL; }
	
	function atomFeed()
	{
		echo '<?xml version="1.0" encoding="utf-8"?>';
		?>
		<feed xmlns="http://www.w3.org/2005/Atom">
			<title><?php echo $this->getBlogTitle(); ?></title>
			<subtitle><?php echo $this->getBlogSubTitle(); ?></subtitle>
			<link href="<?php echo $this->getAtomFeedURL(); ?>" rel="self" />
			<link href="<?php echo $this->getHomeURL(); ?>" />
			<id><?php echo str_replace(".xml","",$this->getAtomFeedURL()); ?></id>
			<updated><?php echo gmdate('Y-m-d') . "T" . gmdate('H:m:s'); ?>Z</updated>
			<author>
				<name><?php echo $this->getAuthor();?></name>
			</author>
		<?php
		
		$count = 0;
		
		foreach($this->getArticles() as $article)
		{
			if($count++ < 5)
			{
		?>
			<entry>
				<title><?php echo $article->getTitle() ?></title>
				<link href="<?php echo $this->getBlogBaseURL() . $article->getDestinationUrl().'/' ?>" />
				<link rel="alternate" type="text/html" href="<?php echo $this->getBlogBaseURL() . $article->getDestinationUrl().'/'; ?>"/>
				<id><?php echo $article->getDestinationUrl() ?></id>
				<updated><?php echo gmdate('Y-m-d',strtotime($article->getDate())) . "T" . gmdate('H:m:s',strtotime($article->getDate())+28800); ?>Z</updated>
				<summary><?php echo $article->getAltMarkdownContents();  ?></summary>
			</entry>
		<?php
			}
		}
		?>
		</feed>
		<?php
	}
	
}

class StaticSiteBlogArticle
{
	function __construct() { }
	
	function setDate($val) { $this->date = $val; }
	function getDate() { return $this->date; }
	
	function setId($val) { $this->id = $val; }
	function getId() { return $this->id; }
	
	function setDestinationUrl($val) { $this->destinationUrl = $val; }
	function getDestinationUrl() { return $this->destinationUrl; }
	
	function setTitle($val) { $this->title = $val; }
	function getTitle() { return $this->title; }
	
	function setMarkdownSource($val) { $this->markdownSource = $val; }
	function getMarkdownSource() { return $this->markdownSource; }
	
	function setCssFile($val) { $this->cssFile = $val; }
	function getCssFile() { return $this->cssFile; }
	
	function getMarkdownContents()
	{
		$markdown = file_get_contents($this->getMarkdownSource());
		
		// clean up word abnomailities
		$markdown = str_replace("Õ", "'", $markdown);
		$markdown = str_replace("É", "&hellip;", $markdown);
		$markdown = str_replace("Ð", "&mdash;", $markdown);
		$markdown = str_replace("Ò", "&quot;", $markdown);
		$markdown = str_replace("Ó", "&quot;", $markdown);
		
		$html = Markdown($markdown);
		$html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
		$html = str_replace('markdown="1"', '', $html);
		return $html;
	}
	
	function getAltMarkdownContents()
	{
		$h2t =& new html2text($this->getMarkdownContents());
		return $h2t->get_text();
	}
	
	
}




?>