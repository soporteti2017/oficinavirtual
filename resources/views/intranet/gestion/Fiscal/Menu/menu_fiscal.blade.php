@if($ver == "indexfiscal")
<ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Fecha.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CAMBIO FECHA</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Boleta.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. BOLETA</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.TipoPago.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. TIPO PAGO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReportesEmitidos.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REPORTES EMITIDOS</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.JornadaFiscal.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">JORNADA FISCAL</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REPORTES ELECT.</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Acumuladores.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">ACUMULADORES</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Funciones.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FUNCIONES</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/menu/gestion/ver">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

</ul>

@elseif($ver == "verfunciones")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Funciones.cortar') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CORTAR PAPEL</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Funciones.avanzar') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">AVANZAR PAPEL</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Funciones.docnofiscal') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">DOC NO FISCAL</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Funciones.dnfpago') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">DNF DE PAGO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

</ul>

@elseif($ver == "vercambiofecha")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Fecha.cambiar_fecha') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. FECHA/HORA</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Fecha.ver_fecha') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">FECHA/HORA</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

</ul>

@elseif($ver == "verconfboleta")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Boleta.configura_encabezado') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. ENCABEZADO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Boleta.ver_encabezado') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VER ENCABEZADO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Boleta.configura_pie') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. PIE PAG.</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.Boleta.ver_pie') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VER PIE PAG.</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "vertipopago")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.TipoPago.configura_tipo_pago') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CONF. T. PAGO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.TipoPago.ver_tipo_pago') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VER. T. PAGO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "verreportesemitidos")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.ReportesEmitidos.cierre_cajero') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CIERRE CAJERO</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReportesEmitidos.reporte_x') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REPORTE X</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReportesEmitidos.reporte_z') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REPORTE Z</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "verjornadafiscalcurso")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Acumuladores.mostrarfiscalcurso') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">EN CURSO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "verreporteelectronico")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Cierrez.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">CIERRE Z</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Transacciones.index') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">TRANSACCIONES</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "verreporteelectronicocierrez")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_fecha') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">POR FECHA</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_rango') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">POR RANGO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/ReporteElectronico/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "verreporteelectronicotransacciones")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_fecha') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">POR FECHA</button>
                  </a> 
                </li>
                <li>
                  <a href="{{ route('gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_rango') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">POR RANGO</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/ReporteElectronico/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@elseif($ver == "veracumuladores")

  <ul class="nav nav-stacked nav-collapse">
                <li>
                  <a href="{{ route('gestion.Fiscal.Acumuladores.mostraracumuladores') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VER</button>
                  </a> 
                </li>
                <li>
                  <a href="\\192.168.1.203:8000/intranet/gestion/Fiscal/index">
                    <button type="button" class="btn btn-primary btn-lg btn-block">VOLVER</button>
                  </a> 
                </li>

  </ul>

@endif