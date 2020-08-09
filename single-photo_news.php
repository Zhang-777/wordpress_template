<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta name="robots" content="noindex,follow" />              
        <meta charset="utf-8">
        <title>PHOTO NEWS｜公益財団法人 アジア学生文化協会</title>
        <meta name="description" content="日本とアジア諸国の青年学生が共同生活を通じて、人間的和合と学術、文化および経済の交流をはかることにより、アジアの親善と世界の平和に貢献することを目的とする財団法人。">
   		<meta name="viewport" content="width=device-width,user-scalable=no,shrink-to-fit=yes">			
		<script src="<?php echo get_template_directory_uri(); ?>/js/viewport.js"></script>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/additional.css">
		
        <link rel="stylesheet" id="parent-custom-css" href="<?php echo get_template_directory_uri(); ?>/css/additional-02.css" type="text/css" media="all">
		<style>
			.in_tx p {
				text-indent: 1em;
				margin-top: 8px;
			}
		</style>
		
<style>
.gallery-span-container {
	display:none;
}
.gallery-img-container {

	float: left;
	width: calc(25% - 20px);
	height: 250px;

	margin: 10px;
	padding: 5px;
	box-sizing: border-box;

	border: 1px solid #eee;
	border-radius: 3px;

	transition: 0.5s;
}
.gallery-img-container a {
    display: inline-block;
	position: relative;
    height: 100%;
}
.gallery-img-container a img {
	max-width: 100%;
	max-height: 100%;
	vertical-align: middle;
}
.gallery-img-container a span {
	position: absolute;
    display: block;
    width: 100%;
    bottom: 0;
    padding: 1rem;
	font-size: 90%;
    color: #fff;
    background: -webkit-linear-gradient(left, rgba(85, 67, 70, 0.85), rgba(69, 80, 91, 0.85)) !important;
}

</style>
    </head>
    <body class="under contact">
		<?php get_header(); ?>					
		<section class="fv flex-wrap_par">
			<h2 class="fc_red">PHOTO NEWS</h2>
			<div class="pix">
				<div class="pix-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/mv_logo.jpg" alt="" />
				</div>
			</div>
		</section>
		<?php
		$post = get_post();
		$terms = get_the_terms( $post->ID , 'years' );
		$year = isset($terms[0]) ? $terms[0]->name : '';

	$fields = acf_get_fields( $post->ID );
		$customFields = get_post_custom();
		//print_r(get_field('field_5f267bdd2709f'));
		$photo = get_field('photo-list');
//		$photoList = $customFields['photo-list'];
		$date = date('Y年 m月 d日', strtotime($post->post_date));
		//print_r($customFields);
		//$image_id = get_field('my_image_field');

//print_r($photo);
//print_r(wp_get_attachment_image_src($photo['photo-01'], 'full'));
		?>

<style>
.gallery-img-container a {
width:100%;
}
.gallery-img-container a img {
    width: auto;
    height: auto;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
	}
</style>

		<section class="international_dormitory wrap_800 sec_pad_1">
			<span class="in_tx"><strong><?php echo $date; ?>： <?php echo the_title_attribute( 'echo=0' ); ?></strong>
				<br /><?php echo $post->post_content; ?>
			</span>
		</section>

		<div class="container page">
			<div class="row">
				<div class="col-md-8 content-area">
					<div class="inner">
					<?php for ($i = 1; $i <= 20; $i++) {
					$key=sprintf('photo-%02d', $i);
					if ($photo[$key]) { ?>
						<div class="gallery-img-container ">
						  <a href="<?php echo wp_get_attachment_image_src($photo[$key], 'full')[0]; ?>">		  
							<img src="<?php echo wp_get_attachment_image_src($photo[$key], 'full')[0]; ?>" alt="<?php echo ''; ?>" />
						  </a>
						</div>
					<?php } ?>
					<?php } ?>
					</div>

					<span class="clearfix"></span>
				</div>
			</div>
		</div>

				
		<?php get_footer(); ?>				
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>        
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>       
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sliderPro.min.js"></script>
    </body>
</html>
