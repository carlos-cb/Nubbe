$(function(){
    $(".navbar-form .form-control").keyup(function(){
        $("table tbody tr")
            .hide()
            .filter(":contains('"+( $(this).val() )+"')")
            .show();
    }).keyup();
});

$(document).ready(function() {
    $("button#todo").addClass("active");

    $("button#todo").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        $("table tbody tr").show();
    });

    $("button#preparando").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        for(var i=0; i<table.length; i++){
            if($(table[i]).find("button#estado").text() == "PREPARANDO"){
                $(table[i]).show();
            }else{
                $(table[i]).hide();
            }
        }
    });

    $("button#entregando").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        for(var i=0; i<table.length; i++){
            if($(table[i]).find("button#estado").text() == "ENTREGANDO"){
                $(table[i]).show();
            }else{
                $(table[i]).hide();
            }
        }
    });

    $("button#terminado").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        for(var i=0; i<table.length; i++){
            if($(table[i]).find("button#estado").text() == "TERMINADO"){
                $(table[i]).show();
            }else{
                $(table[i]).hide();
            }
        }
    });

    $("button#cancelado").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        for(var i=0; i<table.length; i++){
            if($(table[i]).find("button#estado").text() == "CANCELADO"){
                $(table[i]).show();
            }else{
                $(table[i]).hide();
            }
        }
    });

    $("button#fallado").click(function(){
        $("div#fliter button").removeClass("active");
        $(this).addClass("active");
        var table = $("table tbody").find("tr");
        for(var i=0; i<table.length; i++){
            if($(table[i]).find("button#estado").text() == "FALLADO"){
                $(table[i]).show();
            }else{
                $(table[i]).hide();
            }
        }
    });
});
