function init_slide_hide() {
	var els = document.getElementsByTagName('*');
	for (var i=0;i<els.length;i++) {
		if (els[i].className == 'hide_me') slide(els[i].id,0);
		if (els[i].className == 'slide_in') { slide(els[i].id,0); slide(els[i].id) }
	}
	var l = document.getElementById('loading_css');
	if (l) {l.href='';l.parentNode.removeChild(l)}
}
function slide(id,duration,step_duration){
	var el = document.getElementById(id);
	if (!el || !el.style || (el.morph_data && el.morph_data.timeout)) return;
	if (duration === undefined) duration = 750;
	if (!step_duration) step_duration = 10;
	var steps = Math.max(Math.ceil(duration/step_duration),1);
	el.style.overflow = 'hidden';
	if (!el.morph_data) el.morph_data = new Object();
	if (el.style.height == '0px') {
		morph_height(el,0,el.morph_data.naturalHeight,duration,steps,1);
	} else {
		el.morph_data.naturalHeight = el.offsetHeight;
		el.morph_data.style_height = el.style.height;
		morph_height(el,el.offsetHeight,0,duration,steps,1);
	}
}
function morph_height(el,from,to,duration,steps,step) {
	var x = step/steps;
	var y = Math.sin((x-0.5)*Math.PI);
	var z = (y+1)*0.5;
	var h = from + (to-from)*z;
	var finished = (step == steps);
	if (finished) h = to;
	el.style.height = h+'px';
	if (finished && h!=0) {
		//el.style.height = el.morph_data.style_height;
		el.morph_data = undefined;
		return;
	}
	if (finished) {
		delete el.morph_data.timeout;
		return;
	}
	var t = duration/steps;
	el.morph_data.timeout = setTimeout(function(){morph_height(el,from,to,duration,steps,step+1)},t);
}
var noscript_css = document.getElementById('noscript_css');
if (noscript_css) {
	noscript_css.id='loading_css';
	noscript_css.href='loading.css';
}
if (window['addEventListener']) addEventListener('load',init_slide_hide,false);
else if (window['attachEvent']) attachEvent('onload',init_slide_hide);
