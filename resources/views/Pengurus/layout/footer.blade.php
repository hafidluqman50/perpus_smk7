
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2017 - {{ date('Y') }} <img width="20" height="20" src="{{ asset('/front-assets/img/rpl.png') }}"> RPL Programmer Team.</strong> Some rights
    reserved.
  </footer>
  </div>

	<script src="{{ asset('/admin-assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/admin-assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/admin-assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/admin-assets/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('/admin-assets/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('/admin-assets/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('/admin-assets/js/fastclick.js') }}"></script>
	<script src="{{ asset('/admin-assets/js/adminlte.min.js') }}"></script>
{{--   <script src="{{ asset('/admin-assets/js/tinymce/jquery.tinymce.min.js') }}"></script>
  <script src="{{ asset('/admin-assets/js/tinymce/tinymce.min.js') }}"></script> --}}
  <script>
  $(function(){
      $('.buku').dataTable({autoWidth:true, scrollX:true});
      $('#datepicker').datepicker({
        autoclose:true,
        format:"yyyy",
        viewMode:"years",
        minViewMode:"years"
      });
    $('.date2').datepicker({
      format:"yyyy-mm-dd",
      startDate:new Date(),
    });
    $('.select2').select2();
  });
</script>