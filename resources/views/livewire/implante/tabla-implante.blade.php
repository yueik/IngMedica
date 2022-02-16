<div>
  <div class="px-0 py-3 flex justify-between">
    <button wire:click.prevent="addImplante" type="button" class="btn btn-primary">Agregar</button>
    <input type="text" wire:model="search" placeholder="Buscar...">
  </div>

  <div class="modal fade" wire:ignore.self id="addImplante" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-blue-500">
          <h5 class="modal-title" id="exampleModalLabel">
            @if($editModal)
            <span class="text-white">Editar Implante</span>
            @else
            <span class="text-white">Registrar Implante</span>
            @endif
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="{{ $editModal ? 'updateImplante' : 'createImplante' }}">
          @csrf
          <div class="modal-body">            
            <div class="form-group">
              <label for="modelo_id">Modelo</label>
              <select class="form-control @error('modelo_id') is-invalid @enderror" name="modelo_id"
                wire:model.defer="state.modelo_id">
                <option value=""></option>
                @foreach ($modelos as $modelo)
                <option value="{{ $modelo->id }}">{{ $modelo->modelo }}</option>
                @endforeach
              </select>
              @error('modelo_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="talle_id">Talle</label>
              <select class="form-control @error('talle_id') is-invalid @enderror" name="talle_id"
                wire:model.defer="state.talle_id">
                <option value=""></option>
                @foreach ($talles as $talle)
                <option value="{{ $talle->id }}">{{ $talle->talle }}</option>
                @endforeach
              </select>
              @error('talle_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="codigo">Código</label>
              <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo"
                wire:model.defer="state.codigo">
              @error('codigo')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="serie">Serie</label>
              <input type="text" class="form-control @error('serie') is-invalid @enderror" name="serie"
                wire:model.defer="state.serie">
              @error('serie')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="estado_id">Estado</label>
              <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id"
                wire:model.defer="state.estado_id">
                <option value=""></option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                @endforeach
              </select>
              @error('estado_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="modal-footer align-items-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" wire:loading.remove wire:target="save">Guardar</button>
            <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="save"
              alt="Cargando..">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" wire:ignore.self id="ImplanteEgresoStock" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="min-width: 85%;" role="document">
            <div class="modal-content p-2">
                <div class="modal-header mb-2 bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span class="text-white">Egreso de Stock</span>
                    </h5>
                    <button type="button" class="close" wire:click.prevent="cerrarModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control"
                                    name="fecha" wire:model.defer="stateEgreso.fecha" disabled>
                            </div>
                            <div class="form-group">
                                <label for="cliente_id">Cliente</label>
                                <input type="text" class="form-control" name="cliente_id"
                                    wire:model.defer="stateEgreso.cliente_id" disabled>
                            </div>
                            <div class="form-group">
                                <label for="montoFinal">Monto</label>
                                <input type="number" class="form-control"
                                    name="montoFinal" wire:model.defer="stateEgreso.montoFinal" disabled>
                            </div>
                            <div class="form-group">
                                <label for="estado_id">Estado</label>
                                <input type="text" class="form-control"  name="estado_id"
                                    wire:model.defer="stateEgreso.estado_id" disabled>                             
                            </div>
                            <div class="form-group">
                                <label for="observacion">Observación</label>
                                <input type="text" class="form-control" id="observacion"
                                    wire:model.defer="stateEgreso.observacion" disabled>
                            </div>
                        </div>

                        @livewire('detalle-egreso.tabla-detalle-egreso')

                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>

  @if ($implantes->count())

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="bg-gray-600">
        <tr>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('modelo_id')">
            Modelo
            @if($sort =='modelo_id')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('talle_id')">
            Talle
            @if($sort =='talle_id')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('codigo')">
            Codigo
            @if($sort =='codigo')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('serie')">
            Serie
            @if($sort =='serie')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('estado_id')">
            Estado
            @if($sort =='estado_id')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('ingreso_fecha')">
            Fecha Ingreso
            @if($sort =='ingreso_fecha')
            @if($direction == 'asc')
            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
            @else
            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
            @endif
            @else
            <i class="fas fa-sort float-right mt-1"></i>
            @endif
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider">
            Acciones
          </th>
        </tr>
      </thead>
      <tbody class="bg-white text-center divide-y divide-gray-200">
        @foreach ($implantes as $implante)
        <tr>
          <td>{{ $implante->modelo->modelo }}</td>
          <td>{{ $implante->talle->talle }}</td>
          <td>{{ $implante->codigo }}</td>
          <td>{{ $implante->serie }}</td>
          <td>{{ $implante->estado->estado}}</td>
          <td>{{ $implante->detalle_ingreso->ingreso_stock->fecha}}</td>
          <td>
            <a type="button" class="btn btn-warning" wire:click.prevent="editImplante({{ $implante }})">
              <i class="fas fa-pencil-alt"></i>
            </a>

            @if($implante->detalle_egresos->count())
            <button class="btn btn-success" wire:click.prevent="implanteEgreso({{ $implante->detalle_egresos[0]->egreso_stock }})">
              <i class="fas fa-trash"></i>
            </button>
            @endif

            <button wire:click="$emit('deleteImplante', {{ $implante->id }})" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $implantes->links() }}
  </div>
  @else
  <div class="alert alert-danger" role="alert">
    No existe ninguna coincidencia
  </div>
  @endif
</div>