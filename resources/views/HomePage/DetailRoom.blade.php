@extends('Layoutshare')
 @section('content')



<!-- chi tiet phong -->
 <header> 
   @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
                        
           </header>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                  	<div class="col-md-6">
                  		<h2>Người Thuê</h2>
                  	</div>
					          <div class="col-md-6 text-right">
                  		<button type="button" class="btn btn-primary" data-toggle="modal" name="btnadd" data-target=".add-personal">New</button>
                  	</div>
                  </div>
                  
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Họ Và Tên</th>
                          <th>Giới Tính</th>
                          <th>Số Điện Thoại</th>
                          <th>Quê Quán</th>
                          <th>Số Lượng Xe</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($person as $ps)

                        <tr>
                          <td>{{$ps->name}}
                            <input type="hidden" class="hidden" value="{{$ps->code}}">
                          </td>
                          <td>{{$ps->gioitinh}}</td>
                          <td>0{{$ps->phone}}</td>
                          <td>{{$ps->state}}</td>
                          <td>{{$ps->vehicle}}</td>
                          <td><button type="button" name="btnedit" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".add-personal">Edit</button></td>
                          <td><button type="button" name="btndelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".xoa-person">Delete</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
<!-- chi tiet phong -->

<!-- feedback  -->
        @if(isset($feedback))
          <div class="row">
            <div class="col-md-12">
              <div class="card">
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h2>Phản Hồi</h2></th>
                          <th></th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($feedback as $fb)
                        <tr>
                          <td>{{$fb->notes}}</td>
                          <td>
                            @if($fb->status==0)
                            <form action="{{route('fixed',['id'=>$fb->code])}}" method="POST">
                              <input type="hidden" name="_token"  value="{{csrf_token()}}">
                              <button type="submit" class="btn btn-sm btn-danger">Pending</button>
                            </form>
                            @else
                             <button class="btn btn-sm btn-warning">Fixed</button>
                            @endif
                          </td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        @endif

<!-- nguoi thue -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h2>Thông Tin Phòng</h2></th>
                          <th></th>
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Mã đăng kí</td>
                          <td>{{$infor->code}}</td>
                          <td>Chỉ Số Điện</td>
                          
                        </tr>
                        <tr>
                          <td>Mã Phòng</td>
                          <td>{{$room->code}}</td>
                          <td><input type="number" id="index_dien" min="0" style="width: 10rem; float: left; margin-right: 10px" value="" name="dien" ></td>
                          
                        </tr>
                        <tr>
                          <td>Ngày đăng kí</td>
                          
                          <td><?php $u = date('d-m-Y', strtotime($infor->registerday)); echo $u ?></td>
                        
                          <td></td>
                        </tr>

                        <tr>
                          <td>Người đại diện</td>
                          <td>{{$infor->nguoidaidien}}</td>
                          <td>Chỉ Số Nước</td>
                          
                        </tr>
                        <tr>
                          <td>Số CMND</td>
                          <td>{{$infor->CMND}}</td>
                          <td><input type="number" id="index_nuoc" min="0" style="width: 10rem; float: left; margin-right: 10px" value="" name="cmnd" ></td>
                          
                        </tr>
                        <tr>
                          <td>Giá Phòng</td>
                          <td style="color: red; font-weight: bold;">{{number_format($room->price)}} VND</td>
                          <td></td>
                          
                        </tr>
                         <tr>
                          <td>Nợ</td>
                          <td style="color: red; font-weight: bold;">{{$debit->money}}</td>
                          <td></td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        <input type="hidden" class="hidden" id="codeinfor" value="{{$infor->code}}">
        <a type="button" style="color: white;" data-toggle="modal" data-target=".thanhtoan-modal" name="btnthanhtoan" class="btn btn-warning btn-sm">Thanh Toán</a>
        <a type="button" data-toggle="modal" style="color: white;" data-target=".xoa-modal" name="btntraphong" class="btn btn-dark btn-sm">Trả Phòng</a>
        <a type="button" data-toggle="modal" style="color: white;" data-target=".xoano-modal" name="btnxoano" class="btn btn-danger btn-sm">Xóa Nợ</a>

<!-- nguoi thue -->


<!-- add-modal-person -->
<div class="modal fade add-personal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content" >
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm Người Thuê</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!--modal body -->
                <div class="modal-body">
                  <form action="{{route('postaddpersonal', ['id'=>$infor->code])}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div>
                      <span style="color: black; font-weight: bold">Họ Và Tên</span>
                      <input required type="text" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="fullname">
                    </div>
                    
                    <br>
                    <div>
                      <span style="color: black; font-weight: bold">Số Điện Thoại</span>
                      <input required type="tel" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="tel">
                    </div>
                     <br>
                     <div>
                      <span style="color: black; font-weight: bold">Quê Quán</span>
                      <input required type="text" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="quequan">
                     </div>
                    
                     <br>
                    <div>
                      <span style="color: black; font-weight: bold">Số Lượng Xe</span>
                      <input required type="number" class="form-control" min="0" style="width: 13rem; float: right; margin-right: 10px" name="xe">
                    </div>
                    <br>
                    <div>
                       <span style="color: black; font-weight: bold">Giới Tính</span>
                        <select class="form-control"  name="gender" style="width: 13rem;float: right; margin-right: 10px">
                            <option selected>Nam</option>
                            <option>Nữ</option>
                        </select>
                    </div>
                    <br>
                <div class="modal-footer">
                   <input type="hidden" class="hidden" id="idcode" name="codeperson">
                   <input type="hidden" class="hidden" name="flag" id="flag">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
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
                <form action="{{route('gettraphong')}}" method="GET">
                  <input type="hidden" name="_token"  value="{{csrf_token()}}">
                    <div class="modal-body">Bạn có chắc muốn trả phòng không?</div>
                    <div class="modal-footer">
                      <input type="hidden" class="hidden" id="code" name="code">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                      <button type="submit" class="btn btn-danger">Có</button>
    
                    </div>
                  </form>
                  </div>
                </div>
              </div>

              <!-- modal xoa no -->
                <div class="modal fade xoano-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                <form action="{{route('xoano')}}" method="GET">
                  <input type="hidden" name="_token"  value="{{csrf_token()}}">
                    <div class="modal-body">Bạn có chắc chắn xóa nợ không?</div>
                    <div class="modal-footer">
                      <input type="hidden" class="hidden" id="codeno" name="codeno">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-danger">Xóa</button>
    
                    </div>
                  </form>
                  </div>
                </div>
              </div>


              <!-- modal thanh toan -->
               <div class="modal fade thanhtoan-modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                   
                      <div class="row">
                      <form action="{{route('pdf')}}" method="POST">
                      <input type="hidden" name="_token"  value="{{csrf_token()}}">
                        <div class="col-md-12">
                          <div class="card">
                          
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>{{$date}}</th>
                                      <th>Tính theo ngày 1 đầu tháng</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <tr>
                                      <td>Tiền Phòng</td>
                                      <td >
                                        @if($month==1)
                                            @if($daydk==1 && $daynow==1)
                                             <p id="tienphong">{{$room->price}}</p>
                                             @endif
                                            
                                            @if($daydk!=1 && $daynow==1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*$day/30}}</p>
                                            @endif
                                               
                                            @if($daynow!=1 &&$daydk==1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price}}</p>
                                            @endif
                                            @if($daynow!=1 && $daydk!= 1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*$day1/30}}</p>
                                            @endif
                                        @else
                                          @if($month==0)
                                           <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*($daynow-$daydk)/30}}</p>
                                          @else
                                            @if (@daynow==1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price}}</p>
                                            @else
                                             <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*$daynow/30}}</p>
                                            @endif
                                          @endif

                                        @endif
  
                                      </td>
                                      <td></td>
                                      
                                    </tr>
                                    <tr>
                                      <td>Nợ</td>
                                      <td ><p id="debit" style="color: red; font-weight: bold;">{{$debit->money}}</p></td>
                                      <input type="hidden" class="hidden" name="debitbill" value="{{$debit->money}}">
                                      <td></td>
                                      
                                    </tr>
                                    
                                     <tr>
                                      <td>Dịch Vụ</td>
                                      <td>
                                         @foreach($service as $s)
                                          @if($s->name=='Internet')
                                       <div class="form-check form-check-inline">
                                       
                                         
                                          <input class="form-check-input" type="checkbox" name="internet" id="internet" value="{{$s->price}}">
                                          <label class="form-check-label" id="internetlabel" for="inlineCheckbox1">Internet  ({{$s->price}})</label>
                                        </div>
                                        @endif
                                        @endforeach
                                        @foreach($service as $s)
                                          @if($s->name=='Truyền Hình Cáp')
                                       <div class="form-check form-check-inline">
                                       
                                         
                                          <input class="form-check-input" type="checkbox" name="thc" id="thcap" value="{{$s->price}}">
                                          <label class="form-check-label" id="thcaplabel" for="inlineCheckbox1" >Truyền Hình Cap   ({{$s->price}})</label>
                                        </div>
                                        @endif
                                        @endforeach
                                      </td>
                                      <td></td>

                                    </tr>
                                    <tr>
                                      <td>Xe</td>
                                      <td><input type="number" id="xe" style="width: 10rem; float: left; margin-right: 10px" name="xe" value="{{$countxe}}" disabled="true"></td>
                                      <input type="hidden" class="hidden" name="xe_count" value="{{$countxe}}">
                                      <td>
                                        <p id="xe_price">
                                        @foreach($service as $s)
                                         @if($s->name == 'Xe')
                                         {{$s->price}}
                                           <input type="hidden" class="hidden" name="xe_price" value="{{$s->price}}">
                                         @endif
                                         @endforeach
                                       </p>
                                      
  
                                      </td>
                                    </tr>
                                    <tr>
                                       @foreach($service as $s)
                                          @if($s->name=='Chỉ Số Điện')
                                      <td>Điện</td>
                                      <td><input type="number" id="index_dien_chot" min="0" style="width: 10rem; float: left; margin-right: 10px" disabled name="dien"></td>
                                       <input type="hidden" class="hidden" name="dien" id="dien_chot">
                                      <td><p id="dien">{{$s->price}}</p></td>
                                      <input type="hidden" class="hidden" name="price_dien" id="price_dien">
                                       @endif
                                        @endforeach
                                    </tr>
                                     <tr>
                                      @foreach($service as $s)
                                          @if($s->name=='Chỉ Số Nước')
                                      <td>Nước</td>
                                      <td>  <input type="number" id="index_nuoc_chot" min="0" style="width: 10rem; float: left; margin-right: 10px" disabled></td>
                                       <input type="hidden" class="hidden" name="nuoc" id="nuoc_chot">
                                       <input type="hidden" class="hidden" name="price_nuoc" id="price_nuoc">
                                      <td><p id="nuoc">{{$s->price}}</p></td>
                                        @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                     
                                      <td>Tổng Tiền</td>
                                      <td><p id="tongtien" style="color: red; font-weight: bold;"></p></td>
                                      <td></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        
                         <input type="hidden" class="hidden" id="use" name="use" value="{{Auth::user()->id}}">
                         <input type="hidden" class="hidden" name="daynow" value="{{$date}}">
                         <input type="hidden" class="hidden" name="cmnd" value="{{$infor->CMND}}">
                         <input type="hidden" class="hidden" name="roomcode" value="{{$infor->roomcode}}">
                         <input type="hidden" class="hidden" id="roommney" name="roommney">
                         <input type="hidden" class="hidden" id="totalmoney" name="totalmoney">
                        <button type="submit" class="btn btn-primary">In Hóa Đơn </button>

                      </form>
                      <form action="{{route('ghino', ['id'=>$infor->code])}}" method="POST">
                          <input type="hidden" name="_token"  value="{{csrf_token()}}">
                          <input type="hidden" class="hidden" id="codemoney" name="codemoney">
                          <button type="submit" class="btn btn-primary">Ghi Nợ</button>
                        </form>
                      </div>
                  </div>

                </div>

                 
              </div>

<!-- xoa modal -->
              <div class="modal fade xoa-person" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                <form action="{{route('xoaperson')}}" method="GET">
                  <input type="hidden" name="_token"  value="{{csrf_token()}}">
                    <div class="modal-body">Bạn có chắc muốn xóa không?</div>
                    <div class="modal-footer">
                      <input type="hidden" class="hidden" id="codeperson" name="code">
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
    var x = $(this).parents('tr').find('input[type="hidden"]').val();
        $('#idcode').val(x);
      var row = $(this).closest("tr")[0];
        $('[name=fullname').val(row.cells[0].innerText);
        //$('[name=tel').val(row.cells[1].innerText);
        
         $('[name=tel').val(row.cells[2].innerText);
         $('[name=quequan').val(row.cells[3].innerText);
         $('[name=xe').val(row.cells[4].innerText);
          $('[name=gender').val(row.cells[1].innerText);
          $('#flag').val('1');

    });
$('[name=btnadd]').click(function() {

      $('[name=fullname').val('');
      $('[name=tel').val('');
         $('[name=quequan').val('');
         $('[name=xe').val('');
        $('#flag').val('0');
        
    });


  $('[name=btndelete]').click(function() {
      var row = $(this).parents('tr').find('input[type="hidden"]').val();
        $('#codeperson').val(row);
    });
  
  $('[name=btntraphong]').click(function() {
      var x = $('#codeinfor').val();
        $('#code').val(x);
    });
 $('[name=btnxoano]').click(function() {
      var x = $('#codeinfor').val();
        $('#codeno').val(x);
    });
  $('[name=btnthanhtoan]').click(function(){
     
     var tienphong = $('#tienphong').text();
     var debit = $('#debit').text();
     var xe_price = $('#xe_price').text();
     var nuoc = $('#nuoc').text();
     var dien = $('#dien').text();
     var y = parseInt($('#tienphong').text());
     $('#roommney').val(y);
     var xe =$('#xe').val();
      
    $('#index_dien_chot').attr("value",""+$('#index_dien').val()+"");
    $('#index_nuoc_chot').attr("value",""+$('#index_nuoc').val()+"");
    var index_nuoc =$('#index_nuoc_chot').val();
    var index_dien =$('#index_dien_chot').val();
    if(index_dien=="")
    {
      index_dien='0';
    }
    if(index_nuoc=="")
    {
      index_nuoc='0';
    }

    // $('#tongtien').text((parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price)+parseInt(index_nuoc)*parseInt(nuoc)+parseInt(index_dien)*parseInt(dien) + parseInt(oghep)));
    var x = parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price)+parseInt(index_nuoc)*parseInt(nuoc)+parseInt(index_dien)*parseInt(dien);
      $('#tongtien').text(x);
      $('#codemoney').val(x);
       $('#totalmoney').val(x);
    var tongtien =0;
    var thcap =0;
    var internet = 0;
    var flag1 = 0;
    var flag2 = 0;

    $('#thcap').click(function(){
      if(flag1==0)
      {
         thcap = $('#thcap').val();
          x += parseInt(thcap);
          $('#tongtien').text(x);
          $('#codemoney').val(x);
           $('#totalmoney').val(x);
           flag1=1;
      }
      else
      {
         thcap = $('#thcap').val();
          x -= parseInt(thcap);
          $('#tongtien').text(x);
          $('#codemoney').val(x);
           $('#totalmoney').val(x);
          flag1=0;
      }
     
     
    })
     $('#internet').click(function(){
      if(flag2==0){
        internet = $('#internet').val();
        flag2=1;
        x += parseInt(internet);
        $('#tongtien').text(x);
        $('#codemoney').val(x);
         $('#totalmoney').val(x);
      }
      else
      {
        internet = $('#internet').val();
        flag2=0;
        x -= parseInt(internet);
        $('#tongtien').text(x);
        $('#codemoney').val(x);
         $('#totalmoney').val(x);
      }
     
    })
      $('#nuoc_chot').attr("value",$('#index_nuoc').val());
      $('#dien_chot').attr("value",$('#index_dien').val());
      $('#price_dien').attr("value",$('#dien').text());
      $('#price_nuoc').attr("value",$('#nuoc').text());

    //tinh tien phonng

  });
     
</script>

@endsection