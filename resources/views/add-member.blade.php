@extends('home')

@section('title-content')
    Tambah Member
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
            
            <form method="POST" action="/member/store">

              {{ csrf_field() }}

              <div class="card-body">
                <div class="form-group">
                  <label for="InputIdMember">Id Member</label>
                  <input type="text" class="form-control" name="idmember" id="InputIdMember" required="required" 
                  placeholder="Masukkan Id Member">
                  @if($errors->has('idmember'))
                    <div class="text-danger">
                        {{ $errors->first('idmember')}}
                    </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="InputKTP">KTP</label>
                  <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputKTP" name="ktp" 
                  required="required" placeholder="Masukkan Nomor KTP">
                  @if($errors->has('ktp'))
                    <div class="text-danger">
                        {{ $errors->first('ktp')}}
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="InputName">Nama Member</label>
                  <input type="text" class="form-control" id="InputName" name="name" 
                  required="required" placeholder="Masukkan Nama">
                  @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name')}}
                    </div>
                  @endif
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="dob"
                          required="required"/>
                          @if($errors->has('dob'))
                            <div class="text-danger">
                                {{ $errors->first('dob')}}
                            </div>
                          @endif
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>

                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="text" class="form-control" id="InputEmail" name="email" 
                    required="required" placeholder="Masukkan Alamat Email">
                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif
                </div>

                  <div class="form-group">
                        <label for="InputPhoneNumber">Nomor Ponsel</label>
                        <input type="text" onkeypress="allowNumbersOnly(event)" class="form-control" id="InputPhoneNumber" name="phonenumber" 
                        required="required" placeholder="Masukkan Nomor Ponsel">
                        @if($errors->has('phonenumber'))
                        <div class="text-danger">
                            {{ $errors->first('phonenumber')}}
                        </div>
                        @endif
                  </div>

                  <div class="form-group">
                    <label for="InputAddress">Alamat</label>
                    <input type="text" class="form-control" id="InputAddress" name="address" 
                    required="required" placeholder="Masukkan Alamat Member">
                    @if($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="InputUpline">Upline</label>
                    <input type="text" class="form-control" id="InputUpline" name="upline" 
                    required="required" placeholder="Masukkan Upline">
                    @if($errors->has('upline'))
                        <div class="text-danger">
                            {{ $errors->first('upline')}}
                        </div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="InputFirstProduct">Produk Pertama</label>
                    <input type="text" class="form-control" id="InputFirstProduct" name="firstproduct" 
                    required="required" placeholder="Masukkan Produk Pertama">
                    @if($errors->has('firstproduct'))
                        <div class="text-danger">
                            {{ $errors->first('firstproduct')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                  <label>Tanggal Join</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="joindate"
                        required="required"/>
                        @if($errors->has('joindate'))
                          <div class="text-danger">
                              {{ $errors->first('joindate')}}
                          </div>
                        @endif
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <button type="button" onclick="location.href='{{ url('member') }}'" class="btn btn-block btn-primary">Kembali</button>
      </div>
      
    </div>
@endsection