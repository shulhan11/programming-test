<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <form action="/transaksi" method="POST">
  @csrf
  <body>
    <div class="container">
      <div class="row mt-4" >
        <div class="col-4 p-3 me-4 rounded shadow" style="background-color: #fcf5c7">
          <section>
            <div class="text-dark fw-bold fs-1">Transaksi</div>
            <hr>
              <div>
                <label for="no_transaksi">
                  No
                  <input type="text" id="no_transaksi" name="kode" value="{{ date('Ym') . '-' . $kode  }}" class="form-control @error ('no_transaksi') is-invalid @enderror" readonly>
                </label>
                <br>
                <label for="Tanggal">
                  Tanggal
                  <input type="date" id="tanggal" name="tanggal" class="form-control @error ('tanggal') is-invalid @enderror">
                </label>
              </div>
            </section>
        </div>
        <div class="col-4 p-3 me-4 rounded shadow" style="background-color: #fcf5c7">
          <section>
            <div class="text-dark fw-bold fs-1">Customer</div>
            <hr>
            <input type="text" id="id_cs" name="customer_id" class="form-control" hidden>
            <div>
              <label for="kode_cs">
                kode
                <div class="input-group mb-3">
                  <input type="text" id="kode_cs"  class="form-control" placeholder="Name" required>
                  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#customer">Button</button>
                </div>
              </label>
              <br>
              <label for="nama">
                nama
                <input type="text" id="nama"  class="form-control" readonly>
              </label>
              <br>
              <label for="telp">
                Telephone
                <input type="text" id="telp"  class="form-control" readonly>
              </label>
            </div>
          </section>
        </div>
      </div>
      <div class="row mt-5" >
        <div class="col me-4 rounded shadow" style="background-color: #fcf5c7">
          <section>
            <h1>Barang Detail</h1>
            <hr>
            <table class="table table-bordered text-center" id="tableBR">
              <thead class="bg-dark text-light">
                <tr >
                  <th scope="col" rowspan="2"><button type="button" class="btn" style="background-color: #fcf5c7; font-weight: bold" data-bs-toggle="modal" data-bs-target="#barang">
                    Tambah
                  </button></th>
                  <th scope="col" rowspan="2">No</th>
                  <th scope="col" rowspan="2">Kode Barang</th>
                  <th scope="col" rowspan="2">Nama Barang</th>
                  <th scope="col" rowspan="2">Qty</th>
                  <th scope="col" rowspan="2">hargaBandrol</th>
                  <th scope="col" colspan="2">diskon</th>
                  <th scope="col" rowspan="2">Harga Diskon</th>
                  <th scope="col" rowspan="2">Total</th>
                </tr>
                <tr>
          
                  <th scope="col">%</th>
                  <th scope="col">(Rp)</th>
          
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </section>
        </div>
        <div class="col-5 me-4 rounded shadow p-4" style="background-color: #fcf5c7; width:20%">
          <label for="sub_total">
            Sub Total
            <input type="text" name="subtotal" id="sub_total" class="form-control" value="0" readonly>
          </label>
          <label for="diskon_total">
            Diskon
            <input type="text" name="diskon" id="diskon_total" value="0" class="form-control @error ('diskon_total') is-invalid @enderror" required>
          </label>
          <label for="ongkir">
            Ongkir
            <input type="text" name="ongkir" id="ongkir" class="form-control @error ('ongkir') is-invalid @enderror" value="0" required>
          </label>
          <label for="total_bayar">
            Total Bayar
            <input type="text" name="total_bayar" id="total_bayar" class="form-control" value="0" readonly>
          </label>
          <div class="d-grid gap-2 d-md-block mt-2">
            <button class="btn btn-dark fw-bold" type="submit">Simpan</button>
            <a href="/home" class="btn btn-dark fw-bold" type="button">Batal</a>
          </div>
        </div>
      </div> 
    </div>
{{-- <input type="text" id="sales_id" name="sales_id" class="form-control"> --}}




<!--! Modal Customer -->
<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-borderd table-striped" id="table1">
          <thead>
              <tr>
                <td>No</td>
                <td>Kode Customer</td>
                <td>Nama</td>
                <td>Telphone</td>
                <td>Action</td>
              </tr>
          </thead>
          <tbody>
            @foreach ($customer as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->kode }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->telphone }}</td>
              <td>
                <button type="button" class="btn btn-primary" id="cs" 
                data-id_cs="{{ $item->id }}"
                data-kode_cs="{{ $item->kode }}"
                data-name="{{ $item->name }}"
                data-telp="{{ $item->telphone }}"> Pilih</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




{{--! Modal Barang --}}
<div class="modal fade" id="barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-borderd table-striped" id="table2">
          <thead>
              <tr>
                <td>No</td>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Action</td>
              </tr>
          </thead>
          <tbody>
            @foreach ($barang as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->kode }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->harga }}</td>
              <td>
                <button type="button" class="btn btn-primary" id="br"
                data-id_br="{{ $item->id }}"
                data-kode_br="{{ $item->kode }}"
                data-nama_br="{{ $item->nama }}"
                data-harga_br="{{ $item->harga }}">Pilih</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </section>
  


</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

  //* Customer 
  $(document).ready(function(){
    $(document).on('click', '#cs', function() {
        const id_cs = $(this).data('id_cs');
        const kode_cs = $(this).data('kode_cs');
        const name = $(this).data('name');
        const telp = $(this).data('telp');

        $('#id_cs').val(id_cs);
        $('#kode_cs').val(kode_cs);
        $('#nama').val(name);
        $('#telp').val(telp);
        $('#customer').modal('hide');
      });
    });
    
    //* Barang
    $(document).ready(function(){
      let baris = 0;
      $(document).on('click','#br', function(){
        const id_br = $(this).data('id_br');
        const kode_br = $(this).data('kode_br');
        const nama_br = $(this).data('nama_br');
        const harga = $(this).data('harga_br');

      baris = baris+1;
      let barangs = `<tr id=baris> ${baris}>`
            barangs += `<td hidden><input type="text" id="id_br" name="id_br[]" value="${id_br}" class="form-control" hidden></td>`
            barangs += `<td><button type="button" class="btn btn-danger" id="hapus_br">Hapus</button></td>`
            barangs += `<td>${baris}</td>`
            barangs += `<td ><input type="text" id="kode_br"  value="${kode_br}" class="form-control" readonly></td>`
            barangs += `<td ><input type="text" id="kode_br"  value="${nama_br}" class="form-control" readonly></td>`
            barangs += `<td ><input type="number" id="qty" name="qty[]" value=0 class="qty${baris} form-control"></td>`
            barangs += `<td ><input type="decimal" id="harga_bandrol" name="harga_bandrol[]" value="${harga}" class="harga_bd${baris} form-control" readonly></td>`
            barangs += `<td ><input type="decimal" id="persen" name="persen[]" class="ps${baris} form-control" value=0></td>`
            barangs += `<td ><input type="decimal" id="rupiah" name="rupiah[]" value=0 class="rp${baris} form-control" readonly></td>`
            barangs += `<td ><input type="decimal" id="harga_diskon" name="harga_diskon[]" value=0 class="harga_diskon${baris} form-control" readonly></td>`
            barangs += `<td ><input type="decimal" id="total" name="total[]" value=0 class="total${baris} totall form-control" readonly></td>`
            barangs += `</tr>`
      $('#tableBR').append(barangs);

          for(let i=0;i< baris;i++){
            $(`.qty${baris}`).on('keyup',function(){
              
              const hargaBandrol = $(`.harga_bd${baris}`).val();
              const persen =  $(`.ps${baris}`).val() /100;
              const rp = hargaBandrol * persen;
              const diskon = hargaBandrol - rp;
              const hargaDiskon = $(`.harga_diskon${baris}`).val(diskon)
              const qty =  $(`.qty${baris}`).val();
              const total = qty * diskon
              const total_q =  $(`.total${baris}`).val(total);
              var sum = 0;
                  $(".totall").each(function(){
                      sum += +$(this).val();
                  });
                  $("#sub_total").val(sum);
              for(let i=0;i< baris;i++){
                $(`.ps${baris}`).on('keyup',function(){

              const persen =  $(`.ps${baris}`).val() /100;
              const rp = hargaBandrol * persen;
              const rupiah = $(`.rp${baris}`).val(rp);
              const diskon = hargaBandrol - rp;
              const hargaDiskon = $(`.harga_diskon${baris}`).val(diskon)
              const total = qty * diskon
              let total_q =  $(`.total${baris}`).val(total);
                  var sum = 0;
                  $(".totall").each(function(){
                      sum += +$(this).val();
                  });
                  $("#sub_total").val(sum);
            });
          }
        });
      }

      
      
      $('#barang').modal('hide');
    });
    
    $(document).on('change','#diskon_total',function(){
      const Tdiskon = $('#sub_total').val() -  $('#diskon_total').val();
      $('#total_bayar').val(Tdiskon);
      $(document).on('change','#ongkir',function(){
        const Tbayar = Tdiskon - $('#ongkir').val();
        $('#total_bayar').val(Tbayar);
      })
    })

    $(document).on('click','#hapus_br',function(){
      $('#baris').remove()
    });

  
  });
</script>

</body>
</html>