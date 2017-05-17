var nick = "";
var plansza = "8x8";
var width = 5;
var height = 6;
var countMines = 5;

var pola = [];
var first = true;

function discovery(x, y) {
    if (pola[y][x].zakryte === false) {
        return;
    }
    pola[y][x].zakryte = false;
    $(pola[y][x].td).addClass("blank");
    // console.log("od " + (x - 1) + " do " + (x + 1));
    // console.log("od " + (y - 1) + " do " + (y + 1));
    for (var i = y - 1; i <= y + 1; i++) {
        for (var j = x - 1; j <= x + 1; j++) {
            if (!(i === y && j === x)
                && i >= 0 && i < height
                && j >= 0 && j < width
                && pola[i][j].zakryte === true) {
                discovery(j, i);
                // console.log("pole: " + x + ", " + y + "| celuję w " + j + ", " + i);
            }
        }
    }
}

function generateMines(x, y) {
    for (var i = 0; i < countMines; i++) {
        do {
            var randX = Math.floor(Math.random() * (width));
            var randY = Math.floor(Math.random() * (height));

        } while (pola[randY][randX].val === -1
        || (randX === x - 1 && randY === y - 1)
        || (randX === x && randY === y - 1)
        || (randX === x + 1 && randY === y - 1)
        || (randX === x - 1 && randY === y)
        || (randX === x && randY === y)
        || (randX === x + 1 && randY === y)
        || (randX === x - 1 && randY === y + 1)
        || (randX === x && randY === y + 1)
        || (randX === x + 1 && randY === y + 1)
            );

        pola[randY][randX].val = -1;
        $(pola[randY][randX].td).addClass("mine");
    }
}

function Pole(td, x, y, val) {
    this.td = td;
    this.x = x;
    this.y = y;
    this.val = val;
    this.zakryte = true;
    this.flag = false;
    this.td.x = this.x;
    this.td.y = this.y;

    this.td.on("click", function () {
        if (first) {
            generateMines(x, y);
            first = false;
        }
        discovery(x, y);
    }).on("contextmenu", function (e) {
        if (pola[y][x].zakryte === false) {
            return false;
        }
        pola[y][x].flag = !pola[y][x].flag;
        if ($(e.target).is("div")) {
            $(e.target).closest("td").toggleClass("flag");
        } else {
            $(e.target).toggleClass("flag");
        }
        return false;
    });
}


function createBoard() {
    var table = $("#table").find("tbody");

    for (var i = 0; i < height; i++) {
        var tr = $("<tr>");
        table.append(tr);
        pola[i] = [];

        for (var j = 0; j < width; j++) {
            pola[i][j] = new Pole($("<td class='blank'>").append($("<div>")), j, i, 0);
            tr.append(pola[i][j].td);
        }
    }
    // generateMines();
}

function start() {
    // nick = $("#nick").val();
    // plansza = $("#plansza").val();
    // if (plansza === "custom") {
    //     width = $("#width").val();
    //     height = $("#height").val();
    // } else {
    //     var s = plansza.split("x");
    //     width = s[0];
    //     height = s[1];
    // }

    $.get(
        "board.php",
        {},
        function (data) {
            $("#container").html(data);
            createBoard();
        }
    );

    return false;
}

start();

function back() {
    $.get(
        "form.php",
        {},
        function (data) {
            $("#container").html(data);
        }
    );
}