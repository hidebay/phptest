<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
    <title>[OXID Administrator]</title>
</head>

<!-- frames -->
[{if $oView->hasListItems()}]
    <frameset  rows="[{$oView->d3getListItemFrameRelation()}]" border="0" onload="top.loadEditFrame('[{$oViewConf->getSelfLink()|oxaddparams:$editurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]');">
        <frame src="[{$oViewConf->getSelfLink()|oxaddparams:$listurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]" name="list" id="list" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
        <frame src="" name="edit" id="edit" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
    </frameset>
[{else}]
    <frameset  rows="10%,*" border="0" onload="top.loadEditFrame('[{$oViewConf->getSelfLink()|oxaddparams:$editurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]');">
        <frame src="[{$oViewConf->getSelfLink()|oxaddparams:$listurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]" name="list" id="list" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
        <frame src="" name="edit" id="edit" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
    </frameset>
[{/if}]

</html>