<?php include('include_header.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registered Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-users" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 5%">#Edit</th>
                          <th>Id</th>
                          <th>Username</th>
                          <th>ชื่อ - นามสกุล</th>
                          <th>เบอร์โทร</th>
                          <th>Email</th>
                          <th>ID Line</th>
                          <th>Credits</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        include_once('../db_connect.php');

                        $sqlSelect = "SELECT i.*, credit FROM user_info i ";
                        $sqlSelect .= "LEFT JOIN user_credit c ";
                        $sqlSelect .= "ON i.user_id = c.user_id ";
                        $stmt = $conn->prepare($sqlSelect);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {?>
                        <tr>
                          <td>
                            <a href="javascript:updateCredit(<?=$row['user_id']?>)" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Update </a>
                          </td>
                          <td><?=$row['user_id']?></td>
                          <td><?=$row['user_name']?></td>
                          <td><?=$row['full_name']?></td>
                          <td><?=$row['mobile_phone']?></td>
                          <td><?=$row['email']?></td>
                          <td><?=$row['line_id']?></td>
                          <td><input name="credit" id="credit_<?=$row['user_id']?>" type="text" value="<?=$row['credit']?>" class="form-control" /></td>
                        </tr>
                            <?php }
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>

                </div>

              </div>


            </div>


          </div>
        </div>
        <!-- /page content -->

<?php include('include_footer.php'); ?>