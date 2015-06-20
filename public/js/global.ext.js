//==========================================================================
// GLOBAL VARIABLES
//==========================================================================

+function(){
	
	// default number of columns and rows //
	  
	this.COLS = 17;
	this.ROWS = 17;

	// max number of characters allowed on word definitions //

	this.MAX_CHARS = 255;

	// max level of complexity a crossword could reach //

	this.MAX_LEVEL = ((COLS * ROWS) / (COLS + ROWS)) + (COLS * ROWS);

	// min level of complexity a crossword needs for being saved [double for being published] //

	this.MIN_COMPLEXITY = 15;

	// list of non alphabetical characters not allowed to be inserted in a cell //

	this.LOCK_CHARS = /[^\u0041-\u005A\u0061-\u007A\u00AA\u00B5\u00BA\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u0527\u0531-\u0556\u0559\u0561-\u0587\u05D0-\u05EA\u05F0-\u05F2\u0620-\u064A\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE\u06EF\u06FA-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07CA-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u08A0\u08A2-\u08AC\u0904-\u0939\u093D\u0950\u0958-\u0961\u0971-\u0977\u0979-\u097F\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09F0\u09F1\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B71\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C33\u0C35-\u0C39\u0C3D\u0C58\u0C59\u0C60\u0C61\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDE\u0CE0\u0CE1\u0CF1\u0CF2\u0D05-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D60\u0D61\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E81\u0E82\u0E84\u0E87\u0E88\u0E8A\u0E8D\u0E94-\u0E97\u0E99-\u0E9F\u0EA1-\u0EA3\u0EA5\u0EA7\u0EAA\u0EAB\u0EAD-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0EDC-\u0EDF\u0F00\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1380-\u138F\u13A0-\u13F4\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u1700-\u170C\u170E-\u1711\u1720-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u1820-\u1877\u1880-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191C\u1950-\u196D\u1970-\u1974\u1980-\u19AB\u19C1-\u19C7\u1A00-\u1A16\u1A20-\u1A54\u1AA7\u1B05-\u1B33\u1B45-\u1B4B\u1B83-\u1BA0\u1BAE\u1BAF\u1BBA-\u1BE5\u1C00-\u1C23\u1C4D-\u1C4F\u1C5A-\u1C7D\u1CE9-\u1CEC\u1CEE-\u1CF1\u1CF5\u1CF6\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2071\u207F\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2183\u2184\u2C00-\u2C2E\u2C30-\u2C5E\u2C60-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005\u3006\u3031-\u3035\u303B\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312D\u3131-\u318E\u31A0-\u31BA\u31F0-\u31FF\u3400-\u4DB5\u4E00-\u9FCC\uA000-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA61F\uA62A\uA62B\uA640-\uA66E\uA67F-\uA697\uA6A0-\uA6E5\uA717-\uA71F\uA722-\uA788\uA78B-\uA78E\uA790-\uA793\uA7A0-\uA7AA\uA7F8-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA840-\uA873\uA882-\uA8B3\uA8F2-\uA8F7\uA8FB\uA90A-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA60-\uAA76\uAA7A\uAA80-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uABC0-\uABE2\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC]/g;
	
	// website name //
	
	this.TITLE = "AllCrossword";
	
	// absolute path to web root //
	
	this.HOST = $.trim(document.body.getAttribute("data-host"));
	
	// url to point on sharing events //
	
	this.URL = $.trim(document.body.getAttribute("data-url"));
	
}();

//==========================================================================
// GLOBAL FUNCTIONS
//==========================================================================

+function(){
	
	//--------------------------------------------------------------------------
	// PROTOTYPES
	//--------------------------------------------------------------------------
	
	Array.prototype.clean = function() {while(this.length > 0) {this.pop();}} // additional funcionality to clean an array
	String.prototype.capitalize = function() {return this.charAt(0).toUpperCase() + this.slice(1);} // additional funcionality to capitalize first letter of string
	
	//--------------------------------------------------------------------------
	// GENERAL ELEMENTS
	//--------------------------------------------------------------------------
	
	// add to any button //
	
	this.a2a_config = window.a2a_config || {};
	a2a_config.linkname = TITLE;a2a_config.linkurl = URL;a2a_config.onclick = 1;
	
	// events on finishing loading the page //
	
	$(window).on("load", function() {
		
		// populate the language selector //
		
		getLang("any");
		
		// draw cells matching their height with their width and draw the definitions container to match its height with the resulting cells canvas height //
		
		resizeCells();
		
		// check if there is a callback to show a popup message //
		
		var callback = $("#callback");
		
		if(callback.length) showModal(callback.attr("data-head"), callback.html(), ["dismiss"]);
		
		// initialize app when a crossword is being displayed //
		
		var layout = $("#layout");
		
		if(layout.length) init($.parseJSON(layout.text()));
		
		// load external files on modal //
		
		var external = $("li.external");
		
		external.on("click", function() {
			showModal("info", "<div class='load-external text-center'><img src='" + HOST + "/_assets/loader.gif' /></div>", ["dismiss"]);
			var bd = $("div.modal-body");console.log(HOST + "/" + ($(this).find("a").text().toLowerCase().replace(/\s/g, "_") + ".html"));
			bd.load(HOST + "/" + ($(this).find("a").text().toLowerCase().replace(/\s/g, "_")) + ".html", function() {var ld = $("div.load-external");ld.hide();});
		});
		
	});
	
	// events on every time the window is resize //
	
	$(window).on("resize", function() {resizeCells();});
	
	//--------------------------------------------------------------------------
	// LOCAL ELEMENTS
	//--------------------------------------------------------------------------
	
	// custom social media share buttons //
	
	$("a[role='share']").on("click", function() {
		
		// url's where to share //
		
		var dir = [
			"http://www.reddit.com/submit?url=http://" + URL + "&title=" + TITLE, 
			"https://twitter.com/intent/tweet?status=" + TITLE + "%20http://" + URL + "&related=micropat", 
			"https://www.facebook.com/sharer/sharer.php?u=http://" + URL + "&t=" + TITLE + "&v=3", 
			"https://plus.google.com/share?url=http://" + URL,
			"https://www.diigo.com/post?url=http://" + URL + "&title=" + TITLE + "&desc=", 
			"http://www.stumbleupon.com/submit?url=http://" + URL + "&title=" + TITLE, 
			"https://www.tumblr.com/share/link?url=http://" + URL + "&name=" + TITLE + "&description="
		];
		
		// variables //
		
		var win = $(window);
		var w = Number($(this).attr("parm-w")); // popup window width
		var h = Number($(this).attr("parm-h")); // popup window height
		var l = Math.round((win.width() - w) / 2); // popup window left position
		var t = Math.round((win.height() - h) / 2); // popup window top position
		
		// open new window or tab to share the page //
		
		var p = (
			(l < 0 || t < 0) ? window.open(dir[$(this).attr("ind")], "_blank") : // new tab when popup window is too big to fit the viewport
			window.open(dir[$(this).attr("ind")], "_blank", "width= " + w + ", height= " + h + ", left=" + l + ", top=" + t) // popup window otherwise
		);
		
	});
	
	// prevent default actions in void links //
	
	$(document).on("click", "a[href='#']", function(e) {e.preventDefault();});
	
	// navigation panel toggler //
	
	$("div.toggler").on("click", function() {
		var bar = $("div.bar");
		bar.toggleClass("hidden-xs");
	});
	
}();

//==========================================================================
// GENERIC FUNCTIONS
//==========================================================================

+function(){
	
	// general ajax call //
	
	this.callAjax = function(path, serie, loading) {
		return $.ajax({
			beforeSend: function() {if(loading === undefined) showModal("processing", "", []);}, 
			type: "POST", 
			url: HOST + path, 
			data: serie
		});
	}
	
	// populate the language selector with the language list //
	
	this.getLang = function(head) {
		var lang = $("select[name=language]");
		if(lang.length) lang.load(HOST + "/languages.xml", function() {
			lang.prepend("<option value=" + head + ">" + head + "</option>");
			if(!window.data) data = {"lang": lang.attr("data-last")};
			findActiveItem();
			var list = $("#list");
			if(list.length) search();
		});
		return lang;
	}
	
	// open a modal window to show and require information //
	
	this.showModal = function(header, body, footer, callback) {
		
		// header types //
		
		var headers = {
			"processing": "<span class='glyphicon glyphicon-time text-primary'></span>&nbsp;&nbsp;<strong>PROCESSING...</strong>",
			"warning": "<span class='glyphicon glyphicon-warning-sign text-danger'></span>&nbsp;&nbsp;<strong>WARNING</strong>",
			"info": "<span class='glyphicon glyphicon-info-sign text-info'></span>&nbsp;&nbsp;<strong>NOTIFICATION</strong>",
			"data": "<span class='glyphicon glyphicon-tasks text-warning'></span>&nbsp;&nbsp;<strong>DATA COLLECTION</strong>",
			"captcha": "<span class='glyphicon glyphicon-ok-sign text-info'></span>&nbsp;&nbsp;<strong>VALIDATION</strong>",
			"services": "<span class='glyphicon glyphicon-briefcase text-success'></span>&nbsp;&nbsp;<strong>SERVICES</strong>",
			"report": "<span class='glyphicon glyphicon-comment text-warning'></span>&nbsp;&nbsp;<strong>FEEDBACK</strong>"
		};
		
		// footer buttons //
		
		var buttons = {
			"dismiss": "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>",
			"continue": "<button type='button' class='btn btn-danger' id='modal-button-continue'>Continue</button>"
		}
		
		var bar = "<div class='progress progress-striped active'><div class='progress-bar'></div></div>"; // progress bar
		var myModal = $('#myModal'); // modal window element
		var sections = myModal.find("div.modal-content div.main"); // modal window element sections
		
		// reset content of modal window element //
		
		sections.find("button").off("click");
		sections.each(function() {$(this).html("");});
		
		// append content to sections //
		
		$("<h4 />", {"class": "modal-title", "html": headers[header]}).appendTo(sections.eq(0));
		
		if(header === "captcha") { // append captcha
			var captcha = $("<form />");
			captcha.appendTo(sections.eq(1));
			$("<div />", {"id": "captcha"}).appendTo(captcha);
			grecaptcha.render("captcha", {"sitekey" : "6LdmeAITAAAAAEo_rElBlgJFyw_fKAkcRkIMVw3V", "theme" : "light"});
		}
		else $(header === "processing" ? bar : "<p>" + body + "</p>").appendTo(sections.eq(1)); // append normal content
		
		footer.forEach(function(i) {$(buttons[i]).appendTo(sections.eq(2));});
		
		// trigger event to buttons //
		
		if(typeof callback === "function") callback();
		
		// show modal window //
		
		myModal.modal("show");
		
	}
	
}();

//==========================================================================
// PARTICULAR FUNCTIONS
//==========================================================================

+function(){
	
	//--------------------------------------------------------------------------
	// SEARCH ACTIONS
	//--------------------------------------------------------------------------
	
	this.search = function() {
		
		// action for pagination links //
		
		$(document).on("click", "menu a", function() {
			if(!$(this).parent().hasClass("active") && !$(this).parent().hasClass("disabled")) make(isNaN($(this).text()) ? $(this).attr("id") : $(this).text());
		});
		
		// perform the search //
		
		var make = function(page) {
			
			// get the entered search parameters //
			
			var form = $("form");
			
			var parameters = {
				"language": form.find("option:selected").val(),
				"author": form.find("input[name='author']").val().replace(LOCK_CHARS, ""),
				"minimum": form.find("input[name='minimum']").val(),
				"maximum": form.find("input[name='maximum']").val(),
				"results": form.find("input[name='results']").val(),
				"order": form.find("input:checked").val(),
				"page": page
			};
			
			// prepare page to receive data //
			
			var list = $("#list");
			
			list.find("div.loader").removeClass("hide");
			list.find("h4").addClass("hide");
			list.find("div.view").css("display", "none");
			
			// send data to controller //
			
			callAjax("/search", $.param(parameters), 1).done(function(res) {res = $.parseJSON(res);show(res);}).fail(function() {handleError();});
			
		}
		
		// display results //
		
		var show = function(res) {
			
			var form = $("form"), list = $("#list"), section, item, block, aux;
			
			// reset form with right values //
			
			form.find("input[name='author']").val(res.criteria.author);
			form.find("input[name='minimum']").val(res.criteria.minimum);
			form.find("input[name='maximum']").val(res.criteria.maximum);
			form.find("input[name='results']").val(res.criteria.results);
			
			if(res.total === 0) list.find("h4").removeClass("hide"); //no results found
			else {
				
				// set search criteria items and result set //
				
				var criterias = [
					res.criteria.language.toUpperCase(), 
					(res.criteria.author === "" ? "ANY" : res.criteria.author.toUpperCase()), 
					(res.criteria.minimum === "30" && res.criteria.maximum === "100" ? "ANY" : "FROM " + res.criteria.minimum + " TO " + res.criteria.maximum), 
					res.criteria.results + " PER PAGE", 
					res.criteria.order.toUpperCase()
				];
				
				var section = list.find("div.criteria span");
				section.each(function(i) {$(this).text(criterias[i]);});
				
				var section = list.find("div.pages span");
				section.text(res.total);
				
				// set pagination //
				
				section = list.find("menu");
				section.html("");
				
				if(res.pages > 1) {
					
					var from = res.criteria.page > 2 ? res.criteria.page - 2 : 1;
					var to = from + 5;
					
					if(to > res.pages) {
						to = res.pages + 1;
						from = to - 5 > 0 ? to - 5 : from;
					}
					
					item = $("<ul />", {"class": "pagination"}).appendTo(section);
					
					aux = $("<li />", {"class": (res.criteria.page == 1 ? "disabled" : "")});
					aux.appendTo(item);
					aux.html("<a href='#' id='1' title='" + (res.criteria.page == 1 ? "" : "First") + "'><span aria-hidden='true'>&laquo;</span></a>");
					
					for(var i = from;i < to;i++) {
						aux = $("<li />", {"class": (res.criteria.page == i ? "active" : "")});
						aux.appendTo(item);
						aux.html("<a href='#'>" + i + "</a>");
					}
					
					aux = $("<li />", {"class": (res.criteria.page == res.pages ? "disabled" : "")});
					aux.appendTo(item);
					aux.html("<a href='#' id='" + res.pages + "' title='" + (res.criteria.page == res.pages ? "" : "Last") + "'><span aria-hidden='true'>&raquo;</span></a>");
					
				}
				
				// show items list //
				
				section = list.find("div.output");
				section.html("");
				$.each(res.records, function() {
					item = $("<div />", {"class": "item"}); // main wrapper
					item.appendTo(section);
					aux = $("<label />", {"class": "show author"}); // author label
					aux.appendTo(item);
					$("<strong />", {"text": this.label}).appendTo(aux);
					$("<label />", {"class": "show date pull-left", "text": (res.criteria.language === "any" ? this.language : this.published_at)}).appendTo(item); // date or lang label
					aux = $("<label />", {"class": "show level pull-right text-danger"}); // level label
					aux.appendTo(item);
					$("<strong />", {"text": parseFloat(this.complexity.toFixed(2))}).appendTo(aux);
					$("<div />", {"class": "clearfix"}).appendTo(item); // spacer
					aux = $("<a />", {"class": "blocks show", "href": (HOST + "/crossword/" + this.id)}); // crossword preview
					aux.appendTo(item);
					aux.html(this.scheme.replace(/0/g, '<span class="show pull-left empty"></span>').replace(/1/g, '<span class="show pull-left box"></span>')); // minicells
					$("<div />", {"class": "clearfix"}).appendTo(aux); // spacer
				});
				
				list.find("div.view").fadeIn("slow"); // display everything
				
			}
			
			list.find("div.loader").addClass("hide");
			
		}
		
		// assign actions //
		
		var apply = $("button");
		
		apply.on("click", function() {var img = $("div.loader");if(img.hasClass("hide")) make(1);});
		
		(function(){var aux = $("menu");make(aux.attr("id"));})();
		
	}
	
	//--------------------------------------------------------------------------
	// CROSSWORD MAIN ACTIONS
	//--------------------------------------------------------------------------
	
	// initialize the application //
	
	this.init = function(layout) {
		
		var cell, dir, aux, canvas = $("div.canvas");
		
		// layout //
		
		window.layout = layout;
		
		// collect crossword data //
		
		aux = $("nav div.blockquote small");
		
		window.data = {
			"id": aux.eq(0).parent().attr("data-val"), // crossword id
			"author": aux.eq(3).attr("data-val"), //author id (or email if in create mode, after prompt)
			"nick": {"id": aux.eq(0).attr("data-val"), "label": aux.eq(0).text()}, // id and label of author's nick
			"lang": aux.eq(1).text(), // language
			"complexity": aux.eq(2).attr("data-val"), // complexity level
			"published": aux.eq(3).text() // publication date
		};
		
		// define app mode //
		
		data.mode = canvas.attr("data-mode"); //create new crossword, edit crossword, start to take crossword, continue saved crossword
		data.view = data.mode === "create" ? "build" : data.mode; // canvas mode: when edit perform build and when build switch to edit mode
		
		// draw canvas //
		
		$.each(layout.cells, function(i) {
			cell = $("<span/>", {"class": "show pull-left"});
			cell.appendTo(canvas); // insert the cell in the canvas
			$("<input/>", {
				"type": "text",
				"class": "show pull-left text-center" + (this.val === "" ? data.mode === "create" ? " waiting" : " empty" : ""),
				"maxlength": "1",
				"id": i,
				"row": this.row,
				"col": this.col,
				"data-val": (data.mode == "edit" ? this.val : "")
			}).appendTo(cell); // insert the input in the cell
			$("<small/>", {"class": "indexing", "text": this.lab}).appendTo(cell); // insert the index in the cell
		});
		
		// clear canvas from floating cells //
		
		$("<div />", {"class" : "clearfix"}).appendTo(canvas);
		
		// check for a saved progress //
		
		aux = $("#progress");
		if(aux.length) aux = aux.text().split(",");
		
		// work on cells //
		
		var cells = canvas.find("input");
		
		cells.each(function (i) {
			
			// disable empty inputs //
			
			if($(this).hasClass("empty")) $(this).attr("disabled", true);
			
			// show cell when editing a crossword or continuing a saved progress //
			
			if(layout.cells[i].val !== "" && (data.mode === "edit" || data.mode === "continue")) {$(this).val(data.mode === "edit" ? $(this).attr("data-val") : $.trim(aux[i]));}
			
			// start on readonly when editing a crossword //
			
			if(data.mode === "edit") {$(this).attr("readonly", true);}
			
		});
		
		// display words and definitions //
		
		drawLists();
		
		// setup commands (build crossword, move columns, discard progress, embed code, etc)
		
		aux = $("ul.options a");
		
		window.commands = [];
		
		aux.each(function() {
			dir = $(this).attr("data-action"); // action type
			if(dir !== undefined) {
				if(dir === "save" && (data.mode === "start" || data.mode === "continue")) dir = "wip"; // save progress action
				commands[dir] = $(this); // store the command
			}
		});
		
		// initialize assignation of funcionality to the elements on the page
		
		assignations();
		
	}
	
	// assign functions to elements on page //
	
	this.assignations = function() {
		
		// trigger events to cells //
		
		cellEvents();
		
		// trigger events to word definitions textarea elements //
		
		textareaEvents();
		
		// check progress while taking the crossword and from the same beginning in case a saved progress is being resumed //
		
		if(data.mode === "start" || data.mode === "continue") {$(document.body).on("keyup paste", function() {if(!window.done) checkProgress(true);});checkProgress();}
		
		// trigger events to commands
		
		if(window.commands["switcher"]) {
			window.commands["switcher"].on("click", function() {switchMode();});
		}
		
		if(window.commands["save"]) {
			window.commands["save"].on("click", function() {saveChanges();});
		}
		
		if(window.commands["publish"]) {
			window.commands["publish"].on("click", function() {publishWork();});
		}
		
		if(window.commands["reload"]) {
			window.commands["reload"].on("click", function() {reloadCrossword();});
		}
		
		if(window.commands["delete"]) {
			window.commands["delete"].on("click", function() {deleteCrossword();});
		}
		
		if(window.commands["clear"]) {
			window.commands["clear"].on("click", function() {clearCrossword();});
		}
		
		if(window.commands["moveleft"]) {
			window.commands["moveleft"].on("click", function() {moveCrossword("left");});
		}
		
		if(window.commands["moveright"]) {
			window.commands["moveright"].on("click", function() {moveCrossword("right");});
		}
		
		if(window.commands["moveup"]) {
			window.commands["moveup"].on("click", function() {moveCrossword("top");});
		}
		
		if(window.commands["movedown"]) {
			window.commands["movedown"].on("click", function() {moveCrossword("bottom");});
		}
		
		if(window.commands["wip"]) {
			window.commands["wip"].on("click", function() {saveProgress();});
		}
		
		if(window.commands["discard"]) {
			window.commands["discard"].on("click", function() {discardProgress();});
		}
		
		if(window.commands["reveal"]) {
			window.commands["reveal"].on("click", function() {revealSolution();});
		}
		
		if(window.commands["report"]) {
			window.commands["report"].on("click", function() {reportError();});
		}
		
		if(window.commands["embed"]) {
			window.commands["embed"].on("click", function() {showModal("services", largeModals("embed"), ["dismiss"]);});
		}
		
	}
	
	//--------------------------------------------------------------------------
	// CROSSWORD GLOBAL ACTIONS
	//--------------------------------------------------------------------------
	
	// draw cells matching their height with their width and draw the definitions container to match its height with the resulting cells canvas height //
	
	this.resizeCells = function() {
		var canvas = $("div.canvas");
		if(canvas.length) {
			var tabs = $("div#tabs");
			var width = canvas.width();
			canvas.css("height", width);
			tabs.css("height", width);
		}
	}
	
	//--------------------------------------------------------------------------
	// CROSSWORD PARTICULAR ACTIONS
	//--------------------------------------------------------------------------
	
	// -----INPUTS ACTIONS----- //
	
	// trigger event to cells //
	
	this.cellEvents = function() {
		var inputs = $("div.canvas input");
		inputs.off("focus blur keydown");
		inputs.on("focus", function() {selectCell($(this));}).on("blur", function() {leaveCell($(this));}).on("keydown", function(e) {navigateCells(e, $(this));});
	}
	
	// focus cell //
	
	this.selectCell = function(obj) {obj.removeClass("waiting").select();}
	
	// blur cell //
	
	this.leaveCell = function(obj) {
		obj.val(inspectCellValue(obj.val()));
		if(obj.val() === "" && (data.mode === "create" || data.mode === "edit")) obj.addClass("waiting"); // turn cell off if empty on create and edit mode
	}
	
	// navigate trough cells with arrow keys //
	
	this.navigateCells = function(e, obj) {
		var key = e.charCode || e.keyCode || 0, ind =  Number(obj.attr("id")), inputs = $("div.canvas input");
		if(key >= 37 && key <= 40) {
			e.preventDefault();
			for(var i = ind, j = (key < 39 ? -1 : inputs.length);i !== j;(i > j ? i -= (key === 37 || key === 39 ? 1 : COLS) : i += (key === 37 || key === 39 ? 1 : COLS))) {
				if(i < 0 || i >= inputs.length) break;
				if(i !== ind && !inputs.eq(i).is(":disabled")) {
					$(this).blur();
					inputs.eq(i).focus();
					break;
				}
			}
		}
	}
	
	// check for a single and alphabetical character in the cell //
	
	this.inspectCellValue = function(val){return val.charAt(0).replace(LOCK_CHARS, "");}
	
	// capture cells content //
	
	this.getCellValues = function() {
		var inputs = $("div.canvas input");
		inputs.each(function(i) {layout.cells[i].lab = "";layout.cells[i].val = inspectCellValue($(this).val());});
	}
	
	// swap the values of two cells //
	
	this.swapCells = function(a, b) {
		var inputs = $("div.canvas input");
		var aux	= inputs.eq(a).val();
		inputs.eq(a).val(inputs.eq(b).val()).toggleClass("waiting", inputs.eq(a).val() === "");
		inputs.eq(b).val(aux).toggleClass("waiting", inputs.eq(b).val() === "");
	}
	
	// trigger event to textarea //
	
	this.textareaEvents = function() {
		var definitions = $("textarea");
		definitions.on("blur", function() {
			if($(this).val().length > MAX_CHARS) $(this).val($(this).val().substring(0, MAX_CHARS + 1));
		}).on("keydown", function(e) {
			var key = e.charCode || e.keyCode || 0;
			return $(this).val().length <= MAX_CHARS || (key > 7 && key < 10) || (key >= 37 && key <= 40);
		});
	}
	
	// -----VARIOUS ACTIONS----- //
	
	// display words and definitions //
	
	this.drawLists = function() {
		
		var lists = $("ol"), elm, aux; // lists is the word containers
		
		// empty the containers //
		
		lists.each(function() {$(this).empty();});
		
		// populate the containers //
		
		for(i = 0;i < 2;i++) {
			aux = aux === "hor" ? "ver" : "hor"; // define orientation
			$.each(layout.words[aux], function() {
				if(data.mode === "create" || data.mode === "edit") { //create and edit a crossword
					elm = $("<li />", {"value": this.ind}); //create list item
					elm.appendTo(lists.eq(i)); // insert list item
					$("<input />", {"type": "text", "value": this.word, "class": "form-control", "readonly": "true"}).appendTo(elm); // insert word in list item
					$("<textarea />", {"class": "form-control", "data-dir": aux, "text": this.def}).appendTo(elm); // insert definition in list item
				}
				else $("<li />", {"value": this.ind, "text": this.def}).appendTo(lists.eq(i)); // show just the definitions in view mode
			});
		}
		
		// reset textarea elements and trigger events on them again //
		
		var definitions = $("ol textarea");
		
		definitions.off("blur keydown");
		textareaEvents();
		
	}
	
	// check for progress while taking a crossword //
	
	this.checkProgress = function(show) {
		var total = $("div.canvas input:not(.empty)"); // crossword writtable cells
		var found = total.filter(function() {return matchValues($(this).val(), layout.cells[$(this).attr("id")].val);}); // cells with right values
		var led = $("div.indicator small");
		var progress = Math.round((found.length / total.length) * 100);
		led.text(progress + "%");
		if(progress === 100) {
			window.done = true;
			if(show) showModal("info", getMessage(7), ["dismiss"]);
		}
	}
	
	// -----CROSSWORD ACTIONS----- //
	
	// switch between edit view and build view on canvas //
	
	this.switchMode = function() {
		
		var inputs = $("div.canvas input"), labels = $("div.canvas small"), definitions = $("ol textarea");
		
		// edit view //
		
		if(data.view === "edit") {
			inputs.each(function() {
				$(this).attr("disabled", false); // make cells accesible
				$(this).attr("readonly", false); // make cells editable
				if($(this).val() === "") $(this).removeClass("empty").addClass("waiting"); // provide the edition background
			});
			cellEvents(); // restart events on cells
			definitions.each(function() {$(this).attr("disabled", true);}); // disabled textareas
			labels.each(function() {$(this).text("");}); // clean indexes
		}
		
		// build view //
		
		else {
			
			// setup the initialization //
			
			var nextcells, found, word, aux, i, j, words = $("ol input"), counter = 0, index = 0;
			
			getCellValues();
			resetWords();
			
			// building operation //
			
			for(var i = 0, j = layout.cells.length;i < j;i++) {
				
				inputs.eq(i).attr("readonly", true).removeClass("waiting"); // make every cell readonly and remove the edition background
				
				// proceed if the cell contains a character //
				
				if(layout.cells[i].val !== "") {
					
					// inspect cells around //
					
					nextcells = {
						"left": (layout.cells[i].col === 0 ? "" : layout.cells[i - 1].val), // return first column as empty
						"right": (layout.cells[i].col === (COLS - 1) ? "" : layout.cells[i + 1].val), // return last column as empty
						"top": (layout.cells[i].row === 0 ? "" : layout.cells[i - COLS].val), // return first row as empty
						"bottom": (layout.cells[i].row === (ROWS - 1) ? "" : layout.cells[i + COLS].val) // return last as row empty
					};
					
					// reset cell if it's not connected to another written cell //
					
					if(nextcells.left === "" && nextcells.right === "" && nextcells.top === "" && nextcells.bottom === "") { 
						layout.cells[i].val = "";
						inputs.eq(i).attr("disabled", true).addClass("empty").val("");
						continue;
					}
					else counter++; // increment number of characters found
					
					// get the word orientation //
					
					found = "";
					
					if(nextcells.left === "" && nextcells.right !== "") {found = "hor";} // hor word
					if(nextcells.top === "" && nextcells.bottom !== "") {found = (found === "" ? "ver" : "both");} // ver word
					
					// proceed if the cell is the beggining of an hor and-or ver word //
					
					if(found !== "") {
						
						layout.cells[i].lab = ++index; // increment index
						labels.eq(i).text(layout.cells[i].lab); //write index in DOM element
						
						// get word(s) //
						
						for(var k = 0, l = (found === "both" ? 2 : 1);k < l;k++) {
							
							if(found === "both") found = "hor"; // start from horizontal
							word = ""; // reset any word value from the previous iteration
							
							// grab all cells of row or column according the orientation //
							
							aux = (
								found === "ver" ? 
								layout.cells.filter(function(n) {return n.row >= layout.cells[i].row && n.col === layout.cells[i].col;}) :
								layout.cells.filter(function(n) {return n.row === layout.cells[i].row && n.col >= layout.cells[i].col;})
							);
							
							// fill word stoping at the row or column end or at the blank space //
							
							$.each(aux, function() {if(this.val === "") return false;else word += this.val});
							
							// find the most recent definition the current word had and keep it //
							
							aux = "";
							
							words.each(function(i) {if($(this).val() === word) {aux = definitions.eq(i).val();return;}});
							
							layout.words[found].push({"ind": index, "word": word, "def": aux}); // store the word
							
							found = "ver"; // change orientation for more than one word
							
						}
					}
					
				}
				else inputs.eq(i).attr("disabled", true).addClass("empty"); // disable empty cells
			}
			
			drawLists(); // redraw lists containers with new words and definitions
			getComplexity(counter); // adjust complexity level
			
		}
		
		// switch label of the action button //
		
		aux = data.view;
		data.view = aux === "edit" ? "build" : "edit";
		
		commands["switcher"].html(commands["switcher"].html().replace(aux.capitalize(), data.view.capitalize()));
		
	}
	
	// save created crossword //
	
	this.saveChanges = function() {
		if(data.view == "build") showMessage(3); // just run the command after building
		else {
			if(data.complexity < MIN_COMPLEXITY) showMessage(4); // save just if the crossword comply the min complexity requirement
			else if(data.complexity < (MIN_COMPLEXITY * 2) && data.published !== "N/A") showMessage(10); // can't save with less than required level for publishing when published
			else {data.pub = 0;data.mode == "create" ? getAuthor() : sendAuthor(data.author);} // show modal window to collect data
		}
	}
	
	// publish crossword //
	
	this.publishWork = function() {
		if(data.view == "build") showMessage(3); // just run the command after building
		else {
			if(data.complexity < (MIN_COMPLEXITY * 2)) showMessage(5); // publish just if the crossword comply the min complexity requirement
			else { // show modal window
				showModal("info", 
				"Congratulation! You are about to pubish your crossword.<br /><strong>This action will also save your latest changes.</strong>", 
				["continue", "dismiss"], 
				function() { // flag for publishing action and save latest changes on pressing continue button on modal window
					var btn = $("#modal-button-continue");
					btn.on("click", function() {data.pub = 1;data.mode == "create" ? getAuthor() : sendAuthor(data.author);});
				});
			}
		}
	}
	
	// reload crossword //
	
	this.reloadCrossword = function() {
		var callback = function() { // set reloading action to the modal window confirm button
			var btn = $("#modal-button-continue");
			btn.on("click", function (){window.location.reload();});
		}
		showModal("warning", getMessage(2), ["continue", "dismiss"], callback);
	}
	
	// delete crossword //
	
	this.deleteCrossword = function() {	
		showModal("warning", getMessage(6), ["continue", "dismiss"]);
		var btn = $("#modal-button-continue");
		btn.on("click", function() {
			callAjax("/settings/delete", {"id": data.id}).done(function() {window.location.reload();}).fail(function() {handleError();});
		});
	}
	
	// clear content from crossword //
	
	this.clearCrossword = function() {
		if(data.view === "edit") showMessage(0); // just run on edit view
		else {
			var callback = function() { // set clearing action to the modal window confirm button
				var btn = $("#modal-button-continue");
				btn.on("click", function (){
					var inputs = $("div.canvas input");
					var myModal = $('#myModal');
					inputs.each(function() {
						if(data.mode === "start" || data.mode === "continue") {$(this).val("");checkProgress();}
						else $(this).addClass("waiting").val("");
					});
					myModal.modal('hide');
				});
			}
			showModal("warning", getMessage(1), ["continue", "dismiss"], callback);
		}
	}
	
	// move the crossword according with the direction set //
	
	this.moveCrossword = function(dir) {
		if(data.view === "edit") showMessage(0); // just run on edit view
		else {
			var aux = $("div.canvas input").not(":input.waiting"); // check if there is at least an inserted character
			if(!aux.length) return; // do nothing if there's not
			else {
				aux = getPosition(dir);
				aux = (dir === "left" || dir === "top") ? aux - 1 : aux + 1; // define where to move
				if(aux < 0 || aux === COLS || aux === ROWS) return; // do nothing if there's not space to move
				for(var i = aux;(dir === "right" || dir === "bottom") ? i > 0 : dir === "left" ? i < COLS - 1 : i < ROWS - 1;(dir === "left" || dir === "top") ? i++ : i--) {
					aux = $("div.canvas input[" + ((dir === "left" || dir === "right") ? "col" : "row") + " = " + i + "]"); // get all cells from that row or column
					aux.each(function() { // swap each cell value from that row or column
						var ind = Number($(this).attr("id"));
						swapCells(ind, dir === "left" ? ind + 1 : dir === "right" ? ind - 1 : dir === "top" ? ind + COLS : ind - COLS);
					}); 
				}
			}
		}
	}
	
	// save progress while taking a crossword //
	
	this.saveProgress = function() {
		if(data.mode == "continue") sendProgress();
		else { // ask for email address to send the link to access the progress that will be saved
			showModal("data", largeModals("contact"), ["continue", "dismiss"]);
			var btn = $("#modal-button-continue");
			btn.on("click", function() {
				var input = $("#email");
				if(checkEmail(input.val())) { // check for valid email format before proceed
					data.contact = input.val();//sendProgress(input.val());
					showModal("captcha", "", ["continue", "dismiss"], sendValidation);
				}
				else input.val("Incorrect Email");
			});
		}
	}
	
	// discard progress of saved crossword //
	
	this.discardProgress = function() {
		showModal("warning", getMessage(9), ["continue", "dismiss"]);
		var btn = $("#modal-button-continue");
		btn.on("click", function() {
			var aux = $("#progress");
			callAjax("/settings/discard", {"id": aux.attr("data-ref")})
			.done(function(res) {window.location = HOST;}).fail(function() {handleError();});
		});
	}
	
	// reveal solution //
	
	this.revealSolution = function() {
		showModal("warning", getMessage(8), ["continue", "dismiss"], function() {
			var btn = $("#modal-button-continue");
			btn.on("click", function () {
				var box = $("div.canvas input");
				var win = $("#myModal");
				$.each(layout.cells, function(i) {if(this.val !== "") {box.eq(i).val(this.val);}});
				win.modal("hide");
				checkProgress(false);
			});
		});
	}
	
	// report error on crossword //
	
	this.reportError = function() {
		showModal("report", largeModals("report"), ["continue", "dismiss"]);
		var btn = $("#modal-button-continue");
		btn.on("click", function () {
			var field = $("#complaint");
			data.complaint = $.trim(field.val().substring(0, MAX_CHARS + 1));
			if(data.complaint.length === 0) {
				var win = $("#myModal");
				win.modal("hide");
			}
			else {
				data.contact = "";
				showModal("captcha", "", ["continue", "dismiss"], sendValidation);
			}
		});
	}
	
	// -----ACCESSORY ACTIONS----- //
	
	// construct large content on modal //
	
	this.largeModals = function(form, values) {
		var content = [];
		if(form === "complexity") {
			content.push("<strong>CROSSWORD BUILT SUCCESFULLY:</strong><br /><br />");
			content.push("Number of horizontal words:&nbsp;&nbsp;<strong>" + layout.words["hor"].length + "</strong><br />");
			content.push("Number of vertical words:&nbsp;&nbsp;<strong>" + layout.words["ver"].length + "</strong><br />");
			content.push("Total of words:&nbsp;&nbsp;<strong>" + (layout.words["hor"].length + layout.words["ver"].length) + "</strong><br />");
			content.push("Total of characters:&nbsp;&nbsp;<strong>" + values.chars + "</strong><br />");
			content.push("Average characters per word:&nbsp;&nbsp;<strong>" + parseFloat(values.average.toFixed(2)) + "</strong><br /><br />");
			content.push("<strong>COMPLEXITY LEVEL:&nbsp;&nbsp;<span class='text-danger'>" + parseFloat(data.complexity.toFixed(2)) + "</span></strong>");
		}
		else if (form === "author") {
			content.push("<strong>Please, enter your email address to continue</strong><br />");
			content.push("<small>A link to this crossword will be sent to your inbox so you can edit it.</small><br /><br />");
			content.push("<input type='text' class='form-control' id='email' value='" + (values || "") + "' />");
		}
		else if (form === "nicks") {
			content.push("<strong>Please, select the language of this crossword and enter an author</strong><br /><br />");
			content.push("<label for='language'>Language</label>");
			content.push("<select name='language' class='form-control'></select><br />");
			content.push("<label for='author'>Author</label><br />");
			content.push("<small class='text-warning'>Use only alphanumerical characters with no spaces</small>");
			content.push("<input type='text' name='author' maxlength='20' class='form-control' />");
			content.push("<div class='blockquote'>");
			if(data.nicks !== "") {
				$.each(data.nicks, function() {
					content.push("<div class='wrapper'>");
					content.push("<div class='holder'>");
					content.push("<input type='radio' name='nick' data-val='" + this.label + "' value='" + this.id + "'" + (this.label === data.nick.label ? "checked" : "") + " />");
					content.push("</div>");
					content.push("<div class='holder'>&nbsp;" + this.label + "&nbsp;&nbsp;&nbsp;&nbsp;</div>");
					content.push("</div>");
				});
			}
			content.push("</div>");
			content.push("<div class='alert alert-warning hide' role='alert'></div>");
		}
		else if (form === "embed"){
			content.push("CHOOSE A VIEW MODE AND COPY THE CODE BELLOW IT TO embed THIS CROSSWORD IN YOUR SITE<br /><hr /><br />");
			content.push("<strong>Horizontal Layout</strong><br />");
			content.push("<textarea class='form-control'>");
			content.push("<iframe src='http://" + $.trim(URL) + "/embed' width='1150px' height='650px' marginwidth='0' marginheight='0' frameborder='0'></iframe>");
			content.push("</textarea><br />");
			content.push("<strong>Vertical Layout</strong><br />");
			content.push("<textarea class='form-control'>");
			content.push("<iframe src='http://" + $.trim(URL) + "/embed' width='550px' height='1150px' marginwidth='0' marginheight='0' frameborder='0'></iframe>");
			content.push("</textarea>");
		}
		else if (form === "contact") {
			content.push("<strong>Please, enter your email address to continue</strong><br />");
			content.push("<small>A link to a saved with your progress version of this crossword will be sent to your inbox so you can resume it.</small><br /><br />");
			content.push("<input type='text' class='form-control' id='email' />");
		}
		else if (form === "report") {
			var tips = "Ex: The crossword is misspelled, the definitions are wrong or are insulting or make no sense, some words do not exist, etc";
			content.push("<strong>You think this crossword should be removed or fixed?</strong><br />");
			content.push("Use the text area bellow to let us know what you encounter wrong so we can take care of it.<br />");
			content.push("<small>Please, try to send your feedback in english, be brief and clear in your exposition. We appreciate your help!</small><br /><br />");
			content.push("<textarea id='complaint' class='form-control' style='height: 75px !important' placeholder='" + tips + "'></textarea>");
		}
		return content.join("");
	}
	
	// get crossword complexity //
	
	this.getComplexity = function(chars) {
		
		var words = layout.words["hor"].length + layout.words["ver"].length; // total of words
		if(words === 0) return; // blank crossword
		var average = chars / words; // average characters per word
		
		// get value by summing the total of chars to the average characters per word and comparing the result with the optimum value //
		
		data.complexity = ((average + chars) / MAX_LEVEL) * 100;
		
		showModal("info", largeModals("complexity", {"chars": chars, "average": average}), ["dismiss"]); // show result
		
	}
	
	// modal window to collect author email //
	
	this.getAuthor = function(error) {
		showModal("data", largeModals("author", (error || "")), ["continue", "dismiss"]); // show author (email) window
		var aux = $("#modal-button-continue");
		aux.on("click", function() { // trigger event to modal window button
			var input = $("#email");
			if(checkEmail(input.val())) sendAuthor(input.val()); // check for valid email format before proceed
			else input.val("Incorrect Email");
		});
	}
	
	// modal window to collect author nick and crossword language //
	
	this.getNick = function(error) {
		showModal("data", largeModals("nicks"), ["continue", "dismiss"]); // show nick(s) and language window
		var lang = getLang(""); // load lang file to populate selector and grab it
		var input = $("input[name='author']"), bts = $("input[type='radio']"), label = $("div.alert"), btn = $("#modal-button-continue"); // grab rest of modal window elements
		if(data.nick.label !== "N/A") input.val(data.nick.label); // pre populate author's nick
		if(error !== undefined) label.removeClass('hide').text(error); // show error when nick name is already taken by another author
		bts.on("click", function() {input.val($(this).attr("data-val"));}); // auto populate user nick when clicking on available nicks
		input.on("keyup", function() {
			bts.each(function() {$(this).prop("checked", $(this).attr("data-val") === $.trim(input.val()));}); // auto check uncheck radio buttons
			$(this).val($(this).val().replace(LOCK_CHARS, "")); // don't allow non alphanumerical characters
		});
		btn.on("click", function() { // check if the data is correct, store them and show captcha
			if(input.val() === "" || lang.prop("selectedIndex") === 0) label.removeClass('hide').text("Please, fill the information above");
			else {
				data.send= {"nick_id": bts.filter(function() {return $(this).prop("checked") === true;}).val(), "nick_label": input.val(), "language": lang.val()}; // user input
				if(data.send.nick_id === undefined) { // check whether new entered nick is available
					callAjax("/settings/nick", {"nick": input.val()})
					.done(function(res) {
						res = $.parseJSON(res);
						if(res === "false") showModal("captcha", "", ["continue", "dismiss"], sendValidation);
						else getNick(res);
					})
					.fail(function() {handleError();});
				}
				else showModal("captcha", "", ["continue", "dismiss"], sendValidation);
			}
		});
	}
	
	// ajax call to send author contact and collect data //
	
	this.sendAuthor = function(val) {
		callAjax("/settings/author", {"author": val})
		.done(function(res) {
			if(res === "") getAuthor("Incorrect Email"); // check for valid email also on server side
			else if(res === "error") handleError(); // internal server error or data structure error
			else {
				res = $.parseJSON(res);
				if(res["author"] === undefined) { // get nick(s)
					data.author = res["id"];
					data.nicks = [];
					$.each(res.nick, function() {data.nicks.push({"id": this.id,"label": this.label});});
                    data.user = res["contact"];
				}
				else { // new author
					data.author = res["author"];
					data.nicks = "";
				}
				getNick();
			}
		})
		.fail(function() {handleError();});
	}
	
	// validate captcha //
	
	this.sendValidation = function() {
		var submit = $("#modal-button-continue");
		submit.on("click", function() {
			var form = $("form");
			callAjax("/settings/validate", form.serialize())
			.done(function(res) {
				res = $.parseJSON(res);
				if(res === true) {
					data.contact === undefined ? sendData() : data.contact === "" ? sendReport() : sendProgress();
				}
				else showModal("captcha", "", ["continue", "dismiss"], sendValidation); // captcha failed
			})
			.fail(function() {handleError();});
		});
	}
	
	// send crossword to server //
	
	this.sendData = function() {
		var notes = $("textarea.notes");
		var aux = [];
		$.each(layout.cells, function() {aux.push(Number(this.val !== ""));}); // get scheme
		getDefinitions(); // update definitions
		aux = {
			"scheme": aux.join(""), 
			"layout": JSON.stringify(layout), 
			"author": data.author, 
			"complexity": data.complexity, 
			"id": data.id, 
                        "user": data.user, 
			"label": data.send.nick_label, 
			"language": data.send.language,
			"published": data.pub,
			"notes": notes.val()
		};
		callAjax("/settings/save", aux)
		.done(function(res) {
			res = $.parseJSON(res);
			if(res === "DELETED") window.location.reload(); // the crossword was deleted while being opening on the browser
			else {
				if (res.indexOf(":") > -1) eval(res);
				else resetValues(res); //show crossword new attributes
			}
		})
		.fail(function() {handleError();});
	}
	
	// ajax call to send the user email address when the user saves his progress about the crosswork he's working on //
	
	this.sendProgress = function(val) {
		var progress = [];
		var aux = $("div.canvas input");
		aux.each(function() {progress.push($(this).val());}); // get the progress made
		aux = $("#progress"); // grab the progress holder to get the already saved progress 'id' (if any)
		callAjax("/settings/progress", {"id": aux.attr("data-ref"), "crossword": data.id, "contact": data.contact, "progress": progress.join(",")})
		.done(function(res) {
			res = $.parseJSON(res);
			if(data.mode === "start") {if(res.indexOf(":") > -1) {eval(res);}}
			else {
				if(res === "true") {showModal("info", "Your progress on this crossword has been successfully updated", ["dismiss"]);}
				else {handleError();} // saved progress was deleted while resuming
			}
		})
		.fail(function() {handleError();});
	}
	
	// send report on crossword's errors find by the user //
	
	this.sendReport = function() {
		callAjax("/settings/report", {"crossword": data.id, "complaint": data.complaint})
		.done(function(res) {
			res = $.parseJSON(res);
			if(res === "DELETED") { // redirect the user is the crossword was already removed before getting the report
				var callback = function() {
					var aux = $("#modal-button-continue");
					aux.on("click", function() {window.location = HOST;});
				}
				showModal("info", "<strong>This crossword was already removed</strong><br />Thank you for contacting us.", ["continue"], callback);
			}
			else showModal("info", "<strong>Your feedback was sent successfully!</strong><br />Thank you for contacting us.", ["dismiss"]);
		})
		.fail(function() {handleError();});
	}
	
	// get crossword coordenates to move it //
	
	this.getPosition = function(pos) {
		var start = (pos === "left" || pos === "top") ? 0 : pos === "right" ? COLS - 1 : ROWS - 1; // starting point of the loop according the direction
		var stop = (pos === "right" || pos === "bottom") ? -1 : pos === "left" ? COLS : ROWS; // ending point of the loop according the direction
		var attr = (pos === "left" || pos === "right") ? "col" : "row"; // cell attribute (col or row) to match according the direction
		var inputs = $("div.canvas input"), aux;
		for(var i = start, j = stop;(pos === "left" || pos === "top") ? i < j : i > j;(pos === "left" || pos === "top") ? i++ : i--) {
			aux = inputs.filter(function() {return $(this).attr(attr) == i && inspectCellValue($(this).val()) !== "";}); // get all cells writen of that column or row
			if(aux.length) return i; // if at least a writen cell is found get the column or the row index
		}
	}
	
	// remove all the words that the crossword already have //
	
	this.resetWords = function() {layout.words["hor"].clean();layout.words["ver"].clean();}
	
	// reset crossword after save with the new values //
	
	this.resetValues = function(pub) {
		var aux;
		data.lang = data.send.language;
		data.nick.id = data.send.nick_id;
		data.nick.label = data.send.nick_label;
		if(pub !== "false") {
			data.published = pub;
			aux = $("a[data-action='publish']");
			aux.remove();
		}
		aux = $("nav div.blockquote small");
		aux.eq(0).text(data.nick.label);
		aux.eq(1).text(data.lang);
		aux.eq(2).find("span").text(parseFloat(Number(data.complexity).toFixed(2)));
		aux.eq(3).text(data.published);
		showModal("info", "The crossword has been successfully " + (pub === "false" ? "saved" : "published"), ["dismiss"]);
	}
	
	// compares values inserted in the cells with the right cell value on the layout to check the progress made while solving the crossword //
	
	this.matchValues = function(value, rightvalue) {return value === rightvalue || value === rightvalue.toLowerCase() || value === rightvalue.toUpperCase();}
	
	// get the latest definitions inserted after build before saving or publishing the crossword //
	
	this.getDefinitions = function() {
		var defs = $("ol textarea"), aux = 0;
		defs.each(function(i) {layout.words[$(this).attr("data-dir")][$(this).attr("data-dir") == "hor" ? i : aux++].def = curlyQuotes($(this).val());});
	}
	
	// get a message from the page messages list //
	
	this.getMessage = function (ind) {
		var msg = [
			"This command can be run just in edit mode.<br /><strong>Please, switch to edit mode to proceed.</strong>",
			"Are you sure you want to remove all inserted characters from the crossword?<br /><strong>This action will set a blank crossword.</strong>",
			"Are you sure you want to reload the crossword?<br /><strong>All changes that have not been saved will get lost.</strong>",
			"To save your changes or publish your crossword you need to build the crossword first.<br /><strong>Please, switch to build mode to proceed.</strong>",
			"The crossword must have at least a <strong class='text-danger'>" + MIN_COMPLEXITY + " degrees of complexity</strong> to be saved.",
			"The crossword must have at least a <strong class='text-danger'>" + (MIN_COMPLEXITY * 2) + " degrees of complexity</strong> to be published.",
			"Are you sure you want to delete this crossword?<br /><strong>This action cannot be reverted!</strong>",
			"<strong>Congratulations!</strong><br />You have completed this crossword. Don't forget to sharing it with your friends if you enjoyed it.",
			"Are you sure you want to reveal the solution of this crossword?<br /><strong>Don't give up and try harder!</strong>",
			"Are you sure you want to discard your saved work on this crossword?",
			"This crossword is already published and must have at least a <strong class='text-danger'>" + (MIN_COMPLEXITY * 2) + " degrees of complexity</strong> to be saved."
		];
		return msg[ind];
	}
	
	// general warning message action //
	
	this.showMessage = function(ind) {showModal("warning", getMessage(ind), ["dismiss"]);}
	
	// get language index on selector matching options with crossword language when applicable //
	
	this.findActiveItem = function() {
		var aux = $("select option");
		for(var i = 0, j = aux.length;i < j;i++) {
			if(aux.eq(i).val() === data.lang) {
				aux.parent().prop("selectedIndex", i);
				break;
			}
		}
	}
	
	// validate email address //
	
	this.checkEmail = function(email){
		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return filter.test(email);
	}
	
	// general message after an ajax fail //
	
	this.handleError = function() {showModal("warning", "We can process your request at this moment.<br /><strong>Please, try again later</strong>", ["dismiss"]);}
	
	// curly quotes generator to avoid double and single quotes on values inside json //
	
	this.curlyQuotes = function(val) {
		val = val.replace(/(^|[-\u2014\s(\["])'/g, "$1\u2018");       // opening singles
		val = val.replace(/'/g, "\u2019");                            // closing singles & apostrophes
		val = val.replace(/(^|[-\u2014/\[(\u2018\s])"/g, "$1\u201c"); // opening doubles
		val = val.replace(/"/g, "\u201d");                            // closing doubles
		val = val.replace(/--/g, "\u2014");                           // em-dashes
		return val;
	}
	
	//--------------------------------------------------------------------------
	// CONTACT PAGE ACTIONS
	//--------------------------------------------------------------------------
	
	var sendSupport = function() {
		var btn = $("form button[type='button']");
		btn.on("click", function() {
			var form = $("form");
			callAjax("/contact", form.serialize()).done(function(res) {
				res = $.parseJSON(res);
				var lab = $("span.help-block");
				showModal("warning", lab.eq(res).text(), ["dismiss"]);
				if(res === 5) form.reset();
			}).fail(function() {handleError();});
		});
	}
	
	this.support = $("#contact");
	
	if(support.length) sendSupport();
	
}();