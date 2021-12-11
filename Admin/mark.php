 <?php
if (isset($_POST['submit'])) {
  include 'db/dbutil.php';
  include 'mark_attendance.php';
$i=1;
while ($i<=$per_page) {
echo($_POST['status'.$i]);
$i++;
}
}