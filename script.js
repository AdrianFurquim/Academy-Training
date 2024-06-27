let table_segunda = document.getElementById("table_segunda");
let table_terca = document.getElementById("table_terca");
let table_quarta = document.getElementById("table_quarta");
let table_quinta = document.getElementById("table_quinta");
let table_sexta = document.getElementById("table_sexta");
let table_sabado = document.getElementById("table_sabado");

let trs = document.getElementsByTagName("tr")

function segunda(){
    table_segunda.style.display = "block";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    trs[1].style.background = "black";
}

function terca(){
    table_segunda.style.display = "none";
    table_terca.style.display = "block";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
}

function quarta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "block";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
}

function quinta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "block";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
}

function sexta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "block";
    table_sabado.style.display = "none";
}

function sabado(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "block";
}
