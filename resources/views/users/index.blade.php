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
		<div class="drop-notifier">
			You can drag and drop tools here!
		</div>
	</div>
</div>
<div class="col-xs-6 questions-wrapper">
	<div class="panel-title">
		<h3>QUESTIONS</h3>
	</div>
	<div class="questions row">
		<div class="question col-xs-6">
			<div class="body">
				<img src="http://placehold.it/400x400" alt="">
			</div>
			<div class="footer">
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
		<div class="question col-xs-6">
			<div class="body">
				<img src="http://placehold.it/400x400" alt="">
			</div>
			<div class="footer">
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
		<div class="question col-xs-6">
			<div class="body">
				<img src="http://placehold.it/400x400" alt="">
			</div>
			<div class="footer">
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
	<link href="/assets/css/user.css" rel="stylesheet">
@endsection
