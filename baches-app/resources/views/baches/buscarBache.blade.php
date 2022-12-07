<form method="POST" action="{{route('buscarBache')}}">
    @csrf
    <h4>Buscar(Descripcion)</h4>
    <input name="descripcion">
    <input type="submit" value="Buscar">
    @error('descripcion')
    <p class="alert alert-danger" role="alert">* {{$message}}</p>
    @enderror
</form>