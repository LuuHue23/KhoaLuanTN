@extends('admin.master')
@section('main')

<div class="content-wrapper">
  <div class="row">
    <!-- <div class="col-12"> -->

      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">GIAO CÔNG VIỆC</h4>
            <h5>Giao mục tiêu cho tháng</h5>
            <form action="{{route('filterwork')}}" method="GET" >
              @csrf
              <div class="row">

                <div class="col-md-2">

                  <input class="form-control"  type="date" name='Date_Start' value='Date_Start'>
                </div>

                <div class="col-md-2">
                  <input class="form-control" type="date" name="Date_End" value='Date_E'>
                </div>
                <div class="col-md-2">
                 <button type="submit" class="btn btn-success" style=" padding-left: 6px;
                 margin-top: 2px;"><i class="fa fa-search" aria-hidden="true" ></i> Lọc</button>
               </div>
             </div>


           </form>

          <form class="forms-sample" action="{{route('add_workpro')}}" method="POST" enctype="multipart/form-data">
            @csrf
           

           <div class="row">
            <div class="col-md-6" style="margin-top: 10px;">

              <div class="form-group">
                <label for="exampleFormControlSelect12">Nhóm mục tiêu</label>
                <select class="form-control" name="Id_TarG">
                  @foreach($targg as $value)
                  <option value="{{$value->Id_TarG}}">{{$value->TarG_Name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6" style="margin-top: 10px;">
             <div class="form-group">
              <label for="exampleTextarea1">Ngày giao </label>
              <input type="date" class="form-control" name="Date_Start" >
            </div>
          </div>
        </div>
        <div class="row">
         <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlSelect12">Tên mục tiêu</label>
            <select class="form-control" name="Id_Tar">
             @foreach($tar as $value)
             <option value="{{$value->Id_Tar}}">{{$value->Tar_Name}}</option>
             @endforeach
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="exampleTextarea1">Ngày dự kiến hoàn thành </label>
          <input type="date" class="form-control" name="Date_End" >
        </div>
      </div>



    </div>
    <div class="row"> 
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect13">Người thực hiện</label>
          <select class="form-control" name="Id_Staff">
            @foreach($staff as $value)
            <option value="{{$value->Id_Staff}}">{{$value->Staff_Name}}</option>
            @endforeach
          </select>
        </div>
      </div>

    </div>
    <button type="submit" class="btn btn-success mr-2">Giao</button>

  </form>
</div>
</div>
</div>



<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center">TIẾN ĐỘ CÔNG VIỆC</h4>
      <div class="row grid-margin">
        <div class="col-12">
          <form action="{{route('laravel-send-email')}}">
            <button class="btn btn-success">Nhắc nhở</button>
          </form>
        </div>
      </div>
      <!--  <form action="{{route('filter_workpro')}}" method="GET" style="margin-bottom: 3px" >
              @csrf
           <div class="row">
       
                <div class="col-md-2">
                  
                  <input class="form-control"  type="date" name='Date_Start' value='Date_Start'>
                </div>
                  
                <div class="col-md-2">
                  <input class="form-control" type="date" name="Date_End" value='Date_E'>
                </div>
                  <div class="col-md-2">
                 <button type="submit" class="btn btn-success" style=" padding-left: 6px;
                 margin-top: 2px;"><i class="fa fa-search" aria-hidden="true" ></i> Lọc</button>
               </div>
            </div>
              

          </form> -->
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table" cellspacing="0" width="100%">
              <thead>
                <tr class="bg-primary text-white">
                  <th>STT</th>
                  <th>Tên mục tiêu</th>
                  <th>Nhóm mục tiêu</th>
                  <th>Nhân viên</th>
                  <th>Tiến độ</th>
                  <!-- <th>Ghi chú</th> -->
                 <!--  <th>Hành động</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach($work as $row)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$row->target->Tar_Name}}</td>
                  <td>{{$row->target->targetgroup->TarG_Name}}</td>
                  <td>{{$row->staff->Staff_Name}}</td>
                  <td>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-info" role="progressbar" style="width: {{$row->target->percent}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                 
               </tr>
               @endforeach
             </tbody>
           </table>    
           {{$work->links()}}                    
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