<?php
class fungsi {

	function strip_tags_teks($text) {

	    /*return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);*/
	    return strip_tags($text, "<span><em><sub><b><img>");
	}

	function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		// variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Jan", "Feb", "Mar",
								"Apr", "Mei", "Jun",
								"Jul", "Agu", "Sep",
								"Okt", "Nov", "Des");

	    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
	    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
	    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
	    
	    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
	    return($result);
	}

	//fungsi menghapus spesial karakter
	function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	  return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	//fungsi tanggal indonesia ==============================================================================================
	function DateTimeToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
		// variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
								"April", "Mei", "Juni",
								"Juli", "Agustus", "September",
								"Oktober", "November", "Desember");
	  
	    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
	    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
	    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
	    $jam   = substr($date, 10, 9); // memisahkan format tanggal menggunakan substring
	    
	    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun . " / " . $jam;
	    return($result);
	}

	function status($s) {
	  if($s==1) {
	    $a = "Active";
	  } else {
	    $a = "Not Active";
	  }

	  return $a;
	}

	function cekhari($CheckIn,$CheckOut){
		$CheckInX = explode("-", $CheckIn);
		$CheckOutX =  explode("-", $CheckOut);
		$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
		$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
		$interval =($date2 - $date1)/(3600*24);
		// returns numberofdays
		return  $interval+1 ;
	}
		
}
?>