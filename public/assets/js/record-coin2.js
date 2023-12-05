$(".js-open").on('click', function (e){
    text = $(e.target).parent().find('.js-addition')
    $(text).toggle();
    id = $(text).data("id")
    console.log("aaa"+id)
    if($(text).is(":visible")){
        $('#arrow-down'+id).hide()
        $('#arrow-up'+id).css('display', 'block')
    } else{
        $('#arrow-down'+id).css('display', 'block')
        $('#arrow-up'+id).hide()
    }


})
$(".arrow-up").on('click', function (e){
    id = $(e.target).data('id');
    console.log('id-'+id)
    $(e.target).hide()
    $('#arrow-down'+id).css('display', 'block')
    text = $(e.target).parent().find('.js-addition')
    $(text).toggle();
})
$(".arrow-down").on('click', function (e){
    id = $(e.target).data('id');
    console.log('id'+id)
    $(e.target).hide()
    $('#arrow-up'+id).css('display', 'block')
    text = $(e.target).parent().find('.js-addition')
    $(text).toggle();
})

