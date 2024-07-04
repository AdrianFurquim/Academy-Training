let table_segunda = document.getElementById("table_segunda");
let table_terca = document.getElementById("table_terca");
let table_quarta = document.getElementById("table_quarta");
let table_quinta = document.getElementById("table_quinta");
let table_sexta = document.getElementById("table_sexta");
let table_sabado = document.getElementById("table_sabado");
let buttons_dias = document.querySelector(".buttons_dias");
let button_voltar = document.querySelector(".button_voltar");

let trs = document.getElementsByTagName("tr");

function voltar(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "block";
    button_voltar.style.display = "none";
}

function segunda(){
    table_segunda.style.display = "block";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
    // trs[1].style.background = "black";
}

function terca(){
    table_segunda.style.display = "none";
    table_terca.style.display = "block";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
}

function quarta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "block";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
}

function quinta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "block";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
}

function sexta(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "block";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
}

function sabado(){
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "block";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "block";
}

function confereTreino(index) {
    if (trs[index].style.background === "") {
        trs[index].style.background = "rgb(10, 230, 10, 0.5)";
    } else if(trs[index].style.background = "rgb(10, 230, 10, 0.5)"){
        trs[index].style.background = "";
    }
}

// Criar Treino
let dias = document.querySelector(".escolha_dia");
let membros = document.querySelector(".escolha_membro");

function diaEscolhido() {
    dias.style.display = "none";
    membros.style.display = "block";
}

function membroEscolhido(membro) {
    membros.style.display = "none";
    switch (membro) {
        case "peito":
            document.querySelector(".form_peito").style.display = "block";
            break;

        case "triceps":
            document.querySelector(".form_triceps").style.display = "block";
            break;

        case "abdomen":
            document.querySelector(".form_abdomen").style.display = "block";
            break;

        case "costas":
            document.querySelector(".form_costa").style.display = "block";
            break;

        case "biceps":
            document.querySelector(".form_biceps").style.display = "block";
            break;

        case "ombro":
            document.querySelector(".form_ombro").style.display = "block";
            break;

        case "mem_inferiores":
            document.querySelector(".form_mem_inferiores").style.display = "block";
            break;
    
        default:
            alert("Não tem esse");
            break;
    }
}

