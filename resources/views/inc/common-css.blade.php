<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/js/loader.js') }}"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLE -->
<link href="{{ asset('plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/fullcalendar/custom-fullcalendar.advance.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLE -->
<style>
    .widget {
        margin-bottom: 10px;
        border: none;
        box-shadow: rgb(145 158 171 / 24%) 0px 0px 2px 0px, rgb(145 158 171 / 24%) 0px 16px 32px -4px;
    }
    .widget-content-area { border-radius: 6px; }
        .daterangepicker.dropdown-menu {
            z-index: 1059;
    }
</style>
<style>
    .navbar .navbar-item.navbar-dropdown {
        margin-left: auto;
    }


    .alt-menu #content .col-right {
        position: fixed;
        top: 0;
        width: 310px;
        right: -380px;
        border-radius: 0;
        z-index: 1029!important;
        transition: .3s ease all;
        width: 348px;
    }
    .alt-menu #content .col-right.show {
        right: 0;
    }
    .alt-menu.admin-header .toggle-notification-bar {
        display: block;
        cursor: pointer;
    }
    .alt-menu.overlay.show {
        display: block;
        opacity: .7;
    }
    .alt-menu.admin-header .toggle-notification-bar svg {
        width: 19px;
        height: 19px;
        stroke-width: 1.6px;
    }
    .alt-menu .col-right-content .col-right-content-container {
        position: relative;
        height: calc(100vh - 92px);
        padding: 0 0 0 0;
    }

    #content .col-left {
        margin-right: 0;
    }

    @media (max-width: 399px) {
        .alt-menu .col-right-content .col-right-content-container {
            padding-right: 15px;
        }
    }

    /*
        Just for demo purpose ---- Remove it.
    */
    /*<starter kit design>*/

    .widget-one {

    }
    .widget-one h6 {
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 0px;
        margin-bottom: 22px;
    }
    .widget-one p {
        font-size: 15px;
        margin-bottom: 0;
    }

</style>