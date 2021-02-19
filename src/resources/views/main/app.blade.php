<!doctype html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title> @yield('tittle') </title>
</head>

<body>
    <div class="container-fluid">
        <div class="h-10 mt-3">
            @include('main.menu')
        </div>
       
        <div class="w-75 rounded shadow mx-auto mt-4">
            @yield('content')
        </div>            
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        var autoNumericElements = [];
        if($('.currency').length){
            var autoNumericOptions = {
                allowDecimalPadding: false,
                alwaysAllowDecimalCharacter: true,
                caretPositionOnFocus: "end",
                createLocalList: false,
                currencySymbol: "R$",
                decimalCharacter: ",",
                decimalCharacterAlternative: ".",
                digitGroupSeparator: ".",                
            };
            autoNumericElements = AutoNumeric.multiple('.currency', autoNumericOptions);
        } 
        
        function formSubmit(form){
            if(autoNumericElements.length > 0){
                autoNumericElements[0].formSubmitLocalized();
            }else{
                form.submit();
            }
        }
        @if(session('success'))
            alertify.success('{{session("success")}}');
        @endif
        @if(session('error'))
            alertify.success('{{session("error")}}');
        @endif

    </script>
</body>
