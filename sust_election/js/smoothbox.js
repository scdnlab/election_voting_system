/*
 * Smoothbox v20070814 by Boris Popoff (http://gueschla.com)
 *
 * Based on Cody Lindley's Thickbox, MIT License
 *
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */

// on page load call TB_init
window.addEvent('domready', TB_init);

// prevent javascript error before the content has loaded
TB_WIDTH = 0;
TB_HEIGHT = 0;
var TB_doneOnce = 0 ;

// add smoothbox to href elements that have a class of .smoothbox
function TB_init(){
    $$("a.smoothbox").each(function(el){el.onclick=TB_bind});
}

function TB_bind(event) {
    var event = new Event(event);
    // stop default behaviour
    event.preventDefault();
    // remove click border
    this.blur();
    // get caption: either title or name attribute
    var caption = this.title || this.name || "";
    // get rel attribute for image groups
    var group = this.rel || false;
    // display the box for the elements href
    TB_show(caption, this.href, group);
    this.onclick=TB_bind;
    return false;
}


// called when the user clicks on a smoothbox link
function TB_show(caption, url, rel) {

    // create iframe, overlay and box if non-existent
document.getElementById("flash").style.display="none";

    if ( !$("TB_overlay") )
    {
        new Element('iframe').setProperty('id', 'TB_HideSelect').injectInside(document.body);
        $('TB_HideSelect').setOpacity(0);
        new Element('div').setProperty('id', 'TB_overlay').injectInside(document.body);
        $('TB_overlay').setOpacity(0);
        TB_overlaySize();
        new Element('div').setProperty('id', 'TB_load').injectInside(document.body);
        $('TB_load').innerHTML = "<img src='images/loading.gif' />";
        TB_load_position();
        new Fx.Style('TB_overlay', 'opacity',{duration: 500, transition: Fx.Transitions.sineInOut}).start(0,0.6);
    }
    
    if ( !$("TB_load") )
    {        
        new Element('div').setProperty('id', 'TB_load').injectInside(document.body);
        $('TB_load').innerHTML = "<img src='images/loading.gif' />";
        TB_load_position();
    }
    
    if ( !$("TB_window") )
    {
        new Element('div').setProperty('id', 'TB_window').injectInside(document.body);
        $('TB_window').setOpacity(0);
    }

    //$("TB_overlay").onclick=TB_remove;
    window.onscroll=TB_positionEffect;


            // TODO don't use globals
            TB_WIDTH = 600;
            TB_HEIGHT = 365;
            $("TB_window").innerHTML += "<div align='right'><a href='#' id='TB_closeWindowButton' title='Close'>close</a></div>";
            // TODO empty window content instead
            $("TB_window").innerHTML +="<iframe src='"+url+"' width='595' height='350' border='0'>";



            $("TB_closeWindowButton").onclick = TB_remove;

            function buildClickHandler(image) {
                return function() {
                    $("TB_window").remove();
                    new Element('div').setProperty('id', 'TB_window').injectInside(document.body);

                    TB_show(image.caption, image.url, rel);
                    return false;
                };
            }




            // TODO don't remove loader etc., just hide and show later
            $("TB_ImageOff").onclick = TB_remove;
            TB_position();
            TB_showWindow();




    window.onresize=function(){ TB_position(); TB_load_position(); TB_overlaySize();}  
    
    document.onkeyup = function(event){     
        var event = new Event(event);
        if(event.code == 27){ // close
            TB_remove();
        }    
    }
        
}

//helper functions below

function TB_showWindow(){
    //$("TB_load").remove();
    //$("TB_window").setStyles({display:"block",opacity:'0'});
    
    if (TB_doneOnce==0) {
        TB_doneOnce = 1;
        var myFX = new Fx.Style('TB_window', 'opacity',{duration: 250, transition: Fx.Transitions.sineInOut, onComplete:function(){if ($('TB_load')) { $('TB_load').remove();}} }).start(0,1);
    } else {
        $('TB_window').setStyle('opacity',1);
        if ($('TB_load')) { $('TB_load').remove();}
    }
}

function TB_remove() {
document.getElementById("flash").style.display="block";
     $("TB_overlay").onclick=null;
    document.onkeyup=null;
    document.onkeydown=null;
    
    if ($('TB_imageOff')) $("TB_imageOff").onclick=null;
    if ($('TB_closeWindowButton')) $("TB_closeWindowButton").onclick=null;
    if ( $('TB_prev') ) { $("TB_prev").onclick = null; }
    if ( $('TB_next') ) { $("TB_next").onclick = null; }

    new Fx.Style('TB_window', 'opacity',{duration: 250, transition: Fx.Transitions.sineInOut, onComplete:function(){$('TB_window').remove();} }).start(1,0);
    new Fx.Style('TB_overlay', 'opacity',{duration: 400, transition: Fx.Transitions.sineInOut, onComplete:function(){$('TB_overlay').remove();} }).start(0.6,0);

    window.onscroll=null;
    window.onresize=null;    
    
    $('TB_HideSelect').remove();
    TB_init();
    TB_doneOnce = 0;
    return false;
}

function TB_position() {
    $("TB_window").setStyles({width: TB_WIDTH+'px', 
                 left: (window.getScrollLeft() + (window.getWidth() - TB_WIDTH)/2)+'px',
                 top: (window.getScrollTop() + (window.getHeight() - TB_HEIGHT)/2)+'px'});
}

function TB_positionEffect() {
    new Fx.Styles('TB_window', {duration: 75, transition: Fx.Transitions.sineInOut}).start({
        'left':(window.getScrollLeft() + (window.getWidth() - TB_WIDTH)/2)+'px',
        'top':(window.getScrollTop() + (window.getHeight() - TB_HEIGHT)/2)+'px'});
}

function TB_overlaySize(){
    // we have to set this to 0px before so we can reduce the size / width of the overflow onresize 
    $("TB_overlay").setStyles({"height": '0px', "width": '0px'});
    $("TB_HideSelect").setStyles({"height": '0px', "width": '0px'});
    $("TB_overlay").setStyles({"height": window.getScrollHeight()+'px', "width": window.getScrollWidth()+'px'});
    $("TB_HideSelect").setStyles({"height": window.getScrollHeight()+'px',"width": window.getScrollWidth()+'px'});
}

function TB_load_position() {
    if ($("TB_load")) { $("TB_load").setStyles({left: (window.getScrollLeft() + (window.getWidth() - 56)/2)+'px', top: (window.getScrollTop() + ((window.getHeight()-20)/2))+'px',display:"block"}); }
}

function TB_parseQuery ( query ) {
    // return empty object
    if( !query )
        return {};
    var params = {};
    
    // parse query
    var pairs = query.split(/[;&]/);
    for ( var i = 0; i < pairs.length; i++ ) {
        var pair = pairs[i].split('=');
        if ( !pair || pair.length != 2 )
            continue;
        // unescape both key and value, replace "+" with spaces in value
        params[unescape(pair[0])] = unescape(pair[1]).replace(/\+/g, ' ');
   }
   return params;
}
