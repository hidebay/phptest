<script type="text/javascript">
    $(window).bind("load",function()
    {
        [{assign var="aPriceLimits" value=$oView->d3getPriceLimits()}]
        [{assign var="aPriceSteps" value=$oView->d3getPriceSteps()}]

        $('input#d3extsearch_pricefieldmin,input#d3extsearch_pricefieldmax').hide();
        $('#d3extsearch_priceslider').slider({
            range: true,
            min: [{$aPriceLimits.min}],
            max: [{$aPriceLimits.max}],
            step: 100,
            values: [[{$aPriceSteps.0}],[{$aPriceSteps.1}]],
            slide: function(e,ui) {
                $("#d3extsearch_priceinfomin").html($('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
                $("#d3extsearch_priceinfomax").html($('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
            },
            change: function(e,ui) {
                $("input#d3extsearch_pricefieldmin").val($('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
                $("input#d3extsearch_pricefieldmax").val($('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
                $("#d3extsearch_priceinfomin").html($('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
                $("#d3extsearch_priceinfomax").html($('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
                [{*d3_extsearch_popup.popup.load();*}]
                $("form#d3searchfilterform").submit();
            }
        });
    })
</script>