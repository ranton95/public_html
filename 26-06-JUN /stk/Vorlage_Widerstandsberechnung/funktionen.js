
function generateList(name) {
	const colors = [
		{v: '0', label: 'schwarz'},
		{v: '1', label: 'braun'},
		{v: '2', label: 'rot'},
		{v: '3', label: 'orange'},
		{v: '4', label: 'gelb'},
		{v: '5', label: 'gruen'},
		{v: '6', label: 'blau'},
		{v: '7', label: 'lila'},
		{v: '8', label: 'grau'},
		{v: '9', label: 'weiss'}
	];
	let list = "<select name='" + name + "'>";
	for (let i = 0; i < colors.length; i++) {
		list += "<option value='" + colors[i].v + "'>" + colors[i].label + "</option>";
	}
	list += "</select>";
	return list;
}


//EventListener für das abhören der Formularelemente
window.addEventListener("load", function(){

	//Abhören des Inputfeldes
	document.getElementById("Rwert").addEventListener("input", function(){
		ajaxSendenundEmpfangen(document.querySelector("input[name=R]").value, document.querySelector("input[name=E]:checked").value )
	});
}

);

function ajaxSendenundEmpfangen(R,E) 
{

	
	
}

function tryConnect() {
	// Verbindungsauswahl automatisch (normal oder ssl)
	let clientID= crypto.randomUUID(); //Einzigartige ID generiert
	console.log(clientID);
	if (window.location.protocol != "https:") {
		var art = " (nor. Port 8080)";
		client = new Paho.MQTT.Client("test.mosquitto.org",8080,clientID);
		client.connect({onSuccess:onConnect});	
	}
	else{
		var art = " (ssl Port 8081)";
		client = new Paho.MQTT.Client("test.mosquitto.org",8081,clientID);
		client.connect({onSuccess:onConnect,useSSL:true });
	}
	client.onMessageArrived = onMessageArrived;
	writeLog("Trying to connect" + art) ;
	}
	
function onConnect() {
	

}	
	
function onMessageArrived(message) {
	
}

function writeLog(newtext){
	
}