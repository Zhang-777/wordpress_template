<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta name="robots" content="noindex,follow" />              
        <meta charset="utf-8">
        <title>お問い合わせ｜公益財団法人 アジア学生文化協会</title>
        <meta name="description" content="日本とアジア諸国の青年学生が共同生活を通じて、人間的和合と学術、文化および経済の交流をはかることにより、アジアの親善と世界の平和に貢献することを目的とする財団法人。">
   		<meta name="viewport" content="width=device-width,user-scalable=no,shrink-to-fit=yes">			
		<script src="<?php echo get_template_directory_uri(); ?>/js/viewport.js"></script>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/additional.css">
    </head>
    <body class="under contact">
		<?php get_header(); ?>					
		<section class="fv flex-wrap_par">
			<h2 class="fc_red">お問い合わせ</h2>
			<div class="pix">
				<div class="pix-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/mv_logo.jpg" alt="" />
				</div>
			</div>
		</section>
<style>

span.error {
display:block;
color: #b20000;
}
.wpcf7-submit {
    width: 324px;
    display: block;
    margin: 20px auto 0;
    font-weight: bold;
    border: 1px solid #b20000;
    text-align: center;
    position: relative;
    font-size: 16px;
    padding: 20px 0;
    letter-spacing: .035em;
    color: #FFF;
    background-color: #b20000;
}
.wpcf7-form-control-wrap {
width:100%;
}
</style>
		<section class="international_dormitory wrap_800 sec_pad_1">
					<?php

					// Start the Loop.
					while ( have_posts() ) :
						the_post();

		//				get_template_part( 'template-parts/content/content', 'page' );
						the_content();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endwhile; // End the loop.
					?>
		</section>
		<?php get_footer(); ?>				
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>        
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>       
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sliderPro.min.js"></script>
		
<script>
    $('input[type="submit"]').click(function () {
		var date = new Date();
		var year = date.getFullYear();
		var month = date.getMonth() + 1;
		var day = date.getDate();
		$('input[name="date"]').val(year + '-' + month + '-' + day + ' ' + date.toLocaleTimeString());
    });
</script>
    </body>
</html>
