<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DishCover Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    <body>
            @include('components.navbar')

            <div class="content">
                @include('components.ContentResep')
            </div>
    </body>