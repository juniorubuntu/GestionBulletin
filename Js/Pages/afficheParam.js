

function afficheParmam() {
    if ($('.parametres').hasClass('edit')) {
        alert("Finissez les modifications");
    } else {
        if ($('.parametres').hasClass('ok')) {
            $('.parametres').hide("slow");
            $('.parametres').removeClass('ok');
        } else {
            $('.parametres').show("slow");
            $('.parametres').addClass('ok');
        }
    }
}

function afficheParmamU() {
    if ($('.parametresU').hasClass('edit')) {
        alert("Finissez les modifications");
    } else {
        if ($('.parametresU').hasClass('ok')) {
            $('.parametresU').hide("slow");
            $('.parametresU').removeClass('ok');
        } else {
            $('.parametresU').show("slow");
            $('.parametresU').addClass('ok');
        }
    }
}

function afficheAction(flag) {
    if ($('.comptes').hasClass('dropdown-menu')) {
        $('.comptes').show("slow");
        $('.comptes').removeClass('dropdown-menu');
    } else {
        $('.comptes').hide("slow");
        $('.comptes').addClass('dropdown-menu');
    }
    if(flag === 0){
        $('.com').hide();
    }
}

function newcompte() {
    $('.form-newuser').show("slow");
    $('.parametres').hide("slow");
    $('.parametres').addClass('edit');
}

function ok() {
    $('.parametres').removeClass('edit');
}

function recapitulatifFirst() {
    var status = 0;
    var nompays = document.getElementById('nompaysF');
    var nompaysV = document.getElementById('nompays').value;
    if (nompaysV.length === 0) {
        $('.paysfr').addClass('has-error');
        $('.paysfr').addClass('has-feedback');
        $('.sp1').removeClass('hide');
    } else {
        nompays.value = nompaysV;
        status = status + 1;
    }

    var nomMinistereF = document.getElementById('nomMinistereF');
    var nomMinistereV = document.getElementById('nomMinistere').value;

    if (nomMinistereV.length === 0) {
        $('.ministfr').addClass('has-error');
        $('.ministfr').addClass('has-feedback');
        $('.sp2').removeClass('hide');
    } else {
        nomMinistereF.value = nomMinistereV;
        status = status + 1;
    }

    var devisePaysF = document.getElementById('devisePaysF');
    var devisePaysV = document.getElementById('devisePays').value;

    if (devisePaysV.length === 0) {
        $('.devisepfr').addClass('has-error');
        $('.devisepfr').addClass('has-feedback');
        $('.sp3').removeClass('hide');
    } else {
        devisePaysF.value = devisePaysV;
        status = status + 1;
    }

    var countryNameF = document.getElementById('countryNameF');
    var countryNameV = document.getElementById('countryName').value;

    if (countryNameV.length === 0) {
        $('.namepays').addClass('has-error');
        $('.namepays').addClass('has-feedback');
        $('.sp4').removeClass('hide');
    } else {
        countryNameF.value = countryNameV;
        status = status + 1;
    }


    var ministryNameF = document.getElementById('ministryNameF');
    var ministryNameV = document.getElementById('ministryName').value;

    if (ministryNameV.length === 0) {
        $('.mintryname').addClass('has-error');
        $('.mintryname').addClass('has-feedback');
        $('.sp5').removeClass('hide');
    } else {
        ministryNameF.value = ministryNameV;
        status = status + 1;
    }

    var countryMottoF = document.getElementById('countryMottoF');
    var countryMottoV = document.getElementById('countryMotto').value;


    if (countryMottoV.length === 0) {
        $('.countrymotto').addClass('has-error');
        $('.countrymotto').addClass('has-feedback');
        $('.sp6').removeClass('hide');
    } else {
        countryMottoF.value = countryMottoV;
        status = status + 1;
    }

    return status;
}

function recapitulatifSecond() {

    var status = 0;
    var nomEcole = document.getElementById('nomEcoleF');
    var nomEcoleV = document.getElementById('nomEcole').value;
    if (nomEcoleV.length === 0) {
        $('.ecolefr').addClass('has-error');
        $('.ecolefr').addClass('has-feedback');
        $('.sp7').removeClass('hide');
    } else {
        nomEcole.value = nomEcoleV;
        status = status + 1;
    }

    var deviseEcole = document.getElementById('deviseEcoleF');
    var deviseEcoleV = document.getElementById('deviseEcole').value;
    if (deviseEcoleV.length === 0) {
        $('.devisefr').addClass('has-error');
        $('.devisefr').addClass('has-feedback');
        $('.sp8').removeClass('hide');
    } else {
        deviseEcole.value = deviseEcoleV;
        status = status + 1;
    }

    var boitePostal = document.getElementById('boitePostalF');
    var boitePostalV = document.getElementById('boitePostal').value;
    if (boitePostalV.length === 0) {
        $('.boitefr').addClass('has-error');
        $('.boitefr').addClass('has-feedback');
        $('.sp9').removeClass('hide');
    } else {
        boitePostal.value = boitePostalV;
        status = status + 1;
    }

    var schoolName = document.getElementById('schoolNameF');
    var schoolNameV = document.getElementById('schoolName').value;
    if (schoolNameV.length === 0) {
        $('.schoolen').addClass('has-error');
        $('.schoolen').addClass('has-feedback');
        $('.sp10').removeClass('hide');
    } else {
        schoolName.value = schoolNameV;
        status = status + 1;
    }

    var schoolMotto = document.getElementById('schoolMottoF');
    var schoolMottoV = document.getElementById('schoolMotto').value;
    if (schoolMottoV.length === 0) {
        $('.mottoen').addClass('has-error');
        $('.mottoen').addClass('has-feedback');
        $('.sp11').removeClass('hide');
    } else {
        schoolMotto.value = schoolMottoV;
        status = status + 1;
    }

    var poBox = document.getElementById('poBoxF');
    var poBoxV = document.getElementById('poBox').value;
    if (poBoxV.length === 0) {
        $('.poBoxEn').addClass('has-error');
        $('.poBoxEn').addClass('has-feedback');
        $('.sp12').removeClass('hide');
    } else {
        poBox.value = poBoxV;
        status = status + 1;
    }
    return status;
}

function editerFocus(classe, num) {
    $('.' + classe + '').removeClass('has-error');
    $('.' + classe + '').removeClass('has-feedback');
    $('.' + num + '').addClass('hide');
}

