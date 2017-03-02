<?php



class code{
	private $letter="abcdefgABCDEFG";
	private $letterNum=4;
	public $width=200;
	public $height=80;
	public $lineNum=10;
	public $imgType="png";

	public function output(){
		header("content-type:image/".$this->imgType);
		$out="image".$this->imgType;
		//1.创建画布->颜色填充
		$this->create();
		//2.创建文字->随机->颜色
		$this->createText();
		//3.干扰线->随机->颜色
		$this->createLine(5);
        imagepng($this->img);
	}
	
	private function create(){
	    $this->img=imagecreatetruecolor($this->width,$this->height);
	    $bgcolor=$this->getColor();
	    imagefill($this->img,0,0,$bgcolor);
        
	}
	private function createText(){
        $str=$this->getRandom(4); 
        $bgcolorr=$this->getColor();
        imagefttext($this->img, 40, 0, 35, 55, $bgcolorr,"font.ttf",$str);
	}
	private function createLine($num){
		$bgcolorr=$this->getColor();
		for($i=0;$i<$num;$i++){
			imageline($this->img,mt_rand(0,20),mt_rand(0,80),mt_rand(180,$this->width),mt_rand(0,$this->height),$bgcolorr);
		}
	}
	
	private function getColor(){
		for($i=0;$i<3;$i++){
			$arr[$i]=mt_rand(50,200);
		}
		$bgcolor=imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
		return $bgcolor;
	}
		
	private function getRandom($num){
        $strs="";
        for ($i = 0; $i < $num; $i++) {
            $strs.= $this->letter[mt_rand(0,strlen($this->letter)-1)];
        }
        return $strs;
	}
}

$a=new code();
$r=$a->output();

?>