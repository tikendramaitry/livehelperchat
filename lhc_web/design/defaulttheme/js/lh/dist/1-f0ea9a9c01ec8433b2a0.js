webpackJsonp([1],{2:function(e){var o={cancelcolorbox:function(){$("#myModal").foundation("reveal","close")},initializeModal:function(e){var o=void 0!=e?e:"myModal";0==$("#"+o).size()&&($("body").prepend('<div id="'+o+'" class="reveal-modal large"><a class="close-reveal-modal">&#215;</a></div>'),$("#"+o).on("opened",function(){$(document).foundation("section","reflow")}))},revealModal:function(e,a){void 0!==a&&a===!0&&($("#myModal").remove(),$(".reveal-modal-bg").remove()),o.initializeModal("myModal"),$("#myModal").foundation("reveal","open",{url:e})},revealIframe:function(e,a){o.initializeModal(),$("#myModal").html('<a class="close-reveal-modal">&#215;</a><iframe src="'+e+'" frameborder="0" style="width:100%" height="'+a+'" />'),$("#myModal").foundation("reveal","open")}};e.exports=o}});