
				
				
{if isset($error)}
					
					<script language="JavaScript">
				self.location="../index.php?error={$error}";
				</script>
{/if}{if isset($valid)}
					
					<script language="JavaScript">
				self.location="../index.php?valid={$valid}";
				</script>
{/if}
					<ul class="menu">
{dynamic}{section name=i loop=$modules}
						
{/section}{/dynamic}
					</ul>
				</p>
				<script language="JavaScript">
				self.location="../index.php";
				</script>
