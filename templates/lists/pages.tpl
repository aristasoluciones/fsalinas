{if $registros.result|count > 0}
<div class="fLeft">
	{$info}
</div>
{/if}

{if $search == 1}
	{assign var="function" value="Search"}
{else}
	{assign var="function" value="LoadPage"}
{/if}


{if count($pages.numbers)}
<div class="pagination pagination-mini fRight">
    <ul>
    	{if $pages.first}
            <li><a href="javascript:;" onclick="{$function}({$pages.first})"> &laquo; </a></li>
        {/if}
        {if $pages.prev}
            <li><a href="javascript:;" onclick="{$function}({$pages.prev})"> &lt; </a></li>
        {/if}
        
        {foreach from=$pages.numbers item=page key=key}
            {if $pages.current == $key}
                <li class="active"><a href="#">{$key}</a></li>
            {else}
                <li><a href="javascript:;" onclick="{$function}({$key-1})">{$key}</a></li>
            {/if}
        {/foreach}
        
        {if $pages.next}
        	<li><a href="javascript:;" onclick="{$function}({$pages.next})"> &gt; </a></li>
        {/if}
        {if $pages.last}
        	<li><a href="javascript:;" onclick="{$function}({$pages.last})"> &raquo; </a></li>
        {/if}
    </ul>
</div>
<input type="hidden" name="page" id="page" value="{$pages.current-1}" />
{/if}
 
<div class="clearB"></div>