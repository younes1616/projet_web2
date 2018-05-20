<div id="profile-password" class="modal border-primary">
    <div class="modal-dialog ">
        <form action="../../control/functions.php" method="post" class="modal-content">
            <div class="modal-header  bg-primary">
                <h5 class="modal-title">update password</h5>
                <button data-dismiss="modal" class="close">&times;</button>
            </div>
                <div class="modal-body">
                        <input class="fade" name="method" value="47">

                        <div class="form-group">
                            <input class="form-control" name="passwordo" id="passwordo" placeholder="password ancien" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="passwordn" id="passwordn" placeholder="password nouveau" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="passwordc" id="passwordc" placeholder="password confirmer" required>
                        </div>   
                         
                         

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">
                        <span class="fa fa-close"></span> Annuler 
                    </button>
                    <button class="btn btn-primary" name="poster" type="submit"  id="btn-confirmer">
                        <span class="fa fa-check"></span> modifier
                    </button>
                </div>
        </form>
    </div>
</div>