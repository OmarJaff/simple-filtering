

<div class="flex w-full space-x-4 items-center">

    <div>
        <form method="GET" action="#" >

          <input type="text" name="search" value="{{request('search')}}" placeholder="Search..."

           class="mt-1 block w-full pl-3 pr-10 py-2.5
           text-base border-gray-300 focus:outline-none
           focus:ring-indigo-500 focus:border-indigo-500
           sm:text-sm rounded-md">

        </form>
    </div>

   <x-dropdown title="{{request()->has('position') ? request('position'): 'Filter by position'}}">

       <x-dropdown-item href="/">All</x-dropdown-item>

   @foreach(\App\Models\Position::all() as $position)
           <x-dropdown-item href="?position={{$position->title}}">{{$position->title}}</x-dropdown-item>
       @endforeach
   </x-dropdown>

    <x-dropdown title="{{request()->has('gender') ? request('gender'): 'Filter by gender'}}">

        <x-dropdown-item href="/">All</x-dropdown-item>


            <x-dropdown-item href="/?{{http_build_query(request()->except('gender','page'))}}">Male</x-dropdown-item>
           <x-dropdown-item href="?{{http_build_query(request()->except('gender','page'))}}">Female</x-dropdown-item>

    </x-dropdown>

</div>

