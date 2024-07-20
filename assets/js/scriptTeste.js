let table_segunda = document.getElementById("table_segunda");
let table_terca = document.getElementById("table_terca");
let table_quarta = document.getElementById("table_quarta");
let table_quinta = document.getElementById("table_quinta");
let table_sexta = document.getElementById("table_sexta");
let table_sabado = document.getElementById("table_sabado");
let buttons_dias = document.querySelector(".buttons_dias");
let button_voltar = document.querySelector(".button_voltar");

let trs = document.getElementsByTagName("tr");

function sumirBottoes() {
    table_segunda.style.display = "none";
    table_terca.style.display = "none";
    table_quarta.style.display = "none";
    table_quinta.style.display = "none";
    table_sexta.style.display = "none";
    table_sabado.style.display = "none";
    buttons_dias.style.display = "none";
    button_voltar.style.display = "none";
}

function voltar(){
    sumirBottoes();
    buttons_dias.style.display = "block";
}

function segunda(){
    sumirBottoes();
    table_segunda.style.display = "block";
    button_voltar.style.display = "block";
}

function terca(){
    sumirBottoes();
    table_terca.style.display = "block";
    button_voltar.style.display = "block";
}

function quarta(){
    sumirBottoes();
    table_quarta.style.display = "block";
    button_voltar.style.display = "block";
}

function quinta(){
    sumirBottoes();
    table_quinta.style.display = "block";
    button_voltar.style.display = "block";
}

function sexta(){
    sumirBottoes();
    table_sexta.style.display = "block";
    button_voltar.style.display = "block";
}

function sabado(){
    sumirBottoes();
    table_sabado.style.display = "block";
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

function diaVoltar(){
    dias.style.display = "block";
    membros.style.display = "none";
    document.querySelector(".form_peito").style.display = "block";
    document.querySelector(".form_triceps").style.display = "block";
    document.querySelector(".form_abdomen").style.display = "block";
    document.querySelector(".form_costa").style.display = "block";
    document.querySelector(".form_biceps").style.display = "block";
    document.querySelector(".form_ombro").style.display = "block";
    document.querySelector(".form_mem_inferiores").style.display = "block";
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

// PEITO ARRAY ======================================================================================================================
let peito = [
    
]

// TRICEPS ARRAY ======================================================================================================================
let triceps = [
    
]

// ABDOMEN ARRAY ======================================================================================================================
let abdomen = [
    
]

const btnSalvarExercicioPeito = document.getElementById("btnSalvarExercicioPeito");
const btnSalvarExercicioTriceps = document.getElementById("btnSalvarExercicioTriceps");
const btnSalvarExercicioAbdomen = document.getElementById("btnSalvarExercicioAbdomen");

// PEITO BUTTON ======================================================================================================================
btnSalvarExercicioPeito.addEventListener("click", function(e) {
    let exercicioPeito = document.querySelector("#peito").value;
    let seriePeito = document.querySelector("#seriePeito").value;

    // If para caso algum dos item esteja faltando preencher.
    if (exercicioPeito == '' || seriePeito == '') {
        e.preventDefault();
        return;
    }    
    // Cria o produto e salva no array de produtos.
    const novoExercicioPeito = { exercicio: exercicioPeito, serie: seriePeito };
    peito.push(novoExercicioPeito);
    peito.sort((a, b) => a.valor - b.valor);

    // Atualiza a tabela com os novos produtos.
    atualizarTabelaPeito();
    // Troca os componentes do formulário para a lista de produtos.
});

// TRICEPS ARRAY ======================================================================================================================
btnSalvarExercicioTriceps.addEventListener("click", function(e) {
    let exercicioTriceps = document.querySelector("#triceps").value;
    let serieTriceps = document.querySelector("#serieTriceps").value;

    // If para caso algum dos item esteja faltando preencher.
    if (exercicioTriceps == '' || serieTriceps == '') {
        e.preventDefault();
        return;
    }    
    // Cria o produto e salva no array de produtos.
    const novoExercicioTriceps = { exercicio: exercicioTriceps, serie: serieTriceps };
    triceps.push(novoExercicioTriceps);
    triceps.sort((a, b) => a.valor - b.valor);

    // Atualiza a tabela com os novos produtos.
    atualizarTabelaTriceps();
    // Troca os componentes do formulário para a lista de produtos.
});

// ABDOMEN ARRAY ======================================================================================================================
btnSalvarExercicioAbdomen.addEventListener("click", function(e) {
    let exercicioAbdomen = document.querySelector("#abdomen").value;
    let serieAbdomen = document.querySelector("#serieAbdomen").value;

    // If para caso algum dos item esteja faltando preencher.
    if (exercicioAbdomen == '' || serieAbdomen == '') {
        e.preventDefault();
        return;
    }    
    // Cria o produto e salva no array de produtos.
    const novoExercicioAbdomen = { exercicio: exercicioAbdomen, serie: serieAbdomen };
    abdomen.push(novoExercicioAbdomen);
    abdomen.sort((a, b) => a.valor - b.valor);

    // Atualiza a tabela com os novos produtos.
    atualizarTabelaAbdomen();
    // Troca os componentes do formulário para a lista de produtos.
});

// TABELA PEITO =============================================================================================================================
const corpoTabelaPeito = document.getElementById("corpoTabelaPeito");
// Função para atualizar os produtos da tabela.
function atualizarTabelaPeito() {
    // Apaga os item que existiam antes.
    corpoTabelaPeito.innerHTML = "<tr><th scope='row' colspan='3'>Peitoral</th></tr>"
    // Looping para encrever todos os produtos na tabela.
    peito.forEach(peito => {
        const row = document.createElement("tr");
        row.innerHTML = `<th scope="col">A escolha</th><th scope="col">${peito.exercicio}</th><th scope="col">${peito.serie}</th>`;
        corpoTabelaPeito.appendChild(row);
    });
}

// TABELA TRICEPS =============================================================================================================================
const corpoTabelaTriceps = document.getElementById("corpoTabelaTriceps");
// Função para atualizar os produtos da tabela.
function atualizarTabelaTriceps() {
    // Apaga os item que existiam antes.
    corpoTabelaTriceps.innerHTML = "<tr><th scope='row' colspan='3'>Tríceps</th></tr>"
    // Looping para encrever todos os produtos na tabela.
    triceps.forEach(triceps => {
        const row = document.createElement("tr");
        row.innerHTML = `<th scope="col">A escolha</th><th scope="col">${triceps.exercicio}</th><th scope="col">${triceps.serie}</th>`;
        corpoTabelaTriceps.appendChild(row);
    });
}

// ABDOMEN TRICEPS =============================================================================================================================
const corpoTabelaAbdomen = document.getElementById("corpoTabelaAbdomen");
// Função para atualizar os produtos da tabela.
function atualizarTabelaAbdomen() {
    // Apaga os item que existiam antes.
    corpoTabelaAbdomen.innerHTML = "<tr><th scope='row' colspan='3'>Abdominal</th></tr>"
    // Looping para encrever todos os produtos na tabela.
    abdomen.forEach(abdomen => {
        const row = document.createElement("tr");
        row.innerHTML = `<th scope="col">A escolha</th><th scope="col">${abdomen.exercicio}</th><th scope="col">${abdomen.serie}</th>`;
        corpoTabelaAbdomen.appendChild(row);
    });
}
