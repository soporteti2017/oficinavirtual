
           @if($ver == "clientes") 

              <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('usuarios.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CLIENTES</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONTRATOS</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">PLANES</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FICHAS</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">AUDITORIA</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">BUSQUEDA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

              </ul>

           @elseif($ver == "usuarios") 

              <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('usuarios.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">USUARIOS</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONSULTAR</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">RESTRICCION</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">EXCEPCIONES</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REPORTES</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

              </ul>

           @elseif($ver == "cuentas") 

             @include("intranet/cuenta_corriente/Menu/menu_cuentas") 

          @elseif(($ver == "saldos")||($ver == "general")) 
              
            @include("intranet/cuenta_corriente/Menu/menu_saldo_general") 

          @elseif($ver == "gestion")

            @include("intranet/gestion/Menu/menu_gestion_general")
          
          @elseif(($ver == "vercambiofecha") || ($ver == "verfunciones") || ($ver == "indexfiscal") || ($ver == "verconfboleta")
                    || ($ver == "vertipopago") || ($ver == "verreportesemitidos") || ($ver == "verjornadafiscalcurso") || ($ver == "verreporteelectronico")
                    || ($ver == "verreporteelectronicocierrez") || ($ver == "verreporteelectronicotransacciones") || ($ver == "veracumuladores") )

            @include("intranet/gestion/Fiscal/Menu/menu_fiscal")  

          @elseif(($ver == "ventasindex") || ($ver == "ventasboletas") || ($ver == "ventasfacturas") || ($ver == "ventasnc") ) 
               @include("intranet/cuenta_corriente/Ventas/Menu/menu_ventas")
          @elseif(($ver == "movimientosindex") || ($ver == "manejosindex") || ($ver == "cajaindex") || ($ver == "cambiofolioindex")  || ($ver == "cambiofoliofiscal"))
              @include("intranet/cuenta_corriente/Movimientos/Menu/menu_movimientos")
           @endif 

            
