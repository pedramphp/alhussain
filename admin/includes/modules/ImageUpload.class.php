<?php 

class ImageUploadException extends Exception{};

class ImageUpload{
	
	private $targetPath;
	private $fileObj;
	private $imageName = null;
	private $maxSize = 2;
	private $fullPath = null;
	private $overwrite = false;
	
	public function __construct( $targetPath = '', $fileObj  ){
		
		$this->fileObj = $fileObj;
		$this->targetPath = $targetPath;
		
		if(empty($this->fileObj) || !isset($fileObj['name']) || !isset($this->fileObj['type'])){
			throw new ImageUploadException("Invalid File Object");
		}
		
		if(empty($this->fileObj['name'])){
			throw new ImageUploadException("Please enter empty fields");
		}	
	}
	
	public function setSize( $maxsize ){
		$this->maxSize = $maxsize;
	}
	
	public function setImageName( $imageName ){
		
		$this->imageName = 	$imageName;
	}
	
	public function setOverwrite( $status ){
		$this->overwrite = $status;
	}
	
	private function isValidType(){
		
		// This is an array that holds all the valid image MIME types
		$validType= array("image/jpg", "image/jpeg", "image/bmp", "image/gif","image/png");
		if (in_array($this->fileObj['type'], $validType))
			return true;
		return false;			
	}
	
	public function upload(){

		$this->imageName = (empty($this->imageName)) ? $this->fileObj['name'] : $this->imageName;
		$this->fullPath = $this->targetPath . $this->imageName;
		
		if($this->fileObj['size'] / (1024*1024) > $this->maxSize){
			throw new ImageUploadException("Please upload a file less than ".$this->maxSize." MB");
		}
		
		if (!$this->isValidType()){
			throw new ImageUploadeException("You must upload a jpeg, gif,png or bmp");
		}
		
		if (file_exists($this->fullPath) && !$this->overwrite ){
			throw new ImageUploadException("A file with that name already exists");
		}
		
		if(!$this->finalUpload()){
			throw new ImageUploadException("Could not upload file.  Check read/write persmissions on the directory");
		}
		return true;
		

		
	}
	
	private function finalUpload(){
			
		// Lets attempt to move the file from its temporary directory to its new home
		if (move_uploaded_file($this->fileObj['tmp_name'], $this->fullPath)){
			return true;
		}else{
			return false;
		}
				
	}
	
	public function getImagePath(){
		return $this->fullPath;
	}
	
	public function getImageName(){
		return $this->imageName;
	}
	
}

?>