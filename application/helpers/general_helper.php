<?php
if(!function_exists('sluget_random_stringgify'))
{
	function get_random_string($valid_chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", $length=2)
	{
		// start with an empty random string
		$random_string = "";

		// count the number of chars in the valid chars string so we know how many choices we have
		$num_valid_chars = strlen($valid_chars);

		// repeat the steps until we've created a string of the right length
		for ($i = 0; $i < $length; $i++)
		{
			// pick a random number from 1 up to the number of valid chars
			$random_pick = mt_rand(1, $num_valid_chars);

			// take the random character out of the string of valid chars
			// subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
			$random_char = $valid_chars[$random_pick-1];

			// add the randomly-chosen char onto the end of our string so far
			$random_string .= $random_char;
		}

		// return our finished random string
		return $random_string;
	}
}
if(!function_exists('slugify'))
{
	function slugify( $str,$delimiter = "dash", $dash_too=FALSE ) {
		$str = trim( $str );
		$str = htmlentities( $str, ENT_NOQUOTES, config_item('charset') );
		$str = ( $dash_too ? str_replace("-","_",$str) : $str );
		$str = preg_replace( '/&([a-zA-Z])(uml|acute|elig|grave|circ|tilde|cedil|ring|quest|slash|caron);/', '$1', $str );
		$str = html_entity_decode( $str );

		return url_title( $str, $delimiter, TRUE );
	}
}

if(!function_exists('csvWrite'))
{
	function csvWrite($csvWritePath,$csvWriteValues,$csvWriteMode='add') {
		if($csvWriteMode == 'write') {
			$csvWriteFileHandler = 'w';
		}
		else if($csvWriteMode == 'add') {
			$csvWriteFileHandler = 'a';
		}
		$fileHandler = fopen($csvWritePath,$csvWriteFileHandler) or die("Invalid Permissions");
		fwrite($fileHandler, $csvWriteValues);
		fclose($fileHandler);

		return $csvWritePath;
	}
}
if(!function_exists('money_formatting'))
{
	function money_formatting( $moneyNumber,$matauang='IDR' )
	{
		$moneyFormatResult = $matauang.' '.number_format((int)$moneyNumber,0,',','.');
		return $moneyFormatResult;
	}
}

if(!function_exists('notify_message'))
{
	function notify_message( $success_msg="",$error_message="",$info_message="" )
	{
		$result ="";
		if( $success_msg )
			$result =  '<div class="alert alert-success">
					        <button data-dismiss="alert" type="button" class="close"><span aria-hidden="true">×</span>
					        </button>
					        <p class="text-small"><strong>Success!</strong> '.$success_msg.'</p>
					    </div>';
		if( $error_message )
			$result =  '<div class="alert alert-danger">
                            <button data-dismiss="alert" type="button" class="close"><span aria-hidden="true">×</span>
                            </button>
                            <p class="text-small"><strong>Error!</strong> '.$error_message.'</p>
                        </div>';
		if( $info_message )
			$result =  '<div class="alert alert-info">
                            <button data-dismiss="alert" type="button" class="close"><span aria-hidden="true">×</span>
                            </button>
                            <p class="text-small"><strong>Info!</strong> '.$info_message.'</p>
                        </div>';
		return $result;
	}
}

if(!function_exists('get_extension'))
{
	function get_extension( $filename )
	{
		$extension	= substr( $filename, strpos($filename, '.') + 1 );
		return $extension;
	}
}
if(!function_exists('array_to_object'))
{
	 function array_to_object($array) {
	  $obj = new stdClass;
	  foreach($array as $k => $v) {
		 if(strlen($k)) {
			if(is_array($v)) {
			   $obj->{$k} = array_to_object($v); //RECURSION
			} else {
			   $obj->{$k} = $v;
			}
		 }
	  }
	  return $obj;
	}
}

if(! function_exists("generate_random_string")){
	function generate_random_string($length = 10) {
	    $uniq_char = mt_rand();
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$uniq_char;
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	} 
}

if(! function_exists("selisih_tanggal")){
	function selisih_tanggal($start_date,$end_date) {
	  // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
		// dari tanggal pertama
		$selisih = 0; 
		$pecah1 = explode("-", $start_date);
		$date1 = $pecah1[2];
		$month1 = $pecah1[1];
		$year1 = $pecah1[0];
		 
		// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
		// dari tanggal kedua
		 
		$pecah2 = explode("-", $end_date);
		$date2 = $pecah2[2];
		$month2 = $pecah2[1];
		$year2 =  $pecah2[0];
		 
		// menghitung JDN dari masing-masing tanggal
		 
		$jd1 = GregorianToJD($month1, $date1, $year1);
		$jd2 = GregorianToJD($month2, $date2, $year2);
		 
		// hitung selisih hari kedua tanggal
		 
		$selisih = $jd2 - $jd1;
	  return $selisih;
	} 
}

if(! function_exists("convert_date")){
	function convert_date($act = 1, $param = FALSE) {   
		if ($act == 1) {
			return date("Y-m-d H:i:s");
		} else if ($act == 2) {
			return date("Y-m-d");
		} else if ($act == 3) {
			return date("d F Y H:i", strtotime($param));
		} else if ($act == 4) {
			return date("d F Y", strtotime($param));
		} else if ($act == 5) {
			return date("Y/m/d");
		} else if ($act == 6) {
			return date("d/m/Y H:i");
		} else if ($act == 7) {
			$paramex = explode("/", substr($param, 0, 10));
			$jam = substr($param, 11, 6);
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]} {$jam}";
		} else if ($act == 8) {
			return date("d M Y");
		} else if ($act == 9) {
			return date("Ymd");
		} else if ($act == 10) {
			$paramex = explode("/", substr($param, 0, 10));
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]}";
		} else if ($act == 11) {
			$paramex = explode("-", substr($param, 0, 10));
			return "{$paramex[2]}-{$paramex[1]}-{$paramex[0]}";
		} else if ($act == 12) {
			return date("d F Y H:i:s", strtotime($param));
		} else if ($act == 13) {
			return date("d F Y", strtotime($param));
		} else if ($act == 14) {
			return date("H:i", strtotime($param));
		} else if ($act == 15) { 
			return date("d", strtotime($param));
		} else if ($act == 16) {
			return date("m", strtotime($param));
		} else if ($act == 17) {
			return date("Y", strtotime($param));
		} else if ($act == 18) {
			return date("Y-m-d H:i:s", strtotime($param));
		} else if ($act == 19) {
			return date("Y-m-d", strtotime($param));
		} else if ($act == 20) {
			return date("Y-m-d H:i", strtotime($param));
		} else if ($act == 21) {
			return date("d F Y H:i", strtotime($param));
		} else if ($act == 22) {
			return date("d M Y H:i:s", strtotime($param));
		} else if ($act == 23) {
			$paramex = strtotime($param);
			/* script menentukan hari */  
		 	$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		 	$hr = $array_hr[date('N', $paramex)];

			/* script menentukan tanggal */    
			$tgl= date('j',$paramex);

			/* script menentukan bulan */ 
		  	$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
		  	$bln = $array_bln[date('n',$paramex)];

			/* script menentukan tahun */ 
			$thn = date('Y',$paramex);

			/* script menentukan jam dan menit */ 
			$jammnt = date('H:i',$paramex);
			
			/* script perintah keluaran*/ 
 			$set_date = $hr . ", " . $tgl . " " . $bln . " " . $thn . " | " . $jammnt ." WIB";
			return $set_date;
		} else if ($act == 24) {
			$paramex = strtotime($param);
			/* script menentukan hari */  
		 	$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
		 	$hr = $array_hr[date('N', $paramex)];

			/* script menentukan tanggal */    
			$tgl= date('j',$paramex);

			/* script menentukan bulan */ 
		  	$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
		  	$bln = $array_bln[date('n',$paramex)];

			/* script menentukan tahun */ 
			$thn = date('Y',$paramex);

			/* script menentukan jam dan menit */ 
			$jammnt = date('H:i',$paramex);
			
			/* script perintah keluaran*/ 
 			$set_date = $hr . ", " . $tgl . " " . $bln . " " . $thn;
			return $set_date;
		}
	}
}

if(!function_exists('get_general_lib'))
{
	function get_general_lib(){
		$ci =& get_instance();
		$ci->load->library('general');
		return $ci->general;
	}
}

if(!function_exists('get_seo'))
{
	function get_seo($segment = NULL){
		$seo = get_general_lib()->get_seo($segment);
		$script = '';
		if ($seo && $seo <> NULL):
			if ($seo['SeoMetaDesc'] <> ''):
				$script .= '<meta name="description" content="'.$seo['SeoMetaDesc'].'">';
			endif;
			if ($seo['SeoMetaKeywords'] <> ''):
				$script .= '<meta name="keywords" content="'.$seo['SeoMetaKeywords'].'">';
			endif;
			
			$title = '';
			$description = '';
			$image = '';

			if ($seo['SeoTitle'] <> ''):
				$title = $seo['SeoTitle'];
			endif;

			if ($seo['SeoDesc'] <> ''):
				$description = $seo['SeoDesc'];
			endif;

			if ($seo['SeoImage'] <> ''):
				$image = $seo['SeoImage'];
			endif;

			if ($title <> '' && $description <> '' && $image <> ''):
				$script .= '<!-- S:fb meta -->
<meta property="og:type" content="article" />
<meta property="og:image" content="'.$image.'" />
<meta property="og:title" content="'.$title.'" />
<meta property="og:url" content="'.base_url().$segment.'" />
<meta property="og:site_name" content="Virtus Indonesia" />
<meta property="og:description" content="'.$description.'" />
<!-- e:fb meta -->
<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@virtusID" />
<meta name="twitter:creator" content="@virtusID">
<meta name="twitter:title" content="'.$title.'" />
<meta name="twitter:description" content="'.$description.'" />
<meta name="twitter:image" content="'.$image.'" />';		
			endif;
			return $script;
		else:
			return $script;
		endif;
	}
}

if(!function_exists('get_rpopup'))
{
	function get_rpopup(){
		$rpopup = get_general_lib()->get_rpopup();
		return $rpopup;
	}
}

if(!function_exists('get_top_banner'))
{
	function get_top_banner(){
		$topbanner = get_general_lib()->get_top_banner();
		return $topbanner;
	}
}