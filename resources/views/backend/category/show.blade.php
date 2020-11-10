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
            <a href="{{route('categories.index')}}" class="btn btn-primary float-right my-2"><< Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Category Detail</h2>
          </div>
          <h3 class="text-primary">Name: <span class="text-dark">{{$category->name}}</span></h3>

          <h3 class="text-primary">Photo:</h3> <span><img src="{{asset($category->photo)}}" width="200" height="200"></span>

        </div>
      </div>
    </div>
  </main>
@endsection