
(function(w,o,undefined){if(o===undefined){return;}
o.easing=function(t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;};o.tossing=false;var timeKeeper;o.toss=function(elem,options){o.intercept();var i=0,sLeft=elem.scrollLeft,sTop=elem.scrollTop,op={top:"+0",left:"+0",duration:50,easing:o.easing,finished:function(){}},endLeft,endTop,finished=false;if(options){for(var j in op){if(options[j]!==undefined){op[j]=options[j];}}}
if(typeof op.left==="string"){op.left=parseFloat(op.left);endLeft=op.left+sLeft;}
else{endLeft=op.left;op.left=op.left-sLeft;}
if(typeof op.top==="string"){op.top=parseFloat(op.top);endTop=op.top+sTop;}
else{endTop=op.top;op.top=op.top-sTop;}
o.tossing=true;timeKeeper=setInterval(function(){if(i++<op.duration){elem.scrollLeft=op.easing(i,sLeft,op.left,op.duration);elem.scrollTop=op.easing(i,sTop,op.top,op.duration);}
else{if(endLeft!==elem.scrollLeft){elem.scrollLeft=endLeft;}else{if(finished){op.finished();}
finished=true;}
if(endTop!==elem.scrollTop){elem.scrollTop=endTop;}else{if(finished){op.finished();}
finished=true;}
o.intercept();}},1);return{top:endTop,left:endLeft,duration:o.duration,easing:o.easing};};o.intercept=function(){clearInterval(timeKeeper);o.tossing=false;};})(this,this.overthrow);