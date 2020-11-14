@extends('home')
@section('title-content')
Member
@endsection
@section('content')
    
    <div class="row">        
        <div class="col-12">
          <button type="button" onclick="location.href='{{ url('add-member') }}'" class="btn btn-block btn-primary">Tambah Member</button>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Member</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Nomor Ponsel</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($member as $p)
                  {{-- <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->phonenumber}}</td>
                    <td>{{$p->address}}</td>
                    <td>
                      <a href="/address/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                      <a href="/address/remove/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                  </td>
                  </tr> --}}
                  @endforeach
                    
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
@endsection