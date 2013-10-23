//twitter
$(function(){
	var conf = {
		className : 'externalLink01'
	};
	$('[class^="blank"]').click(function(){
		window.open(this.href, "_blank");
		return false;
	}).addClass(conf.className);

});