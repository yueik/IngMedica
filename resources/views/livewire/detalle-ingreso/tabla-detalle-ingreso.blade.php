<div>
    <div class="px-0 py-3 flex justify-between">
      <button wire:click.prevent="addDetalle" type="button" class="btn btn-primary">Agregar Implante</button>
      <input type="text" wire:model="search" placeholder="Buscar...">
    </div>
  
    <div class="modal fade" wire:ignore.self id="addDetalle" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content p-2">
          <div class="modal-header mb-2 bg-blue-500">
            <h5 class="modal-title" id="exampleModalLabel">
              @if($editModal)
              <span class="text-white">Editar Implante</span>
              @else
              <span class="text-white">Registrar Implante</span>
              @endif
            </h5>
            <button type="button" class="close" wire:click.prevent="cerrarModalDetalle">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formDetalleIngreso" >
            @csrf
            <div class="modal-body grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-4">
              <div class="form-group">
                <label for="modelo_id">Modelo</label>
                <select class="form-control @error('modelo_id') is-invalid @enderror" name="modelo_id"
                  wire:model.defer="stateImplante.modelo_id">
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
                  wire:model.defer="stateImplante.talle_id">
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
                  wire:model.defer="stateImplante.codigo">
                @error('codigo')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="serie">Serie</label>
                <input type="text" class="form-control @error('serie') is-invalid @enderror" name="serie"
                  wire:model.defer="stateImplante.serie">
                @error('serie')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="estado_id">Estado</label>
                <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id"
                  wire:model.defer="stateImplante.estado_id">
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
              <div class="form-group">
                <label for="costo">Costo</label>
                <input type="text" class="form-control @error('costo') is-invalid @enderror" id="costo"
                  wire:model.defer="stateDetalle.costo">
                @error('costo')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="modal-footer align-items-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" wire:loading.remove wire:target="save" wire:click.prevent="{{ $editModal ? 'updateDetalle' : 'createDetalle' }}">Guardar</button>
              <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="save"
                alt="Cargando..">
            </div>
          </form>
        </div>
      </div>
    </div>
  
    @if ($detalles->count())
  
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="bg-gray-600">
          <tr>
            <th scope="col"
              class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
              wire:click="order('implante_modelo')">
              Modelo
              @if($sort =='implante_modelo')
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
              wire:click="order('implante_talle')">
              Talle
              @if($sort =='implante_talle')
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
              wire:click="order('implante_serie')">
              Serie
              @if($sort =='implante_serie')
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
          @foreach ($detalles as $detalle)
          <tr>
            <td>{{ $detalle->implante->modelo->modelo }}</td>
            <td>{{ $detalle->implante->talle->talle }}</td>
            <td>{{ $detalle->implante->serie }}</td>
            <td>
              <a type="button" class="btn btn-warning" wire:click.prevent="editDetalle({{ $detalle }})">
                <i class="fas fa-pencil-alt"></i>
              </a>
  
              <button wire:click="destroy({{ $detalle->id }})" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $detalles->links() }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
      No existe ninguna coincidencia
    </div>
    @endif
</div>
