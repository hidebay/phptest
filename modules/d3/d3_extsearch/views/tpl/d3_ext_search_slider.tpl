[{assign var="aPriceLimits" value=$oView->d3getPriceLimits()}]
[{assign var="aPriceSteps" value=$oView->d3getPriceSteps()}]
[{oxscript add="var sD3ExtSearchWaitPriceLimitsMin  = "|cat:$aPriceLimits.min|cat:";"}]
[{oxscript add="var sD3ExtSearchWaitPriceLimitsMax  = "|cat:$aPriceLimits.max|cat:";"}]
[{oxscript add="var sD3ExtSearchWaitPriceSteps0  = "|cat:$aPriceSteps.0|cat:";"}]
[{oxscript add="var sD3ExtSearchWaitPriceSteps1  = "|cat:$aPriceSteps.1|cat:";"}]