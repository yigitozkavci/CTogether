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
	<div class="toolbox" data-topic="mathematics">
		<div class="tool">
			<div class="icon">
				&#8747;
			</div>
			<span>Integral</span>
		</div>
		<div class="tool">
			<div class="icon">√</div>
			<span>Squareroot</span>
		</div>
		<div class="tool">
			<div class="icon">
				<i class="fa fa-arrow-right"></i>
			</div>
			<span>Right Arrow</span>
		</div>
		<div class="tool">
			<div class="icon">
				<i class="fa fa-arrow-left"></i>
			</div>
			<span>Left Arrow</span>
		</div>
        <div class="tool">
			<div class="icon">
				<sup>2</sup>
			</div>
			<span>Square</span>
		</div>
        <div class="tool" data-type="text">
			<div class="icon">
				<i class="fa fa-text-width"></i>
			</div>
			<span>Text</span>
		</div>
	</div>
    <div class="toolbox" data-topic="electronics">
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
    <div class="toolbox" data-topic="chemistry">
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
    <select class="topic-select sumoselect">
        <option value="mathematics">Mathematics</option>
        <option value="electronics">Electronics</option>
        <option value="programming">Programming</option>
        <option value="chemistry">Chemistry</option>
    </select>
	<div class="panel-title">
		<h3>WORKSPACE</h3>
	</div>
	<div class="workspace">
        <div class="trashbin">
            <i class="fa fa-trash fa-2x"></i>
        </div>
		<div class="drop-notifier">
            <i class="fa fa-download fa-2x"></i><br>
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
    <script src="/libs/jquery-ui/jquery-ui.js"></script>
	<script src="/assets/js/user.js"></script>
@endsection
