<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta name="robots" content="noindex,follow" />              
        <meta charset="utf-8">
        <title>アジアの友 The Asia-no Tomo｜公益財団法人 アジア学生文化協会</title>
        <meta name="description" content="日本とアジア諸国の青年学生が共同生活を通じて、人間的和合と学術、文化および経済の交流をはかることにより、アジアの親善と世界の平和に貢献することを目的とする財団法人。">
   		<meta name="viewport" content="width=device-width,user-scalable=no,shrink-to-fit=yes">			
		<script src="<?php echo get_template_directory_uri(); ?>/js/viewport.js"></script>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/additional.css">
    </head>
    <body class="under asia">
		<?php get_header(); ?>				
		<section class="fv flex-wrap_par">
			<h2 class="fc_red">アジアの友</h2>
			<div class="pix">
				<div class="pix-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/mv_logo.jpg" alt="" />
				</div>
			</div>
		</section>
		<section class="info_vox sec_pad_1" id="greeting">
				<h2 class="h_type_1">アジアの友とは</h2>
				<span>What are Asian friends</span>			
			<article class="clearfix vox_type_2">
				<div class="tx">
					<div class="inn">
						<span class="in_tx">
「アジアの友」（The Asia-no Tomo）は、1958年協会設立当初より発効され、日本における留学交流のオピニオン誌として発行されてまいりました。留学生および国際教育、国際交流に関わる方々に留学生の勉学・研究・交流体験、日本や世界の留学政策、留学生問題など留学交流の現状等を分かりやすくお伝えする機関誌です。インターネット購読も可能です。
						</span>
						<span class="in_tx">
年間購読料は2,000円＋税（年4回、送料込）。協会会員には無料配布されています。
購読ご希望の方は、下記購読申込フォームから、 または<お電話>03-3946-4121にてその旨お知らせください。
						</span>
					</div>
				</div>
				<section class="asia_vxz flex_wrapper">
					<div class="btn_type_2">
						<a href="/" class="hover">
							購読申込フォーム
						</a>
					</div>	
					<div class="btn_type_2 blue_type">
						<a href="/" class="hover">
							購読料の支払い
						</a>
					</div>	
				</section>	
			</article>
		</section>

<style>

.gallery-magazine-container {
	display:none;
}
.gallery-img-container {
	display:none;

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
		<section class="main_stage sec_pad_1_b wrap_1200" id="greeting">
			<h3 class="asia_year">2019年</h3>
			<article class="magaz flex-wrap_par">
				<?php $loop = new WP_Query( array( 
						'post_type' => 'magazine', 
						'posts_per_page' => 1000 ) ); 
						while ( $loop->have_posts() ) : 
							$loop->the_post(); 
							$post = get_post();
							$terms = get_the_terms( $post->ID , 'years' );
							$year = isset($terms[0]) ? $terms[0]->name : '';
							$year1 = isset($terms[1]) ? $terms[1]->name : '';
//							$date = date('Y年 n月 j日', strtotime($post->post_date));
							$date = date('n月 j日', strtotime($post->post_date));							
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

							$yearclass = "year-" . $year;
							if (!empty($year1))
								$yearclass .= " year-" . $year1;
						?>
						
					<div class="gallery-magazine-container vx <?php echo $yearclass;?>">
						<h4><?php echo the_title_attribute( 'echo=0' ); ?></h4>
						<section class="flex_wrapper flex_sp">
							<figure>
							
							<img src="<?php echo $featured_img_url; ?>">
							</figure>
							<div class="tx">
								<?php echo $post->post_content; ?>						
							</div>
						</section>
					</div>
				<?php endwhile; ?>
			</article>

			<nav>
				<ul class="flex-wrap_par flex_sp">
					<?php for ($y = 2019; $y >= 2010; $y --) : ?>
					<li class="year_button btn_type_2">
						<a class="hover" href="javascript:;" data-year="<?php echo $y; ?>"><?php echo $y; ?>年</a>
					</li>
					<?php endfor; ?>
				</ul>
			</nav>

			<div class="past_year">
				<h3 class="hover">
					<img src="img/past_tra.png" alt="">
					<span>2009年以前はこちら</span>
				</h3>
				<nav>
				<ul class="flex-wrap_par flex_sp">
				
					<?php for ($y = 2009; $y >= 2005; $y --) : ?>
					<li class="year_button btn_type_2">
						<a class="hover" href="javascript:;" data-year="<?php echo $y; ?>"><?php echo $y; ?>年</a>
					</li>
					<?php endfor; ?>
				</ul>
				</nav>
			</div>

		</section>

		<?php get_footer(); ?>				
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>        
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>       
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sliderPro.min.js"></script>
		
        <script>
            jQuery(function($) {

				// Photo news
				$(".year_button a").click(function() {
					event.preventDefault();

					let year = $(this).data("year");
					for (y = 2005; y <= 2019; y ++) {
						if (y == year) {
							continue;
						}
						$("div.year-"+y).hide();
					}
					$("div.year-"+year).fadeIn();
//					alert($("h3.asia_year").innerHTML);
					$("h3.asia_year")[0].innerHTML = year + "年";

					return false; // stop propogation
				});
				$("div.year-2019").show();

            });

        </script>
    </body>
</html>
