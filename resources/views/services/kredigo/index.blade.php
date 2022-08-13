<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets_form/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets_form/css/style_kredigo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_form/css/bootstrap4-buttons.css')}}">

	<title>Service Kredigo</title>
</head>
<body>
	<section class="container mt-5 section-form" >
		<div class="col-md-6 offset-md-3 p-md-3 ">
			<form class="col-lg-12 col-md-12 " enctype="multipart/form-data" id="form_service">
                @csrf
				<div class="row mb-5">
					<img class=" mx-auto d-block" src="{{ asset('assets_form/img/logo.png') }}" alt="logo" style="width:120px; height: 120px;">
				</div>
				<div class="row mb-5">
					<h4><center><b>FORMULAIRE D'ABONNEMENT</b></center></h4>
				</div>
				<div class="row">
					<h6><b>INFORMATIONS PERSONNELLES </b></h6>
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
						<select class="form-select " name="secteur_emploie" id="secteur_emploie" required>
						<option disabled>Employeur</option>
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
						<select class="form-select " name="type_contrat" id="type_contrat" required>
						<option disabled>Type de contrat</option>
						<option value="CDI">CDI</option>
						<option value="CDD">CDD</option>
						</select>
					</div>
					<div class=" mb-3">
					<input type="number" class="form-control" name="salaire_net" id="salaire_net" placeholder="Salaire net" required>
					</div>
					<div >
						<select class="form-select" name="banque" id="banque" required>
						<option disabled>Votre banque</option>
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
						<select class="form-select " name="type_piece" id="type_piece" required >
                            <option disabled>Type de pièce</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSEPORT">PASSEPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                            <option value="CARTE DE SEJOUR">CARTE DE SEJOUR</option>
						</select>
					</div>
					<div class="form-floating mb-3">
					<input type="file" class="form-control" name="piece_jointe_recto" accept=".jpg,.jpeg, .png, .tiff, .bmp,.png,.gif,.doc,.docx,.pdf" id="piece_jointe_recto" placeholder="Pièce en recto" required>
					<label class="ps-4 p-2"> Pièce d'identité recto</label>
					</div>
					<div class="form-floating ">
					<input type="file" class="form-control" name="piece_jointe_verso" accept=".jpg,.jpeg, .png, .tiff, .bmp,.png,.gif,.doc,.docx,.pdf" id="piece_jointe_verso" placeholder="Pièce en verso" >
					<label class="ps-4 p-2"> Pièce d'identité verso</label>
					</div>
				</div><br>

				<div class="row">
					<h6><b>ABONNEMENT ANNUEL (Frais opérateurs 3,7%) </b></h6>
					<div class="mb-3 abonnement">
                        <input type="text" class="form-control" name="montant" id="montant" placeholder="Montant net" value="5.000 FCFA" required disabled>
						<input type="hidden" class="form-control" name="frais" id="frais" placeholder="Salaire net" value="100" >
					</div>
					<div class="mb-3">
						<select class="form-select " name="moyen_paiement" id="moyen_paiement" required>
						<option selected>Choisissez un moyen de paiement</option>
						<option value="Airtel Money">Airtel Money</option>
						<option disabled value="Moov Money">Moov Money</option>
						</select>
					</div>
					<div class=" mb-3">
					<input type="tel" class="form-control" name="numero_paiement" id="numero_paiement" placeholder="Entrez votre numéro  (Ex : 077933254)" required>
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
    <script src="{{ asset('assets_form/js/sweetalert2@11.js') }}"></script>
    <script>
        const get_model = () => "kredigo"

        const get_url = (which) => {
            switch(which){
                case 'checkStatus':
                    return "{{ route('transaction_status') }}";
                break;

                case 'samed':
                    return "{{ route('service-samed-transation') }}";
                break;

                case 'kredigo':
                    return "{{ route('service-kredigo-transation') }}"
                break;

                default:
                    return "{{ route('service-samed-transation') }}";
            }
        }

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
        })

        function get_transaction_statut(title, token){
            Swal.fire({
                        title: title,
                        html: `<blockquote class="blockquote text-center">
                                    <p class="mb-0">En attente de la confirmation du statut de la transaction...</p>
                                    <br>
                                    <footer class="blockquote-footer"> <b></b> <cite title="temps approximatif restant">s.</cite></footer>
                                </blockquote>`,
                        timer: 60000,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        allowOutsideClick: () => !Swal.isLoading(),
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                let remainingTime = Math.floor(Swal.getTimerLeft()/1000);
                                b.textContent = remainingTime
                                if(remainingTime%5 == 0){
                                    console.log('Time : ' + remainingTime, ' || url : '+ get_url('checkStatus') + token)
                                    const formData = new FormData(); formData.append('token', token);
                                    fetch(`${get_url('checkStatus')}`, {method: 'POST', body: formData }).then(
                                        response => {
                                            return response.json()
                                        }
                                    )
                                    .then((result) => {
                                        if(result.done){
                                            clearInterval(timerInterval)
                                            Swal.hideLoading()
                                            swalWithBootstrapButtons.fire(
                                                {
                                                    'title': result.title,
                                                    'html': result.message,
                                                    'icon': result.type
                                                }
                                            )
                                        }else{
                                            console.log(result.error)
                                        }
                                    })
                                }
                            }, 1000)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            swalWithBootstrapButtons.fire({
                                icon: 'info',
                                title: 'Hummm',
                                html: 'Delai d\'attente dépassé, Veuillez reesayer. Code la transaction : ' + token,
                                showDenyButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText: ' <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualiser !',
                                cancelButtonText: `Annuler`,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    retry("Recupération du statut de la transaction")
                                }
                            })
                        }
            }).then((result) => {
                console.log('Bye')
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        }

        let form = document.getElementById('form_service')
        form.addEventListener('submit',  async (e) => {
                e.preventDefault();

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
                        title: 'transaction en cours !!!',
                        html: 'Veuillez regarder votre mobile...',
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        allowOutsideClick: () => !Swal.isLoading(),
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            return fetch(`${get_url(get_model())}`, {method: 'post',body: new FormData(form),}).then( //$("#form_service")[0]
                                response => {
                                    // if (!response.done) throw new Error( response.json() )
                                    Swal.hideLoading()
                                    return response.json()
                                }
                            )
                            .then((result) => {
                                console.log(result.done)
                                if(result.done){
                                        let timerInterval;
                                        let token = result.reference;
                                        // Swal.hideLoading()
                                        console.log('isLoading : '+ Swal.isLoading())
                                        console.log('Url : '+ get_url('checkStatus') + token)
                                        get_transaction_statut(result.title, token)
                                }else{
                                    console.log(result)
                                    swalWithBootstrapButtons.fire({
                                        // icon: result.icon??'error',
                                        title: result.title,
                                        html: result.message,
                                        showCancelButton: true,
                                        focusConfirm: false,
                                        confirmButtonText: ' <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualiser !',
                                        cancelButtonText: `Annuler`,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.replace(location.pathname);
                                        }
                                    })
                                }
                            })
                            .catch(error => {
                                console.log(error)
                                swalWithBootstrapButtons.fire({
                                        // icon: error,
                                        title: 'Oups !!!',
                                        html: 'Probleme de connexion au serveur, veuillez verifier vos parametres de connexion ou raffraichissez la page',
                                        showCancelButton: true,
                                        focusConfirm: false,
                                        confirmButtonText: ' <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualiser !',
                                        cancelButtonText: `Annuler`,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.replace(location.pathname);
                                    }
                                })
                            })
                        }
                        })
                    } else if ( result.dismiss === Swal.DismissReason.cancel ) {
                        swalWithBootstrapButtons.fire(
                            'Oups !!!',
                            'Probleme de connexion au serveur, veuillez verifier vos parametres de connexion :)',
                            'error'
                        )
                    }
                }).catch((error) =>{
                    console.log(error)
                    swalWithBootstrapButtons.fire(
                            'Oups + + !!!',
                            'Une erreur est survenue au niveau du serveur, bien vouloir contacter les administrateur de la plateforme :) ',
                            'error'
                    )
                });

        })

    </script>
</body>
</html>
