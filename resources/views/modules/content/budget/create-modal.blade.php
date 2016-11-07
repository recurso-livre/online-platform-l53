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
        <form id="budgetForm" method="post" name="login" action="{{ route('auth.budget.store') }}" enctype="multipart/form-data">
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
                <!--<label>Link externo:</label>
                <input type="text" name="file" class="form-control" placeholder="Link" id="budget-file" />-->
                <div class="form-group">
                    <label>Arquivo:</label><label class="pull-right" style="font-weight: normal">Tamanho Máximo: 100 MB</label>
										<div class="input-group" style="margin: 0">
										  <input data-file="file" type="text" class="form-control " placeholder="" disabled> 
										  <span class="group-span-filestyle input-group-btn" tabindex="0">
										    <label class="btn btn-default btn-file">
                           <img id="loadingImg" style="display:none; height: 22px;width: 22px;margin-left: -42px;position: absolute;" src="{{ asset('img/loading.gif') }}"> Anexar Arquivo <input type="file" name="file" style="display: none;">
                        </label>
										  </span>
										</div>
									</div>
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
          
          $('[data-file]').click(function () {
            var inputFile = "[name='" + $(this).attr('data-file') + "']";
            console.log(inputFile);
            $(inputFile).trigger("click");
          });
          
          $("input:file").change(function (){
            var fileName = $(this).val().split("\\"),
                label = "[data-file='" + $(this).attr('name') + "']";
                if (fileName && fileName.length > 0) {
                  fileName = fileName[fileName.length - 1];
                }
            
            if (this.files[0].size >= 100000000) {
              alert("O arquivo deve possuir no máximo 100MB!");
              $(label).val("");
              $('#budgetForm').attr('data-validation', 'false');
            } else {
              $(label).val(fileName);
              $('#budgetForm').attr('data-validation', 'true');
            }
          });
          
          $('#budgetForm').submit(function (e) {
            var status = $(this).attr('data-validation');
            
            if (status === 'true') {
              $('#loadingImg').css('display', 'block');
              $('#modal-btn').attr('disabled', true).html("Enviando...");
            } else {
              e.preventDefault();
              alert("Selecione um arquivo.");
            }
          });
        
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