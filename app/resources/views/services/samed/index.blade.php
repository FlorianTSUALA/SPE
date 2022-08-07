<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets_form/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets_form/css/style_samed.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_form/css/bootstrap4-buttons.css')}}">
	<title>Service Samed</title>
</head>
<body>
	<section class="container mt-5 section-form" >
		<div class="col-md-6 offset-md-3 p-md-3 ">
			<form class="col-lg-12 col-md-12 " enctype="multipart/form-data" id="form_service" >
                @csrf
				<div class="row mb-5">
					<img class=" mx-auto d-block" src="{{ asset('assets_form/img/logo.svg')}}" alt="logo" style="width:120px; height: 120px;">
				</div>
				<div class="row mb-5">
					<h4><center><b>FORMULAIRE D'ADHESION</b></center></h4>
				</div>
				<div class="row">
					<h6><b>VOS INFORMATIONS PERSONNELLES </b></h6>
					<div class="mb-3">
						<select class="form-select" name="civilite" id="civilite" required>
                            <option disabled>Civilité</option>
                            <option value="M">M</option>
                            <option value="MME">MME</option>
                            <option value="MLLE">MLLE</option>
						</select>
					</div>
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
					<input type="tel" class="form-control" name="telephone" id="telephone" placeholder="telephone" required>
					</div>
					<div class="mb-3">
						<select class="form-select" name="ville" id="ville" required>
                            <option disabled>Ville</option>
                            <option value="Libreville">Libreville</option>
                            <option value="Owendo">Owendo</option>
                            <option value="Akanda">Akanda</option>
                            <option value="Ntoum">Ntoum</option>
						</select>
					</div>
					<div class="mb-3">
					    <input type="text" class="form-control" name="lieu_residence" id="lieu_residence" placeholder="Lieu de résidence (Ex: Louis)" required>
					</div>
					<div class="mb-3">
					    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
					</div>
					<div class="mb-3">
						<select class="form-select" name="situation_socio_profressionnelle" id="situation_socio_profressionnelle" required>
                            <option disabled>Situation socio-professionnelle </option>
                            <option value="Salarie">Salarie</option>
                            <option value="Sans emploi">Sans emploi</option>
                            <option value="Etudiant">Etudiant</option>
						</select>
					</div>
					<div class="">
						<select class="form-select " name="est_assure" id="est_assure" required>
                            <option disabled>Etes vous déjà assuré?</option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
						</select>
					</div>

				</div><br>
				<div class="row">
					<h6><b>Combien de personnes souhaitez-vous faire beneficiez de l’offre SAMED? </b></h6>
					<div class="mb-3">
						<div class="form-check">
						<input class="form-check-input"  type="radio" value="Pack Standard" id="offre_samed1" name="offre_samed">
						<label class="form-check-label" for="offre_samed1">
							1
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" type="radio" value="Pack Duo" id="offre_samed2" name="offre_samed">
						<label class="form-check-label" for="offre_samed2">
							2
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" checked type="radio" value="Pack Family Lite" id="offre_samed3" name="offre_samed">
						<label class="form-check-label" for="offre_samed3">
							3
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" type="radio" value="Pack Family Lite" id="offre_samed4" name="offre_samed">
						<label class="form-check-label" for="offre_samed">
							4
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" type="radio" value="Pack Family Lite" id="offre_samed5" name="offre_samed">
						<label class="form-check-label" for="offre_samed5">
							5
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" type="radio" value="Pack Family Extra" id="offre_samed6" name="offre_samed">
						<label class="form-check-label" for="offre_samed6">
							Plus de 5
						</label>
						</div>

					</div>
					<div class=" mb-3">
					    <input type="text" class="form-control"  value="Pack Family Lite" name="pack" id="pack" placeholder="Pack" readonly>
					</div>


				<div class="row">
					<h6><b>Frais d’adhesion annuel (12 Mois) </b></h6>
					<div class="mb-3 abonnement">
						<input type="text" class="form-control" name="frais" id="frais" placeholder="Salaire net" value="5.000 FCFA" required disabled>
					</div>
					<div class="mb-3">
						<select class="form-select " name="moyen_paiement" id="moyen_paiement">
                            <option disabled>Choisissez un moyen de paiement</option>
                            <option value="Airtel Money">Airtel Money</option>
						    <option disabled value="Moov Money">Moov Money</option>
						</select>
					</div>
					<div class=" mb-3">
					<input type="tel" class="form-control" name="numero_paiement" id="numero_paiement" placeholder="Entrez votre numéro" required>
					</div>
					<div class="mb-3">
						<a href="{{  route('service-condition') }}" target="_blank">Voir les conditions d'abonnement</a>
					</div>
					<div class="form-check  ms-3 mb-3">
					<input class="form-check-input" type="checkbox" value="" name="si_adhesion" id="si_adhesion">
					<label class="form-check-label" for="si_adhesion">
						J’ai lu et accepte les conditions de souscription
					</label>
					</div>
				</div>
				<div class="row mb-5">
					<input class="submit" type="submit" name="valider" value="PAYER">
				</div>
			</form>
		</div> <br><br>
	</section>
<script type="text/javascript" src="{{ asset('assets_form/js/index.js') }}"></script>
<script src="{{ asset('assets_form/js/sweetalert2@11.js') }}"></script>
<script>
    function send(e,form) {
        e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: "Voulez-vous initier cette transaction?",
            text: "L'initilisation de la transaction prendra environ 60 seconde, veuillez valider le processus sur votre téléphone pour finaliser la trasaction!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, allez-y!',
            cancelButtonText: 'Non, annuler!',
            reverseButtons: false,
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('-------------------------------------------')
                Swal.fire({
                title: 'veuillez patienter',
                html: 'transaction en cours...',
                allowEscapeKey: false,
                showConfirmButton: false,
                allowOutsideClick: () => !Swal.isLoading(),
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    let url = "{{ route('service-samed') }}"
                    return fetch(`${url}`, {method: 'post',body: new FormData($("#form_service")[0]), }).then(
                    response => {
                        if (!response.done) throw new Error(response.statusText)
                        Swal.hideLoading()
                        return response.json()
                    }
                    )
                    .then((result) => {
                        console.log(result)
                        if(result.done){
                            swalWithBootstrapButtons.fire(
                                result.title,
                                result.message,
                                'success'
                            )
                        }else{
                            swalWithBootstrapButtons.fire(
                                result.title,
                                result.message,
                                'error'
                            )
                        }
                    })
                    .catch(error => {
                        Swal.showValidationMessage( `Request failed: ${error}` )
                        })
                }
                })
            } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Probleme de connexion au serveur, veuillez verifier vos parametres de connexion :)',
                    'error'
                )
            }
        });
    }
</script>
</body>
</html>
