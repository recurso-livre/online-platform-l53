<div class="modal fade" id="budget-modal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    @if($errors->any())
      <div class="alert alert-danger modal-dialog modal-sm" role="alert">
    		<ul>
    			@foreach($errors->all() as $error)
    				<li>{{ $error }}</li>
    			@endforeach
    		</ul>
    	</div>
    @endif
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" name="login" action="{{ route('auth.budget.store') }}">
          {{ csrf_field() }}
          <input type="hidden" name="resource_id" id="budget-id" />
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Solicitação</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12" style="margin-bottom: 8px">
                <label>Mensagem:</label>
                <textarea name="message" class="form-control" rows="8" placeholder="Mensagem" id="budget-message" required></textarea>
              </div>
              <div class="col-md-12">
                <label>Link externo:</label>
                <input type="text" name="file" class="form-control" placeholder="Link" id="budget-file" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="modal-btn" class="btn btn-success">Enviar</button>
          </div>
        </form>
      </div>
    </div>
</div>

@push('posscripts')
    <script>
        $(function() {
          var logged = {{ Auth::check() ? Auth::check() : 0 }};
          
          @if($errors->any())
            $(function() {
              $('#budget-modal').modal('show');
            });
          @endif
        
          $('.request-budget').click(function (e) {
              if (logged === 0) {
                window.location.href = "{{ route('login') }}";
              } else {
                var id = $(this).attr('resource-id');
                $('#budget-id').val(id);
                $('#budget-message, #budget-file').val("");
                
                $('#budget-modal').modal('show');
              }
              e.preventDefault();
          });
        });
    </script>
@endpush