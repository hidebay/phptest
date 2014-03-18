[{if $sSearchFieldName}]

    <div id="xajax_resp" class="xajax_resp"></div>

    [{ $oXajax->getXajaxCode() }]
    <script type="text/javascript">

        [{*** Basics ***}]
        var nc      =  !!(document.captureEvents    &&  !document.getElementById);
        var nc6     =  !!(document.captureEvents    &&  document.documentElement);
        var opera   =  !!(document.getElementById   &&  !document.documentElement);
        var ie      =  !!document.all;
        var ie4     =  !!(document.all              &&  !document.documentElement);
        var ie5     =  !!(document.all              &&  document.documentElement);
        var dom     =  !!document.getElementById;
        var mac     =  !!(navigator.userAgent.indexOf("Mac")!=-1);

        [{*** quickSearch ***}]
        oSearchElem = document.getElementById('f.search.param');
        var isSend = null;
        var iDelay = 600;  [{* ms vor Absenden an Server *}]

        if (oSearchElem) {
            if (document.addEventListener) {
                oSearchElem.addEventListener("keyup", moveActItemLineKbd, true);
            } else {
                if (document.layers)
                    oSearchElem.captureEvents(Event.KEYUP);
                oSearchElem.onkeyup = moveActItemLineKbd;
            }
        }

        function findPos() {

            var el      = arguments[0];
            var xPos    = 0;
            var yPos    = 0;

            if(nc) {
                for(i = 0; i < arguments.length; i++) {
                    xPos += arguments[i].x;
                    yPos += arguments[i].y;
                }
            }
            else {
                while(el){
                xPos += el.offsetLeft;
                    yPos += el.offsetTop;
                    if(!(ie4 && mac))   el  = el.offsetParent;
                    else el = el.parentElement;
                }
            }
            return {xPos: xPos, yPos: yPos};
        }

        function moveActItemLineKbd(e){
            if (!e) e = window.event;

            oRespElem = document.getElementById('xajax_resp');
            if (ie || ie4 || ie5) {
                iCode = e.keyCode;
            } else {
                iCode = e.which;
            }

            if (oRespElem.style.display != 'none') {
                if (iCode == 38){   [{* dar�berliegender Eintrag *}]
                    if (iActLine > 0) { iActLine--;}
                    if (coloredId) { oldColoredId = coloredId };
                    blNavigate = true;
                    coloredId = document.getElementById('searchItemList').childNodes[iActLine].id;
                    changeSearchItemColor(coloredId, oldColoredId);
                } else if (iCode == 40) { [{* darunterliegender Eintrag *}]
                    iNodesCount = document.getElementById('searchItemList').childNodes.length;
                    if (iActLine < iNodesCount - 1) {iActLine++};
                    if (coloredId) { oldColoredId = coloredId };
                    blNavigate = true;
                    coloredId = document.getElementById('searchItemList').childNodes[iActLine].id;
                    changeSearchItemColor(coloredId, oldColoredId);
                } else if (iCode == 13  && blNavigate) { [{* absenden, wenn Eintrag gew�hlt *}]
                    window.location.href = document.getElementById('searchItemList').childNodes[iActLine].href;
                    return false;
                } else if (iCode == 27) { [{* ausblenden *}]
                    oRespElem.style.display = 'none';
                } else if (iCode == 13) {
                    if (window.isSend) {
                        window.clearTimeout(window.isSend);
                        oRespElem.style.display = 'none';
                    }
                    return true;
                } else {
                    getWaitMessage();
                    if (window.isSend) {
                        window.clearTimeout(window.isSend);
                    }
                    window.isSend = window.setTimeout("sendInput()", iDelay);
                }
            } else {
                if (oSearchElem) {
                    getWaitMessage();
                    if (window.isSend) {
                        window.clearTimeout(window.isSend);
                    }
                    window.isSend = window.setTimeout("sendInput()", iDelay);
                }
            }
        }

        function html_entity_decode(str)
        {
            var convelem=document.createElement('textarea');
            convelem.innerHTML = str;
            return convelem.value;
            convelem.parentNode.removeChild(convelem);
        }

        function getWaitMessage()
        {
            oRespElem.style.display = 'block';
            oRespElem.style.top = findPos(oSearchElem).yPos + oSearchElem.offsetHeight + 'px';
            oRespElem.style.left = findPos(oSearchElem).xPos + 'px';
            oRespElem.style.width = oSearchElem.offsetWidth + 'px';
            [{strip}]
            [{*** escaped because proplematicly HTML validation ***}]
                oRespElem.innerHTML =
                    [{assign var="sHTML" value='
                        <div id="d3_extsearch_quicksearch">
                            <div class="headline">
                    '}]
                                [{assign var="sTransl" value="D3_EXTSEARCH_QUICK_SEARCH"|oxmultilangassign}]
                    [{assign var="sHTML" value=$sHTML|cat:$sTransl|cat:'
                            </div>
                        </div>
                    '}]
                    html_entity_decode('[{$sHTML|strip|escape:"htmlall"}]');
            [{/strip}]
        }

        function sendInput()
        {
            [{$oXajax->getXajaxFunctionCall('d3_sendSearchStr')}];
            iActLine = -1;
            coloredId = -1;
            oldColoredId = -1;
            blNavigate = false;
        }

        function moveActItemLineMouse(id, name) {
            oldColoredId = coloredId;
            coloredId = id;
            iActLine = name;
            changeSearchItemColor(coloredId, oldColoredId);
        }

        function changeSearchItemColor(newId, oldId) {
            if (oldId != -1) {
                document.getElementById(oldId).className = 'item_inact';
            }
            document.getElementById(newId).className = 'item_act';
        }
    </script>

[{/if}]

[{if $blD3ShowIAS}]
    <div id="IAS_box" class="IAS_box">
        <div class="headline">
            <div class="closebtn" onClick="document.getElementById('IAS_box').style.display='none';"></div>
            [{oxmultilang ident="D3_EXTSEARCH_IAS_SEARCH"}]
        </div>
        <form action="[{ $oViewConf->getBaseDir() }]index.php" method="get" onSubmit="d3_extsearch_popup.popup.load();">
            <div>
                [{ $oViewConf->getHiddenSid() }]
                <input type="hidden" name="cl" value="search">
                [{if $sSearchFieldName}]
                    <input type="hidden" name="searchfieldname" value="[{$sSearchFieldName}]">
                    <input type="text" name="[{$sSearchFieldName}]" value="" size="30" id="IAS_input">
                [{else}]
                    <input id="IAS_input" type="text" size="30" value="" name="searchparam">
                [{/if}]
                <span class="btn">
                    <input type="submit" class="btn" value="[{oxmultilang ident="D3_EXTSEARCH_IAS_STARTSEARCH"}]">
                </span>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        [{*** interactive search ***}]

        var oClearWnd = null;
        var oIASElem = document.getElementById("IAS_box");
        var iPosOffset = 10; [{* in px *}]
        var sLastSelection = "";
        var iDelay = 600;  [{* ms zwischen Click au�erhalb und deaktivieren der Box *}]

        if (document.attachEvent) {
            document.attachEvent('onmouseup', showIASWnd);
            document.getElementById("IAS_box").attachEvent('onmouseup', breakClearIASWnd);
        } else if (document.addEventListener) {
            document.addEventListener("mouseup", showIASWnd, true);
            document.getElementById("IAS_box").addEventListener("mouseup", breakClearIASWnd, true);
        } else {
            if (document.layers)
                window.captureEvents(Event.MOUSEUP);
            window.onmouseup = showIASWnd;
        }

        function showIASWnd(e) {
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

            if (sSelection != sLastSelection && sSelection.length > 0)
            {
                var xPos    =  e? e.clientX : window.event.x;
                var yPos    =  e? e.clientY : window.event.y;
                window.oIASElem.style.top = yPos + iPosOffset + "px";
                window.oIASElem.style.left = xPos + iPosOffset + "px";
                document.getElementById("IAS_input").value = sSelection;
                window.oIASElem.style.display = "block";
                if (window.oClearWnd)
                    breakClearIASWnd();
                sLastSelection = sSelection;
            } else {
                window.oClearWnd = window.setTimeout("clearIASWnd()", iDelay);
            }
        }

        function clearIASWnd()
        {
            window.oIASElem.style.display = "none";
            sLastSelection = "";
        }

        function breakClearIASWnd()
        {
            window.clearTimeout(window.oClearWnd);
        }

    </script>
[{/if}]

[{if $blD3ShowSearchPopup}]
    <div id="d3_extsearch_message" class="popup">
        <strong style="text-align: center;">[{oxmultilang ident="D3_EXTSEARCH_SEARCHINPROGRESS"}]</strong>
    </div>

    <script type="text/javascript">
        var d3_extsearch_popup = {
            // Popups
            popup: {
                load : function(){ oxid.popup.setClass('d3_extsearch_message','popup load on','on');}
            }
        };
    </script>
[{else}]
    <script type="text/javascript">
        var d3_extsearch_popup = {
            popup: {
                load : function(){ }
            }
        };
    </script>
[{/if}]