@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Filter
                </div>
                <div class="card-body">
                    <form action="{{url('produk/filter')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" name="Nama_produk" value= "{{$Nama_produk ?? ""}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Stok</label>
                        <input type="text" class="form-control" name="Stok" value= "{{$Stok ?? ""}}">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="" class="control-label">Harga Min</label>
                        <input type="text" class="form-control" name="harga_min" value= "{{$harga_min ?? ""}}">
                        </div>
                    </div>
                                        
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="" class="control-label">Harga Max</label>
                        <input type="text" class="form-control" name="harga_max" value= "{{$harga_max ?? ""}}">
                         </div>
                    </div>
                    </div>
                    <button class="btn btn-dark float-end"><i class="fa fa-search" >Filter</i></button>
                    </form>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                 <b>Data Produk</b>
                <a href="{{url('produk/create')}}" class="btb btn-primary float-end"><i class="fa fa-plus"></i> tambah Data</a>
                
                </div>
                <div class="card-body">
                <table class="table">
                <thead>
                           <th>No</th>
                           <th>Aksi</th>
                           <th>Nama</th>
                           <th>Harga</th>
                           <th>Stok</th>
                           
                </thead> 
                <tbody>
                           @foreach($list_produk as $produk)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>
                                <div class="btn-group">
                                   <a href="{{url('produk' ,$produk->id)}}" class="btn btn-dark"><i class="fa fa-info"></i></a>
                                   <a href="{{url('',$produk->id)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                   @include('template.utils.delete', ['url' => url('produk', $produk->id)])
                                </div>  
                               </td>
                               <td>{{$produk->Nama_produk}}</td>
                               <td>{{$produk->Harga}}</td>
                               <td>{{$produk->Stok}}</td>
                               
                           </tr>
                           @endforeach
                       </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection