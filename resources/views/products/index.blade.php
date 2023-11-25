
@extends('layout.app')

@section('main')
    <div class="container">

      <div class="text-right">
        <a href="products.create" class="btn btn-dark mt-3">Create Product</a>
      </div>
        <h1 class="text-center mb-5">All Products</h1>
    


        <table class="table table-hover mt-3">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $productNo = 1;
          @endphp
          @foreach ($products as $product)
            
          
          <tr>
            <td>{{$productNo++}}</td>
            <td> <a href="products/{{$product->id}}/show">{{$product->name}}</a> </td>
            <td>{{$product->description}}</td>
            <td><img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50" alt=""></td>

            <td>
              <a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a>
               {{-- get method delete
            <td><a href="products/{{$product->id}}/delete" class="btn btn-danger">Delete</a></td> --}}
              {{-- POST method delete --}}

              <form action="products/{{$product->id}}/delete" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$products->links()}}

    </div>
@endsection