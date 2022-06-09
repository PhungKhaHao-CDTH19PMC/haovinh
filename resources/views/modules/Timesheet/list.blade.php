@extends('master')
@section('main-content')
@csrf
<div class="admin-data-content layout-top-spacing">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-3">
                    <select multiple="multiple" class="form-control" id="fullname" name="fullname" >
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <select multiple="multiple" class="form-control" id="monthPaySalary" name="monthPaySalary" >
                        @foreach($dateTimesheets as $dateTimesheet)
                        <option value="{{ $dateTimesheet['substring(in_hour,4,7)']}}">{{ $dateTimesheet['substring(in_hour,4,7)'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <div class="d-lg-flex justify-content-end">
                        <a href="{{ route('Timesheet.create') }}" id="btn-them-moi" class="btn btn-primary mt-2 mt-lg-1">
                            <i class="bx bxs-plus-square"></i>Thêm mới
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-3">
                    <select id="select-chon-hang-loat" class="form-control">
                        <option value=""></option>
                        <option value="delete"> Xoá</option>
                    </select>
                </div>
                <div class="col-3">
                    <button id="btn-ap-dung" class="btn btn-outline-primary form-control " type="button" disabled>Áp dụng</button>
                </div>
            </div>
        </div>
        <div class="col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="table-responsive">
                    <table id="user" class="table table-striped table-bordered table-custom-text">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Chức danh</th>
                                @for($i=1; $i <= $endate; $i++)
                                <th  style="width: 5%">{{$i}}</th>
                                @endfor
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <?php
                                $Timesheet_reals = App\Models\Timesheet::where('user_id', $user->id)->get();
                            ?>
                            <tr>
                                    <th>{{$key+1}}</th>
                                    <th>{{$user->fullname}}</th>
                                    <th>Chức danh</th>
                                    <?php
                                        $tong = 0 ;
                                    ?>                       
                                    @for($i=1; $i <= $endate; $i++)
                                        <?php
                                            $check = 0;
                                        ?>
                                        @foreach($Timesheet_reals as $Timesheet_real)
                                            @if((int)Carbon\Carbon::parse($Timesheet_real->in_hour)->format('d') == $i)
                                                <?php
                                                    if(Carbon\Carbon::parse($Timesheet_real->in_hour)->diffInHours(Carbon\Carbon::parse($Timesheet_real->out_hour)) > 4)
                                                    {
                                                        $check = 1;
                                                        $tong+=1;
                                                    }
                                                    else{
                                                        $check = 1/2;
                                                        $tong+=1/2;
                                                    }
                                                ?>
                                            @endif
                                        @endforeach

                                        @if($check)
                                            <th>{{$check}}</th>
                                        @else
                                            <th></th>
                                        @endif
                                    @endfor

                                    <th>{{$tong}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
@include('modules.Timesheet.js')
<script type="text/javascript">
    $("#fullname").multipleSelect({
        placeholder: "Chọn tên nhân viên",
        filter: true,
        showClear: true,
        //placeholder: 'Chọn mã hợp đồng',
        position: 'bottom',
        minimumCountSelected: 1,
        filterPlaceholder: 'Tìm kiếm',
        openOnHover: false,
        formatSelectAll () {
            return 'Chọn tất cả'
        },
        formatAllSelected () {
            return 'Đã chọn tất cả'
        },
        formatCountSelected (count, total) {
            return 'Đã chọn ' + count + ' trên ' + total
        },
        formatNoMatchesFound () {
            return 'Không tìm thấy kết quả'
        },
        onClose: function () {
            var filterFullname = JSON.stringify($("#fullname").val())
            table.columns(2).search(filterFullname).draw();
            $("#btn-ap-dung").attr('disabled', true);
            $("th.select-checkbox").removeClass("selected");
        },

        onClear: function () {
            var filterFullname = JSON.stringify($("#fullname").val())
            table.columns(2).search(filterFullname).draw();
            $("#btn-ap-dung").attr('disabled', true);
            $("th.select-checkbox").removeClass("selected");
        }
    });
   
    // $("#select-chon-hang-loat").select2({
    //    placeholder: "Chọn thao tác",
    //    allowClear: true,
    //    minimumResultsForSearch: -1
    // });
</script>
<script type="text/javascript">
    $("#monthPaySalary").multipleSelect({
        placeholder: "Chọn tháng",
        filter: true,
        showClear: true,
        //placeholder: 'Chọn mã hợp đồng',
        position: 'bottom',
        minimumCountSelected: 1,
        filterPlaceholder: 'Tìm kiếm',
        openOnHover: false,
        formatSelectAll () {
            return 'Chọn tất cả'
        },
        formatAllSelected () {
            return 'Đã chọn tất cả'
        },
        formatCountSelected (count, total) {
            return 'Đã chọn ' + count + ' trên ' + total
        },
        formatNoMatchesFound () {
            return 'Không tìm thấy kết quả'
        },
        onClose: function () {
            var filterFullname = JSON.stringify($("#monthPaySalary").val())
            table.columns(2).search(filterFullname).draw();
            $("#btn-ap-dung").attr('disabled', true);
            $("th.select-checkbox").removeClass("selected");
        },

        onClear: function () {
            var filterFullname = JSON.stringify($("#monthPaySalary").val())
            table.columns(2).search(filterFullname).draw();
            $("#btn-ap-dung").attr('disabled', true);
            $("th.select-checkbox").removeClass("selected");
        }
    });
   
    $("#select-chon-hang-loat").select2({
       placeholder: "Chọn thao tác",
       allowClear: true,
       minimumResultsForSearch: -1
    });
</script>
@endsection