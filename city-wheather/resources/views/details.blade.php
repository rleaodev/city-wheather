@extends('layouts.template', ['page' => 'detail'])

@section('content')
    <section id="detail-city"></section>
    <div class="row">
        <div class="col-md-12">
            <br />
            <a href="/" class="btn btn-primary float-right">Voltar</a>
        </div>
    </div>
@endsection
<script>
    window.onload = function() {
        cityController.details({{ $id }});
    }
</script>