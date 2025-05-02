<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport"  content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-comm Project</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <head></head>
        <body>
            {{View::make('header')}}
        
            <main>
                @yield('content')
            </main>
        
            {{View::make('footer')}}
        </body>
                    <style>
                    html, body {
                        height: 100%;
                        margin: 0;
                        display: flex;
                        flex-direction: column;
                    }

                    main {
                        flex: 1;
                    }

                .custom-login{
                    height: 500px;
                    padding-top: 150px;
                }
                .slider-img{
                    height: 400px !important;
                    align-items: center !important;
                }
                .carousel-control-prev{
                    background-color: #000 !important;
                    align-items: left !important;
                    left-margin: 0px !important;

                }
                .carousel-control-next{
                    background-color: #000 !important;
                    
                }
                .trending-img{
                    height: 100px;
                }
                .trending-wrapper{
                    margin: 30px;
                }
                .trending-item{
                    float: left;
                    width: 20%;
                }
                .search-box{
                    width: 500px !important;
                }

                </style>
                    </html>