@extends('layout.main')

@section('content')
<div class="container mx-auto">

<div class="details-section mt-10">
    <img src="{{asset('')}}images/products/{{$product->image}}" height="200px" width="300px" alt="product image">

    <h4>Title: {{$product->title}}</h4>
    <h4>Quantity: {{$product->quantity}}</h4>
    <h4>Price: {{$product->price}}</h4>
</div>


</div>
@endsection
