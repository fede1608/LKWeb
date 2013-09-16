{include file="header3.tpl"}


				<h3>{$vm.chg_pwd}</h3>
				<p>{$vm.chg_pwd_text}</p>



			<form name="create" method="POST" action="./{$session_id}" class="panel-body">
				
				
<!-- //{if isset($error)}
				<div class="error"><div class="error_container">{$error}</div></div>
{/if}-->
				<div class="field"><label>{$vm.passwordold}</label><span class="field"><input class="form-control" type="password" id="Lpwdold" name="Lpwdold" autocomplete="off" maxlength="{$vm.password_length}" /></span></div>
				<div class="field"><label>{$vm.password}</label><span class="field"><input class="form-control" type="password" id="Lpwd" name="Lpwd" autocomplete="off" maxlength="{$vm.password_length}" /></span></div>
				<div class="field"><label>{$vm.password2}</label><span class="field"><input class="form-control" type="password" id="Lpwd2" name="Lpwd2" autocomplete="off" maxlength="{$vm.password_length}"></span></div>
				<input type="hidden" name="action" value="chg_pwd_form">
				<hr>
				<input type="button" onClick="document.location='./index.php?action=acc_serv'" class="btn bg-info" value="{$vm.return}" />
				<input type="submit" class="btn bg-success" value="{$vm.chg_button}">
			</form>

        
{include file="footer3.tpl"}