@extends('home')

@section('title-content')
    Tambah Alamat
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
            
            <form method="POST" action="/address/store">

              {{ csrf_field() }}

              <div class="card-body">
                <div class="form-group">
                  <label for="InputName">Nama</label>
                  <input type="text" class="form-control" name="name" id="InputName" required="required" placeholder="Masukkan Nama">
                  @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name')}}
                    </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="InputPhoneNumber">Nomor Ponsel</label>
                  <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputPhoneNumber" name="phonenumber" required="required" placeholder="Masukkan Nomor Ponsel">
                  @if($errors->has('phonenumber'))
                    <div class="text-danger">
                        {{ $errors->first('phonenumber')}}
                    </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="InputAddress">Alamat</label>
                  <input type="text" class="form-control" id="InputAddress" name="address" required="required" placeholder="Masukkan Alamat">

                  @if($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address')}}
                    </div>
                  @endif
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <button type="button" onclick="location.href='{{ url('address') }}'" class="btn btn-block btn-primary">Kembali</button>
      </div>
      
    </div>
@endsection