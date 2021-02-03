@extends('layouts.Main_layout',[
    'namePage' => 'Lists des Patients',
    'class' => 'sidebar-mini',
  ])

@section('contenu')
  <div class="col-md-12">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h4 class="card-title"> Liste des Patients</h4>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dt-buttons btn-group flex-wrap">
                    <a href="{{route('patient_create')}}" class="btn btn-primary buttons-create" tabindex="0" aria-controls="example" type="button">
                      <span>Nouveau</span>
                    </a>   
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example_filter" class="dataTables_filter">
                      <input type="search" class="form-control form-control-sm" placeholder="Rechercher" aria-controls="example">
                  </div>
                </div>
              </div>
              <div>
                @include('Patient.PatientTable')
              </div>
              <!--Start Disable modal-->
                @include('Patient.PatientDisableModal')
              <!--Modal ends here--->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  <script src="{{URL::to('/js/jquery-3.5.1.min.js')}}" ></script>
  <script src="{{URL::to('/js/popper.min.js')}}"  ></script>
  <script src="{{URL::to('/js/bootstrap.min.js')}}"  ></script>
  <script>
    $(document).ready(function(){
      //$('#table_patient').DataTable();
      $('.disable_user').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        
        $('#id_patient').val($(this).data('id'));
        $('.nom_field').html($(this).data('nom'));
        $('.prenom_field').html($(this).data('prenom'));
        
        $('#deleteModal').modal('show');
      });
      $('.edit_btn').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        var id =$(this).closest('tr').find('.id_medecin').text();
        $.ajax({
          type: 'POST',
          url: "{{route('get_update_patient_view')}}",
          data: {
            '_token': $('input[name=_token]').val(),
            'id': id
          },
          error:function(response){
            alert(response);
          }
        });
      });
      $('#disableUserSubmit').click(function(e){
        console.log("disable confirmed");
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: "{{route('desactiver_medecin')}}",
          data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#id_medecin').val()
          },
          success: function(data){
            location.reload();
          },
          error:function(response){
            alert(response);
          }
        });
      });          
    });
</script>
