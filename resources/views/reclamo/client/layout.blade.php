@php
// necesario para los plugins de jquery
wp_enqueue_script('lrp_jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', '', '1.0.0');
wp_enqueue_style('lrp_boostrapGridMin', asset('css/bootstrap-grid.min.css'), '', '1.0.0');

wp_enqueue_script('lrp_intTelinputJS2', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js', '', '1.0.0');

wp_enqueue_style('lrp_intTelinputCSS2', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css', '', '1.0.0');

wp_enqueue_style('lrp_Select2CSS', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', '', '1.0.0');

wp_enqueue_script('lrp_Select2JS', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', '', '1.0.0');

// sweet alert
wp_enqueue_script('lrp_SweetAlertJS', 'https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js', '', '1.0.0');

// librerias datetime
wp_enqueue_script('lrp_flatPickrJS', 'https://cdn.jsdelivr.net/npm/flatpickr', '', '1.0.0');
wp_enqueue_script('lrp_flatPickrJSLocation', 'https://npmcdn.com/flatpickr/dist/l10n/es.js', '', '1.0.0');

// wp_enqueue_style('lrp_flatPickrCSS', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', '', '1.0.0');
wp_enqueue_style('lrp_flatPickrDarkCSS', 'https://npmcdn.com/flatpickr/dist/themes/airbnb.css', '', '1.0.0');

wp_enqueue_style('lrp_styles', asset('css/lrp_styles.css'), '', '1.0.2');
@endphp
<div>
    @yield('content')

</div>

@yield('scripts')
