function isvalid() {
    let x_coord = parseInt(document.forms["form"]["Xchange"].value);
    const allowedX = new Array();
    for (let i = -3; i <= 5; i++) {
        allowedX.push(i);
    }
    if (x_coord == null || isNaN(x_coord) || !allowedX.includes(x_coord)) {
        // alert("координата X введена некорректно");
        return false;
    }
    let y_coord = parseFloat(document.forms["form"]["Ycoord"].value);
    if (y_coord == null || isNaN(y_coord) || y_coord >= 3 || y_coord <= -5) {
        // alert("координата Y введена некорректно");
        return false;
    }
    let Radius = parseFloat(document.forms["form"]["Rchange"].value);
    const allowedR = new Array();
    for (let i = 1; i <= 3; i += 0.5) {
        allowedR.push(i);
    }
    if (Radius == null || isNaN(Radius) || !allowedR.includes(Radius)) {
        // alert("Radius введен некорректно");
        return false;
    }
    return true;
}

document.getElementById("y_coord").addEventListener("input", function (event) {
    y_coord = event.target.value;
    if (y_coord == null || isNaN(y_coord) || y_coord >= 3 || y_coord <= -5) {
        event.target.setCustomValidity("Enter the number between -5 and 3");
    }
    else {
        event.target.setCustomValidity("");
    }
});