@extends('admin.layout.master')

@section('status7')
class="treeview active"
@endsection

@section('status3')
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
Barang Masuk
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Barang</a></li>
@endsection

@section('nama1')
Barang Masuk
@endsection


@section('content')
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Barang Masuk</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="{{url('/barangmasuk/save')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">
              
              <div class="form-group">
                <label>No Nota</label>
                <input type="text" name="no_nota" class="form-control" id="exampleInputEmail1" placeholder="No Nota">
              </div>

              <div class="form-group">
                <label>Tanggal Masuk</label>

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
                <label>ID Distributor</label>
                <select class="form-control select2 select2-hidden-accessible" name="distributor" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <option selected="selected">Select........</option>
                  <?php
                    $iddistributor  = \App\Distributor::all();
                  ?>
                  @foreach($iddistributor as $p)
                  <option>{{$p->iddistributor}}</option>
                  @endforeach
                </select>
              </div>
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-6">
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
              <div class="form-group">
                <label>Total</label>
                <input type="number" name="total" class="form-control"  placeholder="Total">
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
              <h3 class="box-title">Data Preview Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Nota</th>
                  <th>Tanggal Masuk</th>
                  <th>ID Distributor</th>
                  <th>ID Petugas</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barangmasuk as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->nonota}}</td>
                  <td>{{$key->tanggalmasuk}}</td>
                  <td>{{$key->iddistributor}}</td>
                  <td>{{$key->idpetugas}}</td>
                  <td>{{$key->total}}</td>
                  <td>
                    <a href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a  href="{{url('barangmasuk/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>

        <div class="modal fade" id="modalEdit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Barang Masuk</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/barangmasuk/update/'.$key->id)}}" method="POST">
                  <div class="form-group">
                    <label>No Nota</label>
                    <input type="text" name="no_nota" class="form-control" value="{{$key->nonota}}" placeholder="No Nota">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Masuk:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="tanggal_masuk" class="form-control pull-right" value="{{$key->tanggalmasuk}}">
                    </div>
                <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>ID Distributor</label>
                    <select class="form-control select2 select2-hidden-accessible" name="id_distributor" value="{{$key->iddistributor}}" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected">Select........</option>
                      <?php
                       $iddistributor  = \App\Distributor::all();
                     ?>
                     @foreach($iddistributor as $p)
                     <option>{{$p->iddistributor}}</option>
                      @endforeach
                   </select>
                 </div>
                  <div class="form-group">
                    <label>ID Petugas</label>
                    <select class="form-control select2 select2-hidden-accessible" name="id_petugas" value="{{$key->idpetugas}}"  style="width: 100%;" tabindex="-1" aria-hidden="true">
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
                    <label>Total</label>
                    <input type="number" name="total" class="form-control" value="{{$key->total}}" placeholder="Total">
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