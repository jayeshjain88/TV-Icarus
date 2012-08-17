<link rel="stylesheet" href="{$base}static/scripts/jquery-ui.css">
<script src="{$base}static/scripts/jquery-min.js"></script>
<script src="{$base}static/scripts/jquery-ui-min.js"></script>
<script src="{$base}static/scripts/effects.js"></script>
<script>accordion();</script>

<div id="content">
  <h3> {$name} </h3>
  <table id="box">
    <tr>
      <th rowspan="11" class="cover"> <a href="{$link}"><img src="{$image}" alt="{$name}" id="cover"></a> </th>
      <th class="left"> <h4> <img src="{$base}static/images/flags/{$country}.gif" alt="({$country})" title="{$country}" class="ico"> 
        <a href="{$link}" target="_blank">{$name}</a> </h4> </th>
    </tr> <!--image/title-->
    <tr> <td> Status: {$status} </td> </tr>
    <tr> <td> Network: {$network} </td> </tr>
    <tr> <td> AirTime: {$airtime} </td> </tr>
    <tr> <td> Runtime: {$runtime} </td> </tr>
    <tr> <td> Timezone: {$timezone} </td> </tr>
    <tr> <td> Started: {$started} </td> </tr>
    <tr> <td> Ended: {$ended} </td> </tr>
    <tr> <td> Classification: {$class} </td> </tr>
    <tr> <td> Genres: {$genres} </td> </tr>
    <tr> <td> </td> </tr>
  </table> <!--#box-->

<div id="accordion">
{foreach from=$selist item=se}
  <h5> Season #{$se['no']} </h5>
  <div> <!--accordion-box-starts-->
  <table class="shows">
    <tr>
      <th> Season # </th>
      <th class="name"> Title </th>
      <th> Episode </th>
      <th> AirDate </th>
    </tr>
  {foreach from=$se->episode item=ep}
  <tr>
    <td> {$ep->epnum} </td>
    <td class="name"> <a href="{$ep->link}">{$ep->title}</a> </td>
    <td class="center"> {$se['no']} x {$ep->seasonnum} </td>
    <td class="center"> {$ep->airdate} </td>
  </tr>
  {/foreach}
  </table> <!--#shows-->
  </div> <!--accordion-box-ends-->
{/foreach}
</div> <!--#accordion-->

</div> <!--#content-->