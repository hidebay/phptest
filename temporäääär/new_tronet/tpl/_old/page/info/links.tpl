[{capture append="oxidBlock_content"}]
    [{assign var="template_title" value="PAGE_INFO_LINKS_LINKS"|oxmultilangassign}]
    <div class="checkoutCollumns linklist" style="padding: 20px 20px 0 20px; box-shadow: none;">
      <h3>[{ oxmultilang ident="PAGE_INFO_LINKS_LINKS" }]</h3>
      <p class="smalltext">[{ oxmultilang ident="TRO_PAGE_INFO_LINKS_DESCRIPTION" }]</p>
    </div>
    [{foreach from=$oView->getLinksList() item=link name=linksList}]
      <div class="links">
        <h3>
            <span>[{ $link->oxlinks__oxinsert->value|date_format:"%d.%m.%Y" }] - </span> <a href="[{ $link->oxlinks__oxurl->value }]" >[{ $link->oxlinks__oxurl->value }]</a>
        </h3>
      </div>
    [{/foreach}]
    [{ insert name="oxid_tracker" title=$template_title }]
[{/capture}]

[{include file="layout/page.tpl" sidebar="Left"}]