<?php

const class_version = "1.1.0";

// Warna teks
const n = "\n";          // Baris baru
const d = "\033[0m";     // Reset
const m = "\033[1;31m";  // Merah
const h = "\033[1;32m";  // Hijau
const k = "\033[1;33m";  // Kuning
const b = "\033[1;34m";  // Biru
const u = "\033[1;35m";  // Ungu
const c = "\033[1;36m";  // Cyan
const p = "\033[1;37m";  // Putih
const o = "\033[38;5;214m"; // Warna mendekati orange
const o2 = "\033[01;38;5;208m"; // Warna mendekati orange

// Warna teks tambahan
const r = "\033[38;5;196m";   // Merah terang
const g = "\033[38;5;46m";    // Hijau terang
const y = "\033[38;5;226m";   // Kuning terang
const b1 = "\033[38;5;21m";   // Biru terang
const p1 = "\033[38;5;13m";   // Ungu terang
const c1 = "\033[38;5;51m";   // Cyan terang
const gr = "\033[38;5;240m";  // Abu-abu gelap

// Warna latar belakang
const mp = "\033[101m\033[1;37m";  // Latar belakang merah
const hp = "\033[102m\033[1;30m";  // Latar belakang hijau
const kp = "\033[103m\033[1;37m";  // Latar belakang kuning
const bp = "\033[104m\033[1;37m";  // Latar belakang biru
const up = "\033[105m\033[1;37m";  // Latar belakang ungu
const cp = "\033[106m\033[1;37m";  // Latar belakang cyan
const pm = "\033[107m\033[1;31m";  // Latar belakang putih (merah teks)
const ph = "\033[107m\033[1;32m";  // Latar belakang putih (hijau teks)
const pk = "\033[107m\033[1;33m";  // Latar belakang putih (kuning teks)
const pb = "\033[107m\033[1;34m";  // Latar belakang putih (biru teks)
const pu = "\033[107m\033[1;35m";  // Latar belakang putih (ungu teks)
const pc = "\033[107m\033[1;36m";  // Latar belakang putih (cyan teks)
const yh = d."\033[43;30m"; // Latar belakang kuning (black teks)

// Warna latar belakang tambahan
const bg_r = "\033[48;5;196m";   // Latar belakang merah terang
const bg_g = "\033[48;5;46m";    // Latar belakang hijau terang
const bg_y = "\033[48;5;226m";   // Latar belakang kuning terang
const bg_b1 = "\033[48;5;21m";   // Latar belakang biru terang
const bg_p1 = "\033[48;5;13m";   // Latar belakang ungu terang
const bg_c1 = "\033[48;5;51m";   // Latar belakang cyan terang
const bg_gr = "\033[48;5;240m";  // Latar belakang abu-abu gelap

const LIST_YOUTUBE = [
	"https://youtube.com/@samuelfct",
	"https://youtube.com/@samuelfct"
];

Class Requests {
	static function Curl($url, $head=0, $post=0, $data_post=0, $cookie=0, $proxy=0, $skip=0){while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($cookie){curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie);curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie);}if($post) {curl_setopt($ch, CURLOPT_POST, true);}if($data_post) {curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);}if($head) {curl_setopt($ch, CURLOPT_HTTPHEADER, $head);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);if($skip){return;}$c = curl_getinfo($ch);if(!$c) return "Curl Error : ".curl_error($ch); else{$head = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$body){print "Check your Connection!";sleep(2);print "\r                         \r";continue;}return array($head,$body);}}}
	static function get($url, $head =0){return self::curl($url,$head);}
	static function post($url, $head=0, $data_post=0){return self::curl($url,$head, 1, $data_post);}
	static function getXskip($url, $head =0){return self::curl($url,$head,'','','','',1);}
	static function postXskip($url, $head=0, $data_post=0){return self::curl($url,$head, 1, $data_post,'','',1);}
	static function getXcookie($url, $head=0, $cookie=0){if(!$cookie){$cookie ="cookie.txt";}return self::curl($url,$head,'','',$cookie);}
	static function postXcookie($url, $head=0, $data_post=0, $cookie=0){if(!$cookie){$cookie ="cookie.txt";}return self::curl($url,$head,1,$data_post,$cookie);}
	static function getXproxy($url, $head=0, $proxy){return self::curl($url,$head,'','',1,$proxy);}
	static function postXproxy($url, $head=0, $data_post, $proxy){return self::curl($url,$head,1,$data_post,1,$proxy);}
}

class Display {
	static function Clear(){if( PHP_OS_FAMILY == "Linux" ){system('clear');}else{pclose(popen('cls','w'));}} 
	static function Menu($no, $title){print h."---> [".p."$no".h."] ".k."$title\n";}
	static function Cetak($label, $msg = "[No Content]"){$len = 9;$lenstr = $len-strlen($label);print h."[".p.$label.h.str_repeat(" ",$lenstr)."]─> ".p.$msg.n;}
	static function Title($activitas){print bp.str_pad(strtoupper($activitas),44, " ", STR_PAD_BOTH).d.n;}
	static function Line($len = 44){print c.str_repeat('─',$len).n;}
	static function Ban($title, $versi, $server = 0){
		$api = self::ipApi();
		self::Clear();
		if($api){
			date_default_timezone_set($api->timezone);
			print str_pad($api->city.', '.$api->regionName.', '.$api->country, 44, " ", STR_PAD_BOTH).n;
		}
				print mp.'      '.date("l").'           '.date("d/M/Y").'         '.date("H:i").' '.d."\n";
		print b.str_repeat("=", 55).d.n;
		print m."███████╗ █████╗ ███╗   ███╗██╗   ██╗███████╗██╗     \n";
		print m."██╔════╝██╔══██╗████╗ ████║██║   ██║██╔════╝██║     \n";
		print m."███████╗███████║██╔████╔██║██║   ██║█████╗  ██║     \n";
		print p."╚════██║██╔══██║██║╚██╔╝██║██║   ██║██╔══╝  ██║     \n";
		print p."███████║██║  ██║██║ ╚═╝ ██║╚██████╔╝███████╗███████╗\n";
		print p."╚══════╝╚═╝  ╚═╝╚═╝     ╚═╝ ╚═════╝ ╚══════╝╚══════╝\n";
		print b."           ユーチューブ ; \033[1;33m@samuelfct\n";
		print m."           クリエーター : \033[1;35mSamuel\n";
		print b.str_repeat("=", 55).d.n;
		print mp.str_pad("PLEASE READ FIRST", 55, " ", STR_PAD_BOTH).d.n.n;
		print k."---> THIS SCRIPT IS NOT 100% MADE BY ME\n"; 
		print k."---> UNDERSTAND THE RISKS IF YOU WANT TO USE SCRIPTS\n";
		print k."---> IF YOU EXPERIENCE PROBLEMS WITH YOUR ACCOUNT. IT'S NOT MY RESPONSIBILITY\n";
		print k."---> USE = UNDERSTAND\n";
        print b.str_repeat(b."=", 18).p." ❝ ".m."のスクリプト".p." ❞ ".str_repeat(b."=", 19).n;
        print c."---> @Iewil, @Zhy_08\n";
        print b.str_repeat(b."=", 18).p." ❝ ".m."のスクリプト".p." ❞ ".str_repeat(b."=", 19).n;
		if($server){
			$cekServer = Functions::Server(title);
			if($cekServer['data']['status'] != "online"){
				self::Line();
				print Display::Error("Status Script is offline\n");
				exit;
			}
		}
	}
	static function ipApi(){
		$r = json_decode(file_get_contents("http://ip-api.com/json"));
		if($r->status == "success")return $r;
	}
	static function Error($except){return m."---> [".p."!".m."] ".p.$except;}
	static function Sukses($msg){return h."---> [".p."✓".h."] ".p.$msg.n;}
	static function Isi($msg){return m."╭[".p."Input ".$msg.m."]".n.m."╰> ".h;}
}

class Functions {
	static $configFile = "config.json";
	static function Tmr($tmr){date_default_timezone_set("UTC");$sym = [' 次のクレーム ',' 次のクレーム ',' 次のクレーム ',' 次のクレーム ',];$timr = time()+$tmr;$a = 0;while(true){$a +=1;$res=$timr-time();if($res < 1) {break;}print $sym[$a % 4].p.date('H',$res).":".p.date('i',$res).":".p.date('s',$res)."\r";usleep(100000);}print "\r           \r";}
	static function Server($title){$url = "https://iewilbot.my.id/List/server.php";$param = "title=".$title;$r = file_get_contents($url."?".$param);return json_decode($r,1);}
	static function setConfig($key){if(!file_exists(self::$configFile)){$config = [];}else{$config = json_decode(file_get_contents(self::$configFile),1);}if(isset($config[$key])){return $config[$key];}else{print Display::isi($key);$data = readline();print n;$config[$key] = $data;file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));return $data;}}
	static function removeConfig($key){$config = json_decode(file_get_contents(self::$configFile),1);unset($config[$key]);file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}
	static function view($youtube){$tanggal = date("dmy");$config = json_decode(file_get_contents(self::$configFile),1);$view = $config['view'];if($tanggal == $view){return 0;}else{$config['view'] = $tanggal;if( PHP_OS_FAMILY == "Linux" ){system("termux-open-url ".$youtube);}else{system("start ".$youtube);}file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}}
	static function HiddenConfig($key, $data){if(!file_exists(self::$configFile)){$config = [];}else{$config = json_decode(file_get_contents(self::$configFile),1);}if(!$config[$key]){$config[$key] = $data;file_put_contents(self::$configFile,json_encode($config,JSON_PRETTY_PRINT));}return $config[$key];}
	static function temporary($newdata,$data=0){if(!$data){$data = [];}return array_merge($data,$newdata);}
	static function cfDecodeEmail($encodedString){$k = hexdec(substr($encodedString,0,2));for($i=2,$email='';$i<strlen($encodedString)-1;$i+=2){$email.=chr(hexdec(substr($encodedString,$i,2))^$k);}return $email;}
	static function getConfig($key){if(!file_exists(self::$configFile)){$config = [];}else{$config = json_decode(file_get_contents(self::$configFile),1);}return $config[$key];}
}

class HtmlScrap {
	function __construct(){
		$this->captcha = '/class=["\']([^"\']+)["\'][^>]*data-sitekey=["\']([^"\']+)["\'][^>]*>/i';
		$this->input = '/<input[^>]*name=["\'](.*?)["\'][^>]*value=["\'](.*?)["\'][^>]*>/i';
		$this->limit = '/(\d{1,})\/(\d{1,})/';
	}
	private function scrap($pattern, $html){preg_match_all($pattern, $html, $matches);return $matches;}
	private function getCaptcha($html){$scrap = $this->scrap($this->captcha, $html);for($i = 0; $i < count($scrap[1]); $i++){$data[$scrap[1][$i]] = $scrap[2][$i];}return $data;}
	private function getInput($html, $form = 1){$form = explode('<form', $html)[$form];$scrap = $this->scrap($this->input, $form);for($i = 0; $i < count($scrap[1]); $i++){$data[$scrap[1][$i]] = $scrap[2][$i];}return $data;}
	public function Result($html, $form = 1)
	{
		$data['title'] = explode('</title>',explode('<title>', $html)[1])[0];
		$data['cloudflare']=(preg_match('/Just a moment.../',$html))? true:false;
		$data['firewall'] =(preg_match('/Firewall/',$html))? true:false;
		$data['locked'] = (preg_match('/Locked/',$html))? true:false;
		$data["captcha"] = $this->getCaptcha($html);
		
		$input = $this->getInput($html, $form);
		$data["input"] = ($input)? $input:$this->getInput($html, 2);
		$data["faucet"] = $this->scrap($this->limit, $html);
		
		$sukses = explode("icon: 'success',",$html)[1];
		if($sukses){
			$data["response"]["success"] = strip_tags(explode("'",explode("html: '",$sukses)[1])[0]);
		}else{
			$warning = explode("'",explode("html: '",$html)[1])[0];
			$ban = explode('</div>',explode('<div class="alert text-center alert-danger"><i class="fas fa-exclamation-circle"></i> Your account',$html)[1])[0];
			$invalid = (preg_match('/invalid amount/',$html))? "You are sending an invalid amount":false;
			$shortlink = (preg_match('/Shortlink in order to claim from the faucet!/',$html))? $warning:false;
			$sufficient = (preg_match('/sufficient funds/',$html))? "Sufficient funds":false;
			$daily = (preg_match('/Daily claim limit/',$html))? "Daily claim limit":false;
			$data["response"]["unset"] = false;
			$data["response"]["exit"] = false;
			if($ban){
				$data["response"]["warning"] = $ban;
				$data["response"]["exit"] = true;
			}elseif($invalid){
				$data["response"]["warning"] = $invalid;
				$data["response"]["unset"] = true;
			}elseif($shortlink){
				$data["response"]["warning"] = $shortlink;
				$data["response"]["exit"] = true;
			}elseif($sufficient){
				$data["response"]["warning"] = $sufficient;
				$data["response"]["unset"] = true;
			}elseif($warning){
				$data["response"]["warning"] = $warning;
			}else{
				$data["response"]["warning"] = "Not Found";
			}
		}
		return $data;
	}
}

class Captcha {
	private $url,$key,$provider, $function;
	public function __construct(){
		if(empty(Functions::getConfig('type'))){
			print o."Select Apikey\n";
			Display::Menu(1, "Multibot");
			Display::Menu(2, "Xevil");
            print o."Please input number only\n";
            Functions::setConfig("type");
			Display::Line();
		}
		if(Functions::getConfig("type") == 1){
            $this->url = 'http://api.multibot.in/';
			Display::Cetak("Register","http://api.multibot.in");
			$this->key = Functions::setConfig("multibot_apikey");
			$this->provider = Functions::HiddenConfig("provider", "Multibot");
        }
        else{
            $this->url = 'https://sctg.xyz/';
			Display::Cetak("Register","t.me/Xevil_check_bot?start=1204538927");
			$this->key = Functions::setConfig("xevil_apikey")."|SOFTID1204538927";
			$this->provider = Functions::HiddenConfig("provider", "Xevil");
        }
	}
	private function in_api($content, $method, $header = 0){$param = "key=".$this->key."&json=1&".$content;if($method == "GET")return json_decode(file_get_contents($this->url.'in.php?'.$param),1);$opts['http']['method'] = $method;if($header) $opts['http']['header'] = $header;$opts['http']['content'] = $param;return file_get_contents($this->url.'in.php', false, stream_context_create($opts));}
	private function res_api($api_id){$params = "?key=".$this->key."&action=get&id=".$api_id."&json=1";return json_decode(file_get_contents($this->url."res.php".$params),1);}
	private function solvingProgress($xr,$tmr, $cap){if($xr < 50){$wr=h;}elseif($xr >= 50 && $xr < 80){$wr=k;}else{$wr=m;}$xwr = [$wr,p,$wr,p];$sym = [' ─ ',' / ',' │ ',' \ ',];$a = 0;for($i=$tmr*4;$i>0;$i--){print $xwr[$a % 4]." Bypass $cap $xr%".$sym[$a % 4]." \r";usleep(100000);if($xr < 99)$xr+=1;$a++;}return $xr;}
	private function getResult($data ,$method, $header = 0){$cap = $this->filter(explode('&',explode("method=",$data)[1])[0]);$get_res = $this->in_api($data ,$method, $header);if(is_array($get_res)){$get_in = $get_res;}else{$get_in = json_decode($get_res,1);}if(!$get_in["status"]){$msg = $get_in["request"];if($msg){print Display::Error("in_api @".$this->provider." ".$msg.n);}elseif($get_res){print Display::Error($get_res.n);}else{print Display::Error("in_api @".$this->provider." something wrong\n");}return 0;}$a = 0;while(true){echo " Bypass $cap $a% |   \r";$get_res = $this->res_api($get_in["request"]);if($get_res["request"] == "CAPCHA_NOT_READY"){$ran = rand(5,10);$a+=$ran;if($a>99)$a=99;echo " Bypass $cap $a% ─ \r";$a = $this->solvingProgress($a,5, $cap);continue;}if($get_res["status"]){echo " Bypass $cap 100%";sleep(1);print "\r                              \r";print h."[".p."√".h."] Bypass $cap success";sleep(2);print "\r                              \r";return $get_res["request"];}print m."[".p."!".m."] Bypass $cap failed";sleep(2);print "\r                              \r";print Display::Error($cap." @".$this->provider." Error\n");return 0;}}
	private function filter($method){if($method == "userrecaptcha")return "RecaptchaV2";if($method == "hcaptcha")return "Hcaptcha";if($method == "turnstile")return "Turnstile";if($method == "universal" || $method == "base64")return "Ocr";if($method == "antibot")return "Antibot";if($method == "authkong")return "Authkong";if($method == "teaserfast")return "Teaserfast";}
	
	public function getBalance(){$res =  json_decode(file_get_contents($this->url."res.php?action=userinfo&key=".$this->key),1);return $res["balance"];}
	public function RecaptchaV2($sitekey, $pageurl){$data = http_build_query(["method" => "userrecaptcha","sitekey" => $sitekey,"pageurl" => $pageurl]);return $this->getResult($data, "GET");}
	public function Hcaptcha($sitekey, $pageurl ){$data = http_build_query(["method" => "hcaptcha","sitekey" => $sitekey,"pageurl" => $pageurl]);return $this->getResult($data, "GET");}
	public function Turnstile($sitekey, $pageurl){$data = http_build_query(["method" => "turnstile","sitekey" => $sitekey,"pageurl" => $pageurl]);return $this->getResult($data, "GET");}
	public function Authkong($sitekey, $pageurl){$data = http_build_query(["method" => "authkong","sitekey" => $sitekey,"pageurl" => $pageurl]);return $this->getResult($data, "GET");}
	public function Ocr($img){if($this->provider == "Xevil"){$data = "method=base64&body=".$img;}else{$data = http_build_query(["method" => "universal","body" => $img]);}return $this->getResult($data, "POST");}
	public function AntiBot($source){$main = explode('"',explode('data:image/png;base64,',explode('Bot links',$source)[1])[1])[0];if(!$main)return 0;if($this->provider == "Xevil"){$data = "method=antibot&main=$main";}else{$data["method"] = "antibot";$data["main"] = $main;}$src = explode('rel=\"',$source);foreach($src as $x => $sour){if($x == 0)continue;$no = explode('\"',$sour)[0];if($this->provider == "Xevil"){$img = explode('\"',explode('data:image/png;base64,',$sour)[1])[0];$data .= "&$no=$img";}else{$img = explode('\"',explode('src=\"',$sour)[1])[0];$data[$no] = $img;}}if($this->provider == "Xevil"){$res = $this->getResult($data, "POST");}else{$data = http_build_query($data);$ua = "Content-type: application/x-www-form-urlencoded";$res = $this->getResult($data, "POST", $ua);}if($res)return "+".str_replace(",","+",$res);return 0;}
	public function Teaserfast($main, $small){if($this->provider == "Multibot"){return ["error"=> true, "msg" => "not support key!"];}$data = http_build_query(["method" => "teaserfast","main_photo" => $main,"task" => $small]);$ua = "Content-type: application/x-www-form-urlencoded";return $this->getResult($data, "POST",$ua);}
}

class Iewil {
	
	protected $url;
	protected $apikey;
	
	function __construct($apikey){
		$this->url = "https://api-iewil.my.id/";
		$this->apikey = $apikey;
	}
	private function requests($postParameter){
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postParameter);
		$response = curl_exec($ch);
		if(!curl_errno($ch)) {
			switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
				case 200:  # OK
					break;
				default:
					return '{"status":0, "message":"iewilbot HTTP code "'.$http_code.'}';
			}
		}
		curl_close($ch);
		return $response;
	}
	private function getResult($postParameter){
		$r = json_decode($this->requests($postParameter),1);
		if($r && $r['status'])return $r['result'];
		//if($r["message"])print Display::Error($r["message"].n);
		//if(!$r)print Display::Error("captcha cannot be solve".n);
	}
	public function Turnstile( $sitekey, $pageurl){
		$postParameter = http_build_query([
			"pageurl"	=> $pageurl,
			"sitekey"	=> $sitekey,
			"method"	=> "turnstile",
			"apikey"	=> $this->apikey
		]);
		return $this->getResult($postParameter);
	}
	public function gp($src){
		$postParameter = http_build_query([
			"main"		=> base64_encode($src),
			"method"	=> "gp",
			"apikey"	=> $this->apikey
		]);
		return $this->getResult($postParameter);
	}
	
	public function altcha($signature, $salt, $challenge){
		$postParameter = http_build_query([
			"signature"	=> $signature,
			"salt"		=> $salt,
			"challenge"	=> $challenge,
			"method"	=> "altcha",
			"apikey"	=> $this->apikey
		]);
		return $this->getResult($postParameter);
	}
	
	public function Antibot($source){
		$data["apikey"] = $this->apikey;
		$data["method"] = "antibot";
		
		$main = explode('"',explode('src="',explode('Bot links',$source)[1])[1])[0];
		$data["main"] 	= $main;
		$src = explode('rel=\"',$source);
		foreach($src as $x => $sour){
			if($x == 0)continue;
			$no = explode('\"',$sour)[0];
			$img = explode('\"',explode('src=\"',$sour)[1])[0];
			$data[$no] = $img;
		}
		$postParameter = http_build_query($data);
		$res = $this->getResult($postParameter);
		if(isset($res["solution"])){
			$cap = $res["solution"];
			return "+".str_replace(",","+",$cap);
		}
	}
}
class FreeCaptcha {
	static function Icon($header){
		$data["apikey"] = "iewil";
		$data["methode"] = "icon";
		$head = array_merge($header, ["X-Requested-With: XMLHttpRequest"]);
		$getCap = json_decode(Requests::post(host.'system/libs/captcha/request.php',$head,"cID=0&rT=1&tM=light")[1],1);
		
		$head2 = array_merge($header, ["accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8"]);
		foreach($getCap as $c){
			$data[$c] = base64_encode(Requests::get(host.'system/libs/captcha/request.php?cid=0&hash='.$c, $head2)[1]);
		}
		$data = http_build_query($data);
		$cap = json_decode(Requests::post("https://iewilbot.my.id/res.php",0,$data)[1],1);
		if(!$cap['status'])return 0;
		Requests::postXskip(host.'system/libs/captcha/request.php',$head,"cID=0&pC=".$cap['result']."&rT=2");
		return $cap['result'];
	}
}
?>
