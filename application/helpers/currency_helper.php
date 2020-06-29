<?php
function format_money( $number, $dec_point = ".", $thousands_sep = ",")
{
	$data = preg_replace( "/\\" . $dec_point . "00$/", "", number_format($number, 2, $dec_point, $thousands_sep));
	$CI =& get_instance();
	$CI->load->helper('settings');
	$settings=getSettings(CURRENCY_SETTING_FILE);
	if($settings['position']==CURRENCY_SYMBOL_BEFORE){
		$data=$settings['currency_symbol'].' '.$data;
	}else{
		$data=$data.' '.$settings['currency_symbol'];
	}
	return $data;
}

function format_vnd($number){
	if($number<1000000){
		echo format_money( $number, $dec_point = ".", $thousands_sep = ",");
	}

	if($number>=1000000 && $number<1000000000){
		echo str_replace('.',',',($number/1000000)).' triệu';
	}

	if($number>=1000000000){
		echo str_replace('.', ',', ($number/1000000000)).' tỷ';
	}
}
