<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>{{$toko}}</h1></center>
    @foreach ($data as $barang )
        nama : {{ $barang['nama_barang'] }} <br>
        harga: {{ $barang['harga'] }} <br>
        qty: {{ $barang['jumlah'] }} <br>
        @php $total = $barang['jumlah'] * $barang['harga']; @endphp
        total:{{$total}} <br>
        <hr>

    @endforeach
</body>
</html>