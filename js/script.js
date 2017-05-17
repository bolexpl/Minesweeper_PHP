var nick = "";
var plansza = "8x8";
var width = 5;
var height = 6;
var countMines = 5;
var end = false;

var pola = [];
var first = true;

function discovery(x, y) {
    if (pola[y][x].zakryte === false) {
        return;
    }
    pola[y][x].zakryte = false;
    $(pola[y][x].td).addClass("blank");

    if (pola[y][x].val === -1) {
        $(pola[y][x].td).addClass("mine-red");
    }

    if (pola[y][x].val > 0) {
        $(pola[y][x].td).addClass("field" + pola[y][x].val);
    }

    if (pola[y][x].val === 0) {
        for (var i = y - 1; i <= y + 1; i++) {
            for (var j = x - 1; j <= x + 1; j++) {
                if (!(i === y && j === x)
                    && i >= 0 && i < height
                    && j >= 0 && j < width
                    && pola[i][j].zakryte === true) {
                    discovery(j, i);
                }
            }
        }
    }
}

function generateNumbers() {
    for (var i = 0; i < height; i++) {
        for (var j = 0; j < width; j++) {

            if (pola[i][j].val !== -1) {
                var count = 0;
                for (var i2 = i - 1; i2 <= i + 1; i2++) {
                    for (var j2 = j - 1; j2 <= j + 1; j2++) {

                        if (i2 >= 0 && i2 < height
                            && j2 >= 0 && j2 < width) {
                            if (pola[i2][j2].val === -1) {
                                count++;
                            }
                        }
                    }
                }
                pola[i][j].val = count;
                // $(pola[i][j].td).addClass("field"+count);
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
        // $(pola[randY][randX].td).addClass("mine");
    }
    generateNumbers();
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
            pola[i][j] = new Pole($("<td>").append($("<div>")), j, i, 0);
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
            $("#countMines").html(countMines);
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