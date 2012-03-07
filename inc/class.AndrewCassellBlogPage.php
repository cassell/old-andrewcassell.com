<?php

require_once(Properties::DOC.'inc/class.Markdown.php');

class AndrewCassellBlogPage extends AndrewCassellPage
{
	function __construct($blog,$article)
	{
		parent::__construct();
		$this->blog = $blog;
		$this->article = $article;
		
		if($this->article->getCssFile())
		{
			$this->insertStyleBlock(file_get_contents(Properties::DOC.'blog/entries/' . $this->article->getCssFile()));
		}
		
		$this->setHtmlTitle($this->article->getTitle() . " on Andrew Cassell's Blog");
	}
	
	function decodeGET($GETString)
	{
		$a = array();
		
		$a['id'] = str_replace('?id=', '', $GETString);
		
		return $a;
	}
	
	function getCustomMeta()
	{
		return '<link rel="alternate" type="application/atom+xml" title="Andrew Cassell Blog Atom Feed" href="' . $this->blog->getAtomFeedURL() . '" />';
	}
	
	function getBlogContents()
	{
		return $this->article->getMarkdownContents();
	}
	
	function display()
	{
		$this->open(self::MENU_BLOG);
		
		echo '<div class="content blog">';
			echo '<h1><a href="/blog/' . $this->article->getDestinationUrl() . '/">' .  $this->article->getTitle() . '</a></h1>';
			echo '<div class="date">' . date('F j, Y', strtotime($this->article->getDate())) . '</div>';
			echo '<div class="blogContent">';
			
			echo $this->getBlogContents();
			echo '</div>';
		echo '</div>';
		
		$previousArticle = $this->blog->getArticleById($this->article->getId() + 1);
		$nextArticle = $this->blog->getArticleById($this->article->getId() - 1);
		
		echo '<div class="blogLinks">';
		if($previousArticle != null)
		{
			echo '<a id="previous" href="/blog/' . $previousArticle->getDestinationUrl() . '">&lt; Previous Blog Entry: <span>' . $previousArticle->getTitle() . '</span></a>';
		}
		if($nextArticle != null)
		{	
			echo '<a id="next" href="/blog/' . $nextArticle->getDestinationUrl() . '">Next Blog Entry: <span>' . $nextArticle->getTitle() . '</span> &gt;</a>';
		}
		echo '</div>';
		
		echo '<div class="cb"></div>';
		echo '<div id="blogSubscribe"><a href="' . $this->blog->getAtomFeedURL() . '">{ subscribe to my blog\'s atom feed }</a></div>';
		
		
		$this->close();
		
	}
	
}

?>