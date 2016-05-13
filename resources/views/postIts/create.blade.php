<div class="row">
    <div class="col-lg-12">
        <form id="create-postit">
            <input type="hidden" name="project_id" value="{{$project['id']}}">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" id="title" name="title" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
            </div>
        </form>

    </div>
</div>