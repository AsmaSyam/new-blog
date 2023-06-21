@extends('admin.layouts.layout-admin')
@section('title' , 'تعديل منشور')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">تعديل التصنيف </h3>
            </div>
            <!--begin::Form-->
            <form action="/admin/categories/update/{{$category->id}}" method="post" class="form">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>الاسم</label>
                            <input type="text" value="{{old('name' ,$category->name)}}" name="name" class="form-control" />
                        </div>
                  
                    <div class="col-lg-10 mt-10">
                        <button type="submit" class="btn btn-success mr-2">حفظ</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>


							
@endsection
@section('my-scripts')
<script src="{{asset('assets_admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<script src="{{asset('assets_admin/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>
<script src="{{asset('assets_admin//js/pages/crud/forms/widgets/select2.js')}}"></script>
@endsection