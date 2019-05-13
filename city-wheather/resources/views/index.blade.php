@extends('layouts.template', ['page' => 'index'])

@section('content')
    <section id="cities">
        <p class="alert alert-info" style="display: none">Cidades não encontradas</p>
    </section>
@endsection
<script>
    window.onload = function() {
        cityController.showCities();
    }
</script>