@extends('layout.main')
@section('content')
<div class="container mx-auto">
    @if ($message = Session::get('success'))
    <div class="p-4 mb-4 mt-5 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"><span class="font-medium">{{ $message }}</span>
    </div>
    @endif


    @if ($message = Session::get('error'))
    <div class="p-4 mb-4 mt-5 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert"><span class="font-medium">{{ $message }}</span>
    </div>
    @endif


    <h1 class="mt-20 mb-5 text-center text-2xl">Product List</h1>
    <table class="table-auto w-full text-sbase text-left rtl:text-right text-gray-500 dark:text-gray-400 px-5">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 py-5">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-5">
                <td>{{$product->id}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{asset('')}}images/products/{{$product->image}}" height="100px" width="100px" alt="image">
                </td>
                <td>
                    <a href="{{route('productDetails', $product->id)}}" class="text-white bg-cyan-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-800 dark:hover:bg-cyan-900 dark:focus:ring-blue-800">View Details</a>
                    <a href="{{route('productEdit', $product->id)}}" class="text-white bg-cyan-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-800 dark:hover:bg-cyan-900 dark:focus:ring-blue-800">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
