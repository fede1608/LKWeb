

			<div>
				
{if isset($image)}
				<p></p>
{/if}
			</div>

			<form name="create" method="POST" action="./">
				<h1>&nbsp;</h1>
{if isset($error)}
				
				<script language="JavaScript">
				self.location="../register.php?error={$error}";
				</script>
{/if}
{if isset($image)}
				
{/if}
				
			</form>

