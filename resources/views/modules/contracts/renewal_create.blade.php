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
                                <input type="hidden" id="contract_id" name="contract_id" value="{{$contract->id}}"/>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Mã hợp đồng<span class="required"> *</span></label>
                                    <input type="text" class="form-control" id="code" name="code" readonly value="{{$contract->code}}">
                                </div>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Gia hạn từ<span class="required"> *</span></label>
                                    <input type="date" class="form-control" id="renewal_date_start" name="renewal_date_start"
                                    data-parsley-required-message="Vui lòng nhập ngày kí hợp đồng"
                                    required>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Gia hạn đến<span class="required"> *</span></label>
                                    <input type="date" class="form-control" id="renewal_date_finish" name="renewal_date_finish"
                                    data-parsley-required-message="Vui lòng nhập ngày bắt đầu"
                                    required>
                                    <div id="error-parley-select-ghd" class="error-date"></div>
                                </div>
                                <div class="col-md-6 col-sm-12" style="margin-bottom:2%">
                                    <label class="form-label" for="ten">Hệ số lương<span class="required"> *</span></label>
                                    <input type="text" class="form-control" id="salary_factor" name="salary_factor"
                                    data-parsley-required-message="Vui lòng nhập hệ số lương"
                                    required>
                                </div>
                            </div>
                            <div class="d-lg-flex justify-content-end">
                                <div class="row mt-3" >
                                    <div class="col-md-6 mb-3">
                                        <button id="btn-submit-form" type="button" class="btn btn-primary px-5">Lưu</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('contracts.renewal',['id'=> $contract->id])}}"class="btn btn-outline-primary px-5">Hủy</a>
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
                    url: "{{ route('contracts.renewal_store') }}",
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
<script>
  $("#renewal_date_finish").blur(function(){
    var gia_han_tu = $("#renewal_date_start").val();
    var gia_han_den = $("#renewal_date_finish").val();
    var d = new Date(gia_han_den);
    if(!isNaN(d))
    {
        if(gia_han_tu!='')
        {
            if(gia_han_den>gia_han_tu)
            {
                document.getElementById("error-parley-select-ghd").innerHTML="Ngày gia hạn đến không được lớn hơn ngày ngày gia hạn từ"
                document.getElementById("btn-submit-form").disabled = true;
            }
            else
            {
                document.getElementById("error-parley-select-ghd").innerHTML=""
                document.getElementById("btn-submit-form").disabled = false;
            }
        }
    }
    else
    {
        document.getElementById("renewal_date_finish").value="";
        document.getElementById("error-parley-select-ghd").innerHTML=""
    }
  });
</script>
<script>
  $("#renewal_date_start").blur(function(){
    $("#renewal_date_finish").val('');
    var ngay_bat_dau = $("#renewal_date_start").val();
    var d = new Date(ngay_bat_dau);
    if(isNaN(d))
    {
        document.getElementById("renewal_date_start").value="";
    }
  });
</script>
@endsection