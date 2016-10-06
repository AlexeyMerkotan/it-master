<?php require_once __DIR__ .'./blocks/header.php'?>
<body>
<div class="row">
    <div class="col-md-12">
        <?php require_once __DIR__ .'./blocks/navigation.php'?>
    <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="jumbotron" style="padding:48px;">
                        <h2>Incoming</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>To</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th style="width: 200px;">
                                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" >Message</button>
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="container">
                                                    <div class="jumbotron" style="padding:48px; margin: 0px;">
                                                        <h2>Message</h2>
                                                        <form role="form" action="?page=message" method="post" onsubmit="return check_message(this)" >

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Destination</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Title</label>
                                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Message</label>
                                                                <textarea class="form-control" rows="10" name="text"></textarea>
                                                            </div>
                                                            <div style="color:#FF0000;" id="messageShow"></div>
                                                            <div style="color:#FF0000;" id="messageShow"></div>
                                                            <button type="submit" class="btn btn-default">Send</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger" onclick="delete_incoming_Contact()">Delete</button>
                                </th>
                            </tr> </thead>
                            <tbody>
                            <?php foreach($data as $value):?>
                                <tr>
                                    <th scope="row"><div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="check[]"value="<?=$value['0']?>">
                                            </label>
                                        </div></th>
                                    <td><?php echo $value['1'];?></td>
                                    <td><?php echo $value['2'];?></td>
                                    <td><?php echo $value['3'];?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="viewContacthome(<?php echo $value['0'];?>)" data-toggle="modal" data-target="#myModalhome">
                                            View
                                        </button>
                                        <div class="modal fade" id="myModalhome" tabindex="-1" role="dialog" aria-labelledby="myModalLabelhome">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabelhome">Message</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="10" id="texthome" name="texthome"></textarea>
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

               <!-- -->
            </div>
        </div>
<?php require_once __DIR__ .'./blocks/footer.php'?>