<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_to_qoute'])){
    insert($_POST);
}

?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Add Qoute
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="qoute">Qoute</label>
                        <textarea name="qoute" id="qoute" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="whose-qoute">Whose qoute</label>
                        <input type="text" class="form-control" id="whose-qoute" name="whose_qoute">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_to_qoute" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
