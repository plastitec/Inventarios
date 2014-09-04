function Buscador(){var xmlhttp=false;try {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) {
		try {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E) {
			xmlhttp=false;
		}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined')
{
	xmlhttp=new XMLHttpRequest();
}
return xmlhttp;
}

function Buscar() {
	q = document.getElementById('valor').value;
	c = document.getElementById('consulta');
	ajax = Buscador();
	ajax.open("GET","prcbusca.php?q="+q);
	ajax.onreadystatechange=function Buscar() {
		if (ajax.readyState == 4) {
			c.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}// JavaScript Document

function Resultado(test) {
	q = test;
	document.getElementById('valor').value=q;
}

