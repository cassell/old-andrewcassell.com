<?php

class AndrewCassellContentPage extends AndrewCassellPage
{
	function __construct()
	{
		parent::__construct();
	}
	
	function open()
	{
		parent::open();
		
		?>
		<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/">Andrew Cassell</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
				<li><a href="/">Home</a></li>
				<li><a href="/blog/">Blog</a></li>
				<li><a href="http://www.github.com/cassell">GitHub</a></li>
				<li><a href="http://www.twitter.com/alc277">Twitter</a></li>
				<li><a href="http://www.facebook.com/andrewcassell">Facebook</a></li>
				<li><a href="http://www.sweetradish.com">SweetRadish</a></li>
				</ul>
			</div>
			</div>
		</div>
		</div>
		<?php
	}
	
	
}


?>