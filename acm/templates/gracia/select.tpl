{include file="header3.tpl"}


				<h3>{$vm.select_item}</h3>
                <label>{$vm.select_desc}</label>
				<p>
{if isset($error)}
					<div class="error"><div class="error_container">{$error}</div></div>
{/if}
{if isset($valid)}
					<div class="valid"><div class="valid_container">{$valid}</div></div>
{/if}
					<ul>
{dynamic}{section name=i loop=$items}
						<li><a href="{$items[i].link}">{$items[i].name}</a></li>
{/section}{/dynamic}
						{php}
						if($_GET['action']=="acc_serv")
						{
						echo "<li><a href=\"./?action=chg_pwd_form\">Cambiar mi contrase&ntilde;a</a></li>";
						}
						{/php}
					</ul>
                    </br>
                    <input type="button" onClick="document.location='./index.php?action=acc_serv'" class="button" value="{$vm.return}" />
				</p>


{include file="footer3.tpl"}
