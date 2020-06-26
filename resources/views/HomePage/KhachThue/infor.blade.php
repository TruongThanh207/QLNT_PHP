<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <base href="{{Asset('')}}">
    <link rel="stylesheet" href="Asset/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="Asset/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- jQuery Circle-->
  
    <link rel="stylesheet" href="Asset/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Asset/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Asset/css/custom.css">
    <!-- Favicon-->
    <link rel="icon" href="Asset/images/icons/favicon.ico">

    <link rel="stylesheet" href="Asset/css/stylennice.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="Asset/images/123.jpg" alt="logo" >
            <!-- class="img-fluid rounded-circle" -->
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>TT</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        
        <div class="main-menu">
          
          <ul id="side-main-menu" class="side-menu list-unstyled abc">                  
        
            
        </div>
       
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"></i></a>
                  <div class="brand-text d-none d-md-inline-block">
                    <strong class="text-primary">XEM HÓA ĐƠN</strong>
                  </div>
                </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
               
                <!-- Messages dropdown-->
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown">
                  <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                      <img src="images/9skk_2.jpg" class="img-fluid rounded-circle" alt="avatar">
                    </a>
                    
          
                      <ul class="dropdown-menu">
                        <li>
                          <a rel="nofollow" href="{{route('logout')}}" class="dropdown-item"> 
                          <span>Logout</span>
                          </a>
                        </li>

                      </ul>
                    </li>
            </div>
          </div>
        </nav>
      </header>
      <section>
        <div class="container-fluid">

    		      <!-- header -->
                <div class="card-header">
                  @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
                  <div class="row">
                    <div class="col-md-6">
                      <form action="{{route('getbillbymonth')}}" method="GET">
                       <input type="hidden" name="_token"  value="{{csrf_token()}}">
                      <div class="form-group form-inline" >
                        <input type="text" name="cmnd-disable" value="{{$cmnd}}" disabled style="width: 150px" class="form-control">
                        <input type="hidden" class="hidden" name="cmnd" value="{{$cmnd}}">
                        <select class="form-control" name="month" style="width: 250px" id="exampleFormControlSelect1">
                          
                          <option value="1" <?php if($monthnow==1) echo "selected"; ?>>Tháng 1</option>
                          <option value="2" <?php if($monthnow==2) echo "selected"; ?>>Tháng 2</option>
                          <option value="3" <?php if($monthnow==3) echo "selected"; ?>>Tháng 3</option>
                          <option value="4" <?php if($monthnow==4) echo "selected"; ?>>Tháng 4</option>
                          <option value="5" <?php if($monthnow==5) echo "selected"; ?>>Tháng 5</option>
                          <option value="6" <?php if($monthnow==6) echo "selected"; ?>>Tháng 6</option>
                          <option value="7" <?php if($monthnow==7) echo "selected"; ?>>Tháng 7</option>
                          <option value="8" <?php if($monthnow==8) echo "selected"; ?>>Tháng 8</option>
                          <option value="9" <?php if($monthnow==9) echo "selected"; ?>>Tháng 9</option>
                          <option value="10" <?php if($monthnow==10) echo "selected"; ?>>Tháng 10</option>
                          <option value="11" <?php if($monthnow==11) echo "selected"; ?>>Tháng 11</option>
                          <option value="12" <?php if($monthnow==12) echo "selected"; ?>>Tháng 12</option>
                        </select>
                         <button type="submit" class="btn btn-md btn-danger">Search</button>
                      </div>
                    </form>
                    </div>
                    <div class="col-md-6 text-right">
                      <a type="button" style="color: white" data-toggle="modal" data-target=".thanhtoan-modal" name="billnow" class="btn btn-primary">Hoá Đơn Hiện Tại</a>
                    </div>
                  </div>
                  
                  
                </div>

                <!-- body -->
                   @if(isset($data))
                 <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Phòng</th>
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
                        @foreach($data as $kt)
                        <tr>
                          <td>{{$kt->roomcode}}</td>
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
                        {{$data->links()}}
                      </tbody>
                    </table>
                  </div>
                </div>
                @endif


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
                        <div class="col-md-12">
                          <div class="card">
                           
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>{{$date}}</th>
                                      <th></th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <tr>
                                      <td>Tiền Phòng</td>
                                      <td >
                                        @if($month==1)
                                            @if(@daydk==1 && @daynow==1)
                                             <p id="tienphong">{{$room->price}}</p>
                                             @endif
                                            
                                            @if(@daydk!=1 && @daynow==1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*$day/30}}</p>
                                            @endif
                                               
                                            @if(@daynow!=1)
                                              <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*$day1/30}}</p>
                                            @endif
                                        @else
                                          @if($month==0)
                                           <p style="color: red; font-weight: bold;" id="tienphong">{{$room->price*($daynow-$daydk)/30}}</p>
                                          @else
                                            @if (@daynow==1)
                                              <p id="tienphong">{{$room->price}}</p>
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
                                      <td></td>
                                      
                                    </tr>
                                    
                                     <tr>
                                      <td>Dịch Vụ</td>
                                      <td>
                                         @foreach($service as $s)
                                          @if($s->name=='Internet')
                                       <div class="form-check form-check-inline">
                                       
                                         
                                          <input class="form-check-input" type="checkbox" id="internet" value="{{$s->price}}">
                                          <label class="form-check-label" id="internetlabel" for="inlineCheckbox1">Internet  ({{$s->price}})</label>
                                        </div>
                                        @endif
                                        @endforeach
                                        @foreach($service as $s)
                                          @if($s->name=='Truyền Hình Cáp')
                                       <div class="form-check form-check-inline">
                                       
                                         
                                          <input class="form-check-input" type="checkbox" id="thcap" value="{{$s->price}}">
                                          <label class="form-check-label" id="thcaplabel" for="inlineCheckbox1">Truyền Hình Cáp   ({{$s->price}})</label>
                                        </div>
                                        @endif
                                        @endforeach
                                      </td>
                                      <td></td>

                                    </tr>
                                    <tr>
                                      <td>Xe</td>
                                      <td><input type="number" id="xe" style="width: 10rem; float: left; margin-right: 10px" name="xe" value="{{$countxe}}" disabled="true"></td>
                                      <td>
                                        <p id="xe_price">
                                        @foreach($service as $s)
                                         @if($s->name == 'Xe')
                                         {{$s->price}}
                                         @endif
                                         @endforeach
                                       </p>
  
                                      </td>
                                    </tr>
                                   <tr>
                                     
                                      <td>Tổng Tiền</td>
                                      <td><p id="tongtien" style="color: red; font-weight: bold;"></p></td>
                                      <td><p style="color: red">Chưa bao gồm tiền điện và tiền nước!</p></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                </div> 
    	       </div>
             <footer style="position: fixed;
                            bottom: 60px;
                            width: 80%;
                            text-align: center;"  >
               <div class="form-group">
                <form action="{{route('postphanhoi')}}" method="POST">
                  <input type="hidden" name="_token"  value="{{csrf_token()}}">
                   <label for="exampleFormControlTextarea1" style="float: left; font-weight: bold;">Phản hồi</label>
                   <input type="hidden" class="hidden" name="cmndfeedback" value="{{$cmnd}}">
                   <input type="hidden" class="hidden" name="code" value="{{$infor->code}}">
                    <textarea class="form-control" name="textreponse" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                   <button type="submit" class="btn btn-md btn-primary">Send</button>
                </form>
                   
             </footer>
                
      </section>
	    <footer class="main-footer footerstd">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Truong Van Thanh - Nguyen Manh Tung</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Quan ly nha tro</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
   
    <!-- JavaScript files-->
    <script src="Asset/vendor/jquery/jquery.min.js"></script>
    <script src="Asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="Asset/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="Asset/js/front.js"></script>
     <script>
      $('[name=billnow]').click(function(){

     
     var tienphong = $('#tienphong').text();
     var debit = $('#debit').text();
     var xe_price = $('#xe_price').text();
     var xe =$('#xe').val();
      
    // $('#tongtien').text((parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price)+parseInt(index_nuoc)*parseInt(nuoc)+parseInt(index_dien)*parseInt(dien) + parseInt(oghep)));
    var x = parseInt(tienphong) +parseInt(debit) + xe*parseInt(xe_price);
      $('#tongtien').text(x);
      $('#codemoney').val(x);
    var tongtien =0;
    var thcap =0;
    var flag=0;
    var flag1=0;
    var internet = 0;
    $('#thcap').click(function(){
        if(flag==0)
        {
          thcap = $('#thcap').val();
          x += parseInt(thcap);
          $('#tongtien').text(x);
          $('#codemoney').val(x);
          flag=1;
        }
        else
        {
          thcap = $('#thcap').val();
          x -= parseInt(thcap);
          $('#tongtien').text(x);
          $('#codemoney').val(x);
          flag=0;
        }
        
      
    })
     $('#internet').click(function(){
     
      if(flag1==0)
      {
         internet = $('#internet').val();
        x += parseInt(internet);
        $('#tongtien').text(x);
        $('#codemoney').val(x);
        flag1=1;
      }
      else{

         internet = $('#internet').val();
        x -= parseInt(internet);
        $('#tongtien').text(x);
        $('#codemoney').val(x);
        flag1=0;
      }

       


      
    })
      
     

  });
    </script>
  </body>
</html>

