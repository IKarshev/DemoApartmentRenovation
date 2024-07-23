$(function(){

    function SetDraggableValue(element){
        console.log( $(element) );
        let i = 1;
        let value_list = [];
        $(element).closest('.draggable-list').find('.draggable-list-item').each(function(){
            $(this).find('.count').html(i);
            i += 1;
            if( $(this).find('.activity').is(':checked') ){
                value_list.push($(this).data('count'));
            }
        });
        $(element).closest('.draggable-list').find('input').val( JSON.stringify(value_list) );
    }

    var el = document.querySelectorAll('.draggable-list');
    el.forEach(function (el) {
        var sortable = Sortable.create(el,{
            onEnd: function (/**Event*/evt) {
                SetDraggableValue(evt.item);
            },
        });        
    });

    $('body').on('change', '.draggable-list-item .activity', function(){
        SetDraggableValue( $(this) );
    });
});