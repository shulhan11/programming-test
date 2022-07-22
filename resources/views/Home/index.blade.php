@extends('Template-Home.index')
@section('body')

<section class="pt-4">
  <h1 class="text-center">Departement Produksi</h1>
  
  <form action="/home">
    <div class="input-group mb-3" style="width: 30%">
      <input type="text" class="form-control" placeholder="Search.." name="search">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
    </form>
</section>

<section class="pt-4">

  <table class="table table-bordered table-responsive">
    <thead>
    <tr class="text-center" style="background-color: #b5926d; color:white">
      <th scope="col">No</th>
      <th scope="col">No Transaksi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">customer</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Diskon</th>
      <th scope="col">Ongkir</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">Info</th>
    </tr>
  </thead>
  <tbody>
    @if ($sales->count())
    @foreach ($sales as $item)
    <tr class="text-center">
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $item->kode }}</td>
      <td>{{ $item->created_at }}</td>
      <td>{{ $item->customer->name }}</td>
      <td>{{ $item->subtotal }}</td>
      <td>{{ $item->diskon }}</td>
      <td>{{ $item->ongkir }}</td>
      <td>{{ $item->total_bayar }}</td>
      <td class="text-center">
        <form action="/detail" >
          <input type="text" name="id" id="" value="{{ $item->id }}" hidden>
          <button type="submit" class="btn" style="background-color: #b5926d; color:white; font-weight: bold">Detail</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h1>Data transaksi tidak di temukan</h1>
@endif
  </section>

  <section class="text-end">
    <a href="/transaksi" class="btn text-end" style="background-color: #c9ad7f; color:white; font-weight: bold">Tambah Transaksi</a>
  </section>
@endsection

