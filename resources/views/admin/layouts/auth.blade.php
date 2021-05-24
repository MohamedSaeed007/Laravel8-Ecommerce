<!DOCTYPE html>
@if (LaravelLocalization::getCurrentLocale() == 'ar')
    <html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="rtl">
@else
    <html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
@endif
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{ asset('adminpanel') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminpanel') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/vendors/css/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'vendors-rtl' : 'vendors' }}.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/bootstrap.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/colors.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/components.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/pages/page-auth.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/app-assets/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'css-rtl' : 'css' }}/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel') }}/app-assets/css-rtl/custom-rtl.css">
    @endif
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminpanel') }}/assets/css/{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'style-rtl' : 'style' }}.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    @yield('content')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('adminpanel') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('adminpanel') }}/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('adminpanel') }}/app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

    </script>
    <!-- Toastr -->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            var isRtl = $('html').attr('data-textdirection') === 'rtl';
            switch(type){
            case 'info':
            toastr['info']("{{ Session::get('message') }}", 'Info!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
            break;
        
            case 'warning':
            toastr['warning']("{{ Session::get('message') }}", 'Warning!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
            break;
        
            case 'success':
            toastr['success']("{{ Session::get('message') }}", 'Success!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
            break;
        
            case 'error':
            toastr['error']("{{ Session::get('message') }}", 'Error!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
            break;
            }
        @endif

    </script>
</body>
<!-- END: Body-->

</html>
