@extends('app')
@section('content')
<!-- Modal -->
<div id="workspace" class="hidden">{{$workspace}}</div>
<div class="modal fade" id="showQuestionModal" tabindex="-1" role="dialog" aria-labelledby="showQuestionModal">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel question-header"></h4>
	  </div>
	  <div class="modal-body single-question">
		<div class="col-xs-6">
			<img src="http://placehold.it/400x400" alt="">
		</div>
		<div class="col-xs-6">
			<div class="panel-title">
				<h3 class="question-title"></h3>
			</div>
			<div class="answers">
				
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
	<div class="panel-title">
		<h3 style="float:left;">WORKSPACE</h3><h4 class="solving-mode" style="display:none;float:left"></h4><div class="clearfix"></div>
	</div>
	<div class="workspace">
        <div class="trashbin">
            <i class="fa fa-trash fa-2x"></i>
        </div>
		<div class="drop-notifier">
            <i class="fa fa-download fa-2x"></i><br>
			<span>You can drag and drop tools here!</span>
		</div>
        <div class="submit-answer">
            <i class="fa fa-arrow-right"></i>
        </div>
        <div class="create-question">
            <i class="fa fa-plus-circle"></i>
        </div>
	</div>
</div>
<div class="col-xs-6 questions-wrapper">
	<div class="panel-title">
		<h3>QUESTIONS</h3>
	</div>
	<div class="questions row">
        @foreach($questions as $question)
		<div class="question col-xs-6" data-id="{{$question->id}}">
			<div class="body">
                <img src="{{$question->image->src()}}">
			</div>
			<div class="footer">
				<div class="solve-button" data-question="{{$question->id}}">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="footer-answers">{{sizeof($question->comments)}}</div>
			</div>
		</div>
        @endforeach
	</div>
</div>
@endsection
@section('css')
	<link href="/assets/css/user.css" rel="stylesheet">
@endsection
@section('js')
    <script src="/libs/jquery-ui/jquery-ui.js"></script>
	<script src="/assets/js/user.js"></script>
    <script src="/assets/js/non-coffee-user.js"></script>
@endsection
