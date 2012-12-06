
(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var input,
					self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "",
					wrapper = this.wrapper = $( "<span>" )
						.addClass( "ui-combobox" )
						.insertAfter( select );

				input = $( "<input>" )
					.appendTo( wrapper )
					.val( value )
					.addClass( "ui-state-default ui-combobox-input" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.appendTo( wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-combobox-toggle" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},

			destroy: function() {
				this.wrapper.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );

	$(function() {

      	//combobox_via
      	$("#via").combobox();

	$("#denunciatype_estado").combobox({
         	selected: function(event, ui) {
         			alert('{{ path('Orion7CoreBundle_selects_municipio') }}');
	            	estado=$(this).val();
					$.post("{{ path('Orion7CoreBundle_selects_municipio') }}", { estado: estado }, function(data){
						
						$("#denunciatype_municipio").html(data);
						$("#denunciatype_parroquia").html("");
						$("#denunciatype_centro").html("");
					});
	         	}
	      	});
      	
		//Nueva función combo_estado
		$("#combo_estado").combobox({
         	selected: function(event, ui) {
            	//alert('HOla!');
            	estado=$(this).val();
				$.post("combo_estado.php", { estado: estado }, function(data){
					$("#combo_municipio").html(data);
					$("#combo_parroquia").html("");
					$("#combo_centro").html("");
					$("#combo_incidente").html("");
					$("#denuncias").html("");
				});
         	}
      	});
      	
      	//Nueva función combo_muncipio
      	$("#combo_municipio").combobox({
         	selected: function(event, ui) {
            	//alert('HOla!');
            	municipio=$(this).val();
				estado=$('#combo_estado').val();
				$.post("combo_municipio.php", { municipio: municipio , estado: estado }, function(data){
					$("#combo_parroquia").html(data);
					$("#combo_centro").html("");
					$("#combo_incidente").html("");
					$("#denuncias").html("");
				});	
         	}
      	});
      	      	
      	//Nueva función combo_parroquia
      	$("#combo_parroquia").combobox({
         	selected: function(event, ui) {
            	//alert('HOla!');
            	parroquia=$(this).val();
				estado=$('#combo_estado').val();
				municipio=$('#combo_municipio').val();
				$.post("combo_parroquia.php", { parroquia: parroquia, municipio: municipio , estado: estado }, function(data){
					$("#combo_centro").html(data);
					$("#combo_incidente").html("");
					$("#denuncias").html("");
				});	
         	}
      	});
      	
      	//Nueva función combo_centro
      	$("#combo_centro").combobox({
         	selected: function(event, ui) {
            	//alert('HOla!');
            	centro=$(this).val();
				$('#combo_incidente').load('combo_centro.php?centro='+centro);
				$("#combo_incidente").html("");
				$("#denuncias").html("");	
         	}
      	});
      	
      	//Nueva función nueva_denuncia
      	$("#combo_nueva_denuncia").combobox({
         	selected: function(event, ui) {
   				tipo_denuncia=$(this).val();
				centro=$('#combo_centro').val();
				$.get('denuncia_nueva2.php?tipo_denuncia=' + tipo_denuncia + '&centro=' + centro + '&id_n=' + denuncia_nueva, function(data) {
		  			$('#denuncias').append(data);
				});
				$.get('denuncia_nueva_asistencia2.php?tipo_denuncia=' + tipo_denuncia + '&centro=' + centro + '&id_n=' + denuncia_nueva, function(data) {
		  			$('#asistencia').append(data);
				});
				//$('#denuncia').val(''); RESOLVER AQUI
				denuncia_nueva++;
				setTimeout(function() {chequea_seguimiento();},750);
				//chequea_seguimiento();
         	}
      	});
      	
	});
