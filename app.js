function autoSpeicherung(){

	console.clear();
	console.warn('Funktionsaufruf gestartet....')
	var check = false;
	var name = $('#name').val();
	var kraftstoff = $('#kraftstoff').val();
	var farbe = $('#color').val();
	var bauart = $('#bauart').val();
	var id = $('#id').val();
	
	if(name && kraftstoff) {
		check = true;
	}else{
    if(!name){
		check = true;
      var checkname = true;
    }
    if(!kraftstoff){
		check = true;
      var checkks = true;
    }
  }

  if(check) {
	  
	  if(checkname){

		var warnung = '<div class="fehler">\
                <h4>Fehler beim Namen!</h4>\
                </div>';
	  } 
	  if(checkks){

		var warnung = '<div class="fehler">\
                <h4>Fehler beim Kraftstoff!</h4>\
                </div>';
	  } 
  }


    /*console.log(name);
    console.log(kraftstoff);
    console.log(color);
    console.log(bauart);*/
    $('#name').val(name);

    //console.error('ACHTUNG!');
    //console.warn('WARNUNG!');
    //if(!name && !kraftstoff && !bauart){

    $.ajax({
      type:"POST",
      url:"ajax.php",
      data: { name: name, kraftstoff: kraftstoff, farbe: farbe, bauart: bauart },
      dataType: "JSON",
      beforeSend: function(){
        console.log('Daten werden abgerufen...');
        $('#ergebnis').addClass('hidden');
        //$('#submitbutton').attr('disabled', true).addClass('hidden');
        //$('button[name=submitbutton]')
      },
      success: function(daten){
        console.log('success: ' + daten);
		var html = "";
		if (daten.length > 0) {	
			for(i=0;i<daten.length;i++) {
              html += '<tr><td>'+daten[i].name+'</td><td style="color:'+daten[i].farbe+'">'+daten[i].farbe+'</td><td>'+daten[i].bauart+'</td><td>'+daten[i].kraftstoff+'</td></tr>';
            }	
        $('#ergebnis').html(html).removeClass('hidden');
		}
		
      },
      error: function(error){
        console.log('fehler: ' + error);
        $('#ergebnis').html(warnung).removeClass('hidden');
      },
      complete: function(){

      },
    });
	
}



function firstFunction(){
  console.log('Applikation initialisiert....');
	var check = false;
  var name = $('#name').val();
  var kraftstoff = $('#kraftstoff').val();
  var farbe = $('#color').val();
  var bauart = $('#bauart').val();

  if(name && kraftstoff) {
    check = false;
  }else{
    if(!name){
		check = true;
      var checkname = true;
    }
    if(!kraftstoff){
		check = true;
      var checkks = true;
    }
  }

  if(check) {
	  
	  if(checkname){

		var warnung = '<div class="fehler">\
                <h4>Fehler beim Namen!</h4>\
                </div>';
	  } 
	  if(checkks){

		var warnung = '<div class="fehler">\
                <h4>Fehler beim Kraftstoff!</h4>\
                </div>';
	  } 
  }


    /*console.log(name);
    console.log(kraftstoff);
    console.log(color);
    console.log(bauart);*/
    $('#name').val(name);

    //console.error('ACHTUNG!');
    //console.warn('WARNUNG!');
    //if(!name && !kraftstoff && !bauart){

    $.ajax({
      type:"POST",
      url:"ajax.php",
      data: { name: name, kraftstoff: kraftstoff, farbe: farbe, bauart: bauart },
      dataType: "JSON",
      beforeSend: function(){
        console.log('Daten werden abgerufen...');
        $('#ergebnis').addClass('hidden');
        //$('#submitbutton').attr('disabled', true).addClass('hidden');
        //$('button[name=submitbutton]')
      },
      success: function(daten){
        console.log('success: ' + daten);
		if (daten.status) {	
			var html = '<tr>\
						<td class="capitalize">'+daten.name+'</td>\
						<td class="uppercase" style="color:'+ daten.farbe+'">\
							'+daten.farbe+'\
						</td>\
						<td class="capitalize">'+daten.bauart+'</td>\
						<td class="capitalize">'+daten.kraftstoff+'</td>\
						<td class="capitalize"></td>\
					</tr>';
							
			
        $('#ergebnis').append(html).removeClass('hidden');
		}
		
      },
      error: function(error){
        console.log('fehler: ' + error);
        $('#ergebnis').html(warnung).removeClass('hidden');
      },
      complete: function(){

      },
    });
  }
//  }


