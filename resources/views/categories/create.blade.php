@extends('layoutadmin')
@section('title')
    Thêm mới danh mục
@endsection
@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Danh mục A" value="{{old('name')}}">
            @error('name')
                <i class="text-danger">{{ $message }}</i>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="status" placeholder="1" value="{{old('status')}}">
            @error('status')
                <i class="text-danger">{{ $message }}</i>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Gửi</button>
        <a class="btn btn-light" href="{{route('category.index')}}">Quay lại trang chủ</a>
    </form>
@endsection
