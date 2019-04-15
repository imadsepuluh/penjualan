@extends('admin.layout.master')

@section('status7')
class="treeview"
@endsection

@section('status10')
class="treeview"
@endsection

@section('status11')
class="treeview"
@endsection


@section('status9')
class="treeview active"
@endsection

@section('status4')
class="active"
@endsection

@section('nama')
Petugas
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Lainnya</a></li>
@endsection

@section('nama1')
Petugas
@endsection


@section('content')
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Petugas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="{{route('simpan_Petugas')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">
              
              <div class="form-group">
                <label>Id Petugas</label>
                <input type="text" name="id_petugas" class="form-control" placeholder="Id Petugas">
              </div>

              <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas">
              </div>

              <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat ..."></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <br>
             <div class="col-lg-6" style="margin-top: 5px;">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <label>Nomor Handphone:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="telpon" data-inputmask='"mask": "(999) 999-9999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
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
              <h3 class="box-title">Data Preview Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Distributor</th>
                  <th>Nama Distributor</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Telpon</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($petugas as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->idpetugas}}</td>
                  <td>{{$key->namapetugas}}</td>
                  <td>{{$key->alamat}}</td>
                  <td>{{$key->email}}</td>
                  <td>{{$key->telpon}}</td>
                  <td>
                    <a href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a href="{{url('petugas/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>

                <div class="modal fade" id="modalEdit{{$key->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Petugas</h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('/petugas/update/'.$key->id)}}" method="POST">
                          <div class="form-group">
                           <label>Id Petugas</label>
                            <input type="text" name="idpetugas" class="form-control" value="{{$key->idpetugas}}" placeholder="Id Petugas">
                          </div>
                         <div class="form-group">
                           <label>Nama Petugas</label>
                           <input type="text" name="namapetugas" class="form-control" value="{{$key->namapetugas}}" placeholder="Nama Petugas">
                         </div>
                         <div class="form-group">
                         <label>Alamat</label>
                           <textarea class="form-control" name="alamat" rows="3" value="{{$key->alamat}}" placeholder="Alamat ..."></textarea>
                         </div>
                         <div class="form-group">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                             <input type="email" name="email" class="form-control" placeholder="Email" value="{{$key->email}}">
                           </div>
                          </div>
        
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                             </div>
                             <input type="text" class="form-control"  name="telpon" placeholder="Phone Number" value="{{$key->telpon}}">
                           </div>
                           <!-- /.input group -->
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