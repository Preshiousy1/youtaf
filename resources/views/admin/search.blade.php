@extends('layouts.admin')

@section('content')
<div class="container">
    <div style="display:block" class="container">
        <h4 style="display:inline; margin-right:100px;">Search For Posts By Title</h4>  
        <input type="text" class="search-input " id="search" name="search"/>
    </div>
 
    <div id="sbody" class="container">
       

           
        
    </div>
    {{-- {{$posts->links()}} --}}

    {{-- <p>No Posts Found</p> --}}

</div>



<script>
    $(document).ready(function(){

        // fetch_data();

        function fetch_data(query = '')
        {
            $.ajax({
            url:"{{ route('search.action') }}",
            method:'GET',
            data:{search:query},
            success:function(data)
                {
                    // alert('back!');
                    // console.log(data);
                $('#sbody').html(data);
            
                }
            })
        }   

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_data(query);
        });
    });
</script>

    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection

{{-- <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script> --}}
    