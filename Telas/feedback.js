function fecharModal()
{
  document.getElementById('modalFeedback').style.display = 'none';
}

function abrirModal(mensagem)
{
  document.getElementById('modalFeedback').style.display = 'block';
  document.getElementById('modalFeedback').innerHTML = 
     "<div>"
	+ "<div align='right'>" + "<a href='#' class='fechar' onclick='fecharModal();'>x</a> </div>" 
	+ "<br><div align='center'>" + mensagem + "</div>"
	+ "</div>";
}

