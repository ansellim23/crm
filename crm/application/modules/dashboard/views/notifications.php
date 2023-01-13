

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
          </div>
        </div>
          <!-- /top tiles -->

    <div class="row container d-flex justify-content-center">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Notifications</h3>
                        <div class="table-responsive">
                            <table class="table-borderless">
                                <tbody>
                                  <?function time_elapsed_string($datetime, $full = false) {
                                      $now = new DateTime;
                                      $ago = new DateTime($datetime);
                                      $diff = $now->diff($ago);

                                      $diff->w = floor($diff->d / 7);
                                      $diff->d -= $diff->w * 7;

                                      $string = array(
                                          'y' => 'year',
                                          'm' => 'month',
                                          'w' => 'week',
                                          'd' => 'day',
                                          'h' => 'hour',
                                          'i' => 'minute',
                                          's' => 'second',
                                      );
                                      foreach ($string as $k => &$v) {
                                          if ($diff->$k) {
                                              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                          } else {
                                              unset($string[$k]);
                                          }
                                      }

                                      if (!$full) $string = array_slice($string, 0, 1);
                                      return $string ? implode(', ', $string) . ' ago' : 'just now';
                                  }
                                   if($notifications > 0){
                                      foreach($notifications as $notification){ ?>
                                    <tr>
                                        <td><img src="https://www.pikpng.com/pngl/m/108-1083508_facebook-notification-icon-vector-wwwimgkidcom-the-logo-linkedin.png" class="img-circle" style="width:70px;height:70px;"></td>
                                        <td><h6><?echo $notification['from_user']." - ".$notification['message']." - ".time_elapsed_string($notification['date_notify']);?></h6></a></td>
                                    </tr>
                                    <? }
                                  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div><br/>
<!-- /page content -->        

    