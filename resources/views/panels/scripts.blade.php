<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
<script>

    function get_url(tag){

        switch(tag){
            case 'api.logout':
                return "{{ route('api.logout') }}";
            default:
        }

    }

    var isRtl = $('html').attr('data-textdirection') === 'rtl';
    function logout(){
        // document.getElementById('logout-form').submit();
        return fetch(`${get_url('api.logout')}`)
                .then( response => response.json() )
                .then((result) => {
        if(result.status == true){
            location.reload();
        }else{
          toastr['warning'](
              'Une erreur est survenue durant la déconnexion au serveur!',
              'Oupss !!!',
              {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
              }
          );
        }

        $("#action span").addClass('d-none')
        $("#action").removeClass('disabled')
      })
      .catch(error => {
        toastr['warning'](
              'Une erreur est survenue durant la déconnexion au serveur!',
              'Oupss !!!',
              {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
              }
        );
      })
    }
</script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
