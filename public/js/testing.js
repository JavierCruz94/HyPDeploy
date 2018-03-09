
$( document ).ready(function() {
    var canvas = document.getElementById("signature-pad1");
    var canvas2 = document.getElementById("signature-pad2");

    var signaturePad1 = new SignaturePad(canvas);
    var signaturePad2 = new SignaturePad(canvas2);

});

function postPDF() {

    var client_canvas_url = document.getElementById('signature-pad1').toDataURL();
    var consult_canvas_url = document.getElementById('signature-pad2').toDataURL();

    var url_client_sign = document.getElementById('url_client_sign');
    var url_consult_sign = document.getElementById('url_consult_sign');

    url_client_sign.value = client_canvas_url;
    url_consult_sign.value = consult_canvas_url;

    var signForm = document.getElementById('signForm');
    signForm.submit();
}