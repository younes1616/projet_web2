<div id="upload_pannel" class="modal border-primary">
        <div class="modal-dialog ">
            <div class="modal-content">
                
                <div class="modal-header  bg-primary">
                    <h5 class="modal-title">upload photos </h5>
                    <button data-dismiss="modal" class="close">&times;</button>
                </div>
                
                <form method="post" action="../../control/functions.php" enctype="multipart/form-data" autocomplete="off">
                    
                    <div class="modal-body">
                        
                        <input name="method" value="3" class="fade mt-2"/>
                        <input name="file[]" type="file" style="display:none" id="file" class="form-control-file mt-2" multiple>
                        <button type="button" class="btn btn-success" onclick="_('file').click();">
                            <span class="fa fa-upload">Upload</span> 
                        </button>
                        
                    </div>
                    
                    <div class="modal-footer">
                        
                        <button class="btn btn-danger" data-dismiss="modal">
                            <span class="fa fa-close"></span> Annuler 
                        </button>
                        <button class="btn btn-primary" name="poster"type="submit">
                            <span class="fa fa-check"></span> OK
                        </button>
                        
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>