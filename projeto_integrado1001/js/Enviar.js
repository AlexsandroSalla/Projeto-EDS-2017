function enviar(){
//variáveis de entrada
var numeroDeFisio = $('#numeroDeFisio').val();
var numeroDeTO = $('#numeroDeTO').val();
var numeroDePJFisio = $('#numeroDePJFisio').val();
var numeroDePJTO = $('#numeroDePJTO').val();

//verificação de entrada
// if( numeroDeFisio ==""){
//alert("Campo não foi Preenchido");
//return false;
//} 

//calculos
var numeroFisio = parseInt(numeroDeFisio);

$('#numeroFisio').val(numeroFisio.toFixed(2));

}

//Verifica se o caracter digitado é número ou ponto
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	if(charCode == 46){ return false;	}
	else
	{
	
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		
        return false;
    }
	}
    return true;
}
