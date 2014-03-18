var isSend = null;
var iDelay = 600;  // delay before submit to server, if is already submitted
var oD3SearchJQ = jQuery;

oD3SearchJQ(document).ready(function()
{
    oD3SearchJQ('#searchparam').focus(function(){
        if(oD3SearchJQ(this).attr("value") == sD3SearchBoxDefault)
        {
            oD3SearchJQ(this).attr("value", "");
            oD3SearchJQ(this).removeClass('d3notice');
        }
    });
    oD3SearchJQ('#searchparam').blur(function(){
        if(oD3SearchJQ(this).attr("value") == "")
        {
            oD3SearchJQ(this).attr("value", sD3SearchBoxDefault);
            oD3SearchJQ(this).addClass('d3notice');
        }
    });
    oD3SearchJQ('#searchparam').focus();
    oD3SearchJQ('#searchparam').removeClass('d3notice');
    oD3SearchJQ("#searchparam").keyup(function(event)
    {
        oD3SearchJQ(document).d3JQmoveActItemLineKbd(event);
    });
});

(function(oD3SearchJQ)
{
    oD3SearchJQ.fn.extend(
    {
        d3JQmoveActItemLineMouse: function(id, name)
        {
            oldColoredId = coloredId;
            coloredId = id;
            iActLine = name;
            oD3SearchJQ(document).d3JQchangeSearchItemColor(coloredId, oldColoredId);
            return;
        },
        d3JQmoveActItemLineKbd: function(event)
        {
            event.preventDefault();
            iCode = event.keyCode;

            if (oD3SearchJQ("#xajax_resp").css('display') != 'none')
            {
                if (iCode == 38)    // arrow up key
                {
                    if (iActLine > 0) { iActLine--;}
                    if (coloredId) { oldColoredId = coloredId; }
                    blNavigate = true;
                    coloredId = oD3SearchJQ(document).d3JQfindQSItem(iActLine);
                    oD3SearchJQ(document).d3JQchangeSearchItemColor(coloredId, oldColoredId);
                }
                else if (iCode == 40) // arrow down key
                {
                    iNodesCount = oD3SearchJQ(document).d3JQgetQSItemCount();
                    if (iActLine < iNodesCount - 1) {iActLine++};
                    if (coloredId) { oldColoredId = coloredId; }
                    blNavigate = true;
                    coloredId = oD3SearchJQ(document).d3JQfindQSItem(iActLine);
                    oD3SearchJQ(document).d3JQchangeSearchItemColor(coloredId, oldColoredId);
                }
                else if (iCode == 13  && blNavigate)   // enter key, if quick search window is open
                {
                    window.location.href = oD3SearchJQ("#" + oD3SearchJQ(document).d3JQfindQSItem(iActLine)).attr('href');
                    return false;
                }
                else if (iCode == 27)    // escape key
                {
                    oD3SearchJQ("#xajax_resp").css({'display' : 'none'});
                }
                else if (iCode == 13)   // enter key, stop quick search window
                {
                    if (window.isSend)
                    {
                        window.clearTimeout(window.isSend);
                        oD3SearchJQ("#xajax_resp").css({'display' : 'none'});
                    }
                    return true;
                }
                else    // all other keys, letters for example
                {
                    oD3SearchJQ(document).d3JQsubmitSearch();
                }
            }
            else     // there's no quick search window
            {
                oD3SearchJQ(document).d3JQsubmitSearch();
            }
        },
        d3JQsubmitSearch: function()
        {
            if (!oD3SearchJQ('#d3_extsearch_quicksearch.searchWaitMsg').length > 0)
            {
                oD3SearchJQ("#xajax_resp").d3JQgetWaitMessage();
                window.isSend = window.setTimeout("d3JQgetAjax()", 0);
            }
            else
            {
                oD3SearchJQ("#xajax_resp").d3JQgetWaitMessage();
                if (window.isSend)
                {
                    window.clearTimeout(window.isSend);
                }
                window.isSend = window.setTimeout("d3JQgetAjax()", iDelay);
            }
            return null;
        },
        d3JQgetWaitMessage: function()
        {
            oD3SearchJQ(this).html(oD3SearchJQ(document).html_entity_decode(sD3ExtSearchWaitContent));
            oD3SearchJQ(this).css(
            {
                'display' : 'block',
                'top' : oD3SearchJQ('#searchparam').offset().top + ( oD3SearchJQ('#searchparam').height() + 5 ) + 'px',
                'left' : oD3SearchJQ('#searchparam').offset().left + 'px',
                'width' : oD3SearchJQ('#searchparam').width() + 'px'
            });
            return;
        },
        d3JQchangeSearchItemColor: function(newId, oldId)
        {
            if (oldId != -1 && oldId != newId)
            {
                // don't use toggleClass, because this method is to slow for this case
                oD3SearchJQ("#" + oldId).addClass('item_inact');
                oD3SearchJQ("#" + oldId).removeClass('item_act');
            }

            if (oldId != newId)
            {
                oD3SearchJQ("#" + newId).addClass('item_act');
                oD3SearchJQ("#" + newId).removeClass('item_inact');
            }
        },
        d3JQfindQSItem: function(iLine)
        {
            iRet = null;
            oD3SearchJQ('#searchItemList').children('a.d3QSItem').each(function(index, value)
            {
                if (index == iLine)
                {
                    iRet = value.id;
                    return false;
                }
                return null;
            });
            return iRet;
        },
        d3JQgetQSItemCount: function()
        {
            return oD3SearchJQ('#searchItemList').children('a.d3QSItem').length;
        },
        html_entity_decode: function(str)
        {
            var convelem=document.createElement('textarea');
            convelem.innerHTML = str;
            return convelem.value;
            convelem.parentNode.removeChild(convelem);
        },
//// IAS ////
        d3JQshowIASWnd: function(event)
        {
            if (oD3SearchJQ("#IAS_box").length)
            {
                sSelection = oD3SearchJQ(document).d3JQgetSelection();

                if (sSelection != sLastSelection && sSelection.length > 0)
                {
                    oD3SearchJQ("#IAS_box").css(
                    {
                        'top' : event.pageY + iPosOffset + "px",
                        'left' : event.pageX + iPosOffset + "px",
                        'display' : 'block'
                    });
                    oD3SearchJQ("#IAS_input").val(sSelection);
                    if (window.oClearWnd)
                        oD3SearchJQ(document).d3JQbreakClearIASWnd();
                    sLastSelection = sSelection;
                }
                else
                {
                    window.oClearWnd = window.setTimeout("d3JBclearIASWnd()", iIASDelay);
                }
            }
        },
        d3JQbreakClearIASWnd: function()
        {
            window.clearTimeout(window.oClearWnd);
        },
        d3JQgetSelection: function()
        {
            var sSelection = "";

            if (window.getSelection) {
                oSelection = window.getSelection();
            } else if (document.getSelection) {
                // NC compatible
                oSelection = document.getSelection();
            } else if (document.selection) {
                // IE compatible
                oSelection = document.selection.createRange().text;
            }

            sSelection = oSelection.toString();

            return sSelection;
        }
    });
})(jQuery);

function d3JQgetAjax()
{
    oD3SearchJQ.get(sD3ExtSearchAjaxResponse + "searchparam=" + oD3SearchJQ("#searchparam").val(), function(text)
    {
        oD3SearchJQ("#xajax_resp").html(text);
        oD3SearchJQ("#xajax_resp").css({
            'display' : 'block',
            'top' : oD3SearchJQ('#searchparam').offset().top + ( oD3SearchJQ('#searchparam').height() + 5 ) + 'px',
            'left' : oD3SearchJQ('#searchparam').offset().left + 'px',
            'width' : oD3SearchJQ('#searchparam').width() + 'px',
            'position' : 'absolute',
            'z-index' : '20000'
        });
    });

    iActLine = -1;
    coloredId = -1;
    oldColoredId = -1;
    blNavigate = false;
}

function d3JBclearIASWnd()
{
    oD3SearchJQ("#IAS_box").css(
    {
        'display' : "none"
    });
    sLastSelection = "";
}

///////////// IAS /////////////////////

var oClearWnd = null;
var iPosOffset = 10;     // in px
var sLastSelection = "";
var iIASDelay = 600;     // ms zwischen Click auﬂerhalb und deaktivieren der Box

oD3SearchJQ(document).ready(function()
{
    oD3SearchJQ(document).mouseup(function(event)
    {
        oD3SearchJQ(document).d3JQshowIASWnd(event);
    });
    oD3SearchJQ('#IAS_box').mouseup(function()
    {
        oD3SearchJQ(document).d3JQbreakClearIASWnd();
    });
});