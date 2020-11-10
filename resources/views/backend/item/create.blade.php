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
          <form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Item Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Item Name..." value="{{old('name')}}">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
              @error('photo')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
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
                  <input type="number" name="price" class="form-control mt-3" placeholder="Unit Price" value="{{old('price')}}">
                </div>
                <div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab">
                  <input type="number" name="discount" class="form-control mt-3" placeholder="Discount Price" value="{{old('discount')}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="photo">Description</label>
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Item Description..">{{old('description')}}</textarea>
              @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Brand Name</label>
              <select class="form-control" name="brand_id" id="brand_id">
                <option>Choose...</option>

                @foreach ($brand as $row) {
                  <option value="{{$row->id}}">
                    {{$row->name}}
                  </option>
                }
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">SubCategories Name</label>
              <select class="form-control" name="subcategory_id" id="subcategory_id">
                <option>Choose...</option>

                @foreach ($subcategory as $row) {
                  <option value="{{$row->id}}">
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