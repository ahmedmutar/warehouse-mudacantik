@extends('home')
@section('title-content')
    Tambah Produk
@endsection
@section('content')
<script>
  function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
        }
    }

    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
            
            <form method="POST" action="/product/store">

              {{ csrf_field() }}

              <div class="card-body">
                <div class="form-group">
                  <label for="InputSKU">SKU</label>
                  <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" name="sku" id="InputSKU" required="required" placeholder="Masukkan SKU">
                  @if($errors->has('sku'))
                    <div class="text-danger">
                        {{ $errors->first('sku')}}
                    </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="InputProduct">Nama Produk</label>
                  <input type="text" class="form-control" id="InputProduct" name="productname" required="required" placeholder="Masukkan Produk">
                  @if($errors->has('productname'))
                    <div class="text-danger">
                        {{ $errors->first('productname')}}
                    </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="InputStock">Stock</label>
                  <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputStock" name="stock" required="required" placeholder="Masukkan Stock">

                  @if($errors->has('stock'))
                    <div class="text-danger">
                        {{ $errors->first('stock')}}
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="InputPoint">Point</label>
                  <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputPoint" name="point" required="required" placeholder="Masukkan Point">

                  @if($errors->has('point'))
                    <div class="text-danger">
                        {{ $errors->first('point')}}
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="InputPrice">Harga</label>
                  <input type="text" onchange="return addCommas(this.value)" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputPrice" name="price" required="required" placeholder="Masukkan Harga">
                  @if($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price')}}
                    </div>
                  @endif
                </div>
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <button type="button" onclick="location.href='{{ url('product') }}'" class="btn btn-block btn-primary">Kembali</button>
      </div>
      
    </div>
@endsection