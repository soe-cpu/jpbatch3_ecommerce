@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
            <a href="{{route('items.index')}}" class="btn btn-primary float-right my-2"><< Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        {{-- <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Item Detail</h2>
          </div>
          <h3 class="text-primary">Name: <span class="text-dark">{{$item->name}}</span></h3>
          <h3 class="text-primary">Photo:</h3> <span><img src="{{asset('/backend_asset/images/item/'.$item->photo)}}" width="200" height="200"></span>
          <h3 class="text-primary">Price: <span class="text-dark">{{$item->price}}</span></h3>
          <h3 class="text-primary">Discount: <span class="text-dark">{{$item->discount}}</span></h3>
          <h3 class="text-primary">Description: <span class="text-dark">{{$item->description}}</span></h3>
          <h3 class="text-primary">Brand Name: <span class="text-dark">{{$item->brand->name}}</span></h3>

          <h3 class="text-primary">Subategory Name: <span class="text-dark">{{$item->subcategory->name}}</span></h3>

          

        </div> --}}
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{asset($item->photo)}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}} ({{$item->codeno}})</h5>
                  <p class="card-text">{{number_format($item->price)}} MMK</p>
                  <p class="card-text">{{$item->brand->name}}</p>
                  <p class="card-text">{{$item->subcategory->name}}</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </main>
@endsection