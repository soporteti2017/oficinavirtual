@if($ver == "movimientosindex")
    <ul class="nav nav-stacked nav-collapse">
                    <li>
                    <a href="{{ route('cuenta_corriente.Ventas.Boletas.index') }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">PROC. MENSUAL</button>
                    </a> 
                    </li>
                    <li>
                    <a href="{{ route('cuenta_corriente.Movimientos.Menu.Caja.index') }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">CAJA</button>
                    </a> 
                    </li>
                    <li>
                    <a href="{{ route('cuenta_corriente.Movimientos.Carga.index') }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">CARGA MANUAL</button>
                    </a> 
                    </li>
                    <li>
                    <a href="{{ route('cuenta_corriente.Movimientos.Menu.Manejos.index') }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">MANEJOS</button>
                    </a> 
                    </li>
                    <li>
                    <a href="\\192.168.1.203:8000/menu/cuentas/ver">
                        <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                    </a> 
                    </li>

    </ul>

@elseif($ver == "manejosindex")

    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Movimientos.Manejos.Cambia_folio.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CAMBIA FOLIO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.Movimientos.Manejos.Cierre_cajero.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CIERRE CAJA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Movimientos/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>

@elseif($ver == "cajaindex")

    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Movimientos.Cajero.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CAJERO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Movimientos/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>

@elseif(($ver == "cambiofolioindex") || ($ver == "cambiofoliofiscal"))

    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_fiscal') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FOLIO FISCAL</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_cobranza') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FOLIO COBRANZA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Movimientos/Manejos/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>

@endif