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
      <div class="offset-md-2 col-md-8">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Item Create</h2>
          </div>
          <form action="{{route('items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Item Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="@error('name') {{old('name')}} @else {{$item->name}} @enderror" required>
              @error('name')
              <span  class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" value="{{old('photo')}}" required>
              <img src="{{asset($item->photo)}}" width="150" height="150" class="my-1">
            </div>
            <div class="form-group">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#price" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="home-tab">
                  <input type="number" name="price" class="form-control mt-3" placeholder="Unit Price" value="{{$item->price}}">
                </div>
                <div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab">
                  <input type="number" name="discount" class="form-control mt-3" placeholder="Discount Price" value="{{$item->discount}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="photo">Description</label>
              <textarea class="form-control" name="description">{{$item->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="name">Brand Name</label>
              <select class="form-control" name="brand_id" id="brand_id">
                @foreach ($brand as $row) {
                  <option value="{{$row->id}}" {{$item->brand_id==$row->id?'selected':''}}>
                    {{$row->name}}
                  </option>
                }
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">SubCategories Name</label>
              <select class="form-control" name="subcategory_id" id="subcategory_id">
                @foreach ($subcategory as $row) {
                  <option value="{{$row->id}}" {{$item->subcategory_id==$row->id?'selected':''}}>
                    {{$row->name}}
                  </option>
                }
                @endforeach
              </select>
            </div>
            <input type="submit" name="btnsubmit" value="Save" class="btn btn-success btn-block">
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection