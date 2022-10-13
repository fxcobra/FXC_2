@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.classroom.index") }}">Classroom</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Classroom</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.classroom.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage classroom_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="room_name" class="col-md-2 col-form-label">Room Name:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="room_name" name="room_name" required="true" placeholder="Room Name"  value="{{{ old('room_name', isset($data)?$data->room_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('room_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="room_name_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="room_capacity" class="col-md-2 col-form-label">Room Capacity:*</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="room_capacity" name="room_capacity" required="true" placeholder="Room Capacity"
                                   step="1" 
                                   value="{{{ old('room_capacity', isset($data)?$data->room_capacity : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('room_capacity')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="room_capacity_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.classroom.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection