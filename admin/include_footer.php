        <!-- footer content -->
        <footer>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- NProgress -->
    <script src="/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Parsley -->
    <script src="/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/admin/build/js/main.js"></script>

    <script type="text/javascript">
      function updateCredit(userId) {
        $.post("/admin/portal.php?updateCredit",
        {
            userId: userId,
            credit: $("#credit_"+userId).val()
        },
        function(data){
            if(data==1){
                alert("บันทึก credit เรียบร้อย");
            } else {
                alert("บันทึก credit ล้มเหลว");
            }
        });
      }

      function submit() {
        $.post("/admin/portal.php?changePassword",
        $("#form1").serialize(),
        function(data){
            if(data==1){
                alert("บันทึก Password เรียบร้อย");
                window.location = "";
            } else {
                alert(data);
            }
        });

        return false;
      }
    </script>
  </body>
</html>