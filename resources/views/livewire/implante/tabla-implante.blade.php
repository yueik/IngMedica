<div>
    <table id="implantes" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Talle</th>
                <th scope="col">Codigo</th>
                <th scope="col">Serie</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $implantes->links() }}
</div>
