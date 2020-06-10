@extends('admin.master')
@section('main')
<div class="content-wrapper">
	<div class="row">		
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body ">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title text-center">LƯƠNG NHÂN VIÊN</h3>								
								<form action="{{route('salary')}}" method="GET">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>STT</th>
													<th>Mã nhân viên</th>
													<th>Nhân viên</th>									
													<th>Tổng hiệu suất (%)</th>
													<th>Lương cơ bản</th>
													<th>Tổng trừ</th>
													<th>Tổng thưởng</th>
													<th>Tổng lương (VNĐ)</th>
												
												</tr>
											</thead>
											<tbody>

												@foreach($triages as $row)
												<tr>
													<td>{{$loop->index+1}}</td>
													<td>{{$row->Id_Staff}}</td>
													<td>{{$row->todo->workpro->staff->Staff_Name}}</td>
													<td>{{$row->sum}}</td>  
													<td>{{number_format($row->todo->workpro->staff->position->Salary,0)}}</td>
													<td>{{number_format($row->minus,0)}}</td>   
													<td>{{number_format($row->plus,0)}}</td>  
													<td>{{number_format($row->todo->workpro->staff->Salary,0)}}</td>         
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
									<button class="btn btn-success" style="margin-top:10px" type="submit">Cập nhật</button>
									<button class="btn btn-success" style="margin-top:10px" > <a href="{{route('export_view')}}" style="    color: #fff; text-decoration: none">Xuất Excel</a></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@stop