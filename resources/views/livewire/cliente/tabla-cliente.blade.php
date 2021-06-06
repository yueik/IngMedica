<div>    
  <div class="px-0 py-3 flex justify-between">
    <button wire:click.prevent="addCliente" type="button" class="btn btn-primary">Agregar</button>
    <input type="text" wire:model="search" placeholder="Buscar...">
  </div>

  <div class="modal fade" wire:ignore.self id="addCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-blue-500">
          <h5 class="modal-title" id="exampleModalLabel">
            @if($editModal)
            <span class="text-white">Editar Cliente</span>
            @else
            <span class="text-white">Registrar Cliente</span>
            @endif
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="{{ $editModal ? 'updateCliente' : 'createCliente' }}">
          @csrf
          <div class="modal-body">            
            <div class="form-group">
              <label for="cliente">Nombre</label>
              <input type="text" class="form-control @error('cliente') is-invalid @enderror" id="cliente"
                wire:model.defer="state.cliente">
              @error('cliente')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="cuit">Cuit</label>
              <input type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit"
                wire:model.defer="state.cuit">
              @error('cuit')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="documento">documento</label>
                <input type="text" class="form-control @error('documento') is-invalid @enderror" name="documento"
                  wire:model.defer="state.documento">
                @error('documento')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                  wire:model.defer="state.telefono">
                @error('telefono')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="mail">Mail</label>
                <input type="text" class="form-control @error('mail') is-invalid @enderror" name="mail"
                  wire:model.defer="state.mail">
                @error('mail')
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

  @if ($clientes->count())

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="bg-gray-600">
        <tr>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('id')">
            ID
            @if($sort =='id')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('cliente')">
            Cliente
            @if($sort =='cliente')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('cuit')">
            Cuit
            @if($sort =='cuit')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('documento')">
            documento
            @if($sort =='documento')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('telefono')">
            Teléfono
            @if($sort =='telefono')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
            wire:click="order('mail')">
            Mail
            @if($sort =='mail')
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
            Acciones
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->cliente }}</td>
            <td>{{ $cliente->cuit }}</td>
            <td>{{ $cliente->documento }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->mail }}</td>
          <td>
            <a type="button" class="btn btn-warning" wire:click.prevent="editCliente({{ $cliente }})">
              <i class="fas fa-pencil-alt"></i>
            </a>

            <button wire:click="destroy({{ $cliente->id }})" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $clientes->links() }}
  </div>
  @else
  <div class="alert alert-danger" role="alert">
    No existe ninguna coincidencia
  </div>
  @endif
</div>
