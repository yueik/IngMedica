@extends('adminlte::page')

@section('title', 'Términos y Condiciones')

@section('content_header')
<h1 class="text-center">Términos y Condiciones</h1>
@stop

@section('content')
<div class="pt-4 bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
            <p>Bienvenido a Ingeniería Médica proporcionado por Joaquín Godoy. Nos complace ofrecerle acceso al Servicio ,
                sujeto a estos términos y condiciones (los "Términos de Servicio") y a la Política de Privacidad
                correspondiente de Joaquín Godoy. Al acceder y utilizar el Servicio, usted expresa su consentimiento,
                acuerdo y entendimiento de los Términos de Servicio y la Política de Privacidad. Si no está de
                acuerdo con los Términos de Servicio o la Política de Privacidad, no utilice el Servicio.
                Si utiliza el servicio está aceptando las modalidades operativas en vigencia descriptas más
                adelante, las declara conocer y aceptar, las que se habiliten en el futuro y en los términos y
                condiciones que a continuación se detallan:
            </p>
            <ul>
                <li>El uso del servicio está limitado</li>
            </ul>
            <h4 class="text-center">Operaciones Habilitadas</h4>
            <p>Las operaciones habilitadas son aquellas que estarán disponibles para los clientes, quienes
                deberán cumplir los requisitos que se encuentren vigentes en su momento para operar el
                Servicio. Las mismas podrán ser ampliadas o restringidas por el proveedor, comunicándolo
                previamente con una antelación no menor a 60 días, y comprenden entre otras, sin que pueda
                entenderse taxativamente las que se indican a continuación:
            </p>
            <ul>
                <li>Registrar, editar y eliminar ingresos de implantes.</li>
                <li>Registrar, editar y eliminar implantes.</li>
                <li>Registrar, editar y eliminar egresos de implantes.</li>
                <li>Registrar, editar y eliminar clientes.</li>
                <li>Registrar, editar y eliminar direcciones de clientes.</li>
                <li>Registrar, editar y eliminar marcas.</li>
                <li>Registrar, editar y eliminar modelos.</li>
                <li>Registrar, editar y eliminar talles.</li>
                <li>Registrar, editar y eliminar estados de egresos.</li>
                <li>Registrar, editar y eliminar implantes</li>
                <li>Generar remito de egresos.</li>
            </ul>
            <h4 class="text-center">Transacciones</h4>
            <p>En ningún caso debe entenderse que la solicitud de un producto o servicio implica obligación
                alguna para el Acceso y uso del Servicio.
                Para operar el Servicio se requerirá siempre que se trate de integrantes de la empresa Ingeniería
                Médica, quienes
                podrán acceder mediante una computadora la cual tenga implementado el sistema. La aplicación no cuenta
                con un mecanismo de autenticación, por lo tanto asumo las consecuencias de su divulgación a terceros,
                liberando a Joaquín Godoy de toda responsabilidad que de ello se derive. En ningún caso Joaquín Godoy
                requerirá que le suministre la totalidad de los datos, ni enviará mail requiriendo información personal
                alguna.
            </p>
            <h4 class="text-center">Costo del Servicio</h4>
            <p>La empresa XXXX podrá cobrar comisiones por el mantenimiento y/o uso de este Servicio o los
                que en el futuro implemente, entendiéndose facultado expresamente para efectuar los
                correspondientes débitos en mis cuentas, aún en descubierto, por lo que presto para ello mi
                expresa conformidad. En caso de cualquier modificación a la presente previsión, lo comunicará
                con al menos 60 días de antelación.
            </p>
            <h4 class="text-center">Vigencia</h4>
            <p>El Usuario podrá dejar sin efecto la relación que surja de la presente, en forma inmediata, sin
                otra responsabilidad que la derivada de los gastos originados hasta ese momento. Si el cliente
                incumpliera cualquiera de las obligaciones asumidas en su relación contractual Joaquín Godoy, o de los
                presentes Términos y Condiciones, el Banco podrá decretar la caducidad del
                presente Servicio en forma inmediata, sin que ello genere derecho a indemnización o
                compensación alguna. Joaquín Godoy podrá dejar sin efecto la relación que surja de la presente,
                con un preaviso mínimo de 60 días, sin otra responsabilidad.
            </p>
            <h4 class="text-center">Validez de operaciones y notificaciones</h4>
            <p>Los registros emitidos por el sistema serán prueba suficiente de las operaciones cursadas por dicho
                canal. Renuncio expresamente a cuestionar la idoneidad o habilidad de ese medio de prueba.
                A los efectos del cumplimiento de disposiciones legales o contractuales, se otorga a las
                notificaciones por este medio el mismo alcance de las notificaciones mediante documento
                escrito.
            </p>
            <h4 class="text-center">Propiedad intelectual</h4>
            <p>El software en Argentina está protegido por la ley 11.723, que regula la propiedad intelectual y
                los derechos de autor de todos aquellos creadores de obras artísticas, literarias y científicas.
            </p>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop