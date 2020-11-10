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
      <div class="offset-md-2 col-md-8">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Category Edit</h2>
          </div>   
          <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@error('name') {{old('name')}} @else {{$category->name}} @enderror" required>
                @error('rollno')
                <span  class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" value="{{old('photo')}}" required>
              <img src="{{asset($category->photo)}}" width="150" height="150" class="my-1">
            </div>
            <input type="submit" name="btnsubmit" value="Update" class="btn btn-success btn-block">
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection