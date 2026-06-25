
function generateList(name) {
	let list;
	list="<select name= '"+name+"'>";
	list=list+"<option value='1'>schwarz</option>";
	list=list+"<option value='1'>braun</option>";
	list=list+"<option value='2'>rot</option>";
	list=list+"<option value='3'>orange</option>";
	list=list+"<option value='4'>gelb</option>";
	list=list+"<option value='5'>gruen</option>";
	list=list+"<option value='6'>blau</option>";
	list=list+"<option value='7'>lila</option>";
	list=list+"<option value='8'>grau</option>";
	list=list+"<option value='9'>weiss</option>";

}


//EventListener für das abhören der Formularelemente

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