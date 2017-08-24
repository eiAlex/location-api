<?php
	@include_once('config/config.php');
	@include_once('../../config/config.php');
	require_once(__PATH__.'/package/extras/class/Database.php');
	
	class DaoMap {
		private $conn;
		
		
		public function __construct(){
			$this->conn = new Database();
		}
		public function __destruct(){
			$this->conn->getConn()->close();
		}



		// COORDS
			public function saveMapCoord($map){
				$data = array();
				$data[] = $this->conn->cleanData( $map->getUser()->getId() );
				$data[] = $this->conn->cleanData( $map->getLatitude() );
				$data[] = $this->conn->cleanData( $map->getLongitude() );
				$data[] = $this->conn->cleanData( $map->getAltitude() );
				$data[] = $this->conn->cleanData( $map->getTime() );
				
				$query = <<<SQL
					INSERT INTO
						laa_coordinate(id_user,
										latitude,
										longitude,
										altitude,
										time)
					VALUES($data[0],
							"$data[1]",
							"$data[2]",
							"$data[3]",
							$data[4])
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$this->conn->getConn()->query( $query );
				return( $this->conn->getConn()->affected_rows );
			}



			public function getLastMapCoord( $user ){
				$data = array();
				$data[] = $this->conn->cleanData( $user->getId() );
				
				$query = <<<SQL
					SELECT
						latitude,
						longitude,
						altitude,
						time
						FROM
							laa_coordinate
						WHERE
							id_user = $data[0]
						ORDER BY
							id DESC
						LIMIT 1
SQL;
				$query = $this->conn->removeBreakLine($query);
				$result = $this->conn->getConn()->query($query);
				
				$map = NULL;
				while( $data = $result->fetch_object() ){
					$map = new Map();
					$map->setId( $data->id );
					$map->setLatitude( $data->latitude );
					$map->setLongitude( $data->longitude );
					$map->setAltitude( $data->altitude );
					break;
				}
				$result->free();

				return($map);
			}



		// PLACES
			public function savePlace( $place ){
				$data = array();
				$data[] = $this->conn->cleanData( $place->getName() );
				$data[] = $this->conn->cleanData( $place->getCategory()->getItem() );
				$data[] = $this->conn->cleanData( $place->getDescription() );
				$data[] = $this->conn->cleanData( $place->getLatitude() );
				$data[] = $this->conn->cleanData( $place->getLongitude() );
				$data[] = $this->conn->cleanData( $place->getStatus() );
				$data[] = $this->conn->cleanData( $place->getTime() );
				$data[] = $this->conn->cleanData( $place->getPhone() );
				$data[] = $this->conn->cleanData( $place->getAmbience() );
				$data[] = $this->conn->cleanData( $place->getElderly() );
				$data[] = $this->conn->cleanData( $place->getEquipments() );
				$data[] = $this->conn->cleanData( $place->getMedicines() );
				
				
				$query = <<<SQL
					INSERT INTO
						ubs_lite(nom_estab,
									categoria,
									descricao,
									vlr_latitude,
									vlr_longitude,
									status,
									time,
									dsc_telefone,
									dsc_estrut_fisic_ambiencia,
									dsc_adap_defic_fisic_idosos,
									dsc_equipamentos,
									dsc_medicamentos)
					VALUES("$data[0]",
							$data[1],
							"$data[2]",
							"$data[3]",
							"$data[4]",
							 $data[5],
							 $data[6],
							 "$data[7]",
							 "$data[8]",
							 "$data[9]",
							 "$data[10]",
							 "$data[11]")
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$this->conn->getConn()->query( $query );
				return( $this->conn->getConn()->affected_rows );
			}


			public function updatePlace( $place ){
				$data = array();
				$data[] = $this->conn->cleanData( $place->getId() );
				$data[] = $this->conn->cleanData( $place->getName() );
				$data[] = $this->conn->cleanData( $place->getCategory()->getItem() );
				$data[] = $this->conn->cleanData( $place->getDescription() );
				$data[] = $this->conn->cleanData( $place->getLatitude() );
				$data[] = $this->conn->cleanData( $place->getLongitude() );
				$data[] = $this->conn->cleanData( $place->getStatus() );
				$data[] = $this->conn->cleanData( $place->getPhone() );
				$data[] = $this->conn->cleanData( $place->getAmbience() );
				$data[] = $this->conn->cleanData( $place->getElderly() );
				$data[] = $this->conn->cleanData( $place->getEquipments() );
				$data[] = $this->conn->cleanData( $place->getMedicines() );
				
				
				$query = <<<SQL
					UPDATE
						ubs_lite
						SET
							nom_estab = "$data[1]",
							categoria = $data[2],
							descricao = "$data[3]",
							vlr_latitude = "$data[4]",
							vlr_longitude = "$data[5]",
							status = $data[6],
							dsc_telefone= "$data[7]",
							dsc_estrut_fisic_ambiencia = "$data[8]",
							dsc_adap_defic_fisic_idosos= "$data[9]",
							dsc_equipamentos = "$data[10]",
							dsc_medicamentos = "$data[11]"
						
						
						
						WHERE
							id = $data[0]
						LIMIT 1
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$this->conn->getConn()->query( $query );
				return( $this->conn->getConn()->affected_rows );
			}


			public function getPlace( $place ){
				$data = array();
				$data[] = $this->conn->cleanData( $place->getId() );
				
				$query = <<<SQL
					SELECT
						nom_estab,
						categoria,
						descricao,
						vlr_latitude,
						vlr_longitude,
						status
						FROM
							ubs_lite
						WHERE
							id = $data[0]
						LIMIT 1
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$result = $this->conn->getConn()->query( $query );
				$data = NULL;
				while( $data = $result->fetch_object() ){
					$place->setName( $data->nom_estab );
					$place->setCategory( new Category($data->categoria) );
					$place->setDescription( $data->descricao );
					$place->setLatitude( $data->vlr_latitude );
					$place->setLongitude( $data->vlr_longitude );
					$place->setStatus( $data->status );
					break;
				}
				$result->free();

				return( $place );
			}


			public function getPlacesLightWeight(){
				$query = <<<SQL
					SELECT
						id,
						nom_estab
						FROM
							ubs_lite				
						
						ORDER BY
							nom_estab ASC
							
							
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$result = $this->conn->getConn()->query( $query );
				$arrayPlaces = array();

				while( $data = $result->fetch_object() ){
					$arrayPlaces[] = new Place( $data->id, $data->nom_estab );
				}
				$result->free();

				return( $arrayPlaces );
			}


			public function getPlacesClosest( $place ){
				$data = array();
				$data[] = $this->conn->cleanData( $place->getLatitude() );
				$data[] = $this->conn->cleanData( $place->getLongitude() );
				$data[] = $this->conn->cleanData( $place->getDistance() );
				$query = <<<SQL
					SELECT
						id,
						nom_estab,
						categoria,
						descricao,
						dsc_telefone,
						dsc_estrut_fisic_ambiencia,
						dsc_adap_defic_fisic_idosos,
						dsc_equipamentos,
						dsc_medicamentos,
						vlr_latitude,
						vlr_longitude
						FROM
							ubs_lite
						WHERE
							status = 1
							AND
							6371 * ACOS(
										COS( RADIANS( $data[0] ) )
										*
										COS( RADIANS(vlr_latitude) )
										*
										COS(
											RADIANS( $data[1] )
											-
											RADIANS(vlr_longitude)
										)
										+
										SIN( RADIANS( $data[0] ) )
										*
										SIN( RADIANS(vlr_latitude) )
									) <= $data[2]
SQL;
				//exit($query);
				$query = $this->conn->removeBreakLine( $query );
				$result = $this->conn->getConn()->query( $query );
				$arrayPlaces = array();

				while( $data = $result->fetch_object() ){
					$place = new Place( $data->id );
					$place->setName( $data->nom_estab );
					$place->setCategory( new Category($data->categoria) );
					$place->setDescription( $data->descricao );
					$place->setPhone( $data->dsc_telefone );
					$place->setAmbience( $data->dsc_estrut_fisic_ambiencia );
					$place->setElderly( $data->dsc_adap_defic_fisic_idosos );
					$place->setEquipments( $data->dsc_equipamentos );
					$place->setMedicines( $data->dsc_medicamentos );
					$place->setLatitude( $data->vlr_latitude );
					$place->setLongitude( $data->vlr_longitude );

					$arrayPlaces[] = $place;
				}
				$result->free();

				return( $arrayPlaces );
			}
	}
?>