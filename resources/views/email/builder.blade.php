<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$data['context']}}">
    <meta name="keywords" content="{{$data['name']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['name']}}</title>
</head>

<body>
    <header class="header">
        <div class="header__navbar">
            <div class="container">
                <div class="header__navbar-wrapper">
                    <div class="header__navbar-header">
                        <h1>{{$data['name']}}</h1>
                    </div>
                    <div class="header__navbar-body">
                        <p>{{$data['context']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>