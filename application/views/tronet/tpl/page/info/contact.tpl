[{capture append="oxidBlock_content"}]
    [{if $oView->getContactSendStatus() }]
        [{assign var="_statusMessage" value="PAGE_INFO_CONTACT_THANKYOU1"|oxmultilangassign|cat:" "|cat:$oxcmp_shop->oxshops__oxname->value|cat:" "}]
        [{assign var="_statusMessageSuffix" value="PAGE_INFO_CONTACT_THANKYOU2"|oxmultilangassign}]
        [{include file="message/notice.tpl" statusMessage=$_statusMessage|cat:$_statusMessageSuffix}]
    [{/if }]
    <div class="checkoutCollumns">
      <h3>[{ $oxcmp_shop->oxshops__oxcompany->value }]</h3>
      <ul>
          <li>[{ $oxcmp_shop->oxshops__oxzip->value }]&nbsp;[{ $oxcmp_shop->oxshops__oxcity->value }]</li>
          <li>[{ $oxcmp_shop->oxshops__oxstreet->value }]</li>
          <li>[{ $oxcmp_shop->oxshops__oxcountry->value }]</li>
          [{ if $oxcmp_shop->oxshops__oxtelefon->value}]
              <li>[{ oxmultilang ident="PAGE_INFO_CONTACT_PHONE" }] [{ $oxcmp_shop->oxshops__oxtelefon->value }]</li>
          [{/if}]
          [{ if $oxcmp_shop->oxshops__oxtelefax->value}]
              <li>[{ oxmultilang ident="PAGE_INFO_CONTACT_FAX" }] [{ $oxcmp_shop->oxshops__oxtelefax->value }]</li>
          [{/if}]
          [{ if $oxcmp_shop->oxshops__oxinfoemail->value}]
              <li>[{ oxmultilang ident="PAGE_INFO_CONTACT_EMAIL" }] [{oxmailto address=$oxcmp_shop->oxshops__oxinfoemail->value encode="javascript"}]</li>
          [{/if}]
      </ul>
    </div>
    [{include file="form/contact.tpl"}]
    <div class="checkoutCollumns">
      <h3>[{oxmultilang ident="TRO_ANFAHRT"}]</h3>
      <iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.de/maps?f=q&amp;source=s_q&amp;hl=de&amp;geocode=&amp;q=Scheidtweilerstra%C3%9Fe+19,+K%C3%B6ln&amp;aq=t&amp;sll=51.151786,10.415039&amp;sspn=10.979835,23.796387&amp;ie=UTF8&amp;hq=&amp;hnear=Scheidtweilerstra%C3%9Fe+19,+Braunsfeld+50933+K%C3%B6ln,+Nordrhein-Westfalen&amp;ll=50.93841,6.904&amp;spn=0.001345,0.002905&amp;t=m&amp;z=14&amp;output=embed"></iframe>
      <br /><small><a href="http://maps.google.de/maps?f=q&amp;source=embed&amp;hl=de&amp;geocode=&amp;q=Scheidtweilerstra%C3%9Fe+19,+K%C3%B6ln&amp;aq=t&amp;sll=51.151786,10.415039&amp;sspn=10.979835,23.796387&amp;ie=UTF8&amp;hq=&amp;hnear=Scheidtweilerstra%C3%9Fe+19,+Braunsfeld+50933+K%C3%B6ln,+Nordrhein-Westfalen&amp;ll=50.93841,6.904&amp;spn=0.001345,0.002905&amp;t=m&amp;z=14" target="_blank">Größere Kartenansicht</a></small>
      [{ insert name="oxid_tracker" title=$template_title }]    
    </div>
[{/capture}]

[{include file="layout/page.tpl" sidebar="Left"}]
