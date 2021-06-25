@php
wp_enqueue_script('lrp_jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', '', '1.0.0');
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
    <h1 class="font-weight-bold">Reclamos Realizados</h1>
    <h4 class="lrp-color-primary">Historial de Reclamos</h4>
    <form action="#" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="number" name="id_reclamo" id="id_reclamo" aria-describedby="helpId"
                        placeholder="Ingresa el Código de tu Reclamo">
                    <label for="id_reclamo">Código de Reclamo</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="lrp-group">
                    <input type="number" name="id_cli" id="id_cli" aria-describedby="helpId"
                        placeholder="Ingresa el Código del Cliente">
                    <label for="cod_cli">Código del Cliente</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <button type="submit" class="lrp-btn lrp-btn-primary-rounded">Buscar</button>
            </div>
        </div>
    </form>

    @if (count($reclamos) == 0)

        <h3 class="text-center my-4">No hay reclamos que mostrar</h3>
    @else
        <div class="my-4">
            <table class=" display  nowrap p-2" style="width: 100% !important; " id="table-reclamos">
                <thead class="">
                    <tr>
                        <th class="text-center lrp-text-gray">#</th>
                        <th class="text-center lrp-text-gray">Fecha de Creacion</th>
                        <th class="text-center lrp-text-gray">Status</th>
                        <th class="text-center lrp-text-gray">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reclamos as $reclamo)
                        <tr>
                            <td scope="row" class="text-center font-weight-bold">{{ $reclamo->codigo }}</td>
                            <td class="text-center">{{ $reclamo->fecha }}</td>
                            <td class="font-weight-bold text-center {{ lrp_get_color_by_status($reclamo->estado)}}">{{ $reclamo->estado }}</td>
                            <td class="text-center">
                                <a href="#{{ $reclamo->id_reclamo }}" class="font-weight-bold">
                                    Ver más
                                </a>
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
            $('#table-reclamos').DataTable({
                order: [[1, "desc" ]],
                pageLength: 20,
                rowReorder: {
                selector: 'td:nth-child(2)'
                },
                responsive: true
            });
        });
    
    @endif
</script>
