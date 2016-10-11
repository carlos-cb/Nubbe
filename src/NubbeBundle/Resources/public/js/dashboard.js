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

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '#ff4a70',
                '#1f97e9',
                '#ffc73d',
                '#3fb3b3',
                '#884dff',
                '#ff9227'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx1 = document.getElementById("myChart1");
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '#ff4a70',
                '#1f97e9',
                '#ffc73d',
                '#3fb3b3',
                '#884dff',
                '#ff9227'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
