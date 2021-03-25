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
                        <h1 class="m-0 text-dark">Thêm mới bài báo</h1>
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
                <form action="{{ url('/admin/article/add') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-9 float-left">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cơ bản</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label for="name">Tên bài báo</label> <span class="text-danger">*</span>
                                    <input type="text" onkeyup="renderSlug()" id="name" name="name" class="form-control" placeholder="Tên bài báo">
                                </div>
                                <div class="form-group">
                                    <label for="info">Nội dung cơ bản</label> <span class="text-danger">*</span>
                                    <textarea name="info" class="form-control" id="info" cols="30" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Nội dung chi tiết bài báo</label> <span class="text-danger">*</span>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                    <div class="col-3 float-left">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin thêm</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tuoi">Slug</label> <span class="text-danger">*</span>
                                    <input type="text" readonly="readonly" id="slug" name="slug" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="title">Tiêu đề bài báo (nội dung thẻ h1)</label> <span class="text-danger">*</span>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Danh mục bài báo</label> <span class="text-danger">*</span>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @if(!empty($categories))
                                            @foreach($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="author">Tác giả</label> <span class="text-danger">*</span>
                                    <input type="text" id="author" name="author" class="form-control" placeholder="Tác giả">
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái xuất bản</label> <span class="text-danger">*</span>
                                    <select name="status" class="form-control" id="status">
                                        <option value="0">Nháp</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Gán thẻ cho bài viết</label> <span class="text-danger">*</span>
                                    <select name="tags[]" class="form-control" id="tags" multiple>
                                        @if(!empty($tags))
                                            @foreach($tags as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới bài báo.</p>
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm mới">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('js/customJS.js') }}"></script>
    <script>

        /**
         * Function render slug of category
         *
         * Using master function changeToSlug and param value of name
         */
        function renderSlug() {
            let slug = changeToSlug($('#name').val());
            $('#slug').val(slug);
        }

        // Replace ck editor
        $(document).ready(function () {
            CKEDITOR.replace('info');
            CKEDITOR.replace('description',
                {
                    filebrowserBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
        });
    </script>
@endsection
