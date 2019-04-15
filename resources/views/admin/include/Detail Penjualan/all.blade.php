@extends('admin.layout.master')

@section('status7')
class="treeview "
@endsection

@section('status6')
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
Detail Penjualan
@endsection

@section('nama3')
Preview
@endsection

@section('nama2')
<li><a href="#">Data Penjualan</a></li>
@endsection

@section('nama1')
Detail Penjualan
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
          <form method="POST" action="{{url('/detailpenjualan/save')}}"  enctype="multipart/form-data">
          @csrf
          <div class="row">
           
            <div class="col-md-6">
              
              <div class="form-group">
                <label>No Faktur</label>
                <select class="form-control select2 select2-hidden-accessible" name="nofaktur" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <option selected="selected">Select........</option>
                  <?php
                    $nofaktur  = \App\Penjualan::all();
                  ?>
                  @foreach($nofaktur as $p)
                  <option>{{$p->nofaktur}}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label>Kode Barang</label>
                <select class="form-control select2 select2-hidden-accessible" name="kodebarang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <option selected="selected">Select........</option>
                  <?php
                    $kodebarang  = \App\Barang::all();
                  ?>
                  @foreach($kodebarang as $p)
                  <option>{{$p->kodebarang}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
              </div>

              <div class="form-group">
                <label>Sub Total</label>
                <input type="number" name="subtotal" class="form-control" placeholder="Sub Total">
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
                  <th>Kode Barang</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detailpenjualan as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->nofaktur}}</td>
                  <td>{{$key->kodebarang}}</td>
                  <td>{{$key->jumlah}}</td>
                  <td>{{$key->subtotal}}</td>
                  <td>
                    <a href="#modalEdit{{$key->id}}" data-target="#modalEdit{{$key->id}}" data-toggle="modal"><i class="fa fa-edit"></i> </a>
                    <a href="{{url('detailpenjualan/delete/'.$key->id)}}" onclick="return confirm('Yakin mau hapus data ini sob?')"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>

        <div class="modal fade" id="modalEdit{{$key->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Detail Penjualan</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/detailpenjualan/update/'.$key->id)}}" method="POST">
                	<div class="form-group">
              		  <label>No Faktur</label>
              		  <select class="form-control select2 select2-hidden-accessible" value="{{$key->nofaktur}}" name="nofaktur" style="width: 100%;" tabindex="-1" aria-hidden="true">
               		  <option selected="selected">Select........</option>
                		  <?php
                 		   $nofaktur  = \App\Penjualan::all();
                 		 ?>
                 		 @foreach($nofaktur as $p)
                		  <option>{{$p->nofaktur}}</option>
               		   @endforeach
               		 </select>
            		  </div>
              
            		  <div class="form-group">
              		  <label>Kode Barang</label>
             		   <select class="form-control select2 select2-hidden-accessible" value="{{$key->kodebarang}}" name="kodebarang" style="width: 100%;" tabindex="-1" aria-hidden="true">
             		    <option selected="selected">Select........</option>
            		      <?php
              		      $kodebarang  = \App\Barang::all();
              		    ?>
             		     @foreach($kodebarang as $p)
              		    <option>{{$p->kodebarang}}</option>
               		   @endforeach
             		   </select>
             		 </div>

                 <div class="form-group">
               	 	<label>Jumlah</label>
              	  	<input type="number" name="jumlah" class="form-control" value="{{$key->jumlah}}" placeholder="Jumlah">
             	 </div>

            	 <div class="form-group">
              	  	<label>Sub Total</label>
               	 	<input type="number" name="subtotal" class="form-control" value="{{$key->subtotal}}" placeholder="Sub Total">
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