<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style_kredigo.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<section class="container mt-5 section-form" >
		<div class="col-md-6 offset-md-3 p-md-3 ">
			<form class="col-lg-12 col-md-12 ">
				<div class="row mb-5">
					<img class=" mx-auto d-block" src="assets/img/logo.png" alt="logo" style="width:120px; height: 120px;">		
				</div>
				<div class="row mb-5">
					<h4><center><b>FORMULAIRE D'ABONNEMENT</b></center></h4>
				</div>
				<div class="row">
					<h6><b>INFORMATIONS PERSONNELLES </b></h6>
					<div class=" mb-3">
					<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>
					
					</div>
					<div class=" mb-3">
					<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>
					
					</div>
					<div class="form-floating mb-3">
					<input type="date" class="form-control" name="date_naissance" id="date_naissance" placeholder="Date de naissance" required>
					<label class="ps-4"> Date de naissance</label>
					</div>
					<div class="mb-3">
					<input type="tel" class="form-control" name="telephone" id="telephone" placeholder="Numéro de téléphone" required>			  
					</div>
					<div class="mb-3">
					<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>			  
					</div>
					<div class="">
					<input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" required>			  
					</div>


				</div><br>
				<div class="row">
					<h6><b>INFORMATIONS PROFESSIONNELLES </b></h6>
					<div class="mb-3">
						<select class="form-select " name="employeur" id="employeur">
						<option selected>Employeur</option>
						<option value="public">PUBLIC</option>
						<option value="prive">PRIVE</option>
						</select>					
					</div>
					<div class=" mb-3">
					<input type="text" class="form-control" name="nom_employeur" id="nom_employeur" placeholder="Nom de l'employeur" required> 
					</div>
					<div class="form-floating mb-3">
					<input type="date" class="form-control" name="date_embauche" id="date_embauche" placeholder="Date d'embauche" required> 
					<label class="ps-4"> Date d'embauche</label>
					</div>
					<div class="mb-3">
						<select class="form-select " name="type_contrat" id="type_contrat">
						<option selected>Type de contrat</option>
						<option value="CDI">CDI</option>
						<option value="CDD">CDD</option>
						</select>					
					</div>
					<div class=" mb-3">
					<input type="number" class="form-control" name="salaire_net" id="salaire_net" placeholder="Salaire net" required>				  
					</div>
					<div >
						<select class="form-select" name="type_contrat" id="type_contrat">
						<option selected>Votre banque</option>
						<option value="BGFI">BGFI</option>
						<option value="BICIG">BICIG</option>
						<option value="COFINA">COFINA</option>
						<option value="ECOBANK">ECOBANK</option>
						<option value="EDG">EDG</option>
						<option value="FINAM">FINAM</option>
						<option value="ORABANK">ORABANK</option>
						<option value="SODEC">SODEC</option>
						<option value="UGB">UGB</option>
						<option value="SFE">SFE</option>
						</select>					
					</div>				
				</div> <br>

				<div class="row">
					<h6><b>PIECES JUSTIFICATIVES </b></h6>
					<div class="mb-3">
						<select class="form-select " name="type_piece" id="type_piece">
						<option selected>Type de pièce</option>
						<option value="CNI">CNI</option>
						<option value="PASSEPORT">PASSEPORT</option>
						<option value="PERMIS DE CONSUIRE">PERMIS DE CONSUIRE</option>
						<option value="CARTE DE SEJOUR">CARTE DE SEJOUR</option>
						</select>					
					</div>
					<div class="form-floating mb-3">
					<input type="file" class="form-control" name="piece_identite_recto" id="piece_identite_recto" placeholder="Pièce d'identité recto" required> 
					<label class="ps-4 p-2"> Pièce d'identité recto</label>
					</div>
					<div class="form-floating ">
					<input type="file" class="form-control" name="piece_identite_verso" id="piece_identite_verso" placeholder="Pièce d'identité verso" required> 
					<label class="ps-4 p-2"> Pièce d'identité verso</label>
					</div>				
				</div><br>

				<div class="row">
					<h6><b>ABONNEMENT ANNUEL (Frais opérateurs 3,7%) </b></h6>
					<div class="mb-3 abonnement">
						<input type="text" class="form-control" name="abonnement_annuel" id="abonnement_annuel" placeholder="Salaire net" value="10.000 XAF" required disabled>
					</div>
					<div class="mb-3">
						<select class="form-select " name="moyens_paiement" id="moyens_paiement">
						<option selected>Choisissez un moyen de paiement</option>
						<option value="Airtel Money">Airtel Money</option>
						<option value="Moov Money">Moov Money</option>
						</select>					
					</div>	
					<div class=" mb-3">
					<input type="number" class="form-control" name="numero" id="numero" placeholder="Entrez votre numéro" required>				  
					</div>							
					<div class="mb-3">
						<a href="#" target="_blank">Voir les conditions d'abonnement</a>
					</div>
					<div class="form-check  ms-3">
					<input class="form-check-input" type="checkbox" value="" name="si_adhesion" id="si_adhesion">
					<label class="form-check-label" for="si_adhesion">
						J'accepte les conditions d'abonnement
					</label>
					</div>
				</div><br>
				<div class="row mb-5">
					<input class="submit" type="submit" name="valider" value="JE M'ABONNE">
				</div>	
			</form>	
			<div class="row copyright ">
				<p class="text-center fs-7 text-muted">
					&copy; Copyright 2020 Kredigo - All Rights Reserved
				</p>
			</div>	
		</div> <br><br>

	</section>
</body>
</html>