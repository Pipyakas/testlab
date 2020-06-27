<script type="text/javascript" src="<?php echo base_url()?>/statics/ui/js/jquery-ui-1.8.17.custom.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>statics/ui/css/smoothness/jquery-ui-1.9.2.custom.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>statics/elfinder/css/elfinder.min.css">
<script type="text/javascript" src="<?php echo base_url()?>statics/elfinder/js/elfinder.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://elfinder.org/demo/css/theme.css"/>

<!-- Mac OS X Finder style for jQuery UI smoothness theme (OPTIONAL) -->
<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

<script type="text/javascript" charset="utf-8">
$().ready(function() {
	var elf = $('#elfinder').elfinder({
            lang: 'vi',             // language (OPTIONAL)
            url : '<?php echo base_url() ?>index.php/admin/filemanager/elfinder_init'  // connector URL (REQUIRED)
        }).elfinder('instance');            
});
</script>

<!-- Element where elFinder will be created (REQUIRED) -->

<div id="elfinder"></div>	
<style type="text/css">
.ui-widget-content,.elfinder-button,.elfinder-button-icon{
   -webkit-box-sizing: content-box !important;
    -moz-box-sizing: content-box !important;
    box-sizing: content-box !important;
}
</style>