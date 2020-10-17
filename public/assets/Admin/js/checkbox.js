
var limit = 11;
$('input.single-checkbox').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});

// $('input.single-checkbox').on('change', function(evt) {
//    // alert($('input.single-checkbox').val());
// });

function team1_function(player_object){
    if($(player_object).is(":checked")){
        var team2 = $("input[name='team2[]']:checked").map(function(){return $(this).val();}).get();
        var check = team2.includes(player_object.value);
        if(check){
            $(player_object).prop('checked',false);
            alert('this player is already selected in other team');
        }
    }
}
function team2_function(player_object){
    if($(player_object).is(":checked")){
        var team1 = $("input[name='team1[]']:checked").map(function(){return $(this).val();}).get();
        var check = team1.includes(player_object.value);
        if(check){
            $(player_object).prop('checked',false);
            alert('this player is already selected in other team');
        }
    }
}
