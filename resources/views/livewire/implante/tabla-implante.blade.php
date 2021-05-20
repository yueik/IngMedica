<div>
  <div class="px-0 py-3 flex justify-between">
    <button class="btn btn-primary">Agregar</button>
    <input type="text" wire:model="search" placeholder="Buscar...">
  </div>

  @if ($implantes->count())

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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
            Marca
          </th>
          <th scope="col"
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider"
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
            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">
            Acciones
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($implantes as $implante)
        <tr>
          <td>{{ $implante->id }}</td>
          <td>{{ $implante->modelo->marca->marca }}</td>
          <td>{{ $implante->modelo->modelo }}</td>
          <td>{{ $implante->talle->talle }}</td>
          <td>{{ $implante->codigo }}</td>
          <td>{{ $implante->serie }}</td>
          <td>{{ $implante->estado->estado}}</td>
          <td>
            <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>

            <button wire:click="destroy({{ $implante->id }})" class="btn btn-danger">
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