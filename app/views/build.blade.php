@extends("layouts.default")

@section("title")
		All Crossword - Create a Crossword{{ $crossword ? " - ".$crossword->id : '' }}
@stop

@section("resources")
	{{ HTML::script('https://www.google.com/recaptcha/api.js') }}
@stop

@section("url") www.allcrossword.com @stop

@section("sidebar")
	<div class="blockquote" data-val="{{ $crossword ? $crossword->id : '' }}">
		<strong>Created By:</strong>&nbsp;&nbsp;<small data-val="{{ $crossword ? $crossword->nick_id : '' }}">{{ $crossword ? htmlspecialchars($crossword->nick->label) : 'N/A'}}</small><br />
		<strong>Language:</strong>&nbsp;&nbsp;<small>{{ $crossword ? htmlspecialchars($crossword->language) : 'N/A'}}</small><br />
		<strong>Complexity:</strong>&nbsp;&nbsp;<small data-val="{{ $crossword ? $crossword->complexity : "0"}}"><span class="text-danger">{{ $crossword ? round($crossword->complexity, 2) : "0"}}</span></small><br />
		<strong>Published On:</strong>&nbsp;&nbsp;<small data-val="{{ $crossword ? $crossword->nick->author_id : '' }}">{{ $crossword && $crossword->published_at != '0000-00-00' ? Helpers::format_date($crossword->published_at) : 'N/A'}}</small>
	</div>
	
	<div class="half-spacer"></div>
	
	<ul class="list-unstyled options">
		<li><a href="#" rel="nofollow" data-action="switcher" class="show"><span class="glyphicon glyphicon-wrench"></span>&nbsp;{{$crossword ? "Edit" : "Build"}} Crossword</a></li>
		<li><a href="#" rel="nofollow" data-action="save" class="show"><span class="glyphicon glyphicon glyphicon-save"></span>&nbsp;Save Crossword</a></li>
		{{ !$crossword || $crossword->published_at == '0000-00-00' ? '<li><a href="#" rel="nofollow" data-action="publish" class="show"><span class="glyphicon glyphicon-cloud-upload"></span>&nbsp;Publish Crossword</a></li>' : '' }}
		{{ $crossword ? '<li><a href="#" rel="nofollow" data-action="reload" class="show"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Reload Crossword</a></li>' : '' }}
		{{ $crossword ? '<li><a href="#" rel="nofollow" data-action="delete" class="show"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete Crossword</a></li>' : '' }}
		{{ $crossword ? '<li><a href="'.url('/crossword').'/'.$crossword->id.'" target="_blank" class="show"><span class="glyphicon glyphicon-new-window"></span>&nbsp;See Crossword</a></li>' : '' }}
		<li><a href="#" rel="nofollow" data-action="clear" class="show"><span class="glyphicon glyphicon-erase"></span>&nbsp;Clear Crossword</a></li>
		<li>
			<a href="#" rel="nofollow" tabindex="0" class="show">
				<span class="glyphicon glyphicon-move"></span>&nbsp;Move Crossword<span class="glyphicon glyphicon-chevron-down arrow pull-right"></span>
			</a>
			<ul class="list-unstyled embeed">
				<li><a href="#" rel="nofollow" data-action="moveleft" class="show embeed">One column left</a></li>
				<li><a href="#" rel="nofollow" data-action="moveright" class="show embeed">One column right</a></li>
				<li><a href="#" rel="nofollow" data-action="moveup" class="show embeed">One row up</a></li>
				<li><a href="#" rel="nofollow" data-action="movedown" class="show embeed">One row down</a></li>
			</ul>
		</li>
	</ul>
	
	<div class="blockquote">
		<label for="notes">Notes</label>
		<textarea name="notes" class="form-control notes" placeholder="Write here everything you think people should know about this crossword like if they have to use just uppercase or lowercase letters or take care or dismiss accents in words and so on">{{ $crossword ? htmlspecialchars($crossword->notes) : '' }}</textarea>
	</div>
	
	<div class="blockquote"></div>
@stop

@section("content")
	<section class="panel content">
	
	@if($removed)
	{{ '<h4>This Crossword has been removed '.($removed->reported > 0 ? 'for not comply with the site guidelines' : 'by the Author').'</h4>' }}
	@else
	{{ '<p>
			Creating a crossword is as easy as typing characters into the cells by selecting them. You can use the keyboard arrows to navigate through every cell and the usual keyboard shortcuts to undo and redo while typing. On the navigation panel, you have also several options to perform actions regarding your work like saving your progress or building your crossword and even more. For more instructions, visit the <a href="' }}{{ url('/help') }}{{ '" class="button">&nbsp;HELP&nbsp;</a> section. <strong>Work hard on your creativity and try to be accurate, avoiding misspelling or non-existent words.</strong>
		</p>
		
		<hr /><div class="full-spacer"></div><div class="half-spacer"></div>
		
		<div class="row">
			
			<div class="col-lg-8 col-lg-push-2">
				
				<div class="blocks canvas" data-mode="'}}{{$crossword ? 'edit' : 'create' }}{{'"></div>
				
			</div>
			
		</div>
		
		<div class="full-spacer"></div><hr />
		
		<h3>Words Definitions</h3>
		
		<div class="words blockquote">
		
			<h4>Horizontal</h4>
			
			<ol class="unstyled-list"></ol>
			
			<h4>Vertical</h4>
			
			<ol class="unstyled-list"></ol>
			
		</div>
		'}} {{ Session::has('feedback') ? '<div id="callback" data-head="info" class="hide"><strong>Your crossword has been successfully saved.</strong><br /><br />A link to access to your crossword and edit it was sent to your inbox. Check your spam folder if for some reason you are not able to find it. If it is not in the spam folder either, just copy the current <strong>URL</strong> from the navigation bar of your browser and keep it to access to your crossword.'.(Session::get('feedback') > 1 ? '<br /><br /><strong>NOTE: Your crossword will be deleted if you don\'t publish it before <span class="text-danger">'.Settings::MAX_DAY_TO_PUBLISH().' days</span> from today</strong>' : '').'</div>' : '' }}
		{{ '<div id="layout" class="hide">' }} {{ $crossword ? htmlspecialchars($crossword->layout) : file_get_contents('public/layout.json') }} {{ '</div>' }}
		<div class="hide"><form></form></div>
		{{ Session::forget('feedback') }}
	@endif
	
	</section>
@stop