<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

    <section class="text-center p-5">
        <h1>Detail Produksi</h1>
    </section>

    <section class="d-flex flex-row gap-3 justify-content-center align-items-center p-3">
    @foreach ($salesdet as $item)
        <div class="card rounded shadow" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->barang->nama }}</h5>
                <h3 class="card-subtitle mb-2 fw-bold">Rp.{{ $item->harga_bandrol }}</h3>
                <h6 class="card-subtitle mb-2 text-muted">QTY : {{ $item->qty }}</h6>
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                      Detail diskon
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">{{ $item->diskon_pct }}%</button>
                    <button type="button" class="list-group-item list-group-item-action">Rp.{{ $item->diskon_nilai }}</button>
                    <button type="button" class="list-group-item list-group-item-action">Rp.{{ $item->harga_diskon }}</button>
                    <button type="button" class="list-group-item list-group-item-action">Rp. {{ $item->total }}</button>
                  </div>
            </div>
        </div>
        @endforeach
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
