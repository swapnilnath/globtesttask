@extends('admin.layouts.app')
@section('page_title', 'Dashboard')
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-md-12">
		<h2><i class="fa fa-home" aria-hidden="true"></i> Dashboard</h2>		
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">

		<div class="col-lg-3">
			<div class="widget style1 navy-bg">
				<div class="row">
					<div class="col-4">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-8 text-right">
						<span> Users </span>
						<h2 class="font-bold">{{ $totalUsers }}</h2>
					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-3">
			<div class="widget style1 lazur-bg">
				<div class="row">
					<div class="col-4">
						<i class="fa fa-camera fa-5x"></i>
					</div>
					<div class="col-8 text-right">
						<span> Stores </span>
						<h2 class="font-bold">{{$totalStores}}</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="widget style1 yellow-bg">
				<div class="row">
					<div class="col-4">
						<i class="fa fa-music fa-5x"></i>
					</div>
					<div class="col-8 text-right">
						<span> Gift / Post </span>
						<h2 class="font-bold">{{$totalPosts}}</h2>
					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-3">
			<div class="widget style1 red-bg">
				<div class="row">
					<div class="col-4">
						<i class="fa fa-exclamation-circle fa-5x"></i>
					</div>
					<div class="col-8 text-right">
						<span> User Likes </span>
						<h2 class="font-bold">{{$totalLikes}}</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('styles')

@endsection

@section('scripts')

@endsection

