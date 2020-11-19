<!-- admin user update -->
@extends('admin.layouts.app')
@section('title')
	Post Management - Edit
@endsection
@section('mainContent')
@if(Session::has('message'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-{{ Session::has('alert-type') }}">
			{!! Session::get('message') !!}
		</div>
	</div>
</div>
@endif
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Edit Post Management</h2>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">

				</div>
				<div class="ibox-content">
					{!!Form::model($post,array('method'=>'POST','files'=>true,'route'=>array('admin.post.update',$post->id)))!!}
					@include('admin.pages.posts.form')
					<div class="col-sm-6">
						<div class="form-group row">
							<div class="col-sm-8 col-sm-offset-8">
								<a href="{{route('admin.post.index')}}"><button class="btn btn-danger btn-sm" type="button">Cancel</button></a>
								<button class="btn btn-success btn-sm" type="submit">Edit Save</button>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


