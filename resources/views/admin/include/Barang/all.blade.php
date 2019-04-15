@extends('admin.layout.master')

@section('status7')
class="treeview active"
@endsection

@section('status1')
class="active"
@endsection

@section('status10')
class="treeview"
@endsection

@section('status11')
class="treeview"
@endsection

@section('status9')
class="treeview"
@endsection



@section('nama')
Barang
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Barang</a></li>
@endsection

@section('nama1')
Barang
@endsection


@section('content')
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Barang</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="{{url('/barang/save')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">
              
              <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" id="exampleInputEmail1" placeholder="Kode Barang">
              </div>

              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Kode Jenis</label>
                <select class="form-control select2 select2-hidden-accessible" name="kode_jenis" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Select........</option>
                  <?php
                    $kodejenis  = \App\Jenis::all();
                  ?>
                  @foreach($kodejenis as $p)
                  <option>{{$p->kodejenis}}</option>
                  @endforeach
                  
                </select>
              </div>
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Stok">
              </div>

              <div class="form-group">
                <label>Harga Netral</label>
                <input type="text" name="harga_netral" class="form-control" id="exampleInputEmail1" placeholder="Harga Netral">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Harga Jual</label>
                <input type="text" name="harga_jual" class="form-control" id="exampleInputEmail1" placeholder="Harga Jual">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>

<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Preview Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Kode Jenis</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga Netral</th>
                  <th>Harga Jual</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barang as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->kodebarang}}</td>
                  <td>{{$key->kodejenis }}</td>
                  <td>{{$key->namabarang}}</td>
                  <td>{{$key->stok}}</td>
                  <td>{{$key->harganet}}</td>
                  <td>{{$key->hargajual}}</td>
                  <td>
                    <a  href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a href="{{url('barang/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
        <div class="modal fade" id="modalEdit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Barang</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/barang/update/'.$key->id)}}" method="POST">
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="{{$key->kodebarang}}" placeholder="Kode Barang">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="{{$key->namabarang}}" placeholder="Nama Barang">
                  </div>
                  <div class="form-group">
                    <label>Kode Jenis</label>
                   <select class="form-control select2 select2-hidden-accessible" name="kode_jenis" value="{{$key->kodejenis }}" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     <option selected="selected">Select........</option>
                     <?php
                       $kodejenis  = \App\Jenis::all();
                     ?>
                     @foreach($kodejenis as $p)
                     <option>{{$p->kodejenis}}</option>
                     @endforeach
                  
                   </select>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" value="{{$key->stok}}" placeholder="Stok">
                  </div>
                  <div class="form-group">
                    <label>Harga Netral</label>
                    <input type="text" name="harga_netral" class="form-control" value="{{$key->harganet}}" placeholder="Harga Netral">
                  </div>
                  <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" class="form-control" value="{{$key->hargajual}}" placeholder="Harga Jual">
                  </div>

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                @csrf
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection