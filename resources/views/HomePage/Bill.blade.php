@extends('Layoutshare')
 @section('content')




  <header> 
            <h1 class="h3 display"></h1>
          </header>
          <div class="alert alert-success alert-dismissible" role="alert" id="xoabill_thanhcong">
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                  	<div class="col-md-6">
                  		<h4>Bill</h4>
                  	</div>
					       
                  </div>
                  
                </div>
                @if(isset($bill))
                 <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table_bill">
                      <thead>
                        <tr>
                          <th>Phòng</th>
                          <th></th>
                          <th>Chỉ Số Điện</th>
                          <th>Chỉ Số Nước</th>
                          <th>Ngày Thanh Toán</th>
                          <th>Internet</th>
                          <th>Truyền Hình Cáp</th>
                          <th>Số Nợ</th>
                          <th>Tổng Tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bill as $kt)
                        <tr>
                          <td>{{$kt->roomcode}}</td>
                          <td align="center">
                            <input type="checkbox" name = "checkbox_one" value="{{$kt->code}}" style="width: 20px; height: 20px;">
                          </td>
                          <td>{{$kt->electronic}}</td>
                          <td>{{$kt->water}}</td>
                          <td>{{date("d-m-Y", strtotime($kt->daynow))}}</td>
                          <td>
                            @if($kt->internet==1)
                             <div class="checkbox">
                                 <input type="checkbox" value="1" checked="true" disabled="true">
                             </div>
                             @else
                              <div class="checkbox">
                                 <input type="checkbox" value="1" disabled="true">
                             </div>
                            @endif
                          </td>
                          <td>
                            @if($kt->truyenhinhcap==1)
                             <div class="checkbox">
                                 <input type="checkbox" value="1" checked="true" disabled="true">
                             </div>
                             @else
                              <div class="checkbox">
                                 <input type="checkbox" value="1" disabled="true">
                             </div>
                            @endif
                          </td>
                          <td style="color: red; font-weight: bold;">{{number_format($kt->debit)}}</td>
                          <td style="color: red; font-weight: bold;">{{number_format($kt->totalmoney)}}</td>
                        </tr>
                        @endforeach
                        {{$bill->links()}}
                      </tbody>
                    </table>
                  </div>
                 
                </div>
                @endif
              </div>
               <div class="col-md-6 text-right">
                      <button type="submit" data-toggle="modal" data-target=".xoa-modal" class="btn btn-primary">Xóa</button>
              </div>

            </div>
            
        </div>

        <div class="modal fade xoa-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Bạn có chắc muốn xóa không?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
        <a class="btn btn-primary" name="btnXacNhanXoa"  href="{{route('getbill')}}">Xóa</a>
      </div>
    </div>
  </div>
</div>


 
 @endsection

 @section('script')

<script>
    $('#xoabill_thanhcong').hide();
    array=[];
    var flag=1;
       $('[name=checkbox_one]').click(function(){

             if($(this).is(":checked"))
             {
                var x = $(this).parents('tr').find('input[type="checkbox"]').val();
                array.push(x);
                flag=0;
             }
             else
             {
              var ux = $(this).parents('tr').find('input[type="checkbox"]').val();
              array.splice($.inArray(ux, array), 1);
             }

             console.log(array);

       })
       $('[name=btnXacNhanXoa]').click(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: '/QLNT/public/xoa-bill',
            type: 'POST',
            data: {
                list: array
            },
            success: function( msg ) {
                if(msg == "Xóa hóa đơn thành công!")
                {
                            //location.reload();
                            $("#xoabill_thanhcong").text(msg).show();
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    },
                    error: function(xhr) {
         console.log(xhr.responseText)
    }
})
    });

</script>

 @endsection