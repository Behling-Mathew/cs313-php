function callAlert() {
    alert("Clicked!");
}
var x;

function getColor() {
    var color = document.getElementById("color").value;
    x = color;
    console.log(color);
    //document.getElementById("div1").style.backgroundColor = color;

}

//$("div").on( "click", "button", function( event ) {
//$(event.delegateTarget ).css( "background-color", color);
//});

$(document).ready(function () {
    $("button").click(function () {
        $(".div1").css({
            "background-color": x
        });
    });
});



$(document).ready(function () {
    $("#toggle").click(function () {
        $(".div2").toggle(1000);
    });
});