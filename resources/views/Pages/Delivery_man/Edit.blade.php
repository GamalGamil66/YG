@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل بيانات عامل التوصيل
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل بيانات عامل التوصيل
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('DeliveryMan.update','test')}}" method="post">
                            {{method_field('patch')}}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الاسم</label>
                                    <input type="hidden" value="{{$DeliveryMen->id}}" name="id">
                                    <input type="text" name="name" value="{{$DeliveryMen->name}}" class="form-control">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">كلمة المرور</label>
                                    <input type="password" name="password" value="{{$DeliveryMen->password}}" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">رقم الهاتف</label>
                                    <input type="text" name="phone_number" value="{{ $DeliveryMen->phone_number }}" class="form-control">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">الرقم الوطني</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" value="{{$DeliveryMen->ssn}}" name="ssn" required>
                                    </div>
                                    @error('ssn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <br>

                            {{-- <div class="form-row">

                            </div> --}}
                            <br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
