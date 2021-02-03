<script>
    <script src="{{URL::to('/js/jquery-3.5.1.min.js')}}" ></script>
    <script src="{{URL::to('/js/popper.min.js')}}"  ></script>
    <script src="{{URL::to('/js/bootstrap.min.js')}}"  ></script>
  
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
      $('#disableUserSubmit').on('click', '.delete', function(){
        $.ajax({
          type: 'POST',
          url: "{{route('desactiver_medecin')}}",
          data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#id_medecin').val()
          },
          success: function(data){
            console.log(data);
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
