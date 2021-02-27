<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Condicionales(if-elseif-else) & Switch</h3>

	@foreach ($users as $user)

    @if ( $user->gender  === "Female")
      @switch($user->role)
        @case("Admin")
            <li>La dama {{ $user->fullname }} Es Administrador@</li>
        @break
        @case("Editor")
            <li>La dama {{ $user->fullname }} Es Editor@</li>
        @break
        @default
          sin relacion
         Ninguno
      @endswitch
    @elseif( $user->gender === "Male")
      @switch($user->role)
        @case("Admin")
            <li>El Caballero {{ $user->fullname }} Es Administrador@</li>
        @break
        @case("Editor")
            <li>El Caballero {{ $user->fullname }} Es Editor@</li>
        @break
        @default
          sin relacion
         Ninguno
      @endswitch
    @else
        El Genero de usuario {{ $user->fullname }} es transgenero<br>
    @endif
	@endforeach
	<br>

  <h3>Bucles(for-foreach, forelse)</h3>

	@forelse ($users as $user)
	<li>{{ $user->fullname}} Teléfono {{ $user->phone }}</li>
	@empty
	<p>No tiene telefono</p>
	@endforelse

  <br>
  @for ($i = 9; $i > 0; $i--)
    GO! Conteo regresivo {{ $i }} <br>
  @endfor
</body>
</html>