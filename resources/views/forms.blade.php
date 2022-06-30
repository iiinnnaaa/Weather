<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather</title>
</head>
<body class="body">
<h1>Welcome to WeatherApp</h1>
<h2>Please selec the country to see how's the weather there :) </h2>
<form>
    <div class="form-group">
    <label for="countries">Choose a country:</label>
    <select name="countries" id="countries">
        <option value="">Country</option>
        @foreach ($countries as $data)
            <option value="{{$data->id}}">
                {{$data->name}}
            </option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <select class="form-control" id="city-dropdown">

        </select>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function (){
        $('#countries').on('change',function (){
            console.log('hello')

            let country_id = this.value;
            console.log('hello');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    country_id: country_id
                },
                cache: false,
                success: function (result){
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result, function (key, value) {
                        $("#city-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            })
        })
    })
</script>


</body>
</html>
