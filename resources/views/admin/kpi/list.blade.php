@extends('Admin.master')
@section('main')

<div class="content-wrapper">
  <div class="row">
   <div class="col-12">
    <div class="card">
      <div class="card-body" style="margin-bottom: -18px;">
        <h4 class="card-title text-center" style= 'text-transform: uppercase;' > danh sách Mục tiêu</h4>
        <div class="row grid-margin">
          <div class="col-12">
            <form action="{{route('filter')}}" method="GET" >
              @csrf
           <div class="row">
                <div class="col-md-2">
                  <input class="form-control"  type="date" name='Date_Start'>
                </div>

                <div class="col-md-2">
                  <input class="form-control" type="date" name="Date_End">
                </div>
                  <div class="col-md-2">
                 <button type="submit" class="btn btn-success" style=" padding-left: 6px;
                 margin-top: 2px;"><i class="fa fa-search" aria-hidden="true" ></i> Lọc</button>
               </div>
            </div>
              

           </form>
         </div>


       </div>

     </div>
     <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table" cellspacing="0" width="100%">
            <thead>
              <tr class="bg-primary text-white text-center" >
                <th>STT</th>
                <th>Mã Mục tiêu</th>
                <th>Mã nhóm mục tiêu</th>
                <th>Tên mục tiêu</th>
                <th>Trọng số</th>
                <th>Mô tả</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kpii as $row)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->Id_Tar}}</td>
                <td>{{$row->targetgroup->TarG_Name}}</td>

                <td>{{$row->Tar_Name}}</td>
                <td>{{$row->Impor}}</td>
                <td>{{$row->Description}}</td>
                <td>
                  <button class="btn btn-light">
                   <a href="{{route('edit_kpi',['Id_Tar'=>$row->Id_Tar])}}" style="text-decoration: none"> <i class="mdi mdi-eye text-primary"></i>Sửa</a>
                 </button>
                 <button class="btn btn-light">
                   <a  href="{{route('delete_kpi',['Id_Tar'=>$row->Id_Tar])}}" style="text-decoration: none" onclick="return confirm('Bạn chắc chắn xóa chứ?')"> <i class="mdi mdi-close text-danger"></i>Xóa</a>
                 </button>
               </td>
             </tr>
             @endforeach

           </tbody>
         </table>   
          {{$kpii->links()}}      
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