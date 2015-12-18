<?php
/**
 * @var View $this
 * @var SourceMessageSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use Zelenin\yii\modules\I18n\models\search\SourceMessageSearch;
use Zelenin\yii\modules\I18n\Module;

$this->title = Module::t('Translations');
echo Breadcrumbs::widget(['links' => [
    $this->title
]]);
?>

<h3><?= Html::encode($this->title) ?></h3>

<table id="translates-table"
       data-toggle="table"
       data-url="/translate/data"
       data-show-columns="true"
       data-pagination="true"
       data-search="true"
       data-show-sorting="true"
       data-show-refresh="true"
       data-show-export="true"
       data-page-size="20"
       data-page-list="[10, 20, 50, 100]"
    >
    <thead>
    <tr>

        <th data-field="id" data-sortable="true"><?= Yii::t('backend', 'ID') ?></th>
        <th data-field="message" data-sortable="true"><?= Yii::t('backend', 'Key name') ?></th>
        <th data-field="category" data-sortable="true"><?= Yii::t('backend', 'Category') ?></th>
        <th data-field="messages" data-sortable="true" data-formatter="messageFormatter"><?= Yii::t('backend', 'Translation') ?></th>
        <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-width="150" data-align="center">
            <?= Yii::t('backend', 'Operations') ?>
        </th>

    </tr>
    </thead>
</table>

<div id="notify" class='notifications top-right'></div>


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= Yii::t('backend', 'Translate') ?></h4>
            </div>
            <div class="modal-body">
                <div class="key-name"></div>
                <p><textarea rows="5" class="text-field form-control"></textarea></p>
                <div class="clear"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('backend', 'button.cancel') ?></button>
                <button type="button" class="btn btn-primary"><?= Yii::t('backend', 'button.ok') ?></button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var lang = 'ru';

    function messageFormatter(item) {
        return item[lang].translation;
    }

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

    $(document).ready(function () {

        var russianText = '';



        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                console.log(row);
                var w = $('#myModal');
                w.find('.key-name').html(row.message);
                w.find('textarea').val(row.messages[lang].translation);

                w.find('.btn.btn-primary').unbind('click').click(function () {

                    var data = {};
                    data.id = row.messages[lang].id;
                    data.translation = w.find('textarea').val();
                    data.language = lang;

                    $.ajax({
                        url: '/translate/update/' ,
                        dataType: 'json',
                        data: data,
                        type: 'post',
                        success: function () {
                            w.modal('hide');
                            $('#translates-table').bootstrapTable('refresh', {silent: true});
                            $('#notify').notify({
                                message: { html: '&nbsp;&nbsp;&nbsp;&nbsp; <b>' +
                                    '</b>  ok ' },
                                fadeOut: { enabled: true, delay: 3000 }
                            }).show();
                        }
                    });
                });

                w.modal('show');
            },
            'click .remove': function (e, value, row, index) {

                if (confirm('Delete?')) {

                    var data = {};

                    data.id = row.id;

                    $.ajax({
                        url: '/translate/delete/',
                        data: data,
                        dataType: 'json',
                        type: 'post',
                        success: function () {
                            $('#translates-table').bootstrapTable('refresh', {silent: true});
                            $('#notify').notify({
                                message: { html: '&nbsp;&nbsp;&nbsp;&nbsp; <b>Success! &nbsp;&nbsp;&nbsp;&nbsp; ' },
                                fadeOut: { enabled: true, delay: 3000 }
                            }).show();
                        }
                    });
                }
            }
        };

        $('#translate-link').click(function () {
            var direction = $(this).attr('rel');
            Admin.translate(russianText, direction, function (translate) {
                var translate = translate.text[0];
                w = $('#myModal');
                w.find('textarea').val(translate);
            });
        });


    });

</script>