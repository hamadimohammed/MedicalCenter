@extends('layouts.Main_layout',[
    'namePage' => 'Lists des Medecins',
    'class' => 'sidebar-mini',
    'activePage' => 'Medcins',
  ])

@section('contenu')
  <div class="col-md-12">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h4 class="card-title"> Liste des Medcins</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dt-buttons btn-group flex-wrap">
                    <a href="{{route('medecin_create')}}" class="btn btn-primary buttons-create" tabindex="0" aria-controls="example" type="button">
                      <span>Nouveau</span>
                    </a>   
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="input-group">
                    <div class="form-outline">
                      <input type="search" id="form1" class="form-control" />
                    </div>
                    <button type="button" class="btn btn-primary">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div>  
                @include('Medecin.MedecinTable')
              </div>
              <!--Start edit modal-->
                @include('Medecin.MedecinUpdateModal')
              <!--End edit modal -->
              <!--Start Disable modal-->
                @include('Medecin.MedecinDisableModal')
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
      $('.disable_user').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        
        $('#id_medecin').val($(this).data('id'));
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
        //var id =$(this).closest('tr').find('.id').text();
        //var _token = $("input[name='_token']").val();
        $('#id_medecin').val($(this).data('id'));
        $('#nom').val($(this).data('nom'));
        $('#prenom').val($(this).data('prenom'));
        $('#adresse').val($(this).data('adresse'));
        $('#telephone').val($(this).data('telephone'));
        $('#email').val($(this).data('email'));
        $('#spec_id').val($(this).data('spec_id'));
        $('#grade').val($(this).data('grade'));
        $('#date_naissance').val($(this).data('date'));

        $('#edit_medecin').modal('show');
        console.log("modal showed");
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

      $("#updateButton").click(function(event){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log("clicked");
        $.ajax({
            method: 'post',
            url: "{{route('update_medecin')}}",
            data: {
              'id': $('#id_medecin').val(),
              'nom': $('#nom').val(),
              'prenom': $('#prenom').val(),
              'adresse': $('#adresse').val(),
              'email': $('#email').val(),
              'telephone': $('#telephone').val(),
              'spec_id': $('#spec_id').val(),
              'grade': $('#grade').val(),
              'date_naissance':$('#date_naissance').val()
            },
            success: function(response) {              
              location.reload();
            },
            error:function(response){
               alert(response);
            }
          });
      });
      $('#delete_btn').on('click', '.delete', function(){
      $.ajax({
        type: 'POST',
        url: "{{route('desactiver_medecin')}}",
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#id_medecin').val()
        },
        success: function(data){
          location.reload();
        }
      });
      });
      
    });
    
    //$("#update_btn").click(function() {
      
    /*var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();*/
        
        //var id = data[0];
        /**/
        /*$tr=$(this).closest('tr');
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        
        $('#id').val(data[0]);
        $('#nom').val(data[1]);
        $('#prenom').val(data[2]);
        $('#addresse').val(data[3]);
        $('#telephone').val(data[4]);
        $('#email').val(data[6]);
        $('#id_spec').val(data[8]);
        $('#grade').val(data[7]);*/
  </script>


<!--script>
    $(document).ready(function(e){
      $('#ajax-view-user').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        jQuery.ajax({
          url: "{{ url('/member/post') }}",
          method: 'post',
          data: {
              membername: jQuery('#membername').val(),
              department: jQuery('#department').val(),
              age: jQuery('#age').val()
          },
          success: function(result){
              console.log(result);
          }});
        });
      });
      console.log('hi');
</script-->
