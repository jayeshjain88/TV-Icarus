<div id="content">
  <h3> TV News </h3>
  <div id="garight">
    <!-- Your own ad placement in here if desired. -->
  </div> <!--#garight-->
  {foreach from=$news item=article}
  <article>
    <section>
      <h4> <a href="{$article->link}" target="_blank">{$article->title}</a> </h4>
      <p> {$article->description} </p>
      <small> {$article->pubDate} </small>
    </section>
  </article>
  {/foreach}
</div> <!--#content-->