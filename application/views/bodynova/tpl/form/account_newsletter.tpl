<form action="[{ $oViewConf->getSelfActionLink() }]" name="newsletter" method="post">
    <ul class="form inlineForm clear">
        <li>
            [{ $oViewConf->getHiddenSid() }]
            [{ $oViewConf->getNavFormParams() }]
            <input type="hidden" name="fnc" value="subscribe">
            <input type="hidden" name="cl" value="account_newsletter">
            <label for="status">[{ oxmultilang ident="NEWSLETTER_SUBSCRIPTION" suffix="COLON"}]</label>
            <select name="status" id="status">
            <option value="1"[{if $oView->isNewsletter() }] selected[{/if }] >[{ oxmultilang ident="YES" }]</option>
            <option value="0"[{if !$oView->isNewsletter() }] selected[{/if }] >[{ oxmultilang ident="NO" }]</option>
            </select>
            <button id="newsletterSettingsSave" type="submit" class="submitButton button" title="[{ oxmultilang ident="SAVE" }]" >[{ oxmultilang ident="SAVE" }]</button>
            [{if $oView->isNewsletter() ==2}]
            <span class="notice">[{ oxmultilang ident="MESSAGE_NEWSLETTER_SUBSCRIPTION" }]</span>
        </li>
    </ul>
</form>