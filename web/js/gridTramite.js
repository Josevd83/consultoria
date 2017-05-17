$(document).on({
  ready: function() {
    return $('body').on('click', '#eliminarDoc', function(e) {
       var url = $(this).attr('href') ,row = $(this).closest('tr'), cell = $(this).closest('td');
			krajeeDialog.confirm('¿Esta seguro de eliminar el documento?', function(result){
				if(result) {
					
					//alert(url);
					$.ajax({
                            url: url,
                            type: 'post',
                            //dataType: 'text',
                            beforeSend: function() {
                                row.addClass('kv-delete-row');
                                cell.addClass('kv-delete-cell');
                            },
                            complete: function () {
                                row.removeClass('kv-delete-row');
                                cell.removeClass('kv-delete-cell');
                            },
                            error: function (xhr, status, error) {
                                //krajeeDialog.alert('There was an error with your request.' + xhr.responseText);
                                krajeeDialog.alert('Hubo un error');
                            },
                            success: function(){
								/*bootbox.alert({
									message: "I'm the first!",
									callback: function () { $.pjax.reload({container: '#kv-grid-demo-pjax'}); }
								});*/
								
								//$.pjax.reload({container: '#kv-grid-demo-pjax'});
								//krajeeDialog.alert('Documento eliminado exitósamente');
								
								/*krajeeDialog.alert({
									message: "Documento eliminado exitósamente",
									callback: function () { $.pjax.reload({container: '#kv-grid-demo-pjax'}); }
								});*/
								
								//alert('Documento eliminado exitósamente');
								/*setTimeout(function(){
									krajeeDialog.alert('Documento eliminado exitósamente');
								},50);*/
								//$.pjax.reload({container: '#kv-grid-demo-pjax'});
								
								/*function msgSuccess(callback){
									krajeeDialog.alert('Documento eliminado exitósamente');
									callback();
								}
								msgSuccess(function(){
									//$.pjax.reload({container: '#kv-grid-demo-pjax'});
								});*/
								
								/*krajeeDialog.confirm('Documento eliminado exitósamente, ¿Desea refrescar el listado?',function(resultdo){
									if(resultdo){$.pjax.reload({container: '#kv-grid-demo-pjax'});}
								});*/
								
								/*var dialogInstance3 = new BootstrapDialog()
								.setTitle('Dialog instance 3')
								.setMessage('Hi Everybody!')
								.setType(BootstrapDialog.TYPE_INFO)
								.setButtons: [ {
										label: 'Close',
										action: function(dialogItself){
											dialogItself.close();
											$.pjax.reload({container: '#kv-grid-demo-pjax'});
										}
									}]
								.open();*/
								
								var dialog = new BootstrapDialog({
									message: 'Documento eliminado exitósamente',
									type: BootstrapDialog.TYPE_INFO,
									title: 'Información',
									buttons: [{
										id: 'btn-1',
										label: 'Ok',
										action: function(dialogItself){
											dialogItself.close();
											$.pjax.reload({container: '#kv-grid-demo-pjax'});
										}
									}]
								});
								dialog.open();
								
								/*BootstrapDialog.show({
									message: 'Documento eliminado exitósamente',
									buttons: [ {
										label: 'Close',
										action: function(dialogItself){
											dialogItself.close();
											$.pjax.reload({container: '#kv-grid-demo-pjax'});
										}
									}]
								});*/					
							}
                        }).done(function (data) {
                            //$.pjax.reload({container: '#' + kv-grid-demo-pjax.pjaxContainer});
                            //krajeeDialog.alert('Documento eliminado exitósamente');
							//$.pjax.reload({container: '#kv-grid-demo-pjax'});
								//$.pjax.reload({container: '#kv-grid-demo-pjax'});
                            //alert('Lo hizo');
                        });
				}
			});
			return false;
    });
  }
});

			
		$('#refrescar').click(function(){
				$.pjax.reload({container:'#kv-grid-demo-pjax'});
				//$('.grid-view').yiiGridView('applyFilter');
				//$.pjax.reload({container: '#kv-grid-demo-pjax', async:false});
				
		});
