function sweetAlert(clase, titulo, msj) {
    Swal.fire({
        icon: clase,
        title: titulo,
        text: msj,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Cerrar',
    });
}

//Mensaje arriba derecha
function sweetMessage(clase, msj) {
    Swal.fire({
        position: 'top-end',
        icon: clase,
        title: msj,
        showConfirmButton: false,
        timer: 2500
    })
}

function Loading(Contenedor) {
    Contenedor.ajaxloader();
}
function removeChildSelect(element, mensaje) {
    if (typeof (element) == "string") {
        element = $('#' + element);
    }
    if (typeof (element) != "object") {
        return;
    }
    element.empty().append('<option value="">' + mensaje + '</option>').val('');
}
function WindowRpt(url, t) {
    var mypage = url;
    var myname = t;
    var sc = 1;
    var r = 1;
    var st = 0;
    var winl = (screen.width) - 8;
    var wint = (screen.height) - 80;
    var subventana = window.self;

    winprops = 'height=' + wint + ',width=' + winl + ',top=0,left=0,scrollbars=' + sc + ',resizable=' + r + ',status=' + st + ',Location=0,fullscreen=0,channelmode=1';
    win = window.open(mypage, myname, winprops);
    if (parseInt(navigator.appVersion) >= 4) {
        win.window.focus();
    }

    subventana.opener = window.self;
}

function isNumberKey(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if ((event.ctrlKey && charCode == 97 /* firefox */) || (event.ctrlKey && charCode == 65) /* opera */) { // allow Ctrl+A
        return true;
    }
    if ((event.ctrlKey && charCode == 120 /* firefox */) || (event.ctrlKey && charCode == 88) /* opera */) { // allow Ctrl+X (cut)
        return true;
    }
    if ((event.ctrlKey && charCode == 99 /* firefox */) || (event.ctrlKey && charCode == 67) /* opera */) { // allow Ctrl+C (copy)
        return true;
    }
    if ((event.ctrlKey && charCode == 122 /* firefox */) || (event.ctrlKey && charCode == 90) /* opera */) { // allow Ctrl+Z (undo)
        return true;
    }
    if ((event.ctrlKey && charCode == 118 /* firefox */) || (event.ctrlKey && charCode == 86) /* opera */ || (event.shiftKey && charCode == 45)) { // allow or deny Ctrl+V (paste), Shift+Ins
        return true;
    }
    /* 8-backspace, 9-tab, 13-enter, 35-end , 36-home, 37-left, 39-home, 46-del , 45 - negative */
    if (charCode == 8 || charCode == 9 || charCode == 13 || charCode == 35 || charCode == 36 || charCode == 37 || charCode == 39 || charCode == 46 || charCode == 45) {
        return true;
    }
    /* numeros, coma */
    if ((charCode >= 48 && charCode <= 57) || charCode == 44) {
        return true;
    }
    return false;
}

function textbox_num() {
    $(".is-number").keypress(function (event) {
        return isNumberKey(event);
    });

    $('.is-number').blur(function () {
        $('.is-number').formatCurrency({
            symbol: '',
            positiveFormat: '%s%n',
            negativeFormat: '%s%n',
            decimalSymbol: '.',
            digitGroupSymbol: ',',
            groupDigits: true
        });
    });
}
