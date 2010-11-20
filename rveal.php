<?php
	/*
		
		RVeal - Reveal short URLs
		Copyright (c) 2010 Ruel Pagayon - http://ruel.me
		
		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
	*/
	
	if (isset($_POST['surl'])) {
		$surl = urldecode($_POST['surl']);
		if (is_url($surl)) {
			$ch = curl_init();
			curl_setopt($ch	, CURLOPT_URL, $surl);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$execute = curl_exec($ch);
			echo curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		} else {
			echo "Invalid URL";
		}
	}
	
	function is_url($url) {
		// Credits for this regular expression is from: http://stackoverflow.com/questions/206059/php-validation-regex-for-url
		if (preg_match("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", $url))
			return true;
		else
			return false;
	}
?>