document.addEventListener("DOMContentLoaded", function () {
    let buttonShow = document.getElementById("show");
    let hiddenBoard = document.getElementById("hiddenBoard");

    
    function calcPrice() {
        let board = document.createElement("table");

        let headers = ["Num pags","num fotos","B/N 150-300 dpi","B/N 450-900 dpi","Color 150-300 dpi","Color 450-900 dpi"];
        headers.forEach(function (header) {
            let th = document.createElement("th");
            th.textContent = header;
            board.appendChild(th);
        });
        let minFee = 10;
        let rows = [
            
            [1, 3, (minFee + 1 * 2) + " €", (minFee + 1 * 2 + 3 * 0.2).toFixed(2) + " €", (minFee + 1 * 2 + 3 * 0.5).toFixed(2) + " €", (minFee + 1 * 2 + 3 * 0.5 + 3 * 0.2).toFixed(2) + " €"],
            [2, 6, (minFee + 2 * 2) + " €", (minFee + 2 * 2 + 6 * 0.2).toFixed(2) + " €", (minFee + 2 * 2 + 6 * 0.5).toFixed(2) + " €", (minFee + 2 * 2 + 6 * 0.5 + 6 * 0.2).toFixed(2) + " €"],
            [3, 9, (minFee + 3 * 2) + " €", (minFee + 3 * 2 + 9 * 0.2).toFixed(2) + " €", (minFee + 3 * 2 + 9 * 0.5).toFixed(2) + " €", (minFee + 3 * 2 + 9 * 0.5 + 9 * 0.2).toFixed(2) + " €"],
            [4, 12, (minFee + 4 * 2) + " €", (minFee + 4 * 2 + 12 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 12 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 12 * 0.5 + 12 * 0.2).toFixed(2) + " €"],
            [5, 15, (minFee + 4 * 2 + 1 * 1.8) + " €", (minFee + 4 * 2 + 1 * 1.8 + 15 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 1 * 1.8 + 15 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 1 * 1.8 + 15 * 0.5 + 15 * 0.2).toFixed(2) + " €"],
            [6, 18, (minFee + 4 * 2 + 2 * 1.8) + " €", (minFee + 4 * 2 + 2 * 1.8 + 18 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 2 * 1.8 + 18 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 2 * 1.8 + 18 * 0.5 + 18 * 0.2).toFixed(2) + " €"],
            [7, 21, (minFee + 4 * 2 + 3 * 1.8) + " €", (minFee + 4 * 2 + 3 * 1.8 + 21 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 3 * 1.8 + 21 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 3 * 1.8 + 21 * 0.5 + 21 * 0.2).toFixed(2) + " €"],
            [8, 24, (minFee + 4 * 2 + 4 * 1.8) + " €", (minFee + 4 * 2 + 4 * 1.8 + 24 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 4 * 1.8 + 24 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 4 * 1.8 + 24 * 0.5 + 24 * 0.2).toFixed(2) + " €"],
            [9, 27, (minFee + 4 * 2 + 5 * 1.8) + " €", (minFee + 4 * 2 + 5 * 1.8 + 27 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 5 * 1.8 + 27 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 5 * 1.8 + 27 * 0.5 + 27 * 0.2).toFixed(2) + " €"],
            [10, 30, (minFee + 4 * 2 + 6 * 1.8) + " €", (minFee + 4 * 2 + 6 * 1.8 + 30 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 30 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 30 * 0.5 + 30 * 0.2).toFixed(2) + " €"],
            [11, 33, (minFee + 4 * 2 + 6 * 1.8 + 1.6).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 1.6 + 33 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 1.6 + 33 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 1.6 + 33 * 0.5 + 33 * 0.2).toFixed(2) + " €"],
            [12, 36, (minFee + 4 * 2 + 6 * 1.8 + 2 * 1.6).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 2 * 1.6 + 36 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 2 * 1.6 + 36 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 2 * 1.6 + 36 * 0.5 + 36 * 0.2).toFixed(2) + " €"],
            [13, 39, (minFee + 4 * 2 + 6 * 1.8 + 3 * 1.6).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 3 * 1.6 + 39 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 3 * 1.6 + 39 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 3 * 1.6 + 39 * 0.5 + 39 * 0.2).toFixed(2) + " €"],
            [14, 42, (minFee + 4 * 2 + 6 * 1.8 + 4 * 1.6).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 4 * 1.6 + 42 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 4 * 1.6 + 42 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 4 * 1.6 + 42 * 0.5 + 42 * 0.2).toFixed(2) + " €"],
            [15, 45, (minFee + 4 * 2 + 6 * 1.8 + 5 * 1.6).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 5 * 1.6 + 45 * 0.2).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 5 * 1.6 + 45 * 0.5).toFixed(2) + " €", (minFee + 4 * 2 + 6 * 1.8 + 5 * 1.6 + 45 * 0.5 + 45 * 0.2).toFixed(2) + " €"]
        ];
        

        for(let i=0;i<rows.length;i++){
            let newRow = document.createElement("tr");
            for(let j=0;j<rows[i].length;j++){
                let td = document.createElement("td");
                td.textContent = rows[i][j];
                newRow.appendChild(td);

            }
            board.appendChild(newRow);
        }
        console.log("Se creó la tabla");
        hiddenBoard.appendChild(board);  
    }


    buttonShow.addEventListener("click", function () {
        console.log("Se hizo click en el botón de mostrar tabla");

        if (hiddenBoard.style.display === 'none' || hiddenBoard.style.display === '') {
            hiddenBoard.style.display = 'block';
            buttonShow.value = 'Hide price table';
            if (!hiddenBoard.querySelector("table")) { 
                calcPrice();
            }
        } else {
            hiddenBoard.style.display = 'none';
            buttonShow.value = 'Show price table';
        }
    });
});
