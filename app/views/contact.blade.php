@extends("layouts.default")

@section("title") A Place where to create and solve Crosswords - Contact @stop

@section("resources")
	{{ HTML::script('https://www.google.com/recaptcha/api.js') }}
@stop

@section("url")
www.allcrossword.com
@stop

@section("sidebar")
	<div class="hidden-xs"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
@stop

@section("content")
	<section id="contact" class="panel content">
		<h1>Contact Form</h1>
		<p>
			We are very happy that you want to get in touch with us. Please, do not hesitate to reach us with any inquire that you may have. However, notice that a guide of how to use this website is available to you on the &nbsp;<a href="{{ url('/help') }}" class="button">&nbsp;HELP&nbsp;</a>&nbsp; section. There you can find any information that you want regarding the use of the app very easily. If you still need to be assisted, then fill the form bellow, provide as much information as you can and try to be as clear as possible so we can gladly help you with your request.
		</p>
		<form method="post" action="" role="form" accept-charset="utf-8">
		
			<hr /><br /><small><i>All fields are mandatory</i></small><br /><br />
			
			<div class="form-group">
				<label class="control-label" for="name">Name</label>
				<input type="text" name="name" class="form-control">
				<span class="glyphicon glyphicon-remove form-control-feedback hide"></span>
				<span class="help-block">Please enter a name at least 3 characters long</span>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="email">Email Address</label>
				<input type="email" name="email" class="form-control">
				<span class="glyphicon glyphicon-remove form-control-feedback hide"></span>
				<span class="help-block">Please enter a valid Email Address so we can send you a reply</span>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="subject">Subject</label>
				<input type="text" name="subject" class="form-control">
				<span class="glyphicon glyphicon-remove form-control-feedback hide"></span>
				<span class="help-block">Please enter a subject at least 15 characters long</span>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="message">Message</label>
				<textarea name="message" class="form-control"></textarea>
				<span class="glyphicon glyphicon-remove form-control-feedback hide"></span>
				<span class="help-block">Please enter a message at least 150 characters long</span>
			</div>
			
			<span class="help-block hide">Please provide us you are not a robot</span>
			<span class="help-block hide">Your message has ben successfully sent.</span>
			
			<div class="g-recaptcha" data-sitekey="6LdmeAITAAAAAEo_rElBlgJFyw_fKAkcRkIMVw3V"></div>
			
			<br /><hr />
			
			<button type="button" class="btn btn-danger pull-right">Send</button>
			
			<button type="reset" class="btn btn-default pull-right">Clear</button>
			
			<div class="clearfix"></div>
			
		</form>
	</section>
@stop