[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3_extsearch"}]
    [{*if $sSearchFieldName || ($oViewConf->getActiveClassName() == 'search' && $oView->d3HasjQuerySlider())}]
        [{oxscript include=$oViewConf->getModuleUrl('d3_extsearch', 'out/src/js/libs/jquery.min.js')}]
    [{/if*}]

    [{if $sSearchFieldName}]
        [{strip}]
            [{block name="d3_extsearch_js__quick"}]
                <div id="xajax_resp" class="xajax_resp_cl"></div>
                [{oxscript include=$oViewConf->getModuleUrl('d3_extsearch', 'out/src/js/d3_ext_search.js')}]

                [{assign var="sCharSet" value="charset"|oxmultilangassign}]
                [{assign var="sWaitMessage" value=$sD3QSWaitMessage|strip|escape:"htmlall":$sCharSet}]  [{* escaped because proplematicly HTML validation *}]
                [{oxscript add="var sD3ExtSearchWaitContent  = '"|cat:$sWaitMessage|cat:"';"}]
                [{oxscript add="var sD3ExtSearchAjaxResponse = '"|cat:$oViewConf->getModuleUrl('d3_extsearch')|cat:"public/d3_extsearch_response.php?shp="|cat:$oViewConf->getActiveShopId()|cat:"&';"}]
                [{if !$blD3EmptySearch}]
                    [{assign var="sSBDefault" value="D3_EXTSEARCH_FIELD_NOTICE"|oxmultilangassign}]
                    [{oxscript add="var sD3SearchBoxDefault = '"|cat:$sSBDefault|cat:"';"}]
                    [{else}]
                    [{oxscript add="var sD3SearchBoxDefault = '';"}]
                [{/if}]
            [{/block}]
        [{/strip}]
    [{/if}]

    [{if $blD3ShowIAS}]
        [{block name="d3_extsearch_js__quick"}]
            <div id="IAS_box" class="IAS_box">
                <div class="headline">
                    <div class="closebtn" onClick="$('#IAS_box').css({'display' : 'none'});">X</div>
                    <label for="IAS_input">[{oxmultilang ident="D3_EXTSEARCH_IAS_SEARCH"}]</label>
                </div>
                <form action="[{$oViewConf->getBaseDir()}]index.php" method="get" onSubmit="d3_extsearch_popup.popup.load();">
                    <div>
                        [{$oViewConf->getHiddenSid()}]
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
        [{/block}]
    [{/if}]

    [{if $oViewConf->getActiveClassName() == 'search' && $oView->d3HasjQuerySlider()}]
        [{oxscript include=$oViewConf->getModuleUrl('d3_extsearch', 'out/src/js/d3_ext_search_slider.js')}]
    [{/if}]

    [{if $blD3ShowSearchPopup}]
        <div id="d3extsearch_message" class="d3extsearch_popup">
            <strong style="text-align: center;">[{oxmultilang ident="D3_EXTSEARCH_SEARCHINPROGRESS"}]</strong>
        </div>

        <script type="text/javascript">
            var d3_extsearch_popup = {
                // Popups
                popup: {
                    load : function(){
                        var id = 'd3extsearch_message';
                        var pcl = 'd3extsearch_popup load on';
                        var mcl = 'on';
                        var _mk = document.getElementById('d3extsearch_mask');
                        var _el = document.getElementById(id);
                        if(_mk && _el) {
                            _mk.className = mcl;
                            _el.className = pcl;
                        }
                    }
                }
            };
        </script>

        <div id="d3extsearch_mask"></div>
    [{else}]
        <script type="text/javascript">
            var d3_extsearch_popup = {
                popup: {
                    load : function(){ }
                }
            };
        </script>
    [{/if}]

[{/d3modcfgcheck}]