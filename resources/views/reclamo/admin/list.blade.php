@php
wp_enqueue_script('lrp_jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', '', '1.0.0');
// wp_enqueue_script('lrp_fontawesome', asset('js/font-awesome.js'), '', '1.0.0');
wp_enqueue_style('lrp_boostrapGridMin', asset('css/bootstrap-grid.min.css'), '', '1.0.0');

// CSS
wp_enqueue_style('lrp_DatatablesCSS', 'https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css', '', '1.0.0');

wp_enqueue_style('lrp_DatatablesReorderCss', 'https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css', '', '1.0.0');
wp_enqueue_style('lrp_Datatables-Responsive-CSS', 'https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css', '', '1.0.0');
// JS

wp_enqueue_script('lrp_DatatablesJS', 'https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', '', '1.0.0', true);
wp_enqueue_script('lrp_DatatablesResponsiveJS', 'https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js', '', '1.0.0', true);
wp_enqueue_script('lrp_DatatablesReorderJS', 'https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js', '', '1.0.0', true);

wp_enqueue_style('lrp_styles', asset('css/lrp_styles.css'), '', '1.0.0');

@endphp

<div class="">
    <!-- <h1 class="font-weight-bold">Reclamos Realizados</h1> -->
    <h5 class="lrp-text-gray font-weight-bold">Buscador</h5>
    <form action="#" method="GET">
        <div class="row my-1">
            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="number" name="id_cli" id="id_cli" aria-describedby="helpId"
                        placeholder="Ingresa el Código del Cliente">
                    <label for="id_cli">Código del Cliente</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_tipo_comprobante">Tipo de Documento</label>
                    <select name="id_tipo_comprobante" id="id_tipo_comprobante">
                        @foreach ($comprobantes as $comprobante)
                            <option value="{{ $comprobante->id }}">
                                {{ $comprobante->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="number" name="n_comprobante" id="n_comprobante" aria-describedby="helpId"
                        placeholder="Ingresa Numero de Comprobante">
                    <label for="n_comprobante">Numero de Comprobante</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>

            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="date" name="fecha_reclamo" id="fecha_reclamo" aria-describedby="helpId"
                        placeholder="Ingresa la Fecha">
                    <label for="fecha_reclamo">Fecha</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_estado">Estado</label>
                    <select name="id_estado" id="id_estado">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">
                                {{ $estado->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="number" name="n_documento" id="n_documento" aria-describedby="helpId"
                        placeholder="Ingresa Numero de Documento">
                    <label for="n_documento">Numero de Documento</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="my-2 lrp-btn lrp-btn-primary-rounded lrp-btn-lg">Buscar</button>
        </div>
    </form>

    @if (count($reclamos) == 0)

        <h3 class="text-center my-4">No hay reclamos que mostrar</h3>
    @else
        <div class="my-4">
            <table class=" display  responsive nowrap p-2" style="width: 100% !important; " id="table-admin-reclamos">
                <thead class="">
                    <tr>
                        <th class="text-center lrp-text-gray">Codigo</th>
                        <th class="text-center lrp-text-gray">Fecha</th>
                        <th class="text-center lrp-text-gray">Estado</th>
                        <th class="text-center lrp-text-gray">Vencimiento</th>
                        <th class="text-center lrp-text-gray">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reclamos as $reclamo)
                        <tr>
                            <td scope="row" class="text-center font-weight-bold">{{ $reclamo->codigo }}</td>
                            <td class="text-center">{{ $reclamo->fecha }}</td>
                            <td class="font-weight-bold text-center {{ lrp_get_color_by_status($reclamo->estado) }}">
                                {{ $reclamo->estado }}</td>
                            <td class="text-center">{{ $reclamo->vencimiento }}</td>
                            <td class="text-center d-md-flex justify-content-center">
                                <div class="lrp-btn-mini lrp-btn-mini-primary ">
                                    <a href="#{{ $reclamo->id_reclamo }}" class="lrp-color-primary font-weight-bold">
                                        Ver más <i class="mx-1 fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif


</div>

<script>
    // existen reclamos
    @if (count($reclamos) > 0)
        document.addEventListener("DOMContentLoaded", function(event) {
        {{ lrp_datatables_in_spanish() }}
        $('#table-admin-reclamos').DataTable({
        order: [
        [1, "desc"]
        ],
        pageLength: 20,
        rowReorder: {
        selector: 'td:nth-child(2)'
        },
        responsive: true
        });
        });
    
    @endif
    
</script>
