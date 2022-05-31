@extends('layouts.navDash') 
@section('content') 


    <!-- products men Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
             @if($products->count())
                @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 pb-1">
                            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                                
                                <a href="{{route('order')}}" class="cat-img position-relative overflow-hidden mb-3">
                                    <img class="img-fluid" src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                                </a>
                                <h5 class="font-weight-semi-bold m-0">{{ $product->name }}</h5>
                                <button type="submit" class="btn btn-primary">Add to cart </button>
                                <a href="{{route('order')}}" class="btn btn-link">Buy</a>

                            </div>
                        
                        </div>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="2"> No record found </td>
                            </tr>
            @endif
      
            
   
        </div>
    </div>
    <!-- products men End -->


@endsection 


@section('css') 
@endsection 

@section('scripts') 
@endsection