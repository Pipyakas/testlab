<!doctype html>
<html lang="en" ng-app="app">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo (isset($title)) ? $title : $general_setting['title']; ?></title>
	<meta name="description" content="<?php echo (isset($meta_description)) ? $meta_description : $general_setting['desc']; ?>" />
	<meta name="keywords" content="<?php echo (isset($meta_kw)) ? $meta_kw : $general_setting['keyword']; ?>" />
	<meta name="author" content="<?php echo (isset($meta_author)) ? $meta_author : $general_setting['author']; ?>" />
	<meta property="og:image" content="<?php echo (isset($og_image)) ? $meta_description : base_url() . 'statics/images/ptit-logo.png' ?>" />

	<link rel="shortcut icon" href="<?php echo ($general_setting['favicon'] != "") ? base_url() . $general_setting['favicon'] : base_url() . 'statics/images/favicon.ico' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'statics/bootstrap/css/bootstrap.min.css' ?>" />
	<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'statics/bootstrap/js/bootstrap.min.js' ?>"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'statics/font-awesome/css/font-awesome.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'statics/vendors/flexslider/flexslider.css' ?>" />
	<script type="text/javascript" src="<?php echo base_url(); ?>statics/vendors/flexslider/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'statics/js/main.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/jquery.validate.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'statics/js/jquery_validation/additional-methods.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/handlebars-v1.3.0.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'statics/css/frontend/style.css' ?>" />



	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122954268-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-122954268-1');
	</script>









</head>



<body ng-controller="mainCtrl">

	<?php
	echo $template['partials']['header'];
	?>

	<?php echo $template['partials']['content']; ?>

	<?php
	echo $template['partials']['footer'];
	?>






</body>

</html>