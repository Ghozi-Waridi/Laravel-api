<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container" style="text-align: center,"> 
        <h1>Data Laptop</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Price</th>
                    <th>type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laptop as $datalaptop)
                    <tr>
                        <th>{{ $datalaptop -> name }}</th>
                        <th>{{ $datalaptop -> price }}</th>
                        <th>{{ $datalaptop -> type }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>