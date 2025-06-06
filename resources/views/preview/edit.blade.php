@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <form action="{{route('previewSave')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    เพิ่มคอร์สเรียน
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">หมวดหมู่คอร์สเรียน : </label>
                                            <select class="form-control" name="categories_id" id="categories_id" required>
                                                <option value="" disabled selected>เลือกหมวดหมู่</option>
                                                @foreach($category as $categories)
                                                <option value="{{$categories->id}}" {{($info->categories_id == $categories->id) ? 'selected' : ''}}>{{$categories->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">ชื่อพรีวิว : </label>
                                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $info->name) }}">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="detail" class="form-label">รายละเอียด : </label>
                                            <textarea rows="4" name="detail" id="detail" class="form-control">{{ old('detail', $info->detail) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="link_attachments" class="form-label">ลิงค์สำหรับไฟล์แนบ : </label>
                                            <input type="text" class="form-control" id="link_attachments" name="link_attachments" required value="{{ old('link_attachments', $info->link_attachments) }}">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="image" class="form-label">รูปภาพคอร์สเรียน : </label>
                                            <input class="form-control" type="file" id="image" name="image" value="{{ old('image', $info->image) }}">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="file" class="form-label">ไฟล์แนบ : </label>
                                            <input class="form-control" type="file" id="file" name="file[]" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ old('id', $info->id) }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/0ikqmj46xu77gouf1cenaur4y4c2df299h43rdd4x7evhhno/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
</script>
@endsection