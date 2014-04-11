[{if $oLogSet->getValue('blLog_useExtendedLogging')}]
    [{assign var="oLog" value=$oView->getLog()}]
    [{foreach from=$oLog->getAllLogTypes() key="sName" item="iStatus"}]
        <input type="hidden" name="logtypes[[{$iStatus}]]" value="0">
        <input type="checkbox" value="1" name="logtypes[[{$iStatus}]]" id="[{if is_object($oModule)}][{$oModule->getId()}][{/if}]_[{$sName}]_[{$iStatus}]" [{if $oView->getLogStatus($sName, $oModule)}] checked[{/if}]><label for="[{if is_object($oModule)}][{$oModule->getId()}][{/if}]_[{$sName}]_[{$iStatus}]">[{$oView->getLogTypeTranslation($sName)}]</label> [{oxinputhelp ident=""}]<br>
    [{/foreach}]
[{else}]
    <select id="loglevelelement" name="loglevel" class="edittext">
        <option value="userdefined">[{oxmultilang ident="D3_CFG_LOG_TYPE_USERDEFINED"}]</option>
        <option value="none" [{if $oView->getLogStatus('none', $oModule)}] selected[{/if}]>[{oxmultilang ident="D3_CFG_LOG_TYPE_NONE"}]</option>
        <option value="error" [{if $oView->getLogStatus('error', $oModule)}] selected[{/if}]>[{oxmultilang ident="D3_CFG_LOG_TYPE_ERROR"}]</option>
        <option value="warning" [{if $oView->getLogStatus('warning', $oModule)}] selected[{/if}]>[{oxmultilang ident="D3_CFG_LOG_TYPE_WARNING"}]</option>
        <option value="notice" [{if $oView->getLogStatus('notice', $oModule)}] selected[{/if}]>[{oxmultilang ident="D3_CFG_LOG_TYPE_NOTICE"}]</option>
        <option value="info" [{if $oView->getLogStatus('info', $oModule)}] selected[{/if}]>[{oxmultilang ident="D3_CFG_LOG_TYPE_INFO"}]</option>
    </select>
[{/if}]
[{oxinputhelp ident="D3_LOGTYPE_DESC"}]