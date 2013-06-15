(function ($) {

	// Wrap ampersands in span.ampersand
	$("p:contains('&')").each(function(){
		$(this).html($(this).html().replace(/&amp;/, "<span class='ampersand'>&amp;</span>"));
	});

	$('table tr:nth-child(2n)').addClass('alt');

	// Fitvids
	(function(a){a.fn.fitVids=function(b){var c={customSelector:null};var d=document.createElement("div"),e=document.getElementsByTagName("base")[0]||document.getElementsByTagName("script")[0];d.className="fit-vids-style";d.innerHTML="­<style>         \n      .fluid-width-video-wrapper {        \n         width: 100%;                     \n         position: relative;              \n         padding: 0;                      \n      }                                   \n                                          \n      .fluid-width-video-wrapper iframe,  \n      .fluid-width-video-wrapper object,  \n      .fluid-width-video-wrapper embed {  \n         position: absolute;              \n         top: 0;                          \n         left: 0;                         \n         width: 100%;                     \n         height: 100%;                    \n      }                                   \n    </style>";e.parentNode.insertBefore(d,e);if(b){a.extend(c,b)}return this.each(function(){var b=["iframe[src^='http://player.vimeo.com']","iframe[src^='http://www.youtube.com']","iframe[src^='https://www.youtube.com']","iframe[src^='http://www.kickstarter.com']","object","embed"];if(c.customSelector){b.push(c.customSelector)}var d=a(this).find(b.join(","));d.each(function(){var b=a(this);if(this.tagName.toLowerCase()=="embed"&&b.parent("object").length||b.parent(".fluid-width-video-wrapper").length){return}var c=this.tagName.toLowerCase()=="object"?b.attr("height"):b.height(),d=c/b.width();if(!b.attr("id")){var e="fitvid"+Math.floor(Math.random()*999999);b.attr("id",e)}b.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",d*100+"%");b.removeAttr("height").removeAttr("width")})})}})(jQuery)

}(jQuery));