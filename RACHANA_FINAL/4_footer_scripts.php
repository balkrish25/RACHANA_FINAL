<script src="assets/ajax/jquery.min.js"></script>
<script src="assets/js/vendors.js"></script>
<script src="assets/js/active.js"></script>
<script src="admin/vendors/validate.js"></script>
<script src="assets/ajax/typeahead.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){        
        $('input.typeahead').typeahead({            
            name: 'typeahead',
            remote:'assets/ajax/search_product.php?key=%QUERY',
            limit : 10
        });
    });
</script>
<?php include_once("chatPopup.php");?>