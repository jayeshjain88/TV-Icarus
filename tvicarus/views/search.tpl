<div id="content">
  <h3> Search </h3>
  <table id="shows">
	  <tr>
      <th class="show"> Show Name </th> <th> Info </th>
      <th> Country </th> <th> Seasons </th> <th> Started </th> 
      <th> Ended </th> <th class="status"> Status </th>
    </tr>
  {foreach from=$shows item=show}
    <tr>
      <td class="show"> <a href="{$base}episode/{$show->showid}">{$show->name}</a> </td>
      <td class="center"> <a href="{$show->link}"><img src="{$base}/static/images/tvrage.png" alt="TVRage" /></a> </td>
      <td class="center"> <img src="{$base}static/images/flags/{$show->country}.gif" alt="({$show->country})"> {$show->country} </td>
      <td class="center"> {$show->seasons} </td>
      <td class="center"> {$show->started} </td> 
      <td class="center"> {$show->ended} </td> <td class="status"> {$show->status} </td>
    </tr>
  {/foreach}
  </table> <!--#shows-->
</div> <!--#content-->