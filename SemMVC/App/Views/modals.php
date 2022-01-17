<?php
?>

<div id="show-forum" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="bi-cart-fill me-1"></i>Forum</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-forum">
                    <div class="row">
                        <div class="cart">
                            <div class="row">
                                <div class="row row-cols-5 align-items-center">
                                    <div class="col-3 fw-bolder">Autor</div>
                                    <div class="col-6 fw-bolder"><div class="row ps-2">Text</div></div>
                                    <div class="col-2 fw-bolder"><div class="row"></div>datum</div>
                                    <div class="col-1 fw-bolder">
                                        <a id="del-comment" href="#"><i></i></a>
                                        <br>
                                        <a id="edit-comment" href="#"><i></i></a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="forum-group">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer form-group">
                <input type="hidden" id="hidden-theme-id" value="">

                <?php
                if ($_SESSION['id'] != "") { ?>
                    <label>Vytvorte komentár:</label>
                    <textarea id = "new-post-comment" class="form-control " placeholder="Napíšte komentár k tejto diskusií"> </textarea>
                    <button type="button" class="btn" style="color: #ffffff" onclick="addNewComment()">Vytvoriť</button>
                <?php }?>
                <div class="text-center"></div>
                <button type="button" class="btn" style="color: #ffffff" data-bs-dismiss="modal">Zatvoriť</button>
            </div>
        </div>
    </div>
</div>

<div id="show-news" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="bi-cart-fill me-1"></i>Novinky</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-news">
                </form>
            </div>
            <div class="modal-footer form-group">
                <input type="hidden" id="hidden-news-id" value="">

                <div class="text-center"></div>
                <?php if ($_SESSION['admin'] >= 1) { ?>
                    <button type="button" class="btn" onclick="saveEditModalNews()">Uložiť</button>
                <?php } ?>
                <button type="button" class="btn" style="color: #ffffff" data-bs-dismiss="modal">Zatvoriť</button>
            </div>
        </div>
    </div>
</div>