<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('intranet.template.main');
// });

Route::group(['prefix' => 'usuarios'], function(){

	Route::get('view/{id}', [
		'uses'	=> 'UsuarioControlador@view',
		'as'	=> 'usuarios'
		]);

});

Route::group(['prefix' => 'intranet'], function(){
	Route::resource('usuarios', 'UsuarioControlador');
	Route::get('usuarios/{id}/destroy', [
		'uses' 	=> 'UsuarioControlador@destroy',
		'as'	=> 'usuarios.destroy'
		]);

	Route::resource('servicios', 'ServicioControlador');
	Route::get('servicios/{id}/destroy', [
		'uses'	=> 'ServicioControlador@destroy',
		'as'	=> 'servicios.destroy'
		]);
	Route::resource('tipos_planes', 'TiposPlanesControlador');
	Route::get('tipos_planes/{id}/destroy', [
		'uses'	=> 'TiposPlanesControlador@destroy',
		'as'	=> 'tipos_planes.destroy'
		]);

	Route::resource('planes', 'PlanesControlador');
	Route::get('planes/{id}/destroy', [
		'uses'	=> 'PlanesControlador@destroy',
		'as'	=> 'planes.destroy'
		]);

	Route::resource('estados_conexiones', 'EstadoConexionControlador');
	Route::get('estados_conexiones/{id}/destroy', [
		'uses'	=> 'EstadoConexionControlador@destroy',
		'as'	=> 'estados_conexiones.destroy'
		]);
	Route::resource('clientes', 'ClientesControlador');
	Route::get('clientes/{id}/destroy',
	['uses' => 'ClientesControlador@destroy',
	'as' => 'clientes.destroy']
	);
	Route::resource('formas_pagos', 'FormaPagoControlador');

	Route::resource('tipos_pagos', 'TipoPagoControlador');
	Route::get('tipos_pagos/{id}/destroy',
	['uses' => 'TipoPagoControlador@destroy',
	'as' => 'tipos_pagos.destroy']
	);
	Route::resource('movimientos_ctacte', 'MovimientoctacteControlador');

	Route::get('cuenta_corriente/saldo', [
		'uses'	=> 'CuentaCorrienteControlador@index',
		'as'	=> 'cuenta_corriente.saldo'
		]);
	

	
	
	Route::get('cuenta_corriente/Ventas/NC/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenunc',
		'as'	=> 'cuenta_corriente.Ventas.NC.index'
		]);

	Route::get('cuenta_corriente/Ventas/Facturas/nomina', [
		'uses'	=> 'CuentaCorrienteControlador@ver_nomina_factura',
		'as'	=> 'cuenta_corriente.Ventas.Facturas.nomina'
		]);

	Route::get('cuenta_corriente/general', [
		'uses'	=> 'CuentaCorrienteControlador@general',
		'as'	=> 'cuenta_corriente.general'
		]);

	Route::post('cuenta_corriente/consulta', [
		'uses'	=> 'CuentaCorrienteControlador@consulta',
		'as'	=> 'cuenta_corriente.consulta'
		]);
	Route::get('cuenta_corriente/vercontrato', [
		'uses'	=> 'CuentaCorrienteControlador@general',
		'as'	=> 'cuenta_corriente.vercontrato'
		]);
	Route::put('clientes/contratopdf', [
		'uses'	=> 'ClientesControlador@contratopdf',
		'as'	=> 'clientes.contratopdf'
		]);

	Route::post('cuenta_corriente/verdetalles', [
		'uses'	=> 'CuentaCorrienteControlador@verdetalles',
		'as'	=> 'cuenta_corriente.verdetalles'
		]);

	Route::get('usuarios/solicitudes/{id}/versolicitudes',
	['uses' => 'UsuarioControlador@versolicitudes',
	'as' => 'usuarios.solicitudes.versolicitudes']
	);

	Route::get('servicios/OT/{id}/versolicitudes',
	['uses' => 'ServicioControlador@versolicitudes',
	'as' => 'servicios.OT.versolicitudes']
	);

	Route::get('cuenta_corriente/VerPagos/{id}/verpagos',
	['uses' => 'CuentaCorrienteControlador@ver_cargos_pagos',
	'as' => 'cuenta_corriente.VerPagos.verpagos']
	);
	Route::post('cuenta_corriente/VerCargo/visualiza_230', [
		'uses'	=> 'CuentaCorrienteControlador@ver_cargos_pagos',
		'as'	=> 'cuenta_corriente.VerCargo.visualiza_230'
		]);
	Route::post('cuenta_corriente/VerCargo/visualiza_200', [
		'uses'	=> 'CuentaCorrienteControlador@ver_cargos_pagos',
		'as'	=> 'cuenta_corriente.VerCargo.visualiza_200'
		]);	

	Route::get('cuenta_corriente/busqueda', [
		'uses'	=> 'CuentaCorrienteControlador@verindexbusqueda',
		'as'	=> 'cuenta_corriente.busqueda'
		]);

	Route::get('gestion/Fiscal/index', [
		'uses'	=> 'GestionControlador@index',
		'as'	=> 'gestion.Fiscal.index'
		]);
	
	Route::get('gestion/Fiscal/Fecha/index', [
		'uses'	=> 'GestionControlador@vercambiofecha',
		'as'	=> 'gestion.Fiscal.Fecha.index'
		]);

	Route::get('gestion/Fiscal/Funciones/index', [
		'uses'	=> 'GestionControlador@verfuncionesimpresora',
		'as'	=> 'gestion.Fiscal.Funciones.index'
		]);
	Route::get('gestion/Fiscal/Boleta/index', [
		'uses'	=> 'GestionControlador@verconfboleta',
		'as'	=> 'gestion.Fiscal.Boleta.index'
		]);
	Route::get('gestion/Fiscal/TipoPago/index', [
		'uses'	=> 'GestionControlador@vertipopago',
		'as'	=> 'gestion.Fiscal.TipoPago.index'
		]);
	Route::get('gestion/Fiscal/ReportesEmitidos/index', [
		'uses'	=> 'GestionControlador@verreportesemitidos',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.index'
		]);
	Route::get('gestion/Fiscal/JornadaFiscal/index', [
		'uses'	=> 'GestionControlador@verjornadafiscalcurso',
		'as'	=> 'gestion.Fiscal.JornadaFiscal.index'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/index', [
		'uses'	=> 'GestionControlador@verreporteelectronico',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.index'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/Cierrez/index', [
		'uses'	=> 'GestionControlador@verreporteelectronicocierrez',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Cierrez.index'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/Transacciones/index', [
		'uses'	=> 'GestionControlador@verreporteelectronicotransacciones',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Transacciones.index'
		]);
	Route::get('gestion/Fiscal/Acumuladores/index', [
		'uses'	=> 'GestionControlador@veracumuladores',
		'as'	=> 'gestion.Fiscal.Acumuladores.index'
		]);
	Route::get('gestion/Fiscal/Funciones/avanzar', [
		'uses'	=> 'GestionControlador@avanzarfiscal',
		'as'	=> 'gestion.Fiscal.Funciones.avanzar'
		]);
	Route::post('gestion/Fiscal/Funciones/generaavance', [
		'uses'	=> 'GestionControlador@generaavance',
		'as'	=> 'gestion.Fiscal.Funciones.generaavance'
		]);
	Route::get('gestion/Fiscal/Funciones/cortar', [
		'uses'	=> 'GestionControlador@cortarfiscal',
		'as'	=> 'gestion.Fiscal.Funciones.cortar'
		]);
	Route::post('gestion/Fiscal/Funciones/generacorte', [
		'uses'	=> 'GestionControlador@generacorte',
		'as'	=> 'gestion.Fiscal.Funciones.generacorte'
		]);
	Route::get('gestion/Fiscal/Funciones/docnofiscal', [
		'uses'	=> 'GestionControlador@docnofiscal',
		'as'	=> 'gestion.Fiscal.Funciones.docnofiscal'
		]);
	Route::post('gestion/Fiscal/Funciones/generadocnofiscal', [
		'uses'	=> 'GestionControlador@generadocnofiscal',
		'as'	=> 'gestion.Fiscal.Funciones.generadocnofiscal'
		]);
	Route::get('gestion/Fiscal/Funciones/dnfpago', [
		'uses'	=> 'GestionControlador@dnfpago',
		'as'	=> 'gestion.Fiscal.Funciones.dnfpago'
		]);
	Route::post('gestion/Fiscal/Funciones/generardnfpago', [
		'uses'	=> 'GestionControlador@generardnfpago',
		'as'	=> 'gestion.Fiscal.Funciones.generardnfpago'
		]);
	Route::get('gestion/Fiscal/Acumuladores/mostraracumuladores', [
		'uses'	=> 'GestionControlador@mostraracumuladores',
		'as'	=> 'gestion.Fiscal.Acumuladores.mostraracumuladores'
		]);
	Route::post('gestion/Fiscal/Acumuladores/generaacumuladores', [
		'uses'	=> 'GestionControlador@generaacumuladores',
		'as'	=> 'gestion.Fiscal.Acumuladores.generaacumuladores'
		]);
	Route::get('gestion/Fiscal/Acumuladores/mostrarfiscalcurso', [
		'uses'	=> 'GestionControlador@mostrarfiscalcurso',
		'as'	=> 'gestion.Fiscal.Acumuladores.mostrarfiscalcurso'
		]);
	Route::post('gestion/Fiscal/Acumuladores/generarfiscalcurso', [
		'uses'	=> 'GestionControlador@generarfiscalcurso',
		'as'	=> 'gestion.Fiscal.Acumuladores.generarfiscalcurso'
		]);
	Route::get('gestion/Fiscal/Fecha/ver_fecha', [
		'uses'	=> 'GestionControlador@mostrarfecha',
		'as'	=> 'gestion.Fiscal.Fecha.ver_fecha'
		]);
	Route::post('gestion/Fiscal/Fecha/solicita_fecha', [
		'uses'	=> 'GestionControlador@solicita_fecha',
		'as'	=> 'gestion.Fiscal.Fecha.solicita_fecha'
		]);
	Route::get('gestion/Fiscal/Fecha/cambiar_fecha', [
		'uses'	=> 'GestionControlador@cambiar_fecha',
		'as'	=> 'gestion.Fiscal.Fecha.cambiar_fecha'
		]);
	Route::post('gestion/Fiscal/Fecha/solicita_cambio_fecha', [
		'uses'	=> 'GestionControlador@solicita_cambio_fecha',
		'as'	=> 'gestion.Fiscal.Fecha.solicita_cambio_fecha'
		]);
	Route::get('gestion/Fiscal/Boleta/ver_encabezado', [
		'uses'	=> 'GestionControlador@ver_encabezado',
		'as'	=> 'gestion.Fiscal.Boleta.ver_encabezado'
		]);
	Route::post('gestion/Fiscal/Boleta/solicita_encabezado', [
		'uses'	=> 'GestionControlador@solicita_encabezado',
		'as'	=> 'gestion.Fiscal.Boleta.solicita_encabezado'
		]);
	Route::get('gestion/Fiscal/Boleta/ver_pie', [
		'uses'	=> 'GestionControlador@ver_pie',
		'as'	=> 'gestion.Fiscal.Boleta.ver_pie'
		]);
	Route::post('gestion/Fiscal/Boleta/solicita_pie', [
		'uses'	=> 'GestionControlador@solicita_pie',
		'as'	=> 'gestion.Fiscal.Boleta.solicita_pie'
		]);
	Route::get('gestion/Fiscal/Boleta/configura_encabezado', [
		'uses'	=> 'GestionControlador@configura_encabezado',
		'as'	=> 'gestion.Fiscal.Boleta.configura_encabezado'
		]);
	Route::post('gestion/Fiscal/Boleta/solicita_conf_encabezado', [
		'uses'	=> 'GestionControlador@solicita_conf_encabezado',
		'as'	=> 'gestion.Fiscal.Boleta.solicita_conf_encabezado'
		]);
	Route::get('gestion/Fiscal/Boleta/configura_pie', [
		'uses'	=> 'GestionControlador@configura_pie',
		'as'	=> 'gestion.Fiscal.Boleta.configura_pie'
		]);
	Route::post('gestion/Fiscal/Boleta/solicita_conf_pie', [
		'uses'	=> 'GestionControlador@solicita_conf_pie',
		'as'	=> 'gestion.Fiscal.Boleta.solicita_conf_pie'
		]);
	Route::get('gestion/Fiscal/TipoPago/ver_tipo_pago', [
		'uses'	=> 'GestionControlador@ver_tipo_pago',
		'as'	=> 'gestion.Fiscal.TipoPago.ver_tipo_pago'
		]);
	Route::post('gestion/Fiscal/TipoPago/solicita_tipo_pago', [
		'uses'	=> 'GestionControlador@solicita_tipo_pago',
		'as'	=> 'gestion.Fiscal.TipoPago.solicita_tipo_pago'
		]);
	Route::get('gestion/Fiscal/TipoPago/configura_tipo_pago', [
		'uses'	=> 'GestionControlador@configura_tipo_pago',
		'as'	=> 'gestion.Fiscal.TipoPago.configura_tipo_pago'
		]);
	Route::post('gestion/Fiscal/TipoPago/solicita_conf_tipo_pago', [
		'uses'	=> 'GestionControlador@solicita_conf_tipo_pago',
		'as'	=> 'gestion.Fiscal.TipoPago.solicita_conf_tipo_pago'
		]);
	Route::get('gestion/Fiscal/ReportesEmitidos/cierre_cajero', [
		'uses'	=> 'GestionControlador@cierre_cajero',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.cierre_cajero'
		]);
	Route::post('gestion/Fiscal/ReportesEmitidos/solicita_cierre_cajero', [
		'uses'	=> 'GestionControlador@solicita_cierre_cajero',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.solicita_cierre_cajero'
		]);
	Route::get('gestion/Fiscal/ReportesEmitidos/reporte_x', [
		'uses'	=> 'GestionControlador@reporte_x',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.reporte_x'
		]);	
	Route::post('gestion/Fiscal/ReportesEmitidos/solicita_reporte_x', [
		'uses'	=> 'GestionControlador@solicita_reporte_x',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.solicita_reporte_x'
		]);
	Route::get('gestion/Fiscal/ReportesEmitidos/reporte_z', [
		'uses'	=> 'GestionControlador@reporte_z',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.reporte_z'
		]);	
	Route::post('gestion/Fiscal/ReportesEmitidos/solicita_reporte_z', [
		'uses'	=> 'GestionControlador@solicita_reporte_z',
		'as'	=> 'gestion.Fiscal.ReportesEmitidos.solicita_reporte_z'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/Transacciones/transacciones_fecha', [
		'uses'	=> 'GestionControlador@transacciones_fecha',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_fecha'
		]);
	Route::post('gestion/Fiscal/ReporteElectronico/Transacciones/solicita_transacciones_fecha', [
		'uses'	=> 'GestionControlador@solicita_transacciones_fecha',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Transacciones.solicita_transacciones_fecha'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/Transacciones/transacciones_rango', [
		'uses'	=> 'GestionControlador@transacciones_rango',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Transacciones.transacciones_rango'
		]);	
	Route::post('gestion/Fiscal/ReporteElectronico/Transacciones/solicita_transacciones_rango', [
		'uses'	=> 'GestionControlador@solicita_transacciones_rango',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Transacciones.solicita_transacciones_rango'
		]);
	Route::get('gestion/Fiscal/ReporteElectronico/Cierrez/cierrez_fecha', [
		'uses'	=> 'GestionControlador@cierrez_fecha',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_fecha'
		]);	
	Route::post('gestion/Fiscal/ReporteElectronico/Cierrez/solicita_cierrez_fecha', [
		'uses'	=> 'GestionControlador@solicita_cierrez_fecha',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Cierrez.solicita_cierrez_fecha'
		]);	
	Route::get('gestion/Fiscal/ReporteElectronico/Cierrez/cierrez_rango', [
		'uses'	=> 'GestionControlador@cierrez_rango',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Cierrez.cierrez_rango'
		]);
	Route::post('gestion/Fiscal/ReporteElectronico/Cierrez/solicita_cierrez_rango', [
		'uses'	=> 'GestionControlador@solicita_cierrez_rango',
		'as'	=> 'gestion.Fiscal.ReporteElectronico.Cierrez.solicita_cierrez_rango'
		]);			

	//  VER MENUS
	
	Route::get('cuenta_corriente/Ventas/Boletas/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenuboletas',
		'as'	=> 'cuenta_corriente.Ventas.Boletas.index'
		]);
	
	Route::get('cuenta_corriente/Ventas/Facturas/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenufacturas',
		'as'	=> 'cuenta_corriente.Ventas.Facturas.index'
		]);	
	
	Route::get('cuenta_corriente/Ventas/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenuventas',
		'as'	=> 'cuenta_corriente.Ventas.index'
		]);
	
	Route::get('cuenta_corriente/Movimientos/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenumovimientos',
		'as'	=> 'cuenta_corriente.Movimientos.index'
		]);
	
	Route::get('cuenta_corriente/Movimientos/Manejos/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenumanejos',
		'as'	=> 'cuenta_corriente.Movimientos.Menu.Manejos.index'
		]);
	
	Route::get('cuenta_corriente/Movimientos/Caja/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenucaja',
		'as'	=> 'cuenta_corriente.Movimientos.Menu.Caja.index'
		]);

	Route::get('cuenta_corriente/Movimientos/Manejos/Cambia_folio/index', [
		'uses'	=> 'CuentaCorrienteControlador@vermenucambiofolio',
		'as'	=> 'cuenta_corriente.Movimientos.Manejos.Cambia_folio.index'
		]);	
	
	Route::get('cuenta_corriente/Movimientos/Manejos/Cambia_folio/Fiscal/cambia_folio_fiscal', [
		'uses'	=> 'CuentaCorrienteControlador@cambia_folio_fiscal',
		'as'	=> 'cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_fiscal'
		]);	
	
	Route::get('cuenta_corriente/Movimientos/Manejos/Cambia_folio/Fiscal/cambia_folio_cobranza', [
		'uses'	=> 'CuentaCorrienteControlador@cambia_folio_cobranza',
		'as'	=> 'cuenta_corriente.Movimientos.Manejos.Cambia_folio.Fiscal.cambia_folio_cobranza'
		]);	

	// FIN VER MENUS	


	Route::put('cuenta_corriente/{id}/actualiza_folio', [
		'uses'	=> 'CuentaCorrienteControlador@actualiza_folio',
		'as'	=> 'cuenta_corriente.actualiza_folio'
		]);
	
	Route::put('cuenta_corriente/{id}/actualiza_folio_cobranza', [
		'uses'	=> 'CuentaCorrienteControlador@actualiza_folio_cobranza',
		'as'	=> 'cuenta_corriente.actualiza_folio_cobranza'
		]);

	Route::get('cuenta_corriente/Movimientos/Manejos/Cierre_cajero/index', [
		'uses'	=> 'CuentaCorrienteControlador@vercierrecajero',
		'as'	=> 'cuenta_corriente.Movimientos.Manejos.Cierre_cajero.index'
		]);	

	Route::get('cuenta_corriente/Movimientos/Manejos/Cierre_cajero/cierre_cajero', [
		'uses'	=> 'CuentaCorrienteControlador@cierre_cajero',
		'as'	=> 'cuenta_corriente.Movimientos.Manejos.Cierre_cajero.cierre_cajero'
		]);

	Route::get('cuenta_corriente/Movimientos/Carga/index', [
		'uses'	=> 'CuentaCorrienteControlador@vercarga',
		'as'	=> 'cuenta_corriente.Movimientos.Carga.index'
		]);	

	Route::post('cuenta_corriente/genera_carga_manual', [
		'uses'	=> 'CuentaCorrienteControlador@genera_carga_manual',
		'as'	=> 'cuenta_corriente.genera_carga_manual'
		]);

	Route::get('cuenta_corriente/Movimientos/Cajero/index', [
		'uses'	=> 'CuentaCorrienteControlador@vercajaindex',
		'as'	=> 'cuenta_corriente.Movimientos.Cajero.index'
		]);

	Route::post('cuenta_corriente/Movimientos/Cajero/consulta_cierre_cajero', [
		'uses'	=> 'CuentaCorrienteControlador@consulta_cierre_cajero',
		'as'	=> 'cuenta_corriente.Movimientos.Cajero.consulta_cierre_cajero'
		]);	

	Route::get('cuenta_corriente/Movimientos/Cajero/{id}/{cajero}/{fecha}/{valor}/{cajero_id}/ver_cierre_detalle', [
		'uses'	=> 'CuentaCorrienteControlador@ver_cierre_detalle',
		'as'	=> 'cuenta_corriente.Movimientos.Cajero.ver_cierre_detalle'
		]);

	Route::get('cuenta_corriente/Ventas/NC/crear', [
		'uses'	=> 'CuentaCorrienteControlador@crearNC',
		'as'	=> 'cuenta_corriente.Ventas.NC.crear'
		]);

	Route::post('cuenta_corriente/Ventas/NC/solicitanc', [
		'uses'	=> 'CuentaCorrienteControlador@solicitanc',
		'as'	=> 'cuenta_corriente.Ventas.NC.solicitanc'
		]);	

	Route::get('cuenta_corriente/Ventas/NC/vernc', [
		'uses'	=> 'CuentaCorrienteControlador@vernc',
		'as'	=> 'cuenta_corriente.Ventas.NC.vernc'
		]);

	Route::get('cuenta_corriente/Ventas/Boletas/buscar_cliente', [
		'uses'	=> 'CuentaCorrienteControlador@buscar_cliente',
		'as'	=> 'cuenta_corriente.Ventas.Boletas.buscar_cliente'
		]);

	Route::post('cuenta_corriente/consulta_cuenta_corriente', [
		'uses'	=> 'CuentaCorrienteControlador@consulta_cuenta_corriente',
		'as'	=> 'cuenta_corriente.consulta_cuenta_corriente'
		]);
	
	

});


Auth::routes(); 

Route::get('/', 'HomeController@index');

Route::get('index', 'HomeController@inicio');

Route::group(['prefix' => 'menu'], function(){
	Route::get('usuarios/ver', [
		'uses' 	=> 'HomeController@verMenuUsuario',
		'as'	=> 'usuarios.menu'
		]);
	Route::get('clientes/ver', [
		'uses' 	=> 'HomeController@verMenuCliente',
		'as'	=> 'clientes.menu'
		]);
	Route::get('cuentas/ver', [
		'uses' 	=> 'HomeController@verMenuCuenta',
		'as'	=> 'cuentas.menu'
		]);
	Route::get('gestion/ver', [
		'uses' 	=> 'HomeController@verMenuGestion',
		'as'	=> 'gestion.menu'
		]);
});
Auth::routes();

Route::get('/home', 'HomeController@index');
