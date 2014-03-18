[{oxscript include="js/widgets/oxloginbox.js" priority=10 }]
[{oxscript add="$( '#loginBoxOpener' ).oxLoginBox();"}]
[{assign var="bIsError" value=0 }]
[{capture name=loginErrors}]
    [{foreach from=$Errors.loginBoxErrors item=oEr key=key }]
        <p id="errorBadLogin" class="errorMsg">[{ $oEr->getOxMessage()}]</p>
        [{assign var="bIsError" value=1 }]
    [{/foreach}]
[{/capture}]
[{if !$oxcmp_user->oxuser__oxpassword->value}]
    [{oxscript include="js/widgets/oxmodalpopup.js" priority=10 }]
    [{oxscript add="$( '#forgotPasswordOpener' ).oxModalPopup({ target: '#forgotPassword'});"}]
    <div id="forgotPassword" class="popupBox corners FXgradGreyLight glowShadow">
        [{*<img src="[{$oViewConf->getImageUrl('x.png')}]" alt="" class="closePop">*}]
        [{include file="form/forgotpwd_email.tpl" idPrefix="Popup"}]
    </div>
    <a href="#" id="loginBoxOpener" title="[{ oxmultilang ident="LOGIN" }]">[{ oxmultilang ident="LOGIN" }]</a>
    <form id="login" name="login" action="[{ $oViewConf->getSslSelfLink() }]" method="post">
        <div id="loginBox" class="loginBox" [{if $bIsError}]style="display: block;"[{/if}]>
            [{ $oViewConf->getHiddenSid() }]
            [{ $oViewConf->getNavFormParams() }]
            <input type="hidden" name="fnc" value="login_noredirect">
            <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
            <input type="hidden" name="pgNr" value="[{$oView->getActPage()}]">
            <input type="hidden" name="CustomError" value="loginBoxErrors">
            [{if $oView->getProduct()}]
                [{assign var="product" value=$oView->getProduct() }]
                <input type="hidden" name="anid" value="[{ $product->oxarticles__oxnid->value }]">
            [{/if}]
            <div class="loginForm corners">
                <h4>[{ oxmultilang ident="LOGIN" }]</h4>
                <p>
                    [{oxscript include="js/widgets/oxinnerlabel.js" priority=10 }]
                    [{oxscript add="$( '#loginEmail' ).oxInnerLabel();"}]
                    <label for="loginEmail" class="innerLabel">[{ oxmultilang ident="EMAIL_ADDRESS" }]</label>
                    <input id="loginEmail" type="text" name="lgn_usr" value="" class="textbox">
                </p>
                <p>
                    [{oxscript include="js/widgets/oxinnerlabel.js" priority=10 }]
                    [{oxscript add="$( '#loginPasword' ).oxInnerLabel();"}]
                    <label for="loginPasword" class="innerLabel">[{ oxmultilang ident="PASSWORD" }]</label>
                    <input id="loginPasword" type="password" name="lgn_pwd" class="textbox passwordbox" value=""><strong><a id="forgotPasswordOpener" href="#" title="[{ oxmultilang ident="FORGOT_PASSWORD" }]">?</a></strong>
                </p>
                [{$smarty.capture.loginErrors}]
                <p class="checkFields clear">
                    <input type="checkbox" class="checkbox" value="1" name="lgn_cook" id="remember"><label for="remember">[{ oxmultilang ident="REMEMBER_ME" }]</label>
                </p>
                <p class="checkFields clear">
                  <input type="hidden" name="blnewssubscribed" value="0">
                  <input id="subscribeNewsletter" class="checkbox" type="checkbox" name="blnewssubscribed" value="1">                  
                  <label for="subscribeNewsletter">[{ oxmultilang ident="FORM_FIELDSET_USER_SUBSCRIBENEWSLETTER" }]</label>
                </p>
                <button type="submit" class="submitButton loginButton">[{ oxmultilang ident="TRO_OK" }]</button>                
            </div>
            [{if $oViewConf->getShowFbConnect()}]
                <div class="altLoginBox corners clear">
                    <span>[{ oxmultilang ident="WIDGET_LOGINBOX_WITH" }]</span>
                    <fb:login-button size="medium" autologoutlink="true" length="short"></fb:login-button>
                </div>
            [{/if}]
        </div>
    </form>
[{else}]
    
    </a>
    <a id="logoutLink" class="logoutLink" href="[{ $oViewConf->getLogoutLink() }]" title="[{ oxmultilang ident="LOGOUT" }]">[{ oxmultilang ident="LOGOUT" }]</a>
[{/if}]
