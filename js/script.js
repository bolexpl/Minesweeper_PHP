var nick = "";
var plansza = "8x8";
var width = 0;
var height = 0;
var mines = 5;

function pole(td, state, value) {
    this.td = td;
    this.state = state;
    this.value = value;
}

function createBoard(){

}

function start() {
    nick = $("#nick").val();
    plansza = $("#plansza").val();
    if (plansza === "custom") {
        width = $("#width").val();
        height = $("#height").val();
    } else {
        var s = plansza.split("x");
        width = s[0];
        height = s[1];
    }

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