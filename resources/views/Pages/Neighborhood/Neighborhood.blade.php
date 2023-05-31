@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    قائمة الأحياء السكنية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الأحياء السكنية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        اضافة حي
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الحي</th>
                                <th>الملاحظة</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Neighborhoods as $Neighborhood)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Neighborhood->name }}</td>
                                    <td>{{ $Neighborhood->note }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Neighborhood->id }}"
                                                title="تعديل"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Neighborhood->id }}"
                                                title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Neighborhood -->
                                <div class="modal fade" id="edit{{ $Neighborhood->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    التعديل على بيانات الحي
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{route('Neighborhood.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name"
                                                                class="mr-sm-2">
                                                                اسم الحي
                                                                :</label>
                                                        <input id="name" type="text" name="name"
                                                                class="form-control"
                                                                value="{{$Neighborhood->name}}"
                                                                required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $Neighborhood->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">الملاحظة
                                                            :</label>
                                                        <textarea class="form-control" name="note"
                                                                id="exampleFormControlTextarea1"
                                                                rows="3">{{ $Neighborhood->note }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-success">تأكيد</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Neighborhood -->
                                <div class="modal fade" id="delete{{ $Neighborhood->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف بيانات الحي
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Neighborhood.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('Neighborhood_trans.Warning_Neighborhood') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Neighborhood->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">تأكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>{{--add it by my self--}}


        <!-- add_modal_Neighborhood -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            اضافة حي سكني
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Neighborhood.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name"
                                        class="mr-sm-2">اسم الحي
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">الملاحظة
                                    :</label>
                                <textarea class="form-control" name="note" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">الغاء</button>
                        <button type="submit"
                                class="btn btn-success">تأكيد</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    {{-- </div> --}}

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
