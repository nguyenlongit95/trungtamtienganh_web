<?php
return [
    'validation' => [
        'category' => [
            'name' => [
                'required' => 'Bạn hãy nhập tên danh mục.',
            ],
            'sort' => [
                'required' => 'Bạn hãy nhập thứ tự hiển thị danh mục.',
            ],
        ],
        'article' => [
            'name' => [
                'required' => 'Bạn hãy nhập tên bài viết.',
            ],
            'category_id' => [
                'required' => 'Bạn hãy danh mục cho bài viết.',
            ],
            'title' => [
                'required' => 'Bạn hãy nhập thẻ tiêu đề cho bài viết.',
            ],
            'info' => [
                'required' => 'Bạn hãy nhập nội dung cơ bản cho bài viết.',
            ],
            'description' => [
                'required' => 'Bạn hãy nhập nội dung chi tiết cho bài viết.',
            ],
            'author' => [
                'required' => 'Bạn hãy nhập tên tác giả.',
            ],
            'status' => [
                'required' => 'Bạn hãy chọn trạng thái xuất bản cho bài viết.',
            ],
        ],
    ],

    'create' => [
        'success' => 'Thêm mới bản ghi thành công.',
        'failed' => 'Thêm mới bản ghi thất bại, kiểm tra lại thông tin.',
    ],

    'update' => [
        'success' => 'Chỉnh sửa bản ghi thành công.',
        'failed' => 'Chỉnh sửa bản ghi thất bại, hãy kiểm tra lại hệ thống',
    ],

    'delete' => [
        'success' => 'Xoá bản ghi thành công',
        'failed' => 'Xoá bản ghi thất bại, hãy kiểm tra lại hệ thống',
        'cross_data' => 'Xoá bản ghi thất bại vì có dữ liệu phụ thuộc, hãy xoá dữ liệu phụ thuộc trước khi xoá bản ghi này!',
    ],

    'data_not_found' => 'Không tìm thấy dữ liệu.',
];
