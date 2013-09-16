

			<form name="login" method="POST" action="./">
				
{if isset($error)}
				
				<script language="JavaScript">
				self.location="../index.php?error={$error}";
				</script>
{/if}
{if isset($valid)}
				
				<script language="JavaScript">
				self.location="../index.php?valid={$valid}";
				</script>
				
{/if}
{if isset($image)}
				<div class="field"><label><img src="./img.php" id="L_image" onclick="reloadImage(this);"></label><span class="field"><input type="text" id="Limage" name="Limage" autocomplete="off"></span></div>
{/if}
				
				
			</form>
				
