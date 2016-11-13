
                // $("#editEventBtn").on('click', function(event)
                //     {
                //         var eventId = $(this).attr('data-EventId');
                //         var url = '<?php echo URL;?>Events/eventDetails/'+eventId+'.json';
                //         $.ajax(
                //             {
                //                 url:url,
                //                 type:'post',
                //                 datatype:'jsonp',
                //                 success:function(response)
                //                 {
                //                     // console.log(response);
                //                     var data = response.event.Event;

                //                     bootbox.dialog({
                //                             title: "Edit Event",
                //                             message: '<form action="" method="POST" role="form" enctype="multipart/form-data">'+
                //                                             '<input type="hidden" name="data[Event][id]" value="'+data.id+'">'+
                //                                             '<div class="form-group">'+
                //                                                 '<label>Title</label>'+
                //                                                 '<input type="text" class="form-control" name="data[Event][title]" required value="'+data.title+'">'+
                //                                             '</div>'+

                //                                             '<div class="form-group">'+
                //                                                 '<label>Description</label>'+
                //                                                 '<textarea class="form-control" rows="3" name="data[Event][description]" required>'+data.description+'</textarea>'+
                                                                
                //                                             '</div>'+

                //                                             '<div class="form-group">'+
                //                                                 '<label>Image</label>'+
                //                                                 '<img class="media-object" src="<?php echo URL_API_IMAGE;?>event/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                //                                             '</div>'+

                //                                             '<div class="form-group">'+
                //                                                 '<label>Image</label>'+
                //                                                 '<input type="file" class="form-control" name="image">'+
                                                               
                //                                             '</div>'+
                //                                             '<div class="modal-footer"><input type="submit" value="Submit" name="editEventBtn" class="btn btn-primary" /></div>'+
                //                                         '</form>',
                //                         }
                //                     );
                //                 }
                //             });
                //     });