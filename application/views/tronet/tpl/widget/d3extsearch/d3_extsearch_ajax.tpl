[{if $sSearchFieldName || ($oViewConf->getActiveClassName() == 'search' && $oView->d3HasjQuerySlider())}]
    [{oxscript include="js/libs/jquery.min.js"}]
[{/if}]

[{if $sSearchFieldName}]
    [{strip}]
        <div id="xajax_resp" class="xajax_resp_cl"></div>
        [{oxscript include="js/d3_ext_search.js"}]

        [{assign var="sCharSet" value="charset"|oxmultilangassign}]
        [{assign var="sWaitMessage" value=$sD3QSWaitMessage|strip|escape:"htmlall":$sCharSet}]  [{* escaped because proplematicly HTML validation *}]
        [{oxscript add="var sD3ExtSearchWaitContent  = '"|cat:$sWaitMessage|cat:"';"}]
        [{oxscript add="var sD3ExtSearchAjaxResponse = '"|cat:$oViewConf->getCurrentHomeDir()|cat:"d3_extsearch_response.php?';"}]
        [{if !$blD3EmptySearch}]
            [{assign var="sSBDefault" value="D3_EXTSEARCH_FIELD_NOTICE"|oxmultilangassign}]
            [{oxscript add="var sD3SearchBoxDefault = '"|cat:$sSBDefault|cat:"';"}]
        [{else}]
            [{oxscript add="var sD3SearchBoxDefault = '';"}]
        [{/if}]

    [{/strip}]
[{/if}]

[{if $blD3ShowIAS}]
    <div id="IAS_box" class="IAS_box">
        <div class="headline">
            <div class="closebtn" onClick="$('#IAS_box').css({'display' : 'none'});">X</div>
            [{oxmultilang ident="D3_EXTSEARCH_IAS_SEARCH"}]
        </div>
        <form action="[{ $oViewConf->getBaseDir() }]index.php" method="get" [{*onSubmit="d3_extsearch_popup.popup.load();"*}]>
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
[{/if}]

[{* D3 MOD START disabled - 2011-07-18 - KH: funktioniert im Azure nicht <!--
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
--> *}]

[{if $oViewConf->getActiveClassName() == 'search' && $oView->d3HasjQuerySlider()}]
    [{oxscript include="js/jquery-ui.min.js"}]
    [{oxscript include="js/d3_ext_search_slider.js"}]
[{/if}]