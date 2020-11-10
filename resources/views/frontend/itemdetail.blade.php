@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-md-12 my-5">
        <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="{{asset($item->photo)}}" class="card-img" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}} ({{$item->codeno}})</h5>
                  <p class="card-text">{{number_format($item->price)}} MMK</p>
                  <p class="card-text"><span class="badge badge-info mx-2">{{$item->brand->name}}</span><span class="badge badge-dark">{{$item->subcategory->name}}</span></p>
                  <p class="card-text">
                    <input type="number" name="qty" class="form-control w-25" min="1" value="1">
                  </p>
                  <p class="card-text"><button href="javascript:void(0)" class="btn btn-success btn-sm item-add addtocart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{$item->photo}}">Add to Cart</button></p>
                </div>
                <div class="card-footer">
                  <strong>Description</strong>
                  {{$item->description}}
                </div>
              </div>
            </div>
          </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
@endsection