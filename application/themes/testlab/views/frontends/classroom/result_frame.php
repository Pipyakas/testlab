<!doctype html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/bootstrap/css/bootstrap.min.css'?>" />
    <script type="text/javascript" src="<?php echo base_url().'statics/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'statics/bootstrap/js/bootstrap.min.js'?>"></script>	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/font-awesome/css/font-awesome.css'?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/vendors/flexslider/flexslider.css'?>"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>statics/vendors/flexslider/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'statics/js/main.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/jquery.validate.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'statics/js/jquery_validation/additional-methods.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>statics/js/handlebars-v1.3.0.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'statics/css/frontend/style.css'?>" />   
	<script type="text/javascript" src="<?php echo base_url().'statics/js/offrightclick.js'?>"></script> 	
</head>
<body style="padding-top: 0px;">
<?php
if (isset($livecodes) ){
  echo $livecodes;
}
?>
</body>
</html>