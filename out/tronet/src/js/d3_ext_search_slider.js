var oD3SearchJQSlider = jQuery;

oD3SearchJQSlider(document).ready(function()
{
    oD3SearchJQSlider('input#d3extsearch_pricefieldmin,input#d3extsearch_pricefieldmax').hide();
    oD3SearchJQSlider('#d3extsearch_priceslider').slider({
        range: true,
        min: sD3ExtSearchWaitPriceLimitsMin,
        max: sD3ExtSearchWaitPriceLimitsMax,
        step: 100,
        values: [sD3ExtSearchWaitPriceSteps0,sD3ExtSearchWaitPriceSteps1],
        slide: function(e,ui) {
            oD3SearchJQSlider("#d3extsearch_priceinfomin").html(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
            oD3SearchJQSlider("#d3extsearch_priceinfomax").html(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
        },
        change: function(e,ui) {
            oD3SearchJQSlider("input#d3extsearch_pricefieldmin").val(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
            oD3SearchJQSlider("input#d3extsearch_pricefieldmax").val(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
            oD3SearchJQSlider("#d3extsearch_priceinfomin").html(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[0] / 100);
            oD3SearchJQSlider("#d3extsearch_priceinfomax").html(oD3SearchJQSlider('#d3extsearch_priceslider').slider("option", "values")[1] / 100);
            d3_extsearch_popup.popup.load();
            oD3SearchJQSlider("form#d3searchfilterform").submit();
        }
    });
})