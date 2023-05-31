@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة المواطنين
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة المواطنين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('Citizen.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">اضافة مواطن</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>رقم الهاتف</th>
                                            <th>الرقم الوطني</th>
                                            <th>المندوب</th>
                                            <th>العاقل</th>
                                            <th>عدد الذكور</th>
                                            <th>عدد الإناث</th>
                                            <th>السكن</th>
                                            <th>رقم الكرت</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Citizens as $Citizen)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$Citizen->name}}</td>
                                            <td>{{$Citizen->phone_number}}</td>
                                            <td>{{$Citizen->ssn}}</td>
                                            <td>{{$Citizen->Delegates->name}}</td>
                                            <td>{{$Citizen->Delegates->Aqels->name}}</td>
                                            <td>{{$Citizen->no_of_males}}</td>
                                            <td>{{$Citizen->no_of_females}}</td>
                                            <td>{{$Citizen->state_of_house}}</td>
                                            <td>{{$Citizen->card_no}}</td>
                                                <td>
                                                    <a href="{{route('Citizen.edit',$Citizen->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Citizen{{ $Citizen->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Citizen{{$Citizen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Citizen.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف بيانات العقال</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>  هل تريد حذف بيانات المواطن</p>
                                                            <input type="hidden" name="id"  value="{{$Citizen->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">اغلاق</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">حذف</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
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
