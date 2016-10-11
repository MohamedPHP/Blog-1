<!DOCTYPE html>
<html>
    <head>
        <title>Admin Area</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        @yield('styles')
        <style media="screen">
            .glyphicon-remove{
                cursor: pointer;
            }
        </style>
    </head>
    <body style="background-color:#34495e;color#fff;">
        @include('includes.backnav')
        <div class="container">
            @yield('content')
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.glyphicon-remove').click(function() {
                    $('.alert').slideUp(150);
                });
            });
            var baseUrl = '{{ URL::to('/') }}';
        </script>

        @yield('scripts')
    </body>
</html>
