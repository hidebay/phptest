[{capture append="oxidBlock_pageBody"}]
    [{*}]<!--[{ WELLEN IM HINTERGRUND }]-->[{*}]
    <div id="welle1"></div>
    <div id="welle2"></div>
    <div id="welle3"></div>
    <div id="welle4"></div>

    <div id="page" class="[{if $sidebar}] sidebar[{$sidebar}][{/if}]">
        [{include file="layout/header.tpl"}]
        <div id="contentWrapper">            
            [{*}]<!--[{if $oView->getClassName() ne "start" && !$blHideBreadcrumb}]
               [{ include file="widget/breadcrumb.tpl"}]
            [{/if}]-->[{*}]
            [{if $sidebar}]
                <div id="sidebar">
                    [{include file="layout/sidebar.tpl"}]
                </div>
            [{/if}]            
            <div id="content">
              [{*}]<!--[{if ($oView->getClassName()=='start' || $oView->getClassName()=='alist') && $oView->getBanners()|@count > 0 }]-->[{*}]
			  [{if ($oView->getClassName()=='start' || $oView->getClassName()=='alist') }]
                <div class="oxSlider">
                    [{include file="widget/promoslider.tpl" }]
                </div>
              [{/if}]
              [{include file="message/errors.tpl"}]
              [{foreach from=$oxidBlock_content item="_block"}]
                  [{$_block}]
              [{/foreach}]
              [{if $oView->getClassName() != 'contact'}]
                <div id="start_toparticles">	
                  [{include file="widget/toparticlesslider.tpl" rsslink=$rsslinks.newestArticles rssId="rssNewestProducts"  }]
                </div>
              [{/if}]
              [{include file="layout/footer.tpl"}]
            </div>            
        </div>

        <div class="copyright">
                [{oxifcontent ident="oxstdfooter" object="oCont"}]
                    [{$oCont->oxcontents__oxcontent->value}]
                [{/oxifcontent}]
        </div>
        
    </div>
    [{include file="widget/facebook/init.tpl"}]
    [{oxifcontent ident="oxdeliveryinfo" object="oCont"}]
        <div id="incVatMessage">*: <span class="deliveryInfo">[{ oxmultilang ident="PLUS_SHIPPING" }]<a href="[{ $oCont->getLink() }]" rel="nofollow">[{ oxmultilang ident="PLUS_SHIPPING2" }]</a></span></div>
    [{/oxifcontent}]
[{/capture}]
[{include file="layout/base.tpl"}]
