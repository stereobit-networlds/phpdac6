<?php
$__DPCSEC['I18NL_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("I18NL_DPC")) {
define("I18NL_DPC",true);

$__DPC['I18NL_DPC'] = 'i18nL';


class i18nL {
	
	protected $prpath, $isol, $isolan, $clang;


    public function __construct() {
		
		$this->prpath = paramload('SHELL','prpath');
		$this->clang = getlocal();
		
		$this->isol = arrayload('SHELL','isolangs');		
		$this->isolan = (!empty($isol)) ? $this->isol[$this->clang] : 'en';
		
		$this->create_i18n_file(); //only if directive is enabled
	
    }
	
	protected function create_i18n_file() {
		global $__LOCALE;
			
		if (remote_paramload('I18NL','write', $this->prpath)) {

			$data = null;
			$lan = getlocal();			
			$locfile = $this->prpath . 'lang/' . 'lang_' . $this->isol[getlocal()]. '.ini';
			$append = remote_paramload('I18NL','append', $this->prpath);
			//echo '>'.$locfile;
			
			if (is_readable($locfile))
				@copy($locfile, str_replace('.ini','._ni', $locfile)); //backup
			
			if ($append) //read file as ini
				$existed_data = @parse_ini_file($locfile, 1, INI_SCANNER_NORMAL);
			
			foreach ($__LOCALE as $m=>$loc) {
				$cm = str_replace('_DPC','',$m);
				
				if (($append) && array_key_exists($cm , $existed_data))
					continue; //bypass if module has already written
				
				$data .= "[$cm]" . PHP_EOL;
				foreach ($loc as $i=>$localestring) {
					$l = explode(';', $localestring);
					
					//$data .= $l[0] . '="' . $l[$lan+1] . '"' . PHP_EOL; 
					$var = array_shift($l);
					$svar = ($var[0]=='_') ? substr($var, 1) : $var;
					$data .= str_replace(' ','_', $svar);
					$data .= ' = "' . mb_convert_encoding($l[$lan], 'UTF-8', 'UTF-8') . '"' . PHP_EOL; 
				}
				$data .= PHP_EOL . PHP_EOL;
			}
			
			if ($data) {
				$directive = $append ? FILE_APPEND|LOCK_EX : LOCK_EX;
				$ret = @file_put_contents($locfile, $data, $directive);
			}	
			
			//return ($ret);
		}
		
		//return false;
	}
	
	public function translate($string=null, $category=null) {
		if (!$string) return null;
		
		if (defined('I18N_DPC')) {
			if ($category) {
				$cstring = "{$category}_{$string}";
				$ret = L::$csting;
			}	
			else
				$ret = L::$string;		
		}
		else
			$ret = localize($string, getlocal());
		
		return ($ret);
	}	

};
}