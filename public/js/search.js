$(document).ready(function(){
    $('#search').keyup(function(){
        let query = $(this).val();
        let category = $('#category').val();
        if(query !== '')
        {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url:"search/fetch",
                method:"POST",
                data:{query:query, category:category, _token:_token},
                success:function(data){
                    $('#productList').fadeIn();
                    $('#productList').html(data);
                }
            });
        } else {
            $('#productList').fadeOut();
        }
    });
});

$('body').click(function() {
    $('#productList').fadeOut();
    $('#search').val('');
});

$('#searchBar').click(function(event){
    event.stopPropagation();
});

