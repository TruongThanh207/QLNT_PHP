@extends('Layoutshare')
 @section('content')


          <header>
             @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
               @if(session('warning'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                               {{session('warning')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                               {{session('error')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
               @if(count($errors)>0)

                        @foreach($errors->all() as $e)

                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{$e}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
               @endforeach
                    @endif
              <div class="row">
                    <div class="col-md-6">
                      
                    </div>
                    <div class="col-md-6 text-right">
                      <button type="button" class="btn btn-info" name="btndangki" data-toggle="modal" data-target=".register-room"><i class="fas fa-plus" style="margin-right: 10px"></i>Đăng Kí Phòng</button>
              </div>          
          </header>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Room</h4>
                    </div>
                    <div class="col-md-6 text-right">
                      <button type="button" class="btn btn-primary" name="btnthem" data-toggle="modal" data-target=".add-room">New</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Mã Phòng</th>
                          <th>Giá Phòng</th>
                          <th>Trạng Thái</th>
                          <th>Mô Tả</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $dt)

                        <tr>
                          <td>{{$dt->code}}</td>
                          <td>{{$dt->price}}</td>
                          <td>
                              @if($dt->status==1)
                               <button type="button" class="btn btn-primary btn-sm" disabled="true">Active</button>
                              @else
                               <button type="button" class="btn btn-danger btn-sm" disabled="true">Empty</button>
                              @endif
                          </td>
                          <td>{{$dt->description}}</td>
                          @if($dt->status==0)
                            <td><button type="button" class="btn btn-primary btn-sm" disabled="true"><a href="{{route('detailroom', ['id'=>$dt->code])}}"></a>Detail</button> </td> 
                          @else
                            <td><a href="{{route('detailroom', ['id'=>$dt->code])}}" type="button" class="btn btn-primary btn-sm">Detail</a></td>
                          @endif
                          <td><button type="button" name="btnedit" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".add-room">Edit</button></td>
                          <td><button type="button" name="btndelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".xoa-modal">Delete</button></td>
                        </tr>
                        @endforeach
                       {{$data->links()}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>

<!-- modal dang ki -->


<div class="modal fade register-room" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content" >
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Đăng Kí</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!--modal body -->
              <form action="{{route('inforregister')}}" method="POST">
                <div class="modal-body">
                <input type="hidden" name="_token"  value="{{csrf_token()}}">   
                  <div>
                    <span style="color: black; font-weight: bold">Mã Phòng</span>
                    <select class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="room_code">
                      @foreach($data as $dt)
                        @if($dt->status == 0)
                          <option>{{$dt->code}}</option>
                        @endif
                      
                      @endforeach
                    </select>
                  </div>
                  <br>
                  <div>
                      <span style="color: black; font-weight: bold">Ngày Đăng Kí</span>
                      <input type="date" required data-msg="Please enter your register date" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="ngaydk">
                    </div>
                  <br>
                  <div>
                    <span style="color: black; font-weight: bold">Người Đại Diện</span>
                    <input required type="text" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="nguoidaidien">
                  </div>
                  <br>
                  <div>
                    <span style="color: black; font-weight: bold">CMND</span>
                    <input required type="number" class="form-control" minlength="9" style="width: 13rem; float: right; margin-right: 10px" name="CMND">
                  </div>
                  <br>
                   <div>
                    <span style="color: black; font-weight: bold">Tiền Cọc</span>
                    <input required type="number" class="form-control" min="0" style="width: 13rem; float: right; margin-right: 10px" name="tiencoc">
                  </div>
                  <br>
                   <div>
                    <span style="color: black; font-weight: bold">Thời Hạn Hợp Đồng (tháng)</span>
                    <input required type="number" class="form-control" min="0" style="width: 13rem; float: right; margin-right: 10px" name="thoihanhd">
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="btnAddservice">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>


<!-- modal -->
          
              <div class="modal fade add-room" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content" >
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông Tin Phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!--modal body -->
              <form action="{{route('postroom')}}" method="POST">
                <div class="modal-body">
                <input type="hidden" name="_token"  value="{{csrf_token()}}">   
                  <div>
                    <span style="color: black; font-weight: bold">Mã Phòng</span>
                    <input type="text" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="coderoom" disabled="true">
                  </div>
                  <br>
                   <div>
                    <span style="color: black; font-weight: bold">Giá Phòng</span>
                    <input required type="number" class="form-control" min="0" style="width: 13rem; float: right; margin-right: 10px" name="price">
                  </div>
                  <br>
                  <div>
                    <span style="color: black; font-weight: bold">Mô Tả</span>
                    <textarea style="float: right; width: 13rem; margin-right: 10px" name="description" rows="3" cols="24"></textarea>
                  </div>
                  <br>
                </div>
                <br>
               
                <div class="modal-footer">
                  <input type="hidden" class="hidden" name="flag" id="flag">
                  <input type="hidden" class="hidden" name="macode" id="codeservice">
                  <button type="submit" class="btn btn-primary" name="btnAddservice">Save</button>
                </div>
                </form>
              </div>
            </div>
          </div>



<!-- modal xoa -->
          <div class="modal fade xoa-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                <form action="{{route('xoaroom')}}" method="GET">
                  <input type="hidden" name="_token"  value="{{csrf_token()}}">
                    <div class="modal-body">Bạn có chắc muốn xóa không?</div>
                    <div class="modal-footer">
                      <input type="hidden" class="hidden" id="code" name="code">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-danger">Xóa</button>
    
                    </div>
                  </form>
                  </div>
                </div>
              </div>
@endsection

@section('script')

<script>
  
$('[name=btnedit]').click(function() {
      var row = $(this).closest("tr")[0];
        $('[name=coderoom').val(row.cells[0].innerText);
        $('[name=price').val(row.cells[1].innerText);
        
         $('[name=description').val(row.cells[3].innerText);
          $('#flag').val('1');
          $('#codeservice').val(row.cells[0].innerText);

    });
$('[name=btnthem]').click(function() {
      $('[name=coderoom').val('');
      $('[name=price').val('');
         $('[name=description').val('');
          $('#flag').val('0');
        
    });
  $('[name=btndelete]').click(function() {
      var row = $(this).closest("tr")[0];
        $('#code').val(row.cells[0].innerText);
    });

</script>


@endsection