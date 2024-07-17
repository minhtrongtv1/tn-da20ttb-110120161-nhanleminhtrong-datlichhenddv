$(document).ready(function(){
    $(".as").change(function(){
        var id = $(".as").val();
        $.post("test.php",{id:id}, function(data){
            $(".test").html(data);
        })
    })
})