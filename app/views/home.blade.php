@extends("layouts.default")

@section("title") Create and solve crossword puzzles online - All Crosswords @stop

@section("resources")
@stop

@section("url") www.allcrossword.com @stop

@section("sidebar")
	<form method="post" action="" role="form" accept-charset="utf-8" class="blockquote">
		
		<label for="language">Language</label>
		<select name="language" data-last="{{ Session::get('search')->language }}" class="form-control show"></select>
		
		<div class="spacer"></div>
		
		<label for="author">Author</label>
		<input name="author" type="text" class="form-control show" value="{{ Session::get('search')->author }}" maxlength="20" />
		
		<div class="clearfix"></div>
		
		<br /><hr /><br />
		
		<input name="minimum" type="text" value="{{ Session::get('search')->minimum }}" maxlength="2" class="form-control pull-left text-center small" />
		<label for="minimum" class="show pull-left inline">&nbsp;&nbsp;Minimum Complexity</label>
		
		<div class="clearfix"></div><div class="half-spacer"></div>
		
		<input name="maximum" type="text" value="{{ Session::get('search')->maximum }}" maxlength="2" class="form-control pull-left text-center small breaker" />
		<label for="maximum" class="show pull-left inline">&nbsp;&nbsp;Maximum Complexity</label>
		
		<div class="clearfix"></div>
		
		<br /><hr /><br />
		
		<input name="results" type="text" value="{{ Session::get('search')->results }}" maxlength="2" class="form-control pull-left text-center small" />
		<label for="results" class="show pull-left inline">&nbsp;&nbsp;Results per page</label>
		
		<div class="clearfix"></div>
		
		<br /><hr /><br />
		
		<div class="wrapper"><div class="holder"><input type="radio" name="sort" value="complexity" {{ Session::get('search')->order == 'complexity' ? 'checked' : '' }} /></div><div class="holder">&nbsp;Sort by Complexity</div></div>
		<div class="wrapper"><div class="holder"><input type="radio" name="sort" value="latest" {{ Session::get('search')->order == 'complexity' ? '' : 'checked' }} /></div><div class="holder">&nbsp;Sort by Latest Added</div></div>
		
		<br /><hr /><br />
		
		<button type="button" class="btn btn-danger pull-right">Apply</button>
		
		<div class="clearfix"></div>
		
	</form>
@stop

@section("content")
	<section id="list" class="panel content">
		
		<div class="loader text-center"><img src="{{ url('/_assets/loader.gif') }}" /></div>
		
		<h4 class="hide">No Results Found</h4>
		
		<div class="view hide">
			
			<div class="criteria">
				<div class="label label-default">LANGUAGE: <span></span></div>
				<div class="label label-default">AUTHOR: <span></span></div>
				<div class="label label-default">COMPLEXITY: <span></span></div>
				<div class="label label-default">RESULTS: <span></span></div>
				<div class="label label-default">SORT: BY <span></span></div>
			</div>

			<hr />

			<div class="row pages">
				
				<div class="col-xs-12 col-sm-12 col-md-6 led">
					
					<div class="half-spacer"></div>
					<strong>TOTAL FOUND&nbsp;&nbsp;<span class="text-danger"></span></strong>
					
					<hr class="visible-xs visible-sm" />
					
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-6 text-center">
					
					<menu id="{{ Session::get('search')->page }}"></menu>
					
				</div>
				
			</div>

			<hr />

			<div class="row">
				
				<div class="output col-xs-12 text-center"></div>
				
			</div>
			
			<div class="half-spacer"></div>
			
		</div>
		
	</section>
@stop