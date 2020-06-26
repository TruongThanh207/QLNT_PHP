@extends('Layoutshare')
 @section('content')



          @if(session('error'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('error')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
                         @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
          <header> 
            <h1 class="h3 display" style="font-weight: bold">Dịch Vụ</h1>
          </header>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                  	<div class="col-md-6">
                  	</div>
					          <div class="col-md-6 text-right">
                  	</div>
                  </div> 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Mã Dịch Vụ</th>
                          <th>Dịch Vụ</th>
                          <th>Số Lượng</th>
                          <th>Chi Phí</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $dt)
                          <tr>
                            <td>{{$dt->code}}</td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->quantity}}</td>
                            <td>{{$dt->price}}</td>
                            <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".add-service" name="btneditservice">Edit</button></td>
                          </tr>
                          
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>

<!-- modal -->
          
              <div class="modal fade add-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content" >
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông Tin Dịch Vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <!--modal body -->
              <form action="{{route('postservice')}}" method="POST">
                <div class="modal-body">
                <input type="hidden" name="_token"  value="{{csrf_token()}}">   
                  <div>
                    <span style="color: black; font-weight: bold">Tên Dịch Vụ</span>
                    <input required type="text" class="form-control" disabled style="width: 13rem; float: right; margin-right: 10px" name="service">
                  </div>
                  <br>
                  <div>
                    <span style="color: black; font-weight: bold">Số Lượng</span>
                    <input required type="number" min="0" disabled class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="quantity">
                  </div>
                  <br>
                  <div>
                    <span style="color: black; font-weight: bold">Chi Phí</span>
                    <input required type="number" min="0" class="form-control" style="width: 13rem; float: right; margin-right: 10px" name="price">
                  </div>
                  <br>
                </div>
                <div class="modal-footer">
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
                <form action="{{route('xoaservice')}}" method="GET">
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
   $('[name=btneditservice]').click(function() {
        var row = $(this).closest("tr")[0];
        $('[name=service]').val(row.cells[1].innerText);
        $('[name=quantity]').val(row.cells[2].innerText);
        $('[name=price]').val(row.cells[3].innerText);

        $('#codeservice').val(row.cells[0].innerText);
    });
   $('[name=btnxoaservice]').click(function() {
      var row = $(this).closest("tr")[0];
        $('#code').val(row.cells[0].innerText);
    });
 </script>

 
 @endsection