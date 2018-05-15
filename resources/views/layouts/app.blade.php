<!Doctype HTML>
<html>

    <head>

        <meta charset="utf-8">
        <title>BasicPage</title>


        <link rel="stylesheet" href="/css/bootstrap.css">

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
