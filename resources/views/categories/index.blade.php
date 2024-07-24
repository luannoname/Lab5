@extends('layoutadmin')
@section('title')
    Danh mục sản phẩm
@endsection
@section('content')
    <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listCate as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>
                @if($item->status == 1)
                    Active
                @else
                    Block
                @endif
            </td>
{{--                <td>{{$item->catename}}</td>--}}
{{--            <td>{{$listCate[$item->category_id]}}</td>--}}
            <td>
                <button>Sửa</button>
                <button>Xóa</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listCate->links()}}
@endsection
