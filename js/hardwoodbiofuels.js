jQuery(document).ready(function(){
	var primeNav = new primary_drop_nav();
	});
	
function primary_drop_nav(){
	this.searchBar = jQuery('.header-search .search-box');
	this.nav = jQuery('.primary-nav');
	this.more_btn = jQuery('.more-nav');
	this.more_nav = jQuery('nav.more');
	this.nav_top_items = this.nav.children('li');
	var self = this;
	
	self.bind_events = bind_events; function bind_events(){
		self.nav_top_items.hover(
			function(){ 
				var cObject = jQuery(this);
				cObject.addClass('active');
				var mTime = setTimeout( function(){ self.show_dropdown( cObject )} ,150);
				},
			function(){ 
				jQuery(this).removeClass('active');
				self.hide_dropdown( jQuery(this) )
				}
		);
		self.more_btn.hover(
			function(){ 
				var cObject = jQuery(this);
				cObject.addClass('active');
				var mTime = setTimeout( function(){ self.show_more_dropdown()} ,150);
				},
			function(){
				var cObject = jQuery(this);
				jQuery(this).removeClass('active');
				var mTime = setTimeout( function(){ self.hide_more_dropdown( )} ,150);
				}
		);
		self.more_nav.hover(
			function(){self.more_btn.addClass('active')},
			function(){
				var cObject = jQuery(this);
				self.more_btn.removeClass('active');
				var mTime = setTimeout( function(){ self.hide_more_dropdown( )} ,150);
				}
		);
		self.searchBar.on('focus',function(){ self.searchBar.val(''); });
	}
	
	self.show_dropdown = show_dropdown; function show_dropdown( nav_item ){
		if( nav_item.hasClass('active') ){
			nav_item.children('ul').slideDown('fast');
		}
	}
	
	self.hide_dropdown = hide_dropdown; function hide_dropdown( nav_item ){
			nav_item.children('ul').slideUp('fast');
	}
	
	self.show_more_dropdown = show_more_dropdown; function show_more_dropdown( ){
		if( self.more_btn.hasClass('active') ){
			self.more_nav.children('ul').slideDown('fast');
		}
	}
	
	self.hide_more_dropdown = hide_more_dropdown; function hide_more_dropdown( ){
		if( !self.more_btn.hasClass('active') ){
			self.more_nav.children('ul').slideUp('fast');
		}
	}
	
	self.check_active = check_active; function check_active( item_nav ){
	}
	
	self.b_html5 = function (){
		if(!/*@cc_on!@*/0)return;var e = "abbr,article,aside,audio,bb,canvas,datagrid,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(','),i=e.length;
		while(i--){
			document.createElement(e[i])
		}
	}
	
	self.bind_events();
	self.b_html5();
}