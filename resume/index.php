<?php

require_once('../inc/config.inc.php');

$page = new AndrewCassellContentPage();
$page->setHtmlTitle('Andrew Cassell Resume');
$page->open();

?>
<div class="container">
	
	<div class="major-white-content">
		
		<section id="global">
          <div class="page-header">
            <h1>Andrew Cassell</h1>
			<h3>Web Application Developer</h3>
          </div>
		</section>
		
		<section id="global">
		<div class="page-header">
		  <h2>Education</h2>
		  <div class="row">
			  <div class="span2"><br/>2001-2007</div>
			  <div class="span9">
				<h3>Bachelor of Science, <a href="http://www.cse.psu.edu">Computer Engineering</a></h3>
				<p>The Pennsylvania State University &mdash; University Park, PA</p>
			</div>
		  </div>
		   <div class="row">
			  <div class="span2"><br/>2001</div>
			  <div class="span9">
				<h3>High School Diploma</h3>
				<p>Greenville Senior High School &mdash; Greenville, PA</p>
			</div>
		  </div>
		</div>
        </section>
		
		<section id="global">
		<div class="page-header">
		  <h2>Work Experience</h2>
		  
		  <div class="row">
			  <div class="span2"><br/>June&nbsp;2007-<i>present</i></div>
			  <div class="span9">
				<h3><a href="http://www.msrc.org">Marine Spill Response Corporation</a></h3>
				<h4>Information Systems Developer</h4>
			</div>
		  </div>
		  
		  <div class="row">
			  <div class="span2"><br/>Aug&nbsp;2006-Aug&nbsp;2007</div>
			  <div class="span9">
				<h3><a href="http://solar.psu.edu">Penn State Solar Decathlon</a></h3>
				<h4>Communications and Energy Dashboard Developer</h4>
			</div>
		  </div>
		  
		  <div class="row">
			  <div class="span2"><br/>Jan&nbsp;2005 - Aug&nbsp;2005</div>
			  <div class="span9">
				<h3><a href="http://www.sony.com">Sony</a></h3>
				<h4>Computer Integrated Manufacturing Group Co-Op Intern</h4>
			</div>
		  </div>
		  
		  <div class="row">
			  <div class="span2"><br/>Jan&nbsp;2004 - Aug&nbsp;2004</div>
			  <div class="span9">
				<h3><a href="http://www.rajones.com">R.A. Jones &amp; Company, Inc.</a></h3>
				<h4>Electrical Controls and Robotics Engineering Co-Op Intern</h4>
			</div>
		  </div>
		  
		  <div class="row">
			  <div class="span2"><br/>Aug&nbsp;2001 - Dec&nbsp;2004</div>
			  <div class="span9">
				<h3><a href="http://www.police.psu.edu/auxpolice/">Pennsylvania State University Police Services</a></h3>
				<h4>Supervisor, Security &amp; Traffic</h4>
			</div>
		  </div>
		  
		  <div class="row">
			  <div class="span2"><br/>Man&nbsp;1998 - Aug&nbsp;2001</div>
			  <div class="span9">
				<h3><a href="http://www.opensignsinc.com">Open Signs, Inc.</a></h3>
				<h4>Graphic Designer, Web Developer, Sign Manufacturing</h4>
			</div>
		  </div>
		  
		</div>
        </section>
		
		</div>
</div>

<?php

$page->close();


?>