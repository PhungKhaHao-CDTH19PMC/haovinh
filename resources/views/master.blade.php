<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Starter Kit - Boxed Layout</title>
    @include('inc.common-css');

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
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

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="sidebar-noneoverflow starterkit admin-header alt-menu">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        @include('inc.side-bar')
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="content-container">

                    <div class="col-left">
                        <div class="col-left-content">
                            @include('inc.breadcrumb')
                            @yield('main-content')
                            @include('inc.footer')
                        </div>
                    </div>
                    @include('inc.col-right')
                </div>
            </div>
            
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    @include('inc.common-js')
</body>
</html>