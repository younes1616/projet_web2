<div id="login_pannel" class="modal border-primary">
        <div class="modal-dialog ">
            <div class="modal-content">
                
                <div class="modal-header  bg-primary">
                    <h5 class="modal-title">se connecter</h5>
                    <button data-dismiss="modal" class="close">&times;</button>
                </div>
                
                <form method="post" action="../../control/functions.php" autocomplete="off">
                    <div class="modal-body">
                        <input name="method"  readonly value="0" class="fade"/>
                        <input name="mail" placeholder="mail" type="text" class="form-control mt-2"/>
                        <input name="password" placeholder="password" type="password" class="form-control mt-2" />
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">
                            <span class="fa fa-close"></span> Annuler 
                        </button>
                        <button class="btn btn-primary" name="poster"type="submit">
                            <span class="fa fa-check"></span> connecter
                        </button>
                    </div>
                </form>
                <label class="form-control my-4">this login pannel is reserved only for members of that website</label>
            </div>
        </div>
    </div>