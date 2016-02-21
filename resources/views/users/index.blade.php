@extends('app')
@section('content')
<!-- Modal -->
<div class="modal fade" id="showQuestionModal" tabindex="-1" role="dialog" aria-labelledby="showQuestionModal">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">{Question Name}</h4>
	  </div>
	  <div class="modal-body single-question">
		<div class="col-xs-6">
			<img src="http://placehold.it/400x400" alt="">
		</div>
		<div class="col-xs-6">
			<div class="panel-title">
				<h3>TOOLBOX</h3>
			</div>
			<div class="answers">
				<div class="answer">{Answer 1}</div>
				<div class="answer">{Answer 2}</div>
				<div class="answer">{Answer 3}</div>
				<div class="answer">{Answer 4}</div>
				<div class="answer">{Answer 5}</div>
			</div>
		</div>
		<div class="clearfix"></div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>
<div class="col-xs-6 workspace-wrapper">
	<div class="panel-title">
		<h3>TOOLBOX</h3>
	</div>
	<div class="toolbox">
		<div class="tool">
			<div class="icon" data-color="red">
				&#8747;
			</div>
			Integral
		</div>
		<div class="tool" data-color="red">
			<div class="icon">√</div>
			Squareroot
		</div>
		<div class="tool" data-color="red">
			<div class="icon">
				<i class="fa fa-arrow-right"></i>
			</div>
			Right Arrow
		</div>
		<div class="tool" data-color="red">
			<div class="icon">
				<i class="fa fa-arrow-left"></i>
			</div>
			Left Arrow
		</div>
        <select class="topic-select sumoselect">
            <option value="mathematics">Mathematics</option>
            <option value="electronics">Electronics</option>
            <option value="programming">Programming</option>
            <option value="chemistry">Chemistry</option>
        </select>
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
				<div class="answer-button">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
		<div class="question col-xs-6">
			<div class="body">
				<img src="http://placehold.it/400x400" alt="">
			</div>
			<div class="footer">
				<div class="answer-button">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
		<div class="question col-xs-6">
			<div class="body">
				<img src="http://placehold.it/400x400" alt="">
			</div>
			<div class="footer">
				<div class="answer-button">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="footer-answers">5 answers</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
	<link href="/assets/css/user.css" rel="stylesheet">
@endsection
@section('js')
	<script src="/assets/js/user.js"></script>
@endsection
