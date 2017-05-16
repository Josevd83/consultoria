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
								$.pjax.reload({container: '#kv-grid-demo-pjax'});
								//krajeeDialog.alert('Documento eliminado exitósamente');
								//$.pjax.reload({container: '#kv-grid-demo-pjax'});
							}
                        }).done(function (data) {
                            //$.pjax.reload({container: '#' + kv-grid-demo-pjax.pjaxContainer});
                            krajeeDialog.alert('Documento eliminado exitósamente');
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
