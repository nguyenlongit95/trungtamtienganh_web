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
                        <h1 class="m-0 text-dark">Quản lý danh thẻ liên kết</h1>
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
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các thẻ liên kết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên thẻ</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($tags))
                                    @foreach($tags as $value)
                                        <form action="{{ url('/admin/tags/' . $value->id . '/update') }}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <tr>
                                            <td>{{ $value->id  }}</td>
                                            <td>
                                                <input type="text" id="name-{{ $value->id }}" onkeyup="renderSlug( {{ $value->id }} )" value="{{ $value->name }}" name="name" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" readonly id="slug-{{ $value->id }}" value="{{ $value->slug }}" name="slug" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" class="change-default-btn"> <i class="fas fa-pencil-alt"></i> </button>
                                                |
                                                <a href="{{ url('/admin/tags/' . $value->id . '/delete') }}" title="Xoá {{ $value->name }}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        </form>
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
                                @if(!empty($tags))
                                    {!! $tags->render() !!}
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
    <style>
        .change-default-btn {
            background: none;
            border: none;
            color: #007bff;
        }
    </style>
    <script>
        /**
         *Function render slug using name of tags
         * @param int id of tag
         */
        function renderSlug(id) {
            let slug = changeToSlug($('#name-' + id).val());
            $('#slug-' + id).val(slug);
        }
    </script>
@endsection
