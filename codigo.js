// const ALTO_CANVAS = 400;
// const ANCHO_CANVAS = 400;

// function bienvenida(){
//     let cv = document.querySelector('#canvas');
//     cv.width = ANCHO_CANVAS;
//     cv.height = ALTO_CANVAS;

//     divisiones();

//     window.addEventListener('load', function () {
//         mostrarModal('Bienvenido a 4 en raya, derrota a tu oponente', function () {});
//     });
    
// }
// function preparar() {

//     let cv = document.querySelector('#canvas');

//     let numDivsH = 6;
//     let numDivsV = 7;
    
//     let anchoCol = cv.width / numDivsV;
//     let altoFila = cv.height / numDivsH;

//     cv.addEventListener('mousemove', function (evt) {
//         let x = evt.offsetX; // posición x del ratón en el canvas
//         let y = evt.offsetY; // posición y del ratón en el canvas

//         let fila = Math.floor(y / altoFila);
//         let col = Math.floor(x / anchoCol);

//         // Asegurar que los valores estén dentro de los límites
//         fila = Math.min(Math.max(0, fila), numDivsH - 1);
//         col = Math.min(Math.max(0, col), numDivsV - 1);
//     });

//     // Manejador del evento click
//     cv.addEventListener('click', function (evt) {
//         let x = evt.offsetX; // posición x del ratón en el canvas
//         let y = evt.offsetY; // posición y del ratón en el canvas

//         let fila = Math.floor(y / altoFila);
//         let col = Math.floor(x / anchoCol);

//         // Asegurar que los valores estén dentro de los límites
//         fila = Math.min(Math.max(0, fila), numDivsH - 1);
//         col = Math.min(Math.max(0, col), numDivsV - 1);

//         colocarFicha(fila, col);
//     });

    

//     let casillas = [];
//     for (let i = 0; i < numDivsH * numDivsV; i++) {
//         casillas.push(i);
//     }

//     // Guardar el array original en el sessionStorage
//     sessionStorage.setItem('casillas', JSON.stringify(casillas));
// }

// function divisiones() {
//     let numDivsH = 6;
//     let numDivsV = 7;

//     let cv = document.querySelector('#canvas');
//     let ctx = cv.getContext('2d');

//     let ancho = cv.width / numDivsV;
//     let alto = cv.height / numDivsH;

//     ctx.beginPath();
//     ctx.lineWidth = 2;
//     ctx.strokeStyle = '#a00';

//     // divisiones verticales
//     for (let i = 1; i < numDivsV; i++) {
//         ctx.moveTo(i * ancho, 0);
//         ctx.lineTo(i * ancho, cv.height);
//     }

//     // divisiones horizontales
//     for (let i = 1; i < numDivsH; i++) {
//         ctx.moveTo(0, i * alto);
//         ctx.lineTo(cv.width, i * alto);
//     }

//     ctx.stroke();
// }

// function colocarFicha(fila, col) {
//     let casillas = JSON.parse(sessionStorage.getItem('casillas'));
//     let jugador = JSON.parse(sessionStorage.getItem('jugador'));
//     let selec1 = document.querySelector('#j1');
//     let selec2 = document.querySelector('#j2');

//     // Calcular el índice de la casilla en el array plano
//     let indice = fila * 7 + col;

//     if (casillas.includes(indice)) {
//         // Dibujar el círculo en la casilla correspondiente
//         dibujarCirculo(fila, col, jugador);

//         // Eliminar la casilla del array de casillas disponibles
//         casillas = casillas.filter(c => c !== indice);
//         sessionStorage.setItem('casillas', JSON.stringify(casillas));

//         // Cambiar el turno del jugador
//         jugador = (jugador === 'azul') ? 'rojo' : 'azul';
//         sessionStorage.setItem('jugador', JSON.stringify(jugador));

//         if(jugador === 'azul'){
//             selec1.style.backgroundColor = 'yellow';
//             selec2.style.backgroundColor = 'red';
//         }else{
//             selec1.style.backgroundColor = 'blue';
//             selec2.style.backgroundColor = 'yellow'; 
//         }
//     } else {
//         console.log(`La casilla (${fila}, ${col}) ya está ocupada.`);
//     }
// }

// function dibujarCirculo(fila, col, color) {
//     let cv = document.querySelector('#canvas');
//     let ctx = cv.getContext('2d');

//     let numDivsH = 6;
//     let numDivsV = 7;

//     let anchoCol = cv.width / numDivsV;
//     let altoFila = cv.height / numDivsH;
//     let radio = Math.min(anchoCol, altoFila) / 2 - 5;

//     let centerX = col * anchoCol + anchoCol / 2;
//     let centerY = fila * altoFila + altoFila / 2;

//     ctx.beginPath();
//     ctx.arc(centerX, centerY, radio, 0, 2 * Math.PI, false);
//     ctx.fillStyle = (color === 'azul') ? 'blue' : 'red';
//     ctx.fill();
//     ctx.strokeStyle = 'black';
//     ctx.lineWidth = 2;
//     ctx.stroke();
// }

// function mostrarModal(mensaje, callback) {
//     const modalContainer = document.createElement('div');
//     modalContainer.classList.add('modal-container');

//     const modalContenido = document.createElement('div');
//     modalContenido.classList.add('modal-contenido');

//     const modalMessage = document.createElement('p');
//     modalMessage.textContent = mensaje;
//     modalContenido.appendChild(modalMessage);

//     const closeButton = document.createElement('button');
//     closeButton.textContent = 'Cerrar';
//     closeButton.classList.add('modal-cerrar');
//     closeButton.addEventListener('click', function () {
//         document.body.removeChild(modalContainer);
//         if (callback && typeof callback === 'function') {
//             callback();
//         }
//     });
//     modalContenido.appendChild(closeButton);

//     modalContainer.appendChild(modalContenido);
//     document.body.appendChild(modalContainer);
// }

// function comienzo() {
//     let selec1 = document.querySelector('#j1');
//     let selec2 = document.querySelector('#j2');
//     preparar();

//     let jugador = Math.floor(Math.random() * 2) + 1;

//     if (jugador == 1) {
//         console.log(`El jugador elegido es el jugador AZUL`);
//         sessionStorage.setItem('jugador', JSON.stringify('azul'));
//     } else {
//         console.log(`El jugador elegido es el jugador ROJO`);
//         sessionStorage.setItem('jugador', JSON.stringify('rojo'));
//     }

//     let mostrar = JSON.parse(sessionStorage.getItem('jugador'));
//     mostrarModal(`Jugador ${mostrar}, empiezas TÚ`, function () {
//         empezar();
//     });


//     if(jugador ==  1){
//         selec1.style.backgroundColor = 'yellow';
//         selec2.style.backgroundColor = 'red';
//     }else{
//         selec1.style.backgroundColor = 'blue';
//         selec2.style.backgroundColor = 'yellow'; 
//         }
// }

// function empezar() {
//     console.log('El juego acaba de comenzar');
// }

// function reiniciar() {
//     sessionStorage.clear();
//     window.location.href = './index.html';
// }

// preparar();


const ALTO_CANVAS = 400;
const ANCHO_CANVAS = 400;

function bienvenida() {
    let cv = document.querySelector('#canvas');
    cv.width = ANCHO_CANVAS;
    cv.height = ALTO_CANVAS;

    divisiones();

    window.addEventListener('load', function () {
        mostrarModal('Bienvenido a 4 en raya, derrota a tu oponente', function () {});
    });
}

function preparar() {
    let cv = document.querySelector('#canvas');
    let numDivsH = 6;
    let numDivsV = 7;

    cv.addEventListener('click', function (evt) {
        let x = evt.offsetX;
        let y = evt.offsetY;

        let fila = Math.floor(y / (cv.height / numDivsH));
        let col = Math.floor(x / (cv.width / numDivsV));

        colocarFicha(fila, col);
    });

    let casillas = [];
    for (let i = 0; i < numDivsH * numDivsV; i++) {
        casillas.push(i);
    }

    sessionStorage.setItem('casillas', JSON.stringify(casillas));
    sessionStorage.setItem('fichasAzul', JSON.stringify([]));
    sessionStorage.setItem('fichasRojo', JSON.stringify([]));
}

function divisiones() {
    let numDivsH = 6;
    let numDivsV = 7;

    let cv = document.querySelector('#canvas');
    let ctx = cv.getContext('2d');

    let ancho = cv.width / numDivsV;
    let alto = cv.height / numDivsH;

    ctx.beginPath();
    ctx.lineWidth = 2;
    ctx.strokeStyle = '#a00';

    for (let i = 1; i < numDivsV; i++) {
        ctx.moveTo(i * ancho, 0);
        ctx.lineTo(i * ancho, cv.height);
    }

    for (let i = 1; i < numDivsH; i++) {
        ctx.moveTo(0, i * alto);
        ctx.lineTo(cv.width, i * alto);
    }

    ctx.stroke();
}

function colocarFicha(fila, col) {
    let casillas = JSON.parse(sessionStorage.getItem('casillas'));
    let jugador = JSON.parse(sessionStorage.getItem('jugador'));
    let selec1 = document.querySelector('#j1');
    let selec2 = document.querySelector('#j2');

    let numDivsH = 6;
    let numDivsV = 7;
    let indice = fila * numDivsV + col;

    if (casillas.includes(indice)) {
        dibujarCirculo(fila, col, jugador);

        let fichas = JSON.parse(sessionStorage.getItem(jugador === 'azul' ? 'fichasAzul' : 'fichasRojo'));
        fichas.push([fila, col]);
        sessionStorage.setItem(jugador === 'azul' ? 'fichasAzul' : 'fichasRojo', JSON.stringify(fichas));

        casillas = casillas.filter(c => c !== indice);
        sessionStorage.setItem('casillas', JSON.stringify(casillas));

        if (verificarVictoria(fichas, numDivsH, numDivsV)) {
            mostrarModal(`¡El jugador ${jugador} ha ganado!`, function () {
                reiniciar();
            });
            return;
        }

        jugador = (jugador === 'azul') ? 'rojo' : 'azul';
        sessionStorage.setItem('jugador', JSON.stringify(jugador));

        selec1.style.backgroundColor = (jugador === 'azul') ? 'yellow' : 'blue';
        selec2.style.backgroundColor = (jugador === 'rojo') ? 'yellow' : 'red';
    } else {
        console.log(`La casilla (${fila}, ${col}) ya está ocupada.`);
    }
}

function verificarVictoria(fichas, numDivsH, numDivsV) {
    function contarFichas(fila, col, deltaFila, deltaCol) {
        let cuenta = 0;
        while (fichas.some(f => f[0] === fila && f[1] === col)) {
            cuenta++;
            fila += deltaFila;
            col += deltaCol;
        }
        return cuenta;
    }

    for (let i = 0; i < fichas.length; i++) {
        let [fila, col] = fichas[i];
        let cuentaHorizontal = contarFichas(fila, col, 0, -1) + contarFichas(fila, col + 1, 0, 1);
        let cuentaVertical = contarFichas(fila, col, -1, 0) + contarFichas(fila + 1, col, 1, 0);
        let cuentaDiagonal1 = contarFichas(fila, col, -1, -1) + contarFichas(fila + 1, col + 1, 1, 1);
        let cuentaDiagonal2 = contarFichas(fila, col, -1, 1) + contarFichas(fila + 1, col - 1, 1, -1);

        if (cuentaHorizontal >= 4 || cuentaVertical >= 4 || cuentaDiagonal1 >= 4 || cuentaDiagonal2 >= 4) {
            return true;
        }
    }
    return false;
}

function dibujarCirculo(fila, col, color) {
    let cv = document.querySelector('#canvas');
    let ctx = cv.getContext('2d');

    let numDivsH = 6;
    let numDivsV = 7;

    let anchoCol = cv.width / numDivsV;
    let altoFila = cv.height / numDivsH;
    let radio = Math.min(anchoCol, altoFila) / 2 - 5;

    let centerX = col * anchoCol + anchoCol / 2;
    let centerY = fila * altoFila + altoFila / 2;

    ctx.beginPath();
    ctx.arc(centerX, centerY, radio, 0, 2 * Math.PI, false);
    ctx.fillStyle = (color === 'azul') ? 'blue' : 'red';
    ctx.fill();
    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();
}

function mostrarModal(mensaje, callback) {
    const modalContainer = document.createElement('div');
    modalContainer.classList.add('modal-container');

    const modalContenido = document.createElement('div');
    modalContenido.classList.add('modal-contenido');

    const modalMessage = document.createElement('p');
    modalMessage.textContent = mensaje;
    modalContenido.appendChild(modalMessage);

    const closeButton = document.createElement('button');
    closeButton.textContent = 'Cerrar';
    closeButton.classList.add('modal-cerrar');
    closeButton.addEventListener('click', function () {
        document.body.removeChild(modalContainer);
        if (callback && typeof callback === 'function') {
            callback();
        }
    });
    modalContenido.appendChild(closeButton);

    modalContainer.appendChild(modalContenido);
    document.body.appendChild(modalContainer);
}

function comienzo() {
    let selec1 = document.querySelector('#j1');
    let selec2 = document.querySelector('#j2');
    preparar();

    let jugador = Math.random() < 0.5 ? 'azul' : 'rojo';
    sessionStorage.setItem('jugador', JSON.stringify(jugador));

    mostrarModal(`Jugador ${jugador}, empiezas TÚ`, function () {
        empezar();
    });

    selec1.style.backgroundColor = (jugador === 'azul') ? 'yellow' : 'blue';
    selec2.style.backgroundColor = (jugador === 'rojo') ? 'yellow' : 'red';
}

function empezar() {
    console.log('El juego acaba de comenzar');
}

function reiniciar() {
    sessionStorage.clear();
    window.location.href = './index.html';
}


