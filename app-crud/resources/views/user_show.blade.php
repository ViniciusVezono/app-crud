@extends ('master')

@section('content')

<h2> User - {{ $user->name }}</h2>

<form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="post">
@csrf
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="bg-red-400">Deletar Usuario</button>
</form>

@endsection