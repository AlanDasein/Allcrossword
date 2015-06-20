@extends("layouts.default")

@section("title") A Place where to take and create Crosswords - Help File @stop

@section("resources")
	{{ HTML::script('js/tab.min.js') }}
@stop

@section("url")
www.allcrossword.com
@stop

@section("sidebar")
	<div class="hidden-xs">
		<br /><br /><br />
		<ul class="nav nav-pills">
			<li class="active"><a href="#pane1" data-toggle="tab">Browsing Crosswords</span></a>
			<li><a href="#pane2" data-toggle="tab">Taking Crosswords</span></a>
			<li><a href="#pane3" data-toggle="tab">Creating Crosswords</span></a>
			<li><a href="#pane4" data-toggle="tab">Coming Next</span></a>
		</ul>
		<br /><br /><br />
	</div>
@stop

@section("content")
	<section class="panel content">
		
		<ul class="row nav nav-pills visible-xs">
			<li class="col-xs-12 active"><a href="#pane1" data-toggle="tab">Browsing Crosswords</span></a>
			<li class="col-xs-12"><a href="#pane2" data-toggle="tab">Taking Crosswords</span></a>
			<li class="col-xs-12"><a href="#pane3" data-toggle="tab">Creating Crosswords</span></a>
			<li class="col-xs-12"><a href="#pane4" data-toggle="tab">Coming Next</span></a>
		</ul>
		
		<div class="spacer visible-xs"></div><hr class="visible-xs" />
		
		<div class="row">
						
			<div id="tabs" class="col-lg-12 tab-content">
				
				<div id="pane1" class="tab-pane active">
					
					<div class="col-lg-12">
						
						<p>
							<strong>This page gives you access to a list of published crosswords it is the website's main page and unless you are accessing it from a link that points to some inner page, it will be the first thing you will see when accessing the website from the very first time.</strong>
						</p>
						
						<hr /><div class="spacer"></div>
						
						<p>The search options supported are by language, author and level of complexity or a combination of them.</p>
						
						<div class="half-spacer"></div>

						<p><strong>By language:</strong></p>
						
						<p>
							Access the selector where the language list is located to make a selection. The languages have been grouped according to their geographic-continental origin. Just type the first two or three characters of the language you are trying to locate once you have clicked the selector, and it will appear right away. If the language you are trying to select is not in the list (make sure it is not really there!) select the second option "Other languages".
						</p>
						
						<p><strong>By author:</strong></p>
						
						<p>
							If you want to get a set of results related to a specific author you know about or have interest in, or if you want to display the crossword(s) that you have published already, simply insert the author's name in the author's field to perform the search. Typing the full name it is not required, because the search will be conducted by showing results that contain the entered text and need not match exactly the entered value, although this may catch similar author’s crosswords.
						</p>
						
						<p><strong>By level of complexity:</strong></p>
						
						<p>
							To activate this option, enter either a minimum, a maximum value or both to bookend the search. If the minimum level is set as "50", e.g., then only the crosswords with a complexity level starting from 50 will be shown. Likewise, if the maximum level is set as "70", e.g., then only the crosswords with a complexity level below 70 will be displayed. Setting both values will establish a range (crosswords with complexity level from "50" to "70" in our previous example).
						</p>
						
						<p>
							If you have already published crossword(s) you know that in order to publish a crossword your crossword needs to achieve a minimum complexity level. Hence, the search through this filter should be set from the required minimum complexity level which today is set to 30 to a maximum, which is 100.
						</p>
						
						<hr /><div class="spacer"></div>
						
						<p>A couple of additional options are also available like the number of results per page to be displayed when performing a search and how the results will be sorted.</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Results per page</strong></p>
						
						<p>This option can be customized to a range between {{Settings::MIN_RES_PER_PAGE()}} and {{Settings::MAX_RES_PER_PAGE()}} results to display per page.</p>
						
						<p><strong>Sorting Results</strong></p>
						
						<p>
							<u>By complexity</u> - The Crosswords will be displayed from the most complex to the least complex
							<br />
							<u>By latest added</u> - The Crosswords will be displayed from the most recent to the oldest
						</p>
						
						<hr /><div class="spacer"></div>
						
						<p>Finally, to open a puzzle and solve it, just click on its preview to run it</p>
						
						<p>
							<strong>NOTE: Any conducted search will be "memorized" by the search engine so that you don't have to enter the search criteria once again when you return to the main page. Your search will be stored by the page. If you have activated the use of cookies on your browser, your last search will appear when you connect again. This way, you will not have to choose it again, e.g., your language will be preselected, every time you come to the site. If you have disabled the use of cookies, we highly recommend you to set an exception for this site in order to enable this feature, especially considering that this website does not receive or store visitor data.</strong>
						</p>
						
					</div>
					
				</div>
				
				<div id="pane2" class="tab-pane">
					
					<div class="col-lg-12">
						
						<p>
							The process of solving a crossword is relatively easy and it just requires clicking on the cells where you want to insert a character. <i>You can also navigate through the cells with the arrow keys of your keyboard</i> as well as undo and redo any action you may have performed entering or removing characters from the cells, by using the usual commands on your keyboard (ctrl+z and ctrl+y on windows, apple+z and apple+y on mac).
						</p>
						
						<p>
							The Across word definitions and the Down word definitions are located in switchable panels. Just click on the tab to show the panel you want to see. <i>The number right next to each definition is the index in which that word will be located in the crossword</i>. Find the number on it and start typing vertically or horizontally according with the direction of the word.
						</p>
						
						<p>
							You may also notice an indication of your progress on solving the crossword located right above it. While you are entering characters in the cells, such indicator will update its value in accordance with how many correct characters have been introduced in the cells compared with the total characters needed to solve the crossword. <i>Do not use this indicator to check if a character that you are entering is valid or not</i>, since the system computes percent complete, it does not have the resolution to give you good feedback about a single character. So you may type a correct character in a cell without noticing any change in the progress indicator until you type the next valid character.
						</p>
						
						<p>Finally, a popup window will show up when you solve the crossword once the progress indicator has reached to 100%.</p>
						
						<hr /><div class="spacer"></div>
						
						<p>There are several other actions that you can perform while working on taking a crossword, like saving your progress such that you can return to it at a later time, or you can reveal the solution and so on.</p>
						
						<p><strong>Save / Update / Discard Progress:</strong></p>
						
						<p>
							This feature allows you to save the progress that you have made while solving a crossword, so you can come back to it at a later date. A popup window will show up asking for an email address where to send a link to your saved progress. You can get access to it by following that link at any time. However, notice that <i>the system will remove the record if it's been inactive for more than {{Settings::MAX_INACTIVE_DAYS()}} days</i> in order to avoid the indiscriminate use of this feature.
						</p>
						
						<p>
							Once you have completed the steps involved in saving a record of your progress, you will be redirected to a location where you can get immediate access to your saved progress. A popup window will notify you that the record was successfully saved. As the message says, <i>confirm that you have received the link by checking your inbox before leaving the page</i>, and if it's not there, just copy the <strong>URL</strong> from the navigation bar of your browser and keep it to access to your saved progress.
						</p>
						
						<p>
							You can repeat this operation as many times as you like once you have resumed a saved progress. Just update your progress to add any changes that you may have made. This action will be equivalent to extending the time that your saved progress will be available so your crossword will be available for another {{Settings::MAX_INACTIVE_DAYS()}} days from the time you last saved progress. This time, you will not be asked for your email address, unless you clear your cookie on your browser. 
						</p>
						
						<p>
							You can also discard your saved progress by completely removing the record once you are done working on the crossword, considering you no longer need to keep it, or you can just leave it there and the system will remove it for you after reaching the maximum inactivity time. You will be asked to confirm that you really want to discard your draft and you will be redirected to the home page once is done.
						</p>
						
						<p>There is no limit to how many crosswords you can work on at one time.</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Clear Progress:</strong></p>
						
						<p>
							Applying this action will erase all the characters that you have entered on the crossword. Use caution because <i>this action can’t be undone</i>. If you take this action while resuming a saved crossword solution, you can always go back to the previous condition by reloading the page, although any progress you made since the last save will be lost.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Reveal Solution:</strong></p>
						
						<p>If you don't think you can complete the crossword you can always run this command to populate each cell with its value.</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Report Error:</strong></p>
						
						<p>
							It is important, if you are enjoying this website, that you help us to identify any error or omission in a crossword. Errors would include misspelled words, wrong definitions or definitions with no content or with offensive content and so on. Nonetheless, try to check before you send a report.
						</p>
						
						<p>
							The steps to send a report are as follows. You just have to fill a form where you will be asked to write in what you find wrong with the crossword. Once you submit your feedback, a message informing that your report was sent will show up and you will be able to continue with your activities.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Embeed Code:</strong></p>
						
						<p>
							If you are interested in including a crossword on your own website, this option will help you on achieving that goal. A popup window will show up and a couple of embedding options will be given to you. If you choose to show the crossword horizontally, with the cells and the definitions located side by side, or vertically, with the definitions located right below the cells, the only thing you need to do is to copy the code and paste it into your page where you want it to show.
						</p>
						
					</div>
					
				</div>
				
				<div id="pane3" class="tab-pane">
					
					<div class="col-lg-12">
						
						<p>
							Creating a crossword shouldn't be harder than simply dealing with the complexity of mixing words successfully in a creative way. While this will appear difficult at first, practice will quickly give you the skills to create your own crosswords.
						</p>
						
						<p>
							A large blank crossword will be presented to be filled as soon as you enter the page. The rules to insert characters on it or to navigate through the cells are the same than the keyboard rules used to solve the crossword. Type any alphabetical character that you want in any script on the cells and use the arrow keys to move between cells as well as the usual commands to undo and redo actions while typing provided by your own OS (ctrl+z and ctrl+y on windows, apple+z and apple+y on mac).
						</p>
						
						<p>Below the cells created will be listed with a space to enter the definitions, they will not be populated until you build your crossword.</p>
						
						<hr /><div class="spacer"></div>
						
						<p><strong>Switching Between Edit Mode and Build Mode</strong></p>
						
						<p>
							Edit mode and Build Mode cannot take place simultaneously. That's why there are two different "views" to switch between, depending on the action you want to perform. The <strong>Edit View</strong> will allow you to insert and/or modify characters  in cells but will prevent you from editing the word definitions. Once you have built the crossword the <strong>Build Mode</strong> will be disabled, you will no longer be able to type in the cells. Instead you can edit the word definitions or review word indexes on the crossword. Familiarize yourself with both views and learn how to manage actions in each mode.
						</p>
						
						<p>To switch between views click on <i>Edit Crossword</i> or <i>Build Crossword</i>. The button label will change to indicate the current mode.</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Saving and Publishing the crossword</strong></p>
						
						<p>
							These actions are enabled only in "Build Mode".  You will be informed about switching to the "Build View" if you attempt to run these commands while in edition mode.
						</p>
						
						<p>
							Saving a crossword requires several steps, especially the first time, and it will not be possible to execute if <i>the minimum level of complexity required for saving a crossword</i> ({{Settings::MIN_LEV_COM_SAVE()}}) has not been reached after building it, or if <i>the minimum level of complexity required for publishing a crossword</i> ({{Settings::MIN_LEV_COM_PUB()}})  has not been reached after building it, while editing a crossword already published (see below).
						</p>
						
						<p>
							A popup window will request an email address identify you in the future, it will also be used to send you a link to your crossword so you can access it at any time and be able to manage or edit the crossword. The email address provided will also work as your identification every time you create a new crossword. If you are providing an email address that you have used previously, once you have completed this step and you will be asked for the crossword language and its author on the next step. If you want to use a nickname that you have already used just pick it from the list or type a new one. The nicks list won't show if you haven't saved or published a crossword with the current email address. Make sure you <i>follow the rules to select a nickname</i> (you will be notified <i>if the selected nickname is already in use</i> by another user).
						</p>
						
						<p>
							You will be redirected then to a location from where you can get immediate access to your crossword in order to manage or edit it. A popup window will notify you that the crossword was successfully saved. As the message indicates, <i>make sure that you have received the link by checking your inbox before leaving the page</i>, if it's not there, just copy the <strong>URL</strong> or bookmark the page. Next time you save your crossword you will not be asked for your email address and, you will not be redirected to another page,  but you still will have the possibility of changing the language and/or the author.
						</p>
						
						<p>
							Finally, publishing a crossword will perform all the actions described before and will make your crossword accessible to the public. This action cannot be undone. Once a crossword is published, it will stay as published. Hence, you will run this action just once.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Clear Crossword:</strong></p>
							
						<p>
							Applying this action will erase all the characters that have been entered on the crossword. Caution because <i>this action is not reversible</i>. If you take this action while editing, you can always go back to the previous state by reloading the page, although any change that you have introduced since then will be lost.
						</p>
						
						<p>Of course, this action can only be performed from the <strong>Edit Mode</strong></p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Move Crossword:</strong></p>
						
						<p>
							While you are editing your crossword in <strong>Edit Mode</strong>, you will have the option of rearranging to the crossword by moving it to the left, right, top or bottom, as long as there is room so the cells can be moved in the selected direction. These actions do not get registered by the undo and redo directives and cannot be undone via those commands but it's easy to return to a desired previous condition by moving the crossword back.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Reload Crossword:</strong></p>
						
						<p>
							This action can be performed regardless of which "view" you are currently working from, and it is equivalent to reloading the page. Therefore, it will be available after have saved and/or published your crossword. Any change that you have made in the meantime will be lost.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Delete Crossword:</strong></p>
						
						<p>
							This command will remove the crossword completely from the system. You may want to take this step is you have published a crossword that you later discover is wrong in a way that is easier to create a new, rather than fix the old one (remember, you can't "unpublish" a crossword).
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>See Crossword:</strong></p>
						
						<p>
							If your crossword is already published, you can see it live by following this link to check how it looks. (It will open the crossword in a new window)
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Attaching Notes to your Crossword</strong></p>
						
						<p>
							You can also provide information about your crossword to the public, for example if your crossword uses or ignores accents on accented words as is common in some languages. You may want to let the user know if you have chosen to use all caps, although is not necessary because the application will match the characters irrespective of case. However, this approach could fail or lead to unexpected results on scripts different than Latin.
						</p>
						
						<p>
							You can actually attach a note for any reason you may find helpful to the user. To do it, just access the text field located at the bottom of the navigation bar and fill in the information that you consider relevant.
						</p>
						
						<div class="half-spacer"></div>
						
						<p><strong>Words and Definitions</strong></p>
						
						<p>
							Every time you build your crossword you will be able to check the words that are part of your  crossword and you can edit their definitions. The text fields for the words are not editable because they are taken from the cells that you filled on the crossword. On the other hand, the text fields for the definitions will be editable outside of the "Edit Mode".
						</p>
						
						<p>
							Make sure you are providing a definition for each word. If you publish a crossword with missing definitions your crossword could be removed after being reported as faulty. Also notice the definitions don't disappear when the crossword is built, even if the word that the definition belongs to is removed, as long as it gets introduced again.
						</p>
						
						<p>
							Finally, notice that there is a limit regarding the length of the definition. There is no need of overwhelm the solvers with a long definition. Try to expose the meaning of the word in a brief and concise way. You could even try approaches like using a blank space where the word will be located in a given sentence, e.g., <i>Dogs _______ cats</i>
						</p>
						
					</div>
					
				</div>
				
				<div id="pane4" class="tab-pane">
					
					<div class="col-lg-12">
						
						<p>
							This application is still under development and subjected to future enhancements depending on the degree of acceptance it gets from the public. We are aware of its limitations and how much is likely to be improved to meet the expectations of those who find a useful way of using it.
						</p>
						
						<p>
							Our effort in this first delivery has been focused only in providing at least the minimal essential options for you to find acceptable your experience with us, without losing perspective of our true purpose which is to make you to find it excellent.
						</p>
						
						<p>As a quick overview, not as an attempt of covering all the possible additions, some further improvements could include:</p>
						
						<ul>
							<li><strong>Multi language Support.</strong></li>
							<li class="list-unstyled">
								It's not enough that the crosswords can be created in any language or script. We want you to be able of reading these lines in your first language.
							</li>
							
							<li><strong>Printing Option.</strong></li>
							<li class="list-unstyled">
								We really regret not having a full view of the "across" and "down" word definitions for a "printing mode" at this moment, so that the crossword can be completely printed.
							</li>
							
							<li><strong>User registration.</strong></li>
							<li class="list-unstyled">
								To give to the users more flexibility to manage their crosswords. The ramifications of having a user registration system are a lot and somehow even unpredictable: a voting system for the crosswords, chances of following another users, score and levels for users and crosswords, forums, chat rooms, social media integration, commenting system and so on...
							</li>
							
							<li><strong>The integration of technologies to</strong></li>
							<li class="list-unstyled">
								insert words automatically, add or remove rows and columns, find words that match localized characters in specific cells in several languages, calculate the level of complexity according with the oddity of the word or de harmony of the crossword design pattern, etc.
							</li>
							
							<li><strong>The integration of characteristics like</strong></li>
							<li class="list-unstyled">
								the possibility of inserting blank spaces as marks so you can design the crossword pattern comfortably, the opportunity of giving a title to the crosswords, compiling them under a theme or category and classifying them with tags plus anything imaginable.
							</li>
							
							<li><strong>A version of the application completely oriented to mobile.</strong></li>
							<li class="list-unstyled">
								While right now the site can be responsively displayed in any device, as you may notice by resizing your browser's window, the truth is that the characters in the crosswords and the indexes overlap each other when the site is visualized at a very low resolution like on a regular phone in a portrait mode.
							</li>
							
						</ul>
						
						<div class="spacer"></div>
						
						<p>
							Some of the items in this approximative list suppose real challenges and even incompatibility between each other, but that will not discourage us from trying them with your support and comprehension!
						</p>
						
						<p>
							Finally, we don't want to close this section without acknowledging the time you are taking to stay with us. You can learn more about what we are trying to do here by visiting the <a href="{{ url('/about') }}" class="button">&nbsp;ABOUT US&nbsp;</a> page. For further inquiries do not hesitate to <a href="{{ url('/contact') }}" class="button">&nbsp;CONTACT US&nbsp;</a> and let us know any distress or doubt that you might have. We will gladly assist you with any inconvenience. You may also visit our fan page on Facebook <a href="https://www.facebook.com/allcrossword" target="_blank">www.facebook.com/allcrossword</a> and posting a feedback. Don't worry <i>we like to interact with our visitors.</i> We would love to hear from you.
						</p>
						
						<p><strong>Regarding the way this website works</strong></p>
						
						<p>
							We have made our best effort on trying to keep things as simple as possible without sacrificing quality experience in the use of this application. As we pointed above, we are not completely satisfied with the result and we are really looking forward to do a better job in future. That being said, we are happy, however, that despite all the shortcomings related with the beta version of this application, you can dispose of this service absolutely free of charge and without providing any sensitive personal information and hence in a completely anonymous way.
						</p>
						
						<p>
							Those are the few points that summarize everything that you are able to find on this site. Enjoy your time here!
						</p>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</section>
@stop