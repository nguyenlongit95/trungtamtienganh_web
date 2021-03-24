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
                        <h1 class="m-0 text-dark">Thêm mới danh mục bài báo</h1>
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
                <form action="{{ url('/admin/category/' . $category->id . '/update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-8 float-left">
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
                                    <label for="name">Tên danh mục</label> <span class="text-danger">*</span>
                                    <input type="text" onkeyup="renderSlug()" id="name" name="name" class="form-control" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Slug</label> <span class="text-danger">*</span>
                                    <input type="text" readonly="readonly" id="slug" name="slug" class="form-control" value="{{ $category->slug }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Chỉnh sửa)</span> để chỉnh sửa danh mục.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 float-left">
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
                                    <label for="truong-dai-hoc">Thứ tự hiển thị <span class="text-danger">*</span></label>
                                    <input type="number" name="sort" class="form-control" value="{{ $category->sort }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Thứ tự hiển thị sẽ được đánh số từ 1, thứ tự này là thứ tự hiển thị tại thanh menu của trang web hiển thị.</p>
                                <p>- Lưu ý: không nên nhập số < 0 đối với thứ tự hiển thị.</p>
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Chỉnh sửa">
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
    </script>
@endsection
