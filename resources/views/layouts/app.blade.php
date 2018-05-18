<!Doctype HTML>
<html>

    <head>

        <meta charset="utf-8">
        <title>Blog</title>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"> </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link href="{{ url('custom.css') }}" rel="stylesheet" type="text/css" />

    </head>

        <body>

           @include('inc.navbar')

            <br><br>

          <div class="container">

            @if(Request::is('/'))
            @include('inc.showcase')
            @endif

            <div class="row">
              <div class="col-md-8 col-lg-8">

                  @include('inc.messages')

                @yield('content')

              </div>
              <div class="col-md-4 col-lg-4">
                @include('inc.sidebar')
              </div>
            </div>
          </div>



          <footer id='my_footer' class="text-center footer">
            <p> Using Laravel v5.5 </p>
            <p> Copyright &copy; Paweł Dudek </p>
          </footer>


        </body>

</html>
