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
								<h4 class="card-title text-center">THỐNG KÊ KPI NHÂN VIÊN</h4>		
								<form action="{{route('salary')}}" method="GET">
									<div class="table-responsive">
										<table class="table table-bordered text-center">
											<thead>
												<tr>
													<th rowspan="2">STT</th>
													<th rowspan="2">Mã nhân viên</th>
													<th rowspan="2">Nhân viên</th>	
													<th rowspan="2">Tổng mục tiêu</th>	
													<th colspan="2">Chưa hoàn thành</th>	
													<th colspan="2">Hoàn thành</th>												
												</tr>
												<tr>

													<th style="color: green ">Đúng hạn</th>
													<th style="color: red ">Quá hạn</th>
													<th style='color: blue'>Đúng tiến độ</th>
													<th style="color: orange ">Chậm tiến độ</th>
												</tr>
											</thead>
											<tbody>
												@foreach($staff as $row)
												<tr>
													<td></td>
													<td>{{$row->Id_Staff}}</td>
													<td>{{$row->Staff_Name}}</td>						
													<td>{{$count}}</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												

												</tr>
												@endforeach
													

												
										</table>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@stop