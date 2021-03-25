@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Quản lý danh sách blogs</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="col-12">
            @include('admin.layouts.errors')
        </div>

        <section class="content">
            <div class="col-12 float-left">
                <div class="col-12 text-right">
                    <a href="{{ url('/admin/blog/create') }}" class="btn btn-primary text-white">Thêm blog mới</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các bài viết</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/blog/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="name" class="form-control float-right" placeholder="Tên bài viết">
                                        <input type="text" name="author" class="form-control float-right" placeholder="Tác giả">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên blog</th>
                                    <th class="text-center">Tác giả</th>
                                    <th class="text-center">Ngày xuất bản</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($blogs))
                                    @foreach($blogs as $value)
                                        <tr>
                                            <td>{{ $value->id  }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center">{{ $value->author }}</td>
                                            <td class="text-center">
                                                @if($value->status == 0)
                                                    <p class="text-danger">Chưa xuất bản</p>
                                                @else
                                                    <p class="text-green">Đã xuất bản</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/blog/' . $value->id . '/edit') }}" title="Chỉnh sửa {{ $value->name }}"><i class="fas fa-pen"></i></a>
                                                |
                                                <a href="{{ url('/admin/blog/' . $value->id . '/delete') }}" title="Xoá {{ $value->name }}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger text-center">{{ config('langVN.data_not_found') }}</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate float-right">
                                @if(!empty($blogs))
                                    {!! $blogs->render() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
@endsection
