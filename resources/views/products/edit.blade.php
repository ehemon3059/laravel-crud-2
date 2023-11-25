
@extends('layout.app')
@section('main')     
    <div class="container">
    

        <h1 class="text-center mt-5">Edit Product Section</h1>
        <div class="row justify-content-center">
          <div class="col-sm-8">
           
            <form action="/products/{{$product->id}}/update" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card mt-3 p-3">
                                                                        {{--  <img src="{{asset('products/'.$product->image)}}"  --}}
                <h3 class="text-center text-muted" >Product Edit #{{$product->name}} <img src="/products/{{$product->image}}" class="rounded" width="70" height="70" alt=""></h3>
               
                <div class="form-group">
                <label >Name</label>
                  <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control"/>

                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="description"  cols="30" rows="5">{{old('description',$product->description)}}</textarea>
                  
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
