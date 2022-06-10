@extends('master')
@section('main-content')
<div class="admin-data-content layout-top-spacing">
    <div class="row project-cards">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="card-body">
                    <div class="widget-content widget-content-area">
                        <form method="POST" id="frm-them-moi" data-parsley-validate="" novalidate>
                            @csrf
                            <div class="row">
                                <input type="hidden" id="id" name="id" value="{{$contractExtension->id}}"/>
                                <input type="hidden" id="contract_id" name="contract_id" value="{{$contractExtension->contract_id}}"/>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Mã hợp đồng<span class="required"> *</span></label>
                                    <input type="text" class="form-control" id="code" name="code" readonly value="{{$contractExtension->contract->code}}">
                                </div>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Gia hạn từ<span class="required"> *</span></label>
                                    <input type="date" class="form-control" id="renewal_date_start" name="renewal_date_start"
                                    data-parsley-required-message="Vui lòng nhập ngày bắt đầu"
                                    value="{{$contractExtension->renewal_date_start}}"
                                    required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Gia hạn đến<span class="required"> *</span></label>
                                    <input type="date" class="form-control" id="renewal_date_finish" name="renewal_date_finish"
                                    data-parsley-required-message="Vui lòng nhập ngày kết thúc"
                                    value="{{$contractExtension->renewal_date_finish}}"
                                    required>
                                </div>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Hệ số lương<span class="required"> *</span></label>
                                    <input type="text" class="form-control" id="salary_factor" name="salary_factor"
                                    data-parsley-required-message="Vui lòng nhập hệ số lương"
                                    value="{{$contractExtension->salary_factor}}"
                                    required>
                                </div>
                            </div>
                            <div class="d-lg-flex justify-content-end">
                                <div class="row mt-3" >
                                    <div class="col-md-6 mb-3">
                                        <button id="btn-submit-form" type="button" class="btn btn-primary px-5">Lưu</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('contracts.renewal',['id'=> $contractExtension->contract_id])}}"class="btn btn-outline-primary px-5">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modules.contracts.js')
<script>
    $('#btn-submit-form').click(function() {
        if($('#frm-them-moi').parsley().validate()) {
            var formData = new FormData();
                $("input[name='id']").map(function(){ formData.append('id', this.value)}).get();
                $("input[name='contract_id']").map(function(){ formData.append('contract_id', this.value)}).get();
                $("input[name='renewal_date_start']").map(function(){ formData.append('renewal_date_start', this.value)}).get();
                $("input[name='renewal_date_finish']").map(function(){ formData.append('renewal_date_finish', this.value)}).get();
                $("input[name='salary_factor']").map(function(){ formData.append('salary_factor', this.value)}).get();
                //$("input[name='content']").map(function(){ formData.append('content', this.value)}).get();
                // $("select[name='renewal_number']").map(function(){ formData.append('renewal_number', this.value)}).get();
                // $("input[name='renewal_number']").map(function(){ formData.append('renewal_number', this.value)}).get();
                // $("input[name='renewal_date']").map(function(){ formData.append('renewal_date', this.value)}).get();
                // $("input[name='salary_factor']").map(function(){ formData.append('salary_factor', this.value)}).get();
                //$("select[name='salary_id']").map(function(){ formData.append('salary_id', this.value)}).get();

                $.ajax({
                    url: "{{ route('contracts.renewal_update') }}",
                    type: 'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                }).done(function(res) {
                    if (res.status == 'success') {
                    swal.fire({
                        title: res.message,
                        icon: 'success',
                        showCancelButton: false,
                        showConfirmButton: false,
                        position: 'center',
                        padding: '2em',
                        timer: 1500,
                    }).then((result) => {
                       if (result.dismiss === Swal.DismissReason.timer) 
                        {
                            window.location.replace(res.redirect)
                        }
                    })
                    }else {
                        Swal.fire({
                            title: res.message,
                            icon: 'error',
                            showCancelButton: false,
                            showConfirmButton: false,
                            position: 'center',
                            padding: '2em',
                            timer: 1500,
                        })
                    }
                });
            }
        });
</script>
@endsection