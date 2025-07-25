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
                        <form action="{{route('menuSave')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    แก้ไขเมนู
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">ชื่อเมนู : </label>
                                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $info->name) }}">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="base_price" class="form-label">ราคา : </label>
                                            <input type="text" class="form-control" id="base_price" name="base_price" value="{{ old('base_price', $info->base_price) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">หมวดหมู่อาหาร : </label>
                                            <select class="form-control" name="categories_id" id="categories_id" required>
                                                <option value="" disabled>เลือกหมวดหมู่</option>
                                                @foreach($category as $categories)
                                                <option value="{{$categories->id}}" {{($info->categories_id == $categories->id) ? 'selected' : ''}}>{{$categories->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">รายละเอียด : </label>
                                            <textarea class="form-control" rows="4" name="detail" id="detail">{{ old('detail', $info->detail) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="file" class="form-label">รูปภาพหมวดหมู่ : </label>
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" id="file" name="file">
                                                <a href="{{($info['files']) ? url('storage/'.$info['files']->file) : 'javascript:void(0);'}}"
                                                    {{($info['files']) ? 'target="_blank" ' : ''}}
                                                    class="btn btn-outline-secondary" type="button"><i class="bx bx-search-alt-2"></i></a>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label">เวลาเริ่มต้น : </label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $info->start_date) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="end_date" class="form-label">เวลาสิ้นสุด : </label>
                                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $info->end_date) }}">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">ผู้รับผิดชอบ : </label>
                                            <select class="form-control" name="categories_member_id" id="categories_member_id">
                                                <option value="">เลือก</option>
                                                @foreach($category_member as $categories)
                                                <option value="{{$categories->id}}" {{($info->categories_member_id == $categories->id) ? 'selected' : ''}}>{{$categories->name}}</option>
                                                @endforeach
                                            </select>
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
@endsection