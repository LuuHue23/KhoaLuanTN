@extends('admin.master')
@section('main')

<div class="content-wrapper">
  <div class="row">
    <!-- <div class="col-12"> -->

      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center">Đánh giá</h2>

            <form class="forms-sample" method="POST" enctype="multipart/form-data" >
              @csrf

            <div class="table-responsive">

              <table id="order-listing" class="table" cellspacing="0" width="100%">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>Tên mục tiêu</th>                           
                    <th>Nhân viên</th>
                    <th>Chỉ tiêu</th>
                    <th>Hoàn thành(%)</th>
                    <th>Trọng số (%)</th>

                    <th>Hạn nộp</th>
                    <th>Ngày nộp</th>
                   
                  </tr>

                </thead>
                <tbody>

                  <td>
                   {{$workpro->target->targetgroup->TarG_Name}}
                 </td>
                 <td>                 
                  {{$workpro->staff->Staff_Name}}
                </td>
                <td>100</td>
                <td>
                  {{$workpro->target->percent}}
                </td>
                <td>
                 {{$workpro->target->Impor}}
               </td>
               <td>{{$workpro->Date_End}}</td>

               <td>
                {{$workpro->todo->updated_at}}
              </td>
              
             


           </tbody>

         </table>
       </div>
       <button type="submit" class="btn btn-success mr-2">Đánh giá</button>

     </form>
   </div>
 </div>
</div>



<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Danh sách đánh giá</h4>
      <div class="row grid-margin">
        <div class="col-12">
          <div class="alert alert-warning" role="alert">
            <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table" cellspacing="0" width="100%">
              <thead>
                <tr class="bg-primary text-white">
                  <th>STT</th>
                  <th>Tên mục tiêu</th>                           
                  <th>Nhân viên</th>
                  <th>Hiệu suất</th>
                                   
                </tr>
              </thead>
              <tbody>
               @foreach($rate as $row)
               <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->todo->workpro->target->Tar_Name}}</td>
                <td>{{$row->todo->workpro->staff->Staff_Name}}</td>
                <td>{{$row->Rate}}</td>

           
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