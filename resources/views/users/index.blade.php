@extends('app')
@section('content')
<div class="col-xs-6 workspace-wrapper">
	<div class="panel-title">
		<h3>TOOLBOX</h3>
	</div>
	<div class="toolbox">
		<div class="tool">
			<div class="icon">
				&#8747;
			</div>
			Integral
		</div>
		<div class="tool">
			<div class="icon">√</div>
			Squareroot
		</div>
		<div class="tool">
			<div class="icon">
				<i class="fa fa-arrow-right"></i>
			</div>
			Right Arrow
		</div>
		<div class="tool">
			<div class="icon">
				<i class="fa fa-arrow-left"></i>
			</div>
			Left Arrow
		</div>
	</div>
	<div class="panel-title">
		<h3>WORKSPACE</h3>
	</div>
	<div class="workspace">

	</div>
</div>
<div class="col-xs-6 questions-wrapper">
	<div class="panel-title">
		<h3>QUESTIONS</h3>
	</div>
	<div class="questions">
		yis
	</div>
</div>
@endsection
@section('css')
	<link href="/assets/css/user.css" rel="stylesheet">
@endsection
