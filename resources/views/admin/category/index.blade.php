<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

            All category <b>  </b>
            
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> -->
    <div class="container">
       <div class="row">
       <div class="col-md-8">
       <div class="card">

       @if(session('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>{{session('success')}}</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
          @endif

              <div class="card-header"> All Category </div>
      

       <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>

  
  @foreach($categories as $category)
  
    <tr>
    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{ $category->category_name }}</td>
      <td>{{ $category-> user_id}}</td>
      <td>{{ $category-> created_at}}</td>

    </tr>
  @endforeach
        
    
  </tbody>
</table>

<!-- adds pagination -->
 {{$categories->links()}} 

    </div>
  </div>

  <div class="col-md-4">
       <div class="card">
              <div class="card-header"> Add Category </div>
              <!-- &nbsp; -->
              <div class= "card-body">

              <form action="{{ route('store.category') }}" method="POST">
              @csrf

              <form>
                  <div class="form-group">
                        <label for="exampleInputEmail">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                        &nbsp; 
                            @error('category_name')
                             <span class="text-danger"> {{ $message }}  </span>
                              <!-- checks validation -->
                            @enderror
                  </div>
                  
                
              
                 
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>

            <!-- @if (\Session::has('success'))
                    <div class="alert alert-success">
                         <ul>
                              <li>{!! \Session::get('success') !!}</li>
                          </ul>
                     </div>
@endif -->




      
              </div>
    </div>






       </div>
    </div>














    </div>
</x-app-layout>
