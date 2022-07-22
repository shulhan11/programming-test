<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .gradient{
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(to right,#9400d3 ,rgb(255, 255, 50) )
    }
    .overlay{
        width: 100%;
        height: 100vh;
        background-image: #000;
        z-index: 1;
        opacity: .9;
    }

    .bg-card{
        display: block;
        background-color: rgba(255, 255, 255, 0.5);
        

    }
</style>
<body>
    
    <section class="gradient overlay  d-flex justify-content-center align-items-center">
        <div  class="bg-card text-center p-5 rounded shadow">
            <h1 class="fw-bold text-dark">un-Official PT.Mitra Sinerji Teknoindo</h1>
            <h2 class="fw-bold text-dark">Departement Produksi</h2>
            <h3 class="fw-bold text-dark">Programming Test</h2>
            <h4 class=" text-dark">By Shulhan Hasya</h2>
            <div class="d-grid gap-2 d-md-block mt-5">
                <a href="/home" class="btn btn-light fw-bold">Data Transaksi</a>
                <a href="/transaksi" class="btn btn-light fw-bold">Tambah Transaksi</a>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>