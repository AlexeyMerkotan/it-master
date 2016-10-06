<?php require_once __DIR__ .'./blocks/header.php'?>
<body>
<div class="row">
    <div class="col-md-12">
<?php require_once __DIR__ .'./blocks/navigation.php'?>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="jumbotron" style="padding:48px;">
                    <h2>Send</h2>
                    <form role="form" method="post" action="?page=sent">
                        <div class="input-group">
                            <input class="form-control" name="filter"placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go</button>
                            </span>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>To</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th> <button type="button" class="btn btn-danger" onclick="deleteContact()">Delete</button></th>
                        </tr> </thead>
                        <tbody>
                        <?php foreach($data as $value):?>
                        <tr>
                            <th scope="row"><div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="check[]" value="<?=$value['id']?>">
                                    </label>
                                </div></th>
                            <td><?php echo $value['to_mail'];?></td>
                            <td><?php echo $value['title'];?></td>
                            <td><?php echo $value['date'];?></td>
                            <td><button type="button" class="btn btn-primary" onclick="viewContact(<?php echo $value['id'];?>)" data-toggle="modal" data-target="#myModal">
                                    View
                                </button>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Message</h4>
                                            </div>
                                            <div class="modal-body">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="10" id="text" name="text"></textarea>
                                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__ .'./blocks/footer.php'?>