<div id="profile-description" class="modal border-primary">
    <div class="modal-dialog ">
        <form action="../../control/functions.php" method="post" class="modal-content">
            <div class="modal-header  bg-primary">
                <h5 class="modal-title">Description profile</h5>
                <button data-dismiss="modal" class="close">&times;</button>
            </div>
                <div class="modal-body">
                        <input class="fade" name="method" value="49">
                        <div class="form-group">
                            <input class="form-control" name="nom" id="nom" placeholder="nom" required value="<?php echo $infos[0]['nom'];?>">
                        </div>   
                        <div class="form-group">
                            <input class="form-control" name="prenom" id="prenom" placeholder="prenom" required value="<?php echo $infos[0]['prenom'];?>">
                        </div>   
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="text" required><?php echo $infos[0]['description'];?></textarea>
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