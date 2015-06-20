@extends("layouts.default")

@section("title") Solve crosswords created by other people{{ $crossword ? " - ".$crossword->id : '' }} @stop

@section("resources")
	{{ HTML::script('https://www.google.com/recaptcha/api.js') }}
	{{ HTML::script('js/tab.min.js') }}
@stop

@section("url") www.allcrossword.com{{ $crossword ? "/crossword/".$crossword->id : '' }} @stop

@section("sidebar")
	<div class="blockquote" data-val="{{ $crossword ? $crossword->id : '' }}">
		<strong>Created By:</strong>&nbsp;&nbsp;<small>{{ $crossword ? htmlspecialchars($crossword->nick->label) : 'N/A'}}</small><br />
		<strong>Language:</strong>&nbsp;&nbsp;<small>{{ $crossword ? htmlspecialchars($crossword->language) : 'N/A'}}</small><br />
		<strong>Complexity:</strong>&nbsp;&nbsp;<small data-val="{{ $crossword ? $crossword->complexity : "0"}}"><span class="text-danger">{{ $crossword ? round($crossword->complexity, 2) : "0"}}</span></small><br />
		<strong>Published On:</strong>&nbsp;&nbsp;<small>{{ $crossword && $crossword->published_at != null ? Helpers::format_date($crossword->published_at) : 'N/A'}}</small>
	</div>
	
	<div class="half-spacer"></div>
	
	<ul class="list-unstyled options">
		<li><a href="#" rel="nofollow" data-action="save" class="show"><span class="glyphicon glyphicon glyphicon-save"></span>&nbsp;{{$progress ? 'Update' : 'Save'}} Progress</a></li>
		{{ $progress ? '<li><a href="#" rel="nofollow" data-action="discard" class="show"><span class="glyphicon glyphicon-trash"></span>&nbsp;Discard Progress</a></li>' : '' }}
		<li><a href="#" rel="nofollow" data-action="clear" class="show"><span class="glyphicon glyphicon-erase"></span>&nbsp;Clear Progress</a></li>
		<li><a href="#" rel="nofollow" data-action="reveal" class="show"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Reveal Solution</a></li>
		<li><a href="#" rel="nofollow" data-action="report" class="show"><span class="glyphicon glyphicon glyphicon-flag"></span>&nbsp;Report Error</a></li>
		<li><a href="#" rel="nofollow" data-action="embed" class="show"><span class="glyphicon glyphicon-console"></span>&nbsp;Embed Code</a></li>
	</ul>
	
	{{$crossword && $crossword->notes != '' ? '<div class="blockquote notes"><div class="half-spacer"></div><strong>NOTES</strong><div class="half-spacer"></div><small>'.htmlspecialchars($crossword->notes).'</small></div>' : '' }}
	<div class="blockquote"></div>
@stop

@section("content")
	<section class="panel content">
	
	@if(!$crossword)
		{{ '<h4>We could not find the '.($progress || $token ? 'saved work' : 'crossword').' that you are trying to '.($progress || $token ? 'resume' : 'open').'</h4>' }}
	@else
		{{
		'
		<p>
			To complete a Crossword, read the definitions of the horizontal and vertical words and fill the corresponding spaces on the crossword by clicking on them. You can see how you are doing it by following the notification of your progress. On the navigation panel, you have also several options to perform actions regarding this crossword. For more information, visit the <a href="' }}{{ url('/help') }}{{ '" class="button">&nbsp;HELP&nbsp;</a> section. <strong>If you are enjoying this crossword, don\'t forget to share it using the buttons at the top of the page!</strong>
		</p>
		
		<hr /><br />
		
		<div class="indicator"><strong>Your Progress: </strong>&nbsp;&nbsp;<small>0%</small><br /><br /></div>
		
		<div class="row">
			
			<div class="col-md-12 col-lg-7">
				
				<div class="blocks canvas" data-mode="'}}{{ $progress ? 'continue' : 'start' }}{{'"></div>
				
			</div>
			
			<div class="col-md-12 col-lg-5">
				
				<div class="captions">
					
					<ul class="nav nav-pills">
						<li class="active"><a href="#pane1" data-toggle="tab">Across</a></li>
						<li><a href="#pane2" data-toggle="tab">Down</a></li>
					</ul>
					
					<div id="tabs" class="tab-content">
						<ol id="pane1" class="unstyled-list tab-pane active"></ol>
						<ol id="pane2" class="unstyled-list tab-pane"></ol>
					</div>
					
				</div>
				
			</div>
			
		</div>
		<div id="layout" class="hide">' }} {{ $crossword ? htmlspecialchars($crossword->layout) : file_get_contents('public/layout.json') }} {{ '</div>
		<div id="progress" data-ref="' }}{{ $progress ? $progress->id : '' }}{{'" class="hide">' }}{{ $progress ? htmlspecialchars($progress->work) : '' }}{{ '</div>' }}
		{{ Session::has('feedback') ? '<div id="callback" data-head="info" class="hide"><strong>Your progress has been successfully saved.</strong><br /><br />A link to access to your saved progress was sent to your inbox. Check your spam folder if for some reason you are not able to find it. If it is not in the spam folder either, just copy the current <strong>URL</strong> from the navigation bar of your browser and keep it to access to your saved progress.<br /><br /></div>' : '' }}
		{{ $token && !$progress ? '<div id="callback" data-head="info" class="hide">Your saved work on this crossword was removed because it was to many days inactive.</div>' : '' }}
	{{ Session::forget('feedback') }}
	{{ '<div class="row"><br /><br /></div><div class="fb-comments" data-href="http://www.allcrossword.com/crossword/'.$crossword->id.'" data-numposts="5" data-width="100%" data-colorscheme="light"></div>' }}
	@endif
		
	</section>
@stop