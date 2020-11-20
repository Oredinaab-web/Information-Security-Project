function blockSpecialChar(e) {
    var key = e.keyCode;
    return ((key >= 65 && key <= 90) || (key >= 95 && key <= 122)|| key==32);
    //special characters only ------ k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57
    //for numbers ----- (key >= 65 && key <= 90) || (key >= 95 && key <= 122)
}

