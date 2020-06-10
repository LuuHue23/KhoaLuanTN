@extends('admin.master')
@section('main')

<div class="content-wrapper">
  <div class="row">
    <!-- <div class="col-12"> -->



<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Danh sách đánh giá</h4>
     <!--  <div class="row grid-margin">
        <div class="col-12">
          <div class="alert alert-warning" role="alert">
            <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table" cellspacing="0" width="100%">
              <thead>
                <tr class="bg-primary text-white">
                  <th>STT</th>
                  <th>Nhóm mục tiêu</th>
                  <th>Tên mục tiêu</th>                           
                  <th>Nhân viên</th>
                  <th >Hiệu suất(%)</th>
                  <th>Trừ</th>
                  <th>Cộng</th>
                  
                         
                </tr>
              </thead>
              <tbody>
                @foreach($rate as $row)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$row->todo->workpro->target->targetgroup->TarG_Name}}</td>       
                  <td>{{$row->todo->workpro->target->Tar_Name}}</td>       
                  <td>{{$row->todo->workpro->staff->Staff_Name}}</td>       
                  <td>{{$row->Rate}}</td>  
                  <td>{{$row->Minus}}</td>
                  <td>{{number_format($row->Plus,0)}}</td>
                </tr>
                @endforeach           
            </tbody>
          </table>                        
        </div>
      </div>
    </div>
  </div>
</div>
</div>




</div>



<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="container-fluid clearfix">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2017 <a href="#">UrbanUI</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
  </div>
</footer>
<!-- partial -->

</div>
@stop
