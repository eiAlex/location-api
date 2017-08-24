<?php
	$html = '';
	$category = new Category();
	$html_CategoryOptions = $category->getOptions();

	
	
	if(strcasecmp('get-map-content', $_POST['method']) == 0 || empty($_POST['method'])){
		$html = <<<HTML
			<div id="map"></div>
HTML;

	}
	else if(strcasecmp('get-form-create-place', $_POST['method']) == 0){
		$html = <<<HTML
			<form id="form-create-place">
				<input type="text" id="fo-name" placeholder="*Nome" maxlength="50">

				<select id="fo-category">
					$html_CategoryOptions
				</select>
				
					<input type="text" id="fo-phone" placeholder="*Telefone" maxlength="50">
				
				
				<label>
					<input type="checkbox" id="fo-status" checked="checked">
					Ativo
				</label>
				<br><br>
				<label>
				<label>
					<label>
							<label>
									<input type="number" id="fo-ambience"  step="any" min="0" max="5"/>
									Estrutura Física
							</label>
				
							<label>
								<input type="number" id="fo-elderly"  step="any" min="0" max="5"/>
								Acesso Def. Físico
							</label>
					</label>				
				</label>
				
				<label>
					<label>
							<label>
									<input type="number" id="fo-equipments"  step="any" min="0" max="5"/>
									Equipmentos &nbsp;&nbsp;&nbsp; 
							</label>
				
							<label>
								<input type="number" id="fo-medicines"  step="any" min="0" max="5"/>
								Medicamentos
							</label>
					</label>				
				</label>
				
				
				</label>
				
				
				
				<br><br>

				<textarea id="fo-description" placeholder="*Descrição"></textarea>

				<input type="hidden" id="fo-latitude" value="-14.235004">
				<input type="hidden" id="fo-longitude" value="-51.92527999999999">
			
				<input type="text" id="map-search" placeholder="Buscar no Mapa">
				<div id="map"></div>
				<div class="cf"></div>

				<button type="submit" id="fo-submit">Salvar</button>
				<div class="cf"></div>
			</form>
HTML;

	}
	else if(strcasecmp('get-form-update-place', $_POST['method']) == 0){
		// BUILD PLACES OPTIONS
			$html_PlacesOption = '<option value="0">*Place</option>';
			for($i = 0, $tamI = count($arrayPlaces); $i < $tamI; $i++){
				$html_PlacesOption .= '<option value="'. $arrayPlaces[$i]->getId() .'">'. $arrayPlaces[$i]->getName() .'</option>';
			}

$html = <<<HTML
			<form id="form-create-place">
				<select id="fo-place">
					$html_PlacesOption
					
				</select>
				<input type="text" id="fo-name" placeholder="*Nome" maxlength="50">
				<input type="text" id="fo-phone" placeholder="*Telefone" maxlength="50">
				
				
				<label>
					<input type="checkbox" id="fo-status" checked="checked">
					Ativo
				</label>
				<br><br>
				<label>
				<label>
					<label>
							<label>
									<input type="number" id="fo-ambience"  step="any" min="0" max="5"/>
									Estrutura Física
							</label>
				
							<label>
								<input type="number" id="fo-elderly"  step="any" min="0" max="5"/>
								Acesso Def. Físico
							</label>
					</label>				
				</label>
				
				<label>
					<label>
							<label>
									<input type="number" id="fo-equipments"  step="any" min="0" max="5"/>
									Equipmentos &nbsp;&nbsp;&nbsp; 
							</label>
				
							<label>
								<input type="number" id="fo-medicines"  step="any" min="0" max="5"/>
								Medicamentos
							</label>
					</label>				
				</label>
				
				
				</label>
				
				
				
				<br><br>

				<textarea id="fo-description" placeholder="*Descrição"></textarea>

				<input type="hidden" id="fo-latitude" value="-14.235004">
				<input type="hidden" id="fo-longitude" value="-51.92527999999999">
			
				<input type="text" id="map-search" placeholder="Buscar no Mapa">
				<div id="map"></div>
				<div class="cf"></div>

				<button type="submit" id="fo-submit">Atualizar</button>
				<div class="cf"></div>
			</form>
HTML;
	}


	if( preg_match('/^(get-map-content|get-form-create-place|get-form-update-place){1}$/', $_POST['method']) ){
		echo json_encode(array('html'=>utf8_encode($html)));
	}
	else{
		echo $html;
	}





?>