<form action="{!! url(Config::get('const.ADMIN_URL') . '/create/category') !!}" method="POST">
    <div class="form-group">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="text" name="new_category" placeholder="Введите категорию" class="form-control">
        <br>
        <label class="font-noraml">Выберете подкатегорию новой категории</label>
        <div>
            <select data-placeholder="Выбор подкатегории" class="chosen-select" tabindex="2" name="parent_category">
                <option value="">Подкатегории</option>
                @if(!empty($categories))
                    @foreach($categories as $subcategory)
                        <option value="{!! $subcategory->id !!}">{!! $subcategory->descriptions->category !!}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <br>
        <button class="btn btn-success">Добавить</button>
    </div>
    <div class="dd" id="nestable">
        <ol class="dd-list">
            {!! $tree !!}
        </ol>

    </div>

</form>
<button type="button" class="btn btn-primary" id="runModal" style="display: none" data-toggle="modal"
        data-target="#myModal">
    Launch demo modal
</button>

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title">Изменить категорию</h4>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>Введите название категории : </label> <input type="text" placeholder=""
                                                                                            class="form-control"
                                                                                            id="new_category"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal" id="closeCategory">Закрыть</button>
                <button type="button" class="btn btn-primary" id="saveCategory">Сохранить</button>
            </div>
        </div>
    </div>
</div>




