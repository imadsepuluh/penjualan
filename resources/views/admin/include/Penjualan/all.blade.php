@extends('admin.layout.master')

@section('status7')
class="treeview "
@endsection

@section('status5')
class="active"
@endsection

@section('status10')
class="treeview active"
@endsection

@section('status11')
class="treeview"
@endsection

@section('status9')
class="treeview"
@endsection


@section('nama')
Penjualan
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Penjualan</a></li>
@endsection

@section('nama1')
Penjualan
@endsection


@section('content')
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Penjualan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="{{url('/penjualan/save')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">
              
              <div class="form-group">
                <label>No Faktur</label>
                <input type="text" name="no_faktur" class="form-control"  placeholder="No Faktur">
              </div>

              <div class="form-group">
                <label>Tanggal Penjualan:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tanggal_masuk" class="form-control pull-right">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>ID Petugas</label>
                <select class="form-control select2 select2-hidden-accessible" name="petugas" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <option selected="selected">Select........</option>
                  <?php
                    $idpetugas  = \App\Petugas::all();
                  ?>
                  @foreach($idpetugas as $p)
                  <option>{{$p->idpetugas}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Bayar</label>
                <input type="text" name="bayar" class="form-control" placeholder="Bayar">
              </div>

              <div class="form-group">
                <label>Sisa</label>
                <input type="text" name="sisa" class="form-control" placeholder="Sisa">
              </div>

              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" class="form-control"  placeholder="Total">
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
              <h3 class="box-title">Data Preview Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Faktur</th>
                  <th>Tanggal Penjualan</th>
                  <th>Petugas</th>
                  <th>Bayar</th>
                  <th>Sisa</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($penjualan as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->nofaktur}}</td>
                  <td>{{$key->tanggalpenjualan}}</td>
                  <td>{{$key->idpetugas}}</td>
                  <td>{{$key->bayar}}</td>
                  <td>{{$key->sisa}}</td>
                  <td>{{$key->total}}</td>
                  <td>
                    <a href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a href="{{url('penjualan/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>

        <div class="modal fade" id="modalEdit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/penjualan/update/'.$key->id)}}" method="POST">
                  <div class="form-group">
                    <label>No Faktur</label>
                    <input type="text" name="no_faktur" class="form-control" placeholder="No Faktur" value="{{$key->nofaktur}}">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Penjualan:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="tgl_penjualan" value="{{$key->tanggalpenjualan}}" class="form-control pull-right" >
                    </div>
                <!-- /.input group -->
                  </div>
                  <div class="form-group">
                   <label>ID Petugas</label>
                   <select class="form-control select2 select2-hidden-accessible" name="idpetugas" value="{{$key->idpetugas}}" style="width: 100%;" tabindex="-1" aria-hidden="true">
                     <option selected="selected">Select........</option>
                      <?php
                        $idpetugas  = \App\Petugas::all();
                      ?>
                      @foreach($idpetugas as $p)
                      <option>{{$p->idpetugas}}</option>
                      @endforeach
                   </select>
                 </div>
                  <div class="form-group">
                    <label>Bayar</label>
                    <input type="text" name="bayar" class="form-control" placeholder="Bayar" value="{{$key->bayar}}">
                  </div>
                  <div class="form-group">
                    <label>Sisa</label>
                    <input type="text" name="sisa" class="form-control" placeholder="Sisa" value="{{$key->sisa}}">
                  </div>
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="total" class="form-control" placeholder="Total" value="{{$key->total}}">
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