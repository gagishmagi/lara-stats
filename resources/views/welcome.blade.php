<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- React root DOM -->
    <div id="user">
    </div>

    <!-- React JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript'>
    async function data() {
        // Set the data text
        var dataText = "page={{ $req_url ?? '' }}&referrer={{ $refer_url ?? '' }}";
        var res;

        // Create the AJAX request with axios
        if(fetch){
            await fetch('/api/clicks', { method: 'POST' , body : dataText });
            document.getElementsByClassName('card-body')[0].innerHtml = 'Your page view has been added to the statistics!';
        }
        else if(axios){
            await axios.post('/api/clicks', { body: {data: dataText} })
            document.getElementsByClassName('card-body').innerHtml = 'Your page view has been added to the statistics!';
        }else if($){

            $.ajax({
                type: "POST",                    // Using the POST method
                url: "/api/clicks",             // The file to call
                data: dataText,                  // Our data to pass
            }).then(function() {            // What to do on success
                    $('.card-body').html( 'Your page view has been added to the statistics!' );
            });
        }

    };
    data();
    </script>

</body>
</html>
