@extends('home')

@section('konten')
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
  
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Produk</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="card card-primary">
                  
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="/product/update/{{ $product->id }}">
  
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
  
                    <div class="card-body">
                      <div class="form-group">
                        <label for="InputSKU">SKU</label>
                        <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" name="sku" id="InputSKU" 
                        required="required" placeholder="Masukkan SKU" value=" {{ $product->sku }}">
                        @if($errors->has('sku'))
                          <div class="text-danger">
                              {{ $errors->first('sku')}}
                          </div>
                        @endif
  
                      </div>
                      <div class="form-group">
                        <label for="InputProduct">Nama Produk</label>
                        <input type="text" class="form-control" id="InputProduct" name="productname" required="required" placeholder="Masukkan Produk" value=" {{ $product->productname }}">
                        @if($errors->has('productname'))
                          <div class="text-danger">
                              {{ $errors->first('productname')}}
                          </div>
                        @endif
  
                      </div>
                      <div class="form-group">
                        <label for="InputStock">Stock</label>
                        <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputStock" name="stock" 
                        required="required" placeholder="Masukkan Stock" value=" {{ $product->stock }}">
  
                        @if($errors->has('stock'))
                          <div class="text-danger">
                              {{ $errors->first('stock')}}
                          </div>
                        @endif
                      </div>
  
                      <div class="form-group">
                        <label for="InputPoint">Point</label>
                        <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputPoint" name="point" 
                        required="required" placeholder="Masukkan Point" value=" {{ $product->point }}">
  
                        @if($errors->has('point'))
                          <div class="text-danger">
                              {{ $errors->first('point')}}
                          </div>
                        @endif
                      </div>
  
                      <div class="form-group">
                        <label for="InputPrice">Harga</label>
                        <input type="text" onchange="return addCommas(this.value)" onkeypress="allowNumbersOnly(event)" class="form-control" 
                        id="InputPrice" name="price" required="required" placeholder="Masukkan Harga" value=" {{ $product->price }}">
                        @if($errors->has('price'))
                          <div class="text-danger">
                              {{ $errors->first('price')}}
                          </div>
                        @endif
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <button type="button" onclick="location.href='{{ url('product') }}'" class="btn btn-block btn-primary">Kembali</button>
            </div>
            
          </div>
          
      </div>
      
    </section>
@endsection