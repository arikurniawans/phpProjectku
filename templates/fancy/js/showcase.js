// Scroll Buttons

//** jQuery Scroll to Top Control script- (c) Dynamic Drive DHTML code library: http://www.dynamicdrive.com.
//** Available/ usage terms at http://www.dynamicdrive.com (March 30th, 09')
//** v1.1 (April 7th, 09'):
//** 1) Adds ability to scroll to an absolute position (from top of page) or specific element on the page instead.
//** 2) Fixes scroll animation not working in Opera. 


var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
	controlHTML: '<img src="images/arrow_ups.png"/>', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:5, offsety:5}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.attr({title:'Scroll Back to Top'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init()


// Preloader

$(function(){$.fn.preloadify=function(a){function i(d){if(f[d]==false){g++;a.oneachload(b[d]);f[d]=true}if(a.imagedelay==0&&a.delay==0)$(b[d]).css("visibility","visible").animate({opacity:1},700);else if(a.delay==0){h(b[d],e);e+=a.imagedelay}else if(a.imagedelay==0)h(b[d],a.delay);else{h(b[d],a.delay+e);e+=a.imagedelay}}a=$.extend({delay:0,imagedelay:0,mode:"parallel",preload_parent:"a",check_timer:200,ondone:function(){},oneachload:function(){},fadein:700},a);var k=$(this),j,c=0,e=a.imagedelay,g=
0,b=k.find("img").css({display:"block",visibility:"hidden",opacity:0}),f=[],h=function(d,l){$(d).css("visibility","visible").delay(l).animate({opacity:1},a.fadein,function(){$(this).parent().removeClass("preloader")})};b.each(function(){$(this).parent(a.preload_parent).length==0?$(this).wrap("<a class='preloader' />"):$(this).parent().addClass("preloader");f[c++]=false});b=$.makeArray(b);c=g=0;e=a.imagedelay;j=setInterval(function(){if(g>=f.length){clearInterval(j);a.ondone()}else if(a.mode=="parallel")for(c=
0;c<b.length;c++)b[c].complete==true&&i(c);else if(b[c].complete==true){i(c);c++}},a.check_timer)}});


$(function(){$(".gallery").preloadify({ imagedelay:500 });});


// Tooltips

$(document).ready(function() {
	//Select all anchor tag with rel set to tooltip
	$('a[rel=tooltip]').mouseover(function(e) {
		//Grab the title attribute's value and assign it to a variable
		var tip = $(this).attr('title');	
		//Remove the title attribute's to avoid the native tooltip from the browser
		$(this).attr('title','');
		//Append the tooltip template and its value
		$(this).append('<div id="tooltip"><div class="tipBody">' + tip + '</div></div>');		
		//Show the tooltip with faceIn effect
		$('#tooltip').fadeIn('500');
		$('#tooltip').fadeTo('10',0.9);
	}).mousemove(function(e) {
		//Keep changing the X and Y axis for the tooltip, thus, the tooltip move along with the mouse
		$('#tooltip').css('top', e.pageY + 10 );
		$('#tooltip').css('left', e.pageX + 20 );
	}).mouseout(function() {
		//Put back the title attribute's value
		$(this).attr('title',$('.tipBody').html());
		//Remove the appended tooltip template
		$(this).children('div#tooltip').remove();
	});
});