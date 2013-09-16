{include file="header4.tpl"}

				<h2>{$vm.forgot_pwd}</h2>
				<p>{$vm.forgot_pwd_text}</p>

		<div class="reg_form">
			<form name="create" method="POST" action="./{$session_id}" class="panel-body">
				

				<div class="field"><label>{$vm.account}</label><span class="field"><input class="form-control" type="text" id="Luser" name="Luser" value="{$vm.post_id}" autocomplete="off" maxlength="{$vm.account_length}" /></span></div>
				<div class="field"><label>{$vm.email}</label><span class="field"><input class="form-control" type="text" id="Lemail" name="Lemail" value="{$vm.post_email}" autocomplete="off"></span></div>
{if isset($image)}
				<div class="field"><label><img src="./img.php{$session_id}" id="L_image" onclick="reloadImage(this);"></label><span class="field"><input type="text" id="Limage" name="Limage" autocomplete="off"></span></div>
{/if}
				<input type="hidden" name="action" value="forgot_pwd">
				<hr>
				<input type="button" onClick="document.location='./{$session_id}'" class="btn bg-info" value="{$vm.return}" />
				<input type="submit" class="btn bg-success" value="{$vm.forgot_button}">
			</form>
		</div>
        
{include file="footer3.tpl"}