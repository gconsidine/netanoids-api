<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Netanoids" />
    <meta name="author" content="Greg Considine" />
    
    <title>Netanoids | @yield('title')</title>
    <link rel="stylesheet" href="/css/netanoids.css" />
    <link href="/img/prod/favicon.png" rel="shortcut icon" />

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46817449-1', 'greg-considine.com');
      ga('send', 'pageview');
    </script>
  </head>
  
  <body>
    @yield('content')
  </body>
</html>
