<div class="mail-option">
    <div class="chk-all">
      <div class="pull-left mail-checkbox">
        <input type="checkbox" class="">
      </div>
      <div class="btn-group">
        <a data-toggle="dropdown" href="#" class="btn mini all">
          Tous
          <i class="fa fa-angle-down "></i>
          </a>
        <ul class="dropdown-menu">
          <li><a href="#"> None</a></li>
          <li><a href="#"> Lu</a></li>
          <li><a href="#"> Non lu</a></li>
        </ul>
      </div>
    </div>
    <div class="btn-group">
      <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
        <i class=" fa fa-refresh"></i>
        </a>
    </div>
    <div class="btn-group hidden-phone">
      <a data-toggle="dropdown" href="#" class="btn mini blue">
        Plus
        <i class="fa fa-angle-down "></i>
        </a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="fa fa-pencil"></i> Marqué comme lu</a></li>
        <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="fa fa-trash-o"></i> Supprimé</a></li>
      </ul>
    </div>
    <div class="btn-group">
      <a data-toggle="dropdown" href="#" class="btn mini blue">
        Move to
        <i class="fa fa-angle-down "></i>
        </a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
        <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
      </ul>
    </div>
    <ul class="unstyled inbox-pagination">
      <li><span>1-20 sur <?php echo count($messages);?></span></li>
      <li>
        <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
      </li>
      <li>
        <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
      </li>
    </ul>
</div>
<div class="table-inbox-wrap ">
    <table class="table table-inbox table-hover">
      <tbody>
        <?php foreach ($messages as $key => $message) { ?>
              <tr class="unread">
                <td class="inbox-small-cells">
                  <input type="checkbox" class="mail-checkbox">
                </td>
                <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                <td class="view-message dont-show"><a href="mail_view.html"><?php echo $message["expediteurMessage"];?></a></td>
                <td class="view-message"><a href="mail_view.html"><?php echo $message["objetMessage"];?></a></td>
                <td class="view-message inbox-small-cells"><span class="label label-danger pull-right">urgent</span></td>
                <td class="view-message text-right"><?php echo $message["dateMessage"];?></td>
                <tr>
                    <td colspan="2" style="border-color:rgba(0,0,0,0);"></td><td style="border-color:rgba(0,0,0,0);"><?php echo $message["contenuMessage"];?></td>
                </tr>
              </tr>
        <?php  }?>
      </tbody>
    </table>
</div>