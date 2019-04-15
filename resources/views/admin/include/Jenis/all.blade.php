@extends('admin.layout.master')

@section('status7')
class="treeview active"
@endsection

@section('status15')
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
Jenis
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Barang</a></li>
@endsection

@section('nama1')
Jenis
@endsection


@section('content')
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Jenis</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="{{url('/jenis/save')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">

              <div class="form-group">
                <label>Kode Jenis</label>
                <input type="text" name="kodejenis" class="form-control"  placeholder="Kode Jenis">
              </div>
              
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">

              <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="jenis" class="form-control"  placeholder="Jenis">
              </div>

             </div>
            <!-- /.col -->
              
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
              <h3 class="box-title">Data Preview Jenis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jenis</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jenis as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->kodejenis}}</td>
                  <td>{{$key->jenis}}</td>
                  <td>
                    <a href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a  href="{{url('jenis/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>

        <div class="modal fade" id="modalEdit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jenis</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/jenis/update/'.$key->id)}}" method="POST">
                  <div class="form-group">
                    <label>Kode Jenis</label>
                    <input type="text" name="kodejenis" class="form-control" placeholder="Kode Jenis" value="{{$key->kodejenis}}">
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <input type="text" name="jenis" class="form-control" placeholder="Jenis" value="{{$key->jenis}}">
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