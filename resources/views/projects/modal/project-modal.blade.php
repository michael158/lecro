<div class="modal fade" id="project-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Novo Kanban</h4>
            </div>
            <div class="modal-body">
                @include('projects.create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btn-create">Salvar <i class="fa fa-check"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="{{ url('js/plugins/jquery.validate.js') }}"></script>
@include('projects.modal.scripts.project-modal')