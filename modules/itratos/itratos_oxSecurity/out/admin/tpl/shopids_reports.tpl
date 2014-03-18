[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
  <script>
      function selectAll(element){
          var FormName = 'list';
          var FieldName = 'delete[]';
          var CheckValue = true;

          if(element.checked == ''){
            CheckValue = false;
          }
          
          	if(!document.forms[FormName])
		return;
                var objCheckBoxes = document.forms[FormName].elements[FieldName];
                if(!objCheckBoxes)
                        return;
                var countCheckBoxes = objCheckBoxes.length;
                if(!countCheckBoxes)
                        objCheckBoxes.checked = CheckValue;
                else
                        // set the check value for all check boxes
                        for(var i = 0; i < countCheckBoxes; i++)
                                objCheckBoxes[i].checked = CheckValue;
      }
  </script>

  <style>
      .thead th {
          background-color: #ccc;
      }

  </style>
<div class="_wrap" style="font-size: 12px; padding: 10px;">
	<div class="icon32" id="icon-index"><br/></div>
	<h2>Itratos PHPIDS Intrusions</h2>

        [{if $geoinfo}]

  <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAuNglp8wW8XpDPtBfhMPL-xTg6LSs4z2KxbYU-UVa-KoO8IKqWhTFH2CiNEUn1ivM5YUghmvOyq18gQ" type="text/javascript"></script>
  <script type="text/javascript">
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng('[{$geoinfo.geoplugin_latitude}]', '[{$geoinfo.geoplugin_longitude}]'), 12);
      }
    }    
  </script>
        
        <table style="font-size: 11px; width: 100%;">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="font-weight: bolder;">City</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_city}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Region</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_region}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Area Code</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_areaCode}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Dma Code</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_dmaCode}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Country Code</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_countryCode}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Country Name</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_countryName}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Continent Code</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_continentCode}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Currency Code</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_currencyCode}]</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bolder;">Currency Symbol</td>
                            <td style="text-align: right;">[{$geoinfo.geoplugin_currencySymbol}]</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <div id="map" style="width: 600px; height: 500px; border: 1px solid black; "></div>
                    <br>
                </td>
            </tr>
        </table>
        <script>    load(); </script>
        [{/if}]
        <form name="list" method="post" action="[{ $oViewConf->getSelfLink() }]" id="posts-filter">

            <table cellspacing="0" border="1" class="widefat fixed" style="font-size: 11px; width: 100%;">
			<thead>
				<tr class="thead">
                                        <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" onchange="selectAll(this);"></th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">id</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Name</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Attack</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Site page</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Tags</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">IP</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Impact</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Date</th>

				</tr>
			</thead>

			<tfoot>
				<tr class="thead">
                                    <th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" onchange="selectAll(this);"></th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">id</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Name</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Attack</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Site page</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Tags</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">IP</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Impact</th>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">Date</th>

				</tr>
			</tfoot>

			<tbody class="list:intrusion intrusion-list" id="mscr_intrusions">

[{foreach from=$attacks item=a}]
<tr>
    <td><input type="checkbox" name="delete[]" value="[{$a.0}]"></td>
    <td>&nbsp;[{$a.0}]</td>
    <td>&nbsp;[{$a.1}]</td>
    <td style="max-width: 550px;overflow:hidden">&nbsp;[{$a.2}]</td>
    <td>&nbsp;[{$a.3}]</td>
    <td>&nbsp;[{$a.4}]</td>
    <td>&nbsp;<a href="[{ $oViewConf->getSelfLink() }]cl=shopids_reports&ip=[{$a.5}]">[{$a.5}]</a></td>
    <td>&nbsp;[{$a.7}]</td>
    <td>&nbsp;[{$a.9}]</td>
</tr>
[{/foreach}]
	

			</tbody>
		</table>

		<div class="tablenav">
                    <input type="submit" value="Delete Selected">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="shopids_reports">
<input type="hidden" name="fnc" value="delete">
<input type="hidden" name="actshop" value="[{$oViewConf->getActiveShopId()}]">
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="editval[oxshopids__oxid]" value="[{ $oxid }]">

                    <div style="width:700px; margin-top: 10px;">
				[{$paginator}]
			</div>
			<br class="clear"/>
		</div>
	</form>


</div>

[{include file="bottomnaviitem.tpl" }]
[{include file="bottomitem.tpl"}]