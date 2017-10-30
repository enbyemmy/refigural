<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=.5, maximum-scale=1">
	<meta name="description" content="refigural magazine - fashion, art, and beauty refigured">
<!-- 	<meta property="og:image" content="http://refigural.com/wp-content/uploads/Issue-2-Cover1-small.jpg"/>
	<meta property="og:image:secure_url" content="https://refigural.com/wp-content/uploads/Issue-2-Cover1-small.jpg" />
 -->
 <?php global $post ?>
<?php $featured_image = get_field('social_image', $post->ID); ?>
<?php if(!$featured_image){
  $featured_image = get_the_post_thumbnail_url();
  }
  // var_dump($featured_image);
  if (!$featured_image){
    $featured_image = get_field('background_image');
  } else {
    $featured_image = get_field('banner');
    $featured_image = $featured_image['url'];
  }
  ?>

<?php if ($featured_image){ ?>
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>" />
<meta property="og:description" content="Fashion, Art, and Beauty Refigured. Refigural" />
<meta property="og:image" content="<?php echo $featured_image; ?>" />
<?php } else { ?>
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>" />
<meta property="og:description" content="Fashion, Art, and Beauty Refigured. Refigural" />
<meta property="og:image" content="http://refigural.com/wp-content/uploads/Issue-12-Cover-1.jpg" />
<?php } ?>

<?php wp_reset_query(); ?>

  <!-- <link rel="image_src" href="http://refigural.com/wp-content/uploads/Issue-2-Cover1-small.jpg"/> -->

<link rel="shortcut icon" href="/favicon.png" type="image/x-icon"/>
<link rel="apple-touch-icon" href="/favicon.png">
		<link rel="icon" href="/favicon.png">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/remodal/src/remodal.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/remodal/src/remodal-default-theme.css">
  <?php wp_head(); ?>

<meta name="p:domain_verify" content="52745011126c770cb3674ceeaf714ad7"/>


  <!--link href="http://vjs.zencdn.net/6.2.7/video-js.css" rel="stylesheet"-->

  <!-- If you'd like to support IE8 -->
  <!--script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script-->


</head>
