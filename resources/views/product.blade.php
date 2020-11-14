@extends('home')

@section('title-content')
Produk
@endsection

@section('content')  
  <div class="row">
      <div class="col-12">
        <button type="button" onclick="location.href='{{ url('add-product') }}'" class="btn btn-block btn-primary">Tambah Produk</button>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Produk</h3>

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
                  <th>SKU</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Point</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $p)
                <tr>
                  <td>{{$p->sku}}</td>
                  <td>{{$p->productname}}</td>
                  <td>Rp {{$p->price}}</td>
                  <td>{{$p->point}}</td>
                  <td>
                    <a href="/product/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                    <a href="/product/remove/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                </td>
                </tr>
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