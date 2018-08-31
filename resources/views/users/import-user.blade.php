
@extends('layouts.admin')
@section('header')
    Excel Student Registration Upload
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Upload</strong> Form
        </div>
        <div class="card-body card-block">
            <form action="{{route('import-excel')}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file" class=" form-control-label" >Select File To Uplaod :</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="file" class="form-control-file" required>
                    </div>
                </div>

                <div class="form-group">
                    <button  class="btn btn-primary ">
                        <i class="fa fa-upload"></i> Upload
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection