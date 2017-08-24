<?php
	@include_once('config/config.php');
	@include_once('../../config/config.php');
	require_once(__PATH__.'/package/extras/class/Obj.php');
	require_once(__PATH__.'/package/cdp/Category.php');

	
	class Place extends Obj {
		private $name;
		private $category;
		private $description;
		private $latitude;
		private $longitude;
		private $distance;
		private $phone;
		private $ambience;
		private $elderly;
		private $equipments;
		private $medicines;

		
		public function __construct($id=0, $name='', $category=NULL, $description='',$phone='', $ambience='',$elderly='',$equipments='',$medicines='', $latitude=0, $longitude=0, $distance=0, $status=0, $time=0){
			$this->id = $id;
			$this->name = $name;
			$this->category = $category;
			$this->description = $description;
			$this->latitude = $latitude;
			$this->longitude = $longitude;
			$this->distance = $distance;
			$this->status = $status;
			$this->time = $time;
			$this->phone = $phone;
			$this->ambience = $ambience;
			$this->elderly = $elderly;
			$this->equipments = $equipments;
			$this->medicines = $medicines;
		}
		public function __destruct(){}
		
		
		public function post($post){
			$this->setName( $post['name'] );
			$this->setCategory( new Category($post['category']) );
			$this->setDescription( $post['description'] );
			$this->setLatitude( $post['latitude'] );
			$this->setLongitude( $post['longitude'] );
			$this->setStatus( $post['status'] );
			$this->setPhone( $post['phone'] );
			$this->setAmbience( $post['ambience'] );
			$this->setElderly( $post['elderly'] );
			$this->setEquipments( $post['equipments'] );
			$this->setMedicines( $post['medicines'] );
			$this->setTime( time() );
		}
		
		
		public function getName(){
			return($this->name);
		}
		public function setName($n){
			$this->name = $n;
		}


		public function getCategory(){
			return($this->category);
		}
		public function setCategory($c){
			$this->category = $c;
		}


		public function getDescription(){
			return($this->description);
		}
		public function setDescription($description){
			$this->description = $description;
		}
		
		
		public function getLatitude(){
			return($this->latitude);
		}
		public function setLatitude($latitude){
			$this->latitude = $latitude;
		}
		
		
		public function getLongitude(){
			return($this->longitude);
		}
		public function setLongitude($longitude){
			$this->longitude = $longitude;
		}


		public function getDistance(){
			return($this->distance);
		}
		public function setDistance($distance){
			$this->distance = $distance;
		}
		
		public function getPhone(){
			return($this->phone);
		}
		public function setPhone($phone){
			$this->phone = $phone;
		}
		
		public function getAmbience(){
			return($this->ambience);
		}
		public function setAmbience($ambience){
			$this->ambience = $ambience;
		}
		
		public function getElderly(){
			return($this->elderly);
		}
		public function setElderly($elderly){
			$this->elderly = $elderly;
		}

		public function getEquipments(){
			return($this->equipments);
		}
		public function setEquipments($equipments){
			$this->equipments = $equipments;
		}
		
		public function getMedicines(){
			return($this->equipments);
		}
		public function setMedicines($medicines){
			$this->medicines = $medicines;
		}

		
		// JSON
			public function getDataJSON(){
				$aux = array(
					'id'=>					$this->getId(),
					'name'=>				$this->getName(),
					'category'=>			is_object($this->getCategory()) ? $this->getCategory()->getDataJSON() : NULL,
					'description'=>			$this->getDescription(),
					'latitude'=>			$this->getLatitude(),
					'longitude'=>			$this->getLongitude(),
					'distance'=>			$this->getDistance(),
					'status'=>				$this->getStatus(),
					'phone'=>				$this->getPhone(),
					'ambience'=>			$this->getAmbience(),
					'elderly'=>				$this->getElderly(),
					'equipments'=>			$this->getEquipments(),
					'medicines'=>			$this->getMedicines(),
					'timeMilliseconds'=>	$this->getTimeMilliseconds());
				$aux = $this->setArrayToUtf8($aux);
				return($aux);
			}
	}
?>