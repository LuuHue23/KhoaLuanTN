@extends('admin.master')
@section('main')

<div class="content-wrapper">
  <div class="row">
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
       <form action="{{route('filter_workpro')}}" method="GET" style="margin-bottom: 3px" >
           
           <div class="row">
          <!--   <label for="">Từ</label> -->
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
                  <th>Hành động</th>
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
                  <!-- <td>{{$row->Status}}</td> -->
                  <td>
                    <button class="btn btn-light" >
                      <a href="{{route('view',['Id_Tar'=>$row->Id_Tar])}}" style="text-decoration: none"><i class="mdi mdi-eye text-primary" ></i>Xem</a>
                    </button>
                    <button class="btn btn-light">
                     <a href="{{route('rate',['Id_Tar'=>$row->Id_Tar])}}" style="text-decoration: none" id="show_button" > <i class="mdi mdi-check text-danger"></i>Đánh giá</a>
                   </button>
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
<script type="text/javascript">
    var button = document.getElementById('show_button')
    button.addEventListener('click',hideshow,false);

    function hideshow() {
        document.getElementById('hidden-div').style.display = 'block'; 
        this.style.display = 'none'
    }   
</script>