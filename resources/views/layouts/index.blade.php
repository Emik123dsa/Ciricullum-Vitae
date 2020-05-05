<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF_TOKEN -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" 
        integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" 
        crossorigin="anonymous" />
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <title>CV</title>

        <link href="{{ asset('jenkins.png') }}" rel="shortcut icon" type="image/x-icon">
</head>

<body>
    
    <!-- INITIAL APP PROVIDER FOR VUE RENDERING -->
   <div id="app">
 
   </div>
    <script type="text/javascript" src="{{ asset('js/entry-client.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165425194-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-165425194-1');
    </script>
</body>

</html>