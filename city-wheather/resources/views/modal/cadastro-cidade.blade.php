<div class="modal fade" id="modal-cadastro-cidade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          Cadastro de cidade
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Cidade: </label>
                <select class="form-control" id="cidade" name="cidade"></select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="cityController.save()">Salvar</button>
        </div>
    </div>
  </div>
</div>

<script>
    $(function() {
        
        $('#cidade').select2({
          width: '100%',
          minimumInputLength: 4,
          ajax: {
            url: '{{ env('AVAILABLE_CITIES_API_ENDPOINT') }}',
            data: function (params) {
              var query = {
                q: params.term
              }              
              return query;
            },
            processResults: function (data) {
                var dataToSelect2 = (data || []).map(function(val) {
                    return {
                        id: val.id,
                        text: [val.name, ' - ', val.country].join('')
                    }
                });
              return {results: dataToSelect2}
            }
          }
        });
    })
</script>