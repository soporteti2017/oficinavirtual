@if($ver == "ventasindex")
<ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.Boletas.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">BOLETAS</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.Facturas.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FACTURAS</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.NC.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">N. CREDITO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.saldo') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CORTE ENERGIA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/menu/cuentas/ver">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

</ul>

@elseif($ver == "ventasboletas")
    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.Boletas.buscar_cliente') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">INGRESAR</button>
                  </a> 
                </li>
                <li>
                  <a href="">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONSULTAR</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Ventas/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>
@elseif($ver == "ventasfacturas")
    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.Boletas.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">INGRESAR</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.Facturas.nomina') }}" target="_blank"> 
                    <button type="button" class="btn btn-primary btn-lg btn-block">NOMINA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Ventas/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>
@elseif($ver == "ventasnc")
    <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('cuenta_corriente.Ventas.NC.crear') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">INGRESAR</button>
                  </a> 
                </li>
                <li>
                  <a href=" {{ route('cuenta_corriente.Ventas.NC.vernc') }} ">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VER</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/cuenta_corriente/Ventas/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

    </ul>
@endif