<?php

include_once("session.php");
if(!isacmlogged()){
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
    die();
}
?>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Donación por MercadoPago</h4>
    </div>
    <div class="modal-body" style="padding-bottom:0">
     	
        <div class="col-sm-12">
                  <section class="panel">
                    <header class="panel-heading">
                      <span class="label bg-danger pull-right">Descuento activo: 20%</span>
                      <b>Paquetes de donación con bonus</b>
                    </header>
                    <table class="table table-striped m-b-none text-sm"  style="vertical-align:middle;">
                      <thead>
                        <tr>
                          <th>Linekkit Coins (LC)</th>
                          <th>Valor</th>                    
                          <th>LC Extras</th>
                          <th width="120"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <td style="padding-top:10px">15 LC</td>
                          <td style="padding-top:10px">$15</td>
                          <td class="text-danger" style="padding-top:10px">
                            <i class="icon-level-up"></i>+0
                          </td>
                          <td>
                          <form id="mp15" target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post" style="margin-bottom:0"> <!--<input class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0" type="submit" value="Donar">--><a  href="javascript:void()" onclick="document.getElementById('mp15').submit();" class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0"><i class="icon-gift pull-left"></i><b>Donar</b></a> <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-15:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> <input type="hidden" name="price" value="15.0"> <input type="hidden" name="url_process" value="http://linekkit.com/index.php"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234"> </form>
                            
                          
                          </td>
                        </tr>
                        <tr>                    
                          <td style="padding-top:10px">27 LC</td>
                          <td style="padding-top:10px">$25</td>
                          <td class="text-warning" style="padding-top:10px">
                            <i class="icon-level-up"></i>+2
                          </td>
                           <td>
                           <form id="mp27" target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post" style="margin-bottom:0">  <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-27:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> <input type="hidden" name="price" value="25.0"> <input type="hidden" name="url_process" value="http://minekkit.no-ip.org/recompensas.php"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234"> </form>
                          <a  href="javascript:void()" onclick="document.getElementById('mp27').submit();" class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0"><i class="icon-gift pull-left"></i><b>Donar</b></a>
                          </td>
                        </tr>
                        <tr>                    
                          <td style="padding-top:10px">55 LC</td>
                          <td style="padding-top:10px">$50</td>
                          <td class="text-warning" style="padding-top:10px">
                            <i class="icon-level-up"></i>+5
                          </td>
                           <td>
                           <form id="mp55" target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post" style="margin-bottom:0"> <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-55:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> <input type="hidden" name="price" value="50.0"> <input type="hidden" name="url_process" value="http://minekkit.no-ip.org/recompensas.php"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234"> </form>

                          <a  href="javascript:void()" onclick="document.getElementById('mp55').submit();" class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0"><i class="icon-gift pull-left"></i><b>Donar</b></a>
                          </td>
                        </tr>
                        <tr>                    
                          <td style="padding-top:10px">120 LC</td>
                          <td style="padding-top:10px">$100</td>
                          <td class="text-success" style="padding-top:10px">
                            <i class="icon-level-up"></i>+20
                          </td>
                           <td>
                           <form id="mp120" target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post" style="margin-bottom:0;">  <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-120:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> <input type="hidden" name="price" value="100.0"> <input type="hidden" name="url_process" value="http://minekkit.no-ip.org/recompensas.php"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234"> </form>

                          <a  href="javascript:void()" onclick="document.getElementById('mp120').submit();" class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0"><i class="icon-gift pull-left"></i><b>Donar</b></a>
                          </td>
                        </tr>
                        <tr>                    
                          <td style="padding-top:10px">250 LC</td>
                          <td style="padding-top:10px">$200</td>
                          <td class="text-success" style="padding-top:10px">
                            <i class="icon-level-up"></i>+50
                          </td>
                           <td>
                           <form id="mp250" target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post" style="margin-bottom:0">  <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-250:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> <input type="hidden" name="price" value="200.0"> <input type="hidden" name="url_process" value="http://minekkit.no-ip.org/recompensas.php"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234"> </form>

                          <a  href="javascript:void()" onclick="document.getElementById('mp250').submit();" class="btn btn-warning btn-block m-b-sm letras-negras" style="font-size:9px; margin-bottom:0"><i class="icon-gift pull-left"></i><b>Donar</b></a>                          </td>
                        </tr>
                      </tbody>
                    </table>                    
                  </section>
                  
                  <div class="row"></div>
                  <form  target="MercadoPago" action="https://www.mercadopago.com/mla/buybutton" method="post">
                  <div class="input-group m-b">
                      <span class="input-group-addon">Donación libre: $</span>
                         <input type="hidden" name="acc_id" value="528004574"> <input type="hidden" name="url_cancel" value="http://linekkit.com/donar.php"> <input type="hidden" name="item_id" value="1"> <input type="hidden" name="name" value="LinekkitCoins-Libre:<?php echo $userdata['login']; ?>"> <input type="hidden" name="currency" value="ARG"> 
                      <input type="text" class="form-control" name="price" value="10.0">                       
                      <span class="input-group-btn">
                            <button class="btn btn-white" type="submit">Donar</button>
                          </span>
                          <input type="hidden" name="url_process" value="http://linekkit.com/"> <input type="hidden" name="url_succesfull" value="http://linekkit.com/index.php?valid=donar"> <input type="hidden" name="shipping_cost" value=""> <input type="hidden" name="enc" value="qvsQojJJwjeOQYGtEWTVQFLEPCU%3D"> <input type="hidden" name="ship_cost_mode" value=""> <input type="hidden" name="op_retira" value=""> <input type="hidden" name="extra_part" value="1234">  </center>

                  </div></form>
                  <div style="text-align:center">
                  Donación libre: $1 = 1 LC. No incluye bonus.
                  </div>
                </div>
   
   				<section class="panel-body letras-negras">
					<h2 style="text-align:center; font-family:Alegreya SC; margin-top:0">
					Gracias por tu ayuda!
					</h2>                         
               </section>
   
    </div>
    <div class="modal-footer" style="margin-top:0">
      <a href="#" class="btn btn-white" data-dismiss="modal">Volver</a>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->