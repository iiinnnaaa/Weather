<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather</title>
</head>
<body class="">
<h1>Welcome to WeatherApp</h1>
<h2>Please selec the country to see how's the weather there :) </h2>
<form>
    <label for="countries">Choose a country:</label>
    <select name="countries" id="countries">
        <option value=""></option>
    </select>
    <label for="cities">City:</label>
    <select name="cities" id="cities">
        <option value=""></option>
    </select>
    <button>Submit</button>
</form>
</body>
</html>
