@extends('backend.layouts.master')

@section('title', 'create quiz')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
<style>
  table {
    /* table-layout: fixed; */
    margin-left: -15px;
    width: 100%
  }

  td {
    word-wrap: break-word;
    margin-left: 10px !important;
  }

  @media(max-width: 1280px) {
    .nn-md {
      display: none;
    }
  }

  @media(max-width: 768px) {
    .nn-sm {
      display: none;
    }
  }

</style>
@section('content')

<div class="span9">
  <div class="content">
    <div class="module">
      @if (Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif

        <div class="module-head">
          <h3>All Users</h3>
          <div class="module-body">
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="nn-sm">Name</th>
                  <th>Email</th>
                  <th class="nn-md">Password</th>
                  <th class="nn-md">Occupation</th>
                  <th class="nn-md">Address</th>
                  <th class="nn-md">Phone</th>
                  <th>Show</th>
                  <th>Edit</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                @if(count($users)>0)
                  @foreach ($users as $key => $user)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td class="nn-sm">{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td class="nn-md">{{ $user->visible_password }}</td>
                      <td class="nn-md">{{ $user->occupation }}</td>
                      <td class="nn-md">{{ $user->address }}</td>
                      <td class="nn-md">{{ $user->phone }}</td>

                      <td>
                        <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-info">Show</a>
                      </td>
                      <td>
                        <a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-primary">Edit</a>
                      </td>
                      <td>
                        <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">Delete</button>

                        <div id="id01" class="modal">
                          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                          <form class="modal-content" action="{{ route('user.destroy', [$user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="container2">
                              <h1>Delete Quiz</h1>
                              <p>Are you sure you want to delete the quiz?</p>

                              <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn button">Cancel</button>
                                <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn button">Delete</button>
                              </div>
                            </div>
                          </form>
                        </div>

                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4">
                      <div class="alert alert-warning">There is no Users to display</div>
                    </td>
                  </tr>
                @endif


              </tbody>
            </table>
            <div class="pagination pagination-centered">
              {{ $users->links() }}
            </div>
          </div>
        </div>

    </div>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
@endsection
