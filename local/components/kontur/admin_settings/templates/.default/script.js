$(function(){
    function SetDraggableValue(element){
        let i = 1;
        let value_list = [];
        $(element).closest('.draggable-list').find('.draggable-list-item').each(function(){
            $(this).find('.count').html(i);
            i += 1;
            value_list.push($(this).data('count'));
        });
        $(element).closest('.draggable-list').find('input.SORT').val( JSON.stringify(value_list) );
    }

    var el = document.querySelectorAll('.draggable-list');
    el.forEach(function (el) {
        var sortable = Sortable.create(el,{
                animation: 200,
                ghostClass: 'ghost',
            onEnd: function (evt) {
                SetDraggableValue(evt.item);
            },
        });        
    });

    $('body').on('change', '.draggable-list-item .activity', function(){
        SetDraggableValue( $(this) );
    });

    $('body').on('click', '.reset-default-sort', function(event){
        event.preventDefault();

        if( confirm('Вы уверены, что хотите сбросить настройки?') ){
            window.location.href = event.target.href;
        };
    });

    $('body').on('click', '.reset-default', function(event){
        event.preventDefault();

        let OPTION_CODE = $(this).data('prop_code');

        if( confirm('Вы уверены, что хотите сбросить настройки?') ){
            BX.ajax.runComponentAction('kontur:admin_settings', 'ResetOption', {
                mode: 'class',
                data: {
                    "OPTION_CODE":  OPTION_CODE,
                },
            }).then(function(response){
                location.reload(true);
            });
        };
    });

    $('input.color_picker').minicolors();
});