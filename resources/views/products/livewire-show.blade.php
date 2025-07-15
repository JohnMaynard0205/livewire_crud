@extends('layouts.app')

@section('content')
@livewire('products.product-show', ['productId' => $productId])
@endsection 