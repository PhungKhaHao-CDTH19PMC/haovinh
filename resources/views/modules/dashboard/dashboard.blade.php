@extends('master')
@section('main-content')
@include('modules.dashboard.js')
<div class="admin-data-content layout-top-spacing">
    <div class="widget-content widget-content-area">
        <form>
            <div class="form-group mb-4">
                <label for="formGroupExampleInput">Example label</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="form-group mb-4">
                <label for="formGroupExampleInput2">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </div>
        </form>
    </div>
</div>
@endsection