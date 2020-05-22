<?php
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */

	$isForm = FALSE;
	$activePage = 'About';

	require 'header.php';

	function RenderTwitterLink($URL)
	{
		?>
		<a style="color:#00A3F3" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<?php
	}

	function RenderLinkedInLink($URL)
	{
		?>
		<a style="color:#0078B5" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<?php
	}

?>

	<div class="container-fluid">
	<div class="row">
	<div class="col-xl-9 col-lg-11 m-2 pb-4 rounded text-center text-light mx-auto">


			<section class="jumbotron text-center text-dark bg-light border-primary border">
				<div class="container">
					<h1 class="jumbotron-heading">Improve Your DevOps Capability</h1>
					<p class="lead">This online DevOps Maturity Assessment questionnaire will help you understand your current strengths and weaknesses and then recommend resources that can support you in taking the next steps on your DevOps journey.</p>
					<p>
						<a href="<?='section-' . SectionNameToURLName($survey->sections[0]['SectionName'])?>" class="btn btn-primary">Start the Questionnaire</a>
						<a href="https://github.com/atosorigin/DevOpsMaturityAssessment" target="_blank" class="btn btn-secondary">Fork us on GitHub</a>
					</p>
				</div>
			</section>

			<!-- Three columns of text below the jumbotron -->
			<div class="row text-dark">

				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4 text-light">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="far fa-chart-bar fa-stack-1x"></i>
					</span>
					<h2>Understand Where You Are</h2>
					<p class="text-justify">Our set of carefully designed questions across 7 different areas will help you quickly establish your current level of DevOps maturity.</p>
					<p class="text-justify">You can view the results online as well as downloading them in CSV format for more detailed analysis.</p>
				</div><!-- /.col-lg-4 -->

				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4 text-light">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-shoe-prints fa-stack-1x"></i>
					</span>
					<h2>Identify Your Next Steps</h2>
					<p class="text-justify">For each area we have identified a range of free or commercially available books, videos, blog posts, white papers and websites that will help you take the next steps on your DevOps journey.</p>
				</div><!-- /.col-lg-4 -->


				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4 text-light">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-lock-open fa-stack-1x"></i>
					</span>
					<h2>Free and Open Source</h2>
					<p class="text-justify">This tool is made available under the MIT License: you are free to use, adapt and redistribute it, both for commercial and non-commercial use. There is no obligation to share your changes, although we always appreciate feedback! Why not <a href="https://github.com/atosorigin/DevOpsMaturityAssessment" target="_blank">fork us on GitHub</a>?</p>

				</div><!-- /.col-lg-4 -->

			</div><!-- /.row -->

			<div class="row">
				<div class="col-lg-12">
					<p align="center"><em>We do not harvest your data and we will not share your results with anyone else.</em></p>
				</div>
			</div>

			<section class="jumbotron text-dark text-center border border-primary bg-light mt-2">
				<div class="container">
					<h1 class="jumbotron-heading">Contact Us</h1>
					<p class="lead">Please do not hesitate to contact dl-bps-flair-coe@atos.net if you have any queries.</p>
				</div>
			</section>


	</div><!-- /.col-lg-8 -->

	</div><!-- /.row -->

	</div><!-- /.container -->

<?php

	require 'footer.php';

?>
