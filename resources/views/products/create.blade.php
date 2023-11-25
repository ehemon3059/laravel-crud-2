
@extends('layout.app')
@section('main')
    <div class="container">
    

        <h1 class="text-center mt-5">New Products</h1>
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <form action="/products.store" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card mt-3 p-3">

                <div class="form-group">
                <label >Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control"/>

                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="description"  cols="30" rows="5">{{old('description')}}</textarea>
                  
                    @if($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label >Image</label>
                  <input type="file" name="image" id="" class="form-control">

                     @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>

                 
                  <div class="form-group">
                    <button type="submit" class="btn btn-dark">Submit</button>
                  </div>
              </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
