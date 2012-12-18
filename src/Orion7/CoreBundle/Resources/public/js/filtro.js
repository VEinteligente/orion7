		$(".chzn-select").chosen(); 
		$(".chzn-select-deselect").chosen({allow_single_deselect:true}); 

		
		// Select dependiente cuando se cambia estado
		$('#denunciatype_estado').chosen().change(function() {
        	estado=$(this).val();
        	ruta = Routing.generate('Orion7CoreBundle_selects_municipio', { estado: estado }, false);
			$.post(ruta, function(data){
				$("#denunciatype_municipio").html(data);
				$("#denunciatype_municipio").trigger("liszt:updated");
				$("#denunciatype_parroquia").html("");
				$("#denunciatype_centro").html("");
			});
		});	 	
		// Select dependiente cuando se cambia municipio
		$('#denunciatype_municipio').chosen().change(function() {
			municipio=$(this).val();
			ruta = Routing.generate('Orion7CoreBundle_selects_parroquia', { municipio: municipio }, false);
			$.post(ruta, function(data){
				$("#denunciatype_parroquia").html(data);
				$("#denunciatype_parroquia").trigger("liszt:updated");
				$("#denunciatype_centro").html("");
			});	
		});	
		// Select dependiente cuando se cambia parroquia
		$('#denunciatype_parroquia').chosen().change(function() {
			parroquia=$(this).val();
			ruta = Routing.generate('Orion7CoreBundle_selects_centro', { parroquia: parroquia }, false);
			$.post(ruta, function(data){
				$("#denunciatype_centro").html(data);
				$("#denunciatype_centro").trigger("liszt:updated");
			});
		});	 	

		// cambio de codigo del centro de votación
		function calculaCentro(){
			//alert('2');
			codigo_centro=$('#denunciatype_codigo_centro').val();
			ruta = Routing.generate('Orion7CoreBundle_selects_codigo_centro', { codigo_centro: codigo_centro }, false);
			$.post(ruta, function(data){
				var obj = jQuery.parseJSON(data);
				estado = obj.estado;
				municipio = obj.municipio;
				parroquia = obj.parroquia;
				$("#denunciatype_estado option[value="+estado+"]").attr("selected",true);
				$("#denunciatype_estado").trigger("liszt:updated");
					ruta = Routing.generate('Orion7CoreBundle_selects_municipio', { estado: estado }, false);
					$.post(ruta, function(data){
					$("#denunciatype_municipio").html(data);
					$("#denunciatype_municipio option[value="+municipio+"]").attr("selected",true);
					$("#denunciatype_municipio").trigger("liszt:updated");
					ruta = Routing.generate('Orion7CoreBundle_selects_parroquia', { municipio: municipio }, false);
					$.post(ruta, function(data){
						$("#denunciatype_parroquia").html(data);
						$("#denunciatype_parroquia option[value="+parroquia+"]").attr("selected",true);
						$("#denunciatype_parroquia").trigger("liszt:updated");
						ruta = Routing.generate('Orion7CoreBundle_selects_centro', { parroquia: parroquia }, false);
						$.post(ruta, function(data){
							$("#denunciatype_centro").html(data);
							$("#denunciatype_centro option[value="+codigo_centro+"]").attr("selected",true);
							$("#denunciatype_centro").trigger("liszt:updated");
							calculaIncidentes();
						});
					});	
				});

				$("#tabs").tabs("select", "#tabs-1");
			});
		}
		$('#boton_centro').click(function() {
			calculaCentro()
		});	

		// cambio de cedula del elector

		function calculaCedula(){
			//cedula_elector=$(this).val();
			cedula_elector=$('#denunciatype_cedula_elector').val();
			ruta = Routing.generate('Orion7CoreBundle_selects_cedula_elector', { cedula_elector: cedula_elector }, false);
			$.post(ruta, function(data){
				var obj = jQuery.parseJSON(data);
				estado = obj.estado;
				municipio = obj.municipio;
				parroquia = obj.parroquia;
				codigo_centro = obj.centro;
				nombre_elector = obj.nombre;
				$("#denunciatype_estado option[value="+estado+"]").attr("selected",true);
				$("#denunciatype_estado").trigger("liszt:updated");
				ruta = Routing.generate('Orion7CoreBundle_selects_municipio', { estado: estado }, false);
				$.post(ruta, function(data){
					$("#denunciatype_municipio").html(data);
					$("#denunciatype_municipio option[value="+municipio+"]").attr("selected",true);
					$("#denunciatype_municipio").trigger("liszt:updated");
					ruta = Routing.generate('Orion7CoreBundle_selects_parroquia', { municipio: municipio }, false);
					$.post(ruta, function(data){
						$("#denunciatype_parroquia").html(data);
						$("#denunciatype_parroquia option[value="+parroquia+"]").attr("selected",true);
						$("#denunciatype_parroquia").trigger("liszt:updated");
						ruta = Routing.generate('Orion7CoreBundle_selects_centro', { parroquia: parroquia }, false);
						$.post(ruta, function(data){
							$("#denunciatype_centro").html(data);
							$("#denunciatype_centro option[value="+codigo_centro+"]").attr("selected",true);
							$("#denunciatype_centro").trigger("liszt:updated");
							calculaIncidentes();
						});
					});	
				}); 
				$('#denunciatype_nombre_denunciante').val(nombre_elector);
				$("#tabs").tabs("select", "#tabs-1");
				calculaIncidentes();
			});
		}

		$('#boton_cedula').click(function() {
			calculaCedula();
		});	



		$('#denunciatype_centro').chosen().change(function() {
			calculaIncidentes();
		});	

		//Función para mostrar asistencias en pantalla
		function calculaAsistencias(){
			categorias=$('#denunciatype_categoria').val();
			ruta = Routing.generate('Orion7CoreBundle_asistencias', { categorias: categorias }, false);
			$.post(ruta, function(data){
				$('#asistencias').html(data);
			});
		}

		$('#denunciatype_categoria').chosen().change(function() {
			calculaAsistencias();
		});