@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div>
            {{session('error')}}
        </div>
    @endif
    <form action="{{route('product.update', ['id'=>$listPro->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A" value="{{$listPro->name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" placeholder="10000" value="{{$listPro->price}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="100" value="{{$listPro->quantity}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <img src="{{Storage::url($listPro->image)}}" style="width: 100px;">
        </div>
        <div class="mb-3">
            <label class="form-label">Category  </label>
            <select class="form-select mb-3" name="category_id">
                @foreach($listCate as $item)

                    <option value="{{$item->id}}" @if($item->id == $listPro->category_id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
        <a class="btn btn-light" href="{{route('product.index')}}">Quay lại trang chủ</a>
    </form>
@endsection
