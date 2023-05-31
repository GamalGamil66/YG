@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    التعديل على بيانات المواطن
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    التعديل على بيانات المواطن
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
                            <form action="{{route('Citizen.update','test')}}" method="post">
                            {{method_field('patch')}}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الاسم</label>
                                    <input type="hidden" value="{{$Citizens->id}}" name="id">
                                    <input type="text" name="name" value="{{$Citizens->name}}" class="form-control">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">كلمة المرور</label>
                                    <input type="password" name="password" value="{{$Citizens->password}}" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">رقم الهاتف</label>
                                    <input type="text" name="phone_number" value="{{ $Citizens->phone_number }}" class="form-control">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">الرقم الوطني</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" value="{{$Citizens->ssn}}" name="ssn" required>
                                    </div>
                                    @error('ssn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">المندوب</label>
                                    <select class="custom-select my-1 mr-sm-2" name="delegate_id">
                                        <option value="{{$Citizens->delegate_id}}">{{$Citizens->Delegates->name}}</option>
                                        @foreach($Delegates as $delegate)
                                            <option value="{{$delegate->id}}">{{$delegate->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('delegate_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">رقم الكرت </label>
                                    <input type="text" name="card_no" value="{{$Citizens->card_no}}" class="form-control">
                                    @error('card_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">السكن</label>
                                    <input type="text" name="state_of_house" value="{{$Citizens->state_of_house}}"   class="form-control">
                                    @error('state_of_house')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">عدد الإناث </label>
                                    <input type="text" name="no_of_females" value="{{$Citizens->no_of_females}}" class="form-control">
                                    @error('no_of_females')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">عدد الذكور </label>
                                    <input type="text" name="no_of_males" value="{{$Citizens->no_of_males}}" class="form-control">
                                    @error('no_of_males')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

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
