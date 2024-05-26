@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4"><i class="fas fa-list"></i> Categorías</h2>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card category-card mb-4">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="{{ $category->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->nombre }}</h5>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-block">Ver Productos</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
