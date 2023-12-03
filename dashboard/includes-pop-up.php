<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
die('Direct access not allowed');
exit();
};

    //Error pop ups
   if( isset( $_SESSION['error'] ) ) {
     ?>
      <script>
          swal.fire({position: 'center', icon: 'warning', title:'WARNING', text: '<?php echo $_SESSION['error']; ?>', showConfirmButton: true, timer: 10000});
      </script>
      <?php
   } unset($_SESSION['error']);
?>
<?php
    //success pop ups
   if( isset( $_SESSION['success'] ) ) {
     ?>
      <script type="text/javascript">
          swal.fire({position: 'center', icon: 'success', title: 'SUCCESS', text: '<?php echo $_SESSION['success']; ?>', showConfirmButton: true, timer: 10000});
      </script>
      <?php
   } unset($_SESSION['success']);

     ?>
      <script type="text/javascript">
      function add(id) {
        swal.fire({
          title: "Are you sure?",
          text: "You are about to add this item!",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Add"
        }).then(function (result){
          if (result.isConfirmed) {
            Swal.fire({
             title: 'Please Wait !',
             html: 'While we are processing your request',// add html attribute if you want or remove
             allowOutsideClick: false,
             showCancelButton: false,
             showConfirmButton: false,
             onBeforeOpen: () => {
                 Swal.showLoading()
             },
         });
                document.getElementById(id).submit();
            } else if (result.dismiss === 'cancel') {
                swal.fire({position: 'center', icon: 'error', title: 'Add cancelled', showConfirmButton: false, timer: 1500})
              }
              return false;
          })
          return false;
      }
          function update(id) {
            swal.fire({
              title: "Are you sure?",
              text: "You are about to update this item!",
              icon: "question",
              showCancelButton: true,
              confirmButtonText: "Update"
            }).then(function (result){
              if (result.isConfirmed) {
                Swal.fire({
                 title: 'Please Wait !',
                 html: 'While we are processing your request',// add html attribute if you want or remove
                 allowOutsideClick: false,
                 showCancelButton: false,
                 showConfirmButton: false,
                 onBeforeOpen: () => {
                     Swal.showLoading()
                 },
             });
             document.getElementById(id).submit();

                } else if (result.dismiss === 'cancel') {
                    swal.fire({position: 'center', icon: 'error', title: 'Update cancelled', showConfirmButton: false, timer: 1500})
                  }
                  return false;
              })
              return false;
          }
          function delete1(a) {
            swal.fire({
              title: "Are you sure about this?",
              text: "You are about to delete this item!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Delete"
            }).then(function (result){
              if (result.isConfirmed) {
                    window.location.href = a;
                } else if (result.dismiss === 'cancel') {
                    swal.fire({position: 'center', icon: 'error', title: 'Delete cancelled', showConfirmButton: false, timer: 1500})
                  }
              })
              return false;
          }
      </script>
      <?php

?>
