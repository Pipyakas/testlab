<?php
function trim_text($input, $length, $ellipses = true, $strip_html = true)
{
	$input = word_limiter($input, $length);
	if ($strip_html) {
		$input = strip_tags(html_entity_decode(htmlspecialchars_decode($input), ENT_NOQUOTES, 'utf-8'));
	}
	if ($ellipses) {
		$trimmed_text .= '...';
	}
	return $input;
}

function show_vi_current_time()
{
	$str_in = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	$str_out = array("Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật");
	$time = gmdate("D, d/m/Y, H:i", time() + 7 * 3600);
	$time = str_replace($str_in, $str_out, $time);
	return $time;
}


function show_vi_time_from_my_sql($str_time_in)
{
	$datePost = new DateTime($str_time_in);
	$time = $datePost->format('D, d/m/Y, H:i');
	$str_in = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	$str_out = array("Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật");
	$time = str_replace($str_in, $str_out, $time);
	return $time;
}

function show_format_vi_date_time($str_time)
{
	return date('d-m-Y H:i:s', strtotime($str_time));
}

function rename_upload_file($file_name)
{
	return md5(time() . rand(0, 100000)) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
}

function encrypt_pwd($pwd)
{
	return md5(md5(md5($pwd)));
}

function get_facebook_avt($fbId, $width, $height)
{
	return "http://graph.facebook.com/" . $fbId . "/picture?width=" . $width
		. "&height=" . $height;
}

function create_dir_upload($parent_link)
{
	$date_string = date("Y-n-j");
	$year_string = date("Y");
	$dir = $parent_link . date("W", strtotime($date_string)) . '_' . $year_string;
	if (!is_dir($dir)) {
		mkdir($dir, 0777);
	}
	return $dir;
}

function create_thumb_dir_upload($parent_link)
{
	$date_string = date("Y-n-j");
	$year_string = date("Y");
	$dir = $parent_link;
	if (!is_dir($dir)) {
		mkdir($dir, 0777);
	}
	return $dir;
}

function delete_dir($dir)
{
	if (!file_exists($dir)) return true;
	if (!is_dir($dir) || is_link($dir)) return unlink($dir);
	foreach (scandir($dir) as $item) {
		if ($item == '.' || $item == '..') continue;
		if (!delete_dir($dir . "/" . $item)) {
			chmod($dir . "/" . $item, 0777);
			if (!delete_dir($dir . "/" . $item)) return false;
		};
	}
	return true;
}

function check_empty_dir($dir)
{
	$files = array();
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	return (count($files) > 0) ? FALSE : TRUE;
}

function check_exist_dir($dir)
{
	if (file_exists($dir) && is_dir($dir)) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function ban_word($str)
{
	$ban_word =  BAN_WORD; 
	if ($ban_word != NULL) {
		$word = explode(",", $ban_word);
		foreach ($word as $key => $value) {
			$str = preg_replace('/' . $value . '/i', "***", $str);
		}
	}
	return $str;
}

function get_current_url()
{
	$CI = &get_instance();

	$url = $CI->config->site_url($CI->uri->uri_string());
	return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
}

function object_2_array($d)
{
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
		return array_map(__FUNCTION__, $d);
	} else {
		// Return array
		return $d;
	}
}

function array_2_object($d)
{
	if (is_array($d)) {
		/*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
		return (object) array_map(__FUNCTION__, $d);
	} else {
		// Return object
		return $d;
	}
}

function get_basename($filename)
{
	return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}

function get_theme_folder()
{
	$CI = &get_instance();
	$CI->config->load('template');
	return APPPATH . 'themes/' . $CI->config->item('theme') . '/views/';
}


function get_new_link($word)
{
	$ttk = array('a' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă'), 'e' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê'), 'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'), 'o' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ'), 'u' => array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư'), 'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'), 'd' => array('đ', 'Đ'),);
	foreach ($ttk as $key => $arr) {
		foreach ($arr as $val) {
			$word = str_replace($val, $key, $word);
		}
	}
	$word = rtrim($word);
	$word = ltrim($word);
	$word = preg_replace('/[^a-zA-Z0-9\s]/', '', $word);
	$new_word = str_replace(' ', '-', strtolower($word));
	return $new_word;
};
