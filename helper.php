<?php
class replacer{
	public $indecator = array();
	private $hideSection = array();
	private $sectionHTML = array();

	public function __construct(){
		require 'indecator.php';
		$this->indecator = $indecator;
	}

	public function load($file){
		if(file_exists($file)){
			return require($file);
		} else{
			die("File not found!");
		}
	}
	public function hideSection($sectionList=array()){
		$this->hideSection = $sectionList;
	}
	public function sectionHTML($sectionHTML=array()){
		$this->sectionHTML = $sectionHTML;
	}
	private function replacer($file,$custom_var=array()){
		if(file_exists($file)){
			$content = file_get_contents($file);
			$indecator = $this->indecator;
			if(count($custom_var)>0){
				$indecator = array_merge($custom_var,$this->indecator);
			}
			foreach(array_keys($indecator) as $key){
				$content = str_replace("{".$key."}", $indecator[$key],$content); //DEFINED

				//Variable Replacer
				$re_function = '/\{([_a-zA-Z]*)\=?([a-zA-Z]*)\}/m';
				preg_match_all($re_function, $content, $matches, PREG_SET_ORDER, 0);
				if(isset($matches[0]) and isset($matches[0][1])){
					if(isset($matches[0][2]) and strlen($matches[0][2])>=1){
						$varName = "".$matches[0][1]."['".$matches[0][2]."']";
					} else{
						$varName = $matches[0][1];
					}
					if(isset($$varName)){
						$content = str_replace($matches[0][0], $$varName, $content);
					}
				}

				//Section Replacer
				$re_section = '/\[\:([_a-zA-Z0-9]*)\:\]/m';
				preg_match_all($re_section, $content, $matches, PREG_SET_ORDER, 0);
				if(count($matches)>0){
					$re_html = '/\[\:'.$matches[0][1].'\:\]([^#]+)\[\:'.$matches[0][1].'\:\]/m';
					preg_match_all($re_html, $content, $sectionMatches, PREG_SET_ORDER, 0);
					$sectionContent = $sectionMatches[0][1];
					if(in_array($matches[0][1], $this->hideSection)){
						$content = str_replace($sectionContent, "[closed]", $content);
					} else if(isset($this->sectionHTML[$matches[0][1]])){
						$content = str_replace($sectionContent, $this->sectionHTML[$matches[0][1]], $content);
					}
					$content = str_replace($matches[0][0], "<! ".($matches[0][1])." >", $content);
				}
			}
			return $content;
		}
	}
	public function render($file,$replacer=true,$custom_var=array()){
		if($replacer){
			echo $this->replacer($file,$custom_var);
		}
	}
	public function route($name, $fn){
		if($name=="index"){
			return;
		} else{
			if(isset($_GET) and isset($_GET["page"]) and $_GET["page"]==$name and $name!="index"){
				$fn();
			}
		}
	}
}
?>