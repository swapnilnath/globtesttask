@extends('admin.layouts.app')
@section('page_title')
	Gift Management
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Gift Listing</h2>
	</div>
	<div class="col-lg-2">
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-content">
					<div class="col-md-12">
						<a href="{{ route('admin.gift.create')  }}" class="btn btn-success m-b pull-right" ><i class="fa fa-plus"></i> Add Gift</a>
						<div class="table-responsive">
							{!! $html->table(['class' => 'table table-striped table-bordered dt-responsive'], false) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('styles')

<style type="text/css">
	table.dataTable {
		clear: both;
		margin-top: 6px !important;
		margin-bottom: 6px !important;
		max-width: none !important;
		border-collapse: separate !important;
		width: 100% !important;
	}
	.op-btn{
		margin-right:22px;
	}
</style>

@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
{!! $html->scripts() !!}

<script type="text/javascript">
	$(document).on("click","a.deletegift",function(e){
		var row = $(this);
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this record",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#e69a2a",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm){
			if (isConfirm) {
				$.ajax({
					url:"{{route('admin.gift.delete',[''])}}"+"/"+id,
					type: 'post',
					data: {"_token": "{{ csrf_token() }}"
					},
					success:function(msg){
						if(msg.status == 'success'){
							location.reload();
						}else{
							swal("Warning!", msg.message, "warning");
							//swal("Deleted!",  msg.message, "success");

						}
					},
					error:function(){
						swal("Error!", 'Error in delete Record', "error");
					}
				});
				//swal("Deleted!", "Operator has been deleted.", "success");

			} else {
				swal("Cancelled", "Your Store is safe :)", "error");
			}
		});
		return false;
	})

	$(document).on("click","a.change_status",function(e){
		var row = $(this);
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure you want to update Status?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#e69a2a",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm){
			if (isConfirm) {
				$.ajax({
					url:"{{ route('admin.gift.change_status','replaceid') }}",
					type: 'post',
					data: {"_method": 'post',
						'id':id,
						"_token": "{{ csrf_token() }}"
					},
					success:function(msg){
						if(msg.status == 'success'){
							location.reload();
						}else{
							swal("Warning!", msg.message, "warning");
							//swal("Deleted!",  msg.message, "success");

						}
					},
					error:function(){
						swal("Error!", 'Error in delete Record', "error");
					}
				});
				//swal("Deleted!", "Operator has been deleted.", "success");

			} else {
				swal("Cancelled", "Your Status is safe :)", "error");
			}
		});
		return false;
	})
</script>
@endsection
