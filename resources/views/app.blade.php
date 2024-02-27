<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
