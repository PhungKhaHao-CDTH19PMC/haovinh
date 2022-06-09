<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Starter Kit - Boxed Layout</title>
    @include('inc.common-css')
  
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

                    <div class="col-left layout-top-spacing">
                        <div class="col-left-content">
                            @include('inc.breadcrumb')
                                @if (!empty($breadcrumb['page']))
                                    <h6 class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['page'] }}</h6>
                                @endif
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
    <!-- END MAIN CONTAINER -->
    @include('inc.common-js')
</body>
</html>