@extends('Layoutshare')
 @section('content')




 <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Employee</h1>
          </header>
          @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{session('success')}}
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>  
                        @endif
          <div class="row">
            @foreach($data as $dt)
            @if($dt->username!=Auth::user()->username)
            <div class="col-md-6 col-xl-6">                       
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center"><span style="background-image: url('Asset/images/{{$dt->img}}')" class="avatar avatar-xl mr-3"></span>
                    <div class="media-body overflow-hidden">
                      <h5 class="card-text mb-0">{{$dt->name}}</h5>
                      <p class="card-text">Email: {{$dt->email}}<br>
                        Tel: (+84) {{$dt->tel}}
                      </p>
                    </div>
                  </div>
                  <a href="{{route('getdetailemployee', ['id'=>$dt->id])}}" class="tile-link"></a>
                </div>
              </div>
            </div>
            @endif
            @endforeach
             <div class="col-md-6 col-xl-6">                       
              <div class="card">
                <div class="card-body card-add-employee">
                  <span class="avatar avatar-xl mr-3 add-employeee"></span>
                  <a href="{{route('getaddemployee')}}" class="tile-link"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


 
 @endsection