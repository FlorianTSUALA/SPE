@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Register basic -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="#" class="brand-logo">
          <svg
            viewbox="0 0 139 95"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            height="28"
          >
            <defs>
              <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                <stop stop-color="#000000" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
              <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
            </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                <g id="Group" transform="translate(400.000000, 178.000000)">
                  <path
                    class="text-primary"
                    id="Path"
                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                    style="fill: currentColor"
                  ></path>
                  <path
                    id="Path1"
                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                    fill="url(#linearGradient-1)"
                    opacity="0.2"
                  ></path>
                  <polygon
                    id="Path-2"
                    fill="#000000"
                    opacity="0.049999997"
                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                  ></polygon>
                  <polygon
                    id="Path-21"
                    fill="#000000"
                    opacity="0.099999994"
                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                  ></polygon>
                  <polygon
                    id="Path-3"
                    fill="url(#linearGradient-2)"
                    opacity="0.099999994"
                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                  ></polygon>
                </g>
              </g>
            </g>
          </svg>
          <h2 class="brand-text text-primary ms-1">Bill Gabon</h2>
        </a>

        <h4 class="card-title mb-1">L'aventure commence ici 🚀</h4>
        <p class="card-text mb-2">Rendez la gestion de vos services facile et amusant!</p>

        <form class="auth-register-form mt-2" action="{{route('api.login')}}" method="POST">
          <div class="mb-1">
            <label for="name" class="form-label">Votre nom</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Bill Gabon"
              aria-describedby="name"
              tabindex="1"
              autofocus
            />
          </div>
          <div class="mb-1">
            <label for="email" class="form-label">Votre e-mail</label>
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="billgabon@gmail.com"
              aria-describedby="email"
              tabindex="2"
            />
          </div>

          <div class="mb-1">
            <label for="password" class="form-label">Votre mot de passe</label>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="password"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                tabindex="3"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <label for="password_confirmation" class="form-label">Repeter votre mot de passe</label>
            <div class="input-group input-group-merge form-password-toggle">
              <input
                type="password"
                class="form-control form-control-merge"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password_confirmation"
                tabindex="3"
              />
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
          </div>
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
              <label class="form-check-label" for="register-privacy-policy">
                Je suis d'accord avec <a href="#">les conditions et politique de confidentialité. </a>
              </label>
            </div>
          </div>
          <button id="action" type="submit" class="btn btn-primary w-100" tabindex="5">
            <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Creer un compte
          </button>
        </form>

        <p class="text-center mt-2">
          <span>Vous avez déjà un compte ?</span>
          <a href="{{route('login')}}">
            <span>Se connecter</span>
          </a>
        </p>

        <div class="divider my-2">
          <div class="divider-text"> - </div>
        </div>

        <div class="auth-footer-btn d-flex justify-content-center">
         
        </div>
      </div>
    </div>
    <!-- /Register basic -->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page-script')
<script>

$(function () {
  'use strict';
  console.log("welcome")
  var pageRegisterForm = $('.auth-register-form');
    // select = $('.select2'),
    
  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageRegisterForm.length) {
    pageRegisterForm.validate({
      //* ? To enable validation onkeyup*/
      onkeyup: function (element) {
        $(element).valid();
      },
      
      //* ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, 
      rules: {
        'name': {
          required: true,
        },
        'email': {
          required: true,
          email: true
        },
        'password': {
          required: true,
          minlength: 8,
        },
        'password_confirmation': {
            required: true,
            equalTo: '#password'
        },
      },
      messages : {
        name: {
          required: "ce champs est obligatoire",
        },
        email: {
          email: "Veuillez saisir une adresse mail correcte",
          required: "ce champs est obligatoire",
        },
        password: {
          required: "ce champs est obligatoire",
          minlength: "Le mot de passe doit comporter au moins 8 caractères"
        },
        password_confirmation: {
          required: "ce champs est obligatoire",
          equalTo: "Le mot de passe doit-etre identique",
        }
      },
      submitHandler: function(form) {
        $("#action span").removeClass('d-none')
        $("#action").addClass('disabled')
      }
    });
  }
  var isRtl = $('html').attr('data-textdirection') === 'rtl';
  
  function get_url(tag){
    switch(tag){
      case 'inscription':
        return "{{route('api.register')}}";
      case 'connexion':
        return "{{route('api.login')}}";
      default:
    }
  }

  pageRegisterForm.submit(function( event ) {
      event.preventDefault();
      if(!pageRegisterForm.valid()){
        $("#action span").addClass('d-none')
        $("#action").removeClass('disabled')
        return
      }
      var formData = new FormData(pageRegisterForm[0]), object = {}; formData.forEach(function(value, key){ object[key] = value; });
      return fetch(`${get_url('inscription')}`, {method: 'post',body: JSON.stringify({ "_token": "{{ csrf_token() }}", "email": $('#email').val(), "name": $('#name').val(), "password_confirmation": $('#password_confirmation').val(), "password": $('#password').val()}), 
                  headers:  {
                              'Accept': 'application/json',
                              'Content-Type': 'application/json'
                            },
          }).then(
          response => {
              $("#action span").addClass('d-none')
              $("#action").removeClass('disabled')
              return response.json()
          }
      )
      .then((result) => {
        if(result.page != undefined){
          toastr['warning'](
              'Félicitations, votre compte à bien été crée...',
              'Bienvenue à Bill Gabon ',
              {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
              }
          );
          setTimeout(function(){location.href = `${result.page}`;}, 700)
        }else{
          if(result.errors.email){
            toastr['warning'](
                'Un compte est déja associé à cette adresse, veuillez saisir une autre!',
                'Oupss : Adresse mail ',
                {
                  closeButton: true,
                  tapToDismiss: false,
                  rtl: isRtl
                }
            );
          }else{
            toastr['warning'](
                'Adresse mail ou mot de passe invalide!',
                'Oupss : erreur de connexion ',
                {
                  closeButton: true,
                  tapToDismiss: false,
                  rtl: isRtl
                }
            );
          }
        }
      })
      .catch(error => {
        toastr['error'](
          'Une erreur est survenue lors de la connexion au serveur, veuillez ressayer!',
          ' Erreur : '+ error,
          {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
          }
        );
      })

  });
});

</script>

@endsection
