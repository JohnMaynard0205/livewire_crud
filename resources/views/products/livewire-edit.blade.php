@extends('layouts.app')

@section('content')
@livewire('products.product-edit', ['productId' => $productId])
@endsection 