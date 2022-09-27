<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Users list') }}
       </h2>
   </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
               
               
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                   <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   <tr>
                       <th scope="col" class="px-6 py-3">
                           User name
                       </th>

                       @can('manage tasks')
                       <th scope="col" class="px-6 py-3">
                           Administrator
                       </th>

                       <th scope="col" class="px-6 py-3">
                           Editor
                        </th>
                        <th scope="col" class="px-6 py-3">
                           
                        </th>
                       @endcan
                   </tr>
                   </thead>
                   <tbody>
                      @if (!count($users) == 0)
                      @foreach ($users as $user)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                         @can('manage tasks')
                         <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $user->name }}
                           </td>
                           
                           
                           <form method="POST" action="{{ route('users.update', $user) }}" class="inline-block" id="{{"form-" . $user->id }}">
                             @csrf
                             @method('PUT')
                           <td class="px-6 py-4">
                                       <input type="checkbox" class='rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                                       id="{{"form-" . $user->id . "-check"}}" name="isAdmin" {{$user->hasRole('Administrator') ? 'checked' : '' }} />
                                   </td>
        
                                   <td class="px-6 py-4">
                                      <input type="checkbox" class='rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                                      id="{{"form-" . $user->id . "-check"}}" name="isEditor" {{$user->hasRole('Editor') ? 'checked' : '' }}/>
                                    </td>

                                    <td class="px-6 py-4">
                                       <x-jet-button type="submit">Save</x-jet-button>
                                     </td>
                           </form>
                                          
                                   @endcan
                               </tr>
                               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                             </tr>
                     @endforeach
                     <script>
                        // const checks = document.querySelectorAll("input[type='checkbox']")
                        // checks.forEach(check => check.addEventListener('change', submitUsersForm));
                        //    function submitUsersForm(e){
                        //       const form = document.getElementById(e.target.id.slice(0, -6));
                        //       form.submit();
                        //    }
                     </script>
                     @else

                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="2"
                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ __('No users found') }}
                     </td>
                  </tr>
                         
                  
                  
               </tbody>
            </table>
            

            @endif
               
           </div>
           </div>
       </div>
   </div>
</x-app-layout>
