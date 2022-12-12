<form method="POST" action="{{route('buscarBache')}}" class="d-flex">
    @csrf
    <input name="descripcion" class="form-control me-2" type="search" placeholder="Descripcion" aria-label="Search">
    <input type="submit" value="Buscar" class="btn btn-secondary">
    @error('descripcion')
    class="btn btn-secondary"
    class="btn btn-outline-success"
    <p class="alert alert-danger" role="alert" style="font-size: small;">* {{$message}}</p>
    @enderror
</form>