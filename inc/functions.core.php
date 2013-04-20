<?

class core {

	public static function mysqlSafe($v) {
		$v = core::formatFromdb($v);
		$v = core::process($v);
		return str_replace("'","''",$v);
	}
	public static function plainText($text) {
		$replace = array(

		//hellipse
		'&hellip;' => '...',
		'&#8230;' => '...',

		//single quote
		'&rsquo;' => "'",
		'&lsquo;' => "'",
		'&#8216;' => "'",
		'&#8217;' => "'",

		//double quote
		'&quot;' => '"',
		'&rdquo;' => '"',
		'&ldquo;' => '"',
		'&#8220;' => '"',
		'&#8221;' => '"',

		//dash;
		'&mdash;' => '-',
		'&ndash;' => '-',
		'&#8211;' => "-",
		'&#8212;' => "-",

		//other
		'&#8482;' => '(tm)',
		'&trade;' => '(tm)',
		'&#176;' => ' degrees ',
		'	' => '',
		'   ' => ' ',
		'  ' => ' ',
		'&amp;' => '&',

		);
		foreach($replace as $k => $v) {
			$text = str_replace("$k","$v",$text);
		}
		return $text;
	}
	public static function process($text) {
		$text = preg_replace('/([\xc0-\xdf].)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 192) * 64 + (ord(substr('$1', 1, 1)) - 128)) . ';'", $text);
		$text = preg_replace('/([\xe0-\xef]..)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 224) * 4096 + (ord(substr('$1', 1, 1)) - 128) * 64 + (ord(substr('$1', 2, 1)) - 128)) . ';'", $text);
		return $text;
	}
	public static function clean($text) {
		$text = core::process($text);
		$text = html_entity_decode($text);
		$text = core::plainText($text);
		return $text;
	}
	public static function htmlToTextarea($text) {
		$replace = array(
			' </p>'	=>	'</p>',
			' </li>'	=>	'</li>',
			'	'	=>	'',
			'&'	=>	'&amp;',
			'<'	=>	'&lt;',
			'>'	=>	'&gt;',
		);
		foreach($replace as $k => $v) {
			$text = str_replace("$k","$v",$text);
		}
		return $text;
	}
	public static function formatFromdb($txt) {
		$replace = array('_xxxx' => '&',
						 '_qqqq' => '?',
						 '_pppp' => '+',
						 '_qpqpqp' => '"',
					);
		foreach($replace as $k => $v) {
			$txt = str_replace($k,$v,$txt);
		}
		return $txt;
	}
	public static function formatDate($timestamp,$template='l, F j, Y g:ia') {
		return date($template,$timestamp);
	}
	public static function safeMail($email,$linkTxt=false,$subject=false) {
		$e = explode('@',$email);
		$user = core::toOrd($e[0]);
		$d = explode('.',$e[1]);
		$domain = core::toOrd($d[0]);
		$ext = core::toOrd($d[1]);
		if(!$linkTxt)
			$linkTxt = "$user'+'@'+'$domain'+'.'+'$ext";
		$id = 'mail'.md5(rand(1,999999)*time());
		return "<span id=\"$id\">$user [at] $domain [dot] $ext</span><script language=\"javascript\" type=\"text/javascript\">
//<![CDATA[
document.getElementById('$id').style.display='none';document.write('<a href=\"".core::toOrd('mai')."'+'".core::toOrd('lto').":$user'+'@'+'$domain'+'.'+'$ext".( $subject ? "?subject=".str_replace("'","\'",$subject) : '' )."\">'+'$linkTxt'+'</a>');
//]]>
</script>";
	}
	public static function toOrd($s) {
		$r = '';
		for ($i=0; $i<strlen($s); $i++) {
			$r .= '&#'.ord($s[$i]).';';
		}
		return $r;
	}
	public static function fetchURL( $url ) {
	   $url_parsed = parse_url($url);
	   $host = $url_parsed["host"];
	   $port = 80;
	   if ($port==0)
	       $port = 80;
	   $path = $url_parsed["path"];
	   if (@$url_parsed["query"] != "")
	       $path .= "?".$url_parsed["query"];
	   $out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
	   $fp = fsockopen($host, $port, $errno, $errstr, 30);
	   fwrite($fp, $out);
	   $body = false;
	   $in = '';
	   while (!feof($fp)) {
	       $s = fgets($fp, 1024);
	       if ( $body )
	           $in .= $s;
	       if ( $s == "\r\n" )
	           $body = true;
	   }
	   fclose($fp);
	   return $in;
	}
	public static function postToURL($url,$data,$headersArray=array('Content-type: application/x-www-form-urlencoded;charset=UTF-8')) {
		if(is_array($data))
			$data = http_build_query($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headersArray);
		curl_setopt($ch, CURLOPT_USERAGENT, @$_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$return = curl_exec($ch);
		curl_close($ch);
		return $return;
	}
	public static function truncate($string, $max = 50, $rep = '...') {
		if(strlen($string)>$max) {
			$leave = $max - strlen ($rep);
			$string = substr_replace($string, $rep, $leave);
		}
		return $string;
	}
	public static function truncatePs($text,$p=2) {
		$seperator = '';
		$seperators = array(
			'</p>
<p',
			'</p>
<h2>',
			'</p>

<h2>',
			'</p>

<p',
			'</p><p',
			"</p>\r\n<p",
			"</p>\n<p",
			'<br /><br />'
		);
		foreach ($seperators as $v) {
			if(strpos($text,$v)) {
				$seperator = $v;
				continue;
			}
		}
		if($seperator=='') {
			$return = $text;
		} else {
			$ps = explode($seperator,$text);
			$return = '';
			for($i=0; $i<$p; $i++) {
				$return .= ( $i==0 ? '' : '<p>' ).$ps[$i].'</p>';
			}
			$ws = explode(' ',$ps[$i-1]);
			if(count($ws)<20 && isset($ps[$i]))
				$return .= '<p>'.$ps[$i].'</p>';
		}
		return $return;
	}
	public static function doTemplate($q,$template) {
		$r= new Repeater($q,$template);
		return $r->renderToString();
	}
	public static function urlTitle($title) {
		$title = core::xmlSafe($title);
		$title = str_replace("/","-",$title);
		$title = str_replace("%C2%AE","",$title);
		$title = str_replace("�","",$title);
		$title = str_replace("&reg;","",$title);
		$title = str_replace("&trade;","",$title);
		$title = str_replace("&rsquo;","",$title);
		$title = str_replace("&lsquo;","",$title);
		$title = str_replace("&rdquo;","",$title);
		$title = str_replace("&ldquo;","",$title);
		$title = str_replace("&mdash;","",$title);
		$title = str_replace("&ndash;","",$title);
		$title = str_replace("&trade;","",$title);
		$title = str_replace("(tm)","",$title);
		$title = str_replace("#","",$title);
		$title = str_replace("+","",$title);
		$title = str_replace("&amp;","&",$title);
		$title = str_replace(" ","-",$title);
		$title = str_replace("'","",$title);
		$title = str_replace('"',"",$title);
		$title = str_replace("&","and",$title);
		$title = str_replace("?","",$title);
		$title = str_replace(",","-",$title);
		$title = str_replace("!","",$title);
		$title = str_replace(":","-",$title);
		$title = str_replace(";","",$title);
		$title = str_replace(".","",$title);
		$title = str_replace("|","",$title);
		$title = str_replace("---","-",$title);
		$title = str_replace("--","-",$title);
		return $title;
	}
	public static function browserInfo() {
		$browserInfo = array(
			'ip' => @$_SERVER['REMOTE_ADDR'],
			'browser' => @$_SERVER['HTTP_USER_AGENT'],
			'referer' => @$_SERVER['HTTP_REFERER'],
			'timestamp' => mktime()
			);
		return $browserInfo;
	}
	public static function mailHTML($to,$subject,$htmlMessage,$fromAlias='') {
		$rand = md5(mktime().$to);
		$fromEmail = 'noreply@'.$_ENV['siteDomain'];
		$from = $fromAlias=='' ? $fromEmail : $fromAlias.' <'.$fromEmail.'>';
		$headers = 'Return-Path: '.$fromEmail.'
Reply-To: '.$fromEmail.'
From: '.$from.'
Mime-Version: 1.0
Content-Type: multipart/alternative; boundary="----='.$rand.'"';
		$message = '
------=_Part_'.$rand.'
Content-Type: text/plain; charset=iso-8859-1
Content-Transfer-Encoding: 7bit
'.strip_tags($htmlMessage).'
------='.$rand.'
Content-Type: text/html; charset=iso-8859-1
Content-Transfer-Encoding: 8bit



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>'.$subject.'</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
 '.$htmlMessage.'
</body>
</html>



------='.$rand.'--';

		 mail($to,$subject,$message,$headers,"-f $fromEmail");
		 //echo $message;
	}
	public static function mailToList($SqlorQuery,$subject,$htmlTemplate,$fromAlias) {
		$m = new Mailer($SqlorQuery,$subject,$htmlTemplate,$fromAlias);
		$log = $m->mail();
		core::mailHTML($_ENV['logEmail'],'Batch Mailing Job '.date("D, j-M-Y H:i"),$log,'System Batch Mailer');
	}
	public static function exportCSV($sql,$filename='export.csv') {
		$q = mysql_query($sql);
		$out = '';
		$columns = mysql_num_fields($q);
		for($i=0; $i<$columns; $i++) {
			$l = mysql_field_name($q,$i);
			$out .= '"'.$l.'",';
		}
		$out .="\n";
		while ($l = mysql_fetch_array($q)) {
			for ($i=0; $i<$columns; $i++) {
				$out .='"'.$l[$i].'",';
			}
			$out .="\n";
		}
		header("Content-type: text/csv");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Length: " . strlen($out));
		echo $out;
	}
	public static function xmlSafe($txt) {
		$replace = array('&hellip;' => '...',
						 '&trade;' => '(tm)',
						 '&quot;' => '"',
						 '&rsquo;' => "'",
						 '&lsquo;' => "'",
						 '&rdquo;' => '"',
						 '&ldquo;' => '"',
						 '&mdash;' => '-',
						 '& ' => '&amp; '
					);
		foreach($replace as $k => $v) {
			$txt = str_replace($k,$v,$txt);
		}
		return $txt;
	}

}
