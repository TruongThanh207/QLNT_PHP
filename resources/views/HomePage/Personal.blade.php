@extends('Layoutshare')
 @section('content')



  <header> 
          </header>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                  	<div class="col-md-6">
                  		<h4>NGƯỜI THUÊ PHÒNG</h4>
                  	</div>
					<div class="col-md-6 text-right">
                  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-personal">New</button>
                  	</div>
                  </div>
                  
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Họ Và Tên</th>
                          <th>Số Điện Thoại</th>
                          <th>Quê Quán</th>
                          <th>Số Lượng Xe</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>1</td>
                          <td><a href="#">Edit</a></td>
                          <td><a href="#">Delete</a></td>
                        </tr>
                        <tr>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td>1</td>
                          <td><a href="#">Edit</a></td>
                          <td><a href="#">Delete</a></td>
                        </tr>
                        <tr>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                          <td>1</td>
                          <td><a href="#">Edit</a></td>
                          <td><a href="#">Delete</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>

<!-- modal -->
  <div class="modal fade add-personal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content" >
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!--modal body -->
                <div class="modal-body">
                  <form>
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
	                    <input required type="number" class="form-control"  style="width: 13rem; float: right; margin-right: 10px" name="xe">
	                  </div>
						<br>
                    <div style="margin-right: 10px">
                        <select class="form-control"  name="role">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="btnAddservice">Save</button>
                </div>
                </form>
              </div>
          </div>
        </div>
      </div>
 <!-- modal -->
 @endsection