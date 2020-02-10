<!-- Logout Modal-->

<style>

.modal-content {
  height: 100%; /* = 100% of the .modal-dialog block */
}
.descfield{
    height: 150px;
}

.textf{
    min-width: 97%;
    min-height: 120px;
    max-height: 120px;
    height: 120px !important;
}

.toppad{
    margin-top: 60px;
}

.checkbox-menu li label {
    display: block;
    padding: 3px 10px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
    margin:0;
    transition: background-color .4s ease;
}
.checkbox-menu li input {
    margin: 0px 5px;
    top: 2px;
    position: relative;
}

.checkbox-menu li.active label {
    background-color: #cbcbff;
    font-weight:bold;
}

.checkbox-menu li label:hover,
.checkbox-menu li label:focus {
    background-color: #f5f5f5;
}

.checkbox-menu li.active label:hover,
.checkbox-menu li.active label:focus {
    background-color: #b8b8ff;
}

.tagrow{
    padding-bottom: 10px;
}

.tag_filter{
    margin-right: 4px;
}

.utag_filter{
    margin-right: 3px;
    margin-bottom: 3px;
}

</style>


<div class="modal fade" id="methodUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleMethodLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleMethodLabel">Edit Method</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body" id="updateinfo">

    </div> <!-- end modal body -->
</div>

</div>
</div>

<script>
$(".checkbox-menu").on("change", "input[type='checkbox']", function() {
   $(this).closest("li").toggleClass("active", this.checked);
});

$(document).on('click', '.allow-focus', function (e) {
  e.stopPropagation();
});
</script>

