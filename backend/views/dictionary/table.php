<div id="notify" class='notifications top-right'></div>

<div class="row">
    <div class="col-md-12">
        <table id="translates-table"
               data-toggle="table"
               data-url="/dictionary/table?action=data&name=<?= $table ?>"
               data-show-columns="true"
               data-pagination="true"
               data-search="true"
               data-show-refresh="true"
               data-show-export="true"
               data-page-size="20"
               data-page-list="[10, 20, 50, 100]"
                >
            <thead>
            <tr>
                <?php foreach($fields as $key => $field): ?>
                <th data-field="<?= $key ?>" data-sortable="true"><?= $field ?></th>
                <?php endforeach; ?>
                <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-width="150" data-align="center">Item Operate</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="input-group">
            <a href="#" id="add-link" class="right btn btn-primary">Добавить</a>

        </div>
    </div>
</div>



    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="modal-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Редакирование</h4>
                    </div>
                    <div class="modal-body">
                        <div class="key-id"></div>

                        <?php foreach($fields as $key => $field): ?>
                            <div class="form-group">
                                <label><?= $field ?> <small class="text-muted"></small></label>
                                <input type="text" class="form-control" name="row[<?= $key ?>]" <?= $key == 'id' ? ' readonly ' : '' ?>/>
                            </div>
                        <?php endforeach; ?>
                        <div class="clear"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="confirmation" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="modal-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><?= Yii::t('backend', 'delete.confirmation') ?>?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary" id="delete-confirm">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        var russianText = '';

        function operateFormatter(value, row, index) {
            return [
                '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
                '<i class="glyphicon glyphicon-pencil"></i>',
                '</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
                '</a>'
            ].join('');
        }

        var w = $('#myModal');


        $('#modal-form').unbind('submit').submit(function(){

            var data = $('#modal-form').serialize();

            $.ajax({
                url: '/dictionary/table?action=update&name=<?= $table ?>',
                dataType: 'json',
                data: data,
                type: 'post',
                success: function(){
                    w.modal('hide');
                    $('#translates-table').bootstrapTable('refresh', {silent: true});

                    $('#notify').notify({
                        message: { html: '&nbsp;&nbsp;&nbsp;&nbsp; <b>ОК</b> Запись сохранена! &nbsp;&nbsp;&nbsp;&nbsp; ' },
                        fadeOut: { enabled: true, delay: 3000 }
                    }).show();
                }
            });

            return false;
        });


        window.operateEvents = {

            'click .edit': function (e, value, row, index) {
                for(var ind in row) {
                    $('#modal-form input[name="row['+ind+']"]').val(row[ind]);
                }
                w.modal('show');
            },

            'click .remove': function (e, value, row, index) {

                e.preventDefault();
                $('#confirmation').data('id', row.id).modal('show');

            }
        };

        $('#add-link').unbind('click').click(function(){

            $('#modal-form input').val('');
            w.modal('show');
            return false;
        });

        $('#delete-confirm').on('click', function () {
            var data = {};
            data.id = $('#confirmation').data('id');
            $.ajax({
                url: '/dictionary/table?action=delete&name=<?= $table ?>',
                dataType: 'json',
                data: data,
                type: 'post',
                success: function(){
                    $('#confirmation').modal('hide');
                    $('#translates-table').bootstrapTable('refresh', {silent: true});
                    $('#notify').notify({
                        message: { html: '&nbsp;&nbsp;&nbsp;&nbsp; <b>ОК</b> Запись удалена! &nbsp;&nbsp;&nbsp;&nbsp; ' },
                        fadeOut: { enabled: true, delay: 3000 }
                    }).show();
                }
            });
        });

</script>
